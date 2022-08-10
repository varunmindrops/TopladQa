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
                                <a class="nav-link active" href="/edit-student-profile">
                                    <i class="fa fa-user-circle-o mr-2"></i>
                                    <span class="font-weight-bold small text-uppercase">Profile</span></a>
                                <a class="nav-link" href="/order-history">
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
                            <h4 class="font-italic mb-2">Personal info</h4>
                            <div class="form_data d-flex justify-content-between  align-items-center">
                                <div class="form-group col-md-4">
                                    <label>Full Name</label>
                                    <input class="form-control" type="text" value="Ashutosh Kumar">
                                </div>
                                <!-- <div class="form-group col-md-6">
                                    <label>Date of Birth</label>
                                    <input class="form-control" type="date" value="Kumar">
                                </div> -->
                                <div class="form-group col-md-4">
                                    <label>Email</label>
                                    <input class="form-control" type="text" value="kumar@gmail.com">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Mobile</label>
                                    <input class="form-control" type="text" value="8802288144">
                                </div>
                                <hr class="divider_page">
                                <div class="wrap_carder">

                                    <div class="form-group col-md-8">
                                        <label>Billing Address</label>
                                        <input class="form-control" type="text" value="Plot Number-7, Sector-13">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Pincode</label>
                                        <input class="form-control" type="text" value="110059">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>City</label>
                                        <input class="form-control" type="text" value="Jaipur">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>State</label>
                                        <input class="form-control" type="text" value="Rajasthan">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="experience">Country</label>
                                        <select class="form-control" id="country">
                                            <option>India</option>
                                            <option>Japan</option>
                                            <option>Indonesia</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12 common_add">
                                      
                                            <input class="chk new_address"
                                                type="checkbox" id="new_add">
                                                <label class="form-check-label" for="new_add">
                                                Add a diffrent delivery address</label>
                                      
                                    </div>
                                </div>
                                <div class="wrap_multi_btn">
                                    <div class="form-group update_btns">
                                        <button type="submit" class="btn btn-primary f-size">Update</button>
                                    </div>
                                    <div class="form-group update_btns text-right">
                                        <button type="button" class="btn btn-primary f-size">Close</button>
                                    </div>
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