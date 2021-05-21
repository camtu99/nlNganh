<?php

namespace App\Http\Controllers;

use App\BaoCaoTruyen;
use App\CuBaoUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
    public function baocaotruyen(){
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
}
