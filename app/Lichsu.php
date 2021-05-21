<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Lichsu extends Model
{
    protected $table = "lich_su";

    public function get_lich_su_id($id){
        $hoatdong = DB::table('lich_su')
                    ->join('truyen','truyen.truyen_id','=','lich_su.truyen_id')
                    ->where('lich_su.user_id','=',$id)
                    ->orderByDesc('ngay_vc')
                    ->get();
                    return $hoatdong;
                    
    }
    public function get_lstk_id($id){
        $hoatdong = DB::table('lich_su')
                    ->where('lich_su.user_id','=',$id)
                    ->orderByDesc('ngay_vc')
                    ->get();
                    return $hoatdong;
                    
    }
    

    
}
