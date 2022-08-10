let arrAttempt = [];
let arrDeliveryType = [];
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const teacher_id = urlParams.get('user_id');
    
$(document).ready(function () {
    $('#step_1').show();
    $('#step_2').hide();
    $('#step_3').hide();
    $('#step_4').hide();

    $('.errorDiv').hide();

    $("#prevBtn").css('visibility', 'hidden');

    getDeliveryType();
    getLanguage();
    getTeacherCourse();
    // getTeacherSubject();

    
    /*   
     function fillVideoLanguage(i) {
     let strVideoOptions = ``;
     $.each(arrLanguage, function(key, item) {
     strVideoOptions += `<div class="form-check form-check-inline">
     <input class="form-check-input chk checkError video_lang validate_video_lang" name="video_language[${i}][]" type="checkbox" id="inlineCheckbox${(key+1)}_${i}" value="${item.id}">
     <label class="form-check-label" for="inlineCheckbox${(key+1)}_${i}">${item.name}</label>
     </div>`;
     });
     return (`<div class="form-group req">
     <label class="d-block fg-l">Language </label>
     ${strVideoOptions}
     <div class="errorDiv"> This is required </div>
     </div>`);
     }
     */

    //------------- Populate teacher course
    let arrTeacherCourse = [];

    function getTeacherCourse() {
        ajaxGet(populateTeacherCourse, 'getTeacherCourse/' + teacher_id);
    }

    function populateTeacherCourse(result) {
        if (result.code == 200) {
            window.arrTeacherCourse = result.data;

            let strOption = `<option value="">Select Course</option>`;
            $.each(result.data, function (key, item) {
                strOption += `<option value="${item.course_id}">${item.course_name}</option>`;
            });

            let strCourse = `${strOption}`;
            $('#course').html(strCourse);

        } else {
            alert('Something went wrong !!');
        }
    }

    // --------- End teacher course

    $('#course').on('change', function () {
        getTeacherSubject();
        getAttempt();
    });

    function getDeliveryType() {
        ajaxSyncGet(handleDeliveryTypeData, 'getDeliveryType');
    }

    function handleDeliveryTypeData(result) {
        arrDeliveryType = result.data;
        populateProductDeliveryDetails();
    }

    $(document).on('click', '.not_price_selected', function () {
        if ($(this).is(':checked')) {
            $(this).closest('.product_price_row').find('input[type="text"], input[type="hidden"]').prop('disabled', true);
            $(this).closest('.product_price_row').find('input[type="text"]').val('');
            $(this).closest('.product_price_row').find('.errorDiv').hide();
        } else {
            $(this).closest('.product_price_row').find('input[type="text"], input[type="hidden"]').prop('disabled', false);
        }

    });

    //------------- Populate teacher subject
    let arrTeacherSubject = [];

    function getTeacherSubject() {
        const course_id= $('#course').val();
        ajaxGet(populateTeacherSubject, 'getTeacherSubject/' + teacher_id + '/' + course_id);
    }

    function populateTeacherSubject(result) {
        if (result.code == 200) {
            window.arrTeacherSubject = result.data;

            let strOption = ``;
            $.each(result.data, function (key, item) {
                strOption += `<option value="${item.sub_id}">${item.subject_name}</option>`;
            });

            let strSubject = `
                        <div class="form-group req">
                            <label>Select Subject </label>
                            <select class="form-control cu-select chk checkError validateTeacherSubject" name="video_subject[0]" id="video_subject_0">
                                <option value="">Select Subject</option>
                                ${strOption}
                            </select>
                            <div class="errorDiv"> This is required </div>
                        </div>`;
            $('#subject').html(strSubject);

        } else {
            alert('Something went wrong !!');
        }
    }

    // --------- End teacher subject

    $(document).on('change', '.change_video_view', function () {
        if ($(this).val() == 'limited') {
            $(this).closest('.row').find('.views_option').show();
        } else {
            $(this).closest('.row').find('.views_option').hide();
        }
    });

    $(document).on('change', '.change_video_validity', function () {
        if ($(this).val() == 'days') {
            $(this).closest('.row').find('.validity_option').show();
            $(this).closest('.row').find('.validity_option label').html('Number of Days <small class="text-danger"></small>');
            $(this).closest('.row').find('.validity_option input').attr('placeholder', 'Number of Days');
        } else {
            $(this).closest('.row').find('.validity_option').show();
            $(this).closest('.row').find('.validity_option label').html('Number of Months <small class="text-danger"></small>');
            $(this).closest('.row').find('.validity_option input').attr('placeholder', 'Number of Months');

        }
    });

});

    // Get attempt

    function getAttempt() {
        const course_id= $('#course').val();
        ajaxSyncGet(handleAttemptData, 'getAttempt/' + course_id );
    }
    function handleAttemptData(result) {
        arrAttempt = result.data;
        populateProductDeliveryDetails();
    }
    

