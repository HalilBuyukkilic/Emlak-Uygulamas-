@extends('katmanlar.master')
@section('title', 'Kullanıcı Paneli - Bakiye Yükle')
@section('content')
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>Bakiye Yükle</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="{{route('dashboard')}}">Profilim</a></li>
                            <li>Bakiye Yükle</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 content-right-offset">


                <!-- Hedline -->
                <h3 class="margin-top-50">Kredi / Banka Kartı İle Öde</h3>

                <!-- Payment Methods Accordion -->
                <div class="payment margin-top-30">



                    <div id="iyzipay-checkout-form" class="responsive"></div>

                </div>
                <!-- Payment Methods Accordion / End -->
                <p class="margin-bottom-65"></p>


            </div>


            <!-- Summary -->
            <div class="col-xl-4 col-lg-4 margin-top-0 margin-bottom-60">

                <!-- Summary -->
                <div class="boxed-widget summary margin-top-0">
                    <div class="boxed-widget-headline">
                        <h3>Özet</h3>
                    </div>
                    <div class="boxed-widget-inner">
                        <ul>
                            <li>Bakiye Yükleme <span>{{$tutar}} ₺</span></li>
                            <li>KDV (18%) <span>{{round($tutar*18/100, 2)}} ₺</span></li>
                            <li class="total-costs">Toplam: <span>{{$tutar}} ₺</span></li>
                        </ul>
                    </div>
                </div>
                <!-- Summary / End -->

            </div>
        </div>
    </div>
@endsection
