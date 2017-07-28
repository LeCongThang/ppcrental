@extends('layout.userlayout')
@section('title')@if(\Illuminate\Support\Facades\Session::get('locale')=='en') {{$p->name_en}} - {{$info->title}} @else {{$p->name}} - {{$info->title}} @endif @endsection
@section('url')property/{{$p->id}}-{{$p->slug}}.html/@endsection
@section('des'){{$info->title}}, {{$p->name_en}},{{$p->seotag}}, {{$info->description}}@endsection
@section('keywords'){{$info->title}}, {{$p->seotag}},{{$p->name_en}}, {{$info->seokeyword}}@endsection
@section('author'){{$info->author}}@endsection
@section('image'){{URL::asset('')}}images/project/{{$p->thumb}}@endsection
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
        <div class="home-below-menu"
             style="background: url('{{URL::asset('images/common_icon/title-bg.jpg')}}') no-repeat center center;background-size: cover;">
            <h2>@if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                    {{$p->name_en}}
                @else
                    {{$p->name}}
                @endif
            </h2>
        </div>
    </div>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-sm-12">
                    <div class="panel panel-custom">
                        <div class="panel-body panel-body-custom">
                            <h3><u>@if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                        {{$p->name_en}}
                                    @else
                                        {{$p->name}}
                                    @endif </u>&nbsp; <span>
                                        <button type="submit" class=" favorite btn search-form"><span
                                                    class="glyphicon glyphicon-heart"></span> {{trans('home.addfav')}}</button>
                                                               </span>
                            </h3>
                            <h4 style="font-weight:normal;color: #00aeef">{{trans('home.price')}}:@if($p->unit==0)
                                    ${{$p->price}} @else {{$p->price}}VND @endif</h4>
                            <img src="{{URL::asset('')}}images/project/{{$p->thumb}}"
                                 class="img-responsive">
                            <hr/>
                            <h3><u>{{trans('home.projectdes')}}:</u></h3>
                            <p>
                                @if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                                    {!! $p->description_en !!}
                                @else
                                    {!! $p->description !!}
                                @endif
                            </p>
                            <hr/>
                            <h3><u>{{trans('home.quicksumary')}}:</u></h3>
                            <p><i class="fa fa-2x fa-tag mauxanh" aria-hidden="true"></i>
                                &nbsp; {{trans('home.propertystatus')}}: @if($p->property_status=1) For Rent @else For
                                Sale @endif</p>
                            <p><i class="fa fa-2x fa-home mauxanh" aria-hidden="true"></i>
                                &nbsp; {{trans('home.propertytype')}}
                                : {{\App\Models\PpcPropertyCategory::find($p->property_type)->name_en}}</p>
                            <p><i class="fa fa-2x fa-map-marker mauxanh" aria-hidden="true"></i> &nbsp;
                                {{trans('home.location')}}: {{$p->location}}</p>
                            <p><i class="fa fa-2x fa-bed mauxanh" aria-hidden="true"></i> &nbsp;
                                {{trans('home.bedroom')}}: {{$p->bedroom}} </p>
                            <p><i class="fa fa-2x fa-bath mauxanh" aria-hidden="true"></i> &nbsp;
                                {{trans('home.bathroom')}}: {{$p->bathroom}}</p>
                            <p><i class="fa fa-2x fa-object-group mauxanh" aria-hidden="true"></i> &nbsp;
                                {{trans('home.area')}}: {{$p->area}}</p>
                            <p><i class="fa fa-2x fa-car mauxanh" aria-hidden="true"></i>
                                &nbsp; {{trans('home.parkingplace')}}: {{$p->parkingplace}}</p>
                            <p><i class="fa fa-2x fa-list-ol mauxanh" aria-hidden="true"></i>
                                &nbsp; {{trans('home.propertyfeature')}}:
                                @foreach($feature as $i)  <u class="mauxanh">{{$i->feature_en.', '}}</u>@endforeach</p>
                            <hr/>
                            <h3><u>{{trans('home.contact')}}:</u></h3>
                            <div class="col-sm-3">
                                <img src="{{URL::asset('')}}images/users/{{$user->avatar}}"
                                     class="img-responsive img-circle" style="border:5px solid #75D2F0">
                                <h4 class="text-center">{{$user->fullname}}</h4>
                            </div>
                            <div class="col-sm-9">

                                <p><span class="glyphicon glyphicon-phone mauxanh"></span> {{trans('home.mobile')}}
                                    : {{$user->phone}}</p>
                                <p><span class="glyphicon glyphicon-envelope mauxanh"></span> {{trans('home.email')}}
                                    : {{$user->email}}
                                </p>
                                <p><span class="glyphicon glyphicon-phone mauxanh"></span>
                                    {{trans('home.office')}}: {{$user->office_phone}}</p>
                                <p><span class="glyphicon glyphicon-map-marker mauxanh"></span>
                                    {{trans('home.address')}}: {{$user->address_en}}</p>
                            </div>
                            <hr/>

                            <a class="btn search-form" href="#"
                               onclick="share_fb('{{URL::asset('')}}property/{{$p->id}}-{{$p->slug_en}}.html');return false;"
                               rel="nofollow"
                               share_url="{{URL::asset('')}}property/{{$p->id}}-{{$p->slug_en}}.html" target="_blank">
                                <i class="fa fa-facebook" aria-hidden="true"></i> {{trans('home.share')}}
                            </a>
                            <span><a href="{{URL::asset('')}}profile/{{$user->id}}-{{str_slug($user->fullname)}}.html"
                                     class="btn search-form">{{trans('home.viewprofile')}}</a></span>
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
                    alert('Added to favorite!');
                }
            });
        });

    </script>

@endsection