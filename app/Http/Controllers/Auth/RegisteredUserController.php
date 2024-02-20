<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendKullaniciKayit;
use App\Mail\KullaniciKayit;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Epigra\TcKimlik;
use Illuminate\Support\Facades\Input;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user',
            'tcno' => 'required|unique:user',
            'password' => ['required', 'confirmed', Rules\Password::min(8)],
        ]);

        $data = array(
            'tcno'          => $request->tcno,
            'isim'          => $request->name,
            'soyisim'       => $request->surname,
            'dogumyili'     => $request->dogumyili,
        );



        $check2 = TcKimlik::validate($data,false);
        if ($check2==true){
            $user = new User;
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->email = $request->email;
            $user->tcno = $request->tcno;
            $user->dogumyili = $request->dogumyili;
            $user->password = Hash::make($request->password);
            $user->hizmetveren = $request->account_type_radio;
            $user->aktivasyon_anahtari = str_random(60);
            $user->save();

            dispatch(new SendKullaniciKayit($user));

            Auth::login($user);

            if ($user->hizmetveren==0){
                return redirect()->route('anasayfa')->with('mesaj', 'Kaydınız Başarılı! Hizmet Almaya veya İlan Eklemeye Başlayabilirsiniz.');
            }else{
                return redirect()->route('ayarlar')->with('mesaj', 'Kaydınız Başarılı! Hizmet vermeye başlamak için lütfen hesap ayarlarınızı güncelleyiniz..');
            }
        } elseif ($check2==false){

            return redirect()->route('register')->with('mesaj', 'T.C Kimlik Numaranız Hatalı! Lütfen Kontrol Edip Tekrar Deneyiniz.')->withInput();
        }

    }

    public function verify($key){
        $user = User::where('aktivasyon_anahtari', $key)->first();
        if (!is_null($user))
        {
            $user->aktivasyon_anahtari = null;
            $user->aktif_mi = 1;
            $user->save();
            return redirect()->route('anasayfa')
                ->with('mesaj', 'Email başarıyla doğrulandı!');
        }
    }
    public function resend(){
        $user = Auth::user();
        Mail::to(Auth::user()->email)->send(new KullaniciKayit($user));
        return redirect()->route('anasayfa')
            ->with('mesaj', 'Email gönderildi! Spam klasörünü kontrol etmeyi unutmayınız..');
    }
}
