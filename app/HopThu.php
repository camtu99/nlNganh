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
    public function get_hopthu($id){
        $hopthu = DB::table('hopthu')
                    ->join('users','users.id','=','hopthu.id_gui')
                    ->where('id_nhan','=',$id)
                    ->get();
                return $hopthu;
    }
    public function get_hopthu_chitiet($id){
        DB::table('hopthu')
                    ->where('hopthu_id','=',$id)
                    ->update(['tinh_trang'=>'2']);
        $hopthu = DB::table('hopthu')
                    ->join('users','users.id','=','hopthu.id_gui')
                    ->where('hopthu_id','=',$id )                         
                    ->get();
                    return $hopthu;
    }
}
