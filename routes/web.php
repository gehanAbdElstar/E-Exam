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

Route::get('/', function () {
  return view('welcome');
})->name('home');

Route::match(['get', 'post'], '/botman', 'BotManController@handle');
Route::get('/kfci.bot/chat', 'BotManController@tinker')->name('chat');
//Route::view('/kfci.bot/signin','login')->name('login');

Route::get('/signup', 'SignController@index')->name('signup');
Route::get('/signup/{id}', 'SignController@fetch')->name('sign.fetch');
Route::post('/signup', 'SignController@store');

Route::get('/signup', 'SignController@showLoginForm')->name('login');
Route::post('/signup', 'SignController@login');
//Route::get('/student/{id}', 'SignController@fetch')->name('sign.fetch');


//college information controller
Route::resource('info', 'InfoController')->except([
  'create', 'store', 'destroy'
]);
Route::view('/kfci.bot/privacy','privacy')->name('privacy');
Route::view('/kfci.bot/about','about')->name('about');
Route::view('/kfci.bot/edit','infoCRUD.edit')->name('edit');
