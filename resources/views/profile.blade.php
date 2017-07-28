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
            <div class="home-below-menu">
            <h2>{{trans('home.profile')}}</h2>
        </div>


        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <div class="panel panel-custom">
                        <div class="panel-body panel-body-custom">
                            <form class="form-horizontal" action="{{URL::asset('')}}admin/update-profile-{{$user->id}}" method="post"
                                  enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Avatar:</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" type="file" name="avatar" onchange="loadFile(event)"/>
                                            <img id="output" src="{{URL::asset('')}}images/users/{{$user->avatar}}" style="width: 60px!important;"/>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">{{trans('home.email')}}:</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" type="email" name="email" value="{{$user->email}}" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">{{trans('home.username')}}:</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" type="text" name="username"  value="{{$user->username}}" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">{{trans('home.fullname')}}:</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" type="text" name="fullname" value="{{$user->fullname}}" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2"> {{trans('home.newpassword')}}:</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" type="password" name="password" placeholder="enter new password if you want to change"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">{{trans('home.mobile')}}:</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" type="text" name="phone" value="{{$user->phone}}" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">{{trans('home.office')}}:</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" type="text" value="{{$user->office_phone}}" name="office_phone"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">{{trans('home.address')}}:</label>
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#home">Vietnamese</a></li>
                                            <li><a data-toggle="tab" href="#menu2">English</a></li>
                                        </ul>

                                        <div class="tab-content col-lg-offset-2 col-lg-10">
                                            <div id="home" class="tab-pane fade in active">


                                                <textarea rows="8" class="form-control" name="address">{{$user->address}}</textarea>
                                            </div>

                                            <div id="menu2" class="tab-pane fade">


                                                <textarea rows="8" class="form-control" name="address_en">{{$user->address_en}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-10 col-lg-offset-2">
                                        <br/>
                                        <a href="{{URL::asset('')}}admin/user-management" class="btn btn-default">{{trans('home.cancel')}}</a>
                                        <button type="submit" class="btn btn-success">{{trans('home.save')}}</button>
                                    </div>
                                </div>
                            </form>
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