@extends('layouts.admin-layout')

@prepend('head-data')
<title>Thank you | Toplad classes | All Subjects</title>
<meta name="description"
    content="Learn from India's top faculty at Toplad. We are dedicated to making it possible for anyone, anywhere, at any time to study. Join Us Now.">
    @endprepend
    @section('content')

    <div class="output_pages order_confirmed">
    <!-- <nav aria-label="breadcrumb" class="bdcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li title="Payment Status" class="breadcrumb-item active" aria-current="page">Order Status</li>
            </ol>
        </div>
    </nav> -->
    <section class="payment-status"> 
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 ftco-animate">
                    <h2 class="payments_titles">Payment Status</h2>
                <div class="order-box text-center">
                    <div class="icon_box"><img src="{{ asset('images/icon/fireworks.svg') }}" alt="Icon" class="img-responsive"></div>
                    <h3>Order Created Successfully</h3>
                
                    <div class="btn_group payment_page">
                        <a title="Home" href="/counsellor/order" class="btn btn-primary f-size trans_brdr">Order</a>
                    </div>
                </div>
            </div>
        </div>
</section>
</div>
@endsection
