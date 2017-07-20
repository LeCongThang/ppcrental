@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Edit property
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
                    <form class="form-horizontal" action="{{URL::asset('')}}admin/update-property-{{$property->id}}" method="post"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-lg-2">Image:</label>
                                <div class="col-lg-2">
                                    <input class="form-control" type="file" name="image_overall"
                                           onchange="loadFile(event)"/>
                                    <img id="output" src="{{URL::asset('')}}images/project/{{$property->image_overall}}"
                                         width="80%"/>
                                </div>
                                <label class="control-label col-lg-2">Property type:</label>
                                <div class="col-lg-2">
                                    <select name="property_type" class="form-control">
                                        @foreach($type as $i)
                                            <option value="{{$i->id}}" style="font-weight: bold;"
                                                    @if($property->property_type==$i->id) selected @endif
                                            >{{$i->name_en}}</option>
                                            <?php
                                            $items = DB::table('ppc_property_category')->where('parent_id', $i->id)->get();
                                            ?>
                                            @foreach($items as $item)
                                                <option value="{{$item->id}}"
                                                        @if($property->property_type==$item->id) selected @endif
                                                >-- {{$item->name_en}}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                                <label class="control-label col-lg-2">Property status:</label>
                                <div class="col-lg-2">
                                    <select name="property_status" class="form-control">
                                        <option @if($property->property_status==0) selected @endif value="0">For Rent
                                        </option>
                                        <option @if($property->property_status==1) selected @endif value="1">For Sale
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Content:</label>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home">Vietnamese</a></li>
                                    <li><a data-toggle="tab" href="#menu2">English</a></li>
                                </ul>

                                <div class="tab-content col-lg-offset-2 col-lg-10">
                                    <div id="home" class="tab-pane fade in active">
                                        <label class="control-label">Property name (vi):</label>
                                        <input type="text" class="form-control" name="name" value="{{$property->name}}"
                                               required/>
                                        <label class="control-label">Content (vi):</label>
                                        <textarea rows="8" class="form-control" name="description"
                                                  required>{{$property->description}}</textarea>

                                    </div>

                                    <div id="menu2" class="tab-pane fade">
                                        <label class="control-label">Property name (en):</label>
                                        <input type="text" class="form-control" name="name_en"
                                               value="{{$property->name_en}}" required/>
                                        <label class="control-label">Content (en):</label>
                                        <textarea rows="8" class="form-control" name="description_en"
                                                  required>{{$property->description_en}}</textarea>

                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="form-group">
                                <label class="control-label col-lg-2">City:</label>
                                <div class="col-lg-2">
                                    <select name="province" id="province" class="form-control selectpicker"
                                            data-live-search="true"
                                            title="--Choose--"
                                            onchange="loaddistrict();">
                                        @foreach($province as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="control-label col-lg-2"><span
                                            class="glyphicon glyphicon-arrow-right"></span> District:</label>
                                <div class="col-lg-2">
                                    <select name="district" id="district" class="form-control" onchange="loadward()">

                                    </select>
                                </div>
                                <label class="control-label col-lg-2"><span
                                            class="glyphicon glyphicon-arrow-right"></span> Ward:</label>
                                <div class="col-lg-2">
                                    <select name="ward" id="ward" class="form-control" onchange="getward()">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Street:</label>
                                <div class="col-lg-2">
                                    <select name="street" id="street" class="form-control" onchange="getstreet()">

                                    </select>
                                </div>
                                <label class="control-label col-lg-2">Price:</label>
                                <div class="col-lg-2">
                                    <input type="text" class="form-control" value="{{$property->price}}" name="price"
                                           required/>
                                </div>
                                <label class="control-label col-lg-2">Contact:</label>
                                <div class="col-lg-2">
                                    <select name="saler_id" class="form-control selectpicker"
                                            data-live-search="true"
                                            title="--Choose--" required>
                                        @foreach($user as $item)
                                            <option value="{{$item->id}}"
                                                    @if($property->saler_id==$item->id) selected @endif>{{$item->fullname}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Location:</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="area" value="{{$property->location}}"
                                           name="area" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Bed room:</label>
                                <div class="col-lg-2">
                                    <input type="number" class="form-control" value="{{$property->bedroom}}" min="0"
                                           name="bedroom"
                                           required/>
                                </div>
                                <label class="control-label col-lg-2">Bath room:</label>
                                <div class="col-lg-2">
                                    <input type="number" class="form-control" value="{{$property->bathroom}}" min="0"
                                           name="bathroom"
                                           required/>
                                </div>
                                <label class="control-label col-lg-2">Parking place:</label>
                                <div class="col-lg-2">
                                    <input type="number" class="form-control" value="{{$property->parkingplace}}"
                                           min="0" name="parkingplace"
                                           required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">Feature:</label>
                                <div class="col-lg-6">
                                    @foreach($feature as $i)
                                        <input type="checkbox" value="{{$i->id}}"
                                               @if(in_array($i->id,explode(",",$property->feature))) checked @endif
                                               name="feature{{$i->id}}"/> {{$i->feature_en}}
                                        &nbsp;&nbsp;
                                    @endforeach

                                </div>
                                <label class="control-label col-lg-2">Area:</label>
                                <div class="col-lg-2">
                                    <input type="text" class="form-control" name="location" value="{{$property->area}}"
                                           placeholder="ex: 30-50 sqm" required/>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-lg-2">Seo tag:</label>
                                <div class="col-lg-10">
                                    <textarea rows="8" class="form-control" name="seotag"
                                              required>{{$property->seotag}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">Show/hide:</label>
                                <div class="col-lg-10">
                                    <input class="form-control" @if($property->status==1) checked @endif value="1"
                                           type="checkbox" name="status"/>
                                </div>
                            </div>
                            <div class="col-md-10 col-lg-offset-2">
                                <br/>
                                <a href="{{URL::asset('')}}admin/properties-management"
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
    <script src="{{URL::asset('')}}ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description', {
            filebrowserBrowseUrl: '{{URL::asset('')}}ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: '{{URL::asset('')}}ckfinder/ckfinder.html?type=Properties',
            filebrowserUploadUrl: '{{URL::asset('')}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: '{{URL::asset('')}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Properties'
        });
        CKEDITOR.replace('description_en', {
            filebrowserBrowseUrl: '{{URL::asset('')}}ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: '{{URL::asset('')}}ckfinder/ckfinder.html?type=Properties',
            filebrowserUploadUrl: '{{URL::asset('')}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: '{{URL::asset('')}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Properties'
        });
    </script>
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
        function loadward() {
            var district = $('#district').val();
            $('#area').val($("#district :selected").text() + ", " + $("#province :selected").text());
            $('#ward').children().remove();
            $('#street').children().remove();
            $.ajax({
                type: "GET",
                url: "{{URL::asset('')}}admin/load-ward-" + district,

                success: function (data) {
                    var JSONObject = $.parseJSON(data);
                    if (JSONObject != null) {
                        for (var i = 0; i < JSONObject.length; i++) {
                            var string = '<option value="' + JSONObject[i]["id"] + '">' + JSONObject[i]["name"] + '</option>';
                            $('#ward').append(string);
                        }

                    }

                }
            });
            $.ajax({
                type: "GET",
                url: "{{URL::asset('')}}admin/load-street-" + district,

                success: function (data) {
                    var JSONObject = $.parseJSON(data);
                    if (JSONObject != null) {
                        for (var i = 0; i < JSONObject.length; i++) {
                            var string = '<option value="' + JSONObject[i]["id"] + '">' + JSONObject[i]["name"] + '</option>';
                            $('#street').append(string);
                        }

                    }

                }
            });
        };
        function getward() {
            $('#area').val($("#ward :selected").text() + ", " + $("#district :selected").text() + ", " + $("#province :selected").text());
        };
        function getstreet() {
            //var area = $('#area').val();
            $('#area').val($("#street :selected").text() + ", " + $("#ward :selected").text() + ", " + $("#district :selected").text() + ", " + $("#province :selected").text());
        }

    </script>
@endsection