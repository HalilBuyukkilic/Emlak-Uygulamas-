<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KullaniciDetay;
use Auth;
use Hash;

class KullaniciYonetimController extends Controller
{
    //KULLANICILARI LİSTELEDİĞİMİZ SAYFA
    public function index(){
        //KULLANICI ARAMA
        if (request()->filled('aranan'))
        {
            request()->flash();
            $aranan = request('aranan');
            $list = User::where('name', 'like', "%$aranan%")
                ->orWhere('email', 'like', "%$aranan%")
                ->orWhere('surname', 'like', "%$aranan")
                ->orderByDesc('created_at')
                ->paginate(8)
                ->appends('aranan', $aranan);
        } else {
            //kullanıcıları kayıt sırasına göre çektik
            $list = User::orderByDesc('created_at')->paginate(8);

        }
        return view('yonetim.kullanici.anasayfa', compact('list'));
    }
    //KULLANICI DÜZENLEME SAYFASI
    public function form($id = 0)
    {
        $entry = new User;
        //DÜZENLEME AMACI İLE GELDİĞİMİZİ ANLIYORUZ
        if ($id>0)
        {
            $entry = User::find($id);
        }
        return view('yonetim.kullanici.form', compact('entry'));
    }
    //KULLANICI GÜNCELLEME
    public function kaydet($id = 0)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
        ]);
        //formdan gelen bilgileri dataya ekledik
        $data = request()->only('name', 'email', 'username', 'bio');
        //ŞİFRE DOLDURULDUYSA GÜNCELLİCEK
        if (request()->filled('password')){
            $data['password'] = Hash::make(request('password'));
        }
        //YÖNETİCİ Mİ? AKTİF Mİ?
        $data['aktif_mi']=request()->has('aktif_mi') ? 1:0;
        $data['yonetici_mi']=request()->has('yonetici_mi') ? 1:0;
        $data['author_mu']=request()->has('author_mu') ? 1:0;
        //KULLANICI IDSİ VARMI YOKMU? VARSA GÜNCELLE
        if ($id>0)
        {
            $entry = User::find($id);
            $entry->update($data);

        }
        else {
            $entry = User::create($data);
        }

        KullaniciDetay::updateOrCreate(
            ['user_id'=>$entry->id],
            [
                'bio'=>request('bio'),
            ]
        );
        return redirect()
            ->route('yonetim.kullanici');
        //->with('mesaj' ($id>0 ? 'Güncellendi' : 'Kaydedildi'))
    }
    public function sil($id)
    {
        User::destroy($id);
        return redirect()->route('yonetim.kullanici');
        //->with('mesaj', 'kayıt silindi')
    }

    public function onaylamaindex(){
        //KULLANICI ARAMA
        if (request()->filled('aranan'))
        {
            request()->flash();
            $aranan = request('aranan');
            $list = User::where('hizmetveren', 2)
            ->where('name', 'like', "%$aranan%")
                ->orWhere('email', 'like', "%$aranan%")
                ->orWhere('surname', 'like', "%$aranan")
                ->orderByDesc('created_at')
                ->paginate(8)
                ->appends('aranan', $aranan);
        } else {
            //kullanıcıları kayıt sırasına göre çektik
            $list = User::where('hizmetveren', 2)->orderByDesc('created_at')->paginate(8);

        }
        return view('yonetim.kullanici.onaylama', compact('list'));
    }
    public function onayla($id){
        $user = User::where('id', $id)->first();
        $user->hizmetveren = 1;
        $user->save();
        return back()->with('mesaj', 'Freelancer Onaylandı');
    }

}
