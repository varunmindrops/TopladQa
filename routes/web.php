<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', 'IndexController@index');
Route::get('/cma', 'IndexController@index');
Route::get('/cs', 'IndexController@index');
Route::get('/ca', 'IndexController@index');
Route::post('/contact-us', 'IndexController@feedbackFormSubmit');
Route::get('/{name}/paper/{subject_slug}', 'UserController@listFaculty');
Route::get('/faculty/{faculty_slug}', 'UserController@facultyProfile');
Route::get('/all-faculty', 'UserController@allFaculty');
Route::get('/{name}/cma-classes-videos-all-papers-subjects', 'CourseController@course')->where('name', 'cma');
Route::get('/{name}/cs-classes-videos-all-papers-subjects', 'CourseController@course')->where('name', 'cs');
Route::get('/{name}/ca-classes-videos-all-papers-subjects', 'CourseController@course')->where('name', 'ca');
Route::get('/{name}/product/{product_slug}/{product_id}', 'ProductController@show');
Route::get('/about-us', function () {return view('site.aboutus');});
Route::get('/faq', function () {return view('site.faq');});
Route::get('/privacy-policy', function () {return view('site.privacy-policy');});
Route::get('/terms-&-conditions', function () {return view('site.terms-&-conditions');});
Route::get('/refund-policy', function () {return view('site.refund-policy');});
Route::get('payment-success/{trxnid?}', 'PaymentSuccessTransectionController@index');
Route::get('/payment-failed', function () {return view('payment.payment-failed');});
//Route::get('/sitemap', function () { return view('site.sitemap'); });
Route::get('/{name}/payment-fail', function ($name) {return view('payment.capsule-payment-fail', compact('name'));});
Route::get('/{name}/payment_failed', function ($name) {return view('payment.combo_payment_failed', compact('name'));});
Route::get('/{name}/order-fail', function ($name) {return view('payment.past-papers-payment-fail', compact('name'));});
Route::get('/{name}/order-failed', function ($name) {return view('payment.mtp-payment-fail', compact('name'));});
Route::get('/{name}/failed', function ($name) {return view('payment.chapter-payment-fail', compact('name'));});
Route::get('/{name}/pay-failed', function ($name) {return view('payment.book-payment-fail', compact('name'));});
Route::get('/scholarship-failed', function () {return view('payment.scholarship-payment-fail');});
Route::get('/razorpay-failed', function () {return view('payment.razorpay-payment-fail');});
Route::get('/{name}/downloads-notes', 'DownloadController@index');
Route::get('/{name}/capsule-revision-cma', function () {return view('site.capsule-courses');})->where('name', 'cma');
Route::get('/{name}/cma-combo-offer-classes', function ($name) {return view('site.combo-classes', compact('name'));})->where('name', 'cma');
Route::get('/{name}/cs-combo-offer-classes', function ($name) {return view('site.cs-combo-classes', compact('name'));})->where('name', 'cs');
Route::get('/{name}/ca-combo-offer-exam-classes', function ($name) {return view('site.ca-combo-classes', compact('name'));})->where('name', 'ca');
Route::resource('/scholarship', 'ScholarshipController');
Route::get('/{name}/newsroom', function () {return view('site.newsroom');})->where('name', 'cma');
Route::get('/{name}/cs-newsroom', function () {return view('site.cs-newsroom');})->where('name', 'cs');
Route::get('/{name}/ca-newsroom', function () {return view('site.ca-newsroom');})->where('name', 'ca');
Route::get('/{name}/cma-mtp-sale', function ($name) {return view('site.mtp-sale', compact('name'));})->where('name', 'cma');
Route::get('/{name}/ca-rtp-sale', function ($name) {return view('site.ca-rtp-sale', compact('name'));})->where('name', 'ca');
Route::get('/{name}/cma-past-papers', function () {return view('site.past-papers-sale');})->where('name', 'cma');
Route::get('/{name}/cs-past-papers', function () {return view('site.cs-past-papers-sale');})->where('name', 'cs');
Route::get('/{name}/ca-past-papers', function () {return view('site.ca-past-papers-sale');})->where('name', 'ca');
Route::get('/{name}/cma-chapter-sale', 'ChapterController@index')->where('name', 'cma');
Route::post('chapter-sale/fetch', 'ChapterController@fetch')->name('chapterprice.fetch');
Route::post('chapter-sale/fetch_chapters', 'ChapterController@fetch_chapters')->name('chapterprice.fetch_chapters');
Route::get('/{name}/cma-books', function () {return view('site.cma-books-sale');})->where('name', 'cma');

