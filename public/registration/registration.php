<?php
    include_once 'header.php';
?>
    <body>
        <div class="bg-img1 size1 p-t-20 p-b-20 wrapper"
            style="background-image: linear-gradient(to right, #01a4cd, #2c8fac, #39798c, #3f646f, #405054); display: flex; justify-content: center;">
            <div class="alert alert-success alert-dismissible hide">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Upload successful.
            </div>
            <div class="alert alert-danger alert-dismissible hide">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> Email or Phone Already Exists.
            </div>
            <div class="flex-w d-flex-c flex-sa respon1">
                <div class="p-t-10 p-l-10 p-r-10 p-b-10 respon3 bg-white reg-form">
                    <div class="w-100 p-b-10 d-flex sm-text-center justify-content-between align-items-center">
                        <div class="reg-logo">
                            <img src="images/Toplad-Logo.png" alt="logo">
                        </div>
                        <h3 class="l1-txt2 text-center m-p-bx respon2 respon4">
                            Faculty Onboarding Form
                        </h3>
                    </div>
                    <div class="teach-reg-form ">
                        <form method="POST" id="facultyOnBoardForm" name="facultyOnBoardForm">
                            <div id="wizard">
                                <h4></h4>
                                <section>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group req">
                                                    <label>Your Complete Name </label>
                                                    <input type="text" name="name" value="" id="facultyName"  class="form-control checkError" onkeypress="return isAlphabetKey(event)" placeholder="Enter Name" >
                                                    <div class="errorDiv"> </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group req">
                                                    <label>Your Primary Email ID </label>
                                                    <input type="email" name="email1" id="facultyEmail1" class="form-control checkError" placeholder="Primary Email" >
                                                    <div class="errorDiv"> </div>
                                                </div> 
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Your Secondary Email ID </label>
                                                    <input type="email" name="email2" id="facultyEmail2" class="form-control checkError" placeholder="Secondary Email" >
                                                    <div class="errorDiv"> </div>
                                                </div> 
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group req">
                                                    <label>Your Primary Contact Number </label>
                                                    <input type="text" name="phone1"  id="facultyContact1" class="form-control checkError" onkeypress="return isNumberKey(event)" minlength="10" maxlength="10" placeholder="Primary Contact Number">
                                                    <div class="errorDiv"> </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Your Secondary Contact Number </label>
                                                    <input type="text" name="phone2"  id="facultyContact2" class="form-control checkError" onkeypress="return isNumberKey(event)" minlength="10" maxlength="10" placeholder="Secondary Contact Number">
                                                    <div class="errorDiv"> </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group req">
                                                    <label>After Sales Support Contact Number </label>
                                                    <input type="text" name="sales_phone"  id="salesNumber" class="form-control checkError" onkeypress="return isNumberKey(event)" minlength="10" maxlength="10" placeholder="After Sales Support Contact Number">
                                                    <div class="errorDiv"> </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group req">
                                                    <label>After Sales Support Contact Person </label>
                                                    <input type="text" name="sales_name" value="" id="salesPerson"  class="form-control checkError" onkeypress="return isAlphabetKey(event)" placeholder="After Sales Support Contact Person Name" >
                                                    <div class="errorDiv"> </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group req">
                                                    <label>Tech Support Contact Number </label>
                                                    <input type="text" name="tech_phone"  id="techNumber" class="form-control checkError" onkeypress="return isNumberKey(event)" minlength="10" maxlength="10" placeholder="Tech Support Contact Number">
                                                    <div class="errorDiv"> </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group req">
                                                    <label>Tech Support Contact Person </label>
                                                    <input type="text" name="tech_name" value="" id="techPerson" class="form-control checkError" onkeypress="return isAlphabetKey(event)" placeholder="Tech Support Contact Person Name" >
                                                    <div class="errorDiv"> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h4></h4>
                                <section>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group req">
                                                    <label class="fg-l">Total Experience In Number Of Years </label>
                                                    <select class="form-control cu-select chk checkError validateTotalExperience" name="total_experience" id="total_experience">
                                                    </select>
                                                    <div class="errorDiv"> </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group req">
                                                    <label class="fg-l">Teaching Experience In Number Of Years </label>
                                                    <select class="form-control cu-select chk checkError validateTeachExperience" name="teach_experience" id="teach_experience">
                                                    </select>
                                                    <div class="errorDiv"> </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group req">
                                                    <label class="fg-l">Educational Qualifications To Be Highlighted </label>
                                                    <textarea rows="2" cols="50" name="qualification" id="qualification" class="form-control checkError" placeholder="B.Com,M.Com,CMA,etc..."></textarea>
                                            
                                                    <div class="errorDiv"> </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group req">
                                                    <label class="fg-l">Professional Achievements To Be Highlighted </label>
                                                    <textarea rows="2" cols="50" name="achievement" id="achievement" class="form-control checkError" placeholder="1. Awarded Teacher of the Year for the St. Lucy School District in 2016.&#10;2. Implemented an Individualized Education Plan for students with unique needs.&#10;etc..."></textarea>
                                                    <div class="errorDiv"> </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group req">
                                                    <label class="fg-l">Awards And Honours  </label>
                                                    <textarea rows="2" cols="50" name="award" id="award" class="form-control checkError" placeholder="1. Awards from professional associations (e.g. CSS Design Award).&#10;2. Published books.&#10;etc..."></textarea>
                                                    <div class="errorDiv"> </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group req">
                                                    <label class="fg-l">Areas Of Interest  </label>
                                                    <textarea rows="2" cols="50" name="interest" id="interest" class="form-control checkError" placeholder="1. Teaching&#10;2. Reading&#10;etc..."></textarea>
                                                    <div class="errorDiv"> </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group req">
                                                    <label class="fg-l">A Short Bio About You In Your Own Words </label>
                                                    <textarea rows="2" cols="50" name="bio" id="bio" class="form-control checkError" placeholder="Short Bio About Yourself"></textarea>
                                                    <div class="errorDiv"> </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group req required cb4">
                                                    <label class="fg-l">Kindly Select the Course for which You will be offering lectures. You can select more than one options also. </label>
                                                    <div id="appendCourse">
                                                        
                                                    </div>
                                                    <div class="errorDiv"> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h4></h4>
                                <section>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group req required cb1">
                                                    <label class="fg-l">Kindly Select the Course Level for which You will
                                                        be offering lectures. You can select more than one options
                                                        also. </label>
                                                    <div id="appendCourseLevel">
                                                        
                                                    </div>
                                                    <div class="errorDiv"> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h4></h4>
                                <section>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group req required cb2">
                                                    <label>Kindly select the Subject/s you will be allowing us to list on the portal. </label>
                                                    <div class="errorDiv"> </div>
                                                    <div id="appendSubject" class="check-boxg">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h4></h4>
                                <section>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group req">
                                                    <label class="fg-l mb-0">Please Upload Your Photograph.</label>
                                                    <small class="d-block mb-2">Preferred image size is 500 X 500 px</small>
                                                    <div class="uploadfrm">
                                                        <p><span class="btn btn-primary theme-btn btn-file"><i class="fa fa-upload mr-2" aria-hidden="true"></i>
                                                                Add file <input  type="file" class="chk" id="validatePhoto1" name="photo" accept="image/*" onchange="readURL(this);" >
                                                            </span></p>
                                                            <small id="displayPhotoName"></small>
                                                    </div>
                                                    <div class="preview">
                                                        <img id="blah" src="" alt="" class="img-thumbnail d-none border-0">
                                                    </div>
                                                    <div class="errorDiv"> </div>
                                                </div>
                                            </div>
                                            
                                             <div class="col-sm-12">
                                                <div class="form-group req">
                                                    <label class="fg-l">Please Upload Your Resume. </label>
                                                    <div class="uploadfrm">
                                                        <p><span class="btn btn-primary theme-btn btn-file"><i class="fa fa-upload mr-2" aria-hidden="true"></i>
                                                                Add file <input type="file"  name="resume"  id="showResume" onchange="previewDocument(this);" >
                                                            </span></p>
                                                            <small id="displayResumeName"></small>
                                                    </div>
                                                    <div class="preview">
                                                        <img id="previewResume" src="" alt="" class="img-thumbnail d-none  border-0">
                                                    </div>
                                                    <div class="errorDiv"> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
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
    <script src="js/jquery.steps.js?ver=08-6" type="text/javascript"></script>
    <script src="js/pages/registration_steps.js?ver=25-08" type="text/javascript"></script>
    <script src="js/pages/registration.js?ver=25-08-2021" type="text/javascript"></script>
    <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            console.log(input.files[0]);
            if(input.files[0].size <= 5242880 && (input.files[0].type == "image/png" || input.files[0].type == "image/bmp" || input.files[0].type == "image/gif" || input.files[0].type == "image/jpeg" || input.files[0].type == "image/jpg" || input.files[0].type == "image/png" || input.files[0].type == "image/tiff" || input.files[0].type == "image/webp" ) ) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').addClass('d-block');
                    $('#blah')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
                $('#displayPhotoName').html(input.files[0].name);
                showSuccessMessage();   
            } else {
               $('#blah').attr('src', '#').removeClass('d-block');
               $('#displayPhotoName').html('');
            } 
        }
    }

   //  function readURL2(input) {
   //     if (input.files && input.files[0]) {
   //          var fileName = input.files[0].name;
   //          var ext = fileName.split('.').pop();
   //          if(input.files[0].size <= 5242880 ) {
   //              if (input.files[0].type == "image/png" || input.files[0].type == "image/bmp" || input.files[0].type == "image/gif" || input.files[0].type == "image/jpeg" || input.files[0].type == "image/jpg" || input.files[0].type == "image/png" || input.files[0].type == "image/tiff" || input.files[0].type == "image/webp" ) {
   //                  var reader = new FileReader();

   //                   reader.onload = function (e) {
   //                       $('#blah1').addClass('d-block');
   //                       $('#blah1')
   //                           .attr('src', e.target.result);
   //                   };
   //                   reader.readAsDataURL(input.files[0]);
   //                   $('#displayProductListName').html(input.files[0].name);
   //                   showSuccessMessage();   
   //              } else if(ext == 'txt') {
   //                  $('#blah1').addClass('d-block').attr('src', UPLOADS_URL+'icons/txt-icon.png');
   //                  $('#displayProductListName').html(input.files[0].name);
   //                  showSuccessMessage();   
   //              } else if(ext == 'pdf') {
   //                  $('#blah1').addClass('d-block').attr('src', UPLOADS_URL+'icons/pdf-icon.png');
   //                  $('#displayProductListName').html(input.files[0].name);
   //                  showSuccessMessage();   
   //              } else if(ext == 'doc' || ext == 'docx') {
   //                  $('#blah1').addClass('d-block').attr('src', UPLOADS_URL+'icons/docs-icon.png');
   //                  $('#displayProductListName').html(input.files[0].name);
   //                  showSuccessMessage();   
   //              } else {
   //                  $('#blah1').attr('src', '#').removeClass('d-block');
   //                  $('#displayProductListName').html('');
   //              }
   //          }
   //     }
   // }   
   
    function previewDocument(input) {
       if (input.files && input.files[0]) {
           var fileName = input.files[0].name;
            var ext = fileName.split('.').pop();
            
            if(input.files[0].size <= 5242880) {
                if(ext == 'txt') {
                    $('#previewResume').addClass('d-block').attr('src', UPLOADS_URL+'icons/txt-icon.png');
                    $('#displayResumeName').html(input.files[0].name);
                    showSuccessMessage();   
                } else if(ext == 'pdf') {
                    $('#previewResume').addClass('d-block').attr('src', UPLOADS_URL+'icons/pdf-icon.png');
                    $('#displayResumeName').html(input.files[0].name);
                    showSuccessMessage();   
                } else if(ext == 'doc' || ext == 'docx') {
                    $('#previewResume').addClass('d-block').attr('src', UPLOADS_URL+'icons/docs-icon.png');
                    $('#displayResumeName').html(input.files[0].name);
                    showSuccessMessage();   
                } else {
                    $('#previewResume').attr('src', '#').removeClass('d-block');
                    $('#displayResumeName').html('');
                }

            }
       }
   }   
        
    </script>
    </body>
</html>