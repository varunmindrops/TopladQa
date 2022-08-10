<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/icon/favicon.ico')}}" type="image/x-icon">
    <title>Scholarship</title>
    <meta name="description"
    content="Learn from India's top CMA, CS & CA faculty at Toplad. We are dedicated to making it possible for anyone, anywhere, at any time to study CMA, CS & CA. Join Us Now.">
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
    "name": "Scholarship",
    "description": "{{ $response['name'] }}",
    "image": "{{ asset('images/rzp-256x256px.png') }}",
    "order_id": "{{ $response['orderId'] }}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function(response) {
        // alert(response.razorpay_payment_id);
        // alert(response.razorpay_order_id);
        // alert(response.razorpay_signature);

        document.getElementById('rzp_paymentid').value = response.razorpay_payment_id;
        document.getElementById('rzp_orderid').value = response.razorpay_order_id;
        document.getElementById('rzp_signature').value = response.razorpay_signature;

        document.getElementById('rzp_paymentresponse').click();
    },
    "prefill": {
        "name": "{{ $response['name'] }}",
        "email": "{{ $response['email'] }}",
        "contact": "{{ $response['phone'] }}"
    },
    "notes": {
        "Type": "Scholarship",
        "Name": "{{ $response['name'] }}",
        "Email": "{{ $response['email'] }}",
        "Phone": "{{ $response['phone'] }}"
    },
    "theme": {
        "color": "#01a4cd"
    }
};
options.modal = {
    ondismiss: function() {
        location.href = "/scholarship";
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
document.getElementById('rzp-button1').onclick = function(e) {
    rzp1.open();
    e.preventDefault();
}
</script>

<form action="/payment/scholarship" method="POST" hidden>
    @csrf
    <input type="text" class="form-control" name="rzp_paymentid" id="rzp_paymentid">
    <input type="text" class="form-control" name="rzp_orderid" id="rzp_orderid">
    <input type="text" class="form-control" name="rzp_signature" id="rzp_signature">
    <input type="text" class="form-control" name="name" id="name" value="{{ $response['name'] }}">
    <input type="text" class="form-control" name="email" id="email" value="{{ $response['email'] }}">
    <input type="text" class="form-control" name="phone" id="phone" value="{{ $response['phone'] }}">
    <input type="text" class="form-control" name="course_type" id="course_type" value="{{ $response['courseType'] }}">
    <input type="text" class="form-control" name="combo_type" id="combo_type" value="{{ $response['comboType'] }}">
    <input type="text" class="form-control" name="course" id="course" value="{{ $response['course'] }}">
    <input type="text" class="form-control" name="marks" id="marks" value="{{ $response['marks'] }}">
    <input type="text" class="form-control" name="max_marks" id="max_marks" value="{{ $response['maxMarks'] }}">
    <input type="text" class="form-control" name="percentage" id="percentage" value="{{ $response['percentage'] }}">
    <input type="text" class="form-control" name="registration_no" id="registration_no"
        value="{{ $response['registrationNo'] }}">
    <input type="text" class="form-control" name="roll_no" id="roll_no" value="{{ $response['rollNo'] }}">
    <input type="text" class="form-control" name="date" id="date" value="{{ $response['date'] }}">
    <input type="text" class="form-control" name="id_proof" id="id_proof" value="{{ $response['idProof'] }}">
    <input type="text" class="form-control" name="marksheet" id="marksheet" value="{{ $response['marksheet'] }}">
    <input type="text" class="form-control" name="price" id="price" value="{{ $response['amount'] }}">
    <button type="submit" id="rzp_paymentresponse" class="btn btn-primary">Submit</button>
</form>