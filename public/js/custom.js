$(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll >50) {
        $(".main_header").addClass("scrol_fixed");
        $("a.menu-mobile").addClass("scrol_fixed");
    } 
     
    else {
        $(".main_header").removeClass("scrol_fixed");
        $("a.menu-mobile").removeClass("scrol_fixed");
    }
});






$(document).ready(function () {

    
    if ($(window).width() >= 992) {
        $(".menu > ul > li > ul > .first_level > a").hover(function () {
            $(this).parent().toggleClass("show_sublevel");
        });
    } else {
        $(".first_level > a").addClass("menu_single");
    }

    $(".menu-mobile").click(function () {
        $("body").toggleClass("nav-activated");
    });

    jQuery(".home-home-slider").owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: true,
        autoplay: true,
        navText: [
            '<i class="fa fa-chevron-left"></i>',
            '<i class="fa fa-chevron-right"></i>',
        ],
        responsive: {
            0: {
                items: 1,
            },
            480: {
                items: 1,
            },

            767: {
                items: 1,
                // ,
                // margin:50
            },
            1000: {
                items: 1,
            },
        },
    });



    jQuery(".cma-home-slider").owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: true,
        autoplay: true,
        navText: [
            '<i class="fa fa-chevron-left"></i>',
            '<i class="fa fa-chevron-right"></i>',
        ],
        responsive: {
            0: {
                items: 1,
            },
            480: {
                items: 1,
            },

            767: {
                items: 1,
                // ,
                // margin:50
            },
            1000: {
                items: 1,
            },
        },
    });

    jQuery(".ca-home-slider").owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: true,
        autoplay: true,
        navText: [
            '<i class="fa fa-chevron-left"></i>',
            '<i class="fa fa-chevron-right"></i>',
        ],
        responsive: {
            0: {
                items: 1,
            },
            480: {
                items: 1,
            },

            767: {
                items: 1,
                // ,
                // margin:50
            },
            1000: {
                items: 1,
            },
        },
    });


    jQuery(".cs-home-slider").owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: true,
        autoplay: true,
        navText: [
            '<i class="fa fa-chevron-left"></i>',
            '<i class="fa fa-chevron-right"></i>',
        ],
        responsive: {
            0: {
                items: 1,
            },
            480: {
                items: 1,
            },

            767: {
                items: 1,
                // ,
                // margin:50
            },
            1000: {
                items: 1,
            },
        },
    });


    jQuery(".our-results").owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: true,
        slideTransition: 'linear',
        autoplay: true,
        autoplayTimeout: 3e3,
        smartSpeed: 500,
        navText: [
            '<i class="fa fa-chevron-left"></i>',
            '<i class="fa fa-chevron-right"></i>',
        ],
        responsive: {
            0: {
                items: 1,
                nav: true,
                dots: false
            },
            480: {
                items: 2,
                nav: true,
                dots: false
            },

            767: {
                items: 3,
                margin: 30,
            },
            1000: {
                items: 6,
                margin: 20,
            },
        },
    });


    jQuery(".home-carousel-1").owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        dots: true,
        autoplay: false,
        autoHeight : true,
        navText: [
            '<i class="fa fa-chevron-left"></i>',
            '<i class="fa fa-chevron-right"></i>',
        ],
        responsive: {
            0: {
                items: 1,
                nav: true,
                dots: false
            },
            480: {
                items: 1,
                nav: true,
                dots: false
            },

            767: {
                items: 1,
                margin: 50,
            },
            1000: {
                items: 1,
                margin: 100,
            },
        },
    });


    jQuery(".testimonial_slider").owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: true,
        // autoplay: true,
        navText: [
            '<i class="fa fa-chevron-left"></i>',
            '<i class="fa fa-chevron-right"></i>',
        ],
        responsive: {
            0: {
                items: 1,
            },
            480: {
                items: 1,
            },

            767: {
                items: 1,
                margin: 50,
            },
            1000: {
                items: 2,
            },
        },
    });
});
function hover_tab() {
    jQuery('.hover-block-outer[data-toggle="tab-hover"] div').on(
        "mouseenter",
        function () {
            jQuery(this).tab("show");
        }
    );
}

// $(function() {
// 	$('nav a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
//   });


jQuery(function($) {
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $('.top_nav_link').each(function() {
     if (this.href === path) {
      $(this).addClass('active');
     }
    });
   });

   // this changes the scrolling behavior to "smooth"
// window.scrollTo({ top: 0, behavior: 'smooth' });

$('html, body').animate({
    scrollTop: $("header").offset().top
}, 0);

