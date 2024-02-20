@extends('katmanlar.master')
@section('title', 'Toprak Konut - '.$kategori->name)
@section('meta', 'Toprak Konut | '.$kategori->meta)
@section('content')
    <script>
        soruAdediMin=[];
        soruAdediMax=[];
    </script>
    <section>
        <div class="banner-1 cover-image sptb-2 sptb-tab bg-background2 @if($altkategoriler==null) fullheight @endif " data-image-src="

            /images/hizmet.jpg


            ">
            <div class="header-text mb-0">
                <div class="container">

                    @include('katmanlar.menu.alert')
                    @include('katmanlar.menu.error')
                    <div class="text-left text-white mb-7">
                        <a href="" class="typewrite" data-period="2000" data-type='[ "{{$kategori->name}}" ]'>
                            <span class="wrap"></span>
                        </a>
                        <p>{{$kategori->meta}}</p>
                    </div>
                    @if($kategori->master_id!=null)
                    <div class="col-md-4">
                        <div class="text-left text-white mb-7">

                            <a href="#" data-toggle="modal" data-target="#sorular" class="btn btn-lg btn-block btn-primary"> <i class="fa fa-user"></i> Hemen Hizmet Al</a>

                        </div>
                    </div>

                    <div class="text-left text-white">
                        <a href="" class="typewrite" data-period="2000" data-type='[ "ya da" ]'>
                            <span class="wrap"></span>

                        </a>
                        <p>Aramaya Devam Et:</p>
                    </div>
                    @else
                        <div class="text-left text-white">

                            <p>{{$kategori->name}} kategorisinde arama yapın:</p>
                        </div>
                        @endif

                    <!-- ARAMA -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="search-background bg-transparent">
                                <form action="{{route('hizmet.kategori.tumu')}}" method="get" >
                                    @csrf
                                    <div class="form row no-gutters " >

                                        <div class="form-group  col-xl-4 col-lg-4 col-md-12 mb-0 bg-white ">
                                            <input type="text" class="form-control input-lg br-tr-md-0 br-br-md-0" id="text4" name="aranan" placeholder="Aradığınız hizmeti giriniz...">
                                        </div>

                                        <div class="col-xl-2 col-lg-3 col-md-12 mb-0">
                                            <button type="submit" class="btn btn-lg btn-block btn-primary br-tl-md-0 br-bl-md-0">Ara</button>
                                        </div>
                                        <div class="form-group  col-xl-2 col-lg-1 col-md-12 mb-0">

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    @if($altkategoriler!=null)
                    <section class="sptb">
                        <div class="container">
                            <div class="section-title center-block text-center">
                                <h2>{{$kategori->name}} Popüler Kategorileri</h2>
                            </div>
                            <div class="row">
                                @foreach($altkategoriler as $entry)
                                    <div class="col-lg-4 col-md-12 col-xl-4" style="color: black">
                                        <div class="card">
                                            <div class="item-card2-img">
                                                <a href="{{route('hizmet.kategori', $entry->slug)}}"></a>
                                                <img src="/upload/image/kategori/{{$entry->resim}}" alt="{{$entry->name}}" class="cover-image">
                                            </div>
                                            <div class="card-body">
                                                <div class="item-card2">
                                                    <div class="item-card2-desc">
                                                        <h4 class="font-weight-semibold mb-5">{{$entry->name}}</h4>
                                                            <a href="#" class="btn btn-primary text-center">{{count($entry->hizmet)}} Tamamlanan Hizmet</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                        @endif

                </div>
            </div><!-- /header-text -->
        </div>
    </section>

    <!-- SORULAR MODAL -->
    <div class="modal fade" id="sorular" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Hizmet İlanı Ekle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form id="regForm" action="{{route('hizmet.ekle', $kategori->slug)}}">
                        <div class="row" >
                            <div class="col-md-12 mb-5">
                                <h4 class="text-right fiyat">Tahmini Tutar: {{$kategori->min}} - {{$kategori->max}} ₺ </h4>
                            </div>
                        </div>


                        <input type="hidden" name="yonlendirmeli">


                    @php($k=1)

                    <!-- SORULAR -->


                        @if(count($sorular)>0)
                        @foreach($sorular as $entry)
                            <!-- CEVAP DEĞERLERİ -->
                                @php($i=0)

                            <div class="tab">
                                <div class="row">
                                    <div class="col-md-12" id="soru_{{$k}}">
                                        <h3>{{json_decode($entry->json)->soru}}</h3>
                                        <input type="hidden" name="soru_{{$k}}"  value="{{json_decode($entry->json)->soru}}">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="select-country  mt-6 mb-7">
                                            @php($minimums = json_decode($entry->min))
                                            @php($maximums = json_decode($entry->max))


                                            <select class="form-control select2-search selectquestion" data-questionid="{{$k}}" name="cevap_{{$k}}">
                                                <option data-minfiyat="0" data-maxfiyat="0" value="-1">Seçiniz</option>
                                                @foreach(json_decode($entry->json)->cevap as $item)

                                                    <option data-minfiyat="{{$minimums[$i]}}" data-maxfiyat="{{$maximums[$i]}}" value="{{$item}}">{{$item}}</option>
                                                    @php($i++)
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                soruAdediMin.push(0);
                                soruAdediMax.push(0);
                            </script>
                            @php($min = $entry->min)
                            @php($max = $entry->max)


                            @php($k++)
                        @endforeach
                        @endif
                    <!-- TAHMİNİ BÜTÇE -->
                        <div class="tab">
                            <div class="row">
                                <div class="col-md-12 mb-5">
                                    <h3>Tahmini Bütçenizi Giriniz</h3>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group mb-5">
                                        <input type="number" class="form-control br-tl-3  br-bl-3" name="butce" placeholder="Örneğin: 1000">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- HİZMET DETAYLARI -->
                        <div class="tab">
                            <div class="row">
                                <div class="col-md-12 mb-5">
                                    <h3>Hizmet Detaylarını Yazabilirsiniz.</h3>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group mb-5">
                                        <textarea type="text" class="form-control" name="aciklama"> </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- HİZMET KONUMU -->
                        <div class="tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Hizmet Alacağınız İli Seçiniz</h3>
                                </div>
                                <div class="col-md-12">
                                    <div class="select-country  mt-6 mb-7">
                                        <select class="form-control select2-search" data-size="7" name="il">
                                            @auth()
                                            <option value="{{$user->adres}}" selected>{{$user->adres}}</option>
                                            @endauth
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
                                </div>
                            </div>
                        </div>

                        @guest()
                            <div class="tab">
                                <div class="row">
                                    <div class="col-md-12 mb-5">
                                        <h3>E-Posta Adresiniz</h3>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group mb-5">
                                            <input type="email" class="form-control br-tl-3  br-bl-3" name="email" placeholder="E-Posta Adresinizi Giriniz">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab">
                                <div class="row">
                                    <div class="col-md-12 mb-5">
                                        <h3>Adınız Soyadınız</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-5">
                                            <input type="text" class="form-control br-tl-3  br-bl-3" name="name" placeholder="Adınızı Giriniz">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-5">
                                            <input type="text" class="form-control br-tl-3  br-bl-3" name="surname" placeholder="Soyadınızı Giriniz">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab">
                                <div class="row">
                                    <div class="col-md-12 mb-5">
                                        <h3>Şifrenizi Belirleyin:</h3>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group mb-5">
                                            <input type="password" class="form-control br-tl-3  br-bl-3" name="password" placeholder="Şifrenizi Giriniz">
                                        </div>
                                        <div class="input-group mb-5">
                                            <input type="password" class="form-control br-tl-3  br-bl-3" name="password_confirmation" placeholder="Şifrenizi Tekrar Giriniz">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endguest

                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button class="btn btn-success" type="button" id="prevBtn" onclick="nextPrev(-1);">Geri</button>
                                <button class="btn btn-success" type="button" id="nextBtn" onclick="nextPrev(1);">İleri</button>
                            </div>
                        </div>

                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:80px;">
                            @if(count($sorular)>0)
                            @foreach($sorular as $entry)
                                <span class="step"></span>
                            @endforeach
                            @endif
                            @guest()
                                    <span class="step"></span>
                                    <span class="step"></span>
                                    <span class="step"></span>
                                @endguest
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"  data-dismiss="modal">İptal Et</button>
                </div>
            </div>
        </div>
    </div>

    @endsection
