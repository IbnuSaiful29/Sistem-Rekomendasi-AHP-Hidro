@extends('front.layouts.main')

@section('contents')
<section class="section section-with-shape-divider section-height-3 overlay overlay-show border-0 m-0" data-plugin-parallax data-plugin-options="{'speed': 1.5, 'parallaxHeight': '120%', 'fadeIn': true}" data-image-src="img/banjir-di-indramayu_169.jpeg">
    <div class="container pt-3 pb-5 mb-5">
        <div class="row mb-3">
            <div class="col">
                <ul class="breadcrumb d-block text-center custom-font-secondary text-6 font-weight-medium positive-ls-3">
                    <li><a href="{{route('home')}}" class="text-decoration-none opacity-hover-8">Home</a></li>
                    <li><a href="{{route('cekrekomendasi')}}" class="text-decoration-none opacity-hover-8">Cek Rekomendasi</a></li>
                    <li class="active text-color-primary">Hasil</li>
                </ul>
                <h1 class="d-block text-color-light font-weight-bold text-center text-12 positive-ls-1 line-height-2 mb-0">Cek Rekomendasi</h1>
            </div>
        </div>
    </div>
</section>
<section style="padding:50px 50px; background-color:#f1f1f1;">
    <div class="main-container container">
        <div class="row row-sm">
            <center>
                <h4 class="card-title" style="color: #000000">Hasil Rekomendasi</h4>
                <p>Berdasarkan nilai terbaik yang Anda masukkan, berikut adalah rekomendasi penanganan yang paling sesuai:</p>
                <br>
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="row row-gutter-sm align-items-center justify-content-center">
                                <div class="col-6 col-md-4 col-lg-5 align-self-middle">
                                    <img src="img/flood-illustration.png" width="380" alt="">
                                </div>
                                <div class="col-lg-7 ps-lg-3 ps-xl-5">
                                    {{-- @foreach ($rankedAlternativesAll as $alternative)
                                    <div class="card mb-3">
                                        <div class="card-body" style="border: 1px solid #ddd; padding: 20px; border-radius: 5px; text-align:left;">
                                            <h5 class="card-title">{{ $alternative['nama_alternatif'] }}</h5>
                                            <p class="card-text">{{ $alternative['description'] }}</p>
                                        </div>
                                    </div>
                                    @endforeach --}}
                                    @php
                                        $count = 0;
                                    @endphp
                                    @foreach ($rankedAlternativesAll as $alternative)
                                    @if ($count < 5)
                                        <div class="card mb-3">
                                            <div class="card-body" style="border: 1px solid #ddd; padding: 20px; border-radius: 5px; text-align:left;">
                                                <h5 class="card-title">{{ $alternative['nama_alternatif'] }}</h5>
                                                <p class="card-text">{{ $alternative['description'] }}</p>
                                            </div>
                                        </div>
                                        @php
                                            $count++;
                                        @endphp
                                    @else
                                        @break
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </div>
</section>
@endsection
