@extends('katmanlar.usermaster')
@section('title', 'Kullanıcı Paneli - Tekliflerim')
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
                        <h3>Teklifleri Görüntüle</h3>
                        <span class="margin-top-7"><a href="#">{{$hizmet->title}}</a> için teklifler</span>
                        <!-- Breadcrumbs -->
                    </div>
                    <!-- Row -->
                    <div class="row">
                        <!-- Dashboard Box -->
                        <div class="col-xl-12">
                            <div class="dashboard-box margin-top-0">
                                <!-- Headline -->
                                <div class="headline">
                                    <h3><i class="icon-material-outline-supervisor-account"></i> {{count($hizmet->teklif)}} Teklif Var</h3>
                                </div>
                                <div class="content">
                                    <ul class="dashboard-box-list">
                                        @foreach($hizmet->teklif as $ht)
                                        <li>
                                            <!-- Overview -->
                                            <div class="freelancer-overview manage-candidates">
                                                <div class="freelancer-overview-inner">
                                                    <!-- Avatar -->
                                                    <div class="freelancer-avatar">
                                                        <div class="verified-badge"></div>
                                                        <a href="#sign-in-dialog" class="popup-with-zoom-anim log-in-button"><img src="/upload/image/users/{{$ht->veren->pp}}" alt=""></a>
                                                    </div>
                                                    <!-- Name -->
                                                    <div class="freelancer-name">
                                                        <h4><a href="{{route('hizmetveren', $ht->veren->id)}}">{{$ht->veren->name.' '.$ht->veren->surname}} <img class="flag" src="/images/flags/tr.svg" alt="" title="Germany" data-tippy-placement="top"></a></h4>

                                                        <!-- Details -->
                                                        <span class="freelancer-detail-item"><a href="mailto:{{$ht->veren->email}}"><i class="icon-feather-mail"></i> {{$ht->veren->email}}</a></span>
                                                        <br>
                                                        <span class="freelancer-detail-item"><a href="tel:{{$ht->veren->telefon}}"><i class="icon-feather-phone"></i> {{$ht->veren->telefon}}</a></span>
                                                        <br>

                                                        <!-- Rating -->
                                                        <div class="freelancer-rating">
                                                            <div class="comments-amount">{{count($ht->veren->derece)}} Yorum - {{count($ht->veren->teklif)}} Teklif</div>
                                                            <div class="star-rating" data-rating="{{$ht->veren->rating}}"></div>
                                                        </div>

                                                        <!-- Bid Details -->
                                                        <ul class="dashboard-task-info bid-info">
                                                            <li><strong>{{$ht->teklif}} ₺</strong><span>Teklif</span></li>
                                                            <li><strong>{{$ht->sure}} Gün</strong><span>Tahmini süre</span></li>
                                                        </ul>

                                                        <!-- Buttons -->
                                                        <div class="buttons-to-right always-visible margin-top-25 margin-bottom-0">
                                                            <a href="#small-dialog-1_{{$ht->id}}"  class="popup-with-zoom-anim button ripple-effect"><i class="icon-material-outline-check"></i> Teklifi Kabul Et</a>
                                                            <a href="#small-dialog-2_{{$ht->id}}" class="popup-with-zoom-anim button ripple-effect"><i class="icon-feather-mail"></i> Mesaj Gönder</a>
                                                            <a href="{{route('hizmetveren', $ht->veren->id)}}" class="button ripple-effect"><i class="icon-feather-user"></i> Profil</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Row / End -->
                @include('kullanici.copyright')

                </div>
            </div>
            <!-- Dashboard Content / End -->

        </div>
        <!-- Dashboard Container / End -->

    @foreach($hizmet->teklif as $hi)
    <!-- Bid Acceptance Popup
  ================================================== -->

    <div id="small-dialog-1_{{$hi->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
        <!--Tabs -->
        <div id="small-dialog-3">
        <div class="sign-in-form">

            <ul class="popup-tabs-nav">
                <li><a href="#tab1">Teklif</a></li>
            </ul>

            <div class="popup-tabs-container">

                <!-- Tab -->
                <div class="popup-tab-content" id="tab">

                    <!-- Welcome Text -->
                    <div class="welcome-text">
                        <h3>Teklif Veren: {{$hi->veren->name.' '.$hi->veren->surname}}</h3>

                        <div class="bid-acceptance margin-top-15">
                            Teklif: {{$hi->teklif}} ₺
                        </div>
                    </div>

                    <form action="{{route('hizmet.liste.teklif.kabul')}}" method="POST" >
                        @csrf
                            <input type="hidden" value="{{$hi->veren->id}}" name="hizmet_veren_id">
                            <input type="hidden" value="{{$hi->hizmet->id}}" name="hizmet_id">


                    <!-- Button -->
                    <button class="margin-top-15 button full-width button-sliding-icon ripple-effect" type="submit" >Kabul Et <i class="icon-material-outline-arrow-right-alt"></i></button>
                    </form>
                </div>

            </div>
        </div>
        </div>
    </div>
    <!-- Bid Acceptance Popup / End -->







@endforeach
    @foreach($hizmet->teklif as $hi)
    <!-- Send Direct Message Popup
    ================================================== -->
    <div id="small-dialog-2_{{$hi->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

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
                            <input type="hidden" value="{{$hi->veren->id}}" name="hizmet_veren_id">
                            <input type="hidden" value="{{$hi->hizmet->id}}" name="hizmet_id">

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
