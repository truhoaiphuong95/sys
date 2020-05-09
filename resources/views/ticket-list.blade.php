@extends('master')
@section('head')
<title>DELI | Thiết kế</title>
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
          <div class="col-sm text-center">
            <h1 class="text-primary">YÊU CẦU THIẾT KẾ</h1>
          </div>
          <!--<div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Yêu cầu thiết kế</li>
            </ol>
          </div>-->
        </div>
      </div><!-- /.container-fluid -->
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm text-center">
            <h1 class="text-primary">QUY ĐỊNH THIẾT KẾ</h1>
          </div>
          <!--<div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Yêu cầu thiết kế</li>
            </ol>
          </div>-->
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12 col-sm">
          <div class="card">
            <!--<div class="card-header">
              <h3 class="card-title">Danh sách yêu cầu thiết kế</h3>
            </div>-->
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="text-center">
                  <th>CUSTOMER</th>
                  <th>CONTENT</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tickets as $ticket)
                <tr>
                  <!--<td class="text-center">{{$ticket->id}}</td>-->
                    <td>
                          {{$ticket->id}}: <b><a href="{{route('staff.ticket.view.get', ['ticket_id' => $ticket->id])}}">{{$ticket->client->name}}</a></b> <br> 
                          SĐT: <a href="tel:{{$ticket->client->phone}}"><b class="text-danger">{{$ticket->client->phone}}</b></a>
                    </td>
                  <td>
                    <!--<a href="mailto:{{$ticket->client->email}}"><b class="text-danger">{{$ticket->client->email}}</b></a><br>-->
                    <span class="badge bg-{{$ticket->ticketStatus->class}}"><span style="display: none;">{{$ticket->ticketStatus->id}}</span>{{$ticket->ticketStatus->name}}</span><br>
                    <hr>
                    <!--<a href="{{route('staff.ticket.view.get', ['ticket_id' => $ticket->id])}}">{{$ticket->model}}</a>-->
                    @foreach($ticket->services as $service)
                        <p class="text-uppercase">{{$service->name}}</p><br> 
                    @endforeach
                  </td>
                  <!--<td class="text-center">
                    <span class="badge bg-{{$ticket->ticketStatus->class}}"><span style="display: none;">{{$ticket->ticketStatus->id}}</span>{{$ticket->ticketStatus->name}}</span>
                  </td>
                  <td class="text-center">
                    <div class="btn-group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </button>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="{{route('staff.ticket.view.get', ['ticket_id' => $ticket->id])}}" target="_blank">Xem</a>
                        <a class="dropdown-item" href="{{route('staff.ticket.printpos.get', ['ticket_id' => $ticket->id])}}" target="_blank">In máy POS</a>
                        <a class="dropdown-item" href="{{route('staff.ticket.printinternal.get', ['ticket_id' => $ticket->id])}}" target="_blank">In phiếu dán</a>
                        <a class="dropdown-item" href="{{route('staff.ticket.print.get', ['ticket_id' => $ticket->id])}}" target="_blank">In biên nhận</a>
                      </div>
                    </div>
                  </td>-->
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
        // "order": false,
        "order": [[ 4, "asc" ]],
        "lengthMenu": [ 500 ],
        "bPaginate": false,
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