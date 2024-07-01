{{-- @extends('front.layouts.main')
@section('contents')

<div role="main" class="main">

    <section class="section section-with-shape-divider section-height-3 overlay overlay-show border-0 m-0" data-plugin-parallax data-plugin-options="{'speed': 1.5, 'parallaxHeight': '120%', 'fadeIn': true}" data-image-src="img/demos/restaurant/backgrounds/background-4.jpg">
        <div class="container pt-3 pb-5 mb-5">
            <div class="row mb-3">
                <div class="col">
                    <ul class="breadcrumb d-block text-center custom-font-secondary text-6 font-weight-medium positive-ls-3">
                        <li><a href="{{route('home')}}" class="text-decoration-none opacity-hover-8">Home</a></li>
                        <li class="active text-color-primary">Contact</li>
                    </ul>
                    <h1 class="d-block text-color-light font-weight-bold text-center text-12 positive-ls-1 line-height-2 mb-0">Contact</h1>
                </div>
            </div>
        </div>
        <a href="#contact" data-hash data-hash-offset="0" data-hash-offset-lg="100" data-hash-force="true" class="text-decoration-none text-color-dark text-color-hover-primary text-5-5 position-absolute transform3dx-n50 left-50pct bottom-5 mb-4 z-index-2">
            <i class="icons icon-arrow-down font-weight-bold"></i>
        </a>
        <div class="shape-divider shape-divider-bottom shape-divider-reverse-y" style="height: 116px;">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 116" preserveAspectRatio="xMinYMin">
                <path fill="#FFF" d="M453,92c11.7-4.87,28.46-11.43,49-18c42.29-13.52,76.36-19.33,115-25c51.58-7.57,100.28-14.72,171-20
                    c24.87-1.86,82.88-5.76,158-6c69.99-0.23,122.54,2.82,159,5c51.18,3.06,95.17,5.69,155,14c71.5,9.94,115.42,21.02,127,24
                    c33.7,8.68,61.62,17.79,82,25C1130.33,91.33,791.67,91.67,453,92z"/>
                <rect y="90" fill="#FFF" width="1920" height="26"/>
            </svg>
        </div>
    </section>

    <div id="contact" class="container pt-5 pb-4 mt-2 mb-3">
        <div class="row">
            <div class="col">
                <h2 class="text-color-dark text-transform-none text-9 line-height-3 font-weight-medium mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">A Great Place to Eat!</h2>
                <p class="text-3-5 pb-3 mb-5 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque molestie vel turpis a sodales. In hac habitasse platea dictumst. Nulla sollicitudin dui vitae leo aliquet, vel feugiat augue pellentesque.</p>
            </div>
        </div>
    </div>

    <div style="background: #f9f9f9; padding-top: 10px; padding-bottom:50px;">
        <h1 class="text-center mt-5">Contact Us</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('contact-save') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5">{{ old('message') }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container py-5 my-5">
        <div class="row row-gutter-sm align-items-lg-center">
            <div class="col-12 col-lg-4">
                <h2 class="alternative-font-4 text-color-dark font-weight-bold line-height-3 text-5-5 mb-1 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="250">123 Street Name, Los Angeles, CA</h2>
                <div class="pb-2 mb-4">
                    <a href="demo-restaurant-contact.html#get-direction" data-hash data-hash-offset="0" data-hash-offset-lg="110" class="d-inline-block text-decoration-underline-2 font-weight-bold border-color-primary text-decoration-none text-3-5 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="450">GET DIRECTIONS</a>
                </div>
                <ul class="list list-unstyled">
                    <li class="d-flex appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="650">
                        <img width="27" height="27" src="img/demos/restaurant/icons/phone.svg" alt="Phone Icon" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-dark position-relative bottom-2'}" />
                        <a href="tel:+1234567890" class="text-decoration-none text-color-dark text-color-hover-primary font-weight-bold line-height-7 text-3-5 ms-2">(800) 123-4567</a>
                    </li>
                    <li class="d-flex my-4 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="850">
                        <img width="27" height="27" src="img/demos/restaurant/icons/email.svg" alt="Email Icon" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-dark'}" />
                        <a href="mailto:porto@domain.com" class="text-decoration-none text-color-dark text-color-hover-primary font-weight-bold line-height-7 text-3-5 ms-2">porto@domain.com</a>
                    </li>
                </ul>
                <p class="mb-4 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="1050">We are here to help you with your auto repair and service needs. Come in, give us a call or send us an email. We will get back to you as soon as we can!</p>
                <div class="d-flex align-items-center appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="1250">
                    <span class="text-color-dark font-weight-semibold text-3-5">SOCIAL LINKS:</span>
                    <ul class="social-icons social-icons-clean social-icons-medium ms-3">
                        <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                        <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-7 col-lg-4 ms-auto">
                <img src="img/demos/restaurant/generic/generic-1-big-plus.jpg" class="img-fluid box-shadow-4 rounded-0" alt="Restaurant inside showcase 1" />
            </div>
            <div class="col-5 col-lg-3 ps-xs-1">
                <img src="img/demos/restaurant/generic/generic-2-small.jpg" class="img-fluid box-shadow-4 rounded-0 mb-3 mb-sm-4" alt="Restaurant inside showcase 2" />
                <img src="img/demos/restaurant/generic/generic-3-small.jpg" class="img-fluid box-shadow-4 rounded-0" alt="Restaurant inside showcase 3" />
            </div>
        </div>
    </div>

    <section class="section section-with-shape-divider bg-dark border-0 m-0">
        <a href="#header" data-hash data-hash-offset="0" data-hash-offset-lg="100" data-hash-force="true" class="text-decoration-none text-color-dark text-color-hover-primary position-absolute transform3dx-n50 left-50pct bottom-0 text-5 mb-5 z-index-2">
            <i class="icons icon-arrow-up font-weight-bold"></i>
        </a>
        <div class="shape-divider shape-divider-reverse-x" style="height: 116px;">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 116" preserveAspectRatio="xMinYMin">
                <path fill="#FFF" d="M453,92c11.7-4.87,28.46-11.43,49-18c42.29-13.52,76.36-19.33,115-25c51.58-7.57,100.28-14.72,171-20
                    c24.87-1.86,82.88-5.76,158-6c69.99-0.23,122.54,2.82,159,5c51.18,3.06,95.17,5.69,155,14c71.5,9.94,115.42,21.02,127,24
                    c33.7,8.68,61.62,17.79,82,25C1130.33,91.33,791.67,91.67,453,92z"/>
                <rect y="90" fill="#FFF" width="1920" height="26"/>
            </svg>
        </div>
    </section>

</div>


@endsection --}}

