<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use SoftDeletes;
    protected $table = 'feedbacks';
    
    protected $fillable = ['name', 'email', 'phone', 'experince_raghav_academy', 'video_lectures', 'books_study_material', 'counsellors', 'expert_faculty_panel', 'doubt_solving', 'after_sales_service', 'overall_experience', 'des_overall_experience', 'status', 'deleted_at', 'created_at', 'updated_at'];
}
