@extends('katmanlar.master')
@section('title', 'Toprak Konut - Sektörel Haberler Blog')
@section('meta', 'İnşaat sektör haberleri, toprak konut sektörel haberler, inşaat blog, inşaat ile ilgili her şey')
@section('content')
    <!--Breadcrumb-->
    <section>
        <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white">
                        <h1 class="">Sektörel Haberler</h1>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Breadcrumb-->

    <!--Add listing-->
    <section class="sptb">
        <div class="container">
            <div class="row">
                <!--Add lists-->
                <div class="col-xl-8 col-lg-8 col-md-12">
                    <div class="row">
                        @foreach($blogyazi as $yazi)
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="card">
                                <div class="item7-card-img">
                                    <a href="{{route('blog_tekli', $yazi->slug)}}"></a>
                                    <img src="/upload/image/blog/{{$yazi->blog_resmi}}" alt="{{$yazi->baslik}}" class="cover-image">
                                    <div class="item7-card-text">
                                        <span class="badge badge-success">{{$yazi->blogkategoriler->first()->kategori_adi}}</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="item7-card-desc d-flex mb-2">
                                        <a href="#"><i class="fa fa-calendar-o text-muted mr-2"></i>{{ \Carbon\Carbon::parse($yazi->created_at)->format('d/m/Y') }}</a>
                                    </div>
                                    <a href="{{route('blog_tekli', $yazi->slug)}}" class="text-dark"><h4 class="font-weight-semibold">{{$yazi->baslik}}</h4></a>
                                    <p>{!! str_limit($yazi->icerik, 100)!!}</p>
                                    <a href="{{route('blog_tekli', $yazi->slug)}}" class="btn btn-primary btn-sm">Oku</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="center-block text-center">
                        {{$blogyazi->links()}}
                    </div>
                </div>
                <!--/Add lists-->

                <!--Right Side Content-->
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kategoriler</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-catergory">
                                <div class="item-list">
                                    <ul class="list-group mb-0">
                                        @foreach($blogkate as $list)
                                        <li class="list-group-item">
                                            <a href="{{route('blog_kategori', $list->slug)}}" class="text-dark">
                                                <i class="fa fa-building bg-primary text-primary"></i> {{$list->kategori_adi}}
                                                <span class="badgetext badge badge-pill badge-light mb-0 mt-1 mt-1">{{count($list->blog)}}</span>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Sosyal Hesaplarımız</h3>
                        </div>
                        <div class="card-body product-filter-desc">
                            <div class="product-filter-icons text-center">
                                <a href="{{$ayar->facebook}}" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                                <a href="{{$ayar->twitter}}" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                                <a href="{{$ayar->instagram}}" class="google-bg"><i class="fa fa-instagram"></i></a>
                                <a href="{{$ayar->linkedn}}" class="dribbble-bg"><i class="fa fa-linkedin"></i></a>
                                <a href="{{$ayar->pinterest}}" class="pinterest-bg"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/Right Side Content-->
            </div>
        </div>
    </section>
    <!--Add listing-->
@endsection
