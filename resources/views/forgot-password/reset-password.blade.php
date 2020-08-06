@extends('layout.master')

@section('content')

    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-8">
                <div class="card mb-30">
                    <div class="card-header">Thiết lập mật khẩu mới</div>

                    <div class="card-body">
                        <form method="POST" action="" >
                            @csrf

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu mới (*)') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control {{$errors->first('password') ? 'is-invalid' : ''}}" name="password" required autocomplete="new-password">

                                    @if($errors->first('password'))
                                        <p class="text-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Nhập lại mật khẩu mới (*)') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control {{$errors->first('password_confirmation') ? 'is-invalid' : ''}}" name="password_confirmation" required autocomplete="new-password">
                                    @if($errors->first('password_confirmation'))
                                        <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Xác nhận') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
