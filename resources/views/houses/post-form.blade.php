<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Warehouse &mdash; Website Template by Colorlib</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta charset="utf-8">
    <script src="{{asset('js/ajax-city.js')}}"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Oswald:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
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

                </div>
                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li><a href="{{route('houses.list')}}" class="nav-link text-white">Home</a></li>
                            <li><a href="{{route('houses.postForm')}}" class="nav-link text-white">Đăng bài</a></li>
                            <li><a href="#agents-section" class="nav-link text-white">Agents</a></li>
                            <li><a href="#about-section" class="nav-link text-white">About</a></li>
                            <li><a href="#news-section" class="nav-link text-white">News</a></li>
                            <li><a href="#contact-section" class="nav-link text-white">Contact</a></li>
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
         style="background-image: url({{asset('images/icons/anh7.jpg')}});" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center">

            </div>
        </div>
    </div>
</div>
<div class="container pt-5">
    <div class="card">
        <div class="card-header">
            <h4>Đăng bài cho thuê nhà</h4>
        </div>
        <div class="card-body">
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
                        <label>Địa chỉ :</label>
                        <textarea name="sn" class="form-control" rows="3"></textarea>
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
</div>
<a href="#top" class="gototop"><span class="icon-angle-double-up"></span></a>
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>
<script src="{{asset('js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('js/jquery.sticky.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
</html>

