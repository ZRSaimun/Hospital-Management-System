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
                        <h4 class="card-title mb-2">All Assets</h4>
                        <a class="btn btn-sm btn-info" data-toggle="modal" href="#add_doctor_modal">Add New Asset</a>
                        <br>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_assets as $asset)
                                    <tr>
                                        <td>{{ $loop ->index + 1 }}</td>
                                        <td>{{ $asset -> title }}</td>
                                        <td>{{ $asset -> quantity }}</td>
                                        <td>{{ $asset -> price }}</td>
                                        <td>{{ $asset -> total }}</td>
                                        
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
        <div id="add_doctor_modal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Asset</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mess"></div>
                        <form id="ss" action="{{ route('asset.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="">Title</label>
                            <div class="form-group">
                                <input name="title" class="form-control" type="text" placeholder="">
                            </div>
                            <label for="">Quantity</label>
                            <div class="form-group">
                                <input name="quantity" class="form-control" type="number" placeholder="">
                            </div>
                            <label for="">Price</label>
                            <div class="form-group">
                                <input name="price" class="form-control" type="number" placeholder="">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-block btn-info" type="submit" value="Submit request">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Doctor Modal -->
        <div id="update_doctor_modal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Doctor</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mess"></div>
                        <form id="update_doctor_info" action="{{ route('update.doctor') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="cl"></div>
                            <div class="form-group">
                                <input disabled name="emp_id" class="form-control" type="text" placeholder="Doctor ID">
                                <input name="id" type="hidden">
                            </div>

                            <div class="form-group">
                                <input name="name" class="form-control" type="text" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input name="username" class="form-control" type="text" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input name="cell" class="form-control" type="text" placeholder="Cell">
                            </div>
                            <div class="form-group">
                                <input name="email" class="form-control" type="text" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input name="password" class="form-control" type="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <img style="width: 150px; height:150px; display:block; border-radius: 4px;" id="doctor_update_img_load" src="" alt="">
                                <input name="doctor_old_photo" type="hidden">
                                <input style="display: none;" id="doctor_update_img" name="doc_photo" class="form-control" type="file">
                                <label for="doctor_update_img"><img style="width: 40px; height:40px; border-radius: 4px; padding-top:5px;" src="{{ URL::to('/') }}/media/images/camera.jpg" alt=""></label>

                                <!--<img style="width: 150px; height:150px; display:block; border-radius: 4px;" id="doctor_update_img_load" src="" alt="">
                                <input name="doctor_old_photo" type="hidden">

                                <input style="display: none;" id="doc_new_img" name="new_photo" class="form-control" type="file">
                                //camera logo 
                                <label for="new_img"><img style="width: 40px; height:40px; border-radius: 4px; padding-top:5px;" src="{{ URL::to('/') }}/media/images/camera.jpg" alt=""></label>
                                -->
                            </div>
                            <div class="form-group">
                                <input class="btn btn-block btn-info" type="submit" value="Update Doctor">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Update role Modal -->
    </div>
</div>
@endsection