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
                            <h4 class="card-title">Add User Form</h4>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" action="{{route('user-store')}}" method="POST">
                                @csrf
                                <div class=" row mb-4">
                                    <label for="inputName" class="col-md-3 form-label">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="inputName" name="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <label for="inputName" class="col-md-3 form-label">Username</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="inputName" name="username" placeholder="Username">
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <label for="inputEmail3" class="col-md-3 form-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <label for="inputPassword3" class="col-md-3 form-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <label for="inputPassword3" class="col-md-3 form-label">Roles</label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <select class="form-control select2-show-search form-select" id="roles" name="roles" data-placeholder="Choose one">
                                                <option label="Choose one"></option>
                                                @foreach ($roles as $item)
                                                    <option value="{{$item->role_name}}">{{$item->role_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
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
