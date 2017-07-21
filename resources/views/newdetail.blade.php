@extends('layout.userlayout')
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
            <h2>NEWS</h2>
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
                            <h3>{{$news->title_en}}</h3>
                            <i style="font-weight:normal">{{$news->updated_at}}</i>
                            <img src="{{URL::asset('')}}images/news/{{$news->image}}" class="img-responsive">
                            {!! $news->content_en !!}
                            <a class="btn search-form" href="#" onclick="share_fb('{{URL::asset('')}}/news/{{$news->id}}-{{$news->slug_en}}.html');return false;" rel="nofollow"
                               share_url="{{URL::asset('')}}/news/{{$news->id}}-{{$news->slug_en}}.html" target="_blank">
                                <i class="fa fa-facebook" aria-hidden="true"></i> Share
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