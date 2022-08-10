@extends('layouts.cs-layout')
<!-- <link rel="stylesheet" href="{{ asset('css/jssocials.css') }}">
<link rel="stylesheet" href="{{ asset('css/jssocials-theme-flat.css') }}"> -->
@prepend('head-data')
    <title>News & Announcements - CS Students | Online Classes</title>
    <meta name="description"
        content="Learn from India's top CS faculty at Toplad. We are dedicated to making it possible for anyone, anywhere, at any time to study CS. Join Us Now.">
    <meta name="keywords"
        content="CS, CS courses online, CSEET, CS Executive, CS Professional, Top Faculty of India, Academy of Excellence, CS in Future, CS Books, Online CS Classes" />
@endprepend

@section('content')
    <div class="inner_theme_page p-b40 inner_header_page">
        <nav aria-label="breadcrumb" class="bdcrumb">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/cs">CS</a></li>
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
                                        <a href="{{ asset('/announcement-file/CS-Last-Date-of-Admission.pdf') }}"
                                            target="_blank" rel="noopener">
                                            <span class="check_nnews announcements_member_text_pdf">
                                                Last Date of Admission in CS Professional for December 2022.</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ asset('/announcement-file/CS-Exams-Date-Sheet-for-June.pdf') }}"
                                            target="_blank" rel="noopener">
                                            <span class="check_nnews announcements_member_text_pdf">
                                                CS Exams Date Sheet for June 2022 Exams.</span>
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a href="https://www.youtube.com/watch?v=asEOBGAnqXE"
                                            target="_blank" rel="noopener">
                                            <span class="check_nnews">
                                            TopLad Live Batches for 2022 Exams.</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{asset('/announcement-file/Toplad-live-Batch.pdf')}}"
                                            target="_blank" rel="noopener">
                                            <span class="check_nnews announcements_member_text_pdf">
                                            TopLad Live Batches Schedule.</span>
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
