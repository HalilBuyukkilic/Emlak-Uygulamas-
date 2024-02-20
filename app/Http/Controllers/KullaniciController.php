<?php

namespace App\Http\Controllers;

use App\Jobs\SendKullaniciKayit;
use App\Models\Hizmet;
use App\Models\Ilan;
use App\Models\IletisimFormu;
use App\Models\Kategori;
use App\Models\IlanResim;
use App\Models\Rating;
use App\Models\Teklif;
use App\Models\User;
use App\Models\UserBildirim;
use App\Models\UserHarcama;
use App\Models\UserKategori;
use Epigra\TcKimlik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\IlanKategori;
use Epigra\TrGeoZones\Models\Country;
use Epigra\TrGeoZones\Models\City;
use Epigra\TrGeoZones\Models\CityDistrict;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;


class KullaniciController extends Controller
{
    //HİZMET ALAN BÖLÜMÜ
    //GİRİŞ
    public function index(){
        $user = Auth::user();
        return view('kullanici.anasayfa', compact('user'));
    }


    //HİZMET EKLE
    public function hizmetekle($kategori_slug, Request $request){

        if ($request->has('email')){
            $request->validate([
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:user',
                'password' => ['required', 'confirmed', Rules\Password::min(8)],
            ]);
                $user = new User;
                $user->name = $request->name;
                $user->surname = $request->surname;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->hizmetveren = 0;
                $user->aktivasyon_anahtari = str_random(60);
                $user->save();

            dispatch(new SendKullaniciKayit($user));

            Auth::login($user);
        }

        $kategori = Kategori::whereSlug($kategori_slug)->first();
        $json = null;
        $soru =[] ;

        //SORULU HİZMETLERDEN GELEN İKİNCİ İSTEĞİ İŞLEME ALANI
        if ($request->has('yonlendirmeli')){
            $a = count($kategori->sorular()->get());
            $soru = [];
            for ($i=1;$i<=$a;$i++){
                    $soru[] = $request['soru_'.$i];
                    $soru[] = $request['cevap_'.$i];
            }
            $json = json_encode($soru);
        }

        $soru2 = [];
        for ($i=1;$i<=$a;$i++){
            $soru2['soru_'.$i] = $request['soru_'.$i];
            $soru2['cevap_'.$i] = $request['cevap_'.$i];
        }

        $butce = $request->butce;
        $aciklama = $request->aciklama;
        $il = $request->il;

        return view('kullanici.hizmet_ekle', compact('kategori','json', 'soru','soru2', 'butce', 'il', 'aciklama'));

    }
    public function hizmetkaydet(Request $request){
         $data = request()->only('title', 'text', 'slug', 'price', 'il','user_id', 'kategori_id','sorular');
         if (!request()->filled('slug')) {
             $data['slug'] = str_slug(request('title')) . str_random('3');
             request()->merge(['slug' => $data['slug']]);

         $this->validate(request(), [
             'title' => 'required',
             'text' => 'required',
             'slug' => (request('original_slug') != request('slug') ? 'unique:hizmet,slug' : ''),
         ]);
         $hizmet = Hizmet::create($data);
         $hizmet->save();

         $bildirim = new UserBildirim();
         $bildirim->user_id = Auth::user()->id;
         $bildirim->bildirim = "Hizmet İlanın İnceleniyor. En Kısa Zamanda Onaylanacaktır";
         $bildirim->route = "/profilim";
         $bildirim->save();
         return redirect()->route('hizmet.liste');

     }
    }
    //HİZMET LİSTE
    public function hizmetlistele(){
        $hizmet = Hizmet::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('kullanici.hizmet_liste', compact('hizmet'));
    }
    //TEKLİF LİSTE
    public function hizmettekliflistele(Request $request){
        $hizmet = Hizmet::where('id', $request->hizmet_id)->first();

        return view('kullanici.hizmet_teklif', compact('hizmet'));
    }



