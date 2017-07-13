@extends('admin.layout.master')
@section('content')
    <div class="container">
        <h1>Resize Image Uploading Demo</h1>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            <div class="row">

                <div class="col-md-4">
                    <strong>Image uploaded:</strong>
                    <br/>
                    <img src="{{URL::asset('')}}images/resize/{{ Session::get('imageName') }}" />
                </div>
            </div>
        @endif


        <form class="form-horizontal" action="{{URL::asset('')}}admin/resize-image" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-md-4">
                <br/>
                <input type="text" name="permission" class="form-control"/>
            </div>
            <div class="col-md-12">
                <br/>
                <input type="file" name="link" class="form-control"/>
            </div>
            <div class="col-md-12">
                <br/>
                <button type="submit" class="btn btn-success">Upload Image</button>
            </div>
        </div>
        </form>

    </div>
@endsection