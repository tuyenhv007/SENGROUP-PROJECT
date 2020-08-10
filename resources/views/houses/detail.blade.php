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
                                    <div class="row">
                                        <div class="col-12">
                                            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="basicInfo-tab" data-toggle="tab"
                                                       href="#basicInfo" role="tab" aria-controls="basicInfo"
                                                       aria-selected="true">Xem ảnh</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="connectedServices-tab" data-toggle="tab"
                                                       href="#connectedServices" role="tab"
                                                       aria-controls="connectedServices"
                                                       aria-selected="false">Xem bản đồ</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content ml-1" id="myTabContent">
                                                <div class="tab-pane fade show active" id="basicInfo" role="tabpanel"
                                                     aria-labelledby="basicInfo-tab">
                                                    <div class="row">
                                                        <div class="owl-carousel slide-one-item with-dots">
                                                            @foreach($house->images as $image)
                                                                <span id="zoom"><img
                                                                        src="{{asset('storage/'.$image->image)}}"
                                                                        class="img-fluid"
                                                                        style="width: 100%;height: 700px"></span>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane fade" id="connectedServices" role="tabpanel"
                                                     aria-labelledby="ConnectedServices-tab">
                                                    <div class="tab-pane fade show active" id="basicInfo"
                                                         role="tabpanel"
                                                         aria-labelledby="basicInfo-tab">
                                                        <div class="row">
                                                            <iframe src="{{ $house->location }}" width="600"
                                                                    height="450" frameborder="0" style="border:0;"
                                                                    allowfullscreen="" aria-hidden="false"
                                                                    tabindex="0">
                                                            </iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">

                                    </div>
                                    <div class="card my-4">
                                        <h3 class="card-header">Nhận xét và đánh giá</h3>
                                        <div class="row" style="display: flex; align-items: center">
                                            <div class="col-sm-4" style="width: 20%; position: relative">
                                                <span class="fa fa-star mt-2"
                                                      style="font-size: 100px; display: block; color: yellow; margin: 0 auto; text-align: center"></span>
                                                <b style="font-size: 30px; display: block; color: red; margin: 0 auto; text-align: center">2,5</b>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="list-rating">
                                                    <div class="item-rating mt-1">
                                                        @for($i = 1; $i <=5; $i++)
                                                            <div>
                                                                {{ $i }} <span class="fa fa-star"
                                                                               style="color: yellow"></span>
                                                            </div>
                                                            <div>
                                                                <span
                                                                    style="width: 100%; height: 13px; display: block; border: 1px solid #dedede">
                                                                    <b style="width: 45%; background-color: #cc192a; display: block; height: 100%; border-radius: 3px"></b>
                                                                </span>
                                                            </div>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                @for ($i = 1; $i <= 5; $i ++)
                                                    <div class="mt-3">
                                                        <a href="">1000 đánh giá</a>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                        <?php
                                        $listRatingText = [
                                            1 => 'Không thích',
                                            2 => 'Tạm được',
                                            3 => 'Bình thường',
                                            4 => 'Tốt',
                                            5 => 'Tuyệt vời',
                                        ];
                                        ?>
                                        <div class="mt-3">
                                            <a href="#" onclick="displayFormRating()"
                                               style="width: 200px; background: #288ad6; padding: 5px; color: white; border-radius: 5px; margin-left: 230px">Đánh
                                                giá ở đây</a>
                                        </div>
                                        <hr>

                                        <div id="form-rating" style="display: none">
                                            <div
                                                style="display: flex; margin-top: 15px; margin-left: 150px; font-size: 15px">
                                                <p>Chọn đánh giá của bạn: </p>
                                                <span style="margin: 0 15px; padding-top: 2px" class="list_star rating_active">
                                                    @for ($i = 1; $i <= 5; $i++ )
                                                        <i class="fa fa-star" data-key="{{$i}}"></i>
                                                    @endfor
                                                </span>
{{--                                                <span class="list-text">Tot</span>--}}
                                            </div>
                                            <div>
                                                @if(Session::get('user'))
                                                    <div class="card-body">
                                                        <form action="{{route('post.comment',$house->id)}}"
                                                              method="post">
                                                            @csrf
                                                            <div><h6>Viết bình luận</h6></div>
                                                            <div class="form-group">
                                                        <textarea name="comment" class="form-control"
                                                                  rows="3"></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Gửi đánh giá
                                                            </button>
                                                        </form>
                                                    </div>
                                                @else
                                                    <div class="card-body">
                                                        <form action="{{route('check.comment')}}" method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <textarea class="form-control" rows="3"></textarea>
                                                            </div>
                                                            <button
                                                                onclick="return confirm('Đăng nhập để sử dụng chức năng này?')"
                                                                class="btn btn-primary">Bình luận
                                                            </button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Comment -->
                                    @foreach($comments as $comment)
                                        <div class="media mb-4">
                                            <img class="d-flex mr-3 rounded-circle" style="width: 30px;height: 30px"
                                                 src="{{asset('storage/images/'.$comment->user->image)}}" alt="">
                                            <div class="media-body">
                                                <h6 class="mt-0">
                                                    {{$comment->user->name}}
                                                </h6>
                                                {{$comment->content}}<br>
                                                {{$comment->created_at->diffForHumans()}}.
                                            </div>
                                        </div>
                                @endforeach
                                <!-- Comment with nested comments -->
                                </div>
                                <div class="col-lg-5 pl-lg-5 ml-auto" style="float:right;">
                                    <div class="mb-5">
                                        <h3 class="text-black mb-4"><i class='fas fa-tags'></i> &nbsp;{{$house->name}}.
                                        </h3>
                                        <h5><i class='fas fa-map-marker-alt'></i> &nbsp;{{$house->address}},
                                            {{$house->road}},
                                            {{$house->district}},
                                            {{$house->city}}</h5>
                                        <h5 class="mb-2"><i class='fas fa-bed'></i> &nbsp; Số phòng
                                            ngủ: {{$house->rooms}} phòng.</h5><br>
                                        <article class="mb-1" id="editor"><i class='fas fa-list-alt'></i> &nbsp; Thông
                                            tin mô
                                            tả :{!! $house->desc !!}</article>
                                        <h4 class="mb-1"><i class="fa fa-money "></i> &nbsp;Giá
                                            Tiền: {{number_format($house->price)}} VNĐ</h4>
                                        <ul class="alert text-danger">
                                            @foreach ($errors ->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                        <div class="pt-2">
                                            <button type="button"
                                                    class="btn btn-primary @if((\Illuminate\Support\Facades\Session::get('user')) && (\Illuminate\Support\Facades\Session::get('user')->id)===($house->user->id))
                                                        d-none
                                                        @else
                                                        d-inline
                                                        @endif" data-toggle="modal"
                                                    data-target="#exampleModal" data-whatever="@mdo">Đặt Thuê
                                            </button>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <form method="post" action="{{route('houses.bookHouse',$house->id)}}">
                                                    @csrf
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Đặt
                                                                    nhà:</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">

                                                                    <label for="recipient-name" class="col-form-label">Ngày
                                                                        Đến:</label>
                                                                    <input type="date" class="form-control"
                                                                           id="recipient-name" name="dateIn">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text" class="col-form-label">Ngày
                                                                        Đi:</label>
                                                                    <input class="form-control"
                                                                           id="message-text" type="date" name="dateOut">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text" class="col-form-label">Ghi
                                                                        Chú:</label>
                                                                    <textarea class="form-control" name="note"
                                                                              id="desc"></textarea>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Thoát
                                                                </button>
                                                                <button type="submit" class="btn btn-primary">Đặt thuê
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <a href="{{route('houses.list')}}" class="btn btn-secondary">Quay Lại </a>
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <div class="mt-5">
                                            <img src="{{asset('storage/images/'.$house->user->image)}}" alt="Image"
                                                 class="w-25 mb-3 " style="width: 100px;height: 100px">
                                            <h5 class="text-black"><i class='fas fa-user-edit'></i> &nbsp; Người
                                                Đăng: {{$house->user->name}}</h5>
                                            <p class="text-black"><i class='fas fa-phone-square-alt'></i> &nbsp;
                                                Phone: {{$house->user->phone}}</p>
                                        </div>
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
