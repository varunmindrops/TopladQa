<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'code', 'type', 'value', 'expiry_date', 'deleted_at', 'created_at', 'updated_at'];
}
