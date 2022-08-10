@extends('layouts.layout')
<!-- <link rel="stylesheet" href="{{ asset('css/jssocials.css') }}">
<link rel="stylesheet" href="{{ asset('css/jssocials-theme-flat.css') }}"> -->

@prepend('head-data')

<title>Scholarship | CMA | CS | CA | Faculty | Toplad</title>
<meta name="description"
    content="India's Top CMA, CS & CA Faculty. We are dedicated to making it possible for anyone, anywhere, at any time to study CMA, CS and CA. Join Us Now." />
<meta name="keywords"
    content="CMA, CS, CA, CMA courses online, CS courses online, CA courses online, CMA Foundation to Final, CA Foundation to Final, Top CMA Faculty of India, Top CS Faculty of India, Top CA Faculty of India, Academy of Excellence, CMA in Future, CS in Future, CA in Future, CMA Books, CS Books, CA Books, Online CMA Classes, Online CS Classes, Online CA Classes" />
@endprepend

@section('content')
<div class="inner_theme_page">
    <nav aria-label="breadcrumb" class="bdcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li title="Scholarship" class="breadcrumb-item active" aria-current="page">Scholarship</li>
            </ol>
        </div>
    </nav>
    <div class=" fixed_cap_share cap_psharess">
        <div id="share"></div>
    </div>
    <section class="ftco-section scolar_page">
        <div class="sclr_topeer top_sclr_barr">
            <div class="container">
                <div class="row">
                    <div class="ftco-animate left_pane col-md-7">
                        <div class="page_head">
                            <h1 class="pt-0 f-34"><b>TOPLAD SCHOLARSHIP FOR CMA, CS AND CA STUDENTS</b>
                            </h1>
                            <p class="text-justify">Toplad is always with you. We are here to assist you in
                                every walk of
                                your life. Be it education, career building, life skills, we are with you always.</p>
                            <p class="text-justify">We know, you are determined towards goal of becoming CMA, CS and CA
                                and we want
                                nothing
                                should stop you from achieving this goal. You would agree that Marks Matter but many a
                                times Money matters as well. So, Here, we present a small gift from Toplad for
                                all our beloved students. </p>
                            <p class="text-justify">Toplad is launching Scholarship Schemes based on different
                                parameters. We
                                have Merit Based Scholarship, Need Based Scholarship and Lucky draw based Scholarship.
                            </p>
                            <p class="text-justify">We welcome you all to come forward and grab this never before
                                opportunity, only
                                at Toplad. </p>
                            <a class="btn button common_btn_now" id="get_scollar">Get Scholarship Now</a>
                        </div>
                    </div>
                    <div class="right_pane col-md-5">
                        <div class="about_imgs">
                            <img class="img-fluid" src="{{  asset('images/scholars.png') }}" alt="Education">
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="content_boxxe sclr_only_contents">
            <div class="container">
                <div class="wrap_content_boxxee">
                    <div class="sclr_contents">
                        <h3 class="common_titles">OUR OBJECTIVES OF PROVIDING CMA, CS AND CA Scholarship </h3>
                        <div class="wrap_cboxxe flex_view_sclr">
                            <!-- <p>Top CMA Faculty of india are here to provide you:</p> -->
                            <ul>
                                <li>
                                    <!-- <span class="only_liicon"><i class="fa fa-circle-o" aria-hidden="true"></i></span> -->
                                    <span class="bg_checker objectives_checker"><img class="bullet_img"
                                            src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                            class="fa fa-check" aria-hidden="true"></i></span>
                                    <span class="only_contents text-justify">Our Primary motto is to ensure hassle free
                                        studies for
                                        students without caring for their financial difficulties.
                                    </span>
                                </li>
                                <li>
                                    <span class="bg_checker objectives_checker"><img class="bullet_img"
                                            src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                            class="fa fa-check" aria-hidden="true"></i></span>
                                    <span class="only_contents text-justify">It will provide the opportunity to focus
                                        primarily on
                                        their career building rather than managing finances.
                                    </span>
                                </li>
                                <li>
                                    <span class="bg_checker objectives_checker"><img class="bullet_img"
                                            src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                            class="fa fa-check" aria-hidden="true"></i></span>
                                    <span class="only_contents text-justify">It will also be a reward for students who
                                        have performed
                                        well in qualifying exams, this will boost up their morale for consistent good
                                        performance.
                                    </span>
                                </li>
                                <li>
                                    <span class="bg_checker objectives_checker"><img class="bullet_img"
                                            src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                            class="fa fa-check" aria-hidden="true"></i></span>
                                    <span class="only_contents text-justify">It will create healthy competition among
                                        students which
                                        will give them an opportunity to gain confidence and show their calibre.
                                    </span>
                                </li>
                                <li>
                                    <span class="bg_checker objectives_checker"><img class="bullet_img"
                                            src="{{ asset('images/icon/checkmark.svg') }}" alt="Bullet Image"><i
                                            class="fa fa-check" aria-hidden="true"></i></span>
                                    <span class="only_contents text-justify">It will provide access to education to all
                                        deserving
                                        candidates and will help them in achieving their aspirations.
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="sclr_media col-md-5">

                      
                    </div> -->
                </div>
            </div>

        </div>

        <div class="rules_info">
            <div class="container">
                <h3>Who Can Apply & How it works</h3>
                <p class="text-justify">All high school and college students, as well as anyone looking to pursue CMA,
                    CS and CA in
                    the next year.</p>
                <div class="rules_btnn"><a data-toggle="modal" data-target="#eligibility-criteria"
                        class="btn button common_btn_now">Scholarship Eligibility Criteria</a></div>
            </div>
            <div class="" id="scholarship_form">

            </div>
        </div>

        <div class="sclr_topeer claimer_forrms">
            <div class="container">
                <div class="page_head">
                    <h1 class="pt-0 f-34 text-center">CLAIM YOUR <b>Scholarship</b> NOW
                    </h1>
                    <p class="claim_msgss text-justify">Kindly fill the required details in order to Claim your
                        Scholarship. You are
                        just few steps away from getting a Grand Scholarship. Be a patron of Toplad and get
                        benefited in every next step.</p>
                    <div class="get_sclr_now">
                        <form action="/scholarship" class="submit_sclr_form" method="POST" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="inner_sclr">
                                <div class="form-group sclr_groups col-md-6">
                                    <label>Full Name <span class="asterisk"></span></label>
                                    <input type="text" placeholder="Enter your Full Name"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}">
                                    @error('name')
                                    <p class="error_result" style="color:red">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group sclr_groups col-md-6">
                                    <label>Email <span class="asterisk"></span></label>
                                    <input type="text" placeholder="Enter your Email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}">
                                    @error('email')
                                    <p class="error_result" style="color:red">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group sclr_groups col-md-6">
                                    <label>Mobile Number <span class="asterisk"></span></label>
                                    <input type="text" placeholder="Enter your Number"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}">
                                    @error('phone')
                                    <p class="error_result" style="color:red">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group sclr_groups col-md-6">
                                    <label for="course_type">Course <span class="asterisk"></span></label>
                                    <select class="form-control @error('course_type') is-invalid @enderror"
                                        name="course_type" id="course_type" value="{{ old('course_type') }}">
                                        <option value="">Select Course</option>
                                        @foreach($data as $course)
                                        <option value="{{$course['id']}}" <?php {{
                                                                                    echo old('course_type') == $course['id'] ? 'selected' : '';
                                                                                }} ?>>
                                            {{$course['name']}}</option>
                                        @endforeach
                                    </select>
                                    @error('course_type')
                                    <p class="error_result" style="color:red">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group sclr_groups col-md-6">
                                    <label>Combo <span class="asterisk"></span></label>
                                    <select class="form-control @error('combo_type') is-invalid @enderror"
                                        name="combo_type" id="combo_type" value="{{ old('combo_type') }}">
                                        <option value="">Select Combo</option>
                                    </select>
                                    @error('combo_type')
                                    <p class="error_result" style="color:red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <hr class="gap_divider_sclr">
                            <div class="wrap_minsclr">
                                <h4>Course Qualified before Current Course<span class="label_explain">
                                        <!-- <a class="tooltip_sclrr" href="JavaScript:Void(0);" data-toggle="tooltip"
                                            data-placement="top" title="Tooltip to explain input fields."><i
                                                class="fa fa-info-circle" aria-hidden="true"></i></a> -->
                                    </span></h4>
                                <div class="inner_sclr">
                                    <div class="form-group sclr_groups col-md-3">
                                        <label>Qualifying Course <span class="asterisk"></span></label>
                                        <select class="form-control @error('course') is-invalid @enderror" name="course"
                                            id="course" value="{{ old('course') }}">
                                            <option value="">Select Qualifying Course</option>
                                        </select>
                                        @error('course')
                                        <p class="error_result" style="color:red">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group sclr_groups col-md-3">
                                        <label>Marks Obtained <span class="asterisk"></span></label>
                                        <input type="text" placeholder="Marks Obtained"
                                            class="form-control @error('marks') is-invalid @enderror" name="marks"
                                            id="marks" value="{{ old('marks') }}">
                                        @error('marks')
                                        <p class="error_result" style="color:red">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group sclr_groups col-md-3">
                                        <label>Max Marks <span class="asterisk"></span></label>
                                        <input type="text" placeholder="Max Marks of Qualifying Course"
                                            class="form-control @error('max_marks') is-invalid @enderror"
                                            name="max_marks" id="max_marks" value="{{ old('max_marks') }}">
                                        @error('max_marks')
                                        <p class="error_result" style="color:red">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group sclr_groups col-md-3">
                                        <label>Percentage(%) Obtained</lable>
                                            <input type="text" placeholder="Percentage"
                                                class="form-control @error('percentage') is-invalid @enderror"
                                                name="percentage" id="percentage" value="{{ old('percentage') }}"
                                                readonly="">
                                            @error('percentage')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                    </div>
                                    <!-- </div>
                            </div>
                            <div class="wrap_minsclr">

                                <div class="inner_sclr"> -->
                                    <div class="form-group sclr_groups col-md-4">
                                        <label>Registration Number <span class="asterisk"></span></label>
                                        <input type="text" placeholder="Registration Number of CMA, CS or CA Course"
                                            class="form-control @error('registration_no') is-invalid @enderror"
                                            name="registration_no" value="{{ old('registration_no') }}">
                                        @error('registration_no')
                                        <p class="error_result" style="color:red">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group sclr_groups col-md-4">
                                        <label>Roll Number <span class="asterisk"></span><span class="label_explain">
                                                <!-- <div class="tooltip">
                                                    <span class="tooltiptext">This is tooltip to show information about
                                                        particular input fields. </span>
                                                </div> -->
                                                <!-- <a class="tooltip_sclrr" href="JavaScript:Void(0);"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="Tooltip to explain input fields."><i
                                                        class="fa fa-info-circle" aria-hidden="true"></i></a> -->
                                            </span></label>
                                        <input type="text" placeholder="Roll Number"
                                            class="form-control @error('roll_no') is-invalid @enderror" name="roll_no"
                                            value="{{ old('roll_no') }}">
                                        @error('roll_no')
                                        <p class="error_result" style="color:red">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group sclr_groups col-md-4">
                                        <label>Date of Clearing Qualifying Exam <span class="asterisk"></span><span
                                                class="label_explain">
                                                <!-- <a class="tooltip_sclrr" href="JavaScript:Void(0);"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="Tooltip to explain input fields."><i
                                                        class="fa fa-info-circle" aria-hidden="true"></i></a> -->
                                            </span></label>
                                        <input type="date" placeholder="Date of Clearing Qualifying Exam"
                                            class="form-control @error('date') is-invalid @enderror" id="datePickerId"
                                            name="date" value="{{ old('date') }}">
                                        @error('date')
                                        <p class="error_result" style="color:red">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group sclr_groups col-md-4">
                                        <label>Upload ID Proof with Address <span class="asterisk"></span><span
                                                class="label_explain">
                                                <!-- <a class="tooltip_sclrr" href="JavaScript:Void(0);"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="Tooltip to explain input fields."><i
                                                        class="fa fa-info-circle" aria-hidden="true"></i></a> -->
                                            </span></label>
                                        <div class="custom-file">
                                            <input type="file"
                                                class="custom-file-input form-control @error('id_proof') is-invalid @enderror"
                                                id="id_proof" name="id_proof">
                                            <label class="custom-file-label" for="id_proof">Choose file</label>
                                        </div>
                                        @error('id_proof')
                                        <p class="error_result" style="color:red">{{$message}}</p>
                                        @enderror
                                        <span class="file_note filetext_update">Only png, jpeg, jpg and pdf file
                                            allowed. Maximum file size 2 MB allowed.</span>
                                    </div>
                                    <div class="form-group sclr_groups col-md-4">
                                        <label>Upload Marksheet <span class="asterisk"></span><span
                                                class="label_explain">
                                                <!-- <a class="tooltip_sclrr" href="JavaScript:Void(0);"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="Tooltip to explain input fields."><i
                                                        class="fa fa-info-circle" aria-hidden="true"></i></a> -->
                                            </span></label>
                                        <div class="custom-file">
                                            <input type="file"
                                                class="custom-file-input form-control @error('marksheet') is-invalid @enderror"
                                                id="marksheet" name="marksheet">
                                            <label class="custom-file-label" for="marksheet">Choose file</label>
                                        </div>
                                        @error('marksheet')
                                        <p class="error_result" style="color:red">{{$message}}</p>
                                        @enderror
                                        <span class="file_note filetext_update">Only png, jpeg, jpg and pdf file
                                            allowed. Maximum file size 2 MB allowed.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group scl_subber col-md-12">
                                <input type="submit" value="Submit" class="btn btn-primary action_btn_sclrr">
                            </div>
                        </form>
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
                                    <span class="acc_mdata">What is Scholarship?
                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse show">
                            <div class="panel-body">A Scholarship is financial support awarded to a student, based on
                                academic achievement or other criteria that may include financial need.

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse2">
                                    <span class="acc_mdata">How can I apply online for Scholarship?
                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">You may visit Website URL : <a class="link_share_reach"
                                    href="/scholarship">toplad.in/scholarship</a></div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse3">
                                    <span class="acc_mdata">What is the fee structure for Scholarship?</span><i
                                        class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">There is a one time fee of ₹99 for registering for the scholarship.
                                This also helps us making sure that only genuine people will apply for the scholarship.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse4">
                                    <span class="acc_mdata">How many times I can enroll for Scholarship?

                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse4" class="panel-collapse collapse">
                            <div class="panel-body">You can enroll once a year for Scholarship. </div>
                        </div>
                    </div>



                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse5">
                                    <span class="acc_mdata">Can I edit the information already saved and up-to what
                                        time?
                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse5" class="panel-collapse collapse">
                            <div class="panel-body">All the information can be edited till the closure of application
                                form. After final submission, your application will be forwarded to the next level and
                                application hereby cannot be edited.</div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse6">
                                    <span class="acc_mdata">How I will get know that I received Scholarship?
                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse6" class="panel-collapse collapse">
                            <div class="panel-body">You will receive an e-mail that you are selected for Scholarship.
                                Our
                                representative will also get in touch with you.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse7">
                                    <span class="acc_mdata">How does the Scholarship provider choose a winner?

                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse7" class="panel-collapse collapse">
                            <div class="panel-body">Each Scholarship provider is looking for different skills or
                                interests. A winner must meet all of the standard criteria required for the Scholarship.
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionFAQ" href="#collapse8">
                                    <span class="acc_mdata">Where do I connect in case I have more queries or question?


                                    </span><i class="fa fa-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapse8" class="panel-collapse collapse">
                            <div class="panel-body">You can share your valuable feedback on Email id - <a
                                    class="link_share_reach"
                                    href="mailto:info@toplad.in">info@toplad.in</a>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>



        <!-- View Teacher Details Modal -->
        <div id="eligibility-criteria" class="modal fade common_model ra_common_modals" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Scholarship Eligibility Criteria</h4> <button type="button"
                            class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <!-- <hr class="ov_devider"> -->
                        <div class="ov_main_wrap">
                            <div class="col-md-12 left_order common_order">
                                <div class="vo_section">
                                    <h3>Criteria to Claim Scholarship</h3>
                                    <div class="col-md-12 sec_colls add_vertical">
                                        <div class="schlr_mod_data">
                                            <ul>
                                                <li><span class="bg_checker sclr_mode_check"><img class="bullet_img"
                                                            src="{{ asset('images/icon/checkmark.svg') }}"
                                                            alt="Bullet Image"><i class="fa fa-check"
                                                            aria-hidden="true"></i></span>
                                                    <p>Student must have cleared qualifying exam with minimum specified
                                                        percentage as
                                                        specified by Toplad. </p>
                                                </li>
                                                <li><span class="bg_checker sclr_mode_check"><img class="bullet_img"
                                                            src="{{ asset('images/icon/checkmark.svg') }}"
                                                            alt="Bullet Image"><i class="fa fa-check"
                                                            aria-hidden="true"></i></span>
                                                    <p>All Students falling in a particular Scholarship eligibility slab
                                                        shall be given the same rate
                                                        of Scholarship. </p>
                                                </li>
                                                <li><span class="bg_checker sclr_mode_check"><img class="bullet_img"
                                                            src="{{ asset('images/icon/checkmark.svg') }}"
                                                            alt="Bullet Image"><i class="fa fa-check"
                                                            aria-hidden="true"></i></span>
                                                    <p>Scholarship based on merit requires submission of necessary
                                                        documents as evidence. It
                                                        includes, Valid ID Proof, Valid Address Proof, CMA, CS and CA
                                                        Registration
                                                        Number, Marksheet of
                                                        qualifying Exam.</p>
                                                </li>
                                                <li><span class="bg_checker sclr_mode_check"><img class="bullet_img"
                                                            src="{{ asset('images/icon/checkmark.svg') }}"
                                                            alt="Bullet Image"><i class="fa fa-check"
                                                            aria-hidden="true"></i></span>
                                                    <p>Students are required to buy complete combo of a particular CMA,
                                                        CS and CA
                                                        Level
                                                        (Foundation/Inter/Final), in order to avail Scholarship.</p>
                                                </li>
                                                <li><span class="bg_checker sclr_mode_check"><img class="bullet_img"
                                                            src="{{ asset('images/icon/checkmark.svg') }}"
                                                            alt="Bullet Image"><i class="fa fa-check"
                                                            aria-hidden="true"></i></span>
                                                    <p>Scholarship is based on First Come First Served basis for first
                                                        1000 students. </p>
                                                </li>
                                                <li><span class="bg_checker sclr_mode_check"><img class="bullet_img"
                                                            src="{{ asset('images/icon/checkmark.svg') }}"
                                                            alt="Bullet Image"><i class="fa fa-check"
                                                            aria-hidden="true"></i></span>
                                                    <p>After reaching a limit of 1000 students, next 100 Scholarships
                                                        will be finalized on the
                                                        basis of an ONLINE LUCKY DRAW, to be conducted by Toplad, taking an
                                                        aggregate of all students who have applied for Scholarship,
                                                        including all levels from
                                                        Foundation to Final. </p>
                                                </li>


                                                <li><span class="bg_checker sclr_mode_check"><img class="bullet_img"
                                                            src="{{ asset('images/icon/checkmark.svg') }}"
                                                            alt="Bullet Image"><i class="fa fa-check"
                                                            aria-hidden="true"></i></span>
                                                    <p>A student can fill the application form only once. </p>
                                                </li>
                                                <li><span class="bg_checker sclr_mode_check"><img class="bullet_img"
                                                            src="{{ asset('images/icon/checkmark.svg') }}"
                                                            alt="Bullet Image"><i class="fa fa-check"
                                                            aria-hidden="true"></i></span>
                                                    <p>A student can apply for Scholarship to purchase only 1 course
                                                        combo, in which he is
                                                        currently studying. </p>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>


                                <div class="vo_section">
                                    <h3>Qualifying Course to Claim Scholarship </h3>
                                    <div class="col-md-12 sec_colls add_vertical">
                                        <div class="schlr_mod_data">
                                            <div class="table-responsive shadow_table">
                                                <table id="" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Course to be purchased</th>
                                                            <th>Qualifying Course </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="">
                                                            <td><span class="moblie_crash">Course to be purchased:
                                                                </span> CMA
                                                                Foundation </td>
                                                            <td><span class="moblie_crash">Qualifying Course: </span>
                                                                XII </td>
                                                        </tr>
                                                        <tr class="">
                                                            <td><span class="moblie_crash">Course to be purchased:
                                                                </span> CMA Inter
                                                                Group 1 </td>
                                                            <td><span class="moblie_crash">Qualifying Course: </span>
                                                                CMA
                                                                Foundation/Graduation</td>
                                                        </tr>

                                                        <tr class="">
                                                            <td><span class="moblie_crash">Course to be purchased:
                                                                </span> CMA Inter
                                                                Group 2 </td>
                                                            <td><span class="moblie_crash">Qualifying Course: </span>
                                                                CMA
                                                                Foundation/Graduation</td>
                                                        </tr>

                                                        <tr class="">
                                                            <td><span class="moblie_crash">Course to be purchased:
                                                                </span> CMA Inter
                                                                Group 1 & 2 Combined </td>
                                                            <td><span class="moblie_crash">Qualifying Course: </span>
                                                                CMA
                                                                Foundation/Graduation</td>
                                                        </tr>

                                                        <tr class="">
                                                            <td><span class="moblie_crash">Course to be purchased:
                                                                </span> CMA Final
                                                                Group 3 </td>
                                                            <td><span class="moblie_crash">Qualifying Course: </span>
                                                                CMA Inter
                                                            </td>
                                                        </tr>

                                                        <tr class="">
                                                            <td><span class="moblie_crash">Course to be purchased:
                                                                </span> CMA Final
                                                                Group 4 </td>
                                                            <td><span class="moblie_crash">Qualifying Course: </span>
                                                                CMA Inter
                                                            </td>
                                                        </tr>

                                                        <tr class="">
                                                            <td><span class="moblie_crash">Course to be purchased:
                                                                </span> CMA Final
                                                                Group 3 & 4 Combined </td>
                                                            <td><span class="moblie_crash">Qualifying Course: </span>
                                                                CMA Inter
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vo_section slabbs_info">
                                    <h3>Slab of Scholarship for Admission to CMA Foundation </h3>
                                    <div class="col-md-12 sec_colls add_vertical">
                                        <div class="schlr_mod_data">
                                            <div class="table-responsive shadow_table">
                                                <table id="" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Course to be purchased</th>
                                                            <th>Marks attained in Qualifying Course</th>
                                                            <th>Scholarship Discount % for to the course to be purchased
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="">
                                                            <td class="min_title_schip" rowspan="4"><span
                                                                    class="moblie_crash">Course to be purchased: </span>
                                                                CMA Foundation</td>
                                                            <td><span class="moblie_crash">Marks attained in Qualifying
                                                                    Course: </span> 91-100% </td>
                                                            <td class="slab_highler"><span
                                                                    class="moblie_crash">Scholarship Discount Percentage
                                                                    for to the course to be purchased: </span> 50%</td>
                                                        </tr>
                                                        <tr class="">
                                                            <td><span class="moblie_crash">Marks attained in Qualifying
                                                                    Course: </span> 82-90% </td>
                                                            <td class="slab_highler"><span
                                                                    class="moblie_crash">Scholarship Discount Percentage
                                                                    for to the course to be purchased: </span> 40%
                                                            </td>
                                                        </tr>

                                                        <tr class="">
                                                            <td><span class="moblie_crash">Marks attained in Qualifying
                                                                    Course: </span> 71-80% </td>
                                                            <td class="slab_highler"><span
                                                                    class="moblie_crash">Scholarship Discount Percentage
                                                                    for to the course to be purchased: </span> 30%
                                                            </td>
                                                        </tr>
                                                        <tr class="">
                                                            <td><span class="moblie_crash">Marks attained in Qualifying
                                                                    Course: </span> 60-70% </td>
                                                            <td class="slab_highler"><span
                                                                    class="moblie_crash">Scholarship Discount Percentage
                                                                    for to the course to be purchased: </span> 20%
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="vo_section slabbs_info">
                                    <h3>Slab of Scholarship for Admission to CMA Inter Based on CMA Foundation </h3>
                                    <div class="col-md-12 sec_colls add_vertical">
                                        <div class="schlr_mod_data">
                                            <div class="table-responsive shadow_table">
                                                <table id="" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Course to be purchased</th>
                                                            <th>Marks attained in Qualifying Course</th>
                                                            <th>Scholarship Discount % for to the course to be purchased
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="">
                                                            <td class="min_title_schip" rowspan="4"><span
                                                                    class="moblie_crash">Course to be purchased: </span>
                                                                CMA Inter
                                                                After clearing Foundation</td>
                                                            <td><span class="moblie_crash">Marks attained in Qualifying
                                                                    Course: </span> 91-100% </td>
                                                            <td class="slab_highler"><span
                                                                    class="moblie_crash">Scholarship Discount Percentage
                                                                    for to the course to be purchased: </span> 60%</td>

                                                        </tr>
                                                        <tr class="">
                                                            <td><span class="moblie_crash">Marks attained in Qualifying
                                                                    Course: </span> 82-90% </td>
                                                            <td class="slab_highler"><span
                                                                    class="moblie_crash">Scholarship Discount Percentage
                                                                    for to the course to be purchased: </span> 50%
                                                            </td>
                                                        </tr>

                                                        <tr class="">
                                                            <td><span class="moblie_crash">Marks attained in Qualifying
                                                                    Course: </span> 71-80% </td>
                                                            <td class="slab_highler"><span
                                                                    class="moblie_crash">Scholarship Discount Percentage
                                                                    for to the course to be purchased: </span> 40%
                                                            </td>
                                                        </tr>
                                                        <tr class="">
                                                            <td><span class="moblie_crash">Marks attained in Qualifying
                                                                    Course: </span> 60-70% </td>
                                                            <td class="slab_highler"><span
                                                                    class="moblie_crash">Scholarship Discount Percentage
                                                                    for to the course to be purchased: </span> 30%
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="vo_section slabbs_info">
                                    <h3>Slab of Scholarship for Admission to CMA Inter Based on Graduation </h3>
                                    <div class="col-md-12 sec_colls add_vertical">
                                        <div class="schlr_mod_data">
                                            <div class="table-responsive shadow_table">
                                                <table id="" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Course to be purchased</th>
                                                            <th>Marks attained in Qualifying Course</th>
                                                            <th>Scholarship Discount % for to the course to be purchased
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="">
                                                            <td class="min_title_schip" rowspan="4"><span
                                                                    class="moblie_crash">Course to be purchased: </span>
                                                                CMA Inter
                                                                After clearing Graduation</td>
                                                            <td><span class="moblie_crash">Marks attained in Qualifying
                                                                    Course: </span> 91-100% </td>
                                                            <td class="slab_highler"><span
                                                                    class="moblie_crash">Scholarship Discount Percentage
                                                                    for to the course to be purchased: </span> 50%</td>

                                                        </tr>
                                                        <tr class="">
                                                            <td><span class="moblie_crash">Marks attained in Qualifying
                                                                    Course: </span> 82-90% </td>
                                                            <td class="slab_highler"><span
                                                                    class="moblie_crash">Scholarship Discount Percentage
                                                                    for to the course to be purchased: </span> 40%
                                                            </td>
                                                        </tr>

                                                        <tr class="">
                                                            <td><span class="moblie_crash">Marks attained in Qualifying
                                                                    Course: </span> 71-80% </td>
                                                            <td class="slab_highler"><span
                                                                    class="moblie_crash">Scholarship Discount Percentage
                                                                    for to the course to be purchased: </span> 30%
                                                            </td>
                                                        </tr>
                                                        <tr class="">
                                                            <td><span class="moblie_crash">Marks attained in Qualifying
                                                                    Course: </span> 60-70% </td>
                                                            <td class="slab_highler"><span
                                                                    class="moblie_crash">Scholarship Discount Percentage
                                                                    for to the course to be purchased: </span> 20%
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="vo_section slabbs_info">
                                    <h3>Slab of Scholarship for Admission to CMA Final </h3>
                                    <div class="col-md-12 sec_colls add_vertical">
                                        <div class="schlr_mod_data">
                                            <div class="table-responsive shadow_table">
                                                <table id="" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Course to be purchased</th>
                                                            <th>Marks attained in Qualifying Course</th>
                                                            <th>Scholarship Discount % for to the course to be purchased
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="">
                                                            <td class="min_title_schip" rowspan="4"><span
                                                                    class="moblie_crash">Course to be purchased: </span>
                                                                CMA Final</td>
                                                            <td><span class="moblie_crash">Marks attained in Qualifying
                                                                    Course: </span> 91-100% </td>
                                                            <td class="slab_highler"><span
                                                                    class="moblie_crash">Scholarship Discount Percentage
                                                                    for to the course to be purchased: </span> 50%</td>

                                                        </tr>
                                                        <tr class="">
                                                            <td><span class="moblie_crash">Marks attained in Qualifying
                                                                    Course: </span> 82-90% </td>
                                                            <td class="slab_highler"><span
                                                                    class="moblie_crash">Scholarship Discount Percentage
                                                                    for to the course to be purchased: </span> 40%
                                                            </td>
                                                        </tr>

                                                        <tr class="">
                                                            <td><span class="moblie_crash">Marks attained in Qualifying
                                                                    Course: </span> 71-80% </td>
                                                            <td class="slab_highler"><span
                                                                    class="moblie_crash">Scholarship Discount Percentage
                                                                    for to the course to be purchased: </span> 30%
                                                            </td>
                                                        </tr>
                                                        <tr class="">
                                                            <td><span class="moblie_crash">Marks attained in Qualifying
                                                                    Course: </span> 60-70% </td>
                                                            <td class="slab_highler"><span
                                                                    class="moblie_crash">Scholarship Discount Percentage
                                                                    for to the course to be purchased: </span> 20%
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer dual_model_btn">
                        <button type="submit" class="btn btn-primary f-size" style="visibility: hidden;">Download
                            Invoice</button>
                        <button type="button" class="btn btn-primary f-size" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/jssocials.min.js') }}"></script>