function populateProductDeliveryDetails() {
    
    let strHtml = ``;
    let arrBooks = arrDeliveryType.filter((e) => {
        return e.content_type == 'book'
    });
    let arrVideo = arrDeliveryType.filter((e) => {
        return e.content_type == 'video'
    });
    
    $.each(arrAttempt, function (key1, item1) {
        $.each(arrVideo, function (key2, item2) {
            $.each(arrBooks, function (key3, item3) {
                
                strHtml += `<tr class="product_price_row">
                                <td>
                                    ${item1.name}
                                    <input type="hidden" name="attempt_id[]" id="attempt_id" value="${item1.id}">
                                </td>
                                <td>
                                    ${item2.name}
                                    <input type="hidden" name="video_type_id[]" id="video_type_id" value="${item2.id}">
                                </td>
                                <td>
                                    ${item3.name}
                                    <input type="hidden" name="book_type_id[]" id="book_type_id" value="${item3.id}">
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control checkError minimum_price" id="min_product_price_${key1}${key2}${key3}" name="minimum_market_price[]" placeholder="Minimum Market Price">
                                        <div class="errorDiv"> This is required </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control checkError proposed_price" id="proposed_product_price_${key1}${key2}${key3}" name="proposed_market_price[]" placeholder="Proposed Market Price">
                                        <div class="errorDiv"> This is required </div>
                                    </div>
                                </td>
                                <td>
                                    <input type="checkbox" class="not_price_selected">
                                </td>
                            </tr>`;
            });
        });
    });
    $('#product_delivery_detail_table').html(strHtml);
}

function registerProduct(result) {
    console.log(result);
    if (result.code == 200) {
        $("#productRegistrationForm :input").val('');
        $('#productRegistrationForm input[type="select"]').val('');
        $('#productRegistrationForm input[type="checkbox"]').prop('checked', false);
        $('#productRegistrationForm input[type="radio"]').prop('checked', false);

        arrPrevious = [];
        arrNext = [];

        location.href = "thank_you.php";
    } else {
        alert('Something went wrong');
    }
}

//------------------Managing steps------------------

let arrPrevious = [];
let arrNext = ['step_1', 'step_2', 'step_3', 'step_4'];

function next() {

    let isValid = true;
    if (arrNext.length > 1) {
        isValid = validateStep();

        if (isValid) {
            
            const currStepNum = arrNext[1];
            const nextStepNum = arrNext[2];

            const deletedElem = arrNext.splice(0, 1);
            arrPrevious.push(deletedElem[0]);

            const prevStepNum = arrPrevious[arrPrevious.length - 1];

//            console.log('inside next 1 ', arrPrevious, arrNext);
//            console.log(prevStepNum, currStepNum, nextStepNum);

            $(`#${prevStepNum}`).hide();
            $(`#${currStepNum}`).fadeIn();

            if (arrNext.length == 1) {
                $('#nextBtn').text('Submit');
                $('.errorDiv').hide();
            }

            current = currStepNum;   //
            changeNextArr = 0;       //

            $("#prevBtn").css('visibility', 'visible');
        } else {
//            alert('Please enter valid fields');
        }
    } else if (arrNext.length == 1) {
        const nextStepNum = arrNext[2];  //
        const currStepNum = arrNext[0];  //

        if (arrPrevious.length >= 1) {
            $("#prevBtn").css('visibility', 'visible');
        }

        isValid = validateStep();   //
        if (isValid) {
            let formData = new FormData($('#productRegistrationForm')[0]);
//            ajaxFormData(registerProduct, 'registerProduct', formData);
            if(teacher_id) {
                ajaxFormData(registerProduct, 'registerProduct', formData);
            } else if(product_id) {
                ajaxFormData(registerProduct, 'updateProduct', formData);
            } else {
                alert('Something went wrong!');
            }
        }
    } else {
        $("#prevBtn").css('visibility', 'hidden');
    }

}

