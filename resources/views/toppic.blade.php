@extends('layouttruyen')
@section('content')

    <div style="background-color: #73dff745;padding: 20px;">
        <h2>Danh sách truyện Cấm Nhúng trên Nhã Các</h2>
        <div style="background-color: white; padding:15px">
            <p>Không được nhúng lại (bằng tên gốc hay tên khác) tất cả những truyện nằm trong danh sách này. Người vi phạm sẽ bị xóa truyện, khóa tài khoản.</p>
            <p>(Danh sách sẽ được bổ sung theo thời gian, vui lòng theo dõi topic này để luôn nhận được thông tin mới nhất)<br>
                (Nếu phát hiện có người nhúng truyện trong danh sách này, xin vui lòng để lại báo cáo truyện để BQT xử lý)</p>
                <p>========================</p>
            <p><strong>A. Những truyện Waka công bố bản quyền trên website: <a href="https://waka.vn/cong-bo-ban-quyen" rel="nofollow">https://waka.vn/cong-bo-ban-quyen</a></strong><br>
        </div>      
        <div style="    padding: 15px;background-color: white;margin-top: 20px;">
            <div class="cubaotruyen" style="background-color: azure;">
                <table class="table-striped" style="background-color: #aliceblue;width:100%;">
                    <tbody>
                        <tr style="text-align: center;">
                            <th>STT</th>
                            <th>Tên truyện</th>
                            <th>Tác giả</th>                     
                        </tr>
                        @foreach ($danhsach as $item)                  
                            <tr>
                                <td style="text-align: center;">{{$item->ds_cam_id}}</td>
                                <td style="text-align: left;padding-left:10px">{{$item->ten}}</td>
                                
                                <td>{{$item->tac_gia}} </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="muc-luc-admin">{{$danhsach->links()}}</div>
            
            </div> 
        </div> 
    </div> 
@endsection