@section('footer')

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab







        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Gönder";
            } else {
                document.getElementById("nextBtn").innerHTML = "İlerle";
            }
            // ... and run a function that displays the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {

            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false:
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class to the current step:
            x[n].className += " active";
        }


        $('.selectquestion').change(function(){

                debugger;

            var topla=0;
            var toplaMin = {{$kategori->min}};
            var toplaMax = {{$kategori->max}};


            var soru = $(this);
            var soruId =  soru.data('questionid');



            var minfiyat = soru.find(':selected').data('minfiyat'); // $(this).find(':selected').attr('data-minfiyat');
            var maxfiyat = soru.find(':selected').data('maxfiyat');
            soruAdediMin[soruId]=minfiyat;
            soruAdediMax[soruId]=maxfiyat;


            for (let i = 0; i < soruAdediMin.length; i++) {
                if (soruAdediMin[i] != undefined && parseFloat(soruAdediMin[i])>0)
                    toplaMin += parseFloat(soruAdediMin[i]);
            }
            for (let i = 0; i < soruAdediMax.length; i++) {
                if (soruAdediMax[i] != undefined && parseFloat(soruAdediMax[i])>0)
                    toplaMax += parseFloat(soruAdediMax[i]);
            }

                $('.fiyat').text("Tahmini Tutar: "+toplaMin+" - "+toplaMax+" ₺");

        });
    </script>
@endsection
