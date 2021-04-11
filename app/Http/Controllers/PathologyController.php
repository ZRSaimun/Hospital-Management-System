<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PathologyController extends Controller
{
    public function pathologyIndex()
    {
        //$appoint_all = Appointment::find('checked');

        $appoint_all = DB::table('appointments')->where('status', 'checked')->get();

        return view('pathology.index', compact('appoint_all'));
    }

    public function pathologyTest()
    {
        $test_all = Test::all();
        return view('pathology.create', compact('test_all'));
    }



    public function addTestShow()
    {
        return view('pathology.add-test');
    }
}
