@extends('master')
@section('head')
<title>DELI | Danh sách các dự án</title>
<link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@stop
@section('main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        @if (session('success'))
        <div class="row"><div class="col-md-12">
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fa fa-check"></i> Thành công!</h5> {{ session('success') }}
          </div>
        </div></div>
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
        <div class="row mb-2">
          <div class="col-sm text-center">
            <h1 class="text-primary"><b>DANH SÁCH DỰ ÁN</b></h1>
          </div>
          <!--<div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Danh sách dự án</li>
            </ol>
          </div>-->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-info">
            <div class="card-header">
              <!--<h3 class="card-title">Danh sách các dự án</h3>-->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="text-center">
                  <th>Dự án</th>
                  <th>Thông tin</th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                <a href="{{$course->id}}">
                <tr>
                  <!--<td>{{ date("Y/m/d", strtotime($course->opening_at)) }}</td>-->
                    <td>
                        {{$course->id}}:
                        <a href="{{route('staff.course.view.get', ['course_id' => $course->id])}}" >{!! $course->linkName() !!}</a>
                    </td>
                  <td class="text-center">
                      {{ number_format($course->tuition,0,",",".") }}<br>
                      <!--TG: {{ $course->lesson }}<br>
                      SL:
                        @if( !$course->isFull() )
                            <span style="width: 88px;" class="btn btn-warning">
                        @elseif( $course->isFull() )
                            <span style="width: 88px;" class="btn btn-success">
                        @endif
                        {{ $course->sumDone() }}/{{ $course->sum() }}/{{ $course->maxseat }}</span>-->
                    </td>
                  <!--<td class="text-center">
                    <div class="btn-group">
                      <a href="{{route('staff.course.view.get', ['course_id' => $course->id])}}" class="btn btn-primary">Xem</a>
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="{{route('staff.course.edit.get', ['course_id' => $course->id])}}">Sửa</a>
                      </div>
                    </div>
                  </td>-->
                </tr>
                </a>
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
      <!--<div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Dự án dự kiến</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="text-center">
                  <th>Mã dự án</th>
                  <th>Tên dự án</th>
                  <th>Kinh phí</th>
                  <th>Thời gian thiết kế</th>
                  <th>Khách hàng</th>
                  <th>Chức năng</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($expected_courses as $course)
                <a href="{{$course->id}}">
                <tr>
                  <td>{{ date("Y/m/d", strtotime($course->opening_at)) }}
                  <td>{{ $course->shortname }}</td>
                  <td>{!! $course->linkName() !!}</a></td>
                  <td class="text-center">{{ number_format($course->tuition,0,",",".") }}</td>
                  <td class="text-center">{{ $course->lesson }}</td>
                  <td class="text-center">
                    @if( !$course->isFull() )
                    <span style="width: 88px;" class="btn btn-warning"></span>
                    @elseif( $course->isFull() )
                    <span style="width: 88px;" class="btn btn-success">
                    @endif
                    {{ $course->sumDone() }}/{{ $course->sum() }}/{{ $course->maxseat }}</span>
                  </td>
                  <td class="text-center">
                    <div class="btn-group">
                      <a href="{{route('staff.course.view.get', ['course_id' => $course->id])}}" class="btn btn-primary">Xem</a>
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="{{route('staff.course.edit.get', ['course_id' => $course->id])}}">Sửa</a>
                      </div>
                    </div>
                  </td>
                </tr>
                </a>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>-->
    </section>
  </div>
  <!-- /.content-wrapper -->
@stop

@section('script')
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
        "order": [[0, 'desc']],
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