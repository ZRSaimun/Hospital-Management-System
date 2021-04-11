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
                                        <th>ID</th>
                                        <th>Dr. Name</th>
                                        <th>Department</th>
                                        <th>Degree</th>
                                        <th>Experience</th>
                                        <th>Appointment</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $all_doctors as $doctors )
                                    <tr>
                                        <td>{{ $loop ->index + 1 }}</td>
                                        <td>{{ $doctors -> emp_id }}</td>
                                        <td class="sorting_1">
                                            <a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{ URL::to('/') }}/media/images/doctors/{{ $doctors -> photo }}" alt="User Image"></a>
                                            <a href="#">{{ $doctors -> name }}</a>
                                        </td>
                                        <td>{{ $doctors -> department }}</td>
                                        <td>{{ $doctors -> degree }}</td>
                                        <td>{{ $doctors -> work_experience }}</td>
                                        <td>
                                            @foreach( json_decode($doctors->appointment) as $appoint_time )
                                            <span class="mr-1" style="text-transform: capitalize; font-weight: 600">{{ $appoint_time->app_day }}</span><span>:</span> <span>{{ $appoint_time->app_start_time }}</span><span class="ml-1 mr-1">To</span><span>{{ $appoint_time->app_end_time }}</span> <br>
                                            @endforeach
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
                                            <a id="appoit_id" class="btn btn-sm btn-info" href="{{ route('index.patient', $doctors -> id ) }}">Appointment</a>
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










    </div> <!-- End of container -->
</div>
@endsection