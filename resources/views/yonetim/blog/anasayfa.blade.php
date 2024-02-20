@extends('yonetim.katmanlar.master')
@section('title', $ayar->baslik.'Panel')
@section('content')
    <div>
        <main id="main-container">
            <!-- Hero -->
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                        <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">{{$ayar->baslik." | Blog Yönetimi"}}</h1>
                        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item">
                                    <a href="{{route('yonetim.anasayfa')}}">Panel</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('yonetim.blog')}}">Blog</a>
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
                            Blog Yazıları
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
                                <h3 class="block-title">Blog Tablosu</h3>

                                <div class="block-options">
                                    <a href="{{route('yonetim.blog.yeni')}}">
                                        <button type="button" class="btn btn-success mr-1 mb-3">
                                            <i class="fa fa-fw fas fa-folder-plus mr-1"></i> Yazı Ekle
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
                                            <th class="text-center" style="width: 100px;">
                                                <i class="far fa-user"></i>
                                            </th>
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
                                            <td class="text-center">
                                                <img class="img-avatar img-avatar128" src="{{ $entry->blog_resmi!=null ? asset('upload/image/blog/'.$entry->blog_resmi):'/assets/media/avatars/resimyok.png' }}" alt="">
                                            </td>
                                            <td class="font-w600">
                                                <a href="{{route('blog_tekli', $entry->slug)}}" target="_blank">{{$entry->baslik}}</a>
                                            </td>
                                            <td><em class="text-muted"><a href="" target="_BLANK">{{$entry->slug}}</a></em></td>
                                            <td>
                                                {{$entry->created_at}}
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="{{route('yonetim.blog.duzenle', $entry->id)}}">
                                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Düzenle">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </button>
                                                    </a>
                                                    <a href="{{route('yonetim.blog.sil', $entry->id)}}">
                                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Sil" onclick="return confirm('Yazıyı Silmek İstediğinize Emin Misiniz?')">
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
                <!-- BLOG KATEGORİ -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Kategoriler
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
                        <!-- Kategori Table -->
                        <div class="table-responsive">
                            <div class="block block-rounded">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Kategori Tablosu</h3>

                                    <div class="block-options">
                                        <a href="{{route('yonetim.blog.kategori.yeni')}}">
                                            <button type="button" class="btn btn-success mr-1 mb-3">
                                                <i class="fa fa-fw fas fa-folder-plus mr-1"></i> Kategori Ekle
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
                                                <th style="width: 30%;">Kategori Adı</th>
                                                <th style="width: 20%;">SEO</th>
                                                <th class="text-center" style="width: 100px;">İşlemler</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($list2) == 0)
                                                <tr><td class="text-center"  colspan="8"> Kayıt Bulunamadı</td></tr>
                                            @endif
                                            @foreach($list2 as $entry2)
                                                <tr>
                                                    <td>{{$entry2->id}}</td>
                                                    <td class="font-w600">
                                                        <a href="{{route('blog_kategori', $entry2->slug)}}" target="_blank">{{$entry2->kategori_adi}}</a>
                                                    <td><em class="text-muted"><a href="" target="_BLANK">{{$entry2->slug}}</a></em></td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a href="{{route('yonetim.blog.kategori.duzenle', $entry2->id)}}">
                                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Düzenle">
                                                                    <i class="fa fa-pencil-alt"></i>
                                                                </button>
                                                            </a>
                                                            <a href="{{route('yonetim.blog.kategori.sil', $entry2->id)}}">
                                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Sil" onclick="return confirm('Kategoriyi Silmek İstediğinize Emin Misiniz?')">
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
