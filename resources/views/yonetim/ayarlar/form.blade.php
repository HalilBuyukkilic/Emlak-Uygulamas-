@extends('yonetim.katmanlar.master')
@section('title', 'Panel - Site Ayarları')
@section('content')
    <div>
        <main id="main-container">
            <!-- Hero -->
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                        <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">{{$ayar->baslik. " | Ayarlar"}}</h1>
                        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item">
                                    <a href="{{route('yonetim.anasayfa')}}">Panel</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('yonetim.ayarlar')}}">Ayarlar</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Ayarları Düzenle</li>
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
                            Ayarlar <small>- Düzenleme</small>
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
                            <form action="{{route('yonetim.ayarlar.kaydet', @$entry->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="block block-rounded">
                                    <div class="block-header block-header-default">
                                        <h3 class="block-title">Genel Ayarlar </h3>
                                        <!-- Hatalar -->
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
                                                    <label for="urun_adi">Site Adı (Gerekli)</label>
                                                    <input type="text" class="form-control form-control-alt" id="baslik" name="baslik" placeholder="Site Adı" value="{{old('baslik', $entry->baslik)}}" required>
                                                </div>
                                                <div class="form-group">
                                                        <label for="aciklama">Meta Açıklaması (Yalnızca Anasayfa için Google Arama Sonucu) (Gerekli)</label>
                                                        <textarea class="form-control form-control-alt" id="meta" name="meta" rows="7" placeholder="Meta" required>{{old('meta', $entry->meta)}}</textarea>
                                                    </div>
                                                <div class="form-group">
                                                        <label for="google_analytics">Google Analytics</label>
                                                    <textarea class="form-control form-control-alt" id="google_analytics" name="google_analytics" rows="7" placeholder="Google Analytics Embed html kodunun tamamı" required>{{old('google_analytics', $entry->google_analytics)}}</textarea>

                                                </div>

                                                 <div class="row">
                                                     <div class="col-md-6">
                                                         <div class="form-group">
                                                             <label for="lat">Enlem</label>
                                                             <input type="text" class="form-control form-control-alt" id="lat" name="lat" placeholder="Google Maps Enlem" value="{{old('lat', $entry->lat)}}">
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6">
                                                         <div class="form-group">
                                                             <label for="long">Boylam</label>
                                                             <input type="text" class="form-control form-control-alt" id="long" name="long" placeholder="Google Maps Boylam" value="{{old('long', $entry->long)}}">
                                                         </div>
                                                     </div>
                                                     <p><a href="https://www.google.com/maps/">Google Maps</a> sayfasına giderek istediğiniz alana sağ tıklayarak enlem, boylam bilgilerini alabilirsiniz.</p>

                                                 </div>

                                                    <div class="form-group">
                                                        <label for="telefon">Telefon</label>
                                                        <input type="text" class="form-control form-control-alt" id="telefon" name="telefon" placeholder="Telefon" value="{{old('telefon', $entry->telefon)}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">E-Posta Adresiniz</label>
                                                        <input type="text" class="form-control form-control-alt" id="email" name="email" placeholder="Email adresi" value="{{old('email', $entry->email)}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="aciklama">Adres</label>
                                                        <textarea class="form-control form-control-alt" id="adres" name="adres" rows="7" placeholder="Meta" required>{{old('adres', $entry->adres)}}</textarea>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-content block-content-full block-content-sm bg-body-light text-center">
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="fa fa-check"></i>Kaydet</button>
                                        <button type="reset" class="btn btn-sm btn-light">
                                            <i class="fa fa-repeat"></i> Sıfırla
                                        </button>
                                    </div>
                                </div>

                                <div class="block block-rounded">
                                    <div class="block-header block-header-default">
                                        <h3 class="block-title">Sosyal </h3>
                                        <!-- Hatalar -->
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
                                                    <label for="facebook">Facebook</label>
                                                    <input type="text" class="form-control form-control-alt" id="facebook" name="facebook" placeholder="Facebook" value="{{old('facebook', $entry->facebook)}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="instagram">Instagram</label>
                                                    <input class="form-control form-control-alt" id="instagram" name="instagram" placeholder="Instagram" value="{{old('instagram', $entry->instagram)}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="twitter">Twitter</label>
                                                    <input type="text" class="form-control form-control-alt" id="twitter" name="twitter" placeholder="Twitter" value="{{old('twitter', $entry->twitter)}}">
                                                </div>
                                                    <div class="form-group">
                                                        <label for="linkedin">Linkedin</label>
                                                        <input type="text" class="form-control form-control-alt" id="linkedin" name="linkedin" placeholder="Twitter" value="{{old('linkedn', $entry->linkedn)}}">
                                                    </div>
                                                <div class="form-group">
                                                    <label for="pinterest">Pinterest</label>
                                                    <input type="text" class="form-control form-control-alt" id="pinterest" name="pinterest" placeholder="Pinterest" value="{{old('pinterest', $entry->pinterest)}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-content block-content-full block-content-sm bg-body-light text-center">
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="fa fa-check"></i>Kaydet</button>
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
