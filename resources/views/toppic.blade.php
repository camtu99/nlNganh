@extends('layouttruyen')
@section('content')

    <h1>Danh sách truyện Cấm Nhúng trên Nhã Các</h1>
    <p>Không được nhúng lại (dù bằng link hay bằng file, dù bằng tên gốc hay tên khác, dù công khai hay riêng tư) tất cả những truyện nằm trong danh sách này. Người vi phạm sẽ bị xóa truyện, khóa chức năng nhúng.</p>
    <p>(Danh sách sẽ được bổ sung theo thời gian, vui lòng theo dõi topic này để luôn nhận được thông tin mới nhất)<br>
        (Nếu phát hiện có người nhúng truyện trong danh sách này, xin vui lòng để lại đường link trong topic để BQT xử lý)</p>
        <p>========================</p>
    <p><strong>A. Những truyện Waka công bố bản quyền trên website: <a href="https://waka.vn/cong-bo-ban-quyen" rel="nofollow">https://waka.vn/cong-bo-ban-quyen</a></strong><br>
        异侦实录 + 洛琳琅<br>
        Viên lão quái kỳ án<br>
        Hán Việt: Dị trinh thật lục<br>
        Tác giả: Lạc Lâm Lang</p>
    <hr>
    <p>暖婚甜入骨 + 漫西<br>
        Ấm hôn ngọt tận xương / Người dấu yêu<br>
        Noãn hôn điềm nhập cốt + Mạn Tây<br>
        Nghiên Thời Thất và Tần Bách Duật</p>
        <hr>
        <p>隔着时光爱你  +  浮屠妖<br>
            Cách thời gian ái ngươi / Chỉ yêu mình em<br>
            Hán Việt: Cách trứ thời quang ái nhĩ<br>
            Tác giả: Phù Đồ Yêu<br>
            o Tên khác: 世界很大我只爱你 + 浮屠妖<br>
            Thế giới rất lớn ta chỉ ái ngươi<br>
            Hán Việt: Thế giới ngận đại ngã chỉ ái nhĩ<br>
            o Tên khác: 绯闻萌妻：腹黑老公，头条见 + 浮屠妖<br>
            Tai tiếng manh thê: Phúc hắc lão công, đầu đề thấy<br>
            Hán Việt: Phi văn manh thê: Phúc hắc lão công, đầu điều kiến</p>
    <hr>
    <p>复贵盈门  +  云霓<br>
        Hán Việt: Phục Quý Doanh Môn / Doanh môn phục quý<br>
        Tác giả: Vân Nghê</p>
    <hr>
    <p>我有一座恐怖屋 + 我会修空调<br>
        Hán Việt: Ngã hữu nhất tọa khủng phố ốc / Hệ thống nhà ma<br>
        Tác giả: Ngã Hội Tu Không Điều / Tôi biết sửa điều hòa</p>
    <hr>
    <p>全世界都知道我不好惹 +孤木双<br>
        Lệ thiếu ta chờ kế thừa ngươi di sản / Toàn thế giới đều biết tôi không dễ chọc<br>
        Hán Việt: Toàn thế giới đô tri đạo ngã bất hảo nhạ<br>
        Tác giả: Cô Mộc Song<br>
        Lệ Tư Thừa<br>
        Sơ Điều</p>

    <div>
        @foreach ($danhsach as $item)
            <div class="listcmt">
                <div class="m-avatar" style="     margin-left: 0;margin-right: 0;  width: 10%;">
                    <div class="avatar">
                        @if (substr_count($item->avatar,'http')>0)
                        <img style="height: 60px;width: 60px;"src="{{$item->avatar}}" alt="" >
                        @else
                        <img style="height: 60px;width: 60px;" src="http://127.0.0.1:8000/hinhanh/avatar/{{$item->avatar}}" alt="" >
                        @endif
                    </div>
                </div>
                <div class="comment" style="    width: 90%;">
                    <div class="comment-box2" style="    padding-bottom: 30px;">
                        <div class="cmt-name">
                            <b>{{$item->name}}</b>
                        </div>
                        <div class="cmt-nd">
                          <?php echo  html_entity_decode($item->nd_binh_luan) ?>  
                        </div>
                        <p style="    color: #08c008; font-weight: 700;float: right;" type='button' data-toggle="collapse" data-target="#traloi{{$item->id_binh_luan}}"> Trả lời </p>
                    </div>
                    <div id="traloi{{$item->id_binh_luan}}" class="collapse">
                        <div style="display: flex; width: 100%;padding: 20px 0 20px 10px;">
                            <div class="avater-review">
                                @if (Session::has('avatar_tk'))
                                <img src="{{Session::get('avatar_tk')}}" alt="">
                               @else
                                <img src="http://127.0.0.1:8000/hinhanh/avatar/{{Session::get('avatar_tk')}}" alt="" >
                               @endif
                            </div>
                            <div style="width: 100%;">
                                <form action="/binhluan/binhluan/{{Session::get('id_tk')}}/{{$item->id_binh_luan}}" method="post">
                                    @csrf
                                    <textarea name="traloi" id="" cols="30" rows="10" style="    width: 100%;"></textarea>
                                    <button>Trả lời</button>
                                </form>                           
                            </div>
                        </div>
                    </div>
                </div>

            </div>  
        @endforeach  
    </div> 
@endsection