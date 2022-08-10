<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scholarship;
use Razorpay\Api\Api;
use Illuminate\support\Str;
use App\Models\ScholarshipDetails;

class ScholarshipPaymentController extends Controller
{
    private $razorpayId;
    private $razorpayKey;

    public function __construct()
    {
        $this->razorpayId = config('razorpay.razorpayId');
        $this->razorpayKey = config('razorpay.razorpayKey');
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

        $scholarship = Scholarship::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'order_no' => $orderNo,
            'amount' => $request->price,
            'payment_status' => $payStatus,
            'rzp_order_id' => $request->rzp_orderid
        ]);

        ScholarshipDetails::Create([
            'scholarship_id' => $scholarship->id,
            'course_id' => $request->course_type,
            'combo_type' => $request->combo_type,
            'qualifying_course' => $request->course,
            'marks_obtained' => $request->marks,
            'max_marks' => $request->max_marks,
            'percentage' => $request->percentage,
            'registration_no' => $request->registration_no,
            'roll_no' => $request->roll_no,
            'qualifying_exam_date' => $request->date,
            'id_proof' => $request->id_proof,
            'marksheet' => $request->marksheet
        ]);

        if ($signatureStatus == true) {
            return redirect('scholarship')->with('success', 'Your details have been submitted successfully. Thank you for applying for Scholarship!!!');
        } else {
            return redirect('scholarship-failed');
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
