@php
$faculty_list = DB::table('users')->where('role', 'teacher')->where('status', 1)->whereNull('deleted_at')->orderBy('name', 'asc')->get();

$subject_list = DB::table('mst_subject')->whereNull('deleted_at')->orderBy('sort_order', 'asc')->get();
@endphp

@extends('layouts.layout')
@prepend('head-data')
<title>Sitemap - Best CMA classes | All Subjects</title>
<meta name="description" content="Learn from India's top CMA faculty at Toplad. We are dedicated to making it possible for anyone, anywhere, at any time to study CMA. Join Us Now.">
@endprepend
@section('content')

<div class="container brd-cumb  mobile_pdt_only">
    <div class="row no-gutters slider-text  align-items-end justify-content-center">
        <div class="col-md-12 ftco-animate pt-4 text-left">
            <p class="breadcrumbs mb-0">
                <span class="mr-2">
                    <a title="Home" href="/">Home <i class="ion-ios-arrow-forward"></i></a>
                </span>
                <span class="mr-2">
                    <a title="Sitemap" class="active-breadcumb">Sitemap</a>
                </span>
            </p>
        </div>
    </div>
</div>
<section class="ftco-section sitemap padding_align pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 heading-section">
                <h1 class="pt-0 f-34">Sitemap</h1>
                <ul class="site_sitemap">
                    <li><a title="Home" href="/">Home</a>
                        <ul class="child_map">
                            <li><a title="About Us" href="/about-us">About Us</a></li>
                        </ul>
                    </li>
                    <li><a title="All CMA Faculty" href="/all-faculty">All CMA Faculty</a>
                        <ul class="child_map">
                        @foreach($faculty_list as $faculty)
                            <li><a href="/faculty/{{$faculty->slug}}">{{ ucwords($faculty->name) }}</a></li>
                        @endforeach
                        </ul>
                    </li>
                    <li><a title="Course" href="/cma-classes-videos-all-papers-subjects">Course</a>
                        <ul class="child_map">
                        @foreach($subject_list as $subject)
                            <li><a href="/paper/{{ $subject->slug }}">{{ $subject->name }}</a></li>
                        @endforeach
                        </ul>
                    </li>
                    <li><a title="Login" href="/login">Login</a></li>
                    <li><a title="Register" href="/register">Register</a></li>
                    <li><a>Cart</a></li>
                    <!-- <li><a>Products</a></li>
                    <li><a>Faculty Profile</a></li> -->
                    <li><a title="Privacy & Poliyc" href="/privacy-policy">Privacy & Policy</a></li>
                    <li><a title="Terms & Use" href="/terms-of-use">Terms of Use</a></li>
                    <li><a title="FAQs" href="/faq">FAQs</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection