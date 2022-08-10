@extends('layouts.ca-layout')

@prepend('head-data')
<title>Ca Final | Result, Exam, Subjects, Registration, Study Material</title>
<meta name="description" content="After successfully passing Intermediate Examination, A student can Register for CA Final Course the last Stage of the Chartered Accountancy Course. Eligibility Criteria or Qualification Required for CA Final Course: Register for CA Final Course after passing Both Groups of Intermediate. Successfully complete 4 Weeks Advanced ICITSS in last 2 years of Practical Training, Appear in Final Exam during last six months of Practical Training & after successfully completion of Advanced ICITSS – Complete Three Years Remaining Practical Training, Qualify CA Final Exam – Become a Member of ICAI.">
<meta name="keywords" content="ca final result, ca final, ca final exam date, ca final exam, ca final subjects 
" />
@endprepend

@section('content')

<div class="inner_theme_page inner_header_page p-b40">
   <nav aria-label="breadcrumb" class="bdcrumb">
      <div class="container">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li title="CA" class="breadcrumb-item active" aria-current="page">
            CA Final Group - 1
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
                  CA Final Group - 1
                  </h1>
                  <p class="f-p">
                  After successfully passing Intermediate Examination, A student can Register for CA Final Course the last Stage of the Chartered Accountancy Course.
                  </p>
                  <div class="cous-types">
                     <div class="course_indetails row">
                        <div class="wrap_tab_oput">
                           <div class="single_pinfo my-1">
                           <div class="my-4">
                              <h4 class="mb-10 mt-4 pt-0 f-26">Eligibility for Admission</h4>
                                 <p class="f-p">
                                 Eligibility Criteria or Qualification Required for CA Final Course: Register for CA Final Course after passing Both Groups of Intermediate. Successfully complete 4 Weeks Advanced ICITSS in last 2 years of Practical Training, Appear in Final Exam during last six months of Practical Training & after successfully completion of Advanced ICITSS – Complete Three Years Remaining Practical Training, Qualify CA Final Exam – Become a Member of ICAI.
                                 </p>
                           </div>

                           <div class="my-4">

                              <h4 class="mb-10 mt-4 pt-0 f-26">Registration Fee for CA Final</h4>
                              <p class="f-p">
                              Registration Fee for CA Inter Course ICAI For Single Group (I/II) - Rs  13000 and for Both Groups Rs 18000.
                              </p> 
                              <h4 class="mb-10 mt-4 pt-0 f-26">Examination Fee</h4>
                              <p class="f-p">
                              Examination form Fee for CA Final Course Rs.1800 for one Group and Rs. 3300 for Both Group.
                              </p>
                           </div>

                           <div class="my-4">

                              <h4 class="mb-10 mt-4 pt-0 f-26">Syllabus For CA Final Course</h4>
                              <p class="f-p">
                              Syllabus for CA Final Course have been divided into Two Groups, each Group contains four Papers, A student can appear in either one group or both the groups at a time. The Final Course consists of two Groups – Group I and Group II. Group I consist of Four Core papers and Group II consists of four Paper – Three Core Papers along with One Elective Paper
                              </p>
                              <p class="f-p">
                                 <strong>GROUP – I</strong>
                              </p>
                                 <ol>
                                 @foreach($ca_final_1 as $level)
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
                              As per the ICAI guidelines, a candidate shall be declared to have passed in CA Final by scoring a minimum of 40% marks in each individual subject and 50% marks in aggregate of all the subjects at one sitting either both the groups or a single group.
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