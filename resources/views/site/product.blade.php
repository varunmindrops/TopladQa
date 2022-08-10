@if(($product['subject']['slug']."-".$product['user']['slug']) != $slug)
    <script>window.location = "{{ url('404') }}";</script>
@endif

@if($segment != "cma" && $segment != "ca" && $segment != "cs")
    <script>window.location = "{{ url('404') }}";</script>
@endif

@extends($product['subject']['mstCourseLevel']['mstCourse']['value']=='cma' ? 'layouts.cma-layout' : (($product['subject']['mstCourseLevel']['mstCourse']['value']=='cs') ? 'layouts.cs-layout' : (($product['subject']['mstCourseLevel']['mstCourse']['value']=='ca') ?
'layouts.ca-layout' : 'layouts.ca-layout')))

@prepend('head-data')
<title>{{ $product['subject']['name'] }} | Syllabus | {{ ucwords($product['user']['name']) }}</title>
<meta name="description"
    content="Learn the {{ $product['subject']['name'] }} from {{ ucwords($product['user']['name']) }} at Toplad. Get {{ $product['subject']['name'] }}, syllabus, note and pdf anywhere and anytime by {{ ucwords($product['user']['name']) }}.">
@endprepend

@section('content')
<div class="container_box content_pages">
    
<nav aria-label="breadcrumb" class="bdcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                   <a title="{{ $product['subject']['mstCourseLevel']['mstCourse']['name'] }}" href="/{{$product['subject']['mstCourseLevel']['mstCourse']['value']}}">{{ $product['subject']['mstCourseLevel']['mstCourse']['name'] }} <i class="ion-ios-arrow-forward"></i></a>
                  </li>
                <li class="breadcrumb-item">
                   <a title="{{ $product['subject']['name'] }}" href="#" onclick="window.history.back()">{{ $product['subject']['name'] }} <i
                            class="ion-ios-arrow-forward"></i></a>
                  </li>
                <li title="{{ ucwords($product['user']['name']) }}" class="breadcrumb-item active" aria-current="page">
                   {{ ucwords($product['user']['name']) }}
                </li>
            </ol>
        </div>
    </nav>
