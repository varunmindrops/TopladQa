@extends('layouts.layout')

@prepend('head-data')
<title>About Toplad | Best CMA CS & CA classes | All Subjects</title>
<meta name="description"
    content="Toplad has a legacy of more than a decade.We have proved our leadership by consistently delivering the best results in quality and quantity.We have the best and highly experienced expert faculty from all over India for CMA, CS & CA.">
<meta name="keywords"
    content="CMA, CS, CA, CMA courses online, CS courses online, CA courses online, CMA Foundation to Final, CA Foundation to Final, Top CMA Faculty of India, Top CS Faculty of India, Top CA Faculty of India, Academy of Excellence, CMA in Future, CS in Future, CA in Future, CMA Books, CS Books, CA Books, Online CMA Classes, Online CS Classes, Online CA Classes" />
@endprepend

@section('content')
<div class="inner_theme_page">
    <nav aria-label="breadcrumb" class="bdcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li title="About Us" class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </div>
    </nav>
    <div class="wrap_theme_pages">
        <section class="about_us">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 heading-section full_width_flex">
                        <h1 class="inner_theme_title">About Us</h1>
                        <p class="f-p mb-2">
                            Toplad is a trusted online learning platform that offers Complete Course Videos
                            exclusively for the CMA, CS and CA exam preparation. We have the best and highly experienced
                            expert faculty from all over India. We provide high-quality exam-oriented preparation. It is
                            strictly based on the CMA, CS and CA syllabus and pattern of previous year question papers.
                        </p>
                        <p class="f-p mb-2">
                            We have a legacy of more than a decade. Combined experience of all faculties will work as an
                            added advantage for all students. We have proved our leadership by consistently delivering
                            the
                            best results in quality and quantity. The consistent efforts of our faculties have produced
                            rank
                            holders every year. Study material created by our development team is authentic and covers
                            all
                            the relevant content pertaining to the CMA, CS and CA exams.
                        </p>
                        <p class="f-p">
                            Prepare for your dream CMA, CS and CA career with the help of our high-quality mentorship.
                            With
                            the passion of crossing, we are constantly working hard to provide a unique learning
                            experience
                            to the students and help them to accomplish their goal of Becoming CMA, CS or CA.
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-6 image_datas">
                        <div class="about_imgs">
                            <img class="img-fluid" src="{{  asset('images/home-images/trans-chaptersale_one.png') }}"
                                alt="Education">
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section class="section-full plain_card_div text-center p-t60 p-b40 m-t25">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xl-12 align-self-center p-b30">
                        <div class="section-head plain-card-without-border">
                            <h2>Achieve your goals with Toplad</h2>
                            <p class="m-size">Grab this opportunity and enrol yourself in the best online faculty in
                                CMA, CS
                                & CA.</p>
                            <div class="wt-separator-outer p-b30">
                                <div class="wt-separator bg-primary"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-sm-12 col-md-4 inner_pan_links">
                        <div class="plain-card-box">
                            <div class="plain-card">
                                <span class="plain-card_icon min_logos">
                                    <!-- <i class="fa fa-video-camera"></i> -->
                                    <img src="{{  asset('images/ra-logo/cma-toplad-logo.svg') }}">
                                </span>
                                <h5 class="acheive-title">CMA Courses</h5>
                                <p>Get the best <b>CMA courses</b> at
                                Toplad</p>
                                <a title="Buy Now" href="/cma/cma-classes-videos-all-papers-subjects"
                                    class="btn btn-primary m-t15">Buy Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-sm-12 col-md-4 inner_pan_links ">
                        <div class="plain-card-box">
                            <div class="plain-card">
                                <span class="plain-card_icon min_logos">
                                    <!-- <i class="fa fa-video-camera"></i> -->
                                    <img src="{{  asset('images/ra-logo/cs-toplad-logo.svg') }}">
                                </span>
                                <h5 class="acheive-title">CS Courses</h5>
                                <p>Get the best <b>CS courses</b> at
                                Toplad</p>
                                <a title="Buy Now" href="/cs/cs-classes-videos-all-papers-subjects"
                                    class="btn btn-primary m-t15">Buy Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-sm-12 col-md-4 inner_pan_links ">
                        <div class="plain-card-box">
                            <div class="plain-card">
                                <span class="plain-card_icon min_logos">
                                    <!-- <i class="fa fa-video-camera"></i> -->
                                    <img src="{{  asset('images/ra-logo/ca-toplad-logo.svg') }}">
                                </span>
                                <h5 class="acheive-title">CA Courses</h5>
                                <p>Get the best <b>CA courses</b> at
                                Toplad</p>
                                <a title="Buy Now" href="/ca/ca-classes-videos-all-papers-subjects"
                                    class="btn btn-primary m-t15">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- <div class="container brd-cumb">
        <div class="row no-gutters slider-text  align-items-end justify-content-center">
            <div class="col-md-12 ftco-animate pt-4 text-left">
                <p class="breadcrumbs mb-0">
                    <span class="mr-2">
                        <a title="Home" href="/">Home <i class="ion-ios-arrow-forward"></i></a>
                    </span>
                    <span class="mr-2">
                        <a title="About Us" class="active-breadcumb">About Us </a>
                    </span>
                </p>

            </div>
        </div>
    </div> -->




@endsection