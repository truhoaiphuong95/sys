@extends('tracking-master')
@section('main')
<div class="row">
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title text-center">THEO DÕI TIẾN ĐỘ THIẾT KẾ</h3>
      </div>
      <div class="card-body">
        <div class="col-md-12">
          <form action="/search" method="post">
            {{csrf_field()}}
            <div class="input-group">
              <input name="inputKeyword" type="text" class="form-control" placeholder="Nhập vào SỐ ĐIỆN THOẠI" required>
              <span class="input-group-append">
              <button type="submit" class="btn btn-info btn-flat">Tìm kiếm</button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fa fa-magic"></i>&nbsp; 
          Hướng dẫn sử dụng
        </h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <dl class="dl-horizontal">
          <dt style="font-style: italic;">• Hệ thống theo dõi tiến độ thiết kế:</dt>
          <dd>Vì hiểu được nỗi trăn trở của Quý Khách hàng khi gửi yêu cầu thiết kế, hệ thống <b>DELI</b>4ne1 luôn cập nhật thường xuyên và liên tục tiến độ thiết kế để Quý Khách hàng dễ dàng theo dõi.</dd>
          <dt style="font-style: italic;">• Tìm theo số điện thoại:</dt>
          <dd>Quý Khách hàng có thể nhập số điện thoại của mình vào ô tìm kiếm để xem tiến độ thiết kế.</dd>
          <dt style="font-style: italic;">• Liên hệ:</dt>
          <dd>Quý Khách hàng vui lòng liên hệ <a href="tel:0898843938">089.884.3938</a> hoặc <a href="https://www.facebook.com/thietkedeli/" target="_blank">Fanpage DELI</a> để được hỗ trợ tốt nhất.</dd>
          <dt style="color: #a00; font-style: italic;">• Ý kiến phản hồi:</dt>
          <dd style="color: #a00">Những ý kiến đóng góp hay phản ánh về dịch vụ hoặc thái độ phục vụ của nhân viên, xin vui lòng liên hệ trực tiếp đến số điện thoại <a href="tel:0898843938">089.884.3938</a>.</dd>
          <dt style="text-align: center">***<br />Một lần nữa, Dịch vụ thiết kế <b>DELI</b>4ne1 xin chân thành cảm ơn Quý Khách hàng đã tin tưởng sử dụng dịch vụ của chúng tôi.</dt>
          <dt style="text-align: center">Kính chúc Quý Khách có những trãi nghiệm tuyệt vời nhất!</dt>
        </dl>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
@stop