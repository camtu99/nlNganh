@extends('layoutadmin')
@section('content')
<h2>Quản lý quảng cáo</h2>
<div class="cubaotruyen">
    <table style="background-color: #aliceblue;width:100%;">
        <tbody>
            <tr>
                <th>Tên Quảng Cáo</th>
                <th>Link Quảng cáo</th>
                <th>Hình ảnh</th>
                <th>Đổi</th>
            </tr>
            @foreach ($quangcao as $item)
            <tr>
                <td style="text-align: left;padding-left:10px;font-weight: 700;">
                   <p>{{$item->ten_topic}}</p>
                </td>
                <td>
                    <p>{{$item->link_topic}}</p>
                </td>
                <td>
                    <img src="{{$item->hinh_anh_topic}}" alt="">                  
                </td>
                <td>
                                   
                </td>
            </tr>
             <tr>
                <div id="qc{{$item->id_topic}}" class="collapse">
                    <form action="/admin/thongbao/quangcao" method="post">
                        @csrf
                        <td><input type="text" name="ten_topic" required></td>
                        <td><input style="    width: 100%;" type="url" name="link_topic" required></td>
                        <td><input type="url" name="hinh_anh_topic" required id=""></td>
                        <td><button type="submit" class="btn btn-success">Thay đổi</button> </td>   
                    </form>
                </div>
            </tr>   
                                       
                
            @endforeach
        </tbody>
    </table>
</div> 
<hr>
<h2>Quảng lý ghim thông báo</h2>
<div class="cubaotruyen">
    <table style="background-color: #aliceblue;width:100%;">
        <tbody>
            <tr>
                <th>Tên Thông báo gim</th>
                <th>Link thông báo</th>
                <th>Cài đặt</th>
            </tr>
            @foreach ($thongbao as $item)
            <tr>
                <td style="text-align: left;padding-left:10px;font-weight: 700;">{{$item->ten_topic}}</td>
                <td>{{$item->link_topic}}</td>
                <td>
                                          
                </td>
            </tr>
            <div id="qc{{$item->id_topic}}" class="collapse">
                <tr>
                    <form action="/admin/thongbao/thongbao/{{$item->id_topic}}" method="post">
                        @csrf
                        <td style="text-align: left;padding-left:10px;font-weight: 700;"><input type="text" name="ten_topic" required></td>
                        <td><input type="url" name="link_topic" id="" required></td>
                        <td>
                            <button type="submit" class="btn btn-success">Thay đổi</button>    
                        </td>
                    </form> 
                </tr>                             
            </div>
            @endforeach
        </tbody>
    </table>
</div>    
@endsection