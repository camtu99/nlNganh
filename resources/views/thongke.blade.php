@extends('layoutadmin')
@section('content')
    <div>
        <div>
            @isset($thongke_theloai)
            @if ($thongke_theloai)
            <?php echo $thongke_theloai;?>
            @endif
                <h1>Bảng thống kê lượt đọc theo thể loại truyện</h1>
                <div> <div id="theloai" ></div></div>
            @if ($thongketruyen1)
            <?php echo $thongketruyen1;?>
            @endif
                <h1>Bảng thống kê truyện được đọc nhiều nhất</h1>
                <div> <div id="truyen" ></div></div>
            @endisset  
            @isset($truycap)
                @if ($truycap)
                    <?php echo $truycap;?>
                @endif
                <h1>Bảng thống kê lượt truy cập website </h1>
                <div><div id="chart_div" ></div></div>
            @endisset
        </div>
        
    </div>
 
   
 
 
@endsection
