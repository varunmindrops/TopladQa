<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherSubject extends Model
{
    protected $table = 'teacher_subject';

    public function mstSubject()
    {
        return $this->belongsTo('App\Models\MstSubject', 'subject_id', 'id');
    }
}
