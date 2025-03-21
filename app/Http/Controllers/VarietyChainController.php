<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Variety;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DataTables;
use Auth;
use Session;

class VarietyChainController extends Controller
{
    public function index(Request $request){
        
        if ($request->ajax()) {

            $variety = Variety::with('user')->get();
            
            return Datatables::of($variety)
                    ->addIndexColumn()
                    ->addColumn('crop_name', function ($variety) {
                        return $variety->crop->name;    
                    })
                    // ->addColumn('created_by', function ($variety) {
                    //     return $variety->user->name;    
                    // })
                    ->rawColumns(['crop_name'])
                    ->make(true);
        }
              
        return view('pages.varieties-in-seed-chain');
    }
}
