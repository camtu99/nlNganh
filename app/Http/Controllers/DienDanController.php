<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
class DienDanController extends Controller
{
    public function index(){
        $theloai =new TheLoai();
        $theloai = $theloai->get_all_theloai();
        return view('diendan',compact('theloai'));
    }
}
