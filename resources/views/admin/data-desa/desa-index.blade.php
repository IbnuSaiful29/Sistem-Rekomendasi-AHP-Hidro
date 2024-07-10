@extends('admin.layout-admin.main')

@section('contents')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Desa</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fe fe-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Desa</li>
                    </ol>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- PAGE-HEADER END -->
            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-9">
                                <h3 class="card-title">Data Desa</h3>
                            </div>
                            <div class="col-md-3" style="display:flex;  justify-content: right;">
                                <a href="{{route('village-create')}}" class="btn btn-sm btn-primary">Tambah Desa <i class="fe fe-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">No</th>
                                            <th class="wd-25p border-bottom-0">Kecamatan</th>
                                            <th class="wd-25p border-bottom-0">Desa</th>
                                            <th class="wd-25p border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($village as $villageItem)
                                        <tr id="row-{{ $villageItem->id }}">
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$villageItem->nama_kecamatan}}</td>
                                            <td>{{$villageItem->nama_desa}}</td>
                                            <td name="bstable-actions">
                                                <div class="btn-list">
                                                    <a id="bEdit" href="{{route('village-edit',[$villageItem->id])}}" class="btn btn-sm btn-primary">
                                                        <span class="fe fe-edit"> </span>
                                                    </a>
                                                    <button id="bDel" type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $villageItem->id }})">
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
                    $.ajax({
                        url: "{{ route('village-destroy', ':id') }}".replace(':id', id),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if(response.success) {
                                Swal.fire(
                                    'Dihapus!',
                                    response.success,
                                    'success'
                                );
                                $('#row-' + id).remove();
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Data tidak dapat dihapus.',
                                    'error'
                                );
                            }
                        }
                    });
                }
            });
        }
    </script>
@endsection
