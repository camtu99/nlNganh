@extends('layoutuser')
@section('content')
    
    <div>
        <div class="hopthu">
            <h6>Hộp thư</h6>
            @foreach ($hopthu as $ht)
                <div class="chitiethopthu">
                    <a type="button" href="/hopthu/user/{{$ht->name}}/{{$ht->hopthu_id}}">
                        {{$ht->name}}
                        @if ($ht->tinh_trang == 1)
                            <span style="float: right;">Bạn có thư mới <img src="{!! asset('hinhanh/new.png') !!}" alt="" style="    width: 45px;"></span>
                        @endif
                    </a>                   
                </div>
            @endforeach
        </div>
    </div>

@endsection