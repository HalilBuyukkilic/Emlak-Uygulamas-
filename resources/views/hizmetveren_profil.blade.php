@extends('katmanlar.master')
@section('title', $hizmetveren->name.' - Toprak Konut Hizmet Veren Profili')
@section('content')
    <!--Breadcrumb-->
    <section>
        <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white ">
                        <h1 class="">{{$hizmetveren->name.' '.$hizmetveren->surname}} Profili</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Breadcrumb-->

    <!--User Profile-->
    <section class="sptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body pattern-1">
                            <div class="wideget-user">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="wideget-user-desc text-center">
                                            <div class="wideget-user-img">
                                                <img class="brround" src="/upload/image/users/{{$hizmetveren->pp}}" width="120px" alt="img">
                                            </div>
                                            <div class="user-wrap wideget-user-info">
                                                <a href="#" class="text-white"><h4 class="font-weight-semibold">{{$hizmetveren->name.' '.$hizmetveren->surname}}</h4></a>
                                                <div class="wideget-user-rating">
                                                    <div class="star-rating" data-rating="{{$hizmetveren->rating}}"></div></a> <span class="text-white">({{$hizmetveren->ratingcount}} Yorum)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="wideget-user-tab">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <ul class="nav">
                                            <li class=""><a href="#tab-5" class="active" data-toggle="tab">Profil</a></li>
                                            <li><a href="#tab-6" data-toggle="tab" class="">Verilen Hizmetler</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-5">
                                        <div class="profile-log-switch">
                                            <div class="media-heading">
                                                <h3 class="card-title mb-3 font-weight-bold">Bilgiler</h3>
                                            </div>
                                            <ul class="usertab-list mb-0">
                                                <li><a href="#" class="text-dark"><span class="font-weight-semibold">Kategoriler :</span>
                                                    @foreach($hizmetveren->kategori as $kat)
                                                         {{$kat->name}}
                                                        @endforeach
                                                    </a></li>
                                                <li><a href="#" class="text-dark"><span class="font-weight-semibold">Adres :</span> {{$hizmetveren->adres}}</a></li>
                                                <li><a href="#" class="text-dark"><span class="font-weight-semibold">Verilen Teklif :</span>{{count($hizmetveren->teklif)}}</a></li>
                                                <li><a href="#" class="text-dark"><span class="font-weight-semibold">Verilen Hizmet :</span>{{count($hizmetler)}}</a></li>
                                                <li><a href="#" class="text-dark"><span class="font-weight-semibold">Yorumlar :</span>{{$hizmetveren->ratingcount}}</a></li>

                                            </ul>
                                            <div class="row profie-img">
                                                <div class="col-md-12">
                                                    <div class="media-heading">
                                                        <h3 class="card-title mb-3 font-weight-bold">Biyografi</h3>
                                                    </div>
                                                    <p>{{$hizmetveren->bio}}</p>
                                                </div>
                                            </div>
                                            <div class="media-heading">
                                                <h3 class="card-title mb-3 font-weight-bold">Yorumlar</h3>
                                            </div>
                                            <div class="card-body p-0">
                                                @foreach($hizmetveren->hizmetalanyorumlar as $com)
                                                <div class="media mt-0 p-5">
                                                    <div class="d-flex mr-3">
                                                        <a href="#"><img class="media-object brround" alt="64x64" src="../assets/images/faces/male/1.jpg"> </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mt-0 mb-1 font-weight-semibold">{{$com->hizmet->title}}
                                                            <span class="fs-14 ml-0" data-toggle="tooltip" data-placement="top" title="verified"><i class="fa fa-check-circle-o text-success"></i></span>
                                                            <span class="fs-14 ml-2"> {{$com->rating}} <i class="fa fa-star text-yellow"></i></span>
                                                        </h5>
                                                        <small class="text-muted"><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($com->created_at)->format('d/m/Y') }}</small>
                                                        <p class="font-13  mb-2 mt-2">
                                                            {{$com->yorum}}
                                                        </p>

                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-6">
                                        <!--Featured Ads-->
                                        <section class="sptb bg-patterns">
                                            <div class="container">

                                                <div class="row">
                                                    @if(count($hizmetler)==0)
                                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                                        {{$hizmetveren->name}} daha önce hiç hizmet vermedi.
                                                    </div>
                                                    @endif
                                                    @foreach($hizmetler as $entry)
                                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                                            <div class="card">
                                                                <div class="arrow-ribbon bg-danger">Tamamlandı</div>
                                                                <div class="item-card7-imgs">
                                                                    <a href="{{route('hizmet', $entry->slug)}}"></a>
                                                                    <img src="/images/hizmet.jpg" alt="img" class="cover-image">
                                                                </div>
                                                                <div class="item-card7-overlaytext">
                                                                    <a  class="text-white">  </a>
                                                                    <h4  class="mb-0">Bütçe: {{$entry->price}} ₺</h4>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="item-card7-desc">
                                                                        <div class="item-card7-text">
                                                                            <a href="{{route('hizmet', $entry->slug)}}" class="text-dark"><h4 class="">{{$entry->title}}</h4></a>
                                                                        </div>
                                                                        <ul class="item-cards7-ic mb-0">
                                                                            <li><a href="#"><span class="text-muted"><i class="icon icon-eye mr-1"></i> {{count($entry->teklif)}} Teklif</span></a></li>
                                                                            <li><a href="#" class="icons"><i class="icon icon-location-pin text-muted mr-1"></i> {{$entry->il}}</a></li>
                                                                            <li><a href="#" class="icons"><i class="icon icon-event text-muted mr-1"></i>
                                                                                    @if(\Carbon\Carbon::parse($entry->created_at)->diffInDays()==0)
                                                                                        Bugün Yayınlandı!
                                                                                    @else
                                                                                        {{\Carbon\Carbon::parse($entry->created_at)->diffInDays()}} gün önce yayınlandı
                                                                                    @endif
                                                                                </a></li>
                                                                        </ul>
                                                                        <p class="mb-0">{{str_limit($entry->text, 50)}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="card-footer">
                                                                    <div class="footerimg d-flex mt-0 mb-0">
                                                                        <div class="d-flex footerimg-l mb-0">

                                                                            <h5 class="time-title text-muted p-0 leading-normal mt-2 mb-0">Hizmet Alan: {{$entry->user->name}}<i class="icon icon-check text-success fs-12 ml-1" data-toggle="tooltip" data-placement="top" title="Onaylandı"></i></h5>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </section>
                                        <!--/Featured Ads-->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
