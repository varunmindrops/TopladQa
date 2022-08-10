<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';

    protected $fillable = ['user_id', 'address', 'city', 'state_id', 'country_id', 'pin_code', 'landmark', 'type', 'different_ship_address', 'deleted_at', 'created_at', 'updated_at'];

    public function state()
    {
        return $this->belongsTo('App\Models\MstRegion','state_id','id');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\MstRegion','country_id','id');
    }
}
