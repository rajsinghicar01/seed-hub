<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DataTables;
use Auth;
use Session;
use Illuminate\Support\Facades\File;

class ActivityLogController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:activity-log-list|activity-log-create|activity-log-edit|activity-log-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:activity-log-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:activity-log-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:activity-log-delete', ['only' => ['destroy']]); 
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $activities = Activity::latest();
            
            return Datatables::of($activities)
                    ->addIndexColumn()
                    ->addColumn('subject_id', function ($row) {
                        return get_user_by_id($row->subject_id)->name;
                    })
                    ->addColumn('causer_id', function ($row) {
                        return $row->causer?->name ?? 'System';
                    })
                    ->addColumn('properties', function ($row) {
                        return chunk_split($row->properties, 50);
                    })
                    ->addColumn('created_at', function ($row) {
                        return $row->created_at->format('d M Y H:t:s A');
                    })
                    
                    ->rawColumns(['subject_id','causer_id','properties','created_at'])
                    ->make(true);
        }
              
        return view('admin.activity-logs.activity_logs');

    }


}