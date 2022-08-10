<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MstCourseLevel;
use App\Models\MstSubject;
use App\Models\MstChapter;

class ChapterController extends Controller
{
    public function index($segment)
    {
        $course_level = MstCourseLevel::whereHas('mstCourse', fn ($course) => $course->whereValue($segment))
        ->where('status', 1)->whereNull('deleted_at')->get();
        
        return view('site.chapter-sale', compact('course_level', 'segment'));
    }

    public function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $data = MstSubject::where($select, $value)->where('status', 1)->get();
        $output = '';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        echo $output;
    }

    public function fetch_chapters(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $data = MstChapter::with('chapterPrice', 'chapterFaculty.user')->where($select, $value)->whereNull('deleted_at')->get();
        echo $data;
    }
}
