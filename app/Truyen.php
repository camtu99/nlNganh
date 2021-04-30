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
    public function user(){
        return $this -> hasMany('App\User','user_id','id');
    }
    public function insert_truyen($ten,$link,$hinhanh,$tinhtrang,$tacgia,$ngaytao,$trangnhung)
    {
        $check =DB::table('truyen') 
                    -> where('ten_truyen','=',$ten)
                    ->doesntExist();
        if($check){
            DB::table('truyen')
            -> insert([
                'ten_truyen' => $ten,
                'link_truyen' => $link,
                'hinh_anh' => $hinhanh,
                'tinh_trang' => $tinhtrang,
                'tac_gia_id' => $tacgia,
                'ngay_tao' => $ngaytao,
                'luot_doc'=> 0,
                'user_id'=>21,
                'trang_nhung'=>$trangnhung
            ]);
        }
        return $check;
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

    public function get_ten_truyen($ten){
        $truyen = DB::table('truyen')
                    -> join('tac_gia','truyen.tac_gia_id','=','tac_gia.tac_gia_id')
                    ->where('ten_truyen','=',$ten)       
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

    public function get_new_truyen(){
        $truyen = DB::table('truyen')
                -> join('tac_gia','truyen.tac_gia_id','=','tac_gia.tac_gia_id')
                ->orderByDesc('ngay_tao')   
                ->limit(12)       
                ->get();
        return $truyen;
    }
    public function get_view_truyen(){
        $truyen = DB::table('truyen')
                -> join('tac_gia','truyen.tac_gia_id','=','tac_gia.tac_gia_id')
                ->orderByDesc('luot_doc')   
                ->limit(8)       
                ->get();
        return $truyen;
    }
    public function get_loai_truyen($id){
        $loai = DB::table('truyen')
                -> join('tac_gia','truyen.tac_gia_id','=','tac_gia.tac_gia_id')
                -> join('tag_truyen','truyen.truyen_id','=','tag_truyen.truyen_id')
                ->where('the_loai_id','=',$id)
                ->orderByDesc('luot_doc')   
                ->limit(8)       
                ->get();
        return $loai;
    }
    public function update_trangthai($tentruyen){
        DB::table('truyen')
            ->where('truyen_id','=',$tentruyen)
            ->update(['tinh_trang'=>'Hoàn thành']);
    }

    public function cung_loai_truyen($limit,$id){
        $truyen= DB::table('truyen')
                ->join('tac_gia','tac_gia.tac_gia_id','=','truyen.tac_gia_id')
                ->join('tag_truyen','tag_truyen.truyen_id','=','truyen.truyen_id')
                ->where('the_loai_id','=',$id)
                ->limit($limit)
                ->get();
                return $truyen;
    }
    public function cung_tacgia($tacgia){       
                $truyen = DB::table('truyen')
                ->where('tac_gia_id','=',$tacgia)           
                ->get();
                return $truyen;
    }
    public function soluong($tacgia){
                $soluong = DB::table('truyen')
                ->where('tac_gia_id','=',$tacgia)
                ->count();
        return $soluong;
        
    }
    public function get_truyen_user($id){
        $truyen = DB::table('truyen')
            ->join('tac_gia','tac_gia.tac_gia_id','=','truyen.tac_gia_id')
            ->where('user_id','=',$id)
            ->get();
            return $truyen;
    }
}
