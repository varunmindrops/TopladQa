@extends('layouts.admin-layout')

@section('content')

@include('admin.super-admin.layouts.sidebar')
<div class="content_super supar_main_cont">

    <div class="wrap_tab_contents">
        <div class="container-fluid">
            <div class="card_info shadow_blk">
                <h4 class="font-italic mb-2">Profile Info</h4>
                <form action="/admin-login/profile/{{Auth::id()}}" method="POST" name="admin_update_form" autocomplete="off">
                    <div class="form_data d-flex justify-content-between  align-items-center">
                        @csrf
                        @method('PUT')
                        <div class="form-group col-md-6">
                            <label class="asterisk">Full Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name', $user['name'] ?? '') }}" placeholder="Full Name" autofocus>
                            @error('name')
                            <p class="error_result" style="color:red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="asterisk">Date of Birth</label>
                            <input class="form-control @error('dob') is-invalid @enderror" type="date" name="dob" value="{{ old('dob', $user['dob'] ?? '') }}" autofocus>
                            @error('dob')
                            <p class="error_result" style="color:red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="asterisk">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email', $user['email'] ?? '') }}" placeholder="Email" autofocus>
                            @error('email')
                            <p class="error_result" style="color:red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="asterisk">Contact</label>
                            <input class="form-control @error('contact') is-invalid @enderror" type="text" name="contact" value="{{ old('contact', $user['phone'] ?? '') }}" placeholder="Phone Number" autofocus>
                            @error('contact')
                            <p class="error_result" style="color:red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="wrap_multi_btn">
                            <div class="form-group update_btns">
                                <button type="submit" class="btn btn-primary f-size">Update</button>
                            </div>
                            <!-- <div class="form-group update_btns text-right">
                                        <button type="button" class="btn btn-primary f-size">Close</button>
                                    </div> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
