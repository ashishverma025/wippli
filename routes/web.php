<?php

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return redirect('/');
});


/* --------------------- Common/User Routes START -------------------------------- */
Route::get('/privacy-policy', 'WelcomeController@privacyPolicy');
Route::get('/terms-of-service', 'WelcomeController@termsOfService');

Auth::routes();
// Google login
Route::get('/google-login', 'SocialAuthGoogleController@redirect');
Route::get('/google-callback', 'SocialAuthGoogleController@callback');

// Facebook login
Route::post('/registration', 'Auth\RegisterController@register');
Route::post('/signin', 'Auth\LoginController@signIn');

Route::get('/seomoUserLogin', 'Auth\LoginController@seomoUserLogin');
Route::get('/seomoUserRegister', 'Auth\RegisterController@seomoUserRegister');


Route::post('/sign-in', 'Auth\RegisterController@signIn');
Route::get('/facebook-login', 'SocialAuthFacebookController@redirect');
Route::get('/facebook-callback', 'SocialAuthFacebookController@callback');
Route::get('/', 'WelcomeController@landing_index');
Route::get('/index1', 'WelcomeController@index1');
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get("/homes", ["uses" => "HomeController@checkMD", "middleware" => "checkType:2"]);


Route::get('admin', 'HomeController@index')->name('admin');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/change_password', 'UsersController@change_pwd');
Route::post('/change_password', 'UsersController@update_changed_pwd');

Route::get('/admin', 'Auth\LoginController@showLoginForm');
/* --------------------- Common/User Routes END -------------------------------- */


/* ----------------------- Admin Routes START -------------------------------- */

Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function() {
    /**
     * Admin Auth Route(s)
     */
    Route::namespace('Auth')->group(function() {

        //Login Routes
        Route::get('/login', 'LoginController@showLoginForm')->name('login');

        Route::post('/login', 'LoginController@login');
        Route::post('/logout', 'LoginController@logout')->name('logout');
        Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        //Reset Password Routes
        Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.update');

        // Email Verification Route(s)
        Route::get('email/verify', 'VerificationController@show')->name('verification.notice');
        Route::get('email/verify/{id}', 'VerificationController@verify')->name('verification.verify');
        Route::get('email/resend', 'VerificationController@resend')->name('verification.resend');
    });

    // settings route
    Route::get('/settings', 'AdminController@settings');
    Route::post('/settings', 'AdminController@update_settings');


    // change password route
    Route::get('/change_password', 'AdminController@change_pwd');
    Route::post('/change_password', 'AdminController@update_changed_pwd');
    // user's Routes
    Route::any('/addUser', 'AdminController@addUser');
    Route::post('/updateuser', 'AdminController@updateuser');
    Route::get('/user_list', 'UserController@user_list');
    Route::get('/user_list/{type?}', 'UserController@user_list');
    Route::get('/fetchUsers', 'UserController@fetchUsers');
    Route::get('/fetchUsers/{type?}', 'UserController@fetchUsers');
    Route::get('/user/{id?}', 'UserController@updateUser');
    Route::get('/user/delete/{id}', 'UserController@destroy');
    Route::post('/add_user', 'UserController@store');
    Route::get('/fetchesUsers-data', 'UserController@fetchesUsers')->name('fetchesUsers.data');

    Route::get('/edit/{id?}', 'UserController@edit');
    Route::post('/uploadstudents', 'UserController@uploadStudentByCsv');
    Route::get('/dashboard', 'HomeController@index')->name('home')->middleware('guard.verified:admin,admin.verification.notice');


    //Put all of your admin routes here...
});
/* ----------------------- Admin Routes END -------------------------------- */

/* ----------------------- Site Routes START -------------------------------- */

/** Site Tutors/User Route(s) */
Route::get('/becometutor', 'UsersController@becomeTutor');
Route::post('/becomea_tutor', 'UsersController@becomeaTutor');
Route::get('/editprofile/{id?}', 'UsersController@editprofile');
Route::get('/userprofile', 'UsersController@viewProfile');
Route::post('/changecoverbanner', 'UsersController@changeCoverBanner');

Route::post('/sendotp', 'UsersController@sendOtp');
Route::post('/validateotp', 'UsersController@validateOtp');

Route::post('/updateprofile', 'UsersController@updateProfile');
Route::post('/getSubjectSyllabusListById', 'UsersController@getSubjectSyllabusListById');
Route::get('becomeaeducation_partner/{type?}', 'UsersController@becomeaEducationPartner')->middleware('verified');
Route::post('/learningcenter', 'UsersController@createLearningCenter');
// Route::get('/lc/dashboard', 'LearningCenterController@dashboard')->middleware('verified');
Route::get('/lc/dashboard', 'users\DashboardController@index')->middleware('verified');


/** Site Learning Center Students Route */
Route::get('/lcstudent/{id?}', 'StudentsController@addLcStudent');
Route::post('/lcstudents', 'StudentsController@addLcStudents');
Route::post('/addLcGlobalStudent', 'StudentsController@addLcGlobalStudent');
Route::post('/uploadstudents', 'StudentsController@uploadStudentByCsv');
Route::get('/studentlist', 'StudentsController@studentList');
Route::get('/fetchstudents', 'StudentsController@fetchStudents');
Route::post('/searchStudents', 'StudentsController@searchStudents');
Route::get('/joinLc/{studentId}', 'StudentsController@joinLc');

