<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MstChapter extends Model
{
    protected $table = 'mst_chapter';

    public function chapterPrice()
    {
        return $this->hasMany('App\Models\ChapterPrice', 'chapter_id', 'id')->whereNull('deleted_at');
    }

    public function chapterFaculty()
    {
        return $this->hasMany('App\Models\ChapterFaculty', 'chapter_id', 'id')->whereNull('deleted_at');
    }
}
