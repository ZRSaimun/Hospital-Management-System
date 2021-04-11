@extends('layouts.app')
@section('main-content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Welcome {{ Auth::user()->name }}!</h3>
                  s  <!-- <ul class="breadcrumb">
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
                        <h4 class="card-title mb-2">All Leave Requests</h4>
                        <br>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Employee Id</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>reason</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_request as $request)
                                    <tr>
                                        <td>{{ $request-> id }}</td>
                                        <td>{{ $request -> emp_id }}</td>
                                        <td>{{ $request -> start_date }}</td>
                                        <td>{{ $request -> end_date }}</td>
                                        <td>{{ $request -> reason }}</td>
                                        <td>
                                                @if ( $request -> status == 'pending' )
                                                <span class="badge badge-info">Pending</span>
                                                @elseif ($request -> status == 'approved' )
                                                <span class="badge badge-success">Approved</span>
                                                @else
                                                <span class="badge badge-danger">Declined</span>
                                                @endif
                                        </td>
                                        <td>
                                            @if ( $request -> status == 'pending' )
                                            <a class="btn btn-sm btn-success" href="{{ route('leave.approve', $request -> id) }}"><i class="fa fa-check" aria-hidden="true"></i></a>
                                            <a class="btn btn-sm btn-danger" href="{{ route('leave.cancel', $request -> id) }}"><i class=" fa fa-circle"></i></a>
                                            @elseif ($request -> status == 'approved')
                                            <a class="btn btn-sm btn-danger" href="{{ route('leave.cancel', $request -> id) }}"><i class="fa fa-circle"></i></a>
                                            @else
                                            <a class="btn btn-sm btn-success" href="{{ route('leave.approve', $request -> id) }}"><i class="fa fa-check" aria-hidden="true"></i></a>    
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