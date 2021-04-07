<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TruyenThuVien extends Model
{
    protected $table = "truyen_thu_vien";
    public function truyen(){
        return $this -> belongsTo('App\Truyen','truyen_id','id_truyen_thu_vien');
    }
}
