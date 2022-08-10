@extends('layouts.cs-layout')

@prepend('head-data')
<title>CS Executive | Syllabus, Registration, Subjects, Result, Study Material</title>
<meta name="description" content="CS Executive is Second Level of Company Secretary Course. Admission to the CS Executive Course is open throughout the year Students who have passed CSEET (CS foundation) exam is eligible for CS Executive registration and CS Exam is conducted twice in a year in June & December.">
<meta name="keywords" content="cs executive, cs executive syllabus, cs executive registration, cs executive subjects, cs executive result, cs executive study material " />
@endprepend

@section('content')

<div class="inner_theme_page inner_header_page p-b40">
   <nav aria-label="breadcrumb" class="bdcrumb">
      <div class="container">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li title="CSEET" class="breadcrumb-item active" aria-current="page">
               CS Executive Mod-1
            </li>
         </ol>
      </div>
   </nav>
   <div class="wrap_theme_pages list-style-inherit">
      <section class="ra_courses format-li">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 heading-section">
                  <h1 class="inner_theme_title">
                     CS Executive Mod-1
                  </h1>
                  <p class="f-p">
                     CS Executive is Second Level of Company Secretary Course.
                     Admission to the CS Executive Course is open throughout the year Students who have passed CSEET (CS foundation) exam is eligible for CS Executive registration and CS Exam is conducted twice in a year in June & December.
                  </p>
                  <div class="cous-types">
                     <div class="course_indetails row">
                        <div class="wrap_tab_oput">
                           <div class="single_pinfo my-1">

                              <div class="my-4">
                                 <h4 class="mb-10 mt-4 pt-0 f-26">Eligibility for Admission</h4>
                                 <p class="f-p">
                                    Eligibility or Qualification to registration for CS Executive course: Passing of CS Executive Entrance Test (CSEET) is mandatory for all candidates to register for CS Executive Programme, except a few exempted categories of candidates.
                                 </p>
                                 <p class="f-p">
                                    All Graduates/ Post Graduates who were hitherto eligible for registration directly to CS Executive Programme, are also required to pass the CSEET to become eligible for registration to Executive Programme.
                                 </p>
                              </div>

                              <div class="my-4">

                                 <h4 class="mb-10 mt-4 pt-0 f-26">
                                    Registration Fee for CS Executive
                                 </h4>
                                 <p class="f-p">
                                    Registration Fee of CS Executive Course Rs.10600 for both Group, 50% rebate in CS Executive Registration fee for SC and ST Category Students.
                                 </P>
                                 <h4 class="mb-10 mt-4 pt-0 f-26">
                                    Examination Fee of CS Executive
                                 </h4>
                                 <p class="f-p">
                                    Examination Fee of CS Executive Course Rs.1200 for one Group and Rs. 2400 both Group, 50% rebate in CS Executive Registration fee for SC and ST Category Students.
                                 </P>
                              </div>

                              <div class="my-4">

                                 <h4 class="mb-10 mt-4 pt-0 f-26">
                                    Syllabus for CS Executive Course
                                 </h4>
                                 <p class="f-p">
                                    Syllabus for CS Executive Course have been divided in two Groups
                                 </p>
                                 <p class="f-p">
                                    <strong>Module – I</strong>
                                 </p>
                                 <ol>
                                    @foreach($cs_executive_1 as $level)
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
                                    CS Executive Examination Passing Criteria: Student be declared ‘PASS’ in CS Executive on securing 40% marks in each paper and 50% marks in the aggregate.
                                 </p>
                                 <p class="f-p">
                                    <strong>Exemption:</strong> Candidates who have passed the Final Examination of The Institute of Chartered Accountants of India (ICAI) and/or The Institute of Cost Accountants of India (ICMAI) are exempted from CSEET and shall pay `5,000 (Rupees Five Thousand Only) towards exemption fee at the time of Registration to CS Executive Programme.
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