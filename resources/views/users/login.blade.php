@extends('layout.master')
@section('content')
    <div class="card" style="width: 400px;margin-left: 460px;margin-top: 50px">
        <div class="card-header">
            <h2 class="text-center">Đăng nhập</h2>
            <hr>
        </div>
        <div class="card-body">
            <div class="login-form">
                <form action="" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                    <span class="input-group-text">
                        <span class="fa fa-user"></span>
                    </span>
                            </div>
                            <input autofocus  type="text" class="form-control" name="email" placeholder="Enter your email" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-lock"></i>
                    </span>
                            </div>
                            <input type="password" class="form-control" name="password" placeholder="Enter your Password" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary login-btn btn-block">Đăng nhập</button>

                    </div>
                    <div class="clearfix">
                        <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
                        <a href="#" class="float-right">Forgot Password?</a>
                    </div>
                    <div class="or-seperator" style="margin-left: 170px"><i>or</i></div>
                    <p class="text-center">Login with your social media account</p>
                    <div class="text-center social-btn">
                        <a href="#" class="btn btn-secondary"><i class="fa fa-facebook"></i>&nbsp; Facebook</a>
                        <a href="" class="btn btn-danger"><i class="fa fa-google"></i>&nbsp; Google</a>
                        <a href="#" class="btn btn-info"><i class="fa fa-twitter"></i>&nbsp; Twitter</a></div>
                </form>
                <p class="text-center text-muted small">Don't have an account? <a href="#">Sign up here!</a></p>
            </div>
        </div>
    </div>
@endsection
