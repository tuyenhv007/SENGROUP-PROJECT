<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Warehouse</title>
    @toastr_css
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta charset="utf-8">
    <script src="{{asset('js/ajax-city.js')}}" type="text/javascript"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Oswald:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <link rel="stylesheet" href="{{asset('css/drop.css')}}">
    <link rel="stylesheet" href="{{asset('css/liner_icon.css')}}">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="{{asset('js/image-ajax.js')}}" type="text/javascript"></script>

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
                    <a style="font-size:170%;font-style: inherit;" class="navbar-brand" href="{{route('houses.list')}}"> SENGROUP </a>
                    <div class="collapse navbar-collapse main-menu-item justify-content-center"
                         id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a style="font-family: inherit" class="nav-link" href="{{route('houses.list')}}">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a style="font-family: inherit" class="nav-link" href="{{route('houses.postForm')}}">Đăng bài</a>
                            </li>
                            <li class="nav-item">
                                <a style="font-family: inherit" class="nav-link" href="#"> Category</a>
                            </li>
                            <li class="nav-item">
                                <a style="font-family: inherit" class="nav-link" href="#">Contact</a>
                            </li>
                            @if(Session::get('user'))
                                <li class="nav-item dropdown">
                                    <a style="font-family: inherit" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-user-o" aria-hidden="true"></i>
                                        {{Session::get('user')->name}}
                                    </a>
                                    <div style="margin-left: 30px " class="dropdown-menu"
                                         aria-labelledby="navbarDropdown">
                                        <a style="font-family: inherit" style="text-align: center" class="dropdown-item" href="#">
                                            Thông tin</a>
                                        <a style="font-family: inherit" class="dropdown-item" href="{{route('logout')}}">Đăng xuất</a>
                                    </div>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('login')}}">Đăng nhập</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('register')}}">Đăng ký</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div style="margin-top: 10px" class="header_social_icon d-none d-lg-block">
                        <ul>
                            <li><a href="#" class="d-none d-lg-block"><i class="fa fa-facebook fa-lg"
                                                                         aria-hidden="true"></i></a></li>
                            <li><a href="#" class="d-none d-lg-block"><i class="fa fa-google fa-lg"
                                                                         aria-hidden="true"></i></a></li>
                            <li><a href="#" class="d-none d-lg-block"><i class="fa fa-instagram fa-lg"
                                                                         aria-hidden="true"></i></a></li>
                            <li><a href="#" class="d-none d-lg-block"><i class="fa fa-skype fa-lg"
                                                                         aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
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
<div class="container pt-5">
    <div class="card">
        <div class="card-header">
            <h4 style="font-family: inherit">Đăng bài cho thuê nhà</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <form method="post" action="{{route('houses.postHouse')}}" enctype="multipart/form-data">
                    @csrf
                    @if($errors->all())
                        <div class="alert alert-danger" role="alert">
                            Có vấn đề khi đăng nhà cho thuê!
                        </div>
                    @endif
                    <div class="form-group">
                        <label class="{{ $errors->first('name') ? 'text-danger' : '' }}">Tiêu đề:</label>

                        <input type="text" name="name" autofocus class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}" value="{{old('name')}}">


                    </div>
                    @if($errors->first('name'))
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    @endif
                    <div class="form-group">
                        <label class="{{ $errors->first('type') ? 'text-danger' : '' }}">Kiểu nhà:</label>

                        <input type="text" name="type" autofocus class="form-control {{ $errors->first('type') ? 'is-invalid' : '' }}" value="{{old('type')}}">

                    </div>
                    @if($errors->first('type'))
                        <p class="text-danger">{{ $errors->first('type') }}</p>
                    @endif
                    <div class="form-group">
                        <label class="{{ $errors->first('city') ? 'text-danger' : '' }}">Chọn tỉnh/thành phố:</label>
                        <select class="form-control city-up" name="city" id="city">
                            <option value="">---</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    @if($errors->first('city'))
                        <p class="text-danger">{{ $errors->first('city') }}</p>
                    @endif
                    <div class="form-group">
                        <label class="{{ $errors->first('district') ? 'text-danger' : '' }}">Chọn quận huyện:</label>

                        <select class="form-control" name="district" id="district">


                        </select>
                    </div>
                    @if($errors->first('district'))
                        <p class="text-danger">{{ $errors->first('district') }}</p>
                    @endif
                    <div class="form-group">
                        <label class="{{ $errors->first('road') ? 'text-danger' : '' }}">Chọn xã phường:</label>

                        <select class="form-control" name="road" id="road">


                        </select>
                    </div>
                    @if($errors->first('road'))
                        <p class="text-danger">{{ $errors->first('road') }}</p>
                    @endif
                    <div class="form-group">
                        <label class="{{ $errors->first('sn') ? 'text-danger' : '' }}">Địa chỉ :</label>

                        <textarea name="sn" class="form-control {{ $errors->first('sn') ? 'is-invalid' : '' }}" autofocus rows="3" >{{ old('sn') }}</textarea>
                    </div>
                    @if($errors->first('sn'))
                        <p class="text-danger">{{ $errors->first('sn') }}</p>
                    @endif
                    <div class="form-group">
                        <label class="{{ $errors->first('desc') ? 'text-danger' : '' }}">Mô tả :</label>

                        <textarea name="desc" class="form-control" autofocus rows="3" {{ $errors->first('desc') ? 'is-invalid' : '' }}>{{ old('desc') }}</textarea>

                    </div>
                    @if($errors->first('desc'))
                        <p class="text-danger">{{ $errors->first('desc') }}</p>
                    @endif
                    <div class="form-group">
                        <label class="{{ $errors->first('rooms') ? 'text-danger' : '' }}">Số phòng:</label>

                        <input type="text" name="rooms" autofocus class="form-control {{ $errors->first('rooms') ? 'is-invalid' : '' }}" value="{{ old('rooms') }}">

                    </div>
                    @if($errors->first('rooms'))
                        <p class="text-danger">{{ $errors->first('rooms') }}</p>
                    @endif
                    <div class="form-group">
                        <label class="{{ $errors->first('price') ? 'text-danger' : '' }}">Giá thuê:</label>

                        <input type="text" name="price" autofocus class="form-control {{ $errors->first('price') ? 'is-invalid' : '' }}" value="{{ old('price') }}">

                    </div>
                    @if($errors->first('price'))
                        <p class="text-danger">{{ $errors->first('price') }}</p>
                    @endif

                    <div class="form-group">

                    </div>
                    <label class="{{ $errors->first('photos[]') ? 'text-danger' : '' }}" for="Product Name"> Hình ảnh
                        (Có thể tải lên nhiều ảnh):</label>
                    <br>

                    <input type="file" id="imageUpload" class="form-control selectImage {{ $errors->first('photos[]') ? 'is-invalid' : '' }}" name="photos[]"
                           multiple />
                    <br>
                    <div id="result"></div>
                    @if($errors->first('photos[]'))
                        <p class="text-danger">{{ $errors->first('photos[]') }}</p>
                    @endif
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Đăng bài</button>
                        <a href="{{route('houses.list')}}" class="btn btn-secondary">Thoát</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-5">
                        <h2 style="font-family: inherit" class="footer-heading mb-4">Về chúng tôi</h2>
                        <p style="font-family: inherit">Đội ngũ phát triển luôn luôn lao động hết mình để đem lại giá trị cuộc sống của khách hàng</p>
                    </div>
                    <div class="col-md-3 mx-auto">
                        <h2 style="font-family: inherit" class="footer-heading mb-4">Chuyển nhanh</h2>
                        <ul class="list-unstyled">
                            <li><a href="{{route('register')}}">Đăng ký</a></li>
                            <li><a href="{{route('login')}}">Đăng nhập</a></li>
                            <li><a href="{{route('houses.postForm')}}">Đăng bài</a></li>
                            {{--                            <li><a href="#"></a></li>--}}
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-4">
                    <h2 style="font-family: inherit" class="footer-heading mb-4">Đăng ký nhận thông tin</h2>
                    <form action="#" method="post" class="footer-subscribe">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
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
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <div class="border-top pt-5">
                    <p class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Đã đăng ký bản quyền | Thực hiện bởi <a href="{{route('houses.list')}}" target="_blank" >SenGroup </a><i class="icon-heart text-danger" aria-hidden="true"></i>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>

        </div>
    </div>
</footer>
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
@jquery
@toastr_js
@toastr_render
</body>
</html>
