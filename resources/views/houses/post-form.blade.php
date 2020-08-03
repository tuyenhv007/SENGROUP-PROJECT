<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Warehouse &mdash; Website Template by Colorlib</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta charset="utf-8">
    <script src="{{asset('js/ajax-city.js')}}" type="text/javascript"></script>
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
                <form method="post" action="{{route('houses.postHouse')}}" enctype="multipart/form-data">
                    @csrf
                    @if($errors->all())
                        <div class="alert alert-danger" role="alert">
                            Có vấn đề khi đăng nhà cho thuê!
                        </div>
                    @endif
                    <div class="form-group">
                        <label class="{{ $errors->first('name') ? 'text-danger' : '' }}">Tiêu đề:</label>
                        <input type="text" name="name" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}">
                    </div>
                    @if($errors->first('name'))
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                    @endif
                    <div class="form-group">
                        <label class="{{ $errors->first('type') ? 'text-danger' : '' }}">Kiểu nhà:</label>
                        <input type="text" name="type" class="form-control" {{ $errors->first('type') ? 'is-invalid' : '' }}>
                    </div>
                    @if($errors->first('type'))
                    <p class="text-danger">{{ $errors->first('type') }}</p>
                    @endif
                    <div class="form-group">
                        <label class="{{ $errors->first('city') ? 'text-danger' : '' }}">Chọn tỉnh/thành phố:</label>
                        <select class="form-control city-up" name="city" id="city">
                            <option value="">---</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
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
                        <textarea name="sn" class="form-control" rows="3" {{ $errors->first('sn') ? 'is-invalid' : '' }}></textarea>
                    </div>
                    @if($errors->first('sn'))
                    <p class="text-danger">{{ $errors->first('sn') }}</p>
                    @endif
                    <div class="form-group">
                        <label class="{{ $errors->first('desc') ? 'text-danger' : '' }}">Mô tả :</label>
                        <textarea name="desc" class="form-control" rows="3" {{ $errors->first('desc') ? 'is-invalid' : '' }}></textarea>
                    </div>
                    @if($errors->first('desc'))
                    <p class="text-danger">{{ $errors->first('desc') }}</p>
                    @endif
                    <div class="form-group">
                        <label class="{{ $errors->first('rooms') ? 'text-danger' : '' }}">Số phòng:</label>
                        <input type="text" name="rooms" class="form-control" {{ $errors->first('rooms') ? 'is-invalid' : '' }}>
                    </div>
                    @if($errors->first('rooms'))
                    <p class="text-danger">{{ $errors->first('rooms') }}</p>
                    @endif
                    <div class="form-group">
                        <label class="{{ $errors->first('price') ? 'text-danger' : '' }}">Giá thuê:</label>
                        <input type="text" name="price" class="form-control" {{ $errors->first('price') ? 'is-invalid' : '' }}>
                        </div>
                    @if($errors->first('price'))
                    <p class="text-danger">{{ $errors->first('price') }}</p>
                    @endif
                    <div class="form-group">

                    </div>
                    <label class="{{ $errors->first('photos[]') ? 'text-danger' : '' }}" for="Product Name"> Hình ảnh  (Có thể tải lên nhiều ảnh):</label>
                    <br>
                    <input type="file"  id="imageUpload" class="form-control selectImage" name="photos[]" multiple {{ $errors->first('photos[]') ? 'is-invalid' : '' }}/>
                    <br>
                    @if($errors->first('photos[]'))
                        <p class="text-danger">{{ $errors->first('photos[]') }}</p>
                    @endif
                    <div id="result"></div>
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

