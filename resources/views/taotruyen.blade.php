@extends('layoutuser')
@section('content')

@include('error')
    @if (isset($taotruyen))
    <div>
        <form action="{{URL::to('inserttruyen')}}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="tao">
                <label for="" style="width:20%;
                font-weight: 900;">Tên Truyện: </label>
                <input style="width:80%;" type="text" name='tentruyen' value='<?php echo $tentruyen;?>' readonly>
            </div>
            <div class="tao">
                <label for=""style="width:20%;
                font-weight: 900;">Link: </label>
                <input  style="width:80%;"type="text" name="li" value="{{$link}}" readonly>
            </div>
            <div class="tao">
                <label for=""style="width:20%;
                font-weight: 900;">Tác Giả: </label>
                <input style="width:80%;"type="text" name='tacgia' value='<?php echo $tacgia;?>' readonly>
            </div>
            <div class="tao">
                <label for=""style="width:20%;
                font-weight: 900;">Hình ảnh: </label>
                <input type="file" name="hinhanh">
            </div>
            <div class="tao">
                <label for=""style="width:20%;
                font-weight: 900;">Thể loại: </label>
                <div style="width:80%;" >
                    <DIV style="display: flex">
                        <div class="row" 
                        style="width:100%">         
                            <div class="col-md-3">
                                <b>Giới tính:</b>
                            </div>
                            <div class="col-md-9">
                                <div style="display:flex">
                                    <div class="row" style="width:100%">
                                        <div class="col-md-4">
                                            <input type="checkbox" name="1" value="1" id="">
                                            <label for="">Ngôn tình</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="checkbox" name="2" value="2" id="">
                                            <label for="">Nam sinh</label>
                                        </div> 
                                        <div class="col-md-4">
                                            <input type="checkbox" name="3" value="3" id="">
                                            <label for="">Đam mỹ</label>
                                        </div>        
                                        <div class="col-md-4">
                                            <input type="checkbox" name="4" value="4" id="">
                                            <label for="">Nữ tôn</label>
                                        </div>         
                                        <div class="col-md-4">
                                            <input type="checkbox" name="5" value="5" id="">
                                            <label for="">Bách hợp</label>
                                        </div>   
                                        <div class="col-md-4">
                                            <input type="checkbox" name="6" value="6" id="">
                                            <label for="">Không CP</label>
                                        </div>             
                                    </div>
                                </div>
                            </div>
                        </div>                         
                    </DIV>
                    <hr>
                    <DIV style="display: flex">
                        <div class="row" 
                        style="width:100%">         
                            <div class="col-md-3">
                                <b>Thời đại:</b>
                            </div>
                            <div class="col-md-9">
                                <div style="display:flex">
                                    <div class="row" style="width:100%">
                                        <div class="col-md-4">
                                            <input type="checkbox" name="7" value="7" id="">
                                            <label for="">Cổ đại</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="checkbox" name="8" value="8" id="">
                                            <label for="">Hiện đại</label>
                                        </div>      
                                        <div class="col-md-4">
                                            <input type="checkbox" name="9" value="9" id="">
                                            <label for="">Dân quốc</label>
                                        </div>      
                                        <div class="col-md-4">
                                            <input type="checkbox" name="10" value="10" id="">
                                            <label for="">Tương lai</label>
                                        </div>                    
                                    </div>
                                </div>
                            </div>
                        </div>                         
                    </DIV>
                    <hr>
                    <DIV style="display: flex">
                        <div class="row" 
                        style="width:100%">         
                            <div class="col-md-3">
                                <b>Kết thúc:</b>
                            </div>
                            <div class="col-md-9">
                                <div style="display:flex">
                                    <div class="row" style="width:100%">
                                        <div class="col-md-4">
                                            <input type="checkbox" name="11" value="11" id="">
                                            <label for="">HE</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="checkbox" name="12" value="12" id="">
                                            <label for="">SE</label>
                                        </div>      
                                        <div class="col-md-4">
                                            <input type="checkbox" name="13" value="13" id="">
                                            <label for="">OE</label>
                                        </div>                                                        
                                    </div>
                                </div>
                            </div>
                        </div>                         
                    </DIV>
                    <hr>
                    <DIV style="display: flex">
                        <div class="row" 
                        style="width:100%">         
                            <div class="col-md-3">
                                <b>Loại hình:</b>
                            </div>
                            <div class="col-md-9">
                                <div style="display:flex">
                                    <div class="row" style="width:100%">
                                        <div class="col-md-4">
                                            <input type="checkbox" name="14" value="14" id="">
                                            <label for="">Tình cảm</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="checkbox" name="15" value="15" id="">
                                            <label for="">Võ hiệp</label>
                                        </div>      
                                        <div class="col-md-4">
                                            <input type="checkbox" name="16" value="16" id="">
                                            <label for="">Tiên hiệp</label>
                                        </div>      
                                        <div class="col-md-4">
                                            <input type="checkbox" name="17" value="17" id="">
                                            <label for="">Trinh thám</label>
                                        </div>     
                                        <div class="col-md-4">
                                            <input type="checkbox" name="18" value="18" id="">
                                            <label for="">Kinh dị</label>
                                        </div>    
                                        <div class="col-md-4">
                                            <input type="checkbox" name="19" value="19" id="">
                                            <label for="">Võng du</label>
                                        </div>          
                                        <div class="col-md-4">
                                            <input type="checkbox" name="20" value="20" id="">
                                            <label for="">Khoa học viễn tưởng</label>
                                        </div> 
                                        <div class="col-md-4">
                                            <input type="checkbox" name="21" value="21" id="">
                                            <label for="">Huyền huyễn</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                         
                    </DIV>
                    <hr>
                    <DIV style="display: flex">
                        <div class="row" 
                        style="width:100%">         
                            <div class="col-md-3">
                                <b>Phong cách:</b>
                            </div>
                            <div class="col-md-9">
                                <div style="display:flex">
                                    <div class="row" style="width:100%">
                                        <div class="col-md-4">
                                            <input type="checkbox" name="22" value="22" id="">
                                            <label for="">SM</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="checkbox" name="23" value="23" id="">
                                            <label for="">Ngọt sủng</label>
                                        </div>      
                                        <div class="col-md-4">
                                            <input type="checkbox" name="24" value="24" id="">
                                            <label for="">Nhẹ nhàng</label>
                                        </div>      
                                        <div class="col-md-4">
                                            <input type="checkbox" name="25" value="25" id="">
                                            <label for="">Ấm áp</label>
                                        </div>     
                                        <div class="col-md-4">
                                            <input type="checkbox" name="26" value="26" id="">
                                            <label for="">Hài hước</label>
                                        </div>    
                                        <div class="col-md-4">
                                            <input type="checkbox" name="27" value="27" id="">
                                            <label for="">Cẩu huyết</label>
                                        </div>          
                                        <div class="col-md-4">
                                            <input type="checkbox" name="28" value="28" id="">
                                            <label for="">Ngược luyến</label>
                                        </div> 
                                        <div class="col-md-4">
                                            <input type="checkbox" name="29" value="29" id="">
                                            <label for="">Sản văn</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="checkbox" name="30" value="30" id="">
                                            <label for="">Quân văn</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="checkbox" name="31" value="31" id="">
                                            <label for="">Thanh thủy văn</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="checkbox" name="32" value="32" id="">
                                            <label for="">Đoản văn</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="checkbox" name="33" value="33" id="">
                                            <label for="">Tiểu bạch</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                         
                    </DIV>
                    <hr>
                    <DIV style="display: flex">
                        <div class="row" 
                        style="width:100%">         
                            <div class="col-md-3">
                                <b>Thế giới:</b>
                            </div>
                            <div class="col-md-9">
                                <div style="display:flex">
                                    <div class="row" style="width:100%">
                                        <div class="col-md-4">
                                            <input type="checkbox" name="34" value="34" id="">
                                            <label for="">Dị thế</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="checkbox" name="35" value="35" id="">
                                            <label for="">Mạt thế</label>
                                        </div>      
                                        <div class="col-md-4">
                                            <input type="checkbox" name="36" value="36" id="">
                                            <label for="">Hồng hoang</label>
                                        </div>      
                                        <div class="col-md-4">
                                            <input type="checkbox" name="37" value="37" id="">
                                            <label for="">Tinh tế</label>
                                        </div>     
                                        <div class="col-md-4">
                                            <input type="checkbox" name="38" value="38" id="">
                                            <label for="">Thú nhân</label>
                                        </div>    
                                        <div class="col-md-4">
                                            <input type="checkbox" name="39" value="39" id="">
                                            <label for="">Nguyên thủy</label>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>                         
                    </DIV>
                    <hr>
                    <DIV style="display: flex">
                        <div class="row" 
                        style="width:100%">         
                            <div class="col-md-3">
                                <b>Lĩnh vực:</b>
                            </div>
                            <div class="col-md-9">
                                <div style="display:flex">
                                    <div class="row" style="width:100%">
                                        <div class="col-md-4">
                                            <input type="checkbox" name="40" value="40" id="">
                                            <label for="">Phong thủy</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="checkbox" name="41" value="41" id="">
                                            <label for="">Đỗ thạch</label>
                                        </div>      
                                        <div class="col-md-4">
                                            <input type="checkbox" name="42" value="42" id="">
                                            <label for="">Cạch kỹ</label>
                                        </div>      
                                        <div class="col-md-4">
                                            <input type="checkbox" name="43" value="43" id="">
                                            <label for="">Giới giải trí</label>
                                        </div>     
                                        <div class="col-md-4">
                                            <input type="checkbox" name="44" value="44" id="">
                                            <label for="">Y thuật</label>
                                        </div>    
                                        <div class="col-md-4">
                                            <input type="checkbox" name="45" value="45" id="">
                                            <label for="">Làm ruộng</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="checkbox" name="46" value="46" id="">
                                            <label for="">Phá án</label>
                                        </div>               
                                        <div class="col-md-4">
                                            <input type="checkbox" name="47" value="47" id="">
                                            <label for="">Trộm mộ</label>
                                        </div>                   
                                        <div class="col-md-4">
                                            <input type="checkbox" name="48" value="48" id="">
                                            <label for="">Thể thao</label>
                                        </div>      
                                    </div>
                                </div>
                            </div>
                        </div>                         
                    </DIV>
                    <hr>
                </div>
            </div>
            <div><button type="submit">Nhúng</button></div>
        </form>
    </div>
    @else
    <div style="">
        <form action="{{URL::to('taotruyen')}}" method="post">
            @csrf
            <div class="taotruyen">
                <label style="padding: 5px 10px;" for="">Link:</label>
                <input class="form-control" type="url" name="li">
                <button class="btn-taotruyen" type="submit">Tạo truyện</button>
            </div>
        </form>
    </div>
    <div>
        <ul style="color: #999999;" id="listSupportWeb">
            <li>Lưu ý 1: Hiện tại chỉ nhúng link từ các trang web nằm trong danh sách hỗ trợ bên dưới.</li>
            <li>Lưu ý 2: Đọc kỹ <a style="color:Red;"><b>Quy định</b></a> trước khi nhúng truyện.</li>
            <li>Lưu ý 3: Cấm nhúng truyện thuần thịt và truyện nằm trong <a style="color:#ff0000"><b>Danh sách truyện cấm nhúng dưới mọi hình thức.</b></a></li>
    </div>
    <div>
        <p><b>Web nhúng bình thường:</b></p>
        <ul>
            <li>
                <a href="">www.mbtxt.la</a>
            </li>
            <li>
                <a href="">www.sxyxht.com</a>
            </li>
            <li>
                <a href="">www.ruochenwx.com</a>
            </li>
        </ul>
        
    </div>
    @endif
@endsection



