@extends('layouts.cma-layout')
<!-- <link rel="stylesheet" href="{{ asset('css/jssocials.css') }}">
<link rel="stylesheet" href="{{ asset('css/jssocials-theme-flat.css') }}"> -->

@prepend('head-data')
    <title>News & Announcements - CMA Students | Online Classes</title>
    <meta name="description"
        content="Learn from India's top CMA faculty at Toplad. We are dedicated to making it possible for anyone, anywhere, at any time to study CMA. Join Us Now.">
    <meta name="keywords"
        content="CMA, CMA courses online, Foundation to Final, Top Faculty of India, Academy of Excellence, CMA in Future, CMA Books, Online CMA Classes" />
@endprepend

@section('content')
    <div class="inner_theme_page p-b40 inner_header_page">
        <nav aria-label="breadcrumb" class="bdcrumb">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/cma">CMA</a></li>
                    <li title="Important News & Announcements" class="breadcrumb-item active" aria-current="page">News &
                        Announcements</li>
                </ol>
            </div>
        </nav>
        <div class="wrap_theme_pages">
            <section class="announcements_part">
                <div class="container">
                    <div class="row align-items-sm-center">
                        <div class="col-md-12 col-lg-12">
                            <div class="announcements_member_text">
                                <div class="section-head">
                                    <h2>Important News & Announcements</h2>
                                </div>
                                <ul id="vertical-ticker">
                                    <li>
                                        <a href="{{ asset('/announcement-file/cmafoundationexamdatesheet.pdf') }}"
                                            target="_blank">
                                            <span class="check_nnews announcements_member_text_pdf">
                                                Exam Date sheet of CMA foundation July 2022
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ asset('/announcement-file/June2022InterFinalExamNotification.pdf') }}"
                                            target="_blank">
                                            <span class="check_nnews announcements_member_text_pdf">
                                                Exam Date sheet for Intermediate and Final June 2022 Exams
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://icmai.in/studentswebsite/Syl-2016.php" target="_blank">
                                            <span class="check_nnews">
                                                Supplementary Notes for July 2022 Exams released by ICMAI.
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ asset('/announcement-file/CMA-Admission-Dates-Extended-Notification.pdf') }}"
                                            target="_blank">
                                            <span class="check_nnews announcements_member_text_pdf">
                                                CMA Admission Dates Extended till 25th February 2022 for July 2022 Exams
                                            </span>
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a href="https://youtu.be/zI5fwVc9nx4" rel="noopener" target="_blank">
                                            <span class="check_nnews">
                                             TopLad Live Batches for 2022 Exams.
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{asset('/announcement-file/Toplad-live-Batch.pdf')}}" rel="noopener"  target="_blank">
                                            <span class="check_nnews announcements_member_text_pdf">
                                                TopLad Live Batches Schedule.
                                            </span>
                                        </a>
                                    </li> --}}
                                </ul>

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
