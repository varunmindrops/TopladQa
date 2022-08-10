<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    protected $fillable = [
        'user_id', 'after_sales_phone', 'after_sales_person', 'tech_supp_phone', 'tech_supp_person', 'experience_id', 'teaching_experience_id', 'edu_qualification', 'prof_achievement', 'award_honour', 'area_of_interest', 'bio', 'resume_url', 'created_at', 'updated_at'
      ];

    public function totalExperience()
    {
        return $this->belongsTo('App\Models\MstExperience', 'experience_id', 'id');
    }

    public function teachingExperience()
    {
        return $this->belongsTo('App\Models\MstExperience', 'teaching_experience_id', 'id');
    }
}
