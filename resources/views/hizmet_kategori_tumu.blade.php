@extends('katmanlar.master')
@section('title', 'Toprak Konut - Hizmet Al')
@section('content')
<section>
    <div class="banner-1 cover-image sptb-2 sptb-tab bg-background2" data-image-src="

            /images/hizmet.jpg


            ">
        <div class="header-text mb-0">
            <div class="container">

                <div class="text-left text-white mb-7">
                    <a href="" class="typewrite" data-period="2000" data-type='[ "Profesyonellerden Hizmet Al!" ]'>
                        <span class="wrap"></span>
                    </a>
                    <p>Toprak Konut güvencesiyle inşaata dair aradığın tüm hizmetleri bulabilirsin!</p>
                </div>

                <!-- ARAMA -->
                <div class="row">
                    <div class="col-xl-10 col-lg-12 col-md-12 d-block mx-auto" >
                        <div class="search-background bg-transparent">
                            <form action="{{route('hizmet.kategori.tumu')}}" method="get" >
                                @csrf
                                <div class="form row no-gutters " >

                                    <div class="form-group  col-xl-4 col-lg-4 col-md-12 mb-0 bg-white ">
                                        <input type="text" class="form-control input-lg br-tr-md-0 br-br-md-0" id="text4" name="aranan" placeholder="Aradığınız hizmeti giriniz...">
                                    </div>

                                    <div class="col-xl-2 col-lg-3 col-md-12 mb-0">
                                        <button type="submit" class="btn btn-lg btn-block btn-primary br-tl-md-0 br-bl-md-0">Ara</button>
                                    </div>
                                    <div class="form-group  col-xl-2 col-lg-1 col-md-12 mb-0">

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @if(count($aramasonuc)>0)
                <section class="sptb">
                    <div class="container">
                        <div class="section-title center-block text-center">
                            <h2>Arama Sonuçları</h2>
                        </div>


                        <div class="row">
                            @foreach($aramasonuc as $entry)
                            <div class="col-lg-4 col-md-12 col-xl-4" style="color: black">
                                <div class="card">
                                    <div class="item-card2-img">
                                        <a href="{{route('hizmet.kategori', $entry->slug)}}"></a>
                                        <img src="/upload/image/kategori/{{$entry->resim}}" alt="{{$entry->name}}" class="cover-image">
                                    </div>
                                    <div class="card-body">
                                        <div class="item-card2">
                                            <div class="item-card2-desc">
                                                <h4 class="font-weight-semibold mb-5">{{$entry->name}}</h4>
                                                <a href="#" class="btn btn-primary text-center">{{count($entry->hizmet)}} Tamamlanan Hizmet</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endforeach
                        </div>

                        @elseif(request('aranan') and count($aramasonuc)==0)
                        <div class="row">
                        <div class="col-lg-8 col-md-7 col-xl-7">
                                <div class="alert alert-primary mt-4">
                                    <p> Hiçbir sonuç bulunamadı... <br>
                                        Lütfen farklı bir şeyler yazmayı deneyin veya aşağıdaki listeden kategori seçin.</p>
                                </div>
                        </div>
                        </div>
                        @endif
                    </div>
                </section>

            </div>
        </div><!-- /header-text -->
    </div>
</section>


<section class="sptb">
    <div class="container">
        <div class="section-title center-block text-center">
            <h2>Tüm Hizmet Kategorileri</h2>
        </div>

        <div class="row">
            @foreach($kategoriler as $entry)
                <div class="col-lg-4 col-md-12 col-xl-4" style="color: black">
                    <div class="card">
                        <div class="item-card2-img">
                            <a href="{{route('hizmet.kategori', $entry->slug)}}"></a>
                            <img src="/upload/image/kategori/{{$entry->resim}}" alt="{{$entry->name}}" class="cover-image">
                        </div>
                        <div class="card-body">
                            <div class="item-card2">
                                <div class="item-card2-desc">
                                    <h4 class="font-weight-semibold mb-5">{{$entry->name}}</h4>
                                    <a href="#" class="btn btn-primary text-center">{{count($entry->hizmet)}} Tamamlanan Hizmet</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
