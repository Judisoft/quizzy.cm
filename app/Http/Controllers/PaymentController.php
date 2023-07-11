<?php

namespace App\Http\Controllers;

use App\Mail\PaymentDetail;
use Illuminate\Support\Facades\Mail;
use App\Models\AccountBalance;
use Illuminate\Http\Request;
use App\Models\Payment;
use Auth;

class PaymentController extends Controller
{
    public function pricePlans()
    {
        // Set prices
        $basic = 2000;
        $ultimate = 5000;

        return view('price-plans', compact('basic', 'ultimate'));
    }

    public function getPaymentProcessor($plan)
    {
        if ($plan == 'basic')
        {
            $amount = 2000;
        } 
        elseif($plan == 'ultimate') {
            $amount = 5000;
        } elseif($plan == 'ultimate-plus') {
            $amount = 10000;
        }
        else {
            return abort(503);
        }

        $acc_balance = AccountBalance::where('user_id', Auth::user()->id)->first();

        return view('payment', compact('plan', 'amount', 'acc_balance'));
    }

    public function postPaymentProcessor(Request $request)
    {   
        $validated = $request->validate([
        'payment_method' => 'required',
        'telephone' => 'required|digits:9',
        'amount' => 'required|min:4'
        ],
        [
            'payment_method.required'=> 'Payment method not selected',
            'telephone.required' => 'Telephone number not provided',
            'telephone.max' => 'Telephone number must not be greater than 9 digits',
            'amount.required' => 'Amount not provided'
        ]);
        
        $payment = new Payment;
        $payment->user_id = auth()->user()->id;
        $payment->payment_method = $request->payment_method;
        $payment->amount = $request->amount;
        $payment->telephone = $request->telephone;

        $payment->save();

        if($payment->id)
        {
            Mail::to(Auth::user()->email)->send(new PaymentDetail($payment));
            return redirect()->back()->with('success', 
                                            'Your payment request has been submitted successfully. 
                                            We have sent you an email
                                            containing payment details. Thank you!'
                                        );
        }

        else{
            return redirect()->back()->with('error', 'Try again, something went wrong');
        }
    }

    public function validatePayment($id)
    {
        return view('validate-payment', compact('id'));
    }

    public function postValidatePayment(Request $request, $id)
    {
        $validated = $request->validate([
            'transaction_id' => 'required|unique:payments'
            ],
            [
                'transaction_id.required'=> 'Transaction ID is required',
                'transaction_id.unique' => 'This transaction Id has already been used.'
            ]);

        $payment = Payment::findOrFail($id);
        
        if($payment)
        {
            $payment->transaction_id = $request->transaction_id;

            $payment->save();
            return redirect()->back()->with('success', "Thank you for upgrading your account");
        } else {
            return redirect()->back()->with('error', "Something went wrong");

        }
        
    }
}
