@extends('layouts.admin-layout')

@section('content')

@include('admin.super-admin.layouts.sidebar')
<div class="content_super supar_main_cont">

    <div class="wrap_tab_contents">
        <div class="container-fluid">
            <div class="card_info shadow_blk">

                <h4 class="font-italic mb-2">Manage Students</h4>

                <div class="col-lg-12 student_table">
                    <div class="table-responsive super_table">

                        <form type="GET" action="/admin-login/student">
                            <div class="search_top student_search">
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
                        <table id="student_table" class="table table-striped table-bordered data-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th width="200px">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $student)
                                <tr>
                                    <td>{{ $student['name'] }}</td>
                                    <td>{{ $student['email'] }}</td>
                                    <td>{{ $student['phone'] }}</td>
                                    <td><button title="View" type="submit" class="table_btn edit_linker view-student" data-toggle="modal" data-id="{{ $student['id'] }}"><span><i class="fa fa-eye" aria-hidden="true"></i></span></button>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <button title="Edit" type="submit" class="table_btn edit_linker edit-student" data-toggle="modal" data-id="{{ $student['id'] }}"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></button>
                                        <button title="Delete" type="submit" data-id="{{ $student['id'] }}" class="table_btn trash_linker delete-student" data-confirm="Are you sure you want to delete this student?"><span><i class="fa fa-trash" aria-hidden="true"></i></span></button>
                                        @if($student['status'] == 0)
                                        <button title="Deactive" class="table_btn edit_linker off_switch" data-id="{{ $student['id'] }}" data-status="{{ $student['status'] }}" data-confirm="Are you sure you want to activate this student?" type="button"><span><i class="fa fa-toggle-off" aria-hidden="true"></i></span></button>
                                        @elseif($student['status'] == 1)
                                        <button title="Active" class="table_btn edit_linker on_switch" data-id="{{ $student['id'] }}" data-status="{{ $student['status'] }}" data-confirm="Are you sure you want to deactivate this student?" type="button"><span><i class="fa fa-toggle-on" aria-hidden="true"></i></span></button>
                                        @endif
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

                <!-- Edit Student Modal -->
                <div class="modal fade same_model_data" id="crud-modal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="studentCrudModal"></h4> <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form id="student_form" action="{{ route('student.store') }}" method="POST" autocomplete="off">
                                <div class="modal-body">

                                    <input type="hidden" name="student_id" id="student_id">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong>Name:</strong>
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Full Name" autofocus>
                                                @error('name')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong>Email:</strong>
                                                <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" autofocus>
                                                @error('email')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <strong for="type">Contact:</strong>
                                                <input type="text" name="contact" id="contact" class="form-control @error('contact') is-invalid @enderror" placeholder="Phone Number" autofocus>
                                                @error('contact')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="modal-footer">

                                    <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <!-- View Student Order Modal -->
                <div id="viewstudent" class="modal fade common_model" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Student Details</h4> <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="ov_main_wrap product_detailer">
                                    <div class="col-md-12 pdetailers">
                                        <div class="wrap_multier">
                                            <!-- <h1 class="left_ov_info">Product Details<span></span></h1> -->
                                            <div class="manage_orders" id="order_section">
                                                <div class="vo_section addActivate">
                                                    <h3>
                                                        Order Details
                                                        <span class="viewToggale"><i class="fa fa-plus-circle" aria-hidden="true"></i><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
                                                    </h3>
                                                    <div class="col-md-12 sec_colls">
                                                        <div class="table-responsive vo_table">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Order No.</th>
                                                                        <th>Order Placed</th>
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

                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap_bottomer">
                                        <div class="col-md-8 pdetailers">

                                            <div class="vo_section">
                                                <h3>Student Information</h3>
                                                <div class="col wrap_dual_col">
                                                    <div class="col-md-12 sec_colls half_sec_cols">
                                                        <h5></h5>
                                                        <div class="info_add oview_wrap">
                                                            <p><b>Personal Details:</b>
                                                                <span>
                                                                    <span style="display:inline;" id="user_name"></span>|
                                                                    <a href="#" style="display:inline;" id="user_email"></a>|
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
                                                            <p><b>Billing Address:</b>
                                                                <span id="bill_address"></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 sec_colls half_sec_cols">
                                                        <h5></h5>
                                                        <div class="info_add oview_wrap">
                                                            <p><b>Shipping Address:</b>
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
                                                        <!-- <tr>
                                                        <td>Subtotal:<span class="item_counts"></span></td>
                                                        <td>₹ <span id="order_subtotal"></span> </td>
                                                    </tr> -->
                                                        <tr class="last_tital">
                                                            <td class="total-price">Total Amount </td>
                                                            <td class="total-price">₹ <span id="order_total">10000</span> </td>
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
                            </div>
                            <div class="modal-footer dual_model_btn">
                                <button type="submit" class="btn btn-primary f-size" style="visibility: hidden;">Download Invoice</button>
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

        /* View Student Order */
        $(document).on('click', '.view-student', function() {
            var student_id = $(this).data('id');
            $.get('student/' + student_id, function(data) {

                if (data.length > 0) {
                    let strDetail = ``;
                    var total = 0;

                    $.each(data, function(key, item) {
                        total += Number(item.discounted_amount);

                        $('#order_total').html(total);
                        $('#user_name').html(item.user.name);
                        $('#user_email').html(item.user.email);
                        $('#user_phone').html(item.user.phone);
                        $('#bill_address').html(item.bill_address + ', ' + item.bill_address_city + ', ' + item.bill_address_state + ', ' + item.bill_address_country + ', ' + item.bill_address_pincode);
                        $('#ship_address').html(item.ship_address + ', ' + item.ship_address_city + ', ' + item.ship_address_state + ', ' + item.ship_address_country + ', ' + item.ship_address_pincode);

                        strDetail += `<tr>
                            <td class="saprate_comma sub" rowspan=${(item.order_details.length) + 1}>${item.order_no}</td>
                            <td class="min_set_wid" rowspan=${(item.order_details.length) + 1}>${formatDateTimeToDate(item.created_at)}</td>`

                        $.each(item.order_details, function(key, item) {
                            strDetail += `<tr>
                            <td class="saprate_comma">${item.product_name}</td>
                            <td>${item.product.user.name}</td>
                            <td>${item.attempt_name}</td>
                            <td>${item.mst_language.name}</td>
                            <td>${item.video_delivery_type.name}, ${item.book_delivery_type.name}</td>
                            <td class="price_set"><i class="fa fa-rupee"></i>${item.price}</td>
                            <td>1</td> </tr>`;
                        });
                        `</tr>`;
                    });

                    $('#order_details_table').html(strDetail);
                    $('#viewstudent').modal('show');
                } else {
                    alert("NO Orders");
                }

            })

        });

        /* Edit Student */
        $(document).on('click', '.edit-student', function() {
            var student_id = $(this).data('id');
            $.get('student/' + student_id + '/edit', function(data) {
                $('#studentCrudModal').html("Edit student");
                $('#crud-modal').modal('show');
                $('#student_id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#contact').val(data.phone);
            })
        });

        $('#student_form').on('submit', function(event) { 
            var name = $('#name').val();
            var email = $('#email').val();
            var contact = $('#contact').val();

            var name_length = name.length;

            var name_regex = /^([a-zA-Z\.]+\s)*[a-zA-Z\.]+$/;
            var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
            var phone_regex = /^((?!(0))[0-9]{10})$/;

            if(name == '' || email == '' || contact == '')
            {
                event.preventDefault();
                alert("Please fill all the fields.");
            }
            else if (name_length > 255) {
                event.preventDefault();
                alert("Name should not have more than 255 characters.");
            }
            else if (!name_regex.test(name)) {
                event.preventDefault();
                alert("Only letters, dot(.), single space between words are allowed in name field.");
            }
            else if (!email_regex.test(email)) {
                event.preventDefault();
                alert("E-mail Address is not valid!");
            }
            else if (!phone_regex.test(contact)) {
                event.preventDefault();
                alert("Contact is not valid!");
            }
        });

        /* Delete Student */
        $(document).on('click', '.delete-student', function() {
            var student_id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            // confirm("Are You sure you want to delete !");
            var choice = confirm(this.getAttribute('data-confirm'));

            if (choice) {

                $.ajax({
                    type: "DELETE",
                    url: "/admin-login/student/" + student_id,
                    data: {
                        "id": student_id,
                        "_token": token,
                    },
                    success: function(data) {
                        location.reload();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            }
        });

        /* Active/Deactive Student */
        $(document).on('click', '.off_switch, .on_switch', function() {
            var student_id = $(this).data('id');
            var status = $(this).data('status');
            var token = $("meta[name='csrf-token']").attr("content");
            var choice = confirm(this.getAttribute('data-confirm'));

            if (choice) {
                $.ajax({
                    type: "PUT",
                    url: "/admin-login/student/" + student_id,
                    data: {
                        "id": student_id,
                        "status": status == 1 ? 0 : 1,
                        "_token": token,
                    },
                    success: function(data) {
                        location.reload();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            }
        });

    });
</script>

<script>
    $(document).ready(function() {

        $(".wrap_multier .vo_section h3").click(function() {
            $(this).parent().toggleClass("addActivate");
        });

    });
</script>

@endpush