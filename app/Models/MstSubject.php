<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MstSubject extends Model
{
    protected $table = "mst_subject";

    protected $guarded = [];
    
    public function mstCourse()
    {
        return $this->belongsTo('App\Models\MstCourse', 'course_id', 'id');
    }

    public function mstCourseLevel()
    {
        return $this->belongsTo('App\Models\MstCourseLevel', 'course_level_id', 'id');
    }

    public function product()
    {
        return $this->hasMany('App\Models\Product', 'subject_id', 'id');
    }

    public function capsuleProduct()
    {
        return $this->hasMany('App\Models\Product', 'subject_id', 'id')->where('status', 1)->whereNull('deleted_at')->where('product_type_id', 4);
    }

    public function pastPaperProduct()
    {
        return $this->hasMany('App\Models\Product', 'subject_id', 'id')->where('status', 1)->whereNull('deleted_at')->where('product_type_id', 6);
    }

    public function mtpProduct()
    {
        return $this->hasMany('App\Models\Product', 'subject_id', 'id')->where('status', 1)->whereNull('deleted_at')->where('product_type_id', 7);
    }

    public function rtpProduct()
    {
        return $this->hasMany('App\Models\Product', 'subject_id', 'id')->where('status', 1)->whereNull('deleted_at')->where('product_type_id', 9);
    }

    public function bookProduct()
    {
        return $this->hasMany('App\Models\Product', 'subject_id', 'id')->where('status', 1)->whereNull('deleted_at')->where('product_type_id', 1);
    }
}
