@extends('layouts.cs-layout')

@prepend('head-data')
<title>CS Professional | Syllabus Old & New, Subjects, Result, Study Material</title>
<meta name="description" content="CS Professional Programme is Final Level of Company Secretary Course. Professional Programme can be pursued only after clearing the Executive Programme of CS Course. The examination is conducted twice a year in June and December.">
<meta name="keywords" content="cs professional new syllabus, cs professional, cs professional subjects, cs professional result, cs professional study material , cs professional exam date, cs professional modules, cs professional old syllabus " />
@endprepend

@section('content')

<div class="inner_theme_page inner_header_page p-b40">
   <nav aria-label="breadcrumb" class="bdcrumb">
      <div class="container">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li title="CSEET" class="breadcrumb-item active" aria-current="page">
               CS Professional
            </li>
         </ol>
      </div>
   </nav>
   <div class="wrap_theme_pages list-style-inherit">
      <section class=" ra_courses format-li">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 heading-section">
                  <h1 class="inner_theme_title">
                     CS Professional
                  </h1>
                  <p class="f-p">
                     CS Professional Programme is Final Level of Company Secretary Course.
                  </p>
                  <div class="cous-types">
                     <div class="course_indetails row">
                        <div class="wrap_tab_oput">
                           <div class="single_pinfo my-1">

                              <div class="my-4">
                                 <h4 class="mb-10 mt-4 pt-0 f-26">Eligibility for Admission</h4>
                                 <p class="f-p">
                                    Professional Programme can be pursued only after clearing the Executive Programme of CS Course. The examination is conducted twice a year in June and December.
                                 </p>
                              </div>

                              <div class="my-4">

                                 <h4 class="mb-10 mt-4 pt-0 f-26">
                                    Fee Structure for CS Professional
                                 </h4>
                                 <p class="f-p">
                                    <strong>Registration Fee</strong> of CS Professional Course – Rs.13000.
                                 </P>
                                 <p class="f-p">
                                    <strong>Examination Fee</strong> of CS Professional Course – Rs.1200.
                                 </P>
                              </div>

                              <div class="my-4">

                                 <h4 class="mb-10 mt-4 pt-0 f-26">
                                    Syllabus for CS Professional Course
                                 </h4>
                                 <p class="f-p">
                                    Syllabus for CS Executive Course have been divided in three Groups
                                 </p>
                                 <p class="f-p">
                                    <strong>Module – I</strong>
                                 </p>
                                 <ol>
                                    @foreach($cs_professional_1 as $level)
                                    @foreach($level['mstSubject'] as $subject)
                                    @if(!empty($subject['slug']))
                                    <li>
                                       <a href="/{{$segment}}/paper/{{ $subject['slug'] }}" target="_blank">{{ $subject['name'] }}</a>
                                    </li>
                                    @endif
                                    @endforeach
                                    @endforeach
                                 </ol>

                                 <p class="f-p">
                                    <strong>Module – II</strong>
                                 </p>
                                 <ol>
                                    @foreach($cs_professional_2 as $level)
                                    @foreach($level['mstSubject'] as $subject)
                                    @if(!empty($subject['slug']))
                                    <li>
                                       <a href="/{{$segment}}/paper/{{ $subject['slug'] }}" target="_blank">{{ $subject['name'] }}</a>
                                    </li>
                                    @endif
                                    @endforeach
                                    @endforeach
                                 </ol>
                                 <p class="f-p">
                                    <strong>Module – III</strong>
                                 </p>
                                 <ol>
                                    @foreach($cs_professional_3 as $level)
                                    @foreach($level['mstSubject'] as $subject)
                                    @if(!empty($subject['slug']))
                                    <li>
                                       <a href="/{{$segment}}/paper/{{ $subject['slug'] }}" target="_blank">{{ $subject['name'] }}</a>
                                    </li>
                                    @endif
                                    @endforeach
                                    @endforeach
                                 </ol>
                                 </p>
                              </div>

                              <div class="my-4">

                                 <h4 class="mb-10 mt-4 pt-0 f-26">Passing Criteria</h4>
                                 <p class="f-p">
                                    <strong>For All Modules:</strong>
                                    A candidate shall be declared to have passed in all modules of Professional Programme
                                    examination-
                                 </p>
                                 <p class="f-p">
                                    (i) If taken simultaneously and if he/she secures at one sitting, a minimum of forty per cent
                                    marks in each of the papers in which he/she is required to appear and fifty per cent marks
                                    in the aggregate of all the papers put together; or
                                 </p>
                                 <p class="f-p">
                                    (ii) If he/she has passed in any one or more module(s) of Professional Programme
                                    examination held under the old syllabus prior to the commencement of Professional
                                    Programme examination under the new syllabus, and secures at one sitting a minimum of
                                    forty per cent marks in each of the remaining papers in which he/she is required to appear
                                    and fifty per cent marks in the aggregate of all such remaining papers put together.
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   </div>
   </section>
</div>
@endsection