<?php

namespace App\Http\Controllers;

use App\BinhLuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\NoiDungChuong;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Truyen;
use App\TacGia;
use App\TagTruyen;
use App\TheLoai;
use Illuminate\Support\Facades\DB;
use PHPUnit\Util\Json;

use function GuzzleHttp\json_decode;

class Noidung extends Controller
{
    public function add_truyen(Request $req){
      $req->session()->flash('error','Nhúng truyện thành công!!!');
      $link = $req -> input('li');
      $noidung = file_get_html($link);
      $ten_truyen = $req->input('tentruyen');
      $tac_gia = $req -> input('tacgia') ;
      $chuong= $noidung->find('.chapter-list',0)->find('a',0)->href;
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
      $inserttruyen = $inserttruyen ->insert_truyen($ten_truyen,$link,$gethinhanh,$tinhtrang,$tacgia,$ngaytao);
      $id_truyen = new Truyen();
      $id_truyen = json_decode($id_truyen -> get_id_truyen($ten_truyen));
      $truyen=$id_truyen[0]->truyen_id;
      //thêm chương
      $check = true;
      while($check){
        $linkchuong = 'https://truyenplus.vn'.$chuong;
        $nd_chuong = file_get_html($linkchuong);
        $chuong =$nd_chuong ->find('.next',0)->href;
        $tenchuong = $nd_chuong->find('.current-chapter',0)->plaintext;
        if($chuong=='#')
        {
          $addchuong = new NoiDungChuong();
          $addchuong = $addchuong -> insert_chuong($tenchuong,$linkchuong,$truyen);
          $check=false;
        }
        else
        {
          $addchuong = new NoiDungChuong();
          $addchuong = $addchuong -> insert_chuong($tenchuong,$linkchuong,$truyen);
        }
      }
      //thêm thể loại
      
      for($i=1;$i<=6;$i++){
        if($req->input($i)!==null)
        {
          $tag_truyen = new TagTruyen();
          $tag_truyen = $tag_truyen ->add_tagtruyen($truyen,$i);
        }
      }$req->session()->flash('success','Nhúng truyện thành công!!!');
      return view('taotruyen');
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
        $req->session()->flash('error','Trang web đã có người nhúng!!!  Hãy nhúng trang khác nhé.');
        return redirect()->back();
      }else{
        $truyen = file_get_html($link);
        $tentruyen = $truyen ->find('.book-info-text',0)->find('h1',0)->plaintext;
        $tacgia = $truyen -> find('.book-info-text',0) -> find('a',0)->plaintext;
        $theloai = new TheLoai();
        $theloai = $theloai ->get_all_theloai();
        $theloai = json_decode($theloai);
        $taotruyen='Tạo truyện';
        return view('taotruyen',compact('tentruyen','tacgia','theloai','taotruyen','link'));
      }
    }


    public function test(){
      $newtruyen = new Truyen();
      $newtruyen = $newtruyen -> get_new_truyen();
      $newtruyen = json_decode($newtruyen);
      $viewtruyen = new Truyen();
      $viewtruyen = $viewtruyen ->get_view_truyen();
      $viewtruyen = json_decode($viewtruyen);
      $hiendai = new Truyen();
      $hiendai = $hiendai -> get_loai_truyen(1);//hiện đại id=1
      $hiendai = json_decode($hiendai);
      $cotrang = new Truyen();
      $cotrang = $cotrang -> get_loai_truyen(2);//hiện đại id=2
      $cotrang = json_decode($cotrang);
      return view('trangchu',compact('newtruyen','viewtruyen','cotrang','hiendai'));
    }


    public function chitiet_truyen($ten){
      $truyen = new Truyen();
      $truyen = $truyen->get_ten_truyen($ten);
      $truyen = json_decode($truyen);
      $link =$truyen[0]->link_truyen;
      $chitiet = file_get_html($link);
      $tinhtrangtruyen = $truyen[0]->tinh_trang;
      $truyen_id =  $truyen[0]->truyen_id;
      session(['truyen_id' => $truyen_id]);
      $theloai = new TagTruyen();
      $theloai = $theloai -> get_loai($truyen_id);
      $theloai = json_decode($theloai);
      $tinhtrang = $chitiet ->find('.label-status',0)->plaintext;
      if($tinhtrang=='Full' && $tinhtrangtruyen=='Còn tiếp'){
        $chuong = new NoiDungChuong();
        $chuong = $chuong -> get_new_chuong($truyen_id);
        $chuong = json_decode($chuong);
        $linkchuong=$chuong[0]->link_chuong;
        $getchuong = file_get_html($linkchuong);
        $check = true;
        while($check){
          $nextchuong =$getchuong ->find('.next',0)->href;
          $tenchuong = $getchuong->find('.current-chapter',0)->plaintext;
          if($nextchuong=='#')
          {
            $updatetruyen = new Truyen();
            $updatetruyen = $updatetruyen->update_trangthai($ten);
            $check=false;
          }
          else
          {
            $diachi = 'https://truyenplus.vn'.$nextchuong;
            $addchuong = new NoiDungChuong();
            $addchuong = $addchuong -> insert_chuong($tenchuong,$diachi,$truyen);
            $getchuong= file_get_html($diachi);
          }
        }
      }

      $mucluc = new NoiDungChuong();
      $mucluc = $mucluc -> get_noi_dung($truyen_id);
      $binhluan = new BinhLuan();
      $binhluan = $binhluan ->get_binh_luan_chitiet($truyen_id);
      $chitiet ->find('#gioithieu',0)->find('h2',0)->outertext='';
      $chitiet ->load( $chitiet ->save());
      $gioithieu=$chitiet ->find('#gioithieu',0);
      return view('chitiettruyen',compact('mucluc','truyen','gioithieu','theloai','binhluan'));

    }

}
