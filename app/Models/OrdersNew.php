<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersNew extends Model
{
    protected $table = 'orders_new';

    protected $fillable = [
        'counsellor_id', 'user_name', 'user_email', 'user_phone', 'institute_reg_no', 'user_address', 'state_id', 'pin_code', 'notes', 'attempt', 'order_no', 'total_amount', 'paid_amount', 'pending_amount', 'payment_mode', 'other_payment_mode','counsellor_note','payment_status', 'other_payment_id', 'rzp_order_id', 'mail_details', 'order_confirm_mail_sent', 'deliver_status', 'order_deliver_confirm_mail_sent', 'teacher_order_deliver_mail_sent', 'created_at', 'updated_at'
      ];

    public function orderDetailsNew()
    {
        return $this->hasMany('App\Models\OrderDetailsNew', 'order_id', 'id');
    }

    public function state()
    {
        return $this->belongsTo('App\Models\MstRegion','state_id','id');
    }
}