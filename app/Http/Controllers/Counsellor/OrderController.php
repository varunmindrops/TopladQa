<?php

namespace App\Http\Controllers\Counsellor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrdersNew;
use App\Models\OrderDetailsNew;
use App\Models\User;
use App\Models\MstCourse;
use App\Models\MstRegion;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = Auth::id();

        if ($request->search != "") {

            $data = OrdersNew::where(function ($query) use ($request) {
                $query->where('order_no', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('user_name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('user_email', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('user_phone', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('created_at', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('payment_mode', 'LIKE', '%' . $request->search . '%');
            })
                ->where(function ($query) use ($id) {
                    $query->where('counsellor_id', $id)
                    ->orWhere('counsellor_id', NULL);
                })
                ->orderBy('created_at', 'DESC')->paginate(10);

            $data->appends(array(
                'search' => $request->search,
            ));
        } else {
            $data = OrdersNew::where('counsellor_id', $id)->orWhere('counsellor_id', NULL)->orderBy('created_at', 'DESC')->paginate(10);
        }

        $faculty = User::where('role', 'teacher')->where('status', 1)->whereNotNull('slug')->whereNull('deleted_at')->get();
        $coursedata = MstCourse::where('status', '1')->whereNull('deleted_at')->get();
        $states = MstRegion::where('parent_id', '1')->whereNull('deleted_at')->get();

        return view('admin.super-admin.counsellor-order', compact('data', 'faculty', 'coursedata', 'states'));
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
        $orderid = $request->order_id;
        $id = Auth::id();
        $orderNo = OrdersNew::where('id', $orderid)->first();
        $date = Carbon::parse($orderNo['created_at'])->timezone('Asia/Kolkata')->format('d M, Y');

        if ($orderNo->paid_amount != $request->paid) {
            // Send Mail
            $data = [
                'orderno' => $orderNo->order_no,
                'date' => $date,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'total' => $request->total,
                'paid' => $request->paid,
                'pending' => $request->pending
            ];
            $to_email = $request->email;
            $sub = 'Toplad Payment Update';
            $sendEmail = $this->sendMail('email-template.payment-update', $data, $to_email, $sub);
            if ($sendEmail) {
                $count = $orderNo->payment_update_mail_sent + 1;
                $data = array(
                    'payment_update_mail_sent' => $count
                );
                $update = OrdersNew::where('id', $orderid)
                    ->update($data);
            }
        }

        $updateOrder = OrdersNew::updateOrCreate(
            ['id' => $orderid],
            [
                'counsellor_id' => $id,
                'user_name' => $request->name,
                'user_email' => $request->email,
                'user_phone' => $request->phone,
                'institute_reg_no' => $request->reg_no,
                'user_address' => $request->address,
                'state_id' => $request->state,
                'pin_code' => $request->pin,
                'attempt' => $request->atmpt,
                'order_no' => $orderNo->order_no,
                'total_amount' => $request->total,
                'paid_amount' => $request->paid,
                'pending_amount' => $request->pending,
                'payment_mode' => $request->p_mode,
                'counsellor_note' => $request->counsellor_note,
                'other_payment_mode' => $request->other_pay,
                'payment_status' => "successful",
                'rzp_order_id' => $request->ord_id,
                'other_payment_id' => $request->pay_id
            ]
        );

        $courseItems = [];

        foreach ($request['course_type'] as $key => $val) {
            $items = [
                'order_id' => $updateOrder->id,
                'course_name' => $request['course'],
                'video_language' => $request['language'] ? $request['language'][$key] : null,
                'product_type' => $request['course_type'][$key],
                'course_level' => $request['course_level_id'][$key],
                'subject_id' => $request['subject_id'][$key],
                'chapter_id' => $request['chapter_id'] ? $request['chapter_id'][$key] : null,
                'book_name' => $request['book_name'] ? $request['book_name'][$key] : null,
                'teacher_id' => $request['teacher_id'][$key],
                'teacher_type' => $request['teacher_type'][$key],
                'sale_mode' => $request['mode'][$key],
                'price' => $request['payment'] ? $request['payment'][$key] : null
            ];
            array_push($courseItems, $items);
        }
        if ($updateOrder) {
            OrderDetailsNew::where('order_id', $updateOrder->id)->delete();
            OrderDetailsNew::insert($courseItems);
        }

        return redirect()->back()->with('success', 'Order Updated Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = OrdersNew::with(['orderDetailsNew.mstSubject', 'orderDetailsNew.user', 'orderDetailsNew.mstChapter', 'state'])->where('id', $id)->get()->toArray();
        return Response::json($orders);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orders = OrdersNew::with(['orderDetailsNew.mstSubject', 'orderDetailsNew.user', 'orderDetailsNew.mstChapter', 'state'])->where('id', $id)->first();

        return Response::json($orders);
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

    // A common function to send mail
    public function sendMail($templateName, $data, $to_email, $sub)
    {
        Mail::send($templateName, $data, function ($message) use ($to_email, $sub) {

            $message->to($to_email)
                //->cc(['info@toplad.in', 'fatima@raghavacademy.com', 'sakshi@raghavacademy.com'])
                ->cc(['info@toplad.in', 'fatima@toplad.in', 'sakshi@toplad.in'])
                ->subject($sub);
        });
        return true;
    }
}
