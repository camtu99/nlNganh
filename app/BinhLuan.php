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
    public function bl_review(){
        $binhluan = DB::table('binh_luan')
            ->join('users','users.id','=','binh_luan.user_id')
            ->join('review','review.id_review','=','binh_luan.id_review')
            ->get();
            return $binhluan;      
    }
}
