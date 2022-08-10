@extends('layouts.ca-layout')

@prepend('head-data')
<title>CA Combo Offer 2022 | Toplad | India's Best Faculty</title>
<meta name="description"
    content="Learn from India's top CA faculty at Toplad. We are dedicated to making it possible for anyone, anywhere, at any time to study CA. Join Us Now.">
<meta name="keywords"
    content="CA, CA courses online, Foundation to Final, Top Faculty of India, Academy of Excellence, CA in Future, CA Books, Online CA Classes" />
@endprepend

@section('content')


<div class="inner_theme_page p-b10 inner_header_page">
    <nav aria-label="breadcrumb" class="bdcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/ca">CA</a></li>
                <li title="Important News & Announcements" class="breadcrumb-item active" aria-current="page">CA Combo Offer</li>
            </ol>
        </div> 
    </nav>
    <div class="wrap_theme_pages">
        <section class="inner_pcontent">
            <div class="f2f_info">
                <div class="wrap_f2fimg">
                    <div class="container">
                        <div class="f2f_block">
                            {{-- <img src="{{ asset('images/ra-images/ca-combo-offer.png') }}" alt="CA Combo Offer"
                                class="img-responsive ftf_desk">
                            <img src="{{ asset('images/ra-images/ca-combo-offer.png') }}" alt="CA Combo Offer"
                                class="img-responsive ftf_mob"> --}}
                                <img src="{{ asset('images/ra-images/ca/CAFOUNDATION.png') }}" alt="CA Combo Offer"
                                class="img-responsive "> 
                                <img src="{{ asset('images/ra-images/ca/CAintergroup1-2.png') }}" alt="CA Combo Offer"
                                class="img-responsive "> 
                                <img src="{{ asset('images/ra-images/ca/CAFINAL-group1-2.png') }}" alt="CA Combo Offer"
                                class="img-responsive "> 
                                {{-- <img src="{{ asset('images/ra-images/ca/toplad.png') }}" alt="CA Combo Offer"
                                class="img-responsive ">  --}}
                        </div>
                    </div>
                </div>
                <div class="list_content_blocks">
                    <div class="container">
                        <div class="cs_pointers">
                            <ul>
                                <li><span class="bg_checker"><img class="bullet_img"
                                            src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                            class="fa fa-check" aria-hidden="true"></i></span> <span
                                        class="checker_content">Specialized Coaching for CA</span>
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
                </div>
        </section>
    </div>
</div>

@endsection