    //TEKLİF KABUL
    public function hizmettekliflistelekabul(Request $request){
        $hizmet = Hizmet::where('id', $request->hizmet_id)->first();
        $user = Auth::user();
        $hizmetveren = User::where('id', $request->hizmet_veren_id)->first();
        $hizmet->alindi = 1;
        $hizmet->hizmet_veren_id = $hizmetveren->id;
        $hizmet->save();

        $bildirim = new UserBildirim();
        $bildirim->user_id = Auth::user()->id;
        $bildirim->bildirim = "Hizmetiniz için teklif seçtiniz. İş bitiminde değerlendirmeyi unutmayınız.";
        $bildirim->route = "/profilim/hizmetlerim";
        $bildirim->save();

        $bildirim = new UserBildirim();
        $bildirim->user_id = $hizmetveren->id;
        $bildirim->bildirim = "Teklifiniz kabul edildi. İlana gitmek için tıklayınız";
        $bildirim->route = "/hizmet/".$hizmet->slug;
        $bildirim->save();

        return redirect()->route('hizmet.liste')->with('mesaj', 'Teklif başarıyla kabul edildi. İş bitiminde yorum yapabilirsiniz!');

    }
    //HİZMET DEĞERLENDİR
    public function hizmetteklifdegerlendir(Request $request){
        $yorum = new Rating;
        $yorum->hizmet_veren_id = $request->hizmet_veren_id;
        $yorum->hizmet_alan_id = $request->hizmet_alan_id;
        $yorum->hizmet_id = $request->hizmet_id;
        $yorum->rating = $request->rating;
        $yorum->yorum = $request->yorum;
        $yorum->save();



        $hizmetveren = User::where('id', $request->hizmet_veren_id)->first();

        if (count($hizmetveren->derece)>=1){
        $rating = $hizmetveren->derece()->get();
        $derece = 0;
        foreach ($rating as $r){
            $derece = $derece+$r->rating;
        }
            $derece = number_format($derece/count($rating), 1, '.', ',');;
            $hizmetveren->rating = $derece;
            $hizmetveren->ratingcount=count($rating);
        } else{
            $hizmetveren->ratingcount = 1;
            $hizmetveren->rating = $request->rating;
            $hizmetveren->save();
        }

        $hizmetveren->save();


        $bildirim = new UserBildirim();
        $bildirim->user_id = $request->hizmet_veren_id;
        $bildirim->bildirim = "Hizmetiniz Değerlendirildi. Görmek için tıklayın";
        $bildirim->route = "/profilim/yorumlarim";
        $bildirim->save();

        $bildirim = new UserBildirim();
        $bildirim->user_id = Auth::user()->id;
        $bildirim->bildirim = "Değerlendirmeniz için teşekkürler!";
        $bildirim->route = "/profilim/yorumlarim";
        $bildirim->save();
        return redirect()->route('hizmet.liste')->with('mesaj', 'Değerlendirmeniz için teşekkürler! Değerlendirmeniz kaydedildi ve yayında.');
    }
    //HİZMET ALAN BÖLÜMÜ SON

