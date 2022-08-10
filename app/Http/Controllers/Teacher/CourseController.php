<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\MstCourse;
use App\Models\MstCourseLevel;
use App\Models\TeacherCourse;
use App\Models\TeacherCourseLevel;
use App\Models\TeacherSubject;
use App\Models\MstSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with(['teacherCourse', 'teacherCourseLevel', 'teacherSubject.mstSubject'])->find(Auth::id());
        $mstCourse = MstCourse::where('status', 1)->select('id', 'name')->whereNull('deleted_at')->get();
        $mstCourseLevel = MstCourseLevel::where('status', 1)->select('id', 'name')->whereNull('deleted_at')->get();

        return view('admin.super-admin.edit-course', compact('user', 'mstCourse', 'mstCourseLevel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required',
            'course_level_id' => 'required',
            'subject_id' => 'required'
        ]);

        $course = explode(",", $request->course_id);
        $course_level = explode(",", $request->course_level_id);

        TeacherCourse::where('user_id', Auth::id())->delete();
        TeacherCourseLevel::where('user_id', Auth::id())->delete();
        TeacherSubject::where('user_id', Auth::id())->delete();

        $teachCourse = array_map(function ($v) {
            return [
                'user_id' => Auth::id(),
                'course_id' => $v
            ];
        }, $course);

        $teacherCourse = array_map(function ($v) {
            return [
                'user_id' => Auth::id(),
                'course_level_id' => $v
            ];
        }, $course_level);

        $teacherSubject = array_map(function ($v) {
            return [
                'user_id' => Auth::id(),
                'subject_id' => $v
            ];
        }, $request->subject_id);

        $teachCourseCreated = TeacherCourse::insert($teachCourse);
        $teacherCourseCreated = TeacherCourseLevel::insert($teacherCourse);
        $teacherSubjectCreated = TeacherSubject::insert($teacherSubject);

        return redirect('teacher/course')->with('success', 'Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function teacherCourseLevel(Request $request)
    {
        $levels = MstCourseLevel::whereIn('course_id', $request->teacher_course)->whereNull('deleted_at')->get();
        return ['levels' => $levels];
    }

    public function teacherSubject(Request $request)
    {
        $subjects = MstSubject::whereIn('course_level_id', $request->teacher_course_level)->whereNull('deleted_at')->get();
        return ['subjects' => $subjects];
    }
}