<script>
var marks;
var max_marks;

function calculatePercent(marks, max_marks) {
    var percentage = (marks / max_marks) * 100;
    percentage = percentage.toFixed(2);
    if (isNaN(percentage) || percentage == 'Infinity') {
        percentage = '';
    }
    $('#percentage').val(percentage);
}

var combo_series = [{
        val: '1',
        id: '1',
        combo: 'CMA Foundation'
    },
    {
        val: '1',
        id: '2',
        combo: 'CMA Inter Group 1'
    },
    {
        val: '1',
        id: '3',
        combo: 'CMA Inter Group 2'
    },
    {
        val: '1',
        id: '4',
        combo: 'CMA Inter Group 1 and Group 2 combined'
    },
    {
        val: '1',
        id: '5',
        combo: 'CMA Final Group 3'
    },
    {
        val: '1',
        id: '6',
        combo: 'CMA Final Group 4'
    },
    {
        val: '1',
        id: '7',
        combo: 'CMA Final Group 3 and Group 4 combined'
    },
    {
        val: '3',
        id: '8',
        combo: 'CSEET'
    },
    {
        val: '3',
        id: '9',
        combo: 'CS Executive Mode-1'
    },
    {
        val: '3',
        id: '10',
        combo: 'CS Executive Mode-2'
    },
    {
        val: '3',
        id: '11',
        combo: 'CS Executive Mode-1 and Mode-2 combined'
    },
    {
        val: '3',
        id: '12',
        combo: 'CS Professional Mode-1'
    },
    {
        val: '3',
        id: '13',
        combo: 'CS Professional Mode-2'
    },
    {
        val: '3',
        id: '14',
        combo: 'CS Professional Mode-3'
    },
    {
        val: '3',
        id: '15',
        combo: 'CS Professional Mode-1,Mode-2 and Mode-3 combined'
    },
    {
        val: '2',
        id: '16',
        combo: 'CA Foundation'
    },
    {
        val: '2',
        id: '17',
        combo: 'CA Inter Group 1'
    },
    {
        val: '2',
        id: '18',
        combo: 'CA Inter Group 2'
    },
    {
        val: '2',
        id: '19',
        combo: 'CA Inter Group 1 and Group 2 combined'
    },
    {
        val: '2',
        id: '20',
        combo: 'CA Final Group 1'
    },
    {
        val: '2',
        id: '21',
        combo: 'CA Final Group 2'
    },
    {
        val: '2',
        id: '22',
        combo: 'CA Final Group 1 and Group 2 combined'
    }
]

