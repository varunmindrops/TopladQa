@extends('layouts.layout')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url( {{ asset('images/bg_4.jpg') }} );" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
</section>
    <section class="ftco-section produt_check_out">
      <div class="container">
		<div class="row flex-wrap-reverse">
			<div class="col-sm-8">
				<div class="product-form-checkout">
					<form class="form">
						<h3>Product Checkout</h3>
						<div class="ship-info mb-15">
							<div class="d-flex justify-content-between align-items-center">
								<h6>Shipping Address</h6>
								<h6><img class="edit-icon" id="editaddress" src="/images/edit.png"></h6>
							</div>
							<div class="old-address">
								<p>Shubham Bhatt</p>
								<p>T-4/48 palm olympia</p>
								<p>greater noida west sector 16c noida</p>
								<p>GHAZIABAD, UTTAR PRADESH 201009</p>
								<p>India</p>
								<p>phone: 875572603</p>
								<div class="text-right">
									<button type="submit" class="btn btn-primary mb-2">Place Your Order and Pay</button>
								</div>
							</div>
							<div class="new-address mb-15">
								<p>New Address</p>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<!-- <input type="text" class="form-control" placeholder="Address" > -->
											<textarea class="form-control" placeholder="Address" id="exampleFormControlTextarea1" rows="3"></textarea>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Apartment, suite, etc. (optional)" >
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="City" >
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<select class="form-control">
												<option>Select State</option>
												<option>Delhi</option>
												<option>Changdigarh</option>
												<option>Mumbai</option>
												<option>Pune</option>
											</select>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<select class="form-control" id="exampleFormControlSelect1">
												<option>Select Country</option>
												<option>India</option>
											</select>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Pincode" >
										</div>
									</div>
								</div>
								<div class="form-group form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<label class="form-check-label" for="exampleCheck1">Save this information for next time</label>
								</div>
								<div class="accordion friend-add mb-15"  id="accordionExample">
									<div class="card">
									  <div class="card-header" id="headingOne">
										  <p class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											Delivery address (if customer is placing order for someone else or he is buying more than one packages, for himself and his friend)
										  </p>
									  </div>

									  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
										<div class="card-body">
											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<!-- <input type="text" class="form-control" placeholder="Address" > -->
														<textarea class="form-control" placeholder="Address" id="exampleFormControlTextarea1" rows="3"></textarea>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<input type="text" class="form-control" placeholder="Apartment, suite, etc. (optional)" >
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<input type="text" class="form-control" placeholder="City" >
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<select class="form-control">
															<option>Select State</option>
															<option>Delhi</option>
															<option>Changdigarh</option>
															<option>Mumbai</option>
															<option>Pune</option>
														  </select>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<select class="form-control" id="exampleFormControlSelect1">
															<option>Select Country</option>
															<option>India</option>
														  </select>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<input type="text" class="form-control" placeholder="Pincode" >
													</div>
												</div>
											</div>
											<div class="form-group mb-0 form-check">
												<input type="checkbox" class="form-check-input" id="exampleCheck1">
												<label class="form-check-label" for="exampleCheck1">Save this information for next time</label>
											</div>
										</div>
									  </div>
									</div>
								  </div>
								<div class="text-right">
									<button type="submit" class="btn save-address btn-primary mb-2">Save Address</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="order-box">
					<div class="product-img">
						<img src="/images/cou-img.jpg">
					</div>
					<div class="buy-detail">
						<h4>Fundamentals of Economics and Management</h4>
						<span><b>Raghav Goel</b></span>
						<!-- <p>₹ 5,000.00</p> -->
					</div>
					<hr>
					<div class="summary">
						<h5>Summary</h5>
						<table class="table mb-0 table-borderless">
							<tr>
								<td>Original price:</td>
								<td>₹ 5,000.00</td>
							</tr>
							<tr>
								<td>Coupon discounts:</td>
								<td>₹ 500.00</td>
							</tr>
							<tr>
								<td>Subtotal:</td>
								<td>₹ 4,500.00</td>
							</tr>
							<tr>
								<td>Estimated Tax:	</td>
								<td>₹ 00.00</td>
							</tr>
							<tr>
								<td class="total-price">Total </td>
								<td class="total-price">₹ 4,500.00</td>
							</tr>
						</table>
					</div>
					<div class="coup-on-ap mt-1">
						<div class="btn-buy-now" id="coup-btn">
							Apply Coupon
						</div>
						<form class="text-center coup-form">
							<div class="form-group text-center">
							  <input type="text" class="form-control text-center" placeholder="Enter Coupon" >
							</div>
							<p type="submit"  id="codeapply" class="btn btn-primary">Apply</p>
						</form>
						<p class="co-ss mb-0 text-center text-success">Coupon Successfully Applied </p>
					</div>
				</div>
			</div>
		</div>
	</div>
    </section>
@endsection
