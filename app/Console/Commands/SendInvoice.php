<?php

namespace App\Console\Commands;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Razorpay\Api\Api;
use PDF;
use Illuminate\Support\Facades\Log;

class SendInvoice extends Command
{
    private $razorpayId;
    private $razorpayKey;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:invoice';

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
        Log::debug('Send product order invoice mail - start.');

        // Get all Orders Whose mail is not sent
        $studentOrders = Order::with(['user', 'orderDetails.product.user', 'orderDetails.videoDeliveryType', 'orderDetails.bookDeliveryType', 'orderDetails.mstAttempt', 'orderDetails.mstLanguage'])->where('payment_status', 'successful')->where('student_invoice_mail_sent', 0)->where('teacher_invoice_mail_sent', 0)->whereNull('deleted_at')->get()->toArray();

        foreach ($studentOrders as $key => $order) {

            $order['date'] = Carbon::parse($order['created_at'])->timezone('Asia/Kolkata')->format('d M, Y');
            $order['date_time'] = Carbon::parse($order['created_at'])->timezone('Asia/Kolkata')->format('d M, Y H:i');
            $dispatch = Carbon::parse($order['created_at'])->timezone('Asia/Kolkata')->addDays(5);
            $dispatchDateTime = Carbon::parse($dispatch)->timezone('Asia/Kolkata')->format('d M, Y H:i');
            
            // Calling razorpay api here
            $api = new Api($this->razorpayId, $this->razorpayKey);
            $payment = $api->order->fetch($order['rzp_order_id'])->payments(); //Razorpay Payment Id

            $paymentId = array();
            foreach ($payment as $key2 => $data) {
                if (is_array($data) || is_object($data)) {
                    foreach ($data as $key3 => $val) {
                        $paymentId[] = $val['id'];
                    }
                }
            }

            $payment_id = $paymentId[0];
            
            $data = [
                'order' => $order,
                'dispatch' => $dispatchDateTime,
                'payment_id' => $paymentId[0]
            ];

            // Send Mail to Student with attachment invoice
            //$pdf = PDF::loadView('invoice.student-invoice-pdf')->save('pdf/invoice.pdf')->stream('invoice.pdf');

            $pdfStudent = PDF::loadView('invoice.student-invoice-pdf', compact('order','payment_id'))->setPaper('a4');
            $sendToStudent = $this->sendMail('email-template.student-invoice', $data, $order['user']['email'], $pdfStudent);

            if ($sendToStudent) {
                $data = array(
                    'student_invoice_mail_sent' => 1
                );
                $update = Order::where('id', $order['id'])
                    ->update($data);
            }

            // Send Mail to Teacher

            //    Get all Teacher whose products are in the Order
            $facultyDetails = DB::table('order_details')->join('product', 'order_details.product_id', '=', 'product.id')->join('users', 'product.user_id', '=', 'users.id')->select('product.user_id', 'users.name', 'users.email')->groupBy('product.user_id')->where('order_details.order_id', $order['id'])->get()->toArray();

            // Filter the products of each teacher
            $arrFacultyProduct = array_map(function ($faculty) use ($order) {
                return array_filter($order['order_details'], function ($val) use ($faculty) {
                    return ($val['product']['user_id'] == $faculty->user_id);
                });
            }, $facultyDetails);

            // Sending Mail to each Teacher
            foreach ($facultyDetails as $key => $faculty) {
                $productData = $arrFacultyProduct[$key];
                $data = [
                    'name' => $faculty->name,
                    'order' => $order,
                    'productData' => $productData,
                    'dispatch' => $dispatchDateTime,
                    'payment_id' => $paymentId[0]
                ];
                $sendToFaculty = $this->sendMail('email-template.teacher-orders', $data, $faculty->email, null);

                if ($sendToFaculty) {
                    $data = array(
                        'teacher_invoice_mail_sent' => 1
                    );
                    $update = Order::where('id', $order['id'])
                        ->update($data);
                }
            }
        }

        Log::debug('Send product order invoice mail - end.' . Carbon::now());
        return '';
    }

    // A common function to send mail to Student and Teacher
    public function sendMail($templateName, $data, $to_email, $attachment)
    {
        Mail::send($templateName, $data, function ($message) use ($to_email, $attachment) {
            if ($attachment) {
                $message->to($to_email)
                    ->cc(['info@toplad.in','fatima@toplad.in','sakshi@toplad.in'])
                    ->subject('Toplad');
                $message->attachData($attachment->output(), 'invoice.pdf');
            } else {
                $message->to($to_email)
                    ->subject('Toplad');
            }
        });
        return true;
    }
}
