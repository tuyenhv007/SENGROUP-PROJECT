@extends('layout.master')
@section('content')
    <div class="container pt-3">
        <div class="card">
            <div class="card-body">
                <form action="{{route('house.search')}}" method="post" novalidate="novalidate">
                    @csrf
                    <div class="col ml-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 p-0 ml-4">
                                        <input type="text" class="form-control search-slt"
                                               placeholder="Tìm kiếm trên SENGROUP" name="search" id="mySearch">
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 p-0 ml-4">
                                        <button type="submit" class="btn btn-danger wrn-btn">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-12 p-0 ml-4">
                                        <select class="form-control search-slt" id="city" name="city">
                                            <option value="">Tỉnh/Thành Phố:</option>
                                            @foreach($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 p-0 ml-2">
                                        <select class="form-control" name="district" id="district">
                                            <option value="">Quận/Huyện:</option>

                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 p-0 ml-2">
                                        <select class="form-control" name="road" id="road">
                                            <option value="">Xã/Phường:</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container pt-2">
        <div class="site-section" id="properties-section">
            <div class="container">
                @empty($houses[0])
                    <div class="pb-5">
                        Không có dữ liệu
                    </div>
                    <div>
                        <a href="{{route('houses.list')}}" class="btn btn-secondary">Quay Lại </a>
                    </div>
                @else
                    <div class="row large-gutters">
                        @foreach($houses as $key => $house)
                            <div class="col-md-6 col-lg-4 mb-5 mb-lg-5" id="search">
                                <div class="ftco-media-1">
                                    <div class="ftco-media-1-inner">
                                        <a href="{{route('houses.show',$house->id)}}"
                                           class="d-inline-block mb-4"><img
                                                src="{{asset("storage/".$house->images[0]->image)}}"
                                                alt="FImageo"
                                                class="img-fluid"
                                                style="height: 400px;width: 300px;margin: auto"></a>
                                        <div class="ftco-media-details">
                                            <h3><i class='fas fa-tags'></i> &nbsp;{{$house->name}}</h3>
                                            <br>
                                            <strong><i class='fas fa-map-marker-alt'></i>
                                                &nbsp;{{$house->address}},
                                                &nbsp;{{$house->road}},
                                                {{$house->district}},
                                                {{$house->city}}</strong>
                                            <strong>
                                                <br><i class="fa fa-money"></i> &nbsp;{{number_format($house->price)}}
                                                VNĐ</strong>
                                            <br>
                                            <strong
                                                class="@if(($house->status)===\App\Http\Controllers\HouseStatus::EMPTY)
                                                    text-success
                                                    @elseif(($house->status)===\App\Http\Controllers\HouseStatus::INHABITED)
                                                    text-danger
                                                    @else
                                                    text-warning
                                                    @endif">
                                                <i class='fas fa-house-user'></i> &nbsp; Tình
                                                Trạng: {{$house->status}} </strong>
                                            <br>
                                            <strong><i class="fa fa-edit"></i>
                                                &nbsp;{{ $house->created_at->diffForHumans() }}.</strong>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12 col-md-12">
                            <div class="row">
                                <div class="col-12 col-md-10"></div>

                                <div class=" col-12 col-md-2">  {{$houses->appends(request()->query())}}</div>
                            </div>
                        </div>
                    </div>
                @endempty
            </div>
        </div>
    </div>
    </div>

@endsection

