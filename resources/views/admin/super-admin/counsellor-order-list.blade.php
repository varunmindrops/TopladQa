@extends('layouts.admin-layout')

@section('content')

@include('admin.super-admin.layouts.sidebar')
<div class="content_super supar_main_cont">

    <div class="wrap_tab_contents">
        <div class="container-fluid">
            
            <div class="card_info shadow_blk">
                <h4 class="font-italic mb-2">Manage Orders</h4>

                <div class="col-lg-12 order_table">
                    <div class="table-responsive super_table">

                        <form type="GET" action="/admin-login/orders">
                            <div class="search_top order_search">
                                <div class="wrap_serpan">
                                    <input type="search" name="search" placeholder="search"
                                        class="form-control @error('search') is-invalid @enderror"
                                        value="{{ request('search') }}" autofocus>
                                    <button class="button btn" type="submit"><i class="fa fa-search"
                                            aria-hidden="true"></i></button>
                                </div>
                                @error('search')
                                <p class="error_result" style="color:red">{{$message}}</p>
                                @enderror
                            </div>
                        </form>

                        @if(count($data) > 0)
                        <table id="counsellor_table" class="table table-striped table-bordered data-table"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>Order No.</th>
                                    <th>Student Name</th>
                                    <th width="60px">Student Email</th>
                                    <th>Student Phone</th>
                                    <th>Payment Mode</th>
                                    <th>Payment Status</th>
                                    <th>Deliver To Student</th>
                                    <th>Order Placed</th>
                                    <th width="50px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $order)
                                <tr>
                                    <td>{{ $order['order_no'] }}</td>
                                    <td>{{ $order['user_name'] }}</td>
                                    <td>{{ $order['user_email'] }}</td>
                                    <td>{{ $order['user_phone'] }}</td>
                                    <td>{{ $order['payment_mode'] }}</td>
                                    <td>@if($order['payment_status'] == "successful")
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                    </td>
                                    <td>@if($order['deliver_status'] == "1")
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                    </td>
                                    <td>{{ $order['created_at'] }}</td>
                                    <td><button title="View" type="submit" class="table_btn edit_linker view-order" data-toggle="modal" data-id="{{ $order['id'] }}"><span><i class="fa fa-eye" aria-hidden="true"></i></span></button>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="pagging_main">
                            <div class="pagging_texter">
                                Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }} entries
                            </div>
                            <div class="pagging_listung">
                                {{ $data->onEachSide(1)->links() }}
                            </div>
                        </div>

                        @else
                        <div class="table_layut col-md-12 text-center">
                            <p>No data available</p>
                        </div>
                        @endif

                    </div>
                </div>

                <!-- View Order Modal -->
                <div id="viewOrder" class="modal fade common_model fw_full_modal" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">View Order</h4> <button type="button" class="close"
                                    data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body admin_modal_body view_order_manage">
                                <div class="tab">
                                    <div class="row modal_row_data tab-one">
                                        <div class="col-sm-12 fw_titles"><span class="tab_title">Course Info</span>
                                        </div>
                                        <div class="col-sm-4 col_inputs">
                                            <div class="form-group">
                                                <label>Course</label>
                                                <input type="text" placeholder="Course Name" class="form-control" disabled id="course_name">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col_inputs">
                                            <div class="form-group">
                                                <label>Razorpay Order Id</label>
                                                <input type="text" placeholder="Razorpay Order Id" class="form-control" disabled id="rzp_order_id">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col_inputs">
                                            <div class="form-group">
                                                <label>Other Payment Id</label>
                                                <input type="text" placeholder="Other Payment Id" class="form-control" disabled id="payment_id">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col_inputs">
                                            <div class="form-group">
                                                <label>Registration Number</label>
                                                <input type="text" placeholder="Registration Number"
                                                    class="form-control" disabled id="registration_no">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row modal_row_data tab-two">
                                        <div class="col-sm-12 fw_titles"><span class="tab_title">Personal Info</span>
                                        </div>
                                        <div class="col-sm-4 col_inputs">
                                            <div class="form-group">
                                                <label>Student Name</label>
                                                <input type="text" placeholder="Student Name" class="form-control"
                                                    disabled id="user_name">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col_inputs">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="text" placeholder="Phone Number" class="form-control"
                                                    disabled id="user_phone">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col_inputs">
                                            <div class="form-group">
                                                <label>Email Id</label>
                                                <input type="email" placeholder="Email Id" class="form-control"
                                                    disabled id="user_email">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col_inputs">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" placeholder="Address" class="form-control" disabled id="user_address">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col_inputs">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" placeholder="State" class="form-control" disabled id="user_state">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col_inputs">
                                            <div class="form-group">
                                                <label>Pincode</label>
                                                <input type="text" placeholder="Pincode" class="form-control" disabled id="user_pin">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row modal_row_data tab-three" id="div_field">
                                        <div class="col-sm-12 fw_titles"><span class="tab_title">Course Type</span>
                                        </div>
                                    </div>
                                    <div class="row modal_row_data tab-four">
                                        <div class="col-sm-12 fw_titles"><span class="tab_title">Payment
                                                & Delivery</span>
                                        </div>
                                        <div class="col-sm-4 col_inputs">
                                            <div class="form-group">
                                                <label>Amount Payable</label>
                                                <input type="text" placeholder="Amount Payable" class="form-control"
                                                    disabled id="total_amt">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col_inputs">
                                            <div class="form-group">
                                                <label>Amount paid</label>
                                                <input type="text" placeholder="Amount paid" class="form-control"
                                                    disabled id="paid_amt">
                                            </div>
                                        </div>

                                        <div class="col-sm-4 col_inputs">
                                            <div class="form-group">
                                                <label>Amount Pending</label>
                                                <input type="text" placeholder="Amount Pending" class="form-control"
                                                    disabled id="pending_amt">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col_inputs">
                                            <div class="form-group">
                                                <label>Exam Attempt Due</label>
                                                <input type="text" placeholder="Exam Attempt Due" class="form-control"
                                                    disabled id="attempt">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col_inputs">
                                            <div class="form-group">
                                                <label>Mode of Payment</label>
                                                <input type="text" placeholder="Mode of Payment" class="form-control"
                                                    disabled id="pay_mode">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col_inputs" id="other" style="display: none;">
                                            <div class="form-group">
                                                <label>Other Payment Mode</label>
                                                <input type="text" placeholder="Other Payment Mode" class="form-control"
                                                    disabled id="other_payment">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer dual_model_btn">
                                <div class="order_mng_mbtn">
                                <div class="modal-footer dual_model_btn">
                                    <button type="button" class="btn btn-primary f-size" data-dismiss="modal">Close</button>
                                </div>
                                </div>
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

    $(document).on('click', '.view-order', function() {
            var order_id = $(this).data('id');
          
            $.get('orders/' + order_id, function(data) {

                if (data.length > 0) {
                    let strDetail = ``;

                    $.each(data, function(key, item) {

                        $.each(item.order_details_new, function(key, item) {
                            $('#course_name').val(item.course_name);
                        if(item.product_type == "chapter") {

                            strDetail += `<div class="row course-vid_types">
                                <div class="col-sm-6 col_inputs">
                                    <div class="form-group">
                                        <label>Type of Course</label>
                                        <select class="form-control" id="course_type" disabled>
                                            <option>${item.product_type}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col_inputs">
                                    <div class="form-group">
                                        <label>Group Name</label>
                                        <select class="form-control" disabled>
                                            <option>${item.course_level}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="wrap_course_types col-sm-12">
                                <div class="row inner_course_type common_ctypes">

                                        <div class="col-sm-12 combo_multi_vids">
                                            <div class="row clone_filed">
                                                <div class="col-sm-12 col_inputs">
                                                    <div class="form-group">
                                                        <label>Subject Name/ Paper No.</label>
                                                        <select class="form-control" disabled>
                                                            <option>${item.mst_subject.name}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clone_filed">
                                                <div class="col-sm-6 col_inputs">
                                                    <div class="form-group">
                                                        <label>Chapter Name</label>
                                                        <select class="form-control" disabled>
                                                            <option>${item.mst_chapter.name}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col_inputs">
                                                    <div class="form-group">
                                                        <label>Teacher Name</label>
                                                        <select class="form-control" disabled>
                                                            <option>${item.user.name}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Teacher Type</label>
                                        <select class="form-control" disabled>
                                            <option>${item.teacher_type}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Sale mode</label>
                                        <select class="form-control" disabled>
                                            <option>${item.sale_mode}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Payment</label>
                                        <input type="text" placeholder="Payment" class="form-control" value="${item.price}" disabled>
                                    </div>
                                </div>
                            <div>`
                        } else if(item.product_type == "combo") {

                            strDetail += `<div class="row course-vid_types">
                                <div class="col-sm-6 col_inputs">
                                    <div class="form-group">
                                        <label>Type of Course</label>
                                        <select class="form-control" id="course_type" disabled>
                                            <option>${item.product_type}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col_inputs">
                                    <div class="form-group">
                                        <label>Group Name</label>
                                        <select class="form-control" disabled>
                                            <option>${item.course_level}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="wrap_course_types col-sm-12">
                                    <div class="row inner_course_type common_ctypes" id="combo-type">
        
                                        <div class="col-sm-12 combo_multi_vids">
                                            <div class="row clone_filed">
                                                <div class="col-sm-6 col_inputs">
                                                    <div class="form-group">
                                                        <label>Subject Name/ Paper No.</label>
                                                        <select class="form-control" disabled>
                                                            <option>${item.mst_subject.name}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col_inputs">
                                                    <div class="form-group">
                                                        <label>Teacher Name</label>
                                                        <select class="form-control" disabled>
                                                            <option>${item.user.name}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                            <div>
                            <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Teacher Type</label>
                                        <select class="form-control" disabled>
                                            <option>${item.teacher_type}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Sale mode</label>
                                        <select class="form-control" disabled>
                                            <option>${item.sale_mode}</option>
                                        </select>
                                    </div>
                                </div>
                        </div>`

                        } else if(item.product_type == "capsule" || item.product_type == "mtp" || item.product_type == "rtp" || item.product_type == "past papers") {
                            strDetail += `<div class="row wrap_multi_courses">
                                            <div class="col-sm-6 col_inputs">
                                                <div class="form-group">
                                                    <label>Type of Course</label>
                                                    <select class="form-control" id="course_type" disabled>
                                                        <option>${item.product_type}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col_inputs">
                                                <div class="form-group">
                                                    <label>Group Name</label>
                                                    <select class="form-control" disabled>
                                                        <option>${item.course_level}</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="wrap_course_types col-sm-12">
                                                <div class="row inner_course_type common_ctypes" id="mtp-type">
                                                    <div class="col-sm-6 col_inputs">
                                                        <div class="form-group">
                                                            <label>Subject Name/ Paper No.</label>
                                                            <select class="form-control" disabled>
                                                                <option>${item.mst_subject.name}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col_inputs">
                                                        <div class="form-group">
                                                            <label>Teacher Name</label>
                                                            <select class="form-control" disabled>
                                                                <option>${item.user.name}</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-sm-3 col_inputs">
                                                <div class="form-group">
                                                    <label>Teacher Type</label>
                                                    <select class="form-control" disabled>
                                                        <option>${item.teacher_type}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col_inputs">
                                                <div class="form-group">
                                                    <label>Sale mode</label>
                                                    <select class="form-control" disabled>
                                                        <option>${item.sale_mode}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col_inputs">
                                                <div class="form-group">
                                                    <label>Payment</label>
                                                    <input type="text" placeholder="Payment" class="form-control"
                                                        disabled value="${item.price}">
                                                </div>
                                            </div>
                                        </div>`;
                        } else if (item.product_type == "book") {

strDetail += `<div class="row course-vid_types">
<div class="col-sm-6 col_inputs">
<div class="form-group">
<label>Type of Course</label>
<select class="form-control" id="course_type" disabled>
<option>${item.product_type}</option>
</select>
</div>
</div>
<div class="col-sm-6 col_inputs">
<div class="form-group">
<label>Group Name</label>
<select class="form-control" disabled>
<option>${item.course_level}</option>
</select>
</div>
</div>
<div class="wrap_course_types col-sm-12">
<div class="row inner_course_type common_ctypes">

<div class="col-sm-12 combo_multi_vids">
<div class="row clone_filed">
<div class="col-sm-12 col_inputs">
<div class="form-group">
<label>Subject Name/ Paper No.</label>
<select class="form-control" disabled>
<option>${item.mst_subject.name}</option>
</select>
</div>
</div>
</div>
<div class="row clone_filed">
<div class="col-sm-6 col_inputs">
<div class="form-group">
<label>Book Name</label>
<select class="form-control" disabled>
<option>${item.book_name}</option>
</select>
</div>
</div>

<div class="col-sm-6 col_inputs">
<div class="form-group">
<label>Teacher Name</label>
<select class="form-control" disabled>
<option>${item.user.name}</option>
</select>
</div>
</div>
</div>

</div>
</div>
</div>
<div class="col-sm-4 col_inputs">
<div class="form-group">
<label>Teacher Type</label>
<select class="form-control" disabled>
<option>${item.teacher_type}</option>
</select>
</div>
</div>
<div class="col-sm-4 col_inputs">
<div class="form-group">
<label>Sale mode</label>
<select class="form-control" disabled>
<option>${item.sale_mode}</option>
</select>
</div>
</div>
<div>`
} else if(item.product_type == "video lecture") {
                            strDetail += `<div class="row wrap_multi_courses">
                                            <div class="col-sm-6 col_inputs">
                                                <div class="form-group">
                                                    <label>Type of Course</label>
                                                    <select class="form-control" id="course_type" disabled>
                                                        <option>${item.product_type}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col_inputs">
                                                <div class="form-group">
                                                    <label>Group Name</label>
                                                    <select class="form-control" disabled>
                                                        <option>${item.course_level}</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="wrap_course_types col-sm-12">
                                                <div class="row inner_course_type common_ctypes" id="mtp-type">
                                                    <div class="col-sm-6 col_inputs">
                                                        <div class="form-group">
                                                            <label>Subject Name/ Paper No.</label>
                                                            <select class="form-control" disabled>
                                                                <option>${item.mst_subject.name}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col_inputs">
                                                        <div class="form-group">
                                                            <label>Teacher Name</label>
                                                            <select class="form-control" disabled>
                                                                <option>${item.user.name}</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-sm-3 col_inputs">
                                                <div class="form-group">
                                                    <label>Teacher Type</label>
                                                    <select class="form-control" disabled>
                                                        <option>${item.teacher_type}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col_inputs">
                                                <div class="form-group">
                                                    <label>Sale mode</label>
                                                    <select class="form-control" disabled>
                                                        <option>${item.sale_mode}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col_inputs">
                                                <div class="form-group">
                                                    <label>Video Language</label>
                                                    <input type="text" placeholder="Language" class="form-control"
                                                        disabled value="${item.video_language}">
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col_inputs">
                                                <div class="form-group">
                                                    <label>Payment</label>
                                                    <input type="text" placeholder="Payment" class="form-control"
                                                        disabled value="${item.price}">
                                                </div>
                                            </div>
                                        </div>`;
                        }
                        
                        });
                        $('#div_field').html(strDetail);
                        
                        $('#rzp_order_id').val(item.rzp_order_id);
                        $('#payment_id').val(item.other_payment_id);
                        $('#registration_no').val(item.institute_reg_no);
                        $('#user_name').val(item.user_name);
                        $('#user_phone').val(item.user_phone);
                        $('#user_email').val(item.user_email);
                        $('#user_address').val(item.user_address);
                        if (item.state != null) {
                            $('#user_state').val(item.state.name);
                        } else {
                            $('#user_state').val('');
                        }
                        $('#user_pin').val(item.pin_code);
                        $('#total_amt').val(item.total_amount);
                        $('#paid_amt').val(item.paid_amount);
                        $('#pending_amt').val(item.pending_amount);
                        $('#pay_mode').val(item.payment_mode);
                        if(item.payment_mode == "Other") {
                            $('#other').show();
                            $('#other_payment').val(item.other_payment_mode);
                        } else {
                            $('#other').hide();
                        }
                        $('#attempt').val(item.attempt);
                        
                    });

                    $('#viewOrder').modal('show');
                } else {
                    alert("NO Orders");
                }

            })

        });
});
</script>

@endpush