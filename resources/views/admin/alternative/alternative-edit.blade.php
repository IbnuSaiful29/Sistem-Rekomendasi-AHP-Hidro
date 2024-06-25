@extends('admin.layout-admin.main')

@section('contents')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Alternatif</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fe fe-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Alternatif</li>
                    </ol>
                </div>

            </div>
            <!-- PAGE-HEADER END -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Tambah Alternatif</h4>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" action="{{route('alternative-update')}}" method="POST">
                                @csrf
                                @foreach ($data_alternative as $item)
                                <div class=" row mb-4">
                                    <label for="inputName" class="col-md-3 form-label">Alternatif</label>
                                    <div class="col-md-9">
                                        <input type="text" name="alternative_id" value="{{$item->id}}" hidden>
                                        <input type="text" class="form-control" id="inputName" name="alternative_name" value="{{$item->nama_alternatif}}">
                                    </div>
                                </div>

                                @endforeach
                                <div class="mb-0 mt-4 row justify-content-end">
                                    <div class="col-md-9">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        <a href="{{route('alternative')}}" class="btn btn-secondary">Cancel</a>
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
