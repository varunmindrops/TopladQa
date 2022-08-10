<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = 'order_details';

    protected $fillable = ['order_id', 'user_id', 'product_id', 'attempt_id', 'language_id', 'video_delivery_type_id', 'book_delivery_type_id', 'price', 'product_name', 'attempt_name', 'created_at', 'updated_at'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id','id');
    }

    public function mstAttempt()
    {
        return $this->belongsTo('App\Models\MstAttempt','attempt_id','id');
    }

    public function mstLanguage()
    {
        return $this->belongsTo('App\Models\MstLanguage','language_id','id');
    }

    public function videoDeliveryType()
    {
        return $this->belongsTo('App\Models\MstDeliveryType','video_delivery_type_id','id');
    }

    public function bookDeliveryType()
    {
        return $this->belongsTo('App\Models\MstDeliveryType','book_delivery_type_id','id');
    }
}
