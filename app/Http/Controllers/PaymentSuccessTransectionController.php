<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdersNew;

class PaymentSuccessTransectionController extends Controller
{
    public function index(Request $req,$trxnid=Null)
    {
        $order=OrdersNew::with(['orderDetailsNew.mstSubject','orderDetailsNew.user','orderDetailsNew.mstChapter'])->where('rzp_order_id',$trxnid)->first();
         if($trxnid==NUll || empty($order))
         {
            return view('site.404');
         }
         $order=$order->toArray();
         $name=$order['order_details_new'][0]['course_name'] ?? '' ;
         return view('payment.thank-you',compact('order','name'));
    }
}
