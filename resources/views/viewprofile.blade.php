@extends('layout.userlayout')
@section('title')
    {{$user->fullname}} - {{$info->title}}
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
@section('image')
    {{$user->avatar}}
@endsection
@section('content')
    <div class="intro-header">

        <div class="home-below-menu"
             style="background: url('{{URL::asset('images/common_icon/title-bg.jpg')}}') no-repeat center center;background-size: cover;">
            <h2>{{$user->fullname}}</h2>
        </div>


        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-custom">
                        <div class="panel-body panel-body-custom">
                            {{--@include('partial.search')--}}
                            <div class=" col-md-2 col-sm-3">


                                <img src="{{URL::asset('')}}images/users/{{$user->avatar}}"
                                     class="img-responsive img-circle">
                                <h4>{{$user->fullname}}</h4>
                            </div>
                            <h4 class="mauxanh"><u>{{trans('home.info')}}: </u></h4>
                            <hr/>
                            <div class="col-md-8 col-sm-8">
                                <p><u><i class="fa fa-envelope-o mauxanh"
                                         aria-hidden="true"></i> {{trans('home.email')}}:</u> {{$user->email}}</p>
                                <p><u><i class="fa fa-mobile mauxanh" aria-hidden="true"></i> {{trans('home.mobile')}}
                                        :</u> {{$user->phone}}</p>
                                <p><u><i class="fa fa-phone mauxanh" aria-hidden="true"></i> {{trans('home.office')}}
                                        :</u> {{$user->office_phone}}</p>
                                <p><u><i class="fa fa-map-marker mauxanh"
                                         aria-hidden="true"></i> {{trans('home.address')}}:</u> {{$user->address}}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-custom">
                        <div class="panel-body panel-body-custom">
                            <div class="col-lg-10">
                                <p>{{$pro->count()}} {{trans('home.propertyfound')}}</p>

                            </div>
                            {{--<div class="col-lg-2" style="padding-bottom: 20px;">--}}
                            {{--<select class="pull-right form-control">--}}
                            {{--<option>Default</option>--}}
                            {{--</select>--}}
                            {{--</div>--}}
                            @if($pro->count()>0)
                                @foreach($pro as $i)

                                    <div class="col-md-4 col-sm-6">
                                        <a href="{{URL::asset('')}}property/{{$i->id}}-{{$i->slug}}.html"><img
                                                    src="{{URL::asset('')}}images/project/{{$i->image_overall}}"
                                                    class="img-responsive"></a>
                                        <h4>
                                            <a href="{{URL::asset('')}}property/{{$i->id}}-{{$i->slug}}.html">
                                                @if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                                    {{str_limit($i->name_en,35)}}
                                                    @else
                                                    {{str_limit($i->name,35)}}
                                                @endif
                                            </a>
                                        </h4>
                                        <i style="font-weight:normal"><i class="fa fa-map-marker"
                                                                         aria-hidden="true"></i> {{str_limit($i->location,45)}}
                                        </i>
                                        @if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                            <p>{!! str_limit($i->description_en,300) !!}</p>
                                            @else
                                            <p>{!! str_limit($i->description,300) !!}</p>
                                        @endif

                                        <hr/>
                                        <p><span class="glyphicon glyphicon-home"> {{$i->area}}</span> &nbsp; &nbsp;&nbsp;
                                            <span
                                                    class="glyphicon glyphicon-bed"> {{$i->bedroom}} {{trans('home.bedroom')}}</span></p>
                                    </div>
                                @endforeach
                                {!! $pro->render() !!}
                            @else
                                <div class="col-lg-12"></div>
                                <h3 class="text-center text-danger">Opp! No property found</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection