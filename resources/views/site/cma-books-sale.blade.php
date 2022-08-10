@extends('layouts.cma-layout')
<!-- <link rel="stylesheet" href="{{ asset('css/jssocials.css') }}">
<link rel="stylesheet" href="{{ asset('css/jssocials-theme-flat.css') }}"> -->
@prepend('head-data')
<title>CMA Courses - Best CMA Online Classes | CMA Books | Toplad</title>
<meta name="description"
    content="Learn the foundation, Inter and final with CMA Books in Delhi, India. Learn with India's top CMA faculty at Toplad for anyone, anywhere, at any time to study CMA.">
<meta name="keywords"
    content="CMA, CMA courses online, Foundation to Final, Top Faculty of India, Academy of Excellence, CMA in Future, CMA Books, Online CMA Classes, CMA Foundation, CMA Final, CMA Faculty" />
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
                        <h1 class="pt-0 f-34 big_data"><b>WRITTEN BY CMA EXPERT </b>: BUY BOOK OF YOUR FAVOURITE FACULTY
                        </h1>
                        <p class="text-center">Toplad is here to support you in assessing your preparations and bridge all the gaps in the short time available in hand.</p>

                        <!-- <div class="big_vid">
                            <iframe width="100%" src="https://www.youtube.com/embed/DAQ4eQTpDnQ" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div> -->

                        <div class="capsule_contents">
                            <p>Click here and buy the Books from your favourite faculty.</p>
                        </div>
                        <div class="big_button">
                            <a id="buy_jump" alt="Buy Now" class="btn button big_btn"><i class="fa fa-hand-o-down"
                                    aria-hidden="true"></i> See Books Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main_sprit">
            <div class="container">
                <div class="big_inner">
                    <h3>
                        <span class="caps_on">Score big with reading!</span>
                    </h3>
                </div>
            </div>
        </div>
        <div class="middle_cap_carder common_cap_carder">
            <div class="container">
                <div class="big_main" id="main_points">
                    <h3 class="list_title">Read today, Live tomorrow!</h3>
                    <ul>

                        <li><span class="bg_checker"><img class="bullet_img"
                                    src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                    class="fa fa-check" aria-hidden="true"></i></span> <span
                                class="checker_content"><b>CMA books</b> are meant to <b>prepare you for Exam mode</b>.</span>
                        </li>
                        <li><span class="bg_checker"><img class="bullet_img"
                                    src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                    class="fa fa-check" aria-hidden="true"></i></span> <span
                                class="checker_content">Give You <b>In-Depth Understanding </b>
                                of <b>Complex Subjects</b>.</span>
                        </li>
                        <li><span class="bg_checker"><img class="bullet_img"
                                    src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                    class="fa fa-check" aria-hidden="true"></i></span> <span class="checker_content">Buy books of <b>any group </b> @
                                <b>Affordable Price</b>.</span>
                        </li>
                        <li><span class="bg_checker"><img class="bullet_img"
                                    src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                    class="fa fa-check" aria-hidden="true"></i></span> <span
                                class="checker_content">Published in a <b>Simple Language</b> than other Side Books.</span>
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
                    <h3>GOOD LUCK FOR YOUR UPCOMING EXAMS CMA ASPIRANTS!!!</h3>
                </div>
            </div>
        </div>

        <div class="orange_info">
            <div class="container">
                <h3>Buy books of your favourite faculty on just one click.
                </h3>
            </div>
        </div>

        <div class="blue_info" id="">
            <div class="container">
                <h3>To purchase book click "buy" button below for any subject, or call us at 011-41681230, 9953155682, 9953155680, 9953155628 to buy or enquire more.</h3>
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
                        <x-book-component />
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
                                    <span class="acc_mdata">Why we purchase CMA book?
                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse show">
                            <div class="panel-body"><b>Our books</b> cover each part of the exam in-depth and written by CMA experts. You can pick these books up and instantly start memorizing, interacting with and learning all of the information you need to pass the paper.

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse2">
                                    <span class="acc_mdata">How do I pay for the Books?
                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">Just select the desired book you want to purchase and click the “Buy” button. It will take you to the Payment gateway where you can choose how you wish to make the payment. Once you make the payment, we will send the link to your email address.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse3">
                                    <span class="acc_mdata">Can I purchase more than one book at Toplad?
                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">Yes , you can purchase as many book as you wish. Just select and click “Buy” button. </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse4">
                                    <span class="acc_mdata">How to purchase a book at Toplad?

                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse4" class="panel-collapse collapse">
                            <div class="panel-body">You may simply visit the website and click on the book menu option in the CMA header, select the book  you wish to purchase and complete the payment process as per your requirement.
                            </div>
                        </div>
                    </div>
                    <!-- <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse5">
                                    <span class="acc_mdata">Can I purchase more than one CMA group at Toplad?

                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse5" class="panel-collapse collapse">
                            <div class="panel-body">Yes, you can purchase more than one CMA capsule class. We even give
                                discounted prices if you purchase more than one capsule class at a time. 

                            </div>
                        </div>
                    </div> -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse6">
                                    <span class="acc_mdata">Will you be adding more faculty in this list?
                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse6" class="panel-collapse collapse">
                            <div class="panel-body">Yes, we are working on bringing more faculty members on board with us and will add them in the list to provide you with more options in near future.
                            </div>
                        </div>
                    </div>




                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse7">
                                    <span class="acc_mdata">How will I receive confirmation about book? </span><i
                                        class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse7" class="panel-collapse collapse">
                            <div class="panel-body">After Completion of Payment, you will receive an email confirmation that you have purchased the selected book  with other relevant details. Our representative will also get in touch with you once your purchase is confirmed. </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse8">
                                    <span class="acc_mdata">When I purchased the book , they didn't ask for my address, how will they deliver it to me?
                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse8" class="panel-collapse collapse">
                            <div class="panel-body">Our Internal Team will get in touch with you once your order is placed and take down relevant details to deliver your order.

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse9">
                                    <span class="acc_mdata">Will we get a refund in case there is some issue with our book?

                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse9" class="panel-collapse collapse">
                            <div class="panel-body">No, you will not get any refund for book. Incase it's a technical issue, we will help you resolve it.
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
    shareUrl: "https://toplad.in/cma/cma-books",
    shareIn: "popup",
    title: true,
    media: true,

    shares: [
        "email",
        {
            share: "twitter",
            url: "https://toplad.in/cma/cma-books",
            text: "CMA Books"
        },
        {
            share: "facebook",
            url: "https://toplad.in/cma/cma-books",
            text: "CMA Books"
        },
        {
            share: "pinterest",
            url: "https://toplad.in/cma/cma-books",
            //media: "https://toplad.in/images/capsule-classes.png",
            text: "CMA Books"
        },
        {
            share: "whatsapp",
            text: "CMA Books",
            url: "https://toplad.in/cma/cma-books",
        },
    ]
});
$("#social_share").jsSocials({
    showLabel: true,
    showCount: false,
    shareUrl: "https://toplad.in/cma/cma-books",
    shareIn: "popup",
    shares: [
        "email",
        {
            share: "twitter",
            url: "https://toplad.in/cma/cma-books",
            text: "CMA Book"
        },
        {
            share: "facebook",
            url: "https://toplad.in/cma/cma-books",
            text: "CMA Book"
        },
        {
            share: "pinterest",
            url: "https://toplad.in/cma/cma-books",
            //media: "https://toplad.in/images/capsule-classes.png",
            text: "CMA Book"
        },
        {
            share: "whatsapp",
            text: "CMA Book",
            url: "https://toplad.in/cma/cma-books",
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