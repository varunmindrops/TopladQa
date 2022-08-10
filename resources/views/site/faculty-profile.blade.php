@if(!isset($user['slug']))
<script>
window.location = "{{ url('404') }}";
</script>
@else

@php
if(!empty($productsArr)) {
$random_products_array = array_rand($productsArr, 1);
}
$bio = $user['teacher']['bio'];
$description = substr($bio,0,155);
@endphp

@extends('layouts.layout')

@prepend('head-data')
<title>{{ ucwords($user['name']) }} | CMA | CS | CA | Faculty | Toplad</title>
<meta name="description" content="{{$description}}">
<meta name="keywords"
    content="CMA, CS, CA, CMA courses online, CS courses online, CA courses online, Foundation to Final, Top CMA Faculty of India, Top CS Faculty of India, Top CA Faculty of India, Academy of Excellence, CMA in Future, CS in Future, CA in Future, CMA Books, CS Books, CA Books, Online CMA Classes, Online CS Classes, Online CA Classes" />
@endprepend
@section('content')


<div class="inner_theme_page faculty_theme p-b40">
    <nav aria-label="breadcrumb" class="bdcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/all-faculty">Faculty List</a></li>
                <li title="Faculty Profile" class="breadcrumb-item active" aria-current="page">Faculty Profile</li>
            </ol>
        </div>
    </nav>

    <section class=" faclt-prof">
        <div class="container">
            <div class="fp_blockk row">
                <div class="col-md-8 col-sm-12 lfp_block">
                    <div class="shadow_blk introcard1">
                        <div class="prof-image">
                            @if($user['photo'])
                            <img class="img-fluid" src="{{  asset($user['photo']) }}" alt="">
                            @else
                            <img class="img-fluid" src="{{  asset('images/default-user-icon.jpg') }}" alt="">
                            @endif
                        </div>
                        <div class="prof-details">
                            <h1 class="mb-3 pt-0 f-34 mid_htitle">{{ ucwords($user['name']) }}</h1>
                            <div class="intro_fpb">
                            @if($user['teacher']['totalExperience'] != "")
                                <p class="pro_fpb">Total Experience: {{$user['teacher']['totalExperience']['experience']}}</p>
                            @endif
                            @if($user['teacher']['teachingExperience'] != "")
                                <p class="exp_fpb">Teaching Experience: {{$user['teacher']['teachingExperience']['experience']}}</p>
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="shadow_blk com_cards introcard2 com_lfpb">
                        <div class="prof-details">
                            <h3 class="fpb_title"><span><i class="fa fa-user" aria-hidden="true"></i></span> About
                            </h3>
                            <p>{!! nl2br(e($user['teacher']['bio'])) !!}</p>
                        </div>
                        <div class="study_cards"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            <span>{{$user['teacher']['edu_qualification']}}</span>
                        </div>
                    </div>
                    <div class="shadow_blk com_cards vid_fpb">
                        <div class=" courses_lays">
                            <h3 class="fpb_title accord_sh"><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>
                                Courses <span class="faclt_accord"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-minus" aria-hidden="true" style="display:none;"></i></span></h3>
                            <div class="wrap_all_vids course_facts">
                            
                            @foreach($products as $product)
                            @if(!empty($product->user_slug) && !empty($product->subject_slug))
                                <div class="you_vid">
                                <a href="/{{$product->course_value}}/product/{{$product->subject_slug}}-{{$product->user_slug}}/{{$product->id}}">
                                    <div class="goal_sec_icons">
                                        <img class="supported_img" src="{{ asset('images/icon/book_f2.svg') }}"
                                            alt="Format">
                                        <img class="supported_img" src="{{ asset('images/icon/pdf_f2.svg') }}"
                                            alt="Format">
                                        <img class="supported_img" src="{{ asset('images/icon/usb_f.svg') }}"
                                            alt="Format">
                                        <img class="supported_img" src="{{ asset('images/icon/vid_f2.svg') }}"
                                            alt="Format">
                                    </div>
                                    <div class="course_alls">
                                        <h5>{{$product->course_name}}</h5>
                                        <div class="pay_and_learn">
                                            <h3>{{$product->name}} </h3>
                                            <p>₹{{ round($product->minimum_price) }} – ₹{{ round($product->maximum_price) }} </p>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            @endif
                            @endforeach
                            
                            </div>
                        </div>
                    </div>
                 
                </div>
                <div class="col-md-4 col-sm-12 rfp_block">
                    <div class="shadow_blk introcard_s2 com_lfpb">
                        <div class="prof-details">
                            <h3 class="fpb_title"><span><i class="fa fa-book" aria-hidden="true"></i></span> Area of
                                Interest</h3>
                            <ul class="fpb_listings batch_area">
                                <li>
                                    {!! nl2br(e($user['teacher']['area_of_interest'])) !!}
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="shadow_blk introcard_s1 com_lfpb">
                        <div class="prof-details">
                            <h3 class="fpb_title"><span><i class="fa fa-book" aria-hidden="true"></i></span> Awards
                                &
                                Honors</h3>
                            <ul class="fpb_listings awards_own">
                                    {!! nl2br(e($user['teacher']['award_honour'])) !!}
                            </ul>
                        </div>
                    </div>

                    <div class="shadow_blk introcard_s1 com_lfpb">
                        <div class="prof-details">
                            <h3 class="fpb_title"><span><i class="fa fa-book" aria-hidden="true"></i></span>
                                Professional Affiliation</h3>
                            <ul class="fpb_listings awards_own comple_list">
                                {!! nl2br(e($user['teacher']['prof_achievement'])) !!}
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 rfp_block">
                    <div class="shadow_blk com_cards full_vid_vid">
                        <div class="demo_all_vids">
                            <h3 class="fpb_title accord_sh"><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>
                                Videos <span class="faclt_accord"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-minus" aria-hidden="true" style="display:none;"></i></span></h3>
                            <div class="wrap_all_vids">
                          
                            @foreach($user['product'] as $product)
                                    @foreach($product['dummyVideo'] as $video)
                                        @if($video['embed_link'])
                                            <div class="you_vid">
                                                {!! $video['embed_link'] !!}
                                            </div>
                                        @endif
                                    @endforeach 
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <!-- <section class="ftco-section faclt-prof">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="profile-fact">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex">
                                <div class="prof-image">
                                    @if($user['photo'])
                                    <img class="img-fluid" src="{{  asset($user['photo']) }}" alt="">
                                    @else
                                    <img class="img-fluid" src="{{  asset('images/default-user-icon.jpg') }}" alt="">
                                    @endif
                                </div>
                                <div class="prof-details">
                                    <h1 class="mb-3 pt-0 f-34 mid_htitle">{{ ucwords($user['name']) }}</h1>
                                    <p>{!! nl2br(e($user['teacher']['bio'])) !!}</p>
                                </div>
                            </div>
                            <div class=""></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="row">

                        @foreach($products as $product)

                        @if(!empty($product->user_slug) && !empty($product->subject_slug))
                        <div class="col-sm-3 op-hov">
                            <a title="{{ ucwords($user['name']) }}"
                                href="/product/{{$product->subject_slug}}-{{$product->user_slug}}/{{$product->id}}">
                                <div class="case_study_area product_area">
                                    <div class="single_study text-center">
                                        <div class="thumb">

                                        </div>
                                        <div class="details p-10 text-left update_content">
                                            <div class="wrap_main_info">
                                                <div class="course_info">
                                                    <span class="text-dark">
                                                        {{$product->course_name}} </span>
                                                </div>
                                                <span class="min_gapper"></span>
                                                <div class="title-div">
                                                    {{ ucwords($user['name']) }}
                                                </div>
                                                <div class="fromate-provide">
                                                    <img class="supported_img"
                                                        src="{{ asset('images/icon/book_f2.svg') }}" alt="Format">


                                                    <img class="supported_img"
                                                        src="{{ asset('images/icon/pdf_f2.svg') }}" alt="Format">


                                                    <img class="supported_img"
                                                        src="{{ asset('images/icon/usb_f.svg') }}" alt="Format">


                                                    <img class="supported_img"
                                                        src="{{ asset('images/icon/vid_f2.svg') }}" alt="Format">

                                                </div>
                                            </div>
                                            <div class="text-left outer_listc">
                                                <div class="course_info">
                                                    <span class="text-dark subject_namer">
                                                        {{$product->name}} </span>
                                                </div>
                                                <div class="cost_course">
                                                    <p>₹{{ $product->minimum_price }} – ₹{{ $product->maximum_price }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section> -->

</div>
@endsection
@endif

@push('scripts')

<script>


$("span.faclt_accord").click(function(){
  $(this).parent().parent().toggleClass("active");
});
</script>

@endpush
