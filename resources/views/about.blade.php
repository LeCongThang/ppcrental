@extends('layout.userlayout')
@section('title')
    @if(\Illuminate\Support\Facades\Session::get('locale')=='en')
        ABOUT -
    @else
        GIỚI THIỆU -
    @endif
    {{$info->title}}
@endsection
@section('des')
    {{$info->title}}, {{$about->about}}, {{$info->description}}
@endsection
@section('keywords')
    {{$info->title}}, {{$about->about}}, {{$info->seokeyword}}
@endsection
@section('author')
    {{$info->author}}
@endsection
@section('image')
https://ppcrentals.com/images/common_icon/logo.png
@endsection
@section('content')
    <div class="intro-header">
        <div class="home-below-menu">
            <h2>{{trans('home.aboutus')}}</h2>
        </div>
    </div>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-custom">
                        <div class="panel-body panel-body-custom">
                            @if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                {!! $about->intro_en !!}
                            @else
                                {!! $about->intro !!}
                            @endif
                            <div class="col-sm-4">
                                @if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                    {!! $about->about_en !!}
                                @else
                                    {!! $about->about !!}
                                @endif

                            </div>
                            <div class="col-sm-4">
                                @if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                    {!! $about->ourteam_en !!}
                                @else
                                    {!! $about->ourteam !!}
                                @endif

                            </div>
                            <div class="col-sm-4">
                                @if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                    {!! $about->ceo_en !!}
                                @else
                                    {!! $about->ceo !!}
                                @endif

                            </div>
                            <hr/>

                            <hr/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection