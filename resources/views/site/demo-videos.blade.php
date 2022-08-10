@extends($segment=='cma' ? 'layouts.cma-layout' : (($segment=='cs') ? 'layouts.cs-layout' : (($segment=='ca') ?
'layouts.ca-layout' : 'layouts.ca-layout')))

@prepend('head-data')
@if($segment=='cma')
<title>CMA Demo Videos | CMA Classes | Toplad</title>
<meta name="description"
    content="Learn from India's top CMA faculty at Toplad. We are dedicated to making it possible for anyone, anywhere, at any time to study CMA. Join Us Now.">
<meta name="keywords"
    content="CMA, CMA courses online, Foundation to Final, Top Faculty of India, Academy of Excellence, CMA in Future, CMA Books, Online CMA Classes" />
@elseif($segment=='cs')
<title>CS Demo Videos | CS Classes | Toplad</title>
<meta name="description"
    content="Learn from India's top CS faculty at Toplad. We are dedicated to making it possible for anyone, anywhere, at any time to study CS. Join Us Now.">
<meta name="keywords"
    content="CS, CS courses online, CSEET, CS Executive, CS Professional, Top Faculty of India, Academy of Excellence, CS in Future, CS Books, Online CS Classes" />
@elseif($segment=='ca')
<title>CA Demo Videos | CA Classes | Toplad</title>
<meta name="description"
    content="Learn from India's top CA faculty at Toplad. We are dedicated to making it possible for anyone, anywhere, at any time to study CA. Join Us Now.">
<meta name="keywords"
    content="CA, CA courses online, CA Foundation, CA Inter, CA Inter Group 1, CA Inter Group 2, CA Final, CA Final Group 1, CA Final Group 2, Top Faculty of India, Academy of Excellence, CA in Future, CA Books, CA Notes, Online CA Classes" />
@endif
@endprepend

@section('content')
<div class="demo_videos_page">
<!-- <a onclick="topFunction()" id="jump_btn" class="jump-top"><i class="fa fa-arrow-up" aria-hidden="true"></i></a> -->
    <div class="wrap_theme_pages">

        <section class="inner_pcontent demo_vid_page">
            <div class="inner_pag inner_flexer">
                <div class="sidebar-item">
                    <div class="make-me-sticky" id="myScrollspy">
                        <!-- <nav aria-label="breadcrumb" class="bdcrumb mobile_wider_bnav">
                    
                    <div class="flex_bcrumb">
                        <div class="menu_demo_side">
                        <i class="fa fa-window-close" aria-hidden="true"></i>
                        </div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li title="Demo Videos" class="breadcrumb-item active" aria-current="page">Demo Videos
                            </li>
                        </ol>
                   
                </div>
            </nav> -->
                        <ul class="side_lister sidenav" id="">
                            @foreach($course_level as $level)
                            <li class="demo_paper_side" id="level_{{ $level['id'] }}">
                                <a class="vivid_scrollar">
                                    <span>{{ $level['name'] }}</span> <span class="open_vid"><i class="fa fa-angle-down"
                                            aria-hidden="true"></i></span></a>
                                <ul class="sub_side_paper">
                                    @foreach($level['mstSubject'] as $subject)
                                    <li class="">
                                        <a class="side_paper_class"
                                            id="subject_{{ $subject['id'] }}">{{ $subject['name'] }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                        <!-- <div class="closer_vid open_hide" id="show_in">
                    <a href="javascript:void(0)" class="openbtn" onclick="openNav()"><i class="fa fa-align-right"
                            aria-hidden="true"></i></a>
                </div>
                <div class="closer_vid close_hide" id="hide_in">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i
                            class="fa fa-arrow-circle-o-left" aria-hidden="true"></i></a>
                </div> -->
                    </div>
                </div>
                <div class="main_lister" id="main" data-spy="scroll" data-target="#spy">
                    <div class="container-fluid">
                        <nav aria-label="breadcrumb" class="bdcrumb full_wider_bnav">

                            <div class="flex_bcrumb">
                                <div class="menu_demo_side">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </div>
                                <ol class="breadcrumb">
                                    <!-- <li class="breadcrumb-item"><a href="/">Home</a></li> -->
                                    <li title="Demo Videos" class="breadcrumb-item active" aria-current="page">Demo
                                        Videos
                                    </li>
                                </ol>

                            </div>
                        </nav>
                        <div class="multi_vid_card">
                            @foreach($course_level as $level)
                            @foreach($level['mstSubject'] as $subject)
                            <div class="wrap_vid_card" id="section_{{ $subject['id'] }}">
                                <h4>{{ $subject['name'] }}</h4>
                                <div class="vivid_contents">
                                    @if($subject['product'])
                                    @foreach($subject['product'] as $product)
                                    @if($product['dummyVideo'])
                                    @foreach($product['dummyVideo'] as $video)
                                    @if($video['embed_link'])
                                    @if($product['user'])
                                    <div class="list_vivid">
                                        {!! $video['embed_link'] !!}
                                        <div class="vivid_info">
                                            <a
                                                href="/faculty/{{ $product['user']['slug'] }}">{{ $product['user']['name'] }}</a>
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $(this).scrollTop(0);
    $("li.demo_paper_side:nth-child(1)").addClass("subject_on");


    $(".vivid_scrollar").click(function() {

        $("li.demo_paper_side").slideDown();

        $(this).parent().addClass('subject_on').siblings().removeClass(
            'subject_on');
        if (!$(this).next().is(":visible")) {
            $(this).next().slideUp();
        }
    })


    $(".vivid_scrollar").click(function() {
        $(this).parent().addClass("subject_on");
    });

    $(".side_paper_class").click(function() {
        $(".side_paper_class").removeClass("on_link");
        $(this).addClass("on_link");
        // $(".demo_videos_page").toggleClass("full_demo_width");

    });


    $(".side_paper_class").click(function() {

        var sub_id = $(this).attr('id');
        var id = sub_id.replace('subject_', '');
        $('html, body').animate({
            scrollTop: $("#section_" + id).offset().top
        }, 400);
    });

    $(".menu_demo_side .fa").click(function() {
        $(".demo_videos_page").toggleClass("full_demo_width");
    });

});

