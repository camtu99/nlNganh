@extends('layouttruyen')
@section('content')
<div class="tieude">
    <div class="tieude1">
        <p>
            {{$ten_truyen}} >> {{$nd_chuong->ten_chuong}} 
        </p>
        <div class="muclucchuong">
              
                    <a href="chitiettruyen.php">Mục lục</a>
                    <a href="noidungchuong.php?chuong=54">Chương sau</a>
                                </div>
    </div>
    <hr style="margin: 0;">
</div>
@endsection