<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function printedBookLanguage()
    {
        return $this->hasMany('App\Models\ProductLanguage', 'product_id', 'id')->where('product_type_id', 1)->groupBy('language_id');
    }

    public function eBookLanguage()
    {
        return $this->hasMany('App\Models\ProductLanguage', 'product_id', 'id')->where('product_type_id', 1)->groupBy('language_id');
    }
}