function prev() {
    const currStepNum = arrPrevious[arrPrevious.length - 1];
    const nextStepNum = arrNext[0];
    const prevStepNum = arrPrevious[arrPrevious.length - 2];

    $(`#${currStepNum}`).fadeIn();
    $(`#${prevStepNum}`).hide();
    $(`#${nextStepNum}`).hide();

    const deletedElem = arrPrevious.pop();
    arrNext.unshift(deletedElem);

    console.log(arrPrevious, arrNext);

    if (arrPrevious.length > 1) {
        $('#nextBtn').text('Continue');
        $("#prevBtn").css('visibility', 'visible');
    } else if (arrPrevious.length == 1) {
        $('#nextBtn').text('Continue');
//        $("#prevBtn").css('visibility', 'hidden');
    } else {
        $("#prevBtn").css('visibility', 'hidden');
    }

}

// Validations

function validateStep() {
    $('.errorDiv').hide();
    $('.errorDiv').html('This is required');

    let shouldReturnFalse = 0;
    let current = arrNext[0];

    if (current == 'step_1') {
        var reg4 = /^([1-9]\d*)?$/;
        let regUrl = /(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g;

        $('.validateTeacherCourse').each(function (index, value) {
            if (!$(this).val()) {
                $(this).closest('.form-group').find('.errorDiv').show();
                shouldReturnFalse = 1;
            }
        });

        $('.validateTeacherSubject').each(function (index, value) {
            if (!$(this).val()) {
                $(this).closest('.form-group').find('.errorDiv').show();
                shouldReturnFalse = 1;
            }
        });

        if (!$('input[name="doubt_resolution[]"]:checked').length > 0) {
            $('#doubt_resolution_check1').closest('.form-group').find('.errorDiv').show();
            shouldReturnFalse = 1;
        }

        if (!$('input[name="product_language[]"]:checked').length > 0) {
            $('input[name="product_language[]"]').closest('.form-group').find('.errorDiv').show();
            shouldReturnFalse = 1;
        }

        if (!$('input[name="fast_forward"]:checked').length > 0) {
            $('input[name="fast_forward"]').closest('.form-group').find('.errorDiv').show();
            shouldReturnFalse = 1;
        }

        if (!$('input[name="video_device[]"]:checked').length > 0) {
            $('input[name="video_device[]"]').closest('.form-group').find('.errorDiv').show();
            shouldReturnFalse = 1;
        }

        if (!$('input[name="internet_needed"]:checked').length > 0) {
            $('#internet_needed1').closest('.form-group').find('.errorDiv').show();
            shouldReturnFalse = 1;
        }

        if (!$('input[name="validity_type"]:checked').length > 0) {
            $('input[name="validity_type"]').closest('.form-group').find('.errorDiv').show();
            shouldReturnFalse = 1;
        } else if ($('input[name="validity_type"]:checked').val() == 'days') {

            if (!$('input[name="validity_type"]').closest('.row').find('.validate_validity').val()) {
                $('input[name="validity_type"]').closest('.row').find('.validity_option .errorDiv').show();
                shouldReturnFalse = 1;
            } else if (!reg4.test($('input[name="validity_type"]').closest('.row').find('.validate_validity').val())) {
                $('input[name="validity_type"]').closest('.row').find('.validity_option .errorDiv').html('Invalid Number').show();
                shouldReturnFalse = 1;
            }
        } else if ($('input[name="validity_type"]:checked').val() == 'months') {
            if (!$('input[name="validity_type"]').closest('.row').find('.validate_validity').val()) {
                $('input[name="validity_type"]').closest('.row').find('.validity_option .errorDiv').show();
                shouldReturnFalse = 1;
            } else if (!reg4.test($('input[name="validity_type"]').closest('.row').find('.validate_validity').val())) {
                $('input[name="validity_type"]').closest('.row').find('.validity_option .errorDiv').html('Invalid Number').show();
                shouldReturnFalse = 1;
            }
        }

        if (!$('input[name="video_views"]:checked').length > 0) {
            $('input[name="video_views"]').closest('.form-group').find('.errorDiv').show();
            shouldReturnFalse = 1;
        } else if ($('input[name="video_views"]:checked').val() == 'limited') {
            if (!$('input[name="video_views"]').closest('.row').find('.validate_views').val()) {
                $('input[name="video_views"]').closest('.row').find('.views_option .errorDiv').show();
                shouldReturnFalse = 1;
            } else if (!reg4.test($('input[name="video_views"]').closest('.row').find('.validate_views').val())) {
                $('input[name="video_views"]').closest('.row').find('.views_option .errorDiv').html('Invalid Number').show();
                shouldReturnFalse = 1;
            }
        }

        $('.validateDummyVideo2').each(function (index, value) {
            if (!$('.validateDummyVideo').val()) {
                $('.validateDummyVideo').closest('.form-group').find('.errorDiv').show();
                shouldReturnFalse = 1;
            }
            if (!$(this).val()) {
                $(this).closest('.form-group').find('.errorDiv').show();
                shouldReturnFalse = 1;
            }
        });

        $('.validateDummyVideoUrl').each(function (index, value) {
            if ($(this).val()) {
                let res = $(this).val().match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);

                if (res == null) {
                    $(this).closest('.form-group').find('.errorDiv').html('Invalid Url').show();
                    shouldReturnFalse = 1;
                }
            }
        });

        if (shouldReturnFalse) {
            $(window).scrollTop(0);
            return false;
        } else {
            return true;
        }
    } else if (current == 'step_2') {

        var reg1 = /^(?:0|[1-9]\d*)(?:\.(?!.*000)\d+)?$/;
        var reg2 = /^([a-zA-Z0-9\-\)\(]+\s)*[a-zA-Z0-9\-\)\(]+$/;
        var reg3 = /^[a-zA-Z0-9,.!?\-\)\(]*$/;
        var reg4 = /^([1-9]\d*)?$/;

        $('.validate_video_name').each(function (index, value) {
            if (!$(this).val()) {
                $(this).closest('.form-group').find('.errorDiv').show();
                shouldReturnFalse = 1;
            } else if (!reg2.test($(this).val())) {
                $(this).closest('.form-group').find('.errorDiv').html('Only use )(- and single space with each word.').show();
                shouldReturnFalse = 1;
            }
        });

        $('.validate_video_number').each(function (index, value) {
            if (!$(this).val()) {
                $(this).closest('.form-group').find('.errorDiv').show();
                shouldReturnFalse = 1;
            } else if (!reg4.test($(this).val())) {
                $(this).closest('.form-group').find('.errorDiv').html('Invalid Number').show();
                shouldReturnFalse = 1;
            }
        });

        $('.validate_video_hours').each(function (index, value) {
            if (!$(this).val()) {
                $(this).closest('.form-group').find('.errorDiv').show();
                shouldReturnFalse = 1;
            } else if (!reg1.test($(this).val())) {
                $(this).closest('.form-group').find('.errorDiv').html('Invalid Time').show();
                shouldReturnFalse = 1;
            }
        });

        if (shouldReturnFalse) {
            $(window).scrollTop(0);
            return false;
        } else {
            return true;
        }

    } else if (current == 'step_3') {

        var reg1 = /^[a-zA-Z0-9,.!?\-\)\(]*$/;
        var reg2 = /^([a-zA-Z0-9\-\)\(]+\s)*[a-zA-Z0-9\-\)\(]+$/;

        $('.validate_book_name').each(function (index, value) {
            if (!$(this).val()) {
                $(this).closest('.form-group').find('.errorDiv').show();
                shouldReturnFalse = 1;
            } else if (!reg2.test($(this).val())) {
                $(this).closest('.form-group').find('.errorDiv').html('Only use )(- and single space with each word.').show();
                shouldReturnFalse = 1;
            }
        });

        let no_of_series = $('.no_of_book_series');
        console.log('no series ', no_of_series);

        for (let i = 0; i < (no_of_series.length); i++) {
            const id_no = $(no_of_series[i]).data('id_no');

            if (!$('input[name="book_language[' + id_no + '][]"]:checked').length > 0) {
                $('input[name="book_language[' + id_no + '][]"]').closest('.form-group').find('.errorDiv').show();
                shouldReturnFalse = 1;
            }

        }

        for (let i = 0; i < (no_of_series.length); i++) {
            const id_no = $(no_of_series[i]).data('id_no');

            if (!$('input[name="book_type[' + id_no + '][]"]:checked').length > 0) {
                $('input[name="book_type[' + id_no + '][]"]').closest('.form-group').find('.errorDiv').show();
                shouldReturnFalse = 1;
            }

        }

        if (shouldReturnFalse) {
            $(window).scrollTop(0);
            return false;
        } else {
            return true;
        }

    } else if (current == 'step_4') {

        var reg1 = /^(?:0|[1-9]\d*)(?:\.(?!.*000)\d+)?$/;

        $('.minimum_price').each(function (index, value) {
            if (!$(this).is(':disabled')) {
                if (!$(this).val()) {
                    $(this).closest('.form-group').find('.errorDiv').html('Please enter price or check N/A').show();
                    shouldReturnFalse = 1;
                } else if (!reg1.test($(this).val())) {
                    $(this).closest('.form-group').find('.errorDiv').html('Invalid price').show();
                    shouldReturnFalse = 1;
                }
            }

        });

        $('.proposed_price').each(function (index, value) {
            if (!$(this).is(':disabled')) {
                if (!$(this).val()) {
                    $(this).closest('.form-group').find('.errorDiv').html('Please enter price or check N/A').show();
                    shouldReturnFalse = 1;
                } else if (!reg1.test($(this).val())) {
                    $(this).closest('.form-group').find('.errorDiv').html('Invalid price').show();
                    shouldReturnFalse = 1;
                }
            }
        });

        if (shouldReturnFalse) {
            $(window).scrollTop(0);
            return false;
        } else {
            return true;
        }
    }
}


