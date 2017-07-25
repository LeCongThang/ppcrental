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
            <h2>{{trans('home.aboutus')}}</h2>
        </div>


        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

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
                            <div class="col-lg-4">
                                @if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                    {!! $about->about_en !!}
                                @else
                                    {!! $about->about !!}
                                @endif

                            </div>
                            <div class="col-lg-4">
                                @if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                    {!! $about->ourteam_en !!}
                                @else
                                    {!! $about->ourteam_en !!}
                                @endif

                            </div>
                            <div class="col-lg-4">
                                @if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                    {!! $about->ceo_en !!}
                                @else
                                    {!! $about->ceo_en !!}
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