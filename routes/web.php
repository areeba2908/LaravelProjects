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

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');;

Route::get('sendmail', function () {
   
    $details = [
        'title' => 'Mail from Nicesnippets.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('areeba.ayub@nextgeni.com')->send(new \App\Mail\MyTestMail($details));
   
    dd("Email is Sent.");
});

//STUDENTS Data
Route::get('/showStudents','StudentController@showStudents');

Route::post('/showForm', 'StudentController@showForm'); 

Route::post('/registerStudent', 'StudentController@registerStudent')->name('student.register'); //insert

Route::get('/deleteStudent/{id}','StudentController@deleteStudent');

Route::get('/editStudent/{id}','StudentController@editStudent')->name('student.edit'); //open form for edit

Route::post('/updateStudent/{id}', 'StudentController@updateStudent')->name('student.update'); //update in database


//BOOKS DATA
Route::get('/showBooks','BookController@showBooks');

Route::post('/bookForm', 'BookController@bookForm'); 

Route::post('/registerBook', 'BookController@registerBook')->name('book.register'); //insert

Route::get('/assignBook/{id}', 'BookController@assignBook'); 

Route::post('/updateBook/{id}', 'BookController@updateBook');  //update database after assigned

Route::get('/returnBook/{id}','BookController@returnBook');

Route::get('/practiceBook','BookController@practiceBook');


//authentication for user
Route::get('/', 'UserLoginController@loginpage')->name('loginpage');  //oprn page

Route::get('/registrationpage', 'UserLoginController@registrationpage');  //open registration page

Route::post('/registerUser', 'UserLoginController@registerUser')->name('user.register');

Route::post('/loginUser', 'UserLoginController@loginUser')->name('user.login');

Route::get('/logoutUser', 'UserLoginController@logoutUser');


#reviews
Route::get('/reviewSession', 'ReviewController@reviewSession');
Route::post('/postReview', 'ReviewController@postReview');
