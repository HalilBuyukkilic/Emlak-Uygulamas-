@extends('katmanlar.usermaster')
@section('title', 'Tekliflerim')
@section('content')

    <!-- Dashboard Container -->
    <div class="dashboard-container">

        <!-- Dashboard Sidebar
        ================================================== -->
        @include('kullanici.sidebar')
        <!-- Dashboard Sidebar / End -->


        <!-- Dashboard Content
        ================================================== -->
        <div class="dashboard-content-container" data-simplebar>
            <div class="dashboard-content-inner" >

                <!-- Dashboard Headline -->
                <div class="dashboard-headline">
                    <h3>Tekliflerim</h3>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="{{route('dashboard')}}">Profilim</a></li>
                            <li>Tekliflerim</li>
                        </ul>
                    </nav>
                </div>

                <!-- Row -->
                <div class="row">

                    <!-- Tabs Container -->
                    <div class="tabs">
                        <div class="tabs-header">
                            <ul>
                                <li class="active"><a href="#tab-1" data-tab-id="1">Aktif</a></li>
                                <li><a href="#tab-2" data-tab-id="2">Kazanılan</a></li>
                                <li><a href="#tab-3" data-tab-id="3">Kaybedilen</a></li>
                                <li><a href="#tab-4" data-tab-id="4">Tümü</a></li>
                            </ul>
                            <div class="tab-hover"></div>
                            <nav class="tabs-nav">
                                <span class="tab-prev"><i class="icon-material-outline-keyboard-arrow-left"></i></span>
                                <span class="tab-next"><i class="icon-material-outline-keyboard-arrow-right"></i></span>
                            </nav>
                        </div>
                        <!-- Tab Content -->
                        <div class="tabs-content">
                            <div class="tab active" data-tab-id="1">
                                <div class="dashboard-box">

                                    <div class="content">
                                        <ul class="dashboard-box-list">

                                            @foreach($tumteklifler as $entry)
                                                @if($entry->hizmet->hizmet_veren_id==null)
                                                <li>
                                                    <!-- Job Listing -->
                                                    <div class="job-listing width-adjustment">

                                                        <!-- Job Listing Details -->
                                                        <div class="job-listing-details">

                                                            <!-- Details -->
                                                            <div class="job-listing-description">
                                                                <h3 class="job-listing-title"><a href="{{route('hizmet', $entry->hizmet->slug)}}">{{$entry->hizmet->title}}</a></h3>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Task Details -->
                                                    <ul class="dashboard-task-info">
                                                        <li><strong>{{$entry->teklif}} ₺</strong><span>Teklifiniz</span></li>
                                                        <li><strong>{{$entry->sure}} Gün</strong><span>Teslim Süresi</span></li>
                                                    </ul>

                                                    <!-- Buttons -->
                                                    <div class="buttons-to-right always-visible">
                                                        @if($entry->hizmet->hizmet_veren_id==$user->id)
                                                            <a class="button red ripple-effect ico" title="Kaybettin" data-tippy-placement="top"><i class="icon-feather-x"></i></a>
                                                        @elseif($entry->hizmet->hizmet_veren_id==null)
                                                            <a class="button  ripple-effect ico" title="Verilmedi" data-tippy-placement="top"><i class="icon-feather-minus"></i></a>
                                                        @else
                                                            <a class="button green ripple-effect ico" title="Kazandın" data-tippy-placement="top"><i class="icon-feather-check"></i></a>
                                                        @endif

                                                    </div>
                                                </li>
                                                    @endif
                                            @endforeach

                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="tab" data-tab-id="2">
                                <div class="dashboard-box">

                                    <div class="content">
                                        <ul class="dashboard-box-list">

                                            @foreach($tumteklifler as $entry)
                                                @if($entry->hizmet->hizmet_veren_id==$user->id)
                                                    <li>
                                                        <!-- Job Listing -->
                                                        <div class="job-listing width-adjustment">

                                                            <!-- Job Listing Details -->
                                                            <div class="job-listing-details">

                                                                <!-- Details -->
                                                                <div class="job-listing-description">
                                                                    <h3 class="job-listing-title"><a href="{{route('hizmet', $entry->hizmet->slug)}}">{{$entry->hizmet->title}}</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Task Details -->
                                                        <ul class="dashboard-task-info">
                                                            <li><strong>{{$entry->teklif}} ₺</strong><span>Teklifiniz</span></li>
                                                            <li><strong>{{$entry->sure}} Gün</strong><span>Teslim Süresi</span></li>
                                                        </ul>

                                                        <!-- Buttons -->
                                                        <div class="buttons-to-right always-visible">
                                                            @if($entry->hizmet->hizmet_veren_id==$user->id)
                                                                <a class="button red ripple-effect ico" title="Kaybettin" data-tippy-placement="top"><i class="icon-feather-x"></i></a>
                                                            @elseif($entry->hizmet->hizmet_veren_id==null)
                                                                <a class="button btn-blue ripple-effect ico" title="Verilmedi" data-tippy-placement="top"><i class="icon-feather-minus"></i></a>
                                                            @else
                                                                <a class="button green ripple-effect ico" title="Kazandın" data-tippy-placement="top"><i class="icon-feather-check"></i></a>
                                                            @endif

                                                        </div>
                                                    </li>

                                                @endif
                                            @endforeach

                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="tab" data-tab-id="3">
                                <div class="dashboard-box">

                                    <div class="content">
                                        <ul class="dashboard-box-list">

                                            @foreach($tumteklifler as $entry)
                                                @if($entry->hizmet->hizmet_veren_id!=$user->id and $entry->hizmet->hizmet_veren_id!=null)
                                                    <li>
                                                        <!-- Job Listing -->
                                                        <div class="job-listing width-adjustment">

                                                            <!-- Job Listing Details -->
                                                            <div class="job-listing-details">

                                                                <!-- Details -->
                                                                <div class="job-listing-description">
                                                                    <h3 class="job-listing-title"><a href="{{route('hizmet', $entry->hizmet->slug)}}">{{$entry->hizmet->title}}</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Task Details -->
                                                        <ul class="dashboard-task-info">
                                                            <li><strong>{{$entry->teklif}} ₺</strong><span>Teklifiniz</span></li>
                                                            <li><strong>{{$entry->sure}} Gün</strong><span>Teslim Süresi</span></li>
                                                        </ul>

                                                        <!-- Buttons -->
                                                        <div class="buttons-to-right always-visible">
                                                            @if($entry->hizmet->hizmet_veren_id==$user->id)
                                                                <a class="button red ripple-effect ico" title="Kaybettin" data-tippy-placement="top"><i class="icon-feather-x"></i></a>
                                                            @elseif($entry->hizmet->hizmet_veren_id==null)
                                                                <a class="button btn-blue ripple-effect ico" title="Verilmedi" data-tippy-placement="top"><i class="icon-feather-minus"></i></a>
                                                            @else
                                                                <a class="button green ripple-effect ico" title="Kazandın" data-tippy-placement="top"><i class="icon-feather-check"></i></a>
                                                            @endif

                                                        </div>
                                                    </li>
                                                @endif
                                            @endforeach

                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="tab" data-tab-id="4">
                                <div class="dashboard-box">

                                    <div class="content">
                                        <ul class="dashboard-box-list">

                                            @foreach($tumteklifler as $entry)
                                            <li>
                                                <!-- Job Listing -->
                                                <div class="job-listing width-adjustment">

                                                    <!-- Job Listing Details -->
                                                    <div class="job-listing-details">

                                                        <!-- Details -->
                                                        <div class="job-listing-description">
                                                            <h3 class="job-listing-title"><a href="{{route('hizmet', $entry->hizmet->slug)}}">{{$entry->hizmet->title}}</a></h3>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Task Details -->
                                                <ul class="dashboard-task-info">
                                                    <li><strong>{{$entry->teklif}} ₺</strong><span>Teklifiniz</span></li>
                                                    <li><strong>{{$entry->sure}} Gün</strong><span>Teslim Süresi</span></li>
                                                </ul>

                                                <!-- Buttons -->
                                                <div class="buttons-to-right always-visible">
                                                    @if($entry->hizmet->hizmet_veren_id==$user->id)
                                                        <a class="button red ripple-effect ico" title="Kaybettin" data-tippy-placement="top"><i class="icon-feather-x"></i></a>
                                                    @elseif($entry->hizmet->hizmet_veren_id==null)
                                                        <a class="button white ripple-effect ico" title="Verilmedi" data-tippy-placement="top"><i class="icon-feather-minus"></i></a>
                                                    @else
                                                        <a class="button green ripple-effect ico" title="Kazandın" data-tippy-placement="top"><i class="icon-feather-check"></i></a>
                                                    @endif

                                                </div>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tabs Container / End -->

                </div>
                <!-- Row / End -->

                <!-- Footer -->
                @include('kullanici.copyright')
                <!-- Footer / End -->

            </div>
        </div>
        <!-- Dashboard Content / End -->

    </div>
    <!-- Dashboard Container / End -->

@endsection
