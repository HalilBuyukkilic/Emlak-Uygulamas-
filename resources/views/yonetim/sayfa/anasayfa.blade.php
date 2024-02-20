@extends('yonetim.katmanlar.master')
@section('title', 'Panel')
@section('content')
    <div>
        <main id="main-container">
            <!-- Hero -->
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                        <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">{{config('app.name'). " | Özel Sayfa Yönetimi"}}</h1>
                        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item">
                                    <a href="{{route('yonetim.anasayfa')}}">Panel</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('yonetim.sayfa')}}">Sayfa</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- END Hero -->

            <!-- Page Content -->
            <div class="content">
                <!-- BLOG YAZI -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Özel Sayfalar
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="pinned_toggle">
                                <i class="si si-pin"></i>
                            </button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <!-- Ürün Table -->
                        <div class="table-responsive">
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Sayfa Tablosu</h3>

                                <div class="block-options">
                                    <a href="{{route('yonetim.sayfa.yeni')}}">
                                        <button type="button" class="btn btn-success mr-1 mb-3">
                                            <i class="fa fa-fw fas fa-folder-plus mr-1"></i> Sayfa Ekle
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class="block-content">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-vcenter">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;">#</th>
                                            <th style="width: 30%;">Başlık</th>
                                            <th style="width: 20%;">SEO</th>
                                            <th style="width: 30%;">Oluşturulma Tarihi</th>
                                            <th class="text-center" style="width: 100px;">İşlemler</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($list) == 0)
                                            <tr><td class="text-center"  colspan="8"> Kayıt Bulunamadı</td></tr>
                                        @endif
                                        @foreach($list as $entry)
                                        <tr>
                                            <td>{{$entry->id}}</td>
                                            <td class="font-w600">
                                                <a href="{{route('yonetim.sayfa.duzenle', $entry->id)}}">{{$entry->baslik}}</a>
                                            </td>
                                            <td><em class="text-muted"><a href="" target="_BLANK">{{$entry->slug}}</a></em></td>
                                            <td>
                                                {{$entry->olusturulma_tarihi}}
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="{{route('yonetim.sayfa.duzenle', $entry->id)}}">
                                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Düzenle">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </button>
                                                    </a>
                                                    <a href="{{route('yonetim.sayfa.sil', $entry->id)}}">
                                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Sil" onclick="return confirm('Sayfayı Silmek İstediğinize Emin Misiniz?')">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>

                        <!-- END Full Table -->
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->

    </div>
@endsection
