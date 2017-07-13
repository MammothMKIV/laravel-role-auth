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
