<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class TrangNhung extends Model
{
    protected $table = "trang_nhung";
    public $timestamps = false;

    public function get_trang(){
        $trang = DB::table('trang_nhung')
            ->get();
            return $trang;
    }
    public function add_trang($diachi){
        DB::table('trang_nhung')
            -> insert(['dia_chi'=>$diachi]);
    }
}
