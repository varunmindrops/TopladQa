<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MstCourseLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function course($segment)
    {
        $course_level = MstCourseLevel::whereHas('mstCourse', fn ($course) => $course->whereValue(request()->segment(1)))
        ->with('mstSubject')->where('status', 1)->whereNull('deleted_at')->get();

        if($segment == "cma") {
            return view('site.course', compact('course_level','segment'));
        } elseif($segment == "cs") {
            return view('site.cs-course', compact('course_level','segment'));
        } elseif($segment == "ca") {
            return view('site.ca-course', compact('course_level','segment'));
        }
    }

    public function courseLevel($segment,$level)
    {
        $status=1;
        if($level=='cma-inter'||$level=='cma-final'||$level=='cs-executive'||$level=='cs-professional'||$level=='ca-inter'||$level=='ca-final')
        {
            $status=0;
        }
        $course_level = MstCourseLevel::whereHas('mstCourse', fn ($course) => $course->whereValue(request()->segment(1)))
        //->with('mstSubject')
        ->where('mst_slug', $level)->where('status', $status)->whereNull('deleted_at')->get();
        if(!count($course_level)>0)
        {
            return view('site.404');
        }
        return view('site.course-level', compact('course_level','segment'));
    }
}










































































