    //HİZMET VEREN BÖLÜMÜ
    //TEKLİF VER
    public function hizmetteklifver(Request $request)
    {
        $hizmetveren = User::where('id', $request->hizmet_veren_id)->first();
        $hizmet = Hizmet::where('id', $request->hizmet_id)->first();
        $hizmetalan = User::where('id', $request->hizmet_alan_id)->first();

       $a = DB::table('teklif')->where('hizmet_id', $hizmet->id)->where('hizmet_veren_id', $hizmetveren->id)->first();
        if($hizmet->user->id==Auth::user()->id){

            return back()->with('mesaj', 'Kendi ilanınıza teklif veremezsiniz.');
        }
        elseif (!isset($a->hizmet_veren_id)) {
            if (Auth::user()->hizmetveren==0){
                return back()->with('mesaj', 'Hizmet vermek için Hizmet Veren olmalısınız, Başvurmak için üst menüyü kullanbilirsiniz.');
            }elseif (Auth::user()->bakiye<25){
                return back()->with('mesaj', 'Yetersiz bakiye, lütfen teklif verebilmek için bakiye yükleyiniz.');
            }else{
            $hizmetteklif = new Teklif;
            $hizmetteklif->teklif = $request->teklif;
            $hizmetteklif->sure = $request->sure;
            $hizmetteklif->hizmet_id = $hizmet->id;
            $hizmetteklif->hizmet_veren_id = $hizmetveren->id;
            $hizmetteklif->save();

            $user = Auth::user();
            $user->bakiye = $user->bakiye-25;
            $user->save();

            $harcama = new UserHarcama();
            $random = rand(1, 10000)*rand(1,10000);
            $harcama->tutar = 25;
            $harcama->siparis_no = $random;
            $harcama->hizmet_id = $hizmet->id;
            $harcama->user_id = $user->id;
            $harcama->save();

            $bildirim = new UserBildirim();
            $bildirim->user_id = $hizmetveren->id;
            $bildirim->bildirim = "Teklifiniz gönderildi, seçilirseniz bildirim alacaksınız.";
            $bildirim->route = "/profilim/tekliflerim";
            $bildirim->save();



            $bildirim = new UserBildirim();
            $bildirim->user_id = $hizmet->user_id;
            $bildirim->bildirim = "Teklif Aldınız! Gitmek için tıklayınız";
            $bildirim->route = "/profilim/verdigim-teklifler";
            $bildirim->save();
            return back()->with('mesaj', 'Teklifiniz başarıyla gönderildi. Profil sayfanızdan kontrol edebilirsiniz');
            }
        }
            else{
            return back()->with('mesaj', 'Bu hizmete daha önceden teklif verdiğiniz için teklif gönderilemedi.');
        }
    }
    public function banaozel(){

        $user = Auth::user();
        $kategoriler = $user->kategori()->get();
        $kategoriid = [];
        foreach ($kategoriler as $item){
            $kategoriid [] = $item->id;
        }
        $uygunhizmetler = Hizmet::all();

        return view('uygunhizmetler', compact('uygunhizmetler', 'user'));
    }
    public function tekliflerim(){
        $user = Auth::user();
        $tumteklifler = $user->teklif()->get();

        return view('kullanici.tekliflerim_aktif', compact(
            'tumteklifler',
            'user'
        ));
    }
    //HİZMET VEREN BÖLÜMÜ SON

