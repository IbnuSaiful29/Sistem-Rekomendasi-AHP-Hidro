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
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <h4 class="mt-4">Bobot (Priority Vector)</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Alternatif</th>
                                            <th>Bobot</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rankedAlternativesAll as $alternative)
                                            <tr>
                                                <td>{{ $alternative['nama_alternatif'] }}</td>
                                                <td>{{ $alternative['weight'] }}</td>
                                                {{-- <td>{{ round($weights[$index], 3) }}</td> --}}
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
