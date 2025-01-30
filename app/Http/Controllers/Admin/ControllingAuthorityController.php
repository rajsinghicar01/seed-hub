<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ControllingAuthority;
use App\Models\Designation;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DataTables;
use Auth;
use Session;

class ControllingAuthorityController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:controlling-authority-list|controlling-authority-create|controlling-authority-edit|controlling-authority-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:controlling-authority-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:controlling-authority-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:controlling-authority-delete', ['only' => ['destroy']]); 
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $ControllingAuthority = ControllingAuthority::query();
            
            return Datatables::of($ControllingAuthority)
                    ->addIndexColumn()
                    ->addColumn('designation_id', function ($row){
                        return $row->designation->name;
                    })
                    ->addColumn('action', function ($row) {
                        $actionBtn = '<div style="display:flex">';
                        // if( Auth::user()->hasPermissionTo('controlling-authority-list') ) {
                        //     $actionBtn .= '<a href="'.route('controlling-authorities.show',$row->id).'"  title="View" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-eye"></i></a>';
                        // }
                        if( Auth::user()->hasPermissionTo('controlling-authority-edit') ) {
                            $actionBtn .= '<a href="'.route('controlling-authorities.edit',$row->id).'" title="Edit" class="btn btn-outline-primary btn-sm mr-1"><i class="fas fa-edit"></i></a>';
                        }
                        if( Auth::user()->hasPermissionTo('controlling-authority-delete') ) {
                            $actionBtn .= '<form method="POST" action="'.route('controlling-authorities.destroy', $row->id).'" onsubmit="return confirm_delete()">
                                <input type="hidden" name="_token" id="csrf-token" value="'.Session::token().'" />
                                <input type="hidden" name="_method" id="csrf-token" value="DELETE" />   
                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form></div>';
                        } 
                        return $actionBtn;
                      })
                    ->rawColumns(['designation_id','action'])
                    ->make(true);
        }
              
        return view('admin.controlling-authorities.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $designations = Designation::get();
        return view('admin.controlling-authorities.create',compact('designations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'responsive_person' => 'required',
            'designation_id' => 'required',
            'authority_name' => 'required',
            'phone_no' => 'required|unique:controlling_authorities,phone_no',
            'email' => 'required|unique:controlling_authorities,email',
        ]);

        $controllingAuthority = new ControllingAuthority();
        $controllingAuthority->responsive_person = $request->responsive_person;
        $controllingAuthority->designation_id = $request->designation_id;
        $controllingAuthority->authority_name = $request->authority_name;
        $controllingAuthority->phone_no = $request->phone_no;
        $controllingAuthority->email = $request->email;
 
        $controllingAuthority->save();
        return redirect('admin/controlling-authorities')->with('success','Controlling authority created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ControllingAuthority $controllingAuthority)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $controllingAuthority = ControllingAuthority::find($id);
        $designations = Designation::get();
        return view('admin.controlling-authorities.edit',compact('controllingAuthority','designations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'responsive_person' => 'required',
            'designation_id' => 'required',
            'authority_name' => 'required',
            'phone_no' => 'required|unique:controlling_authorities,phone_no,'.$id,
            'email' => 'required|unique:controlling_authorities,email,'.$id,
        ]);

        $controllingAuthority = ControllingAuthority::find($id);
        $controllingAuthority->responsive_person = $request->responsive_person;
        $controllingAuthority->designation_id = $request->designation_id;
        $controllingAuthority->authority_name = $request->authority_name;
        $controllingAuthority->phone_no = $request->phone_no;
        $controllingAuthority->email = $request->email;
        $controllingAuthority->update();

        return redirect('admin/controlling-authorities')->with('success','Controlling authority updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        ControllingAuthority::find($id)->delete();
        return redirect('admin/controlling-authorities')->with('success','Controlling authority deleted successfully.');
    }
}
