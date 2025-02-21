<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Centre;
use App\Models\Season;
use App\Models\SeedTarget;
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

    
}
