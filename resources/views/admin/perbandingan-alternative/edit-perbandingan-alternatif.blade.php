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
                                <h3 class="card-title">Form Edit Alternative: {{ $alternative->nama_alternatif }}</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form id="pairwiseComparisonForm" method="POST">
                                    @csrf
                                    @foreach ($criteria as $criterion)
                                        @php
                                            $data = $pairwise->where('criteria_id', $criterion->id)->first();
                                            $value = $data ? $data->value : 0;
                                        @endphp
                                        <div class="row mb-4">
                                            <label for="value_{{ $criterion->id }}" class="col-md-3 form-label">{{ $criterion->nama_kriteria }}</label>
                                            <div class="col-md-9">
                                                <input type="text" name="value_{{ $criterion->id }}" id="value_{{ $criterion->id }}" value="{{ $value }}" class="form-control">
                                            </div>
                                        </div>
                                    @endforeach
                                    <br>
                                    <button type="submit" id="Savestay" class="btn btn-sm btn-primary" value="stay" style="padding:7px 15px;">Simpan</button>
                                    <button type="submit" id="Saveback" class="btn btn-sm btn-info" value="back" style="padding:7px 15px;">Simpan & Kembali</button>
                                    <a href="{{ route('pairwiseComparisonAlternative') }}" class="btn btn-sm btn-danger" style="padding:7px 15px;">Kembali</a>
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
                url: "{{ route('pairwiseComparisonAlternativeEditSave', [$alternative->id]) }}", // Endpoint URL
                type: "POST", // Use POST method
                data: formData, // Form data
                success: function(response) {
                    if (response.message === 'Data berhasil disimpan') {
                        if (actionValue === 'back') {
                            window.location.href = "{{ route('pairwiseComparisonAlternative') }}"; // Redirect for "Save & Return" button
                        } else {
                            // Additional actions for "Save" button, if any
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Data berhasil disimpan!',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });
                        }
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });

        // Capture the clicked button's value
        $('form button[type=submit]').click(function() {
            $('button[type=submit]', $(this).parents('form')).removeAttr('clicked');
            $(this).attr('clicked', 'true');
        });
        // $('#pairwiseComparisonForm').submit(function(e) {
        //     e.preventDefault(); // Prevent the default form submission

        //     var actionValue = $('button[type=submit][clicked=true]').val(); // Get the value of the button that was clicked
        //     var formData = $(this).serialize() + '&action=' + actionValue; // Serialize the form data and append the action value

        //     $.ajax({
        //         url: "{{route('pairwiseComparisonAlternativeEditSave', [$alternative->id])}}", // Endpoint URL
        //         type: "POST",
        //         data: formData, // Form data
        //         success: function (response) {
        //             if (response.message === 'Data berhasil disimpan') {
        //                 if (actionValue === 'back') {
        //                     window.location.href = "{{ route('pairwiseComparisonCriteria') }}"; // Redirect for "Save & Return" button
        //                 } else {
        //                     // Additional actions for "Save" button, if any
        //                     swal.fire({
        //                         title: 'Berhasil!',
        //                         text: 'Data berhasil disimpan!',
        //                         icon: 'success',
        //                         confirmButtonText: 'OK'
        //                     });
        //                 }
        //             } else {
        //                 swal.fire({
        //                     title: 'Error!',
        //                     text: 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.',
        //                     icon: 'error',
        //                     confirmButtonText: 'OK'
        //                 });
        //             }
        //         },
        //         error: function (xhr, status, error) {
        //             console.error(xhr.responseText);
        //             alert('Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
        //         }
        //     });
        // });

        // // Capture the clicked button's value
        // $('form button[type=submit]').click(function() {
        //     $('button[type=submit]', $(this).parents('form')).removeAttr('clicked');
        //     $(this).attr('clicked', 'true');
        // });
    });

</script>
@endsection



