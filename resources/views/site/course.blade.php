@extends('layouts.cma-layout')

@prepend('head-data')
<title>CMA Video Lectures | Foundation | Intermediate | Final - Toplad</title>
<meta name="description"
    content="Learn the best CMA video lectures online from India's top CMA faculty at Toplad. We are dedicated to provide the best CMA video lecture for foundation, inter and final.">
<meta name="keywords"
    content="CMA, CMA courses online, Foundation to Final, Top Faculty of India, Academy of Excellence, CMA in Future, CMA Books, Online CMA Classes" />
@endprepend

@section('content')

<div class="inner_theme_page inner_header_page p-b40">
    <nav aria-label="breadcrumb" class="bdcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li title="CMA" class="breadcrumb-item active" aria-current="page">CMA</li>
            </ol>
        </div>
    </nav>
    <div class="wrap_theme_pages">

        <section class="ftco-section ra_courses">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 heading-section">
                        <h1 class="inner_theme_title">Cost and Management Accountancy (CMA)</h1>
                        <p class="f-p">
                            Cost and management Accountancy (CMA) provides you an in-depth Knowledge to manage business
                            with the
                            available resources. CMA Course is conducted by Institute of Cost & management Accountants
                            of India
                            (ICMAI). Cost accountants have to collect and analyze the financial information from all the
                            areas
                            of a company. Cost Accountants are one of the most vital functionaries of entire financial
                            world.
                            Cost Accounting is a management accounting. It is specialized area of expertise concern with
                            analyzing the cost of products, manufactured or sold by the company.
                        </p>
                        <div class="cous-types">
                            <div class="cours-a">


                                <ul class="nav nav-tabs">
                                    @foreach($course_level as $level)
                                    <li class="<?php echo $loop->index == 0 ? 'active' : '' ?>"><a
                                            title="{{$level['name']}}"
                                            class="types-btn tab_cbtns <?php echo $loop->index == 0 ? 'active' : '' ?>"
                                            id="course<?php echo ($loop->index + 1); ?>-tab" data-toggle="tab"
                                            href="#course<?php echo ($loop->index + 1); ?>">{{ $level['name'] }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="course_indetails row">
                                    <div class="tab-content tab_layout">
                                        @foreach($course_level as $level)
                                        <div class="tab-pane <?php echo $loop->index == 0 ? ' show active' : '' ?>"
                                            id="course<?php echo ($loop->index + 1); ?>">
                                            <div class="wrap_tab_oput">
                                                <div class="single_pinfo">
                                                    <h4 class="mb-10 mt-2 pt-0 f-26">{{$level['name']}}</h4>
                                                    <p class="f-p">
                                                        Cost and management Accountancy (CMA) provides you an in-depth
                                                        Knowledge
                                                        to
                                                        manage business with the
                                                        available resources.
                                                    </p>
                                                </div>

                                                <div class="tab_collactions">
                                                    @foreach($level['mstSubject'] as $subject)
                                                    @if(!empty($subject['slug']))
                                                    <div class="col-md-3 col_tabs_course">
                                                        <div class="fix-wh fix_slide_width">
                                                            <a title="{{ $subject->name }}"
                                                                href="/{{$segment}}/paper/{{ $subject['slug'] }}">
                                                                <div class="image">
                                                                    <img src="{{  asset($subject['image']) }}">
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- <section class="ftco-section test-monials bg-white" id="blog-section">
  <div class="container">
    <div class="row justify-content-center ">
      <div class="col-md-7 heading-section text-center ftco-animate" data-animate-effect="fadeIn">
        <h2 class="mb-4">What our learners have to say...</h2>
      </div>
    </div>
    <div class="testi-itm owl-carousel">
      <div class="testi_item ">
        <div class="row">
          <div class="col-lg-4 col-md-6 ftco-animate" data-animate-effect="fadeInUp">
            <img src="{{  asset('images/auth1.jpg') }}" alt="Auther Image">
          </div>
          <div class="col-lg-8">
            <div class="testi_text  ftco-animate" data-animate-effect="fadeInUp">
              <h4>Elite Martin</h4>
              <p>
                Him, made can't called over won't there on divide there
                male fish beast own his day third seed sixth seas unto.
                Saw from
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="testi_item">
        <div class="row">
          <div class="col-lg-4 col-md-6 ftco-animate" data-animate-effect="fadeInUp">
            <img src="{{  asset('images/auth2.jpg') }}"  alt="Auther Image">
          </div>
          <div class="col-lg-8">
            <div class="testi_text ftco-animate" data-animate-effect="fadeInUp">
              <h4>Elite Martin</h4>
              <p>
                Him, made can't called over won't there on divide there
                male fish beast own his day third seed sixth seas unto.
                Saw from
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="testi_item">
        <div class="row">
          <div class="col-lg-4 col-md-6 ftco-animate" data-animate-effect="fadeInUp">
            <img src="{{  asset('images/auth1.jpg') }}"  alt="Auther Image">
          </div>
          <div class="col-lg-8">
            <div class="testi_text ftco-animate" data-animate-effect="fadeInUp">
              <h4>Elite Martin</h4>
              <p>
                Him, made can't called over won't there on divide there
                male fish beast own his day third seed sixth seas unto.
                Saw from
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="testi_item">
        <div class="row">
          <div class="col-lg-4 col-md-6 ftco-animate" data-animate-effect="fadeInUp">
            <img src="{{  asset('images/auth2.jpg') }}"  alt="Auther Image">
          </div>
          <div class="col-lg-8">
            <div class="testi_text ftco-animate" data-animate-effect="fadeInUp">
              <h4>Elite Martin</h4>
              <p>
                Him, made can't called over won't there on divide there
                male fish beast own his day third seed sixth seas unto.
                Saw from
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->

    </div>

</div>
@endsection