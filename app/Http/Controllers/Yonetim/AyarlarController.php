<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Models\Ayarlar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AyarlarController extends Controller
{
    public function form($id = 1)
    {
        $entry = DB::table('ayarlar')->find($id);
        return view('yonetim.ayarlar.form', compact('entry'));
    }
    //ÜRÜN GÜNCELLEME
    public function kaydet($id = 1, Request $request)
    {

        $ayar = Ayarlar::where('id', $id)->first();

        $ayar->baslik = $request->baslik;
        $ayar->meta = $request->meta;
        $ayar->google_analytics = $request->google_analytics;
        $ayar->telefon = $request->telefon;
        $ayar->adres = $request->adres;
        $ayar->facebook = $request->facebook;
        $ayar->instagram = $request->instagram;
        $ayar->twitter = $request->twitter;
        $ayar->linkedn = $request->linkedin;
        $ayar->pinterest = $request->pinterest;
        $ayar->lat = $request->lat;
        $ayar->long = $request->long;
$ayar->email = $request->email;
        $ayar->save();


        return redirect()
            ->route('yonetim.ayarlar', $id);
        //->with('mesaj' ($id>0 ? 'Güncellendi' : 'Kaydedildi'))
    }
}
