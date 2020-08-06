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
                                        <p class="mb-1" >{{$house->desc}}.</p>
                                        <div class="pt-2">
                                            <button type="button"
                                                    class="btn btn-primary @if((\Illuminate\Support\Facades\Session::get('user')) && (\Illuminate\Support\Facades\Session::get('user')->name)===($house->user->name))
                                                        d-none
                                                        @else
                                                        d-inline
                                                        @endif" data-toggle="modal"
                                                    data-target="#exampleModal" data-whatever="@mdo">Đặt Thuê
                                            </button>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Đặt nhà:</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" action="{{route('houses.bookHouse',$house->id)}}">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Ngày
                                                                        Đến:</label>
                                                                    <input type="date" class="form-control"
                                                                           id="recipient-name" name="dateIn">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text" class="col-form-label">Ngày
                                                                        Đi:</label>
                                                                    <input class="form-control"
                                                                           id="message-text" type="date" name="dateOut">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text" class="col-form-label">Ghi
                                                                        Chú:</label>
                                                                    <textarea class="form-control" name="note"
                                                                              id="desc"></textarea>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Thoát
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">Đặt thuê
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
