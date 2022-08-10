@extends('layouts.admin-layout')

@section('content')

@include('admin.super-admin.layouts.sidebar')
<div class="content_super supar_main_cont">

    <div class="wrap_tab_contents">
        <div class="container-fluid">
            <div class="top_action_bar">
                <a class="btn btn-primary linked_btn f-size" href="/counsellor/new-order"><i class="fa fa-plus" aria-hidden="true"></i> Add New
                    Order</a>
            </div>
            <div class="card_info shadow_blk">
                <h4 class="font-italic mb-2">All Orders</h4>

                <div class="col-lg-12 order_table">
                    <div class="table-responsive super_table">

                        <form type="GET" action="/counsellor/order">
                            <div class="search_top order_search">
                                <div class="wrap_serpan">
                                    <input type="search" name="search" placeholder="search" class="form-control @error('search') is-invalid @enderror" value="{{ request('search') }}" autofocus>
                                    <button class="button btn" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                                @error('search')
                                <p class="error_result" style="color:red">{{$message}}</p>
                                @enderror
                            </div>
                        </form>

                        @if(count($data) > 0)
                        <table id="counsellor_table" class="table table-striped table-bordered data-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Order No.</th>
                                    <th>Student Name</th>
                                    <th width="60px">Student Email</th>
                                    <th>Student Phone</th>
                                    <th>Payment Mode</th>
                                    <th>Payment Status</th>
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
                                    <td>{{ $order['created_at'] }}</td>
                                    <td><button title="View" type="submit" class="table_btn edit_linker view-order" data-toggle="modal" data-id="{{ $order['id'] }}"><span><i class="fa fa-eye" aria-hidden="true"></i></span></button>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <button title="Edit" type="submit" class="table_btn edit_linker edit-order not-edited" data-toggle="modal" data-id="{{ $order['id'] }}"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></button>
                                        @if($order['deliver_status'] == 1)
                                        <button title="Delivered To Student" type="submit" class="table_btn deliver" data-toggle="modal"><span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></span></button>
                                        @else
                                        <button title="Not Delivered To Student" type="submit" class="table_btn not-deliver" data-toggle="modal"><span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></span></button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="pagging_main">
                            <div class="pagging_texter">
                                Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }}
                                entries
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
                                <h4 class="modal-title">View Order</h4> <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body admin_modal_body view_order_manage">
                                <div class="tab">
                                    <div class="row modal_row_data tab-one">
                                        <div class="col-sm-12 fw_titles"><span class="tab_title">Course Info</span>
                                        </div>
                                        <div class="col-sm-4 col_inputs">
                                            <div class="form-group">
                                                <label>Course</label>
                                                <input type="text" placeholder="Course Name" disabled class="form-control" id="course_name">
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
                                                <input type="text" placeholder="Registration Number" class="form-control" disabled id="registration_no">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row modal_row_data tab-two">
                                        <div class="col-sm-12 fw_titles"><span class="tab_title">Personal Info</span>
                                        </div>
                                        <div class="col-sm-4 col_inputs">
                                            <div class="form-group">
                                                <label>Student Name</label>
                                                <input type="text" placeholder="Student Name" class="form-control" disabled id="user_name">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col_inputs">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="text" placeholder="Phone Number" class="form-control" disabled id="user_phone">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col_inputs">
                                            <div class="form-group">
                                                <label>Email Id</label>
                                                <input type="email" placeholder="Email Id" class="form-control" disabled id="user_email">
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
                                                <input type="text" placeholder="Amount Payable" class="form-control" disabled id="total_amt">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col_inputs">
                                            <div class="form-group">
                                                <label>Amount paid</label>
                                                <input type="text" placeholder="Amount paid" class="form-control" disabled id="paid_amt">
                                            </div>
                                        </div>

                                        <div class="col-sm-4 col_inputs">
                                            <div class="form-group">
                                                <label>Amount Pending</label>
                                                <input type="text" placeholder="Amount Pending" class="form-control" disabled id="pending_amt">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col_inputs">
                                            <div class="form-group">
                                                <label>Exam Attempt Due</label>
                                                <input type="text" placeholder="Exam Attempt Due" class="form-control" disabled id="attempt">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col_inputs">
                                            <div class="form-group">
                                                <label>Mode of Payment</label>
                                                <input type="text" placeholder="Mode of Payment" class="form-control" disabled id="pay_mode">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col_inputs" id="other" style="display: none;">
                                            <div class="form-group">
                                                <label>Other Payment Mode</label>
                                                <input type="text" placeholder="Other Payment Mode" class="form-control" disabled id="other_payment">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col_inputs">
                                            <div class="form-group">
                                                <label>Counsellor Note</label>
                                                <textarea placeholder="Enter Note" class="form-control" id="counse_note" disabled></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="order_mng_mbtn">
                                <div class="modal-footer dual_model_btn">
                                    <button type="button" class="btn btn-primary f-size" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Order Modal -->
                <div class="modal fade common_model fw_full_modal" id="crud-modal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="orderCrudModal"></h4> <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form id="order_form" action="/counsellor/order" method="POST" autocomplete="off">
                                <div class="modal-body">

                                    <input type="hidden" name="order_id" id="order_id">
                                    @csrf

                                    <div class="tab">
                                        <div class="row modal_row_data tab-one">
                                            <div class="col-sm-12 fw_titles"><span class="tab_title">Course Info</span>
                                            </div>
                                            <div class="col-sm-4 col_inputs">
                                                <div class="form-group">
                                                    <label>Select Course</label>
                                                    <select class="form-control @error('course_id') is-invalid @enderror dynamic" name="course" id="course_id" value="{{ old('course_id') }}" data-dependent="course_level_id">
                                                        <option value="">Select Course</option>
                                                        @foreach($coursedata as $course)
                                                        <option value="{{$course['value']}}" <?php { {
                                                                                                        echo old('course_id') == $course['value'] ? 'selected' : '';
                                                                                                    }
                                                                                                } ?>>
                                                            {{$course['name']}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col_inputs">
                                                <div class="form-group">
                                                    <label>Razorpay Order Id</label>
                                                    <input type="text" placeholder="Razorpay Order Id" class="form-control" name="ord_id" id="ord_id" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col_inputs">
                                                <div class="form-group">
                                                    <label>Other Payment Id</label>
                                                    <input type="text" placeholder="Other Payment Id" class="form-control" name="pay_id" id="pay_id" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col_inputs">
                                                <div class="form-group">
                                                    <label>Registration Number</label>
                                                    <input type="text" placeholder="Registration Number" class="form-control" name="reg_no" id="reg_no">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row modal_row_data tab-two">
                                            <div class="col-sm-12 fw_titles"><span class="tab_title">Personal
                                                    Info</span>
                                            </div>
                                            <div class="col-sm-4 col_inputs">
                                                <div class="form-group">
                                                    <label>Student Name</label>
                                                    <input type="text" placeholder="Student Name" class="form-control" name="name" id="name" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col_inputs">
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input type="text" placeholder="Phone Number" class="form-control" name="phone" id="phone" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col_inputs">
                                                <div class="form-group">
                                                    <label>Email Id</label>
                                                    <input type="email" placeholder="Email Id" class="form-control" name="email" id="email" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col_inputs">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" placeholder="Address" class="form-control" name="address" id="address">
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col_inputs">
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <select class="form-control @error('state') is-invalid @enderror" name="state" id="state" value="{{ old('state') }}">
                                                        <option value="">Select State</option>
                                                        @foreach($states as $state)
                                                        <option value="{{$state['id']}}">{{$state['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col_inputs">
                                                <div class="form-group">
                                                    <label>Pincode</label>
                                                    <input type="text" placeholder="Pincode" class="form-control" name="pin" id="pin">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row modal_row_data tab-three" id="new_field">
                                            <div class="col-sm-12 fw_titles add_more_vids"><span class="tab_title">Course Type <a class="btn btn-primary action_copy" id="add_course">
                                                        Add More
                                                    </a></span> </div>
                                            <div class="row parent_row_wrap">
                                                <div class="col-sm-6 col_inputs">
                                                    <div class="form-group">
                                                        <label>Type of Course</label>
                                                        <select class="form-control @error('course_type') is-invalid @enderror" name="course_type[0]" id="course_type_0">
                                                            <option value="">Select Course Type</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col_inputs">
                                                    <div class="form-group">
                                                        <label>Group Name</label>
                                                        <select class="form-control @error('course_level_id') is-invalid @enderror dynamic-list" name="course_level_id[0]" id="course_level_id_0" data-dependent="subject_id">
                                                            <option value="">Select Group</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="wrap_course_types col-sm-12">
                                                    <div class="row inner_course_type common_ctypes" id="mtp-type_0" style="display:none;">

                                                        <div class="col-sm-6 col_inputs">
                                                            <div class="form-group">
                                                                <label>Subject Name/ Paper No.</label>
                                                                <select class="form-control @error('subject_id') is-invalid @enderror dynamic-data" name="subject_id[0]" id="subject_id_0" data-dependent="chapter_id">
                                                                    <option value="">Select Subject</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col_inputs" id="chapter-type_0" style="display:none;">
                                                            <div class="form-group">
                                                                <label>Chapter Name</label>
                                                                <select class="form-control @error('chapter_id') is-invalid @enderror" name="chapter_id[0]" id="chapter_id_0">
                                                                    <option value="">Select Chapter</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col_inputs" id="book-type_0" style="display:none;">
                                                            <div class="form-group">
                                                                <label>Book Name</label>
                                                                <input type="text" placeholder="Book Name" class="form-control @error('book_name') is-invalid @enderror" name="book_name[0]" id="book_name_0">
                                                                @error('book_name')
                                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col_inputs">
                                                            <div class="form-group">
                                                                <label>Teacher Name</label>
                                                                <select class="form-control @error('teacher_id') is-invalid @enderror" name="teacher_id[0]" id="teacher_id_0" value="{{ old('teacher_id') }}">
                                                                    <option value="">Select Teacher</option>

                                                                    @foreach($faculty as $teacher)
                                                                    <option value="{{$teacher['id']}}" <?php { {
                                                                                                                echo old('teacher_id') == $teacher['id'] ? 'selected' : '';
                                                                                                            }
                                                                                                        } ?>>
                                                                        {{$teacher['name']}}
                                                                    </option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col_inputs">
                                                    <div class="form-group">
                                                        <label>Teacher Type</label>
                                                        <select class="form-control" name="teacher_type[0]" id="teacher_type_0">
                                                            <option value="Internal">Internal</option>
                                                            <option value="External">External</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col_inputs">
                                                    <div class="form-group">
                                                        <label>Sale mode</label>
                                                        <select class="form-control @error('mode') is-invalid @enderror" name="mode[0]" id="mode_0">
                                                            <option value="">Select Sale Mode</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col_inputs" id="language_div_0" style="display:none;">
                                                    <div class="form-group">
                                                        <label>Video Language</label>
                                                        <input type="text" placeholder="Language" name="language[0]" id="language_0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col_inputs" id="payment_div_0" style="display:none;">
                                                    <div class="form-group">
                                                        <label>Payment</label>
                                                        <input type="number" placeholder="Payment" name="payment[0]" id="payment_0" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row modal_row_data tab-four">
                                            <div class="col-sm-12 fw_titles"><span class="tab_title">Payment
                                                    & Delivery</span>
                                            </div>
                                            <div class="col-sm-4 col_inputs">
                                                <div class="form-group">
                                                    <label>Amount Payable</label>
                                                    <input type="text" placeholder="Amount Payable" class="form-control" name="total" id="total">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col_inputs">
                                                <div class="form-group">
                                                    <label>Amount paid</label>
                                                    <input type="text" placeholder="Amount paid" class="form-control" name="paid" id="paid">
                                                </div>
                                            </div>

                                            <div class="col-sm-4 col_inputs">
                                                <div class="form-group">
                                                    <label>Amount Pending</label>
                                                    <input type="text" placeholder="Amount Pending" class="form-control" name="pending" id="pending" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col_inputs">
                                                <div class="form-group">
                                                    <label>Exam Attempt Due</label>
                                                    <select class="form-control @error('attempt') is-invalid @enderror" name="atmpt" id="atmpt">
                                                        <option value="">Select Exam Attempt</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col_inputs">
                                                <div class="form-group">
                                                    <label>Mode of Payment</label>
                                                    <input type="text" placeholder="Mode of Payment" class="form-control" name="p_mode" id="p_mode" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col_inputs" id="others" style="display: none;">
                                                <div class="form-group">
                                                    <label>Other Payment Mode</label>
                                                    <input type="text" placeholder="Other Payment Mode" class="form-control" name="other_pay" id="other_pay" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col_inputs">
                                                <div class="form-group">
                                                    <label>Counsellor Note</label>
                                                    <textarea placeholder="Enter Note" class="form-control" id="counsellor_note" name="counsellor_note"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">

                                    <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary">Update</button>
                                    <button type="button" class="btn btn-danger" id="cancel_btn" data-dismiss="modal">Cancel</button>

                                </div>
                            </form>

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
    var series = [{
            val: 'cma',
            type: 'capsule',
            product: 'Capsule'
        },
        {
            val: 'cma',
            type: 'combo',
            product: 'Combo'
        },
        {
            val: 'cma',
            type: 'past papers',
            product: 'Past Papers'
        },
        {
            val: 'cma',
            type: 'mtp',
            product: 'MTP'
        },
        {
            val: 'cma',
            type: 'chapter',
            product: 'Chapter'
        },
        {
            val: 'cma',
            type: 'video lecture',
            product: 'Video Lecture'
        },
        {
            val: 'cma',
            type: 'book',
            product: 'Book'
        },
        {
            val: 'cs',
            type: 'combo',
            product: 'Combo'
        },
        {
            val: 'cs',
            type: 'past papers',
            product: 'Past Papers'
        },
        {
            val: 'cs',
            type: 'video lecture',
            product: 'Video Lecture'
        },
        {
            val: 'ca',
            type: 'combo',
            product: 'Combo'
        },
        {
            val: 'ca',
            type: 'past papers',
            product: 'Past Papers'
        },
        {
            val: 'ca',
            type: 'rtp',
            product: 'RTP'
        },
        {
            val: 'ca',
            type: 'video lecture',
            product: 'Video Lecture'
        }
    ]

    var saleMode = [{
            mode: 'Google Drive Link + E-Book'
        },
        {
            mode: 'Pen Drive + E-Book'
        },
        {
            mode: 'Google Drive Link + Printed Book'
        },
        {
            mode: 'Pen Drive + Printed Book'
        },
        {
            mode: 'Mobile App View + E-Book'
        },
        {
            mode: 'Physical Book'
        }
    ]

    var attempt = [{
            val: 'cma',
            data: 'DEC 2022'
        },
        {
            val: 'cma',
            data: 'JUNE 2022'
        },
        {
            val: 'cs',
            data: 'DEC 2022'
        },
        {
            val: 'cs',
            data: 'JUNE 2022'
        },
        {
            val: 'ca',
            data: 'MAY 2022'
        },
        {
            val: 'ca',
            data: 'NOV 2022'
        }
    ]

    $(document).ready(function() {

        $(document).on('click', '.view-order', function() {
            var order_id = $(this).data('id');

            $.get('order/' + order_id, function(data) {

                if (data.length > 0) {
                    let strDetail = ``;

                    $.each(data, function(key, item) {

                        $.each(item.order_details_new, function(key, item) {
                            $('#course_name').val(item.course_name);
                            if (item.product_type == "chapter") {

                                strDetail += `<div class="row course-vid_types">
                                <div class="col-sm-6 col_inputs">
                                    <div class="form-group">
                                        <label>Type of Course</label>
                                        <select class="form-control" disabled>
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
                                            </div>

                                        </div>
                                    </div>
                                </div>
                           
                            <div>`
                            } else if (item.product_type == "combo") {

                                strDetail += `<div class="row course-vid_types">
                                <div class="col-sm-6 col_inputs">
                                    <div class="form-group">
                                        <label>Type of Course</label>
                                        <select class="form-control" disabled>
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
                                            </div>
                                        </div>
                                    </div>
                            
                            <div>
                           
                        </div>`

                            } else if (item.product_type == "capsule" || item
                                .product_type == "mtp" || item.product_type ==
                                "rtp" || item.product_type == "past papers") {
                                strDetail += `<div class="row course-vid_types">
                                            <div class="col-sm-6 col_inputs">
                                                <div class="form-group">
                                                    <label>Type of Course</label>
                                                    <select class="form-control" disabled>
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
                                                </div>

                                            </div>
                                           
                                        </div>`;
                            } else if (item.product_type == "video lecture") {
                                strDetail += `<div class="row course-vid_types">
                                            <div class="col-sm-6 col_inputs">
                                                <div class="form-group">
                                                    <label>Type of Course</label>
                                                    <select class="form-control" disabled>
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
                                                </div>

                                            </div>
                                           
                                        </div>`;
                            } else if (item.product_type == "book") {

                                strDetail += `<div class="row course-vid_types">
<div class="col-sm-6 col_inputs">
    <div class="form-group">
        <label>Type of Course</label>
        <select class="form-control" disabled>
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
            </div>

        </div>
    </div>
</div>

<div>`
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
                        $('#counse_note').val(item.counsellor_note);
                        $('#pay_mode').val(item.payment_mode);
                        if (item.payment_mode == "Other") {
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

        /* Edit Order */
        $(document).on('click', '.edit-order', function() {
            var order_id = $(this).data('id');
            $.get('order/' + order_id + '/edit', function(data) {

                $('#orderCrudModal').html("Edit Order");
                $('#crud-modal').modal('show');
                $('#order_id').val(data.id);

                var pay = data.total_amount;
                var paid = data.paid_amount;
                pendingAmount(pay, paid);

                function pendingAmount(pay, paid) {
                    var total = (pay - paid);
                    total = total.toFixed(2);
                    $('#pending').val(total);
                }

                $('#total').on('input', function() {
                    pay = $(this).val();
                    pendingAmount(pay, paid);
                });

                $('#paid').on('input', function() {
                    paid = $(this).val();
                    pendingAmount(pay, paid);
                });

                let strDetail = ``;
                let i = 0;
                if (data.order_details_new.length >= 1) {
                    $.each(data.order_details_new, function(key, item) {
                        i++;
                        $('#course_id').val(item.course_name);

                        if (item.course_level == null) {
                            var rres;
                            var type = item.product_type;
                            var select = $('.dynamic').attr("id");
                            var value = $('.dynamic').val();
                            var dependent = $('.dynamic').data("dependent");
                            var _token = $('input[name="_token"]').val();
                            var ff = $.ajax({
                                url: "{{ route('neworder.fetch') }}",
                                method: "POST",
                                data: {
                                    select: select,
                                    value: value,
                                    type: type,
                                    _token: _token,
                                    dependent: dependent
                                },
                                success: function(result) {
                                    rres = result;
                                    $('#' + dependent + '_' + i).html(rres);
                                }
                            })
                        }

                        if (item.product_type == "chapter") {

                            strDetail += `<div class="row course-vid_types">
                                <div class="col-sm-6 col_inputs">
                                    <div class="form-group">
                                        <label>Type of Course</label>
                                        <select class="form-control" name="course_type[${i}]" id="course_type_${i}" readonly>
                                            <option>${item.product_type}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col_inputs">
                                    <div class="form-group">
                                        <label>Group Name</label>
                                        <select class="form-control" name="course_level_id[${i}]" id="course_level_id_${i}">
                                            <option>${item.course_level ? item.course_level : rres}</option>
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
                                                        <select class="form-control" name="subject_id[${i}]" id="subject_id_${i}" readonly>
                                                            <option value="${item.subject_id}">${item.mst_subject.name}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clone_filed">
                                                <div class="col-sm-6 col_inputs">
                                                    <div class="form-group">
                                                        <label>Chapter Name</label>
                                                        <select class="form-control" name="chapter_id[${i}]" id="chapter_id_${i}" readonly>
                                                            <option value="${item.chapter_id}">${item.mst_chapter.name}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col_inputs">
                                                    <div class="form-group">
                                                        <label>Teacher Name</label>
                                                        <select class="form-control" name="teacher_id[${i}]" id="teacher_id_${i}" readonly>
                                                            <option value="${item.teacher_id}">${item.user.name}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Teacher Type</label>
                                        <select class="form-control" name="teacher_type[${i}]" id="teacher_type_${i}">
                                        ${item.teacher_type ? `<option value=${item.teacher_type}>${item.teacher_type}</option>`: `<option value="">Select Teacher Type</option><option value="Internal">Internal</option>
                                                    <option value="External">External</option>`}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Sale mode</label>
                                        <select class="form-control" id="mode_${i}" name="mode[${i}]">
                                        ${item.sale_mode ? `<option value="${item.sale_mode}">${item.sale_mode}</option>`:
                                        `<option value="">Select Sale Mode</option>
                                        <option value="Google Drive Link + E-Book">Google Drive Link + E-Book</option>
                                        <option value="Pen Drive + E-Book">Pen Drive + E-Book</option>
                                        <option value="Google Drive Link + Printed Book">Google Drive Link + Printed Book</option>
                                        <option value="Pen Drive + Printed Book">Pen Drive + Printed Book</option>
                                        <option value="Mobile App View + E-Book">Mobile App View + E-Book</option>`}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Payment</label>
                                        <input type="text" placeholder="Payment" class="form-control" value="${item.price}" id="payment_${i}" name="payment[${i}]">
                                    </div>
                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            
                            <div>`
                        } else if (item.product_type == "combo") {

                            strDetail += `<div class="row course-vid_types">
                                <div class="col-sm-6 col_inputs">
                                    <div class="form-group">
                                        <label>Type of Course</label>
                                        <select class="form-control" id="course_type_${i}" name="course_type[${i}]" readonly>
                                            <option>${item.product_type}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col_inputs">
                                    <div class="form-group">
                                        <label>Group Name</label>
                                        <select class="form-control" id="course_level_id_${i}" name="course_level_id[${i}]">
                                            <option>${item.course_level ? item.course_level : rres}</option>
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
                                                        <select class="form-control" id="subject_id_${i}" name="subject_id[${i}]" readonly>
                                                            <option value="${item.subject_id}">${item.mst_subject.name}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col_inputs">
                                                    <div class="form-group">
                                                        <label>Teacher Name</label>
                                                        <select class="form-control" id="teacher_id_${i}" name="teacher_id[${i}]" readonly>
                                                            <option value="${item.teacher_id}">${item.user.name}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Teacher Type</label>
                                        <select class="form-control" id="teacher_type_${i}" name="teacher_type[${i}]">
                                        ${item.teacher_type ? `<option value=${item.teacher_type}>${item.teacher_type}</option>`: `<option value="">Select Teacher Type</option><option value="Internal">Internal</option>
                                                    <option value="External">External</option>`}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Sale mode</label>
                                        <select class="form-control" id="mode_${i}" name="mode[${i}]">
                                        ${item.sale_mode ? `<option value="${item.sale_mode}">${item.sale_mode}</option>`:
                                        `<option value="">Select Sale Mode</option>
                                        <option value="Google Drive Link + E-Book">Google Drive Link + E-Book</option>
                                        <option value="Pen Drive + E-Book">Pen Drive + E-Book</option>
                                        <option value="Google Drive Link + Printed Book">Google Drive Link + Printed Book</option>
                                        <option value="Pen Drive + Printed Book">Pen Drive + Printed Book</option>
                                        <option value="Mobile App View + E-Book">Mobile App View + E-Book</option>`}
                                        </select>
                                    </div>
                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                            <div>
                          
                        </div>`

                        } else if (item.product_type == "capsule" || item.product_type ==
                            "mtp" || item.product_type == "rtp" || item.product_type ==
                            "past papers") {
                            strDetail += `<div class="row course-vid_types">
                                            <div class="col-sm-6 col_inputs">
                                                <div class="form-group">
                                                    <label>Type of Course</label>
                                                    <select class="form-control" id="course_type_${i}" name="course_type[${i}]" readonly>
                                                        <option>${item.product_type}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col_inputs">
                                                <div class="form-group">
                                                    <label>Group Name</label>
                                                    <select class="form-control" id="course_level_id_${i}" name="course_level_id[${i}]">
                                                        <option>${item.course_level ? item.course_level : rres }</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="wrap_course_types col-sm-12">
                                                <div class="row inner_course_type common_ctypes" id="mtp-type">
                                                    <div class="col-sm-6 col_inputs">
                                                        <div class="form-group">
                                                            <label>Subject Name/ Paper No.</label>
                                                            <select class="form-control" id="subject_id_${i}" name="subject_id[${i}]" readonly>
                                                                <option value="${item.subject_id}">${item.mst_subject.name}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col_inputs">
                                                        <div class="form-group">
                                                            <label>Teacher Name</label>
                                                            <select class="form-control" id="teacher_id_${i}" name="teacher_id[${i}]" readonly>
                                                                <option value="${item.teacher_id}">${item.user.name}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col_inputs">
                                                <div class="form-group">
                                                    <label>Teacher Type</label>
                                                    <select class="form-control" id="teacher_type_${i}" name="teacher_type[${i}]">
                                                    ${item.teacher_type ? `<option value=${item.teacher_type}>${item.teacher_type}</option>`: `<option value="">Select Teacher Type</option><option value="Internal">Internal</option>
                                                    <option value="External">External</option>`}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col_inputs">
                                                <div class="form-group">
                                                    <label>Sale mode</label>
                                                    <select class="form-control" id="mode_${i}" name="mode[${i}]">
                                                    ${item.sale_mode ? `<option value="${item.sale_mode}">${item.sale_mode}</option>`:
                                                    `<option value="">Select Sale Mode</option>
                                                    <option value="Google Drive Link + E-Book">Google Drive Link + E-Book</option>
                                                    <option value="Pen Drive + E-Book">Pen Drive + E-Book</option>
                                                    <option value="Google Drive Link + Printed Book">Google Drive Link + Printed Book</option>
                                                    <option value="Pen Drive + Printed Book">Pen Drive + Printed Book</option>
                                                    <option value="Mobile App View + E-Book">Mobile App View + E-Book</option>`}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col_inputs">
                                                <div class="form-group">
                                                    <label>Payment</label>
                                                    <input type="text" placeholder="Payment" id="payment_${i}" name="payment[${i}]" class="form-control"
                                                     value="${item.price}">
                                                </div>
                                            </div>
                                                </div>

                                            </div>
                                         
                                        </div>`;
                        } else if (item.product_type == "video lecture") {
                            strDetail += `<div class="row course-vid_types">
                                            <div class="col-sm-6 col_inputs">
                                                <div class="form-group">
                                                    <label>Type of Course</label>
                                                    <select class="form-control" id="course_type_${i}" name="course_type[${i}]" readonly>
                                                        <option>${item.product_type}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col_inputs">
                                                <div class="form-group">
                                                    <label>Group Name</label>
                                                    <select class="form-control" id="course_level_id_${i}" name="course_level_id[${i}]">
                                                        <option>${item.course_level ? item.course_level : rres }</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="wrap_course_types col-sm-12">
                                                <div class="row inner_course_type common_ctypes" id="mtp-type">
                                                    <div class="col-sm-6 col_inputs">
                                                        <div class="form-group">
                                                            <label>Subject Name/ Paper No.</label>
                                                            <select class="form-control" id="subject_id_${i}" name="subject_id[${i}]" readonly>
                                                                <option value="${item.subject_id}">${item.mst_subject.name}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col_inputs">
                                                        <div class="form-group">
                                                            <label>Teacher Name</label>
                                                            <select class="form-control" id="teacher_id_${i}" name="teacher_id[${i}]" readonly>
                                                                <option value="${item.teacher_id}">${item.user.name}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col_inputs">
                                                <div class="form-group">
                                                    <label>Teacher Type</label>
                                                    <select class="form-control" id="teacher_type_${i}" name="teacher_type[${i}]">
                                                    ${item.teacher_type ? `<option value=${item.teacher_type}>${item.teacher_type}</option>`: `<option value="">Select Teacher Type</option><option value="Internal">Internal</option>
                                                    <option value="External">External</option>`}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col_inputs">
                                                <div class="form-group">
                                                    <label>Sale mode</label>
                                                    <select class="form-control" id="mode_${i}" name="mode[${i}]">
                                                    ${item.sale_mode ? `<option value="${item.sale_mode}">${item.sale_mode}</option>`:
                                                    `<option value="">Select Sale Mode</option>
                                                    <option value="Google Drive Link + E-Book">Google Drive Link + E-Book</option>
                                                    <option value="Pen Drive + E-Book">Pen Drive + E-Book</option>
                                                    <option value="Google Drive Link + Printed Book">Google Drive Link + Printed Book</option>
                                                    <option value="Pen Drive + Printed Book">Pen Drive + Printed Book</option>
                                                    <option value="Mobile App View + E-Book">Mobile App View + E-Book</option>`}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col_inputs">
                                                <div class="form-group">
                                                    <label>Video Language</label>
                                                    <input type="text" placeholder="Language" id="language_${i}" name="language[${i}]" class="form-control"
                                                    readonly value="${item.video_language}">
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col_inputs">
                                                <div class="form-group">
                                                    <label>Payment</label>
                                                    <input type="text" placeholder="Payment" id="payment_${i}" name="payment[${i}]" class="form-control"
                                                     value="${item.price}">
                                                </div>
                                            </div>
                                                </div>

                                            </div>
                                         
                                        </div>`;
                        } else if (item.product_type == "book") {

                            strDetail += `<div class="row course-vid_types">
    <div class="col-sm-6 col_inputs">
        <div class="form-group">
            <label>Type of Course</label>
            <select class="form-control" name="course_type[${i}]" id="course_type_${i}" readonly>
                <option>${item.product_type}</option>
            </select>
        </div>
    </div>
    <div class="col-sm-6 col_inputs">
        <div class="form-group">
            <label>Group Name</label>
            <select class="form-control" name="course_level_id[${i}]" id="course_level_id_${i}">
                <option>${item.course_level ? item.course_level : rres}</option>
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
                            <select class="form-control" name="subject_id[${i}]" id="subject_id_${i}" readonly>
                                <option value="${item.subject_id}">${item.mst_subject.name}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row clone_filed">
                    <div class="col-sm-6 col_inputs">
                        <div class="form-group">
                            <label>Book Name</label>
                            <input class="form-control" type="text" placeholder="Book Name" name="book_name[${i}]" id="book_name_${i}" value="${item.book_name}" readonly>    
                        </div>
                    </div>

                    <div class="col-sm-6 col_inputs">
                        <div class="form-group">
                            <label>Teacher Name</label>
                            <select class="form-control" name="teacher_id[${i}]" id="teacher_id_${i}" readonly>
                                <option value="${item.teacher_id}">${item.user.name}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3 col_inputs">
        <div class="form-group">
            <label>Teacher Type</label>
            <select class="form-control" name="teacher_type[${i}]" id="teacher_type_${i}">
            ${item.teacher_type ? `<option value=${item.teacher_type}>${item.teacher_type}</option>`: `<option value="">Select Teacher Type</option><option value="Internal">Internal</option>
                        <option value="External">External</option>`}
            </select>
        </div>
    </div>
    <div class="col-sm-3 col_inputs">
        <div class="form-group">
            <label>Sale mode</label>
            <select class="form-control" id="mode_${i}" name="mode[${i}]">
            ${item.sale_mode ? `<option value="${item.sale_mode}">${item.sale_mode}</option>`:
            `<option value="">Select Sale Mode</option>
            <option value="Google Drive Link + E-Book">Google Drive Link + E-Book</option>
            <option value="Pen Drive + E-Book">Pen Drive + E-Book</option>
            <option value="Google Drive Link + Printed Book">Google Drive Link + Printed Book</option>
            <option value="Pen Drive + Printed Book">Pen Drive + Printed Book</option>
            <option value="Mobile App View + E-Book">Mobile App View + E-Book</option>`}
            </select>
        </div>
    </div>
    <div class="col-sm-3 col_inputs">
        <div class="form-group">
            <label>Payment</label>
            <input type="text" placeholder="Payment" class="form-control" value="${item.price}" id="payment_${i}" name="payment[${i}]">
        </div>
    </div>
                </div>

            </div>
        </div>
    </div>

<div>`
                        }

                        $("#order_form").submit(function() {
                            if (!confirm('Are you sure that you want to update this order')) {
                                event.preventDefault();
                            } else {
                                var course_2 = $('#course_type_' + i).val();
                                var level_2 = $('#course_level_id_' + i).val();
                                var subject_2 = $('#subject_id_' + i).val();
                                var faculty_2 = $('#teacher_id_' + i).val();
                                var type_2 = $('#teacher_type_' + i).val();
                                var mode_2 = $('#mode_' + i).val();

                                if (course_2 == "chapter") {
                                    var chap_2 = $('#chapter_id_' + i).val();
                                    if (chap_2 == '') {
                                        event.preventDefault();
                                        alert("Please select the chapter.");
                                    }
                                }

                                if (course_2 == "book") {
                                    var book_2 = $('#book_name_' + i).val();
                                    if (book_2 == '') {
                                        event.preventDefault();
                                        alert("Please enter book name.");
                                    }
                                }

                                var lang_regex = /^[A-Za-z]+$/;
                                if (course_2 == "video lecture" && course_2 != "") {
                                    var language_2 = $('#language_' + i).val();
                                    if (language_2 == '') {
                                        event.preventDefault();
                                        alert("Please enter video language.");
                                    } else if (!lang_regex.test(language_2)) {
                                        event.preventDefault();
                                        alert("Only alphabets are allowed in language!");
                                    }
                                }

                                var pay_regex = /^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/;

                                if (course_2 != "combo" && course_2 != "") {
                                    var payment_2 = $('#payment_' + i).val();
                                    if (payment_2 == '') {
                                        event.preventDefault();
                                        alert("Please enter the payment.");
                                    } else if (!pay_regex.test(payment_2)) {
                                        event.preventDefault();
                                        alert("Only numbers and max. two decimal precision allowed in payment!");
                                    }
                                }

                                if (course_2 == '' || level_2 == '' || subject_2 == '' || faculty_2 == '' || type_2 == '' || mode_2 == '') {
                                    event.preventDefault();
                                    alert("Please fill all the fields.");
                                }
                            }

                        });
                    });
                    $("#course_id").attr("style", "pointer-events: none;");
                    $('#new_field').html(strDetail);
                    var courses = $('#course_id').val();
                    var exam_attempt = '<option value="">Select Exam Attempt</option>';
                    $(attempt).each(function(index, value) {
                        if (value.val == courses) {
                            exam_attempt += '<option value="' + value.data + '">' + value.data + '</option>';
                        }
                    });
                    $('#atmpt').html(exam_attempt);
                } else {
                    $("#course_id").attr("style", "pointer-events: block;");

                    var levels;
                    $(".dynamic").change(function() {
                        if ($(this).val() != '') {
                            var select = $(this).attr("id");
                            var value = $(this).val();

                            var dependent = $(this).data("dependent");
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: "{{ route('neworder.fetch') }}",
                                method: "POST",
                                data: {
                                    select: select,
                                    value: value,
                                    _token: _token,
                                    dependent: dependent
                                },
                                success: function(result) {
                                    levels = result;
                                    $('#' + dependent + '_0').html(levels);
                                }
                            })
                        }
                    });

                    $(".dynamic-list").change(function() {
                        if ($(this).val() != '') {
                            var s = $(this).attr("id");
                            var select = s.replace('_0', '');

                            var value = $(this).val();
                            var dependent = $(this).data("dependent");
                            var _token = $('input[name="_token"]').val();

                            $.ajax({
                                url: "{{ route('neworder.fetch_subjects') }}",
                                method: "POST",
                                data: {
                                    select: select,
                                    value: value,
                                    _token: _token,
                                    dependent: dependent
                                },
                                success: function(res) {
                                    $('#' + dependent + '_0').html(res);
                                }
                            })
                        }
                    });

                    $('#course_id').on('change', function() {
                        var courses = $(this).val();
                        options = '<option value="">Select Course Type</option>';
                        $(series).each(function(index, value) {
                            if (value.val == courses) {
                                options += '<option value="' + value.type + '">' +
                                    value.product + '</option>';
                            }

                            $("#order_form").submit(function() {
                                if (!confirm('Are you sure that you want to update this order')) {
                                    event.preventDefault();
                                } else {
                                    var course_1 = $('#course_type_' + i).val();
                                    var level_1 = $('#course_level_id_' + i).val();
                                    var subject_1 = $('#subject_id_' + i).val();
                                    var faculty_1 = $('#teacher_id_' + i).val();
                                    var type_1 = $('#teacher_type_' + i).val();
                                    var mode_1 = $('#mode_' + i).val();

                                    if (course_1 == "chapter") {
                                        var chap_1 = $('#chapter_id_' + i).val();
                                        if (chap_1 == '') {
                                            event.preventDefault();
                                            alert("Please select the chapter.");
                                        }
                                    }

                                    if (course_1 == "book") {
                                        var book_1 = $('#book_name_' + i).val();
                                        if (book_1 == '') {
                                            event.preventDefault();
                                            alert("Please enter book name.");
                                        }
                                    }

                                    var lang_regex = /^[A-Za-z]+$/;
                                    if (course_1 == "video lecture" && course_1 != "") {
                                        var language_1 = $('#language_' + i).val();
                                        if (language_1 == '') {
                                            event.preventDefault();
                                            alert("Please enter video language.");
                                        } else if (!lang_regex.test(language_1)) {
                                            event.preventDefault();
                                            alert("Only alphabets are allowed in language!");
                                        }
                                    }

                                    var pay_regex = /^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/;

                                    if (course_1 != "combo" && course_1 != "") {
                                        var payment_1 = $('#payment_' + i).val();
                                        if (payment_1 == '') {
                                            event.preventDefault();
                                            alert("Please enter the payment.");
                                        } else if (!pay_regex.test(payment_1)) {
                                            event.preventDefault();
                                            alert("Only numbers and max. two decimal precision allowed in payment!");
                                        }
                                    }

                                    if (course_1 == '' || level_1 == '' || subject_1 == '' || faculty_1 == '' || type_1 == '' || mode_1 == '') {
                                        event.preventDefault();
                                        alert("Please fill all the fields.");
                                    }
                                }
                            });

                        });
                        var exam_attempt = '<option value="">Select Exam Attempt</option>';
                        $(attempt).each(function(index, value) {
                            if (value.val == courses) {
                                exam_attempt += '<option value="' + value.data +
                                    '">' + value.data + '</option>';
                            }
                        });

                        $('#course_type_0').html(options);
                        $('#atmpt').html(exam_attempt);
                        $('.new_div').remove();
                        $('#mtp-type_0').hide();
                        $('#chapter-type_0').hide();
                        $('#book-type_0').hide();
                    });

                    $('#course_type_0').on('change', function() {
                        var type = $(this).val();
                        var course = $("#course_id").val();
                        var dependent = $('.dynamic').data("dependent");
                        if (type == "capsule" || type == "past papers" || type == "mtp" ||
                            type == "rtp") {
                            $('#mtp-type_0').show();
                            $('#chapter-type_0').hide();
                            $('#book-type_0').hide();
                            $('#language_div_0').hide();
                            $('#payment_div_0').show();
                            $('#' + dependent + '_0').html(levels);
                        } else if (type == "video lecture") {
                            $('#mtp-type_0').show();
                            $('#chapter-type_0').hide();
                            $('#book-type_0').hide();
                            $('#language_div_0').show();
                            $('#payment_div_0').show();
                            $('#' + dependent + '_0').html(levels);
                        } else if (type == "book") {
                            $('#chapter-type_0').hide();
                            $('#book-type_0').show();
                            $('#mtp-type_0').show();
                            $('#language_div_0').hide();
                            $('#payment_div_0').show();
                            $('#' + dependent + '_0').html(levels);
                        } else if (type == "combo") {
                            $('#mtp-type_0').show();
                            $('#chapter-type_0').hide();
                            $('#book-type_0').hide();
                            $('#language_div_0').hide();
                            $('#payment_div_0').hide();

                            var select = $('.dynamic').attr("id");
                            var value = $('.dynamic').val();
                            var dependent = $('.dynamic').data("dependent");
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: "{{ route('neworder.fetch') }}",
                                method: "POST",
                                data: {
                                    select: select,
                                    value: value,
                                    type: type,
                                    _token: _token,
                                    dependent: dependent
                                },
                                success: function(result) {
                                    $('#' + dependent + '_0').html(result);
                                }
                            })

                        } else if (type == "chapter") {
                            $('#chapter-type_0').show();
                            $('#book-type_0').hide();
                            $('#mtp-type_0').show();
                            $('#language_div_0').hide();
                            $('#payment_div_0').show();
                            $('#' + dependent + '_0').html(levels);

                            var chapters;
                            $(".dynamic-data").change(function() {
                                if ($(this).val() != '') {
                                    var s = $(this).attr("id");
                                    var select = s.replace('_0', '');

                                    var value = $(this).val();
                                    var dependent = $(this).data("dependent");
                                    var _token = $('input[name="_token"]').val();

                                    $.ajax({
                                        url: "{{ route('neworder.fetch_chapters') }}",
                                        method: "POST",
                                        data: {
                                            select: select,
                                            value: value,
                                            _token: _token,
                                            dependent: dependent
                                        },
                                        success: function(data) {
                                            chapters = data;
                                            $('#' + dependent + '_0').html(chapters);
                                        }
                                    })
                                }
                            });
                        }
                    });

                    var saleOptions = '<option value="">Select Sale Mode</option>';
                    $(saleMode).each(function(index, value) {
                        saleOptions += '<option value="' + value.mode + '">' + value.mode +
                            '</option>';
                    });
                    $('#mode_0').html(saleOptions);

                    let videoElemCount = 1;

                    function videoElemCounter(action) {
                        videoElemCount = $('#new_field').children('div').length + 1;
                        return action == 'increase' ? videoElemCount++ : videoElemCount--;
                    }

                    $(document).on('click', '#add_course', function() {
                        var course = $('#course_id').val();
                        elem_id = videoElemCounter('increase');
                        $('#new_field').append(appendNewCourse(elem_id));
                        $('#course_type_' + elem_id).html(options);
                        $('#course_level_id_' + elem_id).html(levels);

                        $('#course_type_' + elem_id).on('change', function() {
                            var type = $(this).val();
                            if (type == "capsule" || type == "past papers" ||
                                type == "mtp" || type == "rtp") {
                                $('#mtp-type_' + elem_id).show();
                                $('#chapter-type_' + elem_id).hide();
                                $('#book-type_' + elem_id).hide();
                                $('#language_div_' + elem_id).hide();
                                $('#payment_div_' + elem_id).show();
                                $('#course_level_id_' + elem_id).html(levels);
                            } else if (type == "book") {
                                $('#chapter-type_' + elem_id).hide();
                                $('#book-type_' + elem_id).show();
                                $('#mtp-type_' + elem_id).show();
                                $('#language_div_' + elem_id).hide();
                                $('#payment_div_' + elem_id).show();
                                $('#course_level_id_' + elem_id).html(levels);
                            } else if (type == "video lecture") {
                                $('#mtp-type_' + elem_id).show();
                                $('#chapter-type_' + elem_id).hide();
                                $('#book-type_' + elem_id).hide();
                                $('#language_div_' + elem_id).show();
                                $('#payment_div_' + elem_id).show();
                                $('#course_level_id_' + elem_id).html(levels);
                            } else if (type == "combo") {
                                $('#mtp-type_' + elem_id).show();
                                $('#chapter-type_' + elem_id).hide();
                                $('#book-type_' + elem_id).hide();
                                $('#language_div_' + elem_id).hide();
                                $('#payment_div_' + elem_id).hide();

                                var select = $('.dynamic').attr("id");
                                var value = $('.dynamic').val();
                                var dependent = $('.dynamic').data("dependent");
                                var _token = $('input[name="_token"]').val();
                                $.ajax({
                                    url: "{{ route('neworder.fetch') }}",
                                    method: "POST",
                                    data: {
                                        select: select,
                                        value: value,
                                        type: type,
                                        _token: _token,
                                        dependent: dependent
                                    },
                                    success: function(result) {
                                        $('#' + dependent + '_' + elem_id).html(result);
                                    }
                                })

                            } else if (type == "chapter") {
                                $('#chapter-type_' + elem_id).show();
                                $('#book-type_' + elem_id).hide();
                                $('#mtp-type_' + elem_id).show();
                                $('#language_div_' + elem_id).hide();
                                $('#payment_div_' + elem_id).show();
                                $('#course_level_id_' + elem_id).html(levels);

                                var chapters;
                                $(".dynamic-data").change(function() {
                                    if ($(this).val() != '') {
                                        var s = $(this).attr("id");
                                        var select = s.replace('_' + elem_id, '');

                                        var value = $(this).val();
                                        var dependent = $(this).data("dependent");
                                        var _token = $('input[name="_token"]').val();

                                        $.ajax({
                                            url: "{{ route('neworder.fetch_chapters') }}",
                                            method: "POST",
                                            data: {
                                                select: select,
                                                value: value,
                                                _token: _token,
                                                dependent: dependent
                                            },
                                            success: function(data) {
                                                chapters = data;
                                                $('#' + dependent + '_' + elem_id).html(chapters);
                                            }
                                        })
                                    }
                                });
                            }
                        });

                        $(".dynamic-list").change(function() {
                            if ($(this).val() != '') {
                                var s = $(this).attr("id");
                                var select = s.replace('_' + elem_id, '');

                                var value = $(this).val();
                                var dependent = $(this).data("dependent");
                                var _token = $('input[name="_token"]').val();

                                $.ajax({
                                    url: "{{ route('neworder.fetch_subjects') }}",
                                    method: "POST",
                                    data: {
                                        select: select,
                                        value: value,
                                        _token: _token,
                                        dependent: dependent
                                    },
                                    success: function(res) {
                                        $('#' + dependent + '_' + elem_id).html(res);
                                    }
                                })

                                $("#order_form").submit(function() {
                                    if (!confirm('Are you sure that you want to update this order')) {
                                        event.preventDefault();
                                    } else {
                                        var course_1 = $('#course_type_' + elem_id).val();
                                        var level_1 = $('#course_level_id_' + elem_id).val();
                                        var subject_1 = $('#subject_id_' + elem_id).val();
                                        var faculty_1 = $('#teacher_id_' + elem_id).val();
                                        var type_1 = $('#teacher_type_' + elem_id).val();
                                        var mode_1 = $('#mode_' + elem_id).val();

                                        if (course_1 == "chapter") {
                                            var chap_1 = $('#chapter_id_' + elem_id).val();
                                            if (chap_1 == '') {
                                                event.preventDefault();
                                                alert("Please select the chapter.");
                                            }
                                        }

                                        if (course_1 == "book") {
                                            var book_1 = $('#book_name_' + elem_id).val();
                                            if (book_1 == '') {
                                                event.preventDefault();
                                                alert("Please enter book name.");
                                            }
                                        }

                                        var lang_regex = /^[A-Za-z]+$/;
                                        if (course_1 == "video lecture" && course_1 != "") {
                                            var language_1 = $('#language_' + elem_id).val();
                                            if (language_1 == '') {
                                                event.preventDefault();
                                                alert("Please enter video language.");
                                            } else if (!lang_regex.test(language_1)) {
                                                event.preventDefault();
                                                alert("Only alphabets are allowed in language!");
                                            }
                                        }

                                        var pay_regex = /^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/;

                                        if (course_1 != "combo" && course_1 != "") {
                                            var payment_1 = $('#payment_' + elem_id).val();
                                            if (payment_1 == '') {
                                                event.preventDefault();
                                                alert("Please enter the payment.");
                                            } else if (!pay_regex.test(payment_1)) {
                                                event.preventDefault();
                                                alert("Only numbers and max. two decimal precision allowed in payment!");
                                            }
                                        }

                                        if (course_1 == '' || level_1 == '' || subject_1 == '' || faculty_1 == '' || type_1 == '' || mode_1 == '') {
                                            event.preventDefault();
                                            alert("Please fill all the fields.");
                                        }
                                    }
                                });
                            }

                        });
                        $('#mode_' + elem_id).html(saleOptions);

                    });

                    $(document).on('click', '#remove_course', function() {
                        $(this).closest('.new_div').remove();
                    });

                    function appendNewCourse(i) {
                        return (`<div class="new_div add_new_subject">
                                <div class="row course-vid_types">
                                <div class="col-sm-6 col_inputs">
                                    <div class="form-group">
                                        <label>Type of Course</label>
                                        <select class="form-control @error('course_type') is-invalid @enderror" name="course_type[${i}]" id="course_type_${i}" autofocus>
                                            <option value="">Select Course Type</option>
                                        </select>
                                        @error('course_type')
                                        <p class="error_result" style="color:red">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 col_inputs">
                                    <div class="form-group">
                                        <label>Group Name</label>
                                        <select class="form-control @error('course_level_id') is-invalid @enderror dynamic-list" name="course_level_id[${i}]" id="course_level_id_${i}" data-dependent="subject_id" autofocus>
                                            <option value="">Select Group</option>
                                        </select>
                                        @error('course_level_id')
                                        <p class="error_result" style="color:red">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="wrap_course_types col-sm-12">
                                    <div class="row inner_course_type common_ctypes" id="mtp-type_${i}" style="display:none;">
                                    
                                        <div class="col-sm-6 col_inputs">
                                            <div class="form-group">
                                            <label>Subject Name/ Paper No.</label>
                                        <select class="form-control @error('subject_id') is-invalid @enderror dynamic-data" name="subject_id[${i}]" id="subject_id_${i}" data-dependent="chapter_id" autofocus>
                                            <option value="">Select Subject</option>
                                        </select>
                                        @error('subject_id')
                                        <p class="error_result" style="color:red">{{$message}}</p>
                                        @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col_inputs" id="chapter-type_${i}" style="display:none;">
                                            <div class="form-group">
                                            <label>Chapter Name</label>
                                        <select class="form-control @error('chapter_id') is-invalid @enderror" name="chapter_id[${i}]" id="chapter_id_${i}" autofocus>
                                            <option value="">Select Chapter</option>
                                        </select>
                                        @error('chapter_id')
                                        <p class="error_result" style="color:red">{{$message}}</p>
                                        @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col_inputs" id="book-type_${i}" style="display:none;">
                                            <div class="form-group">
                                            <label>Book Name</label>
                                        <input type="text" placeholder="Book Name" class="form-control @error('book_name') is-invalid @enderror" name="book_name[${i}]" id="book_name_${i}">
                                        @error('book_name')
                                        <p class="error_result" style="color:red">{{$message}}</p>
                                        @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col_inputs">
                                            <div class="form-group">
                                                <label>Teacher Name</label>
                                                <select class="form-control @error('teacher_id') is-invalid @enderror" name="teacher_id[${i}]" value="{{ old('teacher_id') }}" autofocus>
                                        <option value="">Select Teacher</option>
                                        @foreach($faculty as $teacher)
                                        <option value="{{$teacher['id']}}" <?php { {
                                                                                    echo old('teacher_id') == $teacher['id'] ? 'selected' : '';
                                                                                }
                                                                            } ?>>
                                            {{$teacher['name']}}</option>
                                        @endforeach
                                        
                                    </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Teacher Type</label>
                                        <select class="form-control" name="teacher_type[${i}]">
                                            <option value="Internal">Internal</option>
                                            <option value="External">External</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Sale mode</label>
                                        <select class="form-control @error('mode') is-invalid @enderror" name="mode[${i}]" id="mode_${i}" autofocus>
                                            <option value="">Select Sale Mode</option>
                                        </select>
                                        @error('mode')
                                        <p class="error_result" style="color:red">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-3 col_inputs" id="language_div_${i}" style="display:none;">
                                    <div class="form-group">
                                        <label>Video Language</label>
                                        <input type="text" placeholder="Language" name="language[${i}]" id="language_${i}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-3 col_inputs" id="payment_div_${i}" style="display:none;">
                                    <div class="form-group">
                                        <label>Payment</label>
                                        <input type="number" placeholder="Payment" name="payment[${i}]" id="payment_${i}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="fw_titles add_more_vids remove_subjects"> <a
                                        class="btn btn-danger action_copy" id="remove_course">
                                        Remove
                                    </a> </div>
                                    </div>`);
                    }
                }

                $('#ord_id').val(data.rzp_order_id);
                $('#pay_id').val(data.other_payment_id);
                $('#reg_no').val(data.institute_reg_no);
                $('#name').val(data.user_name);
                $('#phone').val(data.user_phone);
                $('#email').val(data.user_email);
                $('#address').val(data.user_address);
                $('#state').val(data.state_id);
                $('#pin').val(data.pin_code);
                $('#total').val(data.total_amount);
                $('#paid').val(data.paid_amount);
                $('#pending').val(data.pending_amount);
                $('#p_mode').val(data.payment_mode);
                $('#counsellor_note').val(data.counsellor_note);
                if (data.payment_mode == "Other") {
                    $('#others').show();
                    $('#other_pay').val(data.other_payment_mode);
                } else {
                    $('#others').hide();
                }
                $('#atmpt').val(data.attempt);


                $('#cancel_btn').click(function() {
                    location.reload();
                });
                $('.close').click(function() {
                    location.reload();
                });

                $("#order_form").submit(function() {
                    if (!confirm('Are you sure that you want to update this order')) {
                        event.preventDefault();
                    } else {
                        var course = $('#course_id').val();
                        var reg = $('#reg_no').val();
                        var name = $('#name').val();
                        var phone = $('#phone').val();
                        var email = $('#email').val();
                        var address = $('#address').val();
                        var state = $('#state').val();
                        var pin = $('#pin').val();
                        var pay = $('#total').val();
                        var paid = $('#paid').val();
                        var pending = $('#pending').val();
                        var attempt = $('#atmpt').val();
                        var pay_mode = $('#p_mode').val();
                        var other_mode = $('#other_pay').val();

                        var course_type = $('#course_type_0').val();
                        var level = $('#course_level_id_0').val();
                        var subject = $('#subject_id_0').val();
                        var faculty = $('#teacher_id_0').val();
                        var type = $('#teacher_type_0').val();
                        var mode = $('#mode_0').val();

                        if (course_type == "chapter") {
                            var chap = $('#chapter_id_0').val();
                            if (chap == '') {
                                event.preventDefault();
                                alert("Please select the chapter.");
                            }
                        }

                        if (course_type == "book") {
                            var book = $('#book_name_0').val();
                            if (book == '') {
                                event.preventDefault();
                                alert("Please enter book name.");
                            }
                        }

                        var lang_regex = /^[A-Za-z]+$/;
                        if (course_type == "video lecture" && course_type != "") {
                            var language = $('#language_0').val();
                            if (language == '') {
                                event.preventDefault();
                                alert("Please enter video language.");
                            } else if (!lang_regex.test(language)) {
                                event.preventDefault();
                                alert("Only alphabets are allowed in language!");
                            }
                        }

                        var name_length = name.length;

                        var name_regex = /^([a-zA-Z\.]+\s)*[a-zA-Z\.]+$/;
                        var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
                        var phone_regex = /^((?!(0))[0-9]{10})$/;
                        var pin_regex = /^((?!(0))[0-9]{6})$/;
                        var amt_regex = /^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/;

                        if (course_type) {
                            if (course_type != "combo" && course_type != "") {
                                var payment = $('#payment_0').val();
                                if (payment == '') {
                                    event.preventDefault();
                                    alert("Please enter the payment.");
                                } else if (!amt_regex.test(payment)) {
                                    event.preventDefault();
                                    alert("Only numbers and max. two decimal precision allowed in payment!");
                                }
                            }
                        }

                        if (course == '' || reg == '' || name == '' || phone == '' || email == '' ||
                            address == '' || state == '' || pin == '' || pay == '' || paid == '' || pending == '' ||
                            attempt == '' || pay_mode == '' || course_type == '' || level == '' || subject == '' ||
                            faculty == '' || type == '' || mode == '') {
                            event.preventDefault();
                            alert("Please fill all the fields.");
                        } else if (pay_mode == 'Other') {
                            if (other_mode == '') {
                                event.preventDefault();
                                alert("Please specify other mode of payment.");
                            }

                        } else if (name_length > 255) {
                            event.preventDefault();
                            alert("Name should not have more than 255 characters.");
                        } else if (!name_regex.test(name)) {
                            event.preventDefault();
                            alert("Only letters, dot(.), single space between words are allowed in name field.");
                        } else if (!email_regex.test(email)) {
                            event.preventDefault();
                            alert("E-mail Address is not valid!");
                        } else if (!phone_regex.test(phone)) {
                            event.preventDefault();
                            alert("Phone number is not valid!");
                        } else if (!pin_regex.test(pin)) {
                            event.preventDefault();
                            alert("Pincode is not valid!");
                        } else if (!amt_regex.test(pay)) {
                            event.preventDefault();
                            alert("Only numbers and max. two decimal precision allowed in amount payable!");
                        } else if (!amt_regex.test(paid)) {
                            event.preventDefault();
                            alert("Only numbers and max. two decimal precision allowed in amount paid!");
                        }
                    }
                });
            });
        });
    });
</script>

@endpush