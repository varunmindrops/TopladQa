@php
function getDateInSiteFormat($date, $withoutTime = false) {
$format = 'd-m-Y';
$format .= ($withoutTime) ? '' : ' H:i:s';
if ($date) {
$date = date($format, strtotime($date));
}
return $date;
}
@endphp

@extends('layouts.layout')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url( {{ asset('images/bg_4.jpg') }} );"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
</section>
<div class="main_class single_admin">
    <div class="container brd-cumb">
        <div class="row no-gutters slider-text  align-items-end justify-content-center">
            <div class="col-md-12 ftco-animate pt-4 text-left">
                <p class="breadcrumbs mb-0">
                    <span class="mr-2">
                        <a href="/">Home <i class="ion-ios-arrow-forward"></i></a>
                    </span>
                    <span class="mr-2">
                        <a href="profile">Students <i class="ion-ios-arrow-forward"></i></a>
                    </span>
                    <span class="mr-2">
                        <a class="active-breadcumb" href="#">Student Profile </a>
                    </span>
                </p>
                <!-- <h1 class="bread">CMA</h1> -->
            </div>
        </div>
    </div>

    <section class="ftco-section faclt-edit-page">
        <div class="container">
            <div class="row">
                <div class="edit_contents">
                    @include('admin.student.layouts.sidebar')
                    <div class="col-md-9 col-sm-8">
                        <div class="wrap_tab_contents">
                            <div class="card_info shadow_blk">
                                <h4 class="font-italic mb-2">Order History</h4>
                                <div class="form_data d-flex justify-content-between align-items-center">
                                    @if($orders->isEmpty())
                                    <div class="table_layut col-md-12 add_products">
                                        <div class="first_product">
                                            <p>You yet to purchase a course with us, click on buy now to purchase a
                                                course.
                                            </p>
                                            <div class="form-group update_btns p-0">
                                                <a href="/cma/cma-classes-videos-all-papers-subjects" class="btn btn-primary linked_btn f-size">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="table_layut col-md-12 product_table">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Order No.</th>
                                                        <th>Course Name</th>
                                                        <th>Order Placed</th>
                                                        <th>Amount</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($orders as $order)
                                                    <tr>
                                                        <td>{{ $order->order_no }}</td>
                                                        <td class="saprate_comma">
                                                            @foreach($order->orderDetails as $key => $od)
                                                            {{ $od->product_name }} by {{ $od->product->user->name }}
                                                            @if($key < count($order->orderDetails)-1 ), </br> @endif
                                                                @endforeach
                                                        </td>
                                                        <td>{{ getDateInSiteFormat($order->created_at, true) }}</td>
                                                        <td><i class="fa fa-rupee"></i>{{ $order->discounted_amount }}
                                                        </td>
                                                        <td><a href="#" id="show-order-button" data-toggle="modal"
                                                                data-target="#vieworder"
                                                                data-order_details="{{ $order }}">View Order</a></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group update_btns p-0">
                                            <a href="/cma/cma-classes-videos-all-papers-subjects" class="btn btn-primary linked_btn f-size">Courses <i
                                                    class="fa fa-plus" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