    //ORTAK BÖLÜM
    public function ayarlar(){
        $user = Auth::user();
        $kategoriler = Kategori::all();
        $user_kategorileri = [];
        $user_kategorileri = $user->kategori()->pluck('kategori_id')->all();
        return view('kullanici.ayarlar', compact('user', 'kategoriler', 'user_kategorileri'));
    }
    public function ayarlarkaydet(Request $request){
        $user = Auth::user();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->adres = $request->il;
        $user->tcno = $request->tcno;
        $user->bio = $request->bio;

        if ($request->has('old_password')) {

            //ŞİFRE DEĞİŞTİRME
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->password);

            }

        }


        if (request()->hasFile('pp')) {
            $this->validate(request(), [
                'pp' => 'image|mimes:jpg,png,jpeg,gif|max:4096'
            ]);
            $pp = request()->file('pp');
            $pp = request()->pp;
            $dosyaadi = $user->username . "-" . time() . "." . $pp->getClientOriginalName();

            if ($pp->isValid()) {
                $pp->move('upload/image/users', $dosyaadi);
                $user->pp = $dosyaadi;
            }
        }
        if ($request->has('kategoriler')){
        $kategoriler = $request->kategoriler;
        foreach ($kategoriler as $ll){
            $kat = new UserKategori();
            $kat->user_id = Auth::user()->id;
            $kat->kategori_id = $ll;
            $kat->save();
        }
        }

        $user->save();

        $bildirim = new UserBildirim();
        $bildirim->user_id = Auth::user()->id;
        $bildirim->route = "/profilim";
        $bildirim->bildirim = "Profil Ayarlarınız Güncellendi";
        $bildirim->save();

        return redirect()->route('ayarlar')->with('mesaj', 'Profiliniz Kaydedildi');
    }
    public function yorumlarim(){
        $user = Auth::user();
        $yapilanlar = $user->comment()->get();
        $alinanlar = $user->hizmetalanyorumlar()->get();

        return view('kullanici.yorumlarim', compact('user', 'yapilanlar', 'alinanlar'));
    }
    public function bildirimler(){
        if (request()->has('user_id')) {
            UserBildirim::where('user_id', Auth::user()->id)->delete();
            return back()->with('mesaj', 'Tüm bildirimlerin başarıyla silindi.');
        }
    }

    //İLAN
    //KATEGORİ SEÇİMİ
    public function ilaneklekategori(){
        $data['countries'] = Country::get(["name","id"]);

        return view('kullanici.ilan_ekle_kategori',$data);
    }
    public function getState(Request $request)
    {

        $data['states'] = City::where("country_id",$request->country_id)->orderBy('name', 'asc')
            ->get(["name","id"]);
        return response()->json($data);
    }

    public function getCity(Request $request)
    {

        $data['cities'] = CityDistrict::where("city_id",$request->state_id)->orderBy('ilce', 'asc')
            ->get(["ilce","id", "mahalle"]);
        return response()->json($data);
    }

    public function ilanekle(Request $request){

        if ($request->kategori_id==null or $request->il==null or $request->ilce==null or $request->durum==null){
            return back()->with('mesaj', ' Lütfen tüm alanları doldurunuz.');
        }
        $kategoriid=$request->kategori_id;

        $lat = $request->cityLat;
        $long = $request->cityLng;

        //DAİRE BOYUTU 3+2
        $daireboyut = DB::table('ilan_konut')->get();
        //İMAR TİPİ
        $arsaimar = DB::table('ilan_arsa')->get();


        $kategori = IlanKategori::where('id', $request->kategori_id)->first();
        $sehir = City::where('id', $request->il)->first();
        $ilce = CityDistrict::where('id', $request->ilce)->first();
        $durum = $request->durum;
        $altkategori = $kategori->subcategory()->get();

        return view('kullanici.ilan_ekle', compact(
            'kategori',
            'kategoriid',
            'altkategori',
            'sehir',
            'ilce',
            'durum',
            'lat',
            'long',
            'daireboyut',
            'arsaimar',
        ));
    }

    public function ilankaydet(Request $request){

        $sehir = City::where('id', $request->sehir)->first();
        $ilce = CityDistrict::where('id', $request->ilce)->first();
        $lat = $request->cityLat;
        $long = $request->cityLng;


        //Durumlar
        if ($request->durum == 1){
            $durum = 'Satılık';
        }elseif ($request->durum == 2){
            $durum = 'Kiralık';
        }elseif ($request->durum == 3){
            $durum = 'Devren Satılık';
        }elseif ($request->durum == 4){
            $durum = 'Devren Kiralık';
        }


        //GENEL
        $ilan = new Ilan();
        $ilan->slug = str_slug(request('baslik')) . str_random('4');
        $ilan->user_id = Auth::user()->id;
        $ilan->ilan_kategori_id = $request->kategori;
        $ilan->baslik = $request->baslik;
        $ilan->aciklama = $request->aciklama;
        $ilan->fiyat = $request->fiyat;
        $ilan->brut = $request->brut;
        $ilan->net = $request->net;
        $ilan->kredi = $request->kredi;
        $ilan->takas = $request->takas;
        $ilan->il = $sehir->name;
        $ilan->ilce = $ilce->ilce.' - '.$ilce->mahalle;
        $ilan->onaylandi_mi = 0;
        $ilan->durum = $durum;
        $ilan->lat = $lat;
        $ilan->long = $long;
        //KONUT
        $ilan->oda = $request->oda;
        $ilan->yas = $request->yas;
        $ilan->bulundugu_kat = $request->bulundugu_kat;
        $ilan->kat_sayisi = $request->kat_sayisi;
        $ilan->banyo_sayisi = $request->banyo_sayisi;
        $ilan->balkon = $request->balkon;
        $ilan->esyali = $request->esyali;
        $ilan->aidat = $request->aidat;
        $ilan->site = $request->site;

        //KONUT İŞYERİ ORTAK
        $ilan->isitma = $request->isitma;
        //İŞYERİ
        $ilan->acik_alan = $request->acik_alan;
        $ilan->isyeri_oda_sayisi = $request->isyeri_oda_sayisi;
        $ilan->giris_yuksekligi = $request->giris_yuksekligi;

        //ARSA
        $ilan->imar_durumu = $request->imar_durumu;
        $ilan->ada_no = $request->ada_no;
        $ilan->parsel_no = $request->parsel_no;
        $ilan->pafta_no = $request->pafta_no;
        $ilan->kaks = $request->kaks;
        $ilan->gabari = $request->gabari;
        $ilan->tapu_durumu = $request->tapu_durumu;
        $ilan->kat_karsiligi = $request->kat_karsiligi;
        $ilan->save();



        //RESIM
        $this->validate($request, [
            'images' => 'required'
        ]);
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $id = $ilan->id;
                $name = $ilan->id . "-" . time() . "." . $image->getClientOriginalName();
                $image = Image::make($image)->resize(520, 400);
                $image->save('upload/image/ilan/'.$name);
                IlanResim::Create(
                    ['resim' => $name,
                        'meta' => $ilan->slug,
                        'ilan_id' => $id]
                );
            }
        }
        //RESIM SON
        return redirect()->route('ilanlarim');
    }

    public function ilanlarim(Request $request){
        $user = Auth::user();

        return view('kullanici.ilanlarim', compact('user'));
    }

    public function ilanlarimduzenle(Request $request){
        $user = Auth::user();
        $ilan = Ilan::where('id', $request->ilan_id)->first();
        //DAİRE BOYUTU 3+2
        $daireboyut = DB::table('ilan_konut')->get();
        //İMAR TİPİ
        $arsaimar = DB::table('ilan_arsa')->get();
        $kategoriid = $ilan->kategori->id;
        return view('kullanici.ilanlarim_duzenle', compact(
            'user',
            'ilan',
            'daireboyut',
            'arsaimar',
            'kategoriid'
        ));
    }

    public function ilanlarimduzenlekaydet(Request $request){


        //GENEL
        $ilan = Ilan::where('id', $request->ilan_id)->first();
        $ilan->baslik = $request->baslik;
        $ilan->aciklama = $request->aciklama;
        $ilan->fiyat = $request->fiyat;
        $ilan->brut = $request->brut;
        $ilan->net = $request->net;
        $ilan->kredi = $request->kredi;
        $ilan->takas = $request->takas;
        $ilan->onaylandi_mi = 0;
        //KONUT
        $ilan->oda = $request->oda;
        $ilan->yas = $request->yas;
        $ilan->bulundugu_kat = $request->bulundugu_kat;
        $ilan->kat_sayisi = $request->kat_sayisi;
        $ilan->banyo_sayisi = $request->banyo_sayisi;
        $ilan->balkon = $request->balkon;
        $ilan->esyali = $request->esyali;
        $ilan->aidat = $request->aidat;
        $ilan->site = $request->site;

        //KONUT İŞYERİ ORTAK
        $ilan->isitma = $request->isitma;
        //İŞYERİ
        $ilan->acik_alan = $request->acik_alan;
        $ilan->isyeri_oda_sayisi = $request->isyeri_oda_sayisi;
        $ilan->giris_yuksekligi = $request->giris_yuksekligi;

        //ARSA
        $ilan->imar_durumu = $request->imar_durumu;
        $ilan->ada_no = $request->ada_no;
        $ilan->parsel_no = $request->parsel_no;
        $ilan->pafta_no = $request->pafta_no;
        $ilan->kaks = $request->kaks;
        $ilan->gabari = $request->gabari;
        $ilan->tapu_durumu = $request->tapu_durumu;
        $ilan->kat_karsiligi = $request->kat_karsiligi;
        $ilan->save();
        //RESIM
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $id = $ilan->id;

                $name = $ilan->id . "-" . time() . "." . $image->getClientOriginalName();
                $image = Image::make($image)->resize(520, 400);
                $image->save('upload/image/ilan/'.$name);
                IlanResim::Create(
                    ['resim' => $name,
                        'meta' => $ilan->slug,
                        'ilan_id' => $id]
                );
            }
        }
        //RESIM SON
        return redirect()->route('ilanlarim')->with('mesaj', 'İlan başarıyla kaydedildi!');
    }

    public function ilanlarimduzenleresimsil($id){
        $resim = IlanResim::where('id', $id)->first();
        if ($resim->ilan->user_id==Auth::user()->id){
            $resim->delete();
            return response()->json([
                'success' => 'Resim Silindi!'
            ]);
        }
    }

    public function ilanlarimyukselt(Request $request){
        $ilan = Ilan::where($request->ilan_id)->first();

    }

    public function iletisimformu(Request $request){
        $form = new IletisimFormu();
        $form->name = $request->name;
        $form->email = $request->email;
        $form->telefon = $request->phone;
        $form->konu = $request->konu;
        $form->mesaj = $request->mesaj;
        $form->save();
        return back()->with('mesaj', 'Bilgilerinizi aldık en kısa zamanda size geri dönüş yapacağız.');
    }
    //ORTAK BÖLÜM SON
}































