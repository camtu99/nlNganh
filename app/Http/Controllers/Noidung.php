<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\BinhLuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\NoiDungChuong;
use Illuminate\Support\Facades\Session;
use App\Truyen;
use App\TacGia;
use App\TagTruyen;
use App\TheLoai;
use App\Follow;
use App\User;
use Illuminate\Support\Collection;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Util\Json;



class Noidung extends Controller
{
    public function add_truyen(Request $req){
      $link = $req -> input('li');
      $ten_truyen = $req->input('tentruyen');
      $tac_gia = $req -> input('tacgia') ;
      if(substr_count($link,'www.sxyxht.com')==1){
        $chuyenlink ='http://dichtienghoa.com/translate/www.sxyxht.com?u='.$link.'&t=vi';
        $trangnhung=1;
        $kiemtra =1;
      }
      if(substr_count($link,'www.mbtxt.la')==1){
        $chuyenlink ='http://dichtienghoa.com/translate/www.mbtxt.la?u='.$link.'&t=vi'; 
        $trangnhung=3;
        $kiemtra=2;
      }
      if(substr_count($link,'www.ruochenwx.com')==1){
        $chuyenlink ='http://dichtienghoa.com/translate/www.ruochenwx.com?u='.$link.'&t=vi';
        $trangnhung=2;
        $kiemtra=3;
      }
      $hinhanh='';
      if($req->hasFile('hinhanh')){
        $this->validate($req, 
          [
            'hinhanh' => 'mimes:jpg,jpeg,png,gif|max:2048',
          ],			
          [
            'hinhanh.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
          ]
        );
        $hinhanh = $req->file('hinhanh');
        $gethinhanh = time().'_'.$hinhanh->getClientOriginalName();
        $Path = public_path('hinhanh');
        $hinhanh->move($Path, $gethinhanh);
      }
      $tinhtrang ='Còn tiếp';
      $ngaytao=Carbon::now('Asia/Ho_Chi_Minh');
      $add_tacgia = new TacGia();
      $add_tacgia =$add_tacgia ->insert_tac_gia($tac_gia) ;
      $id_tacgia = new TacGia();
      $id_tacgia = json_decode($id_tacgia -> get_id_tac_gia($tac_gia));
      $tacgia=$id_tacgia[0]->tac_gia_id;
      $inserttruyen = new Truyen();
      $inserttruyen = $inserttruyen ->insert_truyen($ten_truyen,$chuyenlink,$gethinhanh,$tinhtrang,$tacgia,$ngaytao,$trangnhung);
      $id_truyen = new Truyen();
      $id_truyen = json_decode($id_truyen -> get_id_truyen($ten_truyen));
      $truyen=$id_truyen[0]->truyen_id;
      //thêm thể loại
      if($kiemtra==1){
        $themchuong =$this->add_chuong_sxyxht($link,$truyen);
      }
      if($kiemtra==2){
        $themchuong =$this->add_chuong_mbtxt($link,$truyen);
      }
      if($kiemtra==3){
        $themchuong =$this->add_chuong_ruochenwx($link,$truyen);
      }
      for($i=1;$i<=6;$i++){
        if($req->input($i)!==null)
        {
          $tag_truyen = new TagTruyen();
          $tag_truyen = $tag_truyen ->add_tagtruyen($truyen,$i);
        }
      }
      Session::flash('success',$themchuong);
      $user = new User();
    $user = $user ->get_id('quanngoctran1208@gmail.com');
    $id = $user[0]->id;
    $follower = new Follow();
    $follower = $follower->get_follower($id);
    $following = new Follow();
    $following = $following->get_following($id);
      return view('taotruyen',compact('user','follower','following'));
    }

    public function update_ten_truyen(Request $req){
      $id = $req -> input('id_truyen');
      $link = $req -> input('link');
      $ten_truyen = $req -> input('ten_truyen');
      $update = new Truyen();
      $update = $update -> update_ten_truyen($id,$ten_truyen,$link);
      return view();//để vô thông báo
    }

