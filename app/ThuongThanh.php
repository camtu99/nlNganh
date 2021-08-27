<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ThuongThanh extends Model
{
    protected $table = "thuong_thanh";
    public $timestamps = false;

    public function them_the($id,$loai,$ngay,$ngayhan){
        DB::table('thuong_thanh')
            ->insert([
                'id_user'=>$id,
                'the_mien'=>$loai,
                'ngay_doi'=>$ngay,
                'ngay_han'=>$ngayhan
            ]);
    }
    public function get_ls_giao_dich($id){
        $thuongthanh = DB::table('thuong_thanh')
                        ->where('id_user','=',$id)
                        ->orderByDesc('ngay_doi')
                        ->get();
                        return $thuongthanh;
    }
}
