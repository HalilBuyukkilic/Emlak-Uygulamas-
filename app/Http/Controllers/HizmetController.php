<?php

namespace App\Http\Controllers;

use App\Models\Hizmet;
use App\Models\Kategori;
use App\Models\Teklif;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HizmetController extends Controller
{
    public function index($slug_hizmet){
        $hizmet = Hizmet::whereSlug($slug_hizmet)->firstorFail();
        $kazanan= null;
        $sorular=null;
        $user = Auth::user();

        if ($user==null){
            return redirect()->route('login');
        }

        if ($user->yonetici_mi==0){
            if ($hizmet->onaylandi_mi==0){
            return back()->with('mesaj', 'Hizmet İlanı Yayında Değil');
            }
        }elseif ($user->yonetici_mi==1){
            if ($hizmet->hizmet_veren_id!=null){
                $kazanan = User::where('id', $hizmet->hizmet_veren_id)->first();
            }
            if ($hizmet->sorular!=null){
                $sorular = json_decode($hizmet->sorular);
                //dd(json_decode($hizmet->sorular));
            }
            return view('hizmet', compact('hizmet', 'kazanan', 'sorular'));
        }

        if ($hizmet->hizmet_veren_id!=null){
            $kazanan = User::where('id', $hizmet->hizmet_veren_id)->first();
        }
        if ($hizmet->sorular!=null){
        $sorular = json_decode($hizmet->sorular);
        //dd(json_decode($hizmet->sorular));
        }
        return view('hizmet', compact('hizmet', 'kazanan', 'sorular'));
    }

    public function kategori($slug_kategori){
        $kategori = Kategori::whereSlug($slug_kategori)->first();
        $altkategoriler= null ;
        $sorular = $kategori->sorular()->get();

        //SUBS
        if ($kategori->master_id ==null){
            $altkategoriler = $kategori->subcategory()->take(10)->get();
            $digeraltkategoriler = $kategori->subcategory()->get();
        }
        return view('hizmet_kategori', compact('kategori', 'altkategoriler', 'sorular'));
    }

    public function hizmetveren($id){
        $hizmetveren=User::where('id', $id)->first();
        $hizmetler = Hizmet::where('hizmet_veren_id', $hizmetveren->id)->get();
        return view('hizmetveren_profil', compact('hizmetveren', 'hizmetler'));
    }
    public function kategoritumu(Request $request){
        $kategoriler = Kategori::all();
        $aramasonuc = [];

        if ($request->has('aranan')){
            $aramasonuc = Kategori::where('name', 'like', "%$request->aranan%")->get();

        }
        $request->flash();
        return view('hizmet_kategori_tumu', compact('kategoriler', 'aramasonuc'));

    }
}
