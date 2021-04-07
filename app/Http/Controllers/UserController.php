<?php
namespace App\Http\Controllers;
class UserController extends Controller
{
    public function callview(){
        return view('welcome');
    }
    public function information(){
        return view('users');
    }
    public function thuvien(){
        return view('thuvien');
    }
    public function review(){
        return view('review');
    }
}