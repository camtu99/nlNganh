<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bookmarks extends Model
{
    protected $table = "bookmarks";

    public function thanh_vien(){
        return $this -> belongsTo('App\User','id','user_id');
    }

    public function noi_dung_chuong(){
        return $this -> belongsTo('App\NoiDungChuong','noi_dung_chuong_id','noi_dung_chuong_id');
    }

    public function get_bookmark($id){
        $bookmark = DB::table('bookmarks')
                        ->join('noi_dung_chuong','noi_dung_chuong.noi_dung_chuong_id','=','bookmarks.noi_dung_chuong_id')
                        ->join('truyen','truyen.truyen_id','=','noi_dung_chuong.truyen_id')
                        ->join('tac_gia','tac_gia.tac_gia_id','=','truyen.tac_gia_id')
                        ->where('bookmarks.user_id','=',$id)
                        ->get();
                        return $bookmark;
    }
    public function xoa_bookmark($id){
        DB::table('bookmarks')
            ->where('id_bookmark','=',$id)
            ->delete();
    }
    public function them_bookmark($id,$id_bk){
        DB::table('bookmarks')
            -> insert([
                'user_id'=>$id,
                'noi_dung_chuong_id'=>$id_bk
            ]);
    }
}
