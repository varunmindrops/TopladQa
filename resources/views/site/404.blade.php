@extends('layouts.layout')
@prepend('head-data')
<title>404 Toplad - Best CMA classes | All Subjects</title>
<meta name="description"
    content="Learn from India's top CMA faculty at Toplad. We are dedicated to making it possible for anyone, anywhere, at any time to study CMA. Join Us Now.">
@endprepend
@section('content')
<div class="inner_theme_page output_pages">
    <nav aria-label="breadcrumb" class="bdcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li title="404" class="breadcrumb-item active" aria-current="page">404</li>
            </ol>
        </div>
    </nav>
    <section class="payment-status">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-6 ftco-animate">
                    <!-- <h2 class="mb-3 pt-0 f-34">Payment Status</h2> -->
                    <div class="order-box text-center">
                        <div class="icon_box"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></div>
                        <h3>404</h3>
                        <p>Page not Found</p>
                        <div class="btn_group payment_page">
                            <a title="Home" href="/" class="btn btn-primary f-size trans_brdr">Home</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection