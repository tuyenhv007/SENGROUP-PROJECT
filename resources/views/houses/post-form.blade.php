@extends('layout.master')
@section('content')
    <div class="pb-5">
        <div class="site-blocks-cover inner-page-cover overlay"
             style="background-image: url({{asset('images/icons/anh7.jpg')}});" data-aos="fade">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                </div>
            </div>
            <a href="#property-details" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
        </div>
        <div>
            <div class="container pt-5">
                <div class="card">
                    <div class="card-header">
                        <h4 style="font-family: inherit">Đăng bài cho thuê nhà</h4>
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

                                    <input type="text" name="name" autofocus
                                           class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                                           value="{{old('name')}}">
                                    @if($errors->first('name'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="{{ $errors->first('type') ? 'text-danger' : '' }}">Kiểu nhà:</label>
                                    <select class="form-control " name="type">
                                        <option value="">Loại căn hộ</option>
                                        <option value="Căn hộ,Chung cư">Căn hộ,Chung cư</option>
                                        <option value="Nhà ở">Nhà ở</option>
                                        <option value="Văn phòng">Văn phòng</option>
                                        <option value="Mặt bằng kinh doanh">Mặt bằng kinh doanh</option>
                                        <option value="Phòng trọ">Phòng trọ</option>
                                    </select>
                                    @if($errors->first('type'))
                                        <p class="text-danger">{{ $errors->first('type') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="{{ $errors->first('city') ? 'text-danger' : '' }}">Chọn tỉnh/thành
                                        phố:</label>
                                    <select class="form-control city-up" name="city" id="city">
                                        <option value="">Tỉnh/Thành Phố</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }} </option>
                                        @endforeach
                                    </select>
                                    @if($errors->first('city'))
                                        <p class="text-danger">{{ $errors->first('city') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="{{ $errors->first('district') ? 'text-danger' : '' }}">Chọn quận
                                        huyện:</label>

                                    <select class="form-control" name="district" id="district">
                                        <option value="">Quận/Huyện</option>

                                    </select>
                                    @if($errors->first('district'))
                                        <p class="text-danger">{{ $errors->first('district') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="{{ $errors->first('road') ? 'text-danger' : '' }}">Chọn xã
                                        phường:</label>

                                    <select class="form-control" name="road" id="road">
                                        <option value="">Xã/Phường</option>

                                    </select>
                                    @if($errors->first('road'))
                                        <p class="text-danger">{{ $errors->first('road') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="{{ $errors->first('sn') ? 'text-danger' : '' }}">Địa chỉ :</label>
                                    <textarea name="sn" id="sn"
                                              class="form-control  {{ $errors->first('sn') ? 'is-invalid' : '' }}"
                                              autofocus rows="2">{{ old('sn') }}</textarea>
                                    @if($errors->first('sn'))
                                        <p class="text-danger">{{ $errors->first('sn') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="{{ $errors->first('desc') ? 'text-danger' : '' }}">Mô tả :</label>
                                    <textarea name="desc" id="desc" class="form-control
                                              {{ $errors->first('desc') ? 'is-invalid' : '' }}"
                                              autofocus rows="3">{{ old('desc') }}</textarea>
                                    @if($errors->first('desc'))
                                        <p class="text-danger">{{ $errors->first('desc') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="{{ $errors->first('rooms') ? 'text-danger' : '' }}">Số phòng:</label>

                                    <input type="text" name="rooms" autofocus
                                           class="form-control {{ $errors->first('rooms') ? 'is-invalid' : '' }}"
                                           value="{{ old('rooms') }}">
                                    @if($errors->first('rooms'))
                                        <p class="text-danger">{{ $errors->first('rooms') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="{{ $errors->first('price') ? 'text-danger' : '' }}">Giá thuê VNĐ:</label>

                                    <input type="text" name="price" autofocus
                                           class="form-control {{ $errors->first('price') ? 'is-invalid' : '' }}"
                                           value="{{ old('price') }}">
                                    @if($errors->first('price'))
                                        <p class="text-danger">{{ $errors->first('price') }}</p>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label class="{{ $errors->first('photos') ? 'text-danger' : '' }}"
                                           for="Product Name">
                                        Hình
                                        ảnh
                                        (Có thể tải lên nhiều ảnh):</label>
                                    <input type="file" id="imageUpload"
                                           class="form-control selectImage {{ $errors->first('photos') ? 'is-invalid' : '' }}"
                                           name="photos[]"
                                           multiple/>
                                    @if($errors->first('photos'))
                                        <p class="text-danger">{{ $errors->first('photos') }}</p>
                                    @endif
                                    <div id="result">

                                    </div>

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Đăng bài</button>
                                    <a href="{{route('houses.list')}}" class="btn btn-secondary">Thoát</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
