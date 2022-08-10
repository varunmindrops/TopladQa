$(document).ready(function () {
    $.validator.addMethod('filesize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    }, 'File size must be less than 5 MB');
    
    jQuery.validator.addMethod("customEmail", function(value, element) {
        return this.optional(element) || /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
    }, "Please enter a valid email address.");
    
    jQuery.validator.addMethod("lettersOnly", function(value, element) {
        return this.optional(element) || /^[a-z," "]+$/i.test(value);
    }, "Please enter letters and space only.");

    jQuery.validator.addMethod("numberNotStartWithZero", function(value, element) { 
        return this.optional(element) || /^[1-9][0-9]+$/i.test(value); 
    }, "Please enter a valid number. (Sholud not start with zero)");
    
    $('#blah').attr('src', '#').removeClass('d-block').addClass('d-none');
    $('#blah1').attr('src', '#').removeClass('d-block');
    $('#previewResume').attr('src', '#').removeClass('d-block');

    // getAllSubject();
    getAllCourse();
    getExperience();
    // getAllCourseLevel();
    // getCourseLanguage();  
});
    
// for inputting alphabets only
function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    return (charCode < 48 || charCode > 57) ? false : true;
}

// For inputting numbers only
function isAlphabetKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    return ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || (charCode == 32)) ? true : false;
}

// Ajax Calling Functions
function ajaxCall(callBack, url, data, method, contentType) {
    try {
        loader(true);
        var api_url = API_URL + url;
        $.ajax({
            type: method,
            url: api_url,
            headers: {
                "TOKEN": getToken()
            },
            data: data,
            processData: false,
            contentType: contentType,
            dataType: 'json',
            success: function (result) {
                if (result.code == STATUS_OK) {
                    callBack(result);
                } else if (result.code == STATUS_BAD_REQUEST) {
                    callBack(result);
//                    alert(result.message);
                } else if (result.code == STATUS_UNAUTHORIZED) {
                    $('.content-wrapper').html('<h2 style="text-align: center;padding: 30px 0;">Unauthorized access!!!</h2>');
                } else {
//                    alert(result.message);
                    callBack(result);
                }
            },
            error: function (error) {
                console.log(error);
            },
            complete: function (status) {
                loader(false);
            }
        });
    } catch (err) {
        console.log(err);
    }
}

function ajaxFormData(callBack, url, formData) {
    ajaxCall(callBack, url, formData, 'POST', false);
}

function ajaxPostJson(callBack, url, jsonData) {
    var data = JSON.stringify(jsonData);
    ajaxCall(callBack, url, data, 'POST', "application/json");
}

function ajaxDeleteJson(callBack, url, jsonData) {
    var data = JSON.stringify(jsonData)
    ajaxCall(callBack, url, data, 'DELETE', "application/json");
}

function ajaxGet(callBack, url) {
    ajaxCall(callBack, url, null, 'GET', false);
}
// End Of ajax functions


// Loader
function loader(showMe) {
    $('#loaderDiv').remove();
    if (showMe) {
        $('body').append(getLoaderHtml());
    }
}

function getLoaderHtml() {
    return '<div id="loaderDiv" class="amiloader"><div class="loaderIcon"><img id="loading-image" src="'+BASE_URL+'images/load-white.svg"/></div></div>';
}
// End Loader

// Success Messages 
function showSuccessMessage() {
    $(".alert-success").removeClass('hide');
    $(".alert-success").fadeTo(1000, 500).slideUp(500, function () {
        $(".alert-success").slideUp(500);
        $(".alert-success").addClass('hide');
    });
}
// Error Messages 
function showErrorMessage() {
    $(".alert-danger").removeClass('hide');
    $(".alert-danger").fadeTo(1000, 500).slideUp(500, function () {
        $(".alert-danger").slideUp(500);
        $(".alert-danger").addClass('hide');
    });
}

// function getAllSubject() {
//     ajaxGet(populateSubject , 'getAllSubject');
// }

function teacherRegistration(result) {
    if(result.code === 200) {
        $('#blah').attr('src', '#').removeClass('d-block').addClass('d-none');

        $.post(BASE_URL+'sendmail.php', {name:$('#facultyName').val(), email: $('#facultyEmail1').val() }).done(function() {
            alert('done');
        }).fail(function () {
//            alert('failed');
        });

//       var data = {name:$('#facultyName').val(), email: $('#facultyEmail').val(), user_id: result.data.user_id };

//       ajaxPostJson(populateEmail, "sendProductFormMail", data);
//        posting;
       window.location.href="thankyou.php";

    } else {
//        alert(result.message);
        showErrorMessage();
    }
}

//function populateEmail(result) {
//    console.log(result);
//}

function getAllCourse() {
    ajaxGet(populateCourse , 'getAllCourse');
}

function populateCourse(result) {
    if(result.code == 200) {
        let strHtml = '';
        $.each(result.data, function(key, item) {
            strHtml += '<div class="form-check form-check-inline">';
            strHtml += '<input class="form-check-input chk course_chk" type="checkbox" name="teaching_course[]" value="'+ (item.id) +'" id="courseCheck'+ (key+1) +'" >';
            strHtml += '<label class="form-check-label" for="courseCheck'+ (key+1) +'"> '+ item.name +'</label>';
            strHtml += '</div>';
        });
        $('#appendCourse').html(strHtml);
    } else {
        alert(result.message);
    }
}

levelData = [];
$(document).on('change', '#appendCourse', function(event) {
   $('.course_chk:checked').each(function(i){
        let isExist = levelData.find(a => a == $(this).val())
        if(!isExist) {
            levelData.push($(this).val())
        }
   });

   $('.course_chk:not(:checked)').each(function(i){
        levelData = levelData.filter(a => a !== $(this).val())
   });
});

function populateCourseLevel(result) {
    if(result.code == 200) {
        let strHtml = '';
        $.each(result.data, function(key, item) {
            strHtml += '<div class="form-check form-check-inline">';
            strHtml += '<input class="form-check-input chk course_level_chk" type="checkbox" name="teaching_level[]" value="'+ (item.id) +'" id="levelCheck'+ (key+1) +'" >';
            strHtml += '<label class="form-check-label" for="levelCheck'+ (key+1) +'"> '+ item.name +'</label>';
            strHtml += '</div>';
        });
        $('#appendCourseLevel').html(strHtml);
    } else {
        alert(result.message);
    }
}

$(document).on('change', '#appendCourseLevel', function(event) {
   subjectData = [];

   $('.course_level_chk:checked').each(function(i){
      subjectData[i] = $(this).val();
   });
});

function populateSubject(result) {
    if(result.code == 200) {
        let strHtml = '';
        $.each(result.data, function(key, item) {
            strHtml += '<div class="form-check">';
            strHtml += '<input class="form-check-input chk" type="checkbox" name="subject_id[]" value="'+ item.id +'"   id="subjectCheck'+ (key+1) +'">';
            strHtml += '<label class="form-check-label" for="subjectCheck'+ (key+1) +'"> '+ item.name +' </label>';
            strHtml += '</div>';
        });
        $('#appendSubject').html(strHtml);
    } else {
        alert(result.message);
    }
}

let arrExperience = [];

    function getExperience() {
        ajaxGet(populateExperience, 'getExperience');
    }

    function populateExperience(result) {
        if (result.code == 200) {
            window.arrExperience = result.data;

            let strOption = ``;
            $.each(result.data, function (key, item) {
                strOption += `<option value="${item.id}">${item.experience}</option>`;
            });

            let strTotalExperience = `
                        <div class="form-group req">
                            <label>Total Experience In Number Of Years </label>
                            <select class="form-control cu-select chk checkError validateTotalExperience" name="total_experience[0]" id="total_experience_0">
                                <option value="">Select Experience</option>
                                ${strOption}
                            </select>
                            <div class="errorDiv"> This is required </div>
                        </div>`;
            $('#total_experience').html(strTotalExperience);

            let strTeachExperience = `
                        <div class="form-group req">
                            <label>Teaching Experience In Number Of Years </label>
                            <select class="form-control cu-select chk checkError validateTeachExperience" name="teach_experience[0]" id="teach_experience_0">
                                <option value="">Select Experience</option>
                                ${strOption}
                            </select>
                            <div class="errorDiv"> This is required </div>
                        </div>`;
            $('#teach_experience').html(strTeachExperience);

        } else {
            alert('Something went wrong !!');
        }
    }

// function getCourseLanguage() {
//     ajaxGet(populateCourseLanguage , 'getCourseLanguage');
// }

// function populateCourseLanguage(result) {
//     if(result.code == 200) {
//         let strHtml = '';
//         $.each(result.data, function(key, item) {
//             strHtml += '<div class="form-check form-check-inline">';
//             strHtml += '<input class="form-check-input chk" name="language[]" type="checkbox" value="'+ (item.id) +'"  id="languageCheck'+ (key+1) +'" >';
//             strHtml += '<label class="form-check-label" for="languageCheck'+ (key+1) +'"> '+ item.name +' </label>';
//             strHtml += '</div>';
//         });
//         $('#appendCourseLanguage').html(strHtml);
//     } else {
//         alert(result.message);
//     }
// }
