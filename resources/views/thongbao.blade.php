@extends('layoutadmin')
@section('content')
<div style="background-color: #c1d6ec;"><h2 style="padding: 5px 15px;color: #4a4949;">Quảng cáo</h2></div>
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
                   <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Thay đổi</button>             
                </td>
            </tr>
              
                                       
                
            @endforeach
        </tbody>
    </table>
</div> 
<hr>
<div style="background-color: #c1d6ec;"><h2 style="padding: 5px 15px;color: #4a4949;">Thông báo</h2></div>
<div class="cubaotruyen">
    <table style="background-color: #aliceblue;width:100%;">
        <tbody>
            <tr>
                <th>Tên Thông báo</th>
                <th>Link thông báo</th>
                <th>Cài đặt</th>
            </tr>
            @foreach ($thongbao as $item)
            <tr>
                <td style="text-align: left;padding-left:10px;font-weight: 700;">{{$item->ten_topic}}</td>
                <td>{{$item->link_topic}}</td>
                <td>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#qc{{$item->id_topic}}">Thay đổi</button>                           
                </td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
</div>   
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Quảng cáo</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="width:100%">
                <form action="/admin/thongbao/quangcao" method="post">
                    @csrf
                    <div>
                        <label style="width:30%">Tên quảng cáo:</label><input type="text" name="ten_topic" required  style="width:70%">
                    </div>
                    <div>
                        <label  style="width:30%">Link:</label><input type="url" name="link_topic" required  style="width:70%">
                    </div>
                    <div>
                            <label  style="width:30%">Hình ảnh:</label><input type="url" name="hinh_anh_topic" required  style="width:70%">
                    </div>                                       
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Thay đổi</button>  </form> <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        
        </div>
    </div>
  
</div> 
@foreach ($thongbao as $item)
    <div class="modal fade" id="qc{{$item->id_topic}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Quảng cáo</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="width:100%">
                    <form action="/admin/thongbao/thongbao/{{$item->id_topic}}" method="post">
                        @csrf
                        <div>
                            <label style="width:30%">Tên Thông báo:</label><input type="text" name="ten_topic" required  style="width:70%">
                        </div>
                        <div>
                            <label style="width:30%">Link:</label><input type="url" name="link_topic"  required  style="width:70%">
                        </div>
                       
                        
                            
                        
                                                      
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Thay đổi</button>  </form> <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>            
            </div>
        </div>
    </div>  
   
@endforeach
@endsection