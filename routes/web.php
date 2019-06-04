<?php

// AUTH
Route::group([
//    'prefix' => 'auth',
//    'as' => 'auth.',
    'namespace' => 'Auth',
], function () {

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register', 'RegisterController@showRegistrationForm');
    Route::post('register', 'RegisterController@register')->name('register');

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
//    Route::post('password/reset', 'ResetPasswordController@reset');
});


Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/chat-room', 'HomeController@chatroom')->name('chatroom');
Route::post('send-conversation', 'HomeController@send_conversation')->name('send_conversation');

Route::fallback(function(){
    return response()->view('errors.404', [], 404);
});
