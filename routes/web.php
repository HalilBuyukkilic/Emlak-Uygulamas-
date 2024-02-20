<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\AnasayfaController@index')->name('anasayfa');

Route::get('/hizmet/{slug_hizmet}', 'App\Http\Controllers\HizmetController@index')->name('hizmet');
Route::get('/hizmet-kategori/{slug_kategori}', 'App\Http\Controllers\HizmetController@kategori')->name('hizmet.kategori');
Route::get('/hizmet-al', 'App\Http\Controllers\HizmetController@kategoritumu')->name('hizmet.kategori.tumu');
Route::get('/hizmetveren/{id}', 'App\Http\Controllers\HizmetController@hizmetveren')->name('hizmetveren');
Route::get('/queue-work', 'App\Http\Controllers\Yonetim\AnasayfaController@queue');
//İLANLAR
Route::get('/ilan/{slug_ilan}', 'App\Http\Controllers\IlanController@index')->name('ilan');
Route::get('/kategori/{slug_kategori}', 'App\Http\Controllers\IlanController@kategori')->name('ilan.kategori');
Route::get('/arama', 'App\Http\Controllers\IlanController@arama')->name('ilan.arama');
//BLOG
Route::get('/sektorel-haberler', 'App\Http\Controllers\BlogController@index')->name('blog');
Route::get('/sektorel-haberler/yazi/{slug_blogname}', 'App\Http\Controllers\BlogController@single')->name('blog_tekli');
Route::get('/sektorel-haberler/kategori/{slug_blogcategoryname}', 'App\Http\Controllers\BlogController@category')->name('blog_kategori');
Route::get('/profilim/hizmet-ekle/{kategori_slug}', 'App\Http\Controllers\KullaniciController@hizmetekle')->name('hizmet.ekle');
//İLETİŞİM
Route::get('/iletisim', function(){
   return view('iletisim');
})->name('iletisim');

Route::post('/iletisim/form-gonder', 'App\Http\Controllers\KullaniciController@iletisimformu')->name('iletisim.form');



Route::group(['middleware'=>'auth'], function () {
    Route::get('/profilim', 'App\Http\Controllers\KullaniciController@index')->name('dashboard');
    Route::get('/profilim/ayarlar', 'App\Http\Controllers\KullaniciController@ayarlar')->name('ayarlar');
    Route::post('/profilim/ayarlar-kaydet', 'App\Http\Controllers\KullaniciController@ayarlarkaydet')->name('ayarlar.kaydet');
    //HİZMETLER
    Route::get('/profilim/hizmetlerim', 'App\Http\Controllers\KullaniciController@hizmetlistele')->name('hizmet.liste');
    Route::post('/profilim/hizmetlerim/teklifler', 'App\Http\Controllers\KullaniciController@hizmettekliflistele')->name('hizmet.liste.teklif');
    Route::get('/profilim/hizmetlerim', 'App\Http\Controllers\KullaniciController@hizmetlistele')->name('hizmet.liste');

    Route::post('/profilim/hizmet-kaydet', 'App\Http\Controllers\KullaniciController@hizmetkaydet')->name('hizmet.kaydet');
    Route::post('/profilim/hizmetlerim/teklifi_kabul_et', 'App\Http\Controllers\KullaniciController@hizmettekliflistelekabul')->name('hizmet.liste.teklif.kabul');
    //YORUMLAMA
    Route::get('/profilim/yorumlarim', 'App\Http\Controllers\KullaniciController@yorumlarim')->name('yorumlarim');
    Route::post('/profilim/hizmetlerim/degerlendir', 'App\Http\Controllers\KullaniciController@hizmetteklifdegerlendir')->name('hizmet.liste.degerlendir');
    //YORUMLAMA SON
    //TEKLİF VERME
    Route::post('/hizmet_teklif_ver', 'App\Http\Controllers\KullaniciController@hizmetteklifver')->name('hizmet.teklif.ver');
    //MESAJLAŞMA
    Route::get('/profilim/mesajlarim', 'App\Http\Controllers\MesajController@index')->name('mesaj');
    Route::get('/profilim/mesaj/{id}', 'App\Http\Controllers\MesajController@tekli')->name('mesaj.tekli');
    Route::post('/profilim/mesaj/gonder', 'App\Http\Controllers\MesajController@gonder')->name('mesaj.gonder');
    Route::post('/profilim/mesaj/yenimesaj', 'App\Http\Controllers\MesajController@yenimesaj')->name('mesaj.gonder.yeni');
    //HİZMET VERENE ÖZEL
    Route::get('/bana-uygun-hizmetler', 'App\Http\Controllers\KullaniciController@banaozel')->name('banaozel');
    Route::get('/profilim/verdigim-teklifler', 'App\Http\Controllers\KullaniciController@tekliflerim')->name('tekliflerim');
    Route::post('/odeme/bakiye-yukle', 'App\Http\Controllers\OdemeController@index')->name('bakiye.yukle');
    Route::post('/odeme/odeme-yap', 'App\Http\Controllers\OdemeController@form')->name('bakiye.yukle.odeme.ekrani');
    Route::post('/odeme/sonuc', 'App\Http\Controllers\OdemeController@callback')->name('bakiye.yukle.odeme.sonuc');
    //BİLDİRİMLER
    Route::match(['get', 'post'],'/bildirim-okundu-yap', 'App\Http\Controllers\KullaniciController@bildirimler')->name('bildirimler');

    //İLAN EKLEME
    Route::get('/profilim/ilan-ekle', 'App\Http\Controllers\KullaniciController@ilaneklekategori')->name('ilan.ekle.kategori');
    Route::post('get-states-by-country', 'App\Http\Controllers\KullaniciController@getState');
    Route::post('get-cities-by-state', 'App\Http\Controllers\KullaniciController@getCity');
    Route::get('/profilim/ilan-bilgileri', 'App\Http\Controllers\KullaniciController@ilanekle')->name('ilan.ekle');
    Route::post('/profilim/ilan-kaydet', 'App\Http\Controllers\KullaniciController@ilankaydet')->name('ilan.kaydet');
    Route::get('/profilim/ilanlarim', 'App\Http\Controllers\KullaniciController@ilanlarim')->name('ilanlarim');
    Route::post('/profilim/ilanlarim-duzenle', 'App\Http\Controllers\KullaniciController@ilanlarimduzenle')->name('ilanlarim.duzenle');
    Route::post('/profilim/ilanlarim-kaydet', 'App\Http\Controllers\KullaniciController@ilanlarimduzenlekaydet')->name('ilanlarim.duzenle.kaydet');
    Route::delete('/profilim/ilanlarim-resim-sil/{id}', 'App\Http\Controllers\KullaniciController@ilanlarimduzenleresimsil')->name('ilanlarim.duzenle.resim.sil');
    Route::post('/profilim/ilanlarim-yukselt', 'App\Http\Controllers\IlanOdemeController@index')->name('ilanlarim.yukselt');
    Route::post('/profilim/ilanlarim-yukselt-odeme', 'App\Http\Controllers\IlanOdemeController@form')->name('ilanlarim.yukselt.odeme');
    Route::post('/odeme/sonuc/ilan', 'App\Http\Controllers\IlanOdemeController@callback')->name('ilanlarim.yukselt.odeme.sonuc');
});


Route::get('test/email', function(){

    $user = \Illuminate\Support\Facades\Auth::user();


    dispatch(new App\Jobs\SendKullaniciKayit($user));

    dd('send mail successfully !!');
});

require __DIR__.'/auth.php';
require __DIR__.'/yonetim.php';
