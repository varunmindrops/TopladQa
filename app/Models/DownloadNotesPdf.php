<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DownloadNotesPdf extends Model
{
    public $table = 'download_notes_pdf';
    protected $fillable = ['student_email', 'file_path', 'course_level'];
}
