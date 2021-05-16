<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TagTruyen extends Model
{
    protected $table = "tag_truyen";
    public $timestamps = false;
    public function truyen(){
        return $this -> belongsTo('App\Truyen','truyen_id','truyen_id');
    }

    public function the_loai(){
        return $this -> belongsTo('App\TheLoai','the_loai_id','the_loai_id');
    }

    public function add_tagtruyen($id,$theloai){
        DB::table('tag_truyen')
            ->insert(
                [
                'truyen_id'=>$id,
                'the_loai_id'=>$theloai
                ]
            );
    }

    public function get_loai($id){
        $loai = DB::table('tag_truyen')
                -> where('truyen_id','=',$id)
                -> join('the_loai','the_loai.the_loai_id','=','tag_truyen.the_loai_id')
                -> get();
        return $loai;
    }
    public function tim_theloai($theloai){
        $truyen = DB::table('tag_truyen')
                    ->join('truyen','tag_truyen.truyen_id','=','truyen.truyen_id')
                    ->join('the_loai','the_loai.the_loai_id','=','tag_truyen.the_loai_id')
                    ->join('tac_gia','tac_gia.tac_gia_id','=','truyen.tac_gia_id')
                    ->where('ten_the_loai','=',$theloai)
                    ->get();
        return $truyen;
    }
    public function xoa_tag($id,$id_user){
        $tag = DB::table('tag_truyen')
                ->where('truyen_id','=',$id)
                ->delete();
        $lichsu = DB::table('lich_su')
                    ->insert([
                        'user_id'=>$id_user,
                        'nd_congviec'=>'Cập nhật thể loại truyện',
                        'truyen_id'=>$id
                    ]);
    }
    
}
