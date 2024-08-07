@extends('admin.layout-admin.main')

@section('contents')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Alternatif</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fe fe-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Alternatif</li>
                    </ol>
                </div>

            </div>
            <!-- PAGE-HEADER END -->
            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-9">
                                <h3 class="card-title">Data Alternatif</h3>
                            </div>
                            <div class="col-md-3" style="display:flex;  justify-content: right;">
                                <a href="{{route('alternative-create')}}" class="btn btn-sm btn-primary">Tambah Alternatif <i class="fe fe-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">No</th>
                                            <th class="wd-25p border-bottom-0">Alternatif</th>
                                            <th class="wd-25p border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alternatif as $alternatifItem)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$alternatifItem->nama_alternatif}}</td>
                                            <td name="bstable-actions">
                                                <div class="btn-list">
                                                    <a id="bEdit" href="{{route('alternative-show',[$alternatifItem->id])}}" class="btn btn-sm btn-warning">
                                                        <span class="fe fe-info"> </span>
                                                    </a>
                                                    <a id="bEdit" href="{{route('alternative-edit',[$alternatifItem->id])}}" class="btn btn-sm btn-primary">
                                                        <span class="fe fe-edit"> </span>
                                                    </a>
                                                    <button id="bDel" type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $alternatifItem->id }})">
                                                        <span class="fe fe-trash-2"></span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                                <form id="delete-form" action="" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
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
    <script>
        $(document).ready(function() {
            $('#responsive-datatable').DataTable();
        });
    </script>
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Anda yakin?',
            text: "Data ini akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                var form = document.getElementById('delete-form');
                var action = "{{ route('alternative-delete', ':id') }}";
                action = action.replace(':id', id);
                form.action = action;
                form.submit();
            }
        })
    }
    </script>
@endsection
