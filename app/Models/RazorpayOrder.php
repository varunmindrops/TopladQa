<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RazorpayOrder extends Model
{
    protected $table = 'razorpay_order';

    protected $fillable = [
        'user_name', 'user_email', 'user_phone', 'notes', 'teacher_id', 'subject_id', 'chapter_id', 'teacher_subject_combo', 'product_details', 'delivery_mode', 'product_type', 'order_no', 'price', 'payment_status', 'rzp_payment_id', 'rzp_order_id', 'created_at', 'updated_at'
      ];

    public function mstSubject()
    {
        return $this->belongsTo('App\Models\MstSubject', 'subject_id', 'id');
    }
}
