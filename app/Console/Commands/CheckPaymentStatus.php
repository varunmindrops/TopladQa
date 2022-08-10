<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\OrdersNew;
use App\Models\Scholarship;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Log;

class CheckPaymentStatus extends Command
{
    private $razorpayId;
    private $razorpayKey;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:status';

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
        Log::debug('Update payment status from RazorPay - start.');

        // Get all Orders Whose payment status is not successful for capsule, combo, past papers, MTP or RTP, Chapter, Video Lectures
        $orders = OrdersNew::whereNotIn('payment_status', ['successful'])->get()->toArray();

        foreach ($orders as $key1 => $order) {

            // Calling razorpay api here
            $api = new Api($this->razorpayId, $this->razorpayKey);

            if ($order['rzp_order_id']) {
                $payment = $api->payment->all(['order_id' => $order['rzp_order_id']]);
                foreach ($payment as $key2 => $data) {
                    if (is_array($data) || is_object($data)) {
                        foreach ($data as $key3 => $val) {
                            $status = $val['status'];

                            if ($status == 'captured') {
                                $payStatus = array(
                                    'payment_status' => 'successful'
                                );
                                $update = OrdersNew::where('id', $order['id'])
                                    ->update($payStatus);
                            } else {
                                $payStatus = array(
                                    'payment_status' => $status
                                );
                                $update = OrdersNew::where('id', $order['id'])
                                    ->update($payStatus);
                            }
                        }
                    }
                }
            } else if ($order['other_payment_id']) {
                $payId = explode('_', $order['other_payment_id']);
                if($payId[0] == "pay" && strlen($payId[1]) == 14) {
                    $payment = $api->payment->fetch($order['other_payment_id']);
                    $status = $payment['status'];
                    if ($status == 'captured') {
                        $payStatus = array(
                            'payment_status' => 'successful'
                        );
                        $update = OrdersNew::where('id', $order['id'])
                            ->update($payStatus);
                    } else {
                        $payStatus = array(
                            'payment_status' => $status
                        );
                        $update = OrdersNew::where('id', $order['id'])
                            ->update($payStatus);
                    } 
                } 
            }
        }

        // Get all applications Whose payment status is not successful for scholarship
        $scholarship = Scholarship::whereNotIn('payment_status', ['successful'])->get()->toArray();

        foreach ($scholarship as $key1 => $scholar) {

            // Calling razorpay api here
            $api = new Api($this->razorpayId, $this->razorpayKey);

            $payment = $api->payment->all(['order_id' => $scholar['rzp_order_id']]);

            foreach ($payment as $key2 => $data) {
                if (is_array($data) || is_object($data)) {
                    foreach ($data as $key3 => $val) {
                        $status = $val['status'];

                        if ($status == 'captured') {
                            $payStatus = array(
                                'payment_status' => 'successful'
                            );
                            $update = Scholarship::where('id', $scholar['id'])
                                ->update($payStatus);
                        } else {
                            $payStatus = array(
                                'payment_status' => $status
                            );
                            $update = Scholarship::where('id', $scholar['id'])
                                ->update($payStatus);
                        }
                    }
                }
            }
        }

        Log::debug('Update payment status from RazorPay - end.');
        return '';
    }
}
