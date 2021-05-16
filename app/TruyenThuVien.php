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
    public function truyen_thuvien($id,$id_thuvien,$id_user){
        DB::table('truyen_thu_vien')
            ->insert([
                'truyen_id'=>$id,
                'user_id'=>$id_user,
                'id_thu_vien' =>$id_thuvien
            ]);
                DB::table('lich_su')
                    ->insert([
                        'user_id'=>$id_user,
                        'nd_congviec'=>'Thêm vào thư viện truyện',
                        'truyen_id'=>$id
                    ]);
    }
}
