<?php

namespace App\Http\Controllers;

use App\BaoCaoTruyen;
use Illuminate\Support\Facades\Session;
use App\BinhLuan;
use App\CuBaoUsers;
use App\DanhSachCam;
use App\Review;
use Illuminate\Http\Request;

class TruyenController extends Controller
{
    public function getdanhgiasao(){
        $danhgia = new BinhLuan();
        $danhgia = $danhgia->get_all_danh_gia();
        return view('danhgiasao',compact('danhgia'));
    }
    public function searchdanhgiaten(Request $req){
        $search = $req->timkiem;
        $danhgia = new BinhLuan();
        $danhgia = $danhgia->search_danhgia_ten($search);
        return view('danhgiasao',compact('danhgia'));
    }
    public function searchdanhgiangay(Request $req){
        $search = $req->ngay;
        $danhgia = new BinhLuan();
        $danhgia = $danhgia->search_danhgia_ngay($search);
        return view('danhgiasao',compact('danhgia'));
    }
    public function xoaReview($id){
        $xoa = new Review();
        $xoa = $xoa->xoaReview($id);
        Session::flash('success','Bạn đã Xóa thành công!');
        return redirect()->back();
    }
    public function settinhtrangcaobaoreview(Request $req, $id){
        $tinhtrang = $req->tinhtrang;
        $setcubao = new CuBaoUsers();
        $setcubao = $setcubao->settinhtrang($id,$tinhtrang);
        Session::flash('success','Bạn đã thay đổi thành công!');
        return redirect()->back();
    }
    public function xoaBinhLuan($id){
        $xoabl = new BinhLuan();
        $xoabl = $xoabl->xoaBinhLuan($id);
        Session::flash('success','Bạn đã Xóa thành công!');
        return redirect()->back();
    }

    public function getdanhsach(){
        $danhsach = new DanhSachCam();
        $danhsach = $danhsach->cam_nhung();
        return view('danhsachcam',compact('danhsach'));
    }

    public function themtimkiem(Request $req){
        $ten = $req->timkiem;
        $danhsach = new DanhSachCam();
        $danhsach = $danhsach->timtenhoc($ten);
        return view('danhsachcam',compact('danhsach'));
    }
    
    public function createDanhSachCam(Request $req){
        $ten = $req->tentruyen;
        $tacgia = $req->tacgia;
        $danhsach = new DanhSachCam();
        $danhsach = $danhsach->create($ten,$tacgia);
        Session::flash('success','Thêm thành công');
        return redirect()->back();
    }
    public function timkiemcubaotruyen(Request $req){
        $ten = $req->timkiem;
        $baocao = new BaoCaoTruyen();
        $baocao = $baocao->get_truyen_ten($ten);
        return view('baocaotruyen',compact('baocao'));
    }
}
