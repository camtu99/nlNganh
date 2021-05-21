@extends('layoutadmin')
@section('content')
<div>
    <div style="margin: 23px">
        <form action="/admin/truyen/timkiem" method="post">
            @csrf
            <label for="">Nhập tên truyện: </label>
            <input type="text" name="timkiem">
            <button type="submit" class="btn btn-success">Tìm</button>
        </form>
    </div>
</div>
<div class="cubaotruyen">
    <table style="background-color: #aliceblue;width:100%;">
        <tbody>
            <tr>
                <th>Tên Truyện</th>
                <th>Tác giả</th>
                <th>Thành viên đăng</th>
                <th>Khóa truyện</th>
            </tr>
            @foreach ($truyen as $item)
            <tr>
                <td style="text-align: left;padding-left:10px"><a href="/truyen/{{$item->truyen_id}}">{{$item->ten_truyen}}</a></td>
                <td>{{$item->ten_tac_gia}}</td>
                <td>{{$item->name}}</td>
                <td>
                    @if ($item->hien_trang==1)
                        <p style="margin: 5px;" type="button" class="btn btn-success"><a href="/truyen/hientrang/{{$item->truyen_id}}/{{$item->hien_trang}}"style="color: white"><i class="fas fa-unlock-alt"></i></a></p>
                    @else
                        <p style="margin: 5px"  type="button" class="btn btn-secondary"><a href="/truyen/hientrang/{{$item->truyen_id}}/{{$item->hien_trang}}" style="color: white"><i class="fas fa-unlock"></i></a></p>
                    @endif       
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="muc-luc-admin">{{$truyen->links()}}</div>

</div>    
@endsection