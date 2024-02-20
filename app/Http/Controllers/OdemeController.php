<?php

namespace App\Http\Controllers;

use App\Models\User;
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

class OdemeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request){
        if ($request->tutar>0){
        $tutar = $request->tutar;
        return view('kullanici.odeme_yap', compact( 'tutar'));
        }else{
            return redirect()->route('dashboard')->with('mesaj', 'Geçersiz Tutar');
        }
    }
    public function form(Request $request){
        if ($request->havale==1){
            return view('anasayfa');
        }
        $user = Auth::user();
        $user->acikadres = $request->acikadres;

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
        $request->setBasketId($order);
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

        $basketItems = array();
        $firstBasketItem = new BasketItem();
        $firstBasketItem->setId($order);
        $firstBasketItem->setName($order.'TL BAKİYE YÜKLEME');
        $firstBasketItem->setCategory1('BAKİYE YÜKLEME');
        $firstBasketItem->setItemType(BasketItemType::VIRTUAL);
        $firstBasketItem->setPrice($order);
        $basketItems[0] = $firstBasketItem;
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
        $user = Auth::user();

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
            $order->save();

            $user->bakiye = $user->bakiye+$price;
            $user->save();

            $notification = new  UserBildirim;
            $notification->user_id = Auth::user()->id;
            $notification->bildirim = "Tebrikler! Yüklemen Başarılı ve Hesabında!";
            $notification->route = "/profilim";
            $notification->save();



            return redirect()->route('dashboard')->with('mesaj', 'Bakiye Yükleme Başarılı! Teklif vermeye başlayabilirsiniz');

        } else{
            return redirect()->route('dashboard')->with('mesaj', 'Ödeme sırasında bir problem oluştu...');
        }
    }

}
