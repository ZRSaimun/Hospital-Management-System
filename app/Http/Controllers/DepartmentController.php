<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_data = Department::all();
        return view('specialities.index', compact('all_data'));
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
            'department_id'    => 'required | unique:departments',
            'name'          => 'required | unique:departments',
        ]);

        if ($request->hasFile('photo')) {
            $img = $request->file('photo');
            $photo_uname = md5(time() . rand()) . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('media/images/department'), $photo_uname);
        } else {
            $photo_uname = '';
        }

        Department::create([
            'department_id' => $request->department_id,
            'name'          => $request->name,
            'photo'         => $photo_uname,
        ]);

        return redirect()->route('department.index')->with('success', 'Department added successfull');
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
        $data = Department::find($id);
        return [
            'id'         => $data->id,
            'department_id' => $data->department_id,
            'name'       => $data->name,
            'photo'      => $data->photo,
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $edit_data = Department::find($request->id);

        if ($request->hasFile('new_photo')) {
            $edit_img = $request->file('new_photo');
            $edit_photo_uname = md5(time() . rand()) . '.' . $edit_img->getClientOriginalExtension();
            $edit_img->move(public_path('media/images/department'), $edit_photo_uname);
            unlink('media/images/department/' . $edit_data->photo);
        } else {
            $edit_photo_uname = $edit_data->photo;
        }

        if ($request->name) {
            $edit_name = $request->name;
        } else {
            $edit_name = $edit_data->name;
        }

        $edit_data->name = $edit_name;
        $edit_data->photo = $edit_photo_uname;
        $edit_data->update();
        return redirect()->route('department.index')->with('success', 'Data updated successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Department::find($id);
        $data->delete();
        if (!empty($data->photo)) {
            unlink('media/images/department/' . $data->photo);
        }
        return redirect()->route('department.index')->with('success', 'Data deleted successfull');
    }

    public function unpublishedDepartment($id)
    {
        $data = Department::find($id);
        $data->status = 'Unpublished';
        $data->update();
        return redirect()->route('department.index')->with('success', 'Unpublished successfull');
    }
    public function publishedDepartment($id)
    {
        $data = Department::find($id);
        $data->status = 'Published';
        $data->update();
        return redirect()->route('department.index')->with('success', 'Published successfull');
    }
}
