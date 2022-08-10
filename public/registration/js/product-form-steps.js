$(document).ready(function() {
    $('#step_1').show();
    $('#step_2').hide();
    $('#step_3').hide();
    $('#step_4').hide();
    $('#step_5').hide();

    $('.errorDiv').hide();
    
//    $('#prevBtn').hide();
    $("#prevBtn").css('visibility', 'hidden');

    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const teacher_id = urlParams.get('user_id');
    
    ajaxGet(populateTeacherSubject, 'getTeacherSubject/'+teacher_id);
});

let arrProductType = [];
var arrTeacherSubject = [];

function populateTeacherSubject(result) {
    if(result.code == 200) {
        window.arrTeacherSubject = result.data;

        let strOption = ``;
        $.each(result.data, function(key, item) {
            strOption += `<option value="${item.sub_id}">${item.subject_name}</option>`;
        });

        let strSubject =`
                    <div class="form-group req">
                        <label>Select Subject </label>
                        <select class="form-control cu-select chk checkError validateTeacherSubject" name="video_subject[0]" id="video_subject_0">
                            <option value="">Select</option>
                            ${strOption}
                        </select>
                        <div class="errorDiv"> This is required! </div>
                    </div>`;
        $('#append_video_subject').html(strSubject);
        
    } else {
        alert('Something went wrong !!');
    }
}

//setTimeout(function () {
//    console.log('arrTeacherSubj', arrTeacherSubject);
//
//}, 1000);

function populateHardbookSubject(i) {
    let strOption = ``;
    $.each(window.arrTeacherSubject, function(key, item) {
        strOption += `<option value="${item.sub_id}">${item.subject_name}</option>`;
    });
    return (`
            <div class="col-sm-4">
                <div class="form-group req">
                    <label>Select Subject</label>
                    <select class="form-control cu-select chk checkError validateHardbookSubject" name="hard_book_subjects[]" id="hard_book_subject_${i}">
                        <option value="">Select</option>
                            ${strOption}
                    </select>
                    <div class="errorDiv"> This is required! </div>
                </div>
            </div>`);
}

function populateEbookbookSubject(i) {
    let strOption = ``;
    $.each(window.arrTeacherSubject, function(key, item) {
        strOption += `<option value="${item.sub_id}">${item.subject_name}</option>`;
    });
    return (`
            <div class="col-sm-4">
                <div class="form-group req">
                    <label>Select Subject</label>
                    <select class="form-control cu-select chk checkError validateEbookSubject"  name="e_book_subjects[]" id="e_book_subject_${i}">
                        <option value="">Select</option>
                            ${strOption}
                    </select>
                    <div class="errorDiv"> This is required! </div>
                </div>
            </div>`);
}

function populateVideoSubject(i) {
    let strOption = ``;
    $.each(window.arrTeacherSubject, function(key, item) {
        strOption += `<option value="${item.sub_id}">${item.subject_name}</option>`;
    });
    return (`
            <div class="form-group req">
                <label>Select Subject</label>
                <select class="form-control cu-select chk checkError validateTeacherSubject" name="video_subject[${i}]" id="video_subject_${i}">
                    <option value="">Select</option>
                        ${strOption}
                </select>
                <div class="errorDiv"> This is required! </div>
        </div>`);
}

$('.productCheck').on('change', function() {
    const productVal = $(this).val();

    if($(this).prop('checked') ) {
        if(! arrProductType.includes(productVal)) {
            arrProductType.push(productVal);
            arrProductType.sort();
            
            // allow to change the next page array if something changes
            changeNextArr = 1;
        }
    } else {
        const productIndex =  arrProductType.indexOf(productVal);
        arrProductType.splice(productIndex, 1);
        
        changeNextArr = 1;
    }
});
  
/*------------Functionality to move steps forward and backward-------------*/
let arrPrevious = [];
let arrNext =[];
let changeNextArr = 1;
let current = 'step_1';

