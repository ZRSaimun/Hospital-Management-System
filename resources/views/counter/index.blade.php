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
                                        <th>patient_id</th>
                                        <th>patient_cell</th>
                                        <th>doctor_id</th>
                                        <th>doctor_name</th>
                                        <th>doctor_dept</th>
                                        <th>appointment_date</th>
                                        <th>appointment_time</th>
                                        <th>status</th>
                                        <th>paid</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($all_appointment as $appointment)
                                    <tr>
                                        <td>{{ $loop ->index + 1 }}</td>
                                        <td>{{ $appointment -> patient_id }}</td>
                                        <td>{{ $appointment -> patient_cell }}</td>
                                        <td>{{ $appointment -> doctor_id }}</td>
                                        <td>{{ $appointment -> doctor_name }}</td>
                                        <td>{{ $appointment -> doctor_dept }}</td>
                                        <td>{{ $appointment -> appointment_date }}</td>
                                        <td style="text-transform: capitalize;">{{ $appointment -> appointment_time }}</td>
                                        <td>
                                            @if ( $appointment -> status == 'pending' )
                                            <span class="badge badge-info">Pending</span>
                                            @elseif ( $appointment -> status == 'confirmed' )
                                            <span class="badge badge-success">Confirmed</span>
                                            @elseif ( $appointment -> status == 'checked' )
                                            <span class="badge badge-success">Checked</span>
                                            @else
                                            <span class="badge badge-danger">Canceled</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ( $appointment -> paid == 'unpaid' )
                                            <span class="badge badge-info">Unpaid</span>
                                            @else
                                            <span class="badge badge-success">Paid</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ( $appointment -> status == 'pending' || $appointment -> status == 'canceled' )
                                            <a class="btn btn-sm btn-success" href="{{ route('counter.confirm', $appointment -> id) }}"><i class="fa fa-check-square" aria-hidden="true"></i></a>
                                            <a class="btn btn-sm btn-danger" href="{{ route('counter.cancel', $appointment -> id) }}"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
                                            @else
                                            <a class="btn btn-sm btn-danger" href="{{ route('counter.cancel', $appointment -> id) }}"><i class="fa fa-ban" aria-hidden="true"></i></a>
                                            @endif

                                            @if ( $appointment -> status == 'confirmed' && $appointment -> paid == 'unpaid' )
                                            <a class="btn btn-sm btn-danger" href="{{ route('counter.paid', $appointment -> id) }}"><i class="fa fa-money" aria-hidden="true"></i></a>
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