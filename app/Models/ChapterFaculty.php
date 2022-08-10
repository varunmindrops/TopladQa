<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChapterFaculty extends Model
{
    protected $table = 'chapter_faculty';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
