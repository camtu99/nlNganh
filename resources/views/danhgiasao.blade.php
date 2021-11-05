@extends('layoutadmin')
@section('content')
<div style="    display: flex;    margin: 23px; width:100%;font-weight: 500;">
    <div >
        <form action="/admin/truyen/danhgia/search" method="post">
            @csrf
            <label for="">Nhập tên truyen: </label>
            <input type="text"name="timkiem">
            <button type="submit" class="btn btn-success">Tìm</button>
        </form>
    </div>
    <div style="margin-left: auto;margin-right:50px;">
        <form action="/admin/truyen/danhgia/search/day" method="post">
            @csrf
            <label for="">Ngày</label>
            <input type="date" name="ngay" id="">
            <input type="submit" value="Tìm " class="btn btn-success">

        </form>
    </div>
</div>
<div class="cubaotruyen">
    <table style="background-color: #aliceblue;width:100%;">
        <tbody>
            <tr>
                <th>Tên thành viên</th>
                <th>Tên truyện</th>
                <th>Loại đánh giá</th>
                <th>Nội dung đánh giá</th>
                <th>Ngày đánh giá</th>
            </tr>
            @foreach ($danhgia as $item)
                <tr>
                    <td style="text-align: left;padding-left:10px;    font-weight: 500;">{{$item->name}}</td>
                    <td style="text-align: left;padding-left:10px;    font-weight: 500;">{{$item->ten_truyen}}</td> 
                    <td>
                       {{$item->danh_gia}} sao                    
                    </td>
                    <td>{{$item->nd_binh_luan}}</td>
                    <td>
                        {{$item->ngay_bl}}      
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="muc-luc-admin">{{$danhgia->links()}}</div>

</div>    
@endsection