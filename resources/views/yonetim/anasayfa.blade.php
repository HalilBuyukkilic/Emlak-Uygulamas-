@extends('yonetim.katmanlar.master')
@section('title', $ayar->baslik.' - Yönetim Paneli')
@section('content')
    <!-- Page Container -->
    <div>
        <main id="main-container">
            <!-- Hero -->
            @include('yonetim.katmanlar.menu.alert')
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                        <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">{{$ayar->baslik." | Yönetim Paneli"}}</h1>
                        <div class="block-options">
                            <a href="{{route('yonetim.cache.sil')}}">
                            <button type="button" class="btn-block-option" type="submit">
                                <i class="si si-refresh"></i>Cache Boşalt
                            </button>
                            </a>
                            <a href="{{route('yonetim.sitemap')}}">
                                <button type="button" class="btn-block-option" type="submit">
                                    <i class="si si-wrench"></i>Sitemap Oluştur
                                </button>
                            </a>

                        </div>

                        </div>
                        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- END Hero -->

            <!-- Page Content -->
            <div class="content">
                <!-- Overview -->
                <div class="row row-deck">
                    <div class="col-sm-6 col-xl-3">
                        <div class="block block-rounded text-center d-flex flex-column">
                            <div class="block-content block-content-full">
                                <div class="item rounded-lg bg-body-dark mx-auto my-3">
                                    <i class="fa fa-users text-muted"></i>
                                </div>
                                <div class="text-black font-size-h1 font-w700">{{count($kullanicilar)}}</div>
                                <div class="text-muted mb-3">Kayıtlı Kullanıcı</div>
                            </div>
                            <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                                <a class="font-w500" href="{{route('yonetim.kullanici')}}">
                                    Tüm Kullanıcıları Göster
                                    <i class="fa fa-arrow-right ml-1 opacity-25"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="block block-rounded text-center d-flex flex-column">
                            <div class="block-content block-content-full">
                                <div class="item rounded-lg bg-body-dark mx-auto my-3">
                                    <i class="fa fa-walking text-muted"></i>
                                </div>
                                <div class="text-black font-size-h1 font-w700">{{count($userhizmetveren)}}</div>
                                <div class="text-muted mb-3">Hizmet Verenler</div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="block block-rounded text-center d-flex flex-column">
                            <div class="block-content block-content-full">
                                <div class="item rounded-lg bg-body-dark mx-auto my-3">
                                    <i class="fa fa-chart-line text-muted"></i>
                                </div>
                                <div class="text-black font-size-h1 font-w700">{{count($siparis)}}</div>
                                <div class="text-muted mb-3">Toplam Satış</div>
                            </div>
                            <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                                <a class="font-w500" href="{{route('yonetim.siparis')}}">
                                    Tümünü Gör
                                    <i class="fa fa-arrow-right ml-1 opacity-25"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="block block-rounded text-center d-flex flex-column">
                            <div class="block-content block-content-full">
                                <div class="item rounded-lg bg-body-dark mx-auto my-3">
                                    <i class="fa fa-wallet text-muted"></i>
                                </div>
                                <div class="text-black font-size-h1 font-w700">{{$toplam}}₺</div>
                                <div class="text-muted mb-3">Toplam Kazanç</div>

                            </div>
                            <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                                <a class="font-w500" href="{{route('yonetim.siparis')}}">
                                    Tümünü Gör
                                    <i class="fa fa-arrow-right ml-1 opacity-25"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="block block-rounded text-center d-flex flex-column">
                            <div class="block-content block-content-full">
                                <div class="item rounded-lg bg-body-dark mx-auto my-3">
                                    <i class="fa fa-wallet text-muted"></i>
                                </div>
                                <div class="text-black font-size-h1 font-w700">{{$toplamharcama}}₺</div>
                                <div class="text-muted mb-3">Toplam Harcanan</div>
                            </div>
                            <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                                <a class="font-w500" href="{{route('yonetim.siparis')}}">
                                    Tümünü Gör
                                    <i class="fa fa-arrow-right ml-1 opacity-25"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="block block-rounded text-center d-flex flex-column">
                            <div class="block-content block-content-full">
                                <div class="item rounded-lg bg-body-dark mx-auto my-3">
                                    <i class="fa fa-wallet text-muted"></i>
                                </div>
                                <div class="text-black font-size-h1 font-w700">{{$toplamilanharcama}}₺</div>
                                <div class="text-muted mb-3">İlan Yükseltme Harcamaları</div>
                            </div>
                            <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                                <a class="font-w500" href="{{route('yonetim.siparis')}}">
                                    Tümünü Gör
                                    <i class="fa fa-arrow-right ml-1 opacity-25"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="block block-rounded text-center d-flex flex-column">
                            <div class="block-content block-content-full">
                                <div class="item rounded-lg bg-body-dark mx-auto my-3">
                                    <i class="fa fa-dollar-sign text-muted"></i>
                                </div>
                                <div class="text-black font-size-h1 font-w700">{{$toplam-($toplam*3/100)}}₺</div>
                                <div class="text-muted mb-3">Net Kazanç</div>
                            </div>
                            <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Overview -->
            </div>

            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->

    </div>
    <!-- END Page Container -->

@endsection
