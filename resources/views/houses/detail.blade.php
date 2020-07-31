@extends('layout/master')
@section('content')
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_1.jpg);" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-5 mx-auto mt-lg-5 text-center">
                    <h1>HD17 19 Utica Ave, New York, USA</h1>
                    <p class="mb-5"><strong class="text-white">$2,000,000</strong></p>

                </div>
            </div>
        </div>

        <a href="#property-details" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
    </div>



    <div class="site-section" id="property-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="owl-carousel slide-one-item with-dots">
                        <div><img src="images/property_1.jpg" alt="Image" class="img-fluid"></div>
                        <div><img src="images/property_2.jpg" alt="Image" class="img-fluid"></div>
                        <div><img src="images/property_3.jpg" alt="Image" class="img-fluid"></div>
                    </div>
                </div>
                <div class="col-lg-5 pl-lg-5 ml-auto">
                    <div class="mb-5">
                        <h3 class="text-black mb-4">Property Details</h3>
                        <p>6 Beds, 4 Baths, 4250 sqft.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa tempore repudiandae optio aliquam perspiciatis est quae enim quaerat eos hic dolorem accusamus molestias repellat consequatur velit, officiis nihil magnam placeat!</p>
                        <p>Ex, esse? Obcaecati nam in cum eius quaerat repellendus adipisci ducimus dolorum sed quos. Amet recusandae cumque reprehenderit nam quia voluptatibus, repellat, aspernatur ut fuga perferendis consectetur excepturi neque in!</p>
                        <p class="mb-4">Neque facilis iure earum, placeat odit ipsum, amet, optio accusantium voluptatem quasi obcaecati fugit? Explicabo eius dolorem provident quis non voluptas, dignissimos tempora eligendi, in, nam velit, quasi tenetur. Animi!</p>
                        <p><a href="#" class="btn btn-primary">Buy Property</a></p>
                    </div>

                    <div class="mb-5">

                        <div class="mt-5">
                            <img src="images/person_1.jpg" alt="Image" class="w-25 mb-3 rounded-circle">
                            <h4 class="text-black">Kyla Stewart</h4>
                            <p class="text-muted mb-4">Real Estate Agent</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, iure atque sit ratione vitae neque! Laborum voluptate eius, laboriosam explicabo!</p>
                            <p><a href="#" class="btn btn-primary btn-sm">Contact Agent</a></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-5">
                            <h2 class="footer-heading mb-4">About Us</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque facere laudantium magnam voluptatum autem. Amet aliquid nesciunt veritatis aliquam.</p>
                        </div>
                        <div class="col-md-3 mx-auto">
                            <h2 class="footer-heading mb-4">Quick Links</h2>
                            <ul class="list-unstyled">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-4">
                        <h2 class="footer-heading mb-4">Subscribe Newsletter</h2>
                        <form action="#" method="post" class="footer-subscribe">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary text-black" type="button" id="button-addon2">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="">
                        <h2 class="footer-heading mb-4">Follow Us</h2>
                        <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                    </div>


                </div>
            </div>
            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <div class="border-top pt-5">
                        <p class="copyright">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </footer>

</div>
@endsection
