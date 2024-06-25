@extends('admin.layout-admin.main')

@section('contents')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Kriteria</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fe fe-home"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('criteria')}}">Kriteria</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Kriteria</li>
                    </ol>
                </div>

            </div>
            <!-- PAGE-HEADER END -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Tambah Kriteria</h4>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" action="{{route('criteria-store')}}" method="POST">
                                @csrf
                                <div class=" row mb-4">
                                    <label for="inputName" class="col-md-3 form-label">Kriteria</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="inputName" name="criteria_name" placeholder="Kriteria">
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <label for="inputPassword3" class="col-md-3 form-label">Jenis</label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <select class="form-control form-select select2" id="type" name="type" data-placeholder="Pilih Jenis">
                                                <option label="Pilih Tipe"></option>
                                                <option value="Benefit">Benefit</option>
                                                <option value="Cost">Cost</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-0 mt-4 row justify-content-end">
                                    <div class="col-md-9">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        <a href="{{route('criteria')}}" class="btn btn-secondary">Cancel</a>
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
