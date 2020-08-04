@extends('layout.master')
@section('content')
    <div class="site-wrap">
        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

    </div>
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    <div class="site-block-wrap">
        <div class="owl-carousel with-dots">
            <div class="site-blocks-cover overlay overlay-2"
                 style="background-image: url({{asset('images/icons/anh5.jpg')}});"
                 data-aos="fade" id="home-section">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-6 mt-lg-5 text-center">
                            <p class="mb-5 text-shadow text-capitalize text-black">Mái ấm thân thương. Đây là nơi để tìm
                                hạnh phúc. Nếu không tìm
                                thấy hạnh phúc ở đây, người ta không thể tìm thấy hạnh phúc ở bất cứ nơi nào khác.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-blocks-cover overlay overlay-2"
                 style="background-image: url({{asset('images/icons/anh6.jpg')}});"
                 data-aos="fade" id="home-section">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-6 mt-lg-5 text-center">
                            <p class="mb-5 text-shadow text-capitalize text-black">Mỗi một con người, dù đi khắp tứ
                                phương, rốt cục cũng chỉ muốn
                                tìm một mái nhà để dừng chân ghé về. Có được một nơi gọi là nhà, có được một người
                                thương yêu để cùng chia sẻ vui buồn.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-3">
        <div class="card">
            <div class="card-body">
                <form action="{{route('house.search')}}" method="post" novalidate="novalidate">
                    @csrf
                    <div class="col ml-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 p-0 ml-4">
                                        <input type="text" class="form-control search-slt"
                                               placeholder="Enter Pickup City">
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 p-0 ml-4">
                                        <button type="submit" class="btn btn-danger wrn-btn">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-12 p-0 ml-4">
                                        <select class="form-control search-slt" id="city" name="city">
                                            <option value="">Tỉnh/Thành Phố:</option>
                                            @foreach($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 p-0 ml-2">
                                        <select class="form-control" name="district" id="district">
                                            <option value="">Quận/Huyện:</option>

                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 p-0 ml-2">
                                        <select class="form-control" name="road" id="road">
                                            <option value="">Xã/Phường:</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        <div class="row pt-1">--}}
{{--                            <div class="col-lg-12">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-3 col-md-3 col-sm-12 p-0 ml-4">--}}
{{--                                        <input type="text" class="form-control search-slt"--}}
{{--                                               placeholder="Enter Pickup City">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-4 col-md-4 col-sm-12 p-0 ml-2">--}}
{{--                                        <input type="text" class="form-control search-slt"--}}
{{--                                               placeholder="Enter Drop City">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-4 col-md-4 col-sm-12 p-0 ml-2">--}}
{{--                                        <select class="form-control search-slt" id="exampleFormControlSelect1">--}}
{{--                                            <option>Select Vehicle</option>--}}
{{--                                            <option>Example one</option>--}}
{{--                                            <option>Example one</option>--}}
{{--                                            <option>Example one</option>--}}
{{--                                            <option>Example one</option>--}}
{{--                                            <option>Example one</option>--}}
{{--                                            <option>Example one</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container pt-2">
        <div class="card">
            <div class="card-body">
                <div class="site-section" id="properties-section">
                    <div class="container">
                        <div class="row large-gutters">
                            @foreach($houses as $key => $house)
                                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5 ">
                                    <div class="ftco-media-1">
                                        <div class="ftco-media-1-inner">
                                            <a href="{{route('houses.show',$house->id)}}"
                                               class="d-inline-block mb-4"><img
                                                    src="{{asset("storage/".$house->images[0]->image)}}"
                                                    alt="FImageo"
                                                    class="img-fluid"
                                                    style="height: 500px;width: 300px;margin: auto"></a>
                                            <div class="ftco-media-details">
                                                <h3>{{$house->name}}</h3>
                                                <p>{{$house->addresses[0]->road}},
                                                    {{$house->addresses[0]->district}},
                                                    {{$house->addresses[0]->city}}</p>

                                                <strong>{{$house->price}}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

