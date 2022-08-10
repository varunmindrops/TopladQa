@extends('layouts.layout')

@prepend('head-data')
<title>View All Feedbacks</title>
<meta name="description"
    content="Learn from India's top CMA faculty at Toplad. We are dedicated to making it possible for anyone, anywhere, at any time to study CMA. Join Us Now.">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endprepend

@section('content')

<!-- <div class="container brd-cumb mobile_pdt_only">
    <div class="row no-gutters slider-text  align-items-end justify-content-center">
        <div class="col-md-12 ftco-animate pt-4 text-left">
            <p class="breadcrumbs mb-0">
                <span class="mr-2">
                    <a title="Home" href="/">Home <i class="ion-ios-arrow-forward"></i></a>
                </span>
                <span class="mr-2">
                    <a title="All Feedbacks" class="active-breadcumb">All Feedbacks</a>
                </span>
            </p>
        </div>
    </div>
</div> -->
<div class="inner_theme_page p-b40">
    <nav aria-label="breadcrumb" class="bdcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li title="Feedback Form" class="breadcrumb-item active" aria-current="page">Feedback Form</li>
            </ol>
        </div>
    </nav>
    <div class="wrap_theme_pages">
<section class="feedback-form">
    <div class="container">
        <div class="row">
        <div class="col-sm-12 heading-section full_width_flex">
                        <h1 class="inner_theme_title">All Feedbacks</h1>

                <section class="view-feedbacks">

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col_feeds">
                            @foreach($feedback as $data)
                            <div class="testi_item feeds_cards">
                                <div class="testi_text">
                                    <div class="img_testi_wrapp">
                                        <h4 class="feeds_main">
                                            <div class="rateby">
                                                <span class="starts">
                                                    @if ($data['overall_experience'] == "Awesome")
                                                    @for ($i = 1; $i <= 5; $i++) <i class="fa fa-star"
                                                        aria-hidden="true"></i>
                                                        @endfor
                                                        @elseif ($data['overall_experience'] == "Satisfactory")
                                                        @for ($i = 1; $i <= 4; $i++) <i class="fa fa-star"
                                                            aria-hidden="true"></i>
                                                            @endfor
                                                            @for ($j = 1; $j <= 1; $j++) <i class="fa fa-star-o"
                                                                aria-hidden="true"></i>
                                                                @endfor
                                                                @elseif ($data['overall_experience'] == "Average")
                                                                @for ($i = 1; $i <= 3; $i++) <i class="fa fa-star"
                                                                    aria-hidden="true"></i>
                                                                    @endfor
                                                                    @for ($j = 1; $j <= 2; $j++) <i class="fa fa-star-o"
                                                                        aria-hidden="true"></i>
                                                                        @endfor
                                                                        @elseif ($data['overall_experience'] == "Below
                                                                        Average")
                                                                        @for ($i = 1; $i <= 2; $i++) <i
                                                                            class="fa fa-star" aria-hidden="true"></i>
                                                                            @endfor
                                                                            @for ($j = 1; $j <= 3; $j++) <i
                                                                                class="fa fa-star-o" aria-hidden="true">
                                                                                </i>
                                                                                @endfor
                                                                                @elseif ($data['overall_experience'] ==
                                                                                "Not Satisfactory")
                                                                                @for ($i = 1; $i <= 1; $i++) <i
                                                                                    class="fa fa-star"
                                                                                    aria-hidden="true"></i>
                                                                                    @endfor
                                                                                    @for ($j = 1; $j <= 4; $j++) <i
                                                                                        class="fa fa-star-o"
                                                                                        aria-hidden="true"></i>
                                                                                        @endfor
                                                                                        @endif
                                                </span>

                                            </div> <span class="post_by">By <span>{{ $data['name'] }}</span></span><span
                                                class="date_litser"><small>.</small>
                                                {{ Carbon\Carbon::parse($data['created_at'])->timezone('Asia/Kolkata')->format('d M, Y') }}</span>
                                        </h4>
                                        <a class="show_backs"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="wrap_rattings">
                                        <ul class="multi_ratinggs">
                                            <li class="ask_rating"><span class="bg_checker"><img class="bullet_img"
                                                        src="{{ asset('images/icon/checkmark.svg') }}"
                                                        alt="Bullet Image"></span> How was your overall experience with
                                                Toplad <span class="starts all_rattings">
                                                    @if ($data['experince_raghav_academy'] == "Awesome")
                                                    @for ($i = 1; $i <= 5; $i++) <i class="fa fa-star"
                                                        aria-hidden="true"></i>
                                                        @endfor
                                                        @elseif ($data['experince_raghav_academy'] == "Satisfactory")
                                                        @for ($i = 1; $i <= 4; $i++) <i class="fa fa-star"
                                                            aria-hidden="true"></i>
                                                            @endfor
                                                            @for ($j = 1; $j <= 1; $j++) <i class="fa fa-star-o"
                                                                aria-hidden="true"></i>
                                                                @endfor
                                                                @elseif ($data['experince_raghav_academy'] == "Average")
                                                                @for ($i = 1; $i <= 3; $i++) <i class="fa fa-star"
                                                                    aria-hidden="true"></i>
                                                                    @endfor
                                                                    @for ($j = 1; $j <= 2; $j++) <i class="fa fa-star-o"
                                                                        aria-hidden="true"></i>
                                                                        @endfor
                                                                        @elseif ($data['experince_raghav_academy'] ==
                                                                        "Below Average")
                                                                        @for ($i = 1; $i <= 2; $i++) <i
                                                                            class="fa fa-star" aria-hidden="true"></i>
                                                                            @endfor
                                                                            @for ($j = 1; $j <= 3; $j++) <i
                                                                                class="fa fa-star-o" aria-hidden="true">
                                                                                </i>
                                                                                @endfor
                                                                                @elseif
                                                                                ($data['experince_raghav_academy'] ==
                                                                                "Not Satisfactory")
                                                                                @for ($i = 1; $i <= 1; $i++) <i
                                                                                    class="fa fa-star"
                                                                                    aria-hidden="true"></i>
                                                                                    @endfor
                                                                                    @for ($j = 1; $j <= 4; $j++) <i
                                                                                        class="fa fa-star-o"
                                                                                        aria-hidden="true"></i>
                                                                                        @endfor
                                                                                        @endif
                                                </span></li>
                                            <li class="ask_rating"><span class="bg_checker"><img class="bullet_img"
                                                        src="{{ asset('images/icon/checkmark.svg') }}"
                                                        alt="Bullet Image"></span> How would you rate our video lectures
                                                <span class="starts all_rattings">
                                                    @if ($data['video_lectures'] == "Awesome")
                                                    @for ($i = 1; $i <= 5; $i++) <i class="fa fa-star"
                                                        aria-hidden="true"></i>
                                                        @endfor
                                                        @elseif ($data['video_lectures'] == "Satisfactory")
                                                        @for ($i = 1; $i <= 4; $i++) <i class="fa fa-star"
                                                            aria-hidden="true"></i>
                                                            @endfor
                                                            @for ($j = 1; $j <= 1; $j++) <i class="fa fa-star-o"
                                                                aria-hidden="true"></i>
                                                                @endfor
                                                                @elseif ($data['video_lectures'] == "Average")
                                                                @for ($i = 1; $i <= 3; $i++) <i class="fa fa-star"
                                                                    aria-hidden="true"></i>
                                                                    @endfor
                                                                    @for ($j = 1; $j <= 2; $j++) <i class="fa fa-star-o"
                                                                        aria-hidden="true"></i>
                                                                        @endfor
                                                                        @elseif ($data['video_lectures'] == "Below
                                                                        Average")
                                                                        @for ($i = 1; $i <= 2; $i++) <i
                                                                            class="fa fa-star" aria-hidden="true"></i>
                                                                            @endfor
                                                                            @for ($j = 1; $j <= 3; $j++) <i
                                                                                class="fa fa-star-o" aria-hidden="true">
                                                                                </i>
                                                                                @endfor
                                                                                @elseif ($data['video_lectures'] == "Not
                                                                                Satisfactory")
                                                                                @for ($i = 1; $i <= 1; $i++) <i
                                                                                    class="fa fa-star"
                                                                                    aria-hidden="true"></i>
                                                                                    @endfor
                                                                                    @for ($j = 1; $j <= 4; $j++) <i
                                                                                        class="fa fa-star-o"
                                                                                        aria-hidden="true"></i>
                                                                                        @endfor
                                                                                        @endif
                                                </span>
                                            </li>
                                            <li class="ask_rating"><span class="bg_checker"><img class="bullet_img"
                                                        src="{{ asset('images/icon/checkmark.svg') }}"
                                                        alt="Bullet Image"></span> How would you rate our books and
                                                study material <span class="starts all_rattings">
                                                    @if ($data['books_study_material'] == "Awesome")
                                                    @for ($i = 1; $i <= 5; $i++) <i class="fa fa-star"
                                                        aria-hidden="true"></i>
                                                        @endfor
                                                        @elseif ($data['books_study_material'] == "Satisfactory")
                                                        @for ($i = 1; $i <= 4; $i++) <i class="fa fa-star"
                                                            aria-hidden="true"></i>
                                                            @endfor
                                                            @for ($j = 1; $j <= 1; $j++) <i class="fa fa-star-o"
                                                                aria-hidden="true"></i>
                                                                @endfor
                                                                @elseif ($data['books_study_material'] == "Average")
                                                                @for ($i = 1; $i <= 3; $i++) <i class="fa fa-star"
                                                                    aria-hidden="true"></i>
                                                                    @endfor
                                                                    @for ($j = 1; $j <= 2; $j++) <i class="fa fa-star-o"
                                                                        aria-hidden="true"></i>
                                                                        @endfor
                                                                        @elseif ($data['books_study_material'] == "Below
                                                                        Average")
                                                                        @for ($i = 1; $i <= 2; $i++) <i
                                                                            class="fa fa-star" aria-hidden="true"></i>
                                                                            @endfor
                                                                            @for ($j = 1; $j <= 3; $j++) <i
                                                                                class="fa fa-star-o" aria-hidden="true">
                                                                                </i>
                                                                                @endfor
                                                                                @elseif ($data['books_study_material']
                                                                                == "Not Satisfactory")
                                                                                @for ($i = 1; $i <= 1; $i++) <i
                                                                                    class="fa fa-star"
                                                                                    aria-hidden="true"></i>
                                                                                    @endfor
                                                                                    @for ($j = 1; $j <= 4; $j++) <i
                                                                                        class="fa fa-star-o"
                                                                                        aria-hidden="true"></i>
                                                                                        @endfor
                                                                                        @endif
                                                </span></li>
                                            <li class="ask_rating"><span class="bg_checker"><img class="bullet_img"
                                                        src="{{ asset('images/icon/checkmark.svg') }}"
                                                        alt="Bullet Image"></span> How would you rate our counsellors in
                                                terms of explaining all the information to you <span
                                                    class="starts all_rattings">
                                                    @if ($data['counsellors'] == "Awesome")
                                                    @for ($i = 1; $i <= 5; $i++) <i class="fa fa-star"
                                                        aria-hidden="true"></i>
                                                        @endfor
                                                        @elseif ($data['counsellors'] == "Satisfactory")
                                                        @for ($i = 1; $i <= 4; $i++) <i class="fa fa-star"
                                                            aria-hidden="true"></i>
                                                            @endfor
                                                            @for ($j = 1; $j <= 1; $j++) <i class="fa fa-star-o"
                                                                aria-hidden="true"></i>
                                                                @endfor
                                                                @elseif ($data['counsellors'] == "Average")
                                                                @for ($i = 1; $i <= 3; $i++) <i class="fa fa-star"
                                                                    aria-hidden="true"></i>
                                                                    @endfor
                                                                    @for ($j = 1; $j <= 2; $j++) <i class="fa fa-star-o"
                                                                        aria-hidden="true"></i>
                                                                        @endfor
                                                                        @elseif ($data['counsellors'] == "Below
                                                                        Average")
                                                                        @for ($i = 1; $i <= 2; $i++) <i
                                                                            class="fa fa-star" aria-hidden="true"></i>
                                                                            @endfor
                                                                            @for ($j = 1; $j <= 3; $j++) <i
                                                                                class="fa fa-star-o" aria-hidden="true">
                                                                                </i>
                                                                                @endfor
                                                                                @elseif ($data['counsellors'] == "Not
                                                                                Satisfactory")
                                                                                @for ($i = 1; $i <= 1; $i++) <i
                                                                                    class="fa fa-star"
                                                                                    aria-hidden="true"></i>
                                                                                    @endfor
                                                                                    @for ($j = 1; $j <= 4; $j++) <i
                                                                                        class="fa fa-star-o"
                                                                                        aria-hidden="true"></i>
                                                                                        @endfor
                                                                                        @endif
                                                </span></li>
                                            <li class="ask_rating"><span class="bg_checker"><img class="bullet_img"
                                                        src="{{ asset('images/icon/checkmark.svg') }}"
                                                        alt="Bullet Image"></span> How would you rate our expert faculty
                                                panel <span class="starts all_rattings">
                                                    @if ($data['expert_faculty_panel'] == "Awesome")
                                                    @for ($i = 1; $i <= 5; $i++) <i class="fa fa-star"
                                                        aria-hidden="true"></i>
                                                        @endfor
                                                        @elseif ($data['expert_faculty_panel'] == "Satisfactory")
                                                        @for ($i = 1; $i <= 4; $i++) <i class="fa fa-star"
                                                            aria-hidden="true"></i>
                                                            @endfor
                                                            @for ($j = 1; $j <= 1; $j++) <i class="fa fa-star-o"
                                                                aria-hidden="true"></i>
                                                                @endfor
                                                                @elseif ($data['expert_faculty_panel'] == "Average")
                                                                @for ($i = 1; $i <= 3; $i++) <i class="fa fa-star"
                                                                    aria-hidden="true"></i>
                                                                    @endfor
                                                                    @for ($j = 1; $j <= 2; $j++) <i class="fa fa-star-o"
                                                                        aria-hidden="true"></i>
                                                                        @endfor
                                                                        @elseif ($data['expert_faculty_panel'] == "Below
                                                                        Average")
                                                                        @for ($i = 1; $i <= 2; $i++) <i
                                                                            class="fa fa-star" aria-hidden="true"></i>
                                                                            @endfor
                                                                            @for ($j = 1; $j <= 3; $j++) <i
                                                                                class="fa fa-star-o" aria-hidden="true">
                                                                                </i>
                                                                                @endfor
                                                                                @elseif ($data['expert_faculty_panel']
                                                                                == "Not Satisfactory")
                                                                                @for ($i = 1; $i <= 1; $i++) <i
                                                                                    class="fa fa-star"
                                                                                    aria-hidden="true"></i>
                                                                                    @endfor
                                                                                    @for ($j = 1; $j <= 4; $j++) <i
                                                                                        class="fa fa-star-o"
                                                                                        aria-hidden="true"></i>
                                                                                        @endfor
                                                                                        @endif
                                                </span></li>
                                            <li class="ask_rating"><span class="bg_checker"><img class="bullet_img"
                                                        src="{{ asset('images/icon/checkmark.svg') }}"
                                                        alt="Bullet Image"></span> How would you rate our doubt solving
                                                mechanism <span class="starts all_rattings">
                                                    @if ($data['doubt_solving'] == "Awesome")
                                                    @for ($i = 1; $i <= 5; $i++) <i class="fa fa-star"
                                                        aria-hidden="true"></i>
                                                        @endfor
                                                        @elseif ($data['doubt_solving'] == "Satisfactory")
                                                        @for ($i = 1; $i <= 4; $i++) <i class="fa fa-star"
                                                            aria-hidden="true"></i>
                                                            @endfor
                                                            @for ($j = 1; $j <= 1; $j++) <i class="fa fa-star-o"
                                                                aria-hidden="true"></i>
                                                                @endfor
                                                                @elseif ($data['doubt_solving'] == "Average")
                                                                @for ($i = 1; $i <= 3; $i++) <i class="fa fa-star"
                                                                    aria-hidden="true"></i>
                                                                    @endfor
                                                                    @for ($j = 1; $j <= 2; $j++) <i class="fa fa-star-o"
                                                                        aria-hidden="true"></i>
                                                                        @endfor
                                                                        @elseif ($data['doubt_solving'] == "Below
                                                                        Average")
                                                                        @for ($i = 1; $i <= 2; $i++) <i
                                                                            class="fa fa-star" aria-hidden="true"></i>
                                                                            @endfor
                                                                            @for ($j = 1; $j <= 3; $j++) <i
                                                                                class="fa fa-star-o" aria-hidden="true">
                                                                                </i>
                                                                                @endfor
                                                                                @elseif ($data['doubt_solving'] == "Not
                                                                                Satisfactory")
                                                                                @for ($i = 1; $i <= 1; $i++) <i
                                                                                    class="fa fa-star"
                                                                                    aria-hidden="true"></i>
                                                                                    @endfor
                                                                                    @for ($j = 1; $j <= 4; $j++) <i
                                                                                        class="fa fa-star-o"
                                                                                        aria-hidden="true"></i>
                                                                                        @endfor
                                                                                        @endif
                                                </span></li>
                                            <li class="ask_rating"><span class="bg_checker"><img class="bullet_img"
                                                        src="{{ asset('images/icon/checkmark.svg') }}"
                                                        alt="Bullet Image"></span> How would you rate our after sales
                                                service <span class="starts all_rattings">
                                                    @if ($data['after_sales_service'] == "Awesome")
                                                    @for ($i = 1; $i <= 5; $i++) <i class="fa fa-star"
                                                        aria-hidden="true"></i>
                                                        @endfor
                                                        @elseif ($data['after_sales_service'] == "Satisfactory")
                                                        @for ($i = 1; $i <= 4; $i++) <i class="fa fa-star"
                                                            aria-hidden="true"></i>
                                                            @endfor
                                                            @for ($j = 1; $j <= 1; $j++) <i class="fa fa-star-o"
                                                                aria-hidden="true"></i>
                                                                @endfor
                                                                @elseif ($data['after_sales_service'] == "Average")
                                                                @for ($i = 1; $i <= 3; $i++) <i class="fa fa-star"
                                                                    aria-hidden="true"></i>
                                                                    @endfor
                                                                    @for ($j = 1; $j <= 2; $j++) <i class="fa fa-star-o"
                                                                        aria-hidden="true"></i>
                                                                        @endfor
                                                                        @elseif ($data['after_sales_service'] == "Below
                                                                        Average")
                                                                        @for ($i = 1; $i <= 2; $i++) <i
                                                                            class="fa fa-star" aria-hidden="true"></i>
                                                                            @endfor
                                                                            @for ($j = 1; $j <= 3; $j++) <i
                                                                                class="fa fa-star-o" aria-hidden="true">
                                                                                </i>
                                                                                @endfor
                                                                                @elseif ($data['after_sales_service'] ==
                                                                                "Not Satisfactory")
                                                                                @for ($i = 1; $i <= 1; $i++) <i
                                                                                    class="fa fa-star"
                                                                                    aria-hidden="true"></i>
                                                                                    @endfor
                                                                                    @for ($j = 1; $j <= 4; $j++) <i
                                                                                        class="fa fa-star-o"
                                                                                        aria-hidden="true"></i>
                                                                                        @endfor
                                                                                        @endif
                                                </span></li>
                                        </ul>
                                        <p>
                                            {{ $data['des_overall_experience'] }}
                                        </p>
                                    </div>
                                    <!-- <a href="#">Read More</a> -->
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>


                </section>

            </div>
        </div>
    </div>
</section>
</div>
</div>
@endsection

@push('scripts')
<script>
$(".view-feedbacks .feeds_cards:nth-child(1)").addClass("shower_star");
$("a.show_backs").click(function() {
    // $("a.show_backs").parent().parent().parent().removeClass("shower_star");
    $(this).parent().parent().parent().toggleClass("shower_star");
});
</script>

@endpush