<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TruyenThuVien extends Model
{
    protected $table = "truyen_thu_vien";
    public function truyen(){
        return $this -> belongsTo('App\Truyen','truyen_id','truyen_id');
    }
    public function truyentv(){
        return $this -> belongsTo('App\Truyen','id_thu_vien','id_thu_vien');
    }
    public function get_truyenthuvien($id){
        $truyen = DB::table('truyen_thu_vien')
            ->join('thu_vien','thu_vien.id_thu_vien','=','truyen_thu_vien.id_thu_vien')
            ->join('truyen','truyen.truyen_id','=','truyen_thu_vien.truyen_id')
            ->join('tac_gia','tac_gia.tac_gia_id','=','truyen.tac_gia_id')
            ->where('truyen_thu_vien.user_id','=',$id)
            ->get();
            return $truyen;
    }
}
