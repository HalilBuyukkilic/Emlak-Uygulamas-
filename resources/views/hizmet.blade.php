@extends('katmanlar.master')
@section('title', 'Toprak Konut - '.$hizmet->title)
@section('meta','Toprak Konut - '.$hizmet->title)
@section('content')

<!--BreadCrumb-->
<div class="bannerimg cover-image bg-background3" data-image-src="/images/hizmet.jpg">
    <div class="header-text mb-0">
        <div class="container">
            <div class="text-center text-white ">
                <h1 class="">{{$hizmet->title}}</h1>
            </div>
        </div>
    </div>
</div>
<!--/BreadCrumb-->

<!--Add listing-->
<section class="sptb">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12">

                <!--Classified Description-->
                <div class="card overflow-hidden">
                    <div class="ribbon ribbon-top-right text-danger"><span class="bg-danger">
                            @if($hizmet->alindi==1)
                            Hizmet Verildi
                            @else
                                Tekliflere Açık
                            @endif
                        </span></div>
                    <div class="card-body h-100">
                        <div class="item-det mb-4">
                            <a href="#" class="text-dark"><h3 >{{$hizmet->title}}</h3></a>
                            <div class=" d-flex">
                                <ul class="d-flex mb-0">
                                    <li class="mr-5"><a href="{{route('hizmet.kategori', $hizmet->kategori->slug)}}" class="icons"><i class="icon icon-briefcase text-muted mr-1"></i> {{$hizmet->kategori->name}}</a></li>
                                    <li class="mr-5"><a href="#" class="icons"><i class="icon icon-location-pin text-muted mr-1"></i>{{$hizmet->il}}</a></li>
                                    <li class="mr-5"><a href="#" class="icons"><i class="icon icon-calendar text-muted mr-1"></i>
                                            @if(\Carbon\Carbon::parse($hizmet->created_at)->diffInMinutes()<59)
                                                {{\Carbon\Carbon::parse($hizmet->created_at)->diffInMinutes()}} dk önce.
                                            @endif
                                            @if(\Carbon\Carbon::parse($hizmet->created_at)->diffInMinutes()>60 && \Carbon\Carbon::parse($hizmet->created_at)->diffInHours()<24)
                                                {{\Carbon\Carbon::parse($hizmet->created_at)->diffInHours()}} saat önce.
                                            @endif
                                            @if(\Carbon\Carbon::parse($hizmet->created_at)->diffInHours()>24)
                                                {{\Carbon\Carbon::parse($hizmet->created_at)->diffInDays()}} gün önce
                                            @endif
                                        </a></li>
                                </ul>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Hizmete Açıklaması</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <p><strong>Bütçe:</strong>   {{number_format($hizmet->price)}} ₺</p>
                        </div>
                        <div class="mb-4">
                            <strong>Açıklama:</strong><p class="mt-2">{{$hizmet->text}}</p>
                        </div>

                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Sorular</h3>
                    </div>
                    <div class="card-body">
                    @if($hizmet->sorular!=null)
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                                <div class="table-responsive">
                                    <table class="table row table-borderless w-100 m-0 text-nowrap ">
                                        <tbody class="col-lg-12 col-xl-6 p-0">
                                        @for($i=0;$i<count($sorular);$i++)
                                            <tr>
                                                <td><span class="font-weight-bold">{{$sorular[$i]}} :</span> {{$sorular[$i+1]}}</td>
                                            </tr>
                                            @php($i++)
                                        @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="pt-4 pb-4 pl-5 pr-5 border-top border-top">
                    <div class="list-id">
                        <div class="row">
                            <div class="col">
                                <a class="mb-0">Hizmet No : TK-{{$hizmet->id}}{{rand(1,99999)}}</a>
                            </div>
                            <div class="col col-auto">
                                 <a class="mb-0 font-weight-bold">Onaylandı</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <!--/Classified Description-->


                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Teklifler</h3>
                    </div>
                    <div class="card-body p-0">
                        @foreach($hizmet->teklif as $teklif)
                        <div class="media mt-0 p-5">
                            <div class="d-flex mr-3">
                                <a href="{{route('hizmetveren', $teklif->veren->id )}}"><img class="media-object brround" alt="64x64" src="/upload/image/users/{{$teklif->veren->pp}}"> </a>
                            </div>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1 font-weight-semibold"><a href="{{route('hizmetveren', $teklif->veren->id )}}">{{$teklif->veren->name}}</a>
                                    <span class="fs-14 ml-0" data-toggle="tooltip" data-placement="top" title="Onaylandı"><i class="fa fa-check-circle-o text-success"></i></span>
                                    <div class="star-rating ml-5" data-rating="{{$teklif->veren->rating}}"></div></a> <span class="text-black">({{$teklif->veren->ratingcount}} Yorum)</span>
                                </h5>
                                <p class="text-muted"><i class="fa fa-money"></i> {{$teklif->teklif}} ₺  <i class=" ml-3 fa fa-clock-o"></i> {{$teklif->sure}} günde teslim </p>

                                <a href="{{route('hizmetveren', $teklif->veren->id )}}" class="mr-2"><span class="badge badge-primary">Profile Git</span></a>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <!--Right Side Content-->
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Hizmet İsteyen</h3>
                    </div>
                    <div class="card-body  item-user">
                        <div class="profile-pic mb-0">
                            <div>
                                <a class="text-dark"><h4 class="mt-3 mb-1 font-weight-semibold">{{$hizmet->user->name}}</h4></a>
                                <span class="text-muted">{{ \Carbon\Carbon::parse($hizmet->user->created_at)->format('Y') }} tarihinden beri üye</span>
                            </div>

                        </div>
                    </div>
                    <div class="card-body item-user">
                        <h4 class="mb-4">İletişim Bilgileri</h4>
                        <div>
                            <h6><span class="font-weight-semibold"><i class="fa fa-envelope mr-3 mb-2"></i></span><a href="#" class="text-body">Görebilmek için teklif verin</a></h6>
                            <h6><span class="font-weight-semibold"><i class="fa fa-phone mr-3  mb-2"></i></span><a href="#" class="text-primary">Görebilmek için teklif verin</a></h6>
                        </div>

                    </div>

                </div>
                @include('katmanlar.menu.alert')
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Teklif Ver</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('hizmet.teklif.ver')}}" method="post">
                            @csrf
                        <div class="form-group">
                            <input type="number" class="form-control" id="search-text" placeholder="Teklif Tutarı" name="teklif" required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="search-text" placeholder="Tahmini Teslimat Süresi" name="sure" required>
                        </div>
                            @auth()
                                <input type="hidden" value="{{Auth::user()->id}}" name="hizmet_veren_id">
                                <input type="hidden" value="{{$hizmet->id}}" name="hizmet_id">
                                <input type="hidden" value="{{$hizmet->user->id}}" name="hizmet_alan_id">
                                <input type="hidden" value="25" name="tutar">
                                <div class="form-group">
                                    <button type="submit"  class="btn  btn-primary">Teklif Ver 25₺</button>
                                </div>
                            @endauth
                            @guest()
                        <div class="form-group">

                            <a href="{{route('login')}}"  class="btn  btn-primary">Teklif Ver 25₺</a>

                        </div>
                            @endguest
                        </form>
                    </div>
                </div>

            </div>
            <!--/Right Side Content-->
        </div>
    </div>
</section>

@endsection
