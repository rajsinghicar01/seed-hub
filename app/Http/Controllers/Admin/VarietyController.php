<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Variety;
use App\Models\Crop;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DataTables;
use Auth;
use Session;

class VarietyController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:variety-list|variety-create|variety-edit|variety-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:variety-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:variety-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:variety-delete', ['only' => ['destroy']]); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            if (isAdmin()) {
                $variety = Variety::query();
            } else {
                $variety = Variety::where('user_id', '=', Auth::user()->id)->get();
            }
            
            return Datatables::of($variety)
                    ->addIndexColumn()
                    ->addColumn('crop_name', function ($variety) {
                        return $variety->crop->name;    
                    })
                    ->addColumn('created_by', function ($variety) {
                        return $variety->user->name;    
                    })
                    ->addColumn('action', function ($variety) {
                        $actionBtn = '<div style="display:flex">';
                        if( Auth::user()->hasPermissionTo('variety-list') ) {
                            $actionBtn .= '<a href="'.route('varieties.show',$variety->id).'"  title="View" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-eye"></i></a>';
                        }
                        if( Auth::user()->hasPermissionTo('variety-edit') ) {
                            $actionBtn .= '<a href="'.route('varieties.edit',$variety->id).'" title="Edit" class="btn btn-outline-primary btn-sm mr-1"><i class="fas fa-edit"></i></a>';
                        }
                        if( Auth::user()->hasPermissionTo('variety-delete') ) {
                            $actionBtn .= '<form method="POST" action="'.route('varieties.destroy', $variety->id).'" onsubmit="return confirm_delete()">
                                <input type="hidden" name="_token" id="csrf-token" value="'.Session::token().'" />
                                <input type="hidden" name="_method" id="csrf-token" value="DELETE" />   
                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form></div>';
                        } 
                        return $actionBtn;
                      })
                    ->rawColumns(['crop_name', 'created_by', 'action'])
                    ->make(true);
        }
              
        return view('admin.varieties.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $crops = Crop::all();
        return view('admin.varieties.create', compact('crops'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'variety_name' => 'required',
            'year_of_notification' => 'required',
            'average_yield' => 'required',
            'oil_content' => 'required',
            'day_of_maturity' => 'required',
            'release' => 'required',
            'crop_name' => 'required'
        ]);

        $variety = new Variety();
        $variety->variety_name = $request->variety_name;
        $variety->year_of_notification = $request->year_of_notification;
        $variety->average_yield = $request->average_yield;
        $variety->oil_content = $request->oil_content;
        $variety->day_of_maturity = $request->day_of_maturity;
        $variety->release = $request->release;
        $variety->crop_id = $request->crop_name;
        $variety->user_id = Auth::user()->id;
      
        $variety->save();
    
        return redirect('admin/varieties')->with('success','Variety created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $variety = Variety::find($id);
        return view('admin.varieties.show',compact('variety'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $variety = Variety::find($id);
        $crops = Crop::all();
        return view('admin.varieties.edit',compact('variety','crops'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'variety_name' => 'required',
            'year_of_notification' => 'required',
            'average_yield' => 'required',
            'oil_content' => 'required',
            'day_of_maturity' => 'required',
            'release' => 'required',
            'crop_name' => 'required'
        ]);

        $variety = Variety::find($id);
        $variety->variety_name = $request->variety_name;
        $variety->year_of_notification = $request->year_of_notification;
        $variety->average_yield = $request->average_yield;
        $variety->oil_content = $request->oil_content;
        $variety->day_of_maturity = $request->day_of_maturity;
        $variety->release = $request->release;
        $variety->crop_id = $request->crop_name;
      
        $variety->update();
        return redirect('admin/varieties')->with('success','Variety updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Variety::find($id)->delete();
        return redirect('admin/varieties')->with('success','Variety deleted successfully.');
    }
}