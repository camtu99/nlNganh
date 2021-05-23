<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Truycap extends Model
{
    protected $table = "truy_cap";

    // public function truyen(){
    //     return $this -> belongsTo('App\Truyen','truyen_id','id_luot_doc');
    // }

    // public function get_luotdoc($id){
    //     $luotdoc= DB::table('luot_doc')
    //                 -> where('truyen_id','=',$id)
    //                 ->get()
    //                 ->count();
    //     if(!isset($luotdoc)){$luotdoc=0;}
    //     return $luotdoc;
    // }
    // public function add_luot_doc($id){
    //     $luotdoc = DB::table('luot_doc')
    //                 -> insert([
    //                     'truyen_id','=',$id
    //                 ]);
    //     $doc = $this->get_luotdoc($id);
    //     $truyen = DB::table('truyen') 
    //                 ->where('truyen_id','=',$id)
    //                 ->update(['luot_doc'=> $doc+1]);
        
    // }
    public function truycap(){
        DB::table('truycap')->insert(['luot_truycap'=>1]);
    }
    public function All_truycap($ngay){
       
        $truycap = DB::select("SELECT ngay_truycap,COUNT(DAY(`ngay_truycap`)) AS sl FROM `truycap` WHERE MONTH(`ngay_truycap`)= ".$ngay." GROUP BY `ngay_truycap`");
        return $truycap;
    }
}
