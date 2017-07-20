@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>About management
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
                    @foreach($about as $i)
                        <form id="demo-form2" data-parsley-validate action="{{URL::asset('')}}admin/about-management"
                              method="post" class="form-horizontal form-label-left">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h5 class="text-center">Vietnamese contents</h5>
                            <div class="col-lg-12">
                            <textarea name="intro" class="form-control" required rows="20">
                                {{$i->intro}}
                            </textarea>
                            </div>
                            <div class="col-lg-4">
                                <textarea name="about" class="form-control" required rows="10">
                                {{$i->about}}
                            </textarea>
                            </div>
                            <div class="col-lg-4">
                               <textarea name="ourteam" class="form-control" required rows="10">
                                {{$i->ourteam}}
                            </textarea>
                            </div>
                            <div class="col-lg-4">
                                <textarea name="ceo" class="form-control" required rows="10">
                                {{$i->ceo}}
                            </textarea>
                            </div>
                            <h5 class="text-center">English contents</h5>
                            <div class="col-lg-12">
                            <textarea name="intro_en" class="form-control" required rows="20">
                                {{$i->intro_en}}
                            </textarea>
                            </div>
                            <div class="col-lg-4">
                                <textarea name="about_en" class="form-control" required rows="10">
                                {{$i->about_en}}
                            </textarea>
                            </div>
                            <div class="col-lg-4">
                               <textarea name="ourteam_en" class="form-control" required rows="10">
                                {{$i->ourteam_en}}
                            </textarea>
                            </div>
                            <div class="col-lg-4">
                                <textarea name="ceo_en" class="form-control" required rows="10">
                                {{$i->ceo_en}}
                            </textarea>
                            </div>


                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="button">Cancel</button>
                                <button type="submit" class="btn btn-success">Save</button>
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
    <script src="{{URL::asset('')}}ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('intro', {
            filebrowserBrowseUrl: '{{URL::asset('')}}ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: '{{URL::asset('')}}ckfinder/ckfinder.html?type=About',
            filebrowserUploadUrl: '{{URL::asset('')}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: '{{URL::asset('')}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=About'
        });
        CKEDITOR.replace('about');
        CKEDITOR.replace('ourteam');
        CKEDITOR.replace('ceo');
        CKEDITOR.replace('intro_en', {
            filebrowserBrowseUrl: '{{URL::asset('')}}ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: '{{URL::asset('')}}ckfinder/ckfinder.html?type=About',
            filebrowserUploadUrl: '{{URL::asset('')}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: '{{URL::asset('')}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=About'
        });
        CKEDITOR.replace('about_en');
        CKEDITOR.replace('ourteam_en');
        CKEDITOR.replace('ceo_en');
    </script>
    <style>
        .table tbody tr td input {
            width: 100%;
        }
    </style>
@endsection