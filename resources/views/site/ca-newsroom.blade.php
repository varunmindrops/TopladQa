@extends('layouts.ca-layout')
<!-- <link rel="stylesheet" href="{{ asset('css/jssocials.css') }}">
<link rel="stylesheet" href="{{ asset('css/jssocials-theme-flat.css') }}"> -->
@prepend('head-data')
    <title>News & Announcements - CA Students | Online Classes</title>
    <meta name="description"
        content="Learn from India's top CA faculty at Toplad. We are dedicated to making it possible for anyone, anywhere, at any time to study CA. Join Us Now.">
    <meta name="keywords"
        content="CA, CA courses online, CA Foundation, CA Inter, CA Inter Group 1, CA Inter Group 2, CA Final, CA Final Group 1, CA Final Group 2, Top Faculty of India, Academy of Excellence, CA in Future, CA Books, CA Notes, Online CA Classes" />
@endprepend

@section('content')
    <div class="inner_theme_page p-b40 inner_header_page">
        <nav aria-label="breadcrumb" class="bdcrumb">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/ca">CA</a></li>
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
                            <div class="announcements_member_text announcements_member_text_pdf_span">
                                <div class="section-head">
                                    <h2>Important News & Announcements</h2>
                                    <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> -->
                                </div>
                                <ul id="vertical-ticker">
                                    <li>
                                        <a href="{{ asset('/announcement-file/CA-Exams-Date-Sheet.pdf') }}" target="_blank"
                                            rel="noopener">
                                            <span class="check_nnews announcements_member_text_pdf">
                                                CA Exams Date Sheet for May 2022 Exams.</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.icai.org/post/cut-off-date-for-conversion-from-earlier-scheme-to-revised-scheme-may2022exam"
                                            target="_blank" rel="noopener">
                                            <span class="check_nnews">
                                                Cut Off Date to switch to New Scheme of CA Course.</span>
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a href="https://www.youtube.com/watch?v=V2JlWVKs8Nw"
                                            target="_blank" rel="noopener">
                                            <span class="check_nnews">
                                            TopLad Live Batches for 2022 Exams.</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{asset('/announcement-file/Toplad-live-Batch.pdf')}}"
                                            target="_blank" rel="noopener">
                                            <span class="check_nnews  announcements_member_text_pdf">
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
