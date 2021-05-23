@extends('layoutadmin')
@section('content')
    <div>
        <div>
            @isset($thongke1)
                @if ($thongke1)
                    <?php echo $thongke1;?>
                @endif
                <h1>Bảng thống kê lượt Bình luận, Review</h1>
                <div><div id="chart_div" style="width: 100%; height: 500px;"></div></div>
            @endisset  
              @isset($truycap)
                @if ($truycap)
                    <?php echo $truycap;?>
                @endif
                <h1>Bảng thống kê lượt truy cập website </h1>
                <div><div id="chart_div" style="width: 100%; height: 500px;"></div></div>
              @endisset
        </div>
    </div>
@endsection