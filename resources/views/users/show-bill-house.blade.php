@extends('layout.master')
@section('content')
    <div>
        <div class="pt-3 pb-3">
            <div class="card container pt-3">
                <div class="card-header">
                    Lịch sử đặt nhà
                </div>
                <div class="card-body">
                    <form action="{{route('user.updateStatusHouse',$bills[0]->house->id)}}" method="post">
                        @csrf
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
                                        <td><select name="{{$bill->id}}">
                                                <option value="{{\App\Http\Controllers\BillStatus::ORDER}}"
                                                        @if ($bill->status == \App\Http\Controllers\BillStatus::ORDER) selected
                                                    @endif>
                                                    {{\App\Http\Controllers\BillStatus::ORDER}}
                                                </option>
                                                <option value="{{\App\Http\Controllers\BillStatus::CANCLE}}"
                                                        @if ($bill->status == \App\Http\Controllers\BillStatus::CANCLE) selected
                                                    @endif>
                                                    {{\App\Http\Controllers\BillStatus::CANCLE}}
                                                </option>
                                                <option value="{{\App\Http\Controllers\BillStatus::COMPLETE}}"
                                                        @if ($bill->status == \App\Http\Controllers\BillStatus::COMPLETE) selected
                                                    @endif>
                                                    {{\App\Http\Controllers\BillStatus::COMPLETE}}
                                                </option>
                                            </select>
                                        </td>

                                    </tr>
                                @endforeach
                                <tr>
                                    <th>Trạng thái căn nhà :</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>
                                        <select name="statusHouse">
                                            <option value="{{\App\Http\Controllers\HouseStatus::EMPTY}}"
                                            @if($bills[0]->house->status == \App\Http\Controllers\HouseStatus::EMPTY) selected
                                                @endif>
                                                {{\App\Http\Controllers\HouseStatus::EMPTY}}
                                            </option>
                                            <option value="{{\App\Http\Controllers\HouseStatus::INHABITED}}"
                                                    @if($bills[0]->house->status == \App\Http\Controllers\HouseStatus::INHABITED) selected
                                                @endif>
                                                {{\App\Http\Controllers\HouseStatus::INHABITED}}
                                            </option>
                                            <option value="{{\App\Http\Controllers\HouseStatus::REPAIR}}"
                                                    @if($bills[0]->house->status == \App\Http\Controllers\HouseStatus::REPAIR) selected
                                                @endif>
                                                {{\App\Http\Controllers\HouseStatus::REPAIR}}
                                            </option>
                                        </select></th>
                                    <th>
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    </th>
                                </tr>
                            @endempty
                        </table>
                    </form>
                    <div>
                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Quay Lại
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
