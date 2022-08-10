<?php

session_start();
require_once "models/UserDAO.php";

function userLogin($request, $response, $args) {
    $code = STATUS_OK;
    $message = 'Success';
    $userDAO = new UserDAO();
    $req = $request->getParams();
    $status = false;
    $arrRow = null;

    if (empty($req['phone']) || empty($req['password'])) {
        $code = PARAMETER_MISSING;
        $message = 'Required parameter missing!';
    } else {
        $arrRow = $userDAO->userLogin($req);

        if (empty($arrRow)) {
            $code = STATUS_UNAUTHORIZED;
            $message = 'Invalid Credentials!';
        } else {
            $device_id = (empty($req['device_id'])) ? '155440' : $req['device_id'];
            $arrRow['token'] = generateToken($arrRow['id'], $arrRow['phone'], $device_id);
            $userDAO->updateToken($arrRow['id'], $arrRow['token'], $device_id);
        }
    }
    sendResponse($arrRow, $code, $message);
}

function teacherRegistration($request, $response, $args) {
    $code = STATUS_OK;
    $message = 'Success';
    $userDAO = new UserDAO();
    $req = $request->getParams();
    $status = false;
    $arrRow = null;
    
    if (!empty($req['name']) && !empty($req['email1']) && !empty($req['phone1']) && !empty($req['sales_phone']) && !empty($req['sales_name']) && 
        !empty($req['tech_phone']) && !empty($req['tech_name']) && !empty($req['total_experience']) && 
        !empty($req['teach_experience']) && !empty($req['qualification']) && !empty($req['achievement']) && 
        !empty($req['award']) && !empty($req['interest']) && !empty($req['bio']) && 
        !empty($req['teaching_course']) && !empty($req['teaching_level']) && !empty($req['subject_id']) && 
        !empty($_FILES['photo']['name']) && !empty($_FILES['resume']['name']) ) {

        $arrRow = $userDAO->checkExistingCredentials($req);

        if (empty($arrRow)) {

            $req['photo'] = uploadImage('photo', 'photograph');
            $req['resume_url'] = uploadImage('resume', 'resume');

            $req['user_id'] = $userDAO->insertUser($req);

            $userDAO->teacherRegistration($req);

            foreach ($req['teaching_course'] as $value) {
                $userDAO->addTeacherCourse($req, $value);
            }

            foreach ($req['teaching_level'] as $value) {
                $userDAO->addTeacherCourseLevel($req, $value);
            }

            foreach ($req['subject_id'] as $value) {
                $userDAO->addTeacherSubject($req, $value);
            }

            // foreach ($req['language'] as $value) {
            //     $userDAO->addTeacherLanguage($req, $value);
        
            // }
            $arrRow['user_id'] = $req['user_id'];
        } else {
            $code = STATUS_BAD_REQUEST;
            $message = 'Email or Phone already exists!';
        }
    } else {
        $code = PARAMETER_MISSING;
        $message = 'Please fill all the fields!';
    }

    sendResponse($arrRow, $code, $message);
}

// function getAllSubject($request, $response, $args) {
//     $code = STATUS_OK;
//     $message = 'Success';
//     $userDAO = new UserDAO();
//     $arrRow = null;

//     $arrRow = $userDAO->getAllSubject();

//     sendResponse($arrRow, $code, $message);
// }

function getAllCourse($request, $response, $args) {
    $code = STATUS_OK;
    $message = 'Success';
    $userDAO = new UserDAO();
    $arrRow = null;

    $arrRow = $userDAO->getAllCourse();

    sendResponse($arrRow, $code, $message);
}

function getAllCourseLevel($request, $response, $args) {
    $code = STATUS_OK;
    $message = 'Success';
    $userDAO = new UserDAO();
    $req = $request->getParams();
    $status = false;
    $arrRow = null;

    $arrRow = $userDAO->getAllCourseLevel($req);

    sendResponse($arrRow, $code, $message);
}

function getSubject($request, $response, $args) {
    $code = STATUS_OK;
    $message = 'Success';
    $userDAO = new UserDAO();
    $req = $request->getParams();
    $status = false;
    $arrRow = null;

    $arrRow = $userDAO->getSubject($req);

    sendResponse($arrRow, $code, $message);
}

function getCourseLanguage($request, $response, $args) {
    $code = STATUS_OK;
    $message = 'Success';
    $userDAO = new UserDAO();
    $arrRow = null;

    $arrRow = $userDAO->getCourseLanguage();

    sendResponse($arrRow, $code, $message);
}

