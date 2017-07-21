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
        <div class="home-below-menu"
             style="background: url('{{URL::asset('images/common_icon/title-bg.jpg')}}') no-repeat center center;background-size: cover;">
            <h2>{{$p->name_en}}</h2>
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
                            <h3>{{$p->name_en}} &nbsp; <span>
                                        <button type="submit" class=" favorite btn search-form"><span
                                                    class="glyphicon glyphicon-heart"></span> Add to favorite</button>
                                                               </span>
                            </h3>
                            <h4 style="font-weight:normal;color: #00aeef">Price: {{$p->price}}</h4>
                            <img src="{{URL::asset('')}}images/project/propertyfull-{{$p->id}}.jpg"
                                 class="img-responsive">
                            <hr/>
                            <h3>Project description:</h3>
                            <p>{!! $p->description_en !!}</p>
                            <hr/>
                            <h3>Quick summary:</h3>
                            <p>Property status: @if($p->property_status=1) For Rent @else For Sale @endif</p>
                            <p>Property type: {{\App\Models\PpcPropertyCategory::find($p->property_type)->name_en}}</p>
                            <p>Location: {{$p->location}}</p>
                            <p>Bedrooms: <span class="glyphicon glyphicon-bed"></span> {{$p->bedroom}} </p>
                            <p>Bathrooms: {{$p->bathroom}}</p>
                            <p>Area: <span class="glyphicon glyphicon-home"></span> {{$p->area}}</p>
                            <p>Parking place: {{$p->parkingplace}}</p>
                            <p>Property faeture: @foreach($feature as $i) {{$i->feature_en.', '}} @endforeach</p>
                            <hr/>
                            <h3>Contact:</h3>
                            <div class="col-lg-3">
                                <img src="{{URL::asset('')}}images/users/{{$user->avatar}}" class="img-responsive">
                            </div>
                            <div class="col-lg-9">
                                <h4>{{$user->fullname}}</h4>
                                <p><span class="glyphicon glyphicon-phone"></span> Mobile: {{$user->phone}}</p>
                                <p><span class="glyphicon glyphicon-envelope"></span> Email: {{$user->email}}</p>
                                <p><span class="glyphicon glyphicon-phone"></span> Office: {{$user->office_phone}}</p>
                                <p><span class="glyphicon glyphicon-map-marker"></span> {{$user->address_en}}</p>
                            </div>
                            <hr/>

                            <a class="btn search-form" href="#"
                               onclick="share_fb('{{URL::asset('')}}/news/{{$p->id}}-{{$p->slug_en}}.html');return false;"
                               rel="nofollow"
                               share_url="{{URL::asset('')}}/property/{{$p->id}}-{{$p->slug_en}}.html" target="_blank">
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
            window.open('https://www.facebook.com/sharer/sharer.php?u=' + url, 'facebook-share-dialog', "width=626,height=436")
        }
        $('.favorite').click(function (e) {

            /* Lấy giá trị của thuộc tính href */
            e.preventDefault();
            /* Không thực hiện action mặc định */
            $.ajax({
                /* Gửi request lên server */
                url: '{{URL::asset('')}}add-favorite-{{$p->id}}',
                type: 'get',
                contentType: 'application/json; charset=utf-8',
                success: function (data) { /* Sau khi nhận được giá */
                    alert(data);
                }
            });
        });

    </script>

@endsection