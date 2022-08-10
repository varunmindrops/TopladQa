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
                    <a href="#">Faculty list <i class="ion-ios-arrow-forward"></i></a>
                </span>
                <span class="mr-2">
                    <a class="active-breadcumb" href="#">Faculty Profile </a>
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
                            <!-- Tabs nav -->
                            <div class="nav flex-column nav-pills nav-pills-custom">
                                <a class="nav-link" href="#">
                                    <i class="fa fa-user-circle-o mr-2"></i>
                                    <span class="font-weight-bold small text-uppercase">Profile info</span></a>
                                <a class="nav-link" href="/edit-course">
                                    <i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>
                                    <span class="font-weight-bold small text-uppercase">Course Info</span></a>
                                <a class="nav-link active" href="#">
                                    <i class="fa fa-book mr-2" aria-hidden="true"></i>
                                    <span class="font-weight-bold small text-uppercase">Product Info</span></a>
                                <a class="nav-link" href="#">
                                    <i class="fa fa-cog mr-2" aria-hidden="true"></i>
                                    <span class="font-weight-bold small text-uppercase">Password Setting</span></a>
                                <a class="nav-link" href="index.html">
                                    <i class="fa fa-sign-out mr-2" aria-hidden="true"></i>
                                    <span class="font-weight-bold small text-uppercase">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-8">
                    <div class="wrap_tab_contents">
                    <div class="card_info shadow">
                            <h4 class="font-italic mb-2">Product info</h4>
                            <div class="form_data d-flex justify-content-between align-items-center">
                                <div class="table_layut col-md-12 add_products">
                                    <div class="first_product">
                                        <p>Note: Currently there is no product. Click on Add Product link to
                                            add your first Product.</p>
                                        <div class="form-group update_btns p-0">
                                            <a href="http://raghavacademy.com/product-registration.php?user_id=1"
                                                class="btn btn-primary linked_btn f-size">Add Product</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="table_layut col-md-12 product_table">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Subject Name</th>
                                                    <th>Max Price</th>
                                                    <th>Min Price</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Fundamentals of Economics & Management (FEM)</td>
                                                    <td>5000</td>
                                                    <td>4200</td>
                                                    <td>
                                                        <a class="table_btn edit_linker"><span><i class="fa fa-pencil"
                                                                    aria-hidden="true"></i></span></a>
                                                        <a class="table_btn trash_linker"><span><i class="fa fa-trash"
                                                                    aria-hidden="true"></i></span></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Fundamentals of Accounting (FOA)</td>
                                                    <td>6000</td>
                                                    <td>4500</td>
                                                    <td>
                                                        <a class="table_btn edit_linker"><span><i class="fa fa-pencil"
                                                                    aria-hidden="true"></i></span></a>
                                                        <a class="table_btn trash_linker"><span><i class="fa fa-trash"
                                                                    aria-hidden="true"></i></span></a>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group update_btns p-0">
                                        <a href="http://raghavacademy.com/product-registration.php?user_id=1"
                                            class="btn btn-primary linked_btn f-size">Add More Products <i
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
@endsection