/** Site Email check Route */
Route::post('/isemailexist', 'UsersController@isEmailExist');

/** Site Classes Route */
Route::get('fetchclasses', 'LearningCenterController@fetchClasses');
Route::get('/addclass/{classId}', 'LearningCenterController@addClass');
Route::get('/addclass', 'LearningCenterController@addClass');
Route::post('/addclass', 'LearningCenterController@saveClass');
Route::get('/classes', 'LearningCenterController@classesList');
Route::get('/assignclass', 'ClassesController@assignClass');
Route::post('/assignclass', 'ClassesController@addClassToGlobalStudents');

/** Site Subjects Route */
Route::get('/addsubjects/{subId?}', 'LearningCenterController@addSubject');
Route::post('/addsubjects', 'LearningCenterController@saveSubject');
Route::get('/subjects', 'LearningCenterController@subjectsList');
Route::get('/fetchsubjects', 'LearningCenterController@fetchSubjects');
Route::get('/deletesubjects/{subId?}', 'LearningCenterController@deleteSubject');


/* ----------------------- Site Routes END -------------------------------- */


/* ----------------------- Student Routes START -------------------------------- */

Route::get('/student', 'student\DashboardController@index');
Route::prefix('/student')->name('student')->namespace('student')->middleware('verified')->group(function() {
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/dashboard1', 'DashboardController@index1');
    Route::get('/attendance', 'AttendanceController@attendance');
    Route::get('/fetchattendance', 'AttendanceController@fetchattendance');
    Route::get('/test', 'DashboardController@test');
    Route::get('/calendar', 'AttendanceController@attendanceCalendar');
});


/** Site Listing Route */
/** Listing Request */
Route::get('/listing/listing_request', 'ListingController@listingRequest');
Route::post('/listing/listing_request', 'ListingController@listingRequest');
Route::get('/listing/listing_request/{id?}', 'ListingController@listingRequest');
Route::get('/listing/delete_request/{id?}', 'ListingController@deleteRequest');
Route::get('/listing/duplicate_request/{id?}', 'ListingController@duplicateRequest');

/** Listing Class */
Route::get('/listing/listing_class', 'ListingController@listingClass');
Route::post('/listing/listing_class', 'ListingController@listingClass');
Route::get('/listing/listing_class/{id?}', 'ListingController@listingClass');
Route::get('/listing/duplicate_class/{id?}', 'ListingController@duplicateClass');
Route::get('/listing/delete_class/{id?}', 'ListingController@deleteClass');


Route::get('/listing', 'ListingController@listingResources');
Route::post('/listing', 'ListingController@listingResources');


/** Site Listing Route */
Route::get('/inbox', 'StudentsController@inbox');
Route::get('/account', 'AccountController@Account');
Route::get('/trust_verification', 'AccountController@trustVerification');
Route::get('/subscribe', 'SubscribeController@Subscribe');
Route::get('/subscribePlan/{id}', 'SubscribeController@subscribePlan');
Route::get('/plans', 'SubscribeController@Plans');
Route::get('/getOffer/{id}', 'SubscribeController@getOffer');
Route::get('/inviteafriend', 'FriendController@inviteaFriend');
Route::post('/inviteafriend', 'FriendController@inviteaFriend');
Route::get('/subscriptionDetails', 'SubscribeController@subscriptionDetails');
Route::get('/subscriptionCancel/{id}', 'SubscribeController@subscriptionCancel');

/* ----------------------- Student Routes END -------------------------------- */

/* ----------------------- Online Practice -------------------------------- */
Route::get("check-mw", ["uses" => "HomeController@checkMD", "middleware" => "checkType:2"]);
Route::get('/email-verify/{id}/{LcId}', 'UsersController@emailverify');
Route::get('/onlinePractice', 'StudentsController@onlinePractice');
Route::get('/onlinePractice/{id}', 'StudentsController@onlinePractice');
Route::post('/onlinePractice', 'StudentsController@onlinePractice');

/* ----------------------- Online Exam -------------------------------- */

Route::get('/onlineExam/step-1','OnlineExamController@Step1');
Route::post('/onlineExam/start','OnlineExamController@index');
Route::get('/onlineExam/start','OnlineExamController@index');
//Route::get('/onlineExam/{id}','OnlineExamController@index');
//Route::post('/onlineExam','OnlineExamController@index');

/* -----------------------Frontend Ajax Routes ----------------------------------------- */
Route::get('/checkmail', 'StudentsController@checkMail');
Route::post('/checkexistemail', 'AjaxController@checkExistEmail');
Route::post('/saveRecord', 'AjaxController@saveRecord');
Route::post('/saveAnswered', 'AjaxController@saveAnswered');
Route::post('/questionAttempt', 'AjaxController@questionAttempt');
Route::post('/progressStatus', 'AjaxController@progressStatus');
Route::post('/removeProgress', 'AjaxController@removeProgress');
Route::post('/saveTransaction', 'AjaxController@saveTransaction');


/* MOBILE VERIFICATION OTP SEND */
Route::get('/sendopt', function() {
    
});

