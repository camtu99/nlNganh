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
    
    public function get_noi_dung($id){
        $noidung= DB::table('noi_dung_chuong')
            ->where('truyen_id','=',$id)
            ->paginate(99);
        return $noidung;
    }

    public function insert_chuong($tenchuong,$linkchuong,$truyen){
        $stt = DB::table('noi_dung_chuong')
                ->where('truyen_id','=',$truyen)
                ->get()
                ->count();
        $stt=$stt+1;$date = date('Y-m-d  h:i:s');
        DB::table('noi_dung_chuong') 
            -> insertGetId([
                    'ten_chuong' => $tenchuong,
                    'link_chuong' => $linkchuong,
                    'truyen_id' => $truyen,
                    'thu_tu_chuong' => $stt
                ]);
    } 
    public function get_new_chuong($id){
        $chuong = DB::table('noi_dung_chuong')
                    -> where('truyen_id','=',$id)
                    ->orderBy('thu_tu_chuong','desc')
                    ->limit(1)
                    ->get();
                return $chuong;
    }  
    public function get_chuong($id,$chuong){
        $chuong = DB::table('noi_dung_chuong')
                    ->where('truyen_id','=',$id)
                    ->where('ten_chuong','=',$chuong)
                    ->get();
                    $doc1 = DB::table('truyen')->where('truyen_id','=',$id)->get();
                    $doc = $doc1[0]->luot_doc;
                    $truyen = DB::table('truyen') 
                                ->where('truyen_id','=',$id)
                                ->update(['luot_doc'=> $doc+1]);
                    DB::table('truycap')->insert(['truyen_id'=>$id]);
                    return $chuong;
                
    }
    public function get_stt_chuong($id,$chuong){
        $chuong = DB::table('noi_dung_chuong')
                    ->where('truyen_id','=',$id)
                    ->where('ten_chuong','=',$chuong)
                    -> get();
                    return $chuong;
    }
    public function next_chuong($id,$stt){
        $chuong = DB::table('noi_dung_chuong')
                    ->where('truyen_id','=',$id)
                    ->where('thu_tu_chuong','=',$stt)
                    ->get();
                    return $chuong;
    }
    public function sochuong($id){
        $chuong =DB::table('noi_dung_chuong')
                    ->where('truyen_id','=',$id)
                    ->count();
                    return $chuong;

    }
    
}
