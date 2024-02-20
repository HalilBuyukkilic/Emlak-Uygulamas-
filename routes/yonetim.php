<?php

use Illuminate\Support\Facades\Route;


//ADMIN AREA
Route::group(['prefix'=>'yonetim'], function (){
    //ADMIN YÖNLENDİRMESİ
    Route::get('/', 'App\Http\Controllers\Yonetim\AnasayfaController@yonlendir');
    Route::match(['get','post'], '/oturumac', 'App\Http\Controllers\Yonetim\KullaniciController@oturumac')->name('yonetim.oturumac');
    Route::get('/oturumukapat', 'App\Http\Controllers\Yonetim\KullaniciController@oturumukapat')->name('yonetim.oturumukapat');


    Route::group(['middleware'=>'yonetim'], function () {
        Route::get('/anasayfa', 'App\Http\Controllers\Yonetim\AnasayfaController@index')->name('yonetim.anasayfa');
        Route::get('/cachesil', 'App\Http\Controllers\Yonetim\AnasayfaController@cachesil')->name('yonetim.cache.sil');
        Route::get('/sitemap-olustur', 'App\Http\Controllers\Yonetim\AnasayfaController@sitemap')->name('yonetim.sitemap');


        //Kullanıcıların yönetilmesi
        Route::group(['prefix'=>'kullanici'], function (){
            Route::match(['get','post'], '/', 'App\Http\Controllers\Yonetim\KullaniciYonetimController@index')->name('yonetim.kullanici');
            Route::get('/yeni', 'App\Http\Controllers\Yonetim\KullaniciYonetimController@form')->name('yonetim.kullanici.yeni');
            Route::get('/duzenle/{id}', 'App\Http\Controllers\Yonetim\KullaniciYonetimController@form')->name('yonetim.kullanici.duzenle');
            Route::post('/kaydet/{id?}', 'App\Http\Controllers\Yonetim\KullaniciYonetimController@kaydet')->name('yonetim.kullanici.kaydet');
            Route::get('/sil/{id}', 'App\Http\Controllers\Yonetim\KullaniciYonetimController@sil')->name('yonetim.kullanici.sil');
            Route::match(['get','post'], '/kullanici-onaylama', 'App\Http\Controllers\Yonetim\KullaniciYonetimController@onaylamaindex')->name('yonetim.kullanici.onaylamaindex');
            Route::get('/onayla/{id}', 'App\Http\Controllers\Yonetim\KullaniciYonetimController@onayla')->name('yonetim.kullanici.onayla');
            Route::get('/reddet/{id}', 'App\Http\Controllers\Yonetim\KullaniciYonetimController@reddet')->name('yonetim.kullanici.reddet');
        });
        //KATEGORİ YÖNETİMİ
        Route::group(['prefix'=>'kategori'], function (){
            Route::match(['get','post'], '/', 'App\Http\Controllers\Yonetim\KategoriYonetimController@index')->name('yonetim.kategori');
            Route::match(['get','post'], '/duzenle/{id}', 'App\Http\Controllers\Yonetim\KategoriYonetimController@form')->name('yonetim.kategori.form');
            Route::post('/kaydet/{id}', 'App\Http\Controllers\Yonetim\KategoriYonetimController@kaydet')->name('yonetim.kategori.kaydet');
            Route::get('/sil/{id}', 'App\Http\Controllers\Yonetim\KategoriYonetimController@sil')->name('yonetim.kategori.sil');
        });
        //İLAN YÖNETİMİ
        Route::group(['prefix'=>'ilan'], function (){
            Route::match(['get','post'], '/', 'App\Http\Controllers\Yonetim\IlanYonetimController@index')->name('yonetim.ilan');
            Route::match(['get','post'], '/onaybekleyenler', 'App\Http\Controllers\Yonetim\IlanYonetimController@onaybekleyen')->name('yonetim.ilan.onaybekleyen');
            Route::get('/onayla/{id}', 'App\Http\Controllers\Yonetim\IlanYonetimController@onayla')->name('yonetim.ilan.onayla');
            Route::get('/duzenle/{id}', 'App\Http\Controllers\Yonetim\IlanYonetimController@form')->name('yonetim.ilan.form');
            Route::post('/kaydet/{id}', 'App\Http\Controllers\Yonetim\IlanYonetimController@kaydet')->name('yonetim.ilan.kaydet');
            Route::get('/sil/{id}', 'App\Http\Controllers\Yonetim\IlanYonetimController@sil')->name('yonetim.ilan.sil');
        });

        //HİZMET YÖNETİMİ
        Route::group(['prefix'=>'hizmet'], function (){
            Route::match(['get','post'], '/', 'App\Http\Controllers\Yonetim\HizmetYonetimController@index')->name('yonetim.hizmet');
            Route::match(['get','post'], '/onaybekleyenler', 'App\Http\Controllers\Yonetim\HizmetYonetimController@onaybekleyen')->name('yonetim.hizmet.onaybekleyen');
            Route::get('/onayla/{id}', 'App\Http\Controllers\Yonetim\HizmetYonetimController@onayla')->name('yonetim.hizmet.onayla');
            Route::get('/duzenle/{id}', 'App\Http\Controllers\Yonetim\HizmetYonetimController@form')->name('yonetim.hizmet.form');
            Route::post('/kaydet/{id}', 'App\Http\Controllers\Yonetim\HizmetYonetimController@kaydet')->name('yonetim.hizmet.kaydet');
            Route::get('/sil/{id}', 'App\Http\Controllers\Yonetim\HizmetYonetimController@sil')->name('yonetim.hizmet.sil');
        });
        //SİPARİŞ YÖNETİMİ
        Route::group(['prefix'=>'siparis'], function (){
            Route::match(['get','post'], '/', 'App\Http\Controllers\Yonetim\SiparisYonetimController@index')->name('yonetim.siparis');
            Route::get('/yeni', 'App\Http\Controllers\Yonetim\SiparisYonetimController@form')->name('yonetim.siparis.yeni');
            Route::get('/duzenle/{id}', 'App\Http\Controllers\Yonetim\SiparisYonetimController@form')->name('yonetim.siparis.duzenle');
            Route::post('/kaydet/{id?}', 'App\Http\Controllers\Yonetim\SiparisYonetimController@kaydet')->name('yonetim.siparis.kaydet');
            Route::get('/sil/{id}', 'App\Http\Controllers\Yonetim\SiparisYonetimController@sil')->name('yonetim.siparis.sil');
        });
        //AYARLAR
        Route::group(['prefix'=>'ayarlar'], function (){
            Route::match(['get','post'], '/', 'App\Http\Controllers\Yonetim\AyarlarController@form')->name('yonetim.ayarlar');
            Route::get('/duzenle/{id}', 'App\Http\Controllers\Yonetim\AyarlarController@form')->name('yonetim.ayarlar.duzenle');
            Route::post('/kaydet/{id?}', 'App\Http\Controllers\Yonetim\AyarlarController@kaydet')->name('yonetim.ayarlar.kaydet');
        });
        //BLOG
        Route::group(['prefix'=>'blog'], function (){
            Route::match(['get','post'], '/', 'App\Http\Controllers\Yonetim\BlogYonetimController@index')->name('yonetim.blog');
            Route::get('/yeni', 'App\Http\Controllers\Yonetim\BlogYonetimController@form')->name('yonetim.blog.yeni');
            Route::get('/duzenle/{id}', 'App\Http\Controllers\Yonetim\BlogYonetimController@form')->name('yonetim.blog.duzenle');
            Route::post('/kaydet/{id?}', 'App\Http\Controllers\Yonetim\BlogYonetimController@kaydet')->name('yonetim.blog.kaydet');
            Route::get('/sil/{id}', 'App\Http\Controllers\Yonetim\BlogYonetimController@sil')->name('yonetim.blog.sil');
            Route::get('/yenikategori', 'App\Http\Controllers\Yonetim\BlogYonetimController@formk')->name('yonetim.blog.kategori.yeni');
            Route::get('/duzenlek/{id}', 'App\Http\Controllers\Yonetim\BlogYonetimController@formk')->name('yonetim.blog.kategori.duzenle');
            Route::post('/kaydetk/{id?}', 'App\Http\Controllers\Yonetim\BlogYonetimController@kaydetk')->name('yonetim.blog.kategori.kaydet');
            Route::get('/silk/{id}', 'App\Http\Controllers\Yonetim\BlogYonetimController@silk')->name('yonetim.blog.kategori.sil');
        });
        //BİLGİ
        Route::group(['prefix'=>'bilgi'], function (){
            Route::match(['get','post'], '/', 'App\Http\Controllers\Yonetim\BilgiController@form')->name('yonetim.bilgi');
            Route::get('/duzenle/{id}', 'App\Http\Controllers\Yonetim\BilgiController@form')->name('yonetim.bilgi.duzenle');
            Route::post('/kaydet/{id?}', 'App\Http\Controllers\Yonetim\BilgiController@kaydet')->name('yonetim.bilgi.kaydet');
        });
        // İLETİŞİM FORMU
        Route::group(['prefix'=>'form'], function (){
            Route::match(['get','post'], '/', 'App\Http\Controllers\Yonetim\RaporController@index')->name('yonetim.form');
            Route::get('/sil/', 'App\Http\Controllers\Yonetim\RaporController@sil')->name('yonetim.form.sil');
        });
        Route::group(['prefix'=>'sayfa'], function () {
            Route::match(['get', 'post'], '/', 'App\Http\Controllers\Yonetim\SayfaController@index')->name('yonetim.sayfa');
            Route::get('/yeni', 'App\Http\Controllers\Yonetim\SayfaController@form')->name('yonetim.sayfa.yeni');
            Route::get('/duzenle/{id}', 'App\Http\Controllers\Yonetim\SayfaController@form')->name('yonetim.sayfa.duzenle');
            Route::post('/kaydet/{id?}', 'App\Http\Controllers\Yonetim\SayfaController@kaydet')->name('yonetim.sayfa.kaydet');
            Route::get('/sil/{id}', 'App\Http\Controllers\Yonetim\SayfaController@sil')->name('yonetim.sayfa.sil');
        });
    });
});
