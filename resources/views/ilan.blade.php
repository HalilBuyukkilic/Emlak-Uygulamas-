@extends('katmanlar.master')
@section('title', 'Toprak Konut - '.$ilan->baslik)
@section('meta', $ilan->aciklama)
@section('content')


    <!--Breadcrumbs Section-->
    <div class="bannerimg cover-image bg-background3" data-image-src="/images/arsa.jpg">
        <div class="header-text mb-0">
            <div class="container">
                <div class="text-center text-white ">
                    <h1 class="">{{$ilan->baslik}}</h1>
                </div>
            </div>
        </div>
    </div>

		<!--Breadcrumb-->
		<div class="bg-white border-bottom">
			<div class="container">
				<div class="page-header">
					<h4 class="page-title">İlan Bilgileri</h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('ilan.kategori', $ilan->kategori->slug)}}">{{$ilan->kategori->name}}</a></li>
						<li class="breadcrumb-item active" aria-current="page">{{$ilan->baslik}}</li>
					</ol>
				</div>
			</div>
		</div>
		<!--/Breadcrumb-->

		<!--Add listing-->
		<section class="sptb">
			<div class="container">
				<div class="row">

					<!--Left Side Content-->
					<div class="col-xl-4 col-lg-4 col-md-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">İlan Sahibi</h3>
							</div>
							<div class="card-body  item-user">
								<div class="profile-pic mb-0">
									<img src="/upload/image/users/{{$ilan->user->pp}}" class="brround avatar-xxl" alt="{{$ilan->user->name}}-avatar-toprak-konut">
									<div class="">
										<a href="userprofile.html" class="text-dark"><h4 class="mt-3 mb-1 font-weight-semibold">
                                            {{$ilan->user->name.' '.$ilan->user->surname}}</h4></a>
										<span class="text-muted">{{ \Carbon\Carbon::parse($ilan->user->created_at)->format('Y') }} Yılından Beri Üye</span>
										<h6 class="mt-2 mb-0"><a href="#" class="btn btn-primary btn-sm">Tüm İlanlarını Gör</a></h6>
									</div>
								</div>
							</div>
							<div class="card-body item-user">
								<h4 class="mb-4">İletişim Bilgileri</h4>
								<div>
									<h6><span class="font-weight-semibold"><i class="fa fa-envelope mr-2 mb-2"></i></span><a href="mailto:{{$ilan->user->email}}" class="text-body"> {{$ilan->user->email}}</a></h6>
									<h6><span class="font-weight-semibold"><i class="fa fa-phone mr-2  mb-2"></i></span><a href="tel:{{$ilan->user->telefon}}" class="text-primary"> {{$ilan->user->telefon}}</a></h6>
								</div>
							</div>
							<div class="card-footer">
								<div class="text-left">
									<a  href="tel:{{$ilan->user->telefon}}"  class="btn  btn-purple"><i class="fa fa-phone"></i> Ara</a>
                                    <a  href="#" data-toggle="modal" data-target="#mesajgonder" class="btn  btn-info"><i class="fa fa-envelope"></i> Mesaj</a>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Paylaşın!</h3>
							</div>
							<div class="card-body product-filter-desc">
								<div class="product-filter-icons text-center">
                                    <a href="javascript:void(0)" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{env('APP_URL')}}/ilan/{{$ilan->slug}}','','toolbar=no,scrollbars=no,resizable=no,width=1100,height=480')" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                                    <a href="javascript:void(0)" onclick="window.open('https://twitter.com/intent/tweet?url={{env('APP_URL')}}/ilan/{{$ilan->slug}}','','toolbar=no,scrollbars=no,resizable=no,width=1100,height=480')" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                                    <a href="javascript:void(0)" onclick="window.open('https://pinterest.com/pin/create/button/?url={{env('APP_URL')}}/ilan/{{$ilan->slug}}','','toolbar=no,scrollbars=no,resizable=no,width=1100,height=480')" class="pinterest-bg"><i class="fa fa-pinterest"></i></a>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">İlan Konumu</h3>
							</div>
							<div class="card-body">
								<div class="map-header">
									<div class="map-header-layer" id="map2"></div>
								</div>
							</div>
						</div>

						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Benzer İlanlar</h3>
							</div>
							<div class="card-body pb-3">
								<ul class="vertical-scroll">
                                    @foreach($benzerilanlar as $il)
									<li class="news-item">
										<table>
											<tr>
												<td><img src="/upload/image/ilan/{{$il->resim->first()->resim}}" alt="{{$il->baslik}}-thumbnail" class="w-8 border"/></td>
												<td><h5 class="mb-1 ">{{$il->baslik}}</h5><a href="{{route('ilan', $il->slug)}}" class="btn-link">Görüntüle</a><span class="float-right font-weight-bold">{{number_format($il->fiyat)}}₺</span></td>
											</tr>
										</table>
									</li>
                                    @endforeach
								</ul>
							</div>
						</div>

					</div>
					<!--/Left Side Content-->

					<div class="col-xl-8 col-lg-8 col-md-12">
						<!--Add Description-->
						<div class="card overflow-hidden">
							<div class="ribbon ribbon-top-right text-danger"><span class="bg-danger">{{$ilan->durum}}</span></div>
							<div class="card-body h-100">
								<div class="item-det mb-4">
									<a href="#" class="text-dark"><h3 class="">{{$ilan->baslik}}</h3></a>
									<ul class="d-flex">
										<li class="mr-5"><a href="{{route('ilan.kategori', $ilan->kategori->slug)}}" class="icons"><i class="icon icon-briefcase text-muted mr-1"></i>
                                            {{$ilan->kategori->name}}</a></li>
										<li class="mr-5"><a href="#" class="icons"><i class="icon icon-location-pin text-muted mr-1"></i>
                                            {{$ilan->il.' / '.$ilan->ilce}}</a></li>

									</ul>
								</div>
								<div class="product-slider">
									<div id="carousel" class="carousel slide" data-ride="carousel">
										<div class="arrow-ribbon2 bg-primary">{{number_format($ilan->fiyat)}} ₺</div>
										<div class="carousel-inner">
											<div class="carousel-item active"> <img src="/upload/image/ilan/{{$ilan->resim->first()->resim}}" alt="img"> </div>
                                            @foreach($ilan->resim as $key => $res)
                                                @if($key>0)
											<div class="carousel-item"> <img src="/upload/image/ilan/{{$res->resim}}" alt="img"> </div>
                                                @endif
                                            @endforeach
										</div>
										<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
											<i class="fa fa-angle-left" aria-hidden="true"></i>
										</a>
										<a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
											<i class="fa fa-angle-right" aria-hidden="true"></i>
										</a>
									</div>

								</div>
							</div>
						</div>
                        <!-- Açıklama -->
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">İlan Açıklaması</h3>
							</div>
							<div class="card-body">
								<div class="mb-4">
									<p>{{$ilan->aciklama}}</p>
								</div>
                            </div>
                        </div>

                        <!-- Özellikler -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Özellikler</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="row">
                                    <div class="col-xl-6 col-md-6">
                                        <ul class="list-unstyled widget-spec mb-0">
                                            <li class="mb-3">
                                                <i class="fa fa-location-arrow text-muted w-5"></i> <strong class="mr-1">Konum:</strong> {{$ilan->il.' / '.$ilan->ilce}}
                                            </li>
                                            <li class="mb-3">
                                                <i class="fa fa-dollar text-muted w-5"></i><strong class="mr-1">Fiyat:</strong> {{number_format($ilan->fiyat)}} ₺
                                            </li>
                                            @if($ilan->durum == 'Satılık' or $ilan->durum == 'Devren Satılık')
                                            <li class="mb-3">
                                                <i class="fa fa-money text-muted w-5"></i><strong class="mr-1">Krediye Uygun: </strong>@if($ilan->kredi==1)Evet @else Hayır @endif
                                            </li>
                                            <li class="mb-3">
                                                <i class="fa fa-money text-muted w-5"></i><strong class="mr-1">Takasa Uygun:</strong>@if($ilan->takas==1) Evet @else Hayır @endif
                                            </li>
                                            @else
                                            @endif
                                            @if($ilan->kategori->id==39 or $ilan->kategori->id==40 or $ilan->kategori->id==41)

                                            @else
                                            <li class="mb-3">
                                                <i class="fa fa-external-link text-muted w-5"></i><strong class="mr-1">Brüt m²:</strong>{{$ilan->brut}} m²
                                            </li>
                                            <li class="mb-3">
                                                <i class="fa fa-external-link text-muted w-5"></i><strong class="mr-1">Net m²:</strong>{{$ilan->net}} m²
                                            </li>
                                                @if($ilan->kategori->master->id==10)
                                            <li class="mb-3">
                                                <i class="fa fa-external-link text-muted w-5"></i><strong class="mr-1">Açık Alan m²:</strong>{{$ilan->acik_alan}}m²
                                            </li>
                                                @endif
                                            @endif


                                        </ul>
                                    </div>

                                <!-- KONUT -->
                                @if(isset($ilan->kategori->master))
                                    @if( $ilan->kategori->master->id==1 )
                                                <div class="col-xl-6 col-md-6">
                                                    <ul class="list-unstyled widget-spec mb-0">
                                                        <li class="mb-3">
                                                            <i class="fa fa-bed text-muted w-5"></i><strong class="mr-1">Oda Sayısı:</strong> {{$daireboyut->where('id', $ilan->oda)->first()->name}}
                                                        </li>
                                                        <li class="mb-3">
                                                            <i class="fa fa-bath text-muted w-5"></i><strong class="mr-1">Banyo Sayısı</strong> {{$ilan->banyo_sayisi}}
                                                        </li>
                                                        <li class="mb-3">
                                                            <i class="fa fa-life-ring text-muted w-5"></i><strong class="mr-1">Isıtma:</strong> {{$ilan->isitma}}
                                                        </li>
                                                        <li class="mb-3">
                                                            <i class="fa fa-building-o text-muted w-5"></i> <strong class="mr-1">Bina Yaşı:</strong> {{$ilan->yas}}
                                                        </li>
                                                        <li class="mb-3">
                                                            <i class="fa fa-building text-muted w-5"></i> <strong class="mr-1">Kat Sayısı:</strong> {{$ilan->kat_sayisi}}
                                                        </li>
                                                        <li class="mb-3">
                                                            <i class="fa fa-building-o text-muted w-5"></i> <strong class="mr-1">Bulunduğu Kat:</strong> {{$ilan->bulundugu_kat}}
                                                        </li>
                                                        <li class="mb-3">
                                                            <i class="fa fa-delicious text-muted w-5"></i> <strong class="mr-1">Balkon:</strong> {{$ilan->balkon}}
                                                        </li>
                                                        <li class="mb-3">
                                                            <i class="fa fa-chain text-muted w-5"></i> <strong class="mr-1">Eşyalı Mı?:</strong> {{$ilan->esyali}}
                                                        </li>
                                                        <li class="mb-3">
                                                            <i class="fa fa-building text-muted w-5"></i> <strong class="mr-1">Site içerisinde mi?:</strong> {{$ilan->site}}
                                                        </li>
                                                        <li class="mb-3">
                                                            <i class="fa fa-money text-muted w-5"></i> <strong class="mr-1">Aidat:</strong> {{$ilan->aidat}}
                                                        </li>
                                                    </ul>
                                                </div>

                                    @endif
                                @endif

                                <!-- İŞYERİ -->
                            @if(isset($ilan->kategori->master))
                                @if($ilan->kategori->master->id==10)
                                            <div class="col-xl-6 col-md-6">
                                                <ul class="list-unstyled widget-spec mb-0">
                                                    <li class="mb-3">
                                                        <i class="fa fa-bed text-muted w-5"></i><strong class="mr-1">Oda Sayısı:</strong> {{$ilan->isyeri_oda_sayisi}} Oda
                                                    </li>
                                                    <li class="mb-3">
                                                        <i class="fa fa-pagelines text-muted w-5"></i><strong class="mr-1">Isıtma:</strong> {{$ilan->isitma}}
                                                    </li>
                                                    <li class="mb-3">
                                                        <i class="fa fa-building-o text-muted w-5"></i><strong class="mr-1">Giriş Yüksekliği:</strong> {{$ilan->giris_yuksekligi}} m
                                                    </li>
                                                </ul>
                                            </div>
                                @endif
                            @endif
                                <!-- ARSA -->
                                @if($ilan->kategori->id==39)
                                        <div class="col-xl-6 col-md-6">
                                            <ul class="list-unstyled widget-spec mb-0">
                                                <li class="mb-3">
                                                    <i class="fa fa-money text-muted w-5"></i> <strong class="mr-1">İmar Durumu:</strong> {{$ilanarsa->where('id', $ilan->imar_durumu)->first()->name}}
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fa fa-money text-muted w-5"></i> <strong class="mr-1">Ada No:</strong> {{$ilan->ada_no}}
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fa fa-money text-muted w-5"></i> <strong class="mr-1">Parsel No:</strong> {{$ilan->parsel_no}}
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fa fa-money text-muted w-5"></i> <strong class="mr-1">Pafta No:</strong> {{$ilan->pafta_no}}
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fa fa-money text-muted w-5"></i> <strong class="mr-1">Kaks (Emsal):</strong> {{$ilan->kaks}}
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fa fa-money text-muted w-5"></i> <strong class="mr-1">Gabari:</strong> {{$ilan->gabari}}
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fa fa-money text-muted w-5"></i> <strong class="mr-1">Tapu Durumu:</strong> {{$ilan->tapu_durumu}}
                                                </li>
                                                <li class="mb-3">
                                                    <i class="fa fa-money text-muted w-5"></i> <strong class="mr-1">Kat Karşılığı:</strong> {{$ilan->kat_karsiligi}}
                                                </li>
                                            </ul>
                                        </div>
                                @endif
							</div>
                            </div>
                        </div>
                        </div>
							<div class="card-footer">
								<div class="icons">
                                    @auth()
									<a href="#" class="btn btn-danger icons" data-toggle="modal" data-target="#report"><i class="icon icon-exclamation mr-1"></i> Şikayet Et</a>
                                    @endauth
                                    @guest()
                                            <a href="{{route('login')}}" class="btn btn-danger icons" ><i class="icon icon-exclamation mr-1"></i> Şikayet Et</a>
                                        @endguest
                                </div>
							</div>
						</div>
						<!--/Add Description-->

					</div>
				</div>
			</div>
		</section>
		<!--Add listing-->



		<!--Comment Modal -->
		<div class="modal fade" id="Comment" tabindex="-1" role="dialog"  aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleCommentLongTitle">Leave a Comment</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<input type="text" class="form-control" id="Comment-name" placeholder="Your Name">
						</div>
						<div class="form-group">
							<input type="email" class="form-control" id="Comment-email" placeholder="Email Address">
						</div>
						<div class="form-group mb-0">
							<textarea class="form-control" name="example-textarea-input" rows="6" placeholder="Message"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-success">Send</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Report Modal -->
    @auth()
		<div class="modal fade" id="report" tabindex="-1" role="dialog"  aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="examplereportLongTitle">Şikayet Et</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<div class="form-group mb-0">
							<textarea class="form-control" name="sikayet" rows="6" placeholder="Şikayetiniz"></textarea>
						</div>
					</div>
					<div class="modal-footer">
                        <input type="hidden" name="ilan_id" value="{{$ilan->id}}">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
						<button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>
						<button type="button" class="btn btn-success">Gönder</button>
					</div>
				</div>
			</div>
		</div>
    @endauth
    <!-- MESAJ -->
    <div class="modal fade" id="mesajgonder" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Mesaj Gönder</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <section class="sptb bg-white">
                        <div class="container">
                            <div class="section-title center-block text-center">
                                <h2>Mesaj Gönder</h2>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

                                            <form method="post" action="{{route('mesaj.gonder.yeni')}}">
                                                @csrf
                                                <textarea class="form-control" cols="10" name="mesaj" placeholder="Mesajınız" required> </textarea>

                                    <input type="hidden" value="{{$ilan->user->id}}" name="hizmet_veren_id">
                                    <button class="btn btn-secondary mt-5" type="submit">Gönder</button>
                                            </form>
                                    </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Geri</button>
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('footer')
    <script type="text/javascript">

        $(function() {
            $("#map2").googleMap();
            $("#map2").addMarker({
                coords: [{{$ilan->lat}}, {{$ilan->long}}], // GPS coords
                title: 'Konum', // Title
                text:  '<a target="_BLANK" class="btn btn-danger" href="https://www.google.com/maps/dir//{{$ilan->lat}},{{$ilan->long}}/{{'@'}}{{$ilan->lat}},{{$ilan->long}},9z/data=!4m2!4m1!3e0"> Yol Tarifi Al </a>' // HTML content
            });
        })


    </script>
@endsection
