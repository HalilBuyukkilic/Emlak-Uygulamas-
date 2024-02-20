@extends('yonetim.katmanlar.master')
@section('title', 'Panel')
@section('content')
    <div>
        <main id="main-container">
            <!-- Hero -->
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                        <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">{{$ayar->baslik." | Hizmetveren Onaylama"}}</h1>
                        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item">
                                    <a href="{{route('yonetim.anasayfa')}}">Panel</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('yonetim.kullanici')}}">Hizmet Verenler</a>
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
                    <form action="{{route('yonetim.kullanici')}}" method="post">
                        @csrf
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control form-control-alt" id="aranan" name="aranan" placeholder="Kullanıcı Ara" value="{{old('aranan')}}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-success mr-1 mb-3">
                                    <i class="fa fa-fw fa-search mr-1"></i> Ara
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- END Search -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Onay Bekleyen Hizmetverenler
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
                    <h3>@include('yonetim.katmanlar.menu.alert')</h3>
                    <div class="block-content">
                        <!-- Full Table -->
                        <div class="table-responsive">
                            <div class="block block-rounded">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Onay Bekleyenler</h3>
                                </div>
                                <div class="block-content">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-vcenter">
                                            <thead>
                                            <tr>
                                                <th class="text-center" style="width: 50px;">#</th>
                                                <th class="text-center" style="width: 100px;">
                                                    <i class="far fa-user"></i>
                                                </th>
                                                <th>İsim</th>
                                                <th style="width: 30%;">Mail</th>
                                                <th style="width: 15%;">TC</th>
                                                <th style="width: 15%;">Telefon</th>
                                                <th style="width: 15%;">Kategoriler</th>
                                                <th class="text-center" style="width: 100px;">İşlemler</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($list as $entry)
                                                <tr>
                                                    <td>{{$entry->id}}</td>
                                                    <td class="text-center">
                                                        <img class="img-avatar img-avatar48" src="/upload/image/users/{{$entry->pp}}" alt="">
                                                    </td>
                                                    <td class="font-w600">
                                                        <a href="{{route('yonetim.kullanici.duzenle', $entry->id)}}">{{$entry->name}}</a>
                                                    </td>
                                                    <td><em class="text-muted"><a href="mailto:{{$entry->email}}" target="_BLANK">{{$entry->email}}</a></em></td>

                                                    <td>{{$entry->tcno}}</td>
                                                    <td>{{$entry->telefon}}</td>
                                                    <td>@foreach($entry->kategori as $ll)
                                                       {{$ll->name}}
                                                        @endforeach
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a href="{{route('yonetim.kullanici.onayla', $entry->id)}}">
                                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Onayla">
                                                                    <i class="fa fa-check"></i>
                                                                </button>
                                                            </a>
                                                            <a href="{{route('yonetim.kullanici.reddet', $entry->id)}}">
                                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Reddet" onclick="return confirm('Kullanıcıyı Silmek İstediğinize Emin Misiniz?')">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
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
                <!-- END Your Block -->
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->

    </div>
@endsection
