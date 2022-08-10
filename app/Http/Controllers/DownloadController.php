<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\PdfNotesDownloadMail;
use App\Models\DownloadNotesPdf;
use App\Models\MstCourseLevel;
use App\Models\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DownloadController extends Controller
{
    public function index($segment)
    {
        $course_level = MstCourseLevel::whereHas('mstCourse', fn($course) => $course->whereValue($segment))
            ->with(['uploadFile.user'])->where('status', 1)->whereNull('deleted_at')->get();

        $cmaGeneral = UploadFile::with(['user'])->where('course_level_id', 'cma')->whereNotNull('file_path')->whereNull('deleted_at')->orderBy('created_at', 'desc')->get();
        $csGeneral = UploadFile::with(['user'])->where('course_level_id', 'cs')->whereNotNull('file_path')->whereNull('deleted_at')->orderBy('created_at', 'desc')->get();
        $caGeneral = UploadFile::with(['user'])->where('course_level_id', 'ca')->whereNotNull('file_path')->whereNull('deleted_at')->orderBy('created_at', 'desc')->get();

        if ($segment == 'cma' || $segment == 'cs' || $segment == 'ca') {
            return view('site.downloads', compact('course_level', 'cmaGeneral', 'csGeneral', 'caGeneral', 'segment'));
        } else {
            return view('site.404');
        }

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'student_email' => 'required',
        ]);
        $jobs = new DownloadNotesPdf;
        $jobs->create($request->all());
        $this->attachment_email($request->student_email, $request->file_path, $request->segment, $request->title, $request->faculty_name);

        return redirect('/' . $request->segment . '/downloads-notes')->with('success', 'Your notes have been sent. Check your mail.');
    }

    public function attachment_email($student_email, $file_path, $segment, $title, $faculty_name)
    {
        $file = url('/') . $file_path;
        $file_name = explode("/", $file_path, 4)[3];
        $data = array('title' => "$title", 'faculty_name' => "$faculty_name", 'segment' => "$segment");

        // $file_size = File::size(public_path() . $file_path);
        $details = [
            'segment' => "TopLad-$segment",
            'title' => $title,
            'faculty_name' => $faculty_name,
            'file' => $file,
            'file_name' => $file_name,
            // 'file_size' => $file_size,
        ];

        Mail::to($student_email, 'Tutorials Point')->send(new PdfNotesDownloadMail($details));

    }

    public function data_type()
    {

    }

}
