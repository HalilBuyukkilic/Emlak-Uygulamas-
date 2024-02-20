@extends('yonetim.katmanlar.master')
@section('title', 'Panel')
@section('content')
    <div>
        <main id="main-container">

            <!-- Hero -->
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                        <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">{{config('app.name'). " | Hizmet Yönetimi"}}</h1>
                        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item">
                                    <a href="{{route('yonetim.anasayfa')}}">Panel</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('yonetim.hizmet')}}">Hizmetler</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Hizmet Düzenle</li>
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
                                        <h3 class="block-title">Hizmet  </h3>
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
                                                    <input type="text" class="form-control form-control-alt" id="baslik" name="baslik" placeholder="Başlık" value="{{old('title', $entry->title)}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">İl</label>
                                                    <select class="form-control user-select-all" name="il" id="il">
                                                        <option value="{{$entry->il}}" selected>{{$entry->il}}</option>
                                                        <option value="Adana">Adana</option>
                                                        <option value="Adıyaman">Adıyaman</option>
                                                        <option value="Afyonkarahisar">Afyonkarahisar</option>
                                                        <option value="Ağrı">Ağrı</option>
                                                        <option value="Amasya">Amasya</option>
                                                        <option value="Ankara">Ankara</option>
                                                        <option value="Antalya">Antalya</option>
                                                        <option value="Artvin">Artvin</option>
                                                        <option value="Aydın">Aydın</option>
                                                        <option value="Balıkesir">Balıkesir</option>
                                                        <option value="Bilecik">Bilecik</option>
                                                        <option value="Bingöl">Bingöl</option>
                                                        <option value="Bitlis">Bitlis</option>
                                                        <option value="Bolu">Bolu</option>
                                                        <option value="Burdur">Burdur</option>
                                                        <option value="Bursa">Bursa</option>
                                                        <option value="Çanakkale">Çanakkale</option>
                                                        <option value="Çankırı">Çankırı</option>
                                                        <option value="Çorum">Çorum</option>
                                                        <option value="Denizli">Denizli</option>
                                                        <option value="Diyarbakır">Diyarbakır</option>
                                                        <option value="Edirne">Edirne</option>
                                                        <option value="Elazığ">Elazığ</option>
                                                        <option value="Erzincan">Erzincan</option>
                                                        <option value="Erzurum">Erzurum</option>
                                                        <option value="Eskişehir">Eskişehir</option>
                                                        <option value="Gaziantep">Gaziantep</option>
                                                        <option value="Giresun">Giresun</option>
                                                        <option value="Gümüşhane">Gümüşhane</option>
                                                        <option value="Hakkâri">Hakkâri</option>
                                                        <option value="Hatay">Hatay</option>
                                                        <option value="Isparta">Isparta</option>
                                                        <option value="Mersin">Mersin</option>
                                                        <option value="İstanbul">İstanbul</option>
                                                        <option value="İzmir">İzmir</option>
                                                        <option value="Kars">Kars</option>
                                                        <option value="Kastamonu">Kastamonu</option>
                                                        <option value="Kayseri">Kayseri</option>
                                                        <option value="Kırklareli">Kırklareli</option>
                                                        <option value="Kırşehir">Kırşehir</option>
                                                        <option value="Kocaeli">Kocaeli</option>
                                                        <option value="Konya">Konya</option>
                                                        <option value="Kütahya">Kütahya</option>
                                                        <option value="Malatya">Malatya</option>
                                                        <option value="Manisa">Manisa</option>
                                                        <option value="Kahramanmaraş">Kahramanmaraş</option>
                                                        <option value="Mardin">Mardin</option>
                                                        <option value="Muğla">Muğla</option>
                                                        <option value="Muş">Muş</option>
                                                        <option value="Nevşehir">Nevşehir</option>
                                                        <option value="Niğde">Niğde</option>
                                                        <option value="Ordu">Ordu</option>
                                                        <option value="Rize">Rize</option>
                                                        <option value="Sakarya">Sakarya</option>
                                                        <option value="Samsun">Samsun</option>
                                                        <option value="Siirt">Siirt</option>
                                                        <option value="Sinop">Sinop</option>
                                                        <option value="Sivas">Sivas</option>
                                                        <option value="Tekirdağ">Tekirdağ</option>
                                                        <option value="Tokat">Tokat</option>
                                                        <option value="Trabzon">Trabzon</option>
                                                        <option value="Tunceli">Tunceli</option>
                                                        <option value="Şanlıurfa">Şanlıurfa</option>
                                                        <option value="Uşak">Uşak</option>
                                                        <option value="Van">Van</option>
                                                        <option value="Yozgat">Yozgat</option>
                                                        <option value="Zonguldak">Zonguldak</option>
                                                        <option value="Aksaray">Aksaray</option>
                                                        <option value="Bayburt">Bayburt</option>
                                                        <option value="Karaman">Karaman</option>
                                                        <option value="Kırıkkale">Kırıkkale</option>
                                                        <option value="Batman">Batman</option>
                                                        <option value="Şırnak">Şırnak</option>
                                                        <option value="Bartın">Bartın</option>
                                                        <option value="Ardahan">Ardahan</option>
                                                        <option value="Iğdır">Iğdır</option>
                                                        <option value="Yalova">Yalova</option>
                                                        <option value="Karabük">Karabük</option>
                                                        <option value="Kilis">Kilis</option>
                                                        <option value="Osmaniye">Osmaniye</option>
                                                        <option value="Düzce">Düzce</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Bütçe</label>
                                                    <input type="text" class="form-control form-control-alt" id="price" name="price" placeholder="Bütçe" value="{{old('price', $entry->price)}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="adres">Açıklama</label>
                                                    <textarea class="form-control" id="text" name="text" rows="4" placeholder="text" value="">{{old('text',$entry->text)}}</textarea>
                                                </div>
                                                    <div class="form-group">
                                                        <label for="adres">Sorular</label>
                                                        <textarea class="form-control" id="sorular" name="sorular" rows="4" placeholder="sorular" value="">{{old('sorular',$entry->sorular)}}</textarea>
                                                    </div>
                                                <div class="custom-control custom-block custom-control-success">
                                                    <input type="checkbox" class="custom-control-input" id="example-cb-custom-block3" value="1" name="onaylandi_mi" {{$entry->onaylandi_mi ? 'checked' : ''}}>
                                                    <label class="custom-control-label" for="example-cb-custom-block3">
                                                    <span class="d-block text-center">
                                                        <i class="fa fa-check fa-2x mb-2 text-black-50"></i><br>
                                                        Onaylandı Mı?
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
