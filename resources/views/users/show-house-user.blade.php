@extends('layout.master')
@section('content')
    <div>
        <div class="pt-3 pb-3">
            <div class="card container pt-3">
                <div class="card-header">
                    Danh sách nhà của: {{\Illuminate\Support\Facades\Session::get('user')->name }}
                </div>
                <div class="card-body">
                    @empty($houses[0])
                        Không có dữ liệu
                    @else
                    <table class="table text-center">
                        <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Tiêu đề</th>
                            <th>Kiểu nhà</th>
                            <th>Giá thuê</th>
                            <th>Trạng Thái</th>
                        </tr>
                        </thead>


                            @foreach($houses as $key => $house)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td><a href="{{route('user.billHouse',$house->id)}}">{{$house->name}}</a></td>
                                    <td>{{$house->type}}</td>
                                    <td>{{number_format($house->price)}}</td>
                                    <td>{{$house->status}}</td>
                                </tr>
                            @endforeach

                    </table>
                    @endempty
                    <div>
                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Quay Lại</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
