<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class BinhLuan extends Model
{
    protected $table = "binh_luan";

    public function thanh_vien(){
        return $this -> belongsTo('App\User','id','user_id');
    }

    public function truyen(){
        return $this -> belongsTo('App\Truyen','truyen_id','truyen_id');
    }

    public function cu_bao_user(){
        return $this -> hasMany('App\Review','id_review','id_review');
    }

    public function get_binh_luan_chitiet($id_truyen){
        $binhluan = DB::table('binh_luan')
                -> join('users','users.id','=','binh_luan.user_id')
                -> where('truyen_id','=',$id_truyen)
                ->where('trang_thai_bl','=','sẵn sàng')
                ->where('loai_binh_luan','=',null)
                -> paginate(2);
        return $binhluan;
    }
    public function get_binh_luan_chitiet_cubao($id_truyen,$id_bl){
        $binhluan = DB::table('binh_luan')
                -> join('users','users.id','=','binh_luan.user_id')
                -> where('truyen_id','=',$id_truyen)
                -> where('id_binh_luan','=',$id_bl)               
                -> paginate(10);
        return $binhluan;
    }
    public function bl_review(){
        $binhluan = DB::table('binh_luan')
            ->join('users','users.id','=','binh_luan.user_id')
            ->join('review','review.id_review','=','binh_luan.id_review')
            ->get();
            return $binhluan;      
    }
    public function topbinhluan($ngay){
        $binhluan = DB::select("SELECT date(`ngay_bl`) as ngay,COUNT(DAY(`ngay_bl`)) AS sl_binhluan FROM `binh_luan` WHERE MONTH(`ngay_bl`)= ".$ngay." GROUP BY `ngay_bl`");
        return $binhluan;
    }
    public function add_review_bl($id,$id_rv,$nd_bl){
        $tichphan=DB::table('users')
            ->where('id','=',$id)
            ->get();
        $cong = $tichphan[0]->thanh_tich + 3;
        $congtichphan = DB::table('users')
                            ->where('id','=',$id)
                            ->update(['thanh_tich'=>$cong]); 
                                
        DB::table('binh_luan')
                ->insert([
                    'nd_binh_luan'=>$nd_bl,
                    'id_review'=>$id_rv,
                    'user_id'=>$id
                ]);
    }
    public function add_binhluan_bl($id,$id_bl,$nd_bl,$id_truyen){
        $tichphan=DB::table('users')
        ->where('id','=',$id)
        ->get();
    $cong = $tichphan[0]->thanh_tich + 5;
    $congtichphan = DB::table('users')
                        ->where('id','=',$id)
                        ->update(['thanh_tich'=>$cong]);
        DB::table('binh_luan')
        ->insert([
            'nd_binh_luan'=>$nd_bl,
            'id_binh_luan_con'=>$id_bl,
            'truyen_id'=>$id_truyen,
            'user_id'=>$id
        ]);
    }
    public function add_cam($nd,$id){
        DB::table('binh_luan')
                ->insert([
                    'nd_binh_luan'=>$nd,
                    'user_id'=>$id
                ]);
    }
    public function bl_id($id){
        $bl = DB::table('binh_luan')
                -> join('users','users.id','=','binh_luan.user_id')
                ->where('id_binh_luan','=',$id)
                ->get();
                return $bl;
    }
    public function add_truyen_bl($id,$nd,$id_truyen){
        $tichphan=DB::table('users')
        ->where('id','=',$id)
        ->get();
    $cong = $tichphan[0]->thanh_tich + 3;
    $congtichphan = DB::table('users')
                        ->where('id','=',$id)
                        ->update(['thanh_tich'=>$cong]);
        DB::table('binh_luan')
        ->insert([
            'nd_binh_luan'=>$nd,
            'truyen_id'=>$id_truyen,
            'user_id'=>$id
        ]);
    }
    public function cam_nhung(){
        $ds = DB::table('binh_luan')
                -> join('users','users.id','=','binh_luan.user_id')
                ->where('truyen_id','=',Null)
                ->where('id_review','=',null)
                ->get();
                return $ds;
    }
    public function add_bl_sao($id,$id_user,$sao,$nd){
        DB::table('binh_luan')
            ->insert([
                'truyen_id'=>$id,
                'nd_binh_luan'=>$nd,
                'user_id'=>$id_user,
                'danh_gia'=>$sao,
                'loai_binh_luan'=>'Đánh giá sao'
            ]);
    }
    public function get_binh_luan_danh_gia_sao_truyen($id){
        $binhluan = DB::table('binh_luan')
                -> join('users','users.id','=','binh_luan.user_id')
                -> where('truyen_id','=',$id)
                ->where('loai_binh_luan','=','Đánh giá sao')
                ->where('trang_thai_bl','=','sẵn sàng')
                -> paginate(3);
        return $binhluan;
    }
    public function get_diem_sao_binh_luan($id){
        $sql ='SELECT count(*) solan,danh_gia FROM binh_luan WHERE loai_binh_luan = '."'Đánh giá sao'".' AND `truyen_id` = '.$id.' GROUP BY `danh_gia`';
        $diem = DB::select($sql);
        return $diem;
    }
    public function get_all_danh_gia(){
        $binhluan = DB::table('binh_luan')
                    ->join('truyen','truyen.truyen_id','=','binh_luan.truyen_id')
                    -> join('users','users.id','=','binh_luan.user_id')
                    ->where('loai_binh_luan','=','Đánh giá sao')
                    -> paginate(20);
                    return $binhluan;
    }
    public function search_danhgia_ten($ten){
        $binhluan = DB::table('binh_luan')
                    ->join('truyen','truyen.truyen_id','=','binh_luan.truyen_id')
                    -> join('users','users.id','=','binh_luan.user_id')
                    ->where('loai_binh_luan','=','Đánh giá sao')
                    ->where('truyen.ten_truyen','like','%'.$ten.'%')
                    -> paginate(20);
                    return $binhluan;
    }
    public function search_danhgia_ngay($ngay){
        $binhluan = DB::table('binh_luan')
                    ->join('truyen','truyen.truyen_id','=','binh_luan.truyen_id')
                    -> join('users','users.id','=','binh_luan.user_id')
                    ->where('loai_binh_luan','=','Đánh giá sao')
                    ->where('ngay_bl','like',$ngay)
                    -> paginate(20);
                    return $binhluan;
    }
    public function thongke_luotdanhgiatruyen(){
        $truyen = DB::select('SELECT count(*) soluot,ten_truyen FROM `binh_luan` JOIN truyen t ON binh_luan.truyen_id=t.truyen_id WHERE `loai_binh_luan`='."'Đánh giá sao'".' GROUP BY binh_luan.`truyen_id` ORDER BY count(*) DESC LIMIT 10');
        return $truyen;
    }
    public function xoaBinhLuan($id){
        DB::select('UPDATE `binh_luan` SET `trang_thai_bl`= '."'no'".' WHERE `id_binh_luan`= ?', [$id]);       
    }
}
