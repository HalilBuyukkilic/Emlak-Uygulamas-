@extends('yonetim.katmanlar.master')
@section('title', 'Panel')
@section('content')
    <div>
        <main id="main-container">
            <!-- Hero -->
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                        <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">{{config('app.name'). " | Kategori Yönetimi"}}</h1>
                        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item">
                                    <a href="{{route('yonetim.anasayfa')}}">Panel</a>
                                </li>
                                <li class="breadcrumb-item">
                                    Hizmet Kategori Düzenleme
                                </li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- END Hero -->

            <!-- Page Content -->
            <div class="content">
                <!-- Your Block -->
                @include('yonetim.katmanlar.menu.alert')

                @if($list->master_id!=null)
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Kategori Soru Ekle
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
                                    <h3 class="block-title">Soru Ekleme Formu</h3>

                                </div>
                                <div class="block-content">
                                    <form action="{{route('yonetim.kategori.kaydet', $list->id)}}" method="POST">
                                        @csrf
                                        <div class="row">

                                            <div class="col-lg-12 col-xl-12">
                                                <div class="form-group">
                                                    <label for="example-select">Kategori</label>
                                                    <p>{{$list->name}}</p>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-xl-12">
                                                <div class="form-group">
                                                    <label for="example-textarea-input-alt">Soru</label>
                                                    <input class="form-control form-control-alt" id="example-textarea-input-alt" name="soru"  placeholder="Format: Soru">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-xl-12">
                                                <div class="form-group">
                                                    <label for="example-textarea-input-alt">Cevaplar.</label>
                                                    <input class="form-control form-control-alt" id="example-textarea-input-alt" name="cevap"  placeholder="Format: cevap1:min-max,cevap2:min-max,cevap3:min-max">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-xl-12">
                                                <p>Her seferinde tek soru eklenebilir.</p>
                                                <input type="hidden" name="soruekleme" value="1">
                                                <button class="btn btn-success" type="submit">Gönder</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- END Full Table -->
                    </div>
                </div>
                <!-- END Your Block -->

                <!-- END Search -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            {{$list->name}} Soruları
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

                                <div class="block-content">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-vcenter">
                                            <thead>
                                            <tr>
                                                <th class="text-center" style="width: 50px;">#</th>
                                                <th style="width: 15%;">Soru</th>
                                                <th style="width: 20%">Cevaplar</th>
                                                <th>Min, Max Etkisi</th>
                                                <th class="text-center" style="width: 100px;">İşlemler</th>
                                            </tr>

                                            </thead>
                                            <tbody>

                                                    @foreach($list->sorular()->get() as $sorular)
                                                        <tr>
                                                            <td>{{$sorular->id}}</td>

                                                            <td>
                                                                {{json_decode($sorular->json)->soru}}
                                                            </td>
                                                            <td>@foreach(json_decode($sorular->json)->cevap as $cevap)
                                                                    -{{$cevap}}-
                                                                @endforeach
                                                            </td>

                                                            <td>{{$sorular->min}} - {{$sorular->max}}</td>

                                                            <td class="text-center">
                                                                <div class="btn-group">
                                                                    <a href="{{route('yonetim.kategori.sil', $sorular->id)}}">
                                                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Sil" onclick="return confirm('Soruyu Silmek İstediğinize Emin Misiniz?')">
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
                <!-- END Your Block -->
                @else
                    <div class="container">
                        <div class="alert alert-info">
                            Bilgi: Ana kategorilere soru eklenemez.
                        </div>
                    </div>
                    @endif

                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Kategori Ayarları
                        </h3>
                    </div>
                    <div class="block-content">
                        <!-- Kategori Table -->
                        <div class="table-responsive">
                            <div class="block block-rounded">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Kategori Düzenle</h3>

                                </div>
                                <div class="block-content">
                                    <form action="{{route('yonetim.kategori.kaydet', $list->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-lg-12 col-xl-12">
                                                <div class="form-group">
                                                    <label for="example-textarea-input-alt">Kategori Adı</label>
                                                    <input class="form-control form-control-alt" id="example-textarea-input-alt" name="name"  value="{{$list->name}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-xl-12">
                                                <div class="form-group">
                                                    <label for="example-textarea-input-alt">Slug</label>
                                                    <input class="form-control form-control-alt" id="example-textarea-input-alt" name="slug"  value="{{$list->slug}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-xl-12">
                                                <div class="form-group">
                                                    <label for="example-textarea-input-alt">Meta:</label>
                                                    <textarea class="form-control form-control-alt" id="example-textarea-input-alt" name="meta" >{{$list->meta}} </textarea>
                                                </div>
                                            </div>

                                                <div class="col-lg-6 col-xl-6">
                                                    <label for="example-textarea-input-alt">Min Fiyat:</label>
                                                    <input class="form-control form-control-alt" name="min"  value="{{$list->min}}">
                                                </div>
                                                <div class="col-lg-6 col-xl-6 mb-5">
                                                    <label for="example-textarea-input-alt">Max Fiyat:</label>
                                                    <input class="form-control form-control-alt" name="max"  value="{{$list->max}}">
                                                </div>

                                            <div class="col-lg-12 col-xl-12">
                                                <div class="form-group">
                                                    <img src="/upload/image/kategori/{{$list->resim}}" width="120px" alt="">
                                                    <label for="example-textarea-input-alt">Resim:</label>
                                                    <input type="file" class="form-control form-control-alt" id="example-textarea-input-alt" name="resim">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-xl-12">
                                                <input type="hidden" name="kategoriduzenle" value="1">
                                                <button class="btn btn-success" type="submit">Gönder</button>
                                            </div>

                                        </div>
                                    </form>
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