let arrLanguage = [];
function getLanguage() {
        ajaxGet(populateLanguage, 'getCourseLanguage');
    }
    function populateLanguage(result) {
        arrLanguage = result.data;
        let strVideoLanguage = ``;
        let strBookLanguage = ``;

        let strVideoOptions = ``;
        let strBookOptions = ``;
        $.each(result.data, function (key, item) {
            strVideoOptions += `<div class="form-check form-check-inline">
                                    <input class="form-check-input chk video_lang validate_video_lang" name="product_language[]" type="checkbox" id="inlineCheckbox${(key + 1)}" value="${item.id}">
                                    <label class="form-check-label" for="inlineCheckbox${(key + 1)}">${item.name}</label>
                                </div>`;
            strBookOptions += `<div class="form-check form-check-inline">
                                    <input class="form-check-input chk check_book_language_0" name="book_language[0][]" type="checkbox" id="book_language${(key + 1)}_0" value="${item.id}">
                                    <label class="form-check-label" for="book_language${(key + 1)}_0">${item.name}</label>
                                </div>`;
        });

        strVideoLanguage += `<div class="form-group req">
                                <label class="d-block fg-l">Language </label>
                                    ${strVideoOptions}
                                <div class="errorDiv"> This is required </div>
                            </div>`;
        strBookLanguage += `<div class="form-group req">
                                <label class="d-block fg-l">Language</label>
                                    ${strBookOptions}
                                <div class="errorDiv"> This is required </div>
                            </div>`;

        $('#populateVideoLanguage').html(strVideoLanguage);
        $('#populateBookLanguage_0').html(strBookLanguage);
        $('.errorDiv').hide();
    }

