@extends('katmanlar.usermaster')
@section('title', 'Kullanıcı Paneli - Hizmetlerim')
@section('content')
    <div class="dashboard-container">
    @include('kullanici.sidebar')
    <div class="dashboard-content-container" data-simplebar>
        <div class="dashboard-content-inner" >

            <!-- Dashboard Headline -->
            <div class="dashboard-headline">
                <h3>Hizmet İsteklerini Yönet</h3>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="#">Profilim</a></li>
                        <li><a href="#">Hizmetler</a></li>
                        <li>Hizmetlerim</li>
                    </ul>
                </nav>
            </div>
            <div class="ro">
                @include('katmanlar.menu.alert')
            </div>

            <!-- Row -->
            <div class="row">

                <!-- Dashboard Box -->
                <div class="col-xl-12">
                    <div class="dashboard-box margin-top-0">

                        <!-- Headline -->
                        <div class="headline">
                            <h3><i class="icon-material-outline-assignment"></i> Hizmet İsteklerim</h3>
                        </div>

                        <div class="content">
                            <ul class="dashboard-box-list">
                                @foreach($hizmet as $hi)
                                <li>
                                    <!-- Job Listing -->
                                    <div class="job-listing width-adjustment">

                                        <!-- Job Listing Details -->
                                        <div class="job-listing-details">

                                            <!-- Details -->
                                            <div class="job-listing-description">
                                                <h3 class="job-listing-title"><a href="{{route('hizmet', $hi->slug)}}">{{$hi->title}}</a>

                                                    @if($hi->onaylandi_mi==1)
                                                    <span class="dashboard-status-button green">Onaylandı ve Yayında</span></h3>
                                                @else
                                                <span class="dashboard-status-button yellow">Onay Bekleniyor</span></h3>
                                                @endif
                                                <!-- Job Listing Footer -->
                                                <div class="job-listing-footer">
                                                    <ul>
                                                        <li><i class="icon-material-outline-access-time"></i> {{\Carbon\Carbon::parse($hi->created_at)->diffInDays()}} gün önce yayınlandı</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Task Details -->
                                    <ul class="dashboard-task-info">
                                        <li><strong>{{count($hi->teklif)}}</strong><span>Teklif</span></li>
                                        <li><strong>
                                                @if(count($hi->teklif)>0)
                                                @php($ortalama=0)
                                                @php($gunortalama=0)
                                                @foreach($hi->teklif as $ht)
                                                    @php($ortalama=$ht->teklif+$ortalama)
                                                        @php($gunortalama=$ht->sure+$gunortalama)
                                                @endforeach
                                                @php($ortalama=$ortalama/count($hi->teklif))
                                                    @php($gunortalama=$ortalama/($gunortalama/count($hi->teklif)))
                                                    {{$ortalama}}₺
                                                @else
                                                    0 ₺
                                                @endif
                                            </strong><span>Ort. Tklf</span></li>
                                        <li><strong>
                                                @if(count($hi->teklif)>0)
                                                {{round($gunortalama, 2)}}₺
                                                @else
                                                0₺
                                                @endif
                                            </strong><span>Günlük Ortalama maliyet</span></li>
                                    </ul>

                                    <!-- Buttons -->
                                    <div class="buttons-to-right always-visible">
                                        @if($hi->alindi==0)
                                        <form  action="{{route('hizmet.liste.teklif')}}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{$hi->id}}" name="hizmet_id">
                                            <button type="submit" class="button ripple-effect"><i class="icon-material-outline-supervisor-account"></i> Teklif Verenleri Yönet <span class="button-info">{{count($hi->teklif)}}</span></button>
                                        </form>
                                        @else
                                            @if(!$hi->yorum)
                                            <p><a href="{{route('hizmetveren', $hi->veren->id)}}">{{$hi->veren->name}}</a> adlı hizmet verenle anlaştınız.</p>
                                            <a href="#small-dialog-2_{{$hi->id}}" class="popup-with-zoom-anim button ripple-effect"><i class="icon-feather-star"></i> Yorum Yap</a>
                                                <a href="#small-dialog-3_{{$hi->id}}" class="popup-with-zoom-anim button ripple-effect"><i class="icon-feather-message-square"></i> Mesaj Gönder</a>
                                            @else
                                                <p><a href="{{route('hizmetveren', $hi->veren->id)}}">{{$hi->veren->name}}</a> adlı hizmet verenle anlaştınız.</p>
                                                <h4>Yorumunuz:</h4> <p>{{$hi->yorum->yorum}}</p> <br>
                                                <h4>Puanınız: {{$hi->yorum->rating}}</h4>
                                                @endif
                                            @endif
                                    </div>
                                </li>

                                    @if(!isset($hi->yorum))
                                    <!-- Send Direct Message Popup
  ================================================== -->
                                    <div id="small-dialog-2_{{$hi->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

                                        <div id="small-dialog-2">
                                            <!--Tabs -->
                                            <div class="sign-in-form">

                                                <ul class="popup-tabs-nav">
                                                    <li><a href="#tab2">Hizmeti Değerlendir</a></li>
                                                </ul>

                                                <div class="popup-tabs-container">

                                                    <!-- Tab -->
                                                    <div class="popup-tab-content" id="tab2">

                                                        <!-- Welcome Text -->
                                                        <div class="welcome-text">
                                                            <h3>Aldığın Hizmeti Değerlendir</h3>
                                                        </div>

                                                        <!-- Form -->
                                                        <form method="post" id="send-pm" action="{{route('hizmet.liste.degerlendir')}}">
                                                            @csrf
                                                            <div class="feedback-yes-no">
                                                                <strong>Puanınız 5 Üzerinden:</strong>
                                                                <div class="leave-rating">
                                                                    <input type="radio" name="rating" id="rating-1" value="5" />
                                                                    <label for="rating-1" class="icon-material-outline-star"></label>
                                                                    <input type="radio" name="rating" id="rating-2" value="4"/>
                                                                    <label for="rating-2" class="icon-material-outline-star"></label>
                                                                    <input type="radio" name="rating" id="rating-3" value="3"/>
                                                                    <label for="rating-3" class="icon-material-outline-star"></label>
                                                                    <input type="radio" name="rating" id="rating-4" value="2"/>
                                                                    <label for="rating-4" class="icon-material-outline-star"></label>
                                                                    <input type="radio" name="rating" id="rating-5" value="1"/>
                                                                    <label for="rating-5" class="icon-material-outline-star"></label>
                                                                </div><div class="clearfix"></div>
                                                            </div>
                                                            <textarea name="yorum" cols="10" placeholder="Aldığınız hizmeti nasıl buldunuz?" class="with-border" required></textarea>
                                                            <input type="hidden" name="hizmet_veren_id" value="{{$hi->hizmet_veren_id}}">
                                                            <input type="hidden" name="hizmet_alan_id" value="{{$hi->user->id}}">
                                                            <input type="hidden" name="hizmet_id" value="{{$hi->id}}">


                                                        <!-- Button -->
                                                        <button class="button full-width button-sliding-icon ripple-effect" type="submit" form="send-pm">Değerlendir<i class="icon-material-outline-arrow-right-alt"></i></button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Send Direct Message Popup / End -->
                                    @endif
                                @endforeach





                            </ul>


                                <nav class="pagination">
                                    {{$hizmet->links()}}
                                </nav>
                            </div>



                    </div>
                </div>

            </div>
            <!-- Row / End -->





        </div>
    </div>
    <!-- Dashboard Content / End -->
    </div>

    @foreach($hizmet as $hi)

            <!-- Send Direct Message Popup
  ================================================== -->
            <!-- Send Direct Message Popup
 ================================================== -->
            <div id="small-dialog-3_{{$hi->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

                <div id="small-dialog-2">
                    <!--Tabs -->
                    <div class="sign-in-form">

                        <ul class="popup-tabs-nav">
                            <li><a href="#tab2">Mesaj Gönder</a></li>
                        </ul>

                        <div class="popup-tabs-container">

                            <!-- Tab -->
                            <div class="popup-tab-content" id="tab2">

                                <!-- Welcome Text -->
                                <div class="welcome-text">
                                    <h3>Mesaj Gönder </h3>
                                </div>

                                <!-- Form -->
                                <form method="post" action="{{route('mesaj.gonder.yeni')}}">
                                    @csrf
                                    <textarea name="mesaj" cols="10"  placeholder="Mesajınız" class="with-border" required></textarea>
                                    <input type="hidden" value="{{$hi->hizmet_veren_id}}" name="hizmet_veren_id">
                                    <input type="hidden" value="{{$hi->id}}" name="hizmet_id">

                                    <button class="button full-width button-sliding-icon ripple-effect" type="submit">Send <i class="icon-material-outline-arrow-right-alt"></i></button>
                                </form>

                                <!-- Button -->


                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Send Direct Message Popup / End -->


    @endforeach


@endsection
