<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\Zone;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DataTables;
use Auth;
use Session;

class StateController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:state-list|state-create|state-edit|state-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:state-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:state-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:state-delete', ['only' => ['destroy']]); 
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $state = State::with('zone')->get();
            
            return Datatables::of($state)
                    ->addIndexColumn()
                    ->addColumn('zone_name', function ($row){
                        return $row->zone->zone_name;
                    })
                    ->addColumn('action', function ($row) {
                        $actionBtn = '<div style="display:flex">';
                        if( Auth::user()->hasPermissionTo('state-list') ) {
                            $actionBtn .= '<a href="'.route('states.show',$row->id).'"  title="View" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-eye"></i></a>';
                        }
                        if( Auth::user()->hasPermissionTo('state-edit') ) {
                            $actionBtn .= '<a href="'.route('states.edit',$row->id).'" title="Edit" class="btn btn-outline-primary btn-sm mr-1"><i class="fas fa-edit"></i></a>';
                        }
                        if( Auth::user()->hasPermissionTo('state-delete') ) {
                            $actionBtn .= '<form method="POST" action="'.route('states.destroy', $row->id).'" onsubmit="return confirm_delete()">
                                <input type="hidden" name="_token" id="csrf-token" value="'.Session::token().'" />
                                <input type="hidden" name="_method" id="csrf-token" value="DELETE" />   
                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form></div>';
                        } 
                        return $actionBtn;
                      })
                    ->rawColumns(['zone_name','action'])
                    ->make(true);
        }
              
        return view('admin.states.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $zones = Zone::get();
        return view('admin.states.create',compact('zones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'zone_id' => 'required',
            'state_name' => 'required|unique:states,state_name'
        ]);

        $state = new State();
        $state->zone_id = $request->zone_id;
        $state->state_name = $request->state_name;
        $state->save();
        return redirect('admin/states')->with('success','State created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $state = State::find($id);
        return view('admin.states.show',compact('state'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $state = State::find($id);
        $zones = Zone::all();
        $state_zone = $state->zone->id;
        return view('admin.states.edit',compact('state','zones','state_zone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'zone_id' => 'required',
            'state_name' => 'required'
        ]);

        $state = State::find($id);
        $state->zone_id = $request->zone_id;
        $state->state_name = $request->state_name;
        $state->update();
        return redirect('admin/states')->with('success','State updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        State::find($id)->delete();
        return redirect('admin/states')->with('success','State deleted successfully.');
    }
}
