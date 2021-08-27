<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class HopThu extends Model
{
    //
    protected $table = "hopthu";

    public function create_mes($id_nhan,$id_gui,$mes){
        DB::table('hopthu')
        ->insert([
            'id_gui'=>$id_gui,
            'id_nhan'=>$id_nhan,
            'noi_dung'=>$mes
        ]);
    }
}
