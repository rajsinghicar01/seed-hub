<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SeedTarget;
use App\Models\SeedTargetItem;
use App\Models\Centre;
use App\Models\Season;
use App\Models\Crop;
use App\Models\Variety;
use App\Models\Category;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DataTables;
use Auth;
use Session;
// use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule;



class SeedTargetController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:seed-target-list|seed-target-create|seed-target-edit|seed-target-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:seed-target-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:seed-target-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:seed-target-delete', ['only' => ['destroy']]); 
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
  
        if ($request->ajax()) {

            if (isAdmin()) {
                $SeedTargets = SeedTarget::with('centre','season','crop')->get();
            } else {
                $SeedTargets = SeedTarget::where('centre_id', '=',  get_users_centre())->get();
            }

            return Datatables::of($SeedTargets)
                    ->addIndexColumn()
                    ->addColumn('centre_id', function ($SeedTargets){
                        return $SeedTargets->centre->centre_name;
                    })
                    ->addColumn('season_id', function ($SeedTargets){
                        return $SeedTargets->season->name;
                    })
                    ->addColumn('crop_id', function ($SeedTargets){
                        return $SeedTargets->crop->name;
                    })
                    ->addColumn('action', function ($SeedTargets) {
                        $actionBtn = '<div style="display:flex">';
                        if( Auth::user()->hasPermissionTo('seed-target-list') ) {
                            $actionBtn .= '<a href="'.route('seed-targets.show',$SeedTargets->id).'"  title="View" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-eye"></i></a>';
                        }
                        if( Auth::user()->hasPermissionTo('seed-target-edit') ) {
                            $actionBtn .= '<a href="'.route('seed-targets.edit',$SeedTargets->id).'" title="Edit" class="btn btn-outline-primary btn-sm mr-1"><i class="fas fa-edit"></i></a>';
                        }
                        if( Auth::user()->hasPermissionTo('seed-target-delete') ) {
                            $actionBtn .= '<form method="POST" action="'.route('seed-targets.destroy', $SeedTargets->id).'" onsubmit="return confirm_delete()">
                                <input type="hidden" name="_token" id="csrf-token" value="'.Session::token().'" />
                                <input type="hidden" name="_method" id="csrf-token" value="DELETE" />   
                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form></div>';
                        } 
                        return $actionBtn;
                      })
                    ->rawColumns(['centre_id','season_id','crop_id','action'])
                    ->make(true);
        }
              
        return view('admin.seed-targets.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $centres = Centre::get();
        $seasons = Season::get();
        $crops = Crop::get();
        $varieties = Variety::get();
        $categories = Category::get();
    
        return view('admin.seed-targets.create',compact('centres','seasons','crops','varieties','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if(!empty($request->items)){
            $rules = [ 
                "centre_id" => "required", 
                "season_id" => "required",
                "crop_id" => "required",
                "items.*" => "required",
                'centre_id' => [
                    'required',
                    Rule::unique('seed_targets')->where(function ($query) use ($request) {
                        return $query->where('season_id', $request->season_id)
                                     ->where('crop_id', $request->crop_id);
                    }),
                ],
            ];
    
            foreach($request->items as $key => $value) {
                $rules["items.{$key}.variety_id"] = 'required';
                $rules["items.{$key}.category_id"] = 'required';
                $rules["items.{$key}.total_seed_quantity"] = 'required';
            }
    
            $request->validate($rules);
    
            $seed_target = SeedTarget::create([
                "centre_id" => $request->centre_id, 
                "season_id" => $request->season_id, 
                "crop_id" => $request->crop_id,
            ]);
            
            foreach($request->items as $key => $value) {
                $seed_target->items()->create($value);
            }
    
            return redirect('admin/seed-targets')->with('success','Seed target created successfully.');
        }else{
            return redirect('admin/seed-targets/create')->with('success','Select atleat one item.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $seed_target = SeedTarget::find($id);
        return view('admin.seed-targets.show',compact('seed_target')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $seed_target = SeedTarget::find($id);
        $selected_varieties = Variety::where('crop_id', $seed_target->crop_id)->get();
        if (isAdmin()) {
            $centres = Centre::get();
        } else {
            $centres = Centre::where('user_id','=', Auth::user()->id)->get();
        }
        $seasons = Season::get();
        $crops = Crop::get();
        $varieties = Variety::get();
        $categories = Category::get();

        return view('admin.seed-targets.edit',compact('seed_target','centres','seasons','crops','varieties','categories','selected_varieties')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        if(!empty($request->items)){
            $rules = [ 
                "centre_id" => "required", 
                "season_id" => "required",
                "crop_id" => "required",
                "items.*" => "required",
                'centre_id' => [
                    'required',
                    Rule::unique('seed_targets')->where(function ($query) use ($request) {
                        return $query->where('season_id', $request->season_id)
                                     ->where('crop_id', $request->crop_id);
                    })->ignore($id),
                ],
            ];

            foreach($request->items as $key => $value) {
                // $rules["items.{$key}.id"] = 'required';
                $rules["items.{$key}.variety_id"] = 'required';
                $rules["items.{$key}.category_id"] = 'required';
                $rules["items.{$key}.total_seed_quantity"] = 'required';
                $rules["items.{$key}.created_by"] = 'required';
                // $rules["items.{$key}.seed_target_id"] = [
                //     'required',
                //     Rule::unique('seed_target_items')->where(function ($query) use ($request) {
                //         return $query->where('variety_id', $value["items.{$key}.variety_id"])
                //                     ->where('category_id', $value["items.{$key}.category_id"]);
                //     })->ignore($value['id'])
                // ];
            }
    
            $request->validate($rules);
            
            $seed_target = SeedTarget::find($id);
            $seed_target->centre_id = $request->centre_id;
            $seed_target->season_id = $request->season_id; 
            $seed_target->crop_id = $request->crop_id; 
            $seed_target->update();
    
            foreach($request->items as $key => $value) {
    
                if(!empty($value['id'])){
                    $seed_target->items()->where('id', $value['id'])->update([
                        'variety_id' => $value['variety_id'],
                        'category_id' => $value['category_id'],
                        'total_seed_quantity' => $value['total_seed_quantity'],
                        'created_by' => $value['created_by']
                    ]);
                }else{
                    $seed_target->items()->create($value);
                }
            }
            return redirect('admin/seed-targets')->with('success','Seed target created successfully.');
        }else{
            return redirect('admin/seed-targets')->with('success','Select atleat one item.');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        SeedTarget::find($id)->delete();
        return redirect('admin/seed-targets')->with('success','Seed target deleted successfully.');
    }

    public function get_varieties_by_crop(Request $request)
    {
        $data['varieties'] = Variety::where("crop_id", $request->crop_value)->get(["variety_name", "id"]);
        return response()->json($data);
    }

    public function delete_seed_target_items(Request $request){
        SeedTargetItem::find($request->item_id)->delete();
        $data['data'] = array([
            'status' => 'success',
            'msg' => 'Seed target item deleted successfully.'
        ]);
        return response()->json($data);
    }

    public function get_seed_target_items(Request $request){
        $item['data'] = SeedTargetItem::find($request->item_id);
        return response()->json($item);
    }
}
