@extends('layout.master')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('js/ajax-city.js')}}"></script>
    <div class="site-blocks-cover inner-page-cover overlay site-block-wrap">
        <div class="container pt-5">
            <div class="card">
                <div class="card-header">
                    <h4>Đăng bài cho thuê nhà</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <form method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Title:</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Type:</label>
                                <input type="text" name="type" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Chọn tỉnh/thành phố:</label>
                                <select class="form-control city-up" name="city">
                                    <option value="">---</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Chọn quận huyện:</label>
                                <select class="form-control" name="district">
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Chọn xã phường:</label>
                                <select class="form-control" name="road">
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Số nhà :</label>
                                <input type="text" name="sn" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Rooms:</label>
                                <input type="text" name="rooms" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Price:</label>
                                <input type="text" name="price" class="form-control">


                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Đăng bài</button>
                                <a href="{{route('houses.list')}}" class="btn btn-secondary">Thoát</a>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
@endsection
