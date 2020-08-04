@extends('layout.master')
@section('content')
    <div class="pb-5">
        <div class="site-blocks-cover inner-page-cover overlay"
             style="background-image: url({{asset('images/icons/anh7.jpg')}});" data-aos="fade">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-5 mx-auto mt-lg-5 text-center">
                        <h1>{{$house->type}}</h1>
                        <p class="mb-5"><strong class="text-white">{{$house->price}}</strong></p>
                    </div>
                </div>
            </div>
            <a href="#property-details" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
        </div>
        <div class="container pt-3">
            <div class="card">
                <div class="card-body">
                    <div class="site-section" id="property-details">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="owl-carousel slide-one-item with-dots">
                                        @foreach($house->images as $image)
                                            <span id="zoom"><img src="{{asset('storage/'.$image->image)}}"
                                                                 class="img-fluid"
                                                                 style="width: 100%;height: 700px"></span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-5 pl-lg-5 ml-auto">
                                    <div class="mb-5">
                                        <h3 class="text-black mb-4">{{$house->name}}.</h3>
                                        <h5>{{$house->addresses[0]->road}},
                                            {{$house->addresses[0]->district}},
                                            {{$house->addresses[0]->city}}</h5>
                                        <p class="mb-1">Số phòng ngủ: {{$house->rooms}} phòng.</p><br>
                                        <p class="mb-1">{{$house->desc}}.</p>
                                        <div class="pt-2">
                                            <a href="{{route('houses.viewBookHouse',$house->id)}}"
                                               class="btn btn-primary">Đặt
                                                Thuê</a>
                                            <a href="{{route('houses.list')}}" class="btn btn-secondary">Quay Lại </a>
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <div class="mt-5">
                                            <img src="{{asset('storage/images/'.$house->user->image)}}" alt="Image"
                                                 class="w-25 mb-3 rounded-circle">
                                            <h5 class="text-black">Người Đăng: {{$house->user->name}}</h5>
                                            <p class="text-black"> Phone: {{$house->user->phone}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
