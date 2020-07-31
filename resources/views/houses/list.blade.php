@extends('layout.master')
@section('content')
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 col-xl-2">
                    <h1 class="mb-0 site-logo m-0 p-0"><a href="#" class="mb-0">Warehouse</a></h1>
                </div>
                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li><a href="#home-section" class="nav-link">Home</a></li>
                            <li><a href="{{route('houses.postForm')}}" >Đăng bài</a></li>
                            <li><a href="#agents-section" class="nav-link">Agents</a></li>
                            <li><a href="#about-section" class="nav-link">About</a></li>
                            <li><a href="#news-section" class="nav-link">News</a></li>
                            <li><a href="#contact-section" class="nav-link">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3"><a href="#"
                                                                            class="site-menu-toggle js-menu-toggle text-white float-right"><span
                            class="icon-menu h3"></span></a></div>
            </div>
        </div>
    </header>
    <div class="site-block-wrap">
        <div class="owl-carousel with-dots">
            <div class="site-blocks-cover overlay overlay-2" style="background-image: url(images/hero_1.jpg);"
                 data-aos="fade" id="home-section">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-6 mt-lg-5 text-center">
                            <h1 class="text-shadow">Buy &amp; Sell Property Here</h1>
                            <p class="mb-5 text-shadow">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Provident vitae, aut inventore repellendus. Iusto, assumenda! </p>
{{--                            <p><a href="#" target="_blank" class="btn btn-primary px-5 py-3">Get Started</a></p>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-blocks-cover overlay overlay-2" style="background-image: url(images/hero_2.jpg);"
                 data-aos="fade" id="home-section">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-6 mt-lg-5 text-center">
                            <h1 class="text-shadow">Find Your Perfect Property For Your Home</h1>
                            <p class="mb-5 text-shadow">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque
                                quam doloribus reprehenderit dolore adipisci rerum?</p>
{{--                            <p><a href="#" target="_blank" class="btn btn-primary px-5 py-3">Get Started</a></p>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section" id="properties-section">
        <div class="container">
            <div class="row large-gutters">
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5 ">
                    <div class="ftco-media-1">
                        <div class="ftco-media-1-inner">
                            <a href="property-single.html" class="d-inline-block mb-4"><img src="images/property_1.jpg"
                                                                                            alt="FImageo"
                                                                                            class="img-fluid"></a>
                            <div class="ftco-media-details">
                                <h3>HD17 19 Utica Ave.</h3>
                                <p>New York - USA</p>
                                <strong>$20,000,000</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5 ">
                    <div class="ftco-media-1">
                        <div class="ftco-media-1-inner">
                            <a href="property-single.html" class="d-inline-block mb-4"><img src="images/property_2.jpg"
                                                                                            alt="Image"
                                                                                            class="img-fluid"></a>
                            <div class="ftco-media-details">
                                <h3>HD17 19 Utica Ave.</h3>
                                <p>New York - USA</p>
                                <strong>$20,000,000</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5 ">
                    <div class="ftco-media-1">
                        <div class="ftco-media-1-inner">
                            <a href="property-single.html" class="d-inline-block mb-4"><img src="images/property_3.jpg"
                                                                                            alt="Image"
                                                                                            class="img-fluid"></a>
                            <div class="ftco-media-details">
                                <h3>HD17 19 Utica Ave.</h3>
                                <p>New York - USA</p>
                                <strong>$20,000,000</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5 ">
                    <div class="ftco-media-1">
                        <div class="ftco-media-1-inner">
                            <a href="property-single.html" class="d-inline-block mb-4"><img src="images/property_1.jpg"
                                                                                            alt="Image"
                                                                                            class="img-fluid"></a>
                            <div class="ftco-media-details">
                                <h3>HD17 19 Utica Ave.</h3>
                                <p>New York - USA</p>
                                <strong>$20,000,000</strong>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5 ">
                    <div class="ftco-media-1">
                        <div class="ftco-media-1-inner">
                            <a href="property-single.html" class="d-inline-block mb-4"><img src="images/property_2.jpg"
                                                                                            alt="Image"
                                                                                            class="img-fluid"></a>
                            <div class="ftco-media-details">
                                <h3>HD17 19 Utica Ave.</h3>
                                <p>New York - USA</p>
                                <strong>$20,000,000</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5 ">
                    <div class="ftco-media-1">
                        <div class="ftco-media-1-inner">
                            <a href="property-single.html" class="d-inline-block mb-4"><img src="images/property_3.jpg"
                                                                                            alt="Image"
                                                                                            class="img-fluid"></a>
                            <div class="ftco-media-details">
                                <h3>HD17 19 Utica Ave.</h3>
                                <p>New York - USA</p>
                                <strong>$20,000,000</strong>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
