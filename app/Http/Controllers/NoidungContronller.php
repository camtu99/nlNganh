<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\NoiDungChuong;
use App\Truyen;
use App\TacGia;
class NoidungController extends Controller
{
    public function insert_truyen( Request $request ){
       $link = $request-> input('li');
       $noidung = file_get_html($link);
       $ten_truyen = $noidung ->find('.book-info-text',0)->find('h1',0)->plaintext;
       $tac_gia = $noidung -> find('.book-info-text',0) -> find('a',0)->plaintext;
       $chuong= $noidung->find('.chapter-list',0)->find('a');
       $hinhanh='test';
       $tinhtrang ='test';
       $ngaytao='2021-12-12';
       $add_tacgia = new TacGia();
       $add_tacgia = $add_tacgia ->insert_tac_gia($tac_gia);
       $id_tacgia = new TacGia();
       $id_tacgia = json_decode($id_tacgia -> get_id_tac_gia($tac_gia));
       $tacgia=$id_tacgia[0]->tac_gia_id;
       $inserttruyen = new Truyen();
       $inserttruyen = $inserttruyen ->insert_truyen($ten_truyen,$link,$hinhanh,$tinhtrang,$tacgia,$ngaytao);
       $id_truyen = new Truyen();
       $id_truyen = json_decode($id_truyen -> get_id_truyen($ten_truyen));
       $truyen=$id_truyen[0]->truyen_id;
       foreach ($chuong as $tap){
            $tenchuong = $tap->plaintext;
            $linkchuong = $tap->href;
            $addchuong = new NoiDungChuong();
            $addchuong = $addchuong -> insert_chuong($tenchuong,$linkchuong,$truyen);
      }
        $truyen = new Truyen();
        $truyen = $truyen -> get_all_truyen();
        return view('test',compact('link'));
    }

    public function update_ten_truyen(Request $req){
        $id = $req -> input('id_truyen');
        $link = $req -> input('link');
        $ten_truyen = $req -> input('ten_truyen');
        $update = new Truyen();
        $update = $update -> update_ten_truyen($id,$ten_truyen,$link);
        return view();//để vô thông báo

    }

}