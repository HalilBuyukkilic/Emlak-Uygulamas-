@extends('katmanlar.usermaster')
@section('title', 'Yorumlarım')
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
                    <h3>Yorumlarım</h3>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="{{route('dashboard')}}">Profilim</a></li>
                            <li><a href="{{route('yorumlarim')}}">Yorumlarım</a></li>
                        </ul>
                    </nav>
                </div>

                <!-- Row -->
                <div class="row">

                    <!-- Dashboard Box -->
                    <div class="col-xl-6">
                        <div class="dashboard-box margin-top-0">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-material-outline-business"></i> Yorumlarım - Yorum Yapmak İçin <a href="{{route('hizmet.liste')}}">Hizmet İlanları</a>na Git</h3>
                            </div>

                            <div class="content">
                                <ul class="dashboard-box-list">
                                    @if(count($yapilanlar)==0)
                                        <li>
                                            <div class="boxed-list-item">
                                                <!-- Content -->
                                                <div class="item-content">
                                                    <h4>Hiç Yorum Yapmadın</h4>

                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                    @foreach($yapilanlar as $yor)
                                    <li>
                                        <div class="boxed-list-item">
                                            <!-- Content -->
                                            <div class="item-content">
                                                <h4><a href="{{route('hizmet', $yor->hizmet->slug)}}">{{$yor->hizmet->title}}</a></h4>
                                                <div class="item-details margin-top-10">
                                                    <div class="star-rating" data-rating="{{$yor->rating}}.0"></div>
                                                    <div class="detail-item"><i class="icon-material-outline-date-range"></i> {{ \Carbon\Carbon::parse($yor->created_at)->format('d/m/Y') }}</div>
                                                </div>
                                                <div class="item-description">
                                                    <p>{{$yor->yorum}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>

                        <!-- Pagination
                        <div class="clearfix"></div>
                        <div class="pagination-container margin-top-40 margin-bottom-0">
                            <nav class="pagination">
                                <ul>
                                    <li><a href="#" class="ripple-effect current-page">1</a></li>
                                    <li><a href="#" class="ripple-effect">2</a></li>
                                    <li><a href="#" class="ripple-effect">3</a></li>
                                    <li class="pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="clearfix"></div>
                        -->

                    </div>

                    <!-- Dashboard Box -->
                    @if($user->hizmetveren==1)
                    <div class="col-xl-6">
                        <div class="dashboard-box margin-top-0">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-material-outline-face"></i> Hizmet Veren Olarak Aldığın Yorumlar</h3>
                            </div>

                            <div class="content">
                                <ul class="dashboard-box-list">
                                    @if(count($alinanlar)==0)
                                        <li>
                                            <div class="boxed-list-item">
                                                <!-- Content -->
                                                <div class="item-content">
                                                    <h4>Hiç Yorum Almadın</h4>

                                                </div>
                                            </div>
                                        </li>
                                        @endif
                                    @foreach($alinanlar as $yor)
                                        <li>
                                            <div class="boxed-list-item">
                                                <!-- Content -->
                                                <div class="item-content">
                                                    <h4><a href="{{route('hizmet', $yor->hizmet->slug)}}">{{$yor->hizmet->title}}</a></h4>
                                                    <div class="item-details margin-top-10">
                                                        <div class="star-rating" data-rating="{{$yor->rating}}.0"></div>
                                                        <div class="detail-item"><i class="icon-material-outline-date-range"></i> {{ \Carbon\Carbon::parse($yor->created_at)->format('d/m/Y') }}</div>
                                                    </div>
                                                    <div class="item-description">
                                                        <p>{{$yor->yorum}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                        @endif


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
