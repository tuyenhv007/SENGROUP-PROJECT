@extends('layout.master')
@section('content')

    <style>
        @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

        fieldset, label { margin: 0; padding: 0; }
        body{ margin: 20px; }
        h1 { font-size: 1.5em; margin: 10px; }

        /****** Style Star Rating Widget *****/

        .rating {
            border: none;
            float: left;
        }

        .rating > input { display: none; }
        .rating > label:before {
            margin: 5px;
            font-size: 1.25em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005";
        }

        .rating > .half:before {
            content: "\f089";
            position: absolute;
        }

        .rating > label {
            color: #ddd;
            float: right;
        }

        /***** CSS Magic to Highlight Stars on Hover *****/

        .rating > input:checked ~ label, /* show gold star when clicked */
        .rating:not(:checked) > label:hover, /* hover current star */
        .rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

        .rating > input:checked + label:hover, /* hover current star when changing rating */
        .rating > input:checked ~ label:hover,
        .rating > label:hover ~ input:checked ~ label, /* lighten current selection */
        .rating > input:checked ~ label:hover ~ label { color: #FFED85;  }
    </style>
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

                                                <b style="font-size: 30px; display: block; color: red; margin: 0 auto; text-align: center">
                                                   {{  $avg  }}
                                                </b>

                                            </div>
                                            <div class="col-sm-5">
                                                <div class="list-rating">
                                                    <div class="item-rating mt-1">
                                                        @foreach($percent as $key =>$value)
                                                            <div>
                                                                {{ $key +1 }} <span class="fa fa-star"
                                                                               style="color: yellow"></span>
                                                            </div>
                                                            <div>
                                                                <span
                                                                    style="width: 100%; height: 13px; display: block; border: 1px solid #dedede">
                                                                    <b style="width: {{$value}}%; background-color: #cc192a; display: block; height: 100%; border-radius: 3px"></b>
                                                                </span>
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                    <div class="mt-3">
                                                        <a href="">{{$count1star}} đánh giá</a>
                                                    </div>
                                                <div class="mt-3">
                                                    <a href="">{{$count2star}} đánh giá</a>
                                                </div>
                                                <div class="mt-3">
                                                    <a href="">{{$count3star}} đánh giá</a>
                                                </div>
                                                <div class="mt-3">
                                                    <a href="">{{$count4star}} đánh giá</a>
                                                </div>
                                                <div class="mt-3">
                                                    <a href="">{{$count5star}} đánh giá</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <button onclick="displayFormRating()"
                                                    style="width: 200px; background: #288ad6; padding: 5px; color: white; border-radius: 5px; margin-left: 200px">
                                                Gửi đánh giá của bạn
                                            </button>
                                        </div>
                                        <hr>

                                        <div id="form-rating" style="display: none">
                                            <div
                                                style="display: flex; margin-top: 15px; margin-left: 150px; font-size: 15px">
                                                <p style="margin-top: 15px;">Chọn đánh giá của bạn: </p>
                                                <fieldset class="rating mt-2 pt-1">
                                                    <input class="star" type="radio" id="star5" name="rating" value="5" data-key="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                                    <input class="star" type="radio" id="star4" name="rating" value="4" data-key="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                                    <input class="star" type="radio" id="star3" name="rating" value="3" data-key="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                                    <input class="star" type="radio" id="star2" name="rating" value="2" data-key="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                                    <input class="star" type="radio" id="star1" name="rating" value="1" data-key="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                                </fieldset>
                                            </div>
                                            <div>
                                                @if(Session::get('user'))
                                                    <div class="card-body">
                                                        <form action="{{route('post.comment',$house->id)}}"
                                                              method="post">
                                                            @csrf
                                                            <div><h6>Viết bình luận</h6></div>
                                                            <div class="form-group">
                                                                <input type="hidden" id="rating-input" name="rating">
                                                        <textarea required name="comment" class="form-control"
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
                                                                <textarea required class="form-control" rows="3"></textarea>
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
    <script>
        $(function () {
            let listStar = $(".rating .star");
            listStar.click(function (e) {
                let $this = $(this);
                document.getElementById('rating-input').value=$this.attr('data-key');
                console.log($this.attr('data-key'));
            })
        });
    </script>
@endsection
