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
use App\ThuongThanh;
use App\ThuVien;
use App\topic;
use App\Truycap;
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
        $truycap = new Truycap();
        $truycap = $truycap->truycap();
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
        $truycap = new Truycap();
        $truycap = $truycap->truycap();
        $id_user = Session::get('id_tk');
        $ten_tv = $req->danhsachdoc;
        $add_tv = new ThuVien();
        $add_tv = $add_tv->them_thu_vien($ten_tv,$id_user);
        Session::flash('success','Thêm thư viên thành công');
        return redirect()->back();
    }
    public function timkiem_tacgia($tentacgia){
        $truycap = new Truycap();
        $truycap = $truycap->truycap();
        $truyen = new TacGia();
        $truyen = $truyen -> get_truyen_ten($tentacgia);
        $theloai = new TheLoai();
        $theloai = $theloai->get_all_theloai();
        return view('timkiem',compact('truyen','theloai'));
    }
    public function tinhtrang($tinhtrang){
        $truycap = new Truycap();
        $truycap = $truycap->truycap();
       $truyen = new Truyen();
       $truyen = $truyen->tim_tinh_trang($tinhtrang);
       $theloai = new TheLoai();
       $theloai = $theloai->get_all_theloai();
       return view('timkiem',compact('truyen','theloai'));

    }
    public function tim_theloai($loai){
        $truycap = new Truycap();
        $truycap = $truycap->truycap();
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
        $truycap = new Truycap();
        $truycap = $truycap->truycap();
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
        $truycap = new Truycap();
        $truycap = $truycap->truycap();
        $hdtaotk =new Lichsu();
        $hdtaotk = $hdtaotk->get_lstk_id($id);
        return view('hoatdong',compact('theloai','user','follower','following','hoatdong','hdtaotk'));
    }
    public function timkiemnangcao(){
        $truycap = new Truycap();
        $truycap = $truycap->truycap();
        $theloai = new TheLoai();
        $theloai = $theloai->get_all_theloai();
        return view('timtruyen',compact('theloai'));

    }
    public function timkiemcao(Request $req){
        $truycap = new Truycap();
        $truycap = $truycap->truycap();
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
        if($req->hoan){
            if($truyen){
                $truyen4 = array();$t=0;
                $truyen3 = new Truyen();
                $truyen3 = $truyen3->get_truyen_tinh_trang($req->hoan);
                foreach($truyen as $tr){
                    foreach($truyen3 as $tr3){
                        if($tr3->truyen_id==$tr->truyen_id){
                            $truyen4[$t]=$tr;
                        }
                    }
                }
                $t = $t+1;
                $truyen = $truyen4;
            }else{
                $truyen = new Truyen();
                $truyen = $truyen->get_truyen_tinh_trang($req->hoan);
            }
            
        }
        if($req->contiep){
            if($truyen){
                $truyen5 = array();$ti=0;
                $truye3 = new Truyen();
                $truye3 = $truye3->get_truyen_tinh_trang($req->contiep);
                foreach($truyen as $tr){
                    foreach($truye3 as $tr5){
                        if($tr5->truyen_id==$tr->truyen_id){
                            $truyen5[$ti]=$tr;
                        }
                    }
                }
                $ti = $ti+1;
                $truyen = $truyen5;
            }else{
                $truyen = new Truyen();
                $truyen = $truyen->get_truyen_tinh_trang($req->contiep);
            }
        }
        // if($req->min){
        //     if($truyen){
        //         $min = array();$o=0;
        //         $truyenmin = new Truyen();
        //         $truyenmin = $truyenmin->min_truyen($req->min);
        //         foreach($truyen as $tr){
        //             foreach($truyenmin as $trmin){
        //                 if($trmin->truyen_id==$tr->truyen_id){
        //                     $min[$o]=$tr;
        //                 }
        //             }
        //             $o = $o+1;
        //         }
        //         $truyen = $min;
        //     }else{
        //         $truyen = new Truyen();
        //         $truyen = $truyen->min_truyen($req->min);
        //     }
        // }
        // if($req->max){
        //     if($truyen){
        //         $max = array();$o=0;
        //         $truyenmax = new Truyen();
        //         $truyenmax = $truyenmax->max_truyen($req->max);
        //         foreach($truyen as $tr){
        //             foreach($truyenmax as $trmax){
        //                 if($trmax->truyen_id==$tr->truyen_id){
        //                     $max[$o]=$tr;
        //                 }
        //             }
        //             $o = $o+1;
        //         }
        //         $truyen = $max;
        //     }else{
        //         $truyen = new Truyen();
        //         $truyen = $truyen->max_truyen($req->max);
        //     }
        // }
        return view('timkiem',compact('theloai','truyen'));
    }
    public function admin(){
        if(!Session::has('tk_admin')){ 
            Session::flash('error','Bạn chưa đăng nhập quản lý!!!');
            return view('login');
        }
        $truycap = new Truycap();
        $truycap = $truycap->truycap();
        $thanhvien = new User();
        $thanhvien = $thanhvien->all_user();
        return view('cubaotruyen',compact('thanhvien'));
    }
    public function truyen(){
        if(!Session::has('tk_admin')){ 
            Session::flash('error','Bạn chưa đăng nhập quản lý!!!');
            return view('login');
        }
        $truycap = new Truycap();
        $truycap = $truycap->truycap();
        $truyen = new Truyen();
        $truyen = $truyen->all_truyen_admin();
        return view('truyen_admin',compact('truyen'));

    }
    public function timkiem_truyen(Request $req){
        if(!Session::has('tk_admin')){ 
            Session::flash('error','Bạn chưa đăng nhập quản lý!!!');
            return view('login');
        }
        $truycap = new Truycap();
        $truycap = $truycap->truycap();
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
        $truycap = new Truycap();
        $truycap = $truycap->truycap();
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
    public function quydinh(){
        $truycap = new Truycap();
        $truycap = $truycap->truycap();
        $theloai = new TheLoai();
        $theloai = $theloai->get_all_theloai();
        return view('quydinh',compact('theloai'));
    }
    public function thongbao(){
        $quangcao = new topic();
        $quangcao = $quangcao->get_topic_qc();
        $thongbao = new topic();
        $thongbao = $thongbao->get_topic_thongbao();
        $truycap = new Truycap();
        $truycap = $truycap->truycap();
        return view('thongbao',compact('quangcao','thongbao'));
    }
    public function update_qc(Request $req){
        $ten_qc = $req->ten_topic;
        $link_qc = $req->link_topic;
        $hinhanh_qc = $req->hinh_anh_topic;
        $quangcao = new topic();
        $quangcao = $quangcao->update_qc($ten_qc,$link_qc,$hinhanh_qc);
        Session::flash('success','Đã cập nhật');
        return redirect()->back();
    }
    public function update_thongbao($id,Request $req){
        $ten_qc = $req->ten_topic;
        $link_qc = $req->link_topic;
        $quangcao = new topic();
        $quangcao = $quangcao->update_thongbao($id,$ten_qc,$link_qc);
        Session::flash('success','Đã cập nhật');
        return redirect()->back();
    }
    public function thongketruycap(){
        $truy_cap = new Truycap();$ngay = date('m');
        $truy_cap = $truy_cap->All_truycap($ngay );
        $ngay = date('m');
        if($ngay == 1 ||$ngay == 3||$ngay == 5||$ngay == 7||$ngay == 8||$ngay == 10||$ngay == 12){
            $songay = 31;
        }else{
            $songay=30;
        }
        for ($i=1; $i<=$songay ; $i++) { 
            $check_truycap[$i]=2;
            if($i<=9){$ngayi = date('Y').'-'.date('m').'-0'.$i;}else{$ngayi = date('Y').'-'.date('m').'-'.$i;}
                foreach($truy_cap as $tc){
                    if($tc->ngay_truycap==$ngayi){
                        $truycap1[$i]=",['".$tc->ngay_truycap."',".$tc->sl."]";
                        $check_truycap[$i]=4;
                    }
                }
                if($check_truycap[$i]==2){
                    $truycap1[$i]=",['".$ngayi."',0]";
                }
        }   
        $tke='';
        foreach($truycap1 as $tk){
            $tke = $tke.$tk;
        }
        $truycap = " <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script><script type='text/javascript'>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
    
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Ngày', 'Lượt truy cập']".
              
             $tke
              
           . "]);
    
            var options = {
              title: 'Bảng thống kê lượt Truy cập website',
              hAxis: {title: 'Ngày',  titleTextStyle: {color: '#333'}},
              vAxis: {minValue: 0}
            };
    
            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(data, options);
          }
        </script>";
   
        return view('thongke',compact('truycap'));
    }
    public function thuongthanh(){
        $theloai = new TheLoai();
        $theloai = $theloai->get_all_theloai();
        if(Session::has('id_tk')){
            $id = Session::get('id_tk');
            $thuongthanh = new ThuongThanh();
            $thuongthanh = $thuongthanh->get_ls_giao_dich($id);
            return view('thuong_thanh',compact('theloai','thuongthanh'));
        }else{
            return view('thuong_thanh',compact('theloai'));
        }
    }
    public function doitichphan(Request $req){
      $tich_phan = $req->tichphan;
      $add_tichphan =new ThuongThanh();
      $id = Session::get('id_tk');
      if($tich_phan==10){
        $user = new User();
        $user = $user->get_users($id);
        $tich_phan_user = $user[0]->thanh_tich;
        if($tich_phan>$tich_phan_user){
            Session::flash('error','Tích phân của bạn không đủ để đổi');
            return redirect()->back();
        }else{
            $tichphan_conlai = $tich_phan_user - $tich_phan;
            $update_tichphan = new User();
            $update_tichphan = $update_tichphan->update_tich_phan($id,$tichphan_conlai);
        }
        $loai='Thẻ miễn 1 ngày';
        $date = date('Y-m-d H:i:s');
        $newdate = strtotime ( '+1 day' , strtotime ( $date ) ) ;
        $newdate = date ( 'Y-m-d H:i:s' , $newdate );
        $add_tichphan = $add_tichphan->them_the($id,$loai,$date,$newdate);
        Session::flash('Đổi thẻ thành công');
        return redirect()->back();
      }
      if($tich_phan==30){
        $user = new User();
        $user = $user->get_users($id);
        $tich_phan_user = $user[0]->thanh_tich;
        if($tich_phan>$tich_phan_user){
            Session::flash('error','Tích phân của bạn không đủ để đổi');
            return redirect()->back();
        }else{
            $tichphan_conlai = $tich_phan_user - $tich_phan;
            $update_tichphan = new User();
            $update_tichphan = $update_tichphan->update_tich_phan($id,$tichphan_conlai);
        }
        $loai='Thẻ miễn 3 ngày';
        $date = date('Y-m-d H:i:s');
        $newdate = strtotime ( '+3 day' , strtotime ( $date ) ) ;
        $newdate = date ( 'Y-m-d H:i:s' , $newdate );
        $add_tichphan = $add_tichphan->them_the($id,$loai,$date,$newdate);
        Session::flash('Đổi thẻ thành công');
        return redirect()->back();
      }
      if($tich_phan==60){
        $user = new User();
        $user = $user->get_users($id);
        $tich_phan_user = $user[0]->thanh_tich;
        if($tich_phan>$tich_phan_user){
            Session::flash('error','Tích phân của bạn không đủ để đổi');
            return redirect()->back();
        }else{
            $tichphan_conlai = $tich_phan_user - $tich_phan;
            $update_tichphan = new User();
            $update_tichphan = $update_tichphan->update_tich_phan($id,$tichphan_conlai);
        }
        $loai='Thẻ miễn 7 ngày';
        $date = date('Y-m-d H:i:s');
        $newdate = strtotime ( '+7 day' , strtotime ( $date ) ) ;
        $newdate = date ( 'Y-m-d H:i:s' , $newdate );
        $add_tichphan = $add_tichphan->them_the($id,$loai,$date,$newdate);
        Session::flash('Đổi thẻ thành công');
        return redirect()->back();
      }
      if($tich_phan==80){
        $user = new User();
        $user = $user->get_users($id);
        $tich_phan_user = $user[0]->thanh_tich;
        if($tich_phan>$tich_phan_user){
            Session::flash('error','Tích phân của bạn không đủ để đổi');
            return redirect()->back();
        }else{
            $tichphan_conlai = $tich_phan_user - $tich_phan;
            $update_tichphan = new User();
            $update_tichphan = $update_tichphan->update_tich_phan($id,$tichphan_conlai);
        }
        $loai='Thẻ miễn 10 ngày';
        $date = date('Y-m-d H:i:s');
        $newdate = strtotime ( '+10 day' , strtotime ( $date ) ) ;
        $newdate = date ( 'Y-m-d H:i:s' , $newdate );
        $add_tichphan = $add_tichphan->them_the($id,$loai,$date,$newdate);
        Session::flash('Đổi thẻ thành công');
        return redirect()->back();
      }
      if($tich_phan==200){
        $user = new User();
        $user = $user->get_users($id);
        $tich_phan_user = $user[0]->thanh_tich;
        if($tich_phan>$tich_phan_user){
            Session::flash('error','Tích phân của bạn không đủ để đổi');
            return redirect()->back();
        }else{
            $tichphan_conlai = $tich_phan_user - $tich_phan;
            $update_tichphan = new User();
            $update_tichphan = $update_tichphan->update_tich_phan($id,$tichphan_conlai);
        }
        $loai='Thẻ miễn 30 ngày';
        $date = date('Y-m-d H:i:s');
        $newdate = strtotime ( '+30 day' , strtotime ( $date ) ) ;
        $newdate = date ( 'Y-m-d H:i:s' , $newdate );
        $add_tichphan = $add_tichphan->them_the($id,$loai,$date,$newdate);
        Session::flash('Đổi thẻ thành công');
        return redirect()->back();
      }
    }
    public function quenmatkhau(){
        $theloai =new TheLoai();
        $theloai = $theloai->get_all_theloai();
        return view('matkhau',compact('theloai'));
    }

}
