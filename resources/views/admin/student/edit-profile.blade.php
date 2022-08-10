@extends('layouts.layout')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url( {{ asset('images/bg_4.jpg') }} );"
    data-stellar-background-ratio="0.5">
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
                            <h4 class="font-italic mb-2">Profile Info</h4>
                            <form action="/student/profile/{{Auth::id()}}" method="POST" name="student_update_form"
                                autocomplete="off">
                                <div class="form_data d-flex justify-content-between  align-items-center wrap_in_form">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group col-md-6">
                                        <label class="asterisk">Full Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror" type="text"
                                            name="name" value="{{ old('name', $user['name'] ?? '') }}"
                                            placeholder="Full Name" autofocus>
                                        @error('name')
                                        <p class="error_result" style="color:red">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="asterisk">Date of Birth</label>
                                        <input class="form-control @error('dob') is-invalid @enderror" type="date"
                                            name="dob" value="{{ old('dob', $user['dob'] ?? '') }}" autofocus>
                                        @error('dob')
                                        <p class="error_result" style="color:red">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="asterisk">Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="text"
                                            name="email" value="{{ old('email', $user['email'] ?? '') }}"
                                            placeholder="Email" autofocus>
                                        @error('email')
                                        <p class="error_result" style="color:red">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="asterisk">Contact</label>
                                        <input class="form-control @error('contact') is-invalid @enderror" type="text"
                                            name="contact" value="{{ old('contact', $user['phone'] ?? '') }}"
                                            placeholder="Phone Number" autofocus>
                                        @error('contact')
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
</section>
</div>
@endsection