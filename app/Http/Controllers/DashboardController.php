<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboardIndex()
    {
        return view('dashboard.all-dashboard');
    }

    public function patientIndex()
    {
        //$pt_all = DB::table('appointments')->where('paid', 'paid')->get();
        $pt_all = Appointment::latest()->get();
        return view('dashboard.patient-dashboard', compact('pt_all'));
    }
}
