<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Sorular;
use Illuminate\Http\Request;

class KategoriYonetimController extends Controller
{
    public function index(Request $request){
        if ($request->has('aranan')){
            $list = Kategori::where('name', 'like', "%$request->aranan%")->paginate(10);
        }else{
            $list = Kategori::paginate(10);
        }
       return view('yonetim.kategori.anasayfa', compact('list'));
    }

    public function form($id){

        $list = Kategori::where('id', $id)->first();
        return view('yonetim.kategori.form', compact('list'));
    }
    public function kaydet(Request $request, $id){
        $kategori = Kategori::where('id', $id)->first();
        if ($request->has('kategoriduzenle')){
            $kategori->name = $request->name;
            $kategori->meta = $request->meta;
            $kategori->slug = $request->slug;
            $kategori->min = $request->min;
            $kategori->max = $request->max;
            if (request()->hasFile('resim')) {
                $this->validate(request(), [
                    'resim' => 'image|mimes:jpg,png,jpeg,gif|max:4096'
                ]);
                $pp = request()->file('resim');
                $pp = request()->resim;
                $dosyaadi = $kategori->name . "-" . time() . "." . $pp->getClientOriginalName();

                if ($pp->isValid()) {
                    $pp->move('upload/image/kategori', $dosyaadi);
                    $kategori->resim = $dosyaadi;
                }
            }
            $kategori->save();
        }

        if ($request->has('soruekleme')){



            $cevaplar = [];
            $cevap = [];

            $soru = $request->soru;
            $cevaplar['soru'] = $soru;
            $dilimler = explode(",", $request->cevap);

            foreach ($dilimler as $item){
                $dilim = explode(":", $item);
                $cevap[] = $dilim[0];

                $minmax = explode("-", $dilim[1]);

                $min[] = $minmax[0];

                $max[] = $minmax[1];
            }


            $cevaplar['cevap'] = $cevap;

            $sorucevaplar = json_encode($cevaplar);
            $min = json_encode($min);
            $max = json_encode($max);

            $kat = new Sorular();
            $kat->kategori_id = $kategori->id;
            $kat->json = $sorucevaplar;
            $kat->min = $min;
            $kat->max = $max;
            $kat->save();
        }

        $request->flash();
        return back()->with('mesaj', 'Başarıyla kaydedildi');
    }

    public function sil($id){
        $soru = Sorular::where('id', $id)->firstOrFail();
        $soru->delete();
        return back()->with('mesaj', 'Soru silindi.');
    }
}
