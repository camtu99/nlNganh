<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NguoiDangTruyen extends Model
{
    protected $table = "nguoi_dang_truyen";

    public function thanh_vien(){
        return $this -> belongsTo('App\ThanhVien','user_id','id_dang');
    }

    public function truyen(){
        return $this -> belongsTo('App\Truyen','truyen_id','id_dang');
    }
}
