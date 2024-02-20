@extends('katmanlar.master')
@section('title', 'Toprak Konut - Giriş Yap')
@section('content')
    <!--Sliders Section-->
    <section>
        <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white">
                        <h1 class="">Giriş Yap</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{route('anasayfa')}}">Anasayfa</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Giriş Yap</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Sliders Section-->

    @include('katmanlar.menu.alert')
    @include('katmanlar.menu.error')
    <!--Login-Section-->
    <section class="sptb">
        <div class="container customerpage">
            <div class="row">
                <div class="single-page" >
                    <div class="col-lg-5 col-xl-4 col-md-6 d-block mx-auto">
                        <div class="wrapper wrapper2">
                            <form id="login" class="card-body" tabindex="500" action="{{ route('login') }}" method="POST">
                                @csrf
                                <h3>Giriş Yap</h3>
                                <div class="mail">
                                    <input type="email" name="email" required>
                                    <label>E-Posta Adresi</label>
                                </div>
                                <div class="passwd">
                                    <input type="password" name="password" required>
                                    <label>Şifre</label>
                                </div>
                                <div class="submit">
                                    <button type="submit" class="btn btn-primary btn-block" href="index.html">Giriş Yap</button>
                                </div>
                                <p class="mb-2"><a href="{{route('password.request')}}" >Şifrenizi mi unuttunuz?</a></p>
                                <p class="text-dark mb-0">Hesabınız Yok Mu?<a href="{{route('register')}}" class="text-primary ml-1">Kayıt Ol!</a></p>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Login-Section-->
@endsection
