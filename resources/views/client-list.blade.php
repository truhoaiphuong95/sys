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
            <h1 class="text-uppercase text-success"><b>DANH SÁCH KHÁCH HÀNG</b></h1>
          </div>
          <!--<div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Danh sách khách hàng</li>
            </ol>
          </div>-->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!--<div class="card-header">
              <h3 class="card-title">Danh sách khách hàng</h3>
            </div>-->
            <!-- /.card-header -->  
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="text-center">
                  <th class="text-uppercase text-success">Thông tin Khách hàng</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $data)
                <tr>
                  <td>
                      <b class="text-uppercase text-danger">{{$data->id}}: {!!$data->linkName()!!}</b><br>
                      <hr>
                      <b class="text-success">Phone:</b> {!!$data->linkPhone()!!}<br>
                      <hr>
                      <b class="text-success">Zalo:</b> <a class="text-dark" href="https://zalo.me/{{$data->zalo}}"> {{$data->zalo}} </a> <br>
                      <hr>
                      <b class="text-success">Mail:</b> <a class="text-dark" href="mailto:{{$data->email}}"> {!!$data->email !!} </a>
                  </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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