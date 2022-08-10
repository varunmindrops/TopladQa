@php
$total_price = 0;
foreach($cart as $c) {
$total_price += $c->proposed_market_price;
}
@endphp

@extends('layouts.layout')

@prepend('head-data')
<title>Cart Login - CMA Students | CS Students | CA Students | Online classes</title>
<meta name="description"
    content="Learn from India's top CMA, CS & CA faculty at Toplad. We are dedicated to making it possible for anyone, anywhere, at any time to study CMA, CS & CA.">
<meta name="keywords"
    content="CMA, CS, CA, CMA courses online, CS courses online, CA courses online, CMA Foundation to Final, CA Foundation to Final, Top CMA Faculty of India, Top CS Faculty of India, Top CA Faculty of India, Academy of Excellence, CMA in Future, CS in Future, CA in Future, CMA Books, CS Books, CA Books, Online CMA Classes, Online CS Classes, Online CA Classes" />
@endprepend

@section('content')
<div class="inner_theme_page p-b40">
    <nav aria-label="breadcrumb" class="bdcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li title="Cart" class="breadcrumb-item active" aria-current="page">Cart</li>
            </ol>
        </div>
    </nav>
    <div class="wrap_theme_pages">
        <section class="produt_check_out">
            <div class="container">
                @if(!empty($cart))
                <div class="row flex-wrap-reverse">
                    <div class="col-md-8 col-sm-12">
                        <div class="product-form-checkout">
                            <h1 class="inner_page_title mb-3 pt-0 f-34">Product Cart</h1>
                            <div class="cart_data">
                                <div class="wrap_cart_data">
                                    <ul>
                                        @foreach($cart as $data)
                                        <li>
                                            <div class="cart_listing">
                                                <form action="/cart/{{ $data->id }}" method="POST" name="delete_cart">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn remove_carter"><span
                                                            class="cancel_cart"><i class="fa fa-times"
                                                                aria-hidden="true"></i></span></button>
                                                </form>
                                                <!-- <span class="cancel_cart"><i class="fa fa-times" aria-hidden="true"></i></span> -->
                                                <div class="product-img">
                                                    <img src="{{  asset('images/cou-img.jpg') }}">
                                                </div>
                                                <div class="product_infos">
                                                    <h3><a>{{ $data->product_name }}</a></h3>
                                                    <p>by <span class="name_teacher">{{ $data->product_user }}</span>
                                                    </p>
                                                    <span class="pricing_cart">₹
                                                        {{ $data->proposed_market_price }}</span>
                                                </div>
                                            </div>
                                            <div class="other_infos">
                                                <div class="wrap_qty">
                                                    <label>Product Delivery Type</label>
                                                    <p>{{ $data->video_delivery_type}} ,{{ $data->book_delivery_type }}
                                                    </p>
                                                </div>
                                                <div class="wrap_qty">
                                                    <label>Product Language</label>
                                                    <p>{{ $data->lang}}</p>
                                                </div>
                                                <div class="wrap_qty">
                                                    <label>Attempt</label>
                                                    <p>{{ $data->attempt }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="btn_group cart_btns">
                                    <a title="Continue Shopping"
                                        href="{{ url('/cma/cma-classes-videos-all-papers-subjects') }}"
                                        class="btn btn-primary f-size trans_brdr">Continue
                                        Shopping</a>

                                    <!-- <button class="btn btn-primary f-size" type="submit">Checkout</button> -->
                                    <a title="Checkout" href="{{ url('checkout') }}"
                                        class="btn btn-primary f-size">Checkout</a>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="order-box">

                            <div class="summary">
                                <h5>Summary</h5>
                                <table class="table mb-0 table-borderless">
                                    <tr>
                                        <td>Original price:</td>
                                        <td>₹ {{ $total_price }}</td>
                                    </tr>
                                    <!-- <tr>
								<td>Coupon Discounts:</td>
								<td>₹ 00.00</td>
							</tr>
							<tr>
								<td>Subtotal:</td>
								<td>₹ {{ $total_price }}</td>
							</tr>
							<tr>
								<td>Estimated Tax: </td>
								<td>₹ 00.00</td>
							</tr> -->
                                    <tr>
                                        <td class="total-price">Total </td>
                                        <td class="total-price">₹ {{ $total_price }}</td>
                                    </tr>
                                </table>
                            </div>
                            <!-- <div class="coup-on-ap mt-1">
						<div class="btn-buy-now" id="coup-btn">
							Apply Coupon
						</div>
						<form class="text-center coup-form">
							<div class="form-group text-center">
								<input type="text" class="form-control text-center" placeholder="Enter Coupon">
							</div>
							<p type="submit" id="codeapply" class="btn btn-primary">Apply</p>
						</form>
						<p class="co-ss mb-0 text-center text-success">Coupon Successfully Applied </p>
					</div> -->
                        </div>
                    </div>
                </div>
                @else
                <div class="row flex-wrap-reverse cart_else_panel">
                    <!-- <h3>Cart is empty</h3> -->

                    <div class="common_cart">
                        <div class="empty_cart">
                            <!-- <i class="fa fa-shopping-cart" aria-hidden="true"></i> -->
                            <img src="{{ asset('images/icon/supermarket-blue.svg') }}" class="cart_icons"
                                alt="Cart Icon">
                        </div>
                        <div class="empty_cart_content">
                            <h5>Your cart is empty!</h5>
                            <p>Add items to it now.</p>
                        </div>
                        <div class="cart_btns">
                            <!-- <button type="submit" class="btn btn-primary mb-2">Buy Now</button> -->
                            <a title="Buy Now" href="/cma/cma-classes-videos-all-papers-subjects"
                                class="btn btn-primary mb-2">Buy Now</a>
                        </div>
                    </div>

                    <!-- <div class="common_cart">
				<div class="empty_cart">
				<img src="{{ asset('images/icon/supermarket-blue.svg') }}" class="cart_icons" alt="Cart Icon">
				</div>
				<div class="empty_cart_content">
					<h5>Missing cart items?</h5>
					<p>Login to see the items you added previously</p>
				</div>
				<div class="cart_btns">
						<button type="submit" class="btn btn-primary mb-2">Login</button>
					</div>
			</div> -->
                </div>
                @endif

            </div>
        </section>
    </div>
</div>
@endsection