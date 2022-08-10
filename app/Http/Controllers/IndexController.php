<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MstCourseLevel;
use App\Models\MstCourse;
use App\Models\Feedback;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function index()
    {
        $segment = request()->segment(1);

        $users = User::whereHas('allProduct.subject.mstCourseLevel.mstCourse', fn ($course) => $course->whereValue(request()->segment(1)))->where('role', 'teacher')->where('status', 1)->whereNull('deleted_at')->get();

        $course_level = MstCourseLevel::whereHas('mstCourse', fn ($course) => $course->whereValue(request()->segment(1)))
            ->with('mstSubject')->where('status', 1)->whereNull('deleted_at')->get();

        $feedback = Feedback::where('status', 1)->whereNull('deleted_at')->get();

        $data = MstCourse::where('status', '1')->whereNull('deleted_at')->get();

        if ($segment == 'cma') {
            return view('site.cma-index', compact('users', 'course_level', 'feedback', 'segment'));
        } elseif ($segment == 'cs') {
            return view('site.cs-index', compact('users', 'course_level', 'feedback', 'segment'));
        } elseif ($segment == 'ca') {
            return view('site.ca-index', compact('users', 'course_level', 'feedback', 'segment'));
        } elseif ($segment == '') {
            return view('site.index', compact('users', 'feedback', 'data'));
        }
    }

    public function feedbackFormSubmit(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|regex:/^([a-zA-Z\.]+\s)*[a-zA-Z\.]+$/|max:255',
                'email' => 'required|email:rfc,dns',
                'course_type' => 'required',
                'phone' => 'required|digits:10|regex:/^((?!(0))[0-9]{10})$/',
                'feedback' => 'required'
            ],
            [
                'name.regex' => 'Only letters, dot(.), single space between words are allowed.'
            ]
        );

        if ($validator->fails()) {
            return redirect('/' . '#feedback_form')->withErrors($validator)->withInput();
        } else {
            $name = $request->name;
            $email = $request->email;
            $course_type = $request->course_type;
            $phone = $request->phone;
            $feedback = $request->feedback;

            $to_name = "Toplad Team";
            $to_email = "info@toplad.in";
            //$to_email="ankita@mindrops.com";
            $data = array('name' => $to_name, 'uname' => $name, 'email' => $email, 'course_type' => $course_type, 'contact' => $phone, 'feedback' => $feedback);
            Mail::send('email-template.feedback', $data, function ($message) use ($to_name, $to_email) {

                $message->to($to_email)
                    ->cc(['topladcare@gmail.com'])
                    ->subject('Feedback');
            });

            return redirect('/')->with('success', 'Email Sent Successfully');
        }
    } 
}
