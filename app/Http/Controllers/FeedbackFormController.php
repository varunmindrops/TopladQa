<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.feedback-form');
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
        $request->validate([
            'name' => 'required|regex:/^([a-zA-Z\.]+\s)*[a-zA-Z\.]+$/|max:255',
            'email' => 'required|email:rfc,dns',
            'mobile' => 'required|digits:10|regex:/^((?!(0))[0-9]{10})$/',
            'que1' => 'required',
            'que2' => 'required',
            'que3' => 'required',
            'que4' => 'required',
            'que5' => 'required',
            'que6' => 'required',
            'que7' => 'required',
            'que8' => 'required',
            'que9' => 'required'
        ],
        [
            'que1.required' => 'This field is required.',
            'que2.required' => 'This field is required.',
            'que3.required' => 'This field is required.',
            'que4.required' => 'This field is required.',
            'que5.required' => 'This field is required.',
            'que6.required' => 'This field is required.',
            'que7.required' => 'This field is required.',
            'que8.required' => 'This field is required.',
            'que9.required' => 'This field is required.'
        ]);

        Feedback::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->mobile,
            'experince_raghav_academy' => $request->que1,
            'video_lectures' => $request->que2,
            'books_study_material' => $request->que3,
            'counsellors' => $request->que4,
            'expert_faculty_panel' => $request->que5,
            'doubt_solving' => $request->que6,
            'after_sales_service' => $request->que7,
            'overall_experience' => $request->que8,
            'des_overall_experience' => $request->que9
        ]);

        return response()->json([ 'success'=> 'Thanks for sharing your valuable feedback!']);
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
        //
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
}
