<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;use Session;

class StripeController extends Controller
{
	public function index($amount, $productname)
    {
		$users = auth()->user();
		
        return view('product.stripe', [
			'intent' => $users->createSetupIntent(),
			'productname' => $productname,
			'amount' => $amount
		]);
    }
	
	
	public function stripeCharge(Request $request)
	{
		$users = auth()->user();
		
		$stripe = $users->createOrGetStripeCustomer();
		$paymentId = $users->addPaymentMethod($request->payment_method); 
		 
		$users->charge(
			$request->amount*100, 
			$paymentId->id, 
			['off_session' => true]
		);
		
		Session::flash('success', 'Payment successful!');
		return redirect()->back();
 
	}
}
