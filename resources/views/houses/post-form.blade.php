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
@endsection
