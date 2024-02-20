<?php

namespace App\Http\Controllers;

use App\Models\Hizmet;
use App\Models\Ilan;
use App\Models\IlanKategori;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Sitemap\SitemapGenerator;

class AnasayfaController extends Controller
{
    public function index(){

        $sonhizmetler = Hizmet::where('onaylandi_mi', 1)->orderby('created_at', 'desc')->take(5)->get();
        $konut = IlanKategori::where('id', 1)->first();
        $isyeri = IlanKategori::where('id', 10)->first();
        $arsa = IlanKategori::where('id', 39)->first();
        $bina = IlanKategori::where('id', 40)->first();
        $devremulk = IlanKategori::where('id', 41)->first();

        $hizmetler = Hizmet::all();
        $ilanlar = Ilan::all();
        $hizmetverenler = User::where('hizmetveren', 1)->get();
        $hizmetalanlar = User::where('hizmetveren', 0)->get();
        $acilacil = Ilan::where('acil_acil', 1)->where('onaylandi_mi', 1)->take(5)->get();

        //İLAN SAYMA
        //KONUT
        $altkat = $konut->subcategory()->get();
        foreach ($altkat as $alt) {
            $altkatid1 [] = $alt->id;
        }
        $konutcount = count(Ilan::where('ilan_kategori_id', $konut->id)->orWhereIn('ilan_kategori_id', $altkatid1)->get());
        //İŞYERİ
        $altkat = $isyeri->subcategory()->get();
        foreach ($altkat as $alt) {
            $altkatid2 [] = $alt->id;
        }
        $isyericount = count(Ilan::where('ilan_kategori_id', $isyeri->id)->orWhereIn('ilan_kategori_id', $altkatid2)->get());
        //DEVREMÜLK
        $altkat = $devremulk->subcategory()->get();
        foreach ($altkat as $alt) {
            $altkatid3 [] = $alt->id;
        }

        $onecikanhv = User::where('hizmetveren', 1)->orderbyDesc('rating')->take(10)->get();
        $devremulkcount = count(Ilan::where('ilan_kategori_id', $devremulk->id)->orWhereIn('ilan_kategori_id', $altkatid3)->get());
        return view('anasayfa', compact(
            'sonhizmetler',
            'konut',
            'isyeri',
            'arsa',
            'bina',
            'devremulk',
            'konutcount',
            'isyericount',
            'devremulkcount',
            'hizmetler',
            'ilanlar',
            'hizmetverenler',
            'hizmetalanlar',
            'acilacil',
            'onecikanhv',
        ));
    }

}
