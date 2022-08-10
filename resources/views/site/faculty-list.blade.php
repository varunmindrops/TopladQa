@if(!isset($course[0]))
<script>
    window.location = "{{ url('404') }}";
</script>
@else

@extends($segment=='cma' ? 'layouts.cma-layout' : (($segment=='cs') ? 'layouts.cs-layout' : (($segment=='ca') ?
'layouts.ca-layout' : 'layouts.ca-layout')))

@prepend('head-data')
<title>{{ $course[0]->subject_name}}, {{ $course[0]->course_level }} | Toplad</title>
<meta name="description" content="Learn the {{ $course[0]->subject_name}} from India's top {{ strtoupper($segment) }} faculty at Toplad. Get the {{ $course[0]->course_level }}, note and pdf anywhere and anytime to study.">
@if($segment=='cma')
<meta name="keywords" content="CMA, CMA courses online, Foundation to Final, Top Faculty of India, Academy of Excellence, CMA in Future, CMA Books, Online CMA Classes, {{ $course[0]->subject_name}}, {{ $course[0]->course_level }}" />
@elseif($segment=='cs')
<meta name="keywords" content="CS, CS courses online, CSEET, CS Executive, CS Professional, Top Faculty of India, Academy of Excellence, CS in Future, CS Books, Online CS Classes" />
@elseif($segment=='ca')
<meta name="keywords" content="CA, CA courses online, CA Foundation, CA Inter, CA Inter Group 1, CA Inter Group 2, CA Final, CA Final Group 1, CA Final Group 2, Top Faculty of India, Academy of Excellence, CA in Future, CA Books, CA Notes, Online CA Classes" />
@endif
@endprepend

@section('content')

@php
$split = explode(' ', $course[0]->course_level);

if (count($split) === 1) {
    $courselevel = $split[0];
} else {
    unset($split[0]);
    $courselevel = implode(' ', $split);
}
@endphp

<div class="inner_theme_page inner_header_page faculty_theme p-b30">
    <nav aria-label="breadcrumb" class="bdcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/{{$segment}}">{{ strtoupper($segment) }}</a> 
                </li>
                <li title="Faculty Profile" class="breadcrumb-item active" aria-current="page">{{ $courselevel }} - {{ $course[0]->subject_name }}</li>
            </ol>
        </div>
    </nav>

    <section class=" faclt-prof">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ftco-animate p-b10">
                    <h1 class="inner_theme_title">{{ $course[0]->subject_name}}
                        {{ $course[0]->course_level }}
                    </h1>
                </div>
            </div>
            <div class="side__bar">
                <div class="faculty-column">
                            <div class="prod-desc-box">
                                <h2 class="prod-h1">Taught by Faculties:</h2>
                            </div>
                    <div class="side__bar-bg">
                        <div class="faculty-list-side__bar">
                            @foreach($teachers as $teacher)
                            @if(!empty($teacher->user_slug) && !empty($teacher->subject_slug))
                            <div class="col-md-12 op-hov">
                                <a title="{{ ucwords($teacher->teacher_name) }}" href="/{{$segment}}/product/{{$teacher->subject_slug}}-{{$teacher->user_slug}}/{{$teacher->product_id}}">
                                    <div class="case_study_area product_area">
                                        <div class="single_study text-center">
                                            <div class="thumb">
                                                <img src="{{ $teacher->photo }}" alt="">
                                            </div>
                                            <div class="details p-10 text-left update_content wrap_main_info">
                                                <div class="course_info">
                                                    <div>
                                                        <h6 class="text-dark">{{ ucwords($teacher->teacher_name) }}</h6>
                                                    </div>
                                                    <span class="min_gapper"></span>
                                                </div>
                                                <div class="text-left outer_listc">
                                                    <div>
                                                        <h6 class="text-dark subject_namer">
                                                            {{ $teacher->subject_name }} </h6>
                                                    </div>
                                                    <div class="cost_course">
                                                        <p>₹{{ round($teacher->minimum_price) }} –
                                                            ₹{{ round($teacher->maximum_price) }} </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row bottom_cinfos">
                    @if(!empty($course[0]->paper_syllabus))
                        <div class="col-md-12 col-sm-12 com_bdivs pr-5" id="sylbsdiv">
                            <div class="prod-desc-box">
                                <h2 class="prod-h1">Syllabus</h2>
                                <div class="course_view_block">
                                    <h2>{!! $course[0]->paper_syllabus !!}</h2>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div> 

</div>
</div>
</section>
</div>
@endsection

@endif