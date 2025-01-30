<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Crop;
use Spatie\Permission\Models\Permission;
use DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DataTables;
use Auth;
use Session;

class CropController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:crop-list|crop-create|crop-edit|crop-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:crop-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:crop-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:crop-delete', ['only' => ['destroy']]); 
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $crops = Crop::query();
            
            return Datatables::of($crops)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $actionBtn = '<div style="display:flex">';
                        if( Auth::user()->hasPermissionTo('crop-list') ) {
                            $actionBtn .= '<a href="'.route('crops.show',$row->id).'"  title="View" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-eye"></i></a>';
                        }
                        if( Auth::user()->hasPermissionTo('crop-edit') ) {
                            $actionBtn .= '<a href="'.route('crops.edit',$row->id).'" title="Edit" class="btn btn-outline-primary btn-sm mr-1"><i class="fas fa-edit"></i></a>';
                        }
                        if( Auth::user()->hasPermissionTo('crop-delete') ) {
                            $actionBtn .= '<form method="POST" action="'.route('crops.destroy', $row->id).'" onsubmit="return confirm_delete()">
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
              
        return view('admin.crops.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.crops.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
        ]);
    
        Crop::create($request->all());
    
        return redirect('admin/crops')->with('success','Crop created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $crop = Crop::find($id);
        return view('admin.crops.show',compact('crop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $crop = Crop::find($id);
        return view('admin.crops.edit',compact('crop'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:crops,name,'.$id,
        ]);

        $input = $request->all();

        $crop = Crop::find($id);
        $crop->update($input);

        return redirect('admin/crops')->with('success', 'Crop updated successfully.');
    }

    public function destroy($id)
    {
        Crop::find($id)->delete();
        return redirect('admin/crops')->with('success','Crop deleted successfully.');
    }
}