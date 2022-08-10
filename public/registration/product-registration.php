<?php
    include_once 'header.php';
?>
    <body>
        <div class="bg-img1 prod-reg size1 p-t-20 p-b-20 wrapper"
            style="background-image: linear-gradient(to right, #01a4cd, #2c8fac, #39798c, #3f646f, #405054); display: flex; justify-content: center;">
            <div class="alert alert-success alert-dismissible hide">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Upload successful.
            </div>
            <div class="flex-w d-flex-c flex-sa respon1">
                <div class="p-t-10 p-l-10 p-r-10 p-b-10 respon3 bg-white product-form reg-form">
                    <div class="w-100 p-b-10 d-flex sm-text-center justify-content-between align-items-center">
                        <div class="reg-logo">
                            <img src="images/Toplad-Logo.png" alt="logo">
                        </div>
                        <h3 class="l1-txt2  text-center m-p-bx respon2 respon4">
                            Product Information
                        </h3>
                    </div>
                    <div class="teach-reg-form">
                        <form method="POST" id="productRegistrationForm" name="productRegistrationForm">
                            <div id="wizard">
                                
<!--                                <h4></h4>
                                <section>-->
                                <div class="tab v0_step_1"  id="step_1" data-step="step_1">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group req">
                                                    <label>Course </label>
                                                    <select class="form-control cu-select chk checkError validateTeacherCourse" name="course" id="course">                
                                                    </select>
                                                    <div class="errorDiv"> This is required </div>
                                            
                                                    <input type="hidden" name="user_id" value="<?php echo $_GET['user_id']; ?>">
                                                    <input type="hidden" name="product_id" value="<?php echo $_GET['id']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group req">
                                                    <label>Subject </label>
                                                    <select class="form-control cu-select chk checkError validateTeacherSubject" name="subject" id="subject">                
                                                    </select>
                                                    <div class="errorDiv"> This is required </div>
                                            
                                                    <input type="hidden" name="user_id" value="<?php echo $_GET['user_id']; ?>">
                                                    <input type="hidden" name="product_id" value="<?php echo $_GET['id']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group req doubt_resolution_checkboxes">
                                                    <label class="d-block fg-l">Doubts Resolution </label>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input chk" type="checkbox" name="doubt_resolution[]" value="Live" id="doubt_resolution_check1">
                                                            <label class="form-check-label" for="doubt_resolution_check1">Live</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input chk" type="checkbox" name="doubt_resolution[]" value="Email" id="doubt_resolution_check2">
                                                            <label class="form-check-label" for="doubt_resolution_check2">E-mail </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input chk" type="checkbox" name="doubt_resolution[]" value="Whatsapp" id="doubt_resolution_check3">
                                                            <label class="form-check-label" for="doubt_resolution_check3">Whatsapp </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input chk" type="checkbox" name="doubt_resolution[]" value="Phone Call" id="doubt_resolution_check4">
                                                            <label class="form-check-label" for="doubt_resolution_check4">Phone-call</label>
                                                        </div>
                                                    <div class="errorDiv"> This is required </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6" id="populateVideoLanguage">
