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
}
