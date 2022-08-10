<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\support\Str;
use App\Models\OrdersNew;

class PaynowController extends Controller
{
    private $razorpayId;
    private $razorpayKey;

    public function __construct()
    {
        $this->razorpayId = config('razorpay.razorpayId');
        $this->razorpayKey = config('razorpay.razorpayKey');
    }

    public function store(Request $request)
    {
        $request->validate([
                'name' => 'required|regex:/^([a-zA-Z\.]+\s)*[a-zA-Z\.]+$/|max:255',
                'email' => 'required|email:rfc,dns',
                'phone' => 'required|digits:10|regex:/^((?!(0))[0-9]{10})$/',
                'amount' => 'required|numeric|regex:/^\d*(\.\d{1,2})?$/',
            ],
            [
                'name.regex' => 'Only letters, dot(.), single space between words are allowed.',
                'phone.regex' => 'Phone number is invalid.',
                'amount.regex' => 'Max. two decimal precision allowed.'
            ]
        );
        if(isset($request->note))
        {
            $request->note = trim(preg_replace('/\s+/', ' ',$request->note));
        }

        // Calling razorpay api here
        $api = new Api($this->razorpayId, $this->razorpayKey);

        // Generating Receipt Id
        $receiptId = Str::random(20);

        // Creating orders
        // convert rupees into paise so multiply by 100
        // currency in INR
        $order = $api->order->create(array(
            'receipt' => $receiptId,
            'amount' => ($request->amount * 100),
            'payment_capture' => 1,
            'currency' => 'INR'
        ));

        $response = [
            'orderId' => $order['id'],
            'razorpayId' => $this->razorpayId,
            'amount' => $request->amount,
            'name' => $request->name,
            'currency' => 'INR',
            'email' => $request->email,
            'contactNumber' => $request->phone,
            'note' => $request->note,
            'description' => 'Total'
        ];

        return view('payment.razorpay-payment', compact('response'));
    }

    public function Complete(Request $request)
    {
        // Verify signature here

        $signatureStatus =  $this->signatureVerify($request->rzp_signature, $request->rzp_paymentid, $request->rzp_orderid);

        $no = Str::random(6);
        $orderNo = $this->generateOrderNumber($no);

        // Calling razorpay api here
        $api = new Api($this->razorpayId, $this->razorpayKey);

        $payment = $api->payment->fetch($request->rzp_paymentid);
        $status = $payment->status;
        if ($status == 'captured') {
            $payStatus = 'successful';
        } else {
            $payStatus = $status;
        }

        $payNow = OrdersNew::create([
            'user_name' => $request->name,
            'user_email' => $request->email,
            'user_phone' => $request->phone,
            'notes' => $request->note,
            'order_no' =>  $orderNo,
            'total_amount' => $request->amount,
            'paid_amount' => $request->amount,
            'pending_amount' => 0,
            'payment_mode' => "Website",
            'payment_status' => $payStatus,
            'rzp_payment_id' => $request->rzp_paymentid,
            'rzp_order_id' => $request->rzp_orderid
        ]);

        if ($signatureStatus == true) {
            return redirect('/payment-success/' . $payNow['rzp_order_id']);        } else {
            return redirect('razorpay-failed');
        }
    }

    // verify signature
    // return boolean if signature is correct or incorrect
    private function signatureVerify($signature, $payment_id, $order_id)
    {
        try {
            $api = new Api($this->razorpayId, $this->razorpayKey);
            $attributes  = array('razorpay_signature' => $signature,  'razorpay_payment_id'  => $payment_id,  'razorpay_order_id' => $order_id);
            $order  = $api->utility->verifyPaymentSignature($attributes);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    } 

    // Generate Order Number
    public function generateOrderNumber($no)
    {
        return $random_string = 'TL-' . $no . '/' . date("ymdhis");
    }
}
