@extends('katmanlar.usermaster')
@section('title', 'Kullanıcı Paneli - Hizmet Ekle')
@section('content')
    <div class="dashboard-container">

    @include('kullanici.sidebar')
    <div class="dashboard-content-container" data-simplebar>
        <div class="dashboard-content-inner" >

            <!-- Dashboard Headline -->
            <div class="dashboard-headline">
                <h3>Hizmet İlanı Ekle</h3>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="#">Profilim</a></li>
                        <li><a href="#">Hizmetler</a></li>
                        <li>Hizmet Ekle</li>
                    </ul>
                </nav>
            </div>

            <!-- Row -->
            <form action="{{route('hizmet.kaydet')}}" method="post">
                @csrf
            <div class="row">

                <!-- Dashboard Box -->
                <div class="col-xl-12">
                    <div class="dashboard-box margin-top-0">

                        <!-- Headline -->
                        <div class="headline">
                            <h3><i class="icon-feather-folder-plus"></i> Hizmet Ekleme Formu</h3>
                        </div>

                        @if(count($soru2)>0)
                        <div class="content with-padding padding-bottom-10">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="submit-field">
                                        <h5>Soru Cevaplarınız</h5>
                                    </div>
                                    <table class="basic-table">

                                        <tr>
                                            <th>Soru</th>
                                            <th>Cevabınız</th>
                                        </tr>
                                    @for($i=1;$i<=(count($soru2)/2);$i++)


                                            <tr>
                                                <td data-label="Soru">{{$soru2['soru_'.$i]}}</td>
                                                <td data-label="Cevabınız">{{$soru2['cevap_'.$i]}}</td>
                                            </tr>

                                    @endfor
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endif


                        <div class="content with-padding padding-bottom-10">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="submit-field">
                                        <h5>Hizmet İsteğiniz İçin Başlık Girin:</h5>
                                        <input type="text" name="title" class="with-border" placeholder="Örn. Hafriyat alımı için teklif" required>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="submit-field">
                                        <h5>Hizmet Kategorisis</h5>
                                        <p>{{$kategori->name}}</p>
                                        <input type="hidden" name="kategori_id" value="{{$kategori->id}}">
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="submit-field">
                                        <h5>Hizmet Alacağınız İl:</h5>
                                        <p>{{$il}}</p>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="submit-field">
                                        <h5>Tahmini Bütçeniz:</h5>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <p>{{$butce}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="submit-field">
                                            <h5>Hizmet Açıklaması:</h5>
                                            <p>{{$aciklama}}</p>
                                        </div>
                                    </div>
                                </div>

                            <div class="row">
                                <div class="col-xl-12">
                                    <input type="hidden" name="il" value="{{$il}}">
                                    <input type="hidden" name="price" value="{{$butce}}">
                                    <input type="hidden" name="text" value="{{$aciklama}}">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="sorular" value="{{$json}}">
                                    <button class="button ripple-effect big margin-top-30"><i class="icon-feather-plus"></i>Bilgileri Onayla ve Hizmeti Ekle</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 margin-top-30">
                                    <p>Hizmeti ekleyerek kullanım şartlarını kabul etmiş sayılırsınız.*</p>
                                    <p>Hizmet ilanı onaylandıktan sonra teklif aldığınızda sms ve eposta yolu ile bilgi verilecektir.</p>
                                </div>
                            </div>
                            </div>



                        </div>

                    </div>

                </div>



            </div>
            </form>
            <!-- Row / End -->

@include('kullanici.copyright')

        </div>
    </div>
    </div>
@endsection
@section('footer')
    <script>

    </script>
@endsection
