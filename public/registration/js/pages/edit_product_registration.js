$(document).ready(function () {

    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    //const teacher_id = urlParams.get('user_id');
    const product_id = urlParams.get('p_id');

    let arrLanguage = [];
    let arrPrice = [];

    getLanguage();
    getProductData();

    function getLanguage() {
        ajaxGet(populateLanguage, 'getCourseLanguage');
    }

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

    function getProductData() {
        ajaxGet(handleProductData, 'getProductData/' + product_id);
    }

    function handleProductData(result) {
        console.log(result);
        let arrProduct = result.data;
        if (result.code == 200)
        {
            $('#subject').val(arrProduct.product.subject_id);

            $.each(arrProduct.doubt_resolution, function (key, item) {
                $(`.doubt_resolution_checkboxes input[value="${item.resolution_mode}"]`).prop('checked', true);
            });

            $.each(arrProduct.product_language, function (key, item) {
                $(`#populateVideoLanguage input[value="${item.language_id}"]`).prop('checked', true);
            });

            $(`.fast_forward_radio_buttons input[value="${arrProduct.product.fast_forward}"]`).prop('checked', true);

            $(`.internet_needed_radio_buttons input[value="${arrProduct.product.internet_needed}"]`).prop('checked', true);

            if (arrProduct.product.validity_type)
            {
                $(`.validity_type_radio_buttons input[value="${arrProduct.product.validity_type}"]`).prop('checked', true);
                $('#validity_div').show();
                $('#validity_period_0').closest('.row').find('.validity_option label').html('Number of ' + arrProduct.product.validity_type.substr(0, 1).toUpperCase() + arrProduct.product.validity_type.substr(1) + ' <small class="text-danger"></small>');
                $('#validity_period_0').closest('.row').find('.validity_option input').attr('placeholder', 'Number of ' + arrProduct.product.validity_type.substr(0, 1).toUpperCase() + arrProduct.product.validity_type.substr(1));
                $('#validity_period_0').val(arrProduct.product.validity_value);
            }

            if (arrProduct.product.no_of_views == 'limited')
            {
                $(`.no_views_radio_buttons input[value="${arrProduct.product.no_of_views}"]`).prop('checked', true);
                $('#views_div').show();
                $('#views_per_video').val(arrProduct.product.views_per_video);
            } else
            {
                $(`.no_views_radio_buttons input[value="${arrProduct.product.no_of_views}"]`).prop('checked', true);
                $('#views_div').hide();
            }

            $.each(arrProduct.video_device, function (key, item) {
                $(`.video_device_checkboxes input[value="${item.device_name}"]`).prop('checked', true);
            });

            $.each(arrProduct.videos, function (key, item) {
                if (key < 1)
                {
                    $('#video_name_0').val(item.name);
                    $('#video_number_0').val(item.no_of_videos);
                    $('#video_minutes_0').val(item.time);
                } else
                {
                    $('#appendVideoDetails').append(appendNewVideo(key, item));
                    $('.errorDiv').hide();
                }

            });

            $.each(arrProduct.books, function (key, item) {
                if (item.product_type_id == 1)
                {
                    item.product_type_id = 'hard_book';
                }

                if (item.product_type_id == 2)
                {
                    item.product_type_id = 'e_book';
                }

                if (key < 1)
                {
                    $('#book_name_0').val(item.book_name);

                    $(`#populateBookLanguage_0 input[value="${item.language_id}"]`).prop('checked', true);

                    $(`.book_type_checkboxes input[value="${item.product_type_id}"]`).prop('checked', true);

                } else
                {
                    $('#appendBook').append(appendNewBook(key, item));
                    $('.errorDiv').hide();
                }

            });

            arrPrice = arrProduct.product_price;


        } else
        {
            alert(result.message);
        }
    }

    function appendNewVideo(i, item) {
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

    function appendNewBook(i, item) {
        let strHtml = ``;
        strHtml += `<div class="card card-body mb-2">
                        <div class="row no_of_book_series" data-id_no="${i}">
                            <button type="button" class="btn btn-danger removeBook"> <i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                            <div class="col-sm-4">
                                <div class="form-group req">
                                    <label>Name of Book </label>
                                    <input type="text" name="book_name[${i}]" value="${item.book_name}" class="form-control chk checkError validate_book_name" placeholder="Book Name" >
                                    <div class="errorDiv"> This is required </div>
                                </div>
                            </div>
                            <div class="col-sm-4" id="populateBookLanguage_${i}">
                                ${ fillBookLanguage(i) }
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group req">
                                    <label class="d-block fg-l">Type </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input chk" type="checkbox" name="book_type[${i}][]" id="book_type1_${i}" value="${item.product_type_id}">
                                        <label class="form-check-label" for="book_type1_${i}">Hard Copy Book</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input chk" type="checkbox" name="book_type[${i}][]" id="book_type2_${i}" value="${item.product_type_id}">
                                        <label class="form-check-label" for="book_type2_${i}">E-Book</label>
                                    </div>
                                    <div class="errorDiv"> This is required </div>
                                </div>
                            </div>
                        </div>
                    </div>`;

        return strHtml;
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
});

function populatePrice()
{
    console.log(arrPrice);
}