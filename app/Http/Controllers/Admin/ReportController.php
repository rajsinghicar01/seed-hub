<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Centre;
use App\Models\Season;
use App\Models\SeedTarget;
use App\Models\RevolvingFundAllocation;
use App\Models\RevolvingFund;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DataTables;
use Auth;
use Session;

class ReportController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:report-list|report-create|report-edit|report-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:report-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:report-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:report-delete', ['only' => ['destroy']]); 
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $centres = Centre::get();
        $seasons = Season::get();

        $seed_targets = SeedTarget::with('centre','season','crop','items')->get();

        if ($request->centre_id) {
            $seed_targets = $seed_targets->where('centre_id', $request->centre_id);
        }
        if ($request->season_id) {
            $seed_targets = $seed_targets->where('season_id', $request->season_id);
        }

        return view('admin.reports.seed-targets', compact('centres','seasons','seed_targets'));
    }

    public function revolving_fund_reports(Request $request){

        $centres = Centre::get();
        $seasons = Season::get();

        // $allocations = RevolvingFundAllocation::all();
        // $funds = RevolvingFund::all();

        // $allocationWisefunds = [];

        // foreach ($allocations as $allocation) {

        //     $allocationWisefunds['allocations'][] = [
        //         'centre' =>  $allocation->centre->centre_name,
        //         'season' => $allocation->season->name,
        //         'allocate_fund'=> $allocation->total_fund_allocation
        //     ];

        //     foreach ($funds as $fund) {
        //         if ($fund->centre_id == $allocation->centre_id) {
        //             $allocationWisefunds['allocations']['funds'] = $fund;
        //         }
        //     }
        // }

        // return $allocationWisefunds;


        $makes = DB::table('centres')
        ->select(
                'centres.*',
                'allocations.*',
                'funds.*'
            )
        ->leftJoin('revolving_fund_allocations as allocations', 'allocations.centre_id', '=', 'centres.id')
        ->leftJoin('revolving_funds as funds', 'funds.centre_id', '=', 'centres.id')
        ->get();

        // return $makes;

        return view('admin.reports.revolving-fund-reports', compact('centres','seasons'));
    }

    
}
