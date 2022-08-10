@extends('layouts.ca-layout')

@prepend('head-data')
    <title>CA Online Classes in India - TopLad | Chartered Accountant Offline classes Laxmi Nagar, Delhi</title>
    <meta name="description"
        content="Learn the CA Foundation, CA Inter and CA Final classes online in Delhi, India from India's top CA faculty at Toplad for anyone, anywhere, at any time to study CA.">
    <meta name="keywords"
        content="CA, CA courses online, CA Foundation, CA Inter, CA Inter Group 1, CA Inter Group 2, CA Final, CA Final Group 1, CA Final Group 2, Top Faculty of India, Academy of Excellence, CA in Future, CA Books, CA Notes, Online CA Classes" />
@endprepend

@section('content')
    <main class="main-content cma">
        <div class="wrap_banner_announce">
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
                                            <a href="{{ asset('/announcement-file/CA-Exams-Date-Sheet.pdf') }}"
                                                target="_blank" rel="noopener">
                                                <span class="check_nnews  announcements_member_text_pdf">
                                                    CA Exams Date Sheet for May 2022 Exams.</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.icai.org/post/cut-off-date-for-conversion-from-earlier-scheme-to-revised-scheme-may2022exam"
                                                target="_blank" rel="noopener">
                                                <span class="check_nnews">
                                                    Cut Off Date to switch to New Scheme of CA Course.</span>
                                            </a>
                                        </li>
                                        {{-- <li>
                                        <a href="https://www.youtube.com/watch?v=V2JlWVKs8Nw"
                                            target="_blank" rel="noopener">
                                            <span class="check_nnews">
                                            TopLad Live Batches for 2022 Exams.</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{asset('/announcement-file/Toplad-live-Batch.pdf')}}"
                                            target="_blank" rel="noopener">
                                            <span class="check_nnews  announcements_member_text_pdf">
                                            TopLad Live Batches Schedule.
                                        </span>
                                        </a>
                                    </li> --}}
                                    </ul>
                                </ul>
                                <a href="/{{ $segment }}/ca-newsroom" class="btn btn-primary border_btn m-t10">View
                                    more</a>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-5 news_wise_img">
                            <div class="announcements_img">
                                <img src="{{ asset('images/home-images/ca-news-announsment.png') }}"
                                    alt="ca-news-announsment" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <section class="section-full feature_part text-center bg-primary-light p-t60 p-b60">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xl-12 align-self-center p-b50">
                        <div class="section-head plain-card-without-border">
                            <h2>Achieve your goals with <b class="add_color">Toplad</b></h2>
                            <p class="m-size">Grab this opportunity and enrol yourself in the best online faculty in
                                CA.</p>
                            <div class="wt-separator-outer p-b30">
                                <div class="wt-separator bg-primary"></div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-6 col-xs-6 common_mstones">
                        <div class="text-black text-center wrap_milestone">
                            <div class="new_iconers"><img src="{{ asset('images/icon/video-lecture.svg') }}"
                                    alt="video-lecture"></div>
                            <div class="wrap_mstoneer">


                                <div class="counter">Videos</div>
                                <span>Enjoy unlimited access to the course with flexible deadlines. Learn as per your own
                                    schedule.</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-6 common_mstones">
                        <div class="text-black text-center wrap_milestone">
                            <div class="new_iconers"><img src="{{ asset('images/icon/books.svg') }}" alt="book"></div>
                            <div class="wrap_mstoneer">
                                <div class="counter">Books</div>
                                <span>Access the finest study material and build a library for your career and personal
                                    growth.</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-6 common_mstones">
                        <div class="text-black text-center wrap_milestone">
                            <div class="new_iconers"><img src="{{ asset('images/icon/notebook.svg') }}" alt="notebook">
                            </div>
                            <div class="wrap_mstoneer">
                                <div class="counter">Notes</div>
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
                            <span class="m-size">Watch Video Lectures from best CA faculty <b>@ Anytime &
                                    Anywhere.</b></span>
                            <div class="wt-separator-outer p-b40">
                                <div class="wt-separator bg-primary"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="usp_strip_main p-t50 p-b50">
                <div class="container">
                    <div class="row align-items-sm-center">
                        <div class="col-md-6 col-lg-6 course_strip_img">
                            <div class="announcements_img">
                                <img src="{{ asset('images/home-images/ca-video-class.png') }}" alt="ca-video-class" />
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 course_strip_data">
                            <div class="announcements_member_text p-l20">
                                <div class="section-head">
                                    <h2>Video Lectures</h2>
                                    <div class="wt-separator-outer text-left p-b30">
                                        <div class="wt-separator bg-primary"></div>
                                    </div>
                                </div>
                                <p>Watch Video Lectures from best CA faculty @ Anytime & Anywhere
                                </p>
                                <div class="cs_pointers">
                                    <h4><b>Pick who you want to study from!!!</b></h4>
                                    <ul>

                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                                    class="fa fa-check" aria-hidden="true"></i></span> <span
                                                class="checker_content">India's <b>Best CA faculty</b> under one
                                                Roof.</span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                                    class="fa fa-check" aria-hidden="true"></i></span> <span
                                                class="checker_content">Watch and study as per your comfort anywhere and
                                                anytime.</span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                                    class="fa fa-check" aria-hidden="true"></i></span> <span
                                                class="checker_content">Detailed content covered from <b>highly experienced
                                                    CA faculty.</b></span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">Get the
                                                flexibility to get content in Pendrive or
                                                via Google Drive link.</span>
                                        </li>
                                    </ul>
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
            <div class="usp_strip_main p-t50 p-b50 bg-primary-light">
                <div class="container">
                    <div class="row align-items-sm-center reverse-rows">

                        <div class="col-md-6 col-lg-6 course_strip_data">
                            <div class="announcements_member_text p-r20">
                                <div class="section-head">
                                    <h2>Combo Videos</h2>
                                    <div class="wt-separator-outer text-left p-b30">
                                        <div class="wt-separator bg-primary"></div>
                                    </div>
                                </div>

                                <p>No more worries about buying separate classes from individual teacher anymore, get
                                    everything from Foundation/Inter/Final under one roof.</p>

                                <div class="cs_pointers">
                                    <h4>Buy your Combo and get heavy discount</h4>
                                    <ul>

                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">India's
                                                <b>Best CA faculty</b> under one
                                                Roof.</span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">Get
                                                chance to <b>make your combo</b> and <b>buy
                                                    complete CA course</b>.</span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">Choose
                                                your <b>Favorite Faculty</b> and <b>Your Own
                                                    Combo</b>.</span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content"><b>Buy
                                                    all subjects</b> of any group or all groups
                                                at <b>Heavy Discounts</b>.</span>
                                        </li>


                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content"><b>No
                                                    Restrictions</b>, <b>No Conditions</b>, Just
                                                Select and Buy.</span>
                                        </li>


                                    </ul>
                                </div>
                                <div class="button_group m-t30">

                                    <a href="/{{ $segment }}/{{ $segment }}-combo-offer-exam-classes"
                                        class="btn btn-primary bg_btn">See Combo Videos</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 course_strip_img">
                            <div class="announcements_img">
                                <img src="{{ asset('images/home-images/ca-combo-class.png') }}" alt="ca-combo-class" />
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
                        <div class="col-md-6 col-lg-6 course_strip_img">
                            <div class="announcements_img">
                                <img src="{{ asset('images/home-images/ca-past-paper.png') }}"
                                    alt="ca-past-paper.png" />
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 course_strip_data">
                            <div class="announcements_member_text p-l20">
                                <div class="section-head">
                                    <h2>Past Papers Videos</h2>
                                    <div class="wt-separator-outer text-left p-b30">
                                        <div class="wt-separator bg-primary"></div>
                                    </div>
                                </div>

                                <p>We provide all solved CA Past Papers from NOVEMBER 2018 to DECEMBER 2021 under one roof
                                    from the best CA Faculty of India.</p>

                                <div class="cs_pointers">
                                    <h4>Learn from past to go ahead</h4>
                                    <ul>

                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content"><b>CA
                                                    Past Papers</b> are meant <b>to prepare
                                                    you</b> for Exam mode.</span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">All
                                                answers provided are specially as per the
                                                pattern prescribed by ICAI.</span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">Answer of
                                                all the questions from <b>experienced
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
                                        class="btn btn-primary bg_btn">See Past
                                        Papers
                                        Video</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="usp_strip_main p-t50 p-b50 bg-primary-light">
                <div class="container">
                    <div class="row align-items-sm-center reverse-rows">

                        <div class="col-md-6 col-lg-6 course_strip_data">
                            <div class="announcements_member_text p-r20">
                                <div class="section-head">
                                    <h2>RTP Videos</h2>
                                    <div class="wt-separator-outer text-left p-b30">
                                        <div class="wt-separator bg-primary"></div>
                                    </div>
                                </div>

                                <p>Find Solved CA Revision Test Papers for all subjects from NOVEMBER 2019 till DECEMBER
                                    2021 under one roof from the best CA Faculty of India.</p>

                                <div class="cs_pointers">
                                    <h4>Learn Faster and Better</h4>
                                    <ul>

                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">CA
                                                Revision Test Papers are meant to mold you in
                                                Exam Mode.</span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">All
                                                answers are as per the prescribed pattern by
                                                Institute of Cost Accountants of India.</span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">All
                                                solved answers are from experienced CA
                                                faculty.</span>
                                        </li>
                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">Buy
                                                Revision Test Papers of any group @ Affordable
                                                Price & solve them at your convenience.</span>
                                        </li>


                                        <li><span class="bg_checker"><img class="bullet_img"
                                                    src="{{ asset('images/icon/checkmark.svg') }}"
                                                    alt="Bullet Image"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span> <span class="checker_content">Practice
                                                to get the best results.</span>
                                        </li>


                                    </ul>
                                </div>

                                <div class="button_group m-t30">

                                    <a href="/{{ $segment }}/{{ $segment }}-rtp-sale"
                                        class="btn btn-primary bg_btn">See RTP Videos</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 course_strip_img">
                            <div class="announcements_img">
                                <img src="{{ asset('images/home-images/ca-combo-class.png') }}"
                                    alt="ca-combo-class.png" />
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

        </section>
        <section class="section-full p-t60 p-b60 our_faculties">
            <div class="container">
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
                                                        <img src="{{ asset($user['photo']) }}" width="132"
                                                            height="132" alt="{{ ucwords($user['name']) }}" />
                                                    @else
                                                        <img src="{{ asset('images/default-user-icon.jpg') }}"
                                                            width="132" height="132"
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
                        <h2 class="">CA Courses</h2>
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
            <section class="section-full text-center p-t50 p-b60 why_academy">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-xl-12 align-self-center  p-b40">
                            <div class="section-head plain-card-without-border">
                                <h2>Why Toplad?</h2>
                                <p class="m-size">Grab this opportunity and enrol yourself in the best online
                                    faculty in CA.
                                </p>
                                <div class="wt-separator-outer p-b40">
                                    <div class="wt-separator bg-primary"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center animate-box fadeInUp animated">
                            <div class="achievements-box bdr-info">
                                <!-- <span class="icon">
                                            <i class="fa fa-users"></i>
                                        </span> -->
                                <div class="goal_sec_icons">
                                    <img src="{{ asset('images/icon/goals1.png') }}" alt="icons">
                                </div>
                                <div class="desc">
                                    <h3>We are available in</h3>
                                    <p>Smart & Comfortable Class Room (Projector, Recordings AC Etc) & Classes Available in
                                        Pen
                                        Drive , Google Drive ,Mobile App & Face To Face !</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center animate-box fadeInUp animated">
                            <div class="achievements-box bdr-danger">
                                <!-- <span class="icon">
                                            <i class="fa fa-book"></i>
                                        </span> -->
                                <div class="goal_sec_icons">
                                    <img src="{{ asset('images/icon/goals3.png') }}" alt="icons">
                                </div>
                                <div class="desc">
                                    <h3>Effective Study Materials</h3>
                                    <p>All The Past year Question, ICAI Module & Reader's Friendly Language In a form of
                                        Hardcopy & E-Book.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center animate-box fadeInUp animated">
                            <div class="achievements-box bdr-warning">
                                <!-- <span class="icon">
                                            <i class="fa fa-graduation-cap"></i>
                                        </span> -->
                                <div class="goal_sec_icons">
                                    <img src="{{ asset('images/icon/new_faculty.png') }}" alt="icons">
                                </div>
                                <div class="desc">
                                    <h3>Certified Faculty</h3>
                                    <p>All the faculties are highly qualified and giving their 100 % to clear all doubts of
                                        students in their video lectures.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(function() {
            $('#vertical-ticker').totemticker({
                row_height: '45px',
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
    </script>
    <script type="text/javascript">
        function hover_tab() {
            jQuery('.hover-block-outer[data-toggle="tab-hover"] div').on('mouseenter', function() {
                jQuery(this).tab('show');
            });
        }
    </script>
@endpush
