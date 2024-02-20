<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Models\UserHarcama;
use Illuminate\Http\Request;
use App\Models\UserSiparis;

class SiparisYonetimController extends Controller
{
    public function index(){
        if (request()->filled('aranan'))
        {
            request()->flash();
            $aranan = request('aranan');
            $list = UserSiparis::where('siparis_no', 'like', "%$aranan%")
                ->orderByDesc('id')
                ->paginate(8)
                ->appends('aranan', $aranan);
            $list2 = UserHarcama::where('siparis_no', 'like', "%$aranan%")
                ->orderByDesc('id')
                ->paginate(8)
                ->appends('aranan', $aranan);
        } else {
            //kullanıcıları kayıt sırasına göre çektik
            $list = UserSiparis::orderbyDesc('created_at')->paginate(8);
            $list2 = UserHarcama::orderbyDesc('created_at')->paginate(8);
        }


        return view('yonetim.siparis.anasayfa', compact('list','list2'));
    }
}
