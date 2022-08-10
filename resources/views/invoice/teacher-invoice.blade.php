<!DOCTYPE html>
<html>
<body>

<section id="student_invoice" class="invoice">
    <div class="container">
        <div class="invoice_print">

            <div class="row company_contact">
                <div class="col company_logo">
                    <a target="_blank" href="/">
                        <img src="https://demo.mindrops.com/raghav-academy/img/logo.png" data-holder-rendered="true" />
                    </a>
                </div>
                <div class="col company_add right_contents">

                    <div class="address">RaghavAcademy, <br>1/45a, First Floor, Lalita Park, <br>Near Gurudwara, Laxmi Nagar, Delhi-110092</div>
                    <div class="email"><a href="#">raghav@raghavacademy.com</a></div>
                </div>
            </div>
            <hr class="min_border">
            <div class="row contacts">
                <h3 class="print_title">Invoice <span class="order_no">#{{$orderData['order_no']}}</span></h3>
                <div class="col invoice-to">

                    <h4 class="to">{{$user['name']}}</h4>
                    <div class="address">{{$user['billAddress']['address']}}, {{$user['billAddress']['city']}} - {{$user['billAddress']['pin_code']}},
                                         <br>{{$user['billAddress']['landmark']}},
                                         <br>{{$user['billAddress']['state']['name']}}, {{$user['billAddress']['country']['name']}}</div>
                    <div class="email"><a href="#">{{$user['email']}}</a></div>
                </div>
                <div class="col invoice-details right_contents">

                    <div class="date">Date of Invoice: {{$orderData['time']}}</div>
                    <div class="date">Due Date: 30/10/2018</div>
                </div>
            </div>

            <div class="row invoice_listing">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border-0 text-uppercase font-weight-bold">Subject Name</th>
                                <th class="border-0 text-uppercase font-weight-bold">Faculty Name</th>
                                <th class="border-0 text-uppercase font-weight-bold">Video Dilivery Type</th>
                                <th class="border-0 text-uppercase font-weight-bold">Book Type</th>
                                <th class="border-0 text-uppercase font-weight-bold">Attempt</th>
                                <th class="border-0 text-uppercase font-weight-bold">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $sum = 0; @endphp
                        @foreach($arrFaculty as $details)
                        @foreach($details as $detail)
                            <tr>
                                <td>{{$detail['product']['subject']['name']}}</td>
                                <td>{{$detail['product']['user']['name']}}</td>
                                <td>{{$detail['video_delivery_type']['name']}}</td>
                                <td>{{$detail['book_delivery_type']['name']}}</td>
                                <td>{{$detail['mst_attempt']['name']}}</td>
                                <td><i class="fa fa-rupee"></i>Rs. {{$detail['price']}}</td>
                            </tr>
                            @php $sum += $detail['price']; @endphp
                        @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="invoice_title">
                <ul class="invoice_pricer">
                    <li><span class="price_name">Subtotal</span> <span class="amount_view"><i class="fa fa-rupee"></i> Rs. {{ $sum }}</span></li>
                    <li><span class="price_name">Shipping</span> <span class="amount_view"><i class="fa fa-rupee"></i> Rs. 250</span></li>
                    <li class="final_amount"><span class="price_name">Total</span> <span class="amount_view"><i class="fa fa-rupee"></i> Rs. {{ $sum + 250 }}</span></li>
                </ul>
            </div>
        </div>
    </div>
    </div>
    </container>
</section>

</body>
</html>
