@extends('layout.master')
@section('content')
    <div class="site-block-wrap">
        <div class="owl-carousel with-dots">
            <div class="site-blocks-cover overlay overlay-2"
                 style="background-image: url({{asset('images/hero_1.jpg')}});"
                 data-aos="fade" id="home-section">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-6 mt-lg-5 text-center">
                            <h1 class="text-shadow">Buy &amp; Sell Property Here</h1>
                            <p class="mb-5 text-shadow">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Provident vitae, aut inventore repellendus. Iusto, assumenda! </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-blocks-cover overlay overlay-2"
                 style="background-image: url({{asset('images/hero_2.jpg')}});"
                 data-aos="fade" id="home-section">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-6 mt-lg-5 text-center">
                            <h1 class="text-shadow">Find Your Perfect Property For Your Home</h1>
                            <p class="mb-5 text-shadow">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque
                                quam doloribus reprehenderit dolore adipisci rerum?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section" id="properties-section">
        <div class="container">
            <div class="row large-gutters">
                @foreach($houses as $key => $house)
                    <div class="col-md-6 col-lg-4 mb-5 mb-lg-5 ">
                        <div class="ftco-media-1">
                            <div class="ftco-media-1-inner">
                                <a href="{{route('houses.show',$house->id)}}" class="d-inline-block mb-4"><img
                                        src="{{asset('images/property_1.jpg')}}"
                                        alt="FImageo"
                                        class="img-fluid"></a>
                                <div class="ftco-media-details">
                                    <h3>{{$house->name}}</h3>
                                    <p>Ha Noi</p>
                                    <strong>{{$house->price}}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
