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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/administrator', 'AdminController@index')->name('admin_dashboard');
Route::get('/moderator', 'ModeratorController@index')->name('moderator_dashboard');
Route::get('/member', 'MemberController@index')->name('member_dashboard');
Route::post('/upload', 'FileUpload@doUpload')->name('file_upload');
Route::get('/submit-image', 'FileUpload@uploadImage')->name('image_upload_form');
Route::post('/submit-image', 'FileUpload@doUploadImage')->name('image_upload');
Route::get('/visits', 'VisitController@visitStats')->name('visit_stats');
Route::get('/visit-data', 'VisitController@visitData')->name('visit_stats');
