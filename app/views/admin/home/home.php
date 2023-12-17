<div class="px-5 py-4 container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="mx-2 mb-3 d-md-flex align-items-center">
                <div class="mb-3 mb-md-0">
                    <h3 class="mb-0 font-weight-bold">Chào, <?= Session::data('admin')['name'] ?></h3>
                    <p class="mb-0">Đây là trang quản trị!</p>
                </div>
                <!-- <button type="button" class="mb-0 mb-2 btn btn-sm btn-white btn-icon d-flex align-items-center ms-md-auto mb-sm-0 me-2">
                    <span class="btn-inner--icon">
                        <span class="p-1 bg-success rounded-circle d-flex ms-auto me-2">
                            <span class="visually-hidden">New</span>
                        </span>
                    </span>
                    <span class="btn-inner--text">Tin Nhắn</span>
                </button>
                <button type="button" class="mb-0 btn btn-sm btn-dark btn-icon d-flex align-items-center">
                    <span class="btn-inner--icon">
                        <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="d-block me-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                    </span>
                    <span class="btn-inner--text">Đồng Bộ Hóa</span>
                </button> -->
            </div>
        </div>
    </div>
    <hr class="my-0">
    <div class="p-3 card-body">
        <div class="row d-flex align-items-center">
            <div class="col-4">
                <h5 class="mb-0 text-capitalize">Overview</h5>
                <p class="mb-0">Here you have more details.</p>
            </div>
            <div class="col-8 nav-wrapper position-relative ms-auto">
                <div class="btn-group" role="tablist">
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs nav-fill mt-3" id="myTabs">
            <li class="nav-item">
                <a class="nav-link active" id="doanhThuTabLink" data-bs-toggle="tab" href="#doanhThuTab">Doanh thu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="sanPhamTabLink" data-bs-toggle="tab" href="#sanPhamTab">Sản phẩm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="danhMucTabLink" data-bs-toggle="tab" href="#danhMucTab">Danh mục</a>
            </li>
        </ul>
        <div class="tab-content is-shadow">
            <div class="tab-pane p-4 fade show active" id="doanhThuTab">
                <!-- Nội dung cho tab Doanh thu -->
                <!-- <div class="row chart-filter">
                    <div class="col-6">
                        
                        <label for="chartType" class="form-label">Loại biểu đồ:</label>
                        <select class="form-select" id="chartType">
                            <option value="bar">Bar Chart</option>
                            <option value="line">Line Chart</option>
                            <option value="pie">Pie Chart</option>
                            <option value="doughnut">Doughnut Chart</option>
                            <option value="radar">radar Chart</option>
                            <option value="polarArea">Polar Area Chart</option>
                            
                        </select>
                    </div>
                </div> -->

                <!-- Hiển thị biểu đồ -->
                <div class="chart">
                    <canvas id="chart-line" class="chart-canvas" height="500"></canvas>
                </div>
            </div>
            <div class="tab-pane p-4 fade" id="sanPhamTab">
            

                <!-- Hiển thị biểu đồ -->
                <div class="chart">
                    <canvas id="chart-products" class="chart-canvas" height="500"></canvas>
                </div>
            </div>
            <div class="tab-pane p-4 fade" id="danhMucTab">
                <!-- Nội dung cho tab Danh mục -->
                <div class="chart">
                    <canvas id="chart-categories" class="chart-canvas" height="500"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="my-4 row">
        <div class="mb-4 col-lg-4 col-md-6 mb-md-0">
            <div class="card shadow-xs border h-100">
                <div class="card-header border-0 pb-0">
                    <h6 class="font-weight-semibold text-lg mb-0">Số dư theo thời gian</h6>
                    <p class="text-sm">Ở đây bạn có thông tin chi tiết về số dư.</p>
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                        <label class="btn btn-white px-3 mb-0" for="btnradio1">12 months</label>
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                        <label class="btn btn-white px-3 mb-0" for="btnradio2">30 days</label>
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                        <label class="btn btn-white px-3 mb-0" for="btnradio3">7 days</label>
                    </div>
                </div>
                <div class="card-body py-3">
                    <div class="chart mb-2">
                        <canvas id="chart-bars" class="chart-canvas" height="240"></canvas>
                    </div>
                    <button class="btn btn-white mb-0 ms-auto">Xem Báo Cáo</button>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-6">
            <div class="border shadow-xs card">
                <div class="pb-0 card-header border-bottom">
                    <div class="mb-3 d-sm-flex align-items-center">
                        <div>
                            <h6 class="mb-0 text-lg font-weight-semibold">Giao dịch gần đây</h6>
                            <p class="mb-2 text-sm mb-sm-0">Đây là thông tin chi tiết về các giao dịch cuối cùng
                            </p>
                        </div>
                    </div>
                    <div class="pb-3 d-sm-flex align-items-center">
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="status" value="All" onclick="getOrders(this)" id="btnradiotable1" autocomplete="off" checked>
                            <label class="px-3 mb-0 btn btn-white" for="btnradiotable1">Tất Cả</label>
                            <input type="radio" class="btn-check" name="status" value="'Đã Thanh Toán'" onclick="getOrders(this)" id="btnradiotable2" autocomplete="off">
                            <label class="px-3 mb-0 btn btn-white" for="btnradiotable2">Đã Thanh Toán</label>
                            <input type="radio" class="btn-check" name="status" value="'Chưa Thanh Toán'" onclick="getOrders(this)" id="btnradiotable3" autocomplete="off">
                            <label class="px-3 mb-0 btn btn-white" for="btnradiotable3">Chưa Thanh Toán</label>
                        </div>
                    </div>
                </div>
                <div class="px-0 py-0 card-body">
                    <div class="p-0 table-responsive">
                        <table class="table mb-0 align-items-center justify-content-center">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="text-xs text-secondary font-weight-semibold opacity-7">
                                        Tài Khoản</th>
                                    <th class="text-xs text-secondary font-weight-semibold opacity-7">
                                        Trạng thái</th>
                                    <th class="text-xs text-secondary font-weight-semibold opacity-7 ps-2">
                                        Tổng tiền</th>
                                    <th class="text-xs text-secondary font-weight-semibold opacity-7 ps-2">Thời
                                        Gian
                                    </th>
                                    <th class="text-xs text-secondary font-weight-semibold opacity-7 ps-2">
                                        Phương thức thanh toán</th>
                                    <th class="text-xs text-center text-secondary font-weight-semibold opacity-7">
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="orders_list">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4 row">
        <div class="col-12">
            <div class="mb-4 card">
                <div class="pb-0 card-header">
                    <h6>Top Sản Phẩm Bán Chạy</h6>
                </div>
                <div class="px-0 pt-0 pb-2 card-body">
                    <div class="p-0 table-responsive">
                        <table class="table mb-0 align-items-center">
                            <thead>
                                <tr>
                                    <th class="border-top-0 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Sản Phẩm</th>
                                    <th class="border-top-0 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Giá Trị</th>
                                    <th class="text-center border-top-0 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Lượt Truy Cập</th>
                                    <th class="text-center border-top-0 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Đánh Giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($best_salers as $best_saler)
                                <tr>
                                    <td>
                                        <div class="px-3 py-1 d-flex">
                                            <div>
                                                <img src="<?= _WEB_ROOT; ?>/public/assets/admin/img/kam-idris-_HqHX3LBN18-unsplash.jpg" class="avatar me-3" alt="image">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$best_saler['name']}}</h6>
                                                <p class="mb-0 text-sm font-weight-bold text-secondary"><span class="text-success">2.421</span> đơn đặt hàng</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-sm font-weight-bold">{{$best_saler['total']}}</p>
                                    </td>
                                    <td class="text-sm text-center align-middle">
                                        <p class="mb-0 text-sm font-weight-bold">{{$best_saler['view']}}</p>
                                    </td>
                                    <td class="align-middle text-end">
                                        <div class="px-3 py-1 d-flex justify-content-center align-items-center">
                                            <p class="mb-0 text-sm font-weight-bold">{{$best_saler['comment']}}</p>
                                            <i class="mt-1 text-sm ni ni-bold-up ms-1 text-danger"></i>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    Corporate UI Dashboard PRO by
                    <a href="https://www.creative-tim.com" class="text-secondary" target="_blank">Creative
                        Tim</a>.
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com" class="nav-link text-xs text-muted" target="_blank">Creative Tim</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/presentation" class="nav-link text-xs text-muted" target="_blank">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/blog" class="nav-link text-xs text-muted" target="_blank">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/license" class="nav-link text-xs pe-0 text-muted" target="_blank">License</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</div>