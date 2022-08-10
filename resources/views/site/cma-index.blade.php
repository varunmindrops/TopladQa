@extends('layouts.cma-layout')

@prepend('head-data')
    <title>CMA Online Classes in India - TopLad | CMA Classes Offline in Laxmi Nagar, Delhi</title>
    <meta name="description"
        content="Learn the foundation, Inter and final CMA classes online in Delhi, India from India's top CMA faculty at Toplad for anyone, anywhere, at any time to study CMA.">
    <meta name="keywords"
        content="CMA, CMA courses online, Foundation to Final, Top Faculty of India, Academy of Excellence, CMA in Future, CMA Books, Online CMA Classes" />
@endprepend

@section('content')


    <main class="main-content cs">
        <section class="section-full announcements_part p-t10 p-b30">
            <div class="container">
                <div class="row align-items-sm-center">
                    <div class="col-md-7 col-lg-7 news_wise_data">
                        <div class="announcements_member_text">
                            <div class="section-head">
                                <h2>Important News & Announcements</h2>
                                <div class="wt-separator-outer text-center p-b30">
                                    <div class="wt-separator bg-primary"></div>
                                </div>
                            </div>
                            <ul>
                                <ul id="vertical-ticker">

                                    <li>
                                        <a href="{{ asset('/announcement-file/cmafoundationexamdatesheet.pdf') }}"
                                            target="_blank">
                                            <span class="check_nnews announcements_member_text_pdf">
                                                Exam Date sheet of CMA foundation July 2022
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ asset('/announcement-file/June2022InterFinalExamNotification.pdf') }}"
                                            target="_blank">
                                            <span class="check_nnews announcements_member_text_pdf">
                                                Exam Date sheet for Intermediate and Final June 2022 Exams
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://icmai.in/studentswebsite/Syl-2016.php" target="_blank">
                                            <span class="check_nnews">
                                                Supplementary Notes for July 2022 Exams released by ICMAI.
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ asset('/announcement-file/CMA-Admission-Dates-Extended-Notification.pdf') }}"
                                            target="_blank">
                                            <span class="check_nnews announcements_member_text_pdf">
                                                CMA Admission Dates Extended till 25th February 2022 for July 2022 Exams
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ asset('/announcement-file/CMA-Admission-Dates-Extended-Notification.pdf') }}"
                                            target="_blank">
                                            <span class="check_nnews announcements_member_text_pdf">
                                                CMA Admission Dates Extended till 25th February 2022 for July 2022 Exams
                                            </span>
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a href="https://youtu.be/zI5fwVc9nx4" rel="noopener" target="_blank">
                                            <span class="check_nnews">
                                             TopLad Live Batches for 2022 Exams.
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{asset('/announcement-file/Toplad-live-Batch.pdf')}}" rel="noopener"  target="_blank">
                                            <span class="check_nnews announcements_member_text_pdf">
                                                TopLad Live Batches Schedule.
                                            </span>
                                        </a>
                                    </li> --}}
                                </ul>
                            </ul>
                            <a href="/{{ $segment }}/newsroom" class="btn btn-primary border_btn m-t10">View more</a>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-5 news_wise_img">
                        <div class="announcements_img">
                            <img src="{{ asset('images/home-images/cma_news.png') }}" alt="cma news" />
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="section-full feature_part text-center bg-primary-light p-t60 p-b60">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xl-12 align-self-center p-b50">
                        <div class="section-head plain-card-without-border">
                            <h1>Achieve your goals with <b class="add_color">Toplad</b></h1>
                            <p class="m-size">Grab this opportunity and enrol yourself in the best online
                                faculty in CMA.
                            </p>
                            <div class="wt-separator-outer p-b30">
                                <div class="wt-separator bg-primary"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-6 common_mstones">
                        <div class="text-black text-center wrap_milestone">
                            <div class="new_iconers"><img src="{{ asset('images/icon/video-lecture.svg') }}"
                                    alt="video lecture">
                            </div>
                            <div class="wrap_mstoneer">
                                <div class="counter">VIDEOS</div>
                                <span>Enjoy unlimited access to the course with flexible deadlines. Learn as per
                                    your own
                                    schedule.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-6 common_mstones">
                        <div class="text-black text-center wrap_milestone">
                            <div class="new_iconers"><img src="{{ asset('images/icon/books.svg') }}" alt="books">
                            </div>
                            <div class="wrap_mstoneer">
                                <div class="counter">BOOKS</div>
                                <span>Access the finest study material and build a library for your career and
                                    personal
                                    growth.</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-6 common_mstones">
                        <div class="text-black text-center wrap_milestone">
                            <div class="new_iconers"><img src="{{ asset('images/icon/notebook.svg') }}" alt="notebook">
                            </div>
                            <div class="wrap_mstoneer">
                                <div class="counter">NOTES</div>
                                <span>Get the most comprehensive coverage of all the concepts and topics in our
                                    notes.</span>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>


        <section class="section-full card_strip_type p-t50 p-b40">
            <div class="main_strip_head">
                <div class="container">
                    <div class="row align-items-sm-center text-center">
                        <div class="col-md-12 col-lg-12">
                            <h2>Video Classes</h2>
                            <p class="m-size">Toplad provides multiple video classes to achieve your
                                dreams.</p>
                            <div class="wt-separator-outer p-b40">
                                <div class="wt-separator bg-primary"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>.

            <section class="section-full card_strip_type p-t50 p-b40">
                <div class="usp_strip_main">
                    <div class="container">
                        <div class="col-sm-12 col-xl-12 align-self-center p-b50">
                            <div class="section-head plain-card-without-border">
                                <h2 class="text-uppercase text-left video-lecture">get below video lectures in <span>
                                        english and hindi </span> exclusively</h2>
                            </div>
                        </div>

                        <div class="row align-items-sm-center">

                            <div class="col-md-6 col-lg-6 course_strip_data">
                                <div class="announcements_member_text p-l20 video-lecture">
                                    <ul>
                                        <li class="d-flex">
                                            <h5 class="d-flex align-items-center pendrive"><i
                                                    class="fad fa-play-circle fa-2x"></i></i>financial accounting</h5>
                                        </li>
                                        <li class="d-flex">
                                            <h5 class="d-flex align-items-center googel-link"><i
                                                    class="fad fa-play-circle fa-2x"></i></i>company accounts</h5>
                                        </li>
                                        <li class="d-flex">
                                            <h5 class="d-flex align-items-center ebook"><i
                                                    class="fad fa-play-circle fa-2x"></i></i> indirect taxation (inter &
                                                final)</h5>
                                        </li>
                                        <li class="d-flex">
                                            <h5 class="d-flex align-items-center cover-book"> <i
                                                    class="fad fa-play-circle fa-2x"></i></i>corporate financial reporting
                                            </h5>
                                        </li>
                                    </ul>
                                    <div class="language">
                                        <h4 class="text-uppercase mb-0">all others lectures in hindi only</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6 course_strip_img">
                                <div class="announcements_member_text p-l20">
                                    <div class="announcements_img">
                                        <img src="{{ asset('images/video-lecture.png') }}" alt="video lecture">
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
                                        <img src="{{ asset('images/scollership.png') }}" alt="scollership">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6 course_strip_data banner-hed">
                                <div class="announcements_member_text p-l20 scholarship">
                                    <h2>Get upto 100% scholarship from top CMA,CS & CA faculty of india</h2>
                                    <p>Enroll yourself to give wings to your dream and make it real</p>
                                    <a href="/scholarship" title="Scholarship">
                                        <button type="button" class="btn btn-primary">click here to get
                                            scholarship</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

            <div class="usp_strip_main p-t50 p-b50">
                <div class="container">
                    <div class="row align-items-sm-center">

                        <div class="col-md-6 col-lg-6 course_strip_data">
                            <div class="announcements_member_text p-l20">
                                <div class="section-head">
                                    <h2>Video Lectures</h2>
                                    <div class="wt-separator-outer text-left p-b30">
                                        <div class="wt-separator bg-primary"></div>
                                    </div>
                                </div>
                                <p>Watch Video Lectures from best CMA faculty @ Anytime & Anywhere
                                </p>
                                <div class="cs_pointers">
                                    <h4><b>Pick who you want to study from!!!</b></h4>
                                    <ul>

                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">India's
                                                <b>Best CMA faculty</b> under
                                                one
                                                Roof.</span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">Watch and
                                                study as per your comfort
                                                anywhere and
                                                anytime.</span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">Detailed
                                                content covered from <b>highly
                                                    experienced
                                                    CMA faculty.</b></span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">Get the
                                                flexibility to get content in
                                                Pendrive or
                                                via Google Drive link.</span>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 course_strip_img">
                            <div class="announcements_img">
                                <img src="{{ asset('images/home-images/cma_video_calss.png') }}"
                                    alt="cma video class" />
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="inner_border_strip">
                <div class="container">
                    <div class="inner_inner_border"></div>
                </div>
            </div>
            <div class="usp_strip_main p-t50 p-b50 bg-primary-light">
                <div class="container">
                    <div class="row align-items-sm-center reverse-rows">

                        <div class="col-md-6 col-lg-6 course_strip_img">
                            <div class="announcements_img">
                                <img src="{{ asset('images/home-images/cma-combo-wise.png') }}" alt="cma-combo-wise" />
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 course_strip_data">
                            <div class="announcements_member_text p-r20">
                                <div class="section-head">
                                    <h2>Combo Videos</h2>
                                    <div class="wt-separator-outer text-left p-b30">
                                        <div class="wt-separator bg-primary"></div>
                                    </div>
                                </div>

                                <p>No more worries about buying separate classes from individual teacher
                                    anymore, get
                                    everything from Foundation/Inter/Final under one roof.

                                </p>

                                <div class="cs_pointers">
                                    <h4>Make your own Combo</h4>
                                    <ul>

                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">India's
                                                <b>Best CMA faculty</b> under
                                                one
                                                Roof.</span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">Get
                                                flexiblity to buy <b>complete CMA course</b> on Toplad's
                                                <b>Combo
                                                    Offer @
                                                    Unbelievable Prices</b>.</span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">Choose
                                                your Favourite Faculty and
                                                <b>Make Your Own
                                                    Combo</b>.
                                                Why buy pre defined combo from others when you can make <b>your
                                                    own
                                                    Combo</b>.</span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content"><b>Buy
                                                    all subjects</b> of any group or
                                                all groups
                                                <b>at Heavy
                                                    Discounts</b>.</span>
                                        </li>


                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">No
                                                Restrictions, No Conditions, <b>Just Select and Buy</b>.</span>
                                        </li>


                                    </ul>
                                </div>
                                <div class="button_group m-t30">

                                    <a href="/{{ $segment }}/{{ $segment }}-combo-offer-june-2021-exam-classes"
                                        class="btn btn-primary bg_btn">See Combo Videos</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="inner_border_strip">
                <div class="container">
                    <div class="inner_inner_border"></div>
                </div>
            </div>
            <div class="usp_strip_main p-t50 p-b50">
                <div class="container">
                    <div class="row align-items-sm-center">

                        <div class="col-md-6 col-lg-6 course_strip_data">
                            <div class="announcements_member_text p-l20">
                                <div class="section-head">
                                    <h2>Past Papers Videos</h2>
                                    <div class="wt-separator-outer text-left p-b30">
                                        <div class="wt-separator bg-primary"></div>
                                    </div>
                                </div>

                                <p>We Provide all solved CMA Past Papers from June 2017 till December 2021 under
                                    one roof
                                    from the best CMA Faculty of India</p>

                                <div class="cs_pointers">
                                    <h4>Learn from Past Trends</h4>
                                    <ul>

                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content"><b>CMA
                                                    Past Papers</b> are meant <b>to
                                                    prepare
                                                    you</b> for Exam mode.</span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">All
                                                answers provided are specially as
                                                per the
                                                <b>pattern prescribed by Institute of Cost Accountants of
                                                    India</b>.</span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">Answer of
                                                all the questions from
                                                <b>experienced
                                                    faculty</b>.</span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">Buy all
                                                Past Papers <b>@ Affordable
                                                    Price</b>.</span>
                                        </li>


                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">Start
                                                Practicing Now and <b>Get the Best
                                                    Results</b>. </span>
                                        </li>


                                    </ul>
                                </div>

                                <div class="button_group m-t30">

                                    <a href="/{{ $segment }}/{{ $segment }}-past-papers"
                                        class="btn btn-primary bg_btn">See
                                        Past
                                        Papers
                                        Video</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 course_strip_img">
                            <div class="announcements_img">
                                <img src="{{ asset('images/home-images/cma_past_paper.png') }}" alt="cma_past_paper" />
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="inner_border_strip">
                <div class="container">
                    <div class="inner_inner_border"></div>
                </div>
            </div>
            <div class="usp_strip_main p-t50 p-b50 bg-primary-light">
                <div class="container">
                    <div class="row align-items-sm-center reverse-rows">

                        <div class="col-md-6 col-lg-6 course_strip_img">
                            <div class="announcements_img">
                                <img src="{{ asset('images/home-images/cma_capsule_wise.png') }}"
                                    alt="cma_capsule_wise" />
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 course_strip_data">
                            <div class="announcements_member_text p-r20">
                                <div class="section-head">
                                    <h2>Capsule Videos</h2>
                                    <div class="wt-separator-outer text-left p-b30">
                                        <div class="wt-separator bg-primary"></div>
                                    </div>
                                </div>

                                <p>Buy MCQ based Capsule classes for all the subjects from
                                    Foundation/Inter/Final from best
                                    faculty under one roof. Complete MCQ based exam preparation in less than 10
                                    hours at
                                    your comfort.



                                </p>

                                <div class="cs_pointers">
                                    <h4>MCQ BASED CAPSULE CLASSES</h4>
                                    <ul>

                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content"><b>CMA
                                                    Capsules</b> are meant for
                                                <b>100% Exam
                                                    Oriented Preparation</b>.</span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">They are
                                                designed specially as per the
                                                <b>Pattern
                                                    prescribed by Institute of Cost Accountants of
                                                    India</b>.</span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">You can
                                                prepare <b>all your subjects</b>
                                                and <b>all
                                                    your groups</b> in <b>Less than 10 Hours</b> for each
                                                Subject.</span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span
                                                class="checker_content"><b>Capsules are pre recorded summary
                                                    lectures</b>
                                                which you can watch as per <b>your comfort anywhere and
                                                    anytime</b>.</span>
                                        </li>




                                    </ul>
                                </div>
                                <div class="button_group m-t30">

                                    <a href="/{{ $segment }}/capsule-revision-{{ $segment }}"
                                        class="btn btn-primary bg_btn">See
                                        Capsule
                                        Videos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="inner_border_strip">
                <div class="container">
                    <div class="inner_inner_border"></div>
                </div>
            </div>
            <div class="usp_strip_main p-t50 p-b50">
                <div class="container">
                    <div class="row align-items-sm-center">

                        <div class="col-md-6 col-lg-6 course_strip_data">
                            <div class="announcements_member_text p-l20">
                                <div class="section-head">
                                    <h2>MTP Videos</h2>
                                    <div class="wt-separator-outer text-left p-b30">
                                        <div class="wt-separator bg-primary"></div>
                                    </div>
                                </div>

                                <p>Mock test papers are designed as per the actual test papers,
                                    to help you to understand with the question pattern,
                                    difficulty level and to get familiar with the actual
                                    exam-environment.</p>

                                <div class="cs_pointers">
                                    <h4>Learn faster and Better</h4>
                                    <ul>

                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content"><b>CMA
                                                    Mock Test Papers</b> are meant to
                                                <b>mold you
                                                    in Exam Mode</b>.</span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content"><b>All
                                                    answers</b> are as per the
                                                <b>prescribed
                                                    pattern by Institute of Cost Accountants of India</b>.
                                            </span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content"><b>All
                                                    solved answers</b> are from
                                                <b>experienced
                                                    CMA faculty</b>.</span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content"><b>Buy
                                                    Mock Test Papers</b> of any group
                                                <b>@
                                                    Affordable Price</b> & solve them at your
                                                convenience.</span>
                                        </li>


                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">
                                                Practice to <b>get the best results</b>.</span>
                                        </li>


                                    </ul>
                                </div>
                                <div class="button_group m-t30">

                                    <a href="/{{ $segment }}/{{ $segment }}-mtp-sale"
                                        class="btn btn-primary bg_btn">See MTP
                                        Video</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 course_strip_img">
                            <div class="announcements_img">
                                <img src="{{ asset('images/home-images/cma_mtp_wise.png') }}" alt="cma_mtp_wise" />
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="inner_border_strip">
                <div class="container">
                    <div class="inner_inner_border"></div>
                </div>
            </div>
            <div class="usp_strip_main bg-primary-light p-t50 p-b50">
                <div class="container">
                    <div class="row align-items-sm-center reverse-rows">

                        <div class="col-md-6 col-lg-6 course_strip_img">
                            <div class="announcements_img">
                                <img src="{{ asset('images/home-images/cma-chapter-wiser.png') }}"
                                    alt="cma-chapter-wiser" />
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 course_strip_data">
                            <div class="announcements_member_text p-r20">
                                <div class="section-head">
                                    <h2>Chapter Wise Videos</h2>
                                    <div class="wt-separator-outer text-left p-b30">
                                        <div class="wt-separator bg-primary"></div>
                                    </div>
                                </div>

                                <p>Now buy chapter based classes for all the subjects from
                                    Foundation/Inter/Final from best faculty under one roof
                                    without worrying to pay for whole subject. Just choose your
                                    Favourite Faculty and buy your particular chapter.
                                </p>

                                <div class="cs_pointers">
                                    <h4>MADE AFFORDABLE FOR YOU</h4>
                                    <ul>

                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span
                                                class="checker_content"><b>India's Best CMA faculty</b> under
                                                one
                                                Roof.</span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">Get
                                                flexiblity to <b>buy any CMA chapter
                                                    on Toplad's</b> Chapter sale Offer <b>@ Unbelievable
                                                    Prices</b>.</span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">Choose
                                                your <b>Favourite Faculty</b> and
                                                buy your
                                                particular chapter.</span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">Buy any
                                                <b>chapter of any group</b> or
                                                all chapters
                                                <b>at Heavy Discounts</b>.</span>
                                        </li>




                                    </ul>
                                </div>
                                <div class="button_group m-t30">

                                    <a href="/{{ $segment }}/{{ $segment }}-chapter-sale"
                                        class="btn btn-primary bg_btn">See
                                        Chapter Wise Videos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section class="section-full p-t60 p-b60 our_faculties">
            <div class="container">
                <!-- TITLE START -->
                <div class="section-head text-center">
                    <h2 class="">Our Certified Faculty</h2>
                    <p class="m-size">Leadership and learning are indispensable to each other. Get a chance to
                        learn from
                        our highly experienced instructors.</p>
                    <div class="wt-separator-outer p-b30">
                        <div class="wt-separator bg-primary"></div>
                    </div>
                </div>
                <!-- TITLE END -->

                <!-- TESTIMONIAL 4 START ON BACKGROUND -->
                <div class="section-content p-t30">
                    <div class="owl-carousel home-carousel-1 testimonial-five">
                        @foreach ($users as $user)
                            @if (!empty($user['slug']))
                                @if (!empty($user['teacher']['bio']))
                                    <div class="item">
                                        <div class="testimonial-5 bg-white">
                                            <div class="testimonial-pic-block radius-bx">
                                                <div class="left_qoute_imger common_qoute_imager"><i
                                                        class="fa fa-quote-left" aria-hidden="true"></i></div>
                                                <div class="testimonial-pic radius">
                                                    @if ($user['photo'])
                                                        <img src="{{ asset($user['photo']) }}" width="100"
                                                            height="100" alt="{{ ucwords($user['name']) }}" />
                                                    @else
                                                        <img src="{{ asset('images/default-user-icon.jpg') }}"
                                                            width="100" height="100"
                                                            alt="{{ ucwords($user['name']) }}" />
                                                    @endif
                                                </div>
                                                <div class="right_qoute_imger common_qoute_imager"><i
                                                        class="fa fa-quote-right" aria-hidden="true"></i></div>
                                            </div>
                                            <a href="/faculty/{{ $user['slug'] }}" class="testimonial-text clearfix">

                                                <div class="testimonial-paragraph">
                                                    <p>
                                                        {!! nl2br(e($user['teacher']['bio'])) !!}
                                                    </p>
                                                </div>
                                                <hr class="min_border_saprate">
                                                <div class="testimonial-detail clearfix">
                                                    <strong
                                                        class="testimonial-name">{{ ucwords($user['name']) }}</strong>
                                                </div>

                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>


        <div class="wrap_bg_multi bg-primary-light">
            <section class="section-full course-des p-t60 p-b60">
                <div class="container">
                    <div class="section-head text-center p-b40">
                        <h2 class="">CMA Courses</h2>

                        <div class="wt-separator-outer p-b30">
                            <div class="wt-separator bg-primary"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                @foreach ($course_level as $level)
                                    <li class="nav-item <?php echo $loop->index == 0 ? 'active' : ''; ?>" role="presentation">
                                        <button class="nav-link <?php echo $loop->index == 0 ? 'active' : ''; ?>" id="home<?php echo $loop->index + 1; ?>-tab"
                                            data-toggle="tab" href="#found<?php echo $loop->index + 1; ?>" role="tab"
                                            aria-controls="found<?php echo $loop->index + 1; ?>"
                                            aria-selected="<?php echo $loop->index == 0 ? 'true' : 'false'; ?>">{{ $level['name'] }}</button>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content p-relative" id="myTabContent">
                                @foreach ($course_level as $level)
                                    <div class="tab-pane fade show <?php echo $loop->index == 0 ? ' active' : ''; ?>" id="found<?php echo $loop->index + 1; ?>"
                                        role="tabpanel" aria-labelledby="home<?php echo $loop->index + 1; ?>-tab">

                                        <div class="row">
                                            @foreach ($level['mstSubject'] as $subject)
                                                @if (!empty($subject['slug']))
                                                    <div class="col-md-3 col-sm-12">
                                                        <a href="/{{ $segment }}/paper/{{ $subject['slug'] }}"
                                                            class="wt-icon-box-wraper bx-style-2 m-t10 m-b10 p-a20 center bg-white radius-md onhover-action">
                                                            <div class="icon-content">
                                                                <p>{{ $subject->name }}</p>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-full text-center p-t40 p-b50 why_academy">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-xl-12 align-self-center">
                            <div class="section-head plain-card-without-border">
                                <h2>Why Toplad?</h2>
                                <p class="m-size">Grab this opportunity and enrol yourself in the best online
                                    faculty in
                                    CMA.
                                </p>
                                <div class="wt-separator-outer p-b40">
                                    <div class="wt-separator bg-primary"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center animate-box fadeInUp animated">
                            <div class="achievements-box bdr-info">
                                <div class="goal_sec_icons">
                                    <img src="{{ asset('images/icon/goals1.png') }}" alt="icons">
                                </div>
                                <div class="desc">
                                    <h3>We are available in</h3>
                                    <p>Smart & Comfortable Class Room (Projector, Recordings AC Etc) & Classes
                                        Available in
                                        Pen
                                        Drive , Google Drive ,Mobile App & Face To Face !</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center animate-box fadeInUp animated">
                            <div class="achievements-box bdr-danger">
                                <div class="goal_sec_icons">
                                    <img src="{{ asset('images/icon/goals3.png') }}" alt="icons">
                                </div>
                                <div class="desc">
                                    <h3>Effective Study Materials</h3>
                                    <p>All The Past year Question, ICSI Module & Reader's Friendly Language In a
                                        form of
                                        Hardcopy & E-Book.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center animate-box fadeInUp animated">
                            <div class="achievements-box bdr-warning">
                                <div class="goal_sec_icons">
                                    <img src="{{ asset('images/icon/new_faculty.png') }}" alt="icons">
                                </div>
                                <div class="desc">
                                    <h3>Certified Faculty</h3>
                                    <p>All the faculties are highly qualified and giving their 100 % to clear
                                        all doubts of
                                        students in their video lectures.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

@endsection

@push('scripts')
    <script type="text/javascript">
        $(function() {
            $('#vertical-ticker').totemticker({
                row_height: '40px',
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

        mixpanel.track("CMA Page visit");
    </script>
@endpush
