<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/icon/favicon.ico')}}" type="image/x-icon">
    @if($segment == 'cma')
        <title>Buy Past Papers | From June 2017 till December 2019</title>
    @elseif($segment == 'cs')
        <title>Buy Past Papers | From June 2017 till December 2020</title>
    @elseif($segment == 'ca') 
        <title>Buy Past Papers | From November 2018 till January 2021</title>
    @endif
    <meta name="description"
    content="Learn from India's top {{ strtoupper($segment) }} faculty at Toplad. We are dedicated to making it possible for anyone, anywhere, at any time to study {{ strtoupper($segment) }}. Join Us Now.">
</head>
<body style="background-color: #01a4cd">
    
</body>
</html>
<button id="rzp-button1" hidden>Pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "{{ $response['razorpayId'] }}", // Enter the Key ID generated from the Dashboard
    "amount": "{{ $response['amount'] }}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "{{ $response['currency'] }}",
    "name": "{{ $response['paperNo'] }} {{ $subject['name'] }}",
    "description": '<?php echo htmlspecialchars_decode($faculty['name'].", ".$response['paperNo']." ".$subject['name']) ?>',
    "image": "{{ asset('images/rzp-256x256px.png') }}",
    "order_id": "{{ $response['orderId'] }}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        // alert(response.razorpay_payment_id);
        // alert(response.razorpay_order_id);
        // alert(response.razorpay_signature);

        document.getElementById('rzp_paymentid').value= response.razorpay_payment_id;
        document.getElementById('rzp_orderid').value= response.razorpay_order_id;
        document.getElementById('rzp_signature').value= response.razorpay_signature;

        document.getElementById('rzp_paymentresponse').click();
    },
    "prefill": {
        "name": "{{ $response['name'] }}",
        "email": "{{ $response['email'] }}",
        "contact": "{{ $response['phone'] }}"
    },
    "notes": {
        "Course Name": "{{ $response['courseName'] }}",
        "Product Type": "{{ $response['productType'] }}",
        "Group Name": "{{ $response['group'] }}",
        "Subject Name": '<?php echo htmlspecialchars_decode($subject['name']) ?>',
        "Faculty Name": "{{ $faculty['name'] }}",
        "Video Coverage": "{{ $response['coverage'] }}",
        "Delivery Mode": '<?php echo htmlspecialchars_decode($response['mode']) ?>',
        "Student Note": "{{ $response['note'] }}"
    },
    "theme": {
        "color": "#01a4cd"
    }
};
options.modal = {
		ondismiss: function() {
            location.href="/{{$segment}}/{{$segment}}-past-papers";
		},
		// Boolean indicating whether pressing escape key 
		// should close the checkout form. (default: true)
		escape: true,
		// Boolean indicating whether clicking translucent blank
		// space outside checkout form should close the form. (default: false)
		backdropclose: false
	};
var rzp1 = new Razorpay(options);
window.onload = function() {
    document.getElementById('rzp-button1').click();
};
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>

<form action="/{{$segment}}/payment/complete-order" method="POST" hidden>
    @csrf
    <input type="text" class="form-control" name="rzp_paymentid" id="rzp_paymentid">
    <input type="text" class="form-control" name="rzp_orderid" id="rzp_orderid">
    <input type="text" class="form-control" name="rzp_signature" id="rzp_signature">
    <input type="text" class="form-control" name="name" id="name" value="{{ $response['name'] }}">
    <input type="text" class="form-control" name="email" id="email" value="{{ $response['email'] }}">
    <input type="text" class="form-control" name="phone" id="phone" value="{{ $response['phone'] }}">
    <input type="text" class="form-control" name="note" id="note" value="{{ $response['note'] }}">
    <input type="text" class="form-control" name="course_name" id="course_name" value="{{ $response['courseName'] }}">
    <input type="text" class="form-control" name="teacher_id" id="teacher_id" value="{{ $response['teacherId'] }}">
    <input type="text" class="form-control" name="subject_id" id="subject_id" value="{{ $response['subjectId'] }}">
    <input type="text" class="form-control" name="coverage" id="coverage" value="{{ $response['coverage'] }}">
    <input type="text" class="form-control" name="mode" id="mode" value="{{ $response['mode'] }}">
    <input type="text" class="form-control" name="group" id="group" value="{{ $response['group'] }}">
    <input type="text" class="form-control" name="price" id="price" value="{{ $response['amount'] }}">
    <button type="submit" id="rzp_paymentresponse" class="btn btn-primary">Submit</button>
</form>