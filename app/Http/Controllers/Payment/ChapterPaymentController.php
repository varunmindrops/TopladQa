<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\support\Str;
use App\Models\OrdersNew;
use App\Models\OrderDetailsNew;
use App\Models\MstSubject;

class ChapterPaymentController extends Controller
{
    private $razorpayId;
    private $razorpayKey;

    public function __construct()
    {
        $this->razorpayId = config('razorpay.razorpayId');
        $this->razorpayKey = config('razorpay.razorpayKey');
    }

    public function store(Request $request, $segment)
    {
        if (isset($request->p_note)) {
            $request->p_note = trim(preg_replace('/\s+/', ' ', $request->p_note));
        }
        $subject = MstSubject::where('id', $request->subject_id)->first();

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
            'currency' => 'INR'
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
            'subjectId' => $request->subject_id,
            'chapterId' => $request->chapter_id,
            'teacherId' => $request->teacher_id,
            'chapterPrice' => $request->chapter_price,
            'group' => $request->group
        ];

        return view('payment.chapter-payment-page', compact('response', 'subject', 'segment'));
    }

    public function Complete(Request $request, $segment)
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

        $teacherArr = explode(',', $request->teacher_id);
        $chapterArr = explode(',', $request->chapter_id);
        $priceArr = explode(',', $request->chapter_price);

        $order = OrdersNew::create([
            'user_name' => $request->name,
            'user_email' => $request->email,
            'user_phone' => $request->phone,
            'notes' => $request->note,
            'order_no' => $orderNo,
            'total_amount' => $request->price,
            'paid_amount' => $request->price,
            'pending_amount' => 0,
            'payment_mode' => "Website",
            'payment_status' => $payStatus,
            'rzp_payment_id' => $request->rzp_paymentid,
            'rzp_order_id' => $request->rzp_orderid
        ]);

        if($order) {
        for($i = 0; $i < count($chapterArr); $i++) {
            OrderDetailsNew::create([
                'order_id' => $order->id,
                'course_name' => $request->course_name,
                'teacher_id' => $teacherArr[$i],
                'subject_id' => $request->subject_id,
                'chapter_id' => $chapterArr[$i],
                'course_level' => $request->group,
                'product_type' => "chapter",
                'price' => $priceArr[$i]
            ]);
        }
        }

        if ($signatureStatus == true) {
            return redirect('/payment-success/'.$order['rzp_order_id']);
        } else {
            return redirect('/'.$segment.'/failed');
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
