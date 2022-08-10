<!DOCTYPE html>
<html>

<body style="font-family: arial, sans-serif;margin-top:15px;">
    <section id="student_invoice" class="invoice">
        <div class="container">
            <div class="invoice_print">
                <div class="row invoice_listing" style="margin-top: 10px;">
                    <div class="row_table">
                        <table class="table" width="100%" style="border-collapse: collapse;width: 100%;">
                            <thead>
                                <tr>
                                    <th align="left" style="font-weight: 100;">
                                        <a target="_blank" href="/">
                                            <img src="http://cdn.mcauto-images-production.sendgrid.net/479814b15b746a8f/895e9603-bea5-404e-8ab5-17d2fc2fe8c7/586x130.png" data-holder-rendered="true" />
                                        </a>
                                    </th>
                                    <th align="right" style="font-weight: 100;">
                                        <div class="right_contents">
                                            <h4 class="to" style="margin: 0px 0px 5px;">Toplad</h4>
                                            <div class="address" style="line-height: 23px;margin:10px 0px;">1/45a, First Floor, Lalita Park,
                                                <br>Near Gurudwara, Laxmi Nagar, <br>Delhi-110092
                                            </div>
                                            <div class="email"><a href="#">info@toplad.in</a></div>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

                <hr class="min_border">

                <div class="row invoice_listing" style="margin-top: 10px;">
                    <div class="row_table">
                        <table class="table" width="100%" style="border-collapse: collapse;width: 100%;">
                            <thead>
                                <tr>
                                    <th align="left" style="font-weight: 100;">
                                        Invoice Number: <span class="order_no" style="font-weight: 700;">{{ $order['invoice_number'] }}</span>
                                    </th>
                                    <th align="right" style="font-weight: 100;">
                                        Order Number: <span class="order_no" style="font-weight: 700;">{{ $order['order_no'] }}</span>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="row invoice_listing" style="margin-top: 30px;">
                    <div class="row_table">
                        <table class="table" width="100%" style="border-collapse: collapse;width: 100%;">
                            <thead>
                                <tr>
                                    <th align="left" style="font-weight: 100;">
                                        <div class="invoice-to">
                                            <h4 class="to" style="margin: 0px 0px 5px;">{{ $order['user']['name']}}</h4>
                                            <div class="address" style="line-height: 23px;margin:10px 0px;">{{$order['bill_address']}}, {{$order['bill_address_city']}} - {{$order['bill_address_pincode']}},
                                                @if(!empty($order['bill_address_landmark']))
                                                <br>{{$order['bill_address_landmark']}},
                                                @endif
                                                <br>{{$order['bill_address_state']}}, {{$order['bill_address_country']}}
                                            </div>
                                            <div class="email"><a href="#">{{$order['user']['email']}}</a></div>
                                        </div>
                                    </th>
                                    <th align="right" style="font-weight: 100;">
                                        <div class="date">Date of Invoice: <b>{{$order['date']}}</b></div>
                                          <div class="date">Razorpay Order ID: <b>{{$order['rzp_order_id']}}</b></div>
                                          <div class="date">Razorpay Payment ID: <b>{{$payment_id}}</b></div>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="row invoice_listing" style="margin-top: 30px;">
                    <div class="table-responsive table-bordered">

                        <table class="table" width="100%" style="border-collapse: collapse;width: 100%;">
                            <thead>
                                <tr>
                                    <th style="min-width: 90px;border: 1px solid #dddddd;text-align: left;padding: 5px;">
                                        Course Name</th>
                                    <th style="min-width: 75px;border: 1px solid #dddddd;text-align: left;padding: 7px;">
                                        Faculty Name</th>
                                    <th style="min-width: 115px;border: 1px solid #dddddd;text-align: left;padding: 8px;">
                                        Video Delivery Type</th>
                                    <th style="min-width: 75px;border: 1px solid #dddddd;text-align: left;padding: 7px;">
                                        Book Type</th>
                                    <th style="min-width: 75px;border: 1px solid #dddddd;text-align: left;padding: 7px;">
                                        Language</th>
                                    <th style="min-width: 60px;border: 1px solid #dddddd;text-align: left;padding: 8px;">
                                        Attempt</th>
                                    <th style="min-width: 75px;border: 1px solid #dddddd;text-align: left;padding: 8px;">
                                        Price</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($order['order_details'] as $detail)
                                <tr>
                                    <td style="font-size: 14px;border: 1px solid #dddddd;text-align: left;padding: 5px;">
                                        {{$detail['product_name']}}</td>
                                    <td style="font-size: 14px;border: 1px solid #dddddd;text-align: left;padding: 7px;">
                                        {{$detail['product']['user']['name']}}</td>
                                    <td style="font-size: 14px;border: 1px solid #dddddd;text-align: left;padding: 8px;">
                                        {{$detail['video_delivery_type']['name']}}</td>
                                    <td style="font-size: 14px;border: 1px solid #dddddd;text-align: left;padding: 7px;">
                                        {{$detail['book_delivery_type']['name']}}</td>
                                    <td style="font-size: 14px;border: 1px solid #dddddd;text-align: left;padding: 7px;">
                                        {{$detail['mst_language']['name']}}</td>
                                    <td style="font-size: 14px;border: 1px solid #dddddd;text-align: left;padding: 8px;">
                                        {{$detail['mst_attempt']['name']}}</td>
                                    <td style="font-size: 14px;border: 1px solid #dddddd;text-align: left;padding: 8px;">
                                        <i class="fa fa-rupee"></i>Rs. {{$detail['price']}}
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row invoice_listing" style="margin-top: 30px;">
                    <div class="row_table">
                        <table class="table" width="100%" style="border-collapse: collapse;width: 100%;">
                            <thead>
                                <tr>
                                    <th align="left" style="font-weight: 100;line-height: 23px;">
                                        Sub Total
                                    </th>
                                    <th align="right" style="font-weight: 100;line-height: 23px;">
                                        Rs. {{ $order['original_amount'] }}
                                    </th>
                                </tr>
                                <tr>
                                    <th align="left" style="font-weight: 100;line-height: 23px;">
                                        Discount
                                    </th>
                                    <th align="right" style="font-weight: 100;line-height: 23px;">
                                        Rs. {{ $order['discount'] }}
                                    </th>
                                </tr>
                                <tr>
                                    <th align="left" style="font-weight: 700;padding-top: 10px;line-height: 25px;">
                                        Total Amount
                                    </th>
                                    <th align="right" style="font-weight: 700;padding-top: 10px;line-height: 25px;">
                                        Rs. {{ $order['discounted_amount'] }}
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
</body>

</html>
