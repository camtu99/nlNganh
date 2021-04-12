<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'name', 'email', 'password', 'provider', 'provider_id'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $table = "thanh_vien";

    public function bookmakrks(){
        return $this -> hasMany('App\Bookmarks','user_id','user_is');
    }

    public function binh_luan(){
        return $this -> hasMany('App\BinhLuan','user_id','user_id');
    }

    public function cu_bao_user(){
        return $this -> hasMany('App\CuBaoUser','user_id','user_id');
    }

    public function nguoi_dang_truyen(){
        return $this -> hasMany('App\NguoiDangTruyen','user_id','user_id');
    }

    public function review(){
        return $this -> hasMany('App\Review','user_id','user_id');
    }

    public function bao_cao_truyen(){
        return $this -> hasMany('App\BaoCaoTruyen','user_id','user_id');
    }

    public function thu_vien(){
        return $this -> hasMany('App\ThuVien','user_id','user_id');
    }

    public function follower(){
        return $this -> hasMany('App\Follow','follower_id','user_id');
    }

    public function following(){
        return $this -> hasMany('App\Follow','following_id','user_id');
    }
}
