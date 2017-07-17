@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-12">
                        <h3>Edit user
                            {{--<small><i>Default password is: "PpcRental@year" ex: PpcRental@2017</i></small>--}}
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
                    <form class="form-horizontal" action="{{URL::asset('')}}admin/update-user-{{$user->id}}" method="post"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-lg-2">Avatar:</label>
                                <div class="col-lg-4">
                                    <img id="output" src="{{URL::asset('')}}images/users/{{$user->avatar}}"
                                         width="30%"/><br>
                                    <label>Full name: {{$user->fullname}}</label><br>
                                    <label>Email: {{$user->email}}</label>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Active/Disable:</label>
                                <div class="col-lg-2">
                                    <input class="form-control" value="1" type="checkbox" @if($user->status==1) checked
                                           @endif name="status"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">User permission:</label>
                                <div class="col-lg-10">
                                    @foreach($permission as $item)
                                        <input value="{{$item->id}}" @if($user_permission->contains('permission_id',$item->id)) checked @endif type="checkbox" name="permission{{$item->id}}"/>{{$item->name}}<br>
                                    @endforeach
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