$(document).ready(function () {
    $.validator.addMethod('filesize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    }, 'File size must be less than 2 MB');
});

function validateError(event) {
    var id = event.target.id;
    if(event.target.value) {
        var id = event.target.id;
        $(`#${id}`).closest('.form-group').find('.errorDiv').hide();
    } else {
        $(`#${id}`).closest('.form-group').find('.errorDiv').show();
    }
}


//$(document).on('change', '.chk', function(event) {
//    console.log('heye', event);
//    validateError(event);
//});
//
//$(document).on('change keypress blur keydown', '.checkError', function(event) {
//    
//    validateError(event);
//});

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

// Format Date Time with moment functions
function formatDateTimeToAm($time) {
    return moment($time, "YYYY-MM-DD hh:mm:ss").format("DD MMM YYYY, hh:mm A");
}

function formatDatetimeToDate($time) {
    return moment($time, "YYYY-MM-DD hh:mm:ss").format("DD MMM YYYY")
}

function datetimeToDateFormat($time) {
    return moment($time, "YYYY-MM-DD hh:mm:ss").format("DD-MM-YYYY")
}
// End Of Format Functions

// Function to download a file
function downloadFile(url, fileName = "") {
    var link = document.createElement("a");
    link.href = url;
    link.target = "_blank";
    link.setAttribute("download", fileName);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
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
                    alert(result.message);
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
    return '<div id="loaderDiv" class="amiloader"><div class="loaderIcon"><img id="loading-image" src="images/load-white.svg"/></div></div>';
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

// Reset Form
function resetForm(formId) {
    var form = $("#" + formId + "");
    var validator = form.validate();
    validator.resetForm();
    form.find(".error").removeClass("error");
    document.getElementById("" + formId + "").reset();
}

function getAllSubject() {
    ajaxGet(populateSubject , 'getAllSubject');
}


function populateSubject(result) {
    if(result.code == 200) {
        let strHtml = ``;
        $.each(result.data, function(key, item) {
            strHtml += `<div class="form-check">
                            <input class="form-check-input chk" type="checkbox" name="subject_id[]" value="${item.id}"   id="subjectCheck${(key+1)}">
                            <label class="form-check-label" for="subjectCheck${(key+1)}">
                                ${item.name}
                            </label>
                        </div>`;
        });
        $('#appendSubject').html(strHtml);
    } else {
        alert(result.message);
    }
}

function teacherRegistration(result) {
    if(result.code == 200) {
        $('#blah').attr('src', '').removeClass('d-block');
        $('#blah1').attr('src', '').removeClass('d-block');
        $('#previewResume').attr('src', '').removeClass('d-block');
        let posting = $.post(BASE_URL+'sendmail.php', {name:$('#facultyName').val(), email: $('#facultyEmail1').val() });
        posting.done(function() {
//            alert('done');
        }).fail(function () {
//            alert('failed');
        });
        window.location.href="thankyou.php";
    } else {
        alert(result.message);
    }
}

function getAllCourseLevel() {
    ajaxGet(populateCourseLevel , 'getAllCourseLevel');
}

function populateCourseLevel(result) {
    if(result.code == 200) {
        let strHtml = ``;
        $.each(result.data, function(key, item) {
            strHtml += `<div class="form-check form-check-inline">
                            <input class="form-check-input chk" type="checkbox" name="teaching_level[]" value="${item.id}"
                                   id="levelCheck${ (key+1) }" >
                            <label class="form-check-label" for="levelCheck${ (key+1) }">
                                ${item.name}
                            </label>
                        </div>`;
        });
        $('#appendCourseLevel').html(strHtml);
    } else {
        alert(result.message);
    }
}

function getCourseLanguage() {
    ajaxGet(populateCourseLanguage , 'getCourseLanguage');
}

function populateCourseLanguage(result) {
    if(result.code == 200) {
        let strHtml = ``;
        $.each(result.data, function(key, item) {
            strHtml += `<div class="form-check form-check-inline">
                            <input class="form-check-input chk" name="language[]" type="checkbox" value="${item.id}"  id="languageCheck${ (key+1) }" >
                            <label class="form-check-label" for="languageCheck${ (key+1) }">
                                ${item.name}
                            </label>
                        </div>`;
        });
        $('#appendCourseLanguage').html(strHtml);
    } else {
        alert(result.message);
    }
}
