@extends('yonetim.katmanlar.master')
@section('title', 'Panel')
@section('content')
    <div>
        <main id="main-container">

            <!-- Hero -->
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                        <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">{{config('app.name'). " | İlan Yönetimi"}}</h1>
                        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item">
                                    <a href="{{route('yonetim.anasayfa')}}">Panel</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('yonetim.ilan')}}">Hizmetler</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">İlan Düzenle</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- END Hero -->

            <!-- Page Content -->
            <div class="content">
                <!-- Your Block -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Tüm Hizmetler <small>- Düzenleme</small>
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
                        <div class="col-md-12">
                            <form action="{{route('yonetim.hizmet.kaydet', @$entry->id)}}" method="POST">
                                @csrf
                                <div class="block block-rounded">
                                    <div class="block-header block-header-default">
                                        <h3 class="block-title">İlan  </h3>
                                        <!-- Hatalar -->

                                        <div class="block-options">
                                            <button type="button" class="btn-block-option">
                                                <i class="si si-settings"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <div class="row justify-content-center py-sm-3 py-md-5">
                                            <div class="col-sm-10 col-md-8">
                                                @if(count($errors)>0)
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach($errors->all() as $error)
                                                                <li>{{$error}}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <div class="form-group">
                                                    <label for="name">Başlık</label>
                                                    <input type="text" class="form-control form-control-alt" id="baslik" name="baslik" placeholder="Başlık" value="{{old('title', $entry->baslik)}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Kategori</label>
                                                    <select class="form-control user-select-all" name="il" id="il">
                                                        @foreach($kategoriler as $kat)
                                                            <option value="{{$kat->id}}" {{$kat->id == $entry->kategori->id ? 'selected' : ''}}>{{$kat->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                    <div class="form-group">
                                                        <label for="adres">Açıklama</label>
                                                        <textarea class="form-control" id="aciklama" name="aciklama" rows="4" placeholder="aciklama" value="">{{old('aciklama',$entry->aciklama)}}</textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="name">Fiyat</label>
                                                        <input type="text" class="form-control form-control-alt" id="fiyat" name="fiyat" placeholder="fiyat" value="{{old('fiyat', $entry->fiyat)}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="name">Brüt m^2</label>
                                                        <input type="text" class="form-control form-control-alt" id="brut" name="brut" placeholder="brut" value="{{old('brut', $entry->brut)}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="name">Net m^2</label>
                                                        <input type="text" class="form-control form-control-alt" id="net" name="net" placeholder="net" value="{{old('net', $entry->net)}}">
                                                    </div>

                                                    <div class="custom-control custom-block custom-control-success">
                                                        <input type="checkbox" class="custom-control-input" id="example-cb-custom-block1" value="1" name="kredi" {{$entry->kredi ? 'checked' : ''}}>
                                                        <label class="custom-control-label" for="example-cb-custom-block1">
                                                    <span class="d-block text-center">
                                                        <i class="fa fa-check fa-2x mb-2 text-black-50"></i><br>
                                                        Krediye Uygun?
                                                    </span>
                                                        </label>
                                                        <span class="custom-block-indicator">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-block custom-control-success">
                                                        <input type="checkbox" class="custom-control-input" id="example-cb-custom-block2" value="1" name="takas" {{$entry->takas ? 'checked' : ''}}>
                                                        <label class="custom-control-label" for="example-cb-custom-block2">
                                                    <span class="d-block text-center">
                                                        <i class="fa fa-check fa-2x mb-2 text-black-50"></i><br>
                                                        Takasa Uygun?
                                                    </span>
                                                        </label>
                                                        <span class="custom-block-indicator">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                                    </div>
                                                    <br>

                                                    <div class="form-group">
                                                        <label for="name">Durum</label>
                                                        <select class="form-control user-select-all" name="il" id="il">
                                                            <option value="{{$entry->durum}}">{{$entry->durum}}</option>
                                                            <option value="Satılık">Satılık</option>
                                                            <option value="Kiralık">Kiralık</option>
                                                            <option value="Devren Satılık">Devren Satılık</option>
                                                            <option value="Devren Kiralık">Devren Kiralık</option>
                                                        </select>
                                                    </div>

                                                    <br>
                                                    <div class="custom-control custom-block custom-control-success">
                                                        <input type="checkbox" class="custom-control-input" id="example-cb-custom-block3" value="1" name="acil_acil" {{$entry->acil_acil ? 'checked' : ''}}>
                                                        <label class="custom-control-label" for="example-cb-custom-block3">
                                                    <span class="d-block text-center">
                                                        <i class="fa fa-check fa-2x mb-2 text-black-50"></i><br>
                                                        Acil Acil!
                                                    </span>
                                                        </label>
                                                        <span class="custom-block-indicator">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-block custom-control-success">
                                                        <input type="checkbox" class="custom-control-input" id="example-cb-custom-block4" value="1" name="one_cikanlar" {{$entry->one_cikanlar ? 'checked' : ''}}>
                                                        <label class="custom-control-label" for="example-cb-custom-block4">
                                                    <span class="d-block text-center">
                                                        <i class="fa fa-check fa-2x mb-2 text-black-50"></i><br>
                                                        Öne Çıkanlar?
                                                    </span>
                                                        </label>
                                                        <span class="custom-block-indicator">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-block custom-control-success">
                                                        <input type="checkbox" class="custom-control-input" id="example-cb-custom-block5" value="1" name="kalin_baslik" {{$entry->kalin_baslik ? 'checked' : ''}}>
                                                        <label class="custom-control-label" for="example-cb-custom-block5">
                                                    <span class="d-block text-center">
                                                        <i class="fa fa-check fa-2x mb-2 text-black-50"></i><br>
                                                        Kalın Başlık?
                                                    </span>
                                                        </label>
                                                        <span class="custom-block-indicator">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                                    </div>
                                                    <br>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-content block-content-full block-content-sm bg-body-light text-center">
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="fa fa-check"></i>
                                            {{@$entry->id>0 ? "Güncelle" : "Kaydet"}}
                                        </button>
                                        <button type="reset" class="btn btn-sm btn-light">
                                            <i class="fa fa-repeat"></i> Sıfırla
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END Your Block -->
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->

    </div>
@endsection
