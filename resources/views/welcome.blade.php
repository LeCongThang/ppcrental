@extends('layout.userlayout')
@section('content')
    {{--<a name="about"></a>--}}
    {{--<div class="intro-header">--}}


    {{--<div class="intro-message">--}}
    {{--<!--<h1>Landing Page</h1>-->--}}
    {{--<!--<h3>A Template by Start Bootstrap</h3>-->--}}
    {{--<!--<hr class="intro-divider">-->--}}
    {{--<!--<ul class="list-inline intro-social-buttons">-->--}}
    {{--<!--<li>-->--}}
    {{--<!--<a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>-->--}}
    {{--<!--</li>-->--}}
    {{--<!--<li>-->--}}
    {{--<!--<a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>-->--}}
    {{--<!--</li>-->--}}
    {{--<!--<li>-->--}}
    {{--<!--<a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>-->--}}
    {{--<!--</li>-->--}}
    {{--<!--</ul>-->--}}
    {{--<section class="regular1 slider">--}}
    {{--<img src="{{URL::asset('')}}images/homepage/banner.jpg" class="img-responsive"/>--}}
    {{--</section>--}}
    {{--</div>--}}


    {{--<!-- /.container -->--}}

    {{--</div>--}}
    <!-- /.intro-header -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->

        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('{{URL::asset('')}}images/homepage/banner.jpg');"></div>
                {{--<div class="carousel-caption">--}}
                {{--<h2>Caption 1</h2>--}}
                {{--</div>--}}
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('{{URL::asset('')}}images/homepage/banner.jpg');"></div>
                {{--<div class="carousel-caption">--}}
                {{--<h2>Caption 2</h2>--}}
                {{--</div>--}}
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('{{URL::asset('')}}images/homepage/banner.jpg');"></div>
                {{--<div class="carousel-caption">--}}
                {{--<h2>Caption 3</h2>--}}
                {{--</div>--}}
            </div>
        </div>

        {{--<!-- Controls -->--}}
        {{--<a class="left carousel-control" href="#myCarousel" data-slide="prev">--}}
        {{--<span class="icon-prev"></span>--}}
        {{--</a>--}}
        {{--<a class="right carousel-control" href="#myCarousel" data-slide="next">--}}
        {{--<span class="icon-next"></span>--}}
        {{--</a>--}}

    </header>

    <a name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-custom">
                        <div class="panel-heading">
                            <h3 class="panel-title">FIND YOUR PLACE</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-inline" action="" method="">
                                <div class="form-group col-lg-3">

                                    <select class="form-control">
                                        <option value="">Location</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-3">

                                    <select class="form-control">
                                        <option value="">Property Type</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-3">

                                    <select class="form-control">
                                        <option value="">Property Status</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-3">

                                    <input type="text" class="form-control" placeholder="Keyword"/>
                                </div>
                                <div class="form-group col-lg-3">

                                    <select class="form-control">
                                        <option value="">Bedrooms</option>
                                    </select>

                                </div>
                                <div class="form-group col-lg-3">

                                    <select class="form-control">
                                        <option value="">Min Budget</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-3">
                                    <select class="form-control">
                                        <option value="">Max Budget</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-3">
                                    <button type="submit" class="btn btn-default form-control search-form">Search
                                    </button>
                                </div>


                            </form>

                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-8 grid">
                    <figure class="effect-sarah district">
                        <img src="{{URL::asset('')}}images/homepage/quan-1.jpg" class="district img-responsive"/>
                        <figcaption>
                            <h2><b>District 1</b></h2>
                            <p>Bubba likes to appear out of thin air.</p>
                            <a href="#">View more</a>
                        </figcaption>
                    </figure>

                </div>
                <div class="col-lg-4 grid">

                    <figure class="effect-chico district" style="margin-bottom: 30px;">
                        <img src="{{URL::asset('')}}images/homepage/quan-2.jpg" class="district img-responsive"/>
                        <figcaption>
                            <h2><b>District 1</b></h2>
                            <p>Bubba likes to appear out of thin air.</p>
                            <a href="#">View more</a>
                        </figcaption>
                    </figure>


                    <figure class="effect-ruby district" style="margin-bottom: 30px;">
                        <img src="{{URL::asset('')}}images/homepage/quan-binhthanh.jpg"
                             class="district img-responsive"/>
                        <figcaption>
                            <h2><b>District 1</b></h2>
                            <p>Bubba likes to appear out of thin air.</p>
                            <a href="#">View more</a>
                        </figcaption>
                    </figure>

                </div>
                <div class="col-lg-4 padding30 grid">
                    <figure class="effect-roxy district">
                        <img src="{{URL::asset('')}}images/homepage/quan-5.jpg" class="img-responsive"/>
                        <figcaption>
                            <h2><b>District 1</b></h2>
                            <p>Bubba likes to appear out of thin air.</p>
                            <a href="#">View more</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-lg-4 padding30 grid">
                    <figure class="effect-roxy district">
                        <img src="{{URL::asset('')}}images/homepage/quan-4.jpg" class="img-responsive"/>
                        <figcaption>
                            <h2><b>District 1</b></h2>
                            <p>Bubba likes to appear out of thin air.</p>
                            <a href="#">View more</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-lg-4 padding30 grid">
                    <figure class="effect-roxy district">
                        <img src="{{URL::asset('')}}images/homepage/quan-5.jpg" class="img-responsive"/>
                        <figcaption>
                            <h2><b>District 1</b></h2>
                            <p>Bubba likes to appear out of thin air.</p>
                            <a href="#">View more</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-lg-6 grid">
                    <figure class="effect-ruby district">
                        <img src="{{URL::asset('')}}images/homepage/quan-phunhuan.jpg" class="img-responsive"/>
                        <figcaption>
                            <h2><b>District 1</b></h2>
                            <p>Bubba likes to appear out of thin air.</p>
                            <a href="#">View more</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-lg-6 grid">
                    <figure class="effect-ruby district">
                        <img src="{{URL::asset('')}}images/homepage/quan-7.jpg" class="img-responsive"/>
                        <figcaption>
                            <h2><b>District 1</b></h2>
                            <p>Bubba likes to appear out of thin air.</p>
                            <a href="#">View more</a>
                        </figcaption>
                    </figure>
                </div>

            </div>


        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->


    <div class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-custom">
                        <div class="panel-heading">
                            <h3 class="panel-title">FEATURE PROPERTIES <span class="pull-right"><span
                                            class="glyphicon glyphicon-chevron-left arrleft"></span> <span
                                            class="glyphicon glyphicon-chevron-right arrright"></span></span></h3>

                        </div>
                        <div class="panel-body">
                            <section class="regular slider">
                                <div class="col-lg-3">
                                    <img src="{{URL::asset('')}}images/homepage/property.jpg"
                                         class="district img-responsive">
                                    <h5>The Vista An Phu</h5>
                                    <i>537 Nguyen Duy Trinh, District 2</i>
                                    <hr/>
                                    <p><span class="glyphicon glyphicon-home"> 50m<sup>2</sup></span> <span
                                                class="glyphicon glyphicon-bed pull-right"> 2Bedrooms</span></p>
                                </div>

                                <div class="col-lg-3">
                                    <img src="{{URL::asset('')}}images/homepage/property.jpg"
                                         class="district img-responsive">
                                    <h5>The Vista An Phu</h5>
                                    <i>537 Nguyen Duy Trinh, District 2</i>
                                    <hr/>
                                    <p><span class="glyphicon glyphicon-home"> 50m<sup>2</sup></span> <span
                                                class="glyphicon glyphicon-bed pull-right"> 2Bedrooms</span></p>
                                </div>

                                <div class="col-lg-3">
                                    <img src="{{URL::asset('')}}images/homepage/property.jpg"
                                         class="district img-responsive">
                                    <h5>The Vista An Phu</h5>
                                    <i>537 Nguyen Duy Trinh, District 2</i>
                                    <hr/>
                                    <p><span class="glyphicon glyphicon-home"> 50m<sup>2</sup></span> <span
                                                class="glyphicon glyphicon-bed pull-right"> 2Bedrooms</span></p>
                                </div>
                                <div class="col-lg-3">
                                    <img src="{{URL::asset('')}}images/homepage/property.jpg"
                                         class="district img-responsive">
                                    <h5>The Vista An Phu</h5>
                                    <i>537 Nguyen Duy Trinh, District 2</i>
                                    <hr/>
                                    <p><span class="glyphicon glyphicon-home"> 50m<sup>2</sup></span> <span
                                                class="glyphicon glyphicon-bed pull-right"> 2Bedrooms</span></p>
                                </div>
                                <div class="col-lg-3">
                                    <img src="{{URL::asset('')}}images/homepage/property.jpg"
                                         class="district img-responsive">
                                    <h5>The Vista An Phu</h5>
                                    <i>537 Nguyen Duy Trinh, District 2</i>
                                    <hr/>
                                    <p><span class="glyphicon glyphicon-home"> 50m<sup>2</sup></span> <span
                                                class="glyphicon glyphicon-bed pull-right"> 2Bedrooms</span></p>
                                </div>
                                <div class="col-lg-3">
                                    <img src="{{URL::asset('')}}images/homepage/property.jpg"
                                         class="district img-responsive">
                                    <h5>The Vista An Phu</h5>
                                    <i>537 Nguyen Duy Trinh, District 2</i>
                                    <hr/>
                                    <p><span class="glyphicon glyphicon-home"> 50m<sup>2</sup></span> <span
                                                class="glyphicon glyphicon-bed pull-right"> 2Bedrooms</span></p>
                                </div>
                                <div class="col-lg-3">
                                    <img src="{{URL::asset('')}}images/homepage/property.jpg"
                                         class="district img-responsive">
                                    <h5>The Vista An Phu</h5>
                                    <i>537 Nguyen Duy Trinh, District 2</i>
                                    <hr/>
                                    <p><span class="glyphicon glyphicon-home"> 50m<sup>2</sup></span> <span
                                                class="glyphicon glyphicon-bed pull-right"> 2Bedrooms</span></p>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <a name="contact"></a>
    <div class="banner">

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <h4>LATEST NEWS:</h4>
                    <div class="padding30"></div>
                </div>

                <div class="col-lg-4 col-xs-12 wow fadeInLeft" data-wow-duration="1.5s">
                    <div class="district">
                        <div class="news">
                            <h5>WHY SHOULD YOU CHOOSE CHAMMING LAPINTER?</h5>
                        </div>

                        <img src="{{URL::asset('')}}images/homepage/news.jpg" class="image-news">

                    </div>
                </div>
                <div class="col-lg-4 col-xs-12 wow fadeInDown" data-wow-duration="1.5s">
                    <div class="district">
                        <div class="news">
                            <h5>WHY SHOULD YOU CHOOSE CHAMMING LAPINTER?</h5>
                        </div>

                        <img src="{{URL::asset('')}}images/homepage/news.jpg" class="image-news">

                    </div>
                </div>
                <div class="col-lg-4 col-xs-12 wow fadeInRight" data-wow-duration="1.5s">
                    <div class="district">
                        <div class="news">
                            <h5>WHY SHOULD YOU CHOOSE CHAMMING LAPINTER?</h5>
                        </div>

                        <img src="{{URL::asset('')}}images/homepage/news.jpg" class="image-news">

                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->
@endsection
@section('scripts')
    <script>
        // For Demo purposes only (show hover effect on mobile devices)
        [].slice.call(document.querySelectorAll('a[href="#"')).forEach(function (el) {
            el.addEventListener('click', function (ev) {
                ev.preventDefault();
            });
        });
    </script>
    <script>
        var w = screen.width;
        if (w < 768) {
            //$('.content-menu').removeClass('container');
            $(".regular").slick({
                dots: true,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                autoplay: true

            });
        }
        else {
            $(".regular").slick({
                dots: true,
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 4,
                arrows: false,
                autoplay: true

            });
        }
        $('.arrleft').click(function () {
            $('.slider').slick('slickPrev');
        })

        $('.arrright').click(function () {
            $('.slider').slick('slickNext');
        })

    </script>
@endsection