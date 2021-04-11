<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$id = 'PT-' . rand(1000, 9999);
        $all_patient = Patient::all();
        $all_appointment = Appointment::all();
        return view('counter.index', compact('all_patient', 'all_appointment'));
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
        //
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
        $data = Patient::find($id);
        $data->delete();
        return redirect()->route('counter.index')->with('success', 'Patient deleted successfull');
    }

    public function confirmAppointment($id)
    {
        $data = Appointment::find($id);
        $data->status = 'confirmed';
        $data->update();
        return redirect()->route('counter.index')->with('success', 'Doctor confirmation successfull');
    }

    public function cancelAppointment($id)
    {
        $data = Appointment::find($id);
        $data->status = 'canceled';
        $data->update();
        return redirect()->route('counter.index')->with('success', 'Doctor canceled successfull');
    }

    public function paidAppointment($id)
    {
        $data = Appointment::find($id);
        $data->paid = 'paid';
        $data->update();
        return redirect()->route('counter.index')->with('success', 'Payment successfull');
    }
}
