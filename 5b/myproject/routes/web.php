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

Route::get('/',[App\Http\Controllers\HomeController::class, 'kt']) ;

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'posthome']);
Route::get('/home/{id}', [App\Http\Controllers\HomeController::class, 'deletehome']);

Route::get('/profile{id}', [App\Http\Controllers\HomeController::class, 'updatehome']);
Route::post('/profile{id}', [App\Http\Controllers\HomeController::class, 'postupdatehome']);

Route::post('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/changepassword', [App\Http\Controllers\HomeController::class, 'getchangepassword'])->name('getchangepassword');
Route::post('/changepassword', [App\Http\Controllers\HomeController::class, 'postchangepassword'])->name('postchangepassword');

Route::get('/updateprofile', [App\Http\Controllers\HomeController::class, 'getupdateprofile'])->name('getupdateprofile');
Route::post('/updateprofile', [App\Http\Controllers\HomeController::class, 'postupdateprofile'])->name('postupdateprofile');

Route::get('/message{id}&{name}', [App\Http\Controllers\HomeController::class, 'getmessage']);
Route::post('/message{id}&{name}', [App\Http\Controllers\HomeController::class, 'postmessage']);
Route::get('/deletemessage{id}&{id1}&{name}', [App\Http\Controllers\HomeController::class, 'deletemessage']);
Route::get('/updatemessage{id}', [App\Http\Controllers\HomeController::class, 'updatemessage']);
Route::post('/updatemessage{id}', [App\Http\Controllers\HomeController::class, 'postupdatemessage']);

Route::get('/ex', [App\Http\Controllers\HomeController::class, 'getex']);
Route::post('/ex', [App\Http\Controllers\HomeController::class, 'postex']);

Route::get('/download{id}&{link}', [App\Http\Controllers\HomeController::class, 'download']);

Route::get('/list{id}', [App\Http\Controllers\HomeController::class, 'getlist']);
Route::get('/upfile{id}', [App\Http\Controllers\HomeController::class, 'getupfile']);
Route::post('/upfile{id}', [App\Http\Controllers\HomeController::class, 'postupfile']);

Route::get('/challengee', [App\Http\Controllers\HomeController::class, 'getchallenge']);
Route::post('/challengee', [App\Http\Controllers\HomeController::class, 'postchallenge']);

Route::get('/viewanswer{id}&{answer}', [App\Http\Controllers\HomeController::class, 'getanswer']);

Route::get('/question{id}', [App\Http\Controllers\HomeController::class, 'getquestion']);
Route::post('/question{id}', [App\Http\Controllers\HomeController::class, 'postquestion']);
