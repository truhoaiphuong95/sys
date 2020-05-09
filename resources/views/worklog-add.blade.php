@extends('master')

@section('head')
<title>DELI | Báo cáo công việc</title>
<link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
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
    <div class="container-fluid">
      @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Thất bại!</h4> {!! $error !!}
      </div>
      @endforeach
      @endif
      <form action="{{route('staff.worklog.add.post')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="staff_id" value="{{UserInfo()->id}}" />
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-body">
                <div class="col-md-12">
                  <div class="form-group col-md-12" >
                    <label>Ngày làm việc:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div>
                      <input type="date" name="date" class="form-control" value="{{$today}}" required>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group col-md-12">
                    <label>Chọn ca làm việc</label>
                    <select name="session" class="form-control select2" style="width: 100%;" required>
                      <option disabled selected value> -- Chọn một -- </option>
                      <option value="morning">Ca sáng</option>
                      <option value="afternoon">Ca chiều</option>
                      <option value="everning">Ca tối</option>
                    </select>
                  </div>
                  <div class="col-md-12">
                    <label>Nội dung công việc</label>
                    <textarea id="editor1" name="content" style="width: 100%" placeholder="Nội dung công việc chi tiết"></textarea>
                  </div>
                  <div class="col-md-12">
                    <label>Nội dung công việc</label>
                    <texarea name = "editor1" class="ckeditor"> abc </texarea>
                  </div>
                  <!-- /.col-->
                  <!-- <div class="form-group col-md-12">
                    <label>Nội dung công việc</label>
                    <textarea name="content" class="form-control" rows="3" placeholder="Mỗi công việc nhập một dòng, chi tiết và cụ thể"></textarea>
                  </div> -->
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary pull-right">Gửi báo cáo</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@stop
@section('script')
<!-- bootstrap datepicker -->
<script language="JavaScript" type="text/javascript" src="{{ asset('/plugins/jquery/jquery.min.js')}}"></script>
<script language="JavaScript" type="text/javascript" src="{{ asset('/plugins/select2/select2.full.min.js')}}"></script>
<script language="JavaScript" type="text/javascript" src="{{ asset('/plugins/ckeditor/ckeditor.js')}}"></script>
<script>
  /* global $ */
  $(function() {
    $('.select2').select2()
    ClassicEditor
      .create(document.querySelector('#editor1'))
      .then(function(editor) {
        // The editor instance
      })
      .catch(function(error) {
        console.error(error)
      })
  })
</script>
@stop