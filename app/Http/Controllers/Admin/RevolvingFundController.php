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
                            //$actionBtn .= '<a href="'.route('revolving-funds.show',$RevolvingFund->id).'"  title="View" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-eye"></i></a>';
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
            "description" => 'required',
            "infrastructure_fund" => "required|numeric",

            // "utilized_infrastructure_fund" => "numeric",
            // "available_infrastructure_fund" => "numeric",
            // "training_organized" => "numeric",
            // "field_day" => "numeric",
            // "seed_procurement" => "numeric",
            // "seed_quantity" => "numeric",
            // "procurement_rate" => "numeric",
            // "farm_operations" => "numeric",
            // "other_activities" => "numeric",
            // "total_expenditures" => "numeric",
            // "seed_sold" => "numeric",
            // "seed_sold_rate" => "numeric",
            // "amount_receipt" => "numeric",
            // "interest_on_released_fund" => "numeric",
            // "total_incomes" => "numeric",
            // "opening_balance" => "numeric"
        ]);

        $allocated_fund = RevolvingFundAllocation::where('centre_id',$request->centre_id)->first()->total_fund_allocation;
        $released_fund_sum = RevolvingFund::where('centre_id',$request->centre_id)->sum('released_fund');
        $total_released_fund = $released_fund_sum + $request->released_fund;

        if($allocated_fund >= $total_released_fund){

            $revolving_fund = RevolvingFund::create([
                "centre_id" => $request->centre_id, 
                "season_id" => $request->season_id, 
                "released_fund" => $request->released_fund,
                "description" => $request->description,
                "infrastructure_fund" => $request->infrastructure_fund,
                "utilized_infrastructure_fund" => $request->utilized_infrastructure_fund,
                "available_infrastructure_fund" => $request->available_infrastructure_fund,
                "training_organized" => $request->training_organized,
                "field_day" => $request->field_day,
                "seed_procurement" => $request->seed_procurement,
                "seed_quantity" => $request->seed_quantity,
                "procurement_rate" => $request->procurement_rate,
                "procurement_amount" => $request->procurement_amount,
                "farm_operations" => $request->farm_operations,
                "other_activities" => $request->other_activities,
                "total_expenditures" => $request->total_expenditures,
                "seed_sold" => $request->seed_sold,
                "seed_sold_rate" => $request->seed_sold_rate,
                "amount_receipt" => $request->amount_receipt,
                "interest_on_released_fund" => $request->interest_on_released_fund,
                "total_incomes" => $request->total_incomes,
                "opening_balance" => $request->opening_balance,
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
            "released_fund" => "required|numeric",
            "description" => 'required',
            "infrastructure_fund" => "required|numeric",
            "utilized_infrastructure_fund" => "numeric",
            "available_infrastructure_fund" => "numeric",
            "training_organized" => "numeric",
            "field_day" => "numeric",
            "seed_procurement" => "numeric",
            "seed_quantity" => "numeric",
            "procurement_rate" => "numeric",
            "farm_operations" => "numeric",
            "other_activities" => "numeric",
            "total_expenditures" => "numeric",
            "seed_sold" => "numeric",
            "seed_sold_rate" => "numeric",
            "amount_receipt" => "numeric",
            "interest_on_released_fund" => "numeric",
            "total_incomes" => "numeric",
            "opening_balance" => "numeric"
        ]);

        $revolving_fund = RevolvingFund::find($id);
        $revolving_fund->centre_id = $request->centre_id; 
        $revolving_fund->season_id = $request->season_id; 
        $revolving_fund->released_fund = $request->released_fund;
        $revolving_fund->description = $request->description;
        $revolving_fund->infrastructure_fund = $request->infrastructure_fund;
        $revolving_fund->utilized_infrastructure_fund = $request->utilized_infrastructure_fund;
        $revolving_fund->available_infrastructure_fund = $request->available_infrastructure_fund;
        $revolving_fund->training_organized = $request->training_organized;
        $revolving_fund->field_day = $request->field_day;
        $revolving_fund->seed_procurement = $request->seed_procurement;
        $revolving_fund->seed_quantity = $request->seed_quantity;
        $revolving_fund->procurement_rate = $request->procurement_rate;
        $revolving_fund->procurement_amount = $request->procurement_amount;
        $revolving_fund->farm_operations = $request->farm_operations;
        $revolving_fund->other_activities = $request->other_activities;
        $revolving_fund->total_expenditures = $request->total_expenditures;
        $revolving_fund->seed_sold = $request->seed_sold;
        $revolving_fund->seed_sold_rate = $request->seed_sold_rate;
        $revolving_fund->amount_receipt = $request->amount_receipt;
        $revolving_fund->interest_on_released_fund = $request->interest_on_released_fund;
        $revolving_fund->total_incomes = $request->total_incomes;

        // $revolving_fund->opening_balance = $request->opening_balance;

        $revolving_fund->opening_balance  = ($request->released_fund - ($request->available_infrastructure_fund + $request->total_incomes) - $request->total_expenditures);

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