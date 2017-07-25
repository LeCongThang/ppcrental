@extends('layout.userlayout')
@section('content')
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
                <div class="col-md-9">
                    <div class="panel panel-custom">
                        <div class="panel-body panel-body-custom">
                            @foreach($news as $item)
                                <div class="newspage">
                                    <h3>
                                        <a class="mauxanh" href="{{URL::asset('')}}news/{{$item->id}}-{{$item->slug}}.html">
                                            @if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                            {{$item->title_en}}
                                        @else
                                                {{$item->title}}
                                            @endif
                                        </a>
                                    </h3>
                                    <i style="font-weight: normal;">{{\App\Models\PpcUser::find($item->author_id)->fullname}}
                                        - {{$item->updated_at}}</i>
                                    <img src="{{URL::asset('')}}images/news/{{$item->image}}" class="img-responsive">
                                    <p>
                                        @if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                            {!! str_limit($item->content_en,300) !!}
                                        @else
                                            {!! str_limit($item->content,300) !!}
                                        @endif

                                    </p>
                                    <a href="{{URL::asset('')}}news/{{$item->id}}-{{$item->slug}}.html"
                                       class="btn search-form">{{trans('home.readmore')}}</a>

                                </div>
                                <hr>
                            @endforeach
                            {!! $news->render() !!}
                        </div>
                    </div>
                </div>

                @include('partial.searchright')

            </div>
        </div>
    </div>
@endsection