function fillBookLanguage(i) {
        let strBookOptions = ``;
        $.each(arrLanguage, function (key, item) {
            strBookOptions += `<div class="form-check form-check-inline">
                                    <input class="form-check-input chk" name="book_language[${i}][]" type="checkbox" id="book_language${(key + 1)}_${i}" value="${item.id}">
                                    <label class="form-check-label" for="book_language${(key + 1)}_${i}">${item.name}</label>
                                </div>`;
        });
        return (`<div class="form-group req">
                    <label class="d-block fg-l">Language </label>
                        ${strBookOptions}
                    <div class="errorDiv"> This is required </div>
                </div>`);
    }

//   Append Dummy youtube Videos link
let dummyVideoCount = 1;

function dummyVideoCounter(action) {
    return action == 'increase' ? dummyVideoCount++ : dummyVideoCount--;
}

$(document).on('click', '#addDummyVideoBtn', function () {
    const elem_id = dummyVideoCounter('increase');

    $('#appendDummyVideo').append(appendDummyVideo(elem_id));
    $('.errorDiv').hide();
});

$(document).on('click', '.removeDummyVideo', function () {
    $(this).closest('.appended-dummy-video').remove();
});

function appendDummyVideo(i) {
    return (`<div class="position-relative mb-3 appended-dummy-video">
            <div class="card card-body">
                <div class="w-100">
                    <button type="button" class="btn btn-danger removeDummyVideo"> <i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                    <div class="form-group">
                        <label>Dummy Video<small class="text-danger"></small></label>
                        <input type="text" name="dummy_videos[]" id="dummy_video_${i}" class="form-control checkError validateDummyVideo2 validateDummyVideoUrl" placeholder="Link" >
                        <div class="errorDiv"> This is required  </div>
                    </div>
                </div>
            </div>
        </div>`);
}

