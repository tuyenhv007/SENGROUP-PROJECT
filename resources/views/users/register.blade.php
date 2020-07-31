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
                        <h2 class="h4 text-black mb-5">Thông tin</h2>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" >Full Name</label>
                                <input type="text" name="username" id="name" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black">Email</label>
                                <input type="email" id="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black">Mật Khẩu</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black">Số Điện Thoại</label>
                                <input name="phone" type="subject" id="subject" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black">Địa Chỉ</label>
                                <textarea name="address" id="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..."></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Đăng ký" class="btn btn-primary btn-md text-white">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
