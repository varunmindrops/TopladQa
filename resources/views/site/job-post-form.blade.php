@extends('layouts.layout')

@prepend('head-data')
<title>Post CA, CMA, CA Jobs, Openings and Recruitment</title>
<meta name="description" content="Looking to hire candidates. Post job on Toplad & hire CA, CMA & CS Employees. We are dedicated to making it possible for anyone, anywhere, at any time.">
<meta name="keywords" content="CMA, CS, CA, CMA Jobs, CS Jobs, CA Jobs, CA Candidates, CMA Candidates, CS Candidates, Post Job, Job Posting, Hire Employees, Opening for CA, Opening for CMA, Opening for CS, Recruitment for CMA, Recruitment for CA, Recruitment for CS, CMA Employees, CA Employees, CS Employees, CMA in Future, CS in Future, CA in Future" />
@endprepend

@section('content')

<div class="inner_theme_page job_portal">
    <nav aria-label="breadcrumb" class="bdcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <!-- <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li title="Pay Now" class="breadcrumb-item active" aria-current="page">Pay Now</li> -->
            </ol>
        </div>
    </nav>

    <div class="wrap_theme_pages">
        <section class="pay_now_section">
            <div class="container">

                <div class="job_headings">
                    <h1 class="job_content_tiles">Post a free job & hire now.</h1>
                    <p>Thousands of qualified and CA/CS/CMA aspirants come on our website everyday. Post a job for free on Toplad and hire employees.</p>

                </div>




                <div class="job_portal_flex">
                    <!-- <div class="common_ports">
                        <div class="title_card">
                            <h3>Upload Your Job Requirements.</h3>
                            <p>Make payment for your favorite course, in easy & simple steps here. Enter all the asked
                                details in the fields shown here. In the Note Section, mention Subject Name, Faculty
                                Name and course you are interested in purchasing. </p>
                            <p>Once payment is made, share the Screenshot with the counsellor who is helping you with
                                the purchase. </p>
                        </div>
                    </div> -->
                    <div class="common_ports">

                        <div id="payment_form" class="conntact-home">

                            <div class="call-back-form p-b20 p-t10">
                                <div class="wrap_title">
                                    <h3 class="form_title">Job Portal</h3>
                                    <span class="min_divided"></span>

                                </div>

                                <form class="cons-contact-form form-transparent" method="POST" action="/post-ca-cma-cs-jobs-free-hire" id="jobpostform" autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    <!-- <div class="wrap_single_inputs">

                                        <div class="form-group">
                                            <lable>Select CA/CS/CMA</lable>
                                            <select class="form-control @error('course_type') is-invalid @enderror" name="course_type" id="course_type" value="{{ old('course_type') }}" autofocus>
                                                <option value="">Select Course</option>
                                                @foreach($data as $course)
                                                <option value="{{$course['id']}}" <?php { {
                                                                                            echo old('course_type') == $course['id'] ? 'selected' : '';
                                                                                        }
                                                                                    } ?>>
                                                    {{$course['name']}}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('course_type')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div> -->
                                    <div class="wrap_multi_inputs">
                                        <div class="form-group">
                                            <lable>Select CA/CS/CMA</lable>
                                            <select class="form-control @error('course_type') is-invalid @enderror" name="course_type" id="course_type" value="{{ old('course_type') }}" autofocus>
                                                <option value="">Select Course</option>
                                                @foreach($data as $course)
                                                <option value="{{$course['id']}}" <?php { {
                                                                                            echo old('course_type') == $course['id'] ? 'selected' : '';
                                                                                        }
                                                                                    } ?>>
                                                    {{$course['name']}}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('course_type')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group" id="qual_div" style="display: none;">
                                            <lable>Qualification</lable>
                                            <select name="qualification" id="qualification" class="form-control @error('qualification') is-invalid @enderror">
                                                <option value="">Select</option>
                                            </select>
                                            @error('qualification')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <lable>Job Title</lable>
                                            <input name="post" type="text" maxlength="100" class="form-control @error('post') is-invalid @enderror" value="{{ old('post') }}" placeholder="Post" autofocus>
                                            @error('post')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <lable>Salary Offered</lable>
                                            <select name="salary" id="salary" class="form-control @error('salary') is-invalid @enderror" value="{{ old('salary') }}" autofocus>
                                                <option value="">Select</option>
                                                <option>1,00,000 - 2,00,000 P.A.</option>
                                                <option>2,00,000 - 3,00,000 P.A.</option>
                                                <option>3,00,000 - 4,00,000 P.A.</option>
                                                <option>4,00,000 - 5,00,000 P.A.</option>
                                                <option>5,00,000 - 6,00,000 P.A.</option>
                                                <option>6,00,000 - 7,00,000 P.A.</option>
                                                <option>7,00,000 - 8,00,000 P.A.</option>
                                                <option>8,00,000 - 9,00,000 P.A.</option>
                                                <option>9,00,000 - 10,00,000 P.A.</option>
                                                <option>10,00,000 - 11,00,000 P.A.</option>
                                                <option>11,00,000 - 12,00,000 P.A.</option>
                                                <option>12,00,000+ P.A.</option>
                                                <option>Not Known</option>
                                            </select>
                                            @error('salary')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <lable>Experience (in yrs)</lable>
                                            <select name="experience" id="experience" class="form-control @error('experience') is-invalid @enderror" value="{{ old('experience') }}" autofocus>
                                                <option value="">Select</option>
                                                <option>0-1 Years</option>
                                                <option>1-2 Years</option>
                                                <option>2-3 Years</option>
                                                <option>3-4 Years</option>
                                                <option>4-5 Years</option>
                                                <option>5-6 Years</option>
                                                <option>6-7 Years</option>
                                                <option>7-8 Years</option>
                                                <option>8-9 Years</option>
                                                <option>9-10 Years</option>
                                                <option>10+ Years</option>
                                            </select>
                                            @error('experience')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <!-- <div class="form-group">
                                            <lable>Category</lable>
                                            <select name="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category') }}" autofocus>
                                                <option>EWS</option>
                                                <option>General</option>
                                                <option>OBC</option>
                                                <option>SC</option>
                                                <option>ST</option>
                                                <option>Handicapped</option>
                                            </select>
                                            @error('category')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div> -->

                                        <div class="form-group">
                                            <lable>Organization </lable>
                                            <input name="organization" type="text" class="form-control @error('organization') is-invalid @enderror" value="{{ old('organization') }}" placeholder="Organization" autofocus>
                                            @error('organization')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <lable>Nature of Organization</lable>
                                            <select name="org_nature" id="org_nature" class="form-control @error('org_nature') is-invalid @enderror" value="{{ old('org_nature') }}" autofocus>
                                                <option value="">Select</option>
                                                <option value="Analytics">Analytics</option>
                                                <option value="BFSI">BFSI</option>
                                                <option value="BPO/KPO">BPO/KPO</option>
                                                <option value="Consulting">Consulting</option>
                                                <option value="Cooperative">Cooperative</option>
                                                <option value="Education">Education</option>
                                                <option value="Energy">Energy</option>
                                                <option value="Firm">Firm</option>
                                                <option value="Government">Government</option>
                                                <option value="Health Care">Health Care</option>
                                                <option value="Hotel">Hotel</option>
                                                <option value="Infrastructure">Infrastructure</option>
                                                <option value="IT/ITES">IT/ITES</option>
                                                <option value="ITES">ITES</option>
                                                <option value="Legal">Legal</option>
                                                <option value="Logistics/Shipping">Logistics/Shipping</option>
                                                <option value="Manufacturing">Manufacturing</option>
                                                <option value="NGO">NGO</option>
                                                <option value="Pharma">Pharma</option>
                                                <option value="Printing &amp; Packaging">Printing &amp; Packaging
                                                </option>
                                                <option value="PSU">PSU</option>
                                                <option value="Public Ltd.">Public Ltd.</option>
                                                <option value="Pvt. Ltd.">Pvt. Ltd.</option>
                                                <option value="Real Estate">Real Estate</option>
                                                <option value="Retail">Retail</option>
                                                <option value="Software">Software</option>
                                                <option value="Startup">Startup</option>
                                                <option value="Telecom">Telecom</option>
                                                <option value="Tourism">Tourism</option>
                                                <option value="Others">Others</option>
                                            </select>
                                            @error('org_nature')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <lable>Address </lable>
                                            <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" placeholder="Address" autofocus>
                                            @error('address')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="wrap_single_inputs">
                                        <div class="form-group">
                                            <lable>Job Description </lable>
                                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="6" placeholder="Job Description ">{{ old('description') }}</textarea>
                                            @error('description')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="wrap_multi_inputs">
                                        <div class="form-group">
                                            <lable>Phone </lable>
                                            <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Phone" autofocus>
                                            @error('phone')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <lable>E-Mail ID </lable>
                                            <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="E-Mail ID " autofocus>
                                            @error('email')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <lable>Apply Before </lable>
                                            <input name="apply" type="date" class="form-control @error('apply') is-invalid @enderror" value="{{ old('apply') }}" id="datePickerId" placeholder="Apply Before " autofocus>
                                            @error('apply')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <lable>Job Location </lable>
                                            <input name="posting_place" type="text" class="form-control @error('posting_place') is-invalid @enderror" value="{{ old('posting_place') }}" placeholder="Job Location" autofocus>
                                            @error('posting_place')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <lable>Number of Openings </lable>
                                            <input name="post_no" type="text" class="form-control @error('post_no') is-invalid @enderror" value="{{ old('post_no') }}" placeholder="Number of Openings " autofocus>
                                            @error('post_no')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <lable>File Upload</lable>
                                            <input class="form-control @error('my_file') is-invalid @enderror" id="my_file" name="my_file" type="file" autofocus>
                                            <lable tabindex="0" for="my_file" class="input-file-trigger">Only PDF, PNG, JPEG, JPG</lable>
                                            @error('my_file')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="note_subject">
                                        <strong>Note:</strong> Once you have submitted the job details, it will be reviewed by Toplad Admins. Jobs will go live and will appear to students after Admins have approved the job post.
                                    </div>

                                    <div class="multi_btn_portal">
                                        <button class="feedback_btnss" onkeydown="document.getElementById('from').value=null;document.getElementById('jobpostform').reset;" type="reset">
                                            Reset
                                        </button>
                                        <button type="submit" class="feedback_btnss">
                                            Submit
                                        </button>

                                    </div>
                                </form>

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
<script>
    var series = [{
            val: '1',
            data: 'Intermediate Pursuing'
        },
        {
            val: '1',
            data: 'Intermediate Qualified'
        },
        {
            val: '1',
            data: 'Final Pursuing'
        },
        {
            val: '1',
            data: 'Final Qualified'
        },
        {
            val: '2',
            data: 'Intermediate Pursuing'
        },
        {
            val: '2',
            data: 'Intermediate Qualified'
        },
        {
            val: '2',
            data: 'Final Pursuing'
        },
        {
            val: '2',
            data: 'Final Qualified'
        },
        {
            val: '3',
            data: 'Executive Pursuing'
        },
        {
            val: '3',
            data: 'Executive Qualified'
        },
        {
            val: '3',
            data: 'Professional Pursuing'
        },
        {
            val: '3',
            data: 'Professional Qualified'
        }
    ]

    $(document).ready(function() {
        const courseOldValue = "{{ old('course_type') }}";
        const qualificationOldValue = "{{ old('qualification') }}";
        const salaryOldValue = "{{ old('salary') }}";
        const experienceOldValue = "{{ old('experience') }}";
        const orgNatureOldValue = "{{ old('org_nature') }}";

        var course = $('#course_type').val();

        var options = '<option value="">Select</option>';
        $(series).each(function(index, value) {
            if (value.val == course) {
                options += '<option value="' + value.data + '">' + value.data + '</option>';
            }
        });
        $('#qualification').html(options);
        $('#qualification').val(qualificationOldValue);
        
        if(course != "") {
            $('#qual_div').show();
        } else {
            $('#qual_div').hide();
        }
        $('#salary').val(salaryOldValue);
        $('#experience').val(experienceOldValue);
        $('#org_nature').val(orgNatureOldValue);
    });

    $('#course_type').on('change', function() {
        var course = $(this).val();
        var options = '<option value="">Select</option>';
        $(series).each(function(index, value) {
            if (value.val == course) {
                options += '<option value="' + value.data + '">' + value.data + '</option>';
            }
        });
        $('#qualification').html(options);
        $('#qual_div').show();
    });

</script>

@endpush