function populateDummyVideoUpdate(i, item) {
    return (`<div class="position-relative mb-3 appended-dummy-video">
                <div class="card card-body">
                    <div class="w-100">
                        <button type="button" class="btn btn-danger removeDummyVideo"> <i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                        <div class="form-group">
                            <label>Dummy Video<small class="text-danger"></small></label>
                            <input type="text" name="dummy_videos[]" value="${item.link}" id="dummy_video_${i}" class="form-control checkError validateDummyVideo2 validateDummyVideoUrl" placeholder="Link" >
                            <div class="errorDiv"> This is required  </div>
                        </div>
                    </div>
                </div>
            </div>`);    
}

    //Append videos
    let videoElemCount = 1;

    function videoElemCounter(action) {
        if(product_id) {
           videoElemCount = $('#appendVideoDetails').children('div').length + 1; 
        }
        return action == 'increase' ? videoElemCount++ : videoElemCount--;
    }

    $(document).on('click', '#addNewVideo', function () {
        const elem_id = videoElemCounter('increase');

        $('#appendVideoDetails').append(appendNewVideo(elem_id));
        $('.errorDiv').hide();
    });

    $(document).on('click', '.removeVideo', function () {
        $(this).closest('.card').remove();
    });

    function appendNewVideo(i) {
          return (`<div class="card card-body">
                    <div class="row no_of_video_series" data-id_no="${i}">
                        <button type="button" class="btn btn-danger removeVideo"> <i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                        <div class="col-sm-4">
                            <div class="form-group req">
                                <label>Video/Topic Name </label>
                                <input type="text" name="video_name[${i}]" value="" id="video_name_${i}"  class="form-control checkError validate_video_name" placeholder="Video/Topic Name" >
                                <div class="errorDiv"> This is required </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group req">
                                <label>Number of Videos </label>
                                <input type="number" name="video_number[${i}]" id="video_number_${i}" class="form-control checkError validate_video_number" placeholder="Number of Videos" >
                                <div class="errorDiv"> This is required </div>
                            </div> 
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group req">
                                <label>Total Minutes </label>
                                <input type="number"  name="video_hours[${i}]" id="video_minutes_${i}" class="form-control checkError validate_video_hours" placeholder="Video Minutes" >
                                <div class="errorDiv"> This is required </div>
                            </div> 
                        </div>
                    </div>
                </div>`);
        
    }
    
    function appendPopulatedVideoUpdate(i, item) {
        return (`<div class="card card-body">
                    <div class="row no_of_video_series" data-id_no="${i}">
                        <button type="button" class="btn btn-danger removeVideo"> <i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                        <div class="col-sm-4">
                            <div class="form-group req">
                                <label>Video/Topic Name </label>
                                <input type="text" name="video_name[${i}]" value="${item.name}" id="video_name_${i}"  class="form-control checkError validate_video_name" placeholder="Video/Topic Name" >
                                <div class="errorDiv"> This is required </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group req">
                                <label>Number of Videos </label>
                                <input type="number" name="video_number[${i}]" value="${item.no_of_videos}" id="video_number_${i}" class="form-control checkError validate_video_number" placeholder="Number of Videos" >
                                <div class="errorDiv"> This is required </div>
                            </div> 
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group req">
                                <label>Total Minutes </label>
                                <input type="number"  name="video_hours[${i}]" value="${item.time}" id="video_minutes_${i}" class="form-control checkError validate_video_hours" placeholder="Video Minutes" >
                                <div class="errorDiv"> This is required </div>
                            </div> 
                        </div>
                    </div>
                </div>`);
    }

    //--------------------For Managing Books----------------------

    let bookElemCount = 1;

    function bookElemCounter(action) {
        if(product_id) {
           bookElemCount = $('#appendBook').children('div').length + 1; 
        }
        return action == 'increase' ? bookElemCount++ : bookElemCount--;
    }

    $(document).on('click', '#addNewBook', function () {
        const elem_id = bookElemCounter('increase');

        $('#appendBook').append(appendNewBook(elem_id));
        $('.errorDiv').hide();
    });

    $(document).on('click', '.removeBook', function () {
        $(this).closest('.card').remove();
    });

    function appendNewBook(i) {
        let strHtml = ``;
        
        strHtml += `<div class="card card-body mb-2">
                    <div class="row no_of_book_series" data-id_no="${i}">
                        <button type="button" class="btn btn-danger removeBook"> <i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                        <div class="col-sm-4">
                            <div class="form-group req">
                                <label>Name of Book </label>
                                <input type="text" name="book_name[${i}]" value="" id="book_name_${i}"  class="form-control chk checkError validate_book_name" placeholder="Book Name" >
                                <div class="errorDiv"> This is required </div>
                            </div>
                        </div>
                        <div class="col-sm-4" id="populateBookLanguage_${i}">
                            ${ fillBookLanguage(i) }
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group req" id="book_type_checkbox_${i}">
                                <label class="d-block fg-l">Type </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input chk" type="checkbox" name="book_type[${i}][]" id="book_type1_${i}" value="is_printed">
                                    <label class="form-check-label" for="book_type1_${i}">Printed Book</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input chk" type="checkbox" name="book_type[${i}][]" id="book_type2_${i}" value="is_ebook">
                                    <label class="form-check-label" for="book_type2_${i}">E-Book</label>
                                </div>
                                <div class="errorDiv"> This is required </div>
                            </div>
                        </div>
                    </div>
                </div>`;
    
        return strHtml;
    }
    
    function appendPopulatedBookUpdate(i, item) {
        let strHtml = ``;
        
        strHtml += `<div class="card card-body mb-2">
            <div class="row no_of_book_series" data-id_no="${i}">
                <button type="button" class="btn btn-danger removeBook"> <i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                <div class="col-sm-4">
                    <div class="form-group req">
                        <label>Name of Book </label>
                        <input type="text" name="book_name[${i}]" value="${item.book_name}" id="book_name_${i}"  class="form-control chk checkError validate_book_name" placeholder="Book Name" >
                        <div class="errorDiv"> This is required </div>
                    </div>
                </div>
                <div class="col-sm-4" id="populateBookLanguage_${i}">
                    ${ fillBookLanguage(i) }
                </div>
                <div class="col-sm-4">
                    <div class="form-group req" id="book_type_checkbox_${i}">
                        <label class="d-block fg-l">Type </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input chk" type="checkbox" name="book_type[${i}][]" id="book_type1_${i}" value="is_printed">
                            <label class="form-check-label" for="book_type1_${i}">Printed Book</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input chk" type="checkbox" name="book_type[${i}][]" id="book_type2_${i}" value="is_ebook">
                            <label class="form-check-label" for="book_type2_${i}">E-Book</label>
                        </div>
                        <div class="errorDiv"> This is required </div>
                    </div>
                </div>
            </div>
            </div>`;
        
        return strHtml;
    }


