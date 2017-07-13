@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>System config
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
                    @foreach($systems as $system)
                        <form id="demo-form2" data-parsley-validate action="{{URL::asset('')}}admin/system-config" method="post" class="form-horizontal form-label-left">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">logo <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="logo" name="logo" required="required" value="{{$system->logo}}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">facebook_link <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="facebook_link" name="facebook_link" value="{{$system->facebook_link}}" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">twiter_link</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="twiter_link" name="twiter_link" class="form-control col-md-7 col-xs-12" value="{{$system->twiter_link}}"  required="required" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">googleplus_link</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="googleplus_link" name="googleplus_link" class="form-control col-md-7 col-xs-12"  value="{{$system->googleplus_link}}" required="required" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">linked_link
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="linked_link" name="linked_link"  value="{{$system->linked_link}}" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">youtube_link</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="youtube_link" value="{{$system->youtube_link}}"  class="form-control col-md-7 col-xs-12" type="text" required="required" name="youtube_link">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">email</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="email"  value="{{$system->email}}" class="form-control col-md-7 col-xs-12" type="text" required="required" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">phone_number</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="phone_number" value="{{$system->phone_number}}"  class="form-control col-md-7 col-xs-12" required="required" type="text" name="phone_number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">hotline</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="hotline" value="{{$system->hotline}}" class="form-control col-md-7 col-xs-12" required="required" type="text" name="hotline">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">google_analytic</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="google_analytic" value="{{$system->google_analytic}}" class="form-control col-md-7 col-xs-12" required="required" type="text" name="google_analytic">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">system_theme</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="system_theme" value="{{$system->system_theme}}" class="form-control col-md-7 col-xs-12" required="required" type="text" name="system_theme">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">system_favicon</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="system_favicon" value="{{$system->system_favicon}}" class="form-control col-md-7 col-xs-12" required="required" type="text" name="system_favicon">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">orther</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="orther" value="{{$system->orther}}" class="form-control col-md-7 col-xs-12" required="required" type="text" name="orther">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">seo_description</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="seo_description" value="{{$system->seo_description}}" class="form-control col-md-7 col-xs-12" required="required" type="text" name="seo_description">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">seo_keyword</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="seo_keyword" value="{{$system->seo_keyword}}" class="form-control col-md-7 col-xs-12" required="required" type="text" name="seo_keyword">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">seo_title</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="seo_title" value="{{$system->seo_title}}" class="form-control col-md-7 col-xs-12" required="required" type="text" name="seo_title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">seo_author</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="seo_author" value="{{$system->seo_author}}" class="form-control col-md-7 col-xs-12" required="required" type="text" name="seo_author">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">system_email</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="system_email" value="{{$system->system_email}}" class="form-control col-md-7 col-xs-12" required="required" type="text" name="system_email">
                                </div>
                            </div><div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">system_password_email</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="system_password_email" value="{{$system->system_password_email}}" class="form-control col-md-7 col-xs-12" required="required" type="password" name="system_password_email">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>

                        </form>


                    @endforeach
                </div>

                <div class="clearfix"></div>
            </div>
        </div>

    </div>


@endsection