<!-- Modal -->
<div id="vieworder" class="modal fade common_model" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Order Details</h4> <button type="button" class="close"
                    data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="ov_notify">
                    <div class="col-md-12">
                        <!-- <p>We are delighted to inform you that your order has now been processed and dispatched. It will be arive in next 15 Working day.</p> -->
                        <div class="ov_info">
                            <p class="left_ov_info">Order Number:<span id="order_number"></span></p>
                            <!-- <p class="right_ov_info">Order placed on 02/08/2020 will be delivered on 15/08/2020</p> -->
                            <p class="right_ov_info" id="order_date"></p>
                        </div>
                    </div>
                </div>
                <!-- <hr class="ov_devider"> -->
                <div class="ov_main_wrap">
                    <div class="col-md-8 left_order common_order">
                        <div class="vo_section">
                            <h3>Product Detail</h3>
                            <div class="col-md-12 sec_colls">
                                <div class="table-responsive vo_table">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Course Name</th>
                                                <th>Faculty Name</th>
                                                <th>Attempt</th>
                                                <th>Language</th>
                                                <th>Delivery Method</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                            </tr>
                                        </thead>
                                        <tbody id="order_details_table">
                                            <!-- <tr>
                                                <td class="saprate_comma">Fundamentals of Economics & Management
                                                    (FEM)</td>
                                                <td>Abhilash</td>
                                                <td>December, 21 2021</td>
                                                <td>Pan Drive</td>
                                                <td class="price_set"><i class="fa fa-rupee"></i> 3000</td>
                                                <td>2</td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="vo_section">
                            <h3>Address Detail</h3>
                            <div class="col wrap_dual_col">
                                <div class="col-md-6 sec_colls half_sec_cols">
                                    <h5></h5>
                                    <div class="info_add oview_wrap">
                                        <p>Billing Address:
                                            <span id="bill_address"></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 sec_colls half_sec_cols">
                                    <h5></h5>
                                    <div class="info_add oview_wrap">
                                        <p>Shipping Address:
                                            <span id="ship_address"></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 right_order common_order">
                        <div class="vo_section side_panel">
                            <div class="summary">
                                <h3>Summary Detail</h3>
                                <table class="table mb-0 table-borderless">
                                    <tr>
                                        <td>Subtotal:<span class="item_counts"></span></td>
                                        <td>₹ <span id="order_subtotal"></span> </td>
                                    </tr>
                                    <!-- <tr>
                                            <td>Coupon Discounts:</td>
                                            <td>₹ 00.00</td>
                                        </tr>
                                        <tr>
                                            <td>Estimated Tax: </td>
                                            <td>₹ 00.00</td>
                                        </tr> -->
                                    <tr class="last_tital">
                                        <td class="total-price">Total </td>
                                        <td class="total-price">₹ <span id="order_total"></span> </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="vo_section">
                            <h3>Payment Method</h3>
                            <div class="col wrap_dual_col">
                                <div class="col-md-12 sec_colls half_sec_cols">
                                    <h5></h5>
                                    <div class="info_add oview_wrap">
                                        <p>Razorpay</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer dual_model_btn">
                <button type="submit" class="btn btn-primary f-size" style="visibility: hidden;">Download
                    Invoice</button>
                <button type="button" class="btn btn-primary f-size" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$('#vieworder').on('show.bs.modal', function(event) {
    const button = $(event.relatedTarget) // Button that triggered the modal
    const data = button.data('order_details') // Extract info from data-* attributes
    console.log(data);
    let strDetail = ``;

    $.each(data.order_details, function(key, item) {
        strDetail += `<tr>
                            <td class="saprate_comma">${item.product_name}</td>
                            <td>${item.product.user.name}</td>
                            <td>${item.attempt_name}</td>
                            <td>${item.mst_language.name}</td>
                            <td>${item.video_delivery_type.name}, ${item.book_delivery_type.name}</td>
                            <td class="price_set"><i class="fa fa-rupee"></i>${item.price}</td>
                            <td>1</td>
                        </tr>`;
    });
    $('#order_details_table').html(strDetail);
    $('#order_number').html(data.order_no);
    $('#order_date').html('Order placed on ' + formatDateTimeToDate(data.created_at));
    $('#order_subtotal').html(data.discounted_amount);
    $('#order_total').html(data.discounted_amount);
    $('.item_counts').html(data.order_details.length > 1 ? data.order_details.length + ' Items' : data
        .order_details.length + ' Item');
    $('#bill_address').html(data.bill_address + ', ' + data.bill_address_city + ', ' + data.bill_address_state +
        ', ' + data.bill_address_country + ', ' + data.bill_address_pincode);
    $('#ship_address').html(data.ship_address + ', ' + data.ship_address_city + ', ' + data.ship_address_state +
        ', ' + data.ship_address_country + ', ' + data.ship_address_pincode);
})
</script>
@endpush