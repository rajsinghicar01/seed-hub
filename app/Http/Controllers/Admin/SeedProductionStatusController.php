<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SeedProductionStatus;
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
use Validator;


class SeedProductionStatusController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:seed-production-status-list|seed-production-status-create|seed-production-status-edit|seed-production-status-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:seed-production-status-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:seed-production-status-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:seed-production-status-delete', ['only' => ['destroy']]); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'Index';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $seed_production_status = SeedProductionStatus::get();
        $seed_targets = SeedTarget::get();
    
        return view('admin.seed-production-statuses.create',compact('seed_production_status','seed_targets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
 
        $rules = array(
            'quantity_produced' => 'required',
            'seed_available_for_sale' => 'required', 
            'seed_price' => 'required', 
            'reserved_seed' => 'required', 
            'seed_target_item_id' => 'numeric|unique:seed_production_statuses,seed_target_item_id'
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return response()->json([
                'status' => 400,
                'message' => $validator->errors(),
                'data' => NULL
            ],400);
        }

        $status = SeedProductionStatus::create([
            'quantity_produced' => $request->quantity_produced,
            'seed_available_for_sale' => $request->seed_available_for_sale,
            'seed_price' => $request->seed_price,
            'reserved_seed' => $request->reserved_seed,
            'seed_target_item_id' => $request->seed_target_item_id
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Seed production status created successfully!',
            'data' => $status
        ],200);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(SeedProductionStatus $seedProductionStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SeedProductionStatus $seedProductionStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function status_update(Request $request)
    {
        $rules = array(
            'quantity_produced_edit' => 'required',
            'seed_available_for_sale_edit' => 'required', 
            'seed_price_edit' => 'required', 
            'reserved_seed_edit' => 'required', 
            'seed_target_item_id_edit' => 'numeric|required',
            'seed_target_item_status_id_edit' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return response()->json([
                'status' => 400,
                'message' => $validator->errors(),
                'data' => NULL
            ],400);
        }

        $status = SeedProductionStatus::find($request->seed_target_item_status_id_edit);
        $status->quantity_produced = $request->quantity_produced_edit;
        $status->seed_available_for_sale = $request->seed_available_for_sale_edit;
        $status->seed_price = $request->seed_price_edit;
        $status->reserved_seed = $request->reserved_seed_edit;
        $status->update();

        return response()->json([
            'status' => 200,
            'message' => 'Seed production status updated successfully!',
            'data' => $status
        ],200);     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SeedProductionStatus $seedProductionStatus)
    {
        //
    }

    public function get_seed_production_statuses(Request $request){
        $status = SeedProductionStatus::where('id','=',$request->status_id)->get();
        return response()->json([
            'status' => 200,
            'message' => 'Seed production status fetched successfully!',
            'data' => $status
        ],200);
    }
}