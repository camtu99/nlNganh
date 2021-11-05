<?php

namespace App\Http\Controllers;
use App\TheLoai;
use App\BinhLuan;
use App\Review;
use App\BaoCaoTruyen;
use App\CuBaoUsers;
use App\HopThu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Truycap;
use App\Truyen;
use App\User;

class CubaoController extends Controller
{
    public function cubao($id_tk,$id_review,$noidung){
        if($noidung=='chinhtri'){$noidung='Đề cập đến chính trị';}
        if($noidung=='chuiboi'){$noidung='Chửi bới, sỉ nhục thành viên khác';}
        if($noidung=='chuithe'){$noidung='Chửi thề nói tục';}
        if($noidung=='saisuthat'){$noidung='Quảng bá thông tin sai sự thật';}
        if($noidung=='lamdung'){$noidung='Lạm dụng ngôn ngữ chat';}
        $insert = new CuBaoUsers();
        $insert = $insert->insert_cubao_review($id_tk,$id_review,$noidung);
        Session::flash('success','Đã báo cáo user thành công');
        return redirect()->back();
    }
    public function cubao_bl($id_tk,$id_bl,$noidung){
        if($noidung=='chinhtri'){$noidung='Đề cập đến chính trị';}
        if($noidung=='chuiboi'){$noidung='Chửi bới, sỉ nhục thành viên khác';}
        if($noidung=='chuithe'){$noidung='Chửi thề nói tục';}
        if($noidung=='saisuthat'){$noidung='Quảng bá thông tin sai sự thật';}
        if($noidung=='lamdung'){$noidung='Lạm dụng ngôn ngữ chat';}
        $insert = new CuBaoUsers();
        $insert = $insert->insert_cubao_binhluan($id_tk,$id_bl,$noidung);
        Session::flash('success','Đã báo cáo user thành công');
        return redirect()->back();
    }
    public function baocao_binhluan($id,$id_bl,$nd){
        if($nd=='chinhtri'){$nd='Đề cập đến chính trị';}
        if($nd=='chuiboi'){$nd='Chửi bới, sỉ nhục thành viên khác';}
        if($nd=='chuithe'){$nd='Chửi thề nói tục';}
        if($nd=='saisuthat'){$nd='Quảng bá thông tin sai sự thật';}
        if($nd=='lamdung'){$nd='Lạm dụng ngôn ngữ chat';}
        $insert = new CuBaoUsers();
        $insert = $insert->insert_cubao_binhluan($id,$id_bl,$nd);
        Session::flash('success','Đã báo cáo user thành công');
        return redirect()->back();
    }
    public function baocaotruyen(){
        $truycap = new Truycap();
        $truycap = $truycap->truycap();
        $baocao =new BaoCaoTruyen();
        $baocao = $baocao->all_baocao();
        return view('baocaotruyen',compact('baocao'));
    }
    public function tinhtrang_baocaotruyen(Request $req,$id){
        $tinhtrang = $req->tinhtrang;
        if($tinhtrang=='Chưa giải quyết'){
            $suatinhtrang = 'Chưa giải quyết';
            $sua = new BaoCaoTruyen();
            $sua = $sua->update_tinhtrangtruyen($id,$suatinhtrang);
            return redirect()->back();
        }else{
            $suatinhtrang='Đã xong';
            $sua = new BaoCaoTruyen();
            $sua = $sua->update_tinhtrangtruyen($id,$suatinhtrang);
            return redirect()->back();
        }
    }
    public function baocao_truyenngay(Request $req){
        $truycap = new Truycap();
        $truycap = $truycap->truycap();
        $ngayn = $req->ngay;
        $baocao = new BaoCaoTruyen();
        $baocao = $baocao->get_truyen_ngay($ngayn);
        return view('baocaotruyen',compact('baocao'));
    }
    public function baocaotaikhoan(){
        $truycap = new Truycap();
        $truycap = $truycap->truycap();
        $taikhoan = new CuBaoUsers();
        $taikhoan = $taikhoan->all_baocao_user();
        return view('cubaouser',compact('taikhoan'));
    }
    public function timkiem_user(Request $req){
        $truycap = new Truycap();
        $truycap = $truycap->truycap();
        $user = $req->timkiem;
        $taikhoan = new CuBaoUsers();
        $taikhoan = $taikhoan->get_tim_user($user);
        return view('cubaouser',compact('taikhoan'));
    }
    public function timkiem_ngay(Request $req){
        $truycap = new Truycap();
        $truycap = $truycap->truycap();
        $ngay_cb = $req->ngay;
        $taikhoan = new CuBaoUsers();
        $taikhoan = $taikhoan->get_tim_user_ngay($ngay_cb);
        return view('cubaouser',compact('taikhoan'));
    }
    public function baocao_review($id){
        $thongbao ="<script>

        window.open('http://127.0.0.1:8000/baocao/review/".$id."');
      
      </script>";
      Session::flash('chuyentrang',$thongbao);
      return redirect()->back();
    }
    public function bc_binhluan($id){
        $binhluan = new BinhLuan();
        $binhluan = $binhluan ->bl_id($id);
        if($binhluan[0]->id_review){
            $id_rv=$binhluan[0]->id_review;
            $review = new Review();
            $review = $review ->get_rv_id($id_rv);
            $theloai = new TheLoai();
            $theloai = $theloai->get_all_theloai();
            return view('review_truyen',compact('theloai','review','binhluan'));   
        }else{
            Session::put('cubao_bl',$id);
            $id_truyen = $binhluan[0]->truyen_id;
            $thongbao ="<script>

            window.open('http://127.0.0.1:8000/truyen/".$id_truyen."');
          
          </script>";
          Session::flash('chuyentrang',$thongbao);
          return redirect()->back();
        }
    }
    public function baocao_truyen(Request $req,$id){
        $noidung = '';
        if($req->chinhtri){
            $noidung = $req->chinhtri;
        }
        if($noidung==''){
            $noidung = $req->chuanmuc;
        }else{
            if($req->chuanmuc){
                $noidung =  $noidung.', '.$req->chuanmuc;
            }           
        }
        if( $noidung==''){
            $noidung = $req->saithongtin;
        }else{
            if($req->saithongtin){
                $noidung =  $noidung.', '.$req->saithongtin;
            }           
        }
        if( $noidung==''){
            $noidung = $req->bacao;
        }else{
            if($req->bacao){
                $noidung =  $noidung.', '.$req->bacao;
            } 
           
        }
        $id_user = Session::get('id_tk');
        $baocao = new BaoCaoTruyen();
        $baocao = $baocao->add_baocao($id,$id_user,$noidung);
        $thongbao_user = new Truyen();
        $thongbao_user = $thongbao_user->getiduser($id);
        $thongbao_id = $thongbao_user[0]->user_id;
        $tentruyen = $thongbao_user[0]->ten_truyen;
        $mess = '<div style="padding-bottom: 10px;">Truyện <b>'.$tentruyen.'</b> đã bị cử báo</div>';
        $mess = $mess .'<div><p style="margin: 0;">Nội dung báo cáo:</p><p style="background-color: #e1e1e1;padding: 10px;">'.$noidung.'</p></div>';
        $hopthu = new HopThu();
        $hopthu = $hopthu->create_thongbaotruyen($thongbao_id,$mess);
        Session::flash('success','Đã Báo cáo');
        return redirect()->back();
    }
}
