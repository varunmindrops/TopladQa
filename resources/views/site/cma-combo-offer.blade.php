@extends('layouts.cma-layout')

@prepend('head-data')
    <title>CMA Combo Offer 2022 | Toplad | India's Best Faculty</title>
    <meta name="description"
        content="Save your hard earned money by availing huge discounts on CMA Foundation, Inter and Final Subjects' combo offers only at TopLad CMA online classes in India.">
    <meta name="keywords"
        content="CMA, CMA courses online, Foundation to Final, Top Faculty of India, Academy of Excellence, CMA in Future, CMA Books, Online CMA Classes" />
@endprepend

@section('content')
    <div class="inner_theme_page p-b10 inner_header_page">
        <nav aria-label="breadcrumb" class="bdcrumb">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/cma">CMA</a></li>
                    <li title="Important News & Announcements" class="breadcrumb-item active" aria-current="page">CMA Combo
                        Offer</li>
                </ol>
            </div>
        </nav>
        <div class="wrap_theme_pages">
            <section class="inner_pcontent">
                <div class="f2f_info">
                    <div class="wrap_f2fimg">
                        <div class="container">
                            <div class="f2f_block">
                                {{-- <img src="{{ asset('images/ra-images/cma-combo-offer.png') }}" alt="CMA Combo Offer"
                                class="img-responsive ftf_desk">
                            <img src="{{ asset('images/ra-images/cma-combo-offer.png') }}" alt="CMA Combo Offer"
                                class="img-responsive ftf_mob"> --}}
                                <img src="{{ asset('images/ra-images/cma/cma-foundation.jpeg') }}" alt="CMA Combo Offer"
                                    class="img-responsive">
                                <img src="{{ asset('images/ra-images/cma/cma-inter.jpeg') }}" alt="CMA Combo Offer"
                                    class="img-responsive ">
                                <img src="{{ asset('images/ra-images/cma/cma-final.jpeg') }}" alt="CMA Combo Offer"
                                    class="img-responsive">
                                {{-- <img src="{{ asset('images/ra-images/cma/toplad.png') }}" alt="CMA Combo Offer"
                                class="img-responsive"> --}}
                            </div>
                        </div>
                    </div>
                    {{-- <div class="list_content_blocks">
                    <div class="container">
                        <div class="cs_pointers">
                            <ul>
                                <li><span class="bg_checker"><img class="bullet_img"
                                            src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                            class="fa fa-check" aria-hidden="true"></i></span> <span
                                        class="checker_content">Specialized Coaching for CMA</span>
                                </li>
                                <li><span class="bg_checker"><img class="bullet_img"
                                            src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                            class="fa fa-check" aria-hidden="true"></i></span> <span
                                        class="checker_content">Expert Faculty Panel</span>
                                </li>
                                <li><span class="bg_checker"><img class="bullet_img"
                                            src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                            class="fa fa-check" aria-hidden="true"></i></span> <span
                                        class="checker_content">Daily Doubt Sessions</span>
                                </li>
                                <li><span class="bg_checker"><img class="bullet_img"
                                            src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                            class="fa fa-check" aria-hidden="true"></i></span> <span
                                        class="checker_content">Weekly Zoom Sessions</span>
                                </li>
                                <li><span class="bg_checker"><img class="bullet_img"
                                            src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                            class="fa fa-check" aria-hidden="true"></i></span> <span
                                        class="checker_content">Regular YouTube Live Sessions</span>
                                </li>
                                <li><span class="bg_checker"><img class="bullet_img"
                                    src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                    class="fa fa-check" aria-hidden="true"></i></span> <span
                                class="checker_content">Personalized Counselling Sessions for Improvements</span>
                                </li>
                                <li><span class="bg_checker"><img class="bullet_img"
                                    src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                    class="fa fa-check" aria-hidden="true"></i></span> <span
                                class="checker_content">Regular Follow Up of Students</span>
                                </li>
                                <li><span class="bg_checker"><img class="bullet_img"
                                    src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                    class="fa fa-check" aria-hidden="true"></i></span> <span
                                class="checker_content">Regular Test Series & Mock Exams</span>
                                </li>
                                <li><span class="bg_checker"><img class="bullet_img"
                                    src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                    class="fa fa-check" aria-hidden="true"></i></span> <span
                                class="checker_content">Unlimited Views</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </section>
        </div>
    </div>
@endsection
