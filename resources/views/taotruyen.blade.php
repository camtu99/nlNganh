@extends('layoutuser')
@section('content')


@include('error')
@if (empty($taotruyen))
    <div>
        <form action="{{URL::to('taotruyen')}}" method="post">
            @csrf
            <div class="taotruyen">
                <label for="">Link:</label>
                <input class="form-control" type="url" name="li">
                <button type="submit">Tạo truyện</button>
            </div>
        </form>
    </div>
@else
    <div>
        <form action="{{URL::to('inserttruyen')}}" enctype="multipart/form-data" method="post">
            @csrf
            <div>
                <label for="">Tên Truyện: </label>
                <input type="text" name='tentruyen' value='<?php echo $tentruyen;?>' readonly>
            </div>
            <div>
                <label for="">Link: </label>
                <input  type="text" name="li" value="{{$link}}" readonly>
            </div>
            <div>
                <label for="">Tác Giả: </label>
                <input type="text" name='tacgia' value='<?php echo $tacgia;?>' readonly>
            </div>
            <div>
                <div><label for="">Thể loại: </label></div>
                <div>
                    @foreach ($theloai as $loai)
                        <div>
                            <input type="checkbox" name="{{$loai->the_loai_id}}" value="{{$loai->ten_the_loai}}">
                            <label for="">{{$loai->ten_the_loai}}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <label for="">Hình ảnh: </label>
                <input type="file" name="hinhanh">
            </div>
            <div><button type="submit">Nhúng</button></div>
        </form>
    </div>
@endif

@endsection



