<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Follow extends Model
{
    protected $table = "follow";

    public function follower(){
        return $this -> BelongsTo('App\User','follower_id','id');
    }

    public function following(){
        return $this -> BelongsTo('App\User','following_id','id');
    }

    public function get_follower($id){
        $user = DB::table('follow')
            ->where('following_id','=',$id)
            ->join('users','users.id','=','follow.follower_id')
            ->get();
        return $user;
    }
    public function get_following($id){
        $user = DB::table('follow')
            ->where('follower_id','=',$id)
            ->join('users','users.id','=','follow.following_id')
            ->get();
        return $user;
    }
    public function huy_follow($id_er,$id_ing){
        DB::table('follow')
            ->where('follower_id','=',$id_er)
            ->where('following_id','=',$id_ing)
            ->delete();
    }
    public function them_follow($id_er,$id_ing){
        DB::table('follow')
            ->insert([
                'follower_id'=>$id_er,
                'following_id'=>$id_ing
            ]);
            $tichphan=DB::table('users')
            ->where('id','=',$id_ing)
            ->get();
        $cong = $tichphan[0]->thanh_tich + 1;
        $congtichphan = DB::table('users')
                            ->where('id','=',$id_ing)
                            ->update(['thanh_tich'=>$cong]); 
    }
}
