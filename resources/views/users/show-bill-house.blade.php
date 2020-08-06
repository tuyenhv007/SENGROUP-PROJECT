@extends('layout.master')
@section('content')
    <div>
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
        <div class="site-blocks-cover inner-page-cover overlay"
             style="background-image: url({{asset('images/icons/anh7.jpg')}});" data-aos="fade">
            <div class="container">
                <div class="row align-items-center justify-content-center">

                </div>
            </div>
        </div>
        <div class="pt-3 pb-3">
            <div class="card container pt-3">
                <div class="card-header">
                    Danh sách nhà của {{\Illuminate\Support\Facades\Session::get('user')->name }}
                </div>
                <div class="card-body">
                    <table class="table">
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
                                    <td>{{$bill->total}}</td>
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
