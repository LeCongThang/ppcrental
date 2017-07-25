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
        <div class="home-below-menu"
             style="background: url('{{URL::asset('images/common_icon/title-bg.jpg')}}') no-repeat center center;background-size: cover;">
            <h2>{{trans('home.result')}}</h2>
        </div>


        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @include('partial.search')
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-custom">
                        <div class="panel-body panel-body-custom">
                            <div class="col-lg-10">
                                <p>{{$items->count()}} {{trans('home.propertyfound')}}</p>

                            </div>
                            {{--<div class="col-lg-2" style="padding-bottom: 20px;">--}}
                            {{--<select class="pull-right form-control">--}}
                            {{--<option>Default</option>--}}
                            {{--</select>--}}
                            {{--</div>--}}
                            @if($items->count()>0)
                                @foreach($items as $i)

                                    <div class="col-lg-4">
                                        <a href="{{URL::asset('')}}property/{{$i->id}}-{{$i->slug}}.html"><img
                                                    src="{{URL::asset('')}}images/project/{{$i->image_overall}}"
                                                    class="img-responsive"></a>
                                        <h4><a class="mauxanh" href="{{URL::asset('')}}property/{{$i->id}}-{{$i->slug}}.html">
                                                @if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                                    {{$i->name_en}}
                                                @else
                                                    {{$i->name}}
                                                @endif
                                            </a></h4>
                                        <i style="font-weight:normal"><i class="fa fa-map-marker"
                                                                         aria-hidden="true"></i> {{str_limit($i->location,45)}}
                                        </i>
                                        <p>
                                            @if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                                {!! str_limit($i->description_en,300) !!}
                                            @else
                                                {!! str_limit($i->description,300) !!}
                                            @endif
                                            </p>
                                        <hr/>
                                        <p><span class="glyphicon glyphicon-home"> {{$i->area}}</span> &nbsp; &nbsp;&nbsp;
                                            <span
                                                    class="glyphicon glyphicon-bed"> {{$i->bedroom}} {{trans('home.bedroom')}}</span></p>
                                    </div>
                                @endforeach
                                {!! $items->render() !!}
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