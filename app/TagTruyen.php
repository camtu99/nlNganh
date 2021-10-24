<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TagTruyen extends Model
{
    protected $table = "tagtruyen";
    public $timestamps = false;
    public function truyen(){
        return $this -> belongsTo('App\Truyen','truyen_id','truyen_id');
    }

    public function the_loai(){
        return $this -> belongsTo('App\TheLoai','the_loai_id','the_loai_id');
    }

    public function add_tagtruyen($id,$theloai){
        DB::table('tagtruyen')
            ->insert(
                [
                'truyen_id'=>$id,
                'the_loai_id'=>$theloai
                ]
            );
    }

    public function get_loai($id){
        $loai = DB::table('tagtruyen')
                -> where('truyen_id','=',$id)
                -> join('the_loai','the_loai.the_loai_id','=','tagtruyen.the_loai_id')
                -> get();
        return $loai;
    }
    public function tim_theloai($theloai){
        $truyen = DB::table('tagtruyen')
                    ->join('truyen','tagtruyen.truyen_id','=','truyen.truyen_id')
                    ->join('the_loai','the_loai.the_loai_id','=','tagtruyen.the_loai_id')
                    ->join('tac_gia','tac_gia.tac_gia_id','=','truyen.tac_gia_id')
                    ->where('ten_the_loai','=',$theloai)
                    ->get();
        return $truyen;
    }
    public function xoa_tag($id,$id_user){
        $tag = DB::table('tagtruyen')
                ->where('truyen_id','=',$id)
                ->delete();
        $lichsu = DB::table('lich_su')
                    ->insert([
                        'user_id'=>$id_user,
                        'nd_congviec'=>'Cập nhật thể loại truyện',
                        'truyen_id'=>$id
                    ]);
    }
    public function the_loai_id($id_tl,$truyen){
        $tl = DB::table('tagtruyen')
                     ->join('truyen','truyen.truyen_id','=','tagtruyen.truyen_id')
                     ->join('tac_gia','tac_gia.tac_gia_id','=','truyen.tac_gia_id')
                    ->where('the_loai_id','=',$id_tl)
                    ->union($truyen)
                    ->get();
                    
                    return $tl;
    }
    public function get_the_loai($loai_t,$truyen){
       
                        
                 

        
                  


                   
        
    }public function get_the_loai1($loai_t){
       
                        
                 

        $timloai = DB::table('tagtruyen')
                    ->join('truyen','truyen.truyen_id','=','tagtruyen.truyen_id')
                    ->join('tac_gia','tac_gia.tac_gia_id','=','truyen.tac_gia_id')
                    ->where('the_loai_id','=',$loai_t)
                    ->get();
                    ;
                  


                   
        
        return $timloai;
    }
    public function thongke_theloai(){
        $theloai = DB::select('SELECT tl.ten_the_loai,COUNT(t.luot_doc) luotdoc FROM tagtruyen tg JOIN truyen t ON tg.truyen_id=t.truyen_id JOIN the_loai tl ON tg.the_loai_id=tl.the_loai_id GROUP BY tl.ten_the_loai');
    return $theloai;
    }

}