function next() {
    
    if(! $('input[name="product_type[]"]:checked').length > 0 ) {
        $('input[name="product_type[]"]').closest('.form-group').find('.errorDiv').show();
        return false;
    } 
    
    if(changeNextArr) {
        arrNext = ['v0_step_1', ...arrProductType, 'v4_submit'];
    }
    
    let isValid = true;
    if(arrNext.length > 1 ) {
        isValid = validateStep();
        
        if(isValid) {
            if(changeNextArr) {
                $('.productCheck').attr('disabled', true);
            }
            console.log(arrPrevious, arrNext);
            
            const nextStepNum = $(`.${arrNext[2]}`).data('associated_step'); 
            const currStepNum = $(`.${arrNext[1]}`).data('associated_step'); 

            const deletedElem = arrNext.splice(0, 1);
            arrPrevious.push(deletedElem[0]);
            const prevStepIndex = arrPrevious[arrPrevious.length-1];
            console.log(prevStepIndex);
            
            const prevStepNum = $(`.${prevStepIndex}`).data('associated_step');

            console.log('inside next 1 ',arrPrevious, arrNext);
            console.log(prevStepNum, currStepNum, nextStepNum);
            
            $(`#${prevStepNum}`).hide();
            $(`#${currStepNum}`).fadeIn();
            
            if(arrNext.length == 1) {
                $('#nextBtn').text('Submit');
            } 

            current = currStepNum;
            changeNextArr = 0;
//            $('#prevBtn').show();
            $("#prevBtn").css('visibility', 'visible');
        } else {
//            alert('Please enter valid fields');
        }
    }  else if (arrNext.length == 1) {
        
        console.log('here2');
        const nextStepNum = $(`.${arrNext[2]}`).data('associated_step'); 
        const currStepNum = $(`.${arrNext[0]}`).data('associated_step');
        
        console.log('inside next 2 ',arrPrevious, arrNext);
        console.log( currStepNum, nextStepNum);

        $('#selectedProducts').val(arrProductType);
        
        if(arrPrevious.length >= 1) {
//            $('#prevBtn').show();
            $("#prevBtn").css('visibility', 'visible');
        }
        
        isValid = validateStep();
        if(isValid) {
            changeNextArr = 0;
            
            let formData = new FormData($('#productRegistrationForm')[0]);
            ajaxFormData(registerProduct, 'registerProduct', formData);
        }
    } else {
        $('#prevBtn').hide();
    }
    
}

function prev() {
    const currStepNum = $(`.${arrPrevious[ arrPrevious.length-1 ]}`).data('associated_step'); 
    const nextStepNum = $(`.${arrNext[0]}`).data('associated_step');
    const prevStepNum = $(`.${arrPrevious[ arrPrevious.length-2 ]}`).data('associated_step');

    if(arrPrevious.length > 1 ) { 
        $(`#${currStepNum}`).fadeIn();        
        $(`#${prevStepNum}`).hide();
        $(`#${nextStepNum}`).hide();

        const deletedElem = arrPrevious.pop();
        arrNext.unshift(deletedElem);
        current = currStepNum;
        $('#nextBtn').text('Continue');
//        $('#prevBtn').show();
        $("#prevBtn").css('visibility', 'visible');
    }  else if (arrPrevious.length == 1) { 
        $('#step_1').fadeIn();  
          
        $(`#${prevStepNum}`).hide();
        $(`#${nextStepNum}`).hide();
  
        const deletedElem = arrPrevious.pop();
        arrNext.unshift(deletedElem);
//        isStepOne = true;
        current = 'step_1';
        $('#nextBtn').text('Continue');
//        $('#prevBtn').hide();
        $("#prevBtn").css('visibility', 'hidden');
    }  

}

