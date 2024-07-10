@extends('front.layouts.main')
@section('contents')

<section class="section section-with-shape-divider section-height-2 overlay overlay-show border-0 m-0" data-plugin-parallax data-plugin-options="{'speed': 1.5, 'parallaxHeight': '120%', 'fadeIn': true}" data-image-src="img/banjir-di-indramayu_169.jpeg">
    <div class="container pt-3 pb-5 mb-5">
        <div class="row mb-3">
            <div class="col">
                <ul class="breadcrumb d-block text-center custom-font-secondary text-6 font-weight-medium positive-ls-3">
                    <li><a href="{{route('home')}}" class="text-decoration-none opacity-hover-8">Home</a></li>
                    <li class="active text-color-primary">Cek Rekomendasi</li>
                </ul>
                <h1 class="d-block text-color-light font-weight-bold text-center text-12 positive-ls-1 line-height-2 mb-0">Cek Rekomendasi</h1>
            </div>
        </div>
    </div>
</section>

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
                                        <div class="row mb-4" style="text-align: left;">
                                            <label  style="text-align: left;" class="col-md-3 form-label">Desa</label>
                                            <div class="col-md-9">
                                                <select name="desa" id="desa" class="form-control select2-show-search form-select" required  data-placeholder="Pilih Desa">
                                                    <option label="Choose one" hidden></option>
                                                        @foreach ($data_desa as $desa_item)
                                                            <option value="{{ $desa_item->id }}">{{ $desa_item->nama_desa }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @foreach ($data_criteria as $criteria_item)

                                        <div class="row mb-4">
                                            <label for="criterion_{{ $criteria_item->id }}" style="text-align: left;" class="col-md-3 form-label">{{ $criteria_item->nama_kriteria }}</label>
                                            <div class="col-md-9">
                                                <select name="best_values[{{ $criteria_item->id }}]" id="criterion_{{ $criteria_item->id }}" class="form-control" required>
                                                    <option value="" hidden >Pilih value {{$criteria_item->nama_kriteria}}</option>
                                                    @if (isset($data_criteria_option[$criteria_item->id]['options']))
                                                        @foreach ($data_criteria_option[$criteria_item->id]['options'] as $option_name => $option_value)
                                                            <option value="{{ $option_value }}">{{ $option_name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="mb-0 mt-4 row justify-content-end">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary" type="submit">Cek Rekomendasi</button>
                                            <button type="button" class="btn btn-info ml-2" data-bs-toggle="modal"
                                            data-bs-target="#petunjukModal">Petunjuk</button>
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

<!-- Modal -->
<div class="modal fade" id="petunjukModal" tabindex="-1" aria-labelledby="petunjukModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="petunjukModalLabel">Petunjuk Mengisi Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Berikut adalah petunjuk untuk mengisi form:</p>
                <ul>
                    <li>Pilih opsi sesuai dengan keadaan wilayah anda untuk setiap kriteria berdasarkan skala yang tersedia.</li>
                    <li>Setelah memilih semua kriteria, klik tombol "Cek Rekomendasi".</li>
                    <li>Jika perlu, Anda dapat membuka kembali petunjuk ini dengan mengklik tombol "Petunjuk" di halaman utama.</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@endsection
