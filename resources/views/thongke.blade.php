@extends('layoutadmin')
@section('content')
    <div>
        <div> @if ($thongke1)
            <?php echo $thongke1;?>
        @endif
            <h1>Bảng thống kê lượt Bình luận, Review</h1>
            <div><div id="chart_div" style="width: 100%; height: 500px;"></div></div>
            
        </div>
    </div>
@endsection