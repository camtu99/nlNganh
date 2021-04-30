@extends('layoutuser')
@section('content')

@include('error')
    @if (isset($taotruyen))
    <div>
        <form action="{{URL::to('inserttruyen')}}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="tao">
                <label for="" style="width:20%;">Tên Truyện: </label>
                <input style="width:80%;" type="text" name='tentruyen' value='<?php echo $tentruyen;?>' readonly>
            </div>
            <div class="tao">
                <label for=""style="width:20%;">Link: </label>
                <input  style="width:80%;"type="text" name="li" value="{{$link}}" readonly>
            </div>
            <div class="tao">
                <label for=""style="width:20%;">Tác Giả: </label>
                <input style="width:80%;"type="text" name='tacgia' value='<?php echo $tacgia;?>' readonly>
            </div>
            <div class="tao">
                <div style="width:20%;"><label for="">Thể loại: </label></div>
                <div style="width:80%;display:flex;flex-wrap:wrap;">
                    @foreach ($theloai as $loai)
                        <div style="padding: 5px">
                            <input type="checkbox" name="{{$loai->the_loai_id}}" value="{{$loai->ten_the_loai}}">
                            <label for="">{{$loai->ten_the_loai}}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tao">
                <label for=""style="width:20%;">Hình ảnh: </label>
                <input type="file" name="hinhanh">
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



