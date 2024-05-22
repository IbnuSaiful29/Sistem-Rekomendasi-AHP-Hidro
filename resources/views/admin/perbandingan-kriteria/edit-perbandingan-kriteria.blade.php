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
                        <li class="breadcrumb-item"><a href="{{route('pairwiseComparisonCriteria')}}">Perbandingan Kriteria</a></li>
                        <li class="breadcrumb-item {{ $tittle === 'Perbandingan Kriteria' ? 'active' : '' }}" aria-current="page">Edit</li>
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
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form id="pairwiseComparisonForm" method="POST">
                                @csrf
                                    <table class="table table-bordered">
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
                                                @php
                                                    $data = $pairwise->where('criterion_row_id', $rowCriterion->id)
                                                                ->where('criterion_col_id', $colCriterion->id)
                                                                ->first();
                                                @endphp
                                                    @if ($rowCriterion->id == $colCriterion->id)
                                                        <td><input type="text" class="form-control" id="matrix_{{ $rowCriterion->id }}_{{ $colCriterion->id }}" name="matrix[{{ $rowCriterion->id }}][{{ $colCriterion->id }}]" value="@if($data) {{ $data->value }} @else 1 @endif" readonly></td>
                                                    {{-- @elseif ($rowCriterion->id > $colCriterion->id)
                                                        <td><input type="text" pattern="[0-9]*[.,]?[0-9]+" class="form-control" id="matrix_{{ $rowCriterion->id }}_{{ $colCriterion->id }}" name="matrix[{{ $rowCriterion->id }}][{{ $colCriterion->id }}]" oninput="updateMatrix({{ $rowCriterion->id }}, {{ $colCriterion->id }})" placeholder="0"></td> --}}
                                                    @else
                                                        {{-- <td><input type="text" class="form-control" id="matrix_{{ $rowCriterion->id }}_{{ $colCriterion->id }}" name="matrix[{{ $rowCriterion->id }}][{{ $colCriterion->id }}]" oninput="updateMatrix({{ $rowCriterion->id }}, {{ $colCriterion->id }})" onkeypress="return isNumberKey(event)" value=" @if($data) {{ $data->value }} @else 0 @endif"></td> --}}
                                                        <td>
                                                            <select class="form-control" id="matrix_{{ $rowCriterion->id }}_{{ $colCriterion->id }}" name="matrix[{{ $rowCriterion->id }}][{{ $colCriterion->id }}]" onchange="updateMatrix({{ $rowCriterion->id }}, {{ $colCriterion->id }})">
                                                                <option value="1" @if($data && $data->value == 1) selected @endif>1</option>
                                                                <option value="3" @if($data && $data->value == 3) selected @endif>3</option>
                                                                <option value="5" @if($data && $data->value == 5) selected @endif>5</option>
                                                                <option value="7" @if($data && $data->value == 7) selected @endif>7</option>
                                                                @if($data && !in_array($data->value, [1, 3, 5, 7]))
                                                                    <option value="{{ $data->value }}" selected hidden>{{ $data->value }}</option>
                                                                @endif
                                                            </select>
                                                        </td>
                                                    @endif
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </table>
                                    <button type="submit" id="Savestay" class="btn btn-sm btn-primary" value="stay" style="padding:7px 15px;">Simpan</button>
                                    <button type="submit" id="Saveback" class="btn btn-sm btn-info" value="back" style="padding:7px 15px;">Simpan & Kembali</button>
                                    <a href="{{route('pairwiseComparisonCriteria')}}" class="btn btn-sm btn-danger" style="padding:7px 15px;">Kembali</a>
                                </form>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // function updateMatrix(row, col) {
    //     var pembilang = $('#matrix_' + row + '_' + row).val();
    //     var value = $('#matrix_' + row + '_' + col).val();
    //     if (value == 0) {
    //         $('#matrix_' + col + '_' + row).val(0);
    //     }else{
    //         $('#matrix_' + col + '_' + row).val(pembilang/value);
    //     }
    // }

    function updateMatrix(row, col) {
        var value = parseFloat($('#matrix_' + row + '_' + col).val());
        var pembilang = parseFloat($('#matrix_' + row + '_' + row).val());

        // Calculate the reciprocal value
        var reciprocalValue;
        if (value === 1) reciprocalValue = 1;
        else if (value === 3) reciprocalValue = 1 / 3;
        else if (value === 5) reciprocalValue = 1 / 5;
        else if (value === 7) reciprocalValue = 1 / 7;
        else reciprocalValue = 1 / value; // For dynamic values

        // Round the reciprocal value to avoid floating point issues
        if (![1, 3, 5, 7].includes(value)) {
            reciprocalValue = parseFloat(reciprocalValue.toFixed(10));
        }

        // Find the corresponding reciprocal option in the opposite matrix element
        var oppositeSelect = $('#matrix_' + col + '_' + row);

        // Check if the reciprocal value exists in the options, if not add it dynamically
        if (!oppositeSelect.find('option[value="' + reciprocalValue + '"]').length) {
            oppositeSelect.append('<option value="' + reciprocalValue + '" hidden>' + reciprocalValue + '</option>');
        }

        oppositeSelect.val(reciprocalValue.toString());

        // Ensure the reciprocal value is displayed correctly
        oppositeSelect.find('option').each(function() {
            if (parseFloat($(this).val()) === reciprocalValue) {
                $(this).prop('selected', true);
            }
        });
    }

    function isNumberKey(evt) {
        const charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

    $(document).ready(function() {
        $('#pairwiseComparisonForm').submit(function(e) {
            e.preventDefault(); // Prevent the default form submission

            var actionValue = $('button[type=submit][clicked=true]').val(); // Get the value of the button that was clicked
            var formData = $(this).serialize() + '&action=' + actionValue; // Serialize the form data and append the action value

            $.ajax({
                url: "{{ route('pairwiseComparisonCriteriaEditSave') }}", // Endpoint URL
                type: "POST",
                data: formData, // Form data
                success: function (response) {
                    if (response.message === 'Data berhasil disimpan') {
                        if (actionValue === 'back') {
                            window.location.href = "{{ route('pairwiseComparisonCriteria') }}"; // Redirect for "Save & Return" button
                        } else {
                            // Additional actions for "Save" button, if any
                            swal.fire({
                                title: 'Berhasil!',
                                text: 'Data berhasil disimpan!',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });
                        }
                    } else {
                        swal.fire({
                            title: 'Error!',
                            text: 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
                }
            });
        });

        // Capture the clicked button's value
        $('form button[type=submit]').click(function() {
            $('button[type=submit]', $(this).parents('form')).removeAttr('clicked');
            $(this).attr('clicked', 'true');
        });

        $('select').each(function() {
            var value = $(this).val();
            $(this).find('option').each(function() {
                if ($(this).val() == value) {
                    $(this).prop('selected', true);
                }
            });
        });
    });


    // $(document).ready(function() {
    //     $('#pairwiseComparisonForm').submit(function(e) {
    //         e.preventDefault(); // Prevent the default form submission

    //         var formData = $(this).serialize(); // Serialize the form data

    //         $.ajax({
    //             url: "{{route('pairwiseComparisonCriteriaEditSave')}}", // Endpoint URL
    //             type: "POST",
    //             data: formData, // Form data
    //             success: function (response) {
    //                 if (response.message === 'Data berhasil disimpan') {
    //                     if ($('button[id="back"]').length > 0) {
    //                         window.location.href = "{{ route('pairwiseComparisonCriteria') }}"; // Redirect for "Save & Return" button
    //                     } else {
    //                         // Additional actions for "Save" button, if any
    //                         alert('Data berhasil disimpan!');
    //                     }
    //                 } else {
    //                     alert('Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
    //                 }
    //             },
    //             error: function (xhr, status, error) {
    //                 console.error(xhr.responseText);
    //                 alert('Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
    //             }
    //         });
    //     });
    // });


</script>
@endsection



