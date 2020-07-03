@extends('master')
@section('head')
<title>DELI | Bảng điều hướng</title>
<link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
<style>
  .pagination li {
    padding: 10px;
  }
  .pagination {
    float: right;
  }
</style>
@stop
@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm">
          <h1 class="text-center text-success"><b>TRUY CẬP NHANH</b></h1>
        </div>
        <!--<div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Sổ biên nhận</li>
          </ol>
        </div>-->
      </div>
    </div><!-- /.container-fluid -->
    <hr>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <a href="{{route('staff.course.list.get')}}">
        <div class="small-box bg-info">
          <div class="inner" style="padding: 10px;">
            <h3>Dự án</h3>
            <p>Danh sách dự án</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <a href="#" class="small-box-footer">
            Truy cập <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </a>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <a href="{{route('staff.ticket.list.get')}}">
        <div class="small-box bg-success">
          <div class="inner" style="padding: 10px;">
            <h3>Thiết kế</h3>
            <p>Danh sách thiết kế</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">
            Truy cập <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </a>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <a href="{{route('staff.shift.register.get')}}">
        <div class="small-box bg-warning">
          <div class="inner" style="padding: 10px;">
            <h3>Lịch làm</h3>
            <p>Đăng ký lịch</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">
            Truy cập <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </a>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <a href="{{route('staff.worklog.add.get')}}">
        <div class="small-box bg-danger">
          <div class="inner" style="padding: 10px;">
            <h3>Báo cáo</h3>
            <p>Nộp báo cáo</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">
            Truy cập <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </a>
      </div>
      <!-- ./col -->
    </div>
    @if(UserInfo()->level>=5)
    <hr>
    <div class="row">
      <div class="col-sm">
        <h3 class="text-center text-success"><b>QUẢN LÝ NHANH</b></h3>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <a href="{{route('staff.receipt.list.get')}}">
        <div class="small-box bg-info">
          <div class="inner" style="padding: 10px;">
            <h3>Thu</h3>
            <p>Danh sách thu</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <a href="#" class="small-box-footer">
            Truy cập <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </a>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <a href="{{route('staff.payment.list.get')}}">
        <div class="small-box bg-success">
          <div class="inner" style="padding: 10px;">
            <h3>Chi</h3>
            <p>Danh sách chi</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">
            Truy cập <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </a>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <a href="{{route('staff.shift.manager.get')}}">
        <div class="small-box bg-warning">
          <div class="inner" style="padding: 10px;">
            <h3>Sắp lịch</h3>

            <p>Sắp lịch trực</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">
            Truy cập <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </a>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <a href="{{route('staff.worklog.list.get')}}">
        <div class="small-box bg-danger">
          <div class="inner" style="padding: 10px;">
            <h3>Báo cáo</h3>

            <p>Xem báo cáo</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">
            Truy cập <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </a>
      </div>
      <!-- ./col -->
    </div>
    @endif
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@stop

@section('script')
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<script>
  $(function() {
    $("#example1").DataTable({
      // "order": false,
      "order": [
        [4, "asc"]
      ],
      "lengthMenu": [500],
      "bPaginate": false,
      "language": {
        "sProcessing": "Đang xử lý...",
        "sLengthMenu": "Xem _MENU_ mục",
        "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
        "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
        "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
        "sInfoFiltered": "(được lọc từ _MAX_ mục)",
        "sInfoPostFix": "",
        "sSearch": "Tìm:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "Đầu",
          "sPrevious": "Trước",
          "sNext": "Tiếp",
          "sLast": "Cuối"
        }
      }
    });
  });
</script>
@stop