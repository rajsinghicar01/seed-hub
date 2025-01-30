<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Centre;
use App\Models\Zone;
use App\Models\State;
use App\Models\User;
use App\Models\ControllingAuthority;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DataTables;
use Auth;
use Session;

class CentreController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:centre-list|centre-create|centre-edit|centre-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:centre-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:centre-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:centre-delete', ['only' => ['destroy']]); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            if (isAdmin()) {
                $centres = Centre::query();
            } else {
                $centres = Centre::where('user_id', '=',  Auth::user()->id)->get();
            }

            return Datatables::of($centres)
                    ->addIndexColumn()
                    ->addColumn('zone_id', function ($centres){
                        return $centres->zone->zone_name;
                    })
                    ->addColumn('state_id', function ($centres){
                        return $centres->state->state_name;
                    })
                    ->addColumn('user_id', function ($centres){
                        return $centres->user->name;
                    })
                    ->addColumn('action', function ($centres) {
                        $actionBtn = '<div style="display:flex">';
                        if( Auth::user()->hasPermissionTo('centre-list') ) {
                            $actionBtn .= '<a href="'.route('centres.show',$centres->id).'"  title="View" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-eye"></i></a>';
                        }
                        if( Auth::user()->hasPermissionTo('centre-edit') ) {
                            $actionBtn .= '<a href="'.route('centres.edit',$centres->id).'" title="Edit" class="btn btn-outline-primary btn-sm mr-1"><i class="fas fa-edit"></i></a>';
                        }
                        if( Auth::user()->hasPermissionTo('centre-delete') ) {
                            $actionBtn .= '<form method="POST" action="'.route('centres.destroy', $centres->id).'" onsubmit="return confirm_delete()">
                                <input type="hidden" name="_token" id="csrf-token" value="'.Session::token().'" />
                                <input type="hidden" name="_method" id="csrf-token" value="DELETE" />   
                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form></div>';
                        } 
                        return $actionBtn;
                      })
                    ->rawColumns(['zone_id','state_id','user_id','action'])
                    ->make(true);
        }
              
        return view('admin.centres.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $zones = Zone::get();
        $states = State::get();
        $users = User::whereDoesntHave('roles', function ($q) {
                    $q->where('name', 'admin');
                })->get();
        $controlling_authorities = ControllingAuthority::get();

        return view('admin.centres.create',compact('zones','states','users','controlling_authorities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'centre_name' => 'required|unique:centres,centre_name',
            'centre_address' => 'required',
            'zone_id' => 'required',
            'state_id' => 'required',
            'pincode' => 'numeric|digits:6',
            'user_id' => 'required',
            'controlling_authority_id' => 'required'
        ]);

        $centre = new Centre();
        $centre->centre_name = $request->centre_name;
        $centre->centre_address = $request->centre_address;
        $centre->zone_id = $request->zone_id;
        $centre->state_id = $request->state_id;
        $centre->pincode = $request->pincode;
        $centre->user_id = $request->user_id;
        $centre->controlling_authority_id = $request->controlling_authority_id;
        $centre->save();

        return redirect('admin/centres')->with('success','Centre created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $centre = Centre::find($id);
        return view('admin.centres.show',compact('centre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $centre = Centre::find($id);
        $zones = Zone::get();
        $states = State::get();
        $users = User::whereDoesntHave('roles', function ($q) {
                    $q->where('name', 'admin');
                })->get();
        $controlling_authorities = ControllingAuthority::get();

        return view('admin.centres.edit',compact('centre','zones','states','users','controlling_authorities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'centre_name' => 'required|unique:centres,centre_name,'.$id,
            'centre_address' => 'required',
            'zone_id' => 'required',
            'state_id' => 'required',
            'pincode' => 'numeric|digits:6',
            'user_id' => 'required',
            'controlling_authority_id' => 'required'
        ]);

        $centre = Centre::find($id);
        $centre->centre_name = $request->centre_name;
        $centre->centre_address = $request->centre_address;
        $centre->zone_id = $request->zone_id;
        $centre->state_id = $request->state_id;
        $centre->pincode = $request->pincode;
        $centre->user_id = $request->user_id;
        $centre->controlling_authority_id = $request->controlling_authority_id;
        $centre->update();

        return redirect('admin/centres')->with('success','Centre updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Centre::find($id)->delete();
        return redirect('admin/centres')->with('success','Centre deleted successfully.');
    }

    public function get_states_by_zone(Request $request)
    {
        $data['states'] = State::where("zone_id", $request->zone_id)->get(["state_name", "id"]);
        return response()->json($data);
    }
}