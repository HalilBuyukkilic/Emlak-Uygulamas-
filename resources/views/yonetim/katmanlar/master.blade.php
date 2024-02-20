<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <title>@yield('title' , config('app.name'). " | Yönetim Paneli")</title>
    @include('yonetim.katmanlar.menu.head')

</head>

<body>
<div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">

@include('yonetim.katmanlar.menu.navbar')
@include('yonetim.katmanlar.menu.side')
@include('yonetim.katmanlar.menu.header')
@include('yonetim.katmanlar.menu.alert')
@yield('content')
@include('yonetim.katmanlar.menu.footer')
@yield('footer')
</div>
<!--js -->
<script src="/admin/js/dashmix.core.min.js"></script>
<script src="/admin/js/dashmix.app.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
@yield('script')
</body>

</html>
