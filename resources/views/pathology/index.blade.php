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

        <!-- All Appointment List -->
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-2">All Appointment</h4>
                        <br>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Appointment_id</th>
                                        <th>Patient_cell</th>
                                        <th>Doctor_name</th>
                                        <th>status</th>
                                        <th>paid</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($appoint_all as $appoints)
                                    <tr>
                                        <td>{{ $loop ->index + 1 }}</td>
                                        <td>{{ $appoints->appointment_id }}</td>
                                        <td>{{ $appoints->patient_cell }}</td>
                                        <td>{{ $appoints->doctor_name }}</td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a class="btn btn-sm btn-info" href="{{ route('pathology.test', $appoints->id ) }}">Add Test</a>
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
    </div>
</div>
@endsection