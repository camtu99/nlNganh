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

Route::get('/', function () {
    return view('welcome');
});
Route::get('index', 'UserController@callview');
Route::get('infor','UserController@information');
Route::get('thuvien','UserController@thuvien');
Route::get('gioithieu','UserController@information');
Route::get('hoatdong', 'UserController@callview');
Route::get('review', 'UserController@review');
Route::get('test', 'Noidung@test');


//Truyện
Route::post('inserttruyen','Noidung@add_truyen');
Route::get('testtruyen',function () {return view('taotruyen');});
Route::get('hi', function () {return view('layouttruyen');});
Route::post('taotruyen','Noidung@checktruyen' );
Route::get('truyen/{ten}','Noidung@chitiet_truyen');
Route::get('truyen/{ten}/{chuong}','Noidung@chitiet_chuong');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login-facebook','LoginController@login_facebook');
Route::get('/admin/callback','LoginController@callback_facebook');


Route::get('/redirect/{provider}', 'SocialController@redirect');
Route::get('auth/facebook/callback/{provider}', 'SocialController@callback');
Route::get('/ty',function(){return view('test');});