<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_doctors = Doctor::all();
        $all_department = Department::all();
        return view('doctor.index', compact('all_doctors', 'all_department'));
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
        //Apointment
        if ($request->app_code) {
            $add_num = count($request->app_code);
        }

        $appoint_day = [];
        for ($i = 0; $i < $add_num; $i++) {
            $app_day_arr = [
                'app_code'       => $request->app_code[$i],
                'app_day'        => $request->app_day[$i],
                'app_start_time' => $request->app_start_time[$i],
                'app_end_time'   => $request->app_end_time[$i],
            ];
            array_push($appoint_day, $app_day_arr);
        }
        $appointment = json_encode($appoint_day);

        $this->validate($request, [
            'emp_id'     => 'required | unique:doctors',
            'name'       => 'required',
            'email'      => 'required | unique:doctors',
        ]);

        //Image
        if ($request->hasFile('photo')) {
            $doct_img = $request->file('photo');
            $dr_photo_uname = md5(time() . rand()) . '.' . $doct_img->getClientOriginalExtension();
            $doct_img->move(public_path('media/images/doctors'), $dr_photo_uname);
        } else {
            $dr_photo_uname = '';
        }

        Doctor::create([
            'emp_id'            => $request->emp_id,
            'name'              => $request->name,
            'nick_name'         => $request->nick_name,
            'cell'              => $request->cell,
            'email'             => $request->email,
            'age'               => $request->age,
            'about'             => $request->about,
            'education'         => $request->education,
            'work_experience'   => $request->work_experience,
            'social_media'      => $request->social_media,
            'department'        => $request->department,
            'degree'            => $request->degree,
            'appointment'       => $appointment,
            'fee'               => $request->fee,
            'address'           => $request->address,
            'photo'             => $dr_photo_uname,
        ]);

        return redirect()->route('doctor.index')->with('success', 'Doctor added successfull');
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
        $data = Doctor::find($id);
        $data->delete();
        if (!empty($data->photo)) {
            unlink('media/images/doctors/' . $data->photo);
        }
        return redirect()->route('doctor.index')->with('success', 'Data deleted successfull');
    }

    public function unpublishedDoctor($id)
    {
        $data = Doctor::find($id);
        $data->status = 'Unpublished';
        $data->update();
        return redirect()->route('doctor.index')->with('success', 'Unpublished successfull');
    }
    public function publishedDoctor($id)
    {
        $data = Doctor::find($id);
        $data->status = 'Published';
        $data->update();
        return redirect()->route('doctor.index')->with('success', 'Published successfull');
    }
}
