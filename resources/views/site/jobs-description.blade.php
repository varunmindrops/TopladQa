@extends($segment=='cma' ? 'layouts.cma-layout' : (($segment=='cs') ? 'layouts.cs-layout' : (($segment=='ca') ?
'layouts.ca-layout' : 'layouts.layout')))

@prepend('head-data')
<title>{{$jobs['post']}} | {{$jobs['organization']}} | {{$jobs['posting_place']}} | {{$jobs['mstCourse']['name']}} Jobs</title>
<meta name="description" content="Learn from India's top CMA, CS & CA faculty at Toplad. We are dedicated to making it possible for anyone, anywhere, at any time to study CMA, CS & CA.">
<meta name="keywords" content="CMA, CS, CA, CMA courses online, CS courses online, CA courses online, CMA Foundation to Final, CA Foundation to Final, Top CMA Faculty of India, Top CS Faculty of India, Top CA Faculty of India, Academy of Excellence, CMA in Future, CS in Future, CA in Future, CMA Books, CS Books, CA Books, Online CMA Classes, Online CS Classes, Online CA Classes" />
@endprepend

@section('content')

<div class="inner_theme_page career_now">
    <!-- <nav aria-label="breadcrumb" class="bdcrumb">
        <div class="container">
        </div>
    </nav> -->

    <div class="wrap_theme_pages career_detail_page">
        <div class="back_strips">

        </div>
        <section class="career_section">
            <div class="container">
                <div class="jd_top_bars">
                    <div class="all_job_link">
                        <a href="{{ url('/'.$segment.'/jobs') }}"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> View All Jobs</a>
                    </div>
                </div>
                <div class="inner_career">


                    <div class="wrap_job_contents">
                        <div class="jd_top_strip">
                            <h1>{{$jobs['post']}}</h1>
                            <p>{{$jobs['organization']}}</p>
                            <div class="colab_infos">

                                <div class="wrap_main_infer">
                                    <span class="exp com_infos">
                                        <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                        {{$jobs['experience']}}</span>
                                    <span class="sal com_infos"><i class="fa fa-inr" aria-hidden="true"></i>
                                        {{$jobs['salary_offered']}}</span>
                                    <span class="edu com_infos"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                        {{$jobs['qualification']}}</span>
                                    <span class="edu com_infos"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                        {{$jobs['posting_place']}}</span>
                                </div>
                                <div class="company_infos mid_infos">
                                    <span class="comp_infos">Apply Before: <span class="info_output">{{$jobs['apply_before']}}</span></span>
                                </div>
                            </div>
                        </div>

                        <div class="jd_multi_flex">
                            <div class="jd_left jd_common_cols">
                                <h2>Job Description</h2>
                               
                                <span class="min_divided"></span>
                                <div class="wrap_jd_info">
                                    <div class="description_all">
                                        {{$jobs['description']}} 
                                    </div>
                                    <div class="jd_meta_infos jd_covered_info">
                                        <ul>
                                            <li><span class="jd_meta_title">Experience:</span>{{$jobs['experience']}}</li>
                                            <li><span class="jd_meta_title">Salary Offered:</span>{{$jobs['salary_offered']}}</li>
                                            <li><span class="jd_meta_title">Education:</span>{{$jobs['qualification']}}</li>
                                            <li><span class="jd_meta_title">Apply Before:</span>{{$jobs['apply_before']}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="jd_summary">
                                    <h2>Company Info</h2>
                                    <span class="min_divided"></span>
                                    <div class="jd_meta_infos">
                                        <ul>
                                            <li><span class="jd_meta_title">Address:</span><a href="http://maps.google.com/?q={{$jobs['address']}}" target="_blank">{{$jobs['address']}}</a></li>
                                            <li><span class="jd_meta_title">Phone:</span><a href="tel:{{$jobs['phone']}}">{{$jobs['phone']}}</a></li>
                                            <li><span class="jd_meta_title">E-Mail ID:</span><a href="mailto:{{$jobs['email']}}">{{$jobs['email']}}</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>

                            <div class="jd_right jd_common_cols">
                                <h2>Job Summary</h2>
                                <span class="min_divided"></span>
                                <div class="sidebar_infos">
                                    <ul>
                                    <li class="pdf_view"> @if($jobs['file_path'] != "")
                                <a class="btn btn-primary custom_btnn" href="{{ asset($jobs['file_path']) }}" download="{{ $jobs['name'] }}">Download Job Details</a>
                                @endif</li>
                                        <li><span class="jd_meta_title">Nature of Organization:</span>{{$jobs['nature_of_organization']}}</li>
                                        <li><span class="jd_meta_title">Job Location:</span>{{$jobs['posting_place']}}</li>
                                        <li><span class="jd_meta_title">Number of Openings:</span>
                                        @if($jobs['no_of_post'] == "" || $jobs['no_of_post'] == 0)
                                            Not Disclosed
                                        @else
                                            {{$jobs['no_of_post']}}
                                        @endif
                                        </li>
                                    </ul>
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