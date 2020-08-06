@extends('layout.master')
@section('content')
    <div>
        <div class="pt-3 pb-3">
            <div class="card container pt-3">
                <div class="card-header">
                    Danh sách nhà của {{\Illuminate\Support\Facades\Session::get('user')->name }}
                </div>
                <div class="card-body">
                    <table class="table text-center">
                        <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Khách thuê</th>
                            <th>Số điện thoại</th>
                            <th>Ngày vào</th>
                            <th>Ngày ra</th>
                            <th>Tổng tiền</th>
                            <th>Tình trạng</th>
                        </tr>
                        </thead>
                        @empty($bills)
                            Không có dữ liệu
                        @else
                            @foreach($bills as $key => $bill)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$bill->user->name}}</td>
                                    <td>{{$bill->user->phone}}</td>
                                    <td>{{$bill->checkIn}}</td>
                                    <td>{{$bill->checkOut}}</td>
                                    <td>{{number_format($bill->total)}}</td>
                                    <td>{{$bill->status}}</td>
                                </tr>
                            @endforeach
                        @endempty
                    </table>
                    <div>
                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
