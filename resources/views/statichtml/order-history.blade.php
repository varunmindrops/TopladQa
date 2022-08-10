@extends('layouts.layout')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url( {{ asset('images/bg_4.jpg') }} );" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
</section>
<div class="container brd-cumb">
    <div class="row no-gutters slider-text  align-items-end justify-content-center">
        <div class="col-md-12 ftco-animate pt-4 text-left">
            <p class="breadcrumbs mb-0">
                <span class="mr-2">
                    <a href="/">Home <i class="ion-ios-arrow-forward"></i></a>
                </span>
                <span class="mr-2">
                    <a href="#">Students <i class="ion-ios-arrow-forward"></i></a>
                </span>
                <span class="mr-2">
                    <a class="active-breadcumb" href="#">Student Profile </a>
                </span>
            </p>
            <!-- <h1 class="bread">CMA</h1> -->
        </div>
    </div>
</div>

<section class="ftco-section faclt-edit-page">
    <div class="container">
        <div class="row">
            <div class="edit_contents">
                <div class="col-md-3 col-sm-4">
                    <div class="wrap_left_view">
                        <div class="picture-container">
                            <div class="picture">
                                <span class="onhover_icon"><i class="fa fa-camera" aria-hidden="true"></i></span>
                                <img src="images/1.png" class="picture-src" id="wizardPicturePreview" title="">
                                <input type="file" id="wizard-picture" class="">
                            </div>
                        </div>
                        <div class="wrap_tabs">
                            <div class="nav flex-column nav-pills nav-pills-custom">
                                <a class="nav-link" href="/edit-student-profile">
                                    <i class="fa fa-user-circle-o mr-2"></i>
                                    <span class="font-weight-bold small text-uppercase">Profile</span></a>
                                <a class="nav-link active" href="/order-history">
                                    <i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>
                                    <span class="font-weight-bold small text-uppercase">Order History</span></a>
                                <a class="nav-link" href="/student-password-updation">
                                    <i class="fa fa-cog mr-2" aria-hidden="true"></i>
                                    <span class="font-weight-bold small text-uppercase">Password Setting</span></a>
                                <a class="nav-link" href="/">
                                    <i class="fa fa-sign-out mr-2" aria-hidden="true"></i>
                                    <span class="font-weight-bold small text-uppercase">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-8">
                    <div class="wrap_tab_contents">
                        <div class="card_info shadow">
                            <h4 class="font-italic mb-2">Order History</h4>
                            <div class="form_data d-flex justify-content-between align-items-center">
                                <div class="table_layut col-md-12 add_products">
                                    <div class="first_product">
                                        <p>You yet to purchase a course with us, click on buy now to purchase a course.
                                        </p>
                                        <div class="form-group update_btns p-0">
                                            <a href="#" class="btn btn-primary linked_btn f-size">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="table_layut col-md-12 product_table">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Order No.</th>
                                                    <th>Course Name</th>
                                                    <th>Order Placed</th>
                                                    <th>Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>#341657</td>
                                                    <td class="saprate_comma">Fundamentals of Economics & Management
                                                        (FEM), Fundamentals of Economics & Management (FEM)</td>
                                                    <td>December, Jan 2021</td>
                                                    <td><i class="fa fa-rupee"></i> 3000</td>
                                                    <td><a href="#" id="show-subject-button" data-toggle="modal"
                                                            data-target="#vieworder">View Order</a></td>
                                                </tr>
                                                <tr>
                                                    <td>#341657</td>
                                                    <td class="saprate_comma">Fundamentals of Economics & Management
                                                        (FEM)</td>
                                                    <td>December, Jan 2021</td>
                                                    <td><i class="fa fa-rupee"></i> 3000</td>
                                                    <td><a href="#" id="show-subject-button" data-toggle="modal"
                                                            data-target="#vieworder">View Order</a></td>
                                                </tr>
                                                <tr>
                                                    <td>#341657</td>
                                                    <td class="saprate_comma">Fundamentals of Economics & Management
                                                        (FEM), Fundamentals of Economics & Management (FEM),
                                                        Fundamentals of Economics</td>
                                                    <td>December, Jan 2021</td>
                                                    <td><i class="fa fa-rupee"></i> 3000</td>
                                                    <td><a href="#" id="show-subject-button" data-toggle="modal"
                                                            data-target="#vieworder">View Order</a></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group update_btns p-0">
                                        <a href="#" class="btn btn-primary linked_btn f-size">Courses <i
                                                class="fa fa-plus" aria-hidden="true"></i></a></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- Modal -->
<div id="vieworder" class="modal fade common_model" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form action="" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">

                    <h4 class="modal-title">Order Details</h4> <button type="button" class="close"
                        data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="ov_notify">
                        <div class="col-md-12">
                            <!-- <p>We are delighted to inform you that your order has now been processed and dispatched. It will be arive in next 15 Working day.</p> -->
                            <div class="ov_info">
                                <p class="left_ov_info">Order Number:<span>#567857</span></p>
                                <p class="right_ov_info">Order placed on 02/08/2020 will be delivered on 15/08/2020</p>
                            </div>
                        </div>
                    </div>
                    <!-- <hr class="ov_devider"> -->
                    <div class="ov_main_wrap">
                        <div class="col-md-8 left_order common_order">

                            <div class="vo_section">
                                <h3>Products Detail</h3>
                                <div class="col-md-12 sec_colls">


                                    <div class="table-responsive vo_table">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Course Name</th>
                                                    <th>Faculty Name</th>
                                                    <th>Attempt</th>
                                                    <th>Delivary Method</th>
                                                    <th>Price</th>
                                                    <th>Qty</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                    <td class="saprate_comma">Fundamentals of Economics & Management
                                                        (FEM)</td>
                                                    <td>Abhilash</td>
                                                    <td>December, 21 2021</td>
                                                    <td>Pan Drive</td>
                                                    <td class="price_set"><i class="fa fa-rupee"></i> 3000</td>
                                                    <td>2</td>
                                                </tr>
                                                <tr>

                                                    <td class="saprate_comma">Fundamentals of Economics & Management
                                                        (FEM)</td>
                                                    <td>Abhilash</td>
                                                    <td>December, 21 2021</td>
                                                    <td>Pan Drive</td>
                                                    <td class="price_set"><i class="fa fa-rupee"></i> 3000</td>
                                                    <td>2</td>
                                                </tr>

                                                <tr>

                                                    <td class="saprate_comma">Fundamentals of Economics & Management
                                                        (FEM)</td>
                                                    <td>Abhilash</td>
                                                    <td>December, 21 2021</td>
                                                    <td>Pan Drive</td>
                                                    <td class="price_set"><i class="fa fa-rupee"></i> 3000</td>
                                                    <td>2</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>



                                </div>
                            </div>

                            <div class="vo_section">
                                <h3>Address Detail</h3>
                                <div class="col wrap_dual_col">
                                    <div class="col-md-6 sec_colls half_sec_cols">
                                        <h5></h5>
                                        <div class="info_add oview_wrap">
                                            <p>Billing Address: <span>GT-34, Plot-20, Dashrath Puri, New Delhi -
                                                    45</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 sec_colls half_sec_cols">
                                        <h5></h5>
                                        <div class="info_add oview_wrap">
                                            <p>Shipping Address: <span>GT-34, Plot-20, Dashrath Puri, New Delhi -
                                                    45</span>
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


                                        <tr>
                                            <td>Subtotal:<span class="item_counts">6 Item(s)</span></td>
                                            <td>₹ 6000</td>
                                        </tr>
                                        <tr>
                                            <td>Coupon Discounts:</td>
                                            <td>₹ 00.00</td>
                                        </tr>
                                        <tr>
                                            <td>Estimated Tax: </td>
                                            <td>₹ 00.00</td>
                                        </tr>
                                        <tr class="last_tital">
                                            <td class="total-price">Total </td>
                                            <td class="total-price">₹ 6000</td>
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
                <div class="modal-footer dual_model_btn">
                    <button type="submit" class="btn btn-primary f-size">Download Invoice</button>
                    <button type="button" class="btn btn-primary f-size" data-dismiss="modal">Close</button>

                </div>
            </form>
        </div>

    </div>
</div>
@endsection