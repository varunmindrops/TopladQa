@extends('layouts.ca-layout')

@prepend('head-data')
<title>Ca Foundation | Result, Syllabus, Registration, Study Material</title>
<meta name="description" content="CA Foundation is the new entrance level for the Chartered Accountancy course in India. Earlier it was known as Common Proficiency Test CPT. Eligibility Students after passing class Xth examination conducted by an examining body constituted by law in India or an examination recognized by the Central Government as equivalent thereto, can register for Foundation Course. Students can appear in the Foundation Examination – (i) After appearing in the senior secondary (10+2) examination conducted by an examining body constituted by law in India or an examination recognised by the Central Government as equivalent there to.">
<meta name="keywords" content="ca foundation, ca foundation result, ca foundation syllabus, ca foundation registration, ca foundation study material
" />
@endprepend

@section('content')

<div class="inner_theme_page inner_header_page p-b40">
   <nav aria-label="breadcrumb" class="bdcrumb">
      <div class="container">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li title="CA" class="breadcrumb-item active" aria-current="page">
               CA Foundation
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
                     CA Foundation
                  </h1>
                  <p class="f-p">
                     CA Foundation is the new entrance level for the Chartered Accountancy course in India. Earlier it was known as Common Proficiency Test CPT.
                  </p>
                  <div class="cous-types">
                     <div class="course_indetails row">
                        <div class="wrap_tab_oput">
                           <div class="single_pinfo my-1">
                              <div class="my-4">
                                 <h4 class="mb-10 mt-4 pt-0 f-26">Eligibility for Admission</h4>
                                 <p class="f-p">
                                    Eligibility Students after passing class Xth examination conducted by an examining body constituted by law in India or an examination recognized by the Central Government as equivalent thereto, can register for Foundation Course. Students can appear in the Foundation Examination – (i) After appearing in the senior secondary (10+2) examination conducted by an examining body constituted by law in India or an examination recognised by the Central Government as equivalent there to.
                                 </p>
                              </div>

                              <div class="my-4">

                                 <h4 class="mb-10 mt-4 pt-0 f-26">
                                    Registration Fee for CA Foundation
                                 </h4>
                                 <p class="f-p">
                                    Registration Fee for CA Foundation Course Rs.9200 and CA Foundation course registration will be valid for three years i.e. up to six attempts.
                                 </P>
                                 <h4 class="mb-10 mt-4 pt-0 f-26">
                                    Examination Fee
                                 </h4>
                                 <p class="f-p">
                                    Examination Fee for CA Foundation Course Rs.1500 for one attempt.
                                 </p>
                              </div>

                              <div class="my-4">

                                 <h4 class="mb-10 mt-4 pt-0 f-26">
                                    Syllabus of CA foundation course
                                 </h4>
                                 <p class="f-p">
                                    Syllabus for CA Foundation Course have been divided into four Papers.
                                 </p>
                                 <p class="f-p">
                                    CA Foundation is partially subjective and partially objective test consisting of 400 marks. four Papers contains the eight subjects in CA Foundation given as follows –
                                 </p>
                                 <ol>
                                    @foreach($ca_foundation as $level)
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
                                    A Foundation Course candidate shall be declared to have passed the examination if he/ she obtains at one sitting a minimum of 40% marks in each paper and a minimum of 50% marks in aggregate of all the papers, subject to the principle of negative marking.
                                 </p>
                                 <p class="f-p">
                                    <strong>Exemption:</strong> CA Foundation is exempt for the Graduates, Post Graduates and the students having Equivalent degree. Commerce graduated with 55% and other graduated with 60% marks can take direct admission for the CA Intermediate.
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