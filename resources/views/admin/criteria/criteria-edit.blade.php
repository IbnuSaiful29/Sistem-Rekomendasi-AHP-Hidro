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
                        <li class="breadcrumb-item active" aria-current="page">Kriteria</li>
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
                            <form class="form-horizontal" action="{{route('criteria-update')}}" method="POST">
                                @csrf
                                @foreach ($data_criteria as $item_criteria)
                                <div class=" row mb-4">
                                    <label for="inputName" class="col-md-3 form-label">Kriteria</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="inputId" name="criteria_id" value="{{$item_criteria->id}}" hidden>
                                        <input type="text" class="form-control" id="inputName" name="criteria_name" value="{{$item_criteria->nama_kriteria}}">
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <label for="inputPassword3" class="col-md-3 form-label">Jenis</label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <select class="form-control form-select select2" id="type" name="type" data-placeholder="Pilih Jenis">
                                                <option label="Pilih Tipe"></option>
                                                <option value="Benefit" {{ $item_criteria->type == 'Benefit' ? 'selected' : '' }}>Benefit</option>
                                                <option value="Cost" {{ $item_criteria->type == 'Cost' ? 'selected' : '' }}>Cost</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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