<!--                                                        <div class="form-group req">
                                                            <label class="d-block fg-l">Language</label>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input video_lang validate_video_lang" name="video_language[0][]" type="checkbox" id="inlineCheckbox1_0" value="1">
                                                                <label class="form-check-label" for="inlineCheckbox1_0">Hindi</label>
                                                            </div>
                                                            <div class="errorDiv"> This is required </div>
                                                        </div>-->
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group req required rd1 fast_forward_radio_buttons">
                                                    <label class="fg-l d-block">Fast Forward option </label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input chk" type="radio" name="fast_forward" id="fast_forward_radio3" value="yes">
                                                        <label class="form-check-label" for="fast_forward_radio3">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input chk" type="radio" name="fast_forward" id="fast_forward_radio4" value="no">
                                                        <label class="form-check-label" for="fast_forward_radio4">No</label>
                                                    </div>
                                                    <div class="errorDiv"> This is required </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group req video_device_checkboxes">
                                                    <label class="d-block fg-l">Videos Can be Played on device </label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input chk" type="checkbox" name="video_device[]" id="video_device1" value="windows">
                                                        <label class="form-check-label" for="video_device1">Windows</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input chk" type="checkbox" name="video_device[]" id="video_device2" value="android">
                                                        <label class="form-check-label" for="video_device2">Android</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input chk" type="checkbox" name="video_device[]" id="video_device3" value="ios">
                                                        <label class="form-check-label" for="video_device3">IOS</label>
                                                    </div>
                                                    <div class="errorDiv"> This is required </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group req required rd1 internet_needed_radio_buttons">
                                                    <label class="fg-l d-block">Internet needed or not </label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input chk" type="radio" name="internet_needed" id="internet_needed1" value="yes">
                                                        <label class="form-check-label" for="internet_needed1">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input chk" type="radio" name="internet_needed" id="internet_needed2" value="no">
                                                        <label class="form-check-label" for="internet_needed2">No</label>
                                                    </div>
                                                    <div class="errorDiv"> This is required </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group req required rd1 validity_type_radio_buttons">
                                                    <label class="fg-l d-block">Validity </label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input chk video_val change_video_validity" type="radio" name="validity_type" id="video_validity1" value="days">
                                                        <label class="form-check-label" for="video_validity1">Days</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input chk change_video_validity" type="radio" name="validity_type" id="video_validity2" value="months">
                                                        <label class="form-check-label" for="video_validity2">Months</label>
                                                    </div>
                                                    <div class="errorDiv"> This is required </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 validity_option" id="validity_div" style="display: none;">
                                                <div class="form-group req">
                                                    <label>Number of Days <small class="text-danger"></small></label>
                                                    <input type="number" name="validity_period" id="validity_period_0" class="form-control checkError validate_validity" placeholder="Number of Days" >
                                                    <div class="errorDiv"> This is required  </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <div class="form-group req required rd1 no_views_radio_buttons">
                                                    <label class="fg-l d-block">Number of Views </label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input chk video_vew change_video_view" type="radio" name="video_views" id="video_views1" value="limited">
                                                        <label class="form-check-label" for="video_views1">Limited</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input chk change_video_view" type="radio" name="video_views" id="video_views2" value="unlimited">
                                                        <label class="form-check-label" for="video_views2">Unlimited</label>
                                                    </div>
                                                    <div class="errorDiv"> This is required </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 views_option" id="views_div" style="display: none;">
                                                <div class="form-group req">
                                                    <label>Views Per Video <small class="text-danger"></small></label>
                                                    <input type="number" name="views_per_video" id="views_per_video" class="form-control checkError validate_views" placeholder="Views Per Video" >
                                                    <div class="errorDiv"> This is required  </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" >
                                                <div class="position-relative mb-3">
                                                    <div class="card card-body">
                                                        <div class="w-100">
                                                            <div class="form-group">
                                                                <label>Dummy Video<small class="text-danger"></small></label>
                                                                <input type="text" name="dummy_videos[]" id="dummy_video_0" class="form-control checkErrorOptional validateDummyVideo validateDummyVideoUrl" placeholder="Link" >
                                                                <div class="errorDiv"> This is required  </div>
                                                            </div>
                                                        </div>
                                                   </div>
                                                   <div id="appendDummyVideo">

                                                   </div>
                                                   <div class="add-btn dumy-video">
                                                       <button type="button" class="btn btn-success" id="addDummyVideoBtn">+</button>
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<!--                                </section>
                                
                                <h4></h4>
                                <section>-->
                                <div class="tab" id="step_2" data-step="step_2">
                                    <div class="container">
                                        <div class="video-form mb-3">
                                            <div class="card card-body">
                                                <div class="row no_of_video_series" data-id_no="0">
                                                    <div class="col-sm-4">
                                                        <div class="form-group req">
                                                            <label>Video/Topic Name </label>
                                                            <input type="text" name="video_name[0]" value="" id="video_name_0"  class="form-control checkError validate_video_name" placeholder="Video/Topic Name" >
                                                            <div class="errorDiv"> This is required </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group req">
                                                            <label>Number of Videos </label>
                                                            <input type="number" name="video_number[0]" id="video_number_0" class="form-control checkError validate_video_number" placeholder="Number of Videos" >
                                                            <div class="errorDiv"> This is required </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group req">
                                                            <label>Total Minutes </label>
                                                            <input type="number"  name="video_hours[0]" id="video_minutes_0" class="form-control checkError validate_video_hours" placeholder="Video Minutes" >
                                                            <div class="errorDiv"> This is required </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="appendVideoDetails">
                                            </div>
                                            <div class="add-btn">
                                                <button type="button" class="btn btn-success" id="addNewVideo">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<!--                                </section>
                                
                                <h4></h4>
                                <section>                    -->
                                <div class="tab"  id="step_3" data-step="step_3">
                                    <div class="container">
                                        <div class="card card-body mb-2">
                                            <div class="row no_of_book_series" data-id_no="0">
                                                <div class="col-sm-4">
                                                    <div class="form-group req">
                                                        <label>Name of Book </label>
                                                        <input type="text" name="book_name[0]" value="" id="book_name_0"  class="form-control chk checkError validate_book_name" placeholder="Book Name" >
                                                        <div class="errorDiv"> This is required </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4" id="populateBookLanguage_0">
