@extends($segment=='cma'?'layouts.cma-layout':($segment=='cs'?'layouts.cs-layout':'layouts.ca-layout'))
@prepend('head-data')
<title>@php echo strip_tags($course_level[0]['meta_title'])@endphp</title>
<meta name="description" content="@php echo strip_tags($course_level[0]['meta_description'])@endphp">
<meta name="keywords" content="@php echo strip_tags($course_level[0]['meta_keywords'])@endphp
" />
@endprepend

@section('content')

<div class="inner_theme_page inner_header_page p-b40">
<nav aria-label="breadcrumb" class="bdcrumb">
   <div class="container">
      <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/{{ $segment }}">Home</a></li>
      <li title="{{ strtoupper($segment) }}" class="breadcrumb-item active" aria-current="page">
      {{ $course_level[0]['name'] }}
      </li>
      </ol>
   </div>
</nav>
<div class="wrap_theme_pages list-style-inherit pb-4 mb-4">
   <section class="ra_courses format-li">
      <div class="container">
         <div class="row">
            <div class="col-sm-12 heading-section">{!!$course_level[0]['page_description']!!}
               <!-- <div class="cous-types">
                <div class="course_indetails row"> -->
                   @php $courseName=$course_level[0]['name'];   @endphp
                    @if($courseName==="CMA Foundation" || $courseName==="CMA Inter" || $courseName==="CMA Final")
                    <div class="wrap_tab_oput">
                        <div class="step-bar mt-5 mb-4">
                           <ul class="progressbar d-flex justify-content-between">
                              <li class="@php echo $courseName==="CMA Foundation"?'active':'' @endphp"><a href="/{{$segment}}/{{$segment}}-inter" target="_blank" rel="noopener noreferrer">CMA Foundation</a></li>
                              <li class="@php echo $courseName==="CMA Inter"?'active':'' @endphp"><a href="/{{$segment}}/{{$segment}}-inter" target="_blank" rel="noopener noreferrer">CMA Intermediate</a></li>
                              <li class="@php echo $courseName==="CMA Final"?'active':'' @endphp"><a href="/{{$segment}}/{{$segment}}-final" target="_blank" rel="noopener noreferrer">CMA Final</a></li>
                           </ul>
                        </div>
                    </div>
                    @endif
                <!-- </div>
               </div> -->
            </div>
         </div>
      </div>
   </section>
</div>
@endsection