<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MstCourseLevel;

class DemoVideosController extends Controller
{
    public function index($segment)
    {
        $course_level = MstCourseLevel::whereHas('mstCourse', fn ($course) => $course->whereValue($segment))
        ->with(['mstSubject.product.dummyVideo', 'mstSubject.product.user' => function ($query) {
            $query->where('status', 1);
         }])->where('status', 1)->whereNull('deleted_at')->get();
    
        if($segment == 'cma' || $segment == 'cs' || $segment == 'ca') {
            return view('site.demo-videos', compact('course_level', 'segment'));
        } else {
            return view('site.404');
        }
    }
}
