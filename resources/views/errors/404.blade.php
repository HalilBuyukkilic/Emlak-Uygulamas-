@extends('katmanlar.anasayfa_master')
@section('title', 'Yanlış Yerdesiniz')
@section('content')
<!--Loader-->
<div class="construction-image">

<!-- Page -->
<div class="page page-h">
    <div class="page-content z-index-10">
        <div class="container text-center">
            <div class="display-1 text-white mb-5">404</div>
            <h1 class="h2 text-white  mb-3">Sayfa Bulunamadı</h1>
            <p class="h4 font-weight-normal mb-7 leading-normal text-white">Sanırım yanlış bir yere geldiniz... Bu hatayı neden aldığınızı tespit edemedik.</p>
            <a class="btn btn-warning" href="javascript:history.back()">
                Geri Dön
            </a>
        </div>
    </div>
</div>
</div>
<!-- End Page -->
@endsection

