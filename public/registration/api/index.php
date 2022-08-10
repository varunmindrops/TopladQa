<?php
date_default_timezone_set("Asia/Kolkata");
header('Content-Type: application/json');

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once 'vendor/autoload.php';
require_once "config.inc.php";
require_once "models/Database.php";
require_once "functions/common.php";
require_once "functions/user.php";
require_once "functions/product.php";

$app = new \Slim\App;

$app->get('/', function ($request, $response, $args) {
    sendResponse(array(), STATUS_OK, 'Welcome');
});


/*------------Get API's---------------*/

// $app->get('/getAllSubject', 'getAllSubject');
$app->get('/getAllCourse', 'getAllCourse');
$app->get('/getCourseLanguage', 'getCourseLanguage');
$app->get('/getTeacherCourse/{teacher_id}', 'getTeacherCourse');
$app->get('/getTeacherSubject/{teacher_id}/{course_id}', 'getTeacherSubject');
$app->get('/getAttempt/{course_id}', 'getAttempt');
$app->get('/getDeliveryType', 'getDeliveryType');

$app->get('/getProductData/{product_id}', 'getProductData');
$app->get('/getExperience', 'getExperience');

/*------------Post API's---------------*/

$app->post('/getAllCourseLevel', 'getAllCourseLevel');
$app->post('/getSubject', 'getSubject');
$app->post('/teacherRegistration', 'teacherRegistration');
$app->post('/registerProduct', 'registerProduct');
$app->post('/updateProduct', 'updateProduct');

/*------------Send Mail API's----------*/

$app->post('/sendProductFormMail', 'sendProductFormMail');
$app->get('/sendProductMailToAll', 'sendProductMailToAll');
$app->get('/sendWelcomeMail', 'sendWelcomeMailToAll');


/* -------Cron API's---------- */

//Run the App
$app->run();