    public function checktruyen(Request $req){
      $link = $req -> input('li');
      $check = new Truyen();
      $check = $check -> check_truyen($link);
      if($check=='fail'){
      Session::flash('error','Trang web đã có người nhúng!!!  Hãy nhúng trang khác nhé.');
        return redirect()->back();
      }else{
        if(substr_count($link,'www.sxyxht.com')==1){
          $chuyenlink ='http://dichtienghoa.com/translate/www.sxyxht.com?u='.$link.'&t=vi';
          $truyen = file_get_html($chuyenlink);
          $tentruyen = $truyen ->find('.btitle',0)->find('h1',0)->plaintext;
          $tacgia = $truyen -> find('.btitle',0)->find('a',0)->plaintext;
        }
        if(substr_count($link,'www.mbtxt.la')==1){
          $chuyenlink ='http://dichtienghoa.com/translate/www.mbtxt.la?u='.$link.'&t=vi';
          $truyen = file_get_html($chuyenlink);
          $tentruyen = $truyen ->find('.booktitle',0)->plaintext;
          $tacgia = $truyen -> find('.booktag',0)->find('a',0)->plaintext;
        }
        if(substr_count($link,'www.ruochenwx.com')==1){
          $chuyenlink ='http://dichtienghoa.com/translate/www.ruochenwx.com?u='.$link.'&t=vi';
          $truyen = file_get_html($chuyenlink);
          $tentruyen = $truyen ->find('.bookTitle',0)->plaintext;
          $tacgia = $truyen -> find('.booktag',0)->find('a',0)->plaintext;
        }
        $theloai = new TheLoai();
        $theloai = $theloai ->get_all_theloai();
        $theloai = json_decode($theloai);
        $taotruyen='Tạo truyện';
        $user = new User();
        $user = $user ->get_id('quanngoctran1208@gmail.com');
        $id = $user[0]->id;
        $follower = new Follow();
        $follower = $follower->get_follower($id);
        $following = new Follow();
        $following = $following->get_following($id);
        return view('taotruyen',compact('tentruyen','tacgia','theloai','taotruyen','link','user','follower','following'));
      }
    }
    


    public function test( Request $request ){
      $email= $request->tai_khoan;
      $password=$request->mat_khau;

        if (Auth::attempt(['tai_khoan' => $email, 'password' => $password])) {
            
            return redirect()->back()->with(['success'=>'Đăng nhập thành công']);
        }else{
        
          return redirect()->back()->with(['error'=>'Đăng nhập không thành công1111111111']);
        }
    }
   
