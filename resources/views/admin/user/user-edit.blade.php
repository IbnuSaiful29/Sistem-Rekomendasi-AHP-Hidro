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
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit User Form</h4>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" action="{{route('user-update')}}" method="POST">
                                @csrf
                                @foreach ($data_user as $itemUser)

                                <div class=" row mb-4">
                                    <label for="inputName" class="col-md-3 form-label">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="inputId" name="id_user" value="{{$itemUser->id}}" hidden>
                                        <input type="text" class="form-control" id="inputName" name="name" value="{{$itemUser->name}}">
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <label for="inputName" class="col-md-3 form-label">Username</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="inputName" name="username" value="{{$itemUser->username}}" readonly>
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <label for="inputEmail3" class="col-md-3 form-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" id="inputEmail3" name="email" value="{{$itemUser->email}}" readonly>
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <label for="inputPassword3" class="col-md-3 form-label">New Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" id="inputPassword3" name="password">
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <label for="inputPassword3" class="col-md-3 form-label">Roles</label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <select class="form-control select2-show-search form-select" id="roles" name="roles" data-placeholder="Choose one">
                                                <option label="{{$itemUser->email}}"></option>
                                                @foreach ($roles as $item)
                                                    <option value="{{$item->role_name}}" {{ $item->role_name == $itemUser->role ? 'selected' : '' }}>{{$item->role_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="mb-0 mt-4 row justify-content-end">
                                    <div class="col-md-9">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        <a href="{{route('user')}}" class="btn btn-secondary">Cancel</a>
                                        {{-- <button >Cancel</button> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
