<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    protected $table = "review";

    public function truyen(){
        return $this -> belongsTo('App\Truyen','truyen_id','id_review');
    }

    public function thanh_vien(){
        return $this -> belongsTo('App\ThanhVien','user_id','id_review');
    }

    public function cu_bao_user(){
        return $this -> hasMany('App\CuBaoUers','id_review','id_review');
    }
}
