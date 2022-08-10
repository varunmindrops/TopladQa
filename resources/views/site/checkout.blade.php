@php
$userArr = $user->toArray();

$total_cart_price = 0;
foreach($cart as $c) {
$total_cart_price += $c->proposed_market_price;
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
                <li title="Checkout" class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div>
    </nav>
    <div class="wrap_theme_pages">
<section class="ftco-section produt_check_out">
    <div class="container">
        <div class="row flex-wrap-reverse">
            <div class="col-sm-8">
                <form action="/checkout/{{Auth::id()}}" method="POST" name="checkout_form" id="checkout_form"
                    autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="product-form-checkout">
                        <h1 class="inner_page_title mb-3 pt-0 f-34">Product Checkout</h1>
                        <div class="personal-info mb-15">
                            <p>Personal information</p>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Full Name"
                                            value="{{ $user['name'] }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Email"
                                            value="{{ $user['email'] }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Phone Number"
                                            value="{{ $user['phone'] }}" disabled>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="name" value="{{ $user['name'] }}">
                                <input type="hidden" class="form-control" name="email" value="{{ $user['email'] }}">
                                <input type="hidden" class="form-control" name="phone" value="{{ $user['phone'] }}">
                                <input type="hidden" name="price_total" value="{{ $total_cart_price }}">
                            </div>
                        </div>
                        <div class="ship-info mb-15">
                            <div>
                                <p>Billing Address</p>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="asterisk">Address <span
                                                    class="mini_adder">(Area/Colony/Street/Sector/Village)</span></label>
                                            <input type="text"
                                                class="form-control @error('bill_address') is-invalid @enderror"
                                                id="bill_address" name="bill_address"
                                                value="{{ old('bill_address', $user['billAddress']['address'] ?? '' ) }}"
                                                placeholder="Address" autofocus>
                                            @error('bill_address')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="asterisk">City <span
                                                    class="mini_adder">(City/District/Town)</span></label>
                                            <input type="text"
                                                class="form-control @error('bill_city') is-invalid @enderror"
                                                id="bill_city" name="bill_city"
                                                value="{{ old('bill_city', $user['billAddress']['city'] ?? '' ) }}"
                                                placeholder="City" autofocus>
                                            @error('bill_city')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="asterisk" for="bill_state">State</label>
                                            <select class="form-control @error('bill_state') is-invalid @enderror"
                                                name="bill_state" id="bill_state"
                                                value="{{ old('bill_state', $user['billAddress']['state_id'] ?? '' ) }}"
                                                autofocus>
                                                <option value="">Select State</option>
                                                @foreach($state as $bill_state)
                                                <option value="{{$bill_state->id}}" <?php if ($user['billAddress']) {
                                                                                        {{ echo old('bill_state', $user['billAddress']['state_id']) == $bill_state['id'] ? 'selected' : '';}}
																					} else { {{ echo old('bill_state') == $bill_state['id'] ? 'selected' : '';}} } ?>>
                                                    {{$bill_state['name']}}</option>
                                                @endforeach
                                            </select>
                                            @error('bill_state')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="asterisk" for="bill_country">Country</label>
                                            <select class="form-control @error('bill_country') is-invalid @enderror"
                                                id="bill_country" name="bill_country"
                                                value="{{ old('bill_country', $user['billAddress']['country_id'] ?? '' ) }}"
                                                autofocus>
                                                <option value="">Select Country</option>
                                                @foreach($country as $bill_country)
                                                <option value="{{$bill_country->id}}" <?php if ($user['billAddress']) {
                                                                                            {{ echo old('bill_country', $user['billAddress']['country_id']) == $bill_country['id'] ? 'selected' : '';}}
																						} else { {{ echo old('bill_country') == $bill_country['id'] ? 'selected' : '';}} }?>>
                                                    {{$bill_country['name']}}</option>
                                                @endforeach
                                            </select>
                                            @error('bill_country')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="asterisk">Pin Code</label>
                                            <input type="text"
                                                class="form-control @error('bill_pincode') is-invalid @enderror"
                                                id="bill_pincode" name="bill_pincode"
                                                value="{{ old('bill_pincode', $user['billAddress']['pin_code'] ?? '' ) }}"
                                                placeholder="Pincode" autofocus>
                                            @error('bill_pincode')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Landmark</label>
                                        <input type="text" class="form-control" id="bill_landmark" name="bill_landmark"
                                            value="{{ old('bill_landmark', $user['billAddress']['landmark'] ?? '' ) }}"
                                            placeholder="Landmark">
                                    </div>
                                </div>
                            </div>

                            <div style="margin:20px 0px 0px" class="second_address">
                                <div class="new_addresser">
                                    <p>Shipment Address</p>
									<div class="row">
                                    <div class="col-sm-12 check_selection">
                                        <input type="checkbox" name="different_ship_address"
                                            id="different_address_checkbox" value="yes"
                                            <?php {{ echo old('different_ship_address', $user['shipAddress'] && $user['shipAddress']['different_ship_address'] ?? '') == "yes" ? 'checked' : '' ;}} ?>>
                                        <label for="different_address_checkbox">Different Shipping Address ?</label>
                                    </div>
									</div>
                                </div>
                                <div id="shipment_address_div" class="row"
                                    style="<?php {{ echo old('different_ship_address', $user['shipAddress'] && $user['shipAddress']['different_ship_address'] ?? '') == "yes" ? '' : 'display:none' ;}} ?>">


                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="asterisk">Address <span
                                                    class="mini_adder">(Area/Colony/Street/Sector/Village)</span></label>
                                            <input type="text"
                                                class="form-control @error('ship_address') is-invalid @enderror"
                                                id="ship_address" name="ship_address"
                                                value="{{ old('ship_address', $user['shipAddress']['address'] ?? '') }}"
                                                placeholder="Address" autofocus>
                                            @error('ship_address')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="asterisk">City <span
                                                    class="mini_adder">(City/District/Town)</span></label>
                                            <input type="text"
                                                class="form-control @error('ship_city') is-invalid @enderror"
                                                id="ship_city" name="ship_city"
                                                value="{{ old('ship_city', $user['shipAddress']['city'] ?? '' ) }}"
                                                placeholder="City" autofocus>
                                            @error('ship_city')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="asterisk" for="ship_state">State</label>
                                            <select class="form-control @error('ship_state') is-invalid @enderror"
                                                id="ship_state" name="ship_state"
                                                value="{{ old('ship_state', $user['shipAddress']['state_id'] ?? '' ) }}"
                                                autofocus>
                                                <option value="">Select State</option>
                                                @foreach($state as $ship_state)
                                                <option value="{{$ship_state->id}}" <?php if ($user['shipAddress']) {
                                                                                        {{ echo old('ship_state', $user['shipAddress']['state_id']) == $ship_state['id'] ? 'selected' : '';}}
																					} else { {{ echo old('ship_state') == $ship_state['id'] ? 'selected' : '';}} } ?>>
                                                    {{$ship_state['name']}}</option>
                                                @endforeach
                                            </select>
                                            @error('ship_state')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="asterisk" for="ship_country">Country</label>
                                            <select class="form-control @error('ship_country') is-invalid @enderror"
                                                id="ship_country" name="ship_country"
                                                value="{{ old('ship_country', $user['shipAddress']['country_id'] ?? '') }}"
                                                autofocus>
                                                <option value="">Select Country</option>
                                                @foreach($country as $ship_country)
                                                <option value="{{$ship_country->id}}" <?php if ($user['shipAddress']) {
                                                                                            {{ echo old('ship_country', $user['shipAddress']['country_id']) == $ship_country['id'] ? 'selected' : '';}}
																						} else { {{ echo old('ship_country') == $ship_country['id'] ? 'selected' : '';}} } ?>>
                                                    {{$ship_country['name']}}</option>
                                                @endforeach
                                            </select>
                                            @error('ship_country')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="asterisk">Pin Code</label>
                                            <input type="text"
                                                class="form-control @error('ship_pincode') is-invalid @enderror"
                                                id="ship_pincode" name="ship_pincode"
                                                value="{{ old('ship_pincode', $user['shipAddress']['pin_code'] ?? '' ) }}"
                                                placeholder="Pincode" autofocus>
                                            @error('ship_pincode')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Landmark</label>
                                        <input type="text" class="form-control" id="ship_landmark" name="ship_landmark"
                                            value="{{ old('ship_landmark', $user['shipAddress']['landmark'] ?? '') }}"
                                            placeholder="Landmark">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary mb-2">Place Your Order and Pay</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-4">
                <div class="order-box">
                    <div class="product-img">
                        <img src="{{  asset('images/cou-img.jpg') }}">
                    </div>
                    <div class="buy-detail">
                        <!-- <h4>Fundamentals of Economics and Management</h4>
							<span><b>Raghav Goel</b></span> -->
                        <!-- <p>₹ 5,000.00</p> -->
                    </div>
                    <hr>
                    <div class="summary">
                        <!-- <h5>Summary</h5> -->
                        <table class="table mb-0 table-borderless">
                            <!-- <tr>
								<td>Original price:</td>
								<td>₹ {{ $total_cart_price }}</td>
							</tr>
							<tr>
								<td>Coupon discounts:</td>
								<td>₹ 0</td>
							</tr>
							<tr>
								<td>Subtotal:</td>
								<td>₹ {{ $total_cart_price }}</td>
							</tr>
							<tr>
								<td>Estimated Tax: </td>
								<td>₹ 0</td>
							</tr> -->
                            <tr>
                                <td class="total-price">Total </td>
                                <td class="total-price">₹ {{ $total_cart_price }}</td>
                            </tr>
                        </table>
                    </div>
                    <!-- <div class="coup-on-ap mt-1">
						<div class="btn-buy-now" id="coup-btn">
							Apply Coupon
						</div>
						<div class="form-group text-center">
							<input type="text" class="form-control text-center" placeholder="Enter Coupon">
						</div>
						<p type="submit" id="codeapply" class="btn btn-primary">Apply</p>
						<p class="co-ss mb-0 text-center text-success">Coupon Successfully Applied </p>
					</div> -->
                </div>
            </div>
        </div>
    </div>
</section>

																					</div>
																					</div>
@endsection

@push('scripts')
<script>
$(document).on('ready', function() {
    let arrBillAddress = <?php echo json_encode($userArr['bill_address']); ?>;
    let arrShipAddress = <?php echo json_encode($userArr['ship_address']); ?>;
    // console.log('add', arrShipAddress);
    $('#different_address_checkbox').on('click', function(e) {
        if ($(this).is(':checked')) {
            $('#ship_address').val('');
            $('#ship_apartment').val('');
            $('#ship_city').val('');
            $('#ship_state').val('');
            $('#ship_country').val('');
            $('#ship_pincode').val('');
            $('#ship_landmark').val('');
            $('#shipment_address_div').show();
        } else {
            if (arrShipAddress) {
                $('#ship_address').val(arrShipAddress['address']);
                $('#ship_apartment').val(arrShipAddress['apartment']);
                $('#ship_city').val(arrShipAddress['city']);
                $('#ship_state').val(arrShipAddress['state_id']);
                $('#ship_country').val(arrShipAddress['country_id']);
                $('#ship_pincode').val(arrShipAddress['pin_code']);
                $('#ship_landmark').val(arrShipAddress['landmark']);
            } else if (arrBillAddress) {
                $('#ship_address').val(arrBillAddress['address']);
                $('#ship_apartment').val(arrBillAddress['apartment']);
                $('#ship_city').val(arrBillAddress['city']);
                $('#ship_state').val(arrBillAddress['state_id']);
                $('#ship_country').val(arrBillAddress['country_id']);
                $('#ship_pincode').val(arrBillAddress['pin_code']);
                $('#ship_landmark').val(arrBillAddress['landmark']);
            } else {
                $('#ship_address').val('');
                $('#ship_apartment').val('');
                $('#ship_city').val('');
                $('#ship_state').val('');
                $('#ship_country').val('');
                $('#ship_pincode').val('');
                $('#ship_landmark').val('');
            }
            $('#shipment_address_div').hide();
        }
    });
});
</script>
@endpush