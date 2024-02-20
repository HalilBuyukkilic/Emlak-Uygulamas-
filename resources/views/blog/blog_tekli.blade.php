@extends('katmanlar.master')
@section('title', 'Toprak Konut - '.$blog->baslik)
@section('meta')
    {!!  str_limit($blog->icerik) !!}
@endsection
@section('content')


    <!--Breadcrumb-->
    <section>
        <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white">
                        <h1 class="">{{$blog->baslik}}</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('anasayfa')}}">Aasayfa</a></li>
                            <li class="breadcrumb-item"><a href="{{route('blog')}}">Sektörel Haberler</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">{{$blog->baslik}}</li>
                        </ol>
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
                <div class="d-block mx-auto col-lg-8 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Paylaşın!</h3>
                        </div>
                        <div class="card-body product-filter-desc">
                            <div class="product-filter-icons text-center">
                                <a href="javascript:void(0)" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{env('APP_URL')}}/sektorel-haberler/yazi/{{$blog->slug}}','','toolbar=no,scrollbars=no,resizable=no,width=1100,height=480')" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                                <a href="javascript:void(0)" onclick="window.open('https://twitter.com/intent/tweet?url={{env('APP_URL')}}/sektorel-haberler/yazi/{{$blog->slug}}','','toolbar=no,scrollbars=no,resizable=no,width=1100,height=480')" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                                <a href="javascript:void(0)" onclick="window.open('https://pinterest.com/pin/create/button/?url={{env('APP_URL')}}/sektorel-haberler/yazi/{{$blog->slug}}','','toolbar=no,scrollbars=no,resizable=no,width=1100,height=480')" class="pinterest-bg"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="item7-card-img">
                                <img src="/upload/image/blog/{{$blog->blog_resmi}}" alt="{{$blog->baslik}}" class="w-100">
                                <div class="item7-card-text">
                                    <span class="badge badge-info">{{$blogkategori->first()->kategori_adi}}</span>
                                </div>
                            </div>
                            <div class="item7-card-desc d-flex mb-2 mt-3">
                                <a href="#"><i class="fa fa-calendar-o text-muted mr-2"></i>{{ \Carbon\Carbon::parse($blog->created_at)->format('d/m/Y') }}</a>
                                <a href="{{route('anasayfa')}}"><i class="fa fa-user text-muted mr-2"></i>Toprak Konut</a>

                            </div>
                            <a href="#" class="text-dark"><h2 class="font-weight-semibold">{{$blog->baslik}}</h2></a>
                            <p>{!! $blog->icerik !!}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--/Add listing-->

@endsection
