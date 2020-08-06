@extends('layout.master');
@section('content')
    <div class="pt-3 pb-3">
        <div class="card container pt-3">
            <div class="card-header">
                Lịch sử thuê nhà của {{$user->name}}:
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Danh sách nhà</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Ngày đến</th>
                        <th scope="col">Ngày đi</th>
                        <th scope="col">Tổng giá thanh toán</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Hủy đặt thuê</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bills as $key=>$bill)
                        <tr>
                            <th scope="row">{{++$key}}</th>
                            <td>{{$bill->house['name']}}</td>
                            <td>{{$bill->house->addresses[0]->sn}}
                                ,{{$bill->house->addresses[0]->city}}
                                ,{{$bill->house->addresses[0]->district}}
                                , {{$bill->house->addresses[0]->road}}</td>
                            <td>{{$bill->checkIn}}</td>
                            <td>{{$bill->checkOut}}</td>
                            <td>{{number_format($bill->total)}}&nbsp;VND</td>
                            <td>{{$bill->status}}</td>
                            <td><a href="{{route('user.formCancleBookHouse',$bill->id)}}"
                                   class="{{($bill->status=="Hủy bỏ")?"d-none":"d-inline"}}">Hủy</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection
