<?php

namespace App\Http\Controllers;

use App\Models\Skin;
use Auth;
use Config;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Input;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;

class PaymentController extends Controller
{
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret']
        ));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    private function countDownload($skin)
    {
        $skin->increment('downloadCount');
        $skin->save();
    }

    public function logPayment(Request $request)
    {
        try {
            // dd("download");

            $skin = Skin::where('uuid', $request->uuid)->first();
            if (Auth::check()) {
                $user = Auth::user();
                $user->skins()->attach($skin->id);
            }

            $this->countDownload($skin);

            return response()->json([
                'email' => $request->details['payer']['email_address'],
                'download' => $skin->download,
            ]);
        } catch (Exception $ex) {
            return abort(500);
        }
    }

    public function downloadSkin(Request $request)
    {
        if (! $request->hasValidSignature()) {
            abort(401);
        }

        $skin = Skin::where('uuid', $request->uuid)->first();
        if (Auth::check() || $skin->amount > 0) {
            $attachedIds = Auth::user()->skins->pluck('id')->toArray();
            $newIds = array_diff([$skin->id], $attachedIds);
            Auth::user()->skins()->attach($newIds);
        }

        $this->countDownload($skin);

        // dd($skin, $attachedIds, $newIds);

        return redirect($skin->download);
    }

    public function affiliateSkin(Request $request)
    {
        if (! $request->hasValidSignature()) {
            abort(401);
        }

        $skin = Skin::where('uuid', $request->uuid)->first();
        $this->countDownload($skin);

        return redirect($skin->affiliate);
    }

    private function createItem($name, $amount)
    {
        $item = new Item();
        $item->setName($name)
            /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($amount);
        /** unit price **/
        return $item;
    }

    private function createTransaction($amount, $description, ...$items)
    {
        $item_list = new ItemList();
        $item_list->setItems($items);

        $_amount = new Amount();
        $_amount->setCurrency('USD')
            ->setTotal($amount);

        $transaction = new Transaction();
        $transaction->setAmount($_amount)
            ->setItemList($item_list)
            ->setDescription($description);
    }

    public function index()
    {
        return view('paywithpaypal');
    }

    public function payWithpaypal(Request $request)
    {
        $redirectTo = '/skins';

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        // $item = $this->createItem("item name", $request->get('amount'));
        // $transaction = $this->createTransaction($request->get('amount'), "An iOS Haven Theme", $item);

        $item_1 = new Item();

        $item_1->setName('Item 1') /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount')); /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems([$item_1]);

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status')) /** Specify return URL **/
            ->setCancelUrl(URL::to('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions([$transaction]);
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (PayPalConnectionException $ex) {
            dd($ex);
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');

                return Redirect::to($redirectTo);
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');

                return Redirect::to($redirectTo);
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {

            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }

        \Session::put('error', 'Unknown error occurred');

        return Redirect::to($redirectTo);
    }

    public function getPaymentStatus()
    {
        $redirectTo = '/skins';

        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('error', 'Payment failed');

            return Redirect::to($redirectTo);
        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {
            \Session::put('success', 'Payment success');

            return Redirect::to($redirectTo);
        }

        \Session::put('error', 'Payment failed');

        return Redirect::to($redirectTo);
    }
}
