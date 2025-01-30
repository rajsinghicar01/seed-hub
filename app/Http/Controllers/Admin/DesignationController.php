<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

class DesignationController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:designation-list|designation-create|designation-edit|designation-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:designation-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:designation-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:designation-delete', ['only' => ['destroy']]); 
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $designation = Designation::query();
            
            return Datatables::of($designation)
                    ->addIndexColumn()
                    ->addColumn('action', function ($designation) {
                        $actionBtn = '<div style="display:flex">';
                        if( Auth::user()->hasPermissionTo('designation-list') ) {
                            $actionBtn .= '<a href="'.route('designations.show',$designation->id).'"  title="View" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-eye"></i></a>';
                        }
                        if( Auth::user()->hasPermissionTo('designation-edit') ) {
                            $actionBtn .= '<a href="'.route('designations.edit',$designation->id).'" title="Edit" class="btn btn-outline-primary btn-sm mr-1"><i class="fas fa-edit"></i></a>';
                        }
                        if( Auth::user()->hasPermissionTo('designation-delete') ) {
                            $actionBtn .= '<form method="POST" action="'.route('designations.destroy', $designation->id).'" onsubmit="return confirm_delete()">
                                <input type="hidden" name="_token" id="csrf-token" value="'.Session::token().'" />
                                <input type="hidden" name="_method" id="csrf-token" value="DELETE" />   
                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form></div>';
                        } 
                        return $actionBtn;
                      })
                    ->rawColumns(['action'])
                    ->make(true);
        }
              
        return view('admin.designations.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.designations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|unique:designations,name',
        ]);
    
        Designation::create($request->all());
    
        return redirect('admin/designations')->with('success','Designation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $designation = Designation::find($id);
        return view('admin.designations.show',compact('designation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $designation = Designation::find($id);
        return view('admin.designations.edit',compact('designation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $designation = Designation::find($id);
        $designation->name = $request->name;
      
        $designation->update();
        return redirect('admin/designations')->with('success','Designation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Designation::find($id)->delete();
        return redirect('admin/designations')->with('success','Designation deleted successfully.');
    }
}
