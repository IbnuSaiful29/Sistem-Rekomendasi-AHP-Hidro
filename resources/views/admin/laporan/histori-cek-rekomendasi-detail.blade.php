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
                    <div class="card mb-3">
                        <div class="card-header">
                            <h4 class="card-title">Form Tambah Kriteria</h4>
                        </div>
                        <div class="card-body">
                            <!-- Menampilkan data histori penanganan -->
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th style="width:30%">ID</th>
                                        <td>{{ $data_histori->id }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:30%">Nama Kabupaten</th>
                                        <td>{{ $data_histori->village->nama_kabupaten }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:30%">Nama Kecamatan</th>
                                        <td>{{ $data_histori->village->nama_kecamatan }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:30%">Nama Desa</th>
                                        <td>{{ $data_histori->village->nama_desa }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:30%">Tanggal</th>
                                        <td>{{ \Carbon\Carbon::parse( $data_histori->village->created_at)->translatedFormat('d F Y') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                     <!-- Menampilkan data kriteria -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5>Kriteria</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($data_histori->criteria as $criteria)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $criteria->criteria->nama_kriteria }}
                                        <span class="badge bg-info-gradient badge-sm  me-1 mb-1 mt-1">{{ $criteria->value }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Menampilkan data alternatif -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5>Alternatif</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($data_histori->alternatif as $alternatif)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>{{ $alternatif->peringkat }}. {{ $alternatif->alternatif->nama_alternatif }}</span>
                                        <span class="badge bg-warning-gradient badge-sm  me-1 mb-1 mt-1">{{ $alternatif->weight }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
