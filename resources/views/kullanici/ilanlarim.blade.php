@extends('katmanlar.usermaster')
@section('title', 'Toprak Konut - İlanlarım')
@section('content')
    <!-- Dashboard Container -->
    <div class="dashboard-container">

        <!-- Dashboard Sidebar
        ================================================== -->
    @include('kullanici.sidebar')
        <!-- Dashboard Sidebar / End -->


        <!-- Dashboard Content
        ================================================== -->
        <div class="dashboard-content-container" data-simplebar>
            <div class="dashboard-content-inner" >

                <!-- Dashboard Headline -->
                <div class="dashboard-headline">
                    <h3>İlanlarınız</h3>



                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="{{route('dashboard')}}">Profilim</a></li>
                            <li>İlanlarım</li>
                        </ul>
                    </nav>
                </div>
            @include('katmanlar.menu.alert')
                <!-- Row -->
                <div class="row">

                    <!-- Dashboard Box -->
                    <div class="col-xl-12">
                        <div class="dashboard-box margin-top-0">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-material-outline-business-center"></i> İlan Listesi</h3>
                            </div>

                            <div class="content">
                                <ul class="dashboard-box-list">

                                    @foreach($user->ilan as $entry)
                                    <li>
                                        <!-- Job Listing -->
                                        <div class="job-listing">

                                            <!-- Job Listing Details -->
                                            <div class="job-listing-details">

                                                <!-- Logo -->
                                                <a href="{{route('ilan', $entry->slug)}}" class="job-listing-company-logo">
                                                    @if($entry->resim->first()!=null)
                                                <img src="/upload/image/ilan/{{$entry->resim->first()->resim}}" alt="">
                                                        @endif
                                                </a>

                                                <!-- Details -->
                                                <div class="job-listing-description">
                                                    <h3 class="job-listing-title"><a href="{{route('ilan', $entry->slug)}}">{{$entry->baslik}}</a>
                                                        @if($entry->onaylandi_mi==0)
                                                        <span class="dashboard-status-button red">Onay Bekleniyor</span>
                                                        @else
                                                            <span class="dashboard-status-button green">Onaylandı</span>
                                                            @endif
                                                            @if($entry->kalin_baslik==1)
                                                            <span class="dashboard-status-button green">- Kalın Başlık -</span>
                                                        @endif
                                                            @if($entry->one_cikanlar==1)
                                                                    <span class="dashboard-status-button green"> - Öne Çıkanlar -</span>
                                                            @endif
                                                            @if($entry->acil_acil==1)
                                                                            <span class="dashboard-status-button green">- ACİL ACİL! -</span>
                                                        @endif
                                                        </h3>

                                                    <!-- Job Listing Footer -->
                                                    <div class="job-listing-footer">
                                                        <ul>
                                                            <li><i class="icon-material-outline-date-range"></i> {{ \Carbon\Carbon::parse($entry->created_at)->format('d/m/Y') }}</li>
                                                            <li><i class="icon-material-outline-folder"></i> {{$entry->kategori->name}}</li>
                                                            <li><i class="icon-material-outline-location-city"></i> {{$entry->il.' / '.$entry->ilce}}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Buttons -->
                                        <div class="buttons-to-right always-visible">
                                            <form action="{{route('ilanlarim.duzenle')}}"method="post" id="ilan_duzenle_{{$entry->id}}">
                                                @csrf
                                                <input type="hidden" name="ilan_id" value="{{$entry->id}}">
                                            </form>
                                            <button type="submit" form="ilan_duzenle_{{$entry->id}}" class="button ripple-effect"><i class="icon-feather-edit"></i> İlanı Düzenle</button>

                                            <button type="submit" class="button gray ripple-effect ico" title="Sil" data-tippy-placement="top"><i class="icon-feather-trash-2"></i></button>

                                        </div>
                                        <a href="#small-dialog-3_{{$entry->id}}" class="popup-with-zoom-anim button ripple-effect red"><i class="icon-feather-star"></i> İlanı Öne Çıkar</a>

                                    </li>

                                        <!-- İLAN YÜKSELTME POP-UP
================================================== -->
                                        <div id="small-dialog-3_{{$entry->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

                                            <div id="small-dialog-2">
                                                <!--Tabs -->
                                                <div class="sign-in-form">

                                                    <ul class="popup-tabs-nav">
                                                        <li><a href="#tab1">İlanı Öne Çıkar</a></li>
                                                        <li><a href="#tab2">Bilgilendirme</a></li>
                                                    </ul>

                                                    <div class="popup-tabs-container">
                                                        <!-- Tab -->
                                                        <div class="popup-tab-content" id="tab1">

                                                            <!-- Welcome Text -->
                                                            <div class="welcome-text">
                                                                <h3>Öne Çıkar </h3>
                                                                <p>Birden Çok Seçebilirsiniz.</p>
                                                            </div>

                                                            <!-- Form -->
                                                            <form method="post" action="{{route('ilanlarim.yukselt')}}">
                                                                @csrf
                                                                <select name="onecikarma[]" class="selectpicker default" multiple data-selected-text-format="count" data-size="7" title="Öne Çıkarma Seçenekleri" >
                                                                    <option value="1">Kalın Başlık - 25 ₺</option>
                                                                    <option value="2">Acil Acil! - 100 ₺</option>
                                                                    <option value="3">Öne Çıkanlar - 500 ₺</option>
                                                                </select>
                                                                <input type="hidden" value="{{$entry->id}}" name="ilan_id">


                                                                <button class="button full-width button-sliding-icon ripple-effect" type="submit">Ödeme Sayfasına Git <i class="icon-material-outline-arrow-right-alt"></i></button>
                                                            </form>

                                                            <!-- Button -->


                                                        </div>
                                                        <!-- Tab -->
                                                        <div class="popup-tab-content" id="tab2">

                                                            <!-- Welcome Text -->
                                                            <div class="welcome-text">
                                                                <h3>Öne Çıkarma Bilgilendirmesi </h3>
                                                            </div>

                                                            <!-- Form -->
                                     <p>İlanı öne çıkarmak ilan görünürlüğünüzü arttırarak satmanıza veya kiralamanıza yardımcı olur.</p>
                                                            <p>*Kalın Başlık İlanınızın Göze Çarpmasını Sağlar. <br>
                                                                *Acil Acil! Anasayfada İlanınızın Görünmesini Sağlar.
                                                                <br>
                                                                *Öne Çıkanlar, İlanınızın Kategorisinde Üst Sırada Olur</p>



                                                        </div>




                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Send Direct Message Popup / End -->
                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    </div>

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
