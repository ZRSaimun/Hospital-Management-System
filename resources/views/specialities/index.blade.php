@extends('layouts.app')
@section('main-content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="page-title">Welcome {{ Auth::user()->name }}!</h3>
                    <!-- <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Department</li>
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
                        <h4 class="card-title mb-2">All Department</h4>
                        <a class="btn btn-sm btn-info" data-toggle="modal" href="#add_specialities_modal">Add new department</a>
                        <br>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Department</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_data as $data)
                                    <tr>
                                        <td>{{ $loop ->index + 1 }}</td>
                                        <td>{{ $data -> department_id }}</td>
                                        <td>
                                            <h5 class="table-avatar">
                                                <a href="#">
                                                    <img src="{{ URL::to('/') }}/media/images/department/{{ $data -> photo }}" alt="Speciality" />
                                                </a>
                                                <a href="">{{ $data -> name }}</a>
                                            </h5>
                                        </td>
                                        <td>
                                            @if ( $data -> status == 'Published' )
                                            <span class="badge badge-success">Published</span>
                                            @else
                                            <span class="badge badge-danger">Unpublished</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ( $data -> status == 'Published' )
                                            <a class="btn btn-sm btn-danger" href="{{ route('department.unpublished', $data -> id) }}"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                            @else
                                            <a class="btn btn-sm btn-success" href="{{ route('department.published', $data -> id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            @endif
                                            <a id="department_edit" department_id="{{ $data -> id }}" class="btn btn-sm btn-warning" data-toggle="modal" href="#">Edit</a>
                                            <form style="display: inline;" action="{{ route('department.destroy', $data -> id) }}" method="POST">
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
        <!-- Add department Modal -->
        <div id="add_specialities_modal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add new department</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mess"></div>
                        <form id="" action="{{ route('department.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input name="department_id" class="form-control" type="text" value="{{ old('department_id') }}" placeholder="Department ID">
                            </div>
                            <div class="form-group">
                                <label for="">Department</label>
                                <select name="name" id="" class="form-control">
                                    <option value="0">-select-</option>
                                    <option value="Medicine">Medicine</option>
                                    <option value="Dental">Dental</option>
                                    <option value="Cardiology">Cardiology</option>
                                    <option value="Orthopaedics">Orthopaedics</option>
                                    <option value="Neurology">Neurology</option>
                                    <option value="Dermatology">Dermatology</option>
                                    <option value="Urology">Urology</option>
                                    <option value="Gastroenterology">Gastroenterology</option>
                                    <option value="Gynaecology">Gynaecology</option>
                                    <option value="Oncology">Oncology</option>
                                    <option value="Pharmacy">Pharmacy</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <img style="width: 150px; height:150px; display:block; border-radius: 4px;" id="department_img_load" src="" alt="">
                                <input style="display: none;" id="department_img" name="photo" class="form-control" type="file">
                                <label for="department_img"><img style="width: 40px; height:40px; border-radius: 4px; padding-top:5px;" src="{{ URL::to('/') }}/media/images/camera.jpg" alt=""></label>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-block btn-info" type="submit" value="Add department">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update department Modal -->
        <div id="update_department_modal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Department</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mess"></div>
                        <form id="update_doctor_info" action="{{ route('update.department') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <input name="id" class="form-control" type="hidden">
                                <input disabled name="department_id" class="form-control" type="text" placeholder="Department ID">
                            </div>
                            <div class="form-group">
                                <label for="">Specialities</label>
                                <input disabled name="old_name" class="form-control mb-2" type="text">
                                <select name="name" id="" class="form-control">
                                    <option value="0">-select-</option>
                                    <option value="Medicine">Medicine</option>
                                    <option value="Dental">Dental</option>
                                    <option value="Cardiology">Cardiology</option>
                                    <option value="Orthopaedics">Orthopaedics</option>
                                    <option value="Neurology">Neurology</option>
                                    <option value="Dermatology">Dermatology</option>
                                    <option value="Urology">Urology</option>
                                    <option value="Gastroenterology">Gastroenterology</option>
                                    <option value="Gynaecology">Gynaecology</option>
                                    <option value="Oncology">Oncology</option>
                                    <option value="Pharmacy">Pharmacy</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <img style="width: 150px; height:150px; display:block; border:1px solid #ccc; border-radius: 4px;" id="department_Edit_img_load" src="" alt="">
                                <input name="old_photo" class="form-control" type="hidden">

                                <input style="display: none;" id="department_edit_img" name="new_photo" class="form-control" type="file">
                                <label for="department_edit_img"><img style="width: 40px; height:40px; border-radius: 4px; padding-top:5px;" src="{{ URL::to('/') }}/media/images/camera.jpg" alt=""></label>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-block btn-info" type="submit" value="Update department">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Update department Modal -->
    </div>
</div>
@endsection