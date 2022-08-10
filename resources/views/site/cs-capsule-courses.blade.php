@extends('layouts.cs-layout')
<!-- <link rel="stylesheet" href="{{ asset('css/jssocials.css') }}">
<link rel="stylesheet" href="{{ asset('css/jssocials-theme-flat.css') }}"> -->
@prepend('head-data')
<title>CS Capsule Revision Online Classes | Re-Exam January 2021 Exam</title>
<meta name="description"
    content="Learn from India's top CS faculty at Raghav Academy. We are dedicated to making it possible for anyone, anywhere, at any time to study CS. Join Us Now.">
@endprepend

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url( {{ asset('images/bg_4.jpg') }} );"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
</section>
<div class="main_class whiter_bg">
    <div class=" fixed_cap_share cap_psharess">
        <div id="share"></div>
    </div>
    <section class="ftco-section cap_classes padding_align pb-0">
        <div class="top_cap_carder common_cap_carder">
            <div class="container">
                <div class="ftco-animate intro_headd">
                    <div class="big_top_block">
                        <h1 class="pt-0 f-34 big_data"><b>CS Re-Exam January 2021 Capsule classes</b>: Complete Exam Revision
                            in less than 10 hours
                        </h1>
                        <p class="text-center">For all subjects and papers from Top CS Faculty in India.</p>

                        <div class="big_vid">
                            <iframe width="100%" src="https://www.youtube.com/embed/DAQ4eQTpDnQ" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>

                        <div class="capsule_contents">
                            <p>Buy MCQ based Capsule classes for all the subjects from Foundation/Inter/Final from best
                                faculty under one roof. Complete MCQ based exam preparation in less than 10 hours at
                                your comfort.</p>
                        </div>
                        <div class="big_button">
                            <a id="buy_jump" alt="Buy Now" class="btn button big_btn"><i class="fa fa-hand-o-down"
                                    aria-hidden="true"></i> See Classes Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main_sprit">
            <div class="container">
                <div class="big_inner">
                    <h3>
                        <span class="caps_on">Complete revision</span> in <span class="change_clr icons_clr">
                            < </span>
                                <span class="change_clr">10
                                    hours</span>
                    </h3>
                </div>
            </div>
        </div>
        <div class="middle_cap_carder common_cap_carder">
            <div class="container">
                <div class="big_main" id="main_points">
                    <h3 class="list_title">MCQ based capsule classes.</h3>
                    <ul>

                        <li><span class="bg_checker"><img class="bullet_img"
                                    src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                    class="fa fa-check" aria-hidden="true"></i></span> <span
                                class="checker_content"><b>CS Capsules</b> are meant for <b>100% Exam Oriented
                                    Preparation</b>.</span>
                        </li>
                        <li><span class="bg_checker"><img class="bullet_img"
                                    src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                    class="fa fa-check" aria-hidden="true"></i></span> <span
                                class="checker_content">They are designed specially as per the <b>Pattern prescribed</b>
                                by <b>Institute of Cost Accountants of India</b>.</span>
                        </li>
                        <li><span class="bg_checker"><img class="bullet_img"
                                    src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                    class="fa fa-check" aria-hidden="true"></i></span> <span class="checker_content">You
                                can prepare <b>all your subjects</b> and all your groups in
                                <b>Less than 10 Hours for each Subject</b>.</span>
                        </li>
                        <li><span class="bg_checker"><img class="bullet_img"
                                    src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                    class="fa fa-check" aria-hidden="true"></i></span> <span
                                class="checker_content"><b>Capsules</b> are <b>pre recorded summary lectures</b> which
                                you can watch as per your comfort anywhere and anytime.</span>
                        </li>

                        <li class="divider_space" id="">
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="stripd_info" id="">
            <div class="container">
                <div class="inner_striped">
                    <h3>For All Subjects from top CS Faculty in India</h3>
                </div>
            </div>
        </div>

        <div class="orange_info">
            <div class="container">
                <h3>Get Capsule classes with Early bird Discounts shown below today. Offer only for 1st 100 students!
                </h3>
            </div>
        </div>

        <div class="blue_info" id="">
            <div class="container">
                <h3>To purchase classes click "buy" button below for any class, or call us at 011-41681230, 9953155682,
                    9953155680, 9953155628 to buy or enquire more.</h3>
            </div>
        </div>
        <div class="" id="crash_course">

        </div>
        <div class="bottom_cap_carder common_cap_carder">
            <div class="container">
                <div class="blank_div" id="">

                </div>
                <div class="inner_pblocks card_designs cap_c_ccc">
                    <div class="table-responsive shadow_table">
                        <x-capsule-component />
                    </div>
                </div>
            </div>

        </div>

        <div class="wrap_ss_mode cap_psharess">
            <div class="container">
                <div class="custom_sharre_hori">
                    <div id="social_share"></div>
                </div>
            </div>
        </div>

        <div class="accordion combo_accords faq_combocc" id="combo_faqs">
            <div class="container">
                <h3 class="faq">Frequently Asked Questions</h3>


                <div class="panel-group custom_pancc" id="accordionFAQ">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse1">
                                    <span class="acc_mdata">What are CS Capsule Classes?
                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse show">
                            <div class="panel-body"><b>CS capsule classes</b> are pre- recorded summary lectures which
                                can help student to prepare all subjects and groups in short period of time .This
                                Capsule classes are available on heavy discounted price as compare with group classes
                                price.

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse2">
                                    <span class="acc_mdata">What is the benefit of buying a Capsule Class?
                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">First, you don’t need to buy complete group. Secondly, you will get a
                                Summarized Classes is much better discounted price.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse3">
                                    <span class="acc_mdata">How do I pay for the Capsule Class?
                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">Click on the desired CS Capsule class you want to purchase and
                                click the “<b>Buy</b>” button. It will take you to the Payment gateway where you can
                                choose how you wish to make the payment. </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse4">
                                    <span class="acc_mdata">Which all CS papers are offered in CS Capsule Classes?

                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse4" class="panel-collapse collapse">
                            <div class="panel-body">We offered all 20 papers of the CS course in capsule Classes. You
                                have the option to select which paper you want to study by simply click on Buy Button.
                            </div>
                        </div>
                    </div>
                    <!-- <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse5">
                                    <span class="acc_mdata">Can I purchase more than one CS group at Raghav Academy?

                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse5" class="panel-collapse collapse">
                            <div class="panel-body">Yes, you can purchase more than one CS capsule class. We even give
                                discounted prices if you purchase more than one capsule class at a time. 

                            </div>
                        </div>
                    </div> -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse6">
                                    <span class="acc_mdata">How to purchase a CS Capsule Classes at Raghav Academy?
                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse6" class="panel-collapse collapse">
                            <div class="panel-body">You may simply visit the website and click on the Capsule menu
                                option and complete the payment process as per your requirement. 
                            </div>
                        </div>
                    </div>




                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse7">
                                    <span class="acc_mdata">For which session CS Capsule class are available? </span><i
                                        class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse7" class="panel-collapse collapse">
                            <div class="panel-body">Rightnow, CS Capsule class are available for the session Re-Exam January 2021 attempt. </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse8">
                                    <span class="acc_mdata">How will I receive confirmation about my CS capsule
                                        purchase?
                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse8" class="panel-collapse collapse">
                            <div class="panel-body">After Completion of Payment, you will receive an email confirmation
                                that you have purchased the selected Capsule. Our representative will also get in touch
                                with you once your purchase is confirmed.

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse9">
                                    <span class="acc_mdata">Can I watch the video lectures on mobile phones & tablets?

                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse9" class="panel-collapse collapse">
                            <div class="panel-body">Yes, you can watch the video lectures on Mobile phones & tablets.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse10">
                                    <span class="acc_mdata">When I purchased the CS capsule classes, they didn't ask
                                        for my address, how will they deliver it to me?


                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse10" class="panel-collapse collapse">
                            <div class="panel-body">Our Internal Team will get in touch with you once your order is
                                placed and take down relevant details to deliver your order.  


                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse11">
                                    <span class="acc_mdata">Can I pay in Installment?

                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse11" class="panel-collapse collapse">
                            <div class="panel-body">Currently we don’t have an installments facility so you have to pay
                                complete fee at one time. 

                            </div>
                        </div>
                    </div>




                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse12">
                                    <span class="acc_mdata">Will we get a refund in case there is some issue with our
                                        CS course?
                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse12" class="panel-collapse collapse">
                            <div class="panel-body">No, you will not get any refund for our CS courses. Incase its a
                                technical issue, we will help you resolve it. 

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse13">
                                    <span class="acc_mdata">How and when will I get capsule classes that I purchase?
                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse13" class="panel-collapse collapse">
                            <div class="panel-body">You will get Pendrive or google drive link within 48hrs after
                                payment and purchase has been completed on our website.

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse14">
                                    <span class="acc_mdata">Can I have a demo before I decide to purchase Classes?

                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse14" class="panel-collapse collapse">
                            <div class="panel-body">Most of the faculty listed with us are renowned faculty in the CS
                                field. You can find their demo classes on Youtube and on our website on the faculty
                                profile page. 
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse15">
                                    <span class="acc_mdata">Is there any software we need to install to access pendrive
                                        data, to watch video?

                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse15" class="panel-collapse collapse">
                            <div class="panel-body">You don’t need to install any software to access pendrive. Incase
                                you need anything extra to watch the video, it will be provided in pendrive. 

                            </div>
                        </div>
                    </div>


                </div>


            </div>
        </div>

    </section>
