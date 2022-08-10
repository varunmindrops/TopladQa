@php
$course_level = App\Models\MstCourseLevel::whereHas('mstCourse', fn($course) => $course->whereValue(request()->segment(1)))
    ->where('status', 1)
    ->whereNull('deleted_at')
    ->get();

foreach ($course_level as $key => $level) {
    $arrMstSubject[] = DB::table('mst_subject')
        ->where('course_level_id', $level->id)
        ->whereNull('deleted_at')
        ->orderBy('sort_order', 'asc')
        ->get();
}

foreach ($course_level as $key => $level) {
    $arrFaculty[$level->name] = DB::table('teacher_course_level')
        ->join('users', 'teacher_course_level.user_id', '=', 'users.id')
        ->select('users.id', 'users.name', 'users.slug')
        ->where('teacher_course_level.course_level_id', $level->id)
        ->where('users.role', 'teacher')
        ->where('users.status', 1)
        ->whereNull('deleted_at')
        ->get();
}

$courseLevel = App\Models\MstCourseLevel::whereHas('mstCourse', fn($course) => $course->whereValue(request()->segment(1)))
    ->with('mstSubject')
    ->where('status', 1)
    ->whereNull('deleted_at')
    ->get();

$segment = in_array(
    request()->segment(1),
    App\Models\MstCourse::get()
        ->pluck('value')
        ->toArray(),
)
    ? request()->segment(1)
    : 'cs';

$teachers = App\Models\User::where('role', 'teacher')
    ->where('status', 1)
    ->whereNotNull('slug')
    ->whereNull('deleted_at')
    ->get();

@endphp

<nav class="navbar navbar-expand-lg home_header site_header">
    <div class="container">
        <!-- <a class="navbar-brand" href="/cs"><img src="{{ asset('images/ra-logo/cs-toplad-logo.svg') }}"
                class="img-responsive"/></a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nevmenu"
            aria-controls="nevmenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" aria-hidden="true">Toggle navigation</span>
        </button>
        <div id="nevmenu" class="collapse navbar-collapse">
            <div class="navbar-nav ml-auto menu site_menu" id="main_menu">
                <ul class="main_navui fade-in">
                    <li class="active">
                        <a class="top_nav_link" href="/">Home</a>
                    </li>
                    <li>
                        <a class="top_nav_link" href="javascript:void(0)">
                            Courses <span class="carot_down"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                        </a>
                        <ul class="one_level sub_level logo_menuu">
                            <li>
                                <a href="/cma">

                                    <div class="logo_linkk">

                                        <img src="{{ asset('images/ra-logo/cma-toplad-logo.svg') }}">
                                        <span><b>CMA</b><span>Study from best CMA faculty!!!</span></span>
                                    </div>

                                </a>
                            </li>
                            <li>
                                <a href="/cs">

                                    <div class="logo_linkk">

                                        <img src="{{ asset('images/ra-logo/cs-toplad-logo.svg') }}">
                                        <span><b>CS</b><span>Achieve best CS results with us.</span></span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/ca">

                                    <div class="logo_linkk">

                                        <img src="{{ asset('images/ra-logo/ca-toplad-logo.svg') }}">
                                        <span><b>CA</b><span>Achieve best CA results with us.</span></span>
                                    </div>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="faculty_m_menu">
                        <a class="top_nav_link" href="javascript:void(0)">
                            Faculty <span class="carot_down"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                        </a>
                        <ul class="one_level sub_level">
                            <li class="first_level">
                                <div class="mega_master mega_common">
                                    <!-- <div class="mega_master mega_common"> -->
                                    @foreach ($teachers as $teacher)
                                        <a title="{{ ucwords($teacher->name) }}"
                                            href="/faculty/{{ $teacher->slug }}">{{ ucwords($teacher->name) }}
                                        </a>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li><a class="top_nav_link" href="/about-us">About Us</a></li>
                    <li><a class="top_nav_link" href="/scholarship">Scholarship</a></li>

                    <li><a class="top_nav_link" href="/jobs-ca-cma-cs">Jobs</a></li>

                    <li class="main_login_pane">
                        @if (Auth::check())
                            <a class="top_nav_link" href="javascript:void(0)"><span class="menu_ig"><i
                                        class="fa fa-sign-in" aria-hidden="true"></i></span>
                                <span>Logout</span></a>

                            <ul class="nav-dropdown">
                                <li class="">
                                    <a title="Logout" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                            document.getElementById('layout-logout-form-mob').submit();">Logout</a>
                                </li>
                                @if (Auth::user()->role == 'student')
                                    <li class="">
                                        <a class="top_nav_link" title="My Profile" href="/student/profile"> My
                                            Profile</a>
                                    </li>
                                    <li class="">
                                        <a class="top_nav_link" title="Order" href="/student/order"> Order</a>
                                    </li>
                                @endif
                                @if (Auth::user()->role == 'teacher')
                                    <li class="">
                                        <a class="top_nav_link" title="My Profile" href="/teacher/profile"> My
                                            Profile</a>
                                    </li>
                                    <li class="">
                                        <a class="top_nav_link" title="Products" href="/teacher/product"> Products</a>
                                    </li>
                                @endif
                                @if (Auth::user()->role == 'counsellor')
                                    <li class="">
                                        <a class="top_nav_link" title="Counsellor Profile" href="/counsellor/order">
                                            Counsellor
                                            Profile</a>
                                    </li>
                                @endif
                                @if (Auth::user()->role == 'order-fulfilment-team')
                                    <li class="">
                                        <a class="top_nav_link" title="Order Fulfilment Team Profile"
                                            href="/fulfilment/order"> Order Fulfilment Team Profile</a>
                                    </li>
                                @endif
                                @if (Auth::user()->role == 'super-admin')
                                    <li class="">
                                        <a class="top_nav_link" title="Admin Profile" href="/admin-login/orders">
                                            Admin
                                            Profile</a>
                                    </li>
                                @endif
                                <form id="layout-logout-form-mob" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        @else
                            <a class="top_nav_link" href="javascript:void(0)">Login <span class="carot_down"><i
                                        class="fa fa-angle-down" aria-hidden="true"></i></span></a>
                            <ul class="nav-dropdown">
                                <li class="">
                                    <a class="top_nav_link" title="Login" href="/login">
                                        Login</a>
                                </li>
                                <!-- <li class="">
                                <a class="top_nav_link" title="Register" href="/register">
                                    Register</a>
                            </li> -->
                                <li class="">
                                    <a class="top_nav_link" title="Join as a Faculty" target="_blank"
                                        href="/registration/registration.php">
                                        Join as a Faculty</a>
                                </li>
                            </ul>
                        @endif
                    </li>
                    <li class="top_nav_link pay_cta_now">
                        <a title="Pay Us" href="/pay-now" class="nav-link text-center pay_direct">
                            <!-- <i class="fa fa-inr" aria-hidden="true"></i>  -->
                            Pay Now
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</nav>

