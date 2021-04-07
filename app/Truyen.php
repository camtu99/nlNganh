<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Truyen extends Model
{
    protected $table = "truyen";
    public $timestamps = false;
    public function tag_truyen(){
        return $this -> hasMany('App\TagTruyen','truyen_id','truyen_id');
    }

    public function luot_doc(){
        return $this -> hasMany('App\LuotDoc','truyen_id','truyen_id');
    }

    public function noi_dung_chuong(){
        return $this -> hasMany('App\NoiDungChuong','truyen_id','truyen_id');
    }

    public function binh_luan(){
        return $this -> hasMany('App\BinhLuan','truyen_id','truyen_id');
    }

    public function review(){
        return $this -> hasMany('App\Review','truyen_id','truyen_id');
    }

    public function nguoi_dang_truyen(){
        return $this -> hasMany('App\NguoiDangTruyen','truyen_id','truyen_id');
    }

    public function bao_cao_truyen(){
        return $this -> hasMany('App\BaoCaoTruyen','truyen_id','truyen_id');
    }

    public function truyen_thu_vien(){
        return $this -> hasMany('App\TruyenThuVien','truyen_id','truyen_id');
    }

    public function tac_gia(){
        return $this -> hasMany('App\TacGia','truyen_id','truyen_id');
    }
   
    public function insert_truyen($ten,$link,$hinhanh,$tinhtrang,$tacgia,$ngaytao)
    {
        $check =DB::table('truyen') 
                    -> where('ten_truyen','=',$ten)
                    ->doesntExist();
        if($check){
            DB::table('truyen')
            -> insertGetId([
                'ten_truyen' => $ten,
                'link_truyen' => $link,
                'hinh_anh' => $hinhanh,
                'tinh_trang' => $tinhtrang,
                'tac_gia_id' => $tacgia,
                'ngay_tao' => $ngaytao,
                'luot_doc'=> 0
            ]);
        }
    }

    public function get_id_truyen($tentruyen){
       $id= DB::table('truyen') 
            -> where('ten_truyen','=',$tentruyen)
            ->select('truyen_id')
            ->get();
        return $id;
    }

    public function update_ten_truyen($id,$tentruyen,$link){
        DB::table('truyen')
            ->where('truyen_id','=',$id)
            ->update([
                'ten_truyen'=> $tentruyen,
                'link_truyen' => $link
            ]);
    }

    public function update_hinh($id,$anh){
        DB::table('truyen')
            -> where ('truyen_id','=',$id)
            ->update(['hinh_anh' => $anh ]);
    }

    public function get_truyen($id){
        $truyen = DB::table('truyen')
                    -> join('tac_gia','truyen.tac_gia_id','=','tac_gia.tac_gia_id')
                    -> where ('truyen_id','=',$id)
                    ->get();
        return $truyen;
    }

    public function get_all_truyen(){
        $truyen = DB::table('truyen')
                -> join('tac_gia','truyen.tac_gia_id','=','tac_gia.tac_gia_id')          
                ->get();
        return $truyen;
    }
    public function check_truyen($link){
        $check =DB::table('truyen') 
                    -> where('link_truyen','=',$link)
                    ->get();
        $check = json_decode($check);
        if(empty($check)){
            $truyen = 'ok';
        }else{$truyen ='fail';}
        return $truyen;
    }
}
