@extends('admin.layout-admin.main')

@section('contents')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">contact</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fe fe-home"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('contact-show')}}">Pesan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Pesan</li>
                    </ol>
                </div>

            </div>
            <!-- PAGE-HEADER END -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Detail Pesan</h4>
                        </div>
                        <div class="card-body">
                                <div class=" row mb-4">
                                    <label for="inputName" class="col-md-3 form-label">Nama</label>
                                    <div class="col-md-9">
                                        <p>{{$data_contact->name}}</p>
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <label for="inputName" class="col-md-3 form-label">Email</label>
                                    <div class="col-md-9">
                                        <p>{{$data_contact->email}}</p>
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <label for="inputName" class="col-md-3 form-label">Tanggal</label>
                                    <div class="col-md-9">
                                        <p>{{ \Carbon\Carbon::parse($data_contact->created_at)->translatedFormat('d F Y') }}</p>
                                    </div>
                                </div>

                                <div class=" row mb-4">
                                    <label for="inputName" class="col-md-3 form-label">Pesan</label>
                                    <div class="col-md-9">
                                        <p>{{$data_contact->message}}</p>
                                    </div>
                                </div>
                                <div class="mb-0 mt-4 row">
                                    <div class="col-md-9">
                                        <a href="{{route('contact-show')}}" class="btn btn-secondary">Kembali</a>
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
