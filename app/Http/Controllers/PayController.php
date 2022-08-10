<?php

namespace App\Http\Controllers;

use App\Models\MstCourseLevel;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\MstLanguage;
use App\Models\ProductPrice;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.pay-now');
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
        if($request->product_type == "Capsule") {
            $data = [
                'teacher_id' => $request->teacher_id,
                'group' => $request->group,
                'paper_no' => $request->paper_no,
                'subject_id' => $request->subject_id,
                'price' => $request->price,
                'course_name' => $request->course_name,
                'product_type' => $request->product_type
            ];
        } elseif($request->product_type == "MTP") {
            $data = [
                'teacher_id' => $request->faculty,
                'subject_id' => $request->subject,
                'group' => $request->group,
                'paper_no' => $request->paper,
                'coverage' => $request->coverage,
                'price' => $request->price,
                'mode' => $request->mode,
                'course_name' => $request->course_name,
                'product_type' => $request->product_type
            ];
        } elseif($request->product_type == "RTP") {
            $data = [
                'teacher_id' => $request->faculty,
                'subject_id' => $request->subject,
                'group' => $request->group,
                'paper_no' => $request->paper,
                'coverage' => $request->coverage,
                'price' => $request->price,
                'mode' => $request->mode,
                'course_name' => $request->course_name,
                'product_type' => $request->product_type
            ];
        } elseif($request->product_type == "Past Papers") {
            $data = [
                'teacher_id' => $request->faculty,
                'subject_id' => $request->subject,
                'group' => $request->group,
                'paper_no' => $request->paper,
                'coverage' => $request->coverage,
                'price' => $request->price,
                'mode' => $request->mode,
                'course_name' => $request->course_name,
                'product_type' => $request->product_type
            ];
        } elseif($request->product_type == "Chapter") {
            $group = MstCourseLevel::where('id', $request->group)->first();
            $data = [
                'teacher_id' => $request->teacher_id,
                'subject_id' => $request->paper_id,
                'chapter_id' => $request->chapter_id,
                'chapter_price' => $request->chapter_price,
                'group' => $group->name,
                'price' => $request->price,
                'course_name' => $request->course_name,
                'product_type' => $request->product_type
            ];
        } elseif($request->product_type == "Combo") {
            $response = [];
            $responseSubjectDetails = [];
            $responseTeacherDetails = [];

            for($i = 1; $i <= $request->no_of_subjects; $i++) {
                $sub = "subject_id_{$i}";
                $t = "paper_{$i}_faculty";

                $response["sub$i"] = $request->$sub;
                $response["t$i"] = $request->$t;

                $responseSubjectDetails["subjectId_$i"] = $request->$sub;
                $responseTeacherDetails["teacherId_$i"] = $request->$t;
            }

            $subjectList = implode(',', $responseSubjectDetails);
            $teacherList = implode(',', $responseTeacherDetails);

            $data = [
                'teacher_id' => $teacherList,
                'subject_id' => $subjectList,
                'price' => $request->price,
                'mode' => $request->mode,
                'group' => $request->group,
                'no_of_subjects' => $request->no_of_subjects,
                'course_name' => $request->course_name,
                'product_type' => $request->product_type
            ];
        } elseif($request->product_type == "Video Lecture") {
            $id = $request->product_id;
            $product = Product::with('subject.mstCourse')->where('id', $id)->first();
            $price = ProductPrice::with(['videoDeliveryType','bookDeliveryType','attempt'])->where('product_id', $id)->where('attempt_id', $request->attempt_type_value)->where('book_delivery_type_id', $request->book_type_value)->where('video_delivery_type_id', $request->video_type_value)->first();
            $language = MstLanguage::where('id', $request->language_type_value)->first();
           
            $data = [
                'teacher_id' => $product->user_id,
                'subject_id' => $product->subject_id,
                'price' => round($price->proposed_market_price),
                'mode' => $price->videoDeliveryType->name,
                'course_name' => $product->subject->mstCourse->value,
                'product_type' => $request->product_type,
                'book_type' => $price->bookDeliveryType->name,
                'attempt' => $price->attempt->name,
                'language' => $language->name,
                'product_id' => $id,
                'slug' => $request->slug,
                'segment' => $request->segment
            ];
        } elseif($request->product_type == "Book") {
            $data = [
                'teacher_id' => $request->teacher_id,
                'subject_id' => $request->subject_id,
                'book_name' => $request->book_name,
                'group' => $request->group,
                'price' => $request->price,
                'mode' => $request->mode,
                'course_name' => $request->course_name,
                'product_type' => $request->product_type
            ];
        }
        
        return view('site.pay-now', compact('data'));
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
