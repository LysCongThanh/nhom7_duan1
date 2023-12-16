<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
  <div class="container" style="border-radius:10px;">

    <div class="row">
      <aside class="col-md-3">
        <nav class="list-group">
          <a class="list-group-item " href="{{_WEB_ROOT}}ca-nhan">Tổng quan về tài khoản</a>
          <a class="list-group-item" href="dia-chi">Địa chỉ của tôi</a>
          <a class="list-group-item" href="don-hang">Đơn hàng của tôi</a>
          <a class="list-group-item" href="yeu-thich">Sản phẩm yêu thích</a>
          <a class="list-group-item active" href="cai-dat">Cài đặt</a>
          <a class="list-group-item" href="cai-dat">Đăng xuất</a>
        </nav>
      </aside>
      <main class="col-md-9">

        <div class="card" style="border-radius:10px;">
          <div class="card-body">
            <form action="cap-nhat-ca-nhan" method="POST" enctype="multipart/form-data">
              <div class="row col-md-12">

                <div class="col-md-3 d-flex flex-column align-items-center">

                  <img src="{{_WEB_ROOT.$pf['avatar']}}" class="js-img img-md rounded-circle">
                  <div class="mt-3">
                    <label for="formFile" class="form-label">Chọn hình ảnh muốn thay đổi</label>
                    <div class="custom-file">
                      <input onchange="displayImage(this)" name="image" type="file" class="custom-file-input" id="formFile">
                      <label class="custom-file-label" id="fileLabel" for="formFile" data-browse="Tải lên">Chọn tệp</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-5 border-left border-right">

                  <div class="form-group">
                    <label>Tên</label>
                    <input type="text" class="form-control" name="name" value="{{$pf['name']}} ">
                  </div>

                  <div class=" form-row">
                    <div class=" form-group col-md-6">
                      <label>E-mail</label>
                      <input type="email" class="form-control" name="email" value="{{$pf['email'] ?? ' '}}">
                    </div>
                    <div class=" col-md-6">
                      <label>Số điện thoại</label>
                      <input type="tel" class="form-control" name="tel" value="{{$pf['tel'] ?? ' '}}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control" name="address" value="{{$pf['address'] ?? ' '}}">
                  </div>

                  <div class="form-group">
                    <label>Địa chỉ cụ thể</label>
                    <input type="text" class="form-control" name="specific_address" value="{{$pf['specific_address'] ?? ' '}}">
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Mã khu vực</label>
                      <input type="text" class="form-control" name="zip_code" value="{{$pf['zip_code'] ?? ' '}}">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Giới tính</label>
                      <select id="inputState" class="form-control" name="sex">
                        <option value="" {{ $pf['sex'] == '' ? 'selected' : '' }}>Chọn</option>
                        <option value="Nam" {{ $pf['sex'] == 'Nam' ? 'selected' : '' }}>Nam</option>
                        <option value="Nữ" {{ $pf['sex'] == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Ngày sinh</label>
                    <input type="date" class="form-control" name="birthdate" value="{{$pf['birthdate'] ? $pf['birthdate']: ' ' }}">
                  </div>
                  <button class="btn btn-outline-primary btn-block mt-4" type="submit">Cập Nhật Thông Tin</button>
                </div>
            </form>
            <div class="col-md-4">
              <form action="profile/updatePassword">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label>Mật khẩu cũ</label>
                    <input type="password" class="form-control" name="old_password" placeholder="Nhập mật khẩu cũ...">
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label>Mật khẩu mới</label>
                    <input type="password" class="form-control" name="new_password" placeholder="Nhập mật khẩu mới...">
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label>Xác nhận mật khẩu mới</label>
                    <input type="password" class="form-control" name="confirm_password" placeholder="Xác nhận mật khẩu... ">
                  </div>
                </div>

                <h5>Yêu cầu về mật khẩu</h5>
                <p class="text-muted">
                  Vui lòng làm theo hướng dẫn này để có mật khẩu mạnh:
                </p>

                <ul class="text-muted ps-4 float-start">
                  <li>
                    <span class="text-sm">Một ký tự đặc biệt</span>
                  </li>
                  <li>
                    <span class="text-sm">Tối thiểu 6 ký tự</span>
                  </li>
                  <li>
                    <span class="text-sm">Một số (khuyên dùng 2)</span>
                  </li>
                  <li>
                    <span class="text-sm">Thay đổi nó thường xuyên</span>
                  </li>
                  <li>
                    <span class="text-sm">Không sử dụng thông tin cá nhân (tên, ngày sinh) trong mật khẩu</span>
                  </li>
                </ul>

                <br>
                <button class="btn btn-outline-primary mt-2 btn-block" type="submit">Cập Nhật Mật Khẩu</button>
              </form>
            </div>
          </div>
</div>
    </div>
  </div>
  </main>
  </div>
  </div>
</section>
<script>
  function displayImage(input) {
    var img = document.querySelector('.js-img');
    var fileLabel = document.getElementById('fileLabel');

    if (input.files && input.files[0]) {
      var file = input.files[0];
      var reader = new FileReader();

      reader.onload = function(e) {
        img.src = e.target.result;
        img.style.display = 'block';
      };

      reader.readAsDataURL(file);

      fileLabel.innerHTML = file.name;
    }
  }
</script>