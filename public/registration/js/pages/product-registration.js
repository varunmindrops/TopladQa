$(document).ready(function () {
    $.validator.addMethod('filesize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    }, 'File size must be less than 5 MB');
  
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

function validateErrorOptional(event) {
    var id = event.target.id;
    if(event.target.value) {
        var id = event.target.id;
        $(`#${id}`).closest('.form-group').find('.errorDiv').hide();
    }
}

$(document).on('change', '.chk', function(event) {
    validateError(event);
});

$(document).on('change keypress blur keydown', '.checkError', function(event) {
    validateError(event);
});

$(document).on('change keypress blur keydown', '.checkErrorOptional', function(event) {
    validateErrorOptional(event);
});
    
// for inputting alphabets only
function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    return (charCode < 48 || charCode > 57) ? false : true;
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

// Ajax Calling Functions
function ajaxSyncCall(callBack, url, data, method, contentType) {
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
            async: false,
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

function ajaxSyncGet(callBack, url) {
    ajaxSyncCall(callBack, url, null, 'GET', false);
}
// End of ajax synchronous call functions

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
