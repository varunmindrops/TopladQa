@extends('layouts.cs-layout')

@prepend('head-data')
<title>CS Face to Face Classes | CS Classes | Toplad</title>
<meta name="description"
    content="Learn from India's top CS faculty at Toplad. We are dedicated to making it possible for anyone, anywhere, at any time to study CS. Join Us Now.">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="keywords" content="CS, CS courses online, CSEET, CS Executive, CS Professional, Top Faculty of India, Academy of Excellence, CS in Future, CS Books, Online CS Classes" />
@endprepend

@section('content')

<div class="banner_f2f mobile_pdt_only">

    <img src="{{ asset('images/f2fpage_banner.png') }}" class="img-responsive">
</div>
<div class="container brd-cumb">
    <div class="row no-gutters slider-text  align-items-end justify-content-center">
        <div class="col-md-12 ftco-animate pt-4 text-left">
            <p class="breadcrumbs mb-0">
                <span class="mr-2">
                    <a title="Home" href="/">Home <i class="ion-ios-arrow-forward"></i></a>
                </span>
                <span class="mr-2">
                    <a title="Face To Face Classes" class="active-breadcumb">Face To Face Classes</a>
                </span>
            </p>
        </div>
    </div>
</div>


<section class="inner_pcontent f2fclass">

    <div class="wrap_f2fimg">
        <div class="container">
            <h1 class="mini_htitles">Face To Face Classes</h1>

        </div>
    </div>
    <div class="f2f_info desktop_f2f">
        <div class="wrap_f2fimg">
            <div class="container">

                <div class="f2f_block">

                    <img src="{{ asset('images/f2f_detail1.png') }}" alt="F2F Details" class="img-responsive ftf_desk">
                    <img src="{{ asset('images/f2f_detail_mobile1.png') }}" alt="F2F Details"
                        class="img-responsive ftf_mob">

                </div>

            </div>
        </div>

        <div class="wrap_f2fimg bg-gray">
            <div class="container">
                <div class="f2f_block">

                    <img src="{{ asset('images/f2f_detail2.png') }}" alt="F2F Details" class="img-responsive ftf_desk">
                    <img src="{{ asset('images/f2f_detail_mobile2.png') }}" alt="F2F Details"
                        class="img-responsive ftf_mob">

                </div>
            </div>
        </div>
        <div class="wrap_f2fimg">
            <div class="container">
                <div class="f2f_block">

                    <img src="{{ asset('images/f2f_detail3.png') }}" alt="F2F Details" class="img-responsive ftf_desk">
                    <img src="{{ asset('images/f2f_detail_mobile3.png') }}" alt="F2F Details"
                        class="img-responsive ftf_mob">

                </div>
            </div>
        </div>

</section>


@endsection