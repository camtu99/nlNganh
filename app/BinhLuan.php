<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BinhLuan extends Model
{
    protected $table = "binh_luan";

    public function thanh_vien(){
        return $this -> belongsTo('App\ThanhVien','user_id','id_binh_luan');
    }

    public function truyen(){
        return $this -> belongsTo('App\Truyen','truyen_id','id_binh_luan');
    }

    public function cu_bao_user(){
        return $this -> hasMany('App\CuBaoUser','id_cu_bao','id_binh_luan');
    }

    public function get_binh_luan_chitiet($id_truyen){
        $binhluan = DB::table('binh_luan')
                -> join('thanh_vien','thanh_vien.user_id','=','binh_luan.user_id')
                -> where('truyen_id','=',$id_truyen)
                -> paginate(10);
        return $binhluan;
    }
}