</div>

@endsection

@push('scripts')
<script>
$("#buy_jump").click(function() {
    $('html, body').animate({
        scrollTop: $("#crash_course").offset().top
    }, 800);
});

//---- Scroll to Top -----

$(document).ready(function() {
    $("#jumpTop").hide();
    $(function toTop() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('#jumpTop').fadeIn();
            } else {
                $('#jumpTop').fadeOut();
            }
        });

        $('#jumpTop').click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 600);
            return false;
        });
    });
});
</script>
<script src="{{ asset('js/jssocials.min.js') }}"></script>
<script>
$("#share").jsSocials({
    showLabel: false,
    showCount: false,
    shareUrl: "https://raghavacademy.com/cs/capsule-revision-cs",
    shareIn: "popup",
    title: true,
    media: true,

    shares: [
        "email",
        {
            share: "twitter",
            url: "https://raghavacademy.com/cs/capsule-revision-cs",
            text: "CS Capsule Revision Online Classes | Re-Exam January 2021 Exam"
        },
        {
            share: "facebook",
            url: "https://raghavacademy.com/cs/capsule-revision-cs",
            text: "CS Capsule Revision Online Classes | Re-Exam January 2021 Exam"
        },
        {
            share: "pinterest",
            url: "https://raghavacademy.com/cs/capsule-revision-cs",
            media: "https://raghavacademy.com/images/capsule-classes.png",
            text: "CS Capsule Revision Online Classes | Re-Exam January 2021 Exam"
        },
        {
            share: "whatsapp",
            text: "CS Capsule Revision Online Classes | Re-Exam January 2021 Exam",
            url: "https://raghavacademy.com/cs/capsule-revision-cs",
        },
    ]
});
$("#social_share").jsSocials({
    showLabel: true,
    showCount: false,
    shareUrl: "https://raghavacademy.com/cs/capsule-revision-cs",
    shareIn: "popup",
    shares: [
        "email",
        {
            share: "twitter",
            url: "https://raghavacademy.com/cs/capsule-revision-cs",
            text: "CS Capsule Revision Online Classes | Re-Exam January 2021 Exam"
        },
        {
            share: "facebook",
            url: "https://raghavacademy.com/cs/capsule-revision-cs",
            text: "CS Capsule Revision Online Classes | Re-Exam January 2021 Exam"
        },
        {
            share: "pinterest",
            url: "https://raghavacademy.com/cs/capsule-revision-cs",
            media: "https://raghavacademy.com/images/capsule-classes.png",
            text: "CS Capsule Revision Online Classes | Re-Exam January 2021 Exam"
        },
        {
            share: "whatsapp",
            text: "CS Capsule Revision Online Classes | Re-Exam January 2021 Exam",
            url: "https://raghavacademy.com/cs/capsule-revision-cs",
        },
    ]
});


$(document).ready(function() {
    // Add minus icon for collapse element which is open by default
    $(".custom_pancc .collapse.show").each(function() {
        $(this).prev(".panel-heading").find(".fa").addClass("fa-minus").removeClass("fa-plus");
    });
    // Toggle plus minus icon on show hide of collapse element
    $(".custom_pancc .collapse").on('show.bs.collapse', function() {
        $(this).prev(".panel-heading").find(".fa").removeClass("fa-plus").addClass("fa-minus");
    }).on('hide.bs.collapse', function() {
        $(this).prev(".panel-heading").find(".fa").removeClass("fa-minus").addClass("fa-plus");
    });
});
</script>
@endpush