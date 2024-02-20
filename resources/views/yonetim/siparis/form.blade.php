@extends('yonetim.katmanlar.master')
@section('title', 'Panel')
@section('content')
    <div>
        <main id="main-container">
            <!-- Hero -->
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                        <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">{{config('app.name'). " | Sipariş Yönetimi"}}</h1>
                        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item">
                                    <a href="{{route('yonetim.anasayfa')}}">Panel</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('yonetim.siparis')}}">Ürünler</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Sipariş Bilgileri</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- END Hero -->

            <!-- Page Content -->
            <div class="content">
                <!-- SİPARİŞ BİLGİLERİ -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Satın Alınan Ürünler - SP-{{$entry->id}}</h3>
                    </div>
                    <div class="block-content">
                        <div class="table-responsive">
                            <table class="table table-borderless table-striped table-vcenter font-size-sm">
                                <thead>
                                <tr>

                                    <th class="text-center" style="width: 100px;">
                                        <i class="far fa-user"></i>
                                    </th>
                                    <th class="text-center" style="width: 100px;">ID</th>
                                    <th class="text-center" style="width: 300px;">Ürün Adı</th>
                                    <th class="text-center" style="width: 100px;">Adet</th>
                                    <th class="text-center" style="width: 10%;">Adet Fiyatı</th>
                                    <th class="text-right" style="width: 10%;">Ara Toplam</th>
                                    <th class="text-right" style="width: 10%;">Durum</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($entry->sepet->sepet_urunler as $sepet_urun)
                                <tr>
                                    <td class="text-center"><a href="{{route('urun', $sepet_urun->urun->slug)}}" target="_BLANK"><img src="/yuklemeler/urun/{{$sepet_urun->urun->detay->urun_resmi}}"></a></td>
                                    <td class="text-center"><a href="{{route('urun', $sepet_urun->urun->slug)}}"><strong>PID.{{$sepet_urun->id}}</strong></a></td>
                                    <td><a href="{{route('urun', $sepet_urun->urun->slug)}}"><strong>{{$sepet_urun->urun->urun_adi}}</strong></a></td>
                                    <td class="text-center">{{$sepet_urun->adet}}</td>
                                    <td class="text-center">{{$sepet_urun->urun->fiyati}} ₺</td>
                                    <td class="text-right">{{$sepet_urun->tutar * $sepet_urun->adet}} ₺</td>
                                    <td class="text-right">{{$entry->durum}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" class="text-right"><strong>Toplam Tutar:</strong></td>
                                    <td class="text-right">{{$entry->siparis_tutari}} ₺</td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right"><strong>KDV Tutarı:</strong></td>
                                    <td class="text-right">{{$entry->siparis_tutari * ((100+config('cart.tax'))/100) - $entry->siparis_tutari }}₺</td>
                                </tr>
                                <tr class="table-active">
                                    <td colspan="5" class="text-right text-uppercase"><strong>Toplam Tutar:</strong></td>
                                    <td class="text-right"><strong>{{$entry->siparis_tutari * ((100+config('cart.tax'))/100)}}₺</strong></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- SİPARİŞ BİLGİLERİ SON -->
                <!-- KULLANICI BİLGİLERİ -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Tüm Sipaişler <small>- Düzenleme</small>
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
                            <form action="{{route('yonetim.siparis.kaydet', @$entry->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="block block-rounded">
                                    <div class="block-header block-header-default">
                                        <h3 class="block-title">Sipariş {{@$entry->id>0 ? "Düzenle" : "Ekle"}} </h3>
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
                                                    <label for="urun_adi">Ad Soyad</label>
                                                    <input type="text" class="form-control form-control-alt" id="adsoyad" name="adsoyad" placeholder="Ad Soyad" value="{{old('adsoyad', $entry->adsoyad)}}" required>
                                                </div>
                                                <div class="form-group">
                                                        <label for="telefon">Telefon</label>
                                                        <input class="form-control form-control-alt" id="telefon" name="telefon" placeholder="Telefon" value="{{old('telefon', $entry->telefon)}}" >
                                                    </div>
                                                <div class="form-group">
                                                        <label for="ceptelefonu">Cep Telefonu</label>
                                                        <input type="text" class="form-control form-control-alt" id="ceptelefonu" name="ceptelefonu" placeholder="Cep Telefonu" value="{{old('ceptelefonu', $entry->ceptelefonu)}}" required>
                                                    </div>
                                                <div class="form-group">
                                                        <label for="adres">Adres</label>
                                                    <textarea type="text" class="form-control form-control-alt" id="adres" name="adres" placeholder="Adres"  required>{{old('adres', $entry->adres)}} </textarea>
                                                    </div>
                                                <div class="form-group">
                                                        <label for="durum">Durum </label>
                                                    <select name="durum" class="form-control" id="durum">
                                                        <option {{old('durum', $entry->durum) == 'Siparişiniz Alınd' ? 'selected' : ''}}>Siparişiniz Alındı</option>
                                                        <option {{old('durum', $entry->durum) == 'Ödeme Onaylandı' ? 'selected' : ''}}>Ödeme Onaylandı</option>
                                                        <option {{old('durum', $entry->durum) == 'Kargoya Verildi' ? 'selected' : ''}}>Kargoya Verildi</option>
                                                        <option {{old('durum', $entry->durum) == 'Sipariş Tamamlandı' ? 'selected' : ''}}>Sipariş Tamamlandı</option>
                                                    </select>
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
                                <script>
                                    var options = {
                                        uiColor: '#f4645f',
                                        language: 'tr',
                                        extraPlugins: 'autogrow',
                                        autoGrow_minHeight: 250,
                                        autoGrow_maxHeight: 600,
                                        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                                        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                                        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                                        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='

                                    };
                                    CKEDITOR.replace('aciklama', options);
                                </script>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- KULLANICI BİLGİLERİ -->
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->

    </div>
@section('script')

    <script>
        $(function () {
            $('#kategoriler').select2({
                placeholder: 'Kategori Seçiniz'
            });

        });
    </script>
@endsection
@endsection
