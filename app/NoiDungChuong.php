<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NoiDungChuong extends Model
{
    protected $table = "noi_dung_chuong";
    public $timestamps = false;
    public function bookmark(){
        return $this -> hasMany('App\Bookmarks','noi_dung_chuong_id','noi_dung_chuong_id');
    }

    public function truyen(){
        return $this -> belongsTo('App\Truyen','truyen_id','noi_dung_chuong_id');
    }
    
    public function get_noi_dung(){
        $noidung= DB::table('noi_dung_chuong')
            ->where('noi_dung_chuong_id','=',1)
            ->get();
        return $noidung;
    }

    public function insert_chuong($tenchuong,$linkchuong,$truyen){
        $stt = DB::table('noi_dung_chuong')
                ->where('truyen_id','=',$truyen)
                ->get()
                ->count();
        $stt=$stt+1;
        DB::table('noi_dung_chuong') 
            -> insertGetId([
                    'ten_chuong' => $tenchuong,
                    'link_chuong' => $linkchuong,
                    'truyen_id' => $truyen,
                    'thu_tu_chuong' => $stt
                ]);
    }   
}
