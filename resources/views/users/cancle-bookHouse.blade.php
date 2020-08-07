@extends('layout.master')
@section('content')
    <div class="pb-5">
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
                                        <h3 class="text-black mb-4"><i class='fas fa-tags'></i> &nbsp;{{$house->name}}.
                                        </h3>
                                        <h5><i class='fas fa-map-marker-alt'></i> &nbsp;{{$house->address}},{{$house->road}},
                                            {{$house->district}},
                                            {{$house->city}}</h5>

                                        <h5 class="mb-2"><i class='fas fa-bed'></i> &nbsp; Số phòng
                                            ngủ: {{$house->rooms}} phòng.</h5>
                                        <h4 class="mb-1"><i class="fa fa-money "></i> &nbsp;Giá Tiền: {{number_format($house->price)}} VNĐ</h4><br>
                                        <h4 class="mb-1"> &nbsp;Ngày đến : {{$bill->checkIn}} </h4>
                                        <h4 class="mb-1"> &nbsp;Ngày đi  : {{$bill->checkOut}} </h4><br>
                                        <form action="{{route('user.cancleBookHouse',$bill->id)}}" method="post">
                                            @csrf
                                        <h2 class="alert text-danger">Lý do hủy thuê nhà</h2>
                                        <textarea name="note" id="message" cols="30" rows="7"
                                                  class="form-control"></textarea>
                                            <br>
                                        <button class="btn btn-primary" type="submit">Xác nhận</button>
                                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Quay Lại</button>
                                        </form>
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

