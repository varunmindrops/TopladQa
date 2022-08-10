<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $table = "product";

    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\MstSubject', 'subject_id', 'id');
    }

    public function productPrice()
    {
        return $this->hasMany('App\Models\ProductPrice')->whereNull('deleted_at');
    }

    public function productDoubtResolution()
    {
        return $this->hasMany('App\Models\ProductDoubtResolution');
    }

    public function printedBook()
    {
        return $this->hasMany('App\Models\Book')->where('is_printed', 1);
    }

    public function eBook()
    {
        return $this->hasMany('App\Models\Book')->where('is_ebook', 1);
    }

    public function video()
    {
        return $this->hasMany('App\Models\Video')->where('status', 1)->whereNull('deleted_at');
    }

    public function videoLanguage()
    {
        return $this->hasMany('App\Models\ProductLanguage')->where('product_type_id', 2);
    }

    public function videoDevice()
    {
        return $this->hasMany('App\Models\VideoDevice');
    }

    public function dummyVideo()
    {
        return $this->hasMany('App\Models\ProductDummyVideo');
    }
}
