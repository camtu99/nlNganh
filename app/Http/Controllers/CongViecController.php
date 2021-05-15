<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\User;
use App\Follow;
use App\ThuVien;
use App\Truyen;

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
}
