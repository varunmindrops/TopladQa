@extends('layouts.layout')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url( {{ asset('images/bg_4.jpg') }} );" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
</section>
<div class="container brd-cumb">
    <div class="row no-gutters slider-text  align-items-end justify-content-center">
        <div class="col-md-12 ftco-animate pt-4 text-left">
            <p class="breadcrumbs mb-0">
                <span class="mr-2">
                    <a href="/">Home <i class="ion-ios-arrow-forward"></i></a>
                </span>
                <span class="mr-2">
                    <a href="#">Faculty list <i class="ion-ios-arrow-forward"></i></a>
                </span>
                <span class="mr-2">
                    <a class="active-breadcumb" href="#">Faculty Profile </a>
                </span>
            </p>
            <!-- <h1 class="bread">CMA</h1> -->
        </div>
    </div>
</div>
<section class="ftco-section faclt-edit-page">
    <div class="container">
        <div class="row">
            <div class="edit_contents">
                <div class="col-md-3 col-sm-4">
                    <div class="wrap_left_view">
                        <div class="picture-container">
                            <div class="picture">
                                <span class="onhover_icon"><i class="fa fa-camera" aria-hidden="true"></i></span>
                                <img src="images/1.png" class="picture-src" id="wizardPicturePreview" title="">
                                <input type="file" id="wizard-picture" class="">
                            </div>
                        </div>
                        <div class="wrap_tabs">
                            <!-- Tabs nav -->
                            <div class="nav flex-column nav-pills nav-pills-custom">
                                <a class="nav-link" href="#">
                                    <i class="fa fa-user-circle-o mr-2"></i>
                                    <span class="font-weight-bold small text-uppercase">Profile info</span></a>
                                <a class="nav-link active" href="#">
                                    <i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>
                                    <span class="font-weight-bold small text-uppercase">Course Info</span></a>
                                <a class="nav-link" href="#">
                                    <i class="fa fa-book mr-2" aria-hidden="true"></i>
                                    <span class="font-weight-bold small text-uppercase">Product Info</span></a>
                                <a class="nav-link" href="#">
                                    <i class="fa fa-cog mr-2" aria-hidden="true"></i>
                                    <span class="font-weight-bold small text-uppercase">Password Setting</span></a>
                                <a class="nav-link" href="index.html">
                                    <i class="fa fa-sign-out mr-2" aria-hidden="true"></i>
                                    <span class="font-weight-bold small text-uppercase">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-8">
                    <div class="wrap_tab_contents">
                        <div class="card_info shadow">
                            <h4 class="font-italic mb-2">Course and Subject info</h4>
                            <div class="form_data d-flex justify-content-between  align-items-center col-12">

                                <div class="form-group model_btns">
                                    <label class="fg-l">Kindly Select the Course Level. </label>

                                </div>
                                <div class="selcted_courses">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input chk" type="checkbox" name="course_level[]"
                                            value="1" id="levelCheck_1">
                                        <label class="form-check-label" for="levelCheck_1"> Foundation </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input chk" type="checkbox" name="course_level[]"
                                            value="2" id="levelCheck_2">
                                        <label class="form-check-label" for="levelCheck_2"> Inter Group 1 </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input chk" type="checkbox" name="course_level[]"
                                            value="3" id="levelCheck_3" checked="">
                                        <label class="form-check-label" for="levelCheck_3"> Inter Group 2 </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input chk" type="checkbox" name="course_level[]"
                                            value="4" id="levelCheck_4" checked="">
                                        <label class="form-check-label" for="levelCheck_4"> Final Group 3 </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input chk" type="checkbox" name="course_level[]"
                                            value="5" id="levelCheck_5">
                                        <label class="form-check-label" for="levelCheck_5"> Final Group 4 </label>
                                    </div>
                                </div>
                                <div class="form-group model_btns">
                                    <!-- <label class="fg-l">Kindly Select the Course Level. </label> -->
                                    <button type="button" class="btn btn-primary f-size" id="show-subject-button"
                                        data-toggle="modal" data-target="#subjectsModal">Show Subjects</button>
                                </div>
                                <div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div id="subjectsModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form action="/teacher/teacher-details/{{Auth::id()}}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">

                    <h4 class="modal-title">Modal Header</h4> <button type="button" class="close"
                        data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Select Subjects.</p>
                    <div id="teacher-subject">

                    </div>
                    <div>
                        <input type="hidden" name="course_level_id" id="course_level_input">
                    </div>
                </div>
                <div class="modal-footer dual_model_btn">
                    <button type="submit" class="btn btn-primary f-size">Save</button>
                    <button type="button" class="btn btn-primary f-size" data-dismiss="modal">Close</button>

                </div>
            </form>
        </div>

    </div>
</div>

@endsection