@extends($name=='cma' ? 'layouts.cma-layout' : (($name=='cs') ? 'layouts.cs-layout' : (($name=='ca') ? 'layouts.ca-layout' : 'layouts.ca-layout')))

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
                    <div class="icon_box"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></div>
                    <h3>Payment Failed</h3>
                    <p>Sorry ! Some Error Occured.</p>
                    <div class="btn_group payment_page">
                    @if($name == 'cma')
                        <a href="/{{$name}}/{{$name}}-mtp-sale" class="btn btn-primary f-size trans_brdr">Try Again</a>
                    @elseif($name == 'ca')
                        <a href="/{{$name}}/{{$name}}-rtp-sale" class="btn btn-primary f-size trans_brdr">Try Again</a>
                    @endif
                    </div>
                </div>
            </div>
        </div>
</section>
</div>
@endsection