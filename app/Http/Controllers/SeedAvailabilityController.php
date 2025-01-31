<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SeedAvailability;
use App\Models\Zone;
use App\Models\State;
use App\Models\Centre;
use App\Models\Crop;
use App\Models\Variety;
use App\Models\Category;
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

class SeedAvailabilityController extends Controller
{
    public function index(){
        $seed_targets = SeedTarget::get();
        // return $seed_targets->centre;
        $zones = Zone::get();
        $states = State::get();
        $centres = Centre::get();
        $crops = Crop::get();
        $varieties = Variety::get();
        $categories = Category::get();
        return view('pages.seed-availability',compact('seed_targets','zones','states','centres','crops','varieties','categories'));
    }
}
