@extends('master')
@section('head')
<title>DELI | Danh sách Khách hàng</title>
<link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@stop
@section('main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm text-center">
            <h1 class="text-success"><b>NỘI QUY DELI 2020</b></h1>
          </div>
        </div>
      </div>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row offset-4">
        <div class="col-6">
          <div class="card">
            <div class="card-body">
              <b class="text-uppercase text-success">Thời gian làm việc trong ngày</b><br>
              - <b>Sáng:</b> 7h30 - 11h30<br>
              - <b>Chiều:</b> 13h30 - 17h30<br>
              - <b>Tối:</b> 17h30 - 21h30<br>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <b class="text-uppercase text-warning">I. Đối với Công việc</b><br>
              <b>3 Đúng</b><br>
              - Đúng deadline<br>
              - Đúng tác phong<br>
              - Đúng việc<br>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <b class="text-uppercase text-warning">II. Đối với Khách Hàng</b><br>
              <b>3 Nên</b><br>
              - Nên tôn trọng<br>
              - Nên hòa nhã<br>
              - Nên tư vấn hết mình<br>
              <b>3 Không</b><br>
              - Không đánh Khách hàng<br>
              - Không chửi Khách hàng<br>
              - Không cãi Khách hàng<br>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <b class="text-uppercase text-warning">III. Đối với Đồng nghiệp</b><br>
              <b>3 Phải</b><br>
              - Phải tôn trọng - hỗ trợ - góp ý<br>
              - Phải vui vẻ - hòa đồng - thân tình<br>
              - Phải đoàn kết<br>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <b class="text-uppercase text-warning">IV. Sai </b><br>
              <b>3 Sai</b><br>
              - Sai việc<br>
              - Sai trái<br>
              - Sai lầm<br>
            </div>
          </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
  </div>
@stop

@section('script')
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
        "order": [[ 0, "desc" ]],
        "language": {
        	"sProcessing":   "Đang xử lý...",
        	"sLengthMenu":   "Xem _MENU_",
        	"sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
        	"sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
        	"sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
        	"sInfoFiltered": "(được lọc từ _MAX_ mục)",
        	"sInfoPostFix":  "",
        	"sSearch":       "Tìm:",
        	"sUrl":          "",
        	"oPaginate": {
        		"sFirst":    "Đầu",
        		"sPrevious": "Trước",
        		"sNext":     "Tiếp",
        		"sLast":     "Cuối"
        	}
        }
    });
  });

</script>
@stop