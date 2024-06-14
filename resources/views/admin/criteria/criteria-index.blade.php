@extends('admin.layout-admin.main')

@section('contents')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Criteria</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fe fe-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Criteria</li>
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
                            <div class="col-md-2" style="display:flex;  justify-content: right;">
                                <a href="{{route('criteria-create')}}" class="btn btn-sm btn-primary">Add Criteria <i class="fe fe-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">No</th>
                                            <th class="wd-25p border-bottom-0">Criteria Name</th>
                                            <th class="wd-25p border-bottom-0">Type</th>
                                            <th class="wd-25p border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($criteria as $criteriaItem)
                                        <tr  id="criterion-{{ $criteriaItem->id }}">
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$criteriaItem->nama_kriteria}}</td>
                                            <td>{{$criteriaItem->type}}</td>
                                            <td name="bstable-actions">
                                                <div class="btn-list">
                                                    {{-- <button id="bEdit" type="button" class="btn btn-sm btn-primary">
                                                        <span class="fe fe-edit"> </span>
                                                    </button> --}}
                                                    <a href="{{route('criteria-edit', [$criteriaItem->id] )}}" id="bDel" class="btn  btn-sm btn-primary">
                                                        <span class="fe fe-edit"></span>
                                                    </a>
                                                    <button class="btn btn-danger btn-sm delete-button" data-id="{{ $criteriaItem->id }}">
                                                        <span class="fe fe-trash-2"></span>
                                                    </button>
                                                </div>
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
