<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use uth\VerificationController;
use Whoops\Run;

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



//Truyện
Route::get('/','Noidung@trangchu');
Route::post('inserttruyen','Noidung@add_truyen');
Route::post('taotruyen','Noidung@checktruyen' );
Route::get('truyen/{id}','Noidung@chitiet_truyen');
Route::get('truyen/{id}/{chuong}','Noidung@chitiet_chuong');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');
//email, đăng kí, đăng nhập, quên mật khẩu
Route::post('user/login','UserController@login');
Route::get('user/logout','UserController@logout');
Route::get('send-mail/{id}/{email}','MailSend@mailsend');
Route::get('xacthuc/email/{id}','MailSend@xacthuc');
Route::get('datlaipass','MailSend@repassword');
Route::get('dangnhap',function(){return view('dangnhap');});
Auth::routes(['verify' => true]);
Route::post('dangki','UserController@dangki');
Route::post('doimatkhau/{email}','UserController@doimatkhau');
Route::get('quenmatkhau',function(){return view('matkhau');});
Route::get('repassword/email/{id}','UserController@repass');
Route::get('profile', function () {
    // Only verified users may enter...
})->middleware('verified');
//thong tin user,chỉnh sửa, tạo truyện
Route::get('user/{name}','UserController@index');
Route::get('/setup/{id}','UserController@setup_user');
Route::post('/setup/anh','UserController@setanh');
Route::post('/setup/anhbia','UserController@setanhbia');
Route::post('/setup/thongtin','UserController@set_thongtin');
Route::get('taotruyen/user','UserController@taotruyen');
Route::post('/baocao/{id}','UserController@baocao');
Route::get('/follow/huy/{id}','UserController@huy_follow');
Route::get('/follow/them/{id}','UserController@them_follow');
//thuvien,bookmark,review,công việc, hoạt đọng
Route::get('user/thuvien/{name}','UserController@thuvien');
Route::get('/bookmark/user','BookmarkController@bookmark');
Route::get('user/review/{name}','ReviewController@review');
Route::get('review','ReviewController@get_review');
Route::post('reviewtruyen','ReviewController@insert_review');
Route::get('/bookmark/xoa/{id}','BookmarkController@xoa_bookmark');
Route::get('/bookmark/{id}','BookmarkController@them_bookmark');
Route::get('/user/congviec/{name}','CongViecController@congviec');
Route::post('/thuvien/them','CongViecController@themthuvien');
Route::get('/review/truyen/{name}','ReviewController@review_truyen');
//Cử báo review,bình luận, truyện
Route::get('review/cubao/{id_tk}/{id_review}/{noidung}','CubaoController@cubao');
Route::post('/baoloi/{id}','Noidung@baoloitruyen');
//test 
Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');
Route::get('/login-facebook','LoginController@login_facebook');
Route::get('/admin/callback','LoginController@callback_facebook');


Route::get('/redirect/{provider}', 'SocialController@redirect');
Route::get('auth/facebook/callback/{provider}', 'SocialController@callback');
Route::get('/ty',function(){return view('test');});

//test
Route::get('hi', function () {return view('login');});
Route::get('test', 'Noidung@test');
Route::post('test1','Noidung@test1');
