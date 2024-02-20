@extends('katmanlar.usermaster')
@section('title', 'Kullanıcı Paneli - Mesajlarım')
@section('content')
    <!-- Dashboard Container -->
    <div class="dashboard-container">
    @include('kullanici.sidebar')
        <!-- Dashboard Content
        ================================================== -->
        <div class="dashboard-content-container" data-simplebar>
            <div class="dashboard-content-inner" >

                <!-- Dashboard Headline -->
                <div class="dashboard-headline">
                    <h3>Mesajlar</h3>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="{{route('dashboard')}}">Profilim</a></li>
                            <li>Mesajlar</li>
                        </ul>
                    </nav>
                </div>

                <div class="messages-container margin-top-0">

                    <div class="messages-container-inner">

                        <!-- Messages -->
                        <div class="messages-inbox">
                            <div class="messages-headline">
                           <p>Mesajlarım</p>
                            </div>

                            <ul>
                                @foreach($mesajlar as $mes)
                                <li>
                                    <a href="{{route('mesaj.tekli', $mes->id).'?'.Str::random(19)}}">
                                        <div class="message-avatar"><img src="/upload/image/users/nopp.jpg" alt="" /></div>

                                        <div class="message-by">
                                            <div class="message-by-headline">
                                                @if($mes->hizmet_alan_id==$user->id)
                                                <h5>{{$mes->katilimci->name}}</h5>
                                                @else
                                                    <h5>{{$mes->katilimcii->name}}</h5>
                                                    @endif
                                                <span>{{\Carbon\Carbon::parse($mes->created_at)->diffInDays()}} Gün Önce </span>
                                            </div>
                                            @if(isset($mes->hizmet->title))
                                            <p>{{$mes->hizmet->title}}</p>
                                                @endif
                                        </div>
                                    </a>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                        <!-- Messages / End -->

                        <!-- Message Content -->
                        <div class="message-content">

                            <div class="messages-headline">
                                <h4>Mesajınız burada gözükecek</h4>
                            </div>

                            <!-- Message Content Inner -->
                            <div class="message-content-inner">

                                <!-- Time Sign -->
                                <div class="message-time-sign">
                                    <span>Mesaj Seçmediniz...</span>
                                </div>

                            </div>
                            <!-- Message Content Inner / End -->

                            <!-- Reply Area -->


                        </div>
                        <!-- Message Content -->

                    </div>
                </div>
                <!-- Messages Container / End -->




                <!-- Footer -->
@include('kullanici.copyright')
                <!-- Footer / End -->

            </div>
        </div>
        <!-- Dashboard Content / End -->

    </div>
    <!-- Dashboard Container / End -->
@endsection
