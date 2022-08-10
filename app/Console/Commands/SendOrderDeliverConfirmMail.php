<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\OrdersNew;
use Razorpay\Api\Api;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendOrderDeliverConfirmMail extends Command
{
    private $razorpayId;
    private $razorpayKey;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:deliverMail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->razorpayId = config('razorpay.razorpayId');
        $this->razorpayKey = config('razorpay.razorpayKey');
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::debug('Send capsule/combo/past-papers/mtp or rtp/chapters/video lecture order delivered confirmation mail - start.');

        $orders = OrdersNew::with(['orderDetailsNew.mstSubject', 'orderDetailsNew.mstChapter', 'orderDetailsNew.user', 'state'])->where('payment_status', 'successful')->where('deliver_status', 1)->where('order_deliver_confirm_mail_sent', 0)->where('teacher_order_deliver_mail_sent', 0)->get()->toArray();
        
        foreach ($orders as $key => $order) {
           
                $order['date'] = Carbon::parse($order['created_at'])->timezone('Asia/Kolkata')->format('d M, Y');
                $order['date_time'] = Carbon::parse($order['created_at'])->timezone('Asia/Kolkata')->format('d M, Y H:i');
                
                // Calling razorpay api here
                $api = new Api($this->razorpayId, $this->razorpayKey);
                
                if($order['rzp_order_id']) {
                    $payment = $api->order->fetch($order['rzp_order_id'])->payments(); //Razorpay Payment Id

                    $paymentId = array();
                    foreach ($payment as $key2 => $data) {
                        if (is_array($data) || is_object($data)) {
                            foreach ($data as $key3 => $val) {
                                $paymentId[] = $val['id'];
                            }
                        }
                    }

                    $data = [
                        'order' => $order,
                        'payment_id' => $paymentId[0]
                    ];
                } else if($order['other_payment_id']) {
                    $payId = explode('_', $order['other_payment_id']);
                    if($payId[0] == "pay" && strlen($payId[1]) == 14) {
                        $payment = $api->payment->fetch($order['other_payment_id']);
                        $orderId = $payment['order_id'];

                        $data = [
                            'order' => $order,
                            'order_id' => $orderId
                        ];
                    } else {
                        $data = [
                            'order' => $order
                        ];
                    }
                } else {
                    $data = [
                        'order' => $order
                    ];
                }
                
            $to_email = $order['user_email'];
            $sub = 'Toplad Order Deliver Confirmation';

            // Send Mail to Student
            $sendEmail = $this->sendMail('email-template.order-delivered', $data, $to_email, $sub);
            if ($sendEmail) {
                $data = array(
                    'order_deliver_confirm_mail_sent' => 1
                );
                $update = OrdersNew::where('id', $order['id'])
                    ->update($data);
            }

            // Send Mail to Teacher

            // Get all Teacher whose products are in the Order
            $facultyDetails = DB::table('order_details_new')->join('orders_new', 'order_details_new.order_id', '=', 'orders_new.id')->join('users', 'order_details_new.teacher_id', '=', 'users.id')->select('order_details_new.teacher_id', 'users.name', 'users.email')->groupBy('order_details_new.teacher_id')->where('order_details_new.order_id', $order['id'])->get()->toArray();
           
            // Filter the orders of each teacher
            $arrFacultyOrder = array_map(function ($faculty) use ($order) {
                return array_filter($order['order_details_new'], function ($val) use ($faculty) {
                    return ($val['teacher_id'] == $faculty->teacher_id);
                });
            }, $facultyDetails);

            // Sending Mail to each Teacher
            foreach ($facultyDetails as $key => $faculty) {
                $orderData = $arrFacultyOrder[$key];

                if($order['rzp_order_id']) {
                    $payment = $api->order->fetch($order['rzp_order_id'])->payments(); //Razorpay Payment Id

                    $paymentId = array();
                    foreach ($payment as $key2 => $data) {
                        if (is_array($data) || is_object($data)) {
                            foreach ($data as $key3 => $val) {
                                $paymentId[] = $val['id'];
                            }
                        }
                    }

                    $data = [
                        'name' => $faculty->name,
                        'order' => $order,
                        'orderData' => $orderData,
                        'payment_id' => $paymentId[0]
                    ];
                } else if($order['other_payment_id']) {
                    $payId = explode('_', $order['other_payment_id']);
                    if($payId[0] == "pay" && strlen($payId[1]) == 14) {
                        $payment = $api->payment->fetch($order['other_payment_id']);
                        $orderId = $payment['order_id'];

                        $data = [
                            'name' => $faculty->name,
                            'order' => $order,
                            'orderData' => $orderData,
                            'order_id' => $orderId
                        ];
                    } else {
                        $data = [
                            'name' => $faculty->name,
                            'order' => $order,
                            'orderData' => $orderData
                        ];
                    }
                } else {
                    $data = [
                        'name' => $faculty->name,
                        'order' => $order,
                        'orderData' => $orderData
                    ];
                }
                
                $sendToFaculty = $this->sendMail('email-template.teacher-order-delivered', $data, $faculty->email, $sub);

                if ($sendToFaculty) {
                    $data = array(
                        'teacher_order_deliver_mail_sent' => 1
                    );
                    $update = OrdersNew::where('id', $order['id'])
                        ->update($data);
                }
            }

        }

        Log::debug('Send capsule/combo/past-papers/mtp or rtp/chapters/video lecture order delivered confirmation mail - end.');
        return '';
    }

    // A common function to send mail
    public function sendMail($templateName, $data, $to_email, $sub)
    {
        Mail::send($templateName, $data, function ($message) use ($to_email, $sub) {

            $message->to($to_email)
                ->cc(['info@toplad.in','Fatima@toplad.in','sakshi@toplad.in'])
                ->subject($sub);
        });
        return true;
    }
}
