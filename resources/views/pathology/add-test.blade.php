@extends('layouts.app')
@section('main-content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Welcome {{ Auth::user()->name }}!</h3>
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
                        <a class="btn btn-sm btn-info" data-toggle="modal" href="#add_test_modal">Add new test</a>
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
                                    <tr>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Test Modal -->
        <div id="add_test_modal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add new doctor</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mess"></div>
                        <form id="ss" action="" method="POST">
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

        <!-- End of Update role Modal -->
    </div>
</div>
@endsection