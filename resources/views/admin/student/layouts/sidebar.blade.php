@php 
    $userBasicDetails = DB::table('users')->find(Auth::id());
@endphp
<div class="col-md-3 col-sm-4">
    <div class="wrap_left_view">
        <div class="picture-container">
            <form action="/photo/{{Auth::id()}}" method="POST" id="edit-profile-pic" name="update_photo" enctype="multipart/form-data">
                <div class="picture">
                    {{@csrf_field()}}
                    @method('PUT')
                    <span class="onhover_icon"><i class="fa fa-camera" aria-hidden="true"></i></span>
                    <img src="{{ $userBasicDetails->photo }} " class="picture-src" id="wizardPicturePreview" title="">
                    <input type="file" id="wizard-picture" name="photo" class="" onchange="event.preventDefault();
                                                     document.getElementById('edit-profile-pic').submit();">
                </div>
                <div class="form-group update_btns">
                    <button type="submit" class="btn btn-primary f-size" hidden>Update</button>
                </div>
                <div class="text-center text-dark font-weight-bold">
                    {{ $userBasicDetails->name }}
                </div>
            </form>
        </div>
        <div class="wrap_tabs">
            <div class="nav flex-column nav-pills nav-pills-custom">
                <a class="nav-link <?php echo (\Route::current()->uri == 'student/profile') ? 'active' : '' ?>" href="/student/profile">
                    <i class="fa fa-user-circle-o mr-2"></i>
                    <span class="font-weight-bold small text-uppercase">Profile</span></a>
                <a class="nav-link <?php echo (\Route::current()->uri == 'student/address') ? 'active' : '' ?>" href="/student/address">
                    <i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>
                    <span class="font-weight-bold small text-uppercase">Address Setting</span></a>
                <a class="nav-link <?php echo (\Route::current()->uri == 'student/order') ? 'active' : '' ?>" href="/student/order">
                    <i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>
                    <span class="font-weight-bold small text-uppercase">Order History</span></a>
                <a class="nav-link <?php echo (\Route::current()->uri == 'student/change-password') ? 'active' : '' ?>" href="/student/change-password">
                    <i class="fa fa-cog mr-2" aria-hidden="true"></i>
                    <span class="font-weight-bold small text-uppercase">Password Setting</span></a>
                <a class="nav-link " href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out mr-2" aria-hidden="true"></i>
                    <span class="font-weight-bold small text-uppercase">Logout</span></a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>