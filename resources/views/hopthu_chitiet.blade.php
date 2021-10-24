@extends('layoutuser')
@section('content')
    <div>
        <div>          
            <div style="padding: 10px;background-color: white;">
                <div style="padding: 10px 5px; color: #10b238;font-weight: 700;background-color: #b3d7ff1a;">
                    @if (substr_count($hopthu[0]->avatar,'http')>0)
                        <img style="width: 50px;height: 50px;border-radius: 50%;" src="{{$hopthu[0]->avatar}}" >  
                        {{$hopthu[0]->name}}
                    @else
                        <img style="width: 50px;height: 50px;border-radius: 50%;" src="http://127.0.0.1:8000/hinhanh/avatar/{{$hopthu[0]->avatar}}" alt="">  
                        {{$hopthu[0]->name}}
                    @endif 
                </div>
                <p style="padding: 10px 5px;">{{$hopthu[0]->noi_dung}}</p>                           
            </div>
            <a href="/hopthu/user" type="button" class="btn btn-success" style="    float: right; margin: 5px;"> Trở về</a>
        </div>
    </div>
@endsection