<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobPost;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class ApprovedJobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search != "") {
            $request->validate(
                [
                    'search' => 'regex:/^([a-zA-Z0-9\.\,\-\@]+\s)*[a-zA-Z0-9\.\,\-\@]+$/'
                ],
                [
                    'search.regex' => 'Only letters, numbers, dot(.), @, comma(,), -, single space between words are allowed.'
                ]
            );

            $data = JobPost::with('mstCourse')->where(function ($query) use ($request) {
                $query->where('post', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('salary_offered', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('qualification', 'LIKE', '%' . $request->search . '%');
            })
                ->whereNull('deleted_at')->orderBy('created_at', 'DESC')->paginate(10);

            $data->appends(array(
                'search' => $request->search,
            ));
        } else {
            $data = JobPost::with('mstCourse')->whereNull('deleted_at')->where('status', 'approved')->orderBy('created_at', 'DESC')->paginate(10);
        }

        return view('admin.super-admin.approved-job-post', compact('data'));
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
        $id = $request->post_id;

        $validator = Validator::make($request->all(), [
            'course' => 'required',
            'title' => 'required',
            'salary' => 'required',
            'qualification' => 'required',
            'experience' => 'required',
            'description' => 'required',
            'organization' => 'required',
            'nature_org' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric|digits_between:10,11',
            'email' => 'required|email:rfc,dns',
            'apply_before' => 'required',
            'posting' => 'required',
            'post_no' => 'nullable|numeric',
            'file_upload' => 'mimes:pdf,png,jpeg,jpg'
             ],
            [
                'file_upload.mimes' => 'Only PDF,PNG,JPEG,JPG is allowed'
            ]);

        if ($validator->fails()) {
            $msg = $validator->messages();
            return redirect()->back()->with('error', $msg);
        } else {
            if ($request->hasFile('file_upload')) {
                $dirpath = 'images/jobpost_files/';
                if (!file_exists($dirpath)) {
                    mkdir($dirpath, 0777, true);
                }
                $originName = $request->file('file_upload')->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $request->file('file_upload')->getClientOriginalExtension();
                $fileName = $fileName . '_' . time() . '.' . $extension;

                $request->file('file_upload')->move(public_path($dirpath), $fileName);
                $url = asset($dirpath . $fileName);
            JobPost::updateOrCreate(['id' => $id], 
            ['course_id' => $request->course,
            'post' => $request->title,
            'salary_offered' => $request->salary,
            'qualification' => $request->qualification,
            'experience' => $request->experience,
            'description' => $request->description,
            'organization' => $request->organization,
            'nature_of_organization' => $request->nature_org,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'apply_before' => $request->apply_before,
            'posting_place' => $request->posting,
            'no_of_post' => $request->post_no,
            'file_path' => $url]);
        } else {
            JobPost::updateOrCreate(
                ['id' => $id],
                [
                    'course_id' => $request->course,
                    'post' => $request->title,
                    'salary_offered' => $request->salary,
                    'qualification' => $request->qualification,
                    'experience' => $request->experience,
                    'description' => $request->description,
                    'organization' => $request->organization,
                    'nature_of_organization' => $request->nature_org,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'apply_before' => $request->apply_before,
                    'posting_place' => $request->posting,
                    'no_of_post' => $request->post_no
                ]
            );
        }

            if (empty($id))
                $msg = 'Some error occurred!';
            else
                $msg = 'Job post details updated successfully';

            return redirect()->back()->with('success', $msg);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobpost = JobPost::where('id', $id)->get();
        return Response::json($jobpost);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = JobPost::with('mstCourse')->where('id', $id)->first();
        return Response::json($data);
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
        $data = JobPost::where('id', $request->id)->update(['status' => $request->status]);
        return Response::json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = JobPost::where('id', $id)->delete();
        return Response::json($data);
    }
}
