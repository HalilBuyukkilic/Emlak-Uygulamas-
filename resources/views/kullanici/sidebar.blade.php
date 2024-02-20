
    <!-- Dashboard Sidebar
    ================================================== -->
    <div class="dashboard-sidebar margin-top-50">
        <div class="dashboard-sidebar-inner" data-simplebar>
            <div class="dashboard-nav-container">

                <!-- Responsive Navigation Trigger -->
                <a href="#" class="dashboard-responsive-nav-trigger">
					<span class="hamburger hamburger--collapse" >
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</span>
                    <span class="trigger-title">Kullanıcı Menüsü</span>
                </a>

                <!-- Navigation -->
                <div class="dashboard-nav">
                    <div class="dashboard-nav-inner">

                        <ul data-submenu-title="Başlangıç">
                            <li class="{{ (request()->is('profilim')) ? 'active' : '' }}"><a href="{{route('dashboard')}}"><i class="icon-material-outline-dashboard"></i> Giriş</a></li>
                            <li><a href="{{route('mesaj')}}"><i class="icon-material-outline-question-answer"></i> Mesajlar <span class="nav-tag">{{$mesajcount}}</span></a></li>
                            <li><a href="{{route('yorumlarim')}}"><i class="icon-material-outline-rate-review"></i> Yorumlarım</a></li>
                        </ul>


                        @if($user->hizmetveren==1)
                        <ul data-submenu-title="Hizmet Veren Menüsü">
                            <li><a href="#"><i class="icon-material-outline-assignment"></i> Hizmetler</a>
                                <ul>
                                    <li><a href="{{route('tekliflerim')}}">Tekliflerim <span class="nav-tag">{{count($user->teklif)}}</span></a></li>
                                </ul>
                            </li>
                        </ul>
                        @endif

                        <ul data-submenu-title="İlanlar ve İlan Ekleme">
                            <li><a href="#"><i class="icon-material-outline-announcement"></i> İlanlar</a>
                                <ul>
                                    <li><a href="{{route('ilanlarim')}}">İlanlarım </a></li>
                                    <li><a href="{{route('ilan.ekle.kategori')}}">İlan Ekle</a></li>
                                </ul>
                            </li>
                            <li class="{{ (request()->is('profilim/hizmet-ekle'))||request()->is('profilim/hizmetlerim') ? 'active' : '' }}"><a href="#"><i class="icon-material-outline-assignment"></i> Hizmetler</a>
                                <ul>
                                    <li><a href="{{route('hizmet.liste')}}">Hizmetlerim <span class="nav-tag">2</span></a></li>
                                    <li ><a href="#">Hizmet İlanı Ekle</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul data-submenu-title="Hesap">
                            <li><a href="{{route('ayarlar')}}"><i class="icon-material-outline-settings"></i> Ayarlar</a></li>

                        </ul>

                    </div>
                </div>
                <!-- Navigation / End -->

            </div>
        </div>
    </div>
    <!-- Dashboard Sidebar / End -->
