<?php

namespace App\Http\Controllers;
use App\Review;
use App\TheLoai;
use App\BinhLuan;
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
}
