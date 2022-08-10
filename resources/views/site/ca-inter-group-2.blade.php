@extends('layouts.ca-layout')

@prepend('head-data')
<title>Ca Inter | Result, Subjects, Exam, Registration, Study Material</title>
<meta name="description" content="LCA Intermediate is second level Course in the Chartered Accountancy Course In India, Eligibility Criteria or Qualification Required for CA Inter Course by CA Foundation – Route The students after clearing the CA Foundation or Common Proficiency Test CPT becomes eligible to register for the CA Intermediate.">
<meta name="keywords" content="ca inter result, ca inter, ca inter subjects, icai ca inter result, ca inter exam dates, ca inter pass percentage, ca inter registration fees " />
@endprepend

@section('content')

<div class="inner_theme_page inner_header_page p-b40">
   <nav aria-label="breadcrumb" class="bdcrumb">
      <div class="container">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li title="CA" class="breadcrumb-item active" aria-current="page">
            CA Intermediate Group - 2
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
                  CA Intermediate Group - 2
                  </h1>
                  <p class="f-p">
                  CA Intermediate is second level Course in the Chartered Accountancy Course In India.
                  </p>
                  <div class="cous-types">
                     <div class="course_indetails row">
                        <div class="wrap_tab_oput">
                           <div class="single_pinfo my-1">
                           <div class="my-4">
                              <h4 class="mb-10 mt-4 pt-0 f-26">Eligibility for Admission</h4>
                                 <p class="f-p">
                                 Eligibility Criteria or Qualification Required for CA Inter Course by CA Foundation – Route The students after clearing the CA Foundation or Common Proficiency Test CPT becomes eligible to register for the CA Intermediate.
                                 </p>
                                 <p class="f-p">
                                 Eligibility Criteria or Qualification Required for CA Inter Course by Direct Entry – Route the Graduates, postgraduates and the students having equivalent degrees can register directly for the CA Intermediate without appearing at the entrance level CA foundation.
                                 </p>
                                    <ol>
                                       <li>
                                       Students who are Graduate/ Post Graduate in Commerce and secured a minimum of 55% can register directly for Intermediate without passing CA Foundation or CPT.
                                       </li>
                                       <li>
                                       Non commerce Graduates/ Post Graduates can also register for Intermediate by securing 60% marks in Graduation/ Post Graduation.
                                       </li>
                                       <li>
                                       Apart from the above, the students who cleared the Intermediate level of the Institute of Cost Accountants of India or The Institute of Company Secretaries of India.
                                       </li>
                                       <li>
                                       Registration to Intermediate Course and undergo ICITSS training of four weeks. listed for practical training of three years after completing ICITSS and appear in the Intermediate Examination after completion of nine months of practical training.
                                       </li>
                                    </ol>
                                 </p>
                           </div>

                           <div class="my-4">

                              <h4 class="mb-10 mt-4 pt-0 f-26">Registration Fee of CA Intermediate</h4>
                              <p class="f-p">
                                 Registration Fee for CA Inter Course ICAI For Single Group (I/II) - Rs  13000 and for Both Groups Rs 18000.
                              </p> 
                              <h4 class="mb-10 mt-4 pt-0 f-26">Examination Fee</h4>
                              <p class="f-p">
                              Examination form Fee for CA Inter Course Rs.1500 for one Group and Rs. 2700 for Both Group.
                              </p>
                           </div>

                           <div class="my-4">

                              <h4 class="mb-10 mt-4 pt-0 f-26">Syllabus for CA Intermediate Course</h4>
                              <p class="f-p">
                              Syllabus for CA Inter Course have been divided into Two Groups, each Group contains four Papers, A student can appear in either one group or both the groups at a time.
                              </p>
                              <p class="f-p">
                              Subjects of CA Inter are given as follows –
                              </p>
                              <p class="f-p">
                                 <strong>GROUP – II</strong>
                              </p>
                                 <ol>
                                 @foreach($ca_inter_2 as $level)
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
                              Candidates must score a minimum of 50% marks overall in all papers and the CA Intermediate passing marks for individual papers is 40 out of 100
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