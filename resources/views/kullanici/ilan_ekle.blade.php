@extends('katmanlar.usermaster')
@section('title', 'Toprak Konut - İlan Ekle')
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
                            <li>İlan Ekle</li>
                        </ul>
                    </nav>
                </div>


                <!-- Row -->
                <div class="row">

                    <form action="{{route('ilan.kaydet')}}" method="post" id="snackbar-place-bid" enctype="multipart/form-data">
                        @csrf
                    <!-- Dashboard Box -->
                    <div class="col-xl-12">
                        <div class="dashboard-box margin-top-0">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-feather-folder-plus"></i> {{$kategori->name}} İlanı Ekle</h3>
                                <br>
                                <h3><i class="icon-feather-map-pin"></i> {{$sehir->name.' / '.$ilce->semt.' - '.$ilce->mahalle}} </h3>
                            </div>

                            <div class="content with-padding padding-bottom-10">
                                <div class="row">





                                    @if($kategoriid==39 or $kategoriid==40 or $kategoriid==41)
                                    <div class="col-xl-12">
                                            <div class="submit-field">
                                                <h5>Başlık(100 Karakter)</h5>
                                                <input type="text" name="baslik" maxlength="100" class="with-border" required>
                                            </div>
                                        </div>
                                    @else
                                    <div class="col-xl-6">
                                            <div class="submit-field">
                                                <h5>Başlık(100 Karakter)</h5>
                                                <input type="text" name="baslik" maxlength="100" class="with-border" required>
                                            </div>
                                        </div>
                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>Kategori</h5>
                                            <select class="selectpicker with-border" name="kategori" data-size="7" title="İlan Kategorisi Seçiniz">
                                                @foreach($altkategori as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endif


                                    @if($durum==2 or $durum==4)
                                        @else
                                    <div class="col-xl-3">
                                        <div class="submit-field">
                                            <h5>Krediye Uygun Mu?</h5>
                                            <select class="selectpicker with-border" name="kredi" data-size="7" title="Kredi Uygunluğunu Seçiniz" required>

                                                <option value="1">Evet</option>
                                                <option value="0">Hayır</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-3">
                                        <div class="submit-field">
                                            <h5>Takas İstiyor musunuz?</h5>
                                            <select class="selectpicker with-border" name="takas" data-size="7" title="Kredi Uygunluğunu Seçiniz" required>

                                                <option value="1">Evet</option>
                                                <option value="0">Hayır</option>

                                            </select>
                                        </div>
                                    </div>
                                        @endif


                                    <div class="col-xl-2">
                                        <div class="submit-field">
                                            <h5>Fiyatı</h5>
                                            <div class="input-with-icon">
                                                <input class="with-border" type="text" name="fiyat" placeholder="Fiyat">
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
                                                        <input class="with-border" name="brut" type="text" placeholder="Brüt">
                                                        <i class="currency">m²</i>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="input-with-icon">
                                                        <input class="with-border" name="net" type="text" placeholder="Net">
                                                        <i class="currency">m²</i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--KONUT BİLGİLERİ-->
                                    @if($kategoriid==1)



                                        <div class="col-xl-12">
                                            <div class="submit-field">
                                                <h5>Özellikler</h5>
                                                <div class="row">
                                                    <div class="col-xl-2">
                                                        <div class="submit-field">
                                                            <h5>Isıtma*</h5>
                                                            <select class="selectpicker with-border" name="isitma" data-size="7" title="Isıtma" required>

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

                                                                <option value="Var">Var</option>
                                                                <option value="Yok">Yok</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-2">
                                                        <div class="submit-field">
                                                            <h5>Eşyalı</h5>
                                                            <select class="selectpicker with-border" name="esyali" data-size="7" title="Eşyalı Mı?" required>

                                                                <option value="Evet">Evet</option>
                                                                <option value="Hayır">Hayır</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-2">
                                                        <div class="input-with-icon">
                                                            <h5>Aidat</h5>
                                                            <input class="with-border" name="aidat" type="text" placeholder="Aidatı Giriniz">
                                                            <i class="currency">₺</i>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-2">
                                                        <div class="submit-field">
                                                            <h5>Site İçinde Mi?</h5>
                                                            <select class="selectpicker with-border" name="site" data-size="7" title="Seçiniz." required>

                                                                <option value="Evet">Evet</option>
                                                                <option value="Hayır">Hayır</option>

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
                                                    <option value="{{$entry->id}}">{{$entry->name}}</option>
                                                    @endforeach




                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-xl-2">
                                            <div class="submit-field">
                                                <h5>Bina Yaşı</h5>
                                                <div class="input-with-icon">
                                                    <input class="with-border" type="text" name="yas" placeholder="Yıl">
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
                                                            <input class="with-border" name="kat_sayisi" type="text" placeholder="Bina Kat Sayısı">
                                                            <i class="currency">Katlı</i>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="input-with-icon">
                                                            <input class="with-border" name="bulundugu_kat" type="text" placeholder="Bulunduğu Kat">
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
                                                            <input class="with-border" name="giris_yuksekligi" type="text" placeholder="Yükseklik">
                                                            <i class="currency">m</i>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-2">
                                                        <h5>Açık Alan*</h5>
                                                        <div class="input-with-icon">
                                                            <input class="with-border" name="acik_alan" type="text" placeholder="Açık Alan">
                                                            <i class="currency">m²</i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                                                <option value="{{$entry->id}}">{{$entry->name}}</option>
                                                                @endforeach



                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-2">
                                                        <h5>Ada No</h5>
                                                        <div class="input-field">
                                                            <input class="with-border" name="ada_no" type="text" placeholder="Ada No">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-2">
                                                        <h5>Parsel No</h5>
                                                        <div class="input-field">
                                                            <input class="with-border" name="parsel_no" type="text" placeholder="Parsel No">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-2">
                                                        <h5>Pafta No</h5>
                                                        <div class="input-field">
                                                            <input class="with-border" name="pafta_no" type="text" placeholder="Yükseklik">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-2">
                                                        <div class="submit-field">
                                                            <h5>Kaks (Emsal)</h5>
                                                            <select class="selectpicker with-border" name="kaks" data-size="7" title="Seçiniz" required>

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

                                                                <option value="Evet">Evet</option>
                                                                <option value="Hayır">Hayır</option>

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
                                            <textarea name="aciklama" cols="30" rows="5" class="with-border"></textarea>
                                            <div class="uploadButton margin-top-30">
                                                <input class="uploadButton-input" name="images[]" type="file" accept="image/*" id="upload" multiple/>
                                                <label class="uploadButton-button ripple-effect" for="upload">Resimleri Yükleyin</label>
                                                <span class="uploadButton-file-name">Resimler ilanınızı ön plana çıkarır!</span>
                                            </div>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        @if($kategoriid==39 or $kategoriid==40 or $kategoriid==41)
                            <input type="hidden" name="kategori" value="{{$kategoriid}}">
                        @endif
                        <input type="hidden" name="sehir" value="{{$sehir->id}}">
                        <input type="hidden" name="ilce" value="{{$ilce->id}}">
                        <input type="hidden" name="durum" value="{{$durum}}">
                            <input type="hidden" id="cityLat" name="cityLat" value="{{$lat}}" />
                            <input type="hidden" id="cityLng" name="cityLng" value="{{$long}}" />
                            <input type="submit" id="snackbar-place-bid" class="button  ripple-effect move-on-hover full-width margin-top-30" onsubmit="this.disabled=true;this.value='Lütfen Bekleyiniz...'; this.form.submit();" value="İlanı Ekle">
                    </div>
                    </form>
                </div>
                <!-- Row / End -->



                </div>
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
        const INPUT_FILE = document.querySelector("#upload-files");
        const INPUT_CONTAINER = document.querySelector("#upload-container");
        const FILES_LIST_CONTAINER = document.querySelector("#files-list-container");
        const FILE_LIST = [];
        let UPLOADED_FILES = [];

        const multipleEvents = (element, eventNames, listener) => {
            const events = eventNames.split(" ");

            events.forEach(event => {
                element.addEventListener(event, listener, false);
            });
        };

        const previewImages = () => {
            FILES_LIST_CONTAINER.innerHTML = "";
            if (FILE_LIST.length > 0) {
                FILE_LIST.forEach((addedFile, index) => {
                    const content = `
        <div class="form2__image-container js-remove-image" data-index="${index}">
          <img class="form2__image" src="${addedFile.url}" alt="${addedFile.name}">
        </div>
      `;

                    FILES_LIST_CONTAINER.insertAdjacentHTML("beforeEnd", content);
                });
            } else {
                console.log("empty");
                INPUT_FILE.value = "";
            }
        };

        const fileUpload = () => {
            if (FILES_LIST_CONTAINER) {
                multipleEvents(INPUT_FILE, "click dragstart dragover", () => {
                    INPUT_CONTAINER.classList.add("active");
                });

                multipleEvents(INPUT_FILE, "dragleave dragend drop change blur", () => {
                    INPUT_CONTAINER.classList.remove("active");
                });

                INPUT_FILE.addEventListener("change", () => {
                    const files = [...INPUT_FILE.files];
                    console.log("changed");
                    files.forEach(file => {
                        const fileURL = URL.createObjectURL(file);
                        const fileName = file.name;
                        if (!file.type.match("image/")) {
                            alert(file.name + " is not an image");
                            console.log(file.type);
                        } else {
                            const uploadedFiles = {
                                name: fileName,
                                url: fileURL };


                            FILE_LIST.push(uploadedFiles);
                        }
                    });

                    console.log(FILE_LIST); //final list of uploaded files
                    previewImages();
                    UPLOADED_FILES = document.querySelectorAll(".js-remove-image");
                    removeFile();
                });
            }
        };

        const removeFile = () => {
            UPLOADED_FILES = document.querySelectorAll(".js-remove-image");

            if (UPLOADED_FILES) {
                UPLOADED_FILES.forEach(image => {
                    image.addEventListener("click", function () {
                        const fileIndex = this.getAttribute("data-index");

                        FILE_LIST.splice(fileIndex, 1);
                        previewImages();
                        removeFile();
                    });
                });
            } else {
                [...INPUT_FILE.files] = [];
            }
        };

        fileUpload();
        removeFile();
    </script>
@endsection
