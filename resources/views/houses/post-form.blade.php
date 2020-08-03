@extends('layout.master')
@section('content')
    <div class="site-blocks-cover inner-page-cover overlay"
         style="background-image: url({{asset('images/hero_1.jpg')}});" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center">
            </div>
        </div>
        <a href="#property-details" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
    </div>

</div>
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 col-xl-2">

                </div>
                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li><a href="#home-section" class="nav-link">Home</a></li>
                            <li><a href="{{route('houses.postForm')}}">Đăng bài</a></li>
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
<div class="site-blocks-cover inner-page-cover overlay"
     style="background-image: url({{asset('images/hero_1.jpg')}});" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center">
        </div>
    </div>
    <a href="#property-details" class="smoothscroll arrow-down"></a>
</div>
<div class="container pt-5">
    <div class="card">
        <div class="card-header">
            <h4>Đăng bài cho thuê nhà</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <form method="post">
                    @csrf
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" name="name" class="form-control">
                    </div>


                    <div class="form-group">
                        <form method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Title:</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Type:</label>
                                <input type="text" name="type" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Chọn tỉnh/thành phố:</label>
                                <select class="form-control city-up" name="city">
                                    <option value="">---</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Chọn quận huyện:</label>
                                <select class="form-control" name="district">
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Chọn xã phường:</label>
                                <select class="form-control" name="road">
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Số nhà :</label>
                                <input type="text" name="sn" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Rooms:</label>
                                <input type="text" name="rooms" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Price:</label>
                                <input type="text" name="price" class="form-control">


                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Đăng bài</button>
                                <a href="{{route('houses.list')}}" class="btn btn-secondary">Thoát</a>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
@endsection
