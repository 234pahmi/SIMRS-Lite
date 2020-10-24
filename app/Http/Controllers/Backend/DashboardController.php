<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $patients = Patient::count();
        $now = Carbon::today();
        $patient_today = Patient::where('date', $now)->count();
        // dd($patient_today);

        return view('backend.pages.dashboard', compact('patients','patient_today'));

    }
}
