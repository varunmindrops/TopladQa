@php
$userBasicDetails = DB::table('users')->find(Auth::id());
@endphp

<section class="ftco-section faclt-edit-page super-page">
    <div class="container-fluid">
        <div class="row">
            <div class="edit_contents">
                <div class="sidebar_super">
                    <div class="wrap_left_view">
                        <div class="super_logo">
                            <a title="Toplad Logo" class="navbar-brand" href="/"><img
                                    src="{{ asset('images/toplad-logo.svg') }}" alt="toplad-logo"></a>
                        </div>

                        <div class="wrap_tabs">
                            <div class="nav flex-column nav-pills nav-pills-custom">
                                @if ($userBasicDetails->role == 'super-admin')
                                    <a class="nav-link <?php echo \Route::current()->uri == 'admin-login/profile' ? 'active' : ''; ?>" href="/admin-login/profile">
                                        <i class="fa fa-user-circle-o mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Profile Info</span></a>
                                    <a class="nav-link <?php echo \Route::current()->uri == 'admin-login/orders' ? 'active' : ''; ?>" href="/admin-login/orders">
                                        <i class="fa fa-cart-plus mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">Manage Orders</span></a>
                                    <a class="nav-link <?php echo \Route::current()->uri == 'admin-login/teacher' ? 'active' : ''; ?>" href="/admin-login/teacher">
                                        <i class="fa fa-user mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Manage Teachers</span></a>
                                    <a class="nav-link <?php echo \Route::current()->uri == 'admin-login/student' ? 'active' : ''; ?>" href="/admin-login/student">
                                        <i class="fa fa-graduation-cap mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">Manage Students</span></a>
                                    <a class="nav-link <?php echo \Route::current()->uri == 'admin-login/coupon' ? 'active' : ''; ?>" href="/admin-login/coupon">
                                        <i class="fa fa-tags mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">Manage Coupons</span></a>
                                    <a class="nav-link <?php echo \Route::current()->uri == 'admin-login/subject' ? 'active' : ''; ?>" href="/admin-login/subject">
                                        <i class="fa fa-book mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">Manage Subjects</span></a>
                                    <a class="nav-link <?php echo \Route::current()->uri == 'admin-login/course-level' ? 'active' : ''; ?>" href="/admin-login/course-level">
                                        <i class="fa fa-book mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">Manage Course
                                            Level</span></a>
                                    <a class="nav-link <?php echo \Route::current()->uri == 'admin-login/feedback' ? 'active' : ''; ?>" href="/admin-login/feedback">
                                        <i class="fa fa-star-o mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">Manage Feedbacks</span></a>


                                    <!-- <a href="javascript:void(0)" onclick="myFunction()"
                                    class="nav-link <?php echo \Route::current()->uri == 'admin-login/all-job-post' ? 'active' : (\Route::current()->uri == 'admin-login/approved-job-post' ? 'active' : (\Route::current()->uri == 'admin-login/rejected-job-post' ? 'active' : (\Route::current()->uri == 'admin-login/pending-job-post' ? 'active' : ''))); ?>">
                                    <i class="fa fa-star-o mr-2" aria-hidden="true"></i>
                                    <span class="font-weight-bold small text-uppercase">Manage Jobs</span></a> -->
                                    <!-- <div class="dropdown-menu" id="jd_droper"> -->
                                    <a class="dropdown-btn nav-link <?php echo \Route::current()->uri == 'admin-login/all-job-post' ? 'active' : ''; ?>"
                                        href="/admin-login/all-job-post">
                                        <i class="fa fa-star-o mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">All Job Posts</span></a>
                                    <a class="nav-link <?php echo \Route::current()->uri == 'admin-login/approved-job-post' ? 'active' : ''; ?>" href="/admin-login/approved-job-post">
                                        <i class="fa fa-star-o mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">Approved Job
                                            Posts</span></a>
                                    <a class="nav-link <?php echo \Route::current()->uri == 'admin-login/rejected-job-post' ? 'active' : ''; ?>" href="/admin-login/rejected-job-post">
                                        <i class="fa fa-star-o mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">Rejected Job
                                            Posts</span></a>
                                    <a class="nav-link <?php echo \Route::current()->uri == 'admin-login/pending-job-post' ? 'active' : ''; ?>" href="/admin-login/pending-job-post">
                                        <i class="fa fa-star-o mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">Pending Job Posts</span></a>
                                    <!-- </div> -->

                                    <a class="nav-link <?php echo \Route::current()->uri == 'admin-login/change-password' ? 'active' : ''; ?>" href="/admin-login/change-password">
                                        <i class="fa fa-cog mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">Password Setting</span></a>
                                    <a class="nav-link " href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">Logout</span></a>
                                @elseif($userBasicDetails->role == 'counsellor')
                                    <a class="nav-link <?php echo \Route::current()->uri == 'counsellor/order' ? 'active' : ''; ?>" href="/counsellor/order">
                                        <i class="fa fa-files-o mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">Order</span></a>
                                    <a class="nav-link <?php echo \Route::current()->uri == 'counsellor/new-order' ? 'active' : ''; ?>" href="/counsellor/new-order">
                                        <i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">New Order</span></a>

                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">Logout</span></a>
                                @elseif($userBasicDetails->role == 'order-fulfilment-team')
                                    <a class="nav-link <?php echo \Route::current()->uri == 'fulfilment/order' ? 'active' : ''; ?>" href="/fulfilment/order">
                                        <i class="fa fa-files-o mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">All Orders</span></a>
                                    <a class="nav-link <?php echo \Route::current()->uri == 'fulfilment/delivered-order' ? 'active' : ''; ?>" href="/fulfilment/delivered-order">
                                        <i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">Delivered Orders</span></a>
                                    <a class="nav-link <?php echo \Route::current()->uri == 'fulfilment/pending-order' ? 'active' : ''; ?>" href="/fulfilment/pending-order">
                                        <i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">Pending Orders</span></a>

                                    <a class="nav-link <?php echo \Route::current()->uri == 'fulfilment/incompleted-book-order' ? 'active' : ''; ?>" href="/fulfilment/incompleted-book-order">
                                        <i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">Pending Book Order</span></a>
                                    <a class="nav-link <?php echo \Route::current()->uri == 'fulfilment/incompleted-video-order' ? 'active' : ''; ?>" href="/fulfilment/incompleted-video-order">
                                        <i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">Pending Video Order</span></a>

                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">Logout</span></a>
                                @elseif($userBasicDetails->role == 'teacher')
                                    <div class="wrap_profile_teacher">
                                        <div class="picture-container">
                                            <form action="/photo/{{ Auth::id() }}" method="POST"
                                                id="edit-profile-pic" name="update_photo" enctype="multipart/form-data">
                                                <div class="picture">
                                                    {{ @csrf_field() }}
                                                    @method('PUT')
                                                    <span class="onhover_icon"><i class="fa fa-camera"
                                                            aria-hidden="true"></i></span>
                                                    <img src="{{ $userBasicDetails->photo }} " class="picture-src"
                                                        id="wizardPicturePreview" title="">
                                                    <input type="file" id="wizard-picture" name="photo"
                                                        class="" onchange="event.preventDefault();
                                                     document.getElementById('edit-profile-pic').submit();">
                                                </div>
                                                <div class="form-group update_btns">
                                                    <button type="submit" class="btn btn-primary f-size"
                                                        hidden>Update</button>
                                                </div>
                                                <div class="text-center text-dark font-weight-bold techername">
                                                    {{ $userBasicDetails->name }}
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <a class="nav-link <?php echo \Route::current()->uri == 'teacher/profile' ? 'active' : ''; ?>" href="/teacher/profile">
                                        <i class="fa fa-user-circle-o mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Profile info</span></a>

                                    <a class="nav-link <?php echo \Route::current()->uri == 'teacher/course' ? 'active' : ''; ?>" href="/teacher/course">
                                        <i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">Course Info</span></a>

                                    <a class="nav-link <?php echo \Route::current()->uri == 'teacher/product' ? 'active' : ''; ?>" href="/teacher/product">
                                        <i class="fa fa-book mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">Product Info</span></a>

                                    <a class="nav-link <?php echo \Route::current()->uri == 'teacher/order' ? 'active' : ''; ?>" href="/teacher/order">
                                        <i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">Order Details</span></a>

                                    <a class="nav-link <?php echo \Route::current()->uri == 'teacher/change-password' ? 'active' : ''; ?>" href="/teacher/change-password">
                                        <i class="fa fa-cog mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">Password Setting</span></a>

                                    <a class="nav-link <?php echo \Route::current()->uri == 'teacher/upload-files' ? 'active' : ''; ?>" href="/teacher/upload-files">
                                        <i class="fa fa-files-o mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">File Upload</span></a>

                                    <a class="nav-link <?php echo \Route::current()->uri == 'teacher/view-files' ? 'active' : ''; ?>" href="/teacher/view-files">
                                        <i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">View Files</span></a>

                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out mr-2" aria-hidden="true"></i>
                                        <span class="font-weight-bold small text-uppercase">Logout</span></a>
                                @endif
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
