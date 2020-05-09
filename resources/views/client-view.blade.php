@extends('master')
@section('head')
<title>DELI | Khách hàng: {{$client->name}}</title>
<link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@stop
@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <!--<div class="col-sm">
          <h1 class="text-uppercase">KHÁCH HÀNG: {{$client->name}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Thông tin khách hàng</li>
          </ol>
        </div>-->
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      @if (session('success'))
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fa fa-check"></i> Thành công!</h5>
            {{ session('success') }}
          </div>
        </div>
      </div>
      @endif
      @if (session('error'))
      <div class="row"><div class="col-md-12">
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fa fa-ban"></i> Thất bại!</h5> 
          {{ session('error') }}
        </div>
      </div></div>
      @endif
      <div class="row">
        <!-- /.col -->
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="card card-info card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{asset('dist/img/user4-128x128.jpg')}}" alt="User profile picture">
              </div>
              <hr class="text-center">
              <h3 class="profile-username text-center text-uppercase text-info"><b>{{$client->name}}</b></h3>
              <!--<p class="text-muted text-center">Software Engineer</p>-->
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Phone:</b> <a class="float-right" href="tel:{{$client->sdt}}"> {{$client->phone}}</a>
                </li>
                <li class="list-group-item">
                  <b>Date:</b> <a class="float-right">@if (isset($client->birthday)) {{date("d/m/Y", strtotime($client->birthday))}} @else NO @endif</a>
                </li>
                <li class="list-group-item">
                  <b>Zalo</b> @if ($client->zalo!="") <a class="float-right" href="https://zalo.me/{{$client->zalo}}">{{$client->zalo}}</a>  @else <a class="float-right">NO</a> @endif
                </li>
                <li class="list-group-item">
                  <b>Mail:</b> @if ($client->email!="") <a class="float-right">{{$client->email}}</a> @else <a class="float-right">NO</a> @endif
                </li>
                <li class="list-group-item">
                  <b>Job:</b> @if ($client->major!="") <a class="float-right"><b>{{$client->major}}</b></a> @else <a class="float-right">NO</a> @endif
                </li>
              </ul>
              @if(UserInfo()->level >= 3)
              <a href="{{route('staff.payment.add.get', ['client_id'=>$client->id])}}" class="btn btn-block btn-default" id="btnThemphieuchi">
              <i class="fa fa-arrow-right"></i> PAYMENT (F6)
              </a>
              <a href="{{route('staff.receipt.add.get', ['client_id'=>$client->id])}}" class="btn btn-block btn-default" id="btnThemphieuthu">
              <i class="fa fa-arrow-left"></i> RECEIPTS (F7)
              </a>
              @endif
              <a href="{{route('staff.ticket.add.get', ['client_id'=>$client->id])}}" class="btn btn-block btn-default" id="btnThembiennhan">
                <i class="fa fa-book"></i> DESIGN (F8)
              </a>
              <a href="{{route('staff.coursestudent.add.get', ['client_id'=>$client->id])}}" class="btn btn-block btn-default" id="btnThemvaolop">
              <i class="fa fa-university"></i> PROJECT (F9)
              </a>
              <a href="{{route('staff.client.edit.get', ['client_id'=>$client->id])}}" class="btn btn-info btn-block"><b>Sửa thông tin</b></a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-sm">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title text-center">
                RETAIL CUSTOMERS
              </h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr class="text-center">
                    <th>DATE</th>
                    <th>CONTENT</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($client->tickets as $data)
                  <tr>
                    <td class="text-center">
                        {{date("d/m/Y", strtotime($data->created_at))}}
                        <hr>
                        <span class="badge bg-{{$data->ticketStatus->class}}">{{$data->ticketStatus->name}}</span>
                        <hr>
                        <a href="{{route('staff.ticket.view.get', ['ticket_id' => $data->id])}}" class="btn btn-primary">Xem</a>
                    </td>
                    <td>{{$data->model}}</td>
                  </tr>
                  @endforeach
                  </tfoot>
              </table>
            </div>
          </div>
          <!-- /.card -->
          <div class="card card card-info">
            <div class="card-header">
                <h3 class="card-title text-center">
                    PROJECT CUSTOMERS
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr class="text-center">
                    <th>Project Name</th>
                    <th>PAY</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($client->courseStudents as $data)
                  <tr>
                    <td>
                        {!!$data->course->linkName()!!}
                        <hr>
                        <a href="{{route('staff.coursestudent.edit.get', ['coursestudent_id' => $data->id])}}" class="btn btn-info">Sửa thông tin</a>
                    </td>
                    <td>
                        <b>Cọc:</b> 
                        @if ($data->deal_rate!=""){{$data->deal_rate}} % @else 0 @endif
                        <hr>
                        <b>Phí:</b>  {{MoneyFormat($data->course->tuition * (1-$data->deal_rate/100))}}
                        <hr>
                        <b>Pay:</b>  {{MoneyFormat($data->tuition_done)}}
                        <hr>
                        <b>Còn:</b>  {{MoneyFormat($data->course->tuition * (1-$data->deal_rate/100) - $data->tuition_done)}}
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
      </div>
    </div>
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
        "order": [[ 1, "desc" ]],
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
    $("#example2").DataTable({
        "order": [[ 1, "desc" ]],
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
  window.onkeydown = function(evt) {
    if (evt.keyCode == 117) //F6
        document.getElementById("btnThemphieuchi").click();
    if (evt.keyCode == 118) //F7
        document.getElementById("btnThemphieuthu").click();
    if (evt.keyCode == 119) //F8
        document.getElementById("btnThembiennhan").click();
    if (evt.keyCode == 120) //F9
        document.getElementById("btnThemvaolop").click();
  };
</script>
@stop