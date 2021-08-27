@extends('layouttruyen')
@section('content')
<div>
    <p>Thương thành ></p>
    <hr>
    <div style="    margin-top: 1rem;
    border: 2px solid #d6e5e8;
    background-color: #e9fbff;
    padding: 1rem 3rem;">
        <div style="padding-block: 30px">
            <div class="row">
                <div style="display: flex;width: 100%;">
                    <div class="col-md-3">
                        <p>Thẻ miễn quảng cáo</p>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div style="display: flex;width: 100%;">
                                <div class="col-md-9">
                                    <form action="/thuong-thanh/doi" method="post">   
                                        @csrf                            
                                        <div style="display: flex;width: 100%;">
                                            <div class="form-group">
                                                {{-- <label for="sel1" style="width:195px">Chọn thời hạn:</label> --}}
                                                <select class="form-control" id="sel1" name="tichphan" placeholder="Chọn thời hạn">
                                                    <option value="10">1 ngày (10 tích phân)</option>
                                                    <option value="30">3 ngày (30 tích phân)</option>
                                                    <option value="60">7 ngày (60 tích phân)</option>
                                                    <option value="80">10 ngày (80 tích phân)</option>
                                                    <option value="200">30 ngày (200 tích phân)</option>
                                                </select>
                                            </div >
                                            @if (Session::has('id_tk'))
                                            <div style="padding: 0 15px"><button class="btn btn-warning" style="color: white;" type="submit">Đổi</button></div>
                                            @else
                                            <div style="padding: 0 15px"><button type="button" data-toggle="modal" data-target="#dangnhap" class="btn btn-warning" style="color: white;" >Đổi</button></div>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <div>
                                        @if (Session::has('id_tk'))
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lsgiaodich">
                                                Lịch sử giao dịch
                                            </button>  
                                        @else
                                            <p type='button'class="btn btn-primary" data-toggle="modal" data-target="#dangnhap">Lịch sử giao dịch</p>   
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="padding-block: 30px">
            <div class="row">
                <div style="display: flex;width: 100%;">
                    <div class="col-md-3">
                        <p>Đổi vật phẩm</p>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div style="display: flex;width: 100%;">
                                <div class="col-md-9">                               
                                        <div style="display: flex;width: 100%;">
                                            <div><button class="btn btn-info" style="width: 219px;"data-toggle="modal" data-target="#doivatpham">Điền thông tin</button></div>
                                            <div style="padding: 0 15px"><button class="btn btn-warning" style="color: white;" type="submit"data-toggle="modal" data-target="#doivatpham">Đổi</button></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <div>                                     
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#doivatpham">
                                            Lịch sử giao dịch
                                        </button>                                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if (Session::has('id_tk'))
<div class="modal" id="lsgiaodich">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 600px;">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Lịch sử giao dịch</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          @isset($thuongthanh)
              @if ($thuongthanh)
                  <div>
                      @foreach ($thuongthanh as $item)
                         <p><b>{{Session::get('ten_tk')}}</b> đã đổi <b>{{$item->the_mien}}</b> vào lúc {{$item->ngay_doi}}</p>
                      @endforeach                 
                  </div>
              @endif
          @endisset
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div>
</div>   
@endif
<div class="modal" id="doivatpham">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          Tính năng này sẽ được mở sau.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>   
@endsection