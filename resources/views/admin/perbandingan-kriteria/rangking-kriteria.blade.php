@extends('admin.layout-admin.main')

@section('contents')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Rangking Criteria</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fe fe-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Rangking Criteria</li>
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
                                <h3 class="card-title">Criteria</h3>
                            </div>
                            {{-- <div class="col-md-2" style="display:flex;  justify-content: right;">
                                <a href="{{route('criteria-create')}}" class="btn btn-sm btn-primary">Add Criteria <i class="fe fe-plus"></i></a>
                            </div> --}}
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Lambda Max</th>
                                    <td>{{ $lambdaMax }}</td>
                                </tr>
                                <tr>
                                    <th>Consistency Index (CI)</th>
                                    <td>{{ $consistencyIndex }}</td>
                                </tr>
                                <tr>
                                    <th>Consistency Ratio (CR)</th>
                                    <td>
                                        {{ $consistencyRatio }}
                                    </td>
                                    <td>
                                        @if ($consistencyRatio >= 0.1)
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <a href="{{route('pairwiseComparisonCriteria')}}" class="btn btn-sm btn-danger">Tidak Konsisten</a>
                                                </div>
                                                <div class="col-md-9">
                                                    <p style="color:red;">&nbsp;&nbsp;&nbsp;tidak konsisten lakukan perbandingan kriteria ulang</p>
                                                </div>
                                            </div>
                                        @else
                                            <span class="btn btn-sm btn-info">Konsisten</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                                    <thead>
                                        <tr>
                                            <th>Ranking</th>
                                            <th>Nama Kriteria</th>
                                            <th>Weight</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rankedCriteria as $rank => $criterion)
                                            <tr>
                                                <td>{{ $rank + 1 }}</td>
                                                <td>{{ $criterion['name'] }}</td>
                                                <td>{{ $criterion['weight'] }}</td>
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
