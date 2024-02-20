<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Models\IletisimFormu;
use Illuminate\Http\Request;

class RaporController extends Controller
{
    public function index(){
        $list = IletisimFormu::all();
        return view('yonetim.rapor.form', compact('list'));
    }
    public function sil(Request $request){
        $form = IletisimFormu::where('id', $request->id)->first();
        $form->delete();
        return back()->with('mesaj', 'Silindi');
    }
}
