@extends('front.layouts.main')
@section('contents')

    <section style="padding:50px 50px; background-color:#f1f1f1;">
        <div class="main-container container">
            <!-- PAGE-HEADER END -->
            <div class="row row-sm">
                <center>
                    <h4 class="card-title" style="color: #000000">Cek Rekomendasi Penanganan</h4>
                    <br>
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal" action="{{route('hasilcekrekomendasi')}}" method="POST">
                                    @csrf
                                    @foreach ($data_criteria as $criteria_item)
                                    <div class="row mb-4">
                                        <label for="inputName" style="text-align: left;" class="col-md-3 form-label">{{$criteria_item->nama_kriteria}}</label>
                                        <div class="col-md-9">
                                            <input type="text" name="best_values[{{ $criteria_item->id }}]" id="criterion_{{ $criteria_item->id }}" class="form-control">
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="mb-0 mt-4 row justify-content-end">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary" type="submit">Cek Rekomendasi</button>
                                            {{-- <a href="{{route('user')}}" class="btn btn-secondary">Cancel</a> --}}
                                            {{-- <button >Cancel</button> --}}
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </center>
            </div>
        </div>
    </section>

</div>

@endsection
