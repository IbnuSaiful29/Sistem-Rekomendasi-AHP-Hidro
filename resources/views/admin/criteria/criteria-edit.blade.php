@extends('admin.layout-admin.main')

@section('contents')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Kriteria</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fe fe-home"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('criteria')}}">Kriteria</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Kriteria</li>
                    </ol>
                </div>

            </div>
            <!-- PAGE-HEADER END -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Edit Kriteria</h4>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" action="{{route('criteria-update')}}" method="POST">
                                @csrf
                                @foreach ($data_criteria as $item_criteria)
                                <div class=" row mb-4">
                                    <label for="inputName" class="col-md-3 form-label">Kriteria</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="inputId" name="criteria_id" value="{{$item_criteria->id}}" hidden>
                                        <input type="text" class="form-control" id="inputName" name="criteria_name" value="{{$item_criteria->nama_kriteria}}">
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <label for="inputPassword3" class="col-md-3 form-label">Jenis</label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <select class="form-control form-select select2" id="type" name="type" data-placeholder="Pilih Jenis">
                                                <option label="Pilih Tipe"></option>
                                                <option value="Benefit" {{ $item_criteria->type == 'Benefit' ? 'selected' : '' }}>Benefit</option>
                                                <option value="Cost" {{ $item_criteria->type == 'Cost' ? 'selected' : '' }}>Cost</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                @endforeach
                                <div class="row mb-4">
                                    <div class="col-md-10">
                                        <h5>Tambahkan Value Option</h5>
                                    </div>
                                    <div class="col-md-2">
                                        <button id="addOption" class="btn btn-warning">Tambah</button>
                                    </div>
                                </div>

                                <div id="optionContainer">
                                    @if($data_option->isEmpty())
                                        <div class="row mb-4">
                                            <label class="col-md-2 form-label">Kriteria Option</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="option_name[]" value="">
                                            </div>
                                            <label class="col-md-1 form-label">Value</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="option[]" value="">
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-danger removeOption">Hapus</button>
                                            </div>
                                        </div>
                                    @else
                                        @foreach ($data_option as $item)
                                            <div class="row mb-4">
                                                <label class="col-md-2 form-label">Kriteria Option</label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" name="option_name[]" value="{{$item->option}}">
                                                </div>
                                                <label class="col-md-1 form-label">Value</label>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" name="option[]" value="{{$item->value}}">
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn-danger removeOption">Hapus</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="mb-0 mt-4 row justify-content-end">
                                    <div class="col-md-9">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        <a href="{{route('criteria')}}" class="btn btn-secondary">Cancel</a>
                                        {{-- <button >Cancel</button> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#addOption').click(function(e) {
            e.preventDefault(); // Prevent the default button action

            // Clone the existing input row
            var newRow = $('#optionContainer .row').first().clone();

            // Clear the values of the cloned inputs
            newRow.find('input').val('');

            // Append the cloned row to the container
            $('#optionContainer').append(newRow);
        });

        // Delegate the click event for dynamically added remove buttons
        $('#optionContainer').on('click', '.removeOption', function(e) {
            e.preventDefault(); // Prevent the default button action

            // Remove the parent row of the clicked remove button
            $(this).closest('.row').remove();
        });
    });
</script>

@endsection
