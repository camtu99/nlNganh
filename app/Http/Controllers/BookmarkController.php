<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\User;
use App\Bookmarks;
use App\NoiDungChuong;
use App\Follow;
use App\TheLoai;

class BookmarkController extends Controller
{
    public function bookmark(){
        if(!Session::has('id_tk')){Session::flash('error','Bạn chưa đăng nhập');return view('dangnhap');}
        $id = Session::get('id_tk');
        $user = new User();
        $user = $user ->get_users($id);
        $follower = new Follow();
        $follower = $follower->get_follower($id);
        $following = new Follow();
        $following = $following->get_following($id);
        $bookmark =new Bookmarks();
        $bookmark = $bookmark->get_bookmark($id);
        $theloai = new TheLoai();
        $theloai = $theloai->get_all_theloai();
        return view('bookmark',compact('user','follower','following','bookmark','theloai'));
    }
    public function xoa_bookmark($id){
        $xoa = new Bookmarks();
        $xoa = $xoa->xoa_bookmark($id);
        Session::flash('success','Bạn đã xóa thành công!');
        return redirect()->back();      
    }
    public function them_bookmark($id){
        $them = new Bookmarks();
        $id_user = Session::get('id_tk');
        $them = $them->them_bookmark($id_user,$id);
        Session::flash('success','Bạn đã thêm thành công!');
        return redirect()->back();
        
    }
}
