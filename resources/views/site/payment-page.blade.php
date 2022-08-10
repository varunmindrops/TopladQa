@extends('layouts.layout')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url( {{ asset('images/bg_4.jpg') }} );"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
</section>
<section class="ftco-section payment-page">
    <div class="container">
        <div class="row flex-wrap-reverse">
            <div class="col-sm-8">
                <form action="/checkout/{{Auth::id()}}" method="POST" name="checkout_form" id="checkout_form">
                    @csrf
                    @method('PUT')
                    <div class="product-form-checkout">
                        <h3><b>Payment</b></h3>
                      
                        <div class="payment_wrap flex-d">
                            <div class="block_pay">
                                <!-- <h4><label><input checked type="radio" name="paytype" value="card_pay">Credit Card/Debit
                                        Card/ATM Card</label></h4> -->
                                <div class="form_data d-flex justify-content-between  paytype_block">
                                    <div class="col-md-2 col-sm-4">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input type="text" class="form-control" name="" placeholder="" value="+91">
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-sm-8">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" name=""
                                                placeholder="Enter your phone number" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name=""
                                                placeholder="Enter your email" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-left">
                                            <button type="submit" class="btn btn-primary mb-2">Confirm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="notify_secure">
                            <p>This payment is secured by Razorpay.</p>
                        </div>
                        <!-- <div class="payment_wrap flex-d">
                            <div class="block_pay">
                                <h4><label><input checked type="radio" name="paytype" value="card_pay">Credit Card/Debit
                                        Card/ATM Card</label></h4>
                                <div class="form_data d-flex justify-content-between  paytype_block">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Acount Holder Name</label>
                                            <input type="text" class="form-control" name=""
                                                placeholder="Enter A/c Holder Name" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Card Number</label>
                                            <input type="text" class="form-control" name=""
                                                placeholder="Enter Card Number" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Exp Date</label>
                                            <input type="date" class="form-control" name=""
                                                placeholder="Enter Exp. Date" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-left">
                                            <button type="submit" class="btn btn-primary mb-2">Confirm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                   
                        <!-- <div class="payment_wrap flex-d">
                            <div class="block_pay">
                                <h4><label><input type="radio" name="paytype" value="card_pay">UPI Pay</label></h4>
                                <div class="form_data d-flex justify-content-between  paytype_block">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label>Your UPI ID</label>
                                            <input type="text" class="form-control" name="" placeholder="Enter UPI ID"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 verify_upi">
                                        <div class="form-group">
                                            <label>Verify Now</label>
                                            <input type="button" class="form-control f-size ver_btns" name=""
                                                value="Verify">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- <div class="text-left">
                        <button type="submit" class="btn btn-primary mb-2">Confirm</button>
                    </div> -->
                </form>
            </div>
            <div class="col-sm-4">
                <div class="order-box">
                    <div class="product-img">
                        <img src="/images/cou-img.jpg">
                    </div>
                    <div class="buy-detail">
                        <!-- <h4>Fundamentals of Economics and Management</h4>
							<span><b>Raghav Goel</b></span> -->
                        <!-- <p>₹ 5,000.00</p> -->
                    </div>
                    <hr>
                    <div class="summary">
                        <h5>Summary</h5>
                        <table class="table mb-0 table-borderless">
                            <tr>
                                <td>Original price:</td>
                                <td>₹ 2000</td>
                            </tr>
                            <tr>
                                <td>Coupon discounts:</td>
                                <td>₹ 0</td>
                            </tr>
                            <tr>
                                <td>Subtotal:</td>
                                <td>₹ 2000</td>
                            </tr>
                            <tr>
                                <td>Estimated Tax: </td>
                                <td>₹ 0</td>
                            </tr>
                            <tr>
                                <td class="total-price">Total </td>
                                <td class="total-price">₹ 2000</td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<script>
$(document).ready(function() {
    $('input[type="radio"]').click(function() {
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".paytype_block").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>