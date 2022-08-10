@extends('layouts.cs-layout')

@prepend('head-data')
<title>CSEET | Registration, Syllabus, Study Material, Result | Toplad</title>
<meta name="description" content="CSEET is First level of Company Secretary Course ICSI introduces CS Executive Entrance Test (CSEET) in place of CS Foundation Programme. All the students seeking admission in the Company Secretary Course including graduates/ post graduates, etc. shall be required to qualify the CSEET Passing of CS Executive Entrance Test (CSEET) is mandatory for all candidates to register for CS Executive Programme, except a few exempted categories of candidates.">
<meta name="keywords" content="cseet, cseet registration, cseet syllabus, cseet full form, icsi cseet, cseet result, cseet study material" />
@endprepend

@section('content')

<div class="inner_theme_page inner_header_page p-b40">
   <nav aria-label="breadcrumb" class="bdcrumb">
      <div class="container">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li title="CSEET" class="breadcrumb-item active" aria-current="page">
               CSEET
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
                     CSEET (CS Foundation)
                  </h1>
                  <p class="f-p">
                     CSEET is First level of Company Secretary Course ICSI introduces CS Executive Entrance Test (CSEET) in place of CS Foundation Programme. All the students seeking admission in the Company Secretary Course including graduates/ post graduates, etc. shall be required to qualify the CSEET Passing of CS Executive Entrance Test (CSEET) is mandatory for all candidates to register for CS Executive Programme, except a few exempted categories of candidates.
                  </p>
                  <div class="cous-types">
                     <div class="course_indetails row">
                        <div class="wrap_tab_oput">
                           <div class="single_pinfo my-1">

                              <div class="my-4">
                                 <h4 class="mb-10 mt-4 pt-0 f-26">Eligibility for Admission</h4>
                                 <p class="f-p">
                                    Eligibility or Qualification to registration for CS Executive Entrance Test or CSEET: Students passed / appearing in the Senior Secondary (10+2) Examination or equivalent there to is eligible to appear in the CSEET. All Graduates/ Post Graduates who were hitherto eligible for registration directly to CS Executive Programme, are also required to pass the CSEET to become eligible for registration to Executive Programme.
                              </div>

                              <div class="my-4">

                                 <h4 class="mb-10 mt-4 pt-0 f-26">
                                    Registration Fee for CSEET(CS Foundation)
                                 </h4>
                                 <p class="f-p">
                                    The Registration Fee for appearing in CSEET Rs.1,000/- (Rupees One Thousand Only) per student per appearance. The 50% concession in Registration fee for SC/ST, Physically Handicapped and shall be applicable to various categories of students.
                                 </P>
                              </div>

                              <div class="my-4">

                                 <h4 class="mb-10 mt-4 pt-0 f-26">
                                    Syllabus for CSEET Course
                                 </h4>
                                 <p class="f-p">
                                    Syllabus for CSEET Course: CSEET will be conducted on line at designated Test Centres, in MCQ pattern as per the following details:
                                 </p>
                                 <ol>
                                    @foreach($cseet as $level)
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
                                    CSEET Examination Passing Criteria: Student be declared ‘PASS’ in CSEET on securing 40% marks in each paper and (100/200) 50% marks in the aggregate. There will be no negative marking in the CSEET.
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