var series = [{
        val: '1',
        course: 'XII'
    },
    {
        val: '2',
        course: 'CMA Foundation'
    },
    {
        val: '2',
        course: 'Graduation'
    },
    {
        val: '3',
        course: 'CMA Foundation'
    },
    {
        val: '3',
        course: 'Graduation'
    },
    {
        val: '4',
        course: 'CMA Foundation'
    },
    {
        val: '4',
        course: 'Graduation'
    },
    {
        val: '5',
        course: 'CMA Inter'
    },
    {
        val: '6',
        course: 'CMA Inter'
    },
    {
        val: '7',
        course: 'CMA Inter'
    },
    {
        val: '8',
        course: 'XII'
    },
    {
        val: '9',
        course: 'CSEET'
    },
    {
        val: '9',
        course: 'Graduation'
    },
    {
        val: '10',
        course: 'CSEET'
    },
    {
        val: '10',
        course: 'Graduation'
    },
    {
        val: '11',
        course: 'CSEET'
    },
    {
        val: '11',
        course: 'Graduation'
    },
    {
        val: '12',
        course: 'CS Executive'
    },
    {
        val: '13',
        course: 'CS Executive'
    },
    {
        val: '14',
        course: 'CS Executive'
    },
    {
        val: '15',
        course: 'CS Executive'
    },
    {
        val: '16',
        course: 'XII'
    },
    {
        val: '17',
        course: 'CA Foundation'
    },
    {
        val: '17',
        course: 'Commerce Graduates/Post-Graduates (with minimum 55% marks)'
    },
    {
        val: '17',
        course: 'Other Graduates/Post-Graduates (with minimum 60% marks)'
    },
    {
        val: '18',
        course: 'CA Foundation'
    },
    {
        val: '18',
        course: 'Commerce Graduates/Post-Graduates (with minimum 55% marks)'
    },
    {
        val: '18',
        course: 'Other Graduates/Post-Graduates (with minimum 60% marks)'
    },
    {
        val: '19',
        course: 'CA Foundation'
    },
    {
        val: '19',
        course: 'Commerce Graduates/Post-Graduates (with minimum 55% marks)'
    },
    {
        val: '19',
        course: 'Other Graduates/Post-Graduates (with minimum 60% marks)'
    },
    {
        val: '20',
        course: 'CA Inter'
    },
    {
        val: '21',
        course: 'CA Inter'
    },
    {
        val: '22',
        course: 'CA Inter'
    }
]

