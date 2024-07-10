@extends('admin.layout-admin.main')

@section('contents')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Perbandingan Kriteria</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fe fe-home"></i></a></li>
                        <li class="breadcrumb-item {{ $tittle === 'Perbandingan Kriteria' ? 'active' : '' }}" aria-current="page">Perbandingan Kriteria</li>
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
                                <h3 class="card-title">Criteria</h3>
                            </div>
                            <div class="col-md-6" style="display:flex;  justify-content: right;">
                                <a href="{{route('pairwiseComparisonCriteriaEdit')}}" class="btn btn-sm btn-primary">Edit Perbandingan Kriteria <i class="fe fe-edit"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table  id="pairwiseComparisonTable"  class="table table-bordered">
                                    <tr>
                                        <td></td>
                                        @foreach ($criteria as $criterion)
                                            <td>{{ $criterion->nama_kriteria }}</td>
                                        @endforeach
                                    </tr>
                                    @foreach ($criteria as $rowCriterion)
                                        <tr>
                                            <td>{{ $rowCriterion->nama_kriteria }}</td>
                                            @foreach ($criteria as $colCriterion)
                                                <td>
                                                    @php
                                                        $data = $pairwise->where('criterion_row_id', $rowCriterion->id)
                                                                    ->where('criterion_col_id', $colCriterion->id)
                                                                    ->first();
                                                    @endphp
                                                    @if ($data)
                                                        {{ $data->value }}
                                                    @else
                                                        0
                                                    @endif
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                    <tr id="sumRow" style="background-color: #00c5d7; color:white;">
                                        <td>Jumlah</td>
                                        @foreach ($criteria as $criterion)
                                            <td class="sumCol">0</td>
                                        @endforeach
                                    </tr>
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

@section('js')

<script>
    function updateMatrix(row, col) {
        var pembilang = $('#matrix_' + row + '_' + row).val();
        var value = $('#matrix_' + row + '_' + col).val();
        $('#matrix_' + col + '_' + row).val(pembilang/value);
    }

    $(document).ready(function() {
        const table = $('#pairwiseComparisonTable');
        const numCols = table.find('tr').first().find('td').length - 1; // Excluding the first cell

        for (let col = 1; col <= numCols; col++) {
            let sum = 0;
            table.find('tr').not('#sumRow').each(function() {
                const cellValue = parseFloat($(this).find('td').eq(col).text()) || 0;
                sum += cellValue;
            });
            table.find('#sumRow td').eq(col).text(sum);
        }
    });

</script>
@endsection



