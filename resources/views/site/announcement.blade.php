@extends('layouts.layout')


@prepend('head-data')

<title>News & Announcements</title>
<meta name="description"
    content="Learn from India's top CMA faculty at Raghav Academy. We are dedicated to making it possible for anyone, anywhere, at any time to study CMA. Join Us Now.">
<link rel="stylesheet" href="{{ asset('css/jssocials.css') }}">
<link rel="stylesheet" href="{{ asset('css/jssocials-theme-flat.css') }}">

@endprepend

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url( {{ asset('images/bg_4.jpg') }} );"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
</section>
<div class="main_class whiter_bg whatsneww">
    <div class="container brd-cumb">
        <!-- <h1 class="pt-0 f-34">Meet our <span class="blue_color">Great Faculty</span></h1> -->
        <div class="row no-gutters slider-text  align-items-end justify-content-center">
            <div class="col-md-12 ftco-animate pt-4 text-left">
                <p class="breadcrumbs mb-0">
                    <span class="mr-2">
                        <a title="Home" href="/">Home <i class="ion-ios-arrow-forward"></i></a>
                    </span>
                    <span class="mr-2">
                        <a title="Faculty" class="active-breadcumb">News & Announcements</a>
                    </span>
                </p>

            </div>
        </div>
    </div>
    <div id="share"></div>
    <div class="all_newsroom single_newsser" id="">

        <div class="container">
            <h1 class="custom_eve_news">News & Announcements
            </h1>
            <div class="combined_snews">
                <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book.</p>
                <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book.</p>
                <div class="common_cap_carder">

                    <div class="listing_snews" id="">
                        <h3 class="">Lorem Ipsum is simply dummy text:</h3>
                        <ul>

                            <li><span class="bg_checker"><img class="bullet_img"
                                        src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                        class="fa fa-check" aria-hidden="true"></i></span> <span
                                    class="checker_content"><b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry.</span>
                            </li>
                            <li><span class="bg_checker"><img class="bullet_img"
                                        src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                        class="fa fa-check" aria-hidden="true"></i></span> <span
                                    class="checker_content">Lorem Ipsum is simply dummy text of the printing and <b>typesetting industry</b>.</span>
                            </li>
                            <li><span class="bg_checker"><img class="bullet_img"
                                        src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                        class="fa fa-check" aria-hidden="true"></i></span> <span
                                    class="checker_content">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                            </li>
                            <li><span class="bg_checker"><img class="bullet_img"
                                        src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                        class="fa fa-check" aria-hidden="true"></i></span> <span
                                    class="checker_content">Lorem Ipsum is simply dummy text of the printing and <b>typesetting industry</b>.</span>
                            </li>

                            <li class="divider_space" id="">
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            
        </div>
        
    </div>
    <div class="wrap_ss_mode sing_newshare">
                <div class="container">
                    <div class="custom_sharre_hori">
                        <div id="social_share"></div>
                    </div>
                </div>
            </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/jssocials.min.js') }}"></script>
<script>
$("#share").jsSocials({
    showLabel: false,
    showCount: false,
    shareUrl: "https://raghavacademy.com/announcement",
    shareIn: "popup",
    title: true,
    media: true,
    shares: [
        "email",
        {
            share: "twitter",
            url: "https://qa.raghavacademy.com/announcement",
            text: "Get all latest news and announcement | Raghav Academy",
        },
        {
            share: "facebook",
            url: "https://qa.raghavacademy.com/announcement",
            text: "Get all latest news and announcement | Raghav Academy",
        },
        {
            share: "pinterest",
            url: "https://qa.raghavacademy.com/announcement",
            // media: "https://raghavacademy.com/images/combo_banner.png",
            text: "Get all latest news and announcement | Raghav Academy",
        },
        {
            share: "whatsapp",
            text: "Get all latest news and announcement | Raghav Academy",
            url: "https://qa.raghavacademy.com/announcement",
        },
    ]
});
$("#social_share").jsSocials({
    showLabel: true,
    showCount: false,
    shareUrl: "https://raghavacademy.com/announcement",
    shareIn: "popup",
    shares: [
        "email",
        {
            share: "twitter",
            url: "https://qa.raghavacademy.com/announcement",
            text: "Get all latest news and announcement | Raghav Academy",
        },
        {
            share: "facebook",
            url: "https://qa.raghavacademy.com/announcement",
            text: "Get all latest news and announcement | Raghav Academy",
        },
        {
            share: "pinterest",
            url: "https://qa.raghavacademy.com/announcement",
            // media: "https://raghavacademy.com/images/combo_banner.png",
            text: "Get all latest news and announcement | Raghav Academy",
        },
        {
            share: "whatsapp",
            text: "Get all latest news and announcement | Raghav Academy",
            url: "https://qa.raghavacademy.com/announcement",
        },
    ]
});
</script>


@endpush