   public function chitiet_truyen($id){
      $truyen = new Truyen();
      $truyen = $truyen->get_truyen($id);
      $link =$truyen[0]->link_truyen;
      $noidung = file_get_html($link);
      $tinhtrangtruyen = $truyen[0]->tinh_trang;
      $truyen_id =  $truyen[0]->truyen_id;
      $tac_gia = $truyen[0]->tac_gia_id;
      $ten=$truyen[0]->ten_truyen;
      $trangnhung=$truyen[0]->trang_nhung;
      Session::put('id_truyen',$truyen_id);
      Session::put('ten_truyen',$ten);
      Session::put('id_tacgia',$tac_gia);
      $theloai = new TagTruyen();
      $theloai = $theloai -> get_loai($truyen_id);
      if($tinhtrangtruyen=='Còn tiếp'){
        if($trangnhung==1){
          $chuong= $noidung->find('.inner',2)->find('dd');
          $sttchuong = count($chuong);
          $sochuong =new NoiDungChuong();
          $sochuong = $sochuong->sochuong($truyen_id);
          if($sttchuong>$sochuong){
            for ($i=$sochuong; $i < $sttchuong; $i++) { 
              $tenchuongtiep= $noidung->find('.inner',2)->find('dd',$sochuong)->plaintext;
              $linkchuongtiep = $noidung->find('.inner',2)->find('dd',$sochuong)->find('a',0)->href;
              $lin = 'http://dichtienghoa.com'.$linkchuongtiep;
              $addchuong = new NoiDungChuong();
              $addchuong = $addchuong -> insert_chuong($tenchuongtiep,$lin,$truyen_id);
            }
          }
        }
        if($trangnhung==2){
          $tinhtrang=$noidung->find('.blue',1);
          $link_chuong= $noidung->find('#list-chapterAll',0)->find('dd'); 
          $sttchuong=count($link_chuong);
          $sochuong =new NoiDungChuong();
          $sochuong = $sochuong->sochuong($truyen_id);
          if($sttchuong>$sochuong){
            for ($i=$sochuong; $i < $sttchuong; $i++) { 
              $tenchuongtiep= $noidung->find('#list-chapterAll',0)->find('dd',$sochuong)->plaintext;
              $linkchuongtiep = $noidung->find('#list-chapterAll',0)->find('dd',$sochuong)->find('a',0)->href;
              $lin = 'http://dichtienghoa.com'.$linkchuongtiep;
              $addchuong = new NoiDungChuong();
              $addchuong = $addchuong -> insert_chuong($tenchuongtiep,$lin,$truyen_id);
            }
          }
          if($tinhtrang=='Đã kết thúc'){
            $hoanthanh= new Truyen();
            $hoanthanh = $hoanthanh->update_trangthai($truyen_id);
          }
        }
        if($trangnhung==3){
          $tinhtrang=$noidung->find('.red',1);
          $link_chuong= $noidung->find('#list-chapterAll',0)->find('dd'); 
          $sttchuong=count($link_chuong);
          $sochuong =new NoiDungChuong();
          $sochuong = $sochuong->sochuong($truyen_id);
          if($sttchuong>$sochuong){
            for ($i=$sochuong; $i < $sttchuong; $i++) { 
              $tenchuongtiep= $noidung->find('#list-chapterAll',0)->find('dd',$sochuong)->plaintext;
              $linkchuongtiep = $noidung->find('#list-chapterAll',0)->find('dd',$sochuong)->find('a',0)->href;
              $lin = 'http://dichtienghoa.com'.$linkchuongtiep;
              $addchuong = new NoiDungChuong();
              $addchuong = $addchuong -> insert_chuong($tenchuongtiep,$lin,$truyen_id);
            }
          }
          if($tinhtrang=='Kết thúc'){
            $hoanthanh= new Truyen();
            $hoanthanh = $hoanthanh->update_trangthai($truyen_id);
          }
        }
      }
      $mucluc = new NoiDungChuong();
      $mucluc = $mucluc -> get_noi_dung($truyen_id);
      $chuongmoi = new NoiDungChuong();
      $chuongmoi = $chuongmoi -> get_new_chuong($truyen_id);
      $binhluan = new BinhLuan();
      $binhluan = $binhluan ->get_binh_luan_chitiet($truyen_id);
    //  giới thiệu nội dung truyện
      if($trangnhung==1){
        $gioithieu= $noidung->find('.intro',0);
      }
      if($trangnhung==2){
        $gioithieu= $noidung->find('.text-muted',0)->plaintext;
      }
      if($trangnhung==3){
        $gioithieu= $noidung->find('.bookintro',0)->plaintext;
      }
      $cung_tacgia = new Truyen();
      $cung_tacgia = $cung_tacgia->cung_tacgia($tac_gia);
      $cung_tacgia=json_decode($cung_tacgia);
      $soluong = new Truyen();
      $soluong = $soluong->soluong($tac_gia);
      $id_loai = $theloai[1]->the_loai_id;
      
      if($soluong<12){
        $i=13-$soluong;
        $cung_loaitruyen = new Truyen();
        $cung_loaitruyen = $cung_loaitruyen->cung_loai_truyen($i,$id_loai);
        $cung_loaitruyen = json_decode($cung_loaitruyen);
      }
     
      
      return view('chitiettruyen',compact('mucluc','truyen','gioithieu','theloai','binhluan','chuongmoi','cung_tacgia','cung_loaitruyen','soluong'));

    }
    function stt_chuong($id_truyen,$chuong){
      $nd_chuong = new NoiDungChuong();
      $nd_chuong = $nd_chuong->get_stt_chuong($id_truyen,$chuong);
     // $nd_chuong = json_decode($nd_chuong);
      $stt = $nd_chuong[0]->thu_tu_chuong;
      $stt_cuoi =new NoiDungChuong();
      $stt_cuoi = $stt_cuoi->get_new_chuong($id_truyen);
      
      if($stt==1){
        $chuongke= new NoiDungChuong();
        $chuongke = $chuongke->next_chuong($id_truyen,$stt+1);
      }else if($stt == $stt_cuoi[0]->thu_tu_chuong){
        $chuongtruoc= new NoiDungChuong();
        $chuongtruoc = $chuongtruoc->next_chuong($id_truyen,$stt-1);
      }else{
        $chuongke= new NoiDungChuong();
        $chuongke = $chuongke->next_chuong($id_truyen,$stt+1);
        $chuongtruoc= new NoiDungChuong();
        $chuongtruoc = $chuongtruoc->next_chuong($id_truyen,$stt-1);
      }
    }
    function chitiet_nd_chuong($link){
      if(substr_count($link,'www.ruochenwx.com')>0){
        $nd_chuong = file_get_html($link);
        $noidung =$nd_chuong->find('#wudidexiaoxiao',0);
        return $noidung;
      }
      if(substr_count($link,'www.mbtxt.la')>0){
        $noidung = file_get_html($link);
        $noidung->find('.readmiddle',0)->outertext ='';
        $noidung ->load($noidung ->save());
        $chuong = $noidung->find('.readcontent',0);
        return $chuong;
      }
      if(substr_count($link,'www.sxyxht.com')>0){
        $nd_chuong = file_get_html($link);
        $noidung =$nd_chuong->find('#BookText',0);
        return $noidung;
      }
     
    }
    public function chitiet_chuong($id,$chuong){
      $id_truyen=Session::get('id_truyen');
      $id_tacgia=Session::get('id_tacgia');
      $ten=Session::get('ten_truyen');
      $nd_chuong = new NoiDungChuong();
      $nd_chuong = $nd_chuong->get_chuong($id_truyen,$chuong);
      $link_chuong=$nd_chuong[0]->link_chuong;
      $nd_chuong1 = new NoiDungChuong();
      $nd_chuong1 = $nd_chuong1->get_stt_chuong($id_truyen,$chuong);
      $stt = $nd_chuong1[0]->thu_tu_chuong;
      $stt_cuoi =new NoiDungChuong();
      $stt_cuoi = $stt_cuoi->get_new_chuong($id_truyen);
      
      if($stt==1){
        $chuongke= new NoiDungChuong();
        $chuongke = $chuongke->next_chuong($id_truyen,$stt+1);
      }else if($stt == $stt_cuoi[0]->thu_tu_chuong){
        $chuongtruoc= new NoiDungChuong();
        $chuongtruoc = $chuongtruoc->next_chuong($id_truyen,$stt-1);
      }else{
        $chuongke= new NoiDungChuong();
        $chuongke = $chuongke->next_chuong($id_truyen,$stt+1);
        $chuongtruoc= new NoiDungChuong();
        $chuongtruoc = $chuongtruoc->next_chuong($id_truyen,$stt-1);
      }
      $noidung=$this->chitiet_nd_chuong($link_chuong);
      $tacgia=new TacGia();
      $tacgia=$tacgia->get_tacgia($id_tacgia);
      if(isset($chuongke)&&isset($chuongtruoc)){
        return view('chitiet_chuong',compact('ten','chuong','noidung','chuongtruoc','chuongke','tacgia'));
      }else if(isset($chuongke)){
        return view('chitiet_chuong',compact('ten','chuong','noidung','chuongke','tacgia'));
      }else{ return view('chitiet_chuong',compact('ten','chuong','noidung','chuongtruoc','tacgia'));}

    }
    public function trangchu(){
      $newtruyen = new Truyen();
      $newtruyen = $newtruyen->get_new_truyen();
      $viewtruyen = new Truyen();
      $viewtruyen = $viewtruyen->get_view_truyen();
      $hiendai = new Truyen();
      $hiendai = $hiendai->cung_loai_truyen(12,1);
      $cotrang = new Truyen();
      $cotrang = $cotrang->cung_loai_truyen(12,2);
      return view('trangchu',compact('newtruyen','viewtruyen','hiendai','cotrang'));
    }
    public function add_chuong_sxyxht($link,$id_truyen){
      $link ='http://dichtienghoa.com/translate/www.sxyxht.com?u='.$link.'&t=vi';
      $noidung = file_get_html($link);
      $link_chuong = $noidung->find('.inner',2)->find('dd');
      foreach($link_chuong as $linkc){
        $tenchuong =$linkc->plaintext;
        $li =$linkc->find('a',0)->href;
        $lin = 'http://dichtienghoa.com'.$li;
        $addchuong = new NoiDungChuong();
        $addchuong = $addchuong -> insert_chuong($tenchuong,$lin,$id_truyen);
      }
      return 'Them thanh cong';
      
    }
    public function add_chuong_mbtxt($link,$id_truyen){
      $link ='http://dichtienghoa.com/translate/www.mbtxt.la?u='.$link.'&t=vi';
      $noidung = file_get_html($link);
      $link_chuong= $noidung->find('#list-chapterAll',0)->find('dd');  
      foreach($link_chuong as $linkc){
        $tenchuong =$linkc->plaintext;
        $li =$linkc->find('a',0)->href;
        $lin = 'http://dichtienghoa.com'.$li;
        $addchuong = new NoiDungChuong();
        $addchuong = $addchuong -> insert_chuong($tenchuong,$lin,$id_truyen);
      }
      return 'Them thanh cong';
      
    }
    public function add_chuong_ruochenwx($link,$id_truyen){
      $link ='http://dichtienghoa.com/translate/www.ruochenwx.com?u='.$link.'&t=vi';
      $noidung = file_get_html($link);
      $link_chuong= $noidung->find('#list-chapterAll',0)->find('dd');  
      foreach($link_chuong as $linkc){
        $tenchuong =$linkc->plaintext;
        $li =$linkc->find('a',0)->href;
        $lin = 'http://dichtienghoa.com'.$li;
        $addchuong = new NoiDungChuong();
        $addchuong = $addchuong -> insert_chuong($tenchuong,$lin,$id_truyen);
      }
      return 'Them thanh cong';
      
    }



    
}
