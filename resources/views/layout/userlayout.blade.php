<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('des')">
    <meta name="keywords" content="@yield('keywords')"/>
    <meta name="author" content="@yield('author')">
    <meta property="og:url"           content="http://ppcrentals.com/@yield('url')" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="@yield('title')" />
    <meta property="og:description"   content="@yield('des')" />
    <meta property="og:image"         content="@yield('image')" />
    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{URL::asset('')}}css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{URL::asset('')}}css/landing-page.min.css" rel="stylesheet">
    <link href="{{URL::asset('')}}css/set1.min.css" rel="stylesheet">
    <link href="{{URL::asset('')}}css/slick-theme.min.css" rel="stylesheet">
    <link href="{{URL::asset('')}}css/slick.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('')}}css/animate.min.css">
    <link rel="stylesheet" href="{{URL::asset('')}}css/full-slider.min.css">
    <script src="{{URL::asset('')}}js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!-- Custom Fonts -->
    <link href="{{URL::asset('')}}css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
          type="text/css">

    <link href="https://www.fontify.me/wf/a5726e37ec090e427af7bf40d5ef10bc" rel="stylesheet" type="text/css">
    <link rel="icon" href="{{URL::asset('favicon.ico')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="body-content">
<h1 style="position:absolute;left:-100%;">Công ty bất động sản Perfect property việt nam. PPC Rental, PPC, PPCRENTAL, ppc, ppc rentals</h1>
<!-- Navigation -->
@include('partial.header')

<!-- Page Content -->

@yield('content')

@include('partial.footer')



<!-- jQuery -->
<script src="{{URL::asset('')}}js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{URL::asset('')}}js/bootstrap.min.js"></script>
<script src="{{URL::asset('')}}js/slick.min.js" rel="stylesheet"></script>

<script>
    $('.signin').click(function (e) {
        var a_href = $(this).attr('href'); /* Lấy giá trị của thuộc tính href */
        e.preventDefault(); /* Không thực hiện action mặc định */
        $.ajax({ /* Gửi request lên server */
            url: a_href, /* Nội dung trong Delete.cshtml cụ thể là deleteModal div được server trả về */
            type: 'GET',
            contentType: 'application/json; charset=utf-8',
            success: function (data) { /* Sau khi nhận được giá */
                $('.body-content').prepend(data); /* body-content div (định nghĩa trong _Layout.cshtml) sẽ thêm deleteModal div vào dưới cùng */
                $('#signinModal').modal('show'); /* Hiển thị deleteModal div dưới kiểu modal */
            }
        });
    });
    $('.signup').click(function (e) {
        var a_href = $(this).attr('href'); /* Lấy giá trị của thuộc tính href */
        e.preventDefault(); /* Không thực hiện action mặc định */
        $.ajax({ /* Gửi request lên server */
            url: a_href, /* Nội dung trong Delete.cshtml cụ thể là deleteModal div được server trả về */
            type: 'GET',
            contentType: 'application/json; charset=utf-8',
            success: function (data) { /* Sau khi nhận được giá */
                $('.body-content').prepend(data); /* body-content div (định nghĩa trong _Layout.cshtml) sẽ thêm deleteModal div vào dưới cùng */
                $('#signupModal').modal('show'); /* Hiển thị deleteModal div dưới kiểu modal */
            }
        });
    });
</script>
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js"></script>
@yield('scripts')
</body>

</html>
