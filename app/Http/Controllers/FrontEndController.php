<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function homePage()
    {
        $all_doctors = Doctor::all();
        return view('frontend.home', [
            'all_doctors' => $all_doctors,
        ]);
    }

    // public function appointment($id)
    // {
    //     echo  $data = Doctor::find($id);
    //     // $ccc = [];
    //     // foreach (json_decode($data->appointment) as $dd) {
    //     //     $ccc .= 'ok ok';
    //     // }

    //     // return $ccc;

    //     // return [
    //     //     'doctor_id' => $data->id,
    //     //     'doctor_name' => $data->name,
    //     //     'doctor_depart' => $data->department,
    //     //     'doctor_fee' => $data->fee,
    //     // ];
    // }
}
