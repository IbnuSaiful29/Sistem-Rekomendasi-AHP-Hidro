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
                        {{-- <div class="card-body"> --}}
                            {{-- <table class="table table-bordered">
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
                                    {{-- <td>
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
                                    </td> --}}
                                {{-- </tr>
                            </table> --}}
                        {{-- </div> --}}
                        <div class="card-body">
                            <div class="table-responsive">
                                {{-- <table class="table table-bordered text-nowrap border-bottom">
                                    <thead>
                                        <tr>
                                            <th>Alternatif</th>
                                            @foreach ($alternatives as $alternative)
                                                <th>{{ $alternative->alternative->nama_alternatif }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($comparisonMatrix as $rowIndex => $row)
                                            <tr>
                                                <td>{{ $alternatives[$rowIndex]->alternative->nama_alternatif }}</td>
                                                @foreach ($row as $value)
                                                    <td>{{ round($value, 3) }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table> --}}
                                {{-- <table class="table table-bordered text-nowrap border-bottom">
                                    <thead>
                                        <tr>
                                            <th>Alternatif</th>
                                            @foreach ($alternatives as $alternative)
                                                <th>{{ $alternative->alternative->nama_alternatif }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($comparisonMatrix as $alternativeId => $row)
                                            <tr>
                                                <td>
                                                    @php
                                                          $nama_alternatif = DB::select('SELECT nama_alternatif FROM alternatif WHERE id = ?', [$alternativeId]);
                                                    @endphp


                                                    {{$nama_alternatif[0]->nama_alternatif}}


                                                </td>

                                                @foreach ($row as $value)
                                                    <td>{{ round($value, 3) }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table> --}}
                                <h4 class="mt-4">Bobot (Priority Vector)</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Alternatif</th>
                                            <th>Bobot</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataWeights as $data)
                                        <tr>
                                            <td>{{ $data['nama_alternatif'] }}</td>
                                            <td>{{ isset($data['bobot']) ? round($data['bobot'], 3) : 'N/A' }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{-- <h4 class="mt-4">Konsistensi</h4>
                                <p>Lambda Max: {{ round($lambdaMax, 3) }}</p>
                                <p>Consistency Index (CI): {{ round($consistencyIndex, 3) }}</p>
                                <p>Consistency Ratio (CR): {{ round($consistencyRatio, 3) }}</p> --}}
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
@section('js')
    {{-- <script>
        $(document).ready(function() {
            $('.delete-button').click(function() {
                var criterionId = $(this).data('id');
                var row = $('#criterion-' + criterionId);

                if (confirm('Are you sure you want to delete this criteria?')) {
                    $.ajax({
                        url: '{{route('criteria-delete')}}' + criterionId,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                row.remove();
                                alert(response.success);
                            } else {
                                alert(response.error);
                            }
                        },
                        error: function(xhr) {
                            alert('An error occurred while deleting the criteria.');
                        }
                    });
                }
            });
        });
    </script> --}}
@endsection
