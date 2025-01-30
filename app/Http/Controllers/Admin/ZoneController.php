<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Zone;
use App\Models\State;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DataTables;
use Auth;
use Session;

class ZoneController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:zone-list|zone-create|zone-edit|zone-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:zone-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:zone-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:zone-delete', ['only' => ['destroy']]); 
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {        
        if ($request->ajax()) {

            $zone = Zone::with('states')->get();
            
            return Datatables::of($zone)
                    ->addIndexColumn()
                    ->addColumn('states', function($zone){
                        if(!empty($zone->states)){
                            $states = '';
                            foreach($zone->states as $state){
                                $states .= '<label class="badge bg-primary">'.$state->state_name.'</label> ';          
                            }
                            return $states;
                        }
                    })
                    ->addColumn('action', function ($zone) {
                        $actionBtn = '<div style="display:flex">';
                        if( Auth::user()->hasPermissionTo('zone-list') ) {
                            $actionBtn .= '<a href="'.route('zones.show',$zone->id).'"  title="View" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-eye"></i></a>';
                        }
                        if( Auth::user()->hasPermissionTo('zone-edit') ) {
                            $actionBtn .= '<a href="'.route('zones.edit',$zone->id).'" title="Edit" class="btn btn-outline-primary btn-sm mr-1"><i class="fas fa-edit"></i></a>';
                        }
                        if( Auth::user()->hasPermissionTo('zone-delete') ) {
                            $actionBtn .= '<form method="POST" action="'.route('zones.destroy', $zone->id).'" onsubmit="return confirm_delete()">
                                <input type="hidden" name="_token" id="csrf-token" value="'.Session::token().'" />
                                <input type="hidden" name="_method" id="csrf-token" value="DELETE" />   
                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form></div>';
                        } 
                        return $actionBtn;
                      })
                    ->rawColumns(['states','action'])
                    ->make(true);
        }
              
        return view('admin.zones.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.zones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'zone_name' => 'required|unique:zones,zone_name',
        ]);
    
        Zone::create($request->all());
    
        return redirect('admin/zones')->with('success','Zone created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $zone = Zone::find($id);
        $zone = Zone::with('states')->find($id);
        return view('admin.zones.show',compact('zone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $zone = Zone::find($id);
        return view('admin.zones.edit',compact('zone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'zone_name' => 'required|unique:zones,zone_name,'.$id,
        ]);

        $input = $request->all();

        $crop = Zone::find($id);
        $crop->update($input);

        return redirect('admin/zones')->with('success', 'Zone updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Zone::find($id)->delete();
        return redirect('admin/zones')->with('success','Zone deleted successfully.');
    }
}
