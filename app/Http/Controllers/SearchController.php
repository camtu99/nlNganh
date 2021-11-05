<?php

namespace App\Http\Controllers;

use App\TheLoai;
use App\Truyen;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchAll(Request $req){
        $search = $req->search;
        $truyen = new Truyen();
        $truyen = $truyen->seachAll($search);
        $theloai = new TheLoai();
        $theloai = $theloai->get_all_theloai();
        return view('timkiem',compact('truyen','theloai'));
    }
    public function chuongmoinhat(){
        $truyen = new Truyen();
        $truyen = $truyen->chuongmoinhat();
        return view('timkiem',compact('truyen'));
    }
}
