<?php
namespace App\Http\Controllers;
// use Symfony\Component\HttpFoundation\Request;

use App\Bookmarks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Follow;
use App\NoiDungChuong;
use App\Review;
use App\TagTruyen;
use App\ThuVien;
use App\Truyen;
use App\TruyenThuVien;

class UserController extends Controller
{
 public function dangki(Request $req){
    $email = $req->email;
    $pass =Hash::make($req->pass) ;
    
        $user = new User();
        $user = $user->create1($email,$pass);
        $idd = new User();
        $id = $idd->get_id($email);
        $mail = 'send-mail/'.$id[0]->id.'/'.$email;
        if($user){
            return redirect($mail);
        }else{
            Session::flash('error','đăng kí không thành công');
            return redirect()->back();
    }
 }

 public function xacthucemail($id){
     $xacthuc = User::xacthucemail($id);
     Session::flash('Success','Xác thực thành công');
     return redirect()->back();
 }
 public function doimatkhau(Request $req,$email){
        $repass = $req->pass;
        $pass = Hash::make($repass);
        $repassword = new User();
        $repassword = $repassword ->doimatkhau($email,$pass);
        Session::flash('success','Đã đổi password thành công. Vui lòng đăng nhập lại');
        return view('matkhau');
 }
 public function repass($id){
     $user = new User();
     $user = $user->get_users($id);
     return view('matkhau',compact('user'));
 }
 public function index($name){
        $user = new User();
        $user = $user ->get_id($name);
        $id = $user[0]->id;
        $follower = new Follow();
        $follower = $follower->get_follower($id);
        $following = new Follow();
        $following = $following->get_following($id);
        $noidung = new Truyen();
        $noidung = $noidung -> get_truyen_user($id);
        return view('users',compact('user','follower','following','noidung'));
 }
 public function taotruyen(){
    if(!Session::has('id_tk')){Session::flash('error','Bạn chưa đăng nhập');return view('dangnhap');}
     $id = Session::get('id_tk');
    $user = new User();
    $user = $user ->get_users($id);
  //  $id = $user[0]->id;
    $follower = new Follow();
    $follower = $follower->get_follower($id);
    $following = new Follow();
    $following = $following->get_following($id);
    return view('taotruyen',compact('user','follower','following'));
 }
 public function thuvien($name){
    $user = new User();
    $user = $user ->get_id($name);
    $id = $user[0]->id;
    $follower = new Follow();
    $follower = $follower->get_follower($id);
    $following = new Follow();
    $following = $following->get_following($id);
    $thuvien = new ThuVien();
    $thuvien = $thuvien->get_thuvien($id);
    $truyentv = new TruyenThuVien();
    $truyentv = $truyentv ->get_truyenthuvien($id);
    return view('thuvien',compact('user','follower','following','thuvien','truyentv'));
 }
 
    public function login(Request $req){
        $email = $req->email;
        $mk =$req->matkhau;
        if (Auth::attempt(['email' => $email, 'password' => $mk])) {
            $xacthuc = new User();
            $xacthuc =$xacthuc->get_id($email);
            $xacthucemail=$xacthuc[0]->email_verified_at;
            if($xacthucemail==1){
                Session::put('email_tk',$email); 
                $id = new User();
                $id = $id->get_id($email);
                $idw = $id[0]->id;
                $ten = $id[0]->name;
                Session::put('id_tk',$idw);
                Session::put('ten_tk',$ten);
                return redirect()->back();
            }else{
                Session::flash('error','Bạn vẫn chưa xác thực email !! Hãy xác thực email ');
                return redirect()->back();
            }  
        }else{
            Session::flash('error','check đéo ok'); 
            return redirect()->back();
        }
    }
    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect()->back();
    }
  
    public function setup_user($id){
        if(!Session::has('id_tk')){Session::flash('error','Bạn chưa đăng nhập');return view('dangnhap');}
        $user = new User();
        $user = $user ->get_users($id);
        $follower = new Follow();
        $follower = $follower->get_follower($id);
        $following = new Follow();
        $following = $following->get_following($id);
        return view('setup_thongtin',compact('user','follower','following'));
    }
    public function setanh(Request $req){
        if(!Session::has('id_tk')){Session::flash('error','Bạn chưa đăng nhập');return view('dangnhap');}
        $hinhanh='';
        if(isset($req->hinhanh)){
            $this->validate($req, 
              [
                'hinhanh' => 'mimes:jpg,jpeg,png,gif|max:2048',
              ],			
              [
                'hinhanh.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
              ]
            );
            $hinhanh = $req->file('hinhanh');
            $gethinhanh = time().'_'.$hinhanh->getClientOriginalName();
            $Path = public_path('hinhanh/avatar');
            $hinhanh->move($Path, $gethinhanh);
            $id = Session::get('id_tk');
            $suaanh = new User();
            $suaanh = $suaanh -> sua_anh($id,$gethinhanh);
            Session::flash('success','Cập nhật ảnh thành công');
        }
        if(isset($req->urlanh)){
            $hinhanh = $req->urlanh;
            $id = Session::get('id_tk');
            $suaanh = new User();
            $suaanh = $suaanh -> sua_anh($id,$hinhanh);
            Session::flash('success','Cập nhật ảnh thành công');
        }
        return redirect()->back();
    }
    public function set_thongtin(Request $req){
        if(!Session::has('id_tk')){Session::flash('error','Bạn chưa đăng nhập');return view('dangnhap');}
        if(isset($req->password)){
            $pass = Hash::make($req->password);
            $id = Session::get('id_tk');
            $ten = $req->ten;
            $thongtin = $req->thongtin;
            $upload = new User();
            $upload = $upload->upload_thongtin($id,$ten,$pass,$thongtin);
            Session::flash('success','Đã cập nhật thông tin');
            return redirect()->back();
        }else{
            $id = Session::get('id_tk');
            $ten = $req->ten;
            $thongtin = $req->thongtin;
            $upload = new User();
            $upload = $upload->upload_thongtinnopass($id,$ten,$thongtin);
            Session::flash('success','Đã cập nhật thông tin');
            return redirect()->back();
        }
    }

}