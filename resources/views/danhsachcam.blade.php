@extends('layoutadmin')
@section('content')
<div style="    display: flex;    margin: 23px; width:100%;font-weight: 500;">
    <div >
      <form action="/admin/danhsachcam/search/them" method="post">
        @csrf
        <label for="">Nhập tên truyện: </label>
        <input type="text"name="timkiem">
        <button type="submit" class="btn btn-success">Tìm</button>
      </form>
    </div>
    <div style="margin-left: auto;margin-right:50px;">
        <button data-toggle="modal" data-target="#them" type="button"  class="btn btn-success">Thêm</button>
    </div>
</div>
<div class="cubaotruyen">
    <table style="background-color: #aliceblue;width:100%;">
        <tbody>
            <tr>
                <th>STT</th>
                <th>Tên truyện</th>
               
                <th>Tác giả</th>
            </tr>
            @isset($danhsach)
              @foreach ($danhsach as $item)
                <tr>
                    <td style="padding-left:10px;    font-weight: 500;">{{$item->ds_cam_id}}</td>
                    <td style="text-align: left;padding-left:10px;    font-weight: 500;">{{$item->ten}}</td> 
                    <td>
                      {{$item->tac_gia}}                    
                    </td>
                
                </tr>
              @endforeach 
            @endisset
            
        </tbody>
    </table>
  
  
    <div class="muc-luc-admin">{{$danhsach->links()}}</div>

</div>  
<div class="modal" id="them">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thêm vào danh sách cấm</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form action="/admin/danhsachcam/create" method="post">
          <div class="modal-body">
          
              @csrf
              <div class="row" style="padding: 10px">         
                <label for="" class="col-md-4"> Tên truyện:</label>
                <input type="text" name="tentruyen" id="" class="col-md-8">
              </div>
              <div class="row" style="padding: 10px">
                <label for="" class="col-md-4"> Tác giả:</label>
                <input type="text" name="tacgia" id="" class="col-md-8">
              </div>
              
            
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" style="margin-right: auto">Thêm</button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">Đóng</button>
          </div>
        </form>
      </div>
    </div>
  </div>  
@endsection