<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    @stack('head-data')
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('images/icon/favicon.ico')}}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('datatable/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('datatable/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <!-- <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light super_header"
        id="super-navbar">
        <div class="container-fluid position-relative">
            <div class="super_icons desk_super_icon">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
            <div class="mobile_super_icons">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
            <ul class="navbar-nav nav ml-auto super_ulisting">
                <li class="nav-item dropdown custom_ddown">
                    <a href="#" class="nav-link text-center">

                      Super Admin <i class="ml-1 icon-sort-down mobile-hidden"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownsub1">
                        <a class="nav-link <?php echo (\Route::current()->uri == 'admin-login/profile') ? 'active' : '' ?>"
                            href="/admin-login/profile">
                            <i class="fa fa-user-circle-o mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Profile</span></a>
                        <a class="nav-link <?php echo (\Route::current()->uri == 'admin-login/change-password') ? 'active' : '' ?>"
                            href="/admin-login/change-password">
                            <i class="fa fa-cog mr-2" aria-hidden="true"></i>
                            <span class="font-weight-bold small text-uppercase">Password</span></a>
                        <a class="nav-link" href="/">
                            <i class="fa fa-home mr-2" aria-hidden="true"></i>
                            <span class="font-weight-bold small text-uppercase">Website</span></a>
                        <a class="nav-link " href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out mr-2" aria-hidden="true"></i>
                            <span class="font-weight-bold small text-uppercase">Logout</span></a>
                    </div>
                </li>
        </div>
        </div>
    </nav> -->
    @include('flash-message')


    @yield('content')

    <!-- loader -->
    <!-- <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg></div> -->


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('js/scrollax.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script> -->
    <script src="{{ asset('datatable/js/jquery.validate.js') }}"></script>
    <script src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatable/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('datatable/js/dataTables.bootstrap4.min.js') }}"></script>

    <script>
    $(document).ready(function() {
        $(".super_icons").click(function() {
            $(this).parent().parent().parent().toggleClass("super_active");
        });
        $(".mobile_super_icons").click(function() {
            $(this).parent().parent().parent().toggleClass("mobile_super_active");
        });


    });
    </script>
<script>
 $(document).ready(function () {
     $("#super-navbar .nav-item > .nav-link").hover(
     function () {
         $(this).parent().addClass("post-hover");
     }, function () {
         $(this).parent().removeClass("post-hover");
     });
 });

</script>
    @stack('scripts')

</body>

</html>