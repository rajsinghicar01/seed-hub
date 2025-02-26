<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index(){

        $data = array();

        $users = DB::table('users')->where('status',1)->count();
        $roles = DB::table('roles')->count();
        $permissions = DB::table('permissions')->count();
        $designations = DB::table('designations')->count();
        $crops = DB::table('crops')->count();
        $varieties = DB::table('varieties')->count();
        $categories = DB::table('categories')->count();
        $seasons = DB::table('seasons')->count();
        $states = DB::table('states')->count();
        $zones = DB::table('zones')->count();
        $controlling_authorities = DB::table('controlling_authorities')->count();
        $centres = DB::table('centres')->count();
        $seed_targets = DB::table('seed_targets')->count();
        
        return view('admin.dashboard.index', compact('users','roles','permissions','designations','crops','varieties','categories','seasons','states','zones','controlling_authorities','centres','seed_targets'));
    }
}
