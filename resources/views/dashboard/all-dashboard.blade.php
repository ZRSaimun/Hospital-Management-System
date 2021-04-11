@extends('layouts.app')
@section('main-content')

<div class="container-fluid">
    <div class="row mt-4 mr-2">
        <div class="col-xl-3 col-sm-6 col-12">
            <a style="text-transform:uppercase; text-align: center;" href="">
                <div class="card">
                    <div class="card-body bg-info text-light">
                        <h3 style="text-decoration: none;">Doctor</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <a style="text-transform:uppercase; text-align: center;" href="{{ route('dash-patient.index') }}">
                <div class="card">
                    <div class="card-body bg-info text-light">
                        <h3 style="text-decoration: none;">Patient</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <a style="text-transform:uppercase; text-align: center;" href="">
                <div class="card">
                    <div class="card-body bg-info text-light">
                        <h3 style="text-decoration: none;">Staff</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <a style="text-transform:uppercase; text-align: center;" href="">
                <div class="card">
                    <div class="card-body bg-info text-light">
                        <h3 style="text-decoration: none;">Admin</h3>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

@endsection