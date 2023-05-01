<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ActivityLogController extends Controller
{
    public function index()
    {
        $activityLog = Activity::latest()->get();

        return view('logs.index', compact('activityLog'));
    }
}
