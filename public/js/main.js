AOS.init({
    duration: 800,
    easing: 'slide'
});

(function($) {

    "use strict";

    $(window).stellar({
        responsive: true,
        parallaxBackgrounds: true,
        parallaxElements: true,
        horizontalScrolling: false,
        hideDistantElements: false,
        scrollProperty: 'scroll'
    });


    var fullHeight = function() {

        $('.js-fullheight').css('height', $(window).height());
        $(window).resize(function() {
            $('.js-fullheight').css('height', $(window).height());
        });

    };
    fullHeight();

    // loader
    var loader = function() {
        setTimeout(function() {
            if ($('#ftco-loader').length > 0) {
                $('#ftco-loader').removeClass('show');
            }
        }, 1);
    };
    loader();

    // Scrollax
    $.Scrollax();



    // Burger Menu
    var burgerMenu = function() {

        $('body').on('click', '.js-fh5co-nav-toggle', function(event) {

            event.preventDefault();

            if ($('#ftco-nav').is(':visible')) {
                $(this).removeClass('active');
            } else {
                $(this).addClass('active');
            }



        });

    };
    burgerMenu();


    var onePageClick = function() {


        $(document).on('click', '#ftco-nav a[href^="#"]', function(event) {
            console.log(event);
            event.preventDefault();

            var href = $.attr(this, 'href');
        });

    };

    onePageClick();

    // if (window.matchMedia("(max-width: 992px)").matches) {
    //     $('#cou-m').click(function() {
    //         $(this).toggleClass('show');
    //         $('#megamenu').toggle();
    //     });
    // } else {
    //     $(document).ready(function() {
    //         $("#courmenu").mouseenter(function(event) {
    //             event.stopPropagation()
    //             $('#megamenu').addClass("show").css("display", "block");;
    //         }).mouseleave(function(event) {
    //             event.stopPropagation()
    //             $('#megamenu').removeClass("show").css("display", "none");;
    //         })
    //     });
    // }
    // if (window.matchMedia("(max-width: 992px)").matches) {
    //     $('#cou-m1').click(function() {
    //         $(this).toggleClass('show');
    //         $('#megamenu1').toggle();
    //     });
    // } else {
    //     $(document).ready(function() {
    //         $("#courmenu2").mouseenter(function(event) {
    //             event.stopPropagation()
    //             $('#megamenu1').addClass("show").css("display", "block");;
    //         }).mouseleave(function(event) {
    //             event.stopPropagation()
    //             $('#megamenu1').removeClass("show").css("display", "none");;
    //         })
    //     });
    // }

    // if (window.matchMedia("(max-width: 992px)").matches) {
    //     $('#cou-m3').click(function() {
    //         $(this).toggleClass('show');
    //         $('#megamenu3').toggle();
    //     });
    // } else {
    //     $(document).ready(function() {
    //         $("#courmenu3").mouseenter(function(event) {
    //             event.stopPropagation()
    //             $('#megamenu3').addClass("show").css("display", "block");;
    //         }).mouseleave(function(event) {
    //             event.stopPropagation()
    //             $('#megamenu3').removeClass("show").css("display", "none");;
    //         })
    //     });
    // }


    // var carousel = function() {
    //     $('.home-slider').owlCarousel({
    //         loop: true,
    //         autoplay: 3000,
    //         margin: 0,
    //         animateOut: 'fadeOut',
    //         animateIn: 'fadeIn',
    //         nav: false,
    //         autoplayHoverPause: false,
    //         items: 1,
    //         slideSpeed: 10000,
    //         paginationSpeed: 10000,
    //         navText: ["<span class='ion-md-arrow-back'></span>", "<span class='ion-chevron-right'></span>"],
    //         responsive: {
    //             0: {
    //                 items: 1
    //             },
    //             600: {
    //                 items: 1
    //             },
    //             1000: {
    //                 items: 1
    //             }
    //         }
    //     });
    //     $(".faculty-slide").owlCarousel({
    //         center: false,
    //         loop: true,
    //         stagePadding: 0,
    //         margin: 20,
    //         animateOut: 'fadeOut',
    //         animateIn: 'fadeIn',
    //         autoplayHoverPause: false,
    //         autoplay: true,
    //         nav: false,
    //         dots: true,
    //         navText: ['<span class="fa fa-chevron-left">', '<span class="fa fa-chevron-right">'],
    //         responsive: {
    //             0: {
    //                 items: 1,
    //             },
    //             600: {
    //                 items: 2,
    //             },
    //             1000: {
    //                 items: 3,
    //             }
    //         }
    //     });
    //     $(".testi-itm").owlCarousel({
    //         loop: true,
    //         stagePadding: 0,
    //         margin: 20,
    //         animateOut: 'fadeOut',
    //         animateIn: 'fadeIn',
    //         autoplayHoverPause: false,
    //         autoplay: true,
    //         nav: false,
    //         dots: true,
    //         navText: ['<span class="fa fa-chevron-left">', '<span class="fa fa-chevron-right">'],
    //         responsive: {
    //             0: {
    //                 items: 1,
    //             },
    //             600: {
    //                 items: 2,
    //             },
    //             1000: {
    //                 items: 2,
    //             }
    //         }
    //     });
    //     $(".course-slide").owlCarousel({
    //         loop: true,
    //         stagePadding: 0,
    //         margin: 20,
    //         autoplayHoverPause: false,
    //         autoplay: false,
    //         animateOut: 'fadeOut',
    //         animateIn: 'fadeIn',
    //         nav: true,
    //         dots: false,
    //         navText: ['<span class="ion-md-arrow-round-back">', '<span class=" ion-md-arrow-round-forward">'],
    //         responsive: {
    //             0: {
    //                 items: 1,
    //             },
    //             600: {
    //                 items: 2,
    //             },
    //             1000: {
    //                 items: 4,
    //             }
    //         }
    //     });
    //     $(".course-slide1").owlCarousel({
    //         loop: true,
    //         stagePadding: 0,
    //         margin: 20,
    //         autoplayHoverPause: false,
    //         autoplay: false,
    //         animateOut: 'fadeOut',
    //         animateIn: 'fadeIn',
    //         nav: true,
    //         dots: false,
    //         navText: ['<span class="ion-md-arrow-round-back">', '<span class=" ion-md-arrow-round-forward">'],
    //         responsive: {
    //             0: {
    //                 items: 1,
    //             },
    //             600: {
    //                 items: 2,
    //             },
    //             1000: {
    //                 items: 4,
    //             }
    //         }
    //     });
    //     $(".course-slide2").owlCarousel({
    //         loop: true,
    //         stagePadding: 0,
    //         margin: 20,
    //         autoplayHoverPause: false,
    //         autoplay: false,
    //         animateOut: 'fadeOut',
    //         animateIn: 'fadeIn',
    //         nav: true,
    //         dots: false,
    //         navText: ['<span class="ion-md-arrow-round-back">', '<span class=" ion-md-arrow-round-forward">'],
    //         responsive: {
    //             0: {
    //                 items: 1,
    //             },
    //             600: {
    //                 items: 2,
    //             },
    //             1000: {
    //                 items: 4,
    //             }
    //         }
    //     });
    //     $(".trending").owlCarousel({
    //         loop: true,
    //         stagePadding: 0,
    //         margin: 20,
    //         autoplayHoverPause: false,
    //         autoplay: false,
    //         animateOut: 'fadeOut',
    //         animateIn: 'fadeIn',
    //         nav: true,
    //         dots: false,
    //         navText: ['<span class="ion-md-arrow-round-back">', '<span class=" ion-md-arrow-round-forward">'],
    //         responsive: {
    //             0: {
    //                 items: 1,
    //             },
    //             600: {
    //                 items: 2,
    //             },
    //             1000: {
    //                 items: 4,
    //             }
    //         }
    //     });
    //     $(".recently-launched").owlCarousel({
    //         loop: true,
    //         stagePadding: 0,
    //         margin: 20,
    //         autoplayHoverPause: false,
    //         autoplay: false,
    //         animateOut: 'fadeOut',
    //         animateIn: 'fadeIn',
    //         nav: true,
    //         dots: false,
    //         navText: ['<span class="ion-md-arrow-round-back">', '<span class=" ion-md-arrow-round-forward">'],
    //         responsive: {
    //             0: {
    //                 items: 1,
    //             },
    //             600: {
    //                 items: 2,
    //             },
    //             1000: {
    //                 items: 4,
    //             }
    //         }
    //     });
    // };
    // carousel();

    // $('nav .dropdown').hover(function() {
    //     var $this = $(this);
    //     $this.addClass('show');
    //     $this.find('> a').attr('aria-expanded', true);
        
    //     $this.find('.dropdown-menu').addClass('show');
    // }, function() {
    //     var $this = $(this);

    //     $this.removeClass('show');
    //     $this.find('> a').attr('aria-expanded', false);
        
    //     $this.find('.dropdown-menu').removeClass('show');

    // });


    // $('#dropdown04').on('show.bs.dropdown', function() {
    //     console.log('show');
    // });

    // scroll
    // var scrollWindow = function() {
    //     $(window).scroll(function() {
    //         var $w = $(this),
    //             st = $w.scrollTop(),
    //             navbar = $('.ftco_navbar'),
    //             sd = $('.js-scroll-wrap');

    //         if (st > 150) {
    //             if (!navbar.hasClass('scrolled')) {
    //                 navbar.addClass('scrolled');
    //             }
    //         }
    //         if (st < 150) {
    //             if (navbar.hasClass('scrolled')) {
    //                 navbar.removeClass('scrolled sleep');
    //             }
    //         }
    //         if (st > 150) {
    //             if (!navbar.hasClass('awake')) {
    //                 navbar.addClass('awake');
    //             }

    //             if (sd.length > 0) {
    //                 sd.addClass('sleep');
    //             }
    //         }
    //         if (st < 150) {
    //             if (navbar.hasClass('awake')) {
    //                 navbar.removeClass('awake');
    //                 navbar.addClass('sleep');
    //             }
    //             if (sd.length > 0) {
    //                 sd.removeClass('sleep');
    //             }
    //         }

    //     });
    // };
    // scrollWindow();
    $(document).ready(function() {
      
        $(".coup-form").hide();
        $(".co-ss").hide();
        $("#coup-btn").click(function() {
            $(".btn-buy-now").hide();
            $(".coup-form").show();
        });
        $("#codeapply").click(function() {
            $(".coup-form").hide();
            $(".co-ss").show();
        });


        $(".new-address").hide();
        $("#editaddress").click(function() {
            $(".old-address").hide();
            $(".new-address").show();
        });
        $(".save-address").click(function() {
            $(".old-address").show();
            $(".new-address").hide();
        });


    });

    // var counter = function() {

    //     $('#section-counter, .hero-wrap, .ftco-counter').waypoint(function(direction) {

    //         if (direction === 'down' && !$(this.element).hasClass('ftco-animated')) {

    //             var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
    //             $('.number').each(function() {
    //                 var $this = $(this),
    //                     num = $this.data('number');
    //                 console.log(num);
    //                 $this.animateNumber({
    //                     number: num,
    //                     numberStep: comma_separator_number_step
    //                 }, 7000);
    //             });

    //         }

    //     }, { offset: '95%' });

    // }
    // counter();


    // var contentWayPoint = function() {
    //     var i = 0;
    //     $('.ftco-animate').waypoint(function(direction) {

    //         if (direction === 'down' && !$(this.element).hasClass('ftco-animated')) {

    //             i++;

    //             $(this.element).addClass('item-animate');
    //             setTimeout(function() {

    //                 $('body .ftco-animate.item-animate').each(function(k) {
    //                     var el = $(this);
    //                     setTimeout(function() {
    //                         var effect = el.data('animate-effect');
    //                         if (effect === 'fadeIn') {
    //                             el.addClass('fadeIn ftco-animated');
    //                         } else if (effect === 'fadeInLeft') {
    //                             el.addClass('fadeInLeft ftco-animated');
    //                         } else if (effect === 'fadeInRight') {
    //                             el.addClass('fadeInRight ftco-animated');
    //                         } else {
    //                             el.addClass('fadeInUp ftco-animated');
    //                         }
    //                         el.removeClass('item-animate');
    //                     }, k * 80, 'easeInOutExpo');
    //                 });

    //             }, 100);

    //         }

    //     }, { offset: '95%' });
    // };
    // contentWayPoint();


})(jQuery);



$(document).ready(function() {
    $('.nav-tabs > a.nav-link').hover(function() {
        $(this).tab('show');
    });
});


// Format Date Time with moment functions
function formatDateTimeToDate($time) {
    return moment($time, "YYYY-MM-DD hh:mm:ss").format("DD MMM YYYY");
}


  function handleLogout(e) {
    e.preventDefault();
    console.log("Logging out ")
    // event.preventDefault(); document.getElementById('layout-logout-form-mob').submit();
  }

//   $(document).ready(function(){
//     $("#dop_show").click(function(){
//       $(this).show();
//     });
//   });

  function myFunction() {
    var element = document.getElementById("jd_droper");
    element.classList.toggle("active_droper");
  }