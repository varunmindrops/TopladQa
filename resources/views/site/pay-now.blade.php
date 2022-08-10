@php

if(isset($data)) {

$sub_ids = explode(',', $data['subject_id']);
$subject = App\Models\MstSubject::whereIn('id', $sub_ids)->get();

if($data['product_type'] == "Chapter") {
$ch_ids = explode(',', $data['chapter_id']);
$chapter = App\Models\MstChapter::whereIn('id', $ch_ids)->get();
}

$ids = explode(',', $data['teacher_id']);
$teacher = [];
foreach($ids as $id) {
    $val = App\Models\User::where('id', $id)->first();
    $teacher[] = $val;
}
}

@endphp

@extends('layouts.layout')

@prepend('head-data')
<title>Payment - CMA | CS | CA | Online classes</title>
<meta name="description" content="Make payment for your favorite course, in easy & simple steps by sitting at your home. Our councellor will help you to purchase the ebst course suited for you and once you have chosen the course and faculty and payment is made, share the Screenshot with the counsellor who is helping you with the purchase.">
<meta name="keywords" content="CMA, CS, CA, CMA courses online, CS courses online, CA courses online, CMA Foundation to Final, CA Foundation to Final, Top CMA Faculty of India, Top CS Faculty of India, Top CA Faculty of India, Academy of Excellence, CMA in Future, CS in Future, CA in Future, CMA Books, CS Books, CA Books, Online CMA Classes, Online CS Classes, Online CA Classes" />
@endprepend

@section('content')

