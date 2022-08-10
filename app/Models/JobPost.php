<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobPost extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'course_id', 'post', 'salary_offered', 'qualification', 'experience', 'description', 'organization', 'nature_of_organization', 'address', 'phone', 'email', 'apply_before', 'posting_place', 'no_of_post', 'file_path', 'status', 'deleted_at', 'created_at', 'updated_at'
  ];

  public function mstCourse()
    {
        return $this->belongsTo('App\Models\MstCourse', 'course_id', 'id');
    }
}
