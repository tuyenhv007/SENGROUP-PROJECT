@extends('layout.master')
@section('content')
    <div class="pb-5">
        <div>
            <div class="site-blocks-cover inner-page-cover overlay"
                 style="background-image: url({{asset('images/icons/anh7.jpg')}});" data-aos="fade">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-5 mx-auto mt-lg-5 text-center">

                        </div>
                    </div>
                </div>
            </div>
            <div class="site-section" id="property-details">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="owl-carousel slide-one-item with-dots">
                                @foreach($house->images as $image)
                                    <div><img src="{{asset('storage/'.$image->image)}}" class="img-fluid"
                                              style="width: 100%;height: 700px"></div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-5 pl-lg-5 ml-auto">
                            <form method="post" action="{{route('houses.bookHouse',$house->id)}}">
                                @csrf
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                <div>
                                    <h3><label>Đặt thuê:</label></h3>
                                </div>
                                <div class="form-group">
                                    <label>Ngày Đến Ở : </label>
                                    <input type="date" class="form-control"
                                           name="dateIn">
                                </div>
                                <div class="form-group">
                                    <label>Ngày Trả Nhà :</label>
                                    <input type="date" class="form-control"
                                           name="dateOut">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
