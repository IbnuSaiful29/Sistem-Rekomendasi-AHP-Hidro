<footer id="footer" class="border-top-0 bg-dark pt-4 mt-0">
    <div class="container pt-2 mt-3">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-9 col-lg-6 text-center">
                <a href="{{ route('home') }}">
                    <img src="img/logo-white-text.png" class="img-fluid mb-2" alt="Logo Footer">
                </a>
                <p class="text-color-grey text-3 px-3 mb-4">Aplikasi ini dirancang untuk memberikan rekomendasi penanganan terbaik dalam situasi bencana banjir.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <ul class="list list-unstyled">
                    <li class="d-flex justify-content-center justify-content-lg-start mb-3">
                        <i class="fas fa-phone-alt text-light" style="font-size: 20px;"></i>
                        <a href="tel:+6281234567890" class="text-decoration-none text-color-light text-color-hover-primary line-height-7 text-3 ms-2">+62 812-3456-7890</a>
                    </li>
                    <li class="d-flex justify-content-center justify-content-lg-start mb-3">
                        <i class="fas fa-envelope text-light" style="font-size: 20px;"></i>
                        <a href="mailto:info@penangananbanjir.com" class="text-decoration-none text-color-light text-color-hover-primary  line-height-7 text-3 ms-2">info@penangananbanjir.com</a>
                    </li>
                    <li class="d-flex justify-content-center justify-content-lg-start mb-3">
                        <i class="fas fa-map-marker-alt text-light" style="font-size: 20px;"></i>
                        <p class="text-color-light line-height-7 text-3 ms-2">Jl. Lohbener Lama No.08, Lohbener, Legok, Indramayu, Kabupaten Indramayu, Jawa Barat, Kode Pos: 45252</p>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 text-center mb-4 mb-lg-0">
                <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
                {{-- <div id="googlemaps" class="google-map mt-0 mb-2" style="height: 150px;"></div>
                <a href="{{ route('contact') }}" data-hash data-hash-offset="0" data-hash-offset-lg="110" class="text-decoration-none text-color-primary font-weight-bold text-3">Get Directions</a> --}}
            </div>
            <div class="col-lg-3">
                <h4 class="text-color-light font-weight-bold text-center text-lg-end mb-2">Tautan Berguna</h4>
                <ul class="list list-icons list-icons-sm d-flex flex-column align-items-center align-items-lg-end">
                    <li>
                        <i class="fas fa-angle-right text-color-default"></i>
                        <a href="{{route('contact')}}" class="link-hover-style-1 ms-1">Hubungi Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright bg-dark pt-3 pb-4 mt-3">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <p class="text-color-grey text-3">Copyright © 2024 <a href="javascript:void(0)">Simbabanyu</a>. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
