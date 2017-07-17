<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ADMIN PAGE </title>

    <!-- Bootstrap -->
    <link href="{{URL::asset('')}}css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{URL::asset('')}}css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{URL::asset('')}}css/nprogress.css" rel="stylesheet">
    <link rel="icon" href="{{URL::asset('favicon.ico')}}">
{{--<!-- iCheck -->--}}
{{--<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">--}}

{{--<!-- bootstrap-progressbar -->--}}
{{--<link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">--}}
{{--<!-- JQVMap -->--}}
{{--<link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>--}}
{{--<!-- bootstrap-daterangepicker -->--}}
{{--<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">--}}

<!-- Custom Theme Style -->
    <link href="{{URL::asset('')}}css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md body-content">
<div class="container body">
    <div class="main_container">
    @include('admin.partial.sidebar')

    <!-- top navigation -->
    @include('admin.partial.header')
    <!-- /top navigation -->

        <!-- page content -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="right_col" role="main">
            @yield('content')
        </div>

        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{URL::asset('')}}js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{URL::asset('')}}js/bootstrap.min.js"></script>
<!-- FastClick -->

<!-- Custom Theme Scripts -->
<script src="{{URL::asset('')}}js/custom.min.js"></script>
<script>
    $(".language_tab li:first").addClass("active");
    $(".tab-content .tab-pane:first").addClass("in");
    $(".tab-content .tab-pane:first").addClass("active");
</script>
@yield('scripts')
</body>
</html>
