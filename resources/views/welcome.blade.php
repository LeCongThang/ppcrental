@extends('layout.userlayout')
@section('title')
    @if(\Illuminate\Support\Facades\Session::get('locale')=='en')
        HOME PAGE -
    @else
        TRANG CHỦ -
    @endif
    {{$info->title}}
@endsection
@section('des')
    {{$info->title}}, {{$info->description}}
@endsection
@section('keywords')
    {{$info->title}},  {{$info->seokeyword}}
@endsection
@section('author')
    {{$info->author}}
@endsection
@section('image')https://ppcrentals.com/images/common_icon/logo.png
@endsection
@section('content')

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
                @foreach($district as $item)
                    @if($loop->iteration==1)
                        <div class="col-sm-8 grid">
                            <figure class="effect-sarah district">
                                <img src="{{URL::asset('')}}images/homepage/{{$item->image}}"
                                     class="district img-responsive"/>
                                <figcaption>
                                    <h2>
                                        <b>@if(\Illuminate\Support\Facades\Session::get('locale')=='en'){{$item->name_en}}@else {{$item->name}}@endif </b>
                                    </h2>
                                    <p>@if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                            {{str_limit($item->description_en,150)}}
                                        @else
                                            {{str_limit($item->description,150)}}
                                        @endif

                                    </p>
                                    <a href="{{URL::asset('')}}search/{{$item->id}}-{{str_slug($item->name_en)}}.html">View
                                        more</a>
                                </figcaption>
                            </figure>

                        </div>
                    @elseif($loop->iteration==2)
                        <div class="col-sm-4 grid">

                            <figure class="effect-chico district" style="margin-bottom: 30px;">
                                <img src="{{URL::asset('')}}images/homepage/{{$item->image}}"
                                     class="district img-responsive"/>
                                <figcaption>
                                    <h2>
                                        <b>@if(\Illuminate\Support\Facades\Session::get('locale')=='en'){{$item->name_en}}@else {{$item->name}}@endif</b>
                                    </h2>
                                    <p>@if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                            {{str_limit($item->description_en,40)}}
                                        @else
                                            {{str_limit($item->description,40)}}
                                        @endif
                                    </p>
                                    <a href="{{URL::asset('')}}search/{{$item->id}}-{{str_slug($item->name_en)}}.html">View
                                        more</a>
                                </figcaption>
                            </figure>
                            @elseif($loop->iteration==3)

                                <figure class="effect-ruby district" style="margin-bottom: 30px;">
                                    <img src="{{URL::asset('')}}images/homepage/{{$item->image}}"
                                         class="district img-responsive"/>
                                    <figcaption>
                                        <h2>
                                            <b>@if(\Illuminate\Support\Facades\Session::get('locale')=='en'){{$item->name_en}}@else {{$item->name}}@endif</b>
                                        </h2>
                                        <p>@if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                                {{str_limit($item->description_en,40)}}
                                            @else
                                                {{str_limit($item->description,40)}}
                                            @endif</p>
                                        <a href="{{URL::asset('')}}search/{{$item->id}}-{{str_slug($item->name_en)}}.html">View
                                            more</a>
                                    </figcaption>
                                </figure>

                        </div>
                    @elseif($loop->iteration==4)
                        <div class="col-sm-4 padding30 grid">
                            <figure class="effect-roxy district">
                                <img src="{{URL::asset('')}}images/homepage/{{$item->image}}"
                                     class="district img-responsive"/>
                                <figcaption>
                                    <h2>
                                        <b>@if(\Illuminate\Support\Facades\Session::get('locale')=='en'){{$item->name_en}}@else {{$item->name}}@endif</b>
                                    </h2>
                                    <p>@if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                            {{str_limit($item->description_en,40)}}
                                        @else
                                            {{str_limit($item->description,40)}}
                                        @endif</p>
                                    <a href="{{URL::asset('')}}search/{{$item->id}}-{{str_slug($item->name_en)}}.html">View
                                        more</a>
                                </figcaption>
                            </figure>
                        </div>
                    @elseif($loop->iteration==5)
                        <div class="col-sm-4 padding30 grid">
                            <figure class="effect-roxy district">
                                <img src="{{URL::asset('')}}images/homepage/{{$item->image}}"
                                     class="district img-responsive"/>
                                <figcaption>
                                    <h2>
                                        <b>@if(\Illuminate\Support\Facades\Session::get('locale')=='en'){{$item->name_en}}@else {{$item->name}}@endif</b>
                                    </h2>
                                    <p>@if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                            {{str_limit($item->description_en,40)}}
                                        @else
                                            {{str_limit($item->description,40)}}
                                        @endif</p>
                                    <a href="{{URL::asset('')}}search/{{$item->id}}-{{str_slug($item->name_en)}}.html">View
                                        more</a>
                                </figcaption>
                            </figure>
                        </div>
                    @elseif($loop->iteration==6)
                        <div class="col-sm-4 padding30 grid">
                            <figure class="effect-roxy district">
                                <img src="{{URL::asset('')}}images/homepage/{{$item->image}}"
                                     class="district img-responsive"/>
                                <figcaption>
                                    <h2>
                                        <b>@if(\Illuminate\Support\Facades\Session::get('locale')=='en'){{$item->name_en}}@else {{$item->name}}@endif</b>
                                    </h2>
                                    <p>@if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                            {{str_limit($item->description_en,40)}}
                                        @else
                                            {{str_limit($item->description,40)}}
                                        @endif</p>
                                    <a href="{{URL::asset('')}}search/{{$item->id}}-{{str_slug($item->name_en)}}.html">View
                                        more</a>
                                </figcaption>
                            </figure>
                        </div>
                    @elseif($loop->iteration==7)
                        <div class="col-sm-6 grid">
                            <figure class="effect-ruby district">
                                <img src="{{URL::asset('')}}images/homepage/{{$item->image}}"
                                     class="district img-responsive"/>
                                <figcaption>
                                    <h2>
                                        <b>@if(\Illuminate\Support\Facades\Session::get('locale')=='en'){{$item->name_en}}@else {{$item->name}}@endif</b>
                                    </h2>
                                    <p>@if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                            {{str_limit($item->description_en,40)}}
                                        @else
                                            {{str_limit($item->description,40)}}
                                        @endif</p>
                                    <a href="{{URL::asset('')}}search/{{$item->id}}-{{str_slug($item->name_en)}}.html">View
                                        more</a>
                                </figcaption>
                            </figure>
                        </div>
                    @elseif($loop->iteration==8)
                        <div class="col-sm-6 grid">
                            <figure class="effect-ruby district">
                                <img src="{{URL::asset('')}}images/homepage/{{$item->image}}"
                                     class="district img-responsive"/>
                                <figcaption>
                                    <h2>
                                        <b>@if(\Illuminate\Support\Facades\Session::get('locale')=='en'){{$item->name_en}}@else {{$item->name}}@endif</b>
                                    </h2>
                                    <p>@if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                            {{str_limit($item->description_en,40)}}
                                        @else
                                            {{str_limit($item->description,40)}}
                                        @endif</p>
                                    <a href="{{URL::asset('')}}search/{{$item->id}}-{{str_slug($item->name_en)}}.html">View
                                        more</a>
                                </figcaption>
                            </figure>
                        </div>
                    @endif
                @endforeach
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
                            <h3 class="panel-title">{{trans('home.featuredproperty')}}<span class="pull-right"><span
                                            class="glyphicon glyphicon-chevron-left arrleft"></span> <span
                                            class="glyphicon glyphicon-chevron-right arrright"></span></span></h3>

                        </div>
                        <div class="panel-body">
                            <section class="regular slider">
                                @foreach($property as $p)
                                    <div class="col-lg-3 grid">
                                        {{--<a href="{{URL::asset('')}}property/{{$p->id}}-{{$p->slug}}.html">--}}
                                        <figure class="effect-zoe" style="margin-bottom: 20px;">
                                            <img src="{{URL::asset('')}}images/project/{{$p->image_overall}}"
                                                 class="district img-responsive pro">
                                            <figcaption>
                                                <p class="icon-links">
                                                    <a href="#"><i class="fa fa-bed mauxanh"
                                                                   aria-hidden="true"></i> {{$p->bedroom}}</a>
                                                    <a href="#"><i class="fa fa-bath mauxanh"
                                                                   aria-hidden="true"></i> {{$p->bathroom}}</a>
                                                    <a href="#"><i class="fa fa-car mauxanh"
                                                                   aria-hidden="true"></i> {{$p->parkingplace}}</a>
                                                </p>
                                                <p class="description">{{str_limit($p->name_en,30)}}</p>
                                            </figcaption>
                                        </figure>
                                        {{--</a>--}}
                                        <h4>
                                            <a href="{{URL::asset('')}}property/{{$p->id}}-{{$p->slug}}.html">
                                                @if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                                    {{str_limit($p->name_en,30)}}
                                                @else
                                                    {{str_limit($p->name,30)}}
                                                @endif
                                            </a>
                                        </h4>
                                        <i style="font-weight: normal"><i class="fa fa-map-marker"
                                                                          aria-hidden="true"></i> {{str_limit($p->location,33)}}
                                        </i>
                                        <hr/>
                                        <h5><span class="glyphicon glyphicon-home"> {{$p->area}}</span> <span
                                                    class="glyphicon glyphicon-bed pull-right"> {{$p->bedroom}}</span>
                                        </h5>
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
                    <h4>{{trans('home.lastnew')}}:</h4>
                    <div class="padding30"></div>
                </div>
                @foreach($news as $n)
                    <div class="col-sm-4 col-xs-12 wow fadeInLeft" data-wow-duration="1.5s">
                        <div class="district">

                            <a style="border-bottom: 1px solid"
                               href="{{URL::asset('')}}/{{$n->id}}-{{$n->slug}}.html"
                               title="{{$item->title}}">
                                <img src="{{URL::asset('')}}images/news/{{$n->image}}" class="img-responsive news"></a>
                            <div class="content-tintuc" style="background-color: #ffffff;padding: 10px;">
                                <h3 style="font-size:20px;"><a
                                            href="{{URL::asset('')}}news/{{$n->id}}-{{$n->slug}}.html">
                                        @if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                            {{str_limit($n->title_en,35)}}
                                        @else
                                            {{str_limit($n->title,35)}}
                                        @endif
                                    </a>
                                </h3>
                                <p style="color: black;font-weight: normal">
                                    @if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                        {!! str_limit(strip_tags($n->content_en),150) !!}
                                    @else
                                        {!! str_limit(strip_tags($n->content),150) !!}
                                    @endif
                                </p>
                            </div>


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
        if (w < 525) {
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
        else if(w>=525 && w<768){
            $(".regular").slick({
                dots: true,
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 2,
                arrows: false,
                autoplay: true

            });
        }
        else if(w>=768 && w<995){
            $(".regular").slick({
                dots: true,
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3,
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