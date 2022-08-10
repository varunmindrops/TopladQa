@extends('layouts.layout')

@prepend('head-data')
<title>Feedback Form</title>
<meta name="description"
    content="Learn from India's top CMA faculty at Toplad. We are dedicated to making it possible for anyone, anywhere, at any time to study CMA. Join Us Now.">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endprepend

@section('content')

<!-- <div class="container brd-cumb mobile_pdt_only">
    <div class="row no-gutters slider-text  align-items-end justify-content-center">
        <div class="col-md-12 ftco-animate pt-4 text-left">
            <p class="breadcrumbs mb-0">
                <span class="mr-2">
                    <a title="Home" href="/">Home <i class="ion-ios-arrow-forward"></i></a>
                </span>
                <span class="mr-2">
                    <a title="Feedback Form" class="active-breadcumb">Feedback Form</a>
                </span>
            </p>
        </div>
    </div>
</div> -->
<div class="inner_theme_page p-b40">
    <nav aria-label="breadcrumb" class="bdcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li title="Feedback Form" class="breadcrumb-item active" aria-current="page">Feedback Form</li>
            </ol>
        </div>
    </nav>
    <div class="wrap_theme_pages">
        <section class="feedback-form">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 heading-section full_width_flex">
                        <h1 class="inner_theme_title">Feedback Form</h1>
                        <form class="feed_form" id="feed_form" autocomplete="off">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Name <span class="asterisk"></span></label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                        placeholder="Your Name">
                                    <span class="text-danger" id="name-error"></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Mobile Number <span class="asterisk"></span></label>
                                    <input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}"
                                        placeholder="Mobile Number">
                                    <span class="text-danger" id="mobile-error"></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Email <span class="asterisk"></span></label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                        placeholder="Email Id">
                                    <span class="text-danger" id="email-error"></span>
                                </div>
                            </div>

                            <div class="wrap_que_feed">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <h4>How was your overall experience with Toplad <span
                                                class="asterisk"></span>
                                        </h4>
                                        <div class="multi_fradio">
                                            <div class="radio_wraap">
                                                <label for="q1_1">Awesome</label>
                                                <input type="radio" id="q1_1" class="form-check-input" name="que1"
                                                    value="Awesome1" {{ old('que1') == "Awesome1" ? 'checked' : '' }}
                                                    checked>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q1_2">Satisfactory</label>
                                                <input type="radio" id="q1_2" class="form-check-input" name="que1"
                                                    value="Satisfactory1"
                                                    {{ old('que1') == "Satisfactory1" ? 'checked' : '' }}>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q1_3">Average</label>
                                                <input type="radio" id="q1_3" class="form-check-input" name="que1"
                                                    value="Average1" {{ old('que1') == "Average1" ? 'checked' : '' }}>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q1_4">Below Average</label>
                                                <input type="radio" id="q1_4" class="form-check-input" name="que1"
                                                    value="Below_Average1"
                                                    {{ old('que1') == "Below_Average1" ? 'checked' : '' }}>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q1_5">Not Satisfactory</label>
                                                <input type="radio" id="q1_5" class="form-check-input" name="que1"
                                                    value="Not_Satisfactory1"
                                                    {{ old('que1') == "Not_Satisfactory1" ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                        <span class="text-danger" id="que1-error"></span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h4>How would you rate our video lectures <span class="asterisk"></span></h4>
                                        <div class="multi_fradio">
                                            <div class="radio_wraap">
                                                <label for="q2_1">Awesome</label>
                                                <input type="radio" id="q2_1" class="form-check-input" name="que2"
                                                    value="Awesome2" {{ old('que2') == "Awesome2" ? 'checked' : '' }}
                                                    checked>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q2_2">Satisfactory</label>
                                                <input type="radio" id="q2_2" class="form-check-input" name="que2"
                                                    value="Satisfactory2"
                                                    {{ old('que2') == "Satisfactory2" ? 'checked' : '' }}>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q2_3">Average</label>
                                                <input type="radio" id="q2_3" class="form-check-input" name="que2"
                                                    value="Average2" {{ old('que2') == "Average2" ? 'checked' : '' }}>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q2_4">Below Average</label>
                                                <input type="radio" id="q2_4" class="form-check-input" name="que2"
                                                    value="Below_Average2"
                                                    {{ old('que2') == "Below_Average2" ? 'checked' : '' }}>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q2_5">Not Satisfactory</label>
                                                <input type="radio" id="q2_5" class="form-check-input" name="que2"
                                                    value="Not_Satisfactory2"
                                                    {{ old('que2') == "Not_Satisfactory2" ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                        <span class="text-danger" id="que2-error"></span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h4>How would you rate our books and study material <span
                                                class="asterisk"></span></h4>
                                        <div class="multi_fradio">
                                            <div class="radio_wraap">
                                                <label for="q3_1">Awesome</label>
                                                <input type="radio" id="q3_1" class="form-check-input" name="que3"
                                                    value="Awesome3" {{ old('que3') == "Awesome3" ? 'checked' : '' }}
                                                    checked>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q3_2">Satisfactory</label>
                                                <input type="radio" id="q3_2" class="form-check-input" name="que3"
                                                    value="Satisfactory3"
                                                    {{ old('que3') == "Satisfactory3" ? 'checked' : '' }}>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q3_3">Average</label>
                                                <input type="radio" id="q3_3" class="form-check-input" name="que3"
                                                    value="Average3" {{ old('que3') == "Average3" ? 'checked' : '' }}>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q3_4">Below Average</label>
                                                <input type="radio" id="q3_4" class="form-check-input" name="que3"
                                                    value="Below_Average3"
                                                    {{ old('que3') == "Below_Average3" ? 'checked' : '' }}>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q3_5">Not Satisfactory</label>
                                                <input type="radio" id="q3_5" class="form-check-input" name="que3"
                                                    value="Not_Satisfactory3"
                                                    {{ old('que3') == "Not_Satisfactory3" ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                        <span class="text-danger" id="que3-error"></span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h4>How would you rate our counsellors in terms of explaining all the
                                            information to you
                                            <span class="asterisk"></span>
                                        </h4>
                                        <div class="multi_fradio">
                                            <div class="radio_wraap">
                                                <label for="q4_1">Awesome</label>
                                                <input type="radio" id="q4_1" class="form-check-input" name="que4"
                                                    value="Awesome4" {{ old('que4') == "Awesome4" ? 'checked' : '' }}
                                                    checked>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q4_2">Satisfactory</label>
                                                <input type="radio" id="q4_2" class="form-check-input" name="que4"
                                                    value="Satisfactory4"
                                                    {{ old('que4') == "Satisfactory4" ? 'checked' : '' }}>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q4_3">Average</label>
                                                <input type="radio" id="q4_3" class="form-check-input" name="que4"
                                                    value="Average4" {{ old('que4') == "Average4" ? 'checked' : '' }}>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q4_4">Below Average</label>
                                                <input type="radio" id="q4_4" class="form-check-input" name="que4"
                                                    value="Below_Average4"
                                                    {{ old('que4') == "Below_Average4" ? 'checked' : '' }}>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q4_5">Not Satisfactory</label>
                                                <input type="radio" id="q4_5" class="form-check-input" name="que4"
                                                    value="Not_Satisfactory4"
                                                    {{ old('que4') == "Not_Satisfactory4" ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                        <span class="text-danger" id="que4-error"></span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h4>How would you rate our expert faculty panel <span class="asterisk"></span>
                                        </h4>
                                        <div class="multi_fradio">
                                            <div class="radio_wraap">
                                                <label for="q5_1">Awesome</label>
                                                <input type="radio" id="q5_1" class="form-check-input" name="que5"
                                                    value="Awesome5" {{ old('que5') == "Awesome5" ? 'checked' : '' }}
                                                    checked>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q5_2">Satisfactory</label>
                                                <input type="radio" id="q5_2" class="form-check-input" name="que5"
                                                    value="Satisfactory5"
                                                    {{ old('que5') == "Satisfactory5" ? 'checked' : '' }}>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q5_3">Average</label>
                                                <input type="radio" id="q5_3" class="form-check-input" name="que5"
                                                    value="Average5" {{ old('que5') == "Average5" ? 'checked' : '' }}>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q5_4">Below Average</label>
                                                <input type="radio" id="q5_4" class="form-check-input" name="que5"
                                                    value="Below_Average5"
                                                    {{ old('que5') == "Below_Average5" ? 'checked' : '' }}>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q5_5">Not Satisfactory</label>
                                                <input type="radio" id="q5_5" class="form-check-input" name="que5"
                                                    value="Not_Satisfactory5"
                                                    {{ old('que5') == "Not_Satisfactory5" ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                        <span class="text-danger" id="que5-error"></span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h4>How would you rate our doubt solving mechanism <span
                                                class="asterisk"></span></h4>
                                        <div class="multi_fradio">
                                            <div class="radio_wraap">
                                                <label for="q6_1">Awesome</label>
                                                <input type="radio" id="q6_1" class="form-check-input" name="que6"
                                                    value="Awesome6" {{ old('que6') == "Awesome6" ? 'checked' : '' }}
                                                    checked>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q6_2">Satisfactory</label>
                                                <input type="radio" id="q6_2" class="form-check-input" name="que6"
                                                    value="Satisfactory6"
                                                    {{ old('que6') == "Satisfactory6" ? 'checked' : '' }}>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q6_3">Average</label>
                                                <input type="radio" id="q6_3" class="form-check-input" name="que6"
                                                    value="Average6" {{ old('que6') == "Average6" ? 'checked' : '' }}>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q6_4">Below Average</label>
                                                <input type="radio" id="q6_4" class="form-check-input" name="que6"
                                                    value="Below_Average6"
                                                    {{ old('que6') == "Below_Average6" ? 'checked' : '' }}>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q6_5">Not Satisfactory</label>
                                                <input type="radio" id="q6_5" class="form-check-input" name="que6"
                                                    value="Not_Satisfactory6"
                                                    {{ old('que6') == "Not_Satisfactory6" ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                        <span class="text-danger" id="que6-error"></span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h4>How would you rate our after sales service <span class="asterisk"></span>
                                        </h4>
                                        <div class="multi_fradio">
                                            <div class="radio_wraap">
                                                <label for="q7_1" for="">Awesome</label>
                                                <input type="radio" id="q7_1" class="form-check-input" name="que7"
                                                    value="Awesome7" {{ old('que7') == "Awesome7" ? 'checked' : '' }}
                                                    checked>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q7_2">Satisfactory</label>
                                                <input type="radio" id="q7_2" class="form-check-input" name="que7"
                                                    value="Satisfactory7"
                                                    {{ old('que7') == "Satisfactory7" ? 'checked' : '' }}>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q7_3">Average</label>
                                                <input type="radio" id="q7_3" class="form-check-input" name="que7"
                                                    value="Average7" {{ old('que7') == "Average7" ? 'checked' : '' }}>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q7_4">Below Average</label>
                                                <input type="radio" id="q7_4" class="form-check-input" name="que7"
                                                    value="Below_Average7"
                                                    {{ old('que7') == "Below_Average7" ? 'checked' : '' }}>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q7_5">Not Satisfactory</label>
                                                <input type="radio" id="q7_5" class="form-check-input" name="que7"
                                                    value="Not_Satisfactory7"
                                                    {{ old('que7') == "Not_Satisfactory7" ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                        <span class="text-danger" id="que7-error"></span>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <h4>Your Overall Experience <span class="asterisk"></span></h4>
                                        <div class="multi_fradio">
                                            <div class="radio_wraap">
                                                <label for="q8_1" for="">Awesome</label>
                                                <input type="radio" id="q8_1" class="form-check-input" name="que8"
                                                    value="Awesome8" {{ old('que8') == "Awesome8" ? 'checked' : '' }}
                                                    checked>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q8_2">Satisfactory</label>
                                                <input type="radio" id="q8_2" class="form-check-input" name="que8"
                                                    value="Satisfactory8"
                                                    {{ old('que8') == "Satisfactory8" ? 'checked' : '' }}>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q8_3">Average</label>
                                                <input type="radio" id="q8_3" class="form-check-input" name="que8"
                                                    value="Average8" {{ old('que8') == "Average8" ? 'checked' : '' }}>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q8_4">Below Average</label>
                                                <input type="radio" id="q8_4" class="form-check-input" name="que8"
                                                    value="Below_Average8"
                                                    {{ old('que8') == "Below_Average8" ? 'checked' : '' }}>
                                            </div>
                                            <div class="radio_wraap">
                                                <label for="q8_5">Not Satisfactory</label>
                                                <input type="radio" id="q8_5" class="form-check-input" name="que8"
                                                    value="Not_Satisfactory8"
                                                    {{ old('que7') == "Not_Satisfactory7" ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                        <span class="text-danger" id="que8-error"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="bottom_feed">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Kindly describe your overall experience in the space below: <span
                                                class="asterisk"></span></label>
                                        <textarea class="form-control" name="que9" rows="4"
                                            placeholder="Describe your overall experience">{{ old('que9') }}</textarea>
                                        <span class="text-danger" id="que9-error"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="bottom_feed">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <input type="submit" value="Submit" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </form>
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#feed_form').on('submit', function(event) {
        event.preventDefault();
        $('#name-error').text('');
        $('#mobile-error').text('');
        $('#email-error').text('');
        $('#que1-error').text('');
        $('#que2-error').text('');
        $('#que3-error').text('');
        $('#que4-error').text('');
        $('#que5-error').text('');
        $('#que6-error').text('');
        $('#que7-error').text('');
        $('#que8-error').text('');
        $('#que9-error').text('');

        var name = $("input[name='name']").val();
        var mobile = $("input[name='mobile']").val();
        var email = $("input[name='email']").val();

        var val1 = $("input[name='que1']:checked").val();
        var res1 = val1.replace('_', ' ').replace('1', '');

        var val2 = $("input[name='que2']:checked").val();
        var res2 = val2.replace('_', ' ').replace('2', '');

        var val3 = $("input[name='que3']:checked").val();
        var res3 = val3.replace('_', ' ').replace('3', '');

        var val4 = $("input[name='que4']:checked").val();
        var res4 = val4.replace('_', ' ').replace('4', '');

        var val5 = $("input[name='que5']:checked").val();
        var res5 = val5.replace('_', ' ').replace('5', '');

        var val6 = $("input[name='que6']:checked").val();
        var res6 = val6.replace('_', ' ').replace('6', '');

        var val7 = $("input[name='que7']:checked").val();
        var res7 = val7.replace('_', ' ').replace('7', '');

        var val8 = $("input[name='que8']:checked").val();
        var res8 = val8.replace('_', ' ').replace('8', '');

        var val9 = $("textarea[name='que9']").val();

        $.ajax({
            type: "POST",
            url: "/feedback-form",
            data: {
                "name": name,
                "mobile": mobile,
                "email": email,
                "que1": res1,
                "que2": res2,
                "que3": res3,
                "que4": res4,
                "que5": res5,
                "que6": res6,
                "que7": res7,
                "que8": res8,
                "que9": val9
            },
            success: function(response) {
                if (response) {
                    alert(response.success);
                    // $("#feed_form")[0].reset();
                    location.reload();
                }
            },
            error: function(response) {
                console.log('Error:', response);
                $('#name-error').text(response.responseJSON.errors.name);
                $('#mobile-error').text(response.responseJSON.errors.mobile);
                $('#email-error').text(response.responseJSON.errors.email);
                $('#que1-error').text(response.responseJSON.errors.que1);
                $('#que2-error').text(response.responseJSON.errors.que2);
                $('#que3-error').text(response.responseJSON.errors.que3);
                $('#que4-error').text(response.responseJSON.errors.que4);
                $('#que5-error').text(response.responseJSON.errors.que5);
                $('#que6-error').text(response.responseJSON.errors.que6);
                $('#que7-error').text(response.responseJSON.errors.que7);
                $('#que8-error').text(response.responseJSON.errors.que8);
                $('#que9-error').text(response.responseJSON.errors.que9);
            }
        });
    });
});
</script>
@endpush