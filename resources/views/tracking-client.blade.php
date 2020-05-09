@extends('tracking-master')
@section('main')
      <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title text-center">TIẾN ĐỘ THIẾT KẾ</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="text-center">
                  <th>Số phiếu</th>
                  <th>Yêu cầu</th>
                  <th>Tiến độ</th>
                  <th class="d-none d-md-table-cell">Chức năng</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tickets as $ticket)
                <tr class="text-center">
                  <td>{{$ticket->id}}</td>
                  <td>{{$ticket->model}}</td>
                  <td>
                    @if ($ticket->ticket_status_id == 5)
                    <span class="badge bg-success">HOÀN THÀNH</span>
                    @else
                    <span class="badge bg-warning">ĐANG XỬ LÝ</span>
                    @endif
                    
                  </td>
                  <td class="d-none d-md-block d-lg-block"><a href="/tracking/{{$ticket->id}}/{{$sixdigit}}" class="btn btn-primary">Xem</a></td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <a onclick="history.go(-1);" class="btn btn-block btn-outline-secondary">Quay lại</a>
            </div>
            <!-- /.card-footer -->
      </div>
  @stop