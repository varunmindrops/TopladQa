@extends('layouts.cma-layout')
<!-- <link rel="stylesheet" href="{{ asset('css/jssocials.css') }}">
<link rel="stylesheet" href="{{ asset('css/jssocials-theme-flat.css') }}"> -->
@prepend('head-data')
<title>CMA Chapter Sale | June/December 2022 Exam</title>
<meta name="description" content="Toplad exclusively provides CMA chapter wise video for all the subjects and you can choose the faculty of your like, and pay instant. Video wise chapters are a great source for studying during the final days before exams.">
<meta name="keywords"
    content="CMA, CMA courses online, Foundation to Final, Top Faculty of India, Academy of Excellence, CMA in Future, CMA Books, Online CMA Classes" />
@endprepend

@section('content')

<a class="floating_carten" id="mobile_cart">
    <span class="number">0</span>
</a>
<div class="main_class whiter_bg chapter_wise_sale">
    <div class=" fixed_cap_share cap_psharess">
        <div id="share"></div>
    </div>
    <section class="ftco-section cap_classes padding_align pb-0">
        <div class="top_cap_carder common_cap_carder">
            <div class="container">
                <div class="ftco-animate intro_headd">
                    <div class="big_top_block">
                        <h1 class="pt-0 f-34 big_data"><b>CMA December 2022 Chapter wise sale</b>: Now select particular
                            chapter with Heavy discounts.
                        </h1>
                        <p class="text-center">For all subject chapters from top CMA faculty of India.</p>
                        <!-- 
                        <div class="big_vid">
                            <iframe width="100%" src="https://www.youtube.com/embed/DAQ4eQTpDnQ" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div> -->

                        <div class="capsule_contents">
                            <p>Buy chapter based classes for all the subjects from Foundation/Inter/Final from best
                                faculty under one roof.</p>
                        </div>
                        <div class="big_button">
                            <a id="buy_jump" alt="Buy Now" class="btn button big_btn"><i class="fa fa-hand-o-down" aria-hidden="true"></i> See Chapters Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main_sprit">
            <div class="container">
                <div class="big_inner">
                    <h3>
                        <span class="caps_on">Buy any chapter</span> with <span class="change_clr">Heavy
                            Discounts</span>
                    </h3>
                </div>
            </div>
        </div>
        <div class="middle_cap_carder common_cap_carder">
            <div class="container">
                <div class="big_main" id="main_points">
                    <h3 class="list_title">Made affordable for you</h3>
                    <ul>

                        <li><span class="bg_checker"><img class="bullet_img" src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i class="fa fa-check" aria-hidden="true"></i></span> <span class="checker_content">India's <b>Best CMA faculty</b> under one Roof.</span>
                        </li>
                        <li><span class="bg_checker"><img class="bullet_img" src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i class="fa fa-check" aria-hidden="true"></i></span> <span class="checker_content">Get
                                flexiblity to buy any <b>CMA chapter</b> on Toplad's Chapter sale Offer <b>@
                                    Unbelievable Prices.</b></span>
                        </li>
                        <li><span class="bg_checker"><img class="bullet_img" src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i class="fa fa-check" aria-hidden="true"></i></span> <span class="checker_content">Choose your <b>Favourite Faculty</b> and buy your particular
                                <b>chapter.</b></span>
                        </li>
                        <li><span class="bg_checker"><img class="bullet_img" src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i class="fa fa-check" aria-hidden="true"></i></span> <span class="checker_content">Buy
                                any chapter of any group or all chapters at <b>Heavy Discounts.</b></span>
                        </li>
                        <li><span class="bg_checker"><img class="bullet_img" src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i class="fa fa-check" aria-hidden="true"></i></span> <span class="checker_content">No
                                Restrictions, No Conditions, Just <b>Select and Buy.</b></span>
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
                    <h3>FOR ALL CHAPTERS FROM TOP CMA FACULTY IN INDIA</h3>
                </div>
            </div>
        </div>

        <div class="orange_info">
            <div class="container">
                <h3>Get chapters with Heavy Discounts shown below today. Limited time offer – Hurry up!
                </h3>
            </div>
        </div>

        <div class="blue_info" id="">
            <div class="container">
                <h3>To purchase chapters click "buy" button below for any chapter, or call us at 011-41681230,
                    9953155682, 9953155680, 9953155628 to buy or enquire more.</h3>
            </div>
        </div>
        <div class="" id="crash_course">

        </div>
        <div class="bottom_cap_carder common_cap_carder check_rad_btns">
            <div class="container">
                <div class="blank_div" id="">

                </div>

                <div class="wrap_acart_now chapter_saler">

                    <div class="inner_pblocks card_designs cap_c_ccc">
                        <div class="select_chapter_form">
                            <div class="form-group col-md-4">
                                <select class="form-control dynamic" name="course_level_id" id="course_level_id" data-dependent="subject_id">
                                    @foreach($course_level as $level)
                                    <option value="{{ $level['id'] }}">{{ $level['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-8">
                                <select class="form-control dynamic-list" name="subject_id" id="subject_id" data-dependent="chapter_id">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive shadow_table">
                            <table id="chapter_table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name of Chapter</th>
                                        <th>Faculty</th>
                                        <th class="text-center">Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody name="chapter_id" id="chapter_id">
                                </tbody>
                                {{ csrf_field() }}
                            </table>
                        </div>
                        <div class="cart_jumper" id="mobile_cart_pane"></div>
                    </div>

                    <div class="acart_card" id="">
                        <div class="chapter_carts">
                            <ul id="listing">
                                <li class="blank_c_carts">
                                    <span><i class="fa fa-cart-plus" aria-hidden="true"></i></span>
                                    <h4 id="select_to_buy">Select Chapters Now</h4>
                                </li>
                            </ul>
                        </div>
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
                                    <span class="acc_mdata">What are CMA Chapter wise Sale?
                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse show">
                            <div class="panel-body"><b>CMA chapter wise sales</b> are pre-recorded summary lectures
                                which can help student to prepare all subjects and groups in short period of time. These
                                Chapters are available on heavy discounted price.

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse2">
                                    <span class="acc_mdata">What is the benefit of buying a Chapter?
                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">First, you don’t need to buy complete group. Secondly, you will get
                                a Summarized Classes in much better discounted price.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse3">
                                    <span class="acc_mdata">How do I pay for the Chapter?
                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">Click on the desired Chapter you want to purchase and click the
                                “<b>Buy</b>” button. It will take you to the Payment gateway where you can choose how
                                you wish to make the payment.</div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse4">
                                    <span class="acc_mdata">Which all CMA subject chapters are offered in CMA Chapter
                                        wise Sale?

                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse4" class="panel-collapse collapse">
                            <div class="panel-body">We offered all 20 papers subject chapters of the CMA course. You
                                have the option to select which chapter you want to study by simply click on Buy Button.
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
                                    <span class="acc_mdata">Can I purchase more than one chapter at Toplad?
                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse6" class="panel-collapse collapse">
                            <div class="panel-body">Yes, you can purchase more than one CMA chapter class. 
                            </div>
                        </div>
                    </div>




                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse7">
                                    <span class="acc_mdata">How to purchase a CMA Chapter Classes at Toplad? </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse7" class="panel-collapse collapse">
                            <div class="panel-body">You may simply visit the website and click on the Chapter menu
                                option and complete the payment process as per your requirement.</div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse8">
                                    <span class="acc_mdata">For which session CMA Chapter class are available?
                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse8" class="panel-collapse collapse">
                            <div class="panel-body">Rightnow, CMA Chapter class are available for the session December
                                2022 attempt.

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse9">
                                    <span class="acc_mdata">How will I receive confirmation about my CMA capsule
                                        purchase?

                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse9" class="panel-collapse collapse">
                            <div class="panel-body">After Completion of Payment, you will receive an email confirmation
                                that you have purchased the selected Chapter. Our representative will also get in touch
                                with you once your purchase is confirmed.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse10">
                                    <span class="acc_mdata">Can I watch the video lectures on mobile phones & tablets?


                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse10" class="panel-collapse collapse">
                            <div class="panel-body">Yes, you can watch the video lectures on Mobile phones && tablets.


                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse11">
                                    <span class="acc_mdata">When I purchased the CMA chapter classes, they didn't ask
                                        for my address, how will they deliver it to me?

                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse11" class="panel-collapse collapse">
                            <div class="panel-body">Our Internal Team will get in touch with you once your order is
                                placed and take down relevant details to deliver your order.

                            </div>
                        </div>
                    </div>




                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse12">
                                    <span class="acc_mdata">Will we get a refund in case there is some issue with our
                                        CMA chapter?
                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse12" class="panel-collapse collapse">
                            <div class="panel-body">No, you will not get any refund for our CMA courses. Incase its a
                                technical issue, we will help you resolve it.

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse13">
                                    <span class="acc_mdata">Can I have a demo before I decide to purchase Classes?
                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse13" class="panel-collapse collapse">
                            <div class="panel-body">Most of the faculty listed with us are renowned faculty in the CMA
                                field. You can find their demo classes on Youtube and on our website on the faculty
                                profile page.

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse14">
                                    <span class="acc_mdata">Is there any software we need to install to access pendrive
                                        data, to watch video?

                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse14" class="panel-collapse collapse">
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
    $("#select_to_buy").click(function() {
        $('html, body').animate({
            scrollTop: $("#crash_course").offset().top
        }, 800);
    });

    $("#buy_jump").click(function() {
        $('html, body').animate({
            scrollTop: $("#crash_course").offset().top
        }, 800);
    });

    $("#mobile_cart").click(function() {
        $('html, body').animate({
            scrollTop: $("#mobile_cart_pane").offset().top
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

        $(".dynamic").change(function() {
            if ($(this).val() != '') {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data("dependent");
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('chapterprice.fetch') }}",
                    method: "POST",
                    data: {
                        select: select,
                        value: value,
                        _token: _token,
                        dependent: dependent
                    },
                    success: function(result) {
                        $('#' + dependent).html(result);

                        var value = $(".dynamic-list").val();
                        dynamicChapter('subject_id', value, 'chapter_id');
                    }
                })
            }
        });

        $(".dynamic-list").change(function() {
            if ($(this).val() != '') {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data("dependent");
                var _token = $('input[name="_token"]').val();

                dynamicChapter(select, value, dependent);
            }
        });

        function dynamicChapter(select, value, dependent) {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('chapterprice.fetch_chapters') }}",
                method: "POST",
                data: {
                    select: select,
                    value: value,
                    _token: _token,
                    dependent: dependent
                },
                success: function(result) {
                    var res = $.parseJSON(result);
                    var strDetail = ``;
                    $.each(res, function(key, item) {
                        let keyVal = key;
                        strDetail += `<tr>
                                        <td><span class="moblie_crash">Name of Chapter</span><span id="name_${keyVal}">${item.name}</span> </td>
                                        <input type="hidden" name="chap_id" id="chap_id_${keyVal}" value="${item.id}">
                                        <td class="tec_select"><span class="moblie_crash">Faculty</span>
                                        <select class="form-control combo_faculty_id" id="faculty_${keyVal}" name="faculty">
                                        <option selected hidden value="">Select Faculty</option>`;
                        $.each(item.chapter_faculty, function(key, item) {
                            strDetail +=
                                `<option value="${item.user_id}">${item.user.name}</option>`
                        });
                        strDetail += `</select>
                                        </td>`;
                        $.each(item.chapter_price, function(key, item) {
                            strDetail +=
                                `
                                        <td class="amount_caps"><span class="moblie_crash">Amount</span> <span
                                                class="multi_rateer"><span class="origin_price"><i class="fa fa-inr"
                                                        aria-hidden="true"></i><span id="amount_${keyVal}">${item.discounted_amount}</span></span><span class="striked_rate"><i
                                                        class="fa fa-inr" aria-hidden="true"></i>${item.original_amount}</span></span></td>`;
                        });

                        strDetail += `<td class="action_buy chek_mate_div">
                                            <div class="form-check btn btn-primary wrap_chekk" id="buy_chapterr">
                                                <label class="form-check-label" for="add_${keyVal}">Add</label>
                                                <input type="checkbox" class="form-check-input" id="add_${keyVal}" name="add">
                                            </div>
                                        </td></tr>`;
                    });
                    $('#' + dependent).html(strDetail);

                    $('input[type=checkbox]').change(function() {
                        let listDetail = ``;
                        let total = 0;
                        let ch_id = [];
                        let ch_faculty = [];
                        let ch_amount = [];
                        let len = 0;

                        $('input:checkbox[name=add]:checked').each(function() {
                            $(this).parent().addClass("full_activated");
                            
                            var str = $(this).attr('id');
                            var add_id = str.split('_');
                            var name = $('#name_' + add_id[1]).html();
                            var id = $('#chap_id_' + add_id[1]).val();
                            var faculty_id = $('#faculty_' + add_id[1]).find('option:selected').val();
                            var faculty = $('#faculty_' + add_id[1]).find('option:selected').text();
                            var amount = $('#amount_' + add_id[1]).html();

                            if (faculty_id != "") {
                                len += 1;
                                $('.floating_carten').find('.number').html(len);
                                ch_id.push(id);
                                ch_faculty.push(faculty_id);
                                ch_amount.push(amount);
                                total += Number(amount);
                                listDetail += `<li id="cart_listing_${add_id[1]}"><div class="cart_listing">
                                        <div class="product_infos">
                                            <h3>${name} <span>by <b id="fac_name_${add_id[1]}">${faculty}</b></span></h3>
                                            <span class="pricing_cart">₹ ${amount}</span>
                                        </div>
                                    </div></li>`;

                                $('#faculty_' + add_id[1]).change(function() {
                                    var faculty = $(this).find('option:selected').text();
                                    $('#cart_listing_' + add_id[1]).find('#fac_name_' + add_id[1]).html(faculty);
                                    let chap_faculty = [];
                                    $('input:checkbox[name=add]:checked').each(function() {
                                        var str = $(this).attr('id');
                                        var add_id = str.split('_');
                                        var faculty_id = $('#faculty_' + add_id[1]).find('option:selected').val();
                                        chap_faculty.push(faculty_id);
                                        $('#teacher_id').val(chap_faculty);
                                    });
                                });
                            } else {
                                $('#add_' + add_id[1]).prop('checked', false);
                                alert("Please select faculty.");
                            }
                        });

                        $('input:checkbox[name=add]:not(:checked)').each(function() {
                            $(this).parent().removeClass("full_activated");
                        });

                        if ($('input:checkbox[name=add]:checked').length != '') {
                            var subj = $('#subject_id').val();
                            var group = $('#course_level_id').val();
                            listDetail += `<li class="range_camount">
                                    <h4>Total: <span>₹ ${total}</span></h4>
                                </li>

                                <form action="/pay-now" method="POST" id="chapter_form">
                                    @csrf
                                    <input type="hidden" class="form-control input-small pull-left mrg-right15"
                                            name="group" value="${group}" required>
                                    <input type="hidden" class="form-control input-small pull-left mrg-right15"
                                            name="paper_id" value="${subj}" required>
                                    <input type="hidden" class="form-control input-small pull-left mrg-right15"
                                            name="chapter_id" value="${ch_id}" required>
                                    <input type="hidden" class="form-control input-small pull-left mrg-right15"
                                            name="teacher_id" id="teacher_id" value="${ch_faculty}" required>
                                    <input type="hidden" class="form-control input-small pull-left mrg-right15"
                                            name="chapter_price" value="${ch_amount}" required>
                                    <input type="hidden" class="form-control input-small pull-left mrg-right15"
                                            name="price" value="${total}" required>
                                    <input type="hidden" class="form-control input-small pull-left mrg-right15"
                                            name="course_name" value="{{$segment}}" required>
                                    <input type="hidden" class="form-control input-small pull-left mrg-right15"
                                            name="product_type" value="Chapter" required>
                
                                <li class="buy_carttt">
                                    <button title="Buy Course" class="btn btn-primary" type="submit"> Buy
                                    </button>
                                </li>
                                </form>`;

                            $("#listing").html(listDetail);
                        } else {
                            $('.floating_carten').find('.number').html(len);
                            listDetail += `<li class="blank_c_carts">
                            <span><i class="fa fa-cart-plus" aria-hidden="true"></i></span>
                                    <h4>Select Chapters Now</h4>
                                        </li>`;
                            $("#listing").html(listDetail);
                        }
                    });
                }
            });
        }

        $(".dynamic").trigger('change');
        $(".dynamic-list").trigger('change');

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
<script src="{{ asset('js/jssocials.min.js') }}"></script>
<script>
    $("#share").jsSocials({
        showLabel: false,
        showCount: false,
        shareUrl: "https://toplad.in/cma/cma-chapter-sale",
        shareIn: "popup",
        title: true,
        media: true,

        shares: [
            "email",
            {
                share: "twitter",
                url: "https://toplad.in/cma/cma-chapter-sale",
                text: "CMA Chapter Sale | June/December 2022 Exam"
            },
            {
                share: "facebook",
                url: "https://toplad.in/cma/cma-chapter-sale",
                text: "CMA Chapter Sale | June/December 2022 Exam"
            },
            {
                share: "pinterest",
                url: "https://toplad.in/cma/cma-chapter-sale",
                media: "https://toplad.in/images/chapter-wise-sale.png",
                text: "CMA Chapter Sale | June/December 2022 Exam"
            },
            {
                share: "whatsapp",
                text: "CMA Chapter Sale | June/December 2022 Exam",
                url: "https://toplad.in/cma/cma-chapter-sale",
            },
        ]
    });
    $("#social_share").jsSocials({
        showLabel: true,
        showCount: false,
        shareUrl: "https://toplad.in/cma/cma-chapter-sale",
        shareIn: "popup",
        shares: [
            "email",
            {
                share: "twitter",
                url: "https://toplad.in/cma/cma-chapter-sale",
                text: "CMA Chapter Sale | June/December 2022 Exam"
            },
            {
                share: "facebook",
                url: "https://toplad.in/cma/cma-chapter-sale",
                text: "CMA Chapter Sale | June/December 2022 Exam"
            },
            {
                share: "pinterest",
                url: "https://toplad.in/cma/cma-chapter-sale",
                media: "https://toplad.in/images/chapter-wise-sale.png",
                text: "CMA Chapter Sale | June/December 2022 Exam"
            },
            {
                share: "whatsapp",
                text: "CMA Chapter Sale | June/December 2022 Exam",
                url: "https://toplad.in/cma/cma-chapter-sale",
            },
        ]
    });
</script>
@endpush