<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SeedAvailability;
use App\Models\Zone;
use App\Models\State;
use App\Models\Centre;
use App\Models\Crop;
use App\Models\Variety;
use App\Models\Category;
use App\Models\SeedTarget;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DataTables;
use Auth;
use Session;

class SeedAvailabilityController extends Controller
{

    public function index(Request $request){
        
        $zones = Zone::get();
        $states = State::get();
        $centres = Centre::get();
        $crops = Crop::get();
        $varieties = Variety::get();
        $categories = Category::get();

        if ($request->ajax()) {
           
            if ( ($request->has('centre') && !empty($request->centre)) || ($request->has('crop') && !empty($request->crop))
            || ($request->has('zone') && !empty($request->zone)) || ($request->has('state') && !empty($request->state)) 
            || ($request->has('variety') && !empty($request->variety)) || ($request->has('category') && !empty($request->category)) ) {

                $query = SeedTarget::with('centre','season','crop','items'); 

                if ($request->has('zone') && !empty($request->zone)) {
                    $query->whereHas('centre', function ($q) use ($request) {
                        $q->where('zone_id', $request->zone);
                    });
                }

                if ($request->has('state') && !empty($request->state)) {
                    $query->whereHas('centre', function ($q) use ($request) {
                        $q->where('state_id', $request->state);
                    });
                }

                if ($request->has('variety') && !empty($request->variety)) {
                    $query->whereHas('items', function ($q) use ($request) {
                        $q->where('variety_id', $request->variety);
                    });
                }

                if ($request->has('variety') && !empty($request->variety)) {
                    $query->whereHas('items', function ($q) use ($request) {
                        $q->where('variety_id', $request->variety);
                    });
                }

                if ($request->has('category') && !empty($request->category)) {
                    $query->whereHas('items', function ($q) use ($request) {
                        $q->where('category_id', $request->category);
                    });
                }
                
                if ($request->has('centre') && !empty($request->centre)) {
                    $query->where('centre_id', $request->centre);
                }
                if ($request->has('crop') && !empty($request->crop)) {
                    $query->where('crop_id', $request->crop);
                }

            }else{
                $query = SeedTarget::with('centre','season','crop','items')->get();
            }
             
            return Datatables::of($query)
                    ->addIndexColumn()
                    ->addColumn('crop_name', function ($row) {
                        return $row->crop->name;
                    })
                    ->addColumn('crop_season', function ($row) {
                        return $row->season->name;
                    })
                    ->addColumn('centre_details', function ($row) {
                        return '<div class="table-responsive"><table class="table table-bordered table-striped">
                            <tr>
                                <th>Centre Name</th>
                                <td>'.$row->centre->centre_name.'</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>'.$row->centre->centre_address.'</td>
                            </tr>
                            <tr>
                                <th>Incharge</th>
                                <td>'.$row->centre->user->name.'<br>'.$row->centre->user->email.'<br>+91-'.$row->centre->user->phone.'</td>
                            </tr>
                        </table></div>';

                    })
                    ->addColumn('seed_target', function ($row) {
                        $ttl_target = 0;
                        $table = '';
                        if(!empty($row->items)){
                            $table .= '<div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>Variety</th>
                                        <th>Category</th>
                                        <th>Seed Available (Qtl)</th>
                                        <th>Price (Rs.)</th>
                                    </tr>';
                                    foreach($row->items as $item){
                                        if($item->status){ 
                                            $seed_available_for_sale = $item->status->seed_available_for_sale; 
                                            $seed_price = $item->status->seed_price; 
                                        }else{ 
                                            $seed_available_for_sale = 0; 
                                            $seed_price = '--';
                                        }
                                        $table .= '
                                        <tr>
                                            <td>'.$item->variety->variety_name.'</td>
                                            <td>'.$item->category->name.'</td>
                                            <td>'.$seed_available_for_sale.'</td>
                                            <td>'.$seed_price.'</td>
                                        </tr>';
                                        $ttl_target += $seed_available_for_sale;
                                    }
                                        $table .= '<tr>
                                            <th colspan="2">Total Seed Available</th>
                                            <td>'.$ttl_target.'</td>
                                            <td>--</td>
                                        </tr>';
                                $table .= '
                                </table>
                            </div>';
                        }
                        return $table;
                    })
                    
                    ->rawColumns(['crop_name','crop_season', 'centre_details','seed_target'])
                    ->make(true);
        }
                  
        return view('pages.seed-availability',compact('zones','states','centres','crops','varieties','categories'));
    }

    public function get_states_by_zone(Request $request)
    {
        $data['states'] = State::where("zone_id", $request->zone_id)->get(["state_name", "id"]);
        return response()->json($data);
    }

    public function get_variety_by_crop(Request $request)
    {
        $data['varieties'] = Variety::where("crop_id", $request->crop_id)->get(["variety_name", "id"]);
        return response()->json($data);
    }
}