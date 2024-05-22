@extends('admin.layout-admin.main')

@section('contents')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Perbandingan Alternatif</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fe fe-home"></i></a></li>
                        <li class="breadcrumb-item {{ $tittle === 'Perbandingan Alternatif' ? 'active' : '' }}" aria-current="page">Perbandingan Alternatif</li>
                    </ol>
                </div>

            </div>
            <!-- PAGE-HEADER END -->
            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-6">
                                <h3 class="card-title">Perbandingan Alternatif</h3>
                            </div>
                            <div class="col-md-6" style="display:flex;  justify-content: right;">
                                {{-- <a href="{{route('pairwiseComparisonAlternativeEdit')}}" class="btn btn-sm btn-primary">Edit Perbandingan Alternatif <i class="fe fe-edit"></i></a> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                                    <thead>
                                        <tr>
                                            <th>Alternatif</th>
                                            @foreach ($criteria as $criterion)
                                                <th>{{ $criterion->nama_kriteria }}</t>
                                            @endforeach
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alternative as $rowAlternative)
                                            <tr>
                                                <td>{{ $rowAlternative->nama_alternatif }}</td>
                                                @foreach ($criteria as $colCriterion)
                                                    <td>
                                                        @php
                                                            $data = $pairwise->where('alternative_id', $rowAlternative->id)
                                                                        ->where('criteria_id', $colCriterion->id)
                                                                        ->first();
                                                            $namaKriteria = $colCriterion->nama_kriteria;
                                                            $namaKriteriaLower = strtolower($namaKriteria);
                                                        @endphp
                                                        @if ($data)
                                                            @if ($namaKriteriaLower == 'suhu')
                                                                {{ $data->value }} &deg;C
                                                            @else
                                                                {{ $data->value }}
                                                            @endif
                                                        @else
                                                            0
                                                        @endif
                                                    </td>
                                                @endforeach
                                                <td>
                                                    <a href="{{route('pairwiseComparisonAlternativeEdit', [$rowAlternative->id])}}" id="bEdit" class="btn btn-sm btn-primary"> <span class="fe fe-edit"> </span></a>
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