function sendProductFormMail($request, $response, $args) {
    $code = STATUS_OK;
    $message = 'Success';
    $userDAO = new UserDAO();
    $req = $request->getParams();
    $status = false;
    $arrRow = null;

    if($req['user_id'] != "")
    {
    
    require '../sendgrid-php.php';
    $api_key = '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';

    $email = new \SendGrid\Mail\Mail();
    $email->setFrom("info@toplad.in", "Toplad");
    $email->setSubject("Toplad Product Form");
    $email->addTo(
    trim($req['email']),
    trim($req['name']),
    [
        "name" => trim(ucwords($req['name'])),
        "user_id" => trim($req['user_id']),
    ],
    0
   );

    $email->setTemplateId('d-cada56c5ff91486786f4aff04af9e7b0');
    $sendgrid = new \SendGrid($api_key);

    try {
        $response = $sendgrid->send($email);
        print $response->statusCode() . "\n";
        print_r($response->headers());
        print $response->body() . "\n";
    } catch (Exception $e) {
        echo 'Caught exception: '. $e->getMessage() ."\n";
    }

}

    // $arrRow = $userDAO->sendProductFormMail($req);

    sendResponse($arrRow, $code, $message);

}

function getTeacherCourse($request, $response, $args) {
    //    pre(  );
        $code = STATUS_OK;
        $message = 'Success';
        $userDAO = new UserDAO();
        $arrRow = null;
    
        $arrRow = $userDAO->getTeacherCourse( $args['teacher_id'] );
    
        sendResponse($arrRow, $code, $message);
    }

function getTeacherSubject($request, $response, $args) {
//    pre(  );
    $code = STATUS_OK;
    $message = 'Success';
    $userDAO = new UserDAO();
    $arrRow = null;

    $arrRow = $userDAO->getTeacherSubject( $args['teacher_id'], $args['course_id'] );

    sendResponse($arrRow, $code, $message);
}

function getExperience($request, $response, $args) {
    $code = STATUS_OK;
    $message = 'Success';
    $userDAO = new UserDAO();
    $arrRow = null;

    $arrRow = $userDAO->getExperience();

    sendResponse($arrRow, $code, $message);
}

function sendProductMailToAll($request, $response, $args) {
    $code = STATUS_OK;
    $message = 'Success';
    $userDAO = new UserDAO();
    $arrRow = null;
    
    $arrRow = $userDAO->sendProductMailToAll();
    
    foreach ($arrRow as $key => $val) {
      $data = [
        "id" => trim($val['id']),
        "name" => trim($val['name']),
        "email" => trim($val['email'])
      ];
      
      sendProductMail($data);
      $userDAO->updateSentProductMailStatus($val['id']);
    }

    sendResponse($arrRow, $code, $message);
}

function sendProductMail($data)
{
   require '../sendgrid-php.php';
    $api_key = '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';

    $email = new \SendGrid\Mail\Mail();
    $email->setFrom("info@toplad.in", "Toplad");
    $email->setSubject("Toplad Product Form");

    $email->addTo($data['email'], $data['name'], [
        "name" => trim(ucwords($data['name'])),
        "user_id" => trim($data['id']),
    ],
    0
   );

    $email->setTemplateId('d-cada56c5ff91486786f4aff04af9e7b0');
    $sendgrid = new \SendGrid($api_key); 

    try {
        $response = $sendgrid->send($email);
        print $response->statusCode() . "\n";
        print_r($response->headers());
        print $response->body() . "\n";
    } catch (Exception $e) {
        echo 'Caught exception: '. $e->getMessage() ."\n";
    }
}

function getAttempt($request, $response, $args) {
    $code = STATUS_OK;
    $message = 'Success';
    $userDAO = new UserDAO();
    $arrRow = null;

    $arrRow = $userDAO->getAttempt( $args['course_id'] );

    sendResponse($arrRow, $code, $message);
}

function sendWelcomeMailToAll($request, $response, $args) {
    $code = STATUS_OK;
    $message = 'Success';
    $userDAO = new UserDAO();
    $arrRow = null;
    
    $arrRow = $userDAO->sendWelcomeMailToAll();
    
    foreach ($arrRow as $key => $val) {
      $data = [
        "id" => trim($val['id']),
        "name" => trim($val['name']),
        "email" => trim($val['email'])
      ];
      
      sendWelcomeMail($data);
    }

    sendResponse($arrRow, $code, $message);
}

function sendWelcomeMail($data)
{
   require '../sendgrid-php.php';
    $api_key = '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';

    $email = new \SendGrid\Mail\Mail();
    $email->setFrom("info@toplad.in", "Toplad");
    $email->setSubject("Welcome to Toplad");

    $email->addTo($data['email'], $data['name'], [
        "name" => trim(ucwords($data['name']))
    ],
    0
   );

    $email->setTemplateId('d-c9eff106358b427bbf189bfb102ecd5a');
    $sendgrid = new \SendGrid($api_key); 

    try {
        $response = $sendgrid->send($email);
        print $response->statusCode() . "\n";
        print_r($response->headers());
        print $response->body() . "\n";
    } catch (Exception $e) {
        echo 'Caught exception: '. $e->getMessage() ."\n";
    }
}