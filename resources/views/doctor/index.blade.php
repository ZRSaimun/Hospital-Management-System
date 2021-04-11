@extends('layouts.app')
@section('main-content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Welcome {{ Auth::user()->name }}!</h3>
                    <!-- <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul> -->
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            <div class="col-md-12">
                @include('validate')
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-2">All Doctors</h4>
                        <a class="btn btn-sm btn-info" data-toggle="modal" href="#add_doctor_modal">Add new doctor</a>
                        <br>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Doctor ID</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Degree</th>
                                        <th>Experience</th>
                                        <th>Appointment</th>
                                        <th>Department</th>
                                        <th>Photo</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_doctors as $doctors)
                                    <tr>
                                        <td>{{ $loop ->index + 1 }}</td>
                                        <td>{{ $doctors -> emp_id }}</td>
                                        <td>{{ $doctors -> name }}</td>
                                        <td>{{ $doctors -> cell }}</td>
                                        <td>{{ $doctors -> degree }}</td>
                                        <td>{{ $doctors -> work_experience }}</td>
                                        <td>
                                            @foreach( json_decode($doctors->appointment) as $appoint_time )
                                            <span class="mr-1" style="text-transform: capitalize; font-weight: 600">{{ $appoint_time->app_day }}</span><span>:</span> <span>{{ $appoint_time->app_start_time }}</span><span class="ml-1 mr-1">To</span><span>{{ $appoint_time->app_end_time }}</span> <br>
                                            @endforeach
                                        </td>
                                        <td>{{ $doctors -> department }}</td>
                                        <td>
                                            <img style="width: 50px; height:50px; border-radius:4px;" src="{{ URL::to('/') }}/media/images/doctors/{{ $doctors -> photo }}" alt="">
                                        </td>
                                        <td>
                                            @if ( $doctors -> status == 'Published' )
                                            <span class="badge badge-success">Published</span>
                                            @else
                                            <span class="badge badge-danger">Unpublished</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ( $doctors -> status == 'Published' )
                                            <a class="btn btn-sm btn-danger" href="{{ route('doctor.unpublished', $doctors -> id) }}"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                            @else
                                            <a class="btn btn-sm btn-success" href="{{ route('doctor.published', $doctors -> id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            @endif
                                            <a id="update-doctor" doctor_id="{{ $doctors -> id }}" class="btn btn-sm btn-warning" data-toggle="modal" href="#">Edit</a>
                                            <form style="display: inline;" action="{{ route('doctor.destroy', $doctors -> id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Doctor Modal -->
        <div id="add_doctor_modal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add new doctor</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mess"></div>
                        <form id="ss" action="{{ route('doctor.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input name="emp_id" class="form-control" type="text" placeholder="Doctor ID">
                            </div>
                            <div class="form-group">
                                <input name="name" class="form-control" type="text" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input name="nick_name" class="form-control" type="text" placeholder="Nick name">
                            </div>
                            <div class="form-group">
                                <input name="cell" class="form-control" type="text" placeholder="Cell">
                            </div>
                            <div class="form-group">
                                <input name="email" class="form-control" type="text" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input name="age" class="form-control" type="text" placeholder="Age">
                            </div>
                            <div class="form-group">
                                <label for="">About</label>
                                <textarea name="about" id="" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Education</label>
                                <textarea name="education" id="" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Working Experience</label>
                                <textarea name="work_experience" id="" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input name="social_media" class="form-control" type="text" placeholder="Social media link">
                            </div>
                            <div class="form-group">
                                <label for="">Department</label>
                                <select name="department" id="" class="form-control">
                                    <option>-select-</option>
                                    @foreach($all_department as $department)
                                    <option value="{{ $department->name }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input name="degree" class="form-control" type="text" placeholder="Degree">
                            </div>
                            <div id="appointment" class="form-group">
                                <label for="">Appointment</label>
                                <div class="apoint"></div>
                            </div>
                            <div class="form-group">
                                <button id="appointment_btn" class="btn btn-sm btn-dark">Add More</button>
                            </div>

                            <div class="form-group">
                                <input name="fee" class="form-control" type="text" placeholder="Fee">
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <textarea name="address" id="" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <img style="width: 150px; height:150px; display:block; border-radius: 4px;" id="doctor_img_load" src="" alt="">
                                <input style="display: none;" id="doctor_img" name="photo" class="form-control" type="file">
                                <label for="doctor_img"><img style="width: 40px; height:40px; border-radius: 4px; padding-top:5px;" src="{{ URL::to('/') }}/media/images/camera.jpg" alt=""></label>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-block btn-info" type="submit" value="Add doctor">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Doctor Modal -->
        <div id="update_doctor_modal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Doctor</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mess"></div>
                        <form id="update_doctor_info" action="{{ route('update.doctor') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="cl"></div>
                            <div class="form-group">
                                <input disabled name="emp_id" class="form-control" type="text" placeholder="Doctor ID">
                                <input name="id" type="hidden">
                            </div>

                            <div class="form-group">
                                <input name="name" class="form-control" type="text" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input name="username" class="form-control" type="text" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input name="cell" class="form-control" type="text" placeholder="Cell">
                            </div>
                            <div class="form-group">
                                <input name="email" class="form-control" type="text" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input name="password" class="form-control" type="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <img style="width: 150px; height:150px; display:block; border-radius: 4px;" id="doctor_update_img_load" src="" alt="">
                                <input name="doctor_old_photo" type="hidden">
                                <input style="display: none;" id="doctor_update_img" name="doc_photo" class="form-control" type="file">
                                <label for="doctor_update_img"><img style="width: 40px; height:40px; border-radius: 4px; padding-top:5px;" src="{{ URL::to('/') }}/media/images/camera.jpg" alt=""></label>

                                <!--<img style="width: 150px; height:150px; display:block; border-radius: 4px;" id="doctor_update_img_load" src="" alt="">
                                <input name="doctor_old_photo" type="hidden">

                                <input style="display: none;" id="doc_new_img" name="new_photo" class="form-control" type="file">
                                //camera logo 
                                <label for="new_img"><img style="width: 40px; height:40px; border-radius: 4px; padding-top:5px;" src="{{ URL::to('/') }}/media/images/camera.jpg" alt=""></label>
                                -->
                            </div>
                            <div class="form-group">
                                <input class="btn btn-block btn-info" type="submit" value="Update Doctor">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Update role Modal -->
    </div>
</div>
@endsection