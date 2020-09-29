<?php

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return redirect('/');
});


/* --------------------- Common/User Routes START -------------------------------- */
Route::get('/privacy-policy', 'WelcomeController@privacyPolicy');
Route::get('/terms-of-service', 'WelcomeController@termsOfService');

// Auth::routes();
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
Route::get('/login', 'WelcomeController@landing_index');
Route::get('/index1', 'WelcomeController@index1');
// Auth::routes(['verify' => true]);
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


    Route::any('/user', 'UserController@index');
    Route::any('/user/create', 'UserController@create');
    Route::get('/user/edit/{id?}', 'UserController@edit');
    Route::get('/user/destroy/{id}', 'UserController@destroy');

    Route::post('/updateuser', 'AdminController@updateuser');
    Route::get('/user_list', 'UserController@user_list');
    Route::get('/fetchUsers', 'UserController@fetchUsers');
    Route::get('/fetchUsers/{type?}', 'UserController@fetchUsers');
    Route::get('/user/{id?}', 'UserController@updateUser');
    Route::post('/add_user', 'UserController@store');
    Route::get('/fetchesUsers-data', 'UserController@fetchesUsers')->name('fetchesUsers.data');

    Route::get('/dashboard', 'HomeController@index')->name('home')->middleware('guard.verified:admin,admin.verification.notice');


    //Put all of your admin routes here...
});