$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
    datePickerId.max = new Date().toISOString().split("T")[0];

    const comboTypeOldValue = "{{ old('combo_type') }}";
    var courses = $('#course_type').val();

    if (comboTypeOldValue != '') {
        var options = `<option value="">Select Combo</option>`;
        $(combo_series).each(function(index, value) {
            if (value.val == courses) {
                options += '<option value="' + value.id + '">' + value.combo + '</option>';
            }
        });
        $('#combo_type').html(options);
        $('#combo_type').val(comboTypeOldValue);
    } else {
        var options = '<option value="">Select Combo</option>';
        $(combo_series).each(function(index, value) {
            if (value.val == courses) {
                options += '<option value="' + value.id + '">' + value.combo + '</option>';
            }
        });
        $('#combo_type').html(options);
    }

    const courseOldValue = "{{ old('course') }}";
    var combo = $('#combo_type').val();

    if (courseOldValue != '') {
        var options = `<option value="">Select Qualifying Course</option>`;
        $(series).each(function(index, value) {
            if (value.val == combo) {
                options += '<option value="' + value.course + '">' + value.course + '</option>';
            }
        });
        $('#course').html(options);
        $('#course').val(courseOldValue);
    } else {
        var options = '<option value="">Select Qualifying Course</option>';
        $(series).each(function(index, value) {
            if (value.val == combo) {
                options += '<option value="' + value.course + '">' + value.course + '</option>';
            }
        });
        $('#course').html(options);
    }

    marks = $('#marks').val();
    max_marks = $('#max_marks').val();
    calculatePercent(marks, max_marks);
});

$('#course_type').on('change', function() {
    var courses = $(this).val();
    var options = '<option value="">Select Combo</option>';
    $(combo_series).each(function(index, value) {
        if (value.val == courses) {
            options += '<option value="' + value.id + '">' + value.combo + '</option>';
        }
    });
    $('#combo_type').html(options);
});

$('#combo_type').on('change', function() {
    var combo = $(this).val();
    var options = '<option value="">Select Qualifying Course</option>';
    $(series).each(function(index, value) {
        if (value.val == combo) {
            options += '<option value="' + value.course + '">' + value.course + '</option>';
        }
    });
    $('#course').html(options);
});

$('#marks').on('input', function() {
    marks = $(this).val();
    calculatePercent(marks, max_marks);
});

$('#max_marks').on('input', function() {
    max_marks = $(this).val();
    calculatePercent(marks, max_marks);
});

$("#get_scollar").click(function() {
    $('html, body').animate({
        scrollTop: $("#scholarship_form").offset().top
    }, 800);
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

<script>
$("#share").jsSocials({
    showLabel: false,
    showCount: false,
    shareUrl: "https://toplad.in/scholarship",
    shareIn: "popup",
    title: true,
    media: true,

    shares: [
        "email",
        {
            share: "twitter",
            url: "https://toplad.in.in/scholarship",
            text: "Scholarship"
        },
        {
            share: "facebook",
            url: "https://toplad.in.in/scholarship",
            text: "Scholarship"
        },
        {
            share: "pinterest",
            url: "https://toplad.in.in/scholarship",
            media: "https://toplad.in.in/images/scholarship-banner.png",
            text: "Scholarship"
        },
        {
            share: "whatsapp",
            text: "Scholarship",
            url: "https://toplad.in.in/scholarship",
        },
    ]
});
$("#social_share").jsSocials({
    showLabel: true,
    showCount: false,
    shareUrl: "https://toplad.in.in/scholarship",
    shareIn: "popup",
    shares: [
        "email",
        {
            share: "twitter",
            url: "https://toplad.in.in/scholarship",
            text: "Scholarship"
        },
        {
            share: "facebook",
            url: "https://toplad.in.in/scholarship",
            text: "Scholarship"
        },
        {
            share: "pinterest",
            url: "https://toplad.in.in/scholarship",
            media: "https://toplad.in.in/images/scholarship-banner.png",
            text: "Scholarship"
        },
        {
            share: "whatsapp",
            text: "Scholarship",
            url: "https://toplad.in.in/scholarship",
        },
    ]
});


// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    if (fileName != '') {
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    } else {
        $(this).siblings(".custom-file-label").removeClass("selected").html('Choose file');
    }
});
</script>

@endpush