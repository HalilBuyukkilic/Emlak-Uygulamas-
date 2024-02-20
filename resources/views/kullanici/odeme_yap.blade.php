@extends('katmanlar.master')
@section('title', 'Kullanıcı Paneli - Bakiye Yükle')
@section('content')
    <!-- Titlebar
    ================================================== -->
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


    <!-- Content
    ================================================== -->
    <!-- Container -->
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 content-right-offset">


                <!-- Hedaline -->
                <h3>Fatura Bilgileri</h3>

                <!-- Billing Cycle Radios  -->
                <div class="billing-cycle margin-top-25">

                    <form action="{{route('bakiye.yukle.odeme.ekrani')}}" method="POST" >
                    @csrf
                        <div class="col">
                        <div class="row">


                            <div class="col-xl-6">
                                <div class="submit-field">
                                    <h5>Fatura Adresinizi Giriniz.</h5>
                                    <input type="hidden" name="tutar" value="{{$tutar}}">
                                    <textarea name="acikadres" id="acikadres" cols="30" rows="4" required>{{$user->acikadres}}</textarea>
                                </div>
                            </div>


                            <!-- Hedline -->
                            <h3 class="margin-top-50">Ödeme Yöntemi</h3>

                            <!-- Payment Methods Accordion -->
                            <div class="payment margin-top-30 margin-bottom-50">




                                <div class="payment-tab payment-tab-active">
                                    <div class="payment-tab-trigger">
                                        <input type="radio" name="havale" id="creditCart" value="0" checked>
                                        <label for="creditCart">Kredi / Banka Kartı</label>
                                        <img class="payment-logo" src="/images/creditcard.png" alt="">
                                    </div>

                                    <div class="payment-tab-content">
                                        <p>Kredi veya banka kartıyla ödeme için yönlendirileceksiniz. Lütfen şartları ve koşulları kabul edip Ödeme Yap butonuna basın.</p>
                                    </div>
                                </div>
<!--
                                <div class="payment-tab">
                                    <div class="payment-tab-trigger">
                                        <input id="paypal" name="havale" type="radio" value="1">
                                        <label for="paypal">Havale İle Ödeme</label>
                                        <img class="payment-logo paypal" src="/images/creditcard.png" alt="">
                                    </div>

                                    <div class="payment-tab-content">
                                        <p>Banka bilgileri bir sonraki sayfada verilecektir..</p>

                                    </div>
                                </div>
-->
                            </div>
                            <!-- Payment Methods Accordion / End -->
                            <div class="checkbox margin-top-30">
                                <input type="checkbox" id="two-step" required>
                                <label for="two-step"><span class="checkbox-icon"></span>   <a href="#">Kullanım Şartlarını</a> ve <a href="#">Gizlilik Sözleşmesini</a> okudum ve onaylıyorum.</label>
                            </div>

                            <button class="button ripple-effect mesaj-gonder margin-bottom-65 margin-left-10">Ödeme Yap</button>

                        </div>
                    </div>
                    </form>
                </div>



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

                <!-- Checkbox -->

            </div>

        </div>
    </div>
    <!-- Container / End -->
@endsection
