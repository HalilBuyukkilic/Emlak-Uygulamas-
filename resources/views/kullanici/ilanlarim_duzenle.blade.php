@extends('katmanlar.usermaster')
@section('title', 'Toprak Konut - İlan Düzenle')
@section('content')
    <div class="dashboard-container">
    @include('kullanici.sidebar')
    <!-- Dashboard Content
        ================================================== -->
        <div class="dashboard-content-container" data-simplebar>
            <div class="dashboard-content-inner" >

                <!-- Dashboard Headline -->
                <div class="dashboard-headline">
                    <h3>İlan Bilgileri</h3>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="{{route('dashboard')}}">Profilim</a></li>
                            <li><a href="{{route('ilanlarim')}}">İlanlarım</a></li>
                            <li>İlan Düzenle</li>
                        </ul>
                    </nav>
                </div>

                <form action="{{route('ilanlarim.duzenle.kaydet')}}" method="post" id="ilan.duzenle" enctype="multipart/form-data">
                @csrf
                <!-- Row -->
                    <div class="row">


                        <!-- Dashboard Box -->
                        <div class="col-xl-12">
                            <div class="dashboard-box margin-top-0">

                                <!-- Headline -->
                                <div class="headline">
                                    <h3><i class="icon-feather-folder-plus"></i> {{$ilan->baslik}} - Düzenle</h3>
                                    <br>
                                    <h3><i class="icon-feather-map-pin"></i> {{$ilan->il.' / '.$ilan->ilce}} </h3>
                                </div>

                                <div class="content with-padding padding-bottom-10">
                                    <div class="row">

                                        <div class="col-xl-6">
                                            <div class="submit-field">
                                                <h5>Başlık(100 Karakter)</h5>
                                                <input type="text" name="baslik" maxlength="100" class="with-border" value="{{$ilan->baslik}}" required>
                                            </div>
                                        </div>



                                        @if($ilan->durum=='Kiralık' or $ilan->durum=='Devren Kiralık')
                                        @else
                                            <div class="col-xl-3">
                                                <div class="submit-field">
                                                    <h5>Krediye Uygun Mu?</h5>
                                                    <select class="selectpicker with-border" name="kredi" data-size="7" title="Kredi Uygunluğunu Seçiniz" required>

                                                        <option value="1" {{$ilan->kredi==1 ? 'selected' : ''}}>Evet</option>
                                                        <option value="0" {{$ilan->kredi==0 ? 'selected' : ''}}>Hayır</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-xl-3">
                                                <div class="submit-field">
                                                    <h5>Takas İstiyor musunuz?</h5>
                                                    <select class="selectpicker with-border" name="takas" data-size="7" title="Kredi Uygunluğunu Seçiniz" required>

                                                        <option value="1" {{$ilan->takas==1 ? 'selected' : ''}}>Evet</option>
                                                        <option value="0" {{$ilan->takas==0 ? 'selected' : ''}}>Hayır</option>

                                                    </select>
                                                </div>
                                            </div>
                                        @endif


                                        <div class="col-xl-2">
                                            <div class="submit-field">
                                                <h5>Fiyatı</h5>
                                                <div class="input-with-icon">
                                                    <input class="with-border" type="text" name="fiyat" value="{{$ilan->fiyat}}" placeholder="Fiyat">
                                                    <i class="currency">₺</i>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-xl-4">
                                            <div class="submit-field">
                                                <h5>Boyut</h5>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="input-with-icon">
                                                            <input class="with-border" name="brut" value="{{$ilan->brut}}" type="text" placeholder="Brüt">
                                                            <i class="currency">m²</i>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="input-with-icon">
                                                            <input class="with-border" name="net" value="{{$ilan->net}}" type="text" placeholder="Net">
                                                            <i class="currency">m²</i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--KONUT BİLGİLERİ-->
                                        @if($ilan->kategori->master!=null)
                                            @if($ilan->kategori->master->id==1)

                                                <div class="col-xl-12">
                                                    <div class="submit-field">
                                                        <h5>Özellikler</h5>
                                                        <div class="row">
                                                            <div class="col-xl-2">
                                                                <div class="submit-field">
                                                                    <h5>Isıtma*</h5>
                                                                    <select class="selectpicker with-border" name="isitma" data-size="7" title="Isıtma" required>

                                                                        <option value="{{$ilan->isitma}}" selected>{{$ilan->isitma}}</option>
                                                                        <option value="Yok">Yok</option>
                                                                        <option value="Soba">Soba</option>
                                                                        <option value="Doğalgaz Sobası">Doğalgaz Sobası</option>
                                                                        <option value="Kat Kaloriferi">Kat Kaloriferi</option>
                                                                        <option value="Merkezi">Merkezi</option>
                                                                        <option value="Merkezi(Pay Ölçer)">Merkezi(Pay Ölçer)</option>
                                                                        <option value="Doğalgaz (Kombi)">Doğalgaz (Kombi)</option>
                                                                        <option value="Yerden Isıtma">Yerden Isıtma</option>
                                                                        <option value="Fancoil Ünitesi">Fancoil Ünitesi</option>
                                                                        <option value="Güneş Enerjisi">Güneş Enerjisi</option>
                                                                        <option value="Jeotermal">Jeotermal</option>
                                                                        <option value="Şömine">Şömine</option>
                                                                        <option value="VRV">VRV</option>
                                                                        <option value="Isı Pompası">Isı Pompası</option>


                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-2">
                                                                <div class="submit-field">
                                                                    <h5>Banyo Sayısı?</h5>
                                                                    <select class="selectpicker with-border" name="banyo_sayisi" data-size="7" title="Banyo Sayısı Seçiniz" required>
                                                                        <option value="{{$ilan->banyo_sayisi}}" selected>{{$ilan->banyo_sayisi}}</option>
                                                                        <option value="0">Yok</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                        <option value="6">6</option>
                                                                        <option value="6+">6+</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-2">
                                                                <div class="submit-field">
                                                                    <h5>Balkon</h5>
                                                                    <select class="selectpicker with-border" name="balkon" data-size="7" title="Balkonu Var Mı?" required>

                                                                        <option value="Var" {{$ilan->balkon=='Var' ? 'selected' : ''}}>Var</option>
                                                                        <option value="Yok" {{$ilan->balkon=='Yok' ? 'selected' : ''}}>Yok</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-2">
                                                                <div class="submit-field">
                                                                    <h5>Eşyalı</h5>
                                                                    <select class="selectpicker with-border" name="esyali" data-size="7" title="Eşyalı Mı?" required>

                                                                        <option value="Evet" {{$ilan->esyali=='Evet' ? 'selected' : ''}}>Evet</option>
                                                                        <option value="Hayır" {{$ilan->esyali=='Hayır' ? 'selected' : ''}}>Hayır</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-2">
                                                                <h5>Aidat</h5>
                                                                <div class="input-with-icon">
                                                                    <input class="with-border" name="aidat" type="text" value="{{$ilan->aidat}}" placeholder="Aidatı Giriniz">
                                                                    <i class="currency">₺</i>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-2">
                                                                <div class="submit-field">
                                                                    <h5>Site İçinde Mi?</h5>
                                                                    <select class="selectpicker with-border" name="site" data-size="7" title="Seçiniz." required>

                                                                        <option value="Evet" {{$ilan->site=='Evet' ? 'selected' : ''}}>Evet</option>
                                                                        <option value="Hayır" {{$ilan->site=='Hayır' ? 'selected' : ''}}>Hayır</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-2">
                                                    <div class="submit-field">
                                                        <h5>Oda Sayısı</h5>
                                                        <select class="selectpicker with-border" name="oda" data-size="7" title="Oda Sayısını Seçiniz" required>

                                                            @foreach($daireboyut as $entry)
                                                                <option value="{{$entry->id}}" {{$entry->id==$ilan->oda ? 'selected' : ''}}>{{$entry->name}}</option>
                                                                <option value="{{$entry->id}}">{{$entry->name}}</option>
                                                            @endforeach




                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-xl-2">
                                                    <div class="submit-field">
                                                        <h5>Bina Yaşı</h5>
                                                        <div class="input-with-icon">
                                                            <input class="with-border" type="text" value="{{$ilan->yas}}" name="yas" placeholder="Yıl">
                                                            <i class="currency">Yıl</i>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-xl-4">
                                                    <div class="submit-field">
                                                        <h5>Bina Katı</h5>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <div class="input-with-icon">
                                                                    <input class="with-border" name="kat_sayisi" value="{{$ilan->kat_sayisi}}" type="text" placeholder="Bina Kat Sayısı">
                                                                    <i class="currency">Katlı</i>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="input-with-icon">
                                                                    <input class="with-border" name="bulundugu_kat" value="{{$ilan->bulundugu_kat}}" type="text" placeholder="Bulunduğu Kat">
                                                                    <i class="currency">.Kat</i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>






                                            @endif

                                        <!-- İŞYERİ BİLGİLERİ -->
                                            @if($kategoriid==10)
                                                <div class="col-xl-12">
                                                    <div class="submit-field">
                                                        <h5>Özellikler</h5>
                                                        <div class="row">
                                                            <div class="col-xl-2">
                                                                <div class="submit-field">
                                                                    <h5>Isıtma*</h5>
                                                                    <select class="selectpicker with-border" name="isitma" data-size="7" title="Isıtma" required>
                                                                        <option value="{{$ilan->isitma}}" selected>{{$ilan->isitma}}</option>
                                                                        <option value="Yok">Yok</option>
                                                                        <option value="Soba">Soba</option>
                                                                        <option value="Doğalgaz Sobası">Doğalgaz Sobası</option>
                                                                        <option value="Kat Kaloriferi">Kat Kaloriferi</option>
                                                                        <option value="Merkezi">Merkezi</option>
                                                                        <option value="Merkezi(Pay Ölçer)">Merkezi(Pay Ölçer)</option>
                                                                        <option value="Doğalgaz (Kombi)">Doğalgaz (Kombi)</option>
                                                                        <option value="Yerden Isıtma">Yerden Isıtma</option>
                                                                        <option value="Fancoil Ünitesi">Fancoil Ünitesi</option>
                                                                        <option value="Güneş Enerjisi">Güneş Enerjisi</option>
                                                                        <option value="Jeotermal">Jeotermal</option>
                                                                        <option value="Şömine">Şömine</option>
                                                                        <option value="VRV">VRV</option>
                                                                        <option value="Isı Pompası">Isı Pompası</option>


                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-2">
                                                                <div class="submit-field">
                                                                    <h5>Oda Sayısı*</h5>
                                                                    <select class="selectpicker with-border" name="isyeri_oda_sayisi" data-size="7" title="Seçiniz" required>
                                                                        <option value="{{$ilan->isyeri_oda_sayisi}}" selected>{{$ilan->isyeri_oda_sayisi}}</option>
                                                                        <option value="0">Yok</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                        <option value="6">6</option>
                                                                        <option value="6+">6+</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-2">
                                                                <h5>Giriş Yüksekliği*</h5>
                                                                <div class="input-with-icon">
                                                                    <input class="with-border" name="giris_yuksekligi" value="{{$ilan->giris_yuksekligi}}" type="text" placeholder="Yükseklik">
                                                                    <i class="currency">m</i>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-2">
                                                                <h5>Açık Alan*</h5>
                                                                <div class="input-with-icon">
                                                                    <input class="with-border" name="acik_alan" type="text" value="{{$ilan->acik_alan}}" placeholder="Açık Alan">
                                                                    <i class="currency">m²</i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif

                                    <!-- ARSA BİLGİLERİ -->
                                        @if($kategoriid==39)
                                            <div class="col-xl-12">
                                                <div class="submit-field">
                                                    <h5>Özellikler</h5>
                                                    <div class="row">
                                                        <div class="col-xl-2">
                                                            <div class="submit-field">
                                                                <h5>İmar Durumu*</h5>
                                                                <select class="selectpicker with-border" name="imar_durumu" data-size="7" title="Seçiniz" required>

                                                                    @foreach($arsaimar as $entry)
                                                                        <option value="{{$entry->id}}" {{$entry->id==$ilan->imar_durumu ? 'selected' : ''}}>{{$entry->name}}</option>
                                                                    @endforeach



                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-2">
                                                            <h5>Ada No</h5>
                                                            <div class="input-field">
                                                                <input class="with-border" name="ada_no" value="{{$ilan->ada_no}}" type="text" placeholder="Ada No">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-2">
                                                            <h5>Parsel No</h5>
                                                            <div class="input-field">
                                                                <input class="with-border" name="parsel_no" value="{{$ilan->parsel_no}}" type="text" placeholder="Parsel No">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-2">
                                                            <h5>Pafta No</h5>
                                                            <div class="input-field">
                                                                <input class="with-border" name="pafta_no" value="{{$ilan->pafta_no}}" type="text" placeholder="Yükseklik">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-2">
                                                            <div class="submit-field">
                                                                <h5>Kaks (Emsal)</h5>
                                                                <select class="selectpicker with-border" name="kaks" data-size="7" title="Seçiniz" required>
                                                                    <option value="{{$ilan->kaks}}" selected>{{$ilan->kaks}}</option>
                                                                    <option value="0.05">0.05</option>
                                                                    <option value="0.07">0.07</option>
                                                                    <option value="0.10">0.10</option>
                                                                    <option value="0.15">0.15</option>
                                                                    <option value="0.20">0.20</option>
                                                                    <option value="0.25">0.25</option>
                                                                    <option value="0.30">0.30</option>
                                                                    <option value="0.35">0.35</option>
                                                                    <option value="0.40">0.40</option>
                                                                    <option value="0.45">0.45</option>
                                                                    <option value="0.50">0.50</option>
                                                                    <option value="0.60">0.60</option>
                                                                    <option value="0.70">0.70</option>
                                                                    <option value="0.80">0.80</option>
                                                                    <option value="0.90">0.90</option>
                                                                    <option value="1.00">1.00</option>
                                                                    <option value="1.05">1.05</option>
                                                                    <option value="1.07">1.07</option>
                                                                    <option value="1.10">1.10</option>
                                                                    <option value="1.15">1.15</option>
                                                                    <option value="1.20">1.20</option>
                                                                    <option value="1.25">1.25</option>
                                                                    <option value="1.30">1.30</option>
                                                                    <option value="1.35">1.35</option>
                                                                    <option value="1.40">1.40</option>
                                                                    <option value="1.45">1.45</option>
                                                                    <option value="1.50">1.50</option>
                                                                    <option value="1.60">1.60</option>
                                                                    <option value="1.70">1.70</option>
                                                                    <option value="1.80">1.80</option>
                                                                    <option value="1.90">1.90</option>
                                                                    <option value="2.00-3.00">2.00-3.00</option>
                                                                    <option value="3.20-10.50">3.20-10.50</option>
                                                                    <option value="Diğer">Diğer</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-2">
                                                            <div class="submit-field">
                                                                <h5>Gabari</h5>
                                                                <select class="selectpicker with-border" name="gabari" data-size="7" title="Seçiniz" required>
                                                                    <option value="{{$ilan->gabari}}" selected>{{$ilan->gabari}}</option>
                                                                    <option value="3.5">3.5</option>
                                                                    <option value="6.5">6.5</option>
                                                                    <option value="8.5">8.5</option>
                                                                    <option value="9.5">9.5</option>
                                                                    <option value="11.5">11.5</option>
                                                                    <option value="12.5">12.5</option>
                                                                    <option value="14.5">14.5</option>
                                                                    <option value="15.5">15.5</option>
                                                                    <option value="18.5">18.5</option>
                                                                    <option value="21.5">21.5</option>
                                                                    <option value="24.5">24.5</option>
                                                                    <option value="27.5">27.5</option>
                                                                    <option value="30.5">30.5</option>
                                                                    <option value="36.5">36.5</option>
                                                                    <option value="Diğer">Diğer</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-2">
                                                            <div class="submit-field">
                                                                <h5>Tapu Durumu</h5>
                                                                <select class="selectpicker with-border" name="tapu_durumu" data-size="7" title="Seçiniz" required>

                                                                    <option value="{{$ilan->tapu_durumu}}" selected>{{$ilan->tapu_durumu}}</option>
                                                                    <option value="Hisseli Tapu">Hisseli Tapu</option>
                                                                    <option value="Müstakil Parsel">Müstakil Parsel</option>
                                                                    <option value="Tahsis">Tahsis</option>
                                                                    <option value="Zilliyet">Zilliyet</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-2">
                                                            <div class="submit-field">
                                                                <h5>Kat Karşılığı</h5>
                                                                <select class="selectpicker with-border" name="kat_karsiligi" data-size="7" title="Seçiniz" required>

                                                                    <option value="Evet" {{$ilan->kat_karsiligi=='Evet' ? 'selected' : ''}}>Evet</option>
                                                                    <option value="Hayır" {{$ilan->kat_karsiligi=='Hayır' ? 'selected' : ''}}>Hayır</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>


                                    <!--  <div class="col-xl-4">
                                          <div class="submit-field">
                                              <h5>Tags <span>(optional)</span>  <i class="help-icon" data-tippy-placement="right" title="Maximum of 10 tags"></i></h5>
                                              <div class="keywords-container">
                                                  <div class="keyword-input-container">
                                                      <input type="text" class="keyword-input with-border" placeholder="e.g. job title, responsibilites"/>
                                                      <button class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
                                                  </div>
                                                  <div class="keywords-list"></div>
                                                  <div class="clearfix"></div>
                                              </div>

                                          </div>
                                      </div>-->

                                    <div class="col-xl-12">
                                        <div class="submit-field">
                                            <h5>İlan Açıklaması</h5>
                                            <textarea name="aciklama" cols="30" rows="5" class="with-border">{{$ilan->aciklama}}</textarea>

                                            <div class="uploadButton margin-top-30">

                                                <input class="uploadButton-input" name="images[]" type="file" accept="image/*" id="upload" multiple/>
                                                <label class="uploadButton-button ripple-effect" for="upload">Resim Ekle</label>
                                                <span class="uploadButton-file-name">Tekrar resim yüklenirse eski resimler silinir!</span>
                                            </div>
                                        </div>
                                    </div>
                                    @if(isset($ilan->resim))
                                        <div class="row">
                                            @foreach($ilan->resim as $res)
                                                <div class="col-xl-2">

                                                    <button type="button" onclick="deleteSales('/profilim/ilanlarim-resim-sil/{{$res->id}}')" class="item-image" title="Sil" data-tippy-placement="top"><img src="/upload/image/ilan/{{$res->resim}}" alt="" height="200 px"></button>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                    <div class="row">
                                        <p><strong>Resimleri silmek için üzerine tıklayınız</strong></p>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>

                <div class="col-xl-12">
                    <input type="hidden" name="ilan_id" value="{{$ilan->id}}">
                    <button type="submit" form="ilan.duzenle" class="button  ripple-effect move-on-hover full-width margin-top-30" >Güncelle</button>
                </div>
                </form>


            <!-- Row / End -->





        <!-- Row / End -->
        <!-- Footer -->
    @include('kullanici.copyright')
    <!-- Footer / End -->

    </div>
    </div>
    <!-- Dashboard Content / End -->

    </div>
    <!-- Dashboard Container / End -->
@endsection
@section('footer')
    <script>
        $('#category-tabs li a').click(function(){
            $(this).next('ul').slideToggle('500');
            $(this).find('i').toggleClass('fa-minus fa-plus ')
        });
    </script>

    <script>
            $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

            function deleteSales(url) {
            if(confirm('Resmi silmek istediğinize emin misiniz?')) {
            $.ajax({
            type: "DELETE",
            url: url,
            success: function(result) {
            location.reload();
        }
        });
        }
        }
    </script>
@endsection
