<?php

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

Route::get('/','SignController@home')->name('home');
Route::get('/students/home','StudentController@home')->name('student.home');
Route::get('/profs/home','ProfController@home')->name('prof.home');
Route::get('/admins/home','AdminController@home')->name('admin.home');

Route::match(['get', 'post'], '/botman', 'BotManController@handle');
Route::get('/kfci.bot/chat', 'BotManController@tinker')->name('chat');
//Route::view('/kfci.bot/signin','login')->name('login');

Route::get('/signup', 'SignController@index')->name('signup');

Route::get('/signup/{id}', 'SignController@fetch')->name('sign.fetch');
Route::post('/signup/students', 'SignController@signupStudent')->name('signup.students');

Route::post('/signup/professors', 'SignController@signupProf')->name('signup.professors');


Route::get('/login', 'SignController@showLoginForm')->name('login');
Route::post('/login/students', 'SignController@loginStudent')->name('login.student');
Route::post('/login/professors', 'SignController@loginProf')->name('login.professors');

Route::post('/login/admins', 'SignController@loginAdmin')->name('login.admin');



Route::get('/students/exam/{id}', 'StudentController@exam')->name('students.exam');

Route::post('/students/exam/{id}', 'StudentController@examCheck');

Route::get('/students/results','StudentController@results')->name('students.results');



Route::get('/logout', 'SignController@logout')->name('logout');


//Route::get('/student/{id}', 'SignController@fetch')->name('sign.fetch');


//Auth::routes();

//college information controller
/*Route::resource('info', 'InfoController')->except([
  'create', 'store', 'destroy'
]);*/
Route::view('/kfci.bot/privacy','privacy')->name('privacy');
Route::view('/kfci.bot/about','about')->name('about');
Route::view('/kfci.bot/edit','infoCRUD.edit')->name('edit');
