@extends('yonetim.katmanlar.master')
@section('title', 'Panel')
@section('content')
    <div>
        <main id="main-container">
            <!-- Hero -->
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                        <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">{{config('app.name'). " | İletişim Formu"}}</h1>
                        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item">
                                    <a href="{{route('yonetim.anasayfa')}}">Panel</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('yonetim.form')}}">Raporlar</a>
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
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Tüm Raporlar
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
                        <!-- Kategori Table -->
                        <div class="table-responsive">
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Tablo</h3>

                            </div>
                            <div class="block-content">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-vcenter">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;">#</th>
                                            <th style="width: 30%;">Ad Soyad</th>
                                            <th style="width: 20%">Mail</th>
                                            <th style="width: 20%;">Telefon</th>
                                            <th style="width: 20%;">Konu</th>
                                            <th style="width: 20%;">Mesaj</th>
                                            <th style="width: 10%;">Tarih</th>
                                            <th class="text-center" style="width: 100px;">İşlemler</th>
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
                                                {{$entry->name}}
                                            </td>

                                            <td>{{$entry->email}}</td>
                                            <td>{{$entry->telefon}}</td>
                                            <td>{{$entry->konu}}</td>
                                            <td>{{$entry->mesaj}}</td>
                                            <td>{{$entry->created_at}}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <form action="{{route('yonetim.form.sil')}}">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$entry->id}}">
                                                        <button type="submit" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Sil" onclick="return confirm('Okuduğunuza emin misiniz?')">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </form>
                                                </div>

                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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
