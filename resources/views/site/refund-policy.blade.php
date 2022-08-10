@extends('layouts.layout')

@prepend('head-data')
<title>Refund Policy  - CMA Students | CS Students | CA Students | Online Classes</title>
<meta name="description"
    content="We try our best to create the suitable videos for the learning of the users.If you are displeased with the product provided, we will refund back the money, provided the reasons are genuine and proved after investigation. You will not get any refund for purchases. Incase it's a technical issue, we will help you resolve it.">
<meta name="keywords"
    content="CMA, CS, CA, CMA courses online, CS courses online, CA courses online, CMA Foundation to Final, CA Foundation to Final, Top CMA Faculty of India, Top CS Faculty of India, Top CA Faculty of India, Academy of Excellence, CMA in Future, CS in Future, CA in Future, CMA Books, CS Books, CA Books, Online CMA Classes, Online CS Classes, Online CA Classes" />
@endprepend

@section('content')

<div class="inner_theme_page">
<nav aria-label="breadcrumb" class="bdcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li title="Refund Policy" class="breadcrumb-item active" aria-current="page">Refund Policy</li>
            </ol>
        </div>
    </nav>
    <div class="wrap_theme_pages">
        
        <section class="policy_pre about_us">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 heading-section full_width_flex">
                        <h1 class="inner_theme_title">Refund Policy</h1>
                        <div class="text_contents">

                            <div class="wrap_peragraphs">
                                <p class="m-size"> Our focus is complete customer satisfaction. In the event, if you are displeased with the product  provided, we will refund back the money, provided the reasons are genuine and proved after investigation. Please read the <a title="FAQ" href="/faq">FAQ</a> of each Videos before buying it, it provides all the details about the Videos you will purchase.
                                </p>
                                <p class="m-size">
                                    For any query  please contact us via info@toplad.in or 011-41681230, 9953155682.
                                    <br/><br/>
                                    You will not get any refund for purchases. Incase it's a technical issue, we will help you resolve it.
                                    <br/><br/>
                                    We try our best to create the suitable videos for the learning of the users
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-full plain_card_div text-center p-t60 p-b40 m-t25">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xl-12 align-self-center p-b30">
                        <div class="section-head plain-card-without-border">
                            <h2>Achieve your goals with Toplad</h2>
                            <p class="m-size">Grab this opportunity and enrol yourself in the best online faculty in
                                CMA, CS
                                & CA.</p>
                            <div class="wt-separator-outer p-b30">
                                <div class="wt-separator bg-primary"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-sm-12 col-md-4 inner_pan_links">
                        <div class="plain-card-box">
                            <div class="plain-card">
                                <span class="plain-card_icon min_logos">
                                    <!-- <i class="fa fa-video-camera"></i> -->
                                    <img src="{{  asset('images/ra-logo/cma-toplad-logo.svg') }}">
                                </span>
                                <h5 class="acheive-title">CMA Courses</h5>
                                <p>Get the best <b>CMA courses</b> at
                                Toplad</p>
                                <a title="Buy Now" href="/cma/cma-classes-videos-all-papers-subjects"
                                    class="btn btn-primary m-t15">Buy Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-sm-12 col-md-4 inner_pan_links ">
                        <div class="plain-card-box">
                            <div class="plain-card">
                                <span class="plain-card_icon min_logos">
                                    <!-- <i class="fa fa-video-camera"></i> -->
                                    <img src="{{  asset('images/ra-logo/cs-toplad-logo.svg') }}">
                                </span>
                                <h5 class="acheive-title">CS Courses</h5>
                                <p>Get the best <b>CS courses</b> at
                                Toplad</p>
                                <a title="Buy Now" href="/cs/cs-classes-videos-all-papers-subjects"
                                    class="btn btn-primary m-t15">Buy Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-sm-12 col-md-4 inner_pan_links ">
                        <div class="plain-card-box">
                            <div class="plain-card">
                                <span class="plain-card_icon min_logos">
                                    <!-- <i class="fa fa-video-camera"></i> -->
                                    <img src="{{  asset('images/ra-logo/ca-toplad-logo.svg') }}">
                                </span>
                                <h5 class="acheive-title">CA Courses</h5>
                                <p>Get the best <b>CA courses</b> at
                                Toplad</p>
                                <a title="Buy Now" href="/ca/ca-classes-videos-all-papers-subjects"
                                    class="btn btn-primary m-t15">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection