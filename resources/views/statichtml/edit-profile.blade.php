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
                                <a class="nav-link active" href="#">
                                    <i class="fa fa-user-circle-o mr-2"></i>
                                    <span class="font-weight-bold small text-uppercase">Profile info</span></a>
                                <a class="nav-link" href="#">
                                    <i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>
                                    <span class="font-weight-bold small text-uppercase">Course Info</span></a>
                                <a class="nav-link" href="#">
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
                            <h4 class="font-italic mb-2">Personal info</h4>
                            <div class="form_data d-flex justify-content-between  align-items-center">
                                <div class="form-group col-md-6">
                                    <label>Full Name</label>
                                    <input class="form-control" type="text" value="Raghav Goel">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input class="form-control" type="text" value="kumar@gmail.com">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Contact</label>
                                    <input class="form-control" type="text" value="8802288144">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="experience">Experience</label>
                                    <select class="form-control" id="experience">
                                        <option>1-3 Years</option>
                                        <option>3-5 Years</option>
                                        <option>5-7 Years</option>
                                        <option>7-10 Years</option>
                                        <option>10+ Years</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Bio</label>
                                    <textarea class="form-control"
                                        rows="5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</textarea>
                                </div>
                                <!-- <div class="form-group col-md-12">
                                    <div class="add_more_groups">
                                        <a href="" class="text_link f-size">Add More Groups</a>
                                    </div>
                                </div> -->
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