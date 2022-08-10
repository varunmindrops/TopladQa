<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UploadFile extends Model
{
    protected $table = "upload_file";

    use SoftDeletes;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\Models\User', 'creator_user_id', 'id');
    }

    public function mstCourseLevel(){
        return $this->belongsTo('App\Models\MstCourseLevel', 'course_level_id', 'id');
    }
}
