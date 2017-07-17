@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>News Slider
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
                    <form class="form-horizontal" action="{{URL::asset('')}}admin/stored-slider" method="post"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-lg-2">Image:</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="file" name="slider" required onchange="loadFile(event)"/>
                                    <img id="output" width="30%"/>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Sort_order:</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="number" name="sort_order" min="1" required/>
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
@endsection