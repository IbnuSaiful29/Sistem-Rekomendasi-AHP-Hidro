@extends('front.layouts.main')
@section('contents')

<div role="main" class="main">

    <section class="section section-with-shape-divider section-height-5 overlay overlay-show border-0 m-0" data-plugin-parallax data-plugin-options="{'speed': 1.5, 'parallaxHeight': '120%', 'fadeIn': true}" data-image-src="img/demos/restaurant/backgrounds/background-1.jpg">
        <div class="container position-relative py-5 mb-5">
            <div class="row align-items-center h-100 mb-4">
                <div class="col text-center">
                    <div class="text-color-primary d-inline-flex align-items-center custom-font-secondary text-4">
                        <div class="custom-line appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="600"></div>
                        <div class="overflow-hidden">
                            <span class="d-block positive-ls-2 font-weight-medium text-4 px-4 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300">WELCOME TO</span>
                        </div>
                        <div class="custom-line appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="600"></div>
                    </div>
                    <h1 class="text-color-light font-weight-bold positive-ls-1 line-height-1 custom-big-font-size-1 mb-2 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="700">Porto Restaurant</h1>
                    <p class="text-color-light text-4 opacity-8 pb-3 mb-4" data-plugin-animated-letters data-plugin-options="{'startDelay': 1100, 'minWindowWidth': 0}" style="height: 42px;">The best place to eat in downtown Porto!</p>
                    <a href="demo-restaurant-menu.html" class="btn btn-light btn-outline text-2-5 text-color-light border-color-light-2 font-weight-medium positive-ls-2 text-color-hover-dark px-5 btn-py-3 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="2200">VIEW MENU</a>
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

    <div id="aboutus" class="container py-5 mt-3 mb-5">
        <div class="row row-gutter-sm align-items-center justify-content-center">
            <div class="col-6 col-md-4 col-lg-3 align-self-start">
                <img src="img/demos/restaurant/generic/generic-1-big.jpg" class="img-fluid box-shadow-4 rounded-0" alt="Restaurant inside showcase 1" />
            </div>
            <div class="col-6 col-md-4 col-lg-3 align-self-start mb-5 mb-lg-0">
                <img src="img/demos/restaurant/generic/generic-2-small.jpg" class="img-fluid box-shadow-4 rounded-0 mb-3 mb-sm-4" alt="Restaurant inside showcase 2" />
                <img src="img/demos/restaurant/generic/generic-3-small.jpg" class="img-fluid box-shadow-4 rounded-0" alt="Restaurant inside showcase 3" />
            </div>
            <div class="col-lg-6 ps-lg-3 ps-xl-5">
                <h2 class="text-color-primary positive-ls-3 text-4 line-height-3 mb-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">ABOUT US</h2>
                <h3 class="text-color-dark text-transform-none text-9 line-height-3 font-weight-medium mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">Using the very <span class="highlight highlight-primary highlight-bg-opacity highlight-animated" data-appear-animation="highlight-animated-start" data-appear-animation-delay="1200" data-plugin-options="{'flagClassOnly': true}">best ingredients</span> we have access to.</h3>
                <p class="text-3-5 pb-2 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque molestie vel turpis a sodales. In hac habitasse platea dictumst. Nulla sollicitudin dui vitae leo aliquet. </p>
                <a href="#" class="btn btn-dark font-weight-medium text-3 btn-px-4 py-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">More About Us</a>
            </div>
        </div>
    </div>

    <section class="section section-height-2 border-0 m-0" data-plugin-parallax data-plugin-options="{'speed': 1.5, 'parallaxHeight': '130%', 'fadeIn': true}" data-image-src="img/demos/restaurant/backgrounds/background-2.jpg">
        <div class="container mb-4">
            <div class="row justify-content-center appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="300">
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

    <div class="container py-5 my-5">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10 text-center">
                <h2 class="text-color-primary positive-ls-3 text-4 line-height-3 mb-2">WHAT WE OFFER</h2>
                <h3 class="text-color-dark text-transform-none text-9 line-height-3 font-weight-medium mb-4">Our Menu</h3>
                <p class="text-3-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. <span class="highlight highlight-primary highlight-bg-opacity highlight-animated" data-appear-animation="highlight-animated-start" data-appear-animation-delay="300" data-plugin-options="{'flagClassOnly': true}">Pellentesque molestie vel turpis a sodales.</span> In hac habitasse platea dictumst. Nulla sollicitudin dui vitae leo aliquet, vel feugiat augue pellentesque. </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h4 class="text-color-dark font-weight-bold positive-ls-3 mb-3">APPETIZERS</h4>
                <hr class="custom-divider-size-1 bg-color-grey-scale-2 mt-2 mb-4">
                <div class="pt-2">

                    <div class="custom-menu-item">
                        <div class="custom-menu-item-details">
                            <div class="custom-menu-item-title">
                                <h5 class="custom-secondary-font text-transform-none font-weight-semibold text-4 mb-0">Whitefish Or Lox & Cream Cheese</h5>
                            </div>
                            <div class="custom-menu-item-line opacity-4"></div>
                            <div class="custom-menu-item-price">
                                <strong class="custom-font-secondary text-color-dark text-4 positive-ls-3">
                                    <span class="text-2-5">$</span>16
                                </strong>
                            </div>
                        </div>
                        <div class="custom-menu-item-desc">
                            <p class="text-2-5 line-height-4">Includes bread and butter</p>
                        </div>
                    </div>

                    <div class="custom-menu-item">
                        <div class="custom-menu-item-details">
                            <div class="custom-menu-item-title">
                                <h5 class="custom-secondary-font text-transform-none font-weight-semibold text-4 mb-0">Canned Tuna</h5>
                            </div>
                            <div class="custom-menu-item-line opacity-4"></div>
                            <div class="custom-menu-item-price">
                                <strong class="custom-font-secondary text-color-dark text-4 positive-ls-3">
                                    <span class="text-2-5">$</span>10
                                </strong>
                            </div>
                        </div>
                        <div class="custom-menu-item-desc">
                            <p class="text-2-5 line-height-4">Includes bread and butter</p>
                        </div>
                    </div>

                    <div class="custom-menu-item">
                        <div class="custom-menu-item-details">
                            <div class="custom-menu-item-title">
                                <h5 class="custom-secondary-font text-transform-none font-weight-semibold text-4 mb-0">Creamed Herring</h5>
                            </div>
                            <div class="custom-menu-item-line opacity-4"></div>
                            <div class="custom-menu-item-price">
                                <strong class="custom-font-secondary text-color-dark text-4 positive-ls-3">
                                    <span class="text-2-5">$</span>8.50
                                </strong>
                            </div>
                        </div>
                        <div class="custom-menu-item-desc">
                            <p class="text-2-5 line-height-4">Includes bread and butter</p>
                        </div>
                    </div>

                    <div class="custom-menu-item">
                        <div class="custom-menu-item-details">
                            <div class="custom-menu-item-title">
                                <h5 class="custom-secondary-font text-transform-none font-weight-semibold text-4 mb-0">Whitefish Or Lox + Cream Cheese</h5>
                            </div>
                            <div class="custom-menu-item-line opacity-4"></div>
                            <div class="custom-menu-item-price">
                                <strong class="custom-font-secondary text-color-dark text-4 positive-ls-3">
                                    <span class="text-2-5">$</span>16
                                </strong>
                            </div>
                        </div>
                        <div class="custom-menu-item-desc">
                            <p class="text-2-5 line-height-4">Includes bread and butter</p>
                        </div>
                    </div>

                    <div class="custom-menu-item">
                        <div class="custom-menu-item-details">
                            <div class="custom-menu-item-title">
                                <h5 class="custom-secondary-font text-transform-none font-weight-semibold text-4 mb-0">Canned Tuna</h5>
                            </div>
                            <div class="custom-menu-item-line opacity-4"></div>
                            <div class="custom-menu-item-price">
                                <strong class="custom-font-secondary text-color-dark text-4 positive-ls-3">
                                    <span class="text-2-5">$</span>10
                                </strong>
                            </div>
                        </div>
                        <div class="custom-menu-item-desc">
                            <p class="text-2-5 line-height-4">Includes bread and butter</p>
                        </div>
                    </div>

                    <div class="custom-menu-item">
                        <div class="custom-menu-item-details">
                            <div class="custom-menu-item-title">
                                <h5 class="custom-secondary-font text-transform-none font-weight-semibold text-4 mb-0">Creamed Herring</h5>
                            </div>
                            <div class="custom-menu-item-line opacity-4"></div>
                            <div class="custom-menu-item-price">
                                <strong class="custom-font-secondary text-color-dark text-4 positive-ls-3">
                                    <span class="text-2-5">$</span>8.50
                                </strong>
                            </div>
                        </div>
                        <div class="custom-menu-item-desc">
                            <p class="text-2-5 line-height-4">Includes bread and butter</p>
                        </div>
                    </div>

                    <div class="custom-menu-item">
                        <div class="custom-menu-item-details">
                            <div class="custom-menu-item-title">
                                <h5 class="custom-secondary-font text-transform-none font-weight-semibold text-4 mb-0">Whitefish Or Lox & Cream Cheese</h5>
                            </div>
                            <div class="custom-menu-item-line opacity-4"></div>
                            <div class="custom-menu-item-price">
                                <strong class="custom-font-secondary text-color-dark text-4 positive-ls-3">
                                    <span class="text-2-5">$</span>16
                                </strong>
                            </div>
                        </div>
                        <div class="custom-menu-item-desc">
                            <p class="text-2-5 line-height-4">Includes bread and butter</p>
                        </div>
                    </div>

                    <div class="custom-menu-item">
                        <div class="custom-menu-item-details">
                            <div class="custom-menu-item-title">
                                <h5 class="custom-secondary-font text-transform-none font-weight-semibold text-4 mb-0">Canned Tuna</h5>
                            </div>
                            <div class="custom-menu-item-line opacity-4"></div>
                            <div class="custom-menu-item-price">
                                <strong class="custom-font-secondary text-color-dark text-4 positive-ls-3">
                                    <span class="text-2-5">$</span>10
                                </strong>
                            </div>
                        </div>
                        <div class="custom-menu-item-desc">
                            <p class="text-2-5 line-height-4">Includes bread and butter</p>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h4 class="text-color-dark font-weight-bold positive-ls-3 mb-3">MAIN MENU</h4>
                <hr class="custom-divider-size-1 bg-color-grey-scale-2 mt-2 mb-4">
                <div class="pt-2">

                    <div class="custom-menu-item">
                        <div class="custom-menu-item-details">
                            <div class="custom-menu-item-title">
                                <h5 class="custom-secondary-font text-transform-none font-weight-semibold text-4 mb-0">Platter Of Soft Tender Hot Pastrami</h5>
                            </div>
                            <div class="custom-menu-item-line opacity-4"></div>
                            <div class="custom-menu-item-price">
                                <strong class="custom-font-secondary text-color-dark text-4 positive-ls-3">
                                    <span class="text-2-5">$</span>32
                                </strong>
                            </div>
                        </div>
                        <div class="custom-menu-item-desc">
                            <p class="text-2-5 line-height-4">Served with chopped liver, swiss cheese, french fries, baked beans, cole slaw, tomato and pickle</p>
                        </div>
                    </div>

                    <div class="custom-menu-item">
                        <div class="custom-menu-item-details">
                            <div class="custom-menu-item-title">
                                <h5 class="custom-secondary-font text-transform-none font-weight-semibold text-4 mb-0">Hot Pastrami</h5>
                            </div>
                            <div class="custom-menu-item-line opacity-4"></div>
                            <div class="custom-menu-item-price">
                                <strong class="custom-font-secondary text-color-dark text-4 positive-ls-3">
                                    <span class="text-2-5">$</span>15
                                </strong>
                            </div>
                        </div>
                        <div class="custom-menu-item-desc">
                            <p class="text-2-5 line-height-4">Sauerkraut and nippy cheese grilled on rye</p>
                        </div>
                    </div>

                    <div class="custom-menu-item">
                        <div class="custom-menu-item-details">
                            <div class="custom-menu-item-title">
                                <h5 class="custom-secondary-font text-transform-none font-weight-semibold text-4 mb-0">Chicken In The Pot</h5>
                            </div>
                            <div class="custom-menu-item-line opacity-4"></div>
                            <div class="custom-menu-item-price">
                                <strong class="custom-font-secondary text-color-dark text-4 positive-ls-3">
                                    <span class="text-2-5">$</span>42
                                </strong>
                            </div>
                        </div>
                        <div class="custom-menu-item-desc">
                            <p class="text-2-5 line-height-4">Boiled chicken with matzo ball, noodles, vegetable and delicious broth - all in the pot</p>
                        </div>
                    </div>

                </div>

                <h4 class="text-color-dark font-weight-bold positive-ls-3 mt-5 mb-3">DESSERT</h4>
                <hr class="custom-divider-size-1 bg-color-grey-scale-2 mt-2 mb-4">
                <div class="pt-2">

                    <div class="custom-menu-item">
                        <div class="custom-menu-item-details">
                            <div class="custom-menu-item-title">
                                <h5 class="custom-secondary-font text-transform-none font-weight-semibold text-4 mb-0">Apple Pie</h5>
                            </div>
                            <div class="custom-menu-item-line opacity-4"></div>
                            <div class="custom-menu-item-price">
                                <strong class="custom-font-secondary text-color-dark text-4 positive-ls-3">
                                    <span class="text-2-5">$</span>9
                                </strong>
                            </div>
                        </div>
                        <div class="custom-menu-item-desc">
                            <p class="text-2-5 line-height-4">With Brandy Sauce</p>
                        </div>
                    </div>

                    <div class="custom-menu-item">
                        <div class="custom-menu-item-details">
                            <div class="custom-menu-item-title">
                                <h5 class="custom-secondary-font text-transform-none font-weight-semibold text-4 mb-0">Cheesecake</h5>
                            </div>
                            <div class="custom-menu-item-line opacity-4"></div>
                            <div class="custom-menu-item-price">
                                <strong class="custom-font-secondary text-color-dark text-4 positive-ls-3">
                                    <span class="text-2-5">$</span>7
                                </strong>
                            </div>
                        </div>
                        <div class="custom-menu-item-desc">
                            <p class="text-2-5 line-height-4">Strawberry Shortcake With Ice Cream</p>
                        </div>
                    </div>

                    <div class="custom-menu-item">
                        <div class="custom-menu-item-details">
                            <div class="custom-menu-item-title">
                                <h5 class="custom-secondary-font text-transform-none font-weight-semibold text-4 mb-0">Apple Strudel</h5>
                            </div>
                            <div class="custom-menu-item-line opacity-4"></div>
                            <div class="custom-menu-item-price">
                                <strong class="custom-font-secondary text-color-dark text-4 positive-ls-3">
                                    <span class="text-2-5">$</span>8
                                </strong>
                            </div>
                        </div>
                        <div class="custom-menu-item-desc">
                            <p class="text-2-5 line-height-4">Special Apple Strudel</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row pt-2 mt-4">
            <div class="col text-center">
                <a href="demo-restaurant-contact.html" class="btn btn-dark custom-btn-style-1 font-weight-medium text-3 btn-px-5 py-3"><span>View Full Menu</span></a>
            </div>
        </div>
    </div>

    <section class="section section-height-3 bg-color-grey-scale-1 border-0 m-0">
        <div class="container pt-2">
            <div class="row">
                <div class="col text-center">
                    <h2 class="text-color-primary positive-ls-3 text-4 line-height-1 mb-2 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="200">INSIDE PORTO</h2>
                    <h3 class="text-color-dark text-transform-none text-9 line-height-3 font-weight-medium mb-4 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="400">Our Gallery</h3>
                </div>
            </div>
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

    <section class="section bg-transparent border border-top-0 border-end-0 border-start-0 position-relative m-0">
        <img src="img/demos/restaurant/backgrounds/background-top-left-1.jpg" class="img-fluid position-absolute top-0 left-0" alt="Author left drawn food background image" />
        <img src="img/demos/restaurant/backgrounds/background-top-right-1.jpg" class="img-fluid position-absolute top-0 right-0 d-none d-md-block" alt="Author right drawn food background image" />
        <div class="container">
            <div class="row align-items-center justify-content-center flex-xl-nowrap">
                <div class="col-auto mb-5 mb-xl-0">
                    <img src="img/demos/restaurant/cheff.jpg" class="img-fluid rounded-circle" alt="Restaurant Cheff mounting a dish" />
                </div>
                <div class="w-100">
                    <div class="custom-testimonial-style-1 custom-testimonial-style-1-quote-big testimonial testimonial-style-2 testimonial-with-quotes testimonial-remove-right-quote text-center text-lg-start mb-0">
                        <blockquote class="py-0 px-4 mb-3">
                            <p class="text-color-dark text-4 line-height-8 alternative-font-4 px-4 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque molestie vel turpis a sodales. In hac habitasse platea dictumst. Nulla <span class="highlight highlight-primary highlight-bg-opacity highlight-animated" data-appear-animation="highlight-animated-start" data-appear-animation-delay="300" data-plugin-options="{'flagClassOnly': true}">sollicitudin dui vitae leo aliquet, vel feugiat</span> augue pellentesque. In nec augue. </p>
                        </blockquote>
                        <div class="testimonial-author d-block ps-lg-5">
                            <strong class="font-weight-bold text-3 positive-ls-2 mb-3">JOHN DOE - CHEFF</strong>
                            <img src="img/signature.png" class="img-fluid mw-100 mb-0" alt="Restaurant Cheff Signature" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container pt-4 pb-3 my-5">
        <div class="row">
            <div class="col text-center">
                <h2 class="text-color-primary positive-ls-3 text-4 line-height-1 mb-2 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="200">RECENT NEWS</h2>
                <h3 class="text-color-dark text-transform-none text-9 line-height-4 font-weight-medium mb-4 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="400">Our Blog</h3>
            </div>
        </div>
        <div class="row row-gutter-sm justify-content-center mb-4 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="600">
            <div class="col-10 col-sm-9 col-md-6 col-lg-4 mb-4 mb-lg-0">
                <a href="demo-restaurant-blog-post.html" class="custom-link-hover-effects text-decoration-none">
                    <div class="card border-0 box-shadow-4">
                        <div class="card-img-top position-relative overlay">
                            <div class="position-absolute bottom-10 right-0 d-flex justify-content-end w-100 py-3 px-4 z-index-3">
                                <span class="custom-date-style-1 text-center bg-primary text-color-light font-weight-semibold text-5-5 line-height-2 px-3 py-2">
                                    <span class="position-relative text-center z-index-2">
                                        18
                                        <span class="d-block custom-font-size-1 pe-1 ps-2">FEB</span>
                                    </span>
                                </span>
                            </div>
                            <img src="img/demos/restaurant/blog/blog-1.jpg" class="img-fluid" alt="Lorem Ipsum Dolor" />
                        </div>
                        <div class="card-body p-4">
                            <span class="d-block text-color-grey font-weight-semibold positive-ls-2 text-2">FOOD</span>
                            <h4 class="font-weight-semibold text-5 text-color-hover-primary mb-2">Lorem ipsum dolor sit a met, consectetur</h4>
                            <a href="#" class="font-weight-semibold text-color-primary text-decoration-none">View More</a>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-10 col-sm-9 col-md-6 col-lg-4 mb-4 mb-lg-0">
                <a href="demo-restaurant-blog-post.html" class="custom-link-hover-effects text-decoration-none">
                    <div class="card border-0 box-shadow-4">
                        <div class="card-img-top position-relative overlay">
                            <div class="position-absolute bottom-10 right-0 d-flex justify-content-end w-100 py-3 px-4 z-index-3">
                                <span class="custom-date-style-1 text-center bg-primary text-color-light font-weight-semibold text-5-5 line-height-2 px-3 py-2">
                                    <span class="position-relative text-center z-index-2">
                                        15
                                        <span class="d-block custom-font-size-1 pe-1 ps-2">FEB</span>
                                    </span>
                                </span>
                            </div>
                            <img src="img/demos/restaurant/blog/blog-2.jpg" class="img-fluid" alt="Lorem Ipsum Dolor" />
                        </div>
                        <div class="card-body p-4">
                            <span class="d-block text-color-grey font-weight-semibold positive-ls-2 text-2">FOOD</span>
                            <h4 class="font-weight-semibold text-5 text-color-hover-primary mb-2">Lorem ipsum dolor sit a met, consectetur</h4>
                            <a href="#" class="font-weight-semibold text-color-primary text-decoration-none">View More</a>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-10 col-sm-9 col-md-6 col-lg-4">
                <a href="demo-restaurant-blog-post.html" class="custom-link-hover-effects text-decoration-none">
                    <div class="card border-0 box-shadow-4">
                        <div class="card-img-top position-relative overlay">
                            <div class="position-absolute bottom-10 right-0 d-flex justify-content-end w-100 py-3 px-4 z-index-3">
                                <span class="custom-date-style-1 text-center bg-primary text-color-light font-weight-semibold text-5-5 line-height-2 px-3 py-2">
                                    <span class="position-relative text-center z-index-2">
                                        12
                                        <span class="d-block custom-font-size-1 pe-1 ps-2">FEB</span>
                                    </span>
                                </span>
                            </div>
                            <img src="img/demos/restaurant/blog/blog-3.jpg" class="img-fluid" alt="Lorem Ipsum Dolor" />
                        </div>
                        <div class="card-body p-4">
                            <span class="d-block text-color-grey font-weight-semibold positive-ls-2 text-2">FOOD</span>
                            <h4 class="font-weight-semibold text-5 text-color-hover-primary mb-2">Lorem ipsum dolor sit a met, consectetur</h4>
                            <a href="#" class="font-weight-semibold text-color-primary text-decoration-none">View More</a>
                        </div>
                    </div>
                </a>
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
