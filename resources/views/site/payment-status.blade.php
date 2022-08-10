@extends('layouts.layout')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_4.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
</section>
<div class="container brd-cumb">
    <div class="row no-gutters slider-text  align-items-end justify-content-center">
        <div class="col-md-12 ftco-animate pt-4 text-left">
            <p class="breadcrumbs mb-0">
                <span class="mr-2">
                    <a href="/">Home <i class="ion-ios-arrow-forward"></i></a>
                </span>
                <span class="mr-2">
                    <a class="active-breadcumb" href="#">Payment Status</a>
                </span>
            </p>
            <!-- <h1 class="bread">CMA</h1> -->
        </div>
    </div>
</div>


<section class="ftco-section payment-status">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6 ftco-animate">
                <h2 class="mb-3 pt-0 f-34">Payment Status</h2>
                <div class="order-box text-center">
                    <div class="icon_box"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></div>
                    <h3>Payment Failed</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <div class="btn_group payment_page">
                        <a href="" class="btn btn-primary f-size trans_brdr">Try Again</a>


                    </div>
                </div>
                <div class="order-box text-center">
                    <div class="icon_box"><i class="fa fa-check-circle" aria-hidden="true"></i></div>
                    <h3>Thank You</h3>
                    <p>Your transaction is successfully completed.</p>
                    <div class="btn_group payment_page">
                        <a href="" class="btn btn-primary f-size trans_brdr">Home</a>


                    </div>
                </div>
            </div>
        </div>
</section>

@endsection