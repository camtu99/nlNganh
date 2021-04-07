<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CuBaoUsers extends Model
{
    protected $table = "cu_bao_user";

    public function thanh_vien(){
        return $this -> belongsTo('App\ThanhVien','user_id','id_cu_bao');
    }

    public function binh_luan(){
        return $this->belongsTo('App\BinhLuan','id_binh_luan','id_cu_bao');
    }

    public function review(){
        return $this -> belongsTo('App\Review','id_review','id_cu_bao');
    }
}
