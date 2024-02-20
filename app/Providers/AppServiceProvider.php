<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\BlogKategori;
use App\Models\Hizmet;
use App\Models\Ilan;
use App\Models\IlanKategori;
use App\Models\Kategori;
use App\Models\Mesaj;
use App\Models\User;
use App\Models\UserBildirim;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $ayar = DB::table('ayarlar')->where('id', 1)->first();
        View::share('ayar', $ayar );
        Paginator::useBootstrap();
        $kategorilertumu = IlanKategori::where('master_id', null)->get();
        View::share('kategorilertumu', $kategorilertumu );

        $bloguclu = Blog::orderbyDesc('created_at')->take(3)->get();
        View::share('bloguclu', $bloguclu );

        //HİZMETKATEGORİLERİNAVBAR
        $hizmetmalzeme = Kategori::where('master_id', 227)->get();
        View::share('hizmetmalzeme', $hizmetmalzeme );
        $hizmetinsaat = Kategori::where('master_id', 95)->get();
        View::share('hizmetinsaat', $hizmetinsaat );
        $hizmettamir = Kategori::where('master_id', 196)->get();
        View::share('hizmettamir', $hizmettamir );
        $hizmetnakliyat = Kategori::where('master_id', 187)->get();
        View::share('hizmetnakliyat', $hizmetnakliyat );
        $blogkategorileri = BlogKategori::all();
        View::share('blogkategorileri', $blogkategorileri );

        view()->composer('*', function ($view)
        {
            if (Auth::check()){
                $user = Auth::user();
                $yenimesajlar = Mesaj::where('hizmet_veren_id', $user->id)->orWhere('hizmet_alan_id', $user->id)->get();
                $mesajcount = 0;
                foreach ($yenimesajlar as $mes){
                    if($mes->hizmet_veren_id == $user->id){
                        if($mes->hizmet_veren_okundu==0){
                            $mesajcount++;
                        }
                    } elseif ($mes->hizmet_alan_id == $user->id){
                        if($mes->hizmet_alan_okundu==0){
                            $mesajcount++;
                        }
                    }

                }

                $bildirim = UserBildirim::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(4);
                $bildirimtumu = UserBildirim::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
                $view->with('bildirim', $bildirim );
                $view->with('user', $user );
                $view->with('bildirimtumu', $bildirimtumu );
                $view->with('yenimesajlar', $yenimesajlar );
                $view->with('user', $user );
                $view->with('mesajcount', $mesajcount );

            }
        });
    }
}
