<?php

namespace App\Http\Controllers;
use App\Review;
use App\TheLoai;
use App\BinhLuan;
use App\Truyen;
use App\Truycap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BinhluanController extends Controller
{
    public function review_bl(Request $req,$id,$id_revew){
        $nd_bl = $req->traloi;
        $binhluan = new BinhLuan();
        $binhluan = $binhluan->add_review_bl($id,$id_revew,$nd_bl);
        Session::flash('success','Đã bình luận');
        return redirect()->back();
    }
    public function add_binhluan(Request $req,$id,$id_truyen){
       $nd = $req->message;
       $binhluan = new BinhLuan();
       $binhluan = $binhluan->add_truyen_bl($id,$nd,$id_truyen);
       Session::flash('success','Đã bình luận thành công');
       return redirect()->back();

       
    }
    public function binhluan_bl(Request $req,$id,$id_bl,$id_truyen){
        $nd_bl = $req->traloi;
        $binhluan = new BinhLuan();
        $binhluan = $binhluan->add_binhluan_bl($id,$id_bl,$nd_bl,$id_truyen);
        Session::flash('success','Đã bình luận');
        return redirect()->back();
    }
    public function cam_nhung(){
        $truycap = new Truycap();
        $truycap = $truycap->truycap();
        $theloai = new TheLoai();
        $theloai = $theloai->get_all_theloai();
        $danhsach = new BinhLuan();
        $danhsach = $danhsach->cam_nhung();
        $danhsach  =json_decode($danhsach);

        return view('toppic',compact('danhsach','theloai'));
    }
    public function add_camnhung(Request $req){
        $nd_cam = $req->nd_cam;
        $nd_cam = htmlentities($nd_cam);
        $id = Session::get('id_tk');
        $binhluan = new BinhLuan();
        $binhluan = $binhluan->add_cam($nd_cam,$id);
        Session::flash('success','Đã đăng thành công');
        return redirect()->back();
    }
}
