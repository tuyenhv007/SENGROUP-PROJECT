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
                            @if(Session::get('user'))

                                <li><a href="" class="nav-link">{{Session::get('user')}}</a>
                                </li>

                            @else
                                <li><a href="{{route('login')}}" class="nav-link">Login</a></li>
                                <li><a href="{{route('register')}}" class="nav-link">Register</a></li>
                            @endif
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
            <div class="site-blocks-cover overlay overlay-2"
                 style="background-image: url({{asset('i')}});"
                 data-aos="fade" id="home-section">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-6 mt-lg-5 text-center">
                            <p class="mb-5 text-shadow text-capitalize text-black">Mái ấm thân thương. Đây là nơi để tìm hạnh phúc. Nếu không tìm
                                thấy hạnh phúc ở đây, người ta không thể tìm thấy hạnh phúc ở bất cứ nơi nào khác.
                            </p>
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
                            <p class="mb-5 text-shadow text-capitalize text-black">Mỗi một con người, dù đi khắp tứ phương, rốt cục cũng chỉ muốn
                                tìm một mái nhà để dừng chân ghé về. Có được một nơi gọi là nhà, có được một người
                                thương yêu để cùng chia sẻ vui buồn.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section" id="properties-section">
        <div class="container">
            <div class="row large-gutters">
                @foreach($houses as $key => $house)
                    <div class="col-md-6 col-lg-4 mb-5 mb-lg-5 ">
                        <div class="ftco-media-1">
                            <div class="ftco-media-1-inner">
                                <a href="{{route('houses.show',$house->id)}}" class="d-inline-block mb-4"><img
                                        src="{{asset("storage/".$house->images[0]->image)}}"
                                        alt="FImageo"
                                        class="img-fluid"></a>
                                <div class="ftco-media-details">
                                    <h3>{{$house->name}}</h3>
                                    <p>Ha Noi</p>
                                    <strong>{{$house->price}}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

