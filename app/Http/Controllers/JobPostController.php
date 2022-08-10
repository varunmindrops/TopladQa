<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MstCourse;
use App\Models\JobPost;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MstCourse::where('status', '1')->whereNull('deleted_at')->get();
        return view('site.job-post-form', compact('data'));
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
                'course_type' => 'required',
                'post' => 'required',
                'salary' => 'required',
                'qualification' => 'required',
                'experience' => 'required',
                'description' => 'required',
                'organization' => 'required',
                'org_nature' => 'required',
                'address' => 'required',
                'phone' => 'required|numeric|digits_between:10,11',
                'email' => 'required|email:rfc,dns',
                'apply' => 'required',
                'posting_place' => 'required',
                'post_no' => 'nullable|numeric',
                'my_file' => 'mimes:pdf,png,jpeg,jpg'
        ],
        [
            'my_file.mimes' => 'Only PDF,PNG,JPEG,JPG is allowed'
        ]);

        if ($request->hasFile('my_file')) {
            $dirpath = 'images/jobpost_files/';
            if (!file_exists($dirpath)) {
                mkdir($dirpath, 0777, true);
            }
            $originName = $request->file('my_file')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('my_file')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('my_file')->move(public_path($dirpath), $fileName);
            $url = asset($dirpath . $fileName);
            JobPost::create([
                'course_id' => $request->course_type,
                'post' => $request->post,
                'salary_offered' => $request->salary,
                'qualification' => $request->qualification,
                'experience' => $request->experience,
                'description' => $request->description,
                'organization' => $request->organization,
                'nature_of_organization' => $request->org_nature,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'apply_before' => $request->apply,
                'posting_place' => $request->posting_place,
                'no_of_post' => $request->post_no,
                'file_path' => $url
            ]);
        } else {
            JobPost::create([
                'course_id' => $request->course_type,
                'post' => $request->post,
                'salary_offered' => $request->salary,
                'qualification' => $request->qualification,
                'experience' => $request->experience,
                'description' => $request->description,
                'organization' => $request->organization,
                'nature_of_organization' => $request->org_nature,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'apply_before' => $request->apply,
                'posting_place' => $request->posting_place,
                'no_of_post' => $request->post_no
            ]);
        }
        return redirect()->back()->with('success', 'Thanks!');
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
