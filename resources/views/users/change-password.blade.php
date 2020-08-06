@extends('layout/master')
@section('content')
    <div class="site-section bg-light bg-image" id="contact-section">
        <div class="container">
            <div style="margin-left: 125px; width: 1500px" class="row">
                <div class="col-md-7 mb-5">
                    <form action="" method="POST"  class="p-5 bg-white">
                        @csrf
                        @if($errors->all())
                            <div id="msg_div" class="alert alert-danger d-none" role="alert">
                                <span id="res_message"></span>
                            </div>
                        @endif
                        <h2 class="h4
                         text-black mb-5">Đổi mật khẩu</h2>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="{{$errors->first('password') ? 'text-danger': ''}}">Mật Khẩu hiện tại :
                                </label>
                                <input type="password" name="password" id="password"
                                       class="form-control {{$errors->first('password') ? 'is-invalid' : ''}}" autofocus >

                            </div>
                            @if($errors->first('password'))
                                <p class="text-danger">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="{{$errors->first('newpass') ? 'text-danger': ''}}">Mật Khẩu mới :
                                </label>
                                <input type="password" name="newpass" id="password"
                                       class="form-control {{$errors->first('newpass') ? 'is-invalid' : ''}}" autofocus placeholder="Mật khẩu gồm chữ và số">

                            </div>
                            @if($errors->first('newpass'))
                                <p class="text-danger">{{ $errors->first('newpass') }}</p>
                            @endif
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="{{$errors->first('confirmpass') ? 'text-danger': ''}}">Nhập lại mật khẩu mới :
                                </label>
                                <input type="password" name="confirmpass" id="password"
                                       class="form-control {{$errors->first('confirmpass') ? 'is-invalid' : ''}}" autofocus >

                            </div>
                            @if($errors->first('confirmpass'))
                                <p class="text-danger">{{ $errors->first('confirmpass') }}</p>
                            @endif
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Lưu thay đổi" class="btn btn-primary btn-md text-white">
                                <a href="{{route('houses.list')}}" class="btn btn-secondary" >Thoát</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

