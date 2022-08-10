<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\MstCourseLevel;
use App\Models\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course_level = MstCourseLevel::where('status', 1)->whereNull('deleted_at')->get();
        return view('admin.super-admin.upload-files', compact('course_level'));
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
        $id = Auth::id();

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'my_file' => 'required|mimes:doc,docx,txt,png,zip,csv,gif,jpeg,jpg,ppt,xls,xlsm,xlsx,mp4,mp3,pdf,wpd'
        ], [
            'my_file.required' => 'Please choose a file to upload.',
            'my_file.mimes' => 'Invalid file type.'
        ]);
        
        if ($request->hasFile('my_file')) {
            $dirpath = 'images/uploaded_files/';
            if (!file_exists($dirpath)) {
                mkdir($dirpath, 0777, true);
            }
            $originName = $request->file('my_file')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('my_file')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('my_file')->move(public_path($dirpath), $fileName);
            $url = asset($dirpath . $fileName);
            UploadFile::Create(['creator_user_id' => $id, 
                                'name' => $request->title, 
                                'course_level_id' => $request->category, 
                                'description' => $request->description, 
                                'file_path' => $url
                                ]);

            return redirect()->back()->with('success', 'File Uploaded Successfully');
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
