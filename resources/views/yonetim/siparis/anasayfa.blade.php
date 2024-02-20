@extends('yonetim.katmanlar.master')
@section('title', 'Panel')
@section('content')
    <div>
        <main id="main-container">
            <!-- Hero -->
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                        <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">{{config('app.name'). " | Sipariş Yönetimi"}}</h1>
                        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item">
                                    <a href="{{route('yonetim.anasayfa')}}">Panel</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('yonetim.siparis')}}">Siparişler</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- END Hero -->

            <!-- Page Content -->
            <div class="content">
                <!-- Your Block -->
                <!-- Search -->
                <div class="p-3 bg-white rounded push">
                    <form action="{{route('yonetim.siparis')}}" method="post">
                        @csrf
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control form-control-alt" id="aranan" name="aranan" placeholder="Siparişlerde Ara" value="{{old('aranan')}}">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-success mr-1 mb-3">
                                    <i class="fa fa-fw fa-search mr-1"></i> Ara
                                </button>
                            </div>

                        </div>
                        <p>ARAMA YAPARKEN SADECE NUMARALARI KULLANIN. ÖRN: 2245875</p>

                    </form>
                </div>
                <!-- YÜKLEMELER -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Tüm Siparişler
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="pinned_toggle">
                                <i class="si si-pin"></i>
                            </button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <!-- Bakiye Yükleme Table -->
                        <div class="table-responsive">
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Sipariş Tablosu</h3>

                                <div class="block-options">
                                </div>
                            </div>
                            <div class="block-content">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-vcenter">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;">#</th>
                                            <th style="width: 30%;">Alıcı</th>
                                            <th style="width: 15%;">Sipariş No</th>
                                            <th style="width: 20%">ÖDEME</th>
                                            <th style="width: 20%;">Sipariş Tarihi</th>
                                            <th style="width: 15%;">Tutar</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($list) == 0)
                                            <tr><td class="text-center"  colspan="8"> Kayıt Bulunamadı</td></tr>
                                        @endif
                                        @foreach($list as $entry)
                                        <tr>
                                            <td>{{$entry->id}}</td>
                                            <td class="font-w600">
                                                <a href="{{route('yonetim.kullanici.duzenle', $entry->user->id)}}">{{$entry->user->name.' '.$entry->user->surname}}</a>
                                            </td>
                                            <td><strong>TK - {{$entry->siparis_no}}</strong></td>
                                            <td>{{$entry->odeme_tipi.' - '.$entry->son_dort_hane}}</td>
                                            <td><em class="text-muted">{{$entry->created_at}}</em></td>
                                            <td class="font-w600">
                                                {{$entry->tutar}} ₺
                                            </td>

                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td class="font-w600">


                                            </td>
                                            <td></td>
                                            <td class="font-w600">Toplam:
                                                @php($toplam=0)
                                                @foreach($list as $entry2)
                                                    @php($toplam = $entry2->tutar+$toplam)
                                                @endforeach
                                                <strong>{{$toplam}}₺</strong>
                                            </td>
                                            <td class="font-w600">
                                                Kesinti(Iyzico):
                                                {{$toplam*3/100}}₺
                                            </td>

                                            <td class="font-w600">
                                                Net Kazanç:
                                                <strong>{{$toplam-($toplam*3/100)}} ₺</strong>
                                            </td>

                                        </tr>
                                        </tbody>
                                    </table>
                                    {{$list->appends('aranan', old('aranan'))->links()}}
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- END Full Table -->
                    </div>
                </div>



                <!-- HARCAMALAR -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Tüm Harcamalar
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="pinned_toggle">
                                <i class="si si-pin"></i>
                            </button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <!-- Bakiye Yükleme Table -->
                        <div class="table-responsive">
                            <div class="block block-rounded">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Harcama Tablosu</h3>

                                    <div class="block-options">
                                    </div>
                                </div>
                                <div class="block-content">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-vcenter">
                                            <thead>
                                            <tr>
                                                <th class="text-center" style="width: 50px;">#</th>
                                                <th style="width: 30%;">Harcayan</th>
                                                <th style="width: 15%;">Sipariş No</th>
                                                <th style="width: 20%;">Sipariş Tarihi</th>
                                                <th style="width: 15%;">Tutar</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($list) == 0)
                                                <tr><td class="text-center"  colspan="8"> Kayıt Bulunamadı</td></tr>
                                            @endif
                                            @foreach($list2 as $entry)
                                                <tr>
                                                    <td>{{$entry->id}}</td>
                                                    <td class="font-w600">
                                                        <a href="{{route('yonetim.kullanici.duzenle', $entry->user->id)}}">{{$entry->user->name.' '.$entry->user->surname}}</a>
                                                    </td>
                                                    <td><strong>TK - {{$entry->siparis_no}}</strong></td>
                                                    <td><em class="text-muted">{{$entry->created_at}}</em></td>
                                                    <td class="font-w600">
                                                        {{$entry->tutar}} ₺
                                                    </td>

                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td class="font-w600">


                                                </td>
                                                <td></td>
                                                <td class="font-w600">
                                                    @php($toplam=0)
                                                    @foreach($list2 as $entry3)
                                                        @php($toplam = $entry3->tutar+$toplam)
                                                    @endforeach
                                                    <strong></strong>
                                                </td>


                                                <td class="font-w600">
                                                    Net Harcama:
                                                    <strong>{{$toplam}} ₺</strong>
                                                </td>

                                            </tr>
                                            </tbody>
                                        </table>
                                        {{$list->appends('aranan', old('aranan'))->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Full Table -->
                    </div>
                </div>
            </div>

        </main>
        <!-- END Main Container -->

    </div>
@endsection
