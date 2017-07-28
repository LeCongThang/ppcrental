@extends('layout.userlayout')
@section('title')
    @if(\Illuminate\Support\Facades\Session::get('locale')=='en')
        CONTACT -
    @else
        LIÊN HỆ -
    @endif
    {{$info->title}}
@endsection
@section('des')
    {{$info->title}}, {{$info->description}}
@endsection
@section('keywords')
    {{$info->title}}, {{$info->seokeyword}}
@endsection
@section('author')
    {{$info->author}}
@endsection
@section('image')https://ppcrentals.com/images/common_icon/logo.png
@endsection
@section('content')
    <div class="intro-header">

        <div class="home-below-menu">
            <h2>{{trans('home.contact')}}</h2>
        </div>
    </div>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-custom">
                        <div class="panel-body panel-body-custom">
                            <div class="col-lg-5">
                                <h5>{{trans('home.sendus')}}</h5>
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                                    aria-hidden="true">&times;</span></button>
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                                <form class="form-horizontal" action="{{URL::asset('')}}send-message" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="{{trans('home.name')}}" name="name" required/>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="email" placeholder="{{trans('home.email')}}" name="email" required/>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="{{trans('home.office')}}" name="phone" required/>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" required placeholder="{{trans('home.message')}}" rows="8" name="message"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="search-form btn pull-right">{{trans('home.send')}}</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 col-lg-offset-1">
                                <h5>{{trans('home.where')}}</h5>
                                <div id="map" style="width:auto;height:330px;">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.5748836249945!2d106.68554931435033!3d10.767209992327771!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f181c80d37b%3A0x11f037e825f6300e!2zMjQ0IEPhu5FuZyBRdeG7s25oLCBQaOG6oW0gTmfFqSBMw6NvLCBRdeG6rW4gMSwgSOG7kyBDaMOtIE1pbmgsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1500948377295" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>

                                <h5>{{trans('home.contact')}}</h5>
                                @if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                {!! $info->vietnam_address_en !!}
                                    @else
                                    {!! $info->vietnam_address !!}
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection