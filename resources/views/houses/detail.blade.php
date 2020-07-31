@extends('layout.master')
@section('content')
    <div class="site-wrap">
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
                        <h1 class="mb-0 site-logo m-0 p-0"><a href="index.html" class="mb-0">Warehouse</a></h1>
                    </div>
                    <div class="col-12 col-md-10 d-none d-xl-block">
                        <nav class="site-navigation position-relative text-right" role="navigation">

                            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                                <li><a href="index.html#home-section" class="nav-link">Home</a></li>
                                <li><a href="index.html#properties-section" class="nav-link active">Properties</a></li>
                                <li><a href="index.html#agents-section" class="nav-link">Agents</a></li>
                                <li><a href="index.html#about-section" class="nav-link">About</a></li>
                                <li><a href="index.html#news-section" class="nav-link">News</a></li>
                                <li><a href="index.html#contact-section" class="nav-link">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3"><a href="#"
                                                                                class="site-menu-toggle js-menu-toggle text-white float-right"><span
                                class="icon-menu h3"></span></a></div>
                </div>
            </div>
        </header>


        <div class="site-blocks-cover inner-page-cover overlay"
             style="background-image: url({{asset('images/hero_1.jpg')}});" data-aos="fade">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-5 mx-auto mt-lg-5 text-center">
                        <h1>Ha Noi</h1>
                        <p class="mb-5"><strong class="text-white">{{$house->price}}</strong></p>
                    </div>
                </div>
            </div>
            <a href="#property-details" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
        </div>
        <div class="site-section" id="property-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="owl-carousel slide-one-item with-dots">
                            <div><img src="{{asset('images/property_1.jpg')}}" alt="Image" class="img-fluid"></div>
                            <div><img src="{{asset('images/property_2.jpg')}}" alt="Image" class="img-fluid"></div>
                            <div><img src="{{asset('images/property_3.jpg')}}" alt="Image" class="img-fluid"></div>
                        </div>
                    </div>
                    <div class="col-lg-5 pl-lg-5 ml-auto">
                        <div class="mb-5">
                            <h3 class="text-black mb-4">Property Details</h3>
                            <p>6 Beds, 4 Baths, 4250 sqft.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa tempore repudiandae optio
                                aliquam perspiciatis est quae enim quaerat eos hic dolorem accusamus molestias repellat
                                consequatur velit, officiis nihil magnam placeat!</p>
                            <p>Ex, esse? Obcaecati nam in cum eius quaerat repellendus adipisci ducimus dolorum sed
                                quos. Amet recusandae cumque reprehenderit nam quia voluptatibus, repellat, aspernatur
                                ut fuga perferendis consectetur excepturi neque in!</p>
                            <p class="mb-4">Neque facilis iure earum, placeat odit ipsum, amet, optio accusantium
                                voluptatem quasi obcaecati fugit? Explicabo eius dolorem provident quis non voluptas,
                                dignissimos tempora eligendi, in, nam velit, quasi tenetur. Animi!</p>
                            <p><a href="#" class="btn btn-primary">Đặt Thuê</a></p>
                        </div>
                        <div class="mb-5">
                            <div class="mt-5">
                                <img src="{{asset('images/person_1.jpg')}}" alt="Image"
                                     class="w-25 mb-3 rounded-circle">
                                <h4 class="text-black">Kyla Stewart</h4>
                                <p class="text-muted mb-4">Real Estate Agent</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, iure atque sit ratione
                                    vitae neque! Laborum voluptate eius, laboriosam explicabo!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
