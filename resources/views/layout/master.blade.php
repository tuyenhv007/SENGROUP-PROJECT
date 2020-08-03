<!DOCTYPE html>
<html lang="en">
<head>
    <title>Warehouse &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('js/ajax-city.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Oswald:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Oswald:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/aos.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/drop.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/liner_icon.css')}}">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="{{asset('js/ajax-city.js')}}"></script>
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
</div>
<header class="main_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a style="font-size:170%;font-style: inherit;" class="navbar-brand" href=""> WAREHOUSE </a>

                        <div class="collapse navbar-collapse main-menu-item justify-content-center"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                <a class="nav-link" href="{{route('houses.list')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('houses.postForm')}}">Đăng bài</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="category.html"> Category</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact</a>
                                </li>
                                @if(Session::get('user'))
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-user-o" aria-hidden="true"></i>
                                        {{Session::get('user')->name}}
                                    </a>
                                    <div style="margin-left: 30px " class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a style="text-align: center" class="dropdown-item" href="single-blog.html">Edit Profile</a>
                                    <a style="text-align: center" class="dropdown-item" href="{{route('logout')}}">Logout</a>
                                    </div>
                                </li>
                                @else
                                <li class="nav-item">
                                <a class="nav-link" href="{{route('login')}}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('register')}}">Register</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                        <div style="margin-top: 10px" class="header_social_icon d-none d-lg-block">
                            <ul>
                                <li><a href="#" class="d-none d-lg-block"><i class="fa fa-facebook fa-lg" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="d-none d-lg-block"><i class="fa fa-google fa-lg" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="d-none d-lg-block"><i class="fa fa-instagram fa-lg" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="d-none d-lg-block"><i class="fa fa-skype fa-lg" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

@yield('content')
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
</html>
