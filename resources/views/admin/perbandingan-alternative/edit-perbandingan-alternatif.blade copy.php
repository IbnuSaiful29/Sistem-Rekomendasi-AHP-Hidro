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
                                        @foreach ($alternative as $rowAlternative)
                                            <tr>
                                                <td>{{ $rowAlternative->nama_alternatif }}</td>
                                                @foreach ($criteria as $colCriterion)
                                                    <td><input type="text" class="form-control" id="matrix_{{ $rowAlternative->id }}_{{ $colCriterion->id }}" name="matrix[{{ $rowAlternative->id }}][{{ $colCriterion->id }}]" onkeypress="return isNumberKey(event)" placeholder="0"></td>
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
                url: "{{ route('pairwiseComparisonAlternativeEditSave') }}", // Endpoint URL
                type: "POST",
                data: formData, // Form data
                success: function (response) {
                    if (response.message === 'Data berhasil disimpan') {
                        if (actionValue === 'back') {
                            window.location.href = "{{ route('pairwiseComparisonAlternative') }}"; // Redirect for "Save & Return" button
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
    });

</script>
@endsection



