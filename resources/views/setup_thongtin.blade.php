@extends('layoutuser')
@section('content')
    
    <div>
      <div style="    display: flex; padding: 30px;">
        <div>
          <div>
            @if (substr_count($user[0]->avatar,'http')>0)
                <img src="{{$user[0]->avatar}}" alt="" style=" width: 160px;height: 160px;border-radius: 50%;margin: 30px">
            @else
                <img src="http://127.0.0.1:8000/hinhanh/avatar/{{$user[0]->avatar}}" alt="" style=" width: 160px;height: 160px;border-radius: 50%;margin: 30px">
            @endif
            <p type="button" style="text-align: center;font-weight: 500;border: solid 2px #b3d7ff;background-color: #dee2e6;" data-toggle="modal" data-target="#suadoi">Thay đổi avatar</p>
            <p type="button" style="text-align: center;font-weight: 500;border: solid 2px #b3d7ff;background-color: #dee2e6;" data-toggle="modal" data-target="#suadoianhbia">Thay đổi ảnh bìa</p>
          </div>
        </div>
        <div style="width:100%">
            <form action="/setup/thongtin" method="post" style="margin: 40px;">
                @csrf
                <div class="setupthongtin">
                  <label   style="width:20%"for="">Email:</label>
                  <input type="text"  style="width:80%" value="{{$user[0]->email}}" disabled>
                </div>
                <div class="setupthongtin">
                  <label  style="width:20%" for="">Tên tài khoản</label>
                  <input type="text"  style="width:80%" value="{{$user[0]->name}}" name="ten">
                </div>
                <div class="setupthongtin">
                  <label  style="width:20%" for="">Password:</label>
                  <input type="password"  style="width:80%" name="password" id="">
                </div>
                <div style="padding: 10px;" >
                  <label for=""  style="width:100%"> Giới thiệu bản thân:</label>
                  <textarea   style="width:100%" name="thongtin" id="" cols="30" rows="10">{{$user[0]->thongtin}}</textarea>
                </div>
                <button type="submit">Thay đổi</button>
            </form>
        </div>
      </div>
        @include('error')
        <div class="modal " id="suadoi">
            <div class="modal-dialog">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h6 class="modal-title">Thay đổi avatar</h6>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                  <div style="display: flex ; padding:40px 0;">
                      <button class="luachonanh"data-toggle="modal" data-target="#taianh">Tải ảnh lên</button>
                      <button class="luachonanh" data-toggle="modal" data-target="#taianhurl">Tải ảnh mới từ URL</button>
                  </div>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-dismiss="modal">Đóng</button>
                </div>
                
              </div>
            </div>
        </div>
        <div class="modal " id="taianhurl">
            <div class="modal-dialog">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h6 class="modal-title">Thay đổi avatar</h6>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                  <div style="padding:10px 0;">
                        <p style="color: #4b95e8;font-weight: 800;">Nhập URL ảnh</p>
                      <form action="/setup/anh/" method="post" style="width:100%;">
                          @csrf
                          <input  style="width:100%;" type="url" name="urlanh" id="" required>
                   
                  </div>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-dismiss="modal">Đóng</button><button style="width: 130px;" class="btn btn-info" type="submit">Tải lên</button></form>
                </div>
                
              </div>
            </div>
        </div>
        <div class="modal " id="taianh">
            <div class="modal-dialog">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h6 class="modal-title">Tải lên hình ảnh</h6>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <div style=" padding:20px 0;">
                        <p style="color: #4b95e8;font-weight: 800;">Tải lên một hình ảnh</p>
                        <form action="/setup/anh" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="hinhanh" id="" required>
                        
                    </div>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-dismiss="modal">Đóng</button><button style="width: 130px;" class="btn btn-info" type="submit">Tải lên</button></form>
                </div>
                
              </div>
            </div>
        </div>

        <div class="modal " id="suadoianhbia">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h6 class="modal-title">Thay đổi ảnh bìa</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div style="display: flex ; padding:40px 0;">
                    <button class="luachonanh"data-toggle="modal" data-target="#taianhbia">Tải ảnh lên</button>
                    <button class="luachonanh" data-toggle="modal" data-target="#taianhbiaurl">Tải ảnh mới từ URL</button>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Đóng</button>
              </div>
              
            </div>
          </div>
      </div>
      <div class="modal " id="taianhbiaurl">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h6 class="modal-title">Thay đổi ảnh bìa</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div style="padding:10px 0;">
                      <p style="color: #4b95e8;font-weight: 800;">Nhập URL ảnh</p>
                    <form action="/setup/anhbia/" method="post" style="width:100%;">
                        @csrf
                        <input  style="width:100%;" type="url" name="urlanh" id="" required>
                 
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Đóng</button><button style="width: 130px;" class="btn btn-info" type="submit">Tải lên</button></form>
              </div>
              
            </div>
          </div>
      </div>
      <div class="modal " id="taianhbia">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h6 class="modal-title">Tải lên hình ảnh</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <div class="modal-body">
                  <div style=" padding:20px 0;">
                      <p style="color: #4b95e8;font-weight: 800;">Tải lên một hình ảnh</p>
                      <form action="/setup/anhbia" method="post" enctype="multipart/form-data">
                          @csrf
                          <input type="file" name="hinhanh" id="" required>
                      
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Đóng</button><button style="width: 130px;" class="btn btn-info" type="submit">Tải lên</button></form>
              </div>
              
            </div>
          </div>
      </div>
    </div>


@endsection