function validateStep() {
    let shouldReturnFalse = 0;
    $('.errorDiv').hide();
    
    console.log('current', current);
    
    if(current == 'step_1') {
        if(! $('input[name="product_type[]"]:checked').length > 0 ) {
            $('input[name="product_type[]"]').closest('.form-group').find('.errorDiv').show();
            shouldReturnFalse = 1;
        }
        
        if(shouldReturnFalse) {
            return false;
        } else {
            return true;
        }
    } 
    else if(current == 'step_2') {

        if(! $('#hc_number_books_1').val()) {
            $('#hc_number_books_1').closest('.form-group').find('.errorDiv').show();
            shouldReturnFalse = 1;
        }

        $('.validateHardbookSubject').each(function (index, value) {
            if(! $(this).val() ) {
                $(this).closest('.form-group').find('.errorDiv').show();
                shouldReturnFalse = 1;
            }
        });

        $('.validate_hc_book_name').each(function (index, value) {
            var reg3 = /^[a-zA-Z0-9,.!? ]*$/;
            if(! $(this).val() ) {
                $(this).closest('.form-group').find('.errorDiv').show();
                shouldReturnFalse = 1;
            } else if (!reg3.test( $(this).val() )) {
                $(this).closest('.form-group').find('.errorDiv').html('Invalid Name').show();
            }
        });

        $('.validate_hc_book_price').each(function (index, value) {
            var reg1 = /^(?:0|[1-9]\d*)(?:\.(?!.*000)\d+)?$/;
            if(! $(this).val() ) {
                $(this).closest('.form-group').find('.errorDiv').show();
                shouldReturnFalse = 1;
            } 
            else if (!reg1.test( $(this).val() )) {
                $(this).closest('.form-group').find('.errorDiv').html('Invalid Price').show();
                shouldReturnFalse = 1;
            }
        });

        $('.validate_hc_book_attempt').each(function (index, value) {
            if(! $(this).val() ) {
                $(this).closest('.form-group').find('.errorDiv').show();
                shouldReturnFalse = 1;
            } 
        });

        for(let i = 0; i < $('#hc_number_books_1').val() ; i++) {
            if (! $('input[name="hc_language['+ i +'][]"]:checked').length > 0) {
                $('input[name="hc_language['+ i +'][]"]').closest('.form-group').find('.errorDiv').show();
                shouldReturnFalse = 1;
            }
        }

        if(shouldReturnFalse) {
            return false;
        } else {
            return true;
        }
    } 
    else if(current == 'step_3') {
        console.log('step 3 here');
        
        if(! $('#ebook_number').val()) {
            $('#ebook_number').closest('.form-group').find('.errorDiv').show();
            shouldReturnFalse = 1;
        }
        
        $('.validateEbookSubject').each(function (index, value) {
            if(! $(this).val() ) {
                $(this).closest('.form-group').find('.errorDiv').show();
                shouldReturnFalse = 1;
            } 
        });
        
        $('.validate_ebook_name').each(function (index, value) {
            var reg3 = /^[a-zA-Z0-9,.!? ]*$/;
            if(! $(this).val() ) {
                $(this).closest('.form-group').find('.errorDiv').show();
                shouldReturnFalse = 1;
            } else if (!reg3.test( $(this).val() )) {
                $(this).closest('.form-group').find('.errorDiv').html('Invalid Name').show();
                shouldReturnFalse = 1;
            }
        });

        $('.validate_ebook_price').each(function (index, value) {
            var reg1 = /^(?:0|[1-9]\d*)(?:\.(?!.*000)\d+)?$/;
            if(! $(this).val() ) {
                $(this).closest('.form-group').find('.errorDiv').show();
                shouldReturnFalse = 1;
            } else if (!reg1.test( $(this).val() )) {
                $(this).closest('.form-group').find('.errorDiv').html('Invalid price').show();
                shouldReturnFalse = 1;
            }
        });

        $('.validate_ebook_attempt').each(function (index, value) {
            if(! $(this).val() ) {
                $(this).closest('.form-group').find('.errorDiv').show();
                shouldReturnFalse = 1;
            }
        });

        for(let i = 0; i < $('#ebook_number').val() ; i++) {
            if (! $('input[name="ebook_language['+ i +'][]"]:checked').length > 0) {
                $('input[name="ebook_language['+ i +'][]"]').closest('.form-group').find('.errorDiv').show();
                shouldReturnFalse = 1;
            }
        }

        if(shouldReturnFalse) {
            return false;
        } else {
            return true;
        }
    } 
    else if (current == 'step_4') {
        var reg1 = /^(?:0|[1-9]\d*)(?:\.(?!.*000)\d+)?$/;
        var regNumber = /^[1-9][0-9]+$/;
        var reg3 = /^[a-zA-Z0-9,.!? ]*$/;
        var reg4 = /^[0-9]+$/;
        
        $('.validateTeacherSubject').each(function (index, value) {
            if(! $(this).val() ) {
                $(this).closest('.form-group').find('.errorDiv').show();
                shouldReturnFalse = 1;
            } 
        });
        
        $('.validate_video_number').each(function (index, value) {
            if(! $(this).val() ) {
                $(this).closest('.form-group').find('.errorDiv').show();
                shouldReturnFalse = 1;
            } 
            else if (!reg4.test( $(this).val() )) {
                $(this).closest('.form-group').find('.errorDiv').html('Invalid Number').show();
                shouldReturnFalse = 1;
            }
        });
        
        $('.validate_video_name').each(function (index, value) {
            if(! $(this).val() ) {
                $(this).closest('.form-group').find('.errorDiv').show();
                shouldReturnFalse = 1;
            } 
            else if (!reg3.test( $(this).val() )) {
                $(this).closest('.form-group').find('.errorDiv').html('Invalid Name').show();
                shouldReturnFalse = 1;
            }
        });

        $('.validate_video_price').each(function (index, value) {
            if(! $(this).val() ) {
                $(this).closest('.form-group').find('.errorDiv').show();
                shouldReturnFalse = 1;
            } 
            else if (!reg1.test( $(this).val() )) {
                $(this).closest('.form-group').find('.errorDiv').html('Invalid price').show();
                shouldReturnFalse = 1;
            }
        });
        
        $('.validate_video_hours').each(function (index, value) {
            if(! $(this).val() ) {
                $(this).closest('.form-group').find('.errorDiv').show();
                shouldReturnFalse = 1;
            } 
            else if (!reg1.test( $(this).val() )) {
                $(this).closest('.form-group').find('.errorDiv').html('Invalid hours').show();
                shouldReturnFalse = 1;
            }
        });
        
        $('.validate_video_attempt').each(function (index, value) {
            if(! $(this).val() ) {
                $(this).closest('.form-group').find('.errorDiv').show();
                shouldReturnFalse = 1;
            }
        });
        
    let no_of_series = $('.no_of_video_series');
    console.log('no series ',no_of_series);

    for (let i=0; i< (no_of_series.length); i++) {
        const id_no = $(no_of_series[i]).data('id_no');
        
        if (! $('input[name="video_language['+ id_no +'][]"]:checked').length > 0) {
            $('input[name="video_language['+ id_no +'][]"]').closest('.form-group').find('.errorDiv').show();
            shouldReturnFalse = 1;
        }
        
    }

    for (let i=0; i< (no_of_series.length); i++) {
        const id_no = $(no_of_series[i]).data('id_no');
        
        if (! $('input[name="fast_forward['+ id_no +']"]:checked').length > 0) {
            $('input[name="fast_forward['+ id_no +']"]').closest('.form-group').find('.errorDiv').show();
            shouldReturnFalse = 1;
        }
        
    }

    for (let i=0; i< (no_of_series.length); i++) {
        const id_no = $(no_of_series[i]).data('id_no');
        
        if (! $('input[name="video_device['+ id_no +'][]"]:checked').length > 0) {
            $('input[name="video_device['+ id_no +'][]"]').closest('.form-group').find('.errorDiv').show();
            shouldReturnFalse = 1;
        }
        
    }

    for (let i=0; i< (no_of_series.length); i++) {
        const id_no = $(no_of_series[i]).data('id_no');
        
        if (! $('input[name="video_views['+ id_no +']"]:checked').length > 0) {
            $('input[name="video_views['+ id_no +']"]').closest('.form-group').find('.errorDiv').show();
            shouldReturnFalse = 1;
        }
    }

        
      /*  if(! $('#video_hours').val() ) {
            $('#video_hours').closest('.form-group').find('.errorDiv').show();
            shouldReturnFalse = 1;
        } */
//        else if (!reg1.test( $('#video_hours').val() )) {
//            $('#video_hours').closest('.form-group').find('.errorDiv').html('Invalid hours').show();
//            shouldReturnFalse = 1;
//        }
        



        if(shouldReturnFalse) {
            return false;
        } else {
            return true;
        }
    } else if (current == 'step_5' ) {
        if(! $('#product_amendment').val() ) {
            $('#product_amendment').closest('.form-group').find('.errorDiv').show();
            shouldReturnFalse = 1;
        }
        if (! $('input[name="doubt_resolution[]"]:checked').length > 0) {
            $('#doubt_resolution_check1').closest('.form-group').find('.errorDiv').show();
            shouldReturnFalse = 1;
        }
        if(! $('#delivery_days').val() ) {
            $('#delivery_days').closest('.form-group').find('.errorDiv').show();
            shouldReturnFalse = 1;
        }
        if (! $('input[name="internet_needed"]:checked').length > 0) {
            $('#internet_needed1').closest('.form-group').find('.errorDiv').show();
            shouldReturnFalse = 1;
        }
        
        if(shouldReturnFalse) {
            return false;
        } else {
            return true;
        }
    }
}

