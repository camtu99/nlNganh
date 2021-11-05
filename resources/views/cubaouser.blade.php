@extends('layoutadmin')
@section('content')
<div style="    display: flex;    margin: 23px; width:100%;font-weight: 500;">
    <div >
        <form action="/admin/baocao/user/timkiem" method="post">
            @csrf
            <label for="">Nhập tên thành viên: </label>
            <input type="text"name="timkiem">
            <button type="submit" class="btn btn-success">Tìm</button>
        </form>
    </div>
    <div style="margin-left: auto;margin-right:50px;">
        <form action="/admin/baocao/user/ngay" method="post">
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
                <th>Id</th>
                <th>Tên thành viên</th>
                <th>Thể loại</th>
                <th>Nội dung báo cáo</th>
                <th>Ngày báo cáo</th>
                <th>Tình trạng</th>
            </tr>
            @foreach ($taikhoan as $item)
                <tr>
                    <td>{{$item->id_cu_bao}}</td>
                    <td style="text-align: left;padding-left:10px;    font-weight: 500;">{{$item->name}}</td>
                    <td>
                        @if ($item->id_binh_luan)
                            <a style="color: coral;" href="/chuyentrang/baocao/binhluan/{{$item->id_binh_luan}}">Bình luận</a>
                        @else
                            @if ($item->id_review)
                                <a style="color: blue" href="/chuyentrang/baocao/review/{{$item->id_review}}">Review</a>
                            @else
                                <a style="color: deeppink;" href="/baocao/user/{{$item->user_id}}">Thành viên</a>
                            @endif
                        @endif                      
                    </td>
                    <td>{{$item->nd_cu_bao}}</td>
                    <td>
                        {{$item->ngay_cb}}      
                    </td>
                    <td>
                        @if ($item->trang_thai_cu_bao=='Chưa giải quyết')
                            <div>
                                <form action="/cubao/tinhtrang/{{$item->id_cu_bao}}" method="get" style="display: flex;width: 100%;">
                                    
                                    <div class="form-group" style="width: 100%;margin: 10px;">
                                        <select class="form-control" id="sel1" name="tinhtrang">
                                          <option value="Chưa giải quyết">Chưa giải quyết</option>
                                          <option value="Đã xong">Đã xong</option>                                 
                                        </select>
                                      </div>
                                      <button style="margin: 10px;" class="btn btn-success" type="submit">Đặt</button>
                                </form>
                            </div>
                        @else
                            <div>
                                <form action="/cubao/tinhtrang/{{$item->id_cu_bao}}" method="get"style="display: flex;width: 100%;">
                                   
                                    <div class="form-group"style="width: 100%;margin: 10px;">
                                        <select class="form-control" id="sel1"  name='tinhtrang'>
                                        <option value="Đã xong" >Đã xong</option>
                                        <option value="Chưa giải quyết" >Chưa giải quyết</option>                                                                        
                                        </select>
                                    </div>
                                    <button style="margin: 10px;"  class="btn btn-success" type="submit">Đặt</button>
                                </form>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="muc-luc-admin">{{$taikhoan->links()}}</div>

</div>    
@endsection