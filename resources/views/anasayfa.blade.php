@extends('katmanlar.anasayfa_master')
@section('title', 'Toprak Konut Emlak İlanları ve İnşaat Hizmetleri Pazaryeri')
@section('meta', $ayar->meta)
@section('content')
    @php($hour = date("G"))
    <!--GİRİŞ-->
    <section>
        <div class="banner-1 cover-image sptb-2 sptb-tab bg-background2 fullheight" data-image-src="
        @if($hour>6 and $hour<18)
            /images/villa.jpg
@else
            /images/villa.jpg
@endif

">
            @include('katmanlar.menu.alert')
            @include('katmanlar.menu.error')
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white mb-7">
                        <a href="{{route('anasayfa')}}"><img src="/images/logo2.png" width="30%" alt=""></a>
                    </div>
                    <div class="text-center text-white mb-7">
                        <a href="" class="typewrite" data-period="4000" data-type='[ "Buluşma Noktamız" ]'>
                            <span class="wrap"></span>
                        </a>
                        <p>Emlak ilanları, inşaat hizmetleri. Hizmet al veya hizmet ver.</p>
                    </div>
                    <!-- ARAMA -->
                    <div class="row">
                        <div class="col-xl-10 col-lg-12 col-md-12 d-block mx-auto" >
                            <div class="search-background bg-transparent">
                                <form action="{{route('ilan.arama')}}" method="get" >
                                    @csrf
                                <div class="form row no-gutters " >
                                    <div class="form-group  col-xl-2 col-lg-1 col-md-12 mb-0">

                                    </div>
                                    <div class="form-group  col-xl-4 col-lg-4 col-md-12 mb-0 bg-white ">
                                        <input type="text" class="form-control input-lg br-tr-md-0 br-br-md-0" id="text4" name="aranan" placeholder="Boğaz Manzaralı Daire...">
                                    </div>
                                    <div class="form-group col-xl-2 col-lg-3 col-md-12 select2-lg  mb-0 bg-white">
                                        <select class="form-control select2-show-search  border-bottom-0" name="kategori" data-placeholder="Kategori Seçiniz" required>
                                            <optgroup label="Kategoriler">
                                                @foreach($kategorilertumu as $kat)
                                                    <option value="{{$kat->id}}" >{{$kat->name}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-12 mb-0">
                                        <button type="submit" class="btn btn-lg btn-block btn-primary br-tl-md-0 br-bl-md-0">Ara</button>
                                    </div>
                                    <div class="form-group  col-xl-2 col-lg-1 col-md-12 mb-0">

                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-10 hide-on-mobile">
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                            <div class="card bg-card">
                                <div class="card-body">
                                    <div class="cat-item text-center">
                                        <a href="#" data-toggle="modal" data-target="#kategorisec"></a>
                                        <div class="cat-img text-shadow1">
                                            <i class="fa fa-building fa-2x "></i>
                                        </div>
                                        <div class="cat-desc">
                                            <h5 class="mb-1">Satılık - Kiralık</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                            <div class="card bg-card">
                                <div class="card-body">
                                    <div class="cat-item text-center">
                                        <a href="{{route('hizmet.kategori', 'insaat-imalat-malzemeleri-tedarikcileri')}}"></a>
                                        <div class="cat-img text-shadow1">
                                            <i class="fa fa-building-o fa-2x text-primary-gradient"></i>
                                        </div>
                                        <div class="cat-desc">
                                            <h5 class="mb-2">İmalat Malzemeleri</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                            <div class="card bg-card">
                                <div class="card-body">
                                    <div class="cat-item text-center">
                                        <a href="{{route('hizmet.kategori', 'insaat-imalat-isleri-tadilat-dekorasyon')}}"></a>
                                        <div class="cat-img text-shadow1">
                                            <i class="fa fa-puzzle-piece fa-2x text-primary-gradient "></i>
                                        </div>
                                        <div class="cat-desc">
                                            <h5 class="mb-1">Tadilat</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                            <div class="card bg-card">
                                <div class="card-body">
                                    <div class="cat-item text-center">
                                        <a href="{{route('hizmet.kategori', 'montaj-ve-tamir-hizmetleri')}}"></a>
                                        <div class="cat-img text-shadow1">
                                            <i class="fa fa-bitbucket-square fa-2x text-primary-gradient"></i>
                                        </div>
                                        <div class="cat-desc">
                                            <h5 class="mb-1">Tamir</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                            <div class="card bg-card">
                                <div class="card-body">
                                    <div class="cat-item text-center">
                                        <a href="{{route('hizmet.kategori', 'nakliyat')}}"></a>
                                        <div class="cat-img text-shadow1">
                                            <i class="fa fa-car fa-2x text-primary-gradient"></i>
                                        </div>
                                        <div class="cat-desc">
                                            <h5 class="mb-1">Nakliyat</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                            <div class="card bg-card">
                                <div class="card-body">
                                    <div class="cat-item text-center">
                                        <a href="{{route('blog')}}"></a>
                                        <div class="cat-img text-shadow1">
                                            <i class="fa fa-book fa-2x text-primary-gradient"></i>
                                        </div>
                                        <div class="cat-desc">
                                            <h5 class="mb-1">Sektörel Haberler</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10 hide-on-desktop">
                    <div id="small-categories" class="owl-carousel owl-carousel-icons2">
                        <div class="item">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="cat-item text-center">
                                        <a href="classifieds-list.html"></a>
                                        <div class="cat-img">
                                            <img src="../assets/images/products/categories/dress.png" alt="img">
                                        </div>
                                        <div class="cat-desc">
                                            <h5 class="mb-1">Satılık - Kiralık</h5>
                                            <span class="text-muted">Emlak İlanları</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="cat-item text-center">
                                        <a href="{{route('hizmet.kategori', 'insaat-imalat-malzemeleri-tedarikcileri')}}"></a>
                                        <div class="cat-img">
                                            <img src="/assets/images/products/categories/loan.png" alt="img">
                                        </div>
                                        <div class="cat-desc">
                                            <h5 class="mb-1">İmalat Malzemeleri</h5>
                                            <span class="text-muted">Hizmet Al</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="cat-item text-center">
                                        <a href="{{route('hizmet.kategori', 'insaat-imalat-isleri-tadilat-dekorasyon')}}"></a>
                                        <div class="cat-img">
                                            <img src="../assets/images/products/categories/store.png" alt="img">
                                        </div>
                                        <div class="cat-desc">
                                            <h5 class="mb-1">Tadilat</h5>
                                            <span class="text-muted">Hizmet Al</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="cat-item text-center">
                                        <a href="{{route('hizmet.kategori', 'montaj-ve-tamir-hizmetleri')}}"></a>
                                        <div class="cat-img text-shadow1">
                                            <img src="../assets/images/products/categories/delivery-truck.png" alt="img">
                                        </div>
                                        <div class="cat-desc">
                                            <h5 class="mb-1">Tamir</h5>
                                           <span class="text-muted">Hizmet Al</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="cat-item text-center">
                                        <a href="{{route('hizmet.kategori', 'nakliyat')}}"></a>
                                        <div class="cat-img">
                                            <img src="../assets/images/products/categories/call-center.png" alt="img">
                                        </div>
                                        <div class="cat-desc">
                                            <h5 class="mb-1">Nakliyat</h5>
                                            <span class="text-muted">Hizmet Al</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="cat-item text-center">
                                        <a href="{{route('blog')}}"></a>
                                        <div class="cat-img">
                                            <img src="../assets/images/products/categories/makeover.png" alt="img">
                                        </div>
                                        <div class="cat-desc">
                                            <h5 class="mb-1">Sektörel Haberler</h5>
                                            <span class="text-muted">Hizmet Al</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    </div>

                </div>
            </div><!-- /header-text -->
        </div>
    </section>


    <!-- Categories-->
    <section class="sptb bg-white">
        <div class="container  mobile-top-50">
            <div class="section-title center-block text-center">
                <h2>İlan Kategorileri</h2>
                <p>Emlak İlan Kategorilerinde Aradığın İlanı Bul!</p>
            </div>
            <div class="row">
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6">
                    <div class="card bg-card-light">
                        <div class="card-body">
                            <div class="cat-item text-center">
                                <a href="{{route('ilan.kategori', $konut->slug)}}"></a>
                                <div class="cat-img">
                                    <img src="/images/ikon/konut.png" alt="img">
                                </div>
                                <div class="cat-desc">
                                    <h4 class="mb-1">{{$konut->name}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6">
                    <div class="card bg-card-light">
                        <div class="card-body">
                            <div class="cat-item text-center">
                                <a href="{{route('ilan.kategori', $isyeri->slug)}}"></a>
                                <div class="cat-img">
                                    <img src="/images/ikon/isyeri.png" alt="img">
                                </div>
                                <div class="cat-desc">
                                    <h4 class="mb-1">{{$isyeri->name}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6">
                    <div class="card bg-card-light">
                        <div class="card-body">
                            <div class="cat-item text-center">
                                <a href="{{route('ilan.kategori', $arsa->slug)}}"></a>
                                <div class="cat-img">
                                    <img src="/images/ikon/arsa.png" alt="img">
                                </div>
                                <div class="cat-desc">
                                    <h4 class="mb-1">{{$arsa->name}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6">
                    <div class="card bg-card-light">
                        <div class="card-body">
                            <div class="cat-item text-center">
                                <a href="{{route('ilan.kategori', $bina->slug)}}"></a>
                                <div class="cat-img text-shadow1">
                                    <img src="/images/ikon/bina.png" alt="img">
                                </div>
                                <div class="cat-desc">
                                    <h4 class="mb-1">{{$bina->name}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6">
                    <div class="card bg-card-light">
                        <div class="card-body">
                            <div class="cat-item text-center">
                                <a href="{{route('ilan.kategori', $devremulk->slug)}}"></a>
                                <div class="cat-img">
                                    <img src="/images/ikon/devremulk.png" alt="img">
                                </div>
                                <div class="cat-desc">
                                    <h4 class="mb-1">{{$devremulk->name}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">
                </div>
            </div>
        </div>
    </section>


    <!--Acil Acil!-->
    <section class="sptb bg-patterns">
        <div class="container">
            <div class="section-title center-block text-center">
                <h2>Acil Acil! Emlak İlanları</h2>
                <p>Tümünü Gör :
                    <a href="{{route('ilan.kategori', $konut->slug)}}?aranan=1&acil_acil=1">Konut</a>,
                    <a href="{{route('ilan.kategori', $isyeri->slug)}}?aranan=1&acil_acil=1">İşyeri</a>,
                    <a href="{{route('ilan.kategori', $arsa->slug)}}?aranan=1&acil_acil=1">Arsa</a>,
                    <a href="{{route('ilan.kategori', $bina->slug)}}?aranan=1&acil_acil=1">Bina</a>,
                    <a href="{{route('ilan.kategori', $devremulk->slug)}}?aranan=1&acil_acil=1">Devremülk</a></p>
            </div>
            <div id="myCarousel2" class="owl-carousel owl-carousel-icons2">
                <!-- Wrapper for carousel items -->
                @foreach($acilacil as $entry)
                    <div class="item">
                        <div class="card mb-0">
                            <div class="arrow-ribbon bg-danger">{{$entry->durum}}</div>
                            <div class="item-card7-imgs">
                                <a href="{{route('ilan', $entry->slug)}}"></a>
                                <img src="/upload/image/ilan/{{$entry->resim->first()->resim}}" alt="{{$entry->baslik}}-Resim-Toprak-Konut" class="cover-image">
                            </div>
                            <div class="item-card7-overlaytext">
                                <a href="{{route('ilan.kategori', $entry->kategori->slug)}}" class="text-white"> {{$entry->kategori->name}} </a>
                                <h4  class="mb-0">{{number_format($entry->fiyat)}} ₺</h4>
                            </div>
                            <div class="card-body">
                                <div class="item-card7-desc">
                                    <div class="item-card7-text">
                                        <a href="{{route('ilan', $entry->slug)}}" class="text-dark"><h4 class="">{{$entry->baslik}}  <i class="ion-ios7-bolt text-muted"></i> </h4></a>
                                    </div>
                                    <ul class="item-cards7-ic mb-0">
                                        <li><a href="{{route('ilan', $entry->kategori->slug)}}"><span class="text-muted"><i class="icon icon-user mr-1"></i> {{$entry->kategori->name}}</span></a></li>
                                        <li><a href="{{route('ilan', $entry->slug)}}" class="icons"><i class="icon icon-location-pin text-muted mr-1"></i>{{$entry->il}}</a></li>
                                        <li><a href="{{route('ilan', $entry->slug)}}" class="icons"><i class="icon icon-event text-muted mr-1"></i> {{ \Carbon\Carbon::parse($entry->created_at)->format('d/m/Y') }} </a></li>
                                        <li><a href="{{route('ilan', $entry->slug)}}" class="icons"><i class="icon icon-location-pin text-muted mr-1"></i> {{$entry->ilce}}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="footerimg d-flex mt-0 mb-0">
                                    <div class="d-flex footerimg-l mb-0">
                                        <img src="/upload/image/users/{{$entry->user->pp}}" alt="{{$entry->user->name}}-avatar" class="avatar brround  mr-2">
                                        <h5 class="time-title text-muted p-0 leading-normal mt-2 mb-0">{{$entry->user->name}} </h5>
                                        <!-- ONAYLANDI <i class="icon icon-check text-success fs-12 ml-1" data-toggle="tooltip" data-placement="top" title="Onaylandı"></i> -->


                                    </div>
                                    <div class="mt-2 footerimg-r ml-auto">
                                        <a href="tel:{{$entry->user->telefon}}" class="text-muted" data-toggle="tooltip" data-placement="top" title="{{$entry->user->telefon}}"><i class="fa fa-phone"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!--Statistics-->
    <section>
        <div class="about-1 cover-image sptb bg-background-color" data-image-src="../assets/images/banners/banner5.jpg">
            <div class="content-text mb-0 text-white info">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-3 col-md-6">
                            <div class="counter-status md-mb-0">
                                <div class="counter-icon">
                                    <i class="icon icon-people"></i>
                                </div>
                                <h5>Hizmet Veren</h5>
                                <h2 class="counter mb-0">{{count($hizmetverenler)}}</h2>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="counter-status status-1 md-mb-0">
                                <div class="counter-icon text-warning">
                                    <i class="icon icon-rocket"></i>
                                </div>
                                <h5>Verilen Hizmetler</h5>
                                <h2 class="counter mb-0">{{count($hizmetler)}}</h2>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="counter-status status md-mb-0">
                                <div class="counter-icon text-primary">
                                    <i class="icon icon-docs"></i>
                                </div>
                                <h5>Toplam İlan</h5>
                                <h2 class="counter mb-0">{{count($ilanlar)}}</h2>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="counter-status status">
                                <div class="counter-icon text-success">
                                    <i class="icon icon-emotsmile"></i>
                                </div>
                                <h5>Mutlu Müşteri</h5>
                                <h2 class="counter">{{count($hizmetalanlar)}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--BLOG-->
    <section class="sptb">
        <div class="container">
            <div class="section-title center-block text-center">
                <h2>Sektörel Haberler</h2>
                <p>İnşaat sektöründen en güncel haberler ve bilgiler.</p>
            </div>
            <div class="row header-links">
                <h2><a href="{{route('blog')}}">Tümünü Gör</a></h2>
            </div>
            <div class="row">
                @foreach($bloguclu as $entry)
                    <div class="col-lg-4 col-md-12 col-xl-4">
                        <div class="card">
                            <div class="item-card2-img">
                                <a href="{{route('blog_tekli', $entry->slug)}}"></a>
                                <img src="/upload/image/blog/{{$entry->blog_resmi}}" alt="{{$entry->baslik}}" class="cover-image">
                            </div>
                            <div class="card-body">
                                <div class="item-card2">
                                    <div class="item-card2-desc">
                                        <h4 class="font-weight-semibold">{{$entry->baslik}}</h4>
                                        <p>{!! str_limit($entry->icerik, 100) !!}</p>
                                        @foreach($entry->blogkategoriler as $list)
                                            <a href="#" class="btn btn-primary">{{$list->kategori_adi}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!--NASIL ÇALIŞIR-->
    <section class="sptb">
        <div class="container">
            <div class="section-title center-block text-center">
                <h2>Nasıl Çalışır?</h2>
                <p>Hizmet almaya, ilan eklemeye veya hizmet vermeye başla!</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="">
                        <div class="mb-lg-0 mb-4">
                            <div class="service-card text-center">
                                <div class="bg-white icon-bg  icon-service text-purple about">
                                    <i class="icon-login"></i>
                                </div>
                                <div class="servic-data mt-3">
                                    <h4 class="font-weight-semibold mb-2">Kayıt Ol</h4>
                                    <p class="text-muted mb-0"><a href="{{route('register')}}">Kayıt</a> Sayfasına giderek bilgilerini girip hemen kayıt ol.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="">
                        <div class="mb-lg-0 mb-4">
                            <div class="service-card text-center">
                                <div class="bg-white icon-bg  icon-service text-purple about">
                                    <i class="fa fa-thumbs-o-up"></i>
                                </div>
                                <div class="servic-data mt-3">
                                    <h4 class="font-weight-semibold mb-2">Onayla</h4>
                                    <p class="text-muted mb-0">E-Posta ve Telefon numaranı talimatları takip ederek onayla.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="">
                        <div class="mb-sm-0 mb-4">
                            <div class="service-card text-center">
                                <div class="bg-white icon-bg  icon-service text-purple about">
                                    <i class="fa fa-plus"></i>
                                </div>
                                <div class="servic-data mt-3">
                                    <h4 class="font-weight-semibold mb-2">Ekle</h4>
                                    <p class="text-muted mb-0">Emlak ilanlarını ekle veya hizmet ihtiyaçlarını profesyonel ekiplerce karşıla!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="">
                        <div class="">
                            <div class="service-card text-center">
                                <div class="bg-white icon-bg  icon-service text-purple about">
                                    <i class="fa fa-money"></i>
                                </div>
                                <div class="servic-data mt-3">
                                    <h4 class="font-weight-semibold mb-2">Kazan!</h4>
                                    <p class="text-muted mb-0">Hizmet veren olarak hizmet ihtiyaçlarını karşılayarak kazanç sağla!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--TAMAMLANAN HİZMETLER-->
    <section class="sptb bg-white">
        <div class="container">
            <div class="section-title center-block text-center">
                <h2>Tamamlanan Hizmetler</h2>
                <p>Toprak Konut ile tamamlanan hizmetler</p>
            </div>
            <div id="myCarousel1" class="owl-carousel owl-carousel-icons2">
                <div class="item">
                    <div class="card mb-0">
                        <div class="power-ribbon power-ribbon-top-left text-warning"><span class="bg-warning"><i class="fa fa-bolt"></i></span></div>
                        <div class="item-card2-img">
                            <a href="classified.html"></a>
                            <img src="../assets//images/products/products/f1.jpg" alt="img" class="cover-image">
                        </div>
                        <div class="item-card2-icons">
                            <a href="classified.html" class="item-card2-icons-l bg-primary"> <i class="fa fa-cutlery"></i></a>
                            <a href="#" class="item-card2-icons-r bg-secondary"><i class="fa fa fa-heart-o"></i></a>
                        </div>
                        <div class="card-body pb-0">
                            <div class="item-card2">
                                <div class="item-card2-desc">
                                    <div class="item-card2-text">
                                        <a href="classified.html" class="text-dark"><h4 class="mb-0">Somik Restaurant</h4></a>
                                    </div>
                                    <div class="d-flex">
                                        <a href="">
                                            <p class="pb-0 pt-0 mb-2 mt-2"><i class="fa fa-map-marker text-danger mr-2"></i>Florida, USA</p>
                                        </a>
                                        <span class="ml-3 pb-0 pt-0 mb-2 mt-2">$200.00</span>
                                    </div>
                                    <p class="">Ut enim ad minima veniam, quis int nostrum exercitationem </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="item-card2-footer">
                                <div class="item-card2-footer-u">
                                    <div class="row d-flex">
                                        <span class="review_score mr-2 badge badge-primary">4.0/5</span>
                                        <div class="rating-stars d-inline-flex">
                                            <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
                                            <div class="rating-stars-container">
                                                <div class="rating-star sm is--active">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm is--active">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm is--active">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div> (5 Reviews)
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card mb-0">
                        <div class="power-ribbon power-ribbon-top-left text-warning"><span class="bg-warning"><i class="fa fa-bolt"></i></span></div>
                        <div class="item-card2-img">
                            <a href="classified.html"></a>
                            <img src="../assets//images/products/products/h4.jpg" alt="img" class="cover-image">
                        </div>
                        <div class="item-card2-icons">
                            <a href="#" class="item-card2-icons-l bg-primary"> <i class="fa fa-home"></i></a>
                            <a href="#" class="item-card2-icons-r bg-secondary"><i class="fa fa fa-heart-o"></i></a>
                        </div>
                        <div class="card-body pb-0">
                            <div class="item-card2">
                                <div class="item-card2-desc">
                                    <div class="item-card2-text">
                                        <a href="classified.html" class="text-dark"><h4 class="mb-0">GilkonStar Hotel</h4></a>
                                    </div>
                                    <div class="d-flex pb-0 pt-0">
                                        <a href="">
                                            <p class="pb-0 pt-0 mb-2 mt-2"><i class="fa fa-map-marker text-danger mr-2"></i>Florida, Uk</p>
                                        </a>
                                        <span class="ml-3 pb-0 pt-0 mb-2 mt-2">$200.00</span>
                                    </div>
                                    <p class="">Ut enim ad minima veniam, quis int nostrum exercitationem </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="item-card2-footer ">
                                <div class="item-card2-footer-u">
                                    <div class="row d-flex">
                                        <span class="review_score mr-2 badge badge-primary">4.0/5</span>
                                        <div class="rating-stars d-inline-flex">
                                            <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
                                            <div class="rating-stars-container">
                                                <div class="rating-star sm is--active">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm is--active">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm is--active">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div> (5 Reviews)
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card mb-0">
                        <div class="item-card2-img">
                            <a href="classified.html"></a>
                            <img src="../assets//images/products/products/b1.jpg" alt="img" class="cover-image">
                        </div>
                        <div class="item-card2-icons">
                            <a href="#" class="item-card2-icons-l bg-primary"> <i class="fa fa-paint-brush"></i></a>
                            <a href="#" class="item-card2-icons-r bg-secondary"><i class="fa fa fa-heart-o"></i></a>
                        </div>
                        <div class="card-body pb-0">
                            <div class="item-card2">
                                <div class="item-card2-desc">
                                    <div class="item-card2-text">
                                        <a href="classified.html" class="text-dark"><h4 class="mb-0">Sear Beauty & Spa</h4></a>
                                    </div>
                                    <div class="d-flex pb-0 pt-0">
                                        <a href="">
                                            <p class="pb-0 pt-0 mb-2 mt-2"><i class="fa fa-map-marker text-danger mr-2"></i>Florida, Uk</p>
                                        </a>
                                        <span class="ml-3 pb-0 pt-0 mb-2 mt-2">$200.00</span>
                                    </div>
                                    <p class="">Ut enim ad minima veniam, quis int nostrum exercitationem </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="item-card2-footer">
                                <div class="item-card2-footer-u">
                                    <div class="row d-flex">
                                        <span class="review_score mr-2 badge badge-primary">4.0/5</span>
                                        <div class="rating-stars d-inline-flex">
                                            <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
                                            <div class="rating-stars-container">
                                                <div class="rating-star sm is--active">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm is--active">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm is--active">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div> (5 Reviews)
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card mb-0">
                        <div class="ribbon ribbon-top-left text-danger"><span class="bg-danger">Urgent</span></div>
                        <div class="item-card2-img">
                            <a href="classified.html"></a>
                            <img src="../assets//images/products/products/v1.jpg" alt="img" class="cover-image">
                        </div>
                        <div class="item-card2-icons">
                            <a href="#" class="item-card2-icons-l bg-primary"> <i class="fa fa-car"></i></a>
                            <a href="#" class="item-card2-icons-r bg-secondary"><i class="fa fa fa-heart-o"></i></a>
                        </div>
                        <div class="card-body pb-0">
                            <div class="item-card2">
                                <div class="item-card2-desc">
                                    <div class="item-card2-text">
                                        <a href="classified.html" class="text-dark"><h4 class="mb-0">Seep Automobiles</h4></a>
                                    </div>
                                    <div class="d-flex pb-0 pt-0">
                                        <a href="">
                                            <p class="pb-0 pt-0 mb-2 mt-2"><i class="fa fa-map-marker text-danger mr-2"></i>Florida, Uk</p>
                                        </a>
                                        <span class="ml-3 pb-0 pt-0 mb-2 mt-2">$200.00</span>
                                    </div>
                                    <p class="">Ut enim ad minima veniam, quis int nostrum exercitationem </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="item-card2-footer">
                                <div class="item-card2-footer-u">
                                    <div class="row d-flex">
                                        <span class="review_score mr-2 badge badge-primary">4.0/5</span>
                                        <div class="rating-stars d-inline-flex">
                                            <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
                                            <div class="rating-stars-container">
                                                <div class="rating-star sm is--active">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm is--active">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm is--active">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div> (5 Reviews)
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card mb-0">
                        <div class="power-ribbon power-ribbon-top-left text-warning"><span class="bg-warning"><i class="fa fa-bolt"></i></span></div>
                        <div class="item-card2-img">
                            <a href="classified.html"></a>
                            <img src="../assets//images/products/products/f3.jpg" alt="img" class="cover-image">
                        </div>
                        <div class="item-card2-icons">
                            <a href="#" class="item-card2-icons-l bg-primary"> <i class="fa fa-cutlery"></i></a>
                            <a href="#" class="item-card2-icons-r bg-secondary"><i class="fa fa fa-heart-o"></i></a>
                        </div>
                        <div class="card-body pb-0">
                            <div class="item-card2">
                                <div class="item-card2-desc">
                                    <div class="item-card2-text">
                                        <a href="classified.html" class="text-dark"><h4 class="mb-0">Somik Restaurant</h4></a>
                                    </div>
                                    <div class="d-flex pb-0 pt-0">
                                        <a href="">
                                            <p class="pb-0 pt-0 mb-2 mt-2"><i class="fa fa-map-marker text-danger mr-2"></i>Florida, Uk</p>
                                        </a>
                                        <span class="ml-3 pb-0 pt-0 mb-2 mt-2">$200.00</span>
                                    </div>
                                    <p class="">Ut enim ad minima veniam, quis int nostrum exercitationem </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="item-card2-footer">
                                <div class="item-card2-footer-u">
                                    <div class="row d-flex">
                                        <span class="review_score mr-2 badge badge-primary">4.0/5</span>
                                        <div class="rating-stars d-inline-flex">
                                            <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
                                            <div class="rating-stars-container">
                                                <div class="rating-star sm is--active">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm is--active">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm is--active">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div> (5 Reviews)
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card mb-0">
                        <div class="ribbon ribbon-top-left text-primary"><span class="bg-primary">Collections</span></div>
                        <div class="item-card2-img">
                            <a href="classified.html"></a>
                            <img src="../assets//images/products/products/h2.jpg" alt="img" class="cover-image">
                        </div>
                        <div class="item-card2-icons">
                            <a href="#" class="item-card2-icons-l bg-primary"> <i class="fa fa-home"></i></a>
                            <a href="#" class="item-card2-icons-r bg-secondary"><i class="fa fa fa-heart-o"></i></a>
                        </div>
                        <div class="card-body pb-0">
                            <div class="item-card2">
                                <div class="item-card2-desc">
                                    <div class="item-card2-text">
                                        <a href="classified.html" class="text-dark"><h4 class="mb-0">GilkonStar Hotel</h4></a>
                                    </div>
                                    <div class="d-flex pb-0 pt-0">
                                        <a href="">
                                            <p class="pb-0 pt-0 mb-2 mt-2"><i class="fa fa-map-marker text-danger mr-2"></i>Florida, Uk</p>
                                        </a>
                                        <span class="ml-3 pb-0 pt-0 mb-2 mt-2">$200.00</span>
                                    </div>
                                    <p class="">Ut enim ad minima veniam, quis int nostrum exercitationem </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="item-card2-footer">
                                <div class="item-card2-footer-u">
                                    <div class="row d-flex">
                                        <span class="review_score mr-2 badge badge-primary">4.0/5</span>
                                        <div class="rating-stars d-inline-flex">
                                            <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
                                            <div class="rating-stars-container">
                                                <div class="rating-star sm is--active">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm is--active">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm is--active">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div> (5 Reviews)
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card mb-0">
                        <div class="item-card2-img">
                            <a href="classified.html"></a>
                            <img src="../assets//images/products/products/v3.jpg" alt="img" class="cover-image">
                        </div>
                        <div class="item-card2-icons">
                            <a href="#" class="item-card2-icons-l bg-primary"> <i class="fa fa-car"></i></a>
                            <a href="#" class="item-card2-icons-r bg-secondary"><i class="fa fa fa-heart-o"></i></a>
                        </div>
                        <div class="card-body pb-0">
                            <div class="item-card2">
                                <div class="item-card2-desc">
                                    <div class="item-card2-text">
                                        <a href="classified.html" class="text-dark"><h4 class="mb-0">Seep Automobiles</h4></a>
                                    </div>
                                    <div class="d-flex pb-0 pt-0">
                                        <a href="">
                                            <p class="pb-0 pt-0 mb-2 mt-2"><i class="fa fa-map-marker text-danger mr-2"></i>Florida, Uk</p>
                                        </a>
                                        <span class="ml-3 pb-0 pt-0 mb-2 mt-2">$200.00</span>
                                    </div>
                                    <p class="">Ut enim ad minima veniam, quis int nostrum exercitationem </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="item-card2-footer">
                                <div class="item-card2-footer-u">
                                    <div class="row d-flex">
                                        <span class="review_score mr-2 badge badge-primary">4.0/5</span>
                                        <div class="rating-stars d-inline-flex">
                                            <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
                                            <div class="rating-stars-container">
                                                <div class="rating-star sm is--active">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm is--active">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm is--active">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div> (5 Reviews)
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card pb-0">
                        <div class="item-card2-img">
                            <a href="classified.html"></a>
                            <img src="../assets//images/products/products/b3.jpg" alt="img" class="cover-image">
                        </div>
                        <div class="item-card2-icons">
                            <a href="#" class="item-card2-icons-l bg-primary"> <i class="fa fa-paint-brush"></i></a>
                            <a href="#" class="item-card2-icons-r bg-secondary"><i class="fa fa fa-heart-o"></i></a>
                        </div>
                        <div class="card-body pb-0">
                            <div class="item-card2">
                                <div class="item-card2-desc">
                                    <div class="item-card2-text">
                                        <a href="classified.html" class="text-dark"><h4 class="mb-0">Bure Spa</h4></a>
                                    </div>
                                    <div class="d-flex pb-0 pt-0">
                                        <a href="">
                                            <p class="pb-0 pt-0 mb-2 mt-2"><i class="fa fa-map-marker text-danger mr-2"></i>Florida, Uk</p>
                                        </a>
                                        <span class="ml-3 pb-0 pt-0 mb-2 mt-2">$200.00</span>
                                    </div>
                                    <p class="">Ut enim ad minima veniam, quis int nostrum exercitationem </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="item-card2-footer">
                                <div class="item-card2-footer-u">
                                    <div class="row d-flex">
                                        <span class="review_score mr-2 badge badge-primary">4.0/5</span>
                                        <div class="rating-stars d-inline-flex">
                                            <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
                                            <div class="rating-stars-container">
                                                <div class="rating-star sm is--active">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm is--active">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm is--active">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-star sm">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div> (5 Reviews)
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <a href="#" data-toggle="modal" data-target="#kategorisec"></a>

<!--MODAL-->
    <!-- KATEGORİ -->
    <!-- Message Modal -->
    <div class="modal fade" id="kategorisec" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Kategori Seçiniz</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <section class="sptb bg-white">
                        <div class="container">
                            <div class="section-title center-block text-center">
                                <h2>İlan Kategorileri</h2>
                                <p>Ne tür bir ilan arıyorsunuz?</p>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                    <div class="card bg-card-light">
                                        <div class="card-body">
                                            <div class="cat-item text-center">
                                                <a href="#" data-toggle="modal" data-target="#kategorisecsatilik"></a>
                                                <div class="cat-img">
                                                    <img src="/images/ikon/konut.png" alt="img">
                                                </div>
                                                <div class="cat-desc">
                                                    <h4 class="mb-1">Satılık</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                    <div class="card bg-card-light">
                                        <div class="card-body">
                                            <div class="cat-item text-center">
                                                <a href="#" data-toggle="modal" data-target="#kategoriseckiralik"></a>
                                                <div class="cat-img">
                                                    <img src="/images/ikon/isyeri.png" alt="img">
                                                </div>
                                                <div class="cat-desc">
                                                    <h4 class="mb-1">Kiralık</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                    <div class="card bg-card-light">
                                        <div class="card-body">
                                            <div class="cat-item text-center">
                                                <a href="#"></a>
                                                <div class="cat-img">
                                                    <img src="/images/ikon/arsa.png" alt="img">
                                                </div>
                                                <div class="cat-desc">
                                                    <h4 class="mb-1">Kentsel Dönüşüm</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                    <div class="card bg-card-light">
                                        <div class="card-body">
                                            <div class="cat-item text-center">
                                                <a href="#"></a>
                                                <div class="cat-img text-shadow1">
                                                    <img src="/images/ikon/bina.png" alt="img">
                                                </div>
                                                <div class="cat-desc">
                                                    <h4 class="mb-1">Projeler</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="kategorisecsatilik" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Satılık Kategorisi Seçiniz</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <section class="sptb bg-white">
                        <div class="container">
                            <div class="section-title center-block text-center">
                                <h2>İlan Kategorileri</h2>
                                <p>Ne tür bir ilan arıyorsunuz?</p>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                    <div class="card bg-card-light">
                                        <div class="card-body">
                                            <div class="cat-item text-center">
                                                <a href="{{route('ilan.kategori', $konut->slug)}}?durum=1&arama=1"></a>
                                                <div class="cat-img">
                                                    <img src="/images/ikon/konut.png" alt="img">
                                                </div>
                                                <div class="cat-desc">
                                                    <h4 class="mb-1">{{$konut->name}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                    <div class="card bg-card-light">
                                        <div class="card-body">
                                            <div class="cat-item text-center">
                                                <a href="{{route('ilan.kategori', $isyeri->slug)}}?durum=1&arama=1"></a>
                                                <div class="cat-img">
                                                    <img src="/images/ikon/isyeri.png" alt="img">
                                                </div>
                                                <div class="cat-desc">
                                                    <h4 class="mb-1">{{$isyeri->name}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                    <div class="card bg-card-light">
                                        <div class="card-body">
                                            <div class="cat-item text-center">
                                                <a href="{{route('ilan.kategori', $arsa->slug)}}?durum=1&arama=1"></a>
                                                <div class="cat-img">
                                                    <img src="/images/ikon/arsa.png" alt="img">
                                                </div>
                                                <div class="cat-desc">
                                                    <h4 class="mb-1">{{$arsa->name}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                    <div class="card bg-card-light">
                                        <div class="card-body">
                                            <div class="cat-item text-center">
                                                <a href="{{route('ilan.kategori', $bina->slug)}}?durum=1&arama=1"></a>
                                                <div class="cat-img text-shadow1">
                                                    <img src="/images/ikon/bina.png" alt="img">
                                                </div>
                                                <div class="cat-desc">
                                                    <h4 class="mb-1">{{$bina->name}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                    <div class="card bg-card-light">
                                        <div class="card-body">
                                            <div class="cat-item text-center">
                                                <a href="{{route('ilan.kategori', $devremulk->slug)}}?durum=1&arama=1"></a>
                                                <div class="cat-img">
                                                    <img src="/images/ikon/devremulk.png" alt="img">
                                                </div>
                                                <div class="cat-desc">
                                                    <h4 class="mb-1">{{$devremulk->name}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Geri</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="kategoriseckiralik" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Kiralık İlan Kategorileri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <section class="sptb bg-white">
                        <div class="container">
                            <div class="section-title center-block text-center">
                                <h2>İlan Kategorileri</h2>
                                <p>Ne tür bir ilan arıyorsunuz?</p>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                    <div class="card bg-card-light">
                                        <div class="card-body">
                                            <div class="cat-item text-center">
                                                <a href="{{route('ilan.kategori', $konut->slug)}}?durum=2&arama=1"></a>
                                                <div class="cat-img">
                                                    <img src="/images/ikon/konut.png" alt="img">
                                                </div>
                                                <div class="cat-desc">
                                                    <h4 class="mb-1">{{$konut->name}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                    <div class="card bg-card-light">
                                        <div class="card-body">
                                            <div class="cat-item text-center">
                                                <a href="{{route('ilan.kategori', $isyeri->slug)}}?durum=2&arama=1"></a>
                                                <div class="cat-img">
                                                    <img src="/images/ikon/isyeri.png" alt="img">
                                                </div>
                                                <div class="cat-desc">
                                                    <h4 class="mb-1">{{$isyeri->name}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                    <div class="card bg-card-light">
                                        <div class="card-body">
                                            <div class="cat-item text-center">
                                                <a href="{{route('ilan.kategori', $arsa->slug)}}?durum=2&arama=1"></a>
                                                <div class="cat-img">
                                                    <img src="/images/ikon/arsa.png" alt="img">
                                                </div>
                                                <div class="cat-desc">
                                                    <h4 class="mb-1">{{$arsa->name}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                    <div class="card bg-card-light">
                                        <div class="card-body">
                                            <div class="cat-item text-center">
                                                <a href="{{route('ilan.kategori', $bina->slug)}}?durum=2&arama=1"></a>
                                                <div class="cat-img text-shadow1">
                                                    <img src="/images/ikon/bina.png" alt="img">
                                                </div>
                                                <div class="cat-desc">
                                                    <h4 class="mb-1">{{$bina->name}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                    <div class="card bg-card-light">
                                        <div class="card-body">
                                            <div class="cat-item text-center">
                                                <a href="{{route('ilan.kategori', $devremulk->slug)}}?durum=2&arama=1"></a>
                                                <div class="cat-img">
                                                    <img src="/images/ikon/devremulk.png" alt="img">
                                                </div>
                                                <div class="cat-desc">
                                                    <h4 class="mb-1">{{$devremulk->name}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Geri</button>
                </div>
            </div>
        </div>
    </div>

@endsection
