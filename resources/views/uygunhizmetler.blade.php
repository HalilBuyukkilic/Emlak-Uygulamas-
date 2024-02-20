@extends('katmanlar.master')
@section('title', 'Toprak Konut - '.$user->name.' - İçin uygun hizmetler')
@section('content')

    <!--Breadcrumbs Section-->
    <div class="bannerimg cover-image bg-background3" data-image-src="/images/hizmet.jpg">
        <div class="header-text mb-0">
            <div class="container">
                <div class="text-center text-white ">
                    <h1 class="">Teklif Verebileceğin Hizmetler</h1>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="{{route('anasayfa')}}">Anasayfa</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Teklif Verebileceğin Hizmetler</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    @include('katmanlar.menu.alert')
    @include('katmanlar.menu.error')
    <!--Featured Ads-->
    <section class="sptb bg-patterns">
        <div class="container">
            <div class="section-title center-block text-center">
                <h2>Uygun Hizmetler</h2>
                <p>Bölgenizdeki iş alanınıza uygun, teklif verebileceğiniz hizmetler aşağıdadır.</p>
            </div>
            <div class="row">
                @foreach($uygunhizmetler as $entry)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="arrow-ribbon bg-danger">Teklif Verilebilir</div>
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


@endsection
