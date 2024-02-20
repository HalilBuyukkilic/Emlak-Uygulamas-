@extends('katmanlar.usermaster')
@section('title', 'Kullanıcı Paneli - Mesaj')
@section('content')
    <!-- Dashboard Container -->
    <div class="dashboard-container">
    @include('kullanici.sidebar')
    <!-- Dashboard Content
        ================================================== -->
        @if($mesaj->hizmet_veren_id == $user->id || $mesaj->hizmet_alan_id == $user->id)
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
                                    <li
                                    @if($mesaj->id == $mes->id)
                                    class="active-message"
                                        @endif
                                    >
                                        <a href="{{route('mesaj.tekli', $mes->id).'?'.Str::random(19)}}">
                                            <div class="message-avatar"><img src="/upload/image/users/{{$mes->katilimci->pp}}" alt="" /></div>

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
                                @if($mes->hizmet_alan_id==$user->id)
                                <h4>{{$mesaj->katilimci->name}}</h4>
                                @else
                                    <h4>{{$mesaj->katilimcii->name}}</h4>
                                @endif
                            </div>


                            <!-- Message Content Inner -->
                            <div class="message-content-inner">
                                @foreach($mesaj_mesajlar as $mes)

                                    @if($mes->user_id == Auth()->user()->id)
                                <!-- Time Sign -->
                                <div class="message-time-sign">
                                    <span>{{$mes->created_at}}</span>
                                </div>

                                <div class="message-bubble me">
                                    <div class="message-bubble-inner">


                                        <div class="message-text"><p>{{$mes->mesaj}}</p></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                        @elseif($mes->user_id != Auth()->user()->id)

                                <div class="message-time-sign">
                                    <span>{{$mes->created_at}}</span>
                                </div>

                                <div class="message-bubble">
                                    <div class="message-bubble-inner">


                                        <div class="message-text"><p>{{$mes->mesaj}}</p></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                        @endif
                                    @endforeach

                            </div>
                            <!-- Message Content Inner / End -->

                            <!-- Reply Area -->
                            <form id="ajaxform" validate>
                            <div class="message-reply">
                                <input type="hidden" value="{{$mesaj->id}}" name="mesaj_id">
                                <input name="mesaj" placeholder="Mesajınız" required>
                                <button class="button ripple-effect mesaj-gonder">Gönder</button>
                            </div>
                            </form>

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
        @else
        @endif

    </div>
    <!-- Dashboard Container / End -->
@endsection
@section('footer')
    <script>

        $(".mesaj-gonder").click(function(event){
            event.preventDefault();

            let mesaj = $("input[name=mesaj]").val();
            let mesaj_id = $("input[name=mesaj_id]").val();
            let _token   = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "/profilim/mesaj/gonder",
                type:"POST",
                data:{
                    mesaj:mesaj,
                    mesaj_id:mesaj_id,
                    _token: _token
                },
                success:function(response){
                    console.log(response);
                    if(response) {
                        $('.success').text(response.success);
                        $("#ajaxform")[0].reset();
                        location.reload();
                    }
                },
            });
        });
    </script>
@endsection
