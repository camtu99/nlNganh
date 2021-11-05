@extends('layouttruyen')
@section('content')
<h3>Tìm kiếm</h3>
<div class="row" style="margin-bottom: 40px;margin-top: 40px;">
  @foreach ($truyen as $truyen1)
    <div class="book-item col-md-3">
      <a href="/truyen/{{$truyen1->truyen_id}}" data-toggle="tooltip" data-placement="bottom" title=" " >
        <div class="img-cover" style="text-align: center;">   
          <img src="http://127.0.0.1:8000/hinhanh/{{$truyen1->hinh_anh}}">  
        </div>
        <div class="infor">
          <div class="infor-item">
              {{$truyen1->ten_truyen}}            
          </div>
          <div class="author">
         {{$truyen1->ten_tac_gia}}
          </div>
          <div class="view-sach">
            <i class="fa fa-eye" aria-hidden="true" style=" font-weight: 100;">{{$truyen1->luot_doc}}</i>
            <i class="fa fa-comment" aria-hidden="true" style=" font-weight: 100;">2</i>
          </div>
        </div>
      </a>
    </div> 
  @endforeach
  @if (empty($truyennangcao))
  <DIv>{{$truyen->links()}}</DIv> 
  @endif

</div>
@endsection