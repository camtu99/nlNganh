@extends('layoutadmin')
@section('content')
<div style="    display: flex;    margin: 23px; width:100%;font-weight: 500;">
    <div >
        <form action="/admin/baocao/timkiem" method="post">
            @csrf
            <label for="">Nhập tên thành viên: </label>
            <input type="text"name="timkiem">
            <button type="submit" class="btn btn-success">Tìm</button>
        </form>
    </div>
    <div style="margin-left: auto;margin-right:50px;">
        <form action="/admin/baocao/ngay" method="post">
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
                <th>Truyện</th>
                <th>Nội dung báo cáo</th>
                <th>Ngày báo cáo</th>
                <th>Tình trạng</th>
            </tr>
            @foreach ($baocao as $item)
                <tr>
                    <td>{{$item->id_bao_cao}}</td>
                    <td style="text-align: left;padding-left:10px">{{$item->name}}</td>
                    <td>
                        <a href="/chuyentrang/truyen/{{$item->truyen_id}}">{{$item->ten_truyen}}</a>
                    </td>
                    <td>{{$item->nd_bao_cao}}</td>
                    <td>
                        {{$item->ngay_bc}}      
                    </td>
                    <td>
                        @if ($item->tinh_trang_bc=='Chưa giải quyết')
                            <div>
                                <form action="/baocao/tinhtrang/{{$item->id_bao_cao}}" method="get" style="display: flex;width: 100%;">
                                    
                                    <div class="form-group" style="width: 100%;margin: 10px;">
                                        <select class="form-control" id="sel1" name="tinhtrang">
                                          <option value="Chưa giải quyết">Chưa giải quyết</option>
                                          <option value="Đã xong">Đã xong</option>
                                          <option value="Gửi thư nhắc nhở" >Gửi thư nhắc nhở</option>                                  
                                        </select>
                                      </div>
                                      <button style="margin: 10px;" class="btn btn-success" type="submit">Đặt</button>
                                </form>
                            </div>
                        @else
                            @if ($item->tinh_trang_bc=='Đã xong')
                                <div>
                                    <form action="/baocao/tinhtrang/{{$item->id_bao_cao}}" method="get"style="display: flex;width: 100%;">                                   
                                        <div class="form-group"style="width: 100%;margin: 10px;">
                                            <select class="form-control" id="sel1"  name='tinhtrang'>
                                            <option value="Đã xong" >Đã xong</option>
                                            <option value="Chưa giải quyết" >Chưa giải quyết</option>
                                            <option value="Gửi thư nhắc nhở" >Gửi thư nhắc nhở</option>                                                                       
                                            </select>
                                        </div>
                                        <button style="margin: 10px;"  class="btn btn-success" type="submit">Đặt</button>
                                    </form>
                                </div>
                            @else
                            <div>
                                <form action="/baocao/tinhtrang/{{$item->id_bao_cao}}" method="get"style="display: flex;width: 100%;">                                   
                                    <div class="form-group"style="width: 100%;margin: 10px;">
                                        <select class="form-control" id="sel1"  name='tinhtrang'>
                                        <option value="Gửi thư nhắc nhở" >Gửi thư nhắc nhở</option>
                                        <option value="Đã xong" >Đã xong</option>
                                        <option value="Chưa giải quyết" >Chưa giải quyết</option>                                                                                                              
                                        </select>
                                    </div>
                                    <button style="margin: 10px;"  class="btn btn-success" type="submit">Đặt</button>
                                </form>
                            </div>   
                            @endif                           
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="muc-luc-admin">{{$baocao->links()}}</div>

</div>    
@endsection