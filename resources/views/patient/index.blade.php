@extends('frontend.layouts.app')
@section('main-content')
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('validate')
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-2 text-center">Doctor Appointment</h4>
                        <br>
                    </div>
                    <div class="card-body">
                        <form id="ss" action="{{ route('store.patient') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input name="doct_id" class="form-control" type="hidden" value="{{ $data -> emp_id }}">
                            </div>
                            <div class="form-group">
                                <label for="">Dr. Name</label>
                                <input disabled class="form-control" type="text" value="{{ $data -> name }}">
                                <input name="doct_name" class="form-control" type="hidden" value="{{ $data -> name }}">
                            </div>
                            <div class="form-group">
                                <label for="">Department</label>
                                <input disabled class="form-control" type="text" value="{{ $data ->department }}">
                                <input name="doct_dept" class="form-control" type="hidden" value="{{ $data ->department }}">
                            </div>
                            <div class="form-group">
                                <label for="">Choose Appointment Time</label><br>
                                <div class="row" style="display: flex;">
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <input name="patient_app_date" class="form-control" type="date" id="datepick">

                                            <div class="input-group-append">
                                                <label class="btn btn-info" for="datepick"><i class="fa fa-calendar" aria-hidden="true"></i></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        @foreach( json_decode($data -> appointment) as $doctor )
                                        <div class="form-check-inline">
                                            <label class="form-check-label" for="patient_app_time">
                                                <input type="radio" class="form-check-input" id="patient_app_time" name="patient_app_time" value="{{ $doctor->app_day }}_{{ $doctor->app_start_time }}_{{ $doctor->app_end_time }}">
                                                <span style="font-weight: 600; text-transform:capitalize">{{ $doctor->app_day }}</span> <span>:</span> <span>{{ $doctor->app_start_time }}</span><span> ~ </span><span>{{ $doctor->app_end_time }}</span>
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Fee</label>
                                <input disabled class="form-control" type="text" value="{{ $data ->fee }}">
                                <input name="doctor_fee" class="form-control" type="hidden" value="{{ $data ->fee }}">
                            </div>
                            <div class="form-group">
                                <input name="name" class="form-control" type="text" placeholder="Enter Your Name">
                            </div>
                            <div class="form-group">
                                <input name="cell" class="form-control" type="text" placeholder="Enter Your Mobile">
                            </div>
                            <div class="form-group">
                                <input name="email" class="form-control" type="text" placeholder="Enter Your Email">
                            </div>
                            <div class="form-group">
                                <input name="age" class="form-control" type="text" placeholder="Enter Your Age">
                            </div>
                            <div class="form-group">
                                <input name="address" class="form-control" type="text" placeholder="Enter Your Address">
                            </div>
                            <div class="form-group">
                                <input name="password" class="form-control" type="password" placeholder="Enter Your Password">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-block btn-info" type="submit" value="Appointment Now">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection