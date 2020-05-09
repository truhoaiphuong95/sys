@extends('master')
@section('head')
<title>DELI | Tổng kết báo cáo công việc</title>
<link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@stop
@section('main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm">
            <h1>BÁO CÁO CÔNG VIỆC</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      <div class="container-fluid">
      <div class="row mb-2 text-center">
        <div class="col-sm">
          <h1 class="text-info">QUY ĐỊNH TRONG VIỆC BÁO CÁO</h1>
            <ul class="list-group text-left">
              <li class="list-group-item">
                  1. Trước khi vào ca ghi ra nội dung công việc sẽ làm hoặc công việc được giao
              </li>
              <li class="list-group-item">
                  2. Sau khi kết thúc ca làm việc tiến hành ghi báo cáo và tiến độ thực hiện
              </li>
              <li class="list-group-item">
                  3. Ghi ra những nội dung hoặc góp ý khi thấy vấn đề sai sót trong lúc làm việc. <br>
                  KHUYẾN KHÍCH NÊU ƯU ĐIỂM VÀ KHUYẾT ĐIỂM
              </li>
              <li class="list-group-item">
                  4. Trong lúc không có việc hoặc không được giao việc thì tiến hành: <br>
                  - Hoàn thiện các mục như <a href="https://www.behance.net/thietkedeli">behance.net</a> <br>
                  - Tìm hiểu các câu hỏi: <br>
                    a) Khách hàng <br>
                    b) Giao việc như thế nào <br>
                    c) Quy trình công việc (làm quy trình để kiếm soát tiến độ - và vào khuôn) <br>
                ĐANG BỔ SUNG CÓ THỂ GÓP Ý
              </li>
            </ul>
        </div>
      </div>
    </div>
    </section>

    <!-- Main content -->
    <section class="content">
    @if (session('success'))
    <div class="row"><div class="col-md-12">
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fa fa-check"></i> Thành công!</h5> {{ session('success') }}
      </div>
    </div></div>
    @endif
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">SEARCH NOTE</h3>
            </div>
            <div class="card-header">
              <h3 class="card-title">NOTE - AI | NOTE - DELI | NOTE - KT</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nhân Sự</th>
                        <th>Nội dung</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($worklogs as $worklog)
                      <tr>
                        <td>
                            {{date('d/m/Y',strtotime($worklog->date))}}<br>
                            {{$session[$worklog->session]}}<br>
                            <b class="text-primary">{{$worklog->staff->name}}</b>
                        </td>
                        <td>@if($worklog->staff->id == UserInfo()->id) <a href="{{route('staff.worklog.edit.get', ['worklog_id' => $worklog->id])}}" style="float: right;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> @endif{!!$worklog->content!!}</td>
                      </tr>
                      @endforeach
                    </tbody>
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
        "ordering": false,
        "language": {
        	"sProcessing":   "Đang xử lý...",
        	"sLengthMenu":   "Xem _MENU_ mục",
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