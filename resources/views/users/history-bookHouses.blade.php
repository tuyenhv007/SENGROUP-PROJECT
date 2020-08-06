@extends('layout.master');
@section('content')
    <div class="pb-5">
        <div class="site-blocks-cover inner-page-cover overlay"
             style="background-image: url({{asset('images/icons/anh7.jpg')}});" data-aos="fade">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-5 mx-auto mt-lg-5 text-center">
                    </div>
                </div>
            </div>
            <a href="#property-details" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
        </div>
    <div class="container">
        <div class="card" >
            <div class="card-header">
                Lịch sử thuê nhà của {{$user->name}}:
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Danh sách nhà </th>
                    <th scope="col">Địa chỉ </th>
                    <th scope="col">Ngày đến </th>
                    <th scope="col">Ngày đi </th>
                    <th scope="col">Tổng giá thanh toán </th>
                    <th scope="col">Trạng thái </th>
                </tr>
                </thead>
                <tbody>
                @foreach($bills as $key=>$bill)
                <tr>
                    <th scope="row">{{++$key}}</th>
                    <td>{{$bill->house['name']}}</td>
                    <td>{{$bill->house->addresses[0]->city}} ,{{$bill->house->addresses[0]->district}}, {{$bill->house->addresses[0]->road}}</td>
                    <td>{{$bill->checkIn}}</td>
                    <td>{{$bill->checkOut}}</td>
                    <td>{{number_format($bill->total)}}&nbsp;VND</td>
                    <td>{{$bill->status}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
