<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'order_no', 'amount', 'payment_status', 'rzp_order_id', 'deleted_at', 'created_at', 'updated_at'
      ];
}
