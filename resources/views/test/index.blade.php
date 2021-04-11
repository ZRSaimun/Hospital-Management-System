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
                        <h4 class="card-title mb-2">All Test</h4>
                        <a class="btn btn-sm btn-info" data-toggle="modal" href="#add_test_modal">Add new test</a>
                        <br>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Test ID</th>
                                        <th>Test Name</th>
                                        <th>Test Fee</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_data as $data)
                                    <tr>
                                        <td>{{ $loop ->index + 1 }}</td>
                                        <td>{{ $data -> test_id }}</td>
                                        <td>{{ $data -> test_name }}</td>
                                        <td>{{ $data -> test_fee }}</td>
                                        <td>
                                            @if ( $data -> status == 'active' )
                                            <span class="badge badge-success">Active</span>
                                            @else
                                            <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ( $data -> status == 'active' )
                                            <a class="btn btn-sm btn-warning" href="{{ route('test.unpublished', $data -> id) }}"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                            @else
                                            <a class="btn btn-sm btn-success" href="{{ route('test.published', $data -> id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            @endif
                                            <form style="display: inline;" action="{{ route('test.destroy', $data -> id) }}" method="POST">
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
        <div id="add_test_modal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add new doctor</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mess"></div>
                        <form action="{{ route('test.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input name="test_id" class="form-control" type="text" placeholder="Test ID">
                            </div>
                            <div class="form-group">
                                <input name="test_name" class="form-control" type="text" placeholder="Test Name">
                            </div>
                            <div class="form-group">
                                <input name="test_fee" class="form-control" type="text" placeholder="Test Fee">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-block btn-info" type="submit" value="Add test">
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