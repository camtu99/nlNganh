@extends('layouttruyen')
@section('content')
    <div>
        @isset($tacgia)
        <ul class="tacgia_ds">
            @foreach ($tacgia as $tg)
               <li>
                    <div  style="display: flex;width:600px;margin:auto;">
                        <b style="margin:auto 0;margin-right: auto"><a style="color: black" href="{{$tg->ten_tac_gia}}">{{$tg->ten_tac_gia}}</a></b>
                        <p style="margin: auto 0">{{$tg->sotruyen}} truyện</p>
                    </div>   
               </li>          
            @endforeach 
        </ul>
        @endisset
    </div>
@endsection