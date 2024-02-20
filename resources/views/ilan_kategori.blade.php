@extends('katmanlar.master')
@section('title', 'Toprak Konut - '.$kategori->name.' İlanları')
@section('meta', $kategori->meta)
@section('content')
    <!--Breadcrumbs Section-->
    <div class="bannerimg cover-image bg-background3" data-image-src="/images/arsa.jpg">
        <div class="header-text mb-0">
            <div class="container">
                <div class="text-center text-white ">
                    <h1 class="">{{$kategori->name}} İlanları</h1>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="{{route('anasayfa')}}">Anasayfa</a></li>
                        <li class="breadcrumb-item">Kategoriler</li>
                        <li class="breadcrumb-item active text-white" aria-current="page">{{$kategori->name}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!--Map-->
    <div class="d-md-flex">
        <div class="map-content-width vscroll card mb-0 br-0 mh-500">
            <div class="p-4 ">
                @foreach($ilan as $il)
                    @if($il->one_cikanlar==1)
                        <div class="card overflow-hidden">
                            <div class="d-md-flex">
                                <div class="item-card9-img">
                                    <div class="arrow-ribbon bg-primary">{{number_format($il->fiyat)}} ₺</div>
                                    <div class="item-card9-imgs">
                                        <a href="{{route('ilan', $il->slug)}}"></a>
                                        <img src="/upload/image/ilan/{{$il->resim->first()->resim}}" alt="{{$il->baslik}}-kucukresim" class="cover-image h-197">
                                    </div>
                                </div>
                                <div class="card border-0 mb-0">
                                    <div class="card-body ">
                                        <div class="item-card9">
                                            <a href="{{route('ilan.kategori', $il->kategori->name)}}">{{$il->kategori->name}}</a>
                                            <a href="{{route('ilan', $il->slug)}}" class="text-dark"><h4 class="font-weight-semibold mt-1">

                                                    @if($il->kalin_baslik==1 and $il->acil_acil==1)
                                                        <strong>{{$il->baslik}}<strong> <i class="fa fa-bolt text-danger"></i></strong></strong>
                                                    @elseif($il->kalin_baslik==1 and $il->acil_acil==0)
                                                        <strong>{{$il->baslik}}</strong>
                                                    @elseif($il->kalin_baslik==0 and $il->acil_acil==1)
                                                        {{$il->baslik}} <button type="button" class="fa fa-bolt text-danger" title="Acil Acil!" data-tippy-placement="left"></button>
                                                    @elseif($il->kalin_baslik==0 and $il->acil_acil==0)
                                                        {{$il->baslik}}
                                                    @endif

                                                </h4></a>
                                            <p class="mb-0 leading-tight">{{str_limit($il->aciklama, 50)}}</p>
                                        </div>
                                    </div>
                                    <div class="card-footer pt-4 pb-4">
                                        <div class="item-card9-footer d-flex">
                                            <div class="item-card9-cost">
                                                <h4 class="text-dark font-weight-semibold mb-0 mt-0">{{number_format($il->fiyat)}} ₺ </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach


            </div>
        </div>
        <div class="map-width">
            <div class="axgmap" data-latlng="41.023044698377845, 29.656130909622547" data-zoom="10">
                @foreach($ilan as $il)
                <div class="axgmap-img" data-latlng="{{$il->lat}},{{$il->long}}" data-marker-image="../assets/images/map/6.png" data-title="Louvre Museum">
                    <h4>{{str_limit($il->baslik)}}</h4>
                    <img src="/upload/image/ilan/{{$il->resim->first()->resim}}"  class="w-150 h100 mb-3 mt-2">
                    <div>Fiyat: <a class="h4"> {{number_format($il->fiyat)}} ₺</a></div>
                    <p class="fs-16 mb-3"><i class="fa fa-phone mr-2"></i> {{$il->user->telefon}}</p>
                    <a target="_blank" href="https://www.google.com/maps/dir//{{$il->lat}},{{$il->long}}/{{'@'}}{{$il->lat}},{{$il->long}},9z/data=!4m2!4m1!3e0" class="btn btn-sm btn-primary btn-pill">Yol Tarifi</a>
                    <a href="{{route('ilan', $il->slug)}}" class="btn btn-sm btn-primary btn-pill">İlana Git</a>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!--/Map-->



    <!--Add listing-->
    <section class="sptb">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-md-12">
                    <!--Add lists-->
                    <div class=" mb-lg-0">
                        <div class="">
                            <div class="item2-gl ">
                                <div class=" mb-0">
                                    <div class="">
                                        <div class="bg-white p-5 item2-gl-nav d-flex">
                                            <h6 class="mb-0 mt-2">Bu sayfada {{count($ilan)}} ilan gösteriliyor</h6>
                                            <ul class="nav item2-gl-menu ml-auto">

                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-11">

                                        @foreach($ilan as $il)
                                        <div class="card overflow-hidden">
                                            <div class="d-md-flex">
                                                <div class="item-card9-img">
                                                    <div class="item-card2-img ">
                                                        <div class="arrow-ribbon bg-primary">{{number_format($il->fiyat)}} ₺</div>
                                                        <a href="{{route('ilan', $il->slug)}}"></a>
                                                        <img src="/upload/image/ilan/{{$il->resim->first()->resim}}" alt="{{$il->baslik}}-kucukresim" class="cover-image">
                                                    </div>
                                                </div>
                                                <div class="card border-0 mb-0">
                                                    <div class="card-body ">
                                                        <div class="item-card2">
                                                            <div class="item-card2-desc">
                                                                <a href="{{route('ilan.kategori', $il->kategori->name)}}">{{$il->kategori->name}}</a>
                                                                <a href="{{route('ilan', $il->slug)}}" class="text-dark mt-2"><h4 class="font-weight-semibold mt-1">
                                                                        @if($il->kalin_baslik==1 and $il->acil_acil==1)
                                                                            <strong>{{$il->baslik}}<strong> <i class="fa fa-bolt text-danger"></i></strong></strong>
                                                                        @elseif($il->kalin_baslik==1 and $il->acil_acil==0)
                                                                            <strong>{{$il->baslik}}</strong>
                                                                        @elseif($il->kalin_baslik==0 and $il->acil_acil==1)
                                                                            {{$il->baslik}} <button type="button" class="fa fa-bolt text-danger" title="Acil Acil!" data-tippy-placement="left"></button>
                                                                        @elseif($il->kalin_baslik==0 and $il->acil_acil==0)
                                                                            {{$il->baslik}}
                                                                        @endif
                                                                    </h4></a>
                                                                <p class="mb-0 leading-tight">
                                                                    {{$il->durum}}
                                                                    -
                                                                    {{number_format($il->fiyat)}} ₺
                                                                    -
                                                                    {{$il->net}} m²
                                                                    @if(isset($il->kategori->master))
                                                                        @if( $il->kategori->master->id==1 )
                                                                            -
                                                                            {{$daireboyut->where('id', $il->oda)->first()->name}}
                                                                            -
                                                                            {{$il->isitma}}
                                                                        @endif
                                                                    @endif
                                                                    @if(isset($il->kategori->master))
                                                                        @if($il->kategori->master->id==10)
                                                                            -
                                                                            {{$il->isyeri_oda_sayisi}}
                                                                            -
                                                                            {{$il->isitma}}
                                                                        @endif
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer pt-4 pb-4">
                                                        <div class="item-card2-footer d-sm-flex">
                                                            <a target="_blank" href="https://www.google.com/maps/dir//{{$il->lat}},{{$il->long}}/{{'@'}}{{$il->lat}},{{$il->long}},9z/data=!4m2!4m1!3e0" class="location"><i class="fa fa-location-arrow text-muted mr-1"></i>Yol Tarifi Al</a>
                                                            <div class="ml-auto">
                                                                <div id="buttonDiv{{$il->id}}">
                                                                <button class="btn btn-primary br-tr-3  br-br-3" onclick="telGoster({{$il->id}})">Telefon Numarasını Göster</button>
                                                                </div>
                                                                <div id="telDiv{{$il->id}}" style="display: none">
                                                                   <a href="tel:{{$il->user->telefon}}" class="location"><i class="fa fa-phone text-muted mr-1"></i>{{$il->user->telefon}}</a>
                                                               </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--/Add lists-->
                </div>

                <!--Right Side Content-->
                <div class="col-xl-3 col-lg-4 col-md-12">
                    <form action="{{route('ilan.kategori', $kategori->slug)}}" method="get">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Filtreler</h3>
                        </div>
                        <div class="card-header border-top">
                            <h3 class="card-title">Sıralama</h3>
                        </div>
                        <div class="card-body">
                            <select name="siralama" class="form-control select-sm select2">
                            <option value="">Seçiniz</option>
                            <option value="newest">En Yeni</option>
                            <option value="pricelow">Fiyat: Artan</option>
                            <option value="pricehigh">Fiyat: Azalan</option>
                            </select>
                        </div>
                        <div class="card-header border-top">
                            <h3 class="card-title">Kelime ile ara</h3>
                        </div>
                        <div class="card-body">
                            <div class="input-group">
                                <input type="text" class="form-control br-tl-3  br-bl-3" name="aranan" placeholder="Örn: Boğaz Manzaralı">
                            </div>
                        </div>

                        @if(count($kategori->subcategory)>0)
                        <div class="card-header border-top">
                            <h3 class="card-title">Kategori Seç</h3>
                        </div>
                        <div class="card-body">
                            <div class="" id="container">
                                <div class="filter-product-checkboxs">
                                    @foreach($kategori->subcategory as $kat)
                                    <label class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" name="kategoriler[]" value="{{$kat->id}}" {{in_array($kat->id, $kategoriler)==true ? 'checked' : ''}}>
                                        <span class="custom-control-label">
												<a href="javascript:void(0)" class="text-dark">{{$kat->name}}<span class="label label-secondary float-right">{{count($kat->ilan)}}</span></a>
											</span>
                                    </label>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                        @endif
                        <!-- FİYAT ARALIĞI-->
                        <div class="card-header border-top">
                            <h3 class="card-title">Fiyat Aralığı</h3>
                        </div>
                        <div class="card-body">
                            <h6>
                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="number" class="form-control br-tl-3  br-bl-3" name="fiyat_min" placeholder="Min" value="{{old('fiyat_min')}}">
                                    </div>

                                    <div class="col-md-5">
                                        <input type="number" class="form-control br-tl-3  br-bl-3" name="fiyat_max" placeholder="Max" value="{{old('fiyat_max')}}">
                                    </div>
                                </div>
                            </h6>
                        </div>
                        <!-- DURUM -->
                        <div class="card-header border-top">
                            <h3 class="card-title">Durum</h3>
                        </div>
                        <div class="card-body">
                                <select class="form-control select-sm select2" name="durum" data-size="7" title="İlan Tipi Seçiniz" >
                                    <option value="">Seçiniz</option>
                                    <option value="1" {{old('durum')==1 ? 'selected' : ''}}  >Satılık</option>
                                    <option value="2" {{old('durum')==2 ? 'selected' : ''}}>Kiralık</option>
                                    <option value="3" {{old('durum')==3 ? 'selected' : ''}}>Devren Satılık</option>
                                    <option value="4" {{old('durum')==4 ? 'selected' : ''}}>Devren Kiralık</option>
                                </select>

                        </div>
                        <!-- ÖZELLİKLER -->
                        <div class="card-header border-top">
                            <h3 class="card-title">Özellikler</h3>
                        </div>
                        <div class="card-body">
                            <div class="filter-product-checkboxs">
                                <label class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" name="takas" value="1" {{old('takas')!=null ? 'checked' : ''}}>
                                    <span class="custom-control-label">
											Takasa Uygun
										</span>
                                </label>
                                <label class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" name="kredi" value="1" {{old('kredi')!=null ? 'checked' : ''}}>
                                    <span class="custom-control-label">
											Krediye Uygun
										</span>
                                </label>
                                <label class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" name="acil_acil" value="1" {{old('acil_acil')!=null ? 'checked' : ''}}>
                                    <span class="custom-control-label">
											Acil Acil!
										</span>
                                </label>
                                @if($kategori->id==39 or $kategori->id==40 or $kategori->id==41 or $kategori->id==10)
                                @else
                                    @if($kategori->id==1 or $kategori->master->id==1)
                                <label class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" name="esyali" value="1" {{old('esyali')!=null ? 'checked' : ''}}>
                                    <span class="custom-control-label">
											Eşyalı
										</span>
                                </label>
                                <label class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" name="site" value="1" {{old('site')!=null ? 'checked' : ''}}>
                                    <span class="custom-control-label">
											Site İçerisinde
										</span>
                                </label>
                                    @endif
                                @endif
                                @if($kategori->id==39)
                                    <label class="custom-control custom-checkbox mb-2">
                                        <input type="checkbox" class="custom-control-input" name="katkarsiligi" value="1" {{old('katkarsiligi')!=null ? 'checked' : ''}}>
                                        <span class="custom-control-label">
											Kat Karşılığı
										</span>
                                    </label>
                                @endif
                            </div>
                        </div>
                        <!-- BOYUT -->
                        <div class="card-header border-top">
                            <h3 class="card-title">Boyut m²</h3>
                        </div>
                        <div class="card-body">
                            <h6>
                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="number" class="form-control br-tl-3  br-bl-3" name="boyut_min" placeholder="Min" value="{{old('boyut_min')}}">
                                    </div>

                                    <div class="col-md-5">
                                        <input type="number" class="form-control br-tl-3  br-bl-3" name="boyut_max" placeholder="Max" value="{{old('boyut_max')}}">
                                    </div>
                                </div>
                            </h6>
                        </div>
                        @if($kategori->id==39 or $kategori->id==40 or $kategori->id==41 or $kategori->id==10)
                        @else
                            @if($kategori->id==1 or $kategori->master->id==1)
                        <!-- ODA SAYISI -->
                        <div class="card-header">
                            <h3 class="card-title">Oda Sayısı</h3>
                        </div>
                        <div class="card-body">
                            <div class="" id="container1">
                                <div class="filter-product-checkboxs">
                                    @foreach($daireboyut as $entry)
                                        <label class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input" name="oda[]" value="{{$entry->id}}" {{in_array($entry->id, $oda)==true ? 'checked' : ''}}>
                                            <span class="custom-control-label">
												<a href="#" class="text-dark">{{$entry->name}}</a>
											</span>
                                        </label>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                        @endif
                        @endif

                    @if($kategori->id==39)
                        <!-- İMAR DURUMU -->
                        <div class="card-header border-top">
                            <h3 class="card-title">İmar Durumu</h3>
                        </div>
                        <div class="card-body">
                                <select class="form-control select-sm select2" name="imar" data-size="7" title="İlan Tipi Seçiniz" >
                                    @foreach($ilanarsa as $entry)
                                        <option value="{{$entry->id}}" {{in_array($entry->id, $oda)==true ? 'selected' : ''}}>{{$entry->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                        @endif

                        <div class="card-footer">
                            <input type="hidden" value="1" name="arama">
                            <button type="submit" class="btn btn-secondary btn-block">Filtrele</button>
                        </div>
                    </div>
                    </form>
                </div>
                <!--/Right Side Content-->
            </div>
        </div>
    </section>
    <!--/Add Listings-->

    <!-- Newsletter-->
    <section class="sptb bg-white border-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-xl-6 col-md-12">
                    <div class="sub-newsletter">
                        <h3 class="mb-2"><i class="fa fa-paper-plane-o mr-2"></i> Subscribe To Our Newsletter</h3>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-6 col-md-12">
                    <div class="input-group sub-input mt-1">
                        <input type="text" class="form-control input-lg " placeholder="Enter your Email">
                        <div class="input-group-append ">
                            <button type="button" class="btn btn-primary btn-lg br-tr-3  br-br-3">
                                Subscribe
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Newsletter-->
@endsection
@section('footer')
    <script type="text/javascript">
        function telGoster(n) {
            var x = document.getElementById("telDiv"+n);
            var y = document.getElementById("buttonDiv"+n);
            if (x.style.display === "none") {
                x.style.display = "block";
                y.style.display = "none";
            } else {
                x.style.display = "none";
            }
        }
    </script>
@endsection
