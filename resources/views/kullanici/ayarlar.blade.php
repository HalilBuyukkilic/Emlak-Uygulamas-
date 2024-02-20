@extends('katmanlar.usermaster')
@section('title', 'Profil Ayarları')
@section('content')
    <!-- Dashboard Container -->
    <div class="dashboard-container">

        @include('kullanici.sidebar')


        <!-- Dashboard Content
        ================================================== -->
        <div class="dashboard-content-container" data-simplebar>
            <div class="dashboard-content-inner" >

                <!-- Dashboard Headline -->
                <div class="dashboard-headline">
                    <h3>Hesap Ayarları</h3>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="#">Profilim</a></li>
                            <li>Hesap Ayarları</li>
                        </ul>
                    </nav>
                </div>

                <!-- Row -->
                <form action="{{route('ayarlar.kaydet')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="row">

                    @include('katmanlar.menu.alert')
                    <!-- Dashboard Box -->
                    <div class="col-xl-12">
                        <div class="dashboard-box margin-top-0">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-material-outline-account-circle"></i> Genel Bilgilerim</h3>
                            </div>

                            <div class="content with-padding padding-bottom-0">

                                <div class="row">


                                    <div class="col-auto">
                                        <div class="avatar-wrapper" data-tippy-placement="bottom" title="Resminizi Değiştirin">
                                            <img class="profile-pic" src="/upload/image/users/{{$user->pp}}" alt="" />
                                            <div class="upload-button"></div>
                                            <input class="file-upload" name="pp" type="file" accept="image/*"/>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>İsim</h5>
                                                    <input type="text" class="with-border" name="name" value="{{$user->name}}">
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>Soyisim</h5>
                                                    <input type="text" class="with-border" name="surname" value="{{$user->surname}}">
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <!-- Account Type -->
                                                <div class="submit-field">
                                                    <h5>Hesap Tipiniz</h5>
                                                    <div class="account-type">
                                                        @if($user->hizmetveren==1)
                                                        <div>
                                                            <input type="radio" name="account-type-radio" id="freelancer-radio" class="account-type-radio" checked disabled/>
                                                            <label for="freelancer-radio" class="ripple-effect-dark"><i class="icon-material-outline-account-circle"></i> Hizmet Veren</label>
                                                        </div>

                                                        @else
                                                            <div>
                                                                <input type="radio" name="account-type-radio" id="employer-radio" class="account-type-radio" checked disabled/>
                                                                <label for="employer-radio" class="ripple-effect-dark"><i class="icon-material-outline-business-center"></i> Hizmet Alan</label>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>E-Posta</h5>
                                                    @if($user->onaylandi_mi==0)
                                                    <input type="text" class="with-border" name="email" value="{{$user->email}}">
                                                    @else
                                                        <input type="text" class="with-border" value="{{$user->email}}" disabled>
                                                    @endif
                                                </div>
                                            </div>
                                            @if($user->hizmetveren==0)
                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>T.C Kimlik Numarası</h5>
                                                    <input type="text" class="with-border" value="{{$user->tcno}}" disabled>
                                                </div>
                                            </div>
                                                <div class="col-xl-6">
                                                    <div class="submit-field">
                                                        <h5>Hizmet Alacağınız İl</h5>
                                                        <select name="il" class="selectpicker with-border" data-size="7" title="Lütfen Hizmet Alacağınız İli Seçiniz" data-live-search="true">
                                                            <option value="{{$user->adres}}" selected>{{$user->adres}}</option>
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
                                                @endif



                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    @if($user->hizmetveren==2)
                    <!-- Dashboard Box -->
                    <div class="col-xl-12">
                        <div class="dashboard-box">
                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-material-outline-face"></i> Hizmet Veren Ayarları <button title="Hesabınız Doğrulandığında Bu Alanları Değiştiremezsiniz. Değiştirmek için iletişim sayfasından iletişime geçebilirsiniz." data-tippy-placement="top"><i class="icon-material-outline-info"></i></button> </h3>
                            </div>
                            <div class="content">
                                <ul class="fields-ul">
                                    <li>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="submit-field">
                                                    <h5>Hizmet Vereceğiniz Kategoriler <i class="help-icon" data-tippy-placement="right" title="10 Kategoriye Kadar Seçebilirsiniz"></i></h5>
                                                    <!-- Skills List -->
                                                    <div class="keywords-container">
                                                        <div class="keyword-input-container">
                                                            <label for="kategoriler"></label>
                                                            <select name="kategoriler[]" class="selectpicker" data-size="7" required multiple data-live-search="true">
                                                                @foreach($kategoriler as $cat)
                                                                    @if($cat->master_id==null)
                                                                        <option value="" disabled>{{$cat->name}}</option>
                                                                    @else
                                                                        <option value="{{$cat->id}}" {{ collect(old('kategoriler', $user_kategorileri))->contains($cat->id) ? 'selected' : '' }}>{{$cat->name}}</option>
                                                                        @endif


                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                        <!--gerekirse diye yükleme
                                            <div class="col-xl-4">
                                                <div class="submit-field">
                                                    <h5>Attachments</h5>


                                                    <div class="attachments-container margin-top-0 margin-bottom-0">
                                                        <div class="attachment-box ripple-effect">
                                                            <span>Cover Letter</span>
                                                            <i>PDF</i>
                                                            <button class="remove-attachment" data-tippy-placement="top" title="Remove"></button>
                                                        </div>
                                                        <div class="attachment-box ripple-effect">
                                                            <span>Contract</span>
                                                            <i>DOCX</i>
                                                            <button class="remove-attachment" data-tippy-placement="top" title="Remove"></button>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>


                                                    <div class="uploadButton margin-top-0">
                                                        <input class="uploadButton-input" type="file" accept="image/*, application/pdf" id="upload" multiple/>
                                                        <label class="uploadButton-button ripple-effect" for="upload">Upload Files</label>
                                                        <span class="uploadButton-file-name">Maximum file size: 10 MB</span>
                                                    </div>

                                                </div>
                                            </div>
                            -->
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="submit-field">
                                                    <h5>Hizmet Verdiğiniz İl</h5>
                                                    <select name="il" class="selectpicker with-border" data-size="7" title="Lütfen Hizmet Vereceğiniz İli Seçiniz" data-live-search="true">
                                                        <option value="{{$user->adres}}" selected>{{$user->adres}}</option>
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

                                            <div class="col-xl-12">
                                                <div class="submit-field">
                                                    <h5>Kendinizi veya Şirketinizi Tanıtın</h5>
                                                    <textarea cols="30" name="bio" rows="5" class="with-border" required>{{$user->bio}}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @elseif($user->hizmetveren==1)
                        <!-- Dashboard Box -->
                            <div class="col-xl-12">
                                <div class="dashboard-box">
                                    <!-- Headline -->
                                    <div class="headline">
                                        <h3><i class="icon-material-outline-face"></i> Hizmet Veren Oldunuz <button title="Hesabınız Doğrulandığı için bu ayarları değiştiremezsiniz." data-tippy-placement="top"><i class="icon-material-outline-info"></i></button> </h3>
                                    </div>
                                    <div class="content">
                                        <div class="col-xl-12 col-md-12 margin-top-10 margin-bottom-10">
                                        <ul class="list-1">
                                            <li>Tebrikler {{$user->name}}! Hesabınız Onaylandı</li>
                                            <li>Hizmet Veren bilgilerini değiştirmek, kategori değişikliği yapmak için bize mail veya iletişim sayfasından ulaşabilirsiniz.</li>

                                        </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    <!-- Dashboard Box -->
                    <div class="col-xl-12">
                        <div id="test1" class="dashboard-box">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-material-outline-lock"></i> Şifre Değiştir</h3>
                            </div>

                            <div class="content with-padding">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <input type="password" class="with-border" placeholder="Eski Şifreniz" name="old_password">
                                    </div>
                                    <div class="col-xl-12">
                                        <input type="password" class="with-border" placeholder="Yeni Şifreniz" name="password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="col-xl-12">
                        <button class="button ripple-effect big margin-top-30" type="submit">Kaydet</button>
                    </div>

                </div>
                </form>
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

