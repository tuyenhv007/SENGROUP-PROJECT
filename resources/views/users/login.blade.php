@extends('layout.master')
@section('content')
    <div class="card" style="width: 400px;margin-left: 460px;margin-top: 50px">
        <div class="card-header">
            <h2 class="text-center">Đăng nhập</h2>
            <hr>
            @if( Session::get('mess'))
                <div class="alert alert-danger" role="alert">
                    Sai tên đăng nhập hoặc mật khẩu!
                    <?php
                    Session::put('mess',null);
                    ?>
                </div>
            @endif
            @if( $errors->all())
                <div class="alert alert-danger" role="alert">
                    Lỗi đăng nhập!!!
                </div>
            @endif
        </div>
        <div class="card-body">
            <div class="login-form">
                <form action="{{route('user.login')}}" method="post">
                    @csrf
                    @if($errors->all())
                        <div id="msg_div" class="alert alert-danger d-none" role="alert">
                            <span id="res_message"></span>
                        </div>
                    @endif
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <span class="fa fa-user"></span>
                                </span>
                            </div>
                            <input autofocus type="text"
                                   class="form-control {{$errors->first('email') ? 'text-danger': ''}}" name="email"
                                   placeholder="Nhập Email" value="{{old('email')}}">
                            <span class="{{$errors->first('email') ? 'is-invalid' : ''}}"></span>
                        </div>
                        @if($errors->first('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control {{$errors->first('password') ? 'text-danger': ''}}" name="password"
                                   placeholder="Nhập mật khẩu">
                            <span class="{{$errors->first('password') ? 'is-invalid' : ''}}"></span>
                        </div>
                        @if($errors->first('password'))
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary login-btn btn-block">Đăng nhập</button>

                    </div>
                    <div class="clearfix">
                        <label class="float-left form-check-label"><input type="checkbox"> Nhớ mật khẩu?</label>
                        <a href="{{ route('forgot.index') }}" class="float-right">Quên mật khẩu?</a>
                    </div>
                    <div class="or-seperator" style="margin-left: 170px"><i>hoặc</i></div>
                    <p class="text-center">Đăng nhập bằng:</p>
                    <div class="text-center social-btn">
                        <a href="#" class="btn btn-secondary"><i class="fa fa-facebook"></i>&nbsp; Facebook</a>
                        <a href="#" class="btn btn-danger"><i class="fa fa-google"></i>&nbsp; Google</a>
                        <a href="#" class="btn btn-info"><i class="fa fa-twitter"></i>&nbsp; Twitter</a></div>
                </form>
                <p class="text-center text-muted small">Chưa có tài khoản? <a href="{{route('register')}}">Đăng kí ở
                        đây!</a></p>
            </div>
        </div>
    </div>
@endsection
