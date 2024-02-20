@extends('katmanlar.usermaster')
@section('title', 'Kullanıcı Paneli')
@section('content')
    <div class="dashboard-container">

    @include('kullanici.sidebar')
        <!-- Dashboard Content
        ================================================== -->
        <div class="dashboard-content-container" data-simplebar>
            <div class="dashboard-content-inner" >

                <!-- Dashboard Headline -->
                <div class="dashboard-headline">
                    <h3>Merhaba, {{Auth::user()->name}}!</h3>
                    <span>Seni burada görmek güzel!</span>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="#">Profilim</a></li>
                            <li>Giriş</li>
                        </ul>
                    </nav>
                </div>
            @if($user->hizmetveren==1)
                <!-- Fun Facts Container -->
                <div class="fun-facts-container">
                    <div class="fun-fact" data-fun-fact-color="#36bd78">
                        <div class="fun-fact-text">
                            <span>Kazanılan Teklifler</span>
                            <h4>{{count($user->kazanilan)}}</h4>
                        </div>
                        <div class="fun-fact-icon"><i class="icon-material-outline-gavel"></i></div>
                    </div>
                    <div class="fun-fact" data-fun-fact-color="#b81b7f">
                        <div class="fun-fact-text">
                            <span>Toplam Tekliflerim</span>
                            <h4>{{count($user->teklif)}}</h4>
                        </div>
                        <div class="fun-fact-icon"><i class="icon-material-outline-business-center"></i></div>
                    </div>
                    <div class="fun-fact" data-fun-fact-color="#efa80f">
                        <div class="fun-fact-text">
                            <span>Yorumlarım</span>
                            <h4>{{count($user->hizmetalanyorumlar)}}</h4>
                        </div>
                        <div class="fun-fact-icon"><i class="icon-material-outline-rate-review"></i></div>
                    </div>

                    <!-- Last one has to be hidden below 1600px, sorry :( -->
                    <div class="fun-fact" data-fun-fact-color="#2a41e6">
                        <div class="fun-fact-text">
                            <span>Toplam Harcamalarım</span>
                            <h4>987</h4>  ₺
                        </div>
                        <div class="fun-fact-icon"><i class="icon-feather-dollar-sign"></i></div>
                    </div>
                </div>
                @endif


                <!-- Row -->
                <div class="row">

                    <!-- Dashboard Box -->
                    <div class="col-xl-6">
                        @include('katmanlar.menu.alert')
                        <div class="dashboard-box">
                            <form action="{{route('bildirimler')}}" id="bildirimsil2" method="post">
                                @csrf
                                <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                            </form>
                            <div class="headline">
                                <h3><i class="icon-material-baseline-notifications-none"></i> Bildirimler</h3>
                                <button class="mark-as-read ripple-effect-dark" data-tippy-placement="left" form="bildirimsil2" type="submit" title="Tümünü okundu işaretle">
                                    <i class="icon-feather-check-square"></i>
                                </button>
                            </div>
                            <div class="content">
                                <ul class="dashboard-box-list">

                                    @if(count($bildirimtumu)>0)
                                    @foreach($bildirimtumu as $bil)
                                    <li>
                                        <span class="notification-icon"><i class="icon-material-outline-notifications"></i></span>
                                        <span class="notification-text">
										<strong>{{$bil->bildirim}}  </strong><a href="{{config('app.url').$bil->route}}">Git &rightarrow;</a>
									</span>
                                        <!-- Buttons -->

                                    </li>
                                    @endforeach
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>

                    @if($user->hizmetveren==1)
                    <!-- Dashboard Box -->
                    <div class="col-xl-6">
                        <div class="dashboard-box">
                            <div class="headline">
                                <h3><i class="icon-material-outline-assignment"></i> Bakiye Yüklemelerin  - Bakiyen:
                                    {{$user->bakiye}}₺ - <a href="#small-dialog-3_999" class="popup-with-zoom-anim">Bakiye Yükle </a></h3>
                            </div>
                            <div class="content">
                                <ul class="dashboard-box-list">

                                    @foreach($user->siparis as $sip)
                                        @if($sip->ilan_mi==0)
                                            <li>
                                                <div class="invoice-list-item">
                                                    <strong>Tutar: {{$sip->tutar}}₺</strong>
                                                    <ul>
                                                        <li><span class="paid">Başarılı</span></li>
                                                        <li>Sipariş Numarası: TK-{{$sip->siparis_no}}</li>
                                                        <li>Tarih: {{ \Carbon\Carbon::parse($sip->created_at)->format('d/m/Y') }}</li>
                                                    </ul>
                                                </div>
                                                <!-- Buttons
                                                <div class="buttons-to-right">
                                                    <a href="pages-checkout-page.html" class="button">Finish Payment</a>
                                                </div>
                                                -->
                                            </li>
                                        @endif

                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                        <!-- HARCAMALAR -->
                        <div class="col-xl-6">
                            <div class="dashboard-box">
                                <div class="headline">
                                    <h3><i class="icon-material-outline-assignment"></i> Harcamaların  - Bakiyen:
                                        {{$user->bakiye}}₺ - <a href="#small-dialog-3_999" class="popup-with-zoom-anim">Bakiye Yükle </a></h3>
                                </div>
                                <div class="content">
                                    <ul class="dashboard-box-list">

                                        @foreach($user->harcama as $sip)

                                                <li>
                                                    <div class="invoice-list-item">
                                                        <strong>Tutar: {{$sip->tutar}}₺ - <a href="{{route('hizmet', $sip->hizmet->slug)}}"></a> {{$sip->hizmet->title}}</strong>
                                                        <ul>
                                                            <li><span class="paid">Ödendi</span></li>
                                                            <li>Ödeme Numarası: OD-{{$sip->siparis_no}}</li>
                                                            <li>Tarih: {{ \Carbon\Carbon::parse($sip->created_at)->format('d/m/Y') }}</li>
                                                        </ul>
                                                    </div>
                                                    <!-- Buttons -->
                                                    <div class="buttons-to-right">
                                                        <a href="{{route('hizmet', $sip->hizmet->slug)}}" class="button">Hizmete Git</a>
                                                    </div>
                                                </li>

                                        @endforeach
                                            @if(count($user->harcama)<0)
                                                <li>
                                                    <div class="invoice-list-item">
                                                        <strong>Hiç Harcamanız Yok</strong>
                                                    </div>
                                                </li>
                                                @endif

                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif

                    <div class="col-xl-6">
                        <div class="dashboard-box">
                            <div class="headline">
                                <h3><i class="icon-material-outline-assignment"></i> İlan Yükseltmeleri:</h3>
                            </div>
                            <div class="content">
                                <ul class="dashboard-box-list">

                                    @foreach($user->siparis as $sip)
                                        @if($sip->ilan_mi==1)
                                            <li>
                                                <div class="invoice-list-item">
                                                    <strong>Tutar: {{$sip->tutar}}₺ : <span><a href="{{route('ilan', $sip->ilan->slug)}}">{{$sip->ilan->baslik}}</a></span></strong>
                                                    <ul>
                                                        <li><span class="paid">Başarılı</span></li>
                                                        <li>Sipariş Numarası: TK-{{$sip->siparis_no}}</li>
                                                        <li>Tarih: {{ \Carbon\Carbon::parse($sip->created_at)->format('d/m/Y') }}</li>
                                                    </ul>
                                                </div>
                                                <!-- Buttons
                                                <div class="buttons-to-right">
                                                    <a href="pages-checkout-page.html" class="button">Finish Payment</a>
                                                </div>
                                                -->
                                            </li>
                                        @endif
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Row / End -->

                <!-- Footer -->
                <div class="dashboard-footer-spacer"></div>
                @include('kullanici.copyright')

            </div>
        </div>
        <!-- Dashboard Content / End -->

    </div>
    <!-- Dashboard Container / End -->

@endsection
