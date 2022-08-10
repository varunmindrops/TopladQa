<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\OrdersNew;
use Razorpay\Api\Api;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendOrderConfirmMail extends Command
{
    private $razorpayId;
    private $razorpayKey; 

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

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
        Log::debug('Send capsule/combo/past-papers/mtp or rtp/chapters/video lecture order confirmation mail, paynow payment confirmation mail - start.');

        $orders = OrdersNew::with(['orderDetailsNew.mstSubject', 'orderDetailsNew.mstChapter', 'orderDetailsNew.user'])->where('payment_status', 'successful')->where('order_confirm_mail_sent', 0)->get()->toArray();

        foreach ($orders as $key => $order) {
           
                $order['date'] = Carbon::parse($order['created_at'])->timezone('Asia/Kolkata')->format('d M, Y');

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
                        'status' => 'Successful',
                        'payment_id' => $paymentId[0]
                    ];
                } else if($order['other_payment_id']) {
                    $payId = explode('_', $order['other_payment_id']);
                    if($payId[0] == "pay" && strlen($payId[1]) == 14) {
                        $payment = $api->payment->fetch($order['other_payment_id']);
                        $orderId = $payment['order_id'];
    
                        $data = [
                            'order' => $order,
                            'status' => 'Successful',
                            'order_id' => $orderId
                        ];
                    } else {
                        $data = [
                            'order' => $order,
                            'status' => 'Successful'
                        ];
                    }   
                } else {
                    $data = [
                        'order' => $order,
                        'status' => 'Successful'
                    ];
                }
                
            $to_email = $order['user_email'];
            $sub = 'Toplad Order Confirmation';

            // Send Mail
            $sendEmail = $this->sendMail('email-template.order-payment', $data, $to_email, $sub);
            if ($sendEmail) {
                $data = array(
                    'order_confirm_mail_sent' => 1
                );
                $update = OrdersNew::where('id', $order['id'])
                    ->update($data);
            }
        }

        Log::debug('Send capsule/combo/past-papers/mtp or rtp/chapters/video lecture order confirmation mail, paynow payment confirmation mail - end.');
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
