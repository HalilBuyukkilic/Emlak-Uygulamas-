<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Models\Hizmet;
use Illuminate\Http\Request;

class HizmetYonetimController extends Controller
{
    public function index(){
        //POST ARAMA
        if (request()->filled('aranan'))
        {
            request()->flash();
            $aranan = request('aranan');
            $list = Hizmet::where('title', 'like', "%$aranan%")
                ->orWhere('text', 'like', "%$aranan%")
                ->orWhere('slug', 'like', "%$aranan%")
                ->orderByDesc('id')
                ->paginate(8)
                ->appends('aranan', $aranan);
        } else {
            //kullanıcıları kayıt sırasına göre çektik
            $list = Hizmet::with('user', 'kategori')->paginate(8);

        }
        return view('yonetim.hizmet.anasayfa', compact('list'));
    }

    public function form($id){
        $entry = Hizmet::where('id', $id)->first();
        return view('yonetim.hizmet.form', compact('entry'));
    }

    public function kaydet($id, Request $request){
        $entry = Hizmet::where('id', $id)->first();

        $entry->title = $request->baslik;
        $entry->il = $request->il;
        $entry->price = $request->price;
        $entry->text = $request->test;
        $entry->sorular = $request->sorular;
        $entry->onaylandi_mi = $request->onaylandi_mi;
        $entry->save();
        return back();
    }

    public function sil($id){
        $ilan = Hizmet::where('id', $id)->first();
        $ilan->delete();
        return back()->with('mesaj', 'Hizmet silindi');
    }

    public function onaybekleyen(){
        if (request()->filled('aranan'))
        {
            request()->flash();
            $aranan = request('aranan');
            $list = Ilan::where('title', 'like', "%$aranan%")
                ->where('onaylandi_mi', 0)
                ->orWhere('text', 'like', "%$aranan%")
                ->orWhere('slug', 'like', "%$aranan%")
                ->orderByDesc('id')
                ->paginate(8)
                ->appends('aranan', $aranan);
        } else {
            //kullanıcıları kayıt sırasına göre çektik
            $list = Hizmet::with('user', 'kategori')->where('onaylandi_mi', 0)->paginate(8);

        }
        return view('yonetim.hizmet.onay', compact('list'));
    }
    public function onayla($id){
        $ilan = Hizmet::where('id', $id)->first();
        $ilan->onaylandi_mi = 1;
        $ilan->save();
        return back();
    }
}
