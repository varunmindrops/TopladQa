<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\MstCourseLevel;
use App\Models\MstDeliveryType;

class PastPaperComponent extends Component
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
        return view('components.past-paper-component');
    }

    public function data()
    {
        $mst_course_level = MstCourseLevel::whereHas('mstCourse', fn ($course) => $course->whereValue(request()->segment(1)))
        ->with(['mstCourse','mstPaperSubject.pastPaperProduct.user','mstPaperSubject.pastPaperProduct.productPrice.paperDeliveryType'])
        ->where('status', 1)->whereNull('deleted_at')->whereNotIn('id', ['1','6'])->get()->toArray();
        
        return compact('mst_course_level');
    }
}
