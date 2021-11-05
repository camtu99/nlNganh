@extends('layouttruyen')
@section('content')

    <h1>Danh sách truyện Cấm Nhúng trên Nhã Các</h1>
    <p>Không được nhúng lại (dù bằng link hay bằng file, dù bằng tên gốc hay tên khác, dù công khai hay riêng tư) tất cả những truyện nằm trong danh sách này. Người vi phạm sẽ bị xóa truyện, khóa chức năng nhúng.</p>
    <p>(Danh sách sẽ được bổ sung theo thời gian, vui lòng theo dõi topic này để luôn nhận được thông tin mới nhất)<br>
        (Nếu phát hiện có người nhúng truyện trong danh sách này, xin vui lòng để lại đường link trong topic để BQT xử lý)</p>
        <p>========================</p>
    <p><strong>A. Những truyện Waka công bố bản quyền trên website: <a href="https://waka.vn/cong-bo-ban-quyen" rel="nofollow">https://waka.vn/cong-bo-ban-quyen</a></strong><br>
       
    <div>
        <div class="cubaotruyen">
            <table style="background-color: #aliceblue;width:100%;">
                <tbody>
                    <tr>
                        <th>STT</th>
                        <th>Tên truyện</th>
                        <th>Tác giả</th>                     
                    </tr>
                    @foreach ($danhsach as $item)                  
                        <tr>
                            <td>{{$item->ds_cam_id}}</td>
                            <td style="text-align: left;padding-left:10px">{{$item->ten}}</td>
                            
                            <td>{{$item->tac_gia}} </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="muc-luc-admin">{{$danhsach->links()}}</div>
        
        </div> 
    </div> 
@endsection