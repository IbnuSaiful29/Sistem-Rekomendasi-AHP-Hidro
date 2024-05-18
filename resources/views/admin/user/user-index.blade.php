@extends('admin.layout-admin.main')

@section('contents')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">User</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fe fe-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">User</li>
                    </ol>
                </div>

            </div>
            <!-- PAGE-HEADER END -->
            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-10">
                                <h3 class="card-title">User</h3>
                            </div>
                            <div class="col-md-2" style="display:flex;  justify-content: right;">
                                <a href="{{route('user-create')}}" class="btn btn-sm btn-primary">Add Users <i class="fe fe-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">No</th>
                                            <th class="wd-15p border-bottom-0">Name</th>
                                            <th class="wd-15p border-bottom-0">Username</th>
                                            <th class="wd-25p border-bottom-0">E-mail</th>
                                            <th class="wd-25p border-bottom-0">Role</th>
                                            <th class="wd-25p border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $userItem)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$userItem->name}}</td>
                                            <td>{{$userItem->username}}</td>
                                            <td>{{$userItem->email}}</td>
                                            <td>{{$userItem->role}}</td>
                                            <td name="bstable-actions">
                                                <div class="btn-list">
                                                    <button id="bDetail" type="button" class="btn btn-sm btn-warning">
                                                        <span class="fe fe-info"> </span>
                                                    </button>
                                                    <a href="{{route('user-edit', [$userItem->id])}}" id="bEdit" class="btn btn-sm btn-primary"> <span class="fe fe-edit"> </span></a>
                                                    <button id="bDel" type="button" class="btn  btn-sm btn-danger">
                                                        <span class="fe fe-trash-2"> </span>
                                                    </button>
                                                </div>
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
            <!-- End Row -->

        </div>
        <!-- CONTAINER CLOSED -->

    </div>
</div>
@endsection
