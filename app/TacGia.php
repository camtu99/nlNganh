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
    public function get_truyen_ten($tentacgia){
        $truyen = DB::table('tac_gia')
                    ->join('truyen','truyen.tac_gia_id','=','tac_gia.tac_gia_id')
                    ->where('ten_tac_gia','=',$tentacgia)
                    ->get();
                    return $truyen;
    }
    public function all_tac_gia(){
        $tacgia = DB::select('SELECT ten_tac_gia, COUNT(ten_tac_gia) as sotruyen FROM `tac_gia` JOIN truyen ON tac_gia.tac_gia_id=truyen.tac_gia_id GROUP by tac_gia.ten_tac_gia order by sotruyen desc');
        return $tacgia;
    }
}
