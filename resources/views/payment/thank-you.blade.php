@extends($name=='cma' ? 'layouts.cma-layout' : (($name=='cs') ? 'layouts.cs-layout' : (($name=='ca') ? 'layouts.ca-layout' : 'layouts.layout')))

@prepend('head-data')
<title>Thank you | Toplad - Best {{ strtoupper($name) }} classes | All Subjects</title>
<meta http-equiv="refresh" content="20;url=http://{{ request()->getHttpHost() }}/{{ $name }}" />
<meta name="description"
    content="Learn from India's top {{ strtoupper($name) }} faculty at Toplad. We are dedicated to making it possible for anyone, anywhere, at any time to study {{ strtoupper($name) }}. Join Us Now.">
@endprepend

@section('temporary')
    <script>
        var dataLayer  = window.dataLayer || [];
        dataLayer.push({
          'event': 'transaction',
          'ecommerce': {
            'currencyCode':'INR', 
            'purchase': {
              'actionField': {
                'id': '{{ $order['rzp_order_id'] ?? '' }}',                
                'revenue': '{{ $order['total_amount'] ?? ''}}', 
                     },
              'products': [
        @php
            $product_type=$order['order_details_new'][0]['product_type'] ?? '' ;
            if(!empty($order['order_details_new']))
            {
            foreach($order['order_details_new'] as $key=>$value)
            {
        @endphp
                  {         
                'name': '{{ $value['mst_subject']['name'] }}',  
                'category':'{{ $value['product_type'] }}',
                'price': '{{ $value['price'] }}',
               },

        @php
               
            }
        }else{
            @endphp
            {         
                'name': '',  
                'category':'',
                'price': '{{ $order['total_amount'] }}',
               },
            @php
        }
        @endphp
            ]
            }
          }
        })
        
    </script>
@endsection

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
                        <div class="icon_box"><i class="fa fa-check-circle" aria-hidden="true"></i></div>
                        <h3>Thank You</h3>

                        @if($product_type=='capsule')
                        <p>We will be sending the Capsule Class Google link on email within 48 Hours.</p>
                        @elseif ($product_type=='chapter')
                        <p>We will be sending the Chapters link on email within 48 Hours</p>
                        @elseif ($product_type=='combo')
                        We will be sending the Combo Class within 48 Hours.
                        @elseif ($product_type=='book')
                        <p>We will be sending the Books within 7 working days.</p>
                        @elseif ($product_type=='past papers')
                        <p>We will be sending the Papers Google link on email within 48 Hours.</p>
                        @else
                        <p>Your transaction is successfully completed.</p>
                        @endif

                        <div class="btn_group payment_page">
                            <a href="/" class="btn btn-primary f-size trans_brdr">Home</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
  
</div>
@endsection