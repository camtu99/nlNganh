<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BaoCaoTruyen extends Model
{
    protected $table = "bao_cao_truyen";

    public function thanh_vien(){
        return $this->belongsTo('App\ThanhVien','user_id','id_bao_cao');
    }

    public function truyen(){
        return $this -> belongsTo('App\Truyen','truyen_id','id_bao_cao');
    }

}
