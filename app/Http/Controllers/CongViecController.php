<?php

namespace App\Http\Controllers;

use App\BinhLuan;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\User;
use App\Follow;
use App\Lichsu;
use App\Review;
use App\TacGia;
use App\TagTruyen;
use App\TheLoai;
use App\ThuVien;
use App\Truyen;
use App\TruyenThuVien;
use Illuminate\Http\Resources\MergeValue;
use Symfony\Component\Translation\Catalogue\MergeOperation;

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
        $theloai = new TheLoai();
        $theloai = $theloai->get_all_theloai();
        return view('congviec',compact('truyen','theloai','user','follower','following','follow'));
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
        $theloai = new TheLoai();
        $theloai = $theloai->get_all_theloai();
        return view('timkiem',compact('truyen','theloai'));
    }
    public function tinhtrang($tinhtrang){
       $truyen = new Truyen();
       $truyen = $truyen->tim_tinh_trang($tinhtrang);
       $theloai = new TheLoai();
       $theloai = $theloai->get_all_theloai();
       return view('timkiem',compact('truyen','theloai'));

    }
    public function tim_theloai($loai){
        $theloai= new TheLoai();
        $theloai = $theloai->get_all_theloai();
       $truyen = new TagTruyen();
       $truyen = $truyen->tim_theloai($loai);
        return view('timkiem',compact('truyen','theloai'));
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
        $theloai = new TheLoai();
        $theloai = $theloai->get_all_theloai();
        return view('danhsach',compact('tacgia','theloai'));
    }
    public function hoatdong($name){
        $theloai = new TheLoai();
        $theloai = $theloai->get_all_theloai();
        $user = new User();
        $user = $user ->get_id($name);
        $id = $user[0]->id;
        $follower = new Follow();
        $follower = $follower->get_follower($id);
        $following = new Follow();
        $following = $following->get_following($id);
        $hoatdong = new Lichsu();
        $hoatdong = $hoatdong->get_lich_su_id($id);
        $follow ='check';
        if(Session::get('id_tk')){
            foreach ($follower as  $follow) {
                if($follow->id==Session::get('id_tk')) {
                    $follow = 'ok';
                }
            }
        }
        $hdtaotk =new Lichsu();
        $hdtaotk = $hdtaotk->get_lstk_id($id);
        return view('hoatdong',compact('theloai','user','follower','following','hoatdong','hdtaotk'));
    }
    public function timkiemnangcao(){
        $theloai = new TheLoai();
        $theloai = $theloai->get_all_theloai();
        return view('timtruyen',compact('theloai'));

    }
    public function timkiemcao(Request $req){
        $theloai = new TheLoai();
        $theloai = $theloai->get_all_theloai();
        $check = 2;$check1=0;$a=0;$check2=0;$check3=0;
        $truyen1 = new TagTruyen();
        $truyen2 = new TagTruyen();$truyen3 = array();$loai =array();$truyen = array();
        for($i=1;$i<=count($theloai);$i++){  
            if($req->input($i)!==null)
            {
                if($check==2){
                    $truyen1 = new TagTruyen();
                    $truyen2 = $truyen1->get_the_loai1($req->input($i));
                    $check = 4;$check1=4;
                }else{
                    if($check1==4){
                        $a=0;$truyen = array();
                        $truyen1 = new TagTruyen();
                        $truyen1 = $truyen1->get_the_loai1($req->input($i));
                        foreach($truyen2 as $t){
                            foreach($truyen1 as $t1){
                                if($t1->truyen_id==$t->truyen_id){
                                    $truyen[$a]=$t1;
                                    $a = $a+1;
                                }
                            }
                        }
                        $check1=8;$check2=2;
                    }else{
                        if($check2==2){
                            $a=0;$loai =array();
                            $truyen1 =new TagTruyen();
                            $truyen1 =$truyen1->get_the_loai1($req->input($i));
                            foreach($truyen as $tr){
                                foreach($truyen1 as $t1){
                                    if($t1->truyen_id==$tr->truyen_id){
                                        $loai[$a]=$t1;
                                        $a=$a+1;
                                    }
                                }
                            }
                            $check1=9;
                        $check2=4;
                        }else{
                            $a=0;$truyen = array();
                            $truyen1 =new TagTruyen();
                            $truyen1 =$truyen1->get_the_loai1($req->input($i));
                            foreach($loai as $tr){
                                foreach($truyen1 as $t1){
                                    if($t1->truyen_id==$tr->truyen_id){
                                        $truyen[$a]=$t1;
                                        $a=$a+1;
                                    }
                                }
                            }
                            $check2=2;
                        }
                    }
                }
            }
        }
        if($check1==4){ $truyen=$truyen2;}    
        if($check2==4){ $truyen=$loai;} 
        return view('timkiem',compact('theloai','truyen'));
    }
    public function admin(){
        if(!Session::has('tk_admin')){ 
            Session::flash('error','Bạn chưa đăng nhập quản lý!!!');
            return view('login');
        }
        $thanhvien = new User();
        $thanhvien = $thanhvien->all_user();
        return view('cubaotruyen',compact('thanhvien'));
    }
    public function truyen(){
        if(!Session::has('tk_admin')){ 
            Session::flash('error','Bạn chưa đăng nhập quản lý!!!');
            return view('login');
        }
        $truyen = new Truyen();
        $truyen = $truyen->all_truyen_admin();
        return view('truyen_admin',compact('truyen'));

    }
    public function timkiem_truyen(Request $req){
        if(!Session::has('tk_admin')){ 
            Session::flash('error','Bạn chưa đăng nhập quản lý!!!');
            return view('login');
        }
        $tenTruyen = $req->timkiem;
        $truyen = new Truyen();
        $truyen = $truyen->timkiem_truyen($tenTruyen);
        return view('truyen_admin',compact('truyen'));
    }
    public function timkiem_user(Request $req){
        if(!Session::has('tk_admin')){ 
            Session::flash('error','Bạn chưa đăng nhập quản lý!!!');
            return view('login');
        }
        $tenthanhvien = $req->timkiem;
        $thanhvien = new User();
        $thanhvien = $thanhvien->timkiem_thanhvien($tenthanhvien);
        return view('cubaotruyen',compact('thanhvien'));
    }
    public function thongke(){
        $thang = date('m');
        $review = new Review();
        $review = $review->top_review($thang);
        $binhluan = new BinhLuan();
        $binhluan = $binhluan->topbinhluan($thang);
        $ngay = date('m');
        if($ngay == 1 ||$ngay == 3||$ngay == 5||$ngay == 7||$ngay == 8||$ngay == 10||$ngay == 12){
            $songay = 31;
        }else{
            $songay=30;
        }
        for ($i=1; $i<=$songay ; $i++) { 
            $check_rv[$i]=2;$check_bl[$i]=2;
            if($i<=9){$ngayi = date('Y').'-'.date('m').'-0'.$i;}else{$ngayi = date('Y').'-'.date('m').'-'.$i;}
            foreach($review as $rv){
                if($rv->ngay==$ngayi){
                    $thongke[$i]=",['".$rv->ngay."',  ".$rv->sl_review.", ";
                    $check_rv[$i]=1;
                }
            }
            foreach($binhluan as $bl){

                if($bl->ngay==$ngayi){
                    if($check_rv[$i]==1){
                        $thongke[$i]=$thongke[$i].$bl->sl_binhluan."]";
                        $check_bl[$i]=1;
                    }else{
                        $thongke[$i]=",['".$bl->ngay."',  0, ".$bl->sl_binhluan."]";
                        $check_bl[$i]=1;  
                    }
                }
            }
            if($check_bl[$i]==2){
                if($check_rv[$i]==2){
                    $thongke[$i]=",['".$ngayi."',  0, 0]";
                }else{
                    $thongke[$i]=$thongke[$i]."0]"; 
                }
            }
        }
        $tke='';
        foreach($thongke as $tk){
            $tke = $tke.$tk;
        }
        $thongke1 = " <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script><script type='text/javascript'>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
    
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Ngày', 'Bình Luận', 'Review']".
              
             $tke
              
           . "]);
    
            var options = {
              title: 'Bảng thống kê lượt Bình luận, Review',
              hAxis: {title: 'Ngày',  titleTextStyle: {color: '#333'}},
              vAxis: {minValue: 0}
            };
    
            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(data, options);
          }
        </script>";
   
        return view('thongke',compact('thongke1'));
    }
    public function chuyentrang($id){
        $thongbao ="<script>

        window.open('http://127.0.0.1:8000/truyen/".$id."');
      
      </script>";
      Session::flash('chuyentrang',$thongbao);
      return redirect()->back();
    }
}
