<?php

namespace App\View\Components;

use App\Models\MstCourseLevel;
use Illuminate\View\Component;

class RtpComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.rtp-component');
    }

    public function data()
    {
        $mst_course_level = MstCourseLevel::whereHas('mstCourse', fn ($course) => $course->whereValue(request()->segment(1)))
        ->with(['mstCourse','mstPaperSubject.rtpProduct.user','mstPaperSubject.rtpProduct.productPrice.paperDeliveryType'])
        ->where('status', 1)->whereNull('deleted_at')->get()->toArray();
        
        return compact('mst_course_level');
    }
}
