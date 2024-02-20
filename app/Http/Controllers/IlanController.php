<?php

namespace App\Http\Controllers;

use App\Models\Ilan;
use App\Models\IlanKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IlanController extends Controller
{
    public  function  index($slug_ilan){

        $ilan = Ilan::whereSlug($slug_ilan)->first();
        $user = Auth::user();

        if ($user == null){
            if ($ilan->onaylandi_mi==0){
                return back()->with('mesaj', 'Hizmet İlanı Yayında Değil');
            }else{
                $ilanarsa = DB::table('ilan_arsa')->get();
                $daireboyut = DB::table('ilan_konut')->get();
                $benzerilanlar = Ilan::where('baslik', 'like', "%$ilan->title%")->where('il', 'like', "%$ilan->il%")->paginate(3);
                return view('ilan', compact('ilan', 'benzerilanlar', 'ilanarsa', 'daireboyut'));
            }
        }


        if ($user->yonetici_mi==0){
            if ($ilan->onaylandi_mi==0){
                return back()->with('mesaj', 'Hizmet İlanı Yayında Değil');
            }
        }elseif ($user->yonetici_mi==1) {
            $ilanarsa = DB::table('ilan_arsa')->get();
            $daireboyut = DB::table('ilan_konut')->get();
            $benzerilanlar = Ilan::where('baslik', 'like', "%$ilan->title%")->where('il', 'like', "%$ilan->il%")->paginate(3);
            return view('ilan', compact('ilan', 'benzerilanlar', 'ilanarsa', 'daireboyut'));
        }
    }

    public function kategori($slug_kategori, Request $request){
        $kategori = IlanKategori::whereSlug($slug_kategori)->first();
        $ilanarsa = DB::table('ilan_arsa')->get();
        $daireboyut = DB::table('ilan_konut')->get();
        $kategoriler = [];
        $oda = [];
        $imar = [];
        $lat = null;
        $long = null;

        //KATEGORİLERE GÖRE İLAN ATAMASI
        if (count($kategori->subcategory)==0){
            $ilan = Ilan::where('ilan_kategori_id', $kategori->id)->where('onaylandi_mi', 1);
        }else{
            $altkatid = [];
            $altkat = $kategori->subcategory()->get();
            foreach ($altkat as $alt){
                $altkatid [] = $alt->id;
            }
            $ilan = Ilan::where('ilan_kategori_id', $kategori->id)->orWhereIn('ilan_kategori_id', $altkatid)->where('onaylandi_mi', 1);

        }


        //FİLTRELEME
        if ($request->has('arama')){

            if ($request->aranan!=null){
                $ilan = $ilan->where('baslik', 'like', "%$request->aranan%")->orWhere('aciklama', 'like', "%$request->aranan");

            }//KELİME

            if ($request->durum!=null){
                if ($request->durum==1){
                    $durum = 'Satılık';
                }elseif ($request->durum==2){
                    $durum = 'Kiralık';
                }elseif ($request->durum==3){
                    $durum= 'Devren Satılık';
                }else {
                    $durum = 'Devren Kiralık';
                }

                $ilan = $ilan->where('durum', 'like', "%$durum%");

            }//DURUM


            if ($request->kategoriler!=null){
                $kategoriler = $request->kategoriler;

                $ilan = $ilan->whereIn('ilan_kategori_id', $kategoriler);

            }//KATEGORİ

            if ($request->takas!=null){
                $ilan = $ilan->where('takas', 1);

            }//TAKAS
            if ($request->kredi!=null){
                $ilan = $ilan->where('kredi', 1);

            }//KREDİ

            if ($request->fiyat_min!=null){
                $ilan = $ilan->where('fiyat', '>=', $request->fiyat_min)->where('fiyat', '<=', $request->fiyat_max);

            }//FİYAT

            if ($request->boyut_min!=null){
                $ilan = $ilan->where('net', '>', $request->boyut_min)->where('net', '<', $request->boyut_max);
            }//BOYUT

            if ($request->lat!=null){
                $lat = $request->lat;
                $long = $request->long;
                $ilan = $ilan->where('lat', '>=', $lat-0.2)->where('lat', '<=', $lat+0.2)->where('long', '>=', $long-0.2)->where('long', '<=', $long+0.2);
            }

            /*
             *
             * KONUT BÖLÜMÜ
             *
             */
            if ($request->oda!=null){
                $oda = $request->oda;
                $ilan = $ilan->whereIn('oda', $oda);

            }//ODA SAYISI
            if ($request->site!=null){
                $ilan = $ilan->where('site', 'Evet');

            }//SİTE İÇERİSİNDE
            if ($request->esyali!=null){
                $ilan = $ilan->where('esyali', 'Evet');
            }//SİTE İÇERİSİNDE

            /*
             *
             * ARSA BÖLÜMÜ
             *
             */

            if ($request->imar!=null){
                $imar = $request->imar;
                $ilan = $ilan->where('imar_durumu', $imar);

            }//İMAR
            if ($request->katkarsiligi!=null){
                $ilan = $ilan->where('kat_karsiligi', 'Evet');
            }//KAT KARŞILIĞI
            if ($request->acil_acil!=null){
                $ilan = $ilan->where('acil_acil', '1');
            }//ACİL ACİL
            if ($request->siralama!=null){
                if ($request->siralama=='newest'){
                    $ilan->orderByDesc('created_at');
                }
                if ($request->siralama=='pricelow'){
                    $ilan->orderByDesc('fiyat');
                }
                if ($request->siralama=='pricehigh'){
                    $ilan->orderBy('fiyat', 'asc');
                }


            }//SIRALAMA
        }//ARAMA İF

        $request->flash();
        $ilan = $ilan->paginate(8)->appends(request()->query());



        return view('ilan_kategori',
            compact(
                'kategori',
                'ilan',
                'ilanarsa',
                'daireboyut',
                'kategoriler',
                'oda',
                'imar',
                'lat',
                'long'
            ));
    }

    public function arama(Request $request){
        $lat = $request->cityLat;
        $long = $request->cityLng;
        $konum = $request->city2;
        $aranan = $request->aranan;
        $kategori = IlanKategori::where('id', $request->kategori)->first();

        return redirect('/kategori/'.$kategori->slug.'?aranan='.'&arama=1');
    }
}
