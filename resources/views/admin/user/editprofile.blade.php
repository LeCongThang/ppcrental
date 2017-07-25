@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-12">
                        <h3>Edit your profile
                        </h3>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="col-md-12">
                    <form class="form-horizontal" action="{{URL::asset('')}}admin/update-profile-{{$user->id}}" method="post"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-lg-2">Avatar:</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="file" name="avatar" onchange="loadFile(event)"/>
                                    <img id="output" src="{{URL::asset('')}}images/users/{{$user->avatar}}" width="60px"/>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Email:</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="email" name="email" value="{{$user->email}}" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">User name:</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="text" name="username"  value="{{$user->username}}" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Full name:</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="text" name="fullname" value="{{$user->fullname}}" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2"> New Password:</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="password" name="password" placeholder="enter new password if you want to change"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Phone:</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="text" name="phone" value="{{$user->phone}}" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Office phone:</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="text" value="{{$user->office_phone}}" name="office_phone"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Address:</label>
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
                                <a href="{{URL::asset('')}}admin/user-management" class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var loadFile = function (event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endsection