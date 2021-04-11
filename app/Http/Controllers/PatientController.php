<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = Doctor::find($id);
        return view('patient.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'              => 'required',
            'cell'              => 'required',
            'age'               => 'required',
            'patient_app_date'  => 'required',
            'patient_app_time'  => 'required',
        ]);

        $cell = $request->cell;
        $cell_find = DB::table('patients')->where('cell', $cell)->get();
        $cell_num = count($cell_find);

        $email = $request->email;
        $email_find = DB::table('patients')->where('email', $email)->get();
        $email_num = count($email_find);


        $c_find = DB::table('patients')->where('cell', $cell)->first();

        if (!$cell_num == '1' && !$email_num == '1') {
            $emp_id = 'PT-' . rand(1000, 9999);

            Patient::create([
                'emp_id'            => $emp_id,
                'name'              => $request->name,
                'cell'              => $request->cell,
                'email'             => $request->email,
                'age'               => $request->age,
                'address'           => $request->address,
            ]);

            Appointment::create([
                'appointment_id'    => 'AP-' . rand(1000, 9999),
                'patient_id'        => $emp_id,
                'patient_cell'      => $request->cell,
                'doctor_id'         => $request->doct_id,
                'doctor_name'       => $request->doct_name,
                'doctor_dept'       => $request->doct_dept,
                'doctor_fee'        => $request->doctor_fee,
                'appointment_date'  => $request->patient_app_date,
                'appointment_time'  => $request->patient_app_time,
            ]);

            User::create([
                'emp_id'       => $emp_id,
                'name'         => $request->name,
                'cell'         => $request->cell,
                'age'          => $request->age,
                'email'        => $request->email,
                'password'     => Hash::make($request->password),
            ]);
        } else {
            Appointment::create([
                'appointment_id'    => 'AP-' . rand(1000, 9999),
                'patient_id'        => $c_find->emp_id,
                'patient_cell'      => $request->cell,
                'doctor_id'         => $request->doct_id,
                'doctor_name'       => $request->doct_name,
                'doctor_dept'       => $request->doct_dept,
                'doctor_fee'        => $request->doctor_fee,
                'appointment_date'  => $request->patient_app_date,
                'appointment_time'  => $request->patient_app_time,
            ]);
        }
        return redirect()->back()->with('success', 'Appointment successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
