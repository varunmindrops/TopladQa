<?php

namespace App\Http\Controllers\Counsellor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\OrdersNew;
use App\Models\OrderDetailsNew;

class StudentOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = unserialize(base64_decode(trim($request->result)));
        
        $id = Auth::id();
        $no = Str::random(6);
        $orderNo = $this->generateOrderNumber($no);
        
        $order = OrdersNew::create([
            'counsellor_id' => $id,
            'user_name' => $result['name'],
            'user_email' => $result['email'],
            'user_phone' => $result['phone'],
            'institute_reg_no' => $result['reg_no'],
            'user_address' => $result['address'],
            'state_id' => $result['state'],
            'pin_code' => $result['pin'],
            'attempt' => $result['attempt'],
            'order_no' => $orderNo,
            'total_amount' => $result['amt_pay'],
            'paid_amount' => $result['amt_paid'],
            'pending_amount' => $result['amt_pending'],
            'payment_mode' => $result['pay_mode'],
            'other_payment_mode' => $result['other_payment'],
            'counsellor_note' => $result['counsellor_note'],
            'payment_status' => "successful",
            'rzp_order_id' => $result['rzp_order_id'],
            'other_payment_id' => $result['other_payment_id']
        ]);

        $courseItems = [];

        foreach ($result['course_type'] as $key => $val) {
            $items = [
                'order_id' => $order->id,
                'course_name' => $result['course_id'],
                'video_language' => $result['language'][$key],
                'product_type' => $result['course_type'][$key],
                'course_level' => $result['course_level_id'][$key],
                'subject_id' => $result['subject_id'][$key],
                'chapter_id' => $result['chapter_id'][$key],
                'book_name' => $result['book_name'][$key],
                'teacher_id' => $result['teacher_id'][$key],
                'teacher_type' => $result['teacher_type'][$key],
                'sale_mode' => $result['mode'][$key],
                'price' => $result['payment'][$key]
            ];
            array_push($courseItems, $items);
        }

        OrderDetailsNew::insert($courseItems);

        return view('admin.super-admin.success')->with('success', 'Order Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Generate Order Number
    public function generateOrderNumber($no)
    {
        return $random_string = 'TL-' . $no . '/' . date("ymdhis");
    }
}
