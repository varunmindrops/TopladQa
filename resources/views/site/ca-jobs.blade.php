@extends('layouts.ca-layout')

@prepend('head-data')
<title>CA Jobs | Chartered Accountant Openings | Toplad</title>
<meta name="description" content="Find the right job only for Chartered Accountant students which job match with your expectations. Toplad help you in searching good jobs for you.">
<meta name="keywords" content="Chartered Accountant, CA, CA Jobs, CA Candidates, Find Job, Job Search, Hire Employees, Opening for CA, Recruitment for CA, CA Employees, CA in Future, Chartered Accountant Jobs, Hiring for Chartered Accountant, Get Job Chartered Accountant, Job Search for Chartered Accountant, Chartered Accountant Students, Chartered Accountant Employees" />
@endprepend

@section('content')

<div class="inner_theme_page get_jobs">
    <nav aria-label="breadcrumb" class="bdcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <!-- <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li title="Pay Now" class="breadcrumb-item active" aria-current="page">Pay Now</li> -->
            </ol>
        </div>
    </nav>

    <div class="wrap_theme_pages career_page">
        <section class="career_section">
            <div class="container">

                <div class="job_headings">
                    <div style="float: right;" >
                        <a title="Job Posting Form" href="/post-ca-cma-cs-jobs-free-hire" class="job_button">
                            Post a Free Job
                        </a>
                    </div>
                    @foreach($course as $data)
                    @php 
                        $jobCount = $data['jobPost']->count();
                    @endphp
                    @endforeach
                    <h1 class="job_content_tiles">Latest CA Jobs ({{$jobCount}})</h1>
                    <p>Find the right job which can match your expertise, experience and aspirations.</p>
                </div>
                <div class="inner_career">
                    @foreach($course as $data)
                    <div class="tab-pane fade show <?php echo $loop->index == 0 ? 'active' : '' ?>" id="jobs<?php echo ($loop->index + 1); ?>" role="tabpanel" aria-labelledby="jobs-tab">
                        <div class="career_by_cpurse">
                            <div class="wrap_careers">
                                <div class="career_accord">
                                    @foreach($data['jobPost'] as $job)
                                    @php 
                                        $post = $job['post'];
                                        $str = str_replace(' - ', ' ', $post);
                                        $strg = str_replace(' – ', ' ', $str);
                                        $newStr = str_replace(' / ', ' ', $strg);
                                        $string = str_replace('/', ' ', $newStr);
                                        $newPost = str_replace(' ', '-', trim($string));
                                        $newPosting = preg_replace('/[^A-Za-z0-9\-]/', '', $newPost);
                                        $organization = $job['organization'];
                                        $newOrganize = str_replace(' ', '-', trim($organization));
                                        $newOrganization = preg_replace('/[^A-Za-z0-9\-]/', '', $newOrganize);
                                    @endphp
                                    <div class="card">

                                        <a class="jd_links" href="{{ url('/ca/job-opening/'.$newPosting.'-'.$newOrganization.'/'.$job['id']) }}">
                                            <div class="show career_detailss" aria-labelledby="heading<?php echo ($loop->index + 1); ?>" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="job_panels">
                                                        <div class="major_info">
                                                            <h4>{{$job['post']}} <span class="organization"><i class="fa fa-briefcase" aria-hidden="true"></i>
                                                                    {{$job['organization']}}
                                                        </div>
                                                    </div>

                                                    <div class="jd_content"> {{$job['description']}}</div>
                                                    <div class="colab_infos">

                                                        <div class="wrap_main_infer">
                                                            <span class="exp com_infos">
                                                                <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                                                {{$job['experience']}}
                                                                Years</span>
                                                            <span class="sal com_infos"><i class="fa fa-inr" aria-hidden="true"></i>
                                                                {{$job['salary_offered']}}</span>
                                                            <span class="edu com_infos"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                                                {{$job['qualification']}}</span>
                                                            <span class="edu com_infos"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                                {{$job['posting_place']}}</span>
                                                        </div>
                                                        <div class="company_infos mid_infos">
                                                            <span class="comp_infos">Apply Before: <span class="info_output">{{$job['apply_before']}}</span></span>


                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>
@endsection