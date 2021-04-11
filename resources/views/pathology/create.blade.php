@extends('layouts.app')
@section('main-content')
<div class="page-wrapper">

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
                    <h4 class="card-title mb-2">Patient Test Info</h4>
                    <br>
                    <a class="btn btn-sm btn-info" href="">Add Test</a>
                </div>
                <div class="card-body">
                    <form id="ss" action="{{ route('test.fee') }}" method="POST">
                        @csrf
                        <div id="test_group" class="form-group">
                            <!-- <div class="row">
                                <div class="col-md-6">
                                    <div id="test-box" class="test-box">
                                        <label for="">Test Name</label>
                                        <input name="test_name" class="form-control" id="test-input" type="text" placeholder="Select a test">
                                        <ul class="list-group" id="test-ul">
                                            @foreach( $test_all as $data)
                                            <li class="list-group-item" test_fee="{{ $data->test_fee }}">{{ $data->test_name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Test Fee</label>
                                    <input disabled name="test_fee" class="form-control" id="test-fee" type="text">
                                </div>
                            </div> -->


                        </div>


                        <div class="form-group">
                            <button id="test_btn" class="btn btn-sm btn-dark">Add More</button>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-block btn-info" type="submit" value="Add test">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection