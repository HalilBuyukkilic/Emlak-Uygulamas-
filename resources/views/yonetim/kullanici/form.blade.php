@extends('yonetim.katmanlar.master')
@section('title', 'Panel')
@section('content')
    <div>
        <main id="main-container">

            <!-- Hero -->
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                        <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">{{config('app.name'). " | Kullanıcı Yönetimi"}}</h1>
                        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item">
                                    <a href="{{route('yonetim.anasayfa')}}">Panel</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('yonetim.kullanici')}}">Kullanıcılar</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Kullanıcı Düzenle</li>
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
                            Tüm Kullanıcılar <small>- Düzenleme</small>
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
                            <form action="{{route('yonetim.kullanici.kaydet', @$entry->id)}}" method="POST">
                                @csrf
                                <div class="block block-rounded">
                                    <div class="block-header block-header-default">
                                        <h3 class="block-title">Kullanıcıyı {{@$entry->id>0 ? "Düzenle" : "Ekle"}} </h3>
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
                                                    <label for="name">Ad</label>
                                                    <input type="text" class="form-control form-control-alt" id="name" name="name" placeholder="Ad" value="{{old('name', $entry->name)}}">
                                                </div>
                                                    <div class="form-group">
                                                        <label for="name">Soyad</label>
                                                        <input type="text" class="form-control form-control-alt" id="surname" name="surname" placeholder="Soyad" value="{{old('surname', $entry->surname)}}">
                                                    </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control form-control-alt" id="email" name="email" placeholder="Email" value="{{old('email', $entry->email)}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Şifre</label>
                                                    <input type="password" class="form-control form-control-alt" id="password" name="password" placeholder="Şifre">
                                                </div>
                                                <div class="form-group">
                                                    <label for="telefon">Telefon</label>
                                                    <input type="text" class="form-control form-control-alt" id="telefon" name="telefon" placeholder="Telefon" value="{{old('telefon',$entry->telefon)}}">
                                                </div>
                                                    <div class="form-group">
                                                        <label for="telefon">TC</label>
                                                        <input type="text" class="form-control form-control-alt" id="tcno" name="tcno" placeholder="TC NO" value="{{old('tcno',$entry->tcno)}}">
                                                    </div>
                                                <div class="form-group">
                                                    <label for="adres">Bio</label>
                                                    <textarea class="form-control" id="bio" name="bio" rows="4" placeholder="Bio" value="">{{old('bio',$entry->bio)}}</textarea>
                                                </div>
                                                    <div class="form-group">
                                                        <label for="adres">Adres</label>
                                                        <textarea class="form-control" id="adres" name="adres" rows="4" placeholder="Adres" value="">{{old('adres',$entry->adres)}}</textarea>
                                                    </div>
                                                <div class="custom-control custom-block custom-control-success">
                                                    <input type="checkbox" class="custom-control-input" id="example-cb-custom-block3" name="aktif_mi" {{$entry->aktif_mi ? 'checked' : ''}}>
                                                    <label class="custom-control-label" for="example-cb-custom-block3">
                                                    <span class="d-block text-center">
                                                        <i class="fa fa-check fa-2x mb-2 text-black-50"></i><br>
                                                        Kullanıcı Aktif Mi?
                                                    </span>
                                                    </label>
                                                    <span class="custom-block-indicator">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                                </div>
                                                <br>
                                                <div class="custom-control custom-block custom-control-info">
                                                    <input type="checkbox" class="custom-control-input" id="example-cb-custom-block5" name="yonetici_mi" {{$entry->yonetici_mi ? 'checked' : ''}}>
                                                    <label class="custom-control-label" for="example-cb-custom-block5">
                                                    <span class="d-block text-center">
                                                        <i class="fa fa-info fa-2x mb-2 text-black-50"></i><br>
                                                        Yönetici Mi?
                                                    </span>
                                                    </label>
                                                    <span class="custom-block-indicator">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                                </div>
                                                    <br>
                                                    <div class="custom-control custom-block custom-control-info">
                                                        <input type="checkbox" class="custom-control-input" id="example-cb-custom-block6" name="hizmetveren" {{$entry->hizmetveren ? 'checked' : ''}}>
                                                        <label class="custom-control-label" for="example-cb-custom-block6">
                                                    <span class="d-block text-center">
                                                        <i class="fa fa-info fa-2x mb-2 text-black-50"></i><br>
                                                        Hizmet Veren Mi?
                                                    </span>
                                                        </label>
                                                        <span class="custom-block-indicator">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                                    </div>

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
