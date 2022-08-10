<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetailsNew extends Model
{
    protected $table = 'order_details_new';

    protected $fillable = [
        'order_id', 'course_name', 'product_id', 'video_language', 'teacher_id', 'subject_id', 'chapter_id', 'book_name', 'teacher_type', 'product_details', 'course_level', 'sale_mode', 'product_type', 'price', 'created_at', 'updated_at'
      ];

    public function mstSubject()
    {
        return $this->belongsTo('App\Models\MstSubject', 'subject_id', 'id');
    }

    public function mstChapter()
    {
        return $this->belongsTo('App\Models\MstChapter', 'chapter_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'teacher_id', 'id');
    }
}
