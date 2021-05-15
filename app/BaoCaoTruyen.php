<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BaoCaoTruyen extends Model
{
    protected $table = "bao_cao_truyen";

    public function thanh_vien(){
        return $this->belongsTo('App\User','id','user_id');
    }

    public function truyen(){
        return $this -> belongsTo('App\Truyen','truyen_id','truyen_id');
    }
    public function add_baoloi($id,$id_user,$noidung){
        DB::table('bao_cao_truyen')
            ->insert([
                'user_id'=>$id_user,
                'truyen_id'=>$id,
                'nd_bao_cao'=>$noidung
            ]);
    }
}
