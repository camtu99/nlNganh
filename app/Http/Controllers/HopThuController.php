<?php

namespace App\Http\Controllers;

use App\HopThu;
use App\User;
use App\Follow;
use App\TheLoai;
use App\Truycap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HopThuController extends Controller
{
    public function index(){
        if(!Session::has('id_tk')){Session::flash('error','Bạn chưa đăng nhập');return view('dangnhap');}
        $id = Session::get('id_tk');
        $hopthu = new HopThu();
        $hopthu = $hopthu -> get_hopthu($id);
        $truycap = new Truycap();
        $truycap = $truycap->truycap();
        $id = Session::get('id_tk');
        $user = new User();
        $user = $user ->get_users($id);
        $follower = new Follow();
        $follower = $follower->get_follower($id);
        $following = new Follow();
        $following = $following->get_following($id);
        $theloai = new TheLoai();
        $theloai = $theloai->get_all_theloai();
        return view('hopthu',compact('user','follower','following','hopthu','theloai'));        
    }

    public function chitiet($name,$hopthu_id){
        if(!Session::has('id_tk')){Session::flash('error','Bạn chưa đăng nhập');return view('dangnhap');}
        $id = Session::get('id_tk');
        $id_gui = new User();
        $id_gui = $id_gui->get_name($name);
        $hopthu = new HopThu();
        $hopthu = $hopthu -> get_hopthu_chitiet($hopthu_id);
        $truycap = new Truycap();
        $truycap = $truycap->truycap();
        $id = Session::get('id_tk');
        $user = new User();
        $user = $user ->get_users($id);
        $follower = new Follow();
        $follower = $follower->get_follower($id);
        $following = new Follow();
        $following = $following->get_following($id);
        $theloai = new TheLoai();
        $theloai = $theloai->get_all_theloai();
        $noidung = $hopthu[0]->noi_dung;
        
        return view('hopthu_chitiet',compact('user','id_gui','follower','following','hopthu','theloai','noidung'));        
    }
}
