@extends($name=='cma' ? 'layouts.cma-layout' : (($name=='cs') ? 'layouts.cs-layout' : (($name=='ca') ? 'layouts.ca-layout' : 'layouts.ca-layout')))

@prepend('head-data')
<title>Thank you | Toplad - Best {{ strtoupper($name) }} classes | All Subjects</title>
<meta name="description"
    content="Learn from India's top {{ strtoupper($name) }} faculty at Toplad. We are dedicated to making it possible for anyone, anywhere, at any time to study {{ strtoupper($name) }}. Join Us Now.">
    @endprepend
    @section('content')

    <div class="output_pages">
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
                    <div class="icon_box"><img src="{{ asset('images/icon/fireworks.svg') }}" alt="Icon" class="img-responsive"></div>
                    <h3>Thank You</h3>
                    <p>We will be sending the Capsule Class Google link on email within 48 Hours.</p>
                    <div class="btn_group payment_page">
                        <a title="Home" href="/" class="btn btn-primary f-size trans_brdr">Home</a>
                    </div>
                </div>
            </div>
        </div>
</section>
</div>
@endsection
