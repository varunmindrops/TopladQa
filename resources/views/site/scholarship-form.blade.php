@extends('layouts.layout')
<!-- <link rel="stylesheet" href="{{ asset('css/jssocials.css') }}">
<link rel="stylesheet" href="{{ asset('css/jssocials-theme-flat.css') }}"> -->

@prepend('head-data')

<title>Scholarship Form</title>
<meta name="description"
    content="Learn from India's top CMA faculty at Raghav Academy. We are dedicated to making it possible for anyone, anywhere, at any time to study CMA. Join Us Now.">
@endprepend

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url( {{ asset('images/bg_4.jpg') }} );"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
</section>
<div class="main_class whiter_bg scship_page">
    <!------ Scroll to top Button ------->
    <!-- <button onclick="topFunction()" id="jumpTop" title="Go to top"><i class="fa fa-arrow-up"
            aria-hidden="true"></i></button> -->


    <section class="ftco-section sclr_formm">
    <div class="sclr_topeer">
            <div class="container">
                <div class="page_head">
                    <h1 class="pt-0 f-34 text-center">Get Your <b>CMA Scholarship</b> Now
                    </h1>
                    <div class="get_sclr_now">
                        <form class="submit_sclr_form">
                            <div class="inner_sclr">
                                <div class="form-group sclr_groups col-md-6">
                                    <lable>Full Name</label>
                                        <input type="text" placeholder="Enter your Full Name" class="form-control">
                                </div>

                                <div class="form-group sclr_groups col-md-6">
                                    <lable>Email</label>
                                        <input type="email" placeholder="Enter your Email" class="form-control">
                                </div>
                                <div class="form-group sclr_groups col-md-6">
                                    <lable>Mobile Number</label>
                                        <input type="text" placeholder="Enter your Number" class="form-control">
                                </div>
                                <div class="form-group sclr_groups col-md-6">
                                    <lable>Select Course/Combo</label>
                                        <select class="form-control">
                                            <option>Combo 1</option>
                                            <option>Combo 2</option>
                                            <option>Combo 3</option>
                                            <option>Combo 4</option>
                                            <option>Combo 5</option>
                                        </select>
                                </div>
                            </div>
                            <hr class="gap_divider_sclr">
                            <div class="wrap_minsclr">
                                <h4>Course Qualified before Current Course<span class="label_explain">
                                <a class="tooltip_sclrr" href="#" data-toggle="tooltip" data-placement="top" title="Tooltip to explain input fields."><i class="fa fa-info-circle"
                                                        aria-hidden="true"></i></a>
                                    </span></h4>
                                <div class="inner_sclr">
                                    <div class="form-group sclr_groups col-md-4">
                                        <lable>Qualifying Course</label>
                                            <input type="text" placeholder="Qualifying Course" class="form-control">
                                    </div>
                                    <div class="form-group sclr_groups col-md-4">
                                        <lable>Marks Obtained</label>
                                            <input type="text" placeholder="Marks Obtained" class="form-control">
                                    </div>
                                    <div class="form-group sclr_groups col-md-4">
                                        <lable>Max Marks</label>
                                            <input type="text" placeholder="Maximum Marks of Qualifying Course"
                                                class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="wrap_minsclr">

                                <div class="inner_sclr">
                                    <div class="form-group sclr_groups col-md-4">
                                        <lable>Registration Number</label>
                                            <input type="text" placeholder="Registration Number of CMA Course"
                                                class="form-control">
                                    </div>
                                    <div class="form-group sclr_groups col-md-4">
                                        <lable>Roll Number<span class="label_explain">
                                                <!-- <div class="tooltip">
                                                    <span class="tooltiptext">This is tooltip to show information about
                                                        particular input fields. </span>
                                                </div> -->
                                                <a class="tooltip_sclrr" href="#" data-toggle="tooltip" data-placement="top" title="Tooltip to explain input fields."><i class="fa fa-info-circle"
                                                        aria-hidden="true"></i></a>
                                            </span></label>
                                            <input type="text" placeholder="Roll Number" class="form-control">
                                    </div>
                                    <div class="form-group sclr_groups col-md-4">
                                        <lable>Date of Clearing Qualifying Exam<span class="label_explain">
                                        <a class="tooltip_sclrr" href="#" data-toggle="tooltip" data-placement="top" title="Tooltip to explain input fields."><i class="fa fa-info-circle"
                                                        aria-hidden="true"></i></a>
                                            </span></label>
                                            <input type="text" placeholder="Date of Clearing Qualifying Exam"
                                                class="form-control">
                                    </div>

                                    <div class="form-group sclr_groups col-md-4">
                                        <lable>Upload ID Proof<span class="label_explain">
                                        <a class="tooltip_sclrr" href="#" data-toggle="tooltip" data-placement="top" title="Tooltip to explain input fields."><i class="fa fa-info-circle"
                                                        aria-hidden="true"></i></a>
                                            </span></label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control"
                                                    id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                    </div>

                                    <div class="form-group sclr_groups col-md-4">
                                        <lable>Upload Marksheet<span class="label_explain">
                                        <a class="tooltip_sclrr" href="#" data-toggle="tooltip" data-placement="top" title="Tooltip to explain input fields."><i class="fa fa-info-circle"
                                                        aria-hidden="true"></i></a>
                                            </span></label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control"
                                                    id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                    </div>
                                </div>



                                <div class="form-group scl_subber col-md-12">
                                    <button type="submit" class="btn button common_btn_now" value="">Submit</button>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('scripts')
<script>

</script>
<script src="{{ asset('js/jssocials.min.js') }}"></script>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
@endpush