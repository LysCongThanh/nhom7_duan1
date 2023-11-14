<div class="px-5 py-4 container-fluid">
      <div class="mt-5 mb-5 mt-lg-9 row">
        <div class="col-lg-3 col-12">
          <div class="card card-plain pe-lg-5">
            <h6 class="font-weight-semibold">Hồ sơ</h6>
            <p class="text-sm">Chúng tôi sẽ ghi có vào tài khoản của bạn nếu bạn cần hạ cấp trong chu kỳ thanh toán.</p>
          </div>
        </div>
        <div class="col-lg-9 col-12">
          <div class="card card-body" id="profile">
            <img src="../assets/img/header-orange-purple.jpg" alt="pattern-lines"
              class="top-0 rounded-2 position-absolute start-0 w-100 h-100">
            <div class="row z-index-2 justify-content-center align-items-center">
              <div class="col-sm-auto col-4">
                <div class="avatar avatar-xl position-relative">
                  <img src="../assets/img/team-1.jpg" alt="bruce" class="w-100 border-radius-lg shadow-sm">
                </div>
              </div>
              <div class="col-sm-auto col-8 my-auto">
                <div class="h-100">
                  <h5 class="mb-1 font-weight-bolder">
                    Alexa Johnson
                  </h5>
                  <p class="mb-0 font-weight-bold text-sm">
                    Quản Trị Viên
                  </p>
                </div>
              </div>
              <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
                <div class="form-check form-switch ms-2">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault23" checked
                    onchange="visible()">
                </div>
                <label class="text-white form-check-label mb-0">
                  <small id="profileVisibility">
                    Switch to invisible
                  </small>
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mb-5 row">
        <div class="col-lg-3 col-12">
          <div class="card card-plain pe-lg-5">
            <h6 class="font-weight-semibold">Thông Tin Cơ Bản</h6>
            <p class="text-sm">Chúng tôi sẽ ghi có vào tài khoản của bạn nếu bạn cần hạ cấp trong chu kỳ thanh toán.</p>
          </div>
        </div>
        <div class="col-lg-9 col-12">
          <div class="card" id="basic-info">
            <div class="card-header">
              <h5>Thông Tin Cơ Bản</h5>
            </div>
            <div class="pt-0 card-body">
              <div class="row">
                <div class="col-6">
                  <label class="form-label">Họ</label>
                  <div class="input-group">
                    <input id="firstName" name="firstName" class="form-control" type="text" placeholder="e.g. Alexa"
                      required="required">
                  </div>
                </div>
                <div class="col-6">
                  <label class="form-label">Tên</label>
                  <div class="input-group">
                    <input id="lastName" name="lastName" class="form-control" type="text" placeholder="e.g. Johnson"
                      required="required">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4 col-6">
                  <label class="mt-4 form-label">Giới Tính</label>
                  <select class="form-control" name="choices-gender" id="choices-gender">
                    <option value="Female">Nam</option>
                    <option value="Male">Nữ</option>
                  </select>
                </div>
                <div class="col-sm-8">
                  <div class="row">
                    <div class="col-sm-5 col-5">
                      <label class="mt-4 form-label">Ngày Sinh</label>
                      <select class="form-control" name="choices-month" id="choices-month"></select>
                    </div>
                    <div class="col-sm-4 col-3">
                      <label class="mt-4 form-label">&nbsp;</label>
                      <select class="form-control" name="choices-day" id="choices-day"></select>
                    </div>
                    <div class="col-sm-3 col-4">
                      <label class="mt-4 form-label">&nbsp;</label>
                      <select class="form-control" name="choices-year" id="choices-year"></select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <label class="mt-4 form-label">Email</label>
                  <div class="input-group">
                    <input id="email" name="email" class="form-control" type="email" placeholder="example@email.com">
                  </div>
                </div>
                <div class="col-6">
                  <label class="mt-4 form-label">Số Điện Thoại</label>
                  <div class="input-group">
                    <input id="phone" name="phone" class="form-control" type="number" placeholder="+40 941 538 024">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <label class="mt-4 form-label">Địa Chỉ</label>
                  <div class="input-group">
                    <input id="location" name="location" class="form-control" type="text" placeholder="Sydney, A">
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mb-5 row">
        <div class="col-lg-3 col-12">
          <div class="card card-plain pe-lg-5">
            <h6 class="font-weight-semibold">Cài Đặt Mật Khẩu</h6>
            <p class="text-sm">Chúng tôi sẽ ghi có vào tài khoản của bạn nếu bạn cần hạ cấp trong chu kỳ thanh toán.</p>
          </div>
        </div>
        <div class="col-lg-9 col-12">
          <div class="card" id="password">
            <div class="card-header">
              <h5>Đổi mật khẩu</h5>
            </div>
            <div class="pt-0 card-body">
              <label class="form-label">Mật khẩu cũ</label>
              <div class="form-group">
                <input class="form-control" type="password" placeholder="Current password">
              </div>
              <label class="form-label">Mật Khẩu Mới</label>
              <div class="form-group">
                <input class="form-control" type="password" placeholder="New password">
              </div>Nhập Lại Mật Khẩu Mới</label>
              <div class="form-group">
                <input class="form-control" type="password" placeholder="Confirm password">
              </div>
              <h5 class="mt-5"></h5>Yêu cầu về mật khẩu</h5>
              <p class="mb-2 text-muted">
                Vui lòng làm theo hướng dẫn này để có mật khẩu mạnh:
              </p>
              <ul class="mb-0 text-muted ps-4 float-start">
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
              </ul>
              <button class="mt-6 mb-0 btn btn-white btn-sm float-end">Cập Nhật Lại Mật Khẩu</button>
            </div>
          </div>
        </div>
      </div>
      <div class="mb-5 row">
        <div class="col-lg-3 col-12">
          <div class="card card-plain pe-lg-5">
            <h6 class="font-weight-semibold">Xác Thực</h6>
            <p class="text-sm">Chúng tôi sẽ ghi có vào tài khoản của bạn nếu bạn cần hạ cấp trong chu kỳ thanh toán.</p>
          </div>
        </div>
        <div class="col-lg-9 col-12">
          <div class="card" id="2fa">
            <div class="card-header d-flex">
              <h5 class="mb-0">Xác Thực 2 Bước</h5>
              <span class="my-auto badge badge-success ms-auto">Đã Bật</span>
            </div>
            <div class="card-body">
              <div class="d-flex">
                <p class="my-auto">Khóa bảo mật</p>
                <p class="my-auto text-sm text-secondary ms-auto me-3">Không có khóa bảo mậts</p>
                <button class="mb-0 btn btn-sm btn-white" type="button">Thêm vào</button>
              </div>
              <hr class="horizontal dark">
              <div class="d-flex">
                <p class="my-auto">Số tin nhắn SMS</p>
                <p class="my-auto text-sm text-secondary ms-auto me-3">+4012374423</p>
                <button class="mb-0 btn btn-sm btn-white" type="button">Sửa</button>
              </div>
              <hr class="horizontal dark">
              <div class="d-flex">
                <p class="my-auto">Ứng dụng xác thực</p>
                <p class="my-auto text-sm text-secondary ms-auto me-3">Chưa được định cấu hình</p>
                <button class="mb-0 btn btn-sm btn-white" type="button">Cài đặt</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mb-5 row">
        <div class="col-lg-3 col-12">
          <div class="card card-plain pe-lg-5">
            <h6 class="font-weight-semibold">Xóa tài khoản</h6>
            <p class="text-sm">Chúng tôi sẽ ghi có vào tài khoản của bạn nếu bạn cần hạ cấp trong chu kỳ thanh toán.</p>
          </div>
        </div>
        <div class="col-lg-9 col-12">
          <div class="card" id="delete">
            <div class="card-header">
              <h5>Xóa tài khoản</h5>
              <p class="mb-0 text-sm">Một khi bạn xóa tài khoản của mình, bạn sẽ không thể quay lại. Xin hãy chắc chắn.
              </p>
            </div>
            <div class="pt-0 card-body d-sm-flex">
              <div class="mb-4 d-flex align-items-center mb-sm-0">
                <div>
                  <div class="mb-0 form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault0">
                  </div>
                </div>
                <div class="ms-2">
                  <span class="text-sm text-dark font-weight-bold d-block">Xác nhận</span>
                  <span class="text-xs d-block">
                    Tôi muốn xóa tài khoản của mình.</span>
                </div>
              </div>
              <button class="mb-0 btn btn-white ms-auto" type="button" name="button">Vô hiệu quá</button>
              <button class="mb-0 btn bg-gradient-danger ms-2" type="button" name="button">Xóa tài khoản</button>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer pt-3  ">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-xs text-muted text-lg-start">
              Copyright
              ©
              <script data-cfasync="false"
                src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
              <script>
                document.write(new Date().getFullYear())
              </script>
              Corporate UI Dashboard PRO by
              <a href="https://www.creative-tim.com" class="text-secondary" target="_blank">Creative Tim</a>.
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link text-xs text-muted" target="_blank">Creative
                  Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link text-xs text-muted"
                  target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/blog" class="nav-link text-xs text-muted" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link text-xs pe-0 text-muted"
                  target="_blank">License</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>