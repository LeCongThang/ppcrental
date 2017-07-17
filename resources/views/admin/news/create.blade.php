@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Add News
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
                    <form class="form-horizontal" action="{{URL::asset('')}}admin/stored-news" method="post"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-lg-2">Image:</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="file" name="image" required onchange="loadFile(event)"/>
                                    <img id="output" width="30%"/>
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
                                        <label class="control-label">Title (vi):</label>
                                        <input type="text" class="form-control" name="title" required/>
                                        <label class="control-label">Content (vi):</label>
                                        <textarea rows="8" class="form-control" name="content" required></textarea>
                                    </div>

                                    <div id="menu2" class="tab-pane fade">
                                        <label class="control-label">Title (en):</label>
                                        <input type="text" class="form-control" name="title_en" required/>
                                        <label class="control-label">Content (en):</label>
                                        <textarea rows="8" class="form-control" name="content_en" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Seo tag:</label>
                                <div class="col-lg-10">
                                    <textarea rows="8" class="form-control" name="seotag" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Show/hide:</label>
                                <div class="col-lg-10">
                                    <input class="form-control" value="1" type="checkbox" name="status"/>
                                </div>
                            </div>
                            <div class="col-md-10 col-lg-offset-2">
                                <br/>
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
        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
    <script src="{{URL::asset('')}}ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content', {
            filebrowserBrowseUrl: '{{URL::asset('')}}ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: '{{URL::asset('')}}ckfinder/ckfinder.html?type=Images',
            filebrowserUploadUrl: '{{URL::asset('')}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: '{{URL::asset('')}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
        });
        CKEDITOR.replace('content_en', {
            filebrowserBrowseUrl: '{{URL::asset('')}}ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: '{{URL::asset('')}}ckfinder/ckfinder.html?type=Images',
            filebrowserUploadUrl: '{{URL::asset('')}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: '{{URL::asset('')}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
        });
    </script>
@endsection