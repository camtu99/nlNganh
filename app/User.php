<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'id', 'name', 'email','password'

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
    protected $table='users';
    public function bookmakrks(){
        return $this -> hasMany('App\Bookmarks','user_id','id');
    }

    public function binh_luan(){
        return $this -> hasMany('App\BinhLuan','user_id','id');
    }

    public function cu_bao_user(){
        return $this -> hasMany('App\CuBaoUser','user_id','id');
    }

    public function nguoi_dang_truyen(){
        return $this -> hasMany('App\NguoiDangTruyen','user_id','id');
    }

    public function review(){
        return $this -> hasMany('App\Review','user_id','id');
    }

    public function bao_cao_truyen(){
        return $this -> hasMany('App\BaoCaoTruyen','user_id','id');
    }

    public function thu_vien(){
        return $this -> hasMany('App\ThuVien','user_id','id');
    }

    public function follower(){
        return $this -> hasMany('App\Follow','follower_id','id');
    }

    public function following(){
        return $this -> hasMany('App\Follow','following_id','id');
    }
    public function create1($tk,$pass){
        $check = DB::table('users') 
        -> where('email','=',$tk)
        ->doesntExist();
        if($check){
            DB::table('users')
                ->insert([
                    'name' => $tk,
                    'email' => $tk,
                    'password' =>$pass
                ]);
        }
        $user =DB::table('users')->orderByDesc('created_at')->get();
        DB::table('lich_su')
            ->insert([
                'user_id'=>$user[0]->id,
                'nd_congviec'=>'Đã tạo tài khoản',
                'hd_khac'=>3
            ]);
        return $check;
    }

    public function get_users($id){
        $user = DB::table('users')
                ->where('id','=',$id)
                ->get();
            return $user;
    }
    public function all_user(){
        $user = DB::table('users')->paginate(20);
        return $user;
    }
    public function get_id($email){
        $id = DB::table('users')
            ->where('email','=',$email)
            ->get();
            return $id;
    }
    public function xacthuc_email($id){
        DB::table('users')
            ->where('id','=',$id)
            ->update(['email_verified_at'=>'1']);
    }
    public function doimatkhau($id,$pass){
        DB::table('users')
            ->where('id','=',$id)
            ->update(['password'=>$pass]);
    }
    public function sua_anh($id,$anh){
        DB::table('users')
            ->where('id','=',$id)
            ->update(['avatar' => $anh]);
    }
    public function sua_anh_bia($id,$anh){
        DB::table('users')
        ->where('id','=',$id)
        ->update(['anh_bia' => $anh]);
    }
    public function upload_thongtin($id,$ten,$pass,$thongtin){
        DB::table('users')
            ->where('id','=',$id)
            ->update([
                'name' => $ten,
                'password' => $pass,
                'thongtin' => $thongtin
            ]);
    }
    public function upload_thongtinnopass($id,$ten,$thongtin){
        DB::table('users')
        ->where('id','=',$id)
        ->update([
            'name' => $ten,
            'thongtin' => $thongtin
        ]);
    }
    public function congviec($id){
        $binhluan = DB::table('binh_luan')
                    ->where('user_id','=',$id)
                    ->get();
        $follow = DB::table('follow')
                    ->where('follower_id','=',$id)
                    ->get();
    }
    public function timkiem_thanhvien($tim){
        $thanhvien = DB::table('users')
                        ->where('name','like','%'.$tim.'%')
                        ->paginate(20);
                        return $thanhvien;
    }
    public function phanquyen_admin($id,$quyen){
        DB::table('users')
                ->where('id','=',$id)
                ->update(['phan_quyen'=>$quyen]);
    }
}
