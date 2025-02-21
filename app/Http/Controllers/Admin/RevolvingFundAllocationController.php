<?php

namespace App\Http\Controllers\Admin;

use App\Models\RevolvingFundAllocation;
use App\Models\Centre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DataTables;
use Auth;
use Session;

class RevolvingFundAllocationController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:revolving-fund-allocation-list|revolving-fund-allocation-create|revolving-fund-allocation-edit|revolving-fund-allocation-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:revolving-fund-allocation-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:revolving-fund-allocation-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:revolving-fund-allocation-delete', ['only' => ['destroy']]); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $funds = RevolvingFundAllocation::query();
            
            return Datatables::of($funds)
                    ->addIndexColumn()
                    ->addColumn('centre_id', function ($row){
                        return $row->centre->centre_name;
                    })
                    ->addColumn('action', function ($row) {
                        $actionBtn = '<div style="display:flex">';
                        if( Auth::user()->hasPermissionTo('revolving-fund-allocation-edit') ) {
                            $actionBtn .= '<a href="'.route('revolving-fund-allocations.edit',$row->id).'" title="Edit" class="btn btn-outline-primary btn-sm mr-1"><i class="fas fa-edit"></i></a>';
                        }
                        if( Auth::user()->hasPermissionTo('revolving-fund-allocation-delete') ) {
                            $actionBtn .= '<form method="POST" action="'.route('revolving-fund-allocations.destroy', $row->id).'" onsubmit="return confirm_delete()">
                                <input type="hidden" name="_token" id="csrf-token" value="'.Session::token().'" />
                                <input type="hidden" name="_method" id="csrf-token" value="DELETE" />   
                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form></div>';
                        } 
                        return $actionBtn;
                      })
                    ->rawColumns(['centre_id','action'])
                    ->make(true);
        }
              
        return view('admin.revolving-fund-allocations.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $centres = Centre::get();
        return view('admin.revolving-fund-allocations.create', compact('centres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'centre_id' => 'required|unique:revolving_fund_allocations,centre_id',
            'total_fund_allocation' => 'required|numeric'
        ]);
    
        RevolvingFundAllocation::create($request->all());
    
        return redirect('admin/revolving-fund-allocations')->with('success','Revolving fund allocated successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(RevolvingFundAllocation $revolvingFundAllocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $fund = RevolvingFundAllocation::find($id);
        $centres = Centre::all();
        return view('admin.revolving-fund-allocations.edit',compact('fund','centres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'centre_id' => 'required|unique:revolving_fund_allocations,centre_id,'.$id,
            'total_fund_allocation' => 'required|numeric'
        ]);
    
        $fund = RevolvingFundAllocation::find($id);
        $fund->update($request->all());
    
        return redirect()->route('revolving-fund-allocations.index')->with('success','Revolving fund updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        RevolvingFundAllocation::find($id)->delete();
        return redirect()->route('revolving-fund-allocations.index')->with('success','Revolving fund deleted successfully');
    }
}