<div class="inner_theme_page pay_noww">
    <nav aria-label="breadcrumb" class="bdcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <!-- <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li title="Pay Now" class="breadcrumb-item active" aria-current="page">Pay Now</li> -->
            </ol>
        </div>
    </nav>

    <div class="wrap_theme_pages">
        <section class="pay_now_section">

            <div class="d-flex dual_pay align-items-start">
                <div class="pay_informs left_payer">
                    <div class="title_card">
                    @if(isset($data))
                <h5>Course</h5>
                <p>{{ $data['course_name'] }}</p>

                <h5>Product Type</h5>
                <p>{{ $data['product_type'] }}</p>

                <h5>Paper</h5>
                @foreach($subject as $key => $val)
                {{ $val->name }}
                @if($key < count($subject)-1 ), @endif @endforeach 

                @if($data['product_type']=="Book" ) <h5>Book Name</h5>
                    {{ $data['book_name'] }}
                @endif 
                
                @if($data['product_type']=="Chapter" ) <h5>Chapter</h5>
                    @foreach($chapter as $key => $val)
                    {{ $val->name }}
                    @if($key < count($chapter)-1 ), @endif @endforeach @endif 
                    
                    <h5>Faculty</h5>
                        @foreach($teacher as $key => $val)
                        {{ $val->name }}
                        @if($key < count($teacher)-1 ), @endif @endforeach 
                @endif 

                <br/><br/>
                
                        <h3>Make your payment here, Simple, Easy!</h3>
                        <span class="min_divided"></span>
                        <p>Make payment for your favorite course, in easy & simple steps here. Enter
                            all the
                            asked
                            details in the fields shown here. In the Note Section, mention Subject
                            Name,
                            Faculty
                            Name and course you are interested in purchasing. </p>
                        <p>Once payment is made, share the Screenshot with the counsellor who is
                            helping you
                            with
                            the purchase. </p>
                    </div>
                    <div class="contact_card">
                        <h5>Contact Us:</h5>
                        <span class="pay_mails common_pay_action"><i class="fa fa-envelope-o" aria-hidden="true"></i><span class="pay_all_contacts"> <a href="mailto:info@toplad.in">
                        info@toplad.in</a></span></span>
                        <span class="pay_calss common_pay_action"><i class="fa fa-phone" aria-hidden="true"></i><span class="pay_all_contacts"> <a href="tel:011-41681230"> 011-41681230</a>, <a href="tel:9953155682">
                                    9953155682</a>, <a href="tel:9953155680"> 9953155680</a>, <a href="tel:9953155628"> 9953155628</a></span></span>
                    </div>
                </div>
                <div class="pay_informs right_payer">

                    <div id="payment_form" class="conntact-home">

                        <div class="call-back-form p-b20 p-t10">
                            <h3 class="font-weight-400 text-white m-b5 text-uppercase">Payment Form
                            </h3>
                            <span class="min_divided"></span>

                            @if(isset($data))
                            @if($data['product_type'] == "Capsule")
                            <form class="cons-contact-form form-transparent validate-form" method="POST" action="/{{$data['course_name']}}/payment/pay" autocomplete="off">
                                @elseif($data['product_type'] == "MTP")
                                <form class="cons-contact-form form-transparent validate-form" method="POST" action="/{{$data['course_name']}}/payment/mtp" autocomplete="off">
                                    @elseif($data['product_type'] == "RTP")
                                    <form class="cons-contact-form form-transparent validate-form" method="POST" action="/{{$data['course_name']}}/payment/rtp" autocomplete="off">
                                        @elseif($data['product_type'] == "Past Papers")
                                        <form class="cons-contact-form form-transparent validate-form" method="POST" action="/{{$data['course_name']}}/payment/papers" autocomplete="off">
                                            @elseif($data['product_type'] == "Chapter")
                                            <form class="cons-contact-form form-transparent validate-form" method="POST" action="/{{$data['course_name']}}/payment/chapter" autocomplete="off">
                                                @elseif($data['product_type'] == "Combo")
                                                <form class="cons-contact-form form-transparent validate-form" method="POST" action="/{{$data['course_name']}}/payment/checkout" autocomplete="off">
                                                    @elseif($data['product_type'] == "Video Lecture")
                                                    <form class="cons-contact-form form-transparent validate-form" method="POST" action="/payment/complete-page" autocomplete="off">
                                                        @elseif($data['product_type'] == "Book")
                                                        <form class="cons-contact-form form-transparent validate-form" method="POST" action="/{{$data['course_name']}}/payment/book" autocomplete="off">
                                                        @endif
                                                        @csrf
                                                        <div class="form-group">
                                                            <label>Name</label>
                                                            <input name="p_name" id="p_name" type="text" class="form-control" value="{{ old('p_name') }}" placeholder="Name" required>
                                                            
                                                            <p id="name_error" style="color:red;font-size: 13px;"></p>
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="email" class="form-control @error('p_email') is-invalid @enderror" name="p_email" value="{{ old('p_email') }}" placeholder="Email" required>
                                                            @error('p_email')
                                                            <p class="error_result" style="color:red">
                                                                {{$message}}
                                                            </p>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Phone</label>
                                                            <input type="text" minlength="10" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control @error('p_phone') is-invalid @enderror" name="p_phone" id="p_phone" value="{{ old('p_phone') }}" placeholder="Phone" required>
                                                            @error('p_phone')
                                                            <p class="error_result" style="color:red">
                                                                {{$message}}
                                                            </p>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Amount (₹)</label>
                                                            <input type="text" class="form-control @error('p_amount') is-invalid @enderror" name="p_amount" value="{{ $data['price'] }}" placeholder="Amount" required disabled>
                                                            @error('p_amount')
                                                            <p class="error_result" style="color:red">
                                                                {{$message}}
                                                            </p>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Note</label>
                                                            <textarea name="p_note" class="form-control @error('p_note') is-invalid @enderror" rows="4" required placeholder="Enter Note &#10;For Eg: - CMA Inter Group 2 - Video Classes - IDT - Raghav Goel, CMA Inter Group 2 - Video Classes - FM - HL Gupta">{{ old('p_note') }}</textarea>
                                                            @error('p_note')
                                                            <p class="error_result" style="color:red">
                                                                {{$message}}
                                                            </p>
                                                            @enderror
                                                        </div>
                                                        <input type="hidden" class="form-control" name="teacher_id" value="{{ $data['teacher_id'] }}">
                                                        @if(array_key_exists("group", $data))
                                                        <input type="hidden" class="form-control" name="group" value="{{ $data['group'] }}">
                                                        @endif

                                                        @if(array_key_exists("paper_no", $data))
                                                        <input type="hidden" class="form-control" name="paper_no" value="{{ $data['paper_no'] }}">
                                                        @endif

                                                        @if(array_key_exists("book_name", $data))
                                                        <input type="hidden" class="form-control" name="book_name" value="{{ $data['book_name'] }}">
                                                        @endif
                                                        
                                                        <input type="hidden" class="form-control" name="subject_id" value="{{ $data['subject_id'] }}">
                                                        <input type="hidden" class="form-control" name="course_name" value="{{ $data['course_name'] }}">
                                                        <input type="hidden" class="form-control" name="price" value="{{ $data['price'] }}">
                                                        <input type="hidden" class="form-control" name="product_type" value="{{ $data['product_type'] }}">
                                                        @if(array_key_exists("coverage", $data))
                                                        <input type="hidden" class="form-control" name="coverage" value="{{ $data['coverage'] }}">
                                                        @endif

                                                        @if(array_key_exists("mode", $data))
                                                        <input type="hidden" class="form-control" name="mode" value="{{ $data['mode'] }}">
                                                        @endif

                                                        @if(array_key_exists("chapter_id", $data))
                                                        <input type="hidden" class="form-control" name="chapter_id" value="{{ $data['chapter_id'] }}">
                                                        @endif

                                                        @if(array_key_exists("chapter_price", $data))
                                                        <input type="hidden" class="form-control" name="chapter_price" value="{{ $data['chapter_price'] }}">
                                                        @endif

                                                        @if(array_key_exists("no_of_subjects", $data))
                                                        <input type="hidden" class="form-control" name="no_of_subjects" value="{{ $data['no_of_subjects'] }}">
                                                        @endif

                                                        @if(array_key_exists("book_type", $data))
                                                        <input type="hidden" class="form-control" name="book_type" value="{{ $data['book_type'] }}">
                                                        @endif

                                                        @if(array_key_exists("attempt", $data))
                                                        <input type="hidden" class="form-control" name="attempt" value="{{ $data['attempt'] }}">
                                                        @endif

                                                        @if(array_key_exists("language", $data))
                                                        <input type="hidden" class="form-control" name="language" value="{{ $data['language'] }}">
                                                        @endif

                                                        @if(array_key_exists("product_id", $data))
                                                        <input type="hidden" class="form-control" name="product_id" value="{{ $data['product_id'] }}">
                                                        @endif

                                                        @if(array_key_exists("slug", $data))
                                                        <input type="hidden" class="form-control" name="slug" value="{{ $data['slug'] }}">
                                                        @endif

                                                        @if(array_key_exists("segment", $data))
                                                        <input type="hidden" class="form-control" name="segment" value="{{ $data['segment'] }}">
                                                        @endif

                                                        <button type="submit" class="feedback_btnss">
                                                            Pay Now
                                                        </button>
                                                    </form>
                                                    @else
                                                    <form class="cons-contact-form form-transparent" method="POST" action="/payment/pay-us" autocomplete="off">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label>Name</label>
                                                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Name" autofocus>
                                                            @error('name')
                                                            <p class="error_result" style="color:red">
                                                                {{$message}}
                                                            </p>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" autofocus>
                                                            @error('email')
                                                            <p class="error_result" style="color:red">
                                                                {{$message}}
                                                            </p>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Phone</label>
                                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Phone" autofocus>
                                                            @error('phone')
                                                            <p class="error_result" style="color:red">
                                                                {{$message}}
                                                            </p>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Amount (₹)</label>
                                                            <input type="number" min="1" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" placeholder="Amount" autofocus>
                                                            @error('amount')
                                                            <p class="error_result" style="color:red">
                                                                {{$message}}
                                                            </p>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Note</label>
                                                            <textarea name="note" class="form-control @error('note') is-invalid @enderror" rows="4" placeholder="Enter Note &#10;For Eg: - CMA Inter Group 2 - Video Classes - IDT - Raghav Goel, CMA Inter Group 2 - Video Classes - FM - HL Gupta">{{ old('note') }}</textarea>
                                                            @error('note')
                                                            <p class="error_result" style="color:red">
                                                                {{$message}}
                                                            </p>
                                                            @enderror
                                                        </div>
                                                        <button type="submit" class="feedback_btnss">
                                                            Pay Now
                                                        </button>
                                                    </form>
                                                    @endif

                        </div>

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
$(".validate-form").submit(function() {
 
 var name = $('#p_name').val();
 var name_regex = /^([a-zA-Z\.]+\s)*[a-zA-Z\.]+$/;
    if (!name_regex.test(name)) {
        event.preventDefault();
        $('#name_error').text("Only letters, dot(.), single space between words are allowed in name field.");
    }
});
</script>
@endpush