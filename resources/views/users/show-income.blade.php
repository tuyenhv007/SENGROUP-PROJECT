@extends('layout.master')
@section('content')
    <div>
        <div class="pt-3 pb-3">
            <div class="card container pt-3">
                <div class="card-header text-center">
                   <h2>{{\Illuminate\Support\Facades\Session::get('user')->name}}-Thống kê doanh thu năm 2020 </h2>
                </div>
                <div class="card-body">
                        <table class="table text-center">
                            <thead class="table-dark">
                            <tr>
                                <th>Tháng 1</th>
                                <th>Tháng 2</th>
                                <th>Tháng 3</th>
                                <th>Tháng 4</th>
                                <th>Tháng 5</th>
                                <th>Tháng 6</th>
                                <th>Tháng 7</th>
                                <th>Tháng 8</th>
                                <th>Tháng 9</th>
                                <th>Tháng 10</th>
                                <th>Tháng 11</th>
                                <th>Tháng 12</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @foreach($income as $month)
                                <td>{{number_format($month)}}</td>
                                @endforeach
                            </tr>

                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

@endsection
