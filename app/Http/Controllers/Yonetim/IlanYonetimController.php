<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Models\Ilan;
use App\Models\IlanKategori;
use App\Models\IlanResim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class IlanYonetimController extends Controller
{
    public function index(){
        //POST ARAMA
        if (request()->filled('aranan'))
        {
            request()->flash();
            $aranan = request('aranan');
            $list = Ilan::where('baslik', 'like', "%$aranan%")
                ->orWhere('aciklama', 'like', "%$aranan%")
                ->orWhere('slug', 'like', "%$aranan%")
                ->orderByDesc('id')
                ->paginate(8)
                ->appends('aranan', $aranan);
        } else {
            //kullanıcıları kayıt sırasına göre çektik
            $list = Ilan::with('user', 'kategori')->paginate(8);

        }
        return view('yonetim.ilan.anasayfa', compact('list'));
    }

    public function form($id){
        $entry = Ilan::where('id', $id)->first();
        $kategoriler = IlanKategori::all();
        return view('yonetim.ilan.form', compact('entry', 'kategoriler'));
    }

    public function kaydet($id, Request $request){
        $entry = Ilan::where('id', $id)->first();

        return back();
    }

    public function sil($id){
        $ilan = Ilan::where('id', $id)->first();
        $ilan->delete();
        return back()->with('mesaj', 'İlan silindi');
    }

    public function onaybekleyen(){
        if (request()->filled('aranan'))
        {
            request()->flash();
            $aranan = request('aranan');
            $list = Ilan::where('baslik', 'like', "%$aranan%")
                ->where('onaylandi_mi', 0)
                ->orWhere('aciklama', 'like', "%$aranan%")
                ->orWhere('slug', 'like', "%$aranan%")
                ->orderByDesc('id')
                ->paginate(8)
                ->appends('aranan', $aranan);
        } else {
            //kullanıcıları kayıt sırasına göre çektik
            $list = Ilan::with('user', 'kategori')->where('onaylandi_mi', 0)->paginate(8);

        }
        return view('yonetim.ilan.onay', compact('list'));
    }
    public function onayla($id){
        $ilan = Ilan::where('id', $id)->first();
        $ilan->onaylandi_mi = 1;
        $ilan->save();
        return back();
    }
}
