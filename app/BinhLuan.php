<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
                -> paginate(10);
        return $binhluan;
    }
    public function get_binh_luan_chitiet_cubao($id_truyen,$id_bl){
        $binhluan = DB::table('binh_luan')
                -> join('users','users.id','=','binh_luan.user_id')
                -> where('truyen_id','=',$id_truyen)
                ->where('id_binh_luan','=',$id_bl)
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
        DB::table('binh_luan')
                ->insert([
                    'nd_binh_luan'=>$nd_bl,
                    'id_review'=>$id_rv,
                    'user_id'=>$id
                ]);
    }
    public function add_binhluan_bl($id,$id_bl,$nd_bl,$id_truyen){
        DB::table('binh_luan')
        ->insert([
            'nd_binh_luan'=>$nd_bl,
            'id_binh_luan_con'=>$id_bl,
            'truyen_id'=>$id_truyen,
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
        DB::table('binh_luan')
        ->insert([
            'nd_binh_luan'=>$nd,
            'truyen_id'=>$id_truyen,
            'user_id'=>$id
        ]);
    }
}
