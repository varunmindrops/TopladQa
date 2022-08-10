<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';

    protected $fillable = ['user_id', 'product_id', 'video_delivery_id', 'book_delivery_id', 'language_id', 'attempt_id', 'quantity', 'deleted_at', 'created_at', 'updated_at'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id','id');
    }

    public function videoDeliveryType()
    {
        return $this->belongsTo('App\Models\MstDeliveryType','video_delivery_id','id');
    }

    public function bookDeliveryType()
    {
        return $this->belongsTo('App\Models\MstDeliveryType','book_delivery_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
