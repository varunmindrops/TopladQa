<?php

namespace App\View\Components;

use App\Models\MstCourseLevel;
use Illuminate\View\Component;

class CapsuleComponent extends Component
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
        return view('components.capsule-component');
    }

    public function data()
    {
        $mst_course_level = MstCourseLevel::whereHas('mstCourse', fn ($course) => $course->whereValue(request()->segment(1)))
        ->with(['mstCourse','mstCapsulePaperSubject.capsuleProduct.user','mstCapsulePaperSubject.capsuleProduct.productPrice'])
        ->where('status', 1)->whereNull('deleted_at')->whereNotIn('id', ['1'])->get()->toArray();
    
        return compact('mst_course_level');
    }
}
