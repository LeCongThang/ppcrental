<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PPC RENTAL</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{URL::asset('')}}css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{URL::asset('')}}css/landing-page.css" rel="stylesheet">

    <link href="{{URL::asset('')}}css/set1.css" rel="stylesheet">
    <link href="{{URL::asset('')}}css/slick-theme.css" rel="stylesheet">
    <link href="{{URL::asset('')}}css/slick.css" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('')}}css/animate.min.css">
    <link rel="stylesheet" href="{{URL::asset('')}}css/full-slider.css">
    <script src="{{URL::asset('')}}js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!-- Custom Fonts -->
    <link href="{{URL::asset('')}}css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
          type="text/css">

    <link href="https://www.fontify.me/wf/a5726e37ec090e427af7bf40d5ef10bc" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="body-content">

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
@yield('scripts')
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
</body>

</html>
