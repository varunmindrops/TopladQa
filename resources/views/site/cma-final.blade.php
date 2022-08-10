@extends('layouts.cma-layout')

@prepend('head-data')
<title>CMA Final | Online Classes Syllabus, Subjects, Study Material</title>
<meta name="description" content="CMA Final Course is a Second Level Programme of CMA Course which is held twice in the year, in the Month of June and December.">
<meta name="keywords" content="cma final study material, cma final syllabus, cma final, cma final group 3 subjects, cma final group 4 subjects, cma final classes, cma final online classes" />
@endprepend

@section('content')

<div class="inner_theme_page inner_header_page p-b40">
<nav aria-label="breadcrumb" class="bdcrumb">
   <div class="container">
      <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li title="CMA" class="breadcrumb-item active" aria-current="page">
      CMA Final
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
                     CMA Final
                  </h1>
                  <p class="f-p">
                     CMA Final Course is a Final Level Programme of CMA Course which is held twice in the year, in the
                     Month of June and December.
                  </p>
                  <div class="cous-types">
                     <div class="course_indetails row">
                        <div class="wrap_tab_oput">
                           <div class="single_pinfo mt-0">
                              <div class="my-4">
                                 <h4 class="mb-10 mt-4 pt-0 f-26">Eligibility for Admission</h4>
                                 <p class="f-p">
                                    Only CMA Intermediate qualified students are eligible to enroll to the Final
                                    Course of the Institute. There is no direct entry system to enter CMA Final.
                                 </p>
                              </div>
                              <div class="my-4">
                                 <h4 class="mb-10 mt-4 pt-0 f-26">Procedure To Take Admission In CMA - Final</h4>
                                 <p class="f-p">
                                    Only the candidates who have passed Intermediate Examination of the Institute
                                    of Cost Accountants of India are eligible for admission to Final Course
                                 <ol>
                                    <li>
                                       Copy of Intermediate Pass Marksheet is to be furnished along with the
                                       Admission Form
                                    </li>
                                    <li>
                                       Enrolment must be completed at least 4 (four) months prior to the
                                       commencement of Examination
                                    </li>
                                    <li>
                                       Students from foreign countries should submit the forms to the Headquarters
                                       only
                                    </li>
                                    <li>Admission can also be taken online.
                                       For details visit <a href="https://eicmai.in/students-new/Home.aspx\"
                                          target="_blank">https://eicmai.in/students-new/Home.aspx\</a>
                                    </li>
                                 </ol>
                                 </p>
                              </div>
                              <div class="my-4">
                                 <h4 class="mb-10 mt-4 pt-0 f-26">Documents to be enclosed with application form</h4>
                                 <p class="f-p">
                                 <ol>
                                    <li>Passport Photo (JPG/JPEG | 200 KB)</li>
                                    <li>Specimen Signature (JPG/JPEG | 100 KB)</li>
                                    <li>Age Proof (PDF | 300 KB)</li>
                                    <li>CMA-Inter Marksheet - Both Groups (PDF | 300 KB)</li>
                                 </ol>
                                 </p>
                              </div>


                              <div class="my-4">
                                 <h4 class="mb-10 mt-4 pt-0 f-26">When to apply</h4>
                                 <p class="f-p"> <strong>For June term examination</strong></p>
                                 <p class="f-p"> On or Before 31st January of the same calendar year</p>
                                 <p class="f-p"> <strong>For December term examination</strong></p>
                                 <p class="f-p">On or Before 31st July of the same calendar year</p>
                              </div>

                              <div class="my-4">
                                 <h4 class="mb-10 mt-4 pt-0 f-26">Fee Details </h4>
                                 <p class="f-p">
                                    Registration Fee of CMA Final Course (Both Group) – Rs.25,000 which can also
                                    be paid in two Instalments.
                                 <ol>
                                    <li>
                                       1st Instalment Rs.15,000 and 2nd Instalment Rs.10,000.
                                    </li>
                                    <li>
                                       Payable on or before 31st January for June term and 31st July for December
                                       term of examinations
                                    </li>
                                 </ol>
                                 Examination Fee of CMA Final Course Rs.1400 per Group
                                 </p>
                              </div>

                              <div class="my-4">
                                 <h4 class="mb-10 mt-4 pt-0 f-26">Syllabus for CMA Final Course</h4>
                                 <p class="f-p">
                                    Syllabus for CMA Final Course have been divided in two Groups
                                 </p>
                                 <p class="f-p">
                                    <strong><a href="/{{$segment}}/{{$segment}}-final-group-3" target="_blank" rel="noopener noreferrer">GROUP – III</a></strong>
                                 </p>
                                 <ol>
                                    @foreach($cma_final_3 as $level)
                                    @foreach($level['mstSubject'] as $subject)
                                    @if(!empty($subject['slug']))
                                    <li>
                                       <a href="/{{$segment}}/paper/{{ $subject['slug'] }}" target="_blank">{{
                                          $subject['name'] }}</a>
                                    </li>
                                    @endif
                                    @endforeach
                                    @endforeach
                                 </ol>
                                 <p class="f-p">
                                 <strong><a href="/{{$segment}}/{{$segment}}-final-group-4" target="_blank" rel="noopener noreferrer">GROUP – IV</a></strong>
                                 </p>
                                 <ol>
                                    @foreach($cma_final_4 as $level)
                                    @foreach($level['mstSubject'] as $subject)
                                    @if(!empty($subject['slug']))
                                    <li>
                                       <a href="/{{$segment}}/paper/{{ $subject['slug'] }}" target="_blank">{{
                                          $subject['name'] }}</a>
                                    </li>
                                    @endif
                                    @endforeach
                                    @endforeach
                                 </ol>
                                 </p>
                              </div>

                              <div class="my-4">
                                 <h4 class="mb-10 mt-4 pt-0 f-26">
                                    Subject Exemption Scheme
                                 </h4>
                                 <p class="f-p">
                                    Those who have passed a particular Group of Final Examination under Syllabus
                                    2012, willing to pursue the course under Syllabus 2016, would be eligible for
                                    exemption under Syllabus 2016.
                                 </p>
                              </div>
                              <div class="my-4">
                                 <h4 class="mb-10 mt-4 pt-0 f-26">
                                    Training During CMA Final Course
                                 </h4>
                                 <p class="f-p">
                                    A student registered for Final Course under the Syllabus 2016, has to undergo
                                    compulsory “INDUSTRY ORIENTED TRAINING PROGRAMME (IOTP)”
                                 <h5 class="mb-2 mt-3 pt-0 f-23">Compulsory “industry Oriented Training Programme
                                    (IOTP)” For Final Students</h5>

                                 <ol>
                                    <li>A student, enrolling for Final Course under Syllabus 2016 has to complete
                                       ‘Industry Oriented Training Programme’ before filling up the Form for Final
                                       Examination for both or remaining group(s) of final examination.</li>
                                    <li>Training Scheme: This will cover training on compliance requirements and
                                       their preparation under various statutes and shall be imparted as under:</li>
                                 </ol>
                                 <div class="col-md-12 my-3 py-3">
                                    <table class="table table-striped table-hover">
                                       <thead>
                                          <tr>
                                             <th scope="col">Day</th>
                                             <th scope="col">Topics for Technical sessions</th>
                                             <th scope="col">Soft Skill</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr>
                                             <th scope="row">Day-1</th>
                                             <td>Book-keeping including Bank reconcilation statement</td>
                                             <td>Career planning</td>
                                          </tr>
                                          <tr>
                                             <th scope="row">Day-2</th>
                                             <td>Finalization of Accounts</td>
                                             <td>Business Etiquette & Business Ethics</td>
                                          </tr>
                                          <tr>
                                             <th scope="row">Day-3</th>
                                             <td>Direct Tax</td>
                                             <td>Communication & Drafting Skill</td>
                                          </tr>
                                          <tr>
                                             <th scope="row">Day-4</th>
                                             <td>Indirect Tax</td>
                                             <td>Presentation Skill</td>
                                          </tr>
                                          <tr>
                                             <th scope="row">Day-5</th>
                                             <td>Cost Audit & Cost Management</td>
                                             <td>Group Discussion Skill</td>
                                          </tr>
                                          <tr>
                                             <th scope="row">Day-6</th>
                                             <td>Banking, Treasury Management & Financial Systems</td>
                                             <td>Interview Skill</td>
                                          </tr>
                                          <tr>
                                             <th scope="row">Day-7</th>
                                             <td colspan="2" class="text-center">Industry/Factory Visit</td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                                 </p>
                                 <h5 class="mb-2 mt-3 pt-0 f-23">Practical Training</h5>
                                 <p class="f-p">
                                    A Student has to undergo 3 years Practical Training. The Scheme for Practical
                                    Training. However, a student needs to undergo 15 months Practical Training
                                    before appearing in both or remaining group(s) of Final Examination.
                                 </p>
                                 <h5 class="mb-2 mt-3 pt-0 f-23">12-days Pre-placement Orientation Training Programme
                                    For Final Passout Students</h5>
                                    <p class="f-p"><strong>Topics covered:</strong></p>
                                 <ol>
                                    <li>Resume Writing/ Communication Skills/ Soft Skill Training/ Tips to crack
                                       Interview & Group Discussion/ Interview Skills/ Professional Email Writing/
                                       Power Point Presentation </li>
                                    <li>Advanced Excel </li>
                                    <li>ERP</li>
                                    <li>Basics of Accounting/Corporate Accounting (Practical Aspects) </li>
                                    <li>Company Law (Special emphasis on Companies Act, 2013) </li>
                                    <li>Financial Management (Practical Aspects)</li>
                                    <li>Cost Sheet Preparation [Companies (Cost Records and Audit) Rules, 2014]</li>
                                    <li>Audits in Corporate World</li>
                                    <li>Cost Accounting Standards</li>
                                    <li>Ind AS </li>
                                    <li>Goods & Services Tax (GST) / Customs Act</li>
                                    <li>Direct Tax (Practical Aspects) </li>
                                    <li>Emerging issues: Valuation and Insolvency & Bankruptcy Code</li>
                                    <li>Securities Market </li>
                                    <li>International Finance</li>
                                    <li>Banking, Insurance & Financial Services</li>
                                 </ol>
                                 <p class="f-p">
                                    Fees : 4,000/- to be paid at the time of registration for this training programme
                                 </p>
                              </div>

                              <div class="my-4">
                                 <h4 class="mb-10 mt-4 pt-0 f-26">Financial Assistance To Economically
                                    Challengedcum-meritorius Students </h4>
                                 <p class="f-p">
                                    Institute continues its endeavour further in promoting and propagating the
                                    profession and education of cost and management accountancy to reach the
                                    unreached. As a part of professional social responsibility and to empower
                                    Intellectual Capital in the country, Institute has taken initiative to support
                                    economically challenged yet intellectually talented students by providing
                                    financial assistance. For further details of the scheme - please refer to Website:
                                    <a href="https://icmai.in/icmai/index.php" target="_blank"
                                       rel="noopener noreferrer">www.icmai.in</a>
                                 </p>
                              </div>

                              <div class="my-4">
                                 <h4 class="mb-10 mt-4 pt-0 f-26">Oral Vs. Postal Scheme</h4>
                                 <h5 class="mb-2 mt-3 ml-3 pt-0 f-23">Postal Coaching</h5>
                                 <p class="f-p">
                                 <ol>
                                    <li>
                                       A student desirous of undergoing Postal Coaching need to opt for same at
                                       the time of admission in CMA Final
                                    </li>
                                    <li>
                                       Foreign Student shall have to undergo Tuition through Postal Coaching
                                       only.
                                    </li>
                                    <li>
                                       Application in the prescribed form must be sent at Headquarters to
                                       Directorate of Studies, “THE INSTITUTE OF COST ACCOUNTANTS
                                       OF INDIA”, CMA Bhawan, 12, Sudder Street, Kolkata-700016, India
                                    </li>
                                    <li>
                                       The Identification Number/Registration Number should be clearly and
                                       correctly quoted in all correspondence with the Directorate of Studies,
                                       Kolkata and the Regional Council
                                    </li>
                                    <li>
                                       Any change in student’s address should immediately be communicated to
                                       the Directorate of Studies at Headquarters and the respective Regional
                                       Council
                                    </li>
                                    <li>
                                       Enrolment for coaching (Postal or Oral) must be completed at least 4 (four)
                                       months prior to the month of Examination
                                    </li>
                                    <li>
                                       Study Materials for each subject are provided to the students
                                    </li>
                                 </ol>
                                 </p>
                                 <h5 class="mb-2 mt-3 ml-3 pt-0 f-23">Oral Coaching</h5>
                                 <p class="f-p">
                                 <ul>
                                    <li>
                                       A student desirous of pursuing the course under Oral Coaching has to get
                                       admitted in a Regional Council or Chapter or Recognized Oral Coaching
                                       Centre or CMA Support Centre with coaching facilities at the time of
                                       admission in CMA Final
                                    </li>
                                    <li>
                                       Duration of Oral Coaching for a group in Final Course is 4
                                       months having a minimum of 240 lecture hours for Lectures and Tutorial
                                       classes per group
                                    </li>
                                    <li>
                                       Each lecture hour shall be of 45 minutes duration
                                    </li>
                                    <li>
                                       A student has to appear for examination for each subject conducted by the
                                       Regional Council/ Chapter/ Oral Coaching Centre.
                                    </li>
                                 </ul>
                                 </p>
                                 <h5 class="mb-2 mt-3 ml-3 pt-0 f-23">A. “Students opting Postal Coaching Scheme can –
                                 </h5>
                                 <p class="f-p">
                                 <ul>
                                    <li>
                                       Register and pay on-line, either by credit card, debit card or Net Banking;
                                    </li>
                                    <li>
                                       Final Students can avail the installment facility under Syllabus 2016.
                                    </li>
                                    <li>
                                       Deposit the prescribed fee in cash at any branch of Punjab National Bank, IDBI
                                       Bank or Central Bank of India (on specified challan, available in the students
                                       download section at <a href="https://icmai.in/icmai/index.php" target="_blank"
                                          rel="noopener noreferrer">www.icmai.in</a>)
                                    </li>
                                 </ul>
                                 </p>
                                 <h5 class="mb-2 mt-3 ml-3 pt-0 f-23">B. Students opting Oral Coaching Scheme can –</h5>
                                 <p class="f-p">
                                 <ul>
                                    <li>
                                       Register and pay on-line, either by credit card, debit card or Net Banking;
                                    </li>
                                    <li>
                                       Final Students can avail the installment facility under Syllabus 2016
                                    </li>
                                    <li>
                                       Deposit the prescribed fee in cash at any branch of Punjab National Bank, IDBI
                                       Bank or Central Bank of India (on specified challan, available in the students
                                       download section at <a href="https://icmai.in/icmai/index.php" target="_blank"
                                          rel="noopener noreferrer">www.icmai.in</a>).
                                    </li>
                                 </ul>
                                 </p>
                              </div>

                              <div class="my-4">
                                 <h4 class="mb-10 mt-4 pt-0 f-26">Passing Criteria</h4>
                                 <p class="f-p">
                                 <ol>
                                    <li>Pass in a Group in Final Examination: A candidate shall be declared to have
                                       passed in a group of an examination, if he secures minimum 40% marks in each
                                       paper of the group and an aggregate of 50% of total marks of non-exempted
                                       papers of that group
                                    </li>
                                    <li>A candidate will be declared passed in an examination if he passes all groups
                                       in that examination</li>
                                    <li>A candidate who has passed the examination obtaining 70% marks of total
                                       marks of all papers Final examination at one sitting shall be deemed to have
                                       passed the examination with distinction </li>
                                    <li> Exemption: If a Candidate is unsuccessful in passing a group but secures 60%
                                       or more in any paper or papers, he shall be exempted in the paper from appearing
                                       in subsequent examination. For calculation of aggregate in the subsequent
                                       examination of the group, the marks in each of the exempted papers will be
                                       reckoned as 50 </li>
                                    <li>Carry Forward of Marks: If a candidate is unsuccessful in passing a group but
                                       secures 60% or more in any paper and minimum 40% marks in each of the
                                       remaining papers of the group at a time, he shall be exempted in that paper from
                                       appearing in subsequent examination and allowed the benefit of carry forward of
                                       actual marks of that paper in his subsequent examination of the group </li>
                                    <li>The benefit of carry forward/exemption is allowed for the immediately
                                       successive three terms of Examination from the term in which the exemption is
                                       secured in the paper(s) by appearance in examination </li>
                                    <li>The benefit of exemption or carry forward of marks mentioned above, shall
                                       automatically cease if a candidate, on his own, appears in any examination for
                                       such exempted paper(s)</li>
                                    <li>The benefit of carry forward in a paper earned by a candidate in the examination
                                       under Syllabus 2012 will
                                       be treated as only exemption in the corresponding equivalent paper(s) in Syllabus
                                       2016. For details of
                                       exemption mapping between the two Syllabi, please see website: <a
                                          href="https://icmai.in/icmai/index.php" target="_blank"
                                          rel="noopener noreferrer">www.icmai.in</a>
                                    </li>
                                    <li>An examinee: Who appears for both Groups of Final Examination, with or
                                       without any exemption : – obtains at least 40 percent marks in each paper
                                       appeared; and also obtains at least 50 percent marks in aggregate, taking both
                                       the
                                       Groups together shall be declared to have qualified Final Course, as the case may
                                       be. </li>
                                    <li>Students who have not appeared in examination under syllabus 2012, no credit
                                       of passing/qualifying in any group would be offered to such student since they
                                       have not appeared under syllabus 2012. They need to appear and pass both group
                                       of Final under syllabus 2016.</li>
                                 </ol>
                                 </p>
                              </div>
                              <div class="step-bar mt-5 mb-4">
                                 <ul class="progressbar d-flex justify-content-between">
                                    <li><a href="/{{$segment}}/{{$segment}}-foundation" target="_blank" rel="noopener noreferrer">CMA Foundation</a></li>
                                    <li><a href="/{{$segment}}/{{$segment}}-inter" target="_blank" rel="noopener noreferrer">CMA Intermediate</a></li>
                                    <li class="active">CMA Final</li>
                                 </ul>
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