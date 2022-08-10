@extends('layouts.layout')

@section('content')

<div class="inner_theme_page output_pages">
    <nav aria-label="breadcrumb" class="bdcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li title="Payment Status" class="breadcrumb-item active" aria-current="page">Payment Status</li>
            </ol>
        </div>
    </nav>
    <section class="payment-status">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 ftco-animate">
                    <h2 class="payments_titles">Payment Status</h2>
                    <div class="order-box text-center">
                        <div class="icon_box"><i class="fa fa-check-circle" aria-hidden="true"></i></div>
                        <h3>Thank You</h3>
                        <p>Your transaction is successfully completed.</p>
                        <div class="btn_group payment_page">
                            <a href="/" class="btn btn-primary f-size trans_brdr">Home</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection