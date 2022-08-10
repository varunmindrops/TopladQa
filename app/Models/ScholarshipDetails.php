<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScholarshipDetails extends Model
{
    protected $table = 'scholarship_details';

    protected $fillable = [
      'scholarship_id', 'course_id', 'combo_type', 'qualifying_course', 'marks_obtained', 'max_marks', 'percentage', 'registration_no', 'roll_no', 'qualifying_exam_date', 'id_proof', 'marksheet', 'created_at', 'updated_at'
    ];
}
