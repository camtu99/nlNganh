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
    public function insert_cubao_user($id_tk,$noidung){
        DB::table('cu_bao_user')
            ->insert([
                'user_id'=>$id_tk,
                'nd_cu_bao'=>$noidung
            ]);
    }
}
