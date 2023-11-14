<div class="px-5 py-4 container-fluid">
            <div class="mt-4 row">
                <div class="col-12">
                    <div class="card">
                        <img src="../assets/img/header-blue-white.png" alt="pattern-lines"
                            class="top-0 rounded-2 position-absolute start-0 w-100 h-100">
                        <div class="px-4 bg-cover card-body z-index-1">
                            <div class="row">
                                <div class="col-lg-8 col-12">
                                    <h3 class="text-white">Kiểm Tra Danh Sách Bình Luận 🔥</h3>
                                    <p class="mb-4 text-white">Xem tất cả các chi tiết về tất cả các bình luận.</p>

                                </div>
                                <div class="text-end col-lg-4 col-12">
                                    <img class="w-35 ms-auto me-5 d-none d-md-block" src="../assets/img/globe-3d.png"
                                        alt="cube image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 row">
                <div class="col-12">
                    <div class="card">
                        <div class="pb-0 card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class>Tất cả bình luận</h5>
                                    <p class="mb-0 text-sm">
                                        A lightweight, extendable, dependency-free javascript HTML table plugin.
                                    </p>
                                </div>
                                <div class="col-6 text-end">
                                    <button type="button" class="mb-0 btn btn-white" data-bs-toggle="modal"
                                        data-bs-target="#import">
                                        <svg class="me-2" width="14" height="15" viewBox="0 0 20 21" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M3 17.5C3 16.9477 3.44772 16.5 4 16.5H16C16.5523 16.5 17 16.9477 17 17.5C17 18.0523 16.5523 18.5 16 18.5H4C3.44772 18.5 3 18.0523 3 17.5ZM6.29289 9.79289C6.68342 9.40237 7.31658 9.40237 7.70711 9.79289L9 11.0858V3.5C9 2.94772 9.44771 2.5 10 2.5C10.5523 2.5 11 2.94771 11 3.5V11.0858L12.2929 9.79289C12.6834 9.40237 13.3166 9.40237 13.7071 9.79289C14.0976 10.1834 14.0976 10.8166 13.7071 11.2071L10.7071 14.2071C10.5196 14.3946 10.2652 14.5 10 14.5C9.73478 14.5 9.48043 14.3946 9.29289 14.2071L6.29289 11.2071C5.90237 10.8166 5.90237 10.1834 6.29289 9.79289Z"
                                                fill="#111827" />
                                        </svg>Import
                                    </button>
                                    <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog mt-lg-10">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ModalLabel">Import CSV</h5>
                                                    <i class="fas fa-upload ms-3"></i>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>You can browse your computer for a file.</p>
                                                    <input type="text" placeholder="Browse file..."
                                                        class="mb-3 form-control">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value
                                                            id="importCheck" checked>
                                                        <label class="custom-control-label" for="importCheck">I accept
                                                            the terms and conditions</label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn bg-gradient-secondary btn-sm"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button"
                                                        class="btn bg-gradient-primary btn-sm">Upload</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="mt-1 mb-0 btn btn-white export mt-sm-0" data-type="csv" type="button"
                                        name="button">
                                        <svg class="me-2" width="14" height="15" viewBox="0 0 20 21" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M3 17.5C3 16.9477 3.44772 16.5 4 16.5H16C16.5523 16.5 17 16.9477 17 17.5C17 18.0523 16.5523 18.5 16 18.5H4C3.44772 18.5 3 18.0523 3 17.5ZM6.29289 7.20711C5.90237 6.81658 5.90237 6.18342 6.29289 5.79289L9.29289 2.79289C9.48043 2.60536 9.73478 2.5 10 2.5C10.2652 2.5 10.5196 2.60536 10.7071 2.79289L13.7071 5.79289C14.0976 6.18342 14.0976 6.81658 13.7071 7.20711C13.3166 7.59763 12.6834 7.59763 12.2929 7.20711L11 5.91421V13.5C11 14.0523 10.5523 14.5 10 14.5C9.44771 14.5 9 14.0523 9 13.5V5.91421L7.70711 7.20711C7.31658 7.59763 6.68342 7.59763 6.29289 7.20711Z"
                                                fill="#111827" />
                                        </svg>Export
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="p-0 card-body">
                            <div class="table-responsive">
                                <table class="table table-flush" id="datatable-search">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-xxs border-top-0 text-uppercase">Id</th>
                                            <th class="text-xxs border-top-0 text-uppercase">Ngày Đăng</th>
                                            <th class="text-xxs border-top-0 text-uppercase">Người Dùng</th>
                                            <th class="text-xxs border-top-0 text-uppercase">Sản Phẩm</th>
                                            <th class="text-xxs border-top-0 text-uppercase">Nội Dung</th>
                                            <th class="text-xxs border-top-0 text-uppercase">Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="customCheck1">
                                                    </div>
                                                    <p class="mb-0 text-xs font-weight-bold ms-2">#10421</p>
                                                </div>
                                            </td>
                                            <td class="font-weight-bold">
                                                <span class="my-2 text-xs">1 Nov, 10:20 AM</span>
                                            </td>
                                            <td class="text-xs font-weight-bold">
                                                <div class="d-flex align-items-center">
                                                    <img src="../assets/img/team-2.jpg"
                                                        class="avatar avatar-xs rounded-circle me-2" alt="user image">
                                                    <span>Orlando Imieto</span>
                                                </div>
                                            </td>
                                            <td class="text-xs font-weight-bold">
                                                <span class="my-2 text-xs">Sofa Yellow</span>
                                            </td>
                                            <td class="text-xs font-weight-bold">
                                                <span class="my-2 text-xs">Nội dung hay quá, nhưng còn nhiều
                                                    sạn...</span>
                                            </td>
                                            <td class="text-sm">
                                                <a href="javascript:;" class="mx-3"
                                                    data-bs-original-title="Reply Comment" data-bs-toggle="modal" data-bs-target="#exampleModalMessage">
                                                    <i class="fas fa-user-edit text-dark"></i>
                                                </a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalMessage" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalMessageTitle"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Trả Lời Bình Luận @CT</h5>
                                                                <button type="button" class="btn-close text-dark"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    <div class="form-group">
                                                                        <label for="recipient-name"
                                                                            class="col-form-label">Nội Dung:</label>
                                                                        <input type="text" class="form-control"
                                                                            value="Creative Tim" id="recipient-name">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="message-text"
                                                                            class="col-form-label">Tin Nhắn:</label>
                                                                        <textarea class="form-control"
                                                                            id="message-text"></textarea>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-white"
                                                                    data-bs-dismiss="modal">Đóng</button>
                                                                <button type="button" class="btn btn-dark">Gửi tin nhắn</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <a href="javascript:;" data-bs-toggle="tooltip"
                                                    data-bs-original-title="Delete product">
                                                    <i class="fas fa-trash text-dark"></i>
                                                </a>
                                            </td>
                                        </tr>
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
                                <a href="https://www.creative-tim.com" class="nav-link text-xs text-muted"
                                    target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link text-xs text-muted"
                                    target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-xs text-muted"
                                    target="_blank">Blog</a>
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