<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use App\Models\MstCourse;

class ViewJobPostController extends Controller
{
    public function index()
    {
        $course = MstCourse::with('jobPost')->where('status', 1)->whereNull('deleted_at')->get();
        return view('site.jobs-ca-cma-cs', compact('course'));
    }

    public function jobPosts($segment)
    {
        if ($segment == 'cma' || $segment == 'cs' || $segment == 'ca') {
            $course = MstCourse::with('jobPost')->where('value', $segment)->where('status', 1)->whereNull('deleted_at')->get();
            return view('site.'.$segment.'-jobs', compact('course', 'segment'));
        } else {
            return view('site.404');
        }
    }
    
    public function jobDescription($segment, $post, $id)
    {
        $jobs = JobPost::with('mstCourse')->where('id', $id)->first();
        return view('site.jobs-description', compact('jobs','segment'));
    }
}
