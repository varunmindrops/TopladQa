<?php

namespace App\View\Components;

use App\Models\MstCourseLevel;
use Illuminate\View\Component;

class BookComponent extends Component
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
        return view('components.book-component');
    }

    public function data()
    {
        $mst_course_level = MstCourseLevel::whereHas('mstCourse', fn ($course) => $course->whereValue(request()->segment(1)))
        ->with(['mstCourse','mstBookPaperSubject.bookProduct.printedBook','mstBookPaperSubject.bookProduct.user','mstBookPaperSubject.bookProduct.productPrice.bookDelivery'])
        ->where('status', 1)->whereNull('deleted_at')->get()->toArray();
    
        //dd($mst_course_level);
        return compact('mst_course_level');
    }
}
