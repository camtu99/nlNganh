<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Routing\Route as RoutingRoute;
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
Route::post('suatruyen/{id}','Noidung@tinhtrang_truyen');
Route::post('/suatruyen/theloai/{id}','Noidung@theloai_truyen');
Route::get('/truyen/hientrang/{id}/{trang}','Noidung@hientrang_truyen');
//tìm kiếm truyện theo tac giả. tên, thể loại, nâng cao
Route::get('/trangthai/{tinhtrang}','CongViecController@tinhtrang');
Route::get('/tacgia/{tentacgia}','CongViecController@timkiem_tacgia');
Route::get('/theloai/{loai}','CongViecController@tim_theloai');
Route::get('/tacgia','CongViecController@tacgia');
Route::get('/tim-kiem-nang-cao','CongViecController@timkiemnangcao');
Route::post('/truyen/timnangcao','CongViecController@timkiemcao');
Route::get('/search','SearchController@searchAll');
Route::get('/chuongmoi','SearchController@chuongmoinhat');


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
Route::get('quenmatkhau','CongViecController@quenmatkhau');
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
Route::get('/follow/huy/{id}','UserController@huy_follow');
Route::get('/follow/them/{id}','UserController@them_follow');
Route::get('user/phanquyen/{id}/{khoa}','UserController@phanquyen');
//thuvien,bookmark,review,công việc, hoạt đọng,bình luận, gửi thư,  
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
Route::get('/thuvien/them/{thuvien}/{id}','CongViecController@truyen_thuvien');
Route::get('/user/hoatdong/{name}','CongViecController@hoatdong');
Route::post('/review/binhluan/{id}/{id_review}','BinhluanController@review_bl');
Route::get('/baocao/review/{id}','ReviewController@baocao_review');
Route::post('/binhluan/{id}/{id_truyen}','BinhluanController@add_binhluan');
Route::post('/binhluan/binhluan/{id}/{id_bl}/{id_truyen}','BinhluanController@binhluan_bl');
Route::post('/messenger/{email}/{id}','UserController@messenger');
Route::get('/hopthu/user','HopThuController@index');
Route::get('/hopthu/user/{name}/{hopthu_id}','HopThuController@chitiet');
//Cử báo review,bình luận, truyện
Route::get('review/cubao/{id_tk}/{id_review}/{noidung}','CubaoController@cubao');
Route::post('/baoloi/{id}','Noidung@baoloitruyen');
Route::get('/baocao/tinhtrang/{id}','CubaoController@tinhtrang_baocaotruyen');
Route::post('/admin/baocao/ngay','CubaoController@baocao_truyenngay');
Route::post('/baocao/{id}','UserController@baocao');
Route::get('/binhluan/cubao/{id}/{id_bl}/{nd}','CubaoController@baocao_binhluan');
Route::get('/binhluan/cubao/{id_tk}/{id_bl}/{noidung}','CubaoController@cubao_bl');
Route::post('/truyen/bao-cao/{id}','CubaoController@baocao_truyen');
Route::post('/danhgia/{id}','BinhLuanController@danhgiasao');
//admin
Route::get('/admin/thongtin','CongViecController@admin');
Route::get('/admin/truyen','CongViecController@truyen');
Route::post('admin/truyen/timkiem','CongViecController@timkiem_truyen');
Route::post('/admin/thanhvien/timkiem','CongViecController@timkiem_user');
Route::get('/admin/cubao/truyen','CubaoController@baocaotruyen');
Route::get('/admin/cubao/taikhoan','CubaoController@baocaotaikhoan');
Route::post('/admin/baocao/user/timkiem','CubaoController@timkiem_user');
Route::post('/admin/baocao/user/ngay','CubaoController@timkiem_ngay');
Route::get('/admin/thongke','CongViecController@thongke');
Route::get('/chuyentrang/truyen/{id}','CongViecController@chuyentrang');
Route::get('/chuyentrang/baocao/review/{id}','CubaoController@baocao_review');
Route::get('/chuyentrang/baocao/binhluan/{id}','CubaoController@bc_binhluan');
Route::get('/admin/thongbao','CongViecController@thongbao');
Route::post('/admin/thongbao/quangcao','CongViecController@update_qc');
Route::post('/admin/thongbao/thongbao/{id}','CongViecController@update_thongbao');
Route::get('/admin/thongketruycap','CongViecController@thongketruycap');
Route::get('/admin/truyen/danhgia','TruyenController@getdanhgiasao');
Route::post('/admin/truyen/danhgia/search','TruyenController@searchdanhgiaten');
Route::post('/admin/truyen/danhgia/search/day','TruyenController@searchdanhgiangay');
Route::get('/review/xoa/{id}','TruyenController@xoaReview');
Route::get('/binhluan/xoa/{id}','TruyenController@xoaBinhLuan');
Route::get('/cubao/tinhtrang/{id}','TruyenController@settinhtrangcaobaoreview');
Route::get('/admin/danhsachcam','TruyenController@getdanhsach');
Route::post('/admin/danhsachcam/search/them','TruyenControlller@themtimkiem');
Route::post('/admin/danhsachcam/create','TruyenController@createDanhSachCam');
Route::post('/admin/baocao/timkiem','TruyenController@timkiemcubaotruyen');
//topic, quy định,bxh,thương thành
Route::get('/topic/cam-nhung','BinhluanController@cam_nhung');
Route::post('/topic/cam-nhung/create','BinhluanController@add_camnhung');
Route::get('/quydinh', 'CongViecController@quydinh');
Route::get('/bang-xep-hang','UserController@bxh_tichphan');
Route::get('/thuong-thanh','CongViecController@thuongthanh');
Route::post('/thuong-thanh/doi','CongViecController@doitichphan');
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