if (screen.width <= 767) {
    $(".side_paper_class").click(function() {
        $(".demo_videos_page").toggleClass("full_demo_width");
    });

}

// $("a[href='#jump_tops']").click(function() {
//   $("html, body").animate({ scrollTop: 0 }, "slow");
//   return false;
// });

//Get the button:
mybutton = document.getElementById("jump_btn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
/* Set the width of the side navigation to 250px */
// function openNav() {
//     document.getElementById("mySidenav").style.width = "300px";
//     document.getElementById("main").style.marginLeft = "300px";
//     document.getElementById("main").style.width = "calc(100% - 300px)";
//     document.getElementById("hide_in").style.display = "block";
//     document.getElementById("show_in").style.display = "none";
//     document.getElementById("onscroller").addClass("overscroll");

// }

/* Set the width of the side navigation to 0 */
// function closeNav() {
//     document.getElementById("mySidenav").style.width = "0px";
//     document.getElementById("main").style.marginLeft = "0px";
//     document.getElementById("main").style.width = "calc(100% - 1px)";
//     document.getElementById("hide_in").style.display = "none";
//     document.getElementById("show_in").style.display = "block";
//     document.getElementById("onscroller").removeScroll("overscroll");
// }




// function sticky_relocate() {
//     var window_top = $(window).scrollTop();
//     var footer_top = $('footer').offset().top;
//     var div_top = $('#sticky-anchor').offset().top;
//     var div_height = $('#mySidenav').height();



//     if (window_top + div_height > footer_top)
//         $('#mySidenav').css({
//             top: (window_top + div_height - footer_top) * -1
//         })

//     else if (window_top > div_top) {
//         $('#mySidenav').addClass('stick');
//         $('#mySidenav').removeClass('unsticker');
//         $('#mySidenav').css({
//             top: 0
//         })

//     } else {
//         $('#mySidenav').removeClass('stick');
//         $('#mySidenav').addClass('unsticker');
//     }
// }

// $(function() {
//     $(window).scroll(sticky_relocate);
//     sticky_relocate();
// });

// if ($(window).width() < 767) {
//     $('ul.sub_side_paper a').click(function() {
//         $("#mySidenav").css('width', '0');
//         $("#main").css('margin-left', '0');
//         $("#main").css('width', 'calc(100% - 1px)');
//         $("#hide_in").css('display', 'none');
//         $("#show_in").css('display', 'block');
//     });

// } else {
//     $("#show_in").hide();
// }
</script>




@endpush