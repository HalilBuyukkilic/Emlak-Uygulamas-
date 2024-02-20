<?php

namespace App\Http\Controllers;

use App\Models\Mesaj;
use App\Models\UserMesaj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MesajController extends Controller
{
    public function index(){
        $user = Auth::user();
        $mesajlar = Mesaj::where('hizmet_veren_id', $user->id)->orWhere('hizmet_alan_id', $user->id)->get();

        return view('kullanici.mesaj', compact('mesajlar', 'user'));
    }
    public function tekli($id){
        $user = Auth::user();
        $mesajlar = Mesaj::where('hizmet_veren_id', $user->id)->orWhere('hizmet_alan_id', $user->id)->get();
        $mesaj =  Mesaj::where('id', $id)->first();

        //OKUNMA DURUMLARI
        if ($mesaj->hizmet_veren_id == Auth::user()->id){
            $mesaj->hizmet_veren_okundu = 1;
        }elseif ($mesaj->hizmet_alan_id == Auth::user()->id){
            $mesaj->hizmet_alan_okundu = 1;
        }
        $mesaj->save();

        $mesaj_mesajlar = $mesaj->mesajlar()->orderBy('created_at', 'asc')->get();
        return view('kullanici.mesaj_tekli', compact('user', 'mesajlar', 'mesaj', 'mesaj_mesajlar'));
    }
    public function gonder(Request $request){
        if ($request->mesaj==null){
            return response()->json(['success'=>'Lütfen ilgili alanları doldurun']);
        }else
        $mesaj = new UserMesaj();
        $mesaj->user_id = Auth::user()->id;
        $mesaj->mesaj_id = $request->mesaj_id;
        $mesaj->mesaj = $request->mesaj;
        $mesaj->save();

        //OKUNMA DURUMLARI
        $okundu = Mesaj::where('id', $request->mesaj_id)->first();
        if ($okundu->hizmet_veren_id == Auth::user()->id){
            $okundu->hizmet_alan_okundu = 0;
        }elseif ($okundu->hizmet_alan_id == Auth::user()->id){
            $okundu->hizmet_veren_okundu = 0;
        }
        $okundu->save();



        return response()->json(['success'=>'Mesaj Gönderildi']);
    }

    public function yenimesaj(Request $request){

        $mesaj = Mesaj::where('hizmet_veren_id', $request->hizmet_veren_id)->where('hizmet_alan_id', Auth::user()->id)->first();
        $mesaj2 = Mesaj::where('hizmet_alan_id', $request->hizmet_veren_id)->where('hizmet_veren_id', Auth::user()->id)->first();

        if ($mesaj==null and $mesaj==null){
            $mesaj = new Mesaj();
            $icerik = new UserMesaj();
            $mesaj->hizmet_veren_id = $request->hizmet_veren_id;
            $mesaj->hizmet_alan_id = Auth::user()->id;
            $mesaj->hizmet_id = $request->hizmet_id;
            $mesaj->save();
            $icerik->user_id = Auth::user()->id;
            $icerik->mesaj = $request->mesaj;
            $icerik->mesaj_id = $mesaj->id;
            $icerik->save();
            return redirect()->route('mesaj.tekli', $mesaj->id)->with('id' , $mesaj->id);
        }elseif($mesaj!=null){
            $mesaj->hizmet_id = $request->hizmet_id;
            $mesaj->save();
            $icerik = new UserMesaj();
            $icerik->user_id = Auth::user()->id;
            $icerik->mesaj = $request->mesaj;
            $icerik->mesaj_id = $mesaj->id;
            $icerik->save();
            $icerik = new UserMesaj();
            return redirect()->route('mesaj.tekli', $mesaj->id)->with('id', $mesaj->id);

        } else {
            $mesaj2->hizmet_id = $request->hizmet_id;
            $mesaj2->save();
            $icerik = new UserMesaj();
            $icerik->user_id = Auth::user()->id;
            $icerik->mesaj = $request->mesaj;
            $icerik->mesaj_id = $mesaj->id;
            $icerik->save();
            return redirect()->route('mesaj.tekli', $mesaj2->id)->with('id', $mesaj2->id);
        }
    }
}
