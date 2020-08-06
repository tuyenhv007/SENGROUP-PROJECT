@extends('layout.master')
@section('content')
    <div>
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
                    Danh sách nhà của bạn
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Tiêu đề</th>
                            <th>Kiểu nhà</th>
                            <th>Giá thuê</th>
                        </tr>
                        </thead>
                        @empty($houses)
                            Không có dữ liệu
                        @else
                            @foreach($houses as $key => $house)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td><a href="{{route('user.billHouse',$house->id)}}">{{$house->name}}</a></td>
                                    <td>{{$house->type}}</td>
                                    <td>{{number_format($house->price)}}</td>
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
