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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index')->name('home');


//sendmail
Route::get('mailForm','MailController@mailForm');

Route::post('sendMail', 'MailController@sendMail')->name('send.mail');


//STUDENTS Data
Route::get('/showStudents','StudentController@showStudents');

Route::get('/showForm', 'StudentController@showForm'); //open register form 

Route::post('/registerStudent', 'StudentController@registerStudent')->name('student.register'); //insert

Route::get('/editStudent/{id}','StudentController@editStudent')->name('student.edit'); //open form for edit

Route::post('/updateStudent/{id}', 'StudentController@updateStudent')->name('student.update'); //update in database

Route::get('/deleteStudent/{id}','StudentController@deleteStudent');  //permanent delete

Route::get('/softDeleteStudent/{id}','StudentController@softDeleteStudent'); //soft delete

Route::get('/restoreAllSoftDeletes','StudentController@restoreAllSoftDeletes');

//BOOKS DATA
Route::get('/showBooks','BookController@showBooks');

Route::get('/bookForm', 'BookController@bookForm');

Route::post('/registerBook', 'BookController@registerBook')->name('book.register'); //insert

Route::get('/assignBook/{id}', 'BookController@assignBook'); 

Route::post('/updateBook/{id}', 'BookController@updateBook');  //update database after assigned

Route::get('/returnBook/{id}','BookController@returnBook');

Route::get('/practiceBook','BookController@practiceBook');


//reviews
Route::get('/reviewSession', 'ReviewController@reviewSession');

Route::post('/postReview', 'ReviewController@postReview');


//authentication for user
Route::get('/showUsers', 'UserLoginController@getAllUsers');  //open page

//Route::get('/registrationpage', 'UserLoginController@registrationpage');  //open registration page

//Route::post('/registerUser', 'UserLoginController@registerUser')->name('user.register');

//Route::post('/loginUser', 'UserLoginController@loginUser')->name('user.login');

//Route::get('/logoutUser', 'UserLoginController@logoutUser');


#Auth functions exploration
Auth::routes();

Route::get('/addImage', 'Auth\ImageController@addImage');

Route::post('/postImage', 'Auth\ImageController@postImage')->name('image.post');
/*Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Confirm Password (added in v6.2)
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify'); // v6.x
/* Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify'); // v5.x */
// Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');




