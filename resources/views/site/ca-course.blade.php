@extends('layouts.ca-layout')
<!-- <link rel="stylesheet" href="{{ asset('css/jssocials.css') }}">
<link rel="stylesheet" href="{{ asset('css/jssocials-theme-flat.css') }}"> -->
@prepend('head-data')
<title>CA Video Lectures | Foundation | Intermediate | Final - Toplad</title>
<meta name="description"
    content="Learn the best CA video lectures online from India's top CA faculty at Toplad. We are dedicated to provide the best CA video lecture for Foundation, inter and final.">
<meta name="keywords"
    content="CA, CA courses online, CA Foundation, CA Inter, CA Final, Top Faculty of India, Academy of Excellence, CA in Future, CA Books, Online CA Classes" />
@endprepend

@section('content')
<div class="inner_theme_page inner_header_page p-b40">
    <nav aria-label="breadcrumb" class="bdcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li title="CA" class="breadcrumb-item active" aria-current="page">CA</li>
            </ol>
        </div>
    </nav>
    <div class="wrap_theme_pages">
        <section class="course-des">
            <div class="container">
                <div class="row">
                   
                        <div class="col-sm-12 heading-section p-b30">
                            <h2 class="inner_theme_title">Chartered Accountant (CA)</h2>
                            <div class="wt-separator-outer p-b10">
                                <div class="wt-separator bg-primary"></div>
                            </div>
                            <p class="f-p">Chartered Accountant (CA) provides you an in-depth Knowledge to manage
                                business with
                                the available resources. CA Course is conducted by Indian Chartered Accountants Institute
                                (ICAI).</p>

                        </div>
                  

                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    @foreach($course_level as $level)
                                    <li class="nav-item <?php echo $loop->index == 0 ? 'active' : '' ?>"
                                        role="presentation">
                                        <button class="nav-link <?php echo $loop->index == 0 ? 'active' : '' ?>"
                                            id="home<?php echo ($loop->index + 1); ?>-tab" data-toggle="tab"
                                            href="#found<?php echo ($loop->index + 1); ?>" role="tab"
                                            aria-controls="nav<?php echo ($loop->index + 1); ?>-home"
                                            aria-selected="<?php echo $loop->index == 0 ? 'true' : 'false' ?>">{{ $level['name'] }}</button>
                                    </li>
                                    @endforeach
                                </ul>

                                <div class="tab-content p-relative" id="myTabContent">
                                    @foreach($course_level as $level)
                                    <div class="tab-pane fade show <?php echo $loop->index == 0 ? ' active' : '' ?>"
                                        id="found<?php echo ($loop->index + 1); ?>" role="tabpanel"
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