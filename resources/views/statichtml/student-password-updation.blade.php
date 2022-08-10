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
                                <a class="nav-link" href="/order-history">
                                    <i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>
                                    <span class="font-weight-bold small text-uppercase">Order History</span></a>
                                <a class="nav-link active" href="/student-password-updation">
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
                            <h4 class="font-italic mb-2">Password Setting</h4>
                            <div class="form_data d-flex justify-content-between  align-items-center">
                                <div class="form-group col-md-12">
                                    <label>Password</label>
                                    <input class="form-control" type="text" placeholder="Your Password">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Confirm Password</label>
                                    <input class="form-control" type="password" placeholder="Confirm Your Password">
                                </div>
                                <div class="form-group update_btns">
                                    <button type="submit" class="btn btn-primary f-size">Update</button>
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