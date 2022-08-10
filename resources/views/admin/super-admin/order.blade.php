@extends('layouts.admin-layout')

@section('content')

@include('admin.super-admin.layouts.sidebar')
<div class="content_super supar_main_cont">

    <div class="wrap_tab_contents">
        <div class="container-fluid">
            <div class="card_info shadow_blk">
                <h4 class="font-italic mb-2">Manage Orders</h4>
                <div class="col-lg-12 order_table">
                    <div class="table-responsive wrap_table_main_data">
                        <table class="table table-bordered data-table" id="order_table">
                            <thead>
                                <tr>
                                    <th>Order No.</th>
                                    <th>Course Name</th>
                                    <th width="60px">Order Placed</th>
                                    <th>Amount</th>
                                    <th width="50px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- View Order Modal -->
                <div id="vieworder" class="modal fade common_model" role="dialog">
                    <div class="modal-dialog">
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
                                            <h3>Product Details</h3>
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

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="vo_section">
                                            <h3>Customer Information</h3>
                                            <div class="col wrap_dual_col">
                                                <div class="col-md-6 sec_colls half_sec_cols">
                                                    <h5></h5>
                                                    <div class="info_add oview_wrap">
                                                        <p>Personal Details:
                                                            <span>
                                                                <span style="display:inline;" id="user_name"></span>|
                                                                <a href="#" style="display:inline;"
                                                                    id="user_email"></a>|
                                                                <span style="display:inline;" id="user_phone"></span>
                                                            </span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
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
                                <button type="submit" class="btn btn-primary f-size"
                                    style="visibility: hidden;">Download Invoice</button>
                                <button type="button" class="btn btn-primary f-size" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#order_table').DataTable({
        //processing: true,
        serverSide: true,
        ajax: "{{ url('admin-login/order') }}",
        order: [2, 'desc'],
        columns: [{
                data: 'order_no',
                name: 'order_no'
            },
            {
                data: 'order_details[].product_name',
                name: 'product_name',
            },
            {
                data: 'created_at',
                name: 'created_at',
                render: function(data) {
                    return (formatDateTimeToDate(data));
                }
            },
            {
                data: 'discounted_amount',
                name: 'discounted_amount',
                render: function(data) {
                    return "₹ " + data;
                }
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }

        ]
    });

    /* View Order */
    $(document).on('click', '.view-order', function() {
        var order_id = $(this).data('id');
        $.get('order/' + order_id, function(data) {
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
            $('.item_counts').html(data.order_details.length > 1 ? data.order_details.length +
                ' Items' : data.order_details.length + ' Item');
            $('#user_name').html(data.user.name);
            $('#user_email').html(data.user.email);
            $('#user_phone').html(data.user.phone);
            $('#bill_address').html(data.bill_address + ', ' + data.bill_address_city + ', ' +
                data.bill_address_state + ', ' + data.bill_address_country + ', ' + data
                .bill_address_pincode);
            $('#ship_address').html(data.ship_address + ', ' + data.ship_address_city + ', ' +
                data.ship_address_state + ', ' + data.ship_address_country + ', ' + data
                .ship_address_pincode);

        })
        $('#vieworder').modal('show');
    });
});
</script>

@endpush