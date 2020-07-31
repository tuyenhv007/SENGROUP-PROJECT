@extends('layout/master')
@section('content')
    <div class="site-section bg-light bg-image" id="contact-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="section-title mb-3">Đăng Ký thành viên</h2>
                </div>
            </div>
            <div style="margin-left: 125px; width: 1500px" class="row">
                <div class="col-md-7 mb-5">
                    <form action="{{ route('user.register') }}" method="POST" class="p-5 bg-white">
                        @csrf
                        @if($errors->all())
                            <div class="alert alert-danger" role="alert">
                                Có vấn đề khi tạo tài khoản người dùng.
                            </div>
                        @endif
                        <h2 class="h4 text-black mb-5">Thông tin</h2>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="{{$errors->first('name') ? 'text-danger': ''}}">Full Name</label>
                                <input type="text" name="name" id="name"
                                       class="form-control {{$errors->first('name') ? 'is-invalid' : ''}}">
                            </div>
                            @if($errors->first('name'))
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="{{$errors->first('email') ? 'text-danger': ''}}">Email</label>
                                <input type="email" id="email" name="email"
                                       class="form-control {{$errors->first('email') ? 'is-invalid' : ''}}"
                                       value="{{old('email')}}">
                            </div>
                            @if($errors->first('email'))
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="{{$errors->first('password') ? 'text-danger': ''}}">Mật Khẩu</label>
                                <input type="password" name="password" id="password"
                                       class="form-control {{$errors->first('password') ? 'is-invalid' : ''}}">
                            </div>
                            @if($errors->first('password'))
                                <p class="text-danger">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="{{$errors->first('phone') ? 'text-danger': ''}}">Số Điện Thoại</label>
                                <input type="text" name="text" id="text"
                                       class="form-control {{$errors->first('phone') ? 'is-invalid' : ''}}">
                            </div>
                            @if($errors->first('phone'))
                                <p class="text-danger">{{ $errors->first('phone') }}</p>
                            @endif
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black">Bạn muốn: </label>
                                <input type="radio" name="role" value="1">Bán/Cho thuê
                                <input type="radio" name="role" value="2">Thuê nhà
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="{{$errors->first('address') ? 'text-danger': ''}}">Địa Chỉ</label>
                                <textarea name="address" id="message" cols="30" rows="7"
                                          class="form-control {{$errors->first('address') ? 'is-invalid' : ''}}"></textarea>
                            </div>
                            @if($errors->first('address'))
                                <p class="text-danger">{{ $errors->first('address')}}</p>
                            @endif
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Đăng ký" class="btn btn-primary btn-md text-white">
                                <button class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
