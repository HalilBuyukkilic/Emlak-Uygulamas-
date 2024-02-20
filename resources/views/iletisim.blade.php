@extends('katmanlar.master')
@section('title', 'Toprak Konut | İletişim')
@section('meta', 'Toprak Konut iletişim sayfası, iletişim bilgileri, destek')
@section('content')
    <!--Breadcrumb-->
    <div>
        <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white ">
                        <h1 class="">{{$ayar->baslik}} İletişim</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{route('anasayfa')}}">Anasayfa</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">İletişim</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/Breadcrumb-->

    <!--Contact-->
    <div class="sptb bg-white mb-0 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-xl-4  col-md-12  d-block mb-7">
                    <div class="section-title center-block text-center">
                        <h2>İletişim Bilgileri</h2>
                    </div>
                    <div class="row text-white">
                        <div class="col-12 mb-5">
                            <div class="support-service bg-primary br-2 mb-4 mb-xl-0">
                                <a href="tel:{{$ayar->telefon}}"><i class="fa fa-phone"></i></a>

                                <h6>{{$ayar->telefon}} - </h6>
                                <P>Free Support!</P>
                            </div>
                        </div>
                        <div class="col-12 mb-5">
                            <div class="support-service bg-secondary br-2 mb-4 mb-xl-0">
                                <i class="fa fa-clock-o"></i>
                                <h6>Pazartesi - Cumartesi (10:00-19:00)</h6>
                                <p>Çalışma Saatlerimiz!</p>
                            </div>
                        </div>
                        <div class="col-12 mb-5">
                            <div class="support-service bg-warning br-2">
                                <a href="mailto:{{$ayar->email}}"> <i class="fa fa-envelope-o"></i></a>
                                <h6>{{$ayar->email}}</h6>
                                <p>E-Posta Adresimiz</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="support-service bg-primary br-2 mb-4 mb-xl-0">
                                <a target="_blank" href="https://www.google.com/maps?ll={{$ayar->lat}},{{$ayar->long}}&z=10&t=m&hl=tr-TR&gl=US&mapclient=apiv3"><i class="fa fa-location-arrow"></i></a>

                                <h6>{{$ayar->adres}}</h6>
                                <p>Ofisimize bekleriz!</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-7 col-xl-8 col-md-12 d-block ">
                    <div class="single-page" >
                        <div class="col-lg-12  col-md-12 mx-auto d-block">
                            <div class="section-title center-block text-center">
                                <h2>Contact Form</h2>
                            </div>
                            @include('katmanlar.menu.alert')
                            <div class="wrapper wrapper2">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <form method="post" action="{{route('iletisim.form')}}" name="contactform" id="contactform" autocomplete="on">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name1" placeholder="Adınız Soyadınız" name="name">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="E-Posta adresiniz" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" required="required" >
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control"  name="phone" id="phone" placeholder="Telefon Numaranız" required="required"  >
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="konu" id="subject" placeholder="Konu" required="required" >
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="mesaj" rows="6" placeholder="Mesajınız" spellcheck="true" required="required"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Gönder</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
            <div class="row mb-9" style="height: 600px; !important;">
                <div class="col-lg-12 col-xl-12 col-md-12 d-block " >
                    <div class="single-page" >
                        <div class="map-header mt-9">
                            <div class="map-header-layer " id="map2" style="height: 400px; !important;"></div>
                        </div>
                    </div>
                </div>
            </div>
    </div>





    <!--Contact-->
@endsection
@section('footer')
    <script type="text/javascript">

        $(function() {
            $("#map").googleMap({
                zoom: 5, // Initial zoom level (optional)
                coords: [37.089462, -95.710452], // Map center (optional)
                type: "ROADMAP" // Map type (optional)
            });
        })
        $(function() {
            $("#map2").googleMap();
            $("#map2").addMarker({
                coords: [{{$ayar->lat}}, {{$ayar->long}}], // GPS coords
                title: 'Toprak Konut', // Title
                text:  '{{$ayar->adres}}' // HTML content
            });
        })


    </script>
@endsection
