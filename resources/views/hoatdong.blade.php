@extends('layoutuser')
@section('content')
    <div style="    padding: 20px;
    background-color: aliceblue;">
        @if ($hdtaotk)
            @foreach ($hdtaotk as $hdtk)
                @if ($hdtk->hd_khac=='khac')
                    @if ($hoatdong)
                        @foreach ($hoatdong as $hd)
                            @if ($hd->id_lichsu==$hdtk->id_lichsu)
                                <p style=" border: solid 1px black; margin: 0;padding: 10px 20px;"><span style="font-weight: bold">{{$user[0]->name}}</span> đã <i>{{$hd->nd_congviec}}</i> <span style="font-weight: bold">{{$hd->ten_truyen}}</span> vào lúc {{$hd->ngay_vc}}</p>
                            @endif
                        @endforeach 
                    @endif
                @else
                    <p style=" border: solid 1px black; margin: 0;padding: 10px 20px;"><span style="font-weight: bold">{{$user[0]->name}}</span> đã <i>{{$hdtk->nd_congviec}}</i> vào lúc {{$hdtk->ngay_vc}}</p>   
                @endif      
            @endforeach          
        @else
            Hiện không có hoạt động
        @endif     
    </div>
@endsection