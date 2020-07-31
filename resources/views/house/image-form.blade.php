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
                        <h1 class="mb-0 site-logo m-0 p-0"><a href="#" class="mb-0">Warehouse</a></h1>
                    </div>
                    <div class="col-12 col-md-10 d-none d-xl-block">
                        <nav class="site-navigation position-relative text-right" role="navigation">
                            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                                <li><a href="#home-section" class="nav-link">Home</a></li>
                                <li><a href="" class="nav-link">Properties</a></li>
                                <li><a href="" class="nav-link">Agents</a></li>
                                <li><a href="" class="nav-link">About</a></li>
                                <li><a href="" class="nav-link">News</a></li>
                                <li><a href="" class="nav-link">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3"><a href="#"
                                                                                class="site-menu-toggle js-menu-toggle text-white float-right"><span
                                class="icon-menu h3"></span></a></div>
                </div>
            </div>
        </header>
    </div>
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    <div class="site-block-wrap">
        <div class="owl-carousel with-dots">
            <div class="site-blocks-cover overlay overlay-2"
                 style="background-image: url({{asset('images/hero_1.jpg')}});"
                 data-aos="fade" id="home-section">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-6 mt-lg-5 text-center">
                            <h1 class="text-shadow">Buy &amp; Sell Property Here</h1>
                            <p class="mb-5 text-shadow">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Provident vitae, aut inventore repellendus. Iusto, assumenda! </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-blocks-cover overlay overlay-2"
                 style="background-image: url({{asset('images/hero_2.jpg')}});"
                 data-aos="fade" id="home-section">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-6 mt-lg-5 text-center">
                            <h1 class="text-shadow">Find Your Perfect Property For Your Home</h1>
                            <p class="mb-5 text-shadow">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque
                                quam doloribus reprehenderit dolore adipisci rerum?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <strong>Hình ảnh</strong>
        </div>
        <div class="card-body">
            <form method="post" action="">
                <div>
                    <div class="col-xs-12">
                        <div>
                            <input class="btn btn-brand btn-large" name="image" type="file" accept="image/*"
                                   multiple="" required>
                        </div>
                        <div class="alert alert-danger">

                        </div>
                    </div>
                    <div style="display: inline-block;"><span><i
                                class="fa fa-hand-o-left fa-1x"></i><!-- react-text: 1729 -->
                            <!-- /react-text --><em>Bạn cần đăng ít nhất 3 hình</em></span></div>
                </div>
                <!-- react-empty: 1732 -->
                <div class="col-xs-12">
                    <div class="alert alert-info"><p><b>Để cho thuê nhanh hơn:</b></p>
                        <ul>
                            <li>Chụp hình khổ ngang: phòng trọ, phòng vệ sinh, không gian sử dụng chung (nếu có),
                                bên ngoài, ...
                            </li>
                        </ul>
                        <br>
                        <p><b>Không</b></p>
                        <ul>
                            <li>Sử dụng hình ảnh trùng lặp hoặc lấy từ Internet</li>
                            <li>Chèn số điện thoại/email/logo vào hình</li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="footer navbar-fixed-bottom">
                    <div>
                        <div ><a
                                class="btn btn-lg btn-primary " type="submit">
                                <span
                                >TIẾP TỤC
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
