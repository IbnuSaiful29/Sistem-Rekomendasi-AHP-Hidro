@extends('front.layouts.main')
@section('contents')

<div role="main" class="main">

    <section class="section section-with-shape-divider section-height-5 overlay overlay-show border-0 m-0" data-plugin-parallax data-plugin-options="{'speed': 1.5, 'parallaxHeight': '120%', 'fadeIn': true}" data-image-src="img/banjir-1.jpg">
        <div class="container position-relative py-5 mb-5">
            <div class="row align-items-center h-100 mb-4">
                <div class="col text-center">
                    <div class="text-color-primary d-inline-flex align-items-center custom-font-secondary text-4">
                        <div class="custom-line appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="600"></div>
                        <div class="overflow-hidden">
                            <span class="d-block positive-ls-2 font-weight-medium text-4 px-4 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300">Langkah Bijak di Era Ketidakpastian</span>
                        </div>
                        <div class="custom-line appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="600"></div>
                    </div>
                    <h1 class="text-color-light font-weight-bold positive-ls-1 line-height-1 mb-3 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="700">Sistem Rekomendasi Penanganan Bencana Banjir</h1>
                    <p class="text-color-light text-4 opacity-8 pb-3 mb-4" data-plugin-animated-letters data-plugin-options="{'startDelay': 1100, 'minWindowWidth': 0}" style="height: 42px;">Cek Solusi Terbaik untuk Mengatasi Banjir di Wilayah Anda!</p>
                    <a href="{{route('cekrekomendasi')}}" class="btn btn-light btn-outline text-2-5 text-color-light border-color-light-2 font-weight-medium positive-ls-2 text-color-hover-dark px-5 btn-py-3 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="2200">CEK REKOMENDASI</a>
                </div>
            </div>
        </div>

    </section>
    <div id="aboutus" class="container py-5 mt-5 mb-5">
        <div class="row row-gutter-sm align-items-center justify-content-center">
            <div class="col-6 col-md-4 col-lg-3 align-self-start">
                <img src="img/banjir-indramayu-20.jpg" class="img-fluid box-shadow-4 rounded-0" alt="Flood handling showcase 1" />
            </div>
            <div class="col-6 col-md-4 col-lg-3 align-self-start mb-5 mb-lg-0">
                <img src="img/banjir-indramau-3.jpg" class="img-fluid box-shadow-4 rounded-0 mb-3 mb-sm-4" alt="Flood handling showcase 2" />
                <img src="img/banjir-di-indramayu_169.jpeg" class="img-fluid box-shadow-4 rounded-0" alt="Flood handling showcase 3" />
            </div>
            <div class="col-lg-6 ps-lg-3 ps-xl-5">
                <h2 class="text-color-primary positive-ls-3 text-4 line-height-3 mb-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">TENTANG KAMI</h2>
                <h3 class="text-color-dark text-transform-none text-9 line-height-3 font-weight-medium mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">Menggunakan <span class="highlight highlight-primary highlight-bg-opacity highlight-animated" data-appear-animation="highlight-animated-start" data-appear-animation-delay="1200" data-plugin-options="{'flagClassOnly': true}">teknologi</span> untuk memberikan rekomendasi penanganan banjir yang efektif.</h3>
                <p class="text-3-5 pb-2 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">Sistem Rekomendasi Penanganan Bencana Banjir adalah platform yang dirancang untuk membantu masyarakat dan pemerintah dalam mengambil langkah-langkah yang tepat untuk mengatasi banjir. Dengan menggunakan data terbaru dan algoritma canggih, sistem ini memberikan rekomendasi yang disesuaikan dengan kondisi lokal.</p>
                <a href="#" class="btn btn-dark font-weight-medium text-3 btn-px-4 py-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">Lebih Lanjut Tentang Kami</a>
            </div>
        </div>
    </div>

</div>

@endsection