Route::resource('/feedback-form', 'FeedbackFormController');
Route::get('/view-all-feedbacks', 'ViewFeedbackController@index');

Route::get('/{name}/cma-combo-offer', function () {return view('site.cma-combo-offer');});
Route::get('/{name}/cs-combo-offer', function () {return view('site.cs-combo-offer');});
Route::get('/{name}/ca-combo-offer', function () {return view('site.ca-combo-offer');});

Route::get('/{name}/demo-videos', 'DemoVideosController@index');
// Route::get('/{name}/cma-face-to-face-classes', function () { return view('site.face2face'); })->where('name', 'cma');
// Route::get('/{name}/cs-face-to-face-classes', function () { return view('site.cs-face2face'); })->where('name', 'cs');

Route::resource('/pay-now', 'PayController');
Route::resource('/post-ca-cma-cs-jobs-free-hire', 'JobPostController');

Route::get('/jobs-ca-cma-cs', 'ViewJobPostController@index');
Route::get('/{name}/jobs', 'ViewJobPostController@jobPosts');
// Route::get('/{segment}/job-opening/{post}/{id}', 'ViewJobPostController@jobDescription');

Route::get('/{segment}/{level}', 'CourseController@courseLevel')->where('segment', 'cma|ca|cs');

// Laravel Vue Route
Route::get('/user/{any}', function () {return view('index');})->where('any', '.*');
Route::get('/user', function () {return view('index');});
Route::get('/admin/{any}', function () {return view('index');})->where('any', '.*');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'super-admin', 'revalidate'], 'prefix' => 'admin-login', 'namespace' => 'SuperAdmin'], function () {
    Route::resource('profile', 'ProfileController');
    Route::resource('teacher', 'TeacherController');
    Route::resource('student', 'StudentController');
    Route::resource('coupon', 'CouponController');
    Route::resource('order', 'OrderController');
    Route::resource('subject', 'SubjectController');
    Route::resource('feedback', 'FeedbackController');
    Route::resource('all-job-post', 'AllJobPostController');
    Route::resource('pending-job-post', 'PendingJobPostController');
    Route::resource('approved-job-post', 'ApprovedJobPostController');
    Route::resource('rejected-job-post', 'RejectedJobPostController');
    Route::resource('orders', 'CounsellorOrderController');
    Route::resource('change-password', 'ChangePasswordController');
});

Route::group(['prefix' => 'counsellor', 'namespace' => 'Counsellor'], function () {
    Route::resource('order', 'OrderController');
    Route::get('new-order', 'NewOrderController@index');
    Route::resource('confirm', 'CreateOrderController');
    Route::resource('create', 'StudentOrderController');
    Route::post('new-order/fetch', 'NewOrderController@fetch')->name('neworder.fetch');
    Route::post('new-order/fetch_subjects', 'NewOrderController@fetch_subjects')->name('neworder.fetch_subjects');
    Route::post('new-order/fetch_chapters', 'NewOrderController@fetch_chapters')->name('neworder.fetch_chapters');
});

Route::group(['prefix' => 'fulfilment', 'namespace' => 'OrderFulfilmentTeam'], function () {
    Route::resource('order', 'OrderController');
    Route::resource('delivered-order', 'DeliverOrderController');
    Route::resource('pending-order', 'PendingOrderController');
    Route::resource('incompleted-book-order', 'IncompletedBookOrderController');
    Route::resource('incompleted-video-order', 'IncompletedVideoOrderController');
});

