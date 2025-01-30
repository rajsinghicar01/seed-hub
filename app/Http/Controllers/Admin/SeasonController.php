<?php

namespace App\Http\Controllers\Admin;

use App\Models\Season;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DataTables;
use Auth;
use Session;

class SeasonController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:season-list|season-create|season-edit|season-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:season-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:season-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:season-delete', ['only' => ['destroy']]); 
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $season = Season::query();
            
            return Datatables::of($season)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $actionBtn = '<div style="display:flex">';
                        if( Auth::user()->hasPermissionTo('season-list') ) {
                            $actionBtn .= '<a href="'.route('seasons.show',$row->id).'"  title="View" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-eye"></i></a>';
                        }
                        if( Auth::user()->hasPermissionTo('season-edit') ) {
                            $actionBtn .= '<a href="'.route('seasons.edit',$row->id).'" title="Edit" class="btn btn-outline-primary btn-sm mr-1"><i class="fas fa-edit"></i></a>';
                        }
                        if( Auth::user()->hasPermissionTo('season-delete') ) {
                            $actionBtn .= '<form method="POST" action="'.route('seasons.destroy', $row->id).'" onsubmit="return confirm_delete()">
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
              
        return view('admin.seasons.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.seasons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|unique:seasons,name',
        ]);
    
        Season::create($request->all());
    
        return redirect('admin/seasons')->with('success','Cropping season created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $season = Season::find($id);
        return view('admin.seasons.show',compact('season'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $season = Season::find($id);
        return view('admin.seasons.edit',compact('season'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:crops,name,'.$id,
        ]);

        $input = $request->all();

        $season = Season::find($id);
        $season->update($input);

        return redirect('admin/seasons')->with('success', 'Cropping season updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Season::find($id)->delete();
        return redirect('admin/seasons')->with('success','Cropping season deleted successfully.');
    }
}
