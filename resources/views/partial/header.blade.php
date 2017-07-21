<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
    <div class="container topnav">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand topnav" href="{{URL::asset('')}}">

                <img src="{{URL::asset('')}}images/common_icon/{{$info->logo}}" class="img-responsive">
                <p class="mauxanh tieude">{{$info->sologan}}</p>
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right col-xs-8 col-md-9 top-menu">
                <li class="mauxanh">
                    <span class="glyphicon glyphicon-phone"></span> HOT LINE:{{$info->hotline}}
                </li>
                <li class="mauxanh">
                    <span class="glyphicon glyphicon-envelope"></span>{{$info->mail}}
                </li>
                <li><a href="{{URL::asset('')}}favorite.html"><span class="glyphicon glyphicon-heart"></span>
                        Favorites</a></li>
                <li class="dropdown">
                    @if(\Illuminate\Support\Facades\Session::get('agent_id')==null)
                        <span class="glyphicon glyphicon-user"></span> <a class="signin"
                                                                          href="{{URL::asset('')}}sign-in.html">Sign
                            in</a>/
                        <a class="signup" href="{{URL::asset('')}}sign-up.html">Sign up</a>
                    @else
                        <span class="glyphicon glyphicon-user"></span> <a
                                class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false"
                                href="">{{\Illuminate\Support\Facades\Session::get('agentname')}}</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{URL::asset('')}}/profile-{{\Illuminate\Support\Facades\Session::get('agent_id')}}">Profile</a></li>
                            <li><a href="{{URL::asset('')}}log-out"> Logout</a></li>
                        </ul>
                    @endif
                </li>
                <li>
                    <span><a href="{{URL::asset('')}}language/vi"><img src="{{URL::asset('')}}images/common_icon/vn.gif"/></a> &nbsp;<a href="{{URL::asset('')}}language/en"> <img
                                    src="{{URL::asset('')}}images/common_icon/us.gif"/></a></span>
                </li>

            </ul>

            <ul class="nav navbar-nav navbar-right col-xs-4 col-md-9 bottom-menu">
                @foreach($menu as $m)
                    <li class="dropdown">
                        <a class="dropdown-toggle disabled" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false"
                           href="{{URL::asset('')}}{{$m->id}}-{{$m->slug}}.html">{{$m->name_en}}</a>
                        <ul class="dropdown-menu">
                            {!! \App\Http\Controllers\HomeController::LoadSubCat($m->id) !!}

                        </ul>
                    </li>

                @endforeach
                <li class="dropdown">
                    <a class="dropdown-toggle disabled" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false" href="{{URL::asset('')}}ppcrental-search.html">Search</a>
                    <ul class="dropdown-menu">
                        @foreach($district as $d)
                            <li>
                                <a href="{{URL::asset('')}}search/{{$d->id}}-{{str_slug($d->name_en)}}.html">{{$d->name_en}}</a>
                            </li>
                        @endforeach

                    </ul>
                </li>
                <li>
                    <a @if(\Illuminate\Support\Facades\Session::get('agent_id')!=null) href="{{URL::asset('')}}for-agent.html" @else
                    class="signin" href="{{URL::asset('')}}sign-in.html"
                    @endif>For Agent</a>
                </li>
                <li>
                    <a href="{{URL::asset('')}}about-ppcrental.html">About us</a>
                </li>
                <li>
                    <a href="{{URL::asset('')}}ppcrental-news.html">News</a>
                </li>
                <li>
                    <a href="{{URL::asset('')}}contact-to-ppcrental.html">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
