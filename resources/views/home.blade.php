@extends('layouts.master')
@section('title', 'Welcome')
@section('css-implementing-plugins')
    <link href='{!! url("assets/plugins/parallax-slider/css/parallax-slider.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("assets/plugins/owl-carousel/owl-carousel/owl.carousel.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('css-page-style')
@endsection
@section('content')
    <div class="slider-inner"><!--=== Slider ===-->
        <div id="da-slider" class="da-slider">
            <div class="da-slide">
                <h2><i>CLEAN &amp; FRESH</i> <br/> <i>FULLY RESPONSIVE</i> <br/> <i>DESIGN</i></h2>
                <p><i>Lorem ipsum dolor amet</i> <br/> <i>tempor incididunt ut</i> <br/> <i>veniam omnis </i></p>
                <div class="da-img"><img class="img-responsive" src="assets/plugins/parallax-slider/img/1.png" alt="">
                </div>
            </div>
            <div class="da-slide">
                <h2><i>RESPONSIVE VIDEO</i> <br/> <i>SUPPORT AND</i> <br/> <i>MANY MORE</i></h2>
                <p><i>Lorem ipsum dolor amet</i> <br/> <i>tempor incididunt ut</i></p>
                <div class="da-img">
                    <iframe src="http://player.vimeo.com/video/47911018" width="530" height="300" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                </div>
            </div>
            <div class="da-slide">
                <h2><i>USING BEST WEB</i> <br/> <i>SOLUTIONS WITH</i> <br/> <i>HTML5/CSS3</i></h2>
                <p><i>Lorem ipsum dolor amet</i> <br/> <i>tempor incididunt ut</i> <br/> <i>veniam omnis </i></p>
                <div class="da-img"><img src="assets/plugins/parallax-slider/img/html5andcss3.png" alt="image01"/></div>
            </div>
            <div class="da-arrows">
                <span class="da-arrows-prev"></span> <span class="da-arrows-next"></span>
            </div>
        </div>
    </div><!--/slider-->
    <!--=== End Slider ===-->

    <!--=== Purchase Block ===-->
    <div class="purchase">
        <div class="container">
            <div class="row">
                <div class="col-md-9 animated fadeInLeft">
                    <span>Unify is a clean and fully responsive incredible Template.</span>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi vehicula sem ut volutpat. Ut non libero magna fusce condimentum eleifend enim a feugiat corrupti quos.</p>
                </div>
                <div class="col-md-3 btn-buy animated fadeInRight">
                    <a href="#" class="btn-u btn-u-lg"><i class="fa fa-cloud-download"></i> Download Now</a>
                </div>
            </div>
        </div>
    </div><!--/row-->
    <!-- End Purchase Block -->

    <!--=== Content Part ===-->
    <div class="container content-sm">
        <!-- Service Blocks -->
        <div class="row margin-bottom-30">
            <div class="col-md-4">
                <div class="service">
                    <i class="fa fa-compress service-icon"></i>
                    <div class="desc">
                        <h4>Fully Responsive</h4>
                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus etiam sem...</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service">
                    <i class="fa fa-cogs service-icon"></i>
                    <div class="desc">
                        <h4>HTML5 + CSS3</h4>
                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus etiam sem...</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service">
                    <i class="fa fa-rocket service-icon"></i>
                    <div class="desc">
                        <h4>Launch Ready</h4>
                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus etiam sem...</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Service Blokcs -->

        <!-- Recent Works -->
        <div class="headline"><h2>Recent Works</h2></div>
        <div class="row margin-bottom-20">
            <div class="col-md-3 col-sm-6">
                <div class="thumbnails thumbnail-style thumbnail-kenburn">
                    <div class="thumbnail-img">
                        <div class="overflow-hidden">
                            <img class="img-responsive" src="assets/img/main/img1.jpg" alt="">
                        </div>
                        <a class="btn-more hover-effect" href="#">read more +</a>
                    </div>
                    <div class="caption">
                        <h3><a class="hover-effect" href="#">Project One</a></h3>
                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="thumbnails thumbnail-style thumbnail-kenburn">
                    <div class="thumbnail-img">
                        <div class="overflow-hidden">
                            <img class="img-responsive" src="assets/img/main/img12.jpg" alt="">
                        </div>
                        <a class="btn-more hover-effect" href="#">read more +</a>
                    </div>
                    <div class="caption">
                        <h3><a class="hover-effect" href="#">Project Two</a></h3>
                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="thumbnails thumbnail-style thumbnail-kenburn">
                    <div class="thumbnail-img">
                        <div class="overflow-hidden">
                            <img class="img-responsive" src="assets/img/main/img3.jpg" alt="">
                        </div>
                        <a class="btn-more hover-effect" href="#">read more +</a>
                    </div>
                    <div class="caption">
                        <h3><a class="hover-effect" href="#">Project Three</a></h3>
                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="thumbnails thumbnail-style thumbnail-kenburn">
                    <div class="thumbnail-img">
                        <div class="overflow-hidden">
                            <img class="img-responsive" src="assets/img/main/img17.jpg" alt="">
                        </div>
                        <a class="btn-more hover-effect" href="#">read more +</a>
                    </div>
                    <div class="caption">
                        <h3><a class="hover-effect" href="#">Project Four</a></h3>
                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Recent Works -->

        <!-- Info Blokcs -->
        <div class="row margin-bottom-30">
            <!-- Welcome Block -->
            <div class="col-md-8 md-margin-bottom-40">
                <div class="headline"><h2>Welcome To Unify</h2></div>
                <div class="row">
                    <div class="col-sm-4">
                        <img class="img-responsive margin-bottom-20" src="assets/img/main/img18.jpg" alt="">
                    </div>
                    <div class="col-sm-8">
                        <p>Unify is an incredibly beautiful responsive Bootstrap Template for corporate and creative professionals. It works on all major web browsers, tablets and phone.</p>
                        <ul class="list-unstyled margin-bottom-20">
                            <li><i class="fa fa-check color-green"></i> Donec id elit non mi porta gravida</li>
                            <li><i class="fa fa-check color-green"></i> Corporate and Creative</li>
                            <li><i class="fa fa-check color-green"></i> Responsive Bootstrap Template</li>
                            <li><i class="fa fa-check color-green"></i> Corporate and Creative</li>
                        </ul>
                    </div>
                </div>

                <blockquote class="hero-unify">
                    <p>Award winning digital agency. We bring a personal and effective approach to every project we work on, which is why. Unify is an incredibly beautiful responsive Bootstrap Template for corporate professionals.</p>
                    <small>CEO, Jack Bour</small>
                </blockquote>
            </div><!--/col-md-8-->

            <!-- Latest Shots -->
            <div class="col-md-4">
                <div class="headline"><h2>Latest Shots</h2></div>
                <div id="myCarousel" class="carousel slide carousel-v1">
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="assets/img/main/img4.jpg" alt="">
                            <div class="carousel-caption">
                                <p>Facilisis odio, dapibus ac justo acilisis gestinas.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="assets/img/main/img2.jpg" alt="">
                            <div class="carousel-caption">
                                <p>Cras justo odio, dapibus ac facilisis into egestas.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="assets/img/main/img24.jpg" alt="">
                            <div class="carousel-caption">
                                <p>Justo cras odio apibus ac afilisis lingestas de.</p>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-arrow">
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i> </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <i class="fa fa-angle-right"></i> </a>
                    </div>
                </div>
            </div><!--/col-md-4-->
        </div>
        <!-- End Info Blokcs -->

        <!-- Owl Clients v1 -->
        <div class="headline"><h2>Our Clients</h2></div>
        <div class="owl-clients-v1">
            <div class="item">
                <img src="assets/img/clients4/1.png" alt="">
            </div>
            <div class="item">
                <img src="assets/img/clients4/2.png" alt="">
            </div>
            <div class="item">
                <img src="assets/img/clients4/3.png" alt="">
            </div>
            <div class="item">
                <img src="assets/img/clients4/4.png" alt="">
            </div>
            <div class="item">
                <img src="assets/img/clients4/5.png" alt="">
            </div>
            <div class="item">
                <img src="assets/img/clients4/6.png" alt="">
            </div>
            <div class="item">
                <img src="assets/img/clients4/7.png" alt="">
            </div>
            <div class="item">
                <img src="assets/img/clients4/8.png" alt="">
            </div>
            <div class="item">
                <img src="assets/img/clients4/9.png" alt="">
            </div>
        </div>
        <!-- End Owl Clients v1 -->
    </div><!--/container-->
    <!-- End Content Part -->
@endsection
@section('js-implementing-plugins')
    <script type="text/javascript" src="{!! url('assets/plugins/parallax-slider/js/jquery.cslider.js') !!}"></script>
    <script type="text/javascript" src="{!! url('assets/plugins/owl-carousel/owl-carousel/owl.carousel.js') !!}"></script>
@endsection
@section('js-inline')
@endsection
@section('js-page-level')
    <script type="text/javascript" src="{!! url('assets/js/plugins/owl-carousel.js') !!}"></script>
    <script type="text/javascript" src="{!! url('assets/js/plugins/parallax-slider.js') !!}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            OwlCarousel.initOwlCarousel();
            ParallaxSlider.initParallaxSlider();
        });
    </script>
@endsection
