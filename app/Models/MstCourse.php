<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MstCourse extends Model
{
    protected $table = 'mst_course';

    public function jobPost()
    {
        return $this->hasMany('App\Models\JobPost', 'course_id', 'id')->where('status', 'approved')->whereNull('deleted_at')->orderBy('created_at', 'desc');
    }
}
