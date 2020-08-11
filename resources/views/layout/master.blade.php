<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sen-Group</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('js/ajax-city.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" sizes="32x32"
          href="{{asset('5450a1d242bd8945c12b0c8db58a2bcd.ico/favicon-32x32.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Oswald:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
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
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/drop.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/liner_icon.css')}}">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{assert('css/profile.css')}}">
    <link rel="stylesheet" href="{{assert('css/login.css')}}">
    <link rel="stylesheet" href="{{assert('css/comment.css')}}">
    <link rel="stylesheet" href="{{assert('css/rating.css')}}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="{{asset('js/image-ajax.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/ajax-avatar.js')}}" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>

    <script src="{{asset('js/rating.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/ajax-city1.js')}}" type="text/javascript"></script>


</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
@include('sweetalert::alert')
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
                    <a style="font-size:190%;font-style: oblique;font-family: Consolas; margin-top: 6px"
                       class="navbar-brand"
                       href="{{route('houses.list')}}">
                        SENGROUP</a>

                    <div class="collapse navbar-collapse main-menu-item justify-content-center"
                         id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a style="font-family: inherit" class="nav-link" href="{{route('houses.list')}}">Trang
                                    chủ</a>
                            </li>
                            <li style="font-family: inherit" class="nav-item">
                                <a style="font-family: inherit" class="nav-link" href="{{route('houses.postForm')}}">Đăng
                                    bài</a>
                            </li>
                            <li class="nav-item">
                                <a style="font-family: inherit" class="nav-link" href="#"> Category</a>
                            </li>
                            <li class="nav-item">
                                <a style="font-family: inherit" class="nav-link" href="#">Contact</a>
                            </li>
                            @if(Session::get('user'))
                                <li class="nav-item dropdown">
                                    <a style="font-family: inherit" class="nav-link dropdown-toggle" href="#"
                                       id="navbarDropdown" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class='fas fa-user'></i> &nbsp;
                                        {{Session::get('user')->name}}
                                    </a>
                                    <div style="margin-left: 30px " class="dropdown-menu"
                                         aria-labelledby="navbarDropdown">

                                        <a style="text-align: center" class="dropdown-item"
                                           href="{{route('user.houseUser',\Illuminate\Support\Facades\Session::get('user')->id)}}">Nhà
                                            đã đăng</a>
                                        <a style="text-align: center" class="dropdown-item"
                                           href="{{route('user.show',['id'=>Session::get('user')->id])}}">Hồ sơ
                                        </a>
                                        <a style="text-align: center" class="dropdown-item"
                                           href="{{route('user.showIncome',Session::get('user')->id)}}">Thống kê doanh thu
                                        </a>
                                        <a style="text-align: center" class="dropdown-item"
                                           href="{{route('user.historyBookHouses',Session::get('user')->id)}}">Lịch sử
                                            thuê nhà
                                        </a>
                                        <a style="text-align: center" class="dropdown-item"
                                           href="{{route('user.formChangePassword',Session::get('user')->id)}}">Đổi mật
                                            khẩu
                                        </a>
                                        <a style="text-align: center" class="dropdown-item" href="{{route('logout')}}">Đăng
                                            xuất</a>
                                    </div>
                                </li>
                            @elseif(Auth::user())
                                <li class="nav-item dropdown">
                                    <a style="font-family: inherit" class="nav-link dropdown-toggle" href="#"
                                       id="navbarDropdown" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class='fas fa-user'></i> &nbsp;
                                        {{Auth::user()->name}}
                                    </a>
                                    <div style="margin-left: 30px " class="dropdown-menu"
                                         aria-labelledby="navbarDropdown">
                                        <a style="text-align: center" class="dropdown-item"
                                           href="{{route('user.houseUser',Auth::id())}}">Nhà
                                            đã đăng</a>
                                        <a style="text-align: center" class="dropdown-item"
                                           href="{{route('user.show',['id'=>Auth::user()->id])}}">Hồ sơ
                                        </a>
                                        <a style="text-align: center" class="dropdown-item"
                                           href="{{route('user.showIncome',Auth::user()->id)}}">Thống kê doanh thu
                                        </a>
                                        <a style="text-align: center" class="dropdown-item"
                                           href="{{route('user.historyBookHouses',Auth::user()->id)}}">Lịch sử
                                            thuê nhà
                                        </a>
                                        <a style="text-align: center" class="dropdown-item"
                                           href="{{route('logout.social')}}">Đăng xuất
                                        </a>
                                    </div>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a style="font-family: inherit" class="nav-link" href="{{route('login')}}">Đăng
                                        nhập</a>
                                </li>
                                <li class="nav-item">
                                    <a style="font-family: inherit" class="nav-link" href="{{route('register')}}">Đăng
                                        ký</a>
                                </li>
                        </ul>
                    </div>
{{--                    <div style="margin-top: 17px" class="header_social_icon d-none d-lg-block">--}}
{{--                        <ul>--}}
{{--                            <li><a href="#" class=" d-lg-block"><span class="icon-facebook"></span></a></li>--}}
{{--                            <li><a href="#" class=" d-lg-block"><span class="icon-google"></span></a></li>--}}
{{--                            <li><a href="#" class="d-lg-block"><span class="icon-instagram"></span></a></li>--}}
{{--                            <li><a href="#" class=" d-lg-block"><span class="icon-skype"></span></a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                    @endif
                </nav>
            </div>
        </div>
    </div>
</header>
<div class="site-blocks-cover inner-page-cover overlay"
     style="background-image: url({{asset('images/icons/anh7.jpg')}});" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center">
        </div>
    </div>
    <a href="#property-details" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
</div>
@yield('content')
<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-5">
                        <h2 style="font-family: inherit" class="footer-heading mb-4">Về chúng tôi</h2>
                        <p style="font-family: inherit">Đội ngũ phát triển luôn luôn lao động hết mình để đem lại giá
                            trị cuộc sống của khách hàng</p>
                    </div>
                    <div class="col-md-3 mx-auto">
                        <h2 style="font-family: inherit" class="footer-heading mb-4">Chuyển nhanh</h2>
                        <ul class="list-unstyled">
                            <li><a href="{{route('register')}}">Đăng ký</a></li>
                            <li><a href="{{route('login')}}">Đăng nhập</a></li>
                            <li><a href="{{route('houses.postForm')}}">Đăng bài</a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-4">
                    <h2 style="font-family: inherit" class="footer-heading mb-4">Đăng ký nhận thông tin</h2>
                    <form action="#" method="post" class="footer-subscribe">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control border-secondary text-white bg-transparent"
                                   placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary text-black" type="button" id="button-addon2">Gửi</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="">
                    <h2 style="font-family: inherit" class="footer-heading mb-4">Theo dõi chúng tôi</h2>
                    <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                    <a href="#" class="pl-3 pr-3"><span class="icon-google"></span></a>
                    <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                    <a href="#" class="pl-3 pr-3"><span class="icon-skype"></span></a>
                </div>
            </div>
        </div>
        <div class="row pt-1 mt-1 text-center">
            <div class="col-md-12">
                <div class="border-top pt-2">
                    <p class="copyright">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                        Đã đăng ký bản quyền | Thực hiện bởi <a href="{{route('houses.list')}}"
                                                                target="_blank">SenGroup </a><i
                            class="icon-heart text-danger" aria-hidden="true"></i>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<a href="#top" class="gototop"><span class="icon-angle-double-up"></span></a>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="{{asset('ckeditor/ckeditor.js')}}" type="text/javascript"></script>
<script src="{{asset('ckeditor/styles.js')}}" type="text/javascript"></script>
<script src="{{asset('ckeditor/config.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    CKEDITOR.replace('desc');
</script>
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
<script src="{{asset('js/rating.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
</html>
