<!--Topbar-->
<div class="header-main">
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-sm-4 col-5">
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
                <div class="col-xl-7 col-lg-7 col-sm-8 col-7">
                    <div class="top-bar-right">
                        <ul class="custom">
                            <li>
                                <a href="{{route('ilan.ekle.kategori')}}" class="text-dark"><i class="fa fa-plus mr-1"></i> <span>Ücretsiz İlan Ekle</span></a>
                            </li>
                            <li>
                                <a href="{{route('hizmet.kategori.tumu')}}" class="text-dark"><i class="fa fa-plus mr-1"></i> <span>Hizmet Al</span></a>
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

</div>
