@extends('front.layouts.main')
@section('contents')

<div class="body">

    <div role="main" class="main">

        <section class="section section-with-shape-divider section-height-4 overlay overlay-show border-0 m-0" data-plugin-parallax data-plugin-options="{'speed': 1.5, 'parallaxHeight': '120%', 'fadeIn': true}" data-image-src="img/banjir-di-indramayu_169.jpeg">
            <div class="container pt-3 pb-5 mb-5">
                <div class="row mb-3">
                    <div class="col">
                        <ul class="breadcrumb d-block text-center custom-font-secondary text-6 font-weight-medium positive-ls-3">
                            <li><a href="demo-restaurant.html" class="text-decoration-none opacity-hover-8">Home</a></li>
                            <li class="active text-color-primary">About</li>
                        </ul>
                        <h1 class="d-block text-color-light font-weight-bold text-center text-12 positive-ls-1 line-height-2 mb-0">About</h1>
                    </div>
                </div>
            </div>
            <a href="#aboutus" data-hash data-hash-offset="0" data-hash-offset-lg="100" data-hash-force="true" class="text-decoration-none text-color-dark text-color-hover-primary text-5-5 position-absolute transform3dx-n50 left-50pct bottom-5 mb-4 z-index-2">
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

        <div id="aboutus" class="container py-5 mt-4 mb-3">
            <div class="row">
                <div class="col">
                    <h2 class="text-color-primary positive-ls-3 text-4 line-height-3 mb-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">ABOUT US</h2>
                    <h3 class="text-color-dark text-transform-none text-9 line-height-3 font-weight-medium mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">Using the very <span class="highlight highlight-primary highlight-bg-opacity highlight-animated" data-appear-animation="highlight-animated-start" data-appear-animation-delay="1200" data-plugin-options="{'flagClassOnly': true}">best ingredients</span> we have access to.</h3>
                    <p class="text-3-5 pb-2 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla efficitur felis quis arcu sodales, sit amet eleifend felis rutrum. Nulla mollis eros eu arcu luctus euismod. Duis accumsan urna sed neque ornare, at varius tellus ultrices. Fusce vel est laoreet, laoreet ex vel, posuere sapien. Sed accumsan metus et metus commodo suscipit. </p>
                    <p class="text-3-5 pb-2 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">Nunc euismod lacus vulputate semper porttitor. Praesent ornare, tellus sit amet condimentum pretium, velit leo dictum tortor, dapibus consequat eros tortor quis massa. Suspendisse volutpat sapien a arcu tincidunt sodales. Donec porta, ex a pulvinar pretium, est metus luctus massa, ut euismod lectus dui nec tellus. Sed eget facilisis ante. Vestibulum vitae tellus mauris. Nulla venenatis ipsum et nulla dignissim consectetur. Phasellus pulvinar eleifend ultrices. </p>
                </div>
            </div>
        </div>

        <section class="section section-height-3 bg-color-grey-scale-1 border-0 m-0">
            <div class="container py-3">
                <div class="row">
                    <div class="col appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="600">
                        <div class="lightbox" data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}, 'mainClass': 'mfp-with-zoom', 'zoom': {'enabled': true, 'duration': 300}}">
                            <div class="owl-carousel-wrapper" style="height: 329.77px;">
                                <div class="carousel-half-full-width-wrapper carousel-half-full-width-right">
                                    <div class="owl-carousel owl-theme carousel-half-full-width-right carousel-shadow-1 nav-bottom nav-bottom-align-left nav-style-1 nav-arrows-thin nav-dark nav-font-size-lg mb-0" data-plugin-options="{'responsive': {'0': {'items': 1}, '576': {'items': 2}, '768': {'items': 3}, '992': {'items': 4}, '1200': {'items': 4}}, 'loop': false, 'nav': true, 'dots': false, 'margin': 20}">
                                        <div>
                                            <a class="d-inline-block img-thumbnail img-thumbnail-no-borders img-thumbnail-hover-icon" href="img/demos/restaurant/generic/generic-1.jpg">
                                                <img src="img/demos/restaurant/generic/generic-1.jpg" class="img-fluid box-shadow-4 rounded-0" alt="Restaurant interior showcase 1" />
                                            </a>
                                        </div>
                                        <div>
                                            <a class="d-inline-block img-thumbnail img-thumbnail-no-borders img-thumbnail-hover-icon" href="img/demos/restaurant/generic/generic-2.jpg">
                                                <img src="img/demos/restaurant/generic/generic-2.jpg" class="img-fluid box-shadow-4 rounded-0" alt="Restaurant interior showcase 1" />
                                            </a>
                                        </div>
                                        <div>
                                            <a class="d-inline-block img-thumbnail img-thumbnail-no-borders img-thumbnail-hover-icon" href="img/demos/restaurant/generic/generic-3.jpg">
                                                <img src="img/demos/restaurant/generic/generic-3.jpg" class="img-fluid box-shadow-4 rounded-0" alt="Restaurant interior showcase 1" />
                                            </a>
                                        </div>
                                        <div>
                                            <a class="d-inline-block img-thumbnail img-thumbnail-no-borders img-thumbnail-hover-icon" href="img/demos/restaurant/generic/generic-4.jpg">
                                                <img src="img/demos/restaurant/generic/generic-4.jpg" class="img-fluid box-shadow-4 rounded-0" alt="Restaurant interior showcase 1" />
                                            </a>
                                        </div>
                                        <div>
                                            <a class="d-inline-block img-thumbnail img-thumbnail-no-borders img-thumbnail-hover-icon" href="img/demos/restaurant/generic/generic-1.jpg">
                                                <img src="img/demos/restaurant/generic/generic-1.jpg" class="img-fluid box-shadow-4 rounded-0" alt="Restaurant interior showcase 1" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container py-5 my-4">
            <div class="row">
                <div class="col">
                    <h3 class="text-color-dark text-transform-none text-9 line-height-3 font-weight-medium mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">Using the very best ingredients we have access to.</h3>
                    <p class="text-3-5 pb-2 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla efficitur felis quis arcu sodales, sit amet eleifend felis rutrum. Nulla mollis eros eu arcu luctus euismod. Duis accumsan urna sed neque ornare, at varius tellus ultrices. Fusce vel est laoreet, laoreet ex vel, posuere sapien. Sed accumsan metus et metus commodo suscipit. </p>
                </div>
            </div>
        </div>

        <section class="section section-height-2 border-0 m-0" data-plugin-parallax data-plugin-options="{'speed': 1.5, 'parallaxHeight': '130%', 'fadeIn': true}" data-image-src="img/demos/restaurant/backgrounds/background-2.jpg">
            <div class="container mb-4">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="d-flex justify-content-center pb-2 mb-4">
                            <i class="fas fa-star text-color-grey opacity-3 text-4-5"></i>
                            <i class="fas fa-star text-color-grey opacity-3 text-4-5 px-2"></i>
                            <i class="fas fa-star text-color-grey opacity-3 text-4-5"></i>
                            <i class="fas fa-star text-color-grey opacity-3 text-4-5 px-2"></i>
                            <i class="fas fa-star text-color-grey opacity-3 text-4-5"></i>
                        </div>
                        <div class="owl-carousel owl-theme nav-style-1 nav-arrows-thin nav-outside nav-dark nav-font-size-lg bg-light box-shadow-4 py-5 py-lg-0 mb-0" data-plugin-options="{'responsive': {'0': {'items': 1, 'dots': true}, '768': {'items': 1}, '992': {'items': 1, 'nav': true, 'dots': false}, '1200': {'items': 1, 'nav': true, 'dots': false}}, 'loop': false, 'autoHeight': true, 'autoplay': true, 'autoplayTimeout': 7000}">
                            <div class="py-3 py-lg-5 px-lg-5">
                                <div class="custom-testimonial-style-1 testimonial testimonial-style-2 testimonial-with-quotes testimonial-remove-right-quote px-0 px-md-4 mx-xl-3 my-3">
                                    <img width="56" height="56" src="img/demos/restaurant/icons/tripadvisor.svg" alt="Tripadvisor Icon" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-dark', 'fadeIn': false}" />
                                    <blockquote class="pt-3 pb-2 px-0 px-md-3">
                                        <p class="text-color-dark text-3-5 line-height-8 alternative-font-4 mb-0">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendreriast ehicula leo, vel efficitur felis ultrices non. Cras a elit sit amet leo acun volutpat. </p>
                                    </blockquote>
                                    <p class="text-color-grey opacity-6">TRIP ADVISOR - NOV 2020</p>
                                    <div class="testimonial-author">
                                        <strong class="font-weight-bold text-4 negative-ls-1">John Doe</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="py-3 py-lg-5 px-lg-5">
                                <div class="custom-testimonial-style-1 testimonial testimonial-style-2 testimonial-with-quotes testimonial-remove-right-quote px-0 px-md-4 mx-xl-3 my-3">
                                    <img width="56" height="56" src="img/demos/restaurant/icons/tripadvisor.svg" alt="Tripadvisor Icon" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-dark', 'fadeIn': false}" />
                                    <blockquote class="pt-3 pb-2 px-0 px-md-3">
                                        <p class="text-color-dark text-3-5 line-height-8 alternative-font-4 mb-0">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendreriast ehicula leo, vel efficitur felis ultrices non. Cras a elit sit amet leo acun volutpat. </p>
                                    </blockquote>
                                    <p class="text-color-grey opacity-6">TRIP ADVISOR - NOV 2020</p>
                                    <div class="testimonial-author">
                                        <strong class="font-weight-bold text-4 negative-ls-1">John Doe</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container py-5 mt-4 mb-1">
            <div class="row">
                <div class="col">
                    <p class="text-3-5 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla efficitur felis quis arcu sodales, sit amet eleifend felis rutrum. Nulla mollis eros eu arcu luctus euismod. Duis accumsan urna sed neque ornare, at varius tellus ultrices. Fusce vel est laoreet, laoreet ex vel, posuere sapien. Sed accumsan metus et metus commodo suscipit. Nunc euismod lacus vulputate semper porttitor. Praesent ornare, tellus sit amet condimentum pretium, velit leo dictum tortor, dapibus consequat eros tortor quis massa. Suspendisse volutpat sapien a arcu tincidunt sodales. Donec porta, ex a pulvinar pretium, est metus luctus massa, ut euismod lectus dui nec tellus. </p>
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

</div>

@endsection
