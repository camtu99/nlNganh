<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Hagtag extends Model
{
    protected $table = "hagtag";

    public function themhagtag($id_truyen, $hagtag){
        DB::table('hagtag')
        ->insert([
            'truyen_id'=>$id_truyen,
            'ten_tag'=> $hagtag 
        ]);
    }
    public function get_hagtag($id_truyen){
        $hagtag = DB::table('hagtag')
                    -> where('truyen_id','=',$id_truyen)
                    ->get();
                    return $hagtag;
    }

    public function deletehagtag($idtag){
       DB::table('hagtag')->where('id_hagtag','=',$idtag)->delete();
    }
}
