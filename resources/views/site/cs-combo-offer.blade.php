@extends('layouts.cs-layout')

@prepend('head-data')
    <title>CS Combo Offer 2021 | Toplad | India's Best Faculty</title>
    <meta name="description"
        content="Learn from India's top CS faculty at Toplad. We are dedicated to making it possible for anyone, anywhere, at any time to study CS. Join Us Now.">
    <meta name="keywords"
        content="CS, CS courses online, CSEET, CS Executive, CS Professional, Top Faculty of India, Academy of Excellence, CS in Future, CS Books, Online CS Classes" />
@endprepend

@section('content')
    <div class="inner_theme_page p-b10 inner_header_page">
        <nav aria-label="breadcrumb" class="bdcrumb">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/cs">CS</a></li>
                    <li title="Important News & Announcements" class="breadcrumb-item active" aria-current="page">CS Combo
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
                                <img src="{{ asset('images/ra-images/cs/cscombooffer.jpg') }}" alt="CS Combo Offer"
                                    class="img-responsive ftf_desk">
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
                                            class="checker_content">Specialized Coaching for CS</span>
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
                                            class="checker_content">Personalized Counselling Sessions for
                                            Improvements</span>
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
