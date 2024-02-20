<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogKategori;
use App\Models\Hizmet;
use App\Models\Ilan;
use App\Models\IlanKategori;
use App\Models\Kategori;
use App\Models\UserHarcama;
use App\Models\UserSiparis;

use App\Models\User;
use Illuminate\Http\Request;
use Cache;
USE DB;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Carbon\Carbon;

class AnasayfaController extends Controller
{
    public function index()
    {

        $toplam = 0;
        $kullanicilar = User::all();
        $userhizmetveren = User::where('hizmetveren', 1)->get();
        $siparis = UserSiparis::all();
        foreach ($siparis as $entry){
            $toplam = $entry->tutar+$toplam;
        }
        $harcama = UserHarcama::all();
        $toplamharcama =0;
        foreach ($harcama as $entry2){
            $toplamharcama = $entry2->tutar+$toplamharcama;
        }

        $toplamilanharcama = 0;
        $ilanharcama = UserSiparis::where('ilan_mi', 1)->get();
        foreach ($ilanharcama as $entry3){
            $toplamilanharcama = $ilanharcama->tutar+$toplamilanharcama;
        }

        return view('yonetim.anasayfa',
        compact(
            'kullanicilar',
            'toplam',
            'toplamharcama',
            'toplamilanharcama',
            'userhizmetveren',
            'siparis',
            'harcama',
        ));
    }
    public function queue(){
        \Artisan::call('queue:work --once');
    }
    public function cachesil()
    {
        Cache::flush();
        \Artisan::call('view:clear');
        \Artisan::call('cache:clear');
        \Artisan::call('config:clear');


        return redirect('/yonetim/anasayfa')
            ->with('mesaj_tur', 'success')
            ->with('mesaj','Cache Silindi');
    }

    public function yonlendir(){
        return view('yonetim.oturumac');
    }

    public function sitemap(){

        $sitemap = Sitemap::create()
            ->add(Url::create('/'))
            ->add(Url::create('/sektorel-haberler'))
            ->add(Url::create('/hizmet-al'))
            ->add(Url::create('/iletisim'));
        /** Now you haved added custom URL's, now add dynamic URL's for SEO */
        $ilanlar = Ilan::all();
        foreach ($ilanlar as $entry) {
            $sitemap->add(Url::create("/ilan/{$entry->slug}"));
        }
        $hizmetler = Hizmet::all();
        foreach ($hizmetler as $entry) {
            $sitemap->add(Url::create("/hizmet/{$entry->slug}"));
        }
        $hizmetkat = Kategori::all();
        foreach ($hizmetkat as $entry) {
            $sitemap->add(Url::create("/hizmet-kategori/{$entry->slug}"));
        }
        $ilankat = IlanKategori::all();
        foreach ($ilankat as $entry) {
            $sitemap->add(Url::create("/kategori/{$entry->slug}"));
        }
        $blogkat = BlogKategori::all();
        foreach ($blogkat as $entry) {
            $sitemap->add(Url::create("/sektorel-haberler/kategori/{$entry->slug}"));
        }
        $blog = Blog::all();
        foreach ($blog as $entry) {
            $sitemap->add(Url::create("/sektorel-haberler/yazi/{$entry->slug}"));
        }
        $sitemap->writeToFile('sitemap.xml');
        return back()->with('mesaj', 'Sitemap oluşturuldu. siteadi.com/sitemap.xml');
    }
}
