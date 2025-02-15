<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

use Illuminate\Support\Facades\Redirect;
use Paystack;

class PaystackController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

   
    public function handleGatewayCallback(Request $request)
    {
        $paymentDetails = Paystack::getPaymentData();
 $ref=$paymentDetails['data']['reference'];
 echo $ref;
        dd($paymentDetails);
       
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
  