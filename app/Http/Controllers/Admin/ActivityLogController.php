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

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $activities = Activity::latest();
            
            return Datatables::of($activities)
                    ->addColumn('subject_id', function ($row) {
                        return get_user_by_id($row->subject_id)->name;
                    })
                    ->addColumn('causer_id', function ($row) {
                        return $row->causer?->name ?? 'System';
                    })
                    ->addColumn('properties', function ($row) {
                        return $row->properties;
                    })
                    ->addColumn('created_at', function ($row) {
                        return $row->created_at->format('d M Y H:t:s A');
                    })
                    ->addIndexColumn()
                    ->rawColumns(['subject_id','causer_id','properties','created_at'])
                    ->make(true);
        }
              
        return view('admin.activity-logs.activity_logs');

    }


}