function registerProduct(result) {
    console.log(result);
    if(result.code == 200) {
        $("#productRegistrationForm :input").val('');
        $('#productRegistrationForm input[type="select"]').val('');
        $('input[name="product_type[]"]').prop('checked', false);
        $('#productRegistrationForm input[type="checkbox"]').prop('checked' , false);
        $('#productRegistrationForm input[type="radio"]').prop('checked' , false);

        arrProductType = [];
        arrPrevious = [];
        arrNext =[];
        changeNextArr = 1;
        current = 'step_1';
        location.href="thank_you.php";
    } else {
        alert('Something went wrong');
    }
}
        
//------------------------------------------//

    $('#hc_number_books_1').on('change', function() {
        const num_books = $(this).val();
        let strBooks = ``;
        for(let i=1; i <=num_books; i++) {
            strBooks += populateHardBookDetails(i);
        }
        if(strBooks != '') {
            $('#append_number_books').html(strBooks);
        } else {
            $('#append_number_books').html('');
        }
        $('.errorDiv').hide();

    });

    
    function populateHardBookDetails(i) {
        return (`<div class="card px-3 pt-10 mb-3" >
                    <div class="row">
                        ${ populateHardbookSubject(i) }
                        <div class="col-sm-4">
                            <div class="form-group req">
                                <label>Book Name </label>
                                <input type="text" name="hc_book_name[]" value="" id="hc_book_name_${i}"  class="form-control chk checkError validate_hc_book_name" placeholder="Book Name" required>
                                <div class="errorDiv"> This is required </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group req">
                                <label>Book Price </label>
                                <input type="text" name="hc_book_price[]" value="" id="hc_book_price_${i}"  class="form-control chk checkError validate_hc_book_price" placeholder="Book Price" required>
                                <div class="errorDiv"> This is required </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group req">
                                <label>Attempt </label>
                                <select class="form-control cu-select chk checkError validate_hc_book_attempt" id="hc_attempt_${i}" name="hc_attempt[]">
                                    <option value="">Select Attempts</option>
                                    <option value="1">DEC 2020</option>
                                    <option value="2">JUNE 2021</option>
                                    <option value="3">DEC 2020 OR JUNE 2021 OR LATER</option>
                                </select>
                                <div class="errorDiv"> This is required </div>
                            </div> 
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group req">
                                <label class="d-block fg-l">Language</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input chk checkError check_hc_languace__${i}" type="checkbox" name="hc_language[${i -1}][]" id="hc_language1_${i}" value="1">
                                    <label class="form-check-label" for="hc_language1_${i}">Hindi</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input chk checkError check_hc_languace__${i}" type="checkbox" name="hc_language[${i -1}][]" id="hc_language2_${i}" value="2">
                                    <label class="form-check-label" for="hc_language2_${i}">English</label>
                                </div>
                                <div class="errorDiv"> This is required</div>
                            </div>
                        </div>
                    </div>
                </div>` );
    }
     
    
    $('#ebook_number').on('change', function () {
        const num_ebooks = $(this).val();
        let strHtml = ``;
        
        for(let i = 1; i <= num_ebooks; i++) {
            strHtml += populateEbookHtml(i);
        }
        
        if(strHtml != '') {
            $('#append_number_e_books').html(strHtml);
        } else {
            $('#append_number_e_books').html('');
        }
        
        $('.errorDiv').hide();
    });
    
    function populateEbookHtml(i) {
        return (`<div class="card px-3 pt-10 mb-3">
                    <div class="row">
                        ${ populateEbookbookSubject(i) }
                        <div class="col-sm-4">
                            <div class="form-group req">
                                <label>Name of the E-Book</label>
                                <input type="text" name="ebook_name[]" value="" id="ebook_name_${i}"  class="form-control chk checkError validate_ebook_name" placeholder="Book Name" >
                                <div class="errorDiv"> This is required </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group req">
                                <label>E-Book Price </label>
                                <input type="text" name="ebook_price[]" value="" id="ebook_price_${i}"  class="form-control chk checkError validate_ebook_price" placeholder="Book Price" >
                                <div class="errorDiv"> This is required </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group req">
                                <label>Attempt </label>
                                <select class="form-control chk checkError cu-select validate_ebook_attempt" id="ebook_attempt_${i}" name="ebook_attempt[]">
                                    <option value="">Select Attempts</option>
                                    <option value="1">DEC 2020</option>
                                    <option value="2">JUNE 2021</option>
                                    <option value="3">DEC 2020 OR JUNE 2021 OR LATER</option>
                                </select>
                                <div class="errorDiv"> This is required </div>
                            </div> 
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group req">
                                <label class="d-block fg-l">Language</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input chk checkError check_ebook_language__${i}" name="ebook_language[${i -1}][]" type="checkbox" id="ebook_language1_${i}" value="1">
                                    <label class="form-check-label" for="ebook_language1_${i}">Hindi</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input chk checkError check_ebook_language__${i}" name="ebook_language[${i -1}][]" type="checkbox" id="ebook_language2_${i}" value="2">
                                    <label class="form-check-label" for="ebook_language2_${i}">English</label>
                                </div>
                                <div class="errorDiv"> This is required </div>
                            </div>
                        </div>
                    </div>
                </div>` );
    }

 function appendNewVideo(i) {
    let strHtml = ``;
    strHtml += `
            <div class="card mt-3 card-body">
                <div class="row no_of_video_series"  data-id_no="${i}">
                        <button type="button" class="btn btn-danger removeVideo"> <i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                    <div class="col-sm-4" id="append_video_subject">
                        ${ populateVideoSubject(i) }
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group req">
                            <label>Number of Parts in the Videos </label>
                            <input type="number" name="video_number[${i}]" id="video_number_${i}" class="form-control checkError validate_video_number" placeholder="Number of Videos" >
                            <div class="errorDiv"> This is required </div>
                        </div> 
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group req">
                            <label>Video Name </label>
                            <input type="text" name="video_name[${i}]" id="video_name_${i}" value=""  class="form-control checkError validate_video_name" placeholder="Video Name" >
                            <div class="errorDiv"> This is required </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group req">
                            <label>Video Price </label>
                            <input type="text" name="video_price[${i}]" id="video_price_${i}" value="" class="form-control checkError validate_video_price" placeholder="Video price" >
                            <div class="errorDiv"> This is required </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group req">
                            <label>Video Hours </label>
                            <input type="number"  name="video_hours[${i}]" id="video_hours_${i}" class="form-control checkError validate_video_hours" placeholder="Video Hours" >
                            <div class="errorDiv"> This is required </div>
                        </div> 
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group req">
                            <label>Attempt </label>
                            <select class="form-control cu-select validate_video_attempt" id="video_attempt_${i}" name="video_attempt[${i}]">
                                <option value="">Select Attempts</option>
                                <option value="1">DEC 2020</option>
                                <option value="2">JUNE 2021</option>
                                <option value="3">DEC 2020 OR JUNE 2021 OR LATER</option>
                            </select>
                            <div class="errorDiv"> This is required </div>
                        </div> 
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group req">
                            <label class="d-block fg-l">Language</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input video_lang validate_video_lang" name="video_language[${i}][]" type="checkbox" id="videoLangCheckbox1_${i}" value="1">
                                <label class="form-check-label" for="videoLangCheckbox1_${i}">Hindi</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input validate_video_lang" name="video_language[${i}][]" type="checkbox" id="videoLangCheckbox2_${i}" value="2">
                                <label class="form-check-label" for="videoLangCheckbox2_${i}">English</label>
                            </div>
                            <div class="errorDiv"> This is required </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group req required rd1">
                            <label class="fg-l d-block">Fast Forward option </label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input chk" type="radio" name="fast_forward[${i}]" id="fast_forward_radio3_${i}" value="yes">
                                <label class="form-check-label" for="fast_forward_radio3_${i}">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input chk" type="radio" name="fast_forward[${i}]" id="fast_forward_radio4_${i}" value="no">
                                <label class="form-check-label" for="fast_forward_radio4_${i}">No</label>
                            </div>
                            <div class="errorDiv"> This is required </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group req">
                            <label class="d-block fg-l">Videos Can be Played on device</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="video_device[${i}][]" id="video_device1_${i}" value="windows">
                                <label class="form-check-label" for="video_device1_${i}">Windows</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="video_device[${i}][]" id="video_device2_${2}" value="android">
                                <label class="form-check-label" for="video_device2_${i}">Android</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="video_device[${i}][]" id="video_device3_${i}" value="ios">
                                <label class="form-check-label" for="video_device3_${i}">IOS</label>
                            </div>
                            <div class="errorDiv"> This is required </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group req required rd1">
                            <label class="fg-l d-block">Number of Views </label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input chk video_vew change_video_view" type="radio" name="video_views[${i}]" id="videoViewRadio1_${i}" value="limited">
                                <label class="form-check-label" for="videoViewRadio1_${i}">Limited</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input chk change_video_view" type="radio" name="video_views[${i}]" id="videoViewRadio2_${i}" value="unlimited">
                                <label class="form-check-label" for="videoViewRadio2_${i}">Unlimited</label>
                            </div>
                            <div class="errorDiv"> This is required </div>
                        </div>
                    </div>
                    <div class="col-sm-4 inst_box" id="instruction_div_${i}" style="display: none;">
                        <div class="form-group req">
                            <label>Instructions<small class="text-danger"></small></label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="video_instructions[${i}]"></textarea>
                            <div class="errorDiv"> This is required  </div>
                        </div>
                    </div>

                </div>
            </div>`;
     
     return strHtml;
 }

 $(document).on('change' , '.change_video_view',function() {
        if($(this).val() == 'limited') {
            $(this) .closest('.row').find('.inst_box') .show();
        } else {
            $(this) .closest('.row').find('.inst_box') .hide();
        }
    }); 
 
 $('#addNewVideo').on('click', function() {
    const elem_id = videoElemCounter('increase');
    console.log(elem_id);
    
    $('#appendVideoDetails').append( appendNewVideo(elem_id) );
    $('.errorDiv').hide();
 });

 $(document).on('click', '.removeVideo',function() {
    console.log( videoElemCounter('decrease') );
     
    $(this).closest('.card').remove();
 });
 let elem = 1;
 function videoElemCounter(action) {
    return action == 'increase' ? elem ++ : elem --;
 }