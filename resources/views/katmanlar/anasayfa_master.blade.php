<!doctype html>
<html lang="zxx" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="@yield('meta')">
    <meta name="author" content="Toprak Konut">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Bootstrap Css -->
    <link href="/assets/plugins/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Dashboard Css -->
    <link href="/assets/css/style.css" rel="stylesheet" />

    <!-- Font-awesome  Css -->
    <link href="/assets/css/icons.css" rel="stylesheet"/>
    <link href="/assets/plugins/Horizontal2/Horizontal-menu/color-skins/color.css" rel="stylesheet" />

    <!--Select2 Plugin -->
    <link href="/assets/plugins/select2/select2.min.css" rel="stylesheet" />

    <!-- Cookie css -->
    <link href="/assets/plugins/cookie/cookie.css" rel="stylesheet">

    <!-- Owl Theme css-->
    <link href="/assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet" />

    <!-- Custom scroll bar css-->
    <link href="/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

    <!-- COLOR-SKINS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="/assets/webslidemenu/color-skins/color4.css" />

</head>
<body class="main-body">

<!--Loader-->
<div id="global-loader">
    <img src="/images/logo2.png" width="200px" class="loader-img floating" alt="">
</div>

@include('katmanlar.menu.navbaranasayfa')
@yield('content')

<!--Footer Section-->
@include('katmanlar.menu.footer')
<!--Footer Section-->

<!-- Back to top -->
<a href="#top" id="back-to-top" ><i class="fa fa-rocket"></i></a>

<!-- JQuery js-->
<script src="/assets/js/vendors/jquery-3.2.1.min.js"></script>

<!-- Bootstrap js -->
<script src="/assets/plugins/bootstrap-4.3.1-dist/js/popper.min.js"></script>
<script src="/assets/plugins/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>

<!--JQuery Sparkline Js-->
<script src="/assets/js/vendors/jquery.sparkline.min.js"></script>

<!-- Circle Progress Js-->
<script src="/assets/js/vendors/circle-progress.min.js"></script>

<!-- Star Rating Js-->
<script src="/assets/plugins/rating/jquery.rating-stars.js"></script>

<!--Owl Carousel js -->
<script src="/assets/plugins/owl-carousel/owl.carousel.js"></script>
<script src="/assets/plugins/Horizontal2/Horizontal-menu/horizontal.js"></script>

<!--Counters -->
<script src="/assets/plugins/counters/counterup.min.js"></script>
<script src="/assets/plugins/counters/waypoints.min.js"></script>
<script src="/assets/plugins/counters/numeric-counter.js"></script>

<!--JQuery TouchSwipe js-->
<script src="/assets/js/jquery.touchSwipe.min.js"></script>

<!--Select2 js -->
<script src="/assets/plugins/select2/select2.full.min.js"></script>
<script src="/assets/js/select2.js"></script>

<!-- sticky Js-->
<script src="/assets//js/sticky.js"></script>

<!-- Cookie js -->
<script src="/assets/plugins/cookie/jquery.ihavecookies.js"></script>
<script src="/assets/plugins/cookie/cookie.js"></script>

<!-- Custom scroll bar Js-->
<script src="/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- Swipe Js-->
<script src="/assets/js/swipe.js"></script>

<!-- Scripts Js-->
<script src="/assets/js/scripts2.js"></script>

<!-- Custom Js-->
<script src="/assets/js/custom.js"></script>

<!-- Typewritter Js-->
<script src="../assets/js/typewritter.js"></script>
</body>
</html>
