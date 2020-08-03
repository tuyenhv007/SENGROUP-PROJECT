@extends('layout.master')
@section('content')
<div class="container pt-5">
    <div class="card">
        <div class="card-header">
            <h4>Đăng bài cho thuê nhà</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <form method="post" action="{{route('houses.postHouse')}}" enctype="multipart/form-data">
                    @csrf
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
                        <select class="form-control city-up" name="city" id="city">
                            <option value="">---</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chọn quận huyện:</label>

                        <select class="form-control" name="district" id="district">


                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chọn xã phường:</label>

                        <select class="form-control" name="road" id="road">


                        </select>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ :</label>
                        <textarea name="sn" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Mô tả :</label>
                        <textarea name="desc" class="form-control" rows="3"></textarea>
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

                    </div>
                    <label for="Product Name"> photos (can upload multi photos):</label>
                    <br>
                    <input type="file"  id="imageUpload" class="form-control selectImage" name="photos[]" multiple/>
                    <br>
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
@endsection