//--------------------Editing Product Form----------------------------

const product_id = urlParams.get('id');

if (product_id) {
    $(document).ready(function () {
        
        ajaxGet(handleProductData, 'getProductData/' + product_id);

        function handleProductData(result) {
            let arrProduct = result.data;

            // Step 1
            $('#course').html(`<option value=${ arrProduct.product.course_id }>${ arrProduct.product.course }</option>`);

            $('#subject').html(`<option>${ arrProduct.product.subject }</option>`);

            $.each(arrProduct.doubt_resolution, function (key, item) {
                $(`.doubt_resolution_checkboxes input[value="${item.resolution_mode}"]`).prop('checked', true);
            });

            $.each(arrProduct.product_language, function (key, item) {
                $(`#populateVideoLanguage input[value="${item.language_id}"]`).prop('checked', true);
            });

            $(`.fast_forward_radio_buttons input[value="${arrProduct.product.fast_forward}"]`).prop('checked', true);

            $.each(arrProduct.video_device, function (key, item) {
                $(`.video_device_checkboxes input[value="${item.device_name}"]`).prop('checked', true);
            });

            $(`.internet_needed_radio_buttons input[value="${arrProduct.product.internet_needed}"]`).prop('checked', true);

            if (arrProduct.product.validity_type) {
                $(`.validity_type_radio_buttons input[value="${arrProduct.product.validity_type}"]`).prop('checked', true);
                $('#validity_div').show();
                $('#validity_period_0').closest('.row').find('.validity_option label').html('Number of ' + arrProduct.product.validity_type.substr(0, 1).toUpperCase() + arrProduct.product.validity_type.substr(1) + ' <small class="text-danger"></small>');
                $('#validity_period_0').closest('.row').find('.validity_option input').attr('placeholder', 'Number of ' + arrProduct.product.validity_type.substr(0, 1).toUpperCase() + arrProduct.product.validity_type.substr(1));
                $('#validity_period_0').val(arrProduct.product.validity_value);
            }

            if (arrProduct.product.no_of_views == 'limited') {
                $(`.no_views_radio_buttons input[value="${arrProduct.product.no_of_views}"]`).prop('checked', true);
                $('#views_div').show();
                $('#views_per_video').val(arrProduct.product.views_per_video);
            } else {
                $(`.no_views_radio_buttons input[value="${arrProduct.product.no_of_views}"]`).prop('checked', true);
                $('#views_div').hide();
            }

            $.each(arrProduct.dummy_videos, function (key, item) {
                if (key < 1) {
                    $('#dummy_video_0').val(item.link);
                } else {
                    $('#appendDummyVideo').append(populateDummyVideoUpdate(key, item));
                    $('.errorDiv').hide();
                }
            });

            // Step 2
            $.each(arrProduct.videos, function (key, item) {
                if (key < 1) {
                    $('#video_name_0').val(item.name);
                    $('#video_number_0').val(item.no_of_videos);
                    $('#video_minutes_0').val(item.time);
                } else {
                    $('#appendVideoDetails').append(appendPopulatedVideoUpdate(key, item));
                    $('.errorDiv').hide();
                }
            });

            // Step 3
            $.each(arrProduct.books, function (key, item) {
                if (key < 1) {
                    $('#book_name_0').val(item.book_name);
                    
                    $.each(item.books_language, function (key_book_lang, item_book_lang) {
                        $(`#populateBookLanguage_0 input[value="${item_book_lang.language_id}"]`).prop('checked', true);
                    });
                    
                    if(item.is_printed == 1) {
                        $(`#book_type_checkbox_0 input[value="is_printed"]`).prop('checked', true);
                    }
                    
                    if(item.is_ebook == 1) {
                        $(`#book_type_checkbox_0 input[value="is_ebook"]`).prop('checked', true);
                    }
                    
                } else {
                    $('#appendBook').append(appendPopulatedBookUpdate(key, item));
                    
                    $.each(item.books_language, function (key_book_lang, item_book_lang) {
                        $(`#populateBookLanguage_${key} input[value="${item_book_lang.language_id}"]`).prop('checked', true);
                    });
                    
                    if(item.is_printed == 1) {
                        $(`#book_type_checkbox_${key} input[value="is_printed"]`).prop('checked', true);
                    }
                    
                    if(item.is_ebook == 1) {
                        $(`#book_type_checkbox_${key} input[value="is_ebook"]`).prop('checked', true);
                    }
                    
                    $('.errorDiv').hide();
                }
            });

            // step 4
            getAttempt();
            var table = document.getElementById('product_delivery_detail_table');
            $.each(arrProduct.product_price, function (key, item) {
                $.each(table.rows, function (key_table, row_table) {
                    if ($(this).find('#attempt_id').val() == item.attempt_id && $(this).find('#video_type_id').val() == item.video_delivery_type_id
                        && $(this).find('#book_type_id').val() == item.book_delivery_type_id) {
                        $(this).find('.minimum_price').val(item.minimum_market_price);
                        $(this).find('.proposed_price').val(item.proposed_market_price);
                    }
                });
            });

        }
    });
}

