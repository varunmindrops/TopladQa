$(function () {
    var form = $('#facultyOnBoardForm');
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.closest('.form-group').find('.errorDiv').html(error);
            element.closest('.form-group').find('.error').css("color", "red");
        },
        rules: {
            name: {
                required: true,
                lettersOnly: true
            },
            email1: {
                required: true,
                email: true,
                customEmail: true
            },
            email2: {
                required: false,
                email: true,
                customEmail: true
            },
            phone1: {
                required: true,
                minlength: 10,
                maxlength: 10,
                numberNotStartWithZero: true
            },
            phone2: {
                required: false,
                minlength: 10,
                maxlength: 10,
                numberNotStartWithZero: true
            },
            sales_phone: {
                required: true,
                minlength: 10,
                maxlength: 10,
                numberNotStartWithZero: true
            },
            sales_name: {
                required: true,
                lettersOnly: true
            },
            tech_phone: {
                required: true,
                minlength: 10,
                maxlength: 10,
                numberNotStartWithZero: true
            },
            tech_name: {
                required: true,
                lettersOnly: true
            },
            "teaching_course[]": {
                required: true
            },
            "teaching_level[]": {
                required: true
            },
            "subject_id[]": {
                required: true
            },
            // "language[]": {
            //     required: true
            // },
            total_experience: {
                required: true
            },
            teach_experience: {
                required: true
            },
            qualification: {
                required: true
            },
            achievement: {
                required: true
            },
            award: {
                required: true
            },
            interest: {
                required: true
            },
            bio: {
                required: true
            },
            photo: {
                required: function() {
                    if($('#validatePhoto1')[0].files.length) {
                        return true;
                    } else {
                        $('#blah').attr('src', '#').removeClass('d-block');
                        $('#displayPhotoName').html('');
                        return true;
                    }
                },
                accept: "image/*",
                filesize: 5242880
            },
            // price_list_pic: {
            //     required: function() {
            //         if($('#validatePhoto2')[0].files.length) {
            //             return true;
            //         } else {
            //             $('#blah1').attr('src', '#').removeClass('d-block');
            //             $('#displayProductListName').html('');
            //             return true;
            //         }
            //     },
            //     filesize: 5242880
            // },
            resume: {
                required: function() {
                    if($('#showResume')[0].files.length) {
                        return true;
                    } else {
                        $('#previewResume').attr('src', '#').removeClass('d-block');
                        $('#displayResumeName').html('');
                        return true;
                    }
                },
                extension: "doc|docx|pdf|txt",
                filesize: 5242880
            }
        },
        messages : {
            phone1 : {
                minlength: "please enter 10 digits"
            },
            phone2 : {
                minlength: "please enter 10 digits"
            },
            sales_phone : {
                minlength: "please enter 10 digits"
            },
            tech_phone : {
                minlength: "please enter 10 digits"
            },
            resume : {
                    extension: "Please enter resume of valid type document , pdf or text file"
            }
        }
    });
    
    form.children('#wizard').steps({
        headerTag: "h4",
        bodyTag: "section",
        transitionEffect: "fade",
        onStepChanging: function (event, currentIndex, newIndex)
        {
            let goFurther = true
            // if(currentIndex == 1 && newIndex == 2) {
                // if(levelData.includes('2')) {
                //     alert("Currently data is not available for CA. We are working on it.");
                //     goFurther = false
                // }
            // }

            if(!goFurther) {
                return
            }

            if (currentIndex > newIndex) {
                if (newIndex === 0) {
                    $('.wizard > .steps ul').removeClass('step-2').addClass('step-1');
                }
                if (newIndex === 1) {
                    $('.wizard > .steps ul').removeClass('step-3').addClass('step-2');
                }
                if (newIndex === 2) {
                    $('.wizard > .steps ul').removeClass('step-4').addClass('step-3');
                }
                if (newIndex === 3) {
                    $('.wizard > .steps ul').removeClass('step-5').addClass('step-4');
                }
                 
                return true;
            }

            if (!form.valid()) {
                return form.valid();
            }
            form.validate().settings.ignore = ":disabled,:hidden";
            
            if (newIndex === 1) {
                $('.wizard > .steps ul').addClass('step-2');
            } else {
                $('.wizard > .steps ul').removeClass('step-2');
            }
            if (newIndex === 2) {
                ajaxPostJson(populateCourseLevel, "getAllCourseLevel", levelData);
                $('.wizard > .steps ul').addClass('step-3');    
            } else {
                $('.wizard > .steps ul').removeClass('step-3');
            }
            if (newIndex === 3) {
                ajaxPostJson(populateSubject, "getSubject", subjectData);
                $('.wizard > .steps ul').addClass('step-4');
            } else {
                $('.wizard > .steps ul').removeClass('step-4');
            }
            if (newIndex === 4) {
                $('.wizard > .steps ul').addClass('step-5');
            } else {
                $('.wizard > .steps ul').removeClass('step-5');
            }
            return form.valid();
        },
        onFinishing: function (event, currentIndex)
        {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex)
        {
            event.preventDefault();
            var formData = new FormData(form[0]);            
            for(var pair of formData.entries()) {
                //   console.log(pair[0]+ ', '+ pair[1]); 
                if( typeof(pair[1]) == 'string') {
                    pair[1].trim();
                }
            }               
            ajaxFormData(teacherRegistration, 'teacherRegistration', formData);
        },
        labels: {
            finish: "Submit",
            next: "Continue",
            previous: "Back"
        }
    });

});