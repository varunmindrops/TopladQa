<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MstCourseLevel extends Model
{
    protected $table = 'mst_course_level';
    protected $fillable = [
        'meta_keywords','meta_title','meta_description','page_description',
      ];

    public function mstSubject(){
        return $this->hasMany('App\Models\MstSubject', 'course_level_id', 'id')->whereNull('deleted_at')->orderBy('sort_order', 'asc');
    }

    public function mstCapsulePaperSubject(){
        return $this->hasMany('App\Models\MstSubject', 'course_level_id', 'id')->where('capsule_status', 1)->whereNull('deleted_at')->orderBy('sort_order', 'asc');
    }

    public function mstBookPaperSubject(){
        return $this->hasMany('App\Models\MstSubject', 'course_level_id', 'id')->where('book_status', 1)->whereNull('deleted_at')->orderBy('sort_order', 'asc');
    }

    public function mstPaperSubject(){
        return $this->hasMany('App\Models\MstSubject', 'course_level_id', 'id')->whereIn('status', ['1','2'])->whereNull('deleted_at')->orderBy('sort_order', 'asc');
    }

    public function mstCourse(){
        return $this->belongsTo(MstCourse::class, 'course_id');
    }

    public function uploadFile(){
        return $this->hasMany('App\Models\UploadFile', 'course_level_id', 'id')->whereNotNull('file_path')->whereNull('deleted_at')->orderBy('created_at', 'desc');
    }
}
