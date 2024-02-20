@extends('katmanlar.master')
@section('title', 'Toprak Konut - Kayıt Ol')
@section('content')
    <!-- Titlebar
================================================== -->
    <!--Breadcrumb-->
    <section>
        <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white">
                        <h1 class="">Kayıt Ol</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{route('register')}}">Anasayfa</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Kayıt Ol</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Breadcrumb-->

    <!--Register-section-->
    <section class="sptb">
        <div class="container customerpage">
            @include('katmanlar.menu.alert')
            @include('katmanlar.menu.error')
            <div class="row">
                <div class="single-page" >
                    <div class="col-lg-6 col-xl-6 col-md-12 d-block mx-auto">
                        <div class="wrapper wrapper2">
                            <form method="POST" action="{{ route('register') }}" id="Register" class="card-body" tabindex="500">
                                @csrf
                                <h3>Kayıt Ol</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                         <input type="radio" name="account_type_radio" value="0" checked>
                                        <p style="color: black"> Hizmet Alan </p>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="radio" name="account_type_radio" value="2">
                                        <p style="color: black"> Hizmet Veren </p>
                                    </div>
                                </div>

                                <div class="name">
                                    <input type="text" name="name" id="name_register" style="text-transform:uppercase" value="{{old('name')}}" required>
                                    <label>İsim*</label>
                                </div>
                                <div class="surname">
                                    <input type="text" name="surname" id="surname_register" value="{{old('surname')}}" style="text-transform:uppercase" required>
                                    <label>Soyisim*</label>
                                </div>
                                <div class="tcno">
                                    <input type="number" name="tcno" id="tcno" value="{{old('tcno')}}" style="text-transform:uppercase" required>
                                    <label>T.C Kimlik Numarası*</label>
                                </div>
                                <div class="dogumyili">
                                    <input type="number" name="dogumyili" id="dogumyili" value="{{old('dogumyili')}}" style="text-transform:uppercase" required>
                                    <label>Doğum Yılı*</label>
                                </div>
                                <div class="mail">
                                    <input type="email" name="email" id="emailaddress_register" value="{{old('email')}}" required>
                                    <label>E-Posta Adresiniz</label>
                                </div>
                                <div class="passwd">
                                    <input type="password" name="password" id="password-register" required>
                                    <label>Şifre</label>
                                </div>
                                <div class="passwd">
                                    <input type="password" name="password_confirmation" id="password-repeat-register" required>
                                    <label>Şifre Tekrar</label>
                                </div>

                                <div class="submit">
                                    <button type="submit" class="btn btn-primary btn-block">Kayıt Ol</button>
                                </div>
                                <p class="text-dark mb-0">Hesabınız var mı?<a href="{{route('login')}}" class="text-primary ml-1">Giriş Yapın</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Register-section-->
@endsection
