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
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="col-md-12">
                    @foreach($systems as $system)
                        <form id="demo-form2" data-parsley-validate action="{{URL::asset('')}}admin/system-config"
                              method="post" class="form-horizontal form-label-left">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <table class="table-bordered table">
                                <tbody>
                                <tr>
                                    <td>
                                        <label class="control-label" for="first-name">Hotline</label>

                                        <input type="text" id="logo" name="logo" required="required"
                                               value="{{$system->hotline}}" class="form-control">
                                    </td>
                                    <td>
                                        <label class="control-label"
                                               for="first-name">Email </label>

                                        <input type="text" id="logo" name="logo" required="required"
                                               value="{{$system->mail}}" class="form-control">

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label" for="first-name">Facebook
                                            link</label>

                                        <input type="text" id="logo" name="logo" required="required"
                                               value="{{$system->facebook}}"
                                               class="form-control">

                                    </td>
                                    <td>
                                        <label class="control-label" for="first-name">Youtube
                                            link</label>

                                        <input type="text" id="logo" name="logo" required="required"
                                               value="{{$system->youtube}}" class="form-control">

                                    </td>
                                    <td>
                                        <label class="control-label" for="first-name">Linked
                                            link </label>

                                        <input type="text" id="logo" name="logo" required="required"
                                               value="{{$system->linked}}" class="form-control">

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label" for="first-name">Sologan
                                            (Vietnamese) </label>

                                        <input type="text" id="logo" name="logo" required="required"
                                               value="{{$system->sologan}}" class="form-control">

                                    </td>
                                    <td>
                                        <label class="control-label" for="first-name">Sologan
                                            (English) </label>

                                        <input type="text" id="logo" name="logo" required="required"
                                               value="{{$system->sologan_en}}"
                                               class="form-control">

                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label" for="first-name">Address
                                            in Viet nam (Vietnamese)</label>

                                        <textarea class="form-control" required name="vietnam_address"
                                                  rows="6">{{$system->vietnam_address}}</textarea>

                                    </td>
                                    <td>
                                        <label class="control-label" for="first-name">Address
                                            in Viet nam (English) </label>


                                        <textarea class="form-control" required name="vietnam_address_en"
                                                  rows="6">{{$system->vietnam_address_en}}</textarea>

                                    </td>
                                    <td>
                                        <label class="control-label" for="first-name">Address
                                            in USA</label>

                                        <textarea class="form-control" required name="usa_address_en"
                                                  rows="6">{{$system->usa_address_en}}</textarea>

                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label" for="first-name">Website
                                            title</label>

                                        <textarea class="form-control" required name="title"
                                                  rows="6">{{$system->title}}</textarea>

                                    </td>
                                    <td>
                                        <label class="control-label" for="first-name">Website
                                            description</label>

                                        <textarea class="form-control" required name="description"
                                                  rows="6">{{$system->description}}</textarea>

                                    </td>
                                    <td>
                                        <label class="control-label" for="first-name">SEO
                                            keyword </label>

                                        <textarea class="form-control" required name="seokeyword"
                                                  rows="6">{{$system->seokeyword}}</textarea>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label"
                                               for="first-name">Author </label>

                                        <textarea class="form-control" required name="author"
                                                  rows="6">{{$system->author}}</textarea>
                                    </td>
                                    <td>
                                        <label class="control-label" for="first-name">Google
                                            analytic</label>

                                        <textarea class="form-control" required name="google_analytic"
                                                  rows="6">{{$system->google_analytic}}</textarea>
                                    </td>
                                    <td>
                                        <label class="control-label" for="first-name">Email
                                            marketing</label>

                                        <textarea class="form-control" required name="email_marketing"
                                                  rows="6">{{$system->email_marketing}}</textarea>

                                    </td>
                                </tr>

                                </tbody>
                            </table>
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
@section('scripts')
    <script src="https://cdn.ckeditor.com/4.7.1/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('vietnam_address');
        CKEDITOR.replace('vietnam_address_en');
        CKEDITOR.replace('usa_address_en');
    </script>
    <style>
        .table tbody tr td input {
            width: 100%;
        }
    </style>
@endsection