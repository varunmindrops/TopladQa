<?php

namespace App\Http\Controllers\Counsellor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MstCourse;
use App\Models\MstCombo;
use App\Models\MstCourseLevel;
use App\Models\MstRegion;
use App\Models\MstSubject;
use App\Models\MstChapter;
use App\Models\User;

class NewOrderController extends Controller
{
    public function index()
    {
        $data = MstCourse::where('status', '1')->whereNull('deleted_at')->get();
        $states = MstRegion::where('parent_id', '1')->whereNull('deleted_at')->get();
        $faculty = User::where('role', 'teacher')->where('status', 1)->whereNotNull('slug')->whereNull('deleted_at')->get();

        return view('admin.super-admin.new-order', compact('data', 'states', 'faculty'));
    }

    public function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $type = $request->get('type');

        $course = MstCourse::where('value', $value)->get();

        if ($type == "combo") {
            $levels = MstCombo::where($select, $course->pluck('id'))->where('status', 1)->whereNull('deleted_at')->get();
        }
        else {
            $levels = MstCourseLevel::where($select, $course->pluck('id'))->where('status', 1)->whereNull('deleted_at')->get();
        }

        $output = '<option value="">Select Group</option>';
        foreach ($levels as $row) {
            $output .= '<option value="' . $row->name . '">' . $row->name . '</option>';
        }
        echo $output;
    }

    public function fetch_subjects(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');

        if ($value == "CMA Inter Group 1 and Group 2 combined") {
            $level = [2, 3];
            $subjects = MstSubject::whereIn($select, $level)->whereNotNull('slug')->whereNull('deleted_at')->get();
            $output = '<option value="">Select Subject</option>';
            foreach ($subjects as $row) {
                $output .= '<option value="' . $row->id . '">' . $row->name . '</option>';
            }
        } else if ($value == "CMA Final Group 3 and Group 4 combined") {
            $level = [4, 5];
            $subjects = MstSubject::whereIn($select, $level)->whereNotNull('slug')->whereNull('deleted_at')->get();
            $output = '<option value="">Select Subject</option>';
            foreach ($subjects as $row) {
                $output .= '<option value="' . $row->id . '">' . $row->name . '</option>';
            }
        } else if ($value == "CA Inter Group 1 and Group 2 combined") {
            $level = [13, 14];
            $subjects = MstSubject::whereIn($select, $level)->whereNotNull('slug')->whereNull('deleted_at')->get();
            $output = '<option value="">Select Subject</option>';
            foreach ($subjects as $row) {
                $output .= '<option value="' . $row->id . '">' . $row->name . '</option>';
            }
        } else if ($value == "CA Final Group 1 and Group 2 combined") {
            $level = [15, 16];
            $subjects = MstSubject::whereIn($select, $level)->whereNotNull('slug')->whereNull('deleted_at')->get();
            $output = '<option value="">Select Subject</option>';
            foreach ($subjects as $row) {
                $output .= '<option value="' . $row->id . '">' . $row->name . '</option>';
            }
        } else if ($value == "CS Executive Mod-1 and Mod-2 Combined") {
            $level = [7, 8];
            $subjects = MstSubject::whereIn($select, $level)->whereNotNull('slug')->whereNull('deleted_at')->get();
            $output = '<option value="">Select Subject</option>';
            foreach ($subjects as $row) {
                $output .= '<option value="' . $row->id . '">' . $row->name . '</option>';
            }
        } else if ($value == "CS Professional Mod-1, Mod-2 and Mod-3 Combined") {
            $level = [9, 10, 11];
            $subjects = MstSubject::whereIn($select, $level)->whereNotNull('slug')->whereNull('deleted_at')->get();
            $output = '<option value="">Select Subject</option>';
            foreach ($subjects as $row) {
                $output .= '<option value="' . $row->id . '">' . $row->name . '</option>';
            }
        } else {
            $courseLevel = MstCourseLevel::where('name', $value)->get();

            $subjects = MstSubject::where($select, $courseLevel->pluck('id'))->whereNotNull('slug')->whereNull('deleted_at')->get();
            $output = '<option value="">Select Subject</option>';
            foreach ($subjects as $row) {
                $output .= '<option value="' . $row->id . '">' . $row->name . '</option>';
            }
        }
        echo $output;
    }

    public function fetch_chapters(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');

        $chapters = MstChapter::where($select, $value)->whereNull('deleted_at')->get();
        $output = '';
        foreach ($chapters as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->name . '</option>';
        }
        echo $output;
    }
}
