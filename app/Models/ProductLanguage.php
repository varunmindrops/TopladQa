<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductLanguage extends Model
{
    protected $table = "product_language";

    public function mstLanguage()
    {
        return $this->belongsTo('App\Models\MstLanguage', 'language_id', 'id');
    }
}
