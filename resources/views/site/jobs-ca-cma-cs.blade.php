@extends('layouts.layout')

@prepend('head-data')
<title>Jobs | CA, CMA, CS | Toplad</title>
<meta name="description"
    content="Find the right job only for CS, CA & CMA students which job match with your expectations. Toplad help you in searching good jobs for you.">
<meta name="keywords"
    content="CMA, CS, CA, CMA Jobs, CS Jobs, CA Jobs, CA Candidates, CMA Candidates, CS Candidates, Find Job, Job Search, Hire Employess, Opening for CA, Opening for CMA, Opening for CS, Recruitment for CMA, Recruitment for CA, Recruitment for CS, CMA Employees, CA Employees, CS Employees, CMA in Future, CS in Future, CA in Future" />
@endprepend

@section('content')

<div class="inner_theme_page pay_noww">

    <div class="wrap_theme_pages career_page">
        <section class="career_section">
            <div class="container">
                <div class="job_headings">
                    <div style="float: right;" >
                        <a title="Job Posting Form" href="/post-ca-cma-cs-jobs-free-hire" class="job_button">
                            Post a Free Job
                        </a>
                    </div>
                    <h1 class="job_content_tiles">Latest Jobs</h1>
                    <p>Find the right job which can match your expertise, experience and aspirations.</p>
                </div>

                <div class="inner_career">


                    <div class="wrap_job_contents">

                        <div class="career_tabs j_content">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                @foreach($course as $data)
                                <li class="nav-item active" role="presentation">
                                    <button class="nav-link <?php echo $loop->index == 0 ? 'active' : '' ?>"
                                        id="jobs<?php echo ($loop->index + 1); ?>-tab" data-toggle="tab"
                                        href="#jobs<?php echo ($loop->index + 1); ?>" role="tab"
                                        aria-controls="nav-jobs" aria-selected="false">{{$data['name']}}</button>
                                </li>
                                @endforeach
                            </ul>

                            <div class="tab-content p-relative" id="myTabContent">
                                @foreach($course as $data)
                                <div class="tab-pane fade show <?php echo $loop->index == 0 ? 'active' : '' ?>"
                                    id="jobs<?php echo ($loop->index + 1); ?>" role="tabpanel"
                                    aria-labelledby="jobs-tab">
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

                                                    <a class="jd_links" href="{{ url('/'.$data['value'].'/job-opening/'.$newPosting.'-'.$newOrganization.'/'.$job['id']) }}">
                                                        <div class="show career_detailss"
                                                            aria-labelledby="heading<?php echo ($loop->index + 1); ?>"
                                                            data-parent="#accordion">
                                                            <div class="card-body">
                                                                <div class="job_panels">
                                                                    <div class="major_info">
                                                                        <h4>{{$job['post']}} <span
                                                                                class="organization"><i
                                                                                    class="fa fa-briefcase"
                                                                                    aria-hidden="true"></i>
                                                                                {{$job['organization']}}



                                                                    </div>
                                                                </div>

                                                                <div class="jd_content"> {{$job['description']}}</div>
                                                                <div class="colab_infos">

                                                                    <div class="wrap_main_infer">
                                                                        <span class="exp com_infos">
                                                                            <i class="fa fa-calendar-o"
                                                                                aria-hidden="true"></i>
                                                                            {{$job['experience']}}
                                                                            Years</span>
                                                                        <span class="sal com_infos"><i class="fa fa-inr"
                                                                                aria-hidden="true"></i>
                                                                            {{$job['salary_offered']}}</span>
                                                                        <span class="edu com_infos"><i
                                                                                class="fa fa-graduation-cap"
                                                                                aria-hidden="true"></i>
                                                                            {{$job['qualification']}}</span>
                                                                        <span class="edu com_infos"><i
                                                                                class="fa fa-map-marker"
                                                                                aria-hidden="true"></i>
                                                                            {{$job['posting_place']}}</span>
                                                                    </div>
                                                                    <div class="company_infos mid_infos">
                                                                        <span class="comp_infos">Apply Before: <span
                                                                                class="info_output">{{$job['apply_before']}}</span></span>


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

                    </div>
                </div>

            </div>
        </section>
    </div>
</div>
@endsection