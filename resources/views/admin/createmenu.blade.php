@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Add new menu
                            {{--<small>Graph title sub-title</small>--}}
                        </h3>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="col-md-12">

                    <ul class="nav nav-tabs language_tab">
                        @foreach($language as $lang)
                            <li><a data-toggle="tab" href="#home{{$lang->id}}">{{$lang->language}}</a></li>
                        @endforeach
                    </ul>
                    <form id="demo-form2" data-parsley-validate action="{{URL::asset('')}}admin/create-new-menu"
                          method="post" class="form-horizontal form-label-left">
                        <div class="tab-content">
                            @foreach($language as $lang)
                                <div id="home{{$lang->id}}" class="tab-pane fade">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <h2></h2>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menu
                                            name for {{$lang->language}}<span
                                                    class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="menu_name" name="menu_name{{$lang->id}}" required="required"
                                                   class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>


                                </div>


                        @endforeach
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="button">Cancel</button>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>




            <div class="clearfix"></div>
        </div>
    </div>

    </div>


@endsection
