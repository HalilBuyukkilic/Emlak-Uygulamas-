<?php

namespace App\Http\Controllers;

use App\Models\Ilan;
use App\Models\UserBildirim;
use App\Models\UserSiparis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Iyzipay\Model\Address;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\BasketItemType;
use Iyzipay\Model\Buyer;
use Iyzipay\Model\CheckoutForm;
use Iyzipay\Model\CheckoutFormInitialize;
use Iyzipay\Model\Locale;
use Iyzipay\Model\PaymentGroup;
use Iyzipay\Options;
use Iyzipay\Request\RetrieveCheckoutFormRequest;

class IlanOdemeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $tutar = 0;
        $onecikarma = $request->onecikarma;
        foreach ($request->onecikarma as $entry){
            if ($entry==1){
                $tutar = $tutar+25;
            }elseif ($entry==2){
                $tutar= $tutar+100;
            }elseif ($entry==3){
                $tutar = $tutar+500;
            }
        }
        $ilan = $request->ilan_id;
        if ($tutar>0){
            return view('kullanici.ilanodeme.odeme_yap', compact( 'tutar', 'ilan', 'onecikarma'));
        }else{
            return redirect()->route('ilanlarim')->with('mesaj', 'Geçersiz Seçim');
        }

    }
    public function form(Request $request){
        if ($request->havale==1){
            return view('anasayfa');
        }

        $user = Auth::user();
        $user->acikadres = $request->acikadres;
        $onecikarma = $request->onecikarma;
        $ilanid = $request->ilan_id;
        $user->save();

        $order = $request->tutar;
        $tutar = $order;

        $random       = rand(1, 10000)*rand(1,10000);

        session()->put('order_no', $random);

        $options = new Options();
        $options->setApiKey(env('IYZICO_API_KEY'));
        $options->setSecretKey(env('IYZICO_SECRET_KEY'));
        $options->setBaseUrl(env('IYZICO_BASE_URL'));


        # create request class
        $request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setPrice($order);
        $request->setBasketId($ilanid);
        $request->setPaidPrice($order);
        $request->setCurrency(\Iyzipay\Model\Currency::TL);
        $request->setPaymentGroup(PaymentGroup::PRODUCT);
        $request->setCallbackUrl(env('IYZICO_CALLBACK_URL'));
        $request->setEnabledInstallments(array(1,2, 3, 6, 9));


        $buyer = new Buyer();
        $buyer->setId($user->id);
        $buyer->setName($user->name);
        $buyer->setSurname($user->surname);
        $buyer->setGsmNumber($user->telefon);
        $buyer->setEmail($user->email);
        $buyer->setIdentityNumber($user->tcno);
        $buyer->setRegistrationAddress($user->acikadres);
        $buyer->setIp($_SERVER["REMOTE_ADDR"]);
        $buyer->setCity("İstanbul");
        $buyer->setCountry("Türkiye");
        $request->setBuyer($buyer);

        $shippingAddress = new Address();
        $shippingAddress->setContactName($user->name." ".$user->surname);
        $shippingAddress->setCity("Istanbul");
        $shippingAddress->setCountry("Türkiye");
        $shippingAddress->setAddress($user->acikadres);
        $request->setShippingAddress($shippingAddress);

        $billingAddress = new Address();
        $billingAddress->setContactName($user->name." ".$user->surname);
        $billingAddress->setCity("Istanbul");
        $billingAddress->setCountry("Türkiye");
        $billingAddress->setAddress($user->acikadres);
        $request->setBillingAddress($billingAddress);

        //sepet
        $basketItems = array();
        $piece = 0;

        foreach ($onecikarma as $entry){
            $BasketItem = new BasketItem();
            $BasketItem->setId($entry);
            if ($entry==1){
                $BasketItem->setName('Kalın Başlık');
            }elseif ($entry==2){
                $BasketItem->setName('Acil Acil!');
            }elseif ($entry==3){
                $BasketItem->setName('Öne Çıkanlar');
            }
            $BasketItem->setCategory1('Toprak Konut İlan Öne Çıkarma');
            $BasketItem->setItemType(\Iyzipay\Model\BasketItemType::VIRTUAL);
            if ($entry==1){
                $BasketItem->setPrice(25);
            }elseif ($entry==2){
                $BasketItem->setPrice(100);
            }elseif ($entry==3){
                $BasketItem->setPrice(500);
            }
            $basketItems[$piece] = $BasketItem;
            $piece++;
        }
        $request->setBasketItems($basketItems);

        # make request
        $checkoutFormInitialize = CheckoutFormInitialize::create($request, $options);

        //print_r($checkoutFormInitialize );

        # print result
        echo $checkoutFormInitialize->getcheckoutFormContent();


        return view('kullanici.odeme_kart' ,compact( 'user',  'tutar'));

    }
    public  function callback(Request $request){


        $options = new Options();
        $options->setApiKey(env('IYZICO_API_KEY'));
        $options->setSecretKey(env('IYZICO_SECRET_KEY'));
        $options->setBaseUrl(env('IYZICO_BASE_URL'));

        $token = $request->get('token');
        $orderNo = session('order_no');

        $gelen = new RetrieveCheckoutFormRequest();
        $gelen->setLocale(Locale::TR);
        $gelen->setConversationId( $orderNo);
        $gelen->setToken($token);

        $checkoutForm = CheckoutForm::retrieve($gelen, $options);
        $price = $checkoutForm->getPrice();
        $paymenttype = $checkoutForm->getcardType();
        $lastdigits = $checkoutForm->getLastFourDigits();
        $items = $checkoutForm->getPaymentItems();

        foreach ($items as $entry){
            $urunler[] = $entry->getitemId();
        }

        $user = Auth::user();

        $ilanid = $checkoutForm->getBasketId();



        if ($checkoutForm->getPaymentStatus()=="SUCCESS"){
            $random       = rand(1, 10000)*rand(1,10000);
            $order = new UserSiparis;
            $order->user_id = $user->id;
            $order->siparis_no = $random.$user->id;
            $order->tutar = $price;
            $order->banka = $price;
            $order->net_tutar = $price;
            $order->odeme_tipi = $paymenttype;
            $order->son_dort_hane = $lastdigits;
            $order->ilan_id = $ilanid;
            $order->ilan_mi = 1;
            $order->save();

            $notification = new  UserBildirim;
            $notification->user_id = Auth::user()->id;
            $notification->bildirim = "Tebrikler! İlanın Başarıyla Öne Çıkarıldı!";
            $notification->route = "/profilim/ilanlarim";
            $notification->save();

            $ilan = Ilan::where('id', $ilanid)->first();
            foreach ($urunler as $entry){
                if ($entry==1){
                    $ilan->kalin_baslik = 1;
                }elseif ($entry==2){
                    $ilan->acil_acil = 1;
                }elseif ($entry==3){
                    $ilan->one_cikanlar = 1;
                }
                $ilan->save();
            }



            return redirect()->route('ilanlarim')->with('mesaj', 'İlanınız başarıyla öne çıkarıldı!');

        } else{
            return redirect()->route('ilanlarim')->with('mesaj', 'Ödeme sırasında bir problem oluştu...');
        }
    }

}
