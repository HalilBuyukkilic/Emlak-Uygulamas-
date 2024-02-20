<!-- Header Container
================================================== -->
<!-- Send Direct Message Popup
================================================== -->
@auth()
    <div id="small-dialog-3_999" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

        <div id="small-dialog-2">
            <!--Tabs -->
            <div class="sign-in-form">

                <ul class="popup-tabs-nav">
                    <li><a href="#tab2">Bakiye Yükle</a></li>
                </ul>

                <div class="popup-tabs-container">

                    <!-- Tab -->
                    <div class="popup-tab-content" id="tab2">

                        <!-- Welcome Text -->
                        <div class="welcome-text">
                            <h3>Bakiyen: {{$user->bakiye}} ₺ </h3>
                        </div>

                        <!-- Form -->
                        <form method="post" action="{{route('bakiye.yukle')}}">
                            @csrf
                            <input type="number" name="tutar" placeholder="Tutarı Giriniz. Örn: 200" class="with-border">
                            <input type="hidden" value="{{$user->id}}" name="user_id">

                            <button class="button full-width button-sliding-icon ripple-effect" type="submit">Ödeme Yap<i class="icon-material-outline-arrow-right-alt"></i></button>
                        </form>

                        <!-- Button -->


                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Send Direct Message Popup / End -->
@endauth

<header id="header-container" class="fullwidth transparent-header no-border">

    <!-- Header -->
    <div id="header">
        <div class="container">

            @if (!Request::is('/'))

                <div class="left-side">
                    <div id="logo">
                        <a href="{{route('anasayfa')}}"><img src="/images/logo2.png" data-sticky-logo="/images/logo2.png" data-transparent-logo="/images/logo2.png" alt=""></a>
                    </div>

                    <div class="clearfix"></div>
                </div>
            @endif

            @guest()
            <!-- GİRİŞ KAYIT -->
                <div class="right-side margin-right-10">
                    <nav id="navigation">
                        <ul id="responsive">
                            <li><a href="#"><i class="fas fa-flag"></i></a>
                                <ul class="dropdown-nav">
                                    <li><a href="">Türkçe <img src="/images/flags/tr.svg" width="10%" alt=""> </a></li>
                                    <li><a href="">English <img src="/images/flags/us.svg" width="10%" alt=""> </a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <div class="header-widget hide-on-mobile_buttons">
                        <a href="{{route('hizmet.kategori.tumu')}}" class="buttonrounded margin-top-20" data-tippy-placement="bottom" title="Ücretsiz Hizmet Al!"><i class="icon-feather-plus"></i> <span>Hizmet Ekle</span></a>
                        <a href="{{route('ilan.ekle')}}" class="buttonrounded margin-top-20" data-tippy-placement="bottom" title="Ücretsiz ilan ver!"><i class="icon-feather-plus"></i> <span>Ücretsiz İlan Ver</span></a>
                        <a href="#sign-in-dialog" class="popup-with-zoom-anim buttonrounded margin-top-20"><i class="icon-feather-log-in"></i> <span>Giriş / Kayıt</span></a>
                    </div>

                </div>
                <div class="right-side">
                    <div class="header-widget hide-on-desktop">
                        <a href="#sign-in-dialog" class="popup-with-zoom-anim buttonrounded margin-top-20"><i class="icon-feather-log-in"></i> <span>Giriş / Kayıt</span></a>
                    </div>
                </div>

                <!-- GİRİŞ KAYIT / End -->
            @endguest
            @auth()

            <!-- GİRİŞ YAPMIŞLAR / End -->
                <div class="right-side">

                    <!--  hizmet al -->
                    <div class="header-widget hide-on-mobile">


                        <div class="header-notifications">
                            <div class="header-notifications-trigger">
                                <a href="#"><i class="icon-feather-plus"></i></a>
                            </div>

                            <!-- Dropdown -->
                            <div class="header-notifications-dropdown">




                                <a href="{{route('hizmet.kategori.tumu')}}" class="header-notifications-button ripple-effect button-sliding-icon">Hizmet Al<i class="icon-material-outline-arrow-right-alt"></i></a>
                                <a href="{{route('ilan.ekle.kategori')}}" class="header-notifications-button  ripple-effect  button-sliding-icon">Emlak İlanı Ekle<i class="icon-material-outline-arrow-right-alt"></i></a>
                            </div>
                        </div>

                        <!-- Notifications -->
                        <div class="header-notifications">


                            <!-- Trigger -->
                            <div class="header-notifications-trigger">
                                <a href="#"><i class="icon-feather-bell"></i><span>{{count($bildirimtumu)}}</span></a>
                            </div>

                            <!-- Dropdown -->
                            <div class="header-notifications-dropdown bildirim">
                                <form action="{{route('bildirimler')}}" id="bildirimsil" method="post">
                                    @csrf
                                    <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                                </form>
                                <div class="header-notifications-headline">
                                    <h4>Bildirimler</h4>

                                    <button type="submit" form="bildirimsil" class="mark-as-read ripple-effect-dark" title="Tümünü Okundu İşaretle" data-tippy-placement="left">
                                        <i class="icon-feather-check-square"></i>
                                    </button>
                                </div>

                                <div class="header-notifications-content">
                                    <div class="header-notifications-scroll" data-simplebar>
                                        <ul>
                                        @if(count($bildirim)>0)
                                            <!-- Notification -->
                                                @foreach($bildirim as $bil)
                                                    <li class="notifications-not-read">
                                                        <a href="{{config('app.url').$bil->route}}">
                                                            <span class="notification-icon"><i class="icon-material-outline-notifications"></i></span>
                                                            <span class="notification-text">
													<strong></strong> <span class="color">{{$bil->bildirim}}</span>
												</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @else
                                                <li class="notification-not-read">
                                                    <span class="color">Hiç Bildirimin Yok</span>
                                                </li>
                                            @endif
                                            <li class="notification-not-read">
                                                <a href="{{route('dashboard')}}">
                                                    <span class="notification-icon"><i class="icon-material-outline-folder"></i></span>
                                                    <span class="notification-text">
													<strong></strong> <span class="color">Tümünü Gör</span>
												</span>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <!-- Messages -->
                        <div class="header-notifications">
                            <div class="header-notifications-trigger">
                                <a href="#"><i class="icon-feather-mail"></i><span>{{$mesajcount}}</span></a>
                            </div>

                            <!-- Dropdown -->
                            <div class="header-notifications-dropdown bildirim">

                                <div class="header-notifications-headline">
                                    <h4>Okunmamış Mesajlar</h4>

                                </div>

                                <div class="header-notifications-content">
                                    <div class="header-notifications-scroll" data-simplebar>
                                        <ul>

                                            @if($mesajcount==0)
                                                <li class="notifications-not-read">
                                                    <div class="notification-text">
                                                        <strong>Okunmamış Mesajınız Yok...</strong>
                                                    </div>
                                                </li>
                                            @else

                                                @foreach($yenimesajlar as $mes)
                                                <!-- Notification -->
                                                    @if($mes->hizmet_veren_id == $user->id)
                                                        @if($mes->hizmet_veren_okundu==0)
                                                            <li class="notifications-not-read">
                                                                <a href="{{route('mesaj.tekli', $mes->id)}}">

                                                                    <div class="notification-text">
                                                                        @if($mes->hizmet_alan_id==$user->id)
                                                                            <strong>{{$mes->katilimci->name}}</strong>
                                                                        @else
                                                                            <strong>{{$mes->katilimcii->name}}</strong>
                                                                        @endif

                                                                        <p class="notification-msg-text">{{$mes->hizmet->title}}</p>
                                                                        <span class="color">{{\Carbon\Carbon::parse($mes->created_at)->diffInDays()}} Gün Önce </span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endif

                                                    @if($mes->hizmet_alan_id == $user->id)
                                                        @if($mes->hizmet_alan_okundu==0)
                                                            <li class="notifications-not-read">
                                                                <a href="{{route('mesaj.tekli', $mes->id)}}">

                                                                    <div class="notification-text">
                                                                        @if($mes->hizmet_alan_id==$user->id)
                                                                            <strong>{{$mes->katilimci->name}}</strong>
                                                                        @else
                                                                            <strong>{{$mes->katilimcii->name}}</strong>
                                                                        @endif

                                                                        <p class="notification-msg-text">{{$mes->hizmet->title}}</p>
                                                                        <span class="color">{{\Carbon\Carbon::parse($mes->created_at)->diffInDays()}} Gün Önce </span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>

                                <a href="{{route('mesaj')}}" class="header-notifications-button ripple-effect button-sliding-icon">Tüm Mesajları Görüntüle<i class="icon-material-outline-arrow-right-alt"></i></a>
                            </div>
                        </div>

                        <!-- Diller -->
                        <div class="header-notifications">
                            <div class="header-notifications-trigger">
                                <a href="#"><i class="icon-feather-flag"></i></a>
                            </div>

                            <!-- Dropdown -->
                            <div class="header-notifications-dropdown">
                                <ul>
                                    <li>

                                        <a href="{{route('ilan.ekle.kategori')}}">Türkçe <img src="/images/flags/tr.svg" width="7%" alt=""></a>
                                    </li>
                                    <li>
                                        <a href="{{route('hizmet.kategori.tumu')}}">English <img src="/images/flags/us.svg" width="7%" alt=""> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <!--  User Notifications / End -->

                    <!-- User Menu -->
                    <div class="header-widget">

                        <!-- Messages -->
                        <div class="header-notifications user-menu">
                            <div class="header-notifications-trigger">
                                <a href="#"><div class="user-avatar status-online"><img src="/upload/image/users/{{Auth::user()->pp}}" alt=""></div></a>
                            </div>

                            <!-- Dropdown -->
                            <div class="header-notifications-dropdown">

                                <!-- User Status -->
                                <div class="user-status">

                                    <!-- User Name / Avatar -->
                                    <div class="user-details">
                                        <div class="user-avatar status-online"><img src="/upload/image/users/{{Auth::user()->pp}}" alt=""></div>
                                        <div class="user-name">
                                            {{Auth::user()->name}} <span>
                                            @if(Auth::user()->hizmetveren==1)
                                                    Hizmet Veren <br>
                                                    <a href="#small-dialog-3_999" class="popup-with-zoom-anim">Bakiye: {{Auth::user()->bakiye}}₺
                                                <br>Yükle</a>
                                                @else
                                                    Müşteri
                                                @endif
                                        </span>
                                        </div>
                                    </div>


                                </div>

                                <ul class="user-menu-small-nav">
                                    <li><a href="{{route('dashboard')}}"><i class="icon-material-outline-dashboard"></i> Hizmet Paneli </a></li>
                                    @if(Auth::user()->hizmetveren==1)
                                        <li><a href="{{route('banaozel')}}"><i class="icon-feather-search"></i> Teklif Verebileceğin Hizmetler </a></li>
                                    @endif

                                    <li><a href="{{route('ayarlar')}}"><i class="icon-material-outline-settings"></i> Hesap Ayarları</a></li>
                                    <li>
                                        <form id="logout" method="POST" action="{{ route('logout') }}">
                                            @csrf
                                        </form>
                                        <a href="javascript:;" onclick="document.getElementById('logout').submit();"><i class="icon-material-outline-power-settings-new"></i> Çıkış Yap</a>

                                    </li>
                                </ul>

                            </div>
                        </div>

                    </div>
                    <!-- User Menu / End -->


                </div>
                <!-- GİRİŞ YAPMIŞLAR / End -->
            @endauth
        </div>
    </div>
    <!-- Header / End -->
    <!-- Sign In Popup
    ================================================== -->
    @guest()
        <div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

            <!--Tabs -->
            <div class="sign-in-form">

                <ul class="popup-tabs-nav">
                    <li><a href="#login">Giriş Yap</a></li>
                    <li><a href="#register">Kayıt Ol</a></li>
                </ul>

                <div class="popup-tabs-container">

                    <!-- Login -->
                    <div class="popup-tab-content" id="login">

                        <!-- Welcome Text -->
                        <div class="welcome-text">
                            <h3>Tekrar geldiğini görmek güzel!</h3>
                            <span>Hesabın yok mu? <a href="#" class="register-tab">Kayıt Ol!</a></span>
                        </div>

                        <!-- Form -->
                        <form method="post" id="login-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="input-with-icon-left">
                                <i class="icon-material-baseline-mail-outline"></i>
                                <label for="email"></label>
                                <input type="text" class="input-text with-border" name="email" id="email" placeholder="E-posta Adresi" required/>
                            </div>

                            <div class="input-with-icon-left">
                                <i class="icon-material-outline-lock"></i>
                                <label for="password"></label>
                                <input type="password" class="input-text with-border" name="password" id="password" placeholder="Şifre" required/>
                            </div>
                            <a href="#" class="forgot-password">Şifrenizi mi unuttunuz?</a>


                            <!-- Button -->
                            <button class="button full-width button-sliding-icon ripple-effect" type="submit" form="login-form">Giriş Yap <i class="icon-material-outline-arrow-right-alt"></i></button>
                        </form>
                    @csrf
                    <!-- Social Login
                    <div class="social-login-separator"><span>or</span></div>
                    <div class="social-login-buttons">
                        <button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Facebook ile giriş yap</button>
                        <button class="google-login ripple-effect"><i class="icon-brand-google-plus-g"></i> Google ile giriş yap</button>
                    </div>
 -->
                    </div>

                    <!-- Register -->
                    <div class="popup-tab-content" id="register">

                        <!-- Welcome Text -->
                        <div class="welcome-text">
                            <h3>Hadi hesabını oluşturalım!</h3>
                        </div>
                        <!-- Form -->
                        <form method="POST" action="{{ route('register') }}" id="register-account-form">
                            <!-- Account Type -->
                            <div class="account-type">
                                <div>
                                    <input type="radio" name="account_type_radio" id="freelancer-radio" class="account-type-radio" value="0" checked/>
                                    <label for="freelancer-radio" class="ripple-effect-dark"><i class="icon-material-outline-account-circle"></i> Hizmet Alan</label>
                                </div>

                                <div>
                                    <input type="radio" name="account_type_radio" id="employer-radio" class="account-type-radio" value="2"/>
                                    <label for="employer-radio" class="ripple-effect-dark"><i class="icon-material-outline-business-center"></i> Hizmet Veren</label>
                                </div>
                            </div>


                            @csrf
                            <div class="input-with-icon-left">
                                <i class="icon-material-outline-person-pin"></i>
                                <input type="text" class="input-text with-border" name="name" id="name_register" placeholder="Adınız" style="text-transform:uppercase" required/>
                            </div>
                            <div class="input-with-icon-left">
                                <i class="icon-material-outline-person-pin"></i>
                                <input type="text" class="input-text with-border" name="surname" id="surname_register" placeholder="Soyadınız" style="text-transform:uppercase" required/>
                            </div>
                            <div class="input-with-icon-left">
                                <i class="icon-material-outline-person-pin"></i>
                                <input type="number" class="input-text with-border" name="tcno" id="tcno" placeholder="T.C Kimlik Numaranız" style="text-transform:uppercase" required/>
                            </div>
                            <div class="input-with-icon-left">
                                <i class="icon-material-outline-person-pin"></i>
                                <input type="number" class="input-text with-border" name="dogumyili" id="dogumyili" placeholder="Doğum Yılınız" style="text-transform:uppercase" required/>
                            </div>
                            <div class="input-with-icon-left">
                                <i class="icon-material-baseline-mail-outline"></i>
                                <input type="text" class="input-text with-border" name="email" id="emailaddress_register" placeholder="E-Posta Adresiniz" required/>
                            </div>

                            <div class="input-with-icon-left" title="Should be at least 8 characters long" data-tippy-placement="bottom">
                                <i class="icon-material-outline-lock"></i>
                                <input type="password" class="input-text with-border" name="password" id="password-register" placeholder="Şifre" required/>
                            </div>

                            <div class="input-with-icon-left">
                                <i class="icon-material-outline-lock"></i>
                                <input type="password" class="input-text with-border" name="password_confirmation" id="password-repeat-register" placeholder="Şifrenizi Tekrar Giriniz" required/>
                            </div>


                            <!-- Button -->
                            <button class="margin-top-10 button full-width button-sliding-icon ripple-effect" type="submit" form="register-account-form">Kayıt Ol <i class="icon-material-outline-arrow-right-alt"></i></button>
                        </form>
                        <!-- Social Login
                        <div class="social-login-separator"><span>ya da</span></div>
                        <div class="social-login-buttons">
                            <button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Facebook ile kayıt ol</button>
                            <button class="google-login ripple-effect"><i class="icon-brand-google-plus-g"></i> Google ile kayıt ol</button>
                        </div>
    -->
                    </div>

                </div>
            </div>
        </div>
        <!-- Sign In Popup / End -->
    @endguest
