@extends('layoutadmin')
@section('content')
<div>
    <div style="margin: 23px">
        <form action="/admin/thanhvien/timkiem" method="post">
            @csrf
            <label for="">Nhập tên thành viên: </label>
            <input type="text"name="timkiem">
            <button type="submit" class="btn btn-success">Tìm</button>
        </form>
    </div>
</div>
<div class="cubaotruyen">
    <table style="background-color: #aliceblue;width:100%;">
        <tbody>
            <tr>
                <th>Id user</th>
                <th>Tên thành viên</th>
                <th>Avatar</th>
                <th>Thành tích</th>
                <th>Chỉnh sửa</th>
            </tr>
            @foreach ($thanhvien as $item)
            @if ($item->phan_quyen==2)      
                @continue
            @endif
                <tr>
                    <td>{{$item->id}}</td>
                    <td style="text-align: left;padding-left:10px">{{$item->name}}</td>
                    <td>
                        @if (substr_count($item->avatar,'http')>0)
                            <img src="{{$item->avatar}}" alt="" >
                        @else
                            <img src="http://127.0.0.1:8000/hinhanh/avatar/{{$item->avatar}}" alt="" >
                        @endif
                    </td>
                    <td>{{$item->thanh_tich}} tích phân</td>
                    <td>
                        @if ($item->phan_quyen==0)
                        <a href="/user/phanquyen/{{$item->id}}/{{$item->phan_quyen}}"style="color: white"> <p type="button" class="btn btn-success"><i class="fas fa-unlock-alt"></i></p></a>
                        @else
                            <p type="button" class="btn btn-secondary"><a href="/user/phanquyen/{{$item->id}}/{{$item->phan_quyen}}"style="color: white"><i class="fas fa-unlock"></i></a></p>
                        @endif       
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="muc-luc-admin">{{$thanhvien->links()}}</div>

</div>    
@endsection