<section class="ftco-section sigl-course">
    <div class="container">
        <div class="row align_rows">
            <div class="col-md-12">
                <div class="product-info-box">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="product-img sm-db">
                                @if($product['user']['photo'])
                                <img src="{{  asset($product['user']['photo']) }}" class="w-100">
                                @else
                                <img class="img-fluid" src="{{  asset('images/default-user-icon.jpg') }}" alt="">
                                @endif
                            </div>

                        </div>
                        <div class="col-sm-8">
                            <h1 class="prod-h1"> {{ $product['subject']['name'] }} </h1>
                            <div class="auth-info">
                                <div class="authimg">
                                    @if($product['user']['photo'])
                                    <img src="{{  asset($product['user']['photo']) }}" alt="">
                                    @else
                                    <img src="{{  asset('images/default-user-icon.jpg') }}" alt="">
                                    @endif
                                </div>
                                <h6>Created by <b> {{ ucwords($product['user']['name']) }} </b></h6>
                            </div>
                            <div class="row pt-5 buy_selectors">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="text-black fw-500">Video Provided Through</label>
                                        <select class="form-control change-price" id="video_type">
                                            <option value="">Choose Option</option>
                                            @foreach($videosArray as $video)
                                            <option value="{{ $video['id'] }}"> {{ $video['name'] }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="text-black fw-500">Book Provided Through</label>
                                        <select class="form-control change-price" id="book_type">
                                            <option value="">Choose Option</option>
                                            @foreach($booksArray as $book)
                                            <option value="{{ $book['id'] }}"> {{ $book['name'] }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="text-black fw-500">Video Language</label>
                                        <select class="form-control change-price" id="language_type">
                                            <option value="">Choose Option</option>
                                            @foreach($product['videoLanguage'] as $video)
                                            <option value="{{ $video['language_id'] }}"> {{$video['mstLanguage']['name']}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="text-black fw-500">Attempt</label>
                                        <select class="form-control change-price" id="attempt_type">
                                            <option value="">Choose Option</option>
                                            @foreach($attemptsArray as $attempt)
                                            <option value="{{ $attempt['id'] }}"> {{ $attempt['name'] }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="amount_fixeer">

                                <div class="buy-box sm-dn">
                                    <div class="buy-detail">
                                        <form action="/pay-now" method="POST" name="details_form" id="details_form">
                                            @csrf
                                            <div class="price-box">
                                            </div>
                                            <div class="add-div">
                                                <input type="hidden"
                                                    class="form-control input-small pull-left mrg-right15"
                                                    id="product_id" name="product_id" value="{{ $product['id']}}"
                                                    placeholder="Enter Product Id" required>
                                                <input type="hidden"
                                                    class="form-control input-small pull-left mrg-right15"
                                                    id="video_type_value" name="video_type_value" value=""
                                                    placeholder="Enter Video Type" required>
                                                <input type="hidden"
                                                    class="form-control input-small pull-left mrg-right15"
                                                    id="book_type_value" name="book_type_value" value=""
                                                    placeholder="Enter Book Type" required>
                                                <input type="hidden"
                                                    class="form-control input-small pull-left mrg-right15"
                                                    id="attempt_type_value" name="attempt_type_value" value=""
                                                    placeholder="Enter Attempt Type" required>
                                                <input type="hidden"
                                                    class="form-control input-small pull-left mrg-right15"
                                                    id="language_type_value" name="language_type_value" value=""
                                                    placeholder="Enter Language" required>
                                                <input type="hidden"
                                                    class="form-control input-small pull-left mrg-right15"
                                                    id="product_type" name="product_type" value="Video Lecture"
                                                    placeholder="Product Type" required>
                                                <input type="hidden"
                                                    class="form-control input-small pull-left mrg-right15"
                                                    id="slug" name="slug" value="{{$slug}}"
                                                    placeholder="Product Type" required>
                                                <input type="hidden"
                                                    class="form-control input-small pull-left mrg-right15"
                                                    id="segment" name="segment" value="{{$segment}}"
                                                    placeholder="Segment" required>
                                            </div>
                                            <div id="add-div">
                                                <button title="" type="submit" class="btn-cart" id="btn-cart"><span
                                                        class="atc_icons"><i class="fa fa-cart-plus"
                                                            aria-hidden="true"></i></span> Pay Now </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

            
        </div>



        <div class="row align_rows">
            <div class="col-md-12 col-sm-12">
                <div class="video_player">


                    <div class="wrap_demo_vids">
                        @foreach( $product->dummyVideo as $video )
                        @if($video->embed_link)
                        <h4>Demo Videos of CMA Intro classes</h4>
                        @break
                        @endif
                        @endforeach
                        <div class="demo_videos form_data d-flex align-items-center">
                            <!-- <div class="demo_vids">
                            <video width="100%" height="250" controls>
                                <source src="movie.mp4" type="video/mp4">
                                <source src="movie.ogg" type="video/ogg">

                                Your browser does not support the video tag.
                            </video>
                        </div> -->
                            @foreach( $product->dummyVideo as $video )
                            @if($video->embed_link)
                            <div class="demo_vids col-md-4">
                                {!! $video->embed_link !!}
                                <!-- <iframe width="100%" height="225" src="https://youtu.be/cGebM1Gsp14" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

        </div>


        <div class="row">
            <div class="col-md-12 col-sm-12" id="pddiv">
                <div class="prod-desc-box">
                    <h2 class="prod-h1">Course Description</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><strong>Package Name</strong></td>
                                    <td class="text-left"> {{ $product['subject']['name'] }} </td>
                                </tr>
                                <tr>
                                    <td><strong>Plan / Video Provided Through</strong></td>
                                    <td class="text-left">
                                        @foreach($videosArray as $video)
                                        {{$video['name']}} <br />
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Attempt</strong></td>
                                    <td class="text-left">
                                        @foreach($attemptsArray as $attempt)
                                        {{$attempt['name']}} <br />
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>No. of Hours of Videos</strong></td>
                                    <td class="text-left">As Given Below</td>
                                </tr>
                                <tr>
                                    <td><strong>Language</strong></td>
                                    <td>

                                        @if(count($product['videoLanguage']) > 0)
                                        <div><b>Videos:</b>
                                            @foreach($product['videoLanguage'] as $video)
                                            {{$video['mstLanguage']['name']}},
                                            @endforeach
                                        </div>
                                        @endif

                                        @if(count($product['printedBook']) > 0)
                                        <div>
                                            @foreach($product['printedBook'] as $printed)
                                            @foreach($printed['printedBookLanguage'] as $printedBook)
                                            <b>Printed Books:</b>
                                            @break
                                            @endforeach
                                            @break
                                            @endforeach

                                            @foreach($product['printedBook'] as $printed)
                                            @foreach($printed['printedBookLanguage'] as $printedBook)
                                            {{$printedBook['mstLanguage']['name']}},
                                            @endforeach
                                            @endforeach
                                        </div>
                                        @endif

                                        @if(count($product['eBook']) > 0)
                                        <div>
                                            @foreach($product['eBook'] as $ebook)
                                            @foreach($ebook['eBookLanguage'] as $value)
                                            <b>E-Books:</b>
                                            @break
                                            @endforeach
                                            @break
                                            @endforeach

                                            @foreach($product['eBook'] as $ebook)
                                            @foreach($ebook['eBookLanguage'] as $value)
                                            {{$value['mstLanguage']['name']}},
                                            @endforeach
                                            @endforeach
                                        </div>
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>No. of Views</strong></td>
                                    <td class="text-left">
                                        @if($product['no_of_views'] == 'limited')
                                        <div dir="auto"> Video Watch Time – {{ $product['views_per_video'] }} Times
                                        </div>
                                        <div dir="auto"> You can Open and Play the Video only
                                            {{ $product['views_per_video'] }} Times</div>
                                        @else
                                        Unlimited
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Fast Forward option</strong></td>
                                    <td class="text-left">
                                        @if($product['fast_forward'] == 'yes')
                                        Yes - Videos can be played with 1.25x, 1.50x, 1.70x Speed
                                        @else
                                        No
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Delivery</strong></td>
                                    <td class="text-left">2-6 Working Days</td>
                                </tr>
                                <tr>
                                    <td><strong>Validity</strong></td>
                                    <td class="text-left">{{ $product->validity_value }} {{ $product->validity_type }}
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Amendments provided through</strong></td>
                                    <td class="text-left">
                                        @foreach($videosArray as $video)
                                        {{$video['name']}} <br />
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Doubts Resolution</strong></td>
                                    <td class="text-left">
                                        @foreach($product['productDoubtResolution'] as $mode)
                                        {{$mode['resolution_mode']}} <br />
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Requirement of Internet</strong></td>
                                    <td class="text-left">{{ ucwords($product['internet_needed']) }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Videos Can be Played on </strong></td>
                                    <td class="text-left">
                                        @foreach($product['videoDevice'] as $device)
                                        {{ strtoupper($device['device_name']) }} <br />
                                        @endforeach
                                    </td>
                                </tr>

                                <tr>
                                    <td><strong>Anti Virus Removal </strong></td>
                                    <td class="text-left">
                                        Anti Virus Software, if installed in the system of student, may required to be removed for proper functioning of Video Lectures. 
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Number of Compatible Devices</strong></td>
                                    <td class="text-left">
                                        Videos can be played only in 1 device per purchase. The device should not be changed. Once videos are installed in one device, they can not be played on any other device without additional purchase of the fresh license at same rates.
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong> Device Change </strong></td>
                                    <td class="text-left">
                                        Video lectures get bind to one device in which they are first installed. Device change may or may not be permitted at the sole discretion of TopLad. In case, TopLad permits the device change, he will have to pay a device change fee which shall be 25% of the original price paid for the video purchase
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 com_bdivs" id="cvdiv">
                <div class="prod-desc-box">
                    <h2 class="prod-h1">Content Of Videos By {{ ucwords($product['user']['name']) }}</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>S.No</strong></td>
                                        <td><strong>Topic Name</strong></td>
                                        <td><strong>No. of Video</strong></td>
                                        <td><strong>Video Hours Approx</strong></td>
                                    </tr>

                                    @php
                                    $totaltime=0;
                                    $totalvideos=0;
                                    $flag=0;
                                    @endphp
                                    @foreach($product['video'] as $key => $video)
                                    @php
                                    $flag++;
                                    $hrs = "";
                                    $mins = "";
                                    $totaltime=$totaltime + $video['time'];
                                    $totalvideos=$totalvideos + $video['no_of_videos'];
                                    $time = $video['time'];
                                    $hours = floor($time / 60);
                                    $minutes = $time - ($hours * 60);

                                    if($hours > 1) {
                                    $hrs = $hours." Hours";
                                    }
                                    else if($hours == 1)
                                    {
                                    $hrs = $hours." Hour";
                                    }

                                    if($minutes > 1) {
                                    $mins = $minutes." Mins";
                                    }
                                    else if($minutes == 1){
                                    $mins = $minutes." Min";
                                    }
                                    @endphp
                                    <tr>
                                        <td class="text-left">{{ $key+1 }}</td>
                                        <td class="text-left">{{$video['name']}}</td>
                                        <td class="text-left">{{$video['no_of_videos']}}</td>
                                        <td class="text-left">@php echo $hrs." ".$mins; @endphp</td>
                                    </tr>
                                    @endforeach
                                    @php
                                    $totalhours="";
                                    $totalminutes="";
                                    $thrs = "";
                                    $tmins = "";
                                    $totalhours = floor($totaltime / 60);
                                    $totalminutes = $totaltime - ($totalhours * 60);

                                    if($totalhours > 1) {
                                    $thrs = $totalhours." Hours";
                                    }
                                    else if($totalhours == 1)
                                    {
                                    $thrs = $totalhours." Hour";
                                    }

                                    if($totalminutes > 1) {
                                    $tmins = $totalminutes." Mins";
                                    }
                                    else if($totalminutes == 1){
                                    $tmins = $totalminutes." Min";
                                    }
                                    @endphp
                                    @if($flag!==1 )
                                    <tr>
                                        <td></td>
                                        <td><b>Total</b></td>
                                        <td><b>@php echo $totalvideos; @endphp</b></td>
                                        <td><b>@php echo $thrs." ".$tmins; @endphp</b></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
<!-- <div class="modal fade" id="add_items_now" tabindex="-1" role="dialog" aria-labelledby="addTOCART" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Please choose Video Provided Through, Book Provided Through and Attempt.</p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary f-size" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->

                                </div>
@endsection

@push('scripts')
<script>
const arrProduct = <?php echo json_encode($product); ?>;
//console.log('arrProduct ', arrProduct);
let arrPrice = arrProduct['product_price'];
let arrLanguage = arrProduct['video_language'];
var min = arrPrice[0]['proposed_market_price'];
var max = arrPrice[0]['proposed_market_price'];

$.each(arrPrice, function(key, item) {
    var v = item.proposed_market_price;
    min = min > v ? v : min;
    max = max > v ? max : v;
});

$(document).ready(function() {
    if ($('#video_type').val() && $('#book_type').val() && $('#language_type').val() && $('#attempt_type').val()) {
        const attemptType = $('#attempt_type').val();
        const videoType = $('#video_type').val();
        const bookType = $('#book_type').val();
        const languageType = $('#language_type').val();
        let arrPrice = arrProduct['product_price'].find(function(v) {
            return (v.attempt_id == attemptType && v.video_delivery_type_id == videoType && v
                .book_delivery_type_id == bookType);
        });
        let arrLanguage = arrProduct['video_language'].find(function(v) {
            return (v.language_id == languageType);
        });
        
        if (arrPrice && arrLanguage) {
            $('.price-box').html(`<h3>
									<span>₹ ${ Math.round(arrPrice['proposed_market_price']) }</span>
                                </h3>`);
            $('#price_value').val(Math.round(arrPrice['proposed_market_price']));
            $('#video_type_value').val(videoType);
            $('#book_type_value').val(bookType);
            $('#attempt_type_value').val(attemptType);
            $('#language_type_value').val(languageType);
            $('#add-div').removeClass('disabled_cart');
            $('.btn-cart').tooltip('disable');
        } else {
            $('.price-box').html(`<h3>
								    <span>₹ ${ null }</span>
                                </h3>`);
            $('#price_value').val('null');
            $('#add-div').addClass('disabled_cart');
            $('.btn-cart').tooltip('disable');
        }
    } else {
        $('.price-box').html(`<h3>
								<span>₹ ${ Math.round(min) } - ₹ ${ Math.round(max) }</span>
                            </h3>`);
        $('#price_value').val(Math.round(min) + ' - ' + Math.round(max));
        $('#add-div').addClass('disabled_cart');
        $('.btn-cart').tooltip({
            title: "Please choose Video Provided Through, Book Provided Through, Video Language and Attempt."
        });
    }

    $('#details_form').on('submit', function(event) {
        var id = $('#product_id').val();
        var video = $('#video_type_value').val();
        var book = $('#book_type_value').val();
        var attempt = $('#attempt_type_value').val();
        var language = $('#language_type_value').val();

        if (id == '' || video == '' || book == '' || attempt == '' || language == '') {
            event.preventDefault();
            alert("Please choose Video Provided Through, Book Provided Through, Video Language and Attempt.");
        }
    });
});

$('.change-price').on('change', function() {
    const videoType = $('#video_type').val();
    const bookType = $('#book_type').val();
    const attemptType = $('#attempt_type').val();
    const languageType = $('#language_type').val();

    if (videoType && bookType && attemptType && languageType) {
        let arrPrice = arrProduct['product_price'].find(function(v) {
            return (v.attempt_id == attemptType && v.video_delivery_type_id == videoType && v
                .book_delivery_type_id == bookType);
        });
        let arrLanguage = arrProduct['video_language'].find(function(v) {
            return (v.language_id == languageType);
        });
        if (arrPrice && arrLanguage) {
            $('.price-box').html(`<h3>
									<span>₹ ${ Math.round(arrPrice['proposed_market_price']) }</span>
                                </h3>`);
            $('#price_value').val(Math.round(arrPrice['proposed_market_price']));
            $('#add-div').removeClass('disabled_cart');
            $('.btn-cart').tooltip('disable');
        } else {
            $('.price-box').html(`<h3>
								    <span>₹ ${ null }</span>
                                </h3>`);
            $('#price_value').val('null');
            $('#add-div').addClass('disabled_cart');
            $('.btn-cart').tooltip('disable');
        }
    } else {
        $('.price-box').html(`<h3>
								<span>₹ ${ Math.round(min) } - ₹ ${ Math.round(max) }</span>
                            </h3>`);
        $('#price_value').val(Math.round(min) + ' - ' + Math.round(max));
        $('#add-div').addClass('disabled_cart');
        $('.btn-cart').tooltip({
            title: "Please choose Video Provided Through, Book Provided Through, Video Language and Attempt."
        });
    }
});

$("#video_type").change(function() {
    var video = $('#video_type').val();
    $('#video_type_value').val(video);
});

$("#book_type").change(function() {
    var book = $('#book_type').val();
    $('#book_type_value').val(book);
});

$("#attempt_type").change(function() {
    var attempt = $('#attempt_type').val();
    $('#attempt_type_value').val(attempt);
});

$("#language_type").change(function() {
    var language = $('#language_type').val();
    $('#language_type_value').val(language);
});
</script>

@endpush