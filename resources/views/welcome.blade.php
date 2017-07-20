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
            @foreach($slider as $item)
                <li data-target="#myCarousel" data-slide-to="{{$loop->iteration-1}}"></li>

            @endforeach
        </ol>
        <!-- Wrapper for Slides -->
        <div class="carousel-inner">

            @foreach($slider as $item)
                <div class="item">
                    <!-- Set the second background image using inline CSS below. -->
                    <div class="fill"
                         style="background-image:url('{{URL::asset('')}}images/slider/{{$item->slider}}');"></div>
                    {{--<div class="carousel-caption">--}}
                    {{--<h2>Caption 2</h2>--}}
                    {{--</div>--}}
                </div>
            @endforeach

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
                    @include('partial.search')
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
                                @foreach($property as $p)
                                    <div class="col-lg-3">
                                        <a href=""><img src="{{URL::asset('')}}images/project/{{$p->image_overall}}"
                                                        class="district img-responsive"></a>
                                        <h4><a href="">{{$p->name_en}}</a></h4>
                                        <i style="font-weight: normal"> {{str_limit($p->location,36)}}</i>
                                        <hr/>
                                        <p><span class="glyphicon glyphicon-home">{{$p->area}}</span> <span
                                                    class="glyphicon glyphicon-bed pull-right"> {{$p->bedroom}}</span>
                                        </p>
                                    </div>
                                @endforeach

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
                @foreach($news as $n)
                    <div class="col-lg-4 col-xs-12 wow fadeInLeft" data-wow-duration="1.5s">
                        <div class="district">
                            <div class="news">
                                <h5><a href="">{{$n->title_en}}</a></h5>
                            </div>

                            <a href=""><img src="{{URL::asset('')}}images/news/{{$n->image}}" class="image-news"></a>

                        </div>
                    </div>
                @endforeach

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
        $(".carousel-inner .item:first").addClass("active");
        $(".carousel-indicators li:first").addClass("active");
    </script>
@endsection