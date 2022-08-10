@extends('layouts.admin-layout')

@section('content')

                    @include('admin.super-admin.layouts.sidebar')
                    <div class="content_super supar_main_cont">
                    <div class="home_dashboard">@include('admin.super-admin.layouts.super-admin-btn')</div>
                        <div class="wrap_tab_contents">
                            <div class="card_info shadow_blk">
                                <h4 class="font-italic mb-2">Password Setting</h4>
                                <div class="form_data d-flex justify-content-between  align-items-center common_widths">
                                    <form method="POST" action="/teacher/change-password/{{Auth::id()}}"
                                        autocomplete="off">
                                        @csrf
                                        @method('PUT')

                                        <!-- @foreach ($errors->all() as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                    @endforeach -->
                                        <div class="wrap_in_form">
                                            <div class="form-group col-md-12">
                                                <label class="asterisk">Current Password</label>
                                                <input
                                                    class="form-control @error('current_password') is-invalid @enderror"
                                                    type="password" name="current_password"
                                                    value="{{ old('current_password') }}"
                                                    placeholder="Your Old Password" autofocus>
                                                @error('current_password')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="asterisk">New Password</label>
                                                <input class="form-control @error('new_password') is-invalid @enderror"
                                                    type="password" name="new_password"
                                                    value="{{ old('new_password') }}" placeholder="Your New Password"
                                                    autofocus>
                                                @error('new_password')
                                                <p class="error_result" style="color:red">{{$message}}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="asterisk">Confirm New Password</label>
                                                <input
                                                    class="form-control @error('new_confirm_password') is-invalid @enderror"
                                                    type="password" name="new_confirm_password"
                                                    value="{{ old('new_confirm_password') }}"
                                                    placeholder="Confirm Your Password" autofocus>
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
              
@endsection