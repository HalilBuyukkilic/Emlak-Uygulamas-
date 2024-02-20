
<!--Kayıt mesajı -->
@if(session()->has('mesaj'))
    <div class="container">
        <div class="alert alert-success">
            {{session('mesaj')}}
        </div>
    </div>
@endif
<!--Kayıt mesajı BİTTİ -->

<!--Ürün eklendi mesajı -->
@if(session()->has('mesaj_sepet'))
    <div class="container">
        <div class="alert alert-{{session('mesaj_tur')}}">
            {{session('mesaj_sepet')}}
        </div>
    </div>
@endif
<!--Ürün Eklendi BİTTİ -->

<!--Ürün eklendi mesajı -->
@if(session()->has('mesaj_sepetkaldir'))
    <div class="container">
        <div class="alert alert-{{session('mesaj_tur')}}">
            {{session('mesaj_sepetkaldir')}}
        </div>
    </div>
@endif
<!--Ürün Eklendi BİTTİ -->

<!--Ürün eklendi mesajı -->
@if(session()->has('mesaj_sepetbosalt'))
    <div class="container">
        <div class="alert alert-{{session('mesaj_tur')}}">
            {{session('mesaj_sepetbosalt')}}
        </div>
    </div>
@endif
<!--Ürün Eklendi BİTTİ -->

<!--Ürün eklendi mesajı -->
@if(session()->has('mesaj_sepetguncelle'))
    <div class="container">
        <div class="alert alert-{{session('mesaj_tur')}}">
            {{session('mesaj_sepetbosalt')}}
        </div>
    </div>
@endif
<!--Ürün Eklendi BİTTİ -->

