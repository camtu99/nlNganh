<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ThuVien extends Model
{
    protected $table = "thu_vien";



    public function thanh_vien(){
        return $this -> belongsTo('App\ThanhVien','user_id','id_thu_vien');
    }
}
