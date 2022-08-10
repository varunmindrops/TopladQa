@extends('layouts.admin-layout')

@section('content')

@include('admin.super-admin.layouts.sidebar')
<div class="content_super supar_main_cont">

    <div class="wrap_tab_contents">
        <div class="container-fluid">

            <div class="multi_steps_form">
                <form id="orderForm" action="/counsellor/confirm" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <h3>Add New Order</h3>

                    <!-- One "tab" for each step in the form: -->
                    <div class="tab">
                        <div class="row modal_row_data tab-one">
                            <div class="col-sm-12 fw_titles"><span class="tab_title">Course Info</span></div>
                            <div class="col-sm-4 col_inputs">
                                <div class="form-group">
                                    <label>Select Course</label>
                                    <select class="form-control @error('course_id') is-invalid @enderror dynamic" name="course_id" id="course_id" value="{{ old('course_id') }}" data-dependent="course_level_id">
                                        <option value="">Select Course</option>
                                        @foreach($data as $course)
                                        <option value="{{$course['value']}}" <?php { {
                                                                                        echo old('course_id') == $course['value'] ? 'selected' : '';
                                                                                    }
                                                                                } ?>>
                                            {{$course['name']}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('course_id')
                                    <p class="error_result" style="color:red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4 col_inputs">
                                <div class="form-group">
                                    <label>Razorpay Order Id</label>
                                    <input type="text" placeholder="Razorpay Order Id" class="form-control @error('rzp_order_id') is-invalid @enderror" name="rzp_order_id" id="order_id" value="{{ old('rzp_order_id') }}">
                                    @error('rzp_order_id')
                                    <p class="error_result" style="color:red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4 col_inputs">
                                <div class="form-group">
                                    <label>Other Payment Id</label>
                                    <input type="text" placeholder="Other Payment Id" class="form-control @error('other_payment_id') is-invalid @enderror" name="other_payment_id" id="payment_id" value="{{ old('other_payment_id') }}">
                                    @error('other_payment_id')
                                    <p class="error_result" style="color:red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4 col_inputs">
                                <div class="form-group">
                                    <label>Registration Number</label>
                                    <input type="text" placeholder="Registration Number" class="form-control @error('reg_no') is-invalid @enderror" name="reg_no" id="reg_no" value="{{ old('reg_no') }}">
                                    @error('reg_no')
                                    <p class="error_result" style="color:red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row modal_row_data tab-two">
                            <div class="col-sm-12 fw_titles"><span class="tab_title">Personal Info</span></div>
                            <div class="col-sm-4 col_inputs">
                                <div class="form-group">
                                    <label>Student Name</label>
                                    <input type="text" placeholder="Student Name" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                                    @error('name')
                                    <p class="error_result" style="color:red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4 col_inputs">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" placeholder="Phone Number" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                    <p class="error_result" style="color:red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4 col_inputs">
                                <div class="form-group">
                                    <label>Email Id</label>
                                    <input type="email" placeholder="Email Id" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                                    @error('email')
                                    <p class="error_result" style="color:red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col_inputs">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" placeholder="Address" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address') }}">
                                    @error('address')
                                    <p class="error_result" style="color:red">{{$message}}</p>
                                    @enderror
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
                                    @error('state')
                                    <p class="error_result" style="color:red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3 col_inputs">
                                <div class="form-group">
                                    <label>Pincode</label>
                                    <input type="number" placeholder="Pincode" class="form-control @error('pin') is-invalid @enderror" name="pin" id="pin" value="{{ old('pin') }}">
                                    @error('pin')
                                    <p class="error_result" style="color:red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row modal_row_data tab-three" id="div_field">
                            <div class="col-sm-12 fw_titles add_more_vids"><span class="tab_title">Course Type <a class="btn btn-primary action_copy" id="add_course">
                                        Add More
                                    </a></span> </div>
                            <div class="row course-vid_types">
                                <div class="col-sm-6 col_inputs">
                                    <div class="form-group">
                                        <label>Type of Course</label>
                                        <select class="form-control @error('course_type') is-invalid @enderror" name="course_type[0]" id="course_type_0">
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
                                        <select class="form-control @error('course_level_id') is-invalid @enderror dynamic-list" name="course_level_id[0]" id="course_level_id_0" data-dependent="subject_id">
                                            <option value="">Select Group</option>
                                        </select>
                                        @error('course_level_id')
                                        <p class="error_result" style="color:red">{{$message}}</p>
                                        @enderror
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
                                                @error('subject_id')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col_inputs" id="chapter-type_0" style="display:none;">
                                            <div class="form-group">
                                                <label>Chapter Name</label>
                                                <select class="form-control @error('chapter_id') is-invalid @enderror" name="chapter_id[0]" id="chapter_id_0">
                                                    <option value="">Select Chapter</option>
                                                </select>
                                                @error('chapter_id')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
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
                                                @error('course')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Teacher Type</label>
                                        <select class="form-control" name="teacher_type[0]" id="teacher_type_0">
                                            <option value="Internal">Internal</option>
                                            <option value="External">External</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Sale mode</label>
                                        <select class="form-control @error('mode') is-invalid @enderror" name="mode[0]" id="mode_0">
                                            <option value="">Select Sale Mode</option>
                                        </select>
                                        @error('mode')
                                        <p class="error_result" style="color:red">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-3 col_inputs" id="language_div_0" style="display:none;">
                                    <div class="form-group">
                                        <label>Video Language</label>
                                        <input type="text" placeholder="Language" name="language[0]" id="language_0" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-3 col_inputs" id="payment_div_0" style="display:none;">
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
                                    <input type="text" placeholder="Amount Payable" class="form-control @error('amt_pay') is-invalid @enderror" name="amt_pay" id="amt_pay" value="{{ old('amt_pay') }}">
                                    @error('amt_pay')
                                    <p class="error_result" style="color:red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4 col_inputs">
                                <div class="form-group">
                                    <label>Amount paid</label>
                                    <input type="text" placeholder="Amount paid" class="form-control @error('amt_paid') is-invalid @enderror" name="amt_paid" id="amt_paid" value="{{ old('amt_paid') }}">
                                    @error('amt_paid')
                                    <p class="error_result" style="color:red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-4 col_inputs">
                                <div class="form-group">
                                    <label>Amount Pending</label>
                                    <input type="text" placeholder="Amount Pending" class="form-control @error('amt_pending') is-invalid @enderror" name="amt_pending" id="amt_pending" value="{{ old('amt_pending') }}" readonly>
                                    @error('amt_pending')
                                    <p class="error_result" style="color:red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4 col_inputs">
                                <div class="form-group">
                                    <label>Exam Attempt Due</label>
                                    <select class="form-control @error('attempt') is-invalid @enderror" name="attempt" id="attempt">
                                        <option value="">Select Exam Attempt</option>
                                    </select>
                                    @error('attempt')
                                    <p class="error_result" style="color:red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4 col_inputs">
                                <div class="form-group">
                                    <label>Mode of Payment</label>
                                    <select class="form-control @error('pay_mode') is-invalid @enderror" name="pay_mode" id="pay_mode">
                                        <option value="">Select Payment Mode</option>
                                    </select>
                                    @error('pay_mode')
                                    <p class="error_result" style="color:red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4 col_inputs" id="other" style="display: none;">
                                <div class="form-group">
                                    <label>Other Payment Mode</label>
                                    <input type="text" placeholder="Other Payment Mode" class="form-control @error('other_payment') is-invalid @enderror" name="other_payment" id="other_payment" value="{{ old('other_payment') }}">
                                    @error('other_payment')
                                    <p class="error_result" style="color:red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4 col_inputs">
                                <div class="form-group">
                                    <label>Counsellor Note</label>
                                    {{-- <input type="text" placeholder="Enter Note" class="form-control @error('note') is-invalid @enderror" name="note" id="note" value="{{ old('note') }}"> --}}
                                    <textarea placeholder="Enter Note" class="form-control @error('counsellor_note') is-invalid @enderror" name="counsellor_note" id="counsellor_note" >{{ old('counsellor_note') }}</textarea>
                                    @error('counsellor_note')
                                    <p class="error_result" style="color:red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-wizard-bnts">
                        <div class="multi_fw_btn">
                            <button type="submit" class="btn btn-primary nxt_btns">Preview</button>
                        </div>
                    </div>
                </form>
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
            data: 'JUNE 2023'
        },
        {
            val: 'cs',
            data: 'DEC 2022'
        },
        {
            val: 'cs',
            data: 'JUNE 2023'
        },
        {
            val: 'ca',
            data: 'MAY 2023'
        },
        {
            val: 'ca',
            data: 'NOV 2022'
        }
    ]

    var paymentMode = [{
            val: 'Website'
        },
        {
            val: 'Payment Link'
        },
        {
            val: 'Wallet'
        },
        {
            val: 'Cash'
        },
        {
            val: 'Bank Transfer'
        },
        {
            val: 'Other'
        }
    ]

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
                options += '<option value="' + value.type + '">' + value.product + '</option>';
            }
        });
        var exam_attempt = '<option value="">Select Exam Attempt</option>';
        $(attempt).each(function(index, value) {
            if (value.val == courses) {
                exam_attempt += '<option value="' + value.data + '">' + value.data + '</option>';
            }
        });

        $('#course_type_0').html(options);
        $('#attempt').html(exam_attempt);
        $('.new_div').remove();
        $('#mtp-type_0').hide();
        $('#chapter-type_0').hide();
        $('#book-type_0').hide();
    });

    $('#course_type_0').on('change', function() {
        var type = $(this).val();
        var course = $("#course_id").val();
        var dependent = $('.dynamic').data("dependent");
        if (type == "capsule" || type == "past papers" || type == "mtp" || type == "rtp") {
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
            $('#book-type_0').show();
            $('#mtp-type_0').show();
            $('#chapter-type_0').hide();
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
        saleOptions += '<option value="' + value.mode + '">' + value.mode + '</option>';
    });
    $('#mode_0').html(saleOptions);

    var paymentOptions = '<option value="">Select Payment Mode</option>';
    $(paymentMode).each(function(index, value) {
        paymentOptions += '<option value="' + value.val + '">' + value.val + '</option>';
    });
    $('#pay_mode').html(paymentOptions);

    let videoElemCount = 1;

    function videoElemCounter(action) {
        videoElemCount = $('#div_field').children('div').length + 1;
        return action == 'increase' ? videoElemCount++ : videoElemCount--;
    }

    $(document).on('click', '#add_course', function() {
        var course = $('#course_id').val();
        elem_id = videoElemCounter('increase');
        $('#div_field').append(appendNewCourse(elem_id));
        $('#course_type_' + elem_id).html(options);
        $('#course_level_id_' + elem_id).html(levels);

        $('#course_type_' + elem_id).on('change', function() {
            var type = $(this).val();
            if (type == "capsule" || type == "past papers" || type == "mtp" || type == "rtp") {
                $('#mtp-type_' + elem_id).show();
                $('#chapter-type_' + elem_id).hide();
                $('#book-type_' + elem_id).hide();
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
            } else if (type == "book") {
                $('#chapter-type_' + elem_id).hide();
                $('#book-type_' + elem_id).show();
                $('#mtp-type_' + elem_id).show();
                $('#language_div_' + elem_id).hide();
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
            }
        });
        $('#mode_' + elem_id).html(saleOptions);

        $("form").submit(function() {
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
        });

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
                                    @error('course')
                                    <p class="error_result" style="color:red">{{$message}}</p>
                                    @enderror
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

    var pay;
    var paid;

    function pendingAmount(pay, paid) {
        var total = (pay - paid);
        total = total.toFixed(2);
        $('#amt_pending').val(total);
    }

    $('#amt_pay').on('input', function() {
        pay = $(this).val();
        pendingAmount(pay, paid);
    });

    $('#amt_paid').on('input', function() {
        paid = $(this).val();
        pendingAmount(pay, paid);
    });

    $("#pay_mode").change(function() {
        if ($(this).val() == "Other") {
            $("#other").show();
        } else {
            $("#other").hide();
        }
    });

    $("form").submit(function() {
        var course = $('#course_id').val();
        var reg = $('#reg_no').val();
        var name = $('#name').val();
        var phone = $('#phone').val();
        var email = $('#email').val();
        var address = $('#address').val();
        var state = $('#state').val();
        var pin = $('#pin').val();
        var pay = $('#amt_pay').val();
        var paid = $('#amt_paid').val();
        var pending = $('#amt_pending').val();
        var attempt = $('#attempt').val();
        var pay_mode = $('#pay_mode').val();
        var other_mode = $('#other_payment').val();
        var note = $.trim($("#counsellor_note").val());
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
    });
</script>

@endpush