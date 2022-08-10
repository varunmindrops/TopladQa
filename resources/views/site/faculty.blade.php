@extends('layouts.layout')

@prepend('head-data')
<title>Top CMA, CS & CA Faculty of India | Inter, Final, Foundation</title>
<meta name="description"
    content="Toplad have India's best an d experienced faculty when it comes to CMA. You can choose the faculty by which you want to study, we also have the full information for the faculties, thus giving you a full insight about how the faculty is.">
<meta name="keywords"
    content="CMA, CS, CA, CMA courses online, CS courses online, CA courses online, CMA Foundation to Final, CA Foundation to Final, Top CMA Faculty of India, Top CS Faculty of India, Top CA Faculty of India, Academy of Excellence, CMA in Future, CS in Future, CA in Future, CMA Books, CS Books, CA Books, Online CMA Classes, Online CS Classes, Online CA Classes" />
@endprepend

@section('content')
<div class="inner_theme_page faculty_theme p-b20">
    <nav aria-label="breadcrumb" class="bdcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li title="Faculty" class="breadcrumb-item active" aria-current="page">All Faculty</li>
            </ol>
        </div>
    </nav>
 

    <section class="faculty_ftco faculty_isections">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 heading-section">

                    <!-- <p class="f-p mb-3">
                    Leadership and learning are indispensable to each other. Get a chance to learn from our highly
                    experienced instructors.
                </p> -->

                    <div class="faculty-types">
                        <form type="GET" action="/all-faculty">
                            <div class="search_top">
                                <div class="wrap_serpan">
                                    <input type="search" placeholder="Search" name="search"
                                        class="form-control @error('search') is-invalid @enderror"
                                        value="{{ request('search') }}" autofocus>
                                    <button class="button btn" type="submit"><i class="fa fa-search"
                                            aria-hidden="true"></i></button>
                                </div>
                                @error('search')
                                <p class="error_result" style="color:red">{{$message}}</p>
                                @enderror
                            </div>
                        </form>
                        <!-- <div class="pad_20 fac_common_card">
                        <div class="wrap_all_faculty facl_fancy">
                            <div class="wrap_main_info">
                                <a title="Sandeep Kumar" class="linker_card" href="/faculty-profile/1">
                                    <div class="faculty_box">
                                        <img class="faculty_imgs img-responsive"
                                            src="https://toplad.in/registration/api/uploads/photograph/cma_sandeep_kumar.jpg"
                                            alt="Faculty Image">
                                    </div>
                                    <div class="title-div personal_det">
                                        <div class="wrap_main_in">
                                            <p class="pd_name">Sandeep Kumar</p>
                                            <p class="pd_email">kumar@example.com</p>
                                            <div class="bio_me">
                                                CMA Sandeep Kumar is an Associate Member of The highly esteemed
                                                Institute of
                                                Cost Accountants of India. He is one of the most renowned Accountants of
                                                India. He is the GST Resource person of The Institute of Cost
                                                Accountants of
                                                India. A highly intelligent and humble person, who believes in the
                                                saying
                                                “To think is easy. To act is hard. But the hardest thing in the world is
                                                to
                                                act in accordance with your thinking.”

                                            </div>

                                        </div>

                                        <p class="pd_exp"><span class="badge_pd">6+ <span>Experiance</span></span> </p>
                                    </div>
                                </a>
                            </div>
                            
                        </div>
                        <div class="wrap_all_faculty facl_fancy">
                            <div class="wrap_main_info">
                                <a title="Sandeep Kumar" class="linker_card" href="/faculty-profile/1">
                                    <div class="faculty_box">
                                        <img class="faculty_imgs img-responsive"
                                            src="https://toplad.in/registration/api/uploads/photograph/cma_sandeep_kumar.jpg"
                                            alt="Faculty Image">
                                    </div>
                                    <div class="title-div personal_det">
                                        <div class="wrap_main_in">
                                            <p class="pd_name">Sandeep Kumar</p>
                                            <p class="pd_email">kumar@example.com</p>
                                            <div class="bio_me">
                                                CMA Sandeep Kumar is an Associate Member of The highly esteemed
                                                Institute of
                                                Cost Accountants of India. He is one of the most renowned Accountants of
                                                India. He is the GST Resource person of The Institute of Cost
                                                Accountants of
                                                India. A highly intelligent and humble person, who believes in the
                                                saying
                                                “To think is easy. To act is hard. But the hardest thing in the world is
                                                to
                                                act in accordance with your thinking.”

                                            </div>

                                        </div>

                                        <p class="pd_exp"><span class="badge_pd">6+ <span>Experiance</span></span> </p>
                                    </div>
                                </a>
                            </div>
                            
                        </div>
                        <div class="wrap_all_faculty facl_fancy">
                            <div class="wrap_main_info">
                                <a title="Sandeep Kumar" class="linker_card" href="/faculty-profile/1">
                                    <div class="faculty_box">
                                        <img class="faculty_imgs img-responsive"
                                            src="https://toplad.in/registration/api/uploads/photograph/cma_sandeep_kumar.jpg"
                                            alt="Faculty Image">
                                    </div>
                                    <div class="title-div personal_det">
                                        <div class="wrap_main_in">
                                            <p class="pd_name">Sandeep Kumar</p>
                                            <p class="pd_email">kumar@example.com</p>
                                            <div class="bio_me">
                                                CMA Sandeep Kumar is an Associate Member of The highly esteemed
                                                Institute of
                                                Cost Accountants of India. He is one of the most renowned Accountants of
                                                India. He is the GST Resource person of The Institute of Cost
                                                Accountants of
                                                India. A highly intelligent and humble person, who believes in the
                                                saying
                                                “To think is easy. To act is hard. But the hardest thing in the world is
                                                to
                                                act in accordance with your thinking.”

                                            </div>

                                        </div>

                                        <p class="pd_exp"><span class="badge_pd">6+ <span>Experiance</span></span> </p>
                                    </div>
                                </a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="all_faculty change_faculty">

                        <div class="wrap_all_faculty card_olay">
                            <div class="wrap_main_info">
                                <a title="Sandeep Kumar" class="linker_card" href="/faculty-profile/1">
                                    <div class="faculty_box">
                                        <img class="faculty_imgs img-responsive"
                                            src="https://toplad.in/registration/api/uploads/photograph/cma_sandeep_kumar.jpg"
                                            alt="Faculty Image">
                                    </div>
                                    <div class="title-div personal_det">
                                        <div class="wrap_main_in">
                                            <p class="pd_name">Sandeep Kumar</p>
                                            <p class="pd_email">kumar@example.com</p>
                                        </div>
                                        <p class="pd_exp"><span class="badge_pd">6+ <span>Experiance</span></span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>


                        <div class="wrap_all_faculty card_olay">
                            <div class="wrap_main_info">
                                <a title="Sandeep Kumar" class="linker_card" href="/faculty-profile/1">
                                    <div class="faculty_box">
                                        <img class="faculty_imgs img-responsive"
                                            src="https://toplad.in/registration/api/uploads/photograph/cma_sandeep_kumar.jpg"
                                            alt="Faculty Image">
                                    </div>
                                    <div class="title-div personal_det">
                                        <div class="wrap_main_in">
                                            <p class="pd_name">Sandeep Kumar</p>
                                            <p class="pd_email">kumar@example.com</p>
                                        </div>
                                        <p class="pd_exp"><span class="badge_pd">6+ <span>Experiance</span></span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="wrap_all_faculty card_olay">
                            <div class="wrap_main_info">
                                <a title="Sandeep Kumar" class="linker_card" href="/faculty-profile/1">
                                    <div class="faculty_box">
                                        <img class="faculty_imgs img-responsive"
                                            src="https://toplad.in/registration/api/uploads/photograph/cma_sandeep_kumar.jpg"
                                            alt="Faculty Image">
                                    </div>
                                    <div class="title-div personal_det">
                                        <div class="wrap_main_in">
                                            <p class="pd_name">Sandeep Kumar</p>
                                            <p class="pd_email">kumar@example.com</p>
                                        </div>
                                        <p class="pd_exp"><span class="badge_pd">6+ <span>Experiance</span></span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="wrap_all_faculty card_olay">
                            <div class="wrap_main_info">
                                <a title="Sandeep Kumar" class="linker_card" href="/faculty-profile/1">
                                    <div class="faculty_box">
                                        <img class="faculty_imgs img-responsive"
                                            src="https://toplad.in/registration/api/uploads/photograph/cma_sandeep_kumar.jpg"
                                            alt="Faculty Image">
                                    </div>
                                    <div class="title-div personal_det">
                                        <div class="wrap_main_in">
                                            <p class="pd_name">Sandeep Kumar</p>
                                            <p class="pd_email">kumar@example.com</p>
                                        </div>
                                        <p class="pd_exp"><span class="badge_pd">6+ <span>Experiance</span></span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="wrap_all_faculty">
                            <div class="wrap_main_info">
                                <a title="Sandeep Kumar" class="linker_card" href="/faculty-profile/1">
                                    <div class="faculty_box">
                                        <img class="faculty_imgs img-responsive"
                                            src="https://toplad.in/registration/api/uploads/photograph/cma_sandeep_kumar.jpg"
                                            alt="Faculty Image">
                                    </div>
                                    <div class="title-div personal_det">
                                        <p class="pd_name">Sandeep Kumar</p>
                                        <p class="pd_email">kumar@example.com</p>
                                        <p class="pd_exp"><span class="badge_pd">6+ <span>Experiance</span></span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="wrap_all_faculty">
                            <div class="wrap_main_info">
                                <a title="Sandeep Kumar" class="linker_card" href="/faculty-profile/1">
                                    <div class="faculty_box">
                                        <img class="faculty_imgs img-responsive"
                                            src="https://toplad.in/registration/api/uploads/photograph/cma_sandeep_kumar.jpg"
                                            alt="Faculty Image">
                                    </div>
                                    <div class="title-div personal_det">
                                        <p class="pd_name">Sandeep Kumar</p>
                                        <p class="pd_email">kumar@example.com</p>
                                        <p class="pd_exp"><span class="badge_pd">6+ <span>Experiance</span></span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="wrap_all_faculty">
                            <div class="wrap_main_info">
                                <a title="Sandeep Kumar" class="linker_card" href="/faculty-profile/1">
                                    <div class="faculty_box">
                                        <img class="faculty_imgs img-responsive"
                                            src="https://toplad.in/registration/api/uploads/photograph/cma_sandeep_kumar.jpg"
                                            alt="Faculty Image">
                                    </div>
                                    <div class="title-div personal_det">
                                        <p class="pd_name">Sandeep Kumar</p>
                                        <p class="pd_email">kumar@example.com</p>
                                        <p class="pd_exp"><span class="badge_pd">6+ <span>Experiance</span></span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div> -->


                        @if(count($users) > 0)
                        <div class="all_faculty">
                            @foreach($users as $user)
                            <div class="wrap_all_faculty">
                                <div class="wrap_main_info">
                                    <a title="{{ ucwords($user['name']) }}" class="linker_card"
                                        href="/faculty/{{ $user['slug'] }}">
                                        <div class="faculty_box">
                                            @if($user['photo'])
                                            <img class="faculty_imgs img-responsive" src="{{  asset($user['photo']) }}"
                                                alt="Faculty Image">
                                            @else
                                            <img class="faculty_imgs img-responsive"
                                                src="{{  asset('images/default-user-icon.jpg') }}" width="132"
                                                height="132" alt="Faculty Image">
                                            @endif
                                        </div>
                                        <div class="title-div">
                                            {{ ucwords($user['name']) }}
                                        </div>

                                    </a>

                                </div>
                            </div>
                            @endforeach
                        </div>


                        <div class="pagging_main">
                            <div class="pagging_texter">
                                Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }}
                                entries
                            </div>
                            <div class="pagging_listung">
                                {{ $users->links() }}
                            </div>
                        </div>

                    </div>

                    @else
                    <p class="form-group row justify-content-center" style="color:red; font-weight: bold;">
                        Faculty Not Found
                    </p>
                    @endif

                </div>
            </div>
        </div>
    </section>
</div>
@endsection