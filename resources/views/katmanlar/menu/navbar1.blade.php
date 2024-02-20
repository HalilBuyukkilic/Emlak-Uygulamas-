<!--Topbar-->
<!--Topbar-->
<div class="header-main">
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-sm-4 col-7">
                    <div class="top-bar-left d-flex">
                        <div class="clearfix">
                            <ul class="contact border-left">
                                <li class="mr-5">
                                    <a href="#" class="callnumber text-dark"><span><i class="fa fa-phone mr-1"></i> 444 4854</span></a>
                                </li>
                                <li class="select-country mr-3">
                                    <select class="form-control select2-flag-search" data-placeholder="Dil Seçiniz">
                                        <option value="TR">Türkçe</option>
                                        <option value="UM">English</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-sm-8 col-5">
                    <div class="top-bar-right">
                        <ul class="custom">
                            <li>
                                <a href="#" class="text-dark"><i class="fa fa-user-circle-o mr-1"></i> <span>Hizmet Veren Ol</span></a>
                            </li>


                            @guest()
                                <li>
                                    <a href="{{route('register')}}" class="text-dark"><i class="fa fa-user mr-1"></i> <span>Kayıt Ol</span></a>
                                </li>
                                <li>
                                    <a href="{{route('login')}}" class="text-dark"><i class="fa fa-sign-in mr-1"></i> <span>Giriş Yap</span></a>
                                </li>
                            @endguest
                            @auth()
                                <li class="dropdown">
                                    <a href="#" class="text-dark" data-toggle="dropdown"><i class="fa fa-user mr-1"></i><span>Hesabım</span></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a href="{{route('dashboard')}}" class="dropdown-item" >
                                            <i class="dropdown-icon icon icon-user"></i> Profilim
                                        </a>
                                        @if(Auth::user()->hizmetveren==1)
                                            <a href="{{route('dashboard')}}" class="dropdown-item" >
                                                <i class="dropdown-icon fa fa-money"></i> Bakiyen: {{Auth::user()->bakiye}}₺ Yükle
                                            </a>
                                        @endif
                                        <a class="dropdown-item" href="{{route('mesaj')}}">
                                            <i class="dropdown-icon icon icon-speech"></i> Mesajlarım
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="dropdown-icon icon icon-bell"></i> Bildirimlerin
                                        </a>
                                        <a href="{{route('ayarlar')}}" class="dropdown-item" >
                                            <i class="dropdown-icon  icon icon-settings"></i> Hesap Ayarları
                                        </a>
                                        <form id="logout" method="POST" action="{{ route('logout') }}">
                                            @csrf
                                        </form>
                                        <a class="dropdown-item" href="javascript:;" onclick="document.getElementById('logout').submit();">
                                            <i class="dropdown-icon icon icon-power"></i> Çıkış Yap
                                        </a>
                                    </div>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>

        <!-- Mobile Header -->
        <div class="horizontal-header clearfix ">
            <div class="container">
                <a id="horizontal-navtoggle" class="animated-arrow"><span></span></a>
                <span class="smllogo"><img src="/images/logo.png" width="120" alt=""/></span>

            </div>
        </div>
        <!-- Mobile Header -->

        <div class="horizontal-main bg-dark-transparent clearfix">
            <div class="horizontal-mainwrapper container clearfix">
                <div class="desktoplogo">
                    <a href="{{route('anasayfa')}}"><img src="/images/logo.png" alt=""></a>
                </div>
                <div class="desktoplogo-1">
                    <a href="{{route('anasayfa')}}"><img src="/images/logo.png" alt=""></a>
                </div>
                <!--Nav-->
                <nav class="horizontalMenu clearfix d-md-flex">
                    <ul class="horizontalMenu-list">
                        <li aria-haspopup="true"><a href="{{route('anasayfa')}}">Anasayfa</a></li>
                        <li aria-haspopup="true"><a href="{{route('iletisim')}}">İletişim</a></li>

                        <li aria-haspopup="true"><a href="#">Sektörel Haberler <span class="fa fa-caret-down m-0"></span></a>
                            <ul class="sub-menu">
                                @foreach($blogkategorileri as $kateg)
                                <li aria-haspopup="true"><a href="{{route('blog_kategori', $kateg->slug)}}">{{$kateg->kategori_adi}}</a></li>
                                @endforeach
                                    <li aria-haspopup="true"><a href="{{route('blog')}}">Tüm Haberler</a></li>
                            </ul>
                        </li>
                        <li aria-haspopup="true" class="mt-5 mr-2 pb-5 mt-lg-0">
                            <span><a class="btn btn-orange" href="{{route('ilan.ekle.kategori')}}">İlan Ekle</a></span>
                        </li>
                        <li aria-haspopup="true" class="mt-5 pb-5 mt-lg-0">
                            <span><a class="btn btn-orange" href="{{route('hizmet.kategori.tumu')}}">Hizmet Al</a></span>
                        </li>
                    </ul>
                </nav>
                <!--Nav-->
            </div>
        </div>

        </div>
        <!--/Sliders Section-->
    </div>
</div>

