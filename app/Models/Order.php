<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    protected $fillable = ['user_id', 'bill_address_id', 'ship_address_id','order_no', 'original_amount', 'discounted_amount', 'discount', 'payment_status', 'rzp_order_id', 'bill_address', 'bill_address_city', 'bill_address_pincode', 'bill_address_landmark', 'bill_address_state', 'bill_address_country', 'different_ship_address', 'ship_address', 'ship_address_city', 'ship_address_pincode', 'ship_address_landmark', 'ship_address_state', 'ship_address_country', 'invoice_number', 'student_invoice_mail_sent', 'teacher_invoice_mail_sent', 'deleted_at', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function orderDetails()
    {
        return $this->hasMany('App\Models\OrderDetails');
    }

    public function orderFaculty()
    {
        return $this->hasMany('App\Models\OrderDetails')->where('user_id', Auth::id());
    }
}
