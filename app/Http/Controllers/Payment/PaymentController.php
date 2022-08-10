<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\MstSubject;
use App\Models\OrderDetailsNew;
use App\Models\OrdersNew;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\support\Str;
use Razorpay\Api\Api;

class PaymentController extends Controller
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
        if (isset($request->p_note)) {
            $request->p_note = trim(preg_replace('/\s+/', ' ', $request->p_note));
        }
        $subject = MstSubject::where('id', $request->subject_id)->first();

        $faculty = User::where('id', $request->teacher_id)->first();

        // Calling razorpay api here
        $api = new Api($this->razorpayId, $this->razorpayKey);

        // Generating Receipt Id
        $receiptId = Str::random(20);

        // Creating orders
        // convert rupees into paise so multiply by 100
        // currency in INR
        $order = $api->order->create(array(
            'receipt' => $receiptId,
            'amount' => ($request->price * 100),
            'payment_capture' => 1,
            'currency' => 'INR',
        ));

        $response = [
            'orderId' => $order['id'],
            'razorpayId' => $this->razorpayId,
            'name' => $request->p_name,
            'email' => $request->p_email,
            'phone' => $request->p_phone,
            'productType' => $request->product_type,
            'courseName' => $request->course_name,
            'note' => $request->p_note,
            'amount' => $request->price,
            'currency' => 'INR',
            'teacherId' => $request->teacher_id,
            'subjectId' => $request->subject_id,
            'mode' => $request->mode,
            'bookType' => $request->book_type,
            'attempt' => $request->attempt,
            'language' => $request->language,
            'product_id' => $request->product_id,
            'slug' => $request->slug,
            'segment' => $request->segment,
        ];

        return view('payment.payment-page', compact('response', 'subject', 'faculty'));
    }

    public function Complete(Request $request)
    {
        // Verify signature here
        $signatureStatus = $this->signatureVerify($request->rzp_signature, $request->rzp_paymentid, $request->rzp_orderid);

        $no = Str::random(6);
        $orderNo = $this->generateOrderNumber($no);
        //$invoiceNo = $this->generateInvoiceNumber();

        // Calling razorpay api here
        $api = new Api($this->razorpayId, $this->razorpayKey);

        $payment = $api->payment->fetch($request->rzp_paymentid);
        $status = $payment->status;
        if ($status == 'captured') {
            $payStatus = 'successful';
        } else {
            $payStatus = $status;
        }

        $order = OrdersNew::create([
            'user_name' => $request->name,
            'user_email' => $request->email,
            'user_phone' => $request->phone,
            'notes' => $request->note,
            'attempt' => $request->attempt,
            'order_no' => $orderNo,
            'total_amount' => $request->price,
            'paid_amount' => $request->price,
            'pending_amount' => 0,
            'payment_mode' => "Website",
            'payment_status' => $payStatus,
            'rzp_order_id' => $request->rzp_orderid,
        ]);

        if ($order) {
            $orderDetailsNew = orderDetailsNew::create([
                'order_id' => $order->id,
                'course_name' => $request->course_name,
                'product_id' => $request->product_id,
                'video_language' => $request->language,
                'teacher_id' => $request->teacher_id,
                'subject_id' => $request->subject_id,
                'sale_mode' => $request->mode . " + " . $request->book_type,
                'product_type' => "video lecture",
                'price' => $request->price,
            ]);
        }

        if ($signatureStatus == true) {
            return redirect('/payment-success/' . $order['rzp_order_id']);
        } else {
            return redirect('payment-failed');
        }
    }

    // verify signature
    // return boolean if signature is correct or incorrect
    private function signatureVerify($signature, $payment_id, $order_id)
    {
        try {
            $api = new Api($this->razorpayId, $this->razorpayKey);
            $attributes = array('razorpay_signature' => $signature, 'razorpay_payment_id' => $payment_id, 'razorpay_order_id' => $order_id);
            $order = $api->utility->verifyPaymentSignature($attributes);
            return true;
        } catch (\Exception $e) {
            // dd($e);
            return false;
        }
    }

    // Generate Order Number
    public function generateOrderNumber($no)
    {
        return $random_string = 'TL-' . $no . '/' . date("ymdhis");
    }

    public function generateInvoiceNumber()
    {

        $latest = OrdersNew::latest()->first();

        if (!$latest->invoice_number) {
            return 'TPL/2020-21-001';
        } else {

            $string = explode("-", $latest->invoice_number);
            $str = $string[2];

            $res = 'TPL/2020-21-' . sprintf('%03d', $str + 1);

            $check = OrdersNew::where('invoice_number', $res)->first();

            if (empty($check)) {
                return $res;
            } else {
                $invoice = explode("-", $check->invoice_number);
                $inv = $invoice[2];

                return 'TPL/2020-21-' . sprintf('%03d', $inv + 1);
            }
        }
    }
}
