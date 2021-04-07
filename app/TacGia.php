<?php

namespace App;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TacGia extends Model
{
    protected $table = "tac_gia";
    public $timestamps = false;
    public function truyen(){
        return $this -> hasMany('App\Truyen','tac_gia_id','tac_gia_id');
    }

    public function insert_tac_gia($tentacgia){
        $check = DB::table('tac_gia')
                        ->where('ten_tac_gia','=',$tentacgia)
                        ->get();
        $check = json_decode($check);
         if(empty($check)){
             DB::table('tac_gia')
             -> insertGetId([ 'ten_tac_gia' => $tentacgia]);
         }   
    }
    public function get_id_tac_gia($tentacgia){
        $tacgia = DB::table('tac_gia')
            ->where('ten_tac_gia','=',$tentacgia)
            ->select('tac_gia_id')
            ->get();
        return $tacgia;
    }

    public function get_tacgia($id){
        $tacgia = DB::table('tac_gia')
            ->where('tac_gia_id','=',$id)
            ->get();
        return $tacgia;
    }
}
