<!-- Sidebar -->
<!--
    Sidebar Mini Mode - Display Helper classes

    Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
    Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
        If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

    Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
    Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
    Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
-->
<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="bg-header-dark">
        <div class="content-header bg-white-10">
            <!-- Logo -->
            <a class="font-w600 text-white tracking-wide" href="">
                            <span class="smini-visible">
                                D<span class="opacity-75">x</span>
                            </span>
                <span class="smini-hidden">
                                ADMIN<span class="opacity-75">V3</span>
                            </span>
            </a>
            <!-- END Logo -->

            <!-- Options -->
            <div>
                <!-- Toggle Sidebar Style -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                <a class="js-class-toggle text-white-75" data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on" onclick="Dashmix.layout('sidebar_style_toggle');Dashmix.layout('header_style_toggle');" href="javascript:void(0)">
                    <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                </a>
                <!-- END Toggle Sidebar Style -->

                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                    <i class="fa fa-times-circle"></i>
                </a>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
        </div>
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{route('yonetim.anasayfa')}}">
                        <i class="nav-main-link-icon fa fa-rocket"></i>
                        <span class="nav-main-link-name">Yönetim Paneli</span>
                        <span class="nav-main-link-badge badge badge-pill badge-danger">KM</span>
                    </a>
                </li>
                <li class="nav-main-heading">YÖNETİM</li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fas fa-users"></i>
                        <span class="nav-main-link-name">Kullanıcılar</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('yonetim.kullanici')}}">
                                <span class="nav-main-link-name">Tüm Kullanıcılar</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('yonetim.kullanici.yeni')}}">
                                <span class="nav-main-link-name"><i class="fas fa-user-plus"></i> Kullanıcı Ekle</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('yonetim.kullanici.onaylamaindex')}}">
                                <span class="nav-main-link-name">Hizmet Veren Onaylama</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('yonetim.form')}}">
                                <span class="nav-main-link-name">İletişim Formları</span>
                            </a>
                        </li>
            </ul>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fas fa-building"></i>
                        <span class="nav-main-link-name">İlanlar</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('yonetim.ilan')}}">
                                <span class="nav-main-link-name">Tüm İlanlar</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('yonetim.ilan.onaybekleyen')}}">
                                <span class="nav-main-link-name">Onay Bekleyenler</span>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fas fa-walking"></i>
                        <span class="nav-main-link-name">Hizmetler</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('yonetim.hizmet')}}">
                                <span class="nav-main-link-name">Tüm Hizmetler</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('yonetim.hizmet.onaybekleyen')}}">
                                <span class="nav-main-link-name">Onay Bekleyenler</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('yonetim.kategori')}}">
                                <span class="nav-main-link-name">Kategori Yönetimi</span>
                            </a>
                        </li>


                    </ul>
                </li>



                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fas fa-dollar-sign"></i>
                        <span class="nav-main-link-name">Siparişler</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('yonetim.siparis')}}">
                                <span class="nav-main-link-name">Tüm Siparişler</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fas fa-book"></i>
                        <span class="nav-main-link-name">Sektörel Haberler</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('yonetim.blog.yeni')}}">
                                <span class="nav-main-link-name">Yeni Ekle</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('yonetim.blog')}}">
                                <span class="nav-main-link-name">Blog ve Kategoriler</span>
                            </a>
                        </li>

                    </ul>
                </li>



                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fas fa-cogs"></i>
                        <span class="nav-main-link-name">Site Yönetimi</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('yonetim.ayarlar')}}">
                                <span class="nav-main-link-name">Site Ayarları</span>
                            </a>
                    </ul>
                </li>
            </ul>


        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
<!-- END Sidebar -->
