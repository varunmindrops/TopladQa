<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    protected $table = 'product_price';

    public function attempt()
    {
        return $this->belongsTo('App\Models\MstAttempt');
    }

    public function bookDeliveryType()
    {
        return $this->belongsTo('App\Models\MstDeliveryType')->where('content_type', 'book');
    }

    public function videoDeliveryType()
    {
        return $this->belongsTo('App\Models\MstDeliveryType')->where('content_type', 'video');
    }

    public function paperDeliveryType()
    {
        return $this->belongsTo('App\Models\MstDeliveryType', 'video_delivery_type_id', 'id');
    }

    public function bookDelivery()
    {
        return $this->belongsTo('App\Models\MstDeliveryType', 'book_delivery_type_id', 'id');
    }
}
