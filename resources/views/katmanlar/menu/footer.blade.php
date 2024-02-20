<section class="main-footer">
    <footer class="bg-dark-purple text-white">
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12">
                        <h6>Hakkımızda</h6>
                        <hr class="deep-purple  accent-2 mb-4 mt-0 d-inline-block mx-auto">
                        <p>{{$ayar->meta}}</p>
                    </div>
                    <div class="col-lg-2 col-md-12">
                        <h6>Yararlı Bağlantılar</h6>
                        <hr class="deep-purple text-primary accent-2 mb-4 mt-0 d-inline-block mx-auto">
                        <ul class="list-unstyled mb-0">
                            <li><a href="{{route('iletisim')}}"><span>İletişim</span></a></li>
                            <li><a href="#"><span>Kullanım Şartları</span></a></li>
                            <li><a href="#"><span>Gizlilik Sözleşmesi</span></a></li>
                            @auth()
                                <li><a href="{{route('dashboard')}}"><span>Hesap Panelim</span></a></li>
                                <li><a href="{{route('hizmet.liste')}}"><span>Hizmet İlanlarım</span></a></li>
                                <li><a href="{{route('hizmet.liste')}}"><span>Emlak İlanlarım</span></a></li>
                                <li><a href="{{route('mesaj')}}"><span>Mesajlarım</span></a></li>
                            @endauth
                            @guest()
                                <li><a href="{{route('login')}}"><span>Giriş Yap</span></a></li>
                                <li><a href="{{route('register')}}"><span>Kayıt Ol</span></a></li>
                            @endguest
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-12">
                        <h6>İletişim</h6>
                        <hr class="deep-purple  text-primary accent-2 mb-4 mt-0 d-inline-block mx-auto">
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#"><i class="fa fa-home mr-3 text-primary"></i> {{$ayar->adres}}</a>
                            </li>
                            <li>
                                <a href="mailto:{{$ayar->email}}"><i class="fa fa-envelope mr-3 text-primary"></i>{{$ayar->email}}</a></li>
                            <li>
                                <a href="tel:{{$ayar->telefon}}"><i class="fa fa-phone mr-3 text-primary"></i>{{$ayar->telefon}}</a>
                            </li>

                        </ul>
                        <ul class="list-unstyled list-inline mt-3">
                            <li class="list-inline-item">
                                <a href="{{$ayar->facebook}}" class="btn-floating btn-sm rgba-white-slight mx-1 waves-effect waves-light">
                                    <i class="fa fa-facebook bg-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{$ayar->twitter}}" class="btn-floating btn-sm rgba-white-slight mx-1 waves-effect waves-light">
                                    <i class="fa fa-twitter bg-info"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{$ayar->instagram}}" class="btn-floating btn-sm rgba-white-slight mx-1 waves-effect waves-light">
                                    <i class="fa fa-instagram bg-secondary"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{$ayar->linkedn}}" class="btn-floating btn-sm rgba-white-slight mx-1 waves-effect waves-light">
                                    <i class="fa fa-linkedin bg-linkedin"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{$ayar->pinterest}}" class="btn-floating btn-sm rgba-white-slight mx-1 waves-effect waves-light">
                                    <i class="fa fa-pinterest bg-danger"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <h6 class="mb-0 mt-5">Ödeme Yöntemleri</h6>
                        <hr class="deep-purple  text-primary accent-2 mb-2 mt-3 d-inline-block mx-auto">
                        <div class="clearfix"></div>
                        <ul class="footer-payments">
                            <li class="pl-0"><a href="javascript:;"><i class="fa fa-cc-amex text-muted" aria-hidden="true"></i></a></li>
                            <li><a href="javascript:;"><i class="fa fa-cc-visa text-muted" aria-hidden="true"></i></a></li>
                            <li><a href="javascript:;"><i class="fa fa-credit-card-alt text-muted" aria-hidden="true"></i></a></li>
                            <li><a href="javascript:;"><i class="fa fa-cc-mastercard text-muted" aria-hidden="true"></i></a></li>
                            <li><a href="javascript:;"><i class="fa fa-cc-paypal text-muted" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-dark-purple text-white p-0">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-lg-12 col-sm-12 mt-3 mb-3 text-center ">
                        Toprak Konut © 2021 Tüm Hakları Saklıdır.
                    </div>
                </div>
            </div>
        </div>
    </footer>
</section>