@extends('front.layouts.main')
@section('contents')

<div role="main" class="main">

    <section class="section section-with-shape-divider section-height-3 overlay overlay-show border-0 m-0" data-plugin-parallax data-plugin-options="{'speed': 1.5, 'parallaxHeight': '120%', 'fadeIn': true}" data-image-src="img/demos/restaurant/backgrounds/background-4.jpg">
        <div class="container pt-3 pb-5 mb-5">
            <div class="row mb-3">
                <div class="col">
                    <ul class="breadcrumb d-block text-center custom-font-secondary text-6 font-weight-medium positive-ls-3">
                        <li><a href="{{ route('home') }}" class="text-decoration-none opacity-hover-8">Home</a></li>
                        <li class="active text-color-primary">Contact</li>
                    </ul>
                    <h1 class="d-block text-color-light font-weight-bold text-center text-12 positive-ls-1 line-height-2 mb-0">Contact Us</h1>
                </div>
            </div>
        </div>
        <a href="#contact" data-hash data-hash-offset="0" data-hash-offset-lg="100" data-hash-force="true" class="text-decoration-none text-color-dark text-color-hover-primary text-5-5 position-absolute transform3dx-n50 left-50pct bottom-5 mb-4 z-index-2">
            <i class="icons icon-arrow-down font-weight-bold"></i>
        </a>
        <div class="shape-divider shape-divider-bottom shape-divider-reverse-y" style="height: 116px;">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 116" preserveAspectRatio="xMinYMin">
                <path fill="#FFF" d="M453,92c11.7-4.87,28.46-11.43,49-18c42.29-13.52,76.36-19.33,115-25c51.58-7.57,100.28-14.72,171-20
                    c24.87-1.86,82.88-5.76,158-6c69.99-0.23,122.54,2.82,159,5c51.18,3.06,95.17,5.69,155,14c71.5,9.94,115.42,21.02,127,24
                    c33.7,8.68,61.62,17.79,82,25C1130.33,91.33,791.67,91.67,453,92z"/>
                <rect y="90" fill="#FFF" width="1920" height="26"/>
            </svg>
        </div>
    </section>

    <div id="contact" class="container pt-5 pb-4 mt-2 mb-3">
        <div class="row">
            <div class="col">
                <h2 class="text-color-dark text-transform-none text-9 line-height-3 font-weight-medium mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">We'd Love to Hear From You!</h2>
                <p class="text-3-5 pb-3 mb-5 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">Jika Anda memiliki pertanyaan atau komentar, jangan ragu untuk menghubungi kami. Kami di sini untuk membantu Anda dengan setiap pertanyaan atau masukan yang Anda miliki.</p>
            </div>
        </div>
    </div>

    <div class="container" style="padding-bottom:50px;">
        <h1 class="text-center mt-5">Contact Us</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('contact-save') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" style="border: 1px solid grey" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" style="border: 1px solid grey" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Pesan</label>
                        <textarea style="border: 1px solid grey" class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5">{{ old('message') }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Ksirim Pesan</button>
                </form>
            </div>
        </div>
    </div>

    <section class="section section-with-shape-divider bg-dark border-0 m-0">
        <a href="#header" data-hash data-hash-offset="0" data-hash-offset-lg="100" data-hash-force="true" class="text-decoration-none text-color-dark text-color-hover-primary position-absolute transform3dx-n50 left-50pct bottom-0 text-5 mb-5 z-index-2">
            <i class="icons icon-arrow-up font-weight-bold"></i>
        </a>
        <div class="shape-divider shape-divider-reverse-x" style="height: 116px;">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 116" preserveAspectRatio="xMinYMin">
                <path fill="#FFF" d="M453,92c11.7-4.87,28.46-11.43,49-18c42.29-13.52,76.36-19.33,115-25c51.58-7.57,100.28-14.72,171-20
                    c24.87-1.86,82.88-5.76,158-6c69.99-0.23,122.54,2.82,159,5c51.18,3.06,95.17,5.69,155,14c71.5,9.94,115.42,21.02,127,24
                    c33.7,8.68,61.62,17.79,82,25C1130.33,91.33,791.67,91.67,453,92z"/>
                <rect y="90" fill="#FFF" width="1920" height="26"/>
            </svg>
        </div>
    </section>

</div>

@endsection

