@extends('admin.layout-admin.main')

@section('contents')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Data Desa</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fe fe-home"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('village')}}">Data Desa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data Desa</li>
                    </ol>
                </div>

            </div>
            <!-- PAGE-HEADER END -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Tambah Data Desa</h4>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="form-horizontal" action="{{route('village-update')}}" method="POST">
                                @csrf
                                <div class=" row mb-4">
                                    <label for="inputName" class="col-md-3 form-label">Kabupaten</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="{{$village->id}}" id="inputName" name="id" hidden>
                                        <input type="text" class="form-control" value="{{$village->nama_kabupaten}}" id="inputName" name="kabupaten_name" placeholder="Nama Kabupaten" required>
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <label for="inputName" class="col-md-3 form-label">Kecamatan</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="inputName" value="{{$village->nama_kecamatan}}" name="kecamatan_name" placeholder="Nama Kecamatan" required>
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <label for="inputName" class="col-md-3 form-label">Nama Desa</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="inputName" name="desa_name" value="{{$village->nama_desa}}" placeholder="Nama Desa" required>
                                    </div>
                                </div>
                                <div class="mb-0 mt-4 row justify-content-end">
                                    <div class="col-md-9">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        <a href="{{route('village')}}" class="btn btn-secondary">Cancel</a>
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
