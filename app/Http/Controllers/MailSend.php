<?php

namespace App\Http\Controllers;

use App\Follow;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use \App\Mail\SendMail;
use App\TheLoai;
use Illuminate\Support\Facades\Mail;
use App\User;
class MailSend extends Controller
{
    //
    public function mailsend($id,$email)
    {   
        $link='http://127.0.0.1:8000/xacthuc/email/'.$id;
        $details = [
            'title' => ' Xác thực email Nhã Các',
            'body' => ' Cảm ơn bạn đã đăng kí trang web <br> Vui lòng xác thực email',
            'link'=>$link
        ];

        Mail::to($email)->send(new SendMail($details));
        Session::flash('Success','Đã gửi đến email '.$email);
        $theloai = new TheLoai();
        $theloai = $theloai->get_all_theloai();
        return view('emails.xacthuc_email',compact('email','id','theloai'));
    }

    public function xacthuc($id){
        $check = new User();
        $check = $check -> xacthuc_email($id);
        Session::flash('success','Đã xác thực thành công');
        $user = new User();
        $user = $user -> get_users($id);
        $path = 'user/'.$user[0]->name;
        return redirect($path);   
    }
    public function repassword(Request $req)
    {   $email =$req->email; 
        $check = new User();
        $check = $check->get_id($email);
        $link='http://127.0.0.1:8000/repassword/email/'.$check[0]->id;
        $body =  'Đặt lại mật khẩu cho tài khoản '.$check[0]->name;
        $details = [
            'title' => ' Xác thực đặt lại mật khẩu tại Nhã Các',
            'body' => $body,
            'link'=>$link
        ];

        Mail::to($email)->send(new SendMail($details));
        Session::flash('Success','Đã gửi đến email '.$email);
        return view('emails.repassword',compact('email'));
    }
}
