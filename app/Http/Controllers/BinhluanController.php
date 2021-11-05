<?php

namespace App\Http\Controllers;
use App\Review;
use App\TheLoai;
use App\BinhLuan;
use App\DanhSachCam;
use App\Truyen;
use App\Truycap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

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
        $danhsach = new DanhSachCam();
        $danhsach = $danhsach->cam_nhung();
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
    public function danhgiasao($id,Request $req){
        $id_user = Session::get('id_tk');
        $danhgia = new BinhLuan();
        $_danhgia=$req->danhgia;  $_sosao=$req->star; 
        #Gửi  giá và số sao đến api dự đoán
        $res = Http::post('http://127.0.0.1:5000/predict', [
            'text' => $_danhgia,
        ]);
        #prediction
        $result="";
        if ($res->getStatusCode() == 200) {
            $result = json_decode($res->getBody());
        } elseif ($res->getStatusCode() == 404) {
            $result = redirect()->route('/');
        }
        if(($result->prediction=="0" && $_sosao>=3) or ($result->prediction=="1" && $_sosao<3)){
            try{
                #chỗ này insert vô db
                $danhgia = $danhgia->add_bl_sao($id,$id_user,$req->star,$_danhgia);
                #return back()->with('success',"Đánh giá hoàn tất");
                Session::flash('success','Đã đăng thành công');
                return redirect()->back();
            } catch (\Illuminate\Database\QueryException $e) {
                #return back()->with('unsuccess',"Đánh giá không hoàn tất");
                echo "Ko hop le, lôi";
                
            }
        }
        else{
            
            Session::flash('error','Đánh giá và bình luận không hợp lý');            
            return redirect()->back();
        }       
    }

}
