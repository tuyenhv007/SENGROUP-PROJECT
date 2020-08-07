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
                                    <div class="owl-carousel slide-one-item with-dots">
                                        @foreach($house->images as $image)
                                            <span id="zoom"><img src="{{asset('storage/'.$image->image)}}"
                                                                 class="img-fluid"
                                                                 style="width: 100%;height: 700px"></span>
                                        @endforeach
                                    </div>

                                    <div class="card my-4">
                                        <h5 class="card-header">Nhận xét và đánh giá:</h5>
                                        <div style="padding-left: 145px" class="card my-4 pt-3">
                                            <div class="form-group" id="rating-ability-wrapper">
                                                <label class="control-label" for="rating">
                                                    <input type="hidden" id="selected_rating" name="selected_rating"
                                                           value="" required="required">
                                                </label>
                                                <button type="button" class="btnrating btn btn-default btn-lg"
                                                        data-attr="1" id="rating-star-1">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </button>
                                                <button type="button" class="btnrating btn btn-default btn-lg"
                                                        data-attr="2" id="rating-star-2">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </button>
                                                <button type="button" class="btnrating btn btn-default btn-lg"
                                                        data-attr="3" id="rating-star-3">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </button>
                                                <button type="button" class="btnrating btn btn-default btn-lg"
                                                        data-attr="4" id="rating-star-4">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </button>
                                                <button type="button" class="btnrating btn btn-default btn-lg"
                                                        data-attr="5" id="rating-star-5">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </button>
                                            </div>

                                        </div>
                                        @if(Session::get('user'))
                                            <div class="card-body">
                                                <form action="{{route('post.comment',$house->id)}}" method="post">
                                                    @csrf
                                                    <div><h6>Viết bình luận</h6></div>
                                                    <div class="form-group">
                                                        <textarea name="comment" class="form-control"
                                                                  rows="3"></textarea>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
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
@endsection
