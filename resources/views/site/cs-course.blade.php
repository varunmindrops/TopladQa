@extends('layouts.cs-layout')
<!-- <link rel="stylesheet" href="{{ asset('css/jssocials.css') }}">
<link rel="stylesheet" href="{{ asset('css/jssocials-theme-flat.css') }}"> -->
@prepend('head-data')
<title>CS Video Lectures | CSEET | Executive | Professional - Toplad</title>
<meta name="description"
    content="Learn the best CS video lectures online from India's top CS faculty at Toplad. We are dedicated to provide the best CS video lecture for CSEET, executive and professional.">
<meta name="keywords"
    content="CS, CS courses online, CSEET, CS Executive, CS Professional, Top Faculty of India, Academy of Excellence, CS in Future, CS Books, Online CS Classes" />
@endprepend

@section('content')
<div class="inner_theme_page inner_header_page p-b40">
    <nav aria-label="breadcrumb" class="bdcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li title="CS" class="breadcrumb-item active" aria-current="page">CS</li>
            </ol>
        </div>
    </nav>
    <div class="wrap_theme_pages">
        <section class="course-des">
            <div class="container">
                <div class="row">
                   
                        <div class="col-sm-12 heading-section p-b30">
                            <h2 class="inner_theme_title">Company Secretary (CS)</h2>
                            <div class="wt-separator-outer p-b10">
                                <div class="wt-separator bg-primary"></div>
                            </div>
                            <p class="f-p">Company Secretary (CS) provides you an in-depth Knowledge to manage
                                business with
                                the available resources. CS Course is conducted by Institute of Company Secretary of
                                India
                                (ICSI).</p>

                        </div>
                  

                    <div class="container">
                        <!-- <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3 col-xs-100pc m-b30">
                        <div class="only_text_formate">
                            <div class="icon-content">
                                <h5 class="wt-tilte m-b0 text-uppercase">We Provide All Formate</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3 col-xs-100pc m-b30">
                        <div class="wt-icon-box-wraper bdr-primary bx-style-1 p-a20 p-l40 left-dark radius-md">
                            <div class="wt-icon-box-xs radius bg-primary"
                                style="position: absolute;left: -20px;top: 50%; transform: translateY(-50%);">
                                <span class="icon-cell text-white"><img
                                        src="{{  asset('images/pen-drive.png') }}"></span>
                            </div>
                            <div class="icon-content">
                                <h5 class="wt-tilte m-b0 text-uppercase">Pendrive</h5>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3 col-xs-100pc m-b30">
                        <div class="wt-icon-box-wraper bdr-danger bx-style-1 p-a20 p-l40 left-dark radius-md">
                            <div class="wt-icon-box-xs radius bg-danger"
                                style="position: absolute;left: -20px;top: 50%; transform: translateY(-50%);">
                                <span class="icon-cell text-white"><img src="{{  asset('images/drive.png') }}"></span>
                            </div>
                            <div class="icon-content">
                                <h5 class="wt-tilte m-b0 text-uppercase">Google Link</h5>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3 col-xs-100pc m-b30">
                        <div class="wt-icon-box-wraper bdr-warning bx-style-1 p-a20 p-l40 left-dark radius-md">
                            <div class="wt-icon-box-xs radius bg-warning"
                                style="position: absolute;left: -20px;top: 50%; transform: translateY(-50%);">
                                <span class="icon-cell text-white"><i class="fa fa-book"></i></span>
                            </div>
                            <div class="icon-content">
                                <h5 class="wt-tilte m-b0 text-uppercase">Study Material</h5>

                            </div>
                        </div>
                    </div>
                </div> -->
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    @foreach($course_level as $level)
                                    <li class="nav-item <?php echo $loop->index == 0 ? 'active' : '' ?>"
                                        role="presentation">
                                        <button class="nav-link <?php echo $loop->index == 0 ? 'active' : '' ?>"
                                            id="home<?php echo ($loop->index + 1); ?>-tab" data-toggle="tab"
                                            href="#CSEET<?php echo ($loop->index + 1); ?>" role="tab"
                                            aria-controls="nav<?php echo ($loop->index + 1); ?>-home"
                                            aria-selected="<?php echo $loop->index == 0 ? 'true' : 'false' ?>">{{ $level['name'] }}</button>
                                    </li>
                                    @endforeach
                                </ul>

                                <div class="tab-content p-relative" id="myTabContent">
                                    @foreach($course_level as $level)
                                    <div class="tab-pane fade show <?php echo $loop->index == 0 ? ' active' : '' ?>"
                                        id="CSEET<?php echo ($loop->index + 1); ?>" role="tabpanel"
                                        aria-labelledby="home<?php echo ($loop->index + 1); ?>-tab">

                                        <div class="row">
                                            @foreach($level['mstSubject'] as $subject)
                                            @if(!empty($subject['slug']))
                                            <div class="col-md-3 col-sm-12">
                                                <a href="/{{$segment}}/paper/{{$subject['slug']}}"
                                                    class="wt-icon-box-wraper bx-style-2 m-t10 m-b10 p-a20 center bg-white radius-md onhover-action">
                                                    <div class="icon-content">
                                                        <p>{{ $subject->name }}</p>
                                                    </div>
                                                </a>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@push('scripts')

@endpush