<nav class="navbar navbar-expand-lg home_header product_header opacity-background-download">
    <div class="container">
        <div class="logo_wraped">
            <a class="navbar-brand" href="/cs"><img src="{{ asset('images/ra-logo/cs-toplad-logo.svg') }}"
                    class="img-responsive" alt="cs-toplad-logo" />
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nevmenu"
            aria-controls="nevmenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <div class="navbar-nav ml-auto menu site_menu" id="main_menu">

                <ul class="main_navui">

                    <li class="menu-dropdown-icon">
                        <a class="top_nav_link" href="javascript:void(0)">
                            Video Classes <span class="carot_down"><i class="fa fa-angle-down"
                                    aria-hidden="true"></i></span>
                        </a>
                        <ul class="one_level sub_level" style="display: none;">
                            <li class="first_level single_levels">
                                @foreach ($courseLevel as $course)
                                    @php
                                        $courseName = $course->name;
                                        $newCourseName = strtolower(str_replace(' ', '-', trim($courseName)));
                                    @endphp
                                    <ul class="two_level sub_level">
                                        <li class="group_title"><a class="main_corserr"
                                                href="/{{ $segment }}/{{ $newCourseName }}">{{ $course->name }}</a>
                                        </li>
                                        @foreach ($course->mstSubject as $subject)
                                            @if (!empty($subject->slug))
                                                <li><a
                                                        href="/{{ $segment }}/paper/{{ $subject->slug }}">{{ $subject->name }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endforeach
                            </li>



                        </ul>
                    </li>

                    <li><a class="top_nav_link" href="/{{ $segment }}/cs-combo-offer-classes">Combo
                            Videos</a></li>
                    {{-- <li><a class="top_nav_link" href="/{{$segment}}/cs-past-papers">Past Papers Videos</a></li> --}}
                    <li><a class="top_nav_link" href="/{{ $segment }}/demo-videos">Demo Videos</a></li>
                    <li><a class="top_nav_link" href="/{{ $segment }}/cs-combo-offer">Combo Offer</a></li>
                    <li><a class="top_nav_link" href="/{{ $segment }}/downloads-notes">Downloads</a></li>
                    <li><a class="top_nav_link" href="/{{ $segment }}/jobs">Jobs</a></li>
                </ul>
                <ul class="main_navui mobile_show_on" style="display:none;">
                    <li class="mob_logs"> <a class="navbar-brand" href="/"><img
                                src="{{ asset('images/toplad-logo.svg') }}" class="img-responsive" /></a></li>
                    <li class="active">
                        <a class="top_nav_link" href="/">Home</a>
                    </li>
                    <li>
                        <a class="top_nav_link" href="javascript:void(0)">
                            Courses <span class="carot_down"><i class="fa fa-angle-down"
                                    aria-hidden="true"></i></span>
                        </a>
                        <ul class="one_level sub_level logo_menuu">
                            <li>
                                <a href="/cma">
                                    <div class="logo_linkk">
                                        <img src="{{ asset('images/ra-logo/cma-toplad-logo.svg') }}">
                                        <span><b>CMA</b><span>Study from best CMA faculty!!!</span></span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/cs">
                                    <div class="logo_linkk">
                                        <img src="{{ asset('images/ra-logo/cs-toplad-logo.svg') }}">
                                        <span><b>CS</b><span>Achieve best CS results with us.</span></span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/ca">
                                    <div class="logo_linkk">
                                        <img src="{{ asset('images/ra-logo/ca-toplad-logo.svg') }}">
                                        <span><b>CA</b><span>Achieve best CA results with us.</span></span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="faculty_m_menu">
                        <a class="top_nav_link" href="javascript:void(0)">
                            Faculty <span class="carot_down"><i class="fa fa-angle-down"
                                    aria-hidden="true"></i></span>
                        </a>
                        <ul class="one_level sub_level">
                            <li class="first_level">
                                <div class="mega_master mega_common">
                                    @foreach ($teachers as $teacher)
                                        <ul class="two_level sub_level list-col-12">
                                            <li><a title="{{ ucwords($teacher->name) }}"
                                                    href="/faculty/{{ $teacher->slug }}">{{ ucwords($teacher->name) }}
                                                </a></li>
                                        </ul>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li><a class="top_nav_link" href="/about-us">About Us</a></li>
                    <li><a class="top_nav_link" href="/scholarship">Scholarship</a></li>

                    <li><a class="top_nav_link" href="/jobs-ca-cma-cs">Jobs</a></li>

                    <li class="login_pane_mobile">
                        @if (Auth::check())
                            <a class="top_nav_link" href="javascript:void(0)"><span class="menu_ig"><i
                                        class="fa fa-sign-in" aria-hidden="true"></i></span>
                                <span>Logout</span></a>

                            <ul class="nav-dropdown">
                                <li class="">
                                    <a title="Logout" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                            document.getElementById('layout-logout-form-mob').submit();">Logout</a>
                                </li>
                                @if (Auth::user()->role == 'student')
                                    <li class="">
                                        <a title="My Profile" href="/student/profile"> My
                                            Profile</a>
                                    </li>
                                    <li class="">
                                        <a title="Order" href="/student/order"> Order</a>
                                    </li>
                                @endif
                                @if (Auth::user()->role == 'teacher')
                                    <li class="">
                                        <a title="My Profile" href="/teacher/profile"> My
                                            Profile</a>
                                    </li>
                                    <li class="">
                                        <a title="Products" href="/teacher/product"> Products</a>
                                    </li>
                                @endif
                                @if (Auth::user()->role == 'counsellor')
                                    <li class="">
                                        <a class="top_nav_link" title="Counsellor Profile" href="/counsellor/order">
                                            Counsellor
                                            Profile</a>
                                    </li>
                                @endif
                                @if (Auth::user()->role == 'order-fulfilment-team')
                                    <li class="">
                                        <a class="top_nav_link" title="Order Fulfilment Team Profile"
                                            href="/fulfilment/order"> Order Fulfilment Team Profile</a>
                                    </li>
                                @endif
                                @if (Auth::user()->role == 'super-admin')
                                    <li class="">
                                        <a title="Admin Profile" href="/admin-login/orders"> Admin
                                            Profile</a>
                                    </li>
                                @endif
                                <form id="layout-logout-form-mob" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        @else
                            <a class="top_nav_link" href="javascript:void(0)">Login <span class="carot_down"><i
                                        class="fa fa-angle-down" aria-hidden="true"></i></span></a>
                            <ul class="nav-dropdown">
                                <li class="">
                                    <a title="Login" href="/login">
                                        Login</a>
                                </li>
                                <!-- <li class="">
                                <a title="Register" href="/register">
                                    Register</a>
                            </li> -->
                                <li class="">
                                    <a title="Join as a Faculty" target="_blank"
                                        href="/registration/registration.php">
                                        Join as a Faculty</a>
                                </li>
                            </ul>
                        @endif
                    </li>
                    <li class="top_nav_link pay_cta_now">
                        <a title="Pay Us" href="/pay-now" class="nav-link text-center pay_direct">
                            <!-- <i class="fa fa-inr" aria-hidden="true"></i>  -->
                            Pay Now
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
