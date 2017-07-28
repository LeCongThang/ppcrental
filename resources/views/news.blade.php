@extends('layout.userlayout')
@section('title')@if(\Illuminate\Support\Facades\Session::get('locale')=='en') NEWS - PPC RENTAL @else TIN TỨC -PPC RENTAL @endif @endsection
@section('des'){{$info->title}},  {{$info->description}}@endsection
@section('keywords'){{$info->title}}, {{$info->seokeyword}}@endsection
@section('author'){{$info->author}}@endsection
@section('image')https://ppcrentals.com/images/common_icon/logo.png@endsection
@section('content')
    <div class="intro-header">

        <div class="home-below-menu">
            <h2>{{trans('home.news')}}</h2>
        </div>
    </div>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-sm-12">
                    <div class="panel panel-custom">
                        <div class="panel-body panel-body-custom">
                            @foreach($news as $item)
                                <div class="newspage">
                                    <h3>
                                        <a href="{{URL::asset('')}}news/{{$item->id}}-{{$item->slug}}.html">
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