@extends('master')
@section('head')
<title>DELI | Nhập biên nhận mới</title>
<link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
@stop
@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm">
          <h1 class="text-center"><b class="text-primary">NHẬP BIÊN NHẬN THIẾT KẾ</b></h1>
        </div>
        <!--<div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Nhập biên nhận thiết kế</li>
          </ol>
        </div>-->
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- general form elements -->
    <div class="col-md-12">
      @if(count($client->tickets)>0)
      <div class="card card-default">
        <!--<div class="card-header with-border">-->
        <!--  <h3 class="card-title">Biên nhận trước đó</h3>-->
        <!--</div>-->
        <!-- /.box-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <tr>
              <th>ID</th>
              <th>Nội dung</th>
              <th>Những yêu cầu cụ thể</th>
              <th></th>
            </tr>
            @foreach($client->tickets as $data)
            <tr>
              <td>{{$data->id}}</td>
              <td>{{$data->requestment}}</td>
              <td>Màu sắc {{$data->cpu}}, Hình tượng {{$data->ram}}, Phong cách {{$data->storage}}</td>
              <td><a href="{{route('staff.ticket.useold.get', ['ticket_id' => $data->id])}}" class="btn btn-block btn-primary">Sử dụng</a></td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
      @endif
      <div class="card card-primary">
        <div class="card-header">
          <!--<h3 class="card-title">Nhập thông tin biên nhận</h3>-->
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{route('staff.ticket.add.post')}}" method="post">
          {{csrf_field()}}
          <div class="card-body">
            <div class="form-group text-uppercase">
              <label for="inputSostt">Tên Khách Hàng:</label> <b class="text-primary">{{$client->name}}</b> <br>
              <label for="inputSostt">Số Điện Thoại:</label> <a href="tel:{{$client->phone}}">{{$client->phone}}</a> <br>
              <label for="inputSostt">Ngày Sinh:</label> {{date("d/m/Y", strtotime($client->birthday))}}
              <input name="client_id" type="hidden" class="form-control" value="{{$client->id}}">
              <input name="staff_id" type="hidden" class="form-control" value="{{UserInfo()->id}}">
            </div>
            <div class="form-group">
              <label>Dịch vụ:</label>
              <select name="services[]" class="form-control select2" multiple="multiple" data-placeholder="Khách hàng cần dịch vụ gì?" autofocus required>
              @foreach($services as $service)
                <option value="{{$service->id}}">{{$service->name}}</option>
              @endforeach
              </select>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
              <label for="requestment">Yêu cầu dịch vụ khác:</label>
              <input name="requestment" type="text" class="form-control" id="requestment" placeholder="Khách hàng cần làm thêm dịch vụ gì?">
            </div>
            <!--<div class="form-group">
              <label for="model">Nội dung:</label>
              <input name="model" type="text" class="form-control" id="model" placeholder="Nội dung yêu cầu mà Khách hàng cần thiết kế" @if(isset($ticket_old)) value="{{$ticket_old->model}}" @endif required>
            </div>-->
                <div class="form-group">
                    <label for="model">Nội dung:</label>
                    <textarea class="form-control" name="model" id="model" rows="3" placeholder="Nội dung yêu cầu mà Khách hàng cần thiết kế" @if(isset($ticket_old)) value="{{$ticket_old->model}}" @endif required></textarea>
              </div>
            <div class="form-group">
              <label for="cpu">Màu sắc:</label>
              <input name="cpu" type="text" class="form-control" id="cpu" placeholder="Màu sắc hợp với Mệnh của Khách hàng là gì?" @if(isset($ticket_old)) value="{{$ticket_old->cpu}}" @endif required>
            </div>
            <div class="form-group">
              <label for="ram">Hình tượng cần cách điệu:</label>
              <input name="ram" type="text" class="form-control" id="ram" placeholder="Hình tượng Khách hàng muốn cách điệu là gì?" @if(isset($ticket_old)) value="{{$ticket_old->ram}}" @endif required>
            </div>
            <div class="form-group">
              <label for="storage">Phong cách thiết kế:</label>
              <input name="storage" type="text" class="form-control" id="storage" placeholder="Phong cách thiết kế mà Khách hàng đang để ý tới là gì?" @if(isset($ticket_old)) value="{{$ticket_old->storage}}" @endif required>
            </div>
            <div class="form-group">
              <label for="note">Kiểu chữ:</label>
              <input name="note" type="text" class="form-control" id="note" placeholder="Khách hàng có yêu cầu về Font chữ không?" required>
            </div>
            <div class="form-group">
              <label for="other">Những yêu cầu khác:</label>
              <input name="other" type="text" class="form-control" id="other" placeholder="Khách hàng có yêu cầu gì khác không?" required>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm vào</button>
            <a onclick="history.go(-1);" class="btn">Quay lại</a>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@stop

@section('script')
<!-- Select2 -->
<script src="{{asset('plugins/select2/select2.full.min.js')}}"></script>

<script>
  $(function () {
    $('.select2').select2()
  });
</script>
@stop