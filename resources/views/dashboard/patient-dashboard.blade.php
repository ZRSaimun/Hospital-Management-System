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
                        <h4 class="card-title mb-2">All Patients</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Patient ID</th>
                                        <th>Patient Name</th>
                                        <th>Patient Age</th>
                                        <th>Payment</th>
                                        <th>Doctor_ID</th>
                                        <th>Doctor_Name</th>
                                        <th>Doctor_Dept</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pt_all as $patients)
                                    <tr>
                                        <td>{{ $loop ->index + 1 }}</td>
                                        <td>{{ $patients-> patient_id }}</td>
                                        <td>{{ $patients-> appoint ->name }}</td>
                                        <td>{{ $patients-> appoint ->age }}</td>
                                        <td>
                                            @if ( $patients -> paid == 'paid' )
                                            <span class="badge badge-success">Paid</span>
                                            @else
                                            <span class="badge badge-warning">Unpaid</span>
                                            @endif
                                        </td>
                                        <td>{{ $patients-> doctor_id }}</td>
                                        <td>{{ $patients-> doctor_name }}</td>
                                        <td>{{ $patients-> doctor_dept }}</td>
                                        <td>
                                            @if ( $patients -> status == 'checked' )
                                            <span class="badge badge-success">Checked</span>
                                            @else
                                            <span class="badge badge-warning">{{ $patients-> status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ( $patients -> status == 'confirmed' && $patients -> paid == 'paid' )
                                            <a class="btn btn-sm btn-danger" href="{{ route('doctor.check', $patients-> id) }}"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                            @endif
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