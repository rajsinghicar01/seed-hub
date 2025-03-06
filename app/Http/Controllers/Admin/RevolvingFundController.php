<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RevolvingFund;
use App\Models\Centre;
use App\Models\Season;
use App\Models\RevolvingFundAllocation;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DataTables;
use Auth;
use Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use Illuminate\Validation\Rule;

class RevolvingFundController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:revolving-fund-list|revolving-fund-create|revolving-fund-edit|revolving-fund-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:revolving-fund-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:revolving-fund-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:revolving-fund-delete', ['only' => ['destroy']]); 
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            if (isAdmin()) {
                $RevolvingFund = RevolvingFund::with('centre','season')->get();
            } else {
                $RevolvingFund = RevolvingFund::with('centre','season')->where('centre_id', '=',  get_users_centre())->latest();
            }

            return Datatables::of($RevolvingFund)
                    ->addIndexColumn()
                    ->addColumn('centre_id', function ($RevolvingFund){
                        return $RevolvingFund->centre->centre_name;
                    })
                    ->addColumn('season_id', function ($RevolvingFund){
                        return $RevolvingFund->season->name;
                    })
                    ->addColumn('released_fund', function ($RevolvingFund){
                        return $RevolvingFund->released_fund;
                    })
                    ->addColumn('created_at', function ($RevolvingFund){
                        return $RevolvingFund->created_at->format('d M Y h:m A');
                    })
                    ->addColumn('action', function ($RevolvingFund) {
                        $actionBtn = '<div style="display:flex">';
                        if( Auth::user()->hasPermissionTo('revolving-fund-list') ) {
                            $actionBtn .= '<a href="'.route('revolving-funds.show',$RevolvingFund->id).'"  title="View" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-eye"></i></a>';
                        }
                        if( Auth::user()->hasPermissionTo('revolving-fund-edit') ) {
                            $actionBtn .= '<a href="'.route('revolving-funds.edit',$RevolvingFund->id).'" title="Edit" class="btn btn-outline-primary btn-sm mr-1"><i class="fas fa-edit"></i></a>';
                        }
                        if( Auth::user()->hasPermissionTo('revolving-fund-delete') ) {
                            $actionBtn .= '<form method="POST" action="'.route('revolving-funds.destroy', $RevolvingFund->id).'" onsubmit="return confirm_delete()">
                                <input type="hidden" name="_token" id="csrf-token" value="'.Session::token().'" />
                                <input type="hidden" name="_method" id="csrf-token" value="DELETE" />   
                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form></div>';
                        } 
                        return $actionBtn;
                    })
                    ->rawColumns(['centre_id','season_id','released_fund','created_at','action'])
                    ->make(true);
        }  
        return view('admin.revolving-funds.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $centres = Centre::get();
        $seasons = Season::get();
    
        return view('admin.revolving-funds.create',compact('centres','seasons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "centre_id" => "required", 
            "season_id" => "required",
            "centre_id" => [
                "required",
                Rule::unique('revolving_funds')->where(function ($query) use ($request) {
                    return $query->where('season_id', $request->season_id);
                }),
            ],
            "released_fund" => "required|numeric",
            "infrastructure_fund" => "required|numeric",
            "utilized_infrastructure_fund" => "required|numeric",
            "available_infrastructure_fund" => "required|numeric"
        ]);

        $allocated_fund = RevolvingFundAllocation::where('centre_id',$request->centre_id)->first()->total_fund_allocation;
        $released_fund_sum = RevolvingFund::where('centre_id',$request->centre_id)->sum('released_fund');
        $total_released_fund = $released_fund_sum + $request->released_fund;

        if($allocated_fund >= $total_released_fund){

            $revolving_fund = RevolvingFund::create([
                "centre_id" => $request->centre_id, 
                "season_id" => $request->season_id, 
                "released_fund" => $request->released_fund,
                "infrastructure_fund" => $request->infrastructure_fund,
                "utilized_infrastructure_fund" => $request->utilized_infrastructure_fund,
                "available_infrastructure_fund" => $request->available_infrastructure_fund
            ]);
    
            return redirect('admin/revolving-funds')->with('success','Revolving fund created successfully.');
        }else{
            return redirect('admin/revolving-funds')->with('error','You have exhausted the fund limit for this centre.');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $revolving_fund = RevolvingFund::with('centre','season')->find($id);
        return view('admin.revolving-funds.show',compact('revolving_fund'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $centres = Centre::get();
        $seasons = Season::get();
        $revolving_fund = RevolvingFund::find($id);
        return view('admin.revolving-funds.edit',compact('revolving_fund','centres','seasons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "centre_id" => "required", 
            "season_id" => "required",
            "centre_id" => [
                "required",
                Rule::unique('revolving_funds')->where(function ($query) use ($request) {
                    return $query->where('season_id', $request->season_id);
                })->ignore($id),
            ],
            "released_fund" => "required",
            "earning_by_seed_sale_etc" => "required",
            "interest_on_released_fund" => "required",
            "total_earning_available" => "required",
            "opening_balance" => "required",
            "infrastructure_fund" => "required",
            "utilized_infrastructure_fund" => "required"
        ]);

        $revolving_fund = RevolvingFund::find($id);
        $revolving_fund->centre_id = $request->centre_id; 
        $revolving_fund->season_id = $request->season_id; 
        $revolving_fund->released_fund = $request->released_fund;
        $revolving_fund->earning_by_seed_sale_etc = $request->earning_by_seed_sale_etc;
        $revolving_fund->interest_on_released_fund = $request->interest_on_released_fund;
        $revolving_fund->total_earning_available = $request->total_earning_available;
        $revolving_fund->opening_balance = $request->opening_balance;
        $revolving_fund->infrastructure_fund = $request->infrastructure_fund;
        $revolving_fund->utilized_infrastructure_fund = $request->utilized_infrastructure_fund;
      
        $allocated_fund = RevolvingFundAllocation::where('centre_id',$request->centre_id)->first()->total_fund_allocation;
        $released_fund_sum = RevolvingFund::where('centre_id',$request->centre_id)->sum('released_fund');
        $total_released_fund = $released_fund_sum + $request->released_fund;

        if($allocated_fund >= $total_released_fund){
            $revolving_fund->update();
            return redirect('admin/revolving-funds')->with('success','Revolving fund updated successfully.');
        }else{
            return redirect('admin/revolving-funds')->with('error','You have exhausted the fund limit for this centre.');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        RevolvingFund::find($id)->delete();
        return redirect('admin/revolving-funds')->with('success','Revolving fund deleted successfully.');
    }
}
