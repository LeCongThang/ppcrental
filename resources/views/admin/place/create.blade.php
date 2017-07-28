@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Add street
                            {{--<small>Graph title sub-title</small>--}}
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
                    <form class="form-horizontal" action="{{URL::asset('')}}admin/stored-street" method="post"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">


                            <div class="form-group">
                                <label class="control-label col-lg-2">City:</label>
                                <div class="col-lg-2">
                                    <select name="province" id="province" class="form-control selectpicker"
                                            data-live-search="true"
                                            title="--Choose--"
                                            onchange="loaddistrict();" required>
                                        @foreach($province as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="control-label col-lg-2"><span
                                            class="glyphicon glyphicon-arrow-right"></span> District:</label>
                                <div class="col-lg-2">
                                    <select name="huyen_id" id="district" class="form-control" onchange="loadward()"
                                            required>

                                    </select>
                                </div>
                                <label class="control-label col-lg-2"><span
                                            class="glyphicon glyphicon-arrow-right"></span> Street:</label>
                                <div class="col-lg-2">
                                    <input type="text" name="name" class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-md-10 col-lg-offset-2">
                                <br/>
                                <a href="{{URL::asset('')}}admin/place-management"
                                   class="btn btn-default">Cancel</a>
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

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js"></script>
    <script>
        function loaddistrict() {
            var province = $('#province').val();
            $('#area').val($("#province :selected").text());
            $('#district').children().remove();
            $.ajax({
                type: "GET",
                url: "{{URL::asset('')}}admin/load-district-" + province,

                success: function (data) {
                    var JSONObject = $.parseJSON(data);
                    if (JSONObject != null) {
                        for (var i = 0; i < JSONObject.length; i++) {
                            var string = '<option value="' + JSONObject[i]["id"] + '">' + JSONObject[i]["name"] + '</option>';
                            $('#district').append(string);
                        }
                    }

                }
            });
        };
    </script>
@endsection