@extends('admin.layout-admin.main')

@section('contents')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Pesan dan Saran</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fe fe-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pesan</li>
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
                                <h3 class="card-title">Pesan Dan Saran</h3>
                            </div>
                            {{-- <div class="col-md-2" style="display:flex;  justify-content: right;">
                                <a href="{{route('contact-create')}}" class="btn btn-sm btn-primary">Tambah contact <i class="fe fe-plus"></i></a>
                            </div> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">No</th>
                                            <th class="wd-25p border-bottom-0">Nama</th>
                                            <th class="wd-25p border-bottom-0">Email</th>
                                            <th class="wd-25p border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_contact as $contactItem)
                                        <tr  id="criterion-{{ $contactItem->id }}">
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$contactItem->name}}</td>
                                            <td>{{$contactItem->email}}</td>
                                            <td name="bstable-actions">
                                                <div class="btn-list">
                                                    <a href="{{route('contact-detail', [$contactItem->id] )}}" id="bDel" class="btn  btn-sm btn-warning">
                                                        <span class="fe fe-info"></span>
                                                    </a>
                                                    {{-- <button id="bDel" type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $contactItem->id }})">
                                                        <span class="fe fe-trash-2"></span>
                                                    </button> --}}
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- <form id="delete-form" action="" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form> --}}
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
  <!-- SweetAlert JS -->
  {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
  function confirmDelete(id) {
      Swal.fire({
          title: 'Anda yakin?',
          text: "Data ini akan dihapus secara permanen! dan semua data yang terkait akan dihapus juga",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus!'
      }).then((result) => {
          if (result.isConfirmed) {
              var form = document.getElementById('delete-form');
              var action = "{{ route('contact-delete', ':id') }}";
              action = action.replace(':id', id);
              form.action = action;
              form.submit();
          }
      })
  }
  </script> --}}
@endsection
