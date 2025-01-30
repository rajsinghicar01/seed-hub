<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Facades\File;
use DataTables;
use Auth;
use Session;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:permission-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]); 
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $permissions = Permission::query();
            
            return Datatables::of($permissions)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $actionBtn = '<div style="display:flex">';
                        // if( Auth::user()->hasPermissionTo('permission-list') ) {
                        //     $actionBtn .= '<a href="'.route('permissions.show',$row->id).'"  title="View" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-eye"></i></a>';
                        // }
                        if( Auth::user()->hasPermissionTo('permission-edit') ) {
                            $actionBtn .= '<a href="'.route('permissions.edit',$row->id).'" title="Edit" class="btn btn-outline-primary btn-sm mr-1"><i class="fas fa-edit"></i></a>';
                        }
                        if( Auth::user()->hasPermissionTo('permission-delete') ) {
                            $actionBtn .= '<form method="POST" action="'.route('permissions.destroy', $row->id).'" onsubmit="return confirm_delete()">
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
              
        return view('admin.permissions.index');

    }
 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get All Models
        $path = app_path('Models') . '/*.php';
        $models = collect(glob($path))->map(fn ($file) => basename($file, '.php'))->toArray();
        return view('admin.permissions.create',compact('models'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|unique:permissions,name',
            'guard_name' => 'required'
        ]);
        Permission::create($request->all());
        return redirect('admin/permissions')->with('success', 'Permission created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('admin.permissions.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name,'.$id,
            'guard_name' => 'required'
        ]);

        $input = $request->all();

        $permission = Permission::find($id);
        $permission->update($input);

        return redirect('admin/permissions')->with('success', 'Permission updated successfully.');
    }

    public function destroy($id)
    {
        Permission::find($id)->delete();
        return redirect('admin/permissions')->with('success','Permission deleted successfully.');
    }
}