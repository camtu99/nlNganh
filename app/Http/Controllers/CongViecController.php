<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\User;
use App\Follow;
use App\TacGia;
use App\TagTruyen;
use App\ThuVien;
use App\Truyen;
use App\TruyenThuVien;
class CongViecController extends Controller
{
    public function check_follow($follower){
        $check = 'no';
        if(Session::get('id_tk')){
            foreach ($follower as  $follow) {
                if($follow->id==Session::get('id_tk')) {
                    $check = 'ok';
                    return $check;
                }
            }
        }
        return $check;
    }
    public function congviec($name){
        $user = new User();
        $user = $user ->get_id($name);
        $id = $user[0]->id;
        $follower = new Follow();
        $follower = $follower->get_follower($id);
        $following = new Follow();
        $following = $following->get_following($id);
        $truyen = new Truyen();
        $truyen = $truyen->get_truyen_user($id);
        $follow = $this->check_follow($follower);
        return view('congviec',compact('truyen','user','follower','following','follow'));
    }
    public function themthuvien(Request $req){
        $id_user = Session::get('id_tk');
        $ten_tv = $req->danhsachdoc;
        $add_tv = new ThuVien();
        $add_tv = $add_tv->them_thu_vien($ten_tv,$id_user);
        Session::flash('success','Thêm thư viên thành công');
        return redirect()->back();
    }
    public function timkiem_tacgia($tentacgia){
        $truyen = new TacGia();
        $truyen = $truyen -> get_truyen_ten($tentacgia);
        return view('timkiem',compact('truyen'));
    }
    public function tinhtrang($tinhtrang){
       $truyen = new Truyen();
       $truyen = $truyen->tim_tinh_trang($tinhtrang);
       return view('timkiem',compact('truyen'));

    }
    public function tim_theloai($loai){
       $truyen = new TagTruyen();
       $truyen = $truyen->tim_theloai($loai);
        return view('timkiem',compact('truyen'));
    }
    public function truyen_thuvien($thuvien,$id){
        $id_user = Session::get('id_tk');
        $truyen_them = new TruyenThuVien();
        $truyen_them = $truyen_them->truyen_thuvien($id,$thuvien,$id_user);
        Session::flash('success','Thêm vào thư viện thành công');
        return redirect()->back();
    }
    public function tacgia(){
        $tacgia = new TacGia();
        $tacgia = $tacgia->all_tac_gia();
        return view('danhsach',compact('tacgia'));
    }
}
