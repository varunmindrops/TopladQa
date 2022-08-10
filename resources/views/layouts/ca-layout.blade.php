@php 
    $url = url()->full();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    @stack('head-data')
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('images/icon/favicon.ico')}}" type="image/x-icon">

    <!-- ------- Social Meta ------------ -->
    <meta name="robots" content="index, follow">
    <!-- <meta name="google-site-verification" content="dvyFmtTfF7Yg9E7ktMW-U8B62RJYAI6QszD2Igov2No" /> -->
    <!--facebook-->
    <meta name="instagram:card" content="CA courses online | Foundation to Final | Top Faculty of India | Toplad ">
    <meta name="instagram:site" content="@toplad.in">
    <meta name="instagram:creator" content="@toplad.in">
    <meta name="instagram:url" content="https://toplad.in/">
    <meta name="instagram:title" content="CA courses online | Foundation to Final | Top Faculty of India | Toplad ">
    <meta name="instagram:description" content="Learn from India's top CA faculty at Toplad. We are dedicated to making it possible for anyone, anywhere, at any time to study CA.">
    <meta name="instagram:image" content="https://toplad.in/images/ca-toplad-logo.svg" alt="instagram-image">

    <meta name="linkedin:card" content="CA courses online | Foundation to Final | Top Faculty of India | Toplad ">
    <meta name="linkedin:site" content="@toplad">
    <meta name="linkedin:creator" content="@toplad">
    <meta name="linkedin:url" content="https://toplad.in/">
    <meta name="linkedin:title" content="CA courses online | Foundation to Final| Top Faculty of India | Toplad ">
    <meta name="linkedin:description" content="Learn from India's top CA faculty at Toplad. We are dedicated to making it possible for anyone, anywhere, at any time to study CA.">
    <meta name="linkedin:image" content="https://toplad.in/images/ca-toplad-logo.svg" alt="instagram-image">

    <meta name="facebook:card" content="CA courses online | Foundation to Final | Top Faculty of India | Toplad ">
    <meta name="facebook:site" content="@toplad">
    <meta name="facebook:creator" content="@toplad">
    <meta name="facebook:url" content="https://toplad.in/">
    <meta name="facebook:title" content="CA courses online | Foundation to Final | Top Faculty of India | Toplad ">
    <meta name="facebook:description" content="Learn from India's top CA faculty at Toplad. We are dedicated to making it possible for anyone, anywhere, at any time to study CA.">
    <meta name="facebook:image" content="https://toplad.in/images/ca-toplad-logo.svg" alt="facebook-image">

    <link rel="canonical" href="<?php echo $url ?>" />

<!-- ----------------
CSS Links 
----------------------->

    <link rel="preload" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="preload" href="{{ asset('css/bootstrap.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="preload" href="{{ asset('css/raghav-themes.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link href="{{ asset('css/raghav-themes.css') }}" rel="stylesheet">
    <link rel="preload" href="{{ asset('css/style.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="preload" href="{{ asset('css/open-iconic-bootstrap.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
    <!-- <link href="{{ asset('css/home-raghav-themes.css') }}" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="{{ asset('css/home-style.css') }}"> -->
    <link rel="preload" href="{{ asset('css/responsive.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link rel="preload" href="{{ asset('css/animate.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="preload" href="{{ asset('css/owl.carousel.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">

    @yield('temporary')
    
    <script>
        const terminationEvent = 'onpagehide' in self ? 'pagehide' : 'unload';
        addEventListener(terminationEvent, (event) => {
        }, {capture: true});
    </script>

    <script type="text/javascript" data-cfasync="false">
        var _foxpush = _foxpush || [];
        _foxpush.push(['_setDomain', 'topladin']);
        (function() {
            var foxscript = document.createElement('script');
            foxscript.src = '//cdn.foxpush.net/sdk/foxpush_SDK_min.js';
            foxscript.type = 'text/javascript';
            foxscript.async = 'true';
            var fox_s = document.getElementsByTagName('script')[0];
            fox_s.parentNode.insertBefore(foxscript, fox_s);
        })();
    </script>

    <script type="application/ld+json">
        [{
            "@context": "https://schema.org",
            "@type": "Online learning platform",
            "name": "Toplad",
            "alternateName": "Top Lad",
            "url": "https://toplad.in/",
            "logo": "https://toplad.in/images/ca-toplad-logo.svg",
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "9953155680",
                "contactType": "customer service"
            },
            "sameAs": [
                "https://www.facebook.com/toplad",
                "https://www.instagram.com/toplad.in/"
            ]
        }]
    </script>

    <script type="application/ld+json">
        [{
            "@context": "https://schema.org/",
            "@type": "WebSite",
            "name": "Toplad",
            "url": "https://toplad.in/",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "https://toplad.in/{search_term_string}",
                "query-input": "required name=search_term_string"
            }
        }]
    </script>

    @include('web-analytics')

    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '354961799225803');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=354961799225803&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0&appId=103684769773063&autoLogAppEvents=1" nonce="CDV385dr"></script>
</head>


<div class="float_btn_main">
    <div class="wrap_fbuttons">
        <a title="Whatsapp" target="_blank" rel="noopener" class="fbutton_wa" href="https://api.whatsapp.com/send?phone=919953155628">
            <div class="chat">
                <i class="fa fa-whatsapp" aria-hidden="true"></i>
            </div>
        </a>
        <a title="Facebook" class="fbutton_fb" rel="noopener" href="http://m.me/100877128322949" target="_blank">
            <div class="chat">
                <!-- <i class="fa fa-facebook" aria-hidden="true"></i> -->
                <img src="{{ asset('images/icon/fb-iconer.svg') }}" class="float-iconer" alt="icon">
            </div>
        </a>
    </div>
</div>


<body id="onscroller" data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div id="fb-root"></div>
    <header class="main_header cs-nav-header ca-nav_header">
        <x-ca-header />
    </header>
    @include('flash-message')

    @yield('content')

    <x-footer />

    <!-- loader -->
    <!-- <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div> -->

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('js/scrollax.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/newstick.js') }}"></script>
    <script src="{{ asset('js/megamenu.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <!-- <script src="{{ asset('js/counterup.min.js') }}"></script> -->
    <script src="{{ asset('js/waypoints-sticky.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <!-- <script src="https://www.jqueryscript.net/demo/social-share-buttons-c/js/c-share.js?v2"></script> -->

    @stack('scripts')

</body>

</html>