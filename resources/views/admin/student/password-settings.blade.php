@extends('layouts.layout')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url( {{ asset('images/bg_4.jpg') }} );" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
</section>
<div class="main_class single_admin">
<div class="container brd-cumb">
    <div class="row no-gutters slider-text  align-items-end justify-content-center">
        <div class="col-md-12 ftco-animate pt-4 text-left">
            <p class="breadcrumbs mb-0">
                <span class="mr-2">
                    <a href="/">Home <i class="ion-ios-arrow-forward"></i></a>
                </span>
                <span class="mr-2">
                    <a href="profile">Students <i class="ion-ios-arrow-forward"></i></a>
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
                @include('admin.student.layouts.sidebar')
                <div class="col-md-9 col-sm-8">
                    <div class="wrap_tab_contents">
                        <div class="card_info shadow_blk">
                            <h4 class="font-italic mb-2">Password Setting</h4>
                            <div class="form_data d-flex justify-content-between  align-items-center common_widths">
                                <form method="POST" action="/student/change-password/{{Auth::id()}}" autocomplete="off">
                                 <div class="wrap_in_form">
                                        @csrf
                                    @method('PUT')

                                    <div class="form-group col-md-12">
                                        <label class="asterisk">Current Password</label>
                                        <input class="form-control @error('current_password') is-invalid @enderror" type="password" name="current_password" value="{{ old('current_password') }}" placeholder="Your Old Password" autofocus>
                                        @error('current_password')
                                        <p class="error_result" style="color:red">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="asterisk">New Password</label>
                                        <input class="form-control @error('new_password') is-invalid @enderror" type="password" name="new_password" value="{{ old('new_password') }}" placeholder="Your New Password" autofocus>
                                        @error('new_password')
                                        <p class="error_result" style="color:red">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="asterisk">Confirm New Password</label>
                                        <input class="form-control @error('new_confirm_password') is-invalid @enderror" type="password" name="new_confirm_password" value="{{ old('new_confirm_password') }}" placeholder="Confirm Your Password" autofocus>
                                        @error('new_confirm_password')
                                        <p class="error_result" style="color:red">{{$message}}</p>
                                        @enderror
                                    </div>
</div>
                                    <div class="update_btns wrap_in_btns">
                                        <button type="submit" class="btn btn-primary f-size">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection
