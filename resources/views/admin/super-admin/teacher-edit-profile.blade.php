@extends('layouts.admin-layout')

@section('content')

<!-- <div class="main_class single_admin">
    <div class="container brd-cumb">
        <div class="row no-gutters slider-text">
            <div class="col-md-12 pt-4 bcomb_left">
                <p class="breadcrumbs mb-0">
                    <span class="mr-2">
                        <a href="/">Home <i class="ion-ios-arrow-forward"></i></a>
                    </span>
                    <span class="mr-2">
                        <a class="active-breadcumb" href="#">Profile Info</a>
                    </span>
                </p>
                <div class="wrap_backer">
                    @include('admin.super-admin.layouts.super-admin-btn')
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section faclt-edit-page sa_pages">
        <div class="container">
            <div class="row">
                <div class="edit_contents">
                    @include('admin.super-admin.layouts.sidebar')
                    <div class="col-md-9 col-sm-8">
                        <div class="wrap_tab_contents">
                            <div class="card_info shadow_blk">
                                <h4 class="font-italic mb-2">Profile Info</h4>
                                <form action="/teacher/profile/{{Auth::id()}}" method="POST" name="update_form"
                                    autocomplete="off">
                                    <div
                                        class="form_data d-flex justify-content-between  align-items-center wrap_in_form">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group col-md-12">
                                            <label class="asterisk">Full Name</label>
                                            <input class="form-control @error('name') is-invalid @enderror" type="text"
                                                name="name" value="{{ old('name', $user['name'] ?? '') }}"
                                                placeholder="Full Name" autofocus>
                                            @error('name')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="asterisk">Primary Email</label>
                                            <input class="form-control @error('email1') is-invalid @enderror"
                                                type="text" name="email1"
                                                value="{{ old('email1', $user['email'] ?? '') }}"
                                                placeholder="Primary Email" autofocus>
                                            @error('email1')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="asterisk">Secondary Email</label>
                                            <input class="form-control @error('email2') is-invalid @enderror"
                                                type="text" name="email2"
                                                value="{{ old('email2', $user['secondary_email'] ?? '') }}"
                                                placeholder="Secondary Email" autofocus>
                                            @error('email2')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="asterisk">Primary Contact</label>
                                            <input class="form-control @error('contact1') is-invalid @enderror"
                                                type="text" name="contact1"
                                                value="{{ old('contact1', $user['phone'] ?? '') }}"
                                                placeholder="Primary Phone Number" autofocus>
                                            @error('contact1')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="asterisk">Secondary Contact</label>
                                            <input class="form-control @error('contact2') is-invalid @enderror"
                                                type="text" name="contact2"
                                                value="{{ old('contact2', $user['secondary_phone'] ?? '') }}"
                                                placeholder="Secondary Phone Number" autofocus>
                                            @error('contact2')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="asterisk">After Sales Support Contact</label>
                                            <input class="form-control @error('sales_phone') is-invalid @enderror"
                                                type="text" name="sales_phone"
                                                value="{{ old('sales_phone', $user['teacher']['after_sales_phone'] ?? '') }}"
                                                placeholder="After Sales Support Phone Number" autofocus>
                                            @error('sales_phone')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="asterisk">After Sales Support Contact Person</label>
                                            <input class="form-control @error('sales_person') is-invalid @enderror"
                                                type="text" name="sales_person"
                                                value="{{ old('sales_person', $user['teacher']['after_sales_person'] ?? '') }}"
                                                placeholder="After Sales Support Contact Person" autofocus>
                                            @error('sales_person')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="asterisk">Tech Support Contact</label>
                                            <input class="form-control @error('tech_phone') is-invalid @enderror"
                                                type="text" name="tech_phone"
                                                value="{{ old('tech_phone', $user['teacher']['tech_supp_phone'] ?? '') }}"
                                                placeholder="Tech Support Phone Number" autofocus>
                                            @error('tech_phone')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="asterisk">Tech Support Contact Person</label>
                                            <input class="form-control @error('tech_person') is-invalid @enderror"
                                                type="text" name="tech_person"
                                                value="{{ old('tech_person', $user['teacher']['tech_supp_person'] ?? '') }}"
                                                placeholder="Tech Support Contact Person" autofocus>
                                            @error('tech_person')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="asterisk" for="experience">Total Experience</label>
                                            <select class="form-control @error('experience') is-invalid @enderror"
                                                name="experience" id="experience"
                                                value="{{ old('experience', $user['teacher']['experience_id'] ?? '' ) }}"
                                                autofocus>
                                                <option value="">Select Experience</option>
                                                @foreach($data as $experience)
                                                <option value="{{$experience->id}}" <?php if ($user['teacher']) {
                                                                                        {{ echo old('experience', $user['teacher']['experience_id']) == $experience['id'] ? 'selected' : '';}}
																					} else { {{ echo old('experience') == $experience['id'] ? 'selected' : '';}} } ?>>
                                                    {{$experience['experience']}}</option>
                                                @endforeach
                                            </select>
                                            @error('experience')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="asterisk" for="teach_experience">Teaching Experience</label>
                                            <select class="form-control @error('teach_experience') is-invalid @enderror"
                                                name="teach_experience" id="teach_experience"
                                                value="{{ old('teach_experience', $user['teacher']['teaching_experience_id'] ?? '' ) }}"
                                                autofocus>
                                                <option value="">Select Experience</option>
                                                @foreach($data as $experience)
                                                <option value="{{$experience->id}}" <?php if ($user['teacher']) {
                                                                                        {{ echo old('teach_experience', $user['teacher']['teaching_experience_id']) == $experience['id'] ? 'selected' : '';}}
																					} else { {{ echo old('teach_experience') == $experience['id'] ? 'selected' : '';}} } ?>>
                                                    {{$experience['experience']}}</option>
                                                @endforeach
                                            </select>
                                            @error('teach_experience')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="asterisk">Educational Qualifications</label>
                                            <textarea class="form-control @error('qualification') is-invalid @enderror"
                                                name="qualification" rows="5" placeholder="B.Com,M.Com,CMA,etc..."
                                                autofocus>{{ old('qualification', $user['teacher']['edu_qualification'] ?? '') }}</textarea>
                                            @error('qualification')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="asterisk">Professional Achievements</label>
                                            <textarea class="form-control @error('achievement') is-invalid @enderror"
                                                name="achievement" rows="5"
                                                placeholder="1. Awarded Teacher of the Year for the St. Lucy School District in 2016.&#10;2. Implemented an Individualized Education Plan for students with unique needs.&#10;etc..."
                                                autofocus>{{ old('achievement', $user['teacher']['prof_achievement'] ?? '') }}</textarea>
                                            @error('achievement')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="asterisk">Awards And Honours</label>
                                            <textarea class="form-control @error('award') is-invalid @enderror"
                                                name="award" rows="5"
                                                placeholder="1. Awards from professional associations (e.g. CSS Design Award).&#10;2. Published books.&#10;etc..."
                                                autofocus>{{ old('award', $user['teacher']['award_honour'] ?? '') }}</textarea>
                                            @error('award')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="asterisk">Areas Of Interest</label>
                                            <textarea class="form-control @error('interest') is-invalid @enderror"
                                                name="interest" rows="5"
                                                placeholder="1. Teaching&#10;2. Reading&#10;etc..."
                                                autofocus>{{ old('interest', $user['teacher']['area_of_interest'] ?? '') }}</textarea>
                                            @error('interest')
                                            <p class="error_result" style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="asterisk">Bio</label>
                                            <textarea class="form-control @error('bio') is-invalid @enderror" name="bio"
                                                rows="5" placeholder="Short Bio About Yourself"
                                                autofocus>{{ old('bio', $user['teacher']['bio'] ?? '') }}</textarea>
                                            @error('bio')
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
</div> -->

@include('admin.super-admin.layouts.sidebar')
<div class="content_super supar_main_cont">
<div class="home_dashboard">@include('admin.super-admin.layouts.super-admin-btn')</div>
    <div class="wrap_tab_contents">
        <div class="card_info shadow_blk">
            <h4 class="font-italic mb-2">Profile Info</h4>
            <form action="/teacher/profile/{{Auth::id()}}" method="POST" name="update_form" autocomplete="off">
                <div class="form_data d-flex justify-content-between  align-items-center wrap_in_form">
                    @csrf
                    @method('PUT')
                    <div class="form-group col-md-12">
                        <label class="asterisk">Full Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            value="{{ old('name', $user['name'] ?? '') }}" placeholder="Full Name" autofocus>
                        @error('name')
                        <p class="error_result" style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="asterisk">Primary Email</label>
                        <input class="form-control @error('email1') is-invalid @enderror" type="text" name="email1"
                            value="{{ old('email1', $user['email'] ?? '') }}" placeholder="Primary Email" autofocus>
                        @error('email1')
                        <p class="error_result" style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label>Secondary Email</label>
                        <input class="form-control @error('email2') is-invalid @enderror" type="text" name="email2"
                            value="{{ old('email2', $user['secondary_email'] ?? '') }}" placeholder="Secondary Email"
                            autofocus>
                        @error('email2')
                        <p class="error_result" style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="asterisk">Primary Contact</label>
                        <input class="form-control @error('contact1') is-invalid @enderror" type="text" name="contact1"
                            value="{{ old('contact1', $user['phone'] ?? '') }}" placeholder="Primary Phone Number"
                            autofocus>
                        @error('contact1')
                        <p class="error_result" style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label>Secondary Contact</label>
                        <input class="form-control @error('contact2') is-invalid @enderror" type="text" name="contact2"
                            value="{{ old('contact2', $user['secondary_phone'] ?? '') }}"
                            placeholder="Secondary Phone Number" autofocus>
                        @error('contact2')
                        <p class="error_result" style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="asterisk">After Sales Support Contact</label>
                        <input class="form-control @error('sales_phone') is-invalid @enderror" type="text"
                            name="sales_phone"
                            value="{{ old('sales_phone', $user['teacher']['after_sales_phone'] ?? '') }}"
                            placeholder="After Sales Support Phone Number" autofocus>
                        @error('sales_phone')
                        <p class="error_result" style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="asterisk">After Sales Support Contact Person</label>
                        <input class="form-control @error('sales_person') is-invalid @enderror" type="text"
                            name="sales_person"
                            value="{{ old('sales_person', $user['teacher']['after_sales_person'] ?? '') }}"
                            placeholder="After Sales Support Contact Person" autofocus>
                        @error('sales_person')
                        <p class="error_result" style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="asterisk">Tech Support Contact</label>
                        <input class="form-control @error('tech_phone') is-invalid @enderror" type="text"
                            name="tech_phone" value="{{ old('tech_phone', $user['teacher']['tech_supp_phone'] ?? '') }}"
                            placeholder="Tech Support Phone Number" autofocus>
                        @error('tech_phone')
                        <p class="error_result" style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="asterisk">Tech Support Contact Person</label>
                        <input class="form-control @error('tech_person') is-invalid @enderror" type="text"
                            name="tech_person"
                            value="{{ old('tech_person', $user['teacher']['tech_supp_person'] ?? '') }}"
                            placeholder="Tech Support Contact Person" autofocus>
                        @error('tech_person')
                        <p class="error_result" style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="asterisk" for="experience">Total Experience</label>
                        <select class="form-control @error('experience') is-invalid @enderror" name="experience"
                            id="experience" value="{{ old('experience', $user['teacher']['experience_id'] ?? '' ) }}"
                            autofocus>
                            <option value="">Select Experience</option>
                            @foreach($data as $experience)
                            <option value="{{$experience->id}}" <?php if ($user['teacher']) {
                                                                                        {{ echo old('experience', $user['teacher']['experience_id']) == $experience['id'] ? 'selected' : '';}}
																					} else { {{ echo old('experience') == $experience['id'] ? 'selected' : '';}} } ?>>
                                {{$experience['experience']}}</option>
                            @endforeach
                        </select>
                        @error('experience')
                        <p class="error_result" style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="asterisk" for="teach_experience">Teaching Experience</label>
                        <select class="form-control @error('teach_experience') is-invalid @enderror"
                            name="teach_experience" id="teach_experience"
                            value="{{ old('teach_experience', $user['teacher']['teaching_experience_id'] ?? '' ) }}"
                            autofocus>
                            <option value="">Select Experience</option>
                            @foreach($data as $experience)
                            <option value="{{$experience->id}}" <?php if ($user['teacher']) {
                                                                                        {{ echo old('teach_experience', $user['teacher']['teaching_experience_id']) == $experience['id'] ? 'selected' : '';}}
																					} else { {{ echo old('teach_experience') == $experience['id'] ? 'selected' : '';}} } ?>>
                                {{$experience['experience']}}</option>
                            @endforeach
                        </select>
                        @error('teach_experience')
                        <p class="error_result" style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="asterisk">Educational Qualifications</label>
                        <textarea class="form-control @error('qualification') is-invalid @enderror" name="qualification"
                            rows="5" placeholder="B.Com,M.Com,CMA,etc..."
                            autofocus>{{ old('qualification', $user['teacher']['edu_qualification'] ?? '') }}</textarea>
                        @error('qualification')
                        <p class="error_result" style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="asterisk">Professional Achievements</label>
                        <textarea class="form-control @error('achievement') is-invalid @enderror" name="achievement"
                            rows="5"
                            placeholder="1. Awarded Teacher of the Year for the St. Lucy School District in 2016.&#10;2. Implemented an Individualized Education Plan for students with unique needs.&#10;etc..."
                            autofocus>{{ old('achievement', $user['teacher']['prof_achievement'] ?? '') }}</textarea>
                        @error('achievement')
                        <p class="error_result" style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="asterisk">Awards And Honours</label>
                        <textarea class="form-control @error('award') is-invalid @enderror" name="award" rows="5"
                            placeholder="1. Awards from professional associations (e.g. CSS Design Award).&#10;2. Published books.&#10;etc..."
                            autofocus>{{ old('award', $user['teacher']['award_honour'] ?? '') }}</textarea>
                        @error('award')
                        <p class="error_result" style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="asterisk">Areas Of Interest</label>
                        <textarea class="form-control @error('interest') is-invalid @enderror" name="interest" rows="5"
                            placeholder="1. Teaching&#10;2. Reading&#10;etc..."
                            autofocus>{{ old('interest', $user['teacher']['area_of_interest'] ?? '') }}</textarea>
                        @error('interest')
                        <p class="error_result" style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label class="asterisk">Bio</label>
                        <textarea class="form-control @error('bio') is-invalid @enderror" name="bio" rows="5"
                            placeholder="Short Bio About Yourself"
                            autofocus>{{ old('bio', $user['teacher']['bio'] ?? '') }}</textarea>
                        @error('bio')
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
@endsection