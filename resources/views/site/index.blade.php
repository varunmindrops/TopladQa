@extends('layouts.home-layout')

@prepend('head-data')
    <title>CMA | CS | CA | Online & Offline Classes | Toplad
    </title>
    <meta name="description"
        content="Learn from India's top CMA, CS & CA faculty at Toplad. We are dedicated to making it possible for anyone, anywhere, at any time to study CMA, CS & CA.">
    <meta name="keywords"
        content="CMA, CS, CA, CMA courses online, CS courses online, CA courses online, CMA Foundation to Final, CA Foundation to Final, Top CMA Faculty of India, Top CS Faculty of India, Top CA Faculty of India, Academy of Excellence, CMA in Future, CS in Future, CA in Future, CMA Books, CS Books, CA Books, Online CMA Classes, Online CS Classes, Online CA Classes" />
@endprepend
@section('content')
    <div class="row mt-5" id="mt-top"
        style="background: linear-gradient(160.62deg, #E9F3F3 -33.37%, #9BC4CB 145.53%); width:100vw;">
        <div class="col-md-7 p-5 d-flex flex-column justify-content-center bg-style">


            <h1 class="banner-titel">TOPLAD - A TRUSTED PLATFORM FOR ALL <span class="add_color">CMA</span>, <span
                    class="add_color">CS</span> & <span class="add_color">CA</span> ASPIRANTS</h1>

            <h2 class="banner-sub-titel mb-4">Learn from India's Best Faculty</h2>

            <div class="d-flex flex-column banner-courses">
                <div class="h5">
                    <a style="margin-left: 0;" href="/cma" target="_blank">Learn more about CMA <i
                            class="fas fa-long-arrow-right"></i></i></a>
                </div>
                <div class="h5">
                    <a href="/ca" target="_blank">Learn more about CA <i class="fas fa-long-arrow-right"></i></a>
                </div>
                <div class="h5">
                    <a href="/cs" target="_blank">Learn more about CS <i class="fas fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <div class="col-md-5 text-end main-home-slider p-4 bg-style" style="text-align:right">
            <img src="images/Final-image.webp" alt="cma-cs-ca-banner" width="492px" height="535px">
        </div>
    </div>




    <div class="bg_home_main">
        <div class="section-full p-t60 p-b60">
            <div class="container">
                <div class="section-head p-b30 text-center p-b50">
                    <h2 class="m-t0">Learn about CMA, CS and CA With <b class="add_color">TopLad</b></h2>
                    <p>Our products are easy to use, portable, help student to learn from anywhere, anytime and offer great
                        value.</p>
                </div>
                <div class="section-content course_guide">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12 cma_homer common_homer">
                            <div class="wt-box block-shadow m-b30 radius-md overflow-hide bg-white p-a30 cursor-p"
                                onClick="location='/cma'">
                                <div class="step-number-block">
                                    <h4 class="wt-tilte text-uppercase font-weight-500"><img
                                            src="{{ asset('images/cma-study.webp') }}" class="img-responsive"
                                            alt="cma-study" width="145px" height="110px" /></h4>
                                </div>
                                <p class="m-b0">Exclusive Lectures Available for CMA strictly as per pattern
                                    prescribed by
                                    Institute of Cost Accountants of India, Kolkata. Separate Batches, Separate Videos.</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 cs_homer common_homer">
                            <div class="wt-box block-shadow m-b30 radius-md overflow-hide bg-white p-a30 cursor-p"
                                onClick="location='/cs'">
                                <div class="step-number-block">
                                    <h4 class="wt-tilte text-uppercase font-weight-500"><img
                                            src="{{ asset('images/cs-study.png') }}" class="img-responsive" alt="cs-study"
                                            width="145px" height="110px" /></h4>
                                </div>
                                <p class="m-b0">Exclusive Lectures Available strictly as per pattern prescribed by
                                    Institute
                                    of
                                    Companies Secretaries of India, Delhi.
                                    Separate Batches, Separate Videos.</p>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-12 cs_homer common_homer">
                            <div class="wt-box block-shadow m-b30 radius-md overflow-hide bg-white p-a30 cursor-p"
                                onClick="location='/ca'">
                                <div class="step-number-block">
                                    <h4 class="wt-tilte text-uppercase font-weight-500"><img
                                            src="{{ asset('images/ra-logo/ca-study.webp') }}" class="img-responsive"
                                            alt="ca-study" width="145px" height="110px" /></h4>
                                </div>
                                <p class="m-b0">Exclusive Lectures Available strictly as per pattern prescribed by
                                    Institute of Chartered Accountants of India, Delhi.
                                    Separate Batches, Separate Videos.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="section-full card_strip_type bg-primary-light p-t50 p-b40">
            <div class="usp_strip_main">
                <div class="container">
                    <div class="row align-items-sm-center">

                        <div class="col-md-6 col-lg-6 course_strip_data">
                            <div class="announcements_member_text p-l20 banner-hed trusted-pltf">
                                <h2 class="mb-10">Toplad - a trusted platform for all <span class="add_color">CMA,
                                        CS</span> & <span class="add_color">CA </span>
                                    aspirants</h2>
                                <h5 class="mt-10">learn from top <span class="dark_color">CMA, CS</span> &
                                    <span class="dark_color">CA </span>faculty of Toplad
                                </h5>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 course_strip_img">
                            <div class="announcements_member_text p-l20">
                                <div class="announcements_img d-flex justify-content-around">
                                    <img src="{{ asset('images/trusted.png') }}" alt="trusted">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-full p-t50 p-b40">
            <div class="usp_strip_main">
                <div class="container">
                    <div class="col-sm-12 col-xl-12 align-self-center p-b50">
                        <div class="section-head plain-card-without-border">
                            <h2 class="text-uppercase">we are <span class="add_color">offering</span> our product in:
                            </h2>
                        </div>
                    </div>
                    <div class="row align-items-sm-center">
                        <div class="col-md-6 col-lg-6 course_strip_data">
                            <div class="announcements_member_text p-l20 offering">
                                <ul>
                                    <li class="d-flex">
                                        <h4 class="d-flex align-items-center pendrive"> <i
                                                class="fad fa-usb-drive fa-2x"></i>Pendrive</h4>
                                    </li>
                                    <li class="d-flex">
                                        <h4 class="d-flex align-items-center googel-link"> <i
                                                class="fas fa-link fa-2x"></i>google link</h4>
                                    </li>
                                    <li class="d-flex">
                                        <h4 class="d-flex align-items-center ebook"><i class="fad fa-book fa-2x"></i>ebook
                                        </h4>
                                    </li>
                                    <li class="d-flex">
                                        <h4 class="d-flex align-items-center cover-book"><i
                                                class="fad fa-book-open fa-2x"></i>hard cover book</h4>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 course_strip_img">
                            <div class="announcements_member_text p-l20">
                                <div class="announcements_img">
                                    <img src="{{ asset('images/offering.webp') }}" alt="offering">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section class="section-full card_strip_type bg-primary-light p-t50 p-b40">
            <div class="usp_strip_main">
                <div class="container">
                    <div class="row align-items-sm-center column-reverse">

                        <div class="col-md-6 col-lg-6 course_strip_img">
                            <div class="announcements_member_text p-l20">
                                <div class="announcements_img">
                                    <img src="{{ asset('images/scollership.webp') }}" alt="scollership">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 course_strip_data">
                            <div class="announcements_member_text p-l20 scholarship">
                                <h2>Get upto 100% scholarship from top CMA,CS & CA faculty of India</h2>
                                <p>Enroll yourself to give wings to your dream and make it real</p>
                                <a href="/scholarship" title="Scholarship">
                                    <button type="button" class="btn btn-primary">click here to get scholarship</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section class="section-full card_strip_type p-t50 p-b40">
            <div class="usp_strip_main">
                <div class="container">
                    <div class="row align-items-sm-center">
                        <div class="col-md-8 col-lg-8 course_strip_data">
                            <div class="announcements_member_text p-l20 job-opportuniti">
                                <h2>Looking for job opportunities?</h2>
                                <h3>Find great jobs from top employers</h3>
                                <a href="/jobs-ca-cma-cs">
                                    <button type="button" class="btn btn-primary">Apply Now</button>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-4 course_strip_img">
                            <div class="announcements_member_text p-l20">
                                <div class="announcements_img">
                                    <img src="{{ asset('images/job.png') }}" alt="job">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section class="section-full dream_scetion text-center bg-primary-light p-t60 p-b60">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xl-12 align-self-center p-b50">
                        <div class="section-head plain-card-without-border">
                            <h2>Achieve your Dreams with Us</h2>
                            <p class="m-size">With our detail oriented, highly targeted and elaborate course
                                content helps
                                and
                                support you to achieve your dream of becoming CMA, CS or CA.
                            </p>
                            <div class="wt-separator-outer p-b40">
                                <div class="wt-separator bg-primary"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center animate-box fadeInUp animated">
                        <div class="achievements-box bdr-info">
                            <div class="goal_sec_icons">
                                <img src="{{ asset('images/icon/goals2.png') }}" alt="icons" width="65px"
                                    height="65px">
                            </div>
                            <div class="desc">
                                <h3>Why Toplad?</h3>
                                <p>Grab this opportunity and enrol yourself in the best online faculty for CMA/CS/CA.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center animate-box fadeInUp animated">
                        <div class="achievements-box bdr-info">
                            <div class="goal_sec_icons">
                                <img src="{{ asset('images/icon/goals1.png') }}" alt="icons" width="65px"
                                    height="65px">
                            </div>
                            <div class="desc">
                                <h3>We are available in</h3>
                                <p>Smart & Comfortable Class Room (Projector, Recordings AC Etc) & Classes Available in Pen
                                    Drive, Google Drive, Mobile App & Face To Face !</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center animate-box fadeInUp animated">
                        <div class="achievements-box bdr-danger">
                            <div class="goal_sec_icons">
                                <img src="{{ asset('images/icon/goals3.png') }}" alt="icons" width="65px"
                                    height="65px">
                            </div>
                            <div class="desc">
                                <h3>Effective Study Materials</h3>
                                <p>All The Past year Question, Reader's Friendly Language In a form of Hardcopy & E-Book.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section class="section-full p-t60 p-b60 our_result_part">
            <div class="container">
                <div class="section-head text-center p-b40">
                    <h2 class="text-uppercase">Our Results</h2>
                    <div class="wt-separator-outer p-b30">
                        <div class="wt-separator bg-primary"></div>
                    </div>
                </div>
                <div class="section-content">
                    <div class="owl-carousel our-results testimonial-five">
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img src="{{ asset('images/students/parth_cma.jpg') }}"
                                            alt="Parth Maheshwari"></div>
                                    <p class="rank_obtained">643</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Parth Maheshwari<span>CMA Cleared</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img
                                            src="{{ asset('images/students/abhimanyu_cma.jpeg') }}" alt="Abhimanyu">
                                    </div>
                                    <p class="rank_obtained">609</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Abhimanyu<span>CMA Cleared</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img src="{{ asset('images/students/amit_cma.jpg') }}"
                                            alt="Amit Prasad"></div>
                                    <p class="rank_obtained">606</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Amit Prasad<span>CMA Cleared</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img src="{{ asset('images/students/rameshver_cma.jpg') }}"
                                            alt="Rameshwar singh">
                                    </div>
                                    <p class="rank_obtained">585</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Rameshwar singh<span>CMA Cleared</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img src="{{ asset('images/students/rishbah_cma.jpg') }}"
                                            alt="Rishab Kapoor">
                                    </div>
                                    <p class="rank_obtained">564</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Rishab Kapoor<span>CMA</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img
                                            src="{{ asset('images/students/sanjayksaah_cma.jpg') }}"
                                            alt="Sanjay Kumar Sah"></div>
                                    <p class="rank_obtained">559</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Sanjay Kumar Sah<span>CMA Cleared</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img src="{{ asset('images/students/anurag_cma.jpg') }}"
                                            alt="Anurag"></div>
                                    <p class="rank_obtained">557</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Anurag<span>CMA Cleared</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img src="{{ asset('images/students/archana_cma.jpg') }}"
                                            alt="Archana Dubey">
                                    </div>
                                    <p class="rank_obtained">556</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Archana Dubey<span>CMA Cleared</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img src="{{ asset('images/students/dipesh_cma.jpg') }}"
                                            alt="Dipesh Kumar"></div>
                                    <p class="rank_obtained">551</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Dipesh Kumar<span>CMA Cleared</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img
                                            src="{{ asset('images/students/rahulsingh_cma.jpg') }}" alt="Rahul Singh">
                                    </div>
                                    <p class="rank_obtained">550</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Rahul Singh<span>CMA Cleared</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img src="{{ asset('images/students/alisha_fg4.jpeg') }}"
                                            alt="Alisha Chhiraklot">
                                    </div>
                                    <p class="rank_obtained">334</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Alisha Chhiraklot<span>CMA Final Group 4</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img src="{{ asset('images/students/shikeb_fg4.jpg') }}"
                                            alt="Shikeb Ahmad "></div>
                                    <p class="rank_obtained">269</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Shikeb Ahmad<span>CMA Final Group 4</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img src="{{ asset('images/students/sandeepan_fg4.jpg') }}"
                                            alt="Sandeepan Bhagat"></div>
                                    <p class="rank_obtained">267</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Sandeepan Bhagat<span>CMA Final Group 4</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img src="{{ asset('images/students/rahul_fg4.jpg') }}"
                                            alt="Rahul Bansal"></div>
                                    <p class="rank_obtained">264</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Rahul Bansal<span>CMA Final Group 4</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img src="{{ asset('images/students/abhishek_fg4.jpeg') }}"
                                            alt="Abhishek Chauhan "></div>
                                    <p class="rank_obtained">252</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Abhishek Chauhan<span>CMA Final Group 4</span></p>
                                </div>
                            </div>
                        </div>




                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img src="{{ asset('images/students/shital_fg3.webp') }}"
                                            alt="Sheetal Kardam "></div>
                                    <p class="rank_obtained">230</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Sheetal kardam<span>CMA Final Group 3</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img src="{{ asset('images/students/simran_fg3.jpg') }}"
                                            alt="Simran"></div>
                                    <p class="rank_obtained">227</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Simran<span>CMA Final Group 3</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img src="{{ asset('images/students/sushil_fg4.jpg') }}"
                                            alt="Sushil Kumar"></div>
                                    <p class="rank_obtained">223</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Sushil Kumar<span>CMA Final Group 4</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img src="{{ asset('images/students/sparsh_fg3.jpg') }}"
                                            alt="Sparsh Saxena"></div>
                                    <p class="rank_obtained">220</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Sparsh Saxena<span>CMA Final Group 3</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img src="{{ asset('images/students/jay_fg4.jpg') }}"
                                            alt="Jay shankar kumar"></div>
                                    <p class="rank_obtained">252</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Jay shankar kumar<span>CMA Final Group 4</span></p>
                                </div>
                            </div>
                        </div>

                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img src="{{ asset('images/students/ekta_inter.jpeg') }}"
                                            alt="Ekta kumari"></div>
                                    <p class="rank_obtained">633</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Ekta kumari<span>CMA Inter Group Cleared</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img
                                            src="{{ asset('images/students/masagali_inter.jpg') }}"
                                            alt="Masagali madhavi"></div>
                                    <p class="rank_obtained">626</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Masagali madhavi<span>CMA Inter Group Cleared</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img src="{{ asset('images/students/keshav_inter.jpg') }}"
                                            alt="Keshav Agarwal">
                                    </div>
                                    <p class="rank_obtained">622</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Keshav Agarwal<span>CMA Inter Group Cleared</span></p>
                                </div>
                            </div>
                        </div>




                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img src="{{ asset('images/students/kriti_inter.jpg') }}"
                                            alt="Kriti chhajer">
                                    </div>
                                    <p class="rank_obtained">617</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Kriti chhajer<span>CMA Inter Group Cleared</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img src="{{ asset('images/students/deepak_inter.jpg') }}"
                                            alt="Deepak Raman">
                                    </div>
                                    <p class="rank_obtained">606</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Deepak Raman<span>CMA Inter Group Cleared</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img
                                            src="{{ asset('images/students/falguni_inter.webp') }}"
                                            alt="Falguni Gulani">
                                    </div>
                                    <p class="rank_obtained">606</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Falguni Gulani<span>CMA Inter Group Cleared</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img src="{{ asset('images/students/parveen_inter.jpg') }}"
                                            alt="Parveen"></div>
                                    <p class="rank_obtained">593</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Parveen<span>CMA Inter Group Cleared</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img src="{{ asset('images/students/himani_inter.jpg') }}"
                                            alt="Himani Negi">
                                    </div>
                                    <p class="rank_obtained">590</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Himani Negi<span>CMA Inter Group Cleared</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img src="{{ asset('images/students/kajal_inter.jpeg') }}"
                                            alt="Kajal bhardwaj">
                                    </div>
                                    <p class="rank_obtained">587</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Kajal bhardwaj<span>CMA Inter Group Cleared</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="item cma_courser">
                            <div class="student_update cma_updater">
                                <div class="stu_ranker">
                                    <div class="stu_images"><img src="{{ asset('images/students/satish_inter.jpg') }}"
                                            alt="Satish Kumar Reddy Siddu"></div>
                                    <p class="rank_obtained">573</p>
                                </div>
                                <div class="stu_detailer">
                                    <p>Satish Kumar Reddy Siddu<span>CMA Inter Group Cleared</span></p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>

        <div class="section-full overlay-wraper bg-parallax bgd_blue">
            <div class="container">
                <div id="feedback_form" class="row conntact-home">
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <div class="contact-home1-left">
                            <div class="section-content contact-form p-lr30 p-tb30">
                                <div class="call-back-form p-t10">
                                    <h3 class="font-weight-400 text-white m-b5 text-uppercase">Share Your Feedback</h3>
                                    <!-- <form class="cons-contact-form form-transparent" method="POST" action="/contact-us"
                                                                    autocomplete="off">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <input name="name" type="text" required=""
                                                                            class="form-control @error('name') is-invalid @enderror"
                                                                            value="{{ old('name') }}" placeholder="Name">
                                                                        @error('name')
        <p class="error_result" style="color:red">{{ $message }}</p>
    @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <select name="course_type"
                                                                            class="form-control @error('course_type') is-invalid @enderror" required=""
                                                                            value="{{ old('course_type') }}" placeholder="Choose Your Course">
                                                                            <option value="">Choose Your Course</option>
                                                                            @foreach ($data as $course)
    <option value="{{ $course['name'] }}" <?php echo old('course_type') == $course['id'] ? 'selected' : ''; ?>>
                                                                                {{ $course['name'] }}
                                                                            </option>
    @endforeach
                                                                        </select>
                                                                        @error('course_type')
        <p class="error_result" style="color:red">{{ $message }}</p>
    @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text" required=""
                                                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                                                            value="{{ old('email') }}" placeholder="Email">
                                                                        @error('email')
        <p class="error_result" style="color:red">{{ $message }}</p>
    @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text" required=""
                                                                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                                            value="{{ old('phone') }}" placeholder="Phone">
                                                                        @error('phone')
        <p class="error_result" style="color:red">{{ $message }}</p>
    @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <textarea name="feedback" required="" class="form-control @error('feedback') is-invalid @enderror" rows="4"
                                                                            placeholder="Enter Your Feedback">{{ old('feedback') }}</textarea>
                                                                        @error('feedback')
        <p class="error_result" style="color:red">{{ $message }}</p>
    @enderror
                                                                    </div>
                                                                    <button type="submit" class="feedback_btnss">
                                                                        Submit
                                                                    </button>
                                                                </form> -->
                                    <form id='BiginWebToContactForm' name='BiginWebToContactForm' method='POST'
                                        enctype='multipart/form-data'
                                        onSubmit='javascript:document.charset="UTF-8"; return validateForm()'
                                        accept-charset='UTF-8' style='margin: 0;'>
                                        <!-- Do not remove this code. -->
                                        <input type='text' style='display:none;' name='xnQsjsdp'
                                            value='71ea9139e1fbbeb931227dbcd956ad072f3f99b7e5459c7685ecfce82a302b91' />
                                        <input type='hidden' name='zc_gad' id='zc_gad' value='' />
                                        <input type='text' style='display:none;' name='xmIwtLD'
                                            value='95bf427b930b09f5660e7e20d9a3775a52744849244cd34a804357dbda299a6e' />
                                        <input type='text' style='display:none;' name='actionType'
                                            value='Q29udGFjdHM=' />
                                        <input type='text' style='display:none;' name='returnURL'
                                            value='https://toplad.in/' />
                                        <div id="elementDiv">
                                            <div class="bgn-wf-row">
                                                <div class="bgn-wf-field form-group">
                                                    <input name="First Name" class="form-control" type="text"
                                                        value="" placeholder="First Name" />
                                                </div>
                                            </div>
                                            <div class="bgn-wf-row">
                                                <div class="bgn-wf-field form-group">
                                                    <input name="Last Name" class="form-control" type="text"
                                                        value="" placeholder="Last Name" />
                                                </div>
                                            </div>
                                            <div class="bgn-wf-row">
                                                <div class="bgn-wf-field form-group">
                                                    <input name="Mobile" class="form-control" type="text"
                                                        value="" placeholder="Phone" />
                                                </div>
                                            </div>
                                            <div class="bgn-wf-row">
                                                <div class="bgn-wf-field form-group">
                                                    <input name="Email" class="form-control" type="text"
                                                        value="" placeholder="Email" />
                                                </div>
                                            </div>
                                            <div class="bgn-wf-row">
                                                <div class="bgn-wf-field form-group">
                                                    <select name="CONTACTCF3" class="form-control">
                                                        <option value="-None-">Choose Your Course</option>
                                                        <option value="CMA">CMA</option>
                                                        <option value="CS">CS</option>
                                                        <option value="CA">CA</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="bgn-wf-row">
                                                <div class="bgn-wf-field form-group">
                                                    <select name="CONTACTCF1" class="form-control">
                                                        <option value="-None-">Choose level</option>
                                                        <option value="CMA Foundation">CMA Foundation</option>
                                                        <option value="CMA Inter">CMA Inter</option>
                                                        <option value="CMA Final">CMA Final</option>
                                                        <option value="CSEET">CSEET</option>
                                                        <option value="CS Executive">CS Executive</option>
                                                        <option value="CS Professional">CS Professional</option>
                                                        <option value="ca-final">CA Final</option>
                                                        <option value="CA Inter">CA Inter</option>
                                                        <option value="CA Foundation">CA Foundation</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="bgn-wf-row">
                                                <div class="bgn-wf-field form-group">
                                                    <textarea name="Description" class="form-control" rows="4" maxlength="1000"
                                                        placeholder="Enter Your Feedback"></textarea>
                                                </div>
                                            </div>
                                            <div class="bgn-wf-row">
                                                <div class="bgn-wf-field form-group">
                                                    <input id='formsubmit' class="feedback_btnss" type='submit'
                                                        value='Submit' />
                                                    <!-- <input onclick='disableSubmitwhileReset()' type='reset' class="feedback_btnss" value='Reset' /> -->
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            var mndFileds = new Array('First Name', 'Mobile', 'Email', 'CONTACTCF3', 'CONTACTCF1', 'Description', 'Last Name');
                                            var fldLangVal = new Array('First Name', 'Mobile', 'Email', 'Course', 'Level', 'Description', 'Last Name');
                                            var name = '';
                                            var email = '';

                                            // function disableSubmitwhileReset() {
                                            //     var e = document.getElementById("formsubmit");
                                            //     null !== document.getElementById("privacyTool") || null !== document.getElementById("consentTool") ? (e.disabled = !0, e.style.opacity = "0.5;") : e.removeAttribute("disabled")
                                            // }

                                            function checkMandatory() {
                                                var e, t, i = mndFileds.length;
                                                for (e = 0; e < i; e++)
                                                    if (t = document.forms.BiginWebToContactForm[mndFileds[e]]) {
                                                        if (0 === t.value.replace(/^\s+|\s+$/g, "").length) return "file" === t.type ? (alert(
                                                            "Please select a file to upload."), t.focus(), !1) : (alert(fldLangVal[e] +
                                                            " cannot be empty."), t.focus(), !1);
                                                        if ("SELECT" === t.nodeName) {
                                                            if ("-None-" === t.options[t.selectedIndex].value) return alert(fldLangVal[e] + " cannot be none."),
                                                                t.focus(), !1
                                                        } else if ("checkbox" === t.type && !1 === t.checked) return alert("Please accept  " + fldLangVal[e]), t
                                                            .focus(), !1;
                                                        try {
                                                            "Last Name" === t.name && (name = t.value)
                                                        } catch (e) {
                                                            murphy.error(e)
                                                        }
                                                    } return validateFileUpload()
                                            }

                                            function validateFileUpload() {
                                                var e = document.getElementById("theFile"),
                                                    t = 0;
                                                if (e) {
                                                    if (e.files.length > 3) return alert("You can upload a maximum of three files at a time."), !1;
                                                    if ("files" in e) {
                                                        var i = e.files.length;
                                                        if (0 !== i) {
                                                            for (var o = 0; o < i; o++) {
                                                                var a = e.files[o];
                                                                "size" in a && (t += a.size)
                                                            }
                                                            if (t > 20971520) return alert("Total file(s) size should not exceed 20MB."), !1
                                                        }
                                                    }
                                                }
                                                return !0
                                            }
                                        </script>
                                        <script id='wf_script'
                                            src='https://bigin.zoho.in/crm/WebformScriptServlet?rid=95bf427b930b09f5660e7e20d9a3775a52744849244cd34a804357dbda299a6egid71ea9139e1fbbeb931227dbcd956ad072f3f99b7e5459c7685ecfce82a302b91'>
                                        </script>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <div class="p-t20 p-b10">
                            <div class="section-content  contact-home1-right">

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xs-100pc">
                                        <div class="wt-icon-box-wraper center  p-lr15 p-tb30 bg-transparent">
                                            <div class="icon-md m-b15">
                                                <span class="icon-cell  text-primary"><i class="fa fa-map"></i></span>
                                            </div>
                                            <div class="icon-content text-white">
                                                <h4 class="wt-tilte m-b5">Our Location </h4>
                                                <p> TopLad, A-56, Plot No-3, Lalita Park, Laxmi Nagar, East Delhi, Delhi,
                                                    India, 110092
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xs-100pc">
                                        <div class="wt-icon-box-wraper center  p-lr15 p-tb30 bg-transparent">
                                            <div class="icon-md  m-b15">
                                                <span class="icon-cell  text-primary"><i
                                                        class="fa fa-credit-card"></i></span>
                                            </div>
                                            <div class="icon-content text-white">
                                                <h4 class="wt-tilte m-b5">Email Address</h4>
                                                <p><a href="mailto:info@toplad.in">info@toplad.in</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xs-100pc">
                                        <div class="wt-icon-box-wraper center  p-lr15 p-tb30 bg-transparent">
                                            <div class="icon-md  m-b15">
                                                <span class="icon-cell  text-primary"><i class="fa fa-phone"></i></span>
                                            </div>
                                            <div class="icon-content text-white">
                                                <h4 class="wt-tilte m-b5">Phone Number</h4>
                                                <!-- <p>011-41681230, 9953155682, 9953155680, 9953155628, 9953155557, 9953155643, 8700349015</p> -->
                                                <a title="Contacts Us" href="tel:9953155682">9953155682</a>, <a
                                                    title="Contacts Us" href="tel:9953155680">9953155680</a>, <a
                                                    title="Contacts Us" href="tel:9953155628">9953155628</a>, <a
                                                    title="Contacts Us" href="tel:9953155557">9953155557</a>, <a
                                                    title="Contacts Us" href="tel:9953155643">9953155643</a>, <a
                                                    title="Contacts Us" href="tel:8700349015">8700349015</a>, <a
                                                    title="Contacts Us" href="tel:7701837553">7701837553</a>
                                                <p style="font-weight:501">Toll
                                                    Free No :<a title="Contacts Us" href="tel:18003091245">
                                                        <span>18003091245</span></a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xs-100pc">
                                        <div class="wt-icon-box-wraper center  p-lr15 p-tb30 bg-transparent">
                                            <div class="icon-md  m-b15">
                                                <span class="icon-cell  text-primary"><i
                                                        class="fa fa-whatsapp"></i></span>
                                            </div>
                                            <div class="icon-content text-white">
                                                <h4 class="wt-tilte m-b5">Whatsapp</h4>
                                                <p><a title="Chat with Us" rel="noopener" target="_blank"
                                                        href="https://api.whatsapp.com/send?phone=919953155628">Send
                                                        Message</a></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>
    </main>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script> -->
@endsection

@push('scripts')
    <!-- <script type="text/javascript">
        $(function() {
            $('#vertical-ticker').totemticker({
                row_height: '50px',
                next: '#ticker-next',
                previous: '#ticker-previous',
                stop: '#stop',
                start: '#start',
                speed: 500,
                interval: 3000,
                mousestop: true,
                max_items: 4,
            });
        });
    </script> -->
@endpush
