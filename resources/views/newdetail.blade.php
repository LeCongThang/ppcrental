@extends('layout.userlayout')
@section('title')@if(\Illuminate\Support\Facades\Session::get('locale')=='en') {{$news->title_en}} - {{$info->title}} @else {{$news->title}} - {{$info->title}} @endif @endsection
@section('url')news/{{$news->id}}-{{$news->slug}}.html/@endsection
@section('des'){{$info->title}}, {{$news->title_en}},{{$news->title}}, {{$info->description}}@endsection
@section('keywords'){{$info->title}}, {{$news->title}},{{$news->title_en}}, {{$info->seokeyword}}@endsection
@section('author'){{$info->author}}@endsection
@section('image'){{URL::asset('')}}images/news/{{$news->image}}@endsection
@section('content')
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <div class="intro-header">


        <!--<h1>Landing Page</h1>-->
        <!--<h3>A Template by Start Bootstrap</h3>-->
        <!--<hr class="intro-divider">-->
        <!--<ul class="list-inline intro-social-buttons">-->
        <!--<li>-->
        <!--<a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>-->
        <!--</li>-->
        <!--<li>-->
        <!--<a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>-->
        <!--</li>-->
        <!--<li>-->
        <!--<a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>-->
        <!--</li>-->
        <!--</ul>-->
        <div class="home-below-menu">
            <h2>{{trans('home.news')}}</h2>
        </div>


        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-sm-12">
                    <div class="panel panel-custom">
                        <div class="panel-body panel-body-custom">
                            <h3>
                                @if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                    {{$news->title_en}}
                                @else
                                    {{$news->title}}
                                @endif</h3>
                            <i style="font-weight:normal">{{$news->updated_at}}</i>
                            <img src="{{URL::asset('')}}images/news/{{$news->image}}" class="img-responsive">
                            @if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                {!! $news->content_en !!}
                            @else
                                {!! $news->content !!}
                            @endif

                            <a class="btn search-form" href="#" onclick="share_fb('{{URL::asset('')}}news/{{$news->id}}-{{$news->slug_en}}.html');return false;" rel="nofollow"
                               share_url="{{URL::asset('')}}news/{{$news->id}}-{{$news->slug_en}}.html" target="_blank">
                                <i class="fa fa-facebook" aria-hidden="true"></i> {{trans('home.share')}}
                            </a>

                        </div>
                    </div>
                </div>

                    @include('partial.searchright')

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function share_fb(url) {
            window.open('https://www.facebook.com/sharer/sharer.php?u='+url,'facebook-share-dialog',"width=626,height=436")
        }
    </script>
@endsection