<!--                                                    <div class="form-group req">
                                                        <label class="d-block fg-l">Language</label>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input chk checkError check_book_language_0" name="book_language[0][]" type="checkbox" id="book_language1_0" value="1">
                                                            <label class="form-check-label" for="book_language1_0">Hindi</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input chk checkError check_book_language_0" name="book_language[0][]" type="checkbox" id="book_language2_0" value="2">
                                                            <label class="form-check-label" for="book_language2_0">English</label>
                                                        </div>
                                                        <div class="errorDiv"> This is required </div>
                                                    </div>-->
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group req book_type_checkboxes" id="book_type_checkbox_0">
                                                        <label class="d-block fg-l">Type </label>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input chk" type="checkbox" name="book_type[0][]" id="book_type1_0" value="is_printed">
                                                            <label class="form-check-label" for="book_type1_0">Printed Book</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input chk" type="checkbox" name="book_type[0][]" id="book_type2_0" value="is_ebook">
                                                            <label class="form-check-label" for="book_type2_0">E-Book</label>
                                                        </div>
                                                        <div class="errorDiv"> This is required </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                        <div id="appendBook">
                                        </div>
                                        <div class="add-btn">
                                            <button type="button" class="btn btn-success" id="addNewBook">+</button>
                                        </div>
                                    </div>
                                </div>
<!--                                </section>
                                
                                <h4></h4>
                                <section>-->
                                <div class="tab v4_submit" id="step_4" data-step="step_4">
                                    <div class="container">
                                        <div class="row">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Attempt</th>
                                                        <th scope="col">Video Type</th>
                                                        <th scope="col">Book Type</th>
                                                        <th scope="col">Minimum Market Price</th>
                                                        <th scope="col">Proposed Market Price</th>
                                                        <th scope="col">N/A</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="product_delivery_detail_table">
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!--</section>-->
                                
                                
                                <div style="overflow:auto;">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="d-flex justify-content-between">
                                                    <button type="button" class=" btn_prev" id="prevBtn" onclick="prev()">Back</button>
                                                    <button type="button" class="btn_next" id="nextBtn" onclick="next()">Continue</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <!--===============================================================================================-->
<?php
    include_once 'footer.php';
?>
    <script src="js/pages/product-registration.js?ver=09-07-0002" type="text/javascript"></script>
    <script src="js/pages/product_registration_steps.js?ver=09-07-0010" type="text/javascript"></script>
    </body>
</html>