Route::group(['middleware' => ['auth', 'teacher', 'revalidate'], 'prefix' => 'teacher', 'namespace' => 'Teacher'], function () {
    Route::resource('profile', 'ProfileController');
    Route::resource('course', 'CourseController');
    Route::resource('product', 'ProductController');
    Route::resource('order', 'OrderController');
    Route::resource('change-password', 'ChangePasswordController');
    Route::post('teacher-subject', 'CourseController@teacherSubject');
    Route::resource('upload-files', 'FileController');
    Route::resource('view-files', 'ViewFileController');
});

Route::group(['middleware' => ['auth', 'student', 'revalidate'], 'prefix' => 'student', 'namespace' => 'Student'], function () {
    Route::resource('profile', 'ProfileController');
    Route::resource('order', 'OrderController');
    Route::resource('change-password', 'ChangePasswordController');
    Route::resource('address', 'AddressController');
});

Route::group(['middleware' => ['checkout.login', 'revalidate']], function () {
    // Route::resource('/cart', 'CartController')->only(['index', 'destroy']);
    // Route::resource('/checkout', 'CheckoutController');
    Route::resource('/order', 'OrderController');
});

Route::group(['middleware' => ['auth'], 'namespace' => 'Common'], function () {
    Route::resource('photo', 'ProfilePicController');
});

Route::prefix('/payment')->namespace('Payment')->group(function () {
    Route::post('complete-page', 'PaymentController@store');
    Route::post('complete-payment', 'PaymentController@Complete');
    Route::post('scholarship', 'ScholarshipPaymentController@Complete');
    Route::post('pay-us', 'PaynowController@store');
    Route::post('pay-us-now', 'PaynowController@Complete');
});

Route::prefix('/{name}/payment')->namespace('Payment')->group(function () {
    Route::post('pay', 'CapsulePaymentController@store');
    Route::post('complete', 'CapsulePaymentController@Complete');
    Route::post('checkout', 'ComboPaymentController@store');
    Route::post('complete-pay', 'ComboPaymentController@Complete');
    Route::post('papers', 'PastPaperPaymentController@store');
    Route::post('complete-order', 'PastPaperPaymentController@Complete');
    Route::post('mtp', 'MtpPaymentController@store');
    Route::post('complete-mtp-order', 'MtpPaymentController@Complete');
    Route::post('rtp', 'RtpPaymentController@store');
    Route::post('complete-rtp-order', 'RtpPaymentController@Complete');
    Route::post('chapter', 'ChapterPaymentController@store');
    Route::post('complete-chapter-order', 'ChapterPaymentController@Complete');
    Route::post('book', 'BookPaymentController@store');
    Route::post('complete-book-order', 'BookPaymentController@Complete');
});

Route::prefix('student')->namespace('Student')->group(function () {
    Route::resource('/checkout-login', 'CheckoutLoginController');
});

//Route::resource('/cart', 'CartController')->except(['index', 'destroy']);
Route::post('/stealth-login', 'UserController@stealthLogin');
Route::post('/superadmin-login-id', 'UserController@superadminLoginWithId');

Route::redirect('/cma-downloads-notes', '/cma/downloads-notes', 301);
Route::redirect('/ca-downloads-notes', '/ca/downloads-notes', 301);
Route::redirect('/cs-downloads-notes', '/cs/downloads-notes', 301);

Route::prefix('/admin-login')->namespace('SuperAdmin')->group(function () {
    Route::resource('course-level', 'ManageCourseLevelController');
    Route::post('course-level/upload', 'ManageCourseLevelController@upload');
});

Route::view('/raghavacademy', 'raghavacademy');

Route::post('/downloads', 'DownloadController@store');

Route::post('/testingcicd', 'DownloadController@store');
