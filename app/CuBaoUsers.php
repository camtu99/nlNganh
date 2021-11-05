<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CuBaoUsers extends Model
{
    protected $table = "cu_bao_user";

    public function thanh_vien(){
        return $this -> belongsTo('App\User','id','user_id');
    }

    public function binh_luan(){
        return $this->belongsTo('App\BinhLuan','id_binh_luan','id_binh_luan');
    }

    public function review(){
        return $this -> belongsTo('App\Review','id_review','id_review');
    }
    public function insert_cubao_review($id_tk,$id_review,$noidung){
        DB::table('cu_bao_user')
            ->insert([
                'user_id'=>$id_tk,
                'id_review'=>$id_review,
                'nd_cu_bao'=>$noidung
            ]);
    }
    public function insert_cubao_binhluan($id_tk,$id_binhluan,$noidung){
        DB::table('cu_bao_user')
            ->insert([
                'user_id'=>$id_tk,
                'id_binh_luan'=>$id_binhluan,
                'nd_cu_bao'=>$noidung
            ]);
    }
    public function insert_cubao_user($id_tk,$noidung){
        DB::table('cu_bao_user')
            ->insert([
                'user_id'=>$id_tk,
                'nd_cu_bao'=>$noidung
            ]);
    }
    public function all_baocao_user(){
        $user = DB::table('cu_bao_user')
                    ->join('users','users.id','=','cu_bao_user.user_id')
                    ->orderByDesc('ngay_cb')
                    ->paginate(20);
                    return $user;
    }
    public function get_tim_user($ten){
        $user = DB::table('cu_bao_user')
                ->join('users','users.id','=','cu_bao_user.user_id')
                ->where('name','like','%'.$ten.'%')
                ->paginate(20);
                return $user;
    }
    public function get_tim_user_ngay($ngay){
        $user = DB::table('cu_bao_user')
                    ->join('users','users.id','=','cu_bao_user.user_id')
                    ->whereDate('ngay_cb',$ngay)
                    ->paginate(20);
                    return $user;
    }
    public function settinhtrang($id,$tinhtrang){
        DB::table('cu_bao_user') ->where('id_cu_bao','=',$id)
                                 ->update(['trang_thai_cu_bao'=>$tinhtrang]); 
    }
    
}