</header>
<div class="clearfix"></div>
<!--
<div class=" hide-on-desktop">
<nav class="mobile-bottom-nav">
    <div class="mobile-bottom-nav__item">
        <div class="mobile-bottom-nav__item-content">
            <a href="{{route('anasayfa')}}">
            <i class="fas fa-home fa-lg"></i>
            </a>
        </div>
    </div>
    @auth()

@endauth
@guest()
    <div class="mobile-bottom-nav__item">
        <div class="mobile-bottom-nav__item-content">
            <a href="{{route('login')}}">
            <i class="fas fa-sign-in-alt fa-lg"></i>
            </a>
        </div>
    </div>
    <div class="mobile-bottom-nav__item">
        <div class="mobile-bottom-nav__item-content">
            <a href="{{route('register')}}">
            <i class="fas fa-user-plus fa-lg"></i>
            </a>
        </div>
    </div>
    @endguest
    <div class="mobile-bottom-nav__item">
        <div class="mobile-bottom-nav__item-content">
            <a href="{{route('ilan.ekle.kategori')}}">
            <i class="fas fa-plus fa-lg"></i>
           </a>
        </div>
    </div>
    <div class="mobile-bottom-nav__item">
        <div class="mobile-bottom-nav__item-content">
            <a href="{{route('dashboard')}}">
                <i class="fas fa-user fa-lg"></i>
            </a>
        </div>
    </div>
</nav>
</div>
Header Container / End -->
