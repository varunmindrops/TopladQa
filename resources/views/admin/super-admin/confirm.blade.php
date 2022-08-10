@php
$state = App\Models\MstRegion::where('id', $data['state'])->pluck('name')->first();
@endphp

@extends('layouts.admin-layout')

@section('content')

@include('admin.super-admin.layouts.sidebar')
<div class="content_super supar_main_cont">

    <div class="wrap_tab_contents">
        <div class="container-fluid">
            <div class="multi_steps_form">
                <form action="/counsellor/create" method="POST" autocomplete="off">

                    @csrf
                    <h3>Preview</h3>
                    <div class="tab">
                        <div class="row modal_row_data tab-one">
                            <div class="col-sm-12 fw_titles"><span class="tab_title">Course Info</span>
                            </div>
                            <div class="col-sm-4 col_inputs">
                                <div class="form-group">
                                    <label>Course</label>
                                    <input type="text" placeholder="Course Name" class="form-control" name="course_id" value="{{$data['course_id']}}" disabled id="course_name">
                                </div>
                            </div>
                            <div class="col-sm-4 col_inputs">
                                <div class="form-group">
                                    <label>Razorpay Order Id</label>
                                    <input type="text" placeholder="Razorpay Order Id" class="form-control" name="order_id" value="{{$data['rzp_order_id']}}" disabled id="rzp_order_id">
                                </div>
                            </div>
                            <div class="col-sm-4 col_inputs">
                                <div class="form-group">
                                    <label>Other Payment Id</label>
                                    <input type="text" placeholder="Other Payment Id" class="form-control" name="payment_id" id="payment_id" value="{{$data['other_payment_id']}}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-4 col_inputs">
                                <div class="form-group">
                                    <label>Registration Number</label>
                                    <input type="text" placeholder="Registration Number" class="form-control" name="reg_no" value="{{$data['reg_no']}}" disabled id="registration_no">
                                </div>
                            </div>
                        </div>

                        <div class="row modal_row_data tab-two">
                            <div class="col-sm-12 fw_titles"><span class="tab_title">Personal Info</span>
                            </div>
                            <div class="col-sm-4 col_inputs">
                                <div class="form-group">
                                    <label>Student Name</label>
                                    <input type="text" placeholder="Student Name" class="form-control" name="name" value="{{$data['name']}}" disabled id="user_name">
                                </div>
                            </div>
                            <div class="col-sm-4 col_inputs">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" placeholder="Phone Number" class="form-control" name="phone" value="{{$data['phone']}}" disabled id="user_phone">
                                </div>
                            </div>
                            <div class="col-sm-4 col_inputs">
                                <div class="form-group">
                                    <label>Email Id</label>
                                    <input type="email" placeholder="Email Id" class="form-control" name="email" value="{{$data['email']}}" disabled id="user_email">
                                </div>
                            </div>
                            <div class="col-sm-6 col_inputs">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" placeholder="Address" class="form-control" name="address" value="{{$data['address']}}" disabled id="user_address">
                                </div>
                            </div>
                            <div class="col-sm-3 col_inputs">
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" placeholder="State" class="form-control" name="state" value="{!! $state !!}" disabled id="user_state">
                                </div>
                            </div>
                            <div class="col-sm-3 col_inputs">
                                <div class="form-group">
                                    <label>Pincode</label>
                                    <input type="text" placeholder="Pincode" class="form-control" name="pin" value="{{$data['pin']}}" disabled id="user_pin">
                                </div>
                            </div>
                        </div>

                        @php
                        $courseItems = [];
                        foreach ($data['course_type'] as $key => $val) {
                        $items = [
                        'product_type' => $data['course_type'][$key],
                        'course_level' => $data['course_level_id'][$key],
                        'subject' => $data['subject_id'][$key],
                        'chapter' => $data['chapter_id'][$key],
                        'book' => $data['book_name'][$key],
                        'teacher' => $data['teacher_id'][$key],
                        'teacher_type' => $data['teacher_type'][$key],
                        'sale_mode' => $data['mode'][$key],
                        'language' => $data['language'][$key],
                        'price' => $data['payment'][$key]
                        ];
                        array_push($courseItems, $items);
                        }
                        @endphp

                        <div class="row modal_row_data tab-three" id="div_field">
                            <div class="col-sm-12 fw_titles"><span class="tab_title">Course Type</span>
                            </div>
                        @foreach ($courseItems as $val)

                            @php
                            $subject = App\Models\MstSubject::where('id', $val['subject'])->pluck('name')->first();
                            $teacher = App\Models\User::where('id', $val['teacher'])->pluck('name')->first();
                            $chapter = App\Models\MstChapter::where('id', $val['chapter'])->pluck('name')->first();
                            @endphp

                        @if($val['product_type'] == "capsule" || $val['product_type'] == "mtp" || $val['product_type'] == "rtp" || $val['product_type'] == "past papers")
                            <div class="row wrap_multi_courses">
                                <div class="col-sm-6 col_inputs">
                                    <div class="form-group">
                                        <label>Type of Course</label>
                                        <select class="form-control" name="product_type" id="course_type" disabled>
                                            <option>{{$val['product_type']}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col_inputs">
                                    <div class="form-group">
                                        <label>Group Name</label>
                                        <select class="form-control" name="course_level" disabled>
                                            <option>{{$val['course_level']}}</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="wrap_course_types col-sm-12">
                                    <div class="row inner_course_type common_ctypes" id="mtp-type">
                                        <div class="col-sm-6 col_inputs">
                                            <div class="form-group">
                                                <label>Subject Name/ Paper No.</label>
                                                <select class="form-control" name="subject_id" disabled>
                                                    <option>{{$subject}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col_inputs">
                                            <div class="form-group">
                                                <label>Teacher Name</label>
                                                <select class="form-control" name="teacher_id" disabled>
                                                    <option>{{$teacher}}</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Teacher Type</label>
                                        <select class="form-control" name="teacher_type" disabled>
                                            <option>{{$val['teacher_type']}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Sale mode</label>
                                        <select class="form-control" name="sale_mode" disabled>
                                            <option>{{$val['sale_mode']}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Payment</label>
                                        <input type="text" placeholder="Payment" class="form-control" name="price" disabled value="{{$val['price']}}">
                                    </div>
                                </div>
                            </div>

                        @elseif($val['product_type'] == "video lecture")
                            <div class="row wrap_multi_courses">
                                <div class="col-sm-6 col_inputs">
                                    <div class="form-group">
                                        <label>Type of Course</label>
                                        <select class="form-control" name="product_type" id="course_type" disabled>
                                            <option>{{$val['product_type']}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col_inputs">
                                    <div class="form-group">
                                        <label>Group Name</label>
                                        <select class="form-control" name="course_level" disabled>
                                            <option>{{$val['course_level']}}</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="wrap_course_types col-sm-12">
                                    <div class="row inner_course_type common_ctypes" id="mtp-type">
                                        <div class="col-sm-6 col_inputs">
                                            <div class="form-group">
                                                <label>Subject Name/ Paper No.</label>
                                                <select class="form-control" name="subject_id" disabled>
                                                    <option>{{$subject}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col_inputs">
                                            <div class="form-group">
                                                <label>Teacher Name</label>
                                                <select class="form-control" name="teacher_id" disabled>
                                                    <option>{{$teacher}}</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Teacher Type</label>
                                        <select class="form-control" name="teacher_type" disabled>
                                            <option>{{$val['teacher_type']}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Sale mode</label>
                                        <select class="form-control" name="sale_mode" disabled>
                                            <option>{{$val['sale_mode']}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Video Language</label>
                                        <input type="text" placeholder="Language" class="form-control" name="language" disabled value="{{$val['language']}}">
                                    </div>
                                </div>
                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Payment</label>
                                        <input type="text" placeholder="Payment" class="form-control" name="price" disabled value="{{$val['price']}}">
                                    </div>
                                </div>
                            </div>

                        @elseif($val['product_type'] == "combo")
                            <div class="row wrap_multi_courses">
                                <div class="col-sm-6 col_inputs">
                                    <div class="form-group">
                                        <label>Type of Course</label>
                                        <select class="form-control" name="product_type" id="course_type" disabled>
                                            <option>{{$val['product_type']}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col_inputs">
                                    <div class="form-group">
                                        <label>Group Name</label>
                                        <select class="form-control" name="course_level" disabled>
                                            <option>{{$val['course_level']}}</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="wrap_course_types col-sm-12">
                                    <div class="row inner_course_type common_ctypes" id="mtp-type">
                                        <div class="col-sm-6 col_inputs">
                                            <div class="form-group">
                                                <label>Subject Name/ Paper No.</label>
                                                <select class="form-control" name="subject_id" disabled>
                                                    <option>{{$subject}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col_inputs">
                                            <div class="form-group">
                                                <label>Teacher Name</label>
                                                <select class="form-control" name="teacher_id" disabled>
                                                    <option>{{$teacher}}</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Teacher Type</label>
                                        <select class="form-control" name="teacher_type" disabled>
                                            <option>{{$val['teacher_type']}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Sale mode</label>
                                        <select class="form-control" name="sale_mode" disabled>
                                            <option>{{$val['sale_mode']}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            @elseif($val['product_type'] == "chapter")
                            <div class="row wrap_multi_courses">
                                <div class="col-sm-6 col_inputs">
                                    <div class="form-group">
                                        <label>Type of Course</label>
                                        <select class="form-control" name="product_type" id="course_type" disabled>
                                            <option>{{$val['product_type']}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col_inputs">
                                    <div class="form-group">
                                        <label>Group Name</label>
                                        <select class="form-control" name="course_level" disabled>
                                            <option>{{$val['course_level']}}</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="wrap_course_types col-sm-12">
                                    <div class="row inner_course_type common_ctypes" id="mtp-type">
                                        <div class="col-sm-6 col_inputs">
                                            <div class="form-group">
                                                <label>Subject Name/ Paper No.</label>
                                                <select class="form-control" name="subject_id" disabled>
                                                    <option>{{$subject}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col_inputs">
                                            <div class="form-group">
                                                <label>Teacher Name</label>
                                                <select class="form-control" name="teacher_id" disabled>
                                                    <option>{{$teacher}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col_inputs">
                                            <div class="form-group">
                                                <label>Chapter Name</label>
                                                <select class="form-control" name="chapter_id" disabled>
                                                    <option>{{$chapter}}</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Teacher Type</label>
                                        <select class="form-control" name="teacher_type" disabled>
                                            <option>{{$val['teacher_type']}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Sale mode</label>
                                        <select class="form-control" name="sale_mode" disabled>
                                            <option>{{$val['sale_mode']}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Payment</label>
                                        <input type="text" placeholder="Payment" class="form-control" name="price" disabled value="{{$val['price']}}">
                                    </div>
                                </div>
                            </div>  
                            @elseif($val['product_type'] == "book")
                            <div class="row wrap_multi_courses">
                                <div class="col-sm-6 col_inputs">
                                    <div class="form-group">
                                        <label>Type of Course</label>
                                        <select class="form-control" name="product_type" id="course_type" disabled>
                                            <option>{{$val['product_type']}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col_inputs">
                                    <div class="form-group">
                                        <label>Group Name</label>
                                        <select class="form-control" name="course_level" disabled>
                                            <option>{{$val['course_level']}}</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="wrap_course_types col-sm-12">
                                    <div class="row inner_course_type common_ctypes" id="mtp-type">
                                        <div class="col-sm-6 col_inputs">
                                            <div class="form-group">
                                                <label>Subject Name/ Paper No.</label>
                                                <select class="form-control" name="subject_id" disabled>
                                                    <option>{{$subject}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col_inputs">
                                            <div class="form-group">
                                                <label>Teacher Name</label>
                                                <select class="form-control" name="teacher_id" disabled>
                                                    <option>{{$teacher}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col_inputs">
                                            <div class="form-group">
                                                <label>Book Name</label>
                                                <select class="form-control" name="book_name" disabled>
                                                    <option>{{$val['book']}}</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Teacher Type</label>
                                        <select class="form-control" name="teacher_type" disabled>
                                            <option>{{$val['teacher_type']}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Sale mode</label>
                                        <select class="form-control" name="sale_mode" disabled>
                                            <option>{{$val['sale_mode']}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3 col_inputs">
                                    <div class="form-group">
                                        <label>Payment</label>
                                        <input type="text" placeholder="Payment" class="form-control" name="price" disabled value="{{$val['price']}}">
                                    </div>
                                </div>
                            </div>  
                        @endif
                        @endforeach
                        </div>  

                        <div class="row modal_row_data tab-four">
                            <div class="col-sm-12 fw_titles"><span class="tab_title">Payment
                                    & Delivery</span>
                            </div>
                            <div class="col-sm-4 col_inputs">
                                <div class="form-group">
                                    <label>Amount Payable</label>
                                    <input type="text" placeholder="Amount Payable" class="form-control" name="amt_pay" value="{{$data['amt_pay']}}" disabled id="total_amt">
                                </div>
                            </div>
                            <div class="col-sm-4 col_inputs">
                                <div class="form-group">
                                    <label>Amount paid</label>
                                    <input type="text" placeholder="Amount paid" class="form-control" name="amt_paid" value="{{$data['amt_paid']}}" disabled id="paid_amt">
                                </div>
                            </div>

                            <div class="col-sm-4 col_inputs">
                                <div class="form-group">
                                    <label>Amount Pending</label>
                                    <input type="text" placeholder="Amount Pending" class="form-control" name="amt_pending" value="{{$data['amt_pending']}}" disabled id="pending_amt">
                                </div>
                            </div>
                            <div class="col-sm-4 col_inputs">
                                <div class="form-group">
                                    <label>Exam Attempt Due</label>
                                    <input type="text" placeholder="Exam Attempt Due" class="form-control" name="attempt" value="{{$data['attempt']}}" disabled id="attempt">
                                </div>
                            </div>
                            <div class="col-sm-4 col_inputs">
                                <div class="form-group">
                                    <label>Mode of Payment</label>
                                    <input type="text" placeholder="Mode of Payment" class="form-control" name="pay_mode" value="{{$data['pay_mode']}}" disabled id="pay_mode">
                                </div>
                            </div>
                            @if($data['pay_mode'] == "Other")
                            <div class="col-sm-4 col_inputs">
                                <div class="form-group">
                                    <label>Other Payment Mode</label>
                                    <input type="text" placeholder="Other Payment Mode" class="form-control" name="other_payment" value="{{$data['other_payment']}}" disabled id="other_payment">
                                </div>
                            </div>
                            @endif
                            <div class="col-sm-4 col_inputs">
                                <div class="form-group">
                                    <label>Counsellor Note</label>
                                    {{-- <input type="text" placeholder="Note" class="form-control" name="other_payment" value="{{$data['other_payment']}}" disabled id="other_payment"> --}}
                                    <textarea placeholder="Enter Note" class="form-control" name="counsellor_note" disabled id="counsellor_note" >{{$data['counsellor_note']}}</textarea>

                                </div>
                            </div>
                            @php
                            $postvalue = base64_encode(serialize($data));
                            @endphp
                            <input type="hidden" name="result" value="<?php echo $postvalue; ?>">
                        </div>
                    </div>
                    <div class="form-wizard-bnts preview_mode">
                        <div class="multi_fw_btn">
                            <a class="btn btn-primary nxt_btns" href="#" onclick="window.history.back()">Close</a>
                        </div>
                        <div class="multi_fw_btn">
                            <button type="submit" class="btn btn-primary nxt_btns">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection