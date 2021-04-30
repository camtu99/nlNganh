@if (\Session::has('error'))
<div class="modal" id="error">
   <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="modal" aria-label="close">&times;</a>
    <strong>Lỗi!</strong> {{ \Session::get('error') }}
  </div>
</div>
<script type="text/javascript">
  $('#error').modal('show');
</script>
@endif

@if (\Session::has('success'))
<div class="modal" id="success">
   <div class=" alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="modal" aria-label="close">&times;</a>
    <strong>Hoàn thành!</strong> {{ \Session::get('success') }}
  </div>
</div>
<script type="text/javascript">
  $('#success').modal('show');
</script>
@endif
@if (\Session::has('thongbao'))
<script type="text/javascript">
var r = {{\Session::get('thongbao')}};
  alert(r);
</script>
    
@endif