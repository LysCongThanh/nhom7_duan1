<!-- CONTENT -->
<div class="container-fluid py-4 px-5">
            <div class="modal-group">
                <div class="modal fade" id="form-modal-category__input" tabindex="-1" role="dialog"
                    aria-labelledby="form-modal-category__input" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                        <div class="modal-content">
                            <form action="form.html" method="post" id="form-add-category">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="form-modal-category__input-title">
                                        Danh mục sách</h6>
                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="" class="form-label">Tên danh mục</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-table"></i>
                                            </span>
                                            <input type="text" class="form-control" name="category_name"
                                                placeholder="Nhập tên danh mục">
                                        </div>
                                        <div class="form-message"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-dark">Thêm danh
                                        mục</button>
                                    <button type="button" class="btn btn-link text-dark ml-auto"
                                        data-bs-dismiss="modal">Đóng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="form-modal-author__input" tabindex="-1" role="dialog"
                    aria-labelledby="form-modal-author__input" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                        <div class="modal-content">
                            <form action="form.html" method="post" id="form-add-author">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="form-modal-author__input-title">
                                        Tác giả</h6>
                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="" class="form-label">Tên tác giả</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-pen"></i>
                                            </span>
                                            <input type="text" class="form-control" name="author_name"
                                                placeholder="Nhập tên tác giả">
                                        </div>
                                        <div class="form-message"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="form-label">Tiểu sử tác giả</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-image-portrait"></i>
                                            </span>
                                            <input type="text" class="form-control" name="author_bio"
                                                placeholder="Nhập tên danh mục">
                                        </div>
                                        <div class="form-message"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-dark">Thêm danh
                                        mục</button>
                                    <button type="button" class="btn btn-link text-dark ml-auto"
                                        data-bs-dismiss="modal">Đóng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="form-modal-publisher__input" tabindex="-1" role="dialog"
                    aria-labelledby="form-modal-publisher__input" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                        <div class="modal-content">
                            <form action="#" method="post" id="form-add-publisher">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="form-modal-publisher__input-title">
                                        Nhà xuất bản</h6>
                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="" class="form-label">Tên nhà xuất bản</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-table"></i>
                                            </span>
                                            <input type="text" class="form-control" name="publisher_name"
                                                placeholder="Nhập tên nhà xuất bản">
                                        </div>
                                        <div class="form-message"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="form-label">Địa chỉ nhà xuất bản</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-table"></i>
                                            </span>
                                            <input type="text" class="form-control" name="publisher_address"
                                                placeholder="Nhập địa chỉ nhà xuất bản">
                                        </div>
                                        <div class="form-message"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="form-label">Thông tin nhà xuất bản</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-table"></i>
                                            </span>
                                            <input type="text" class="form-control" name="publisher_contact"
                                                placeholder="Nhập thông tin nhà xuất bản">
                                        </div>
                                        <div class="form-message"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-dark">Thêm nhà xuất bản</button>
                                    <button type="button" class="btn btn-link text-dark ml-auto"
                                        data-bs-dismiss="modal">Đóng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-background card-background-after-none align-items-start mt-4 mb-5">
                        <div class="full-background"
                            style="background-image: url('../assets/img/header-blue-purple.jpg')"></div>
                        <div class="card-body text-start p-4 w-100">
                            <h3 class="text-white mb-2">Thêm sách</h3>
                            <p class="mb-4 font-weight-semibold">
                                Check all the advantages and choose the best.
                            </p>
                            <img src="../assets/img/3d-cube.png" alt="3d-cube"
                                class="position-absolute top-0 end-1 w-25 max-width-200 mt-n6 d-sm-block d-none" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <form action="#" method="post" id="form" class="content" enctype="multipart/form-data">
                        <div class="nav-tabs-navigation">
                            <div class="card card-custom card-nav-tabs">
                                <div class="card-header card-header-primary card-header-tab">
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab"
                                                        href="#tab1" role="tab" aria-controls="tab1"
                                                        aria-selected="true"><i class="fa-solid fa-book-open"></i> Thông
                                                        tin</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2"
                                                        role="tab" aria-controls="tab2" aria-selected="false">
                                                        <i class="fa-solid fa-table"></i> Phân loại</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link" id="tab3-tab" data-bs-toggle="tab" href="#tab3"
                                                        role="tab" aria-controls="tab3" aria-selected="false">
                                                        <i class="fa-regular fa-image"></i> Hình ảnh</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link" id="tab4-tab" data-bs-toggle="tab" href="#tab4"
                                                        role="tab" aria-controls="tab4" aria-selected="false">
                                                        <i class="fa-solid fa-money-bill"></i> Giá tiền</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="tab1" role="tabpanel"
                                            aria-labelledby="tab1-tab">
                                            <div class="card">
                                                <div class="card-header bg-primary text-center">
                                                    <h4 class="card-title text-light">Thông tin sách</h4>
                                                    <p class="card-category text-light">Complete your edition</p>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Tên sách</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i
                                                                            class="fa-solid fa-book"></i></span>
                                                                    <input type="text" name="name" class="form-control"
                                                                        placeholder="Nhập tên sách...">
                                                                </div>
                                                                <div class="form-message"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Mô tả ngắn</label>
                                                                <div id="sort-editor" class="sort-editor"></div>
                                                                <div class="input-group">
                                                                    <input type="hidden" name="sort-editor"
                                                                        class="form-control" id="sort_description">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Mô tả chi tiết</label>
                                                                <div id="long-editor" class="long-editor"></div>
                                                                <input type="hidden" name="long-editor"
                                                                    class="form-control" id="long_description">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="" class="form-label">ISBN</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i
                                                                            class="fa-solid fa-barcode"></i></span>
                                                                    <input type="text" class="form-control" name="sku"
                                                                        id="sku-code" placeholder="Mã vạch sách...">
                                                                    <span class="input-group-text">
                                                                        <div class="generate-sku-btn"
                                                                            onclick="generateSKU()">
                                                                            Tạo mã
                                                                        </div>
                                                                    </span>
                                                                </div>
                                                                <div class="form-message"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-label">Số lượng</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i
                                                                            class="fa-solid fa-hashtag"></i></span>
                                                                    <input type="number" min="1" class="form-control"
                                                                        name="quantity" id=""
                                                                        placeholder="Số lượng sách...">
                                                                </div>
                                                                <div class="form-message"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-label">Số trang</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i
                                                                            class="fa-regular fa-file"></i></span>
                                                                    <input type="number" min="1" class="form-control"
                                                                        name="number_pages" id=""
                                                                        placeholder="Số trang sách...">
                                                                </div>
                                                                <div class="form-message"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="" class="form-label">Kích thước</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i
                                                                            class="fa-solid fa-expand"></i></span>
                                                                    <input type="text" min="1" class="form-control"
                                                                        name="size" id=""
                                                                        placeholder="Kích thước sách...">
                                                                </div>
                                                                <div class="form-message"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                            <div class="card">
                                                <div class="card-header bg-primary text-center">
                                                    <h4 class="card-title text-light">Phân loại sách</h4>
                                                    <p class="card-category text-light">Complete your edition</p>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Danh mục</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-graduation-cap"></i>
                                                                    </span>
                                                                    <select class="form-select" name="category"
                                                                        id="category">
                                                                        <option value="" disabled selected>Chọn danh mục
                                                                            sách
                                                                        </option>
                                                                        <option value="book1">Sách 1</option>
                                                                        <option value="book2">Sách 2</option>
                                                                    </select>
                                                                    <div class="input-group-text m-0 p-0">
                                                                        <button type="button"
                                                                            class="btn-input-group btn btn-block btn-dark m-0"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#form-modal-category__input">+
                                                                            Thêm
                                                                            danh mục</button>
                                                                    </div>
                                                                </div>
                                                                <div class="form-message"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Tác giả</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i
                                                                            class="fa-solid fa-feather"></i></span>
                                                                    <select class="form-select" name="author"
                                                                        id="category">
                                                                        <option value="" disabled selected>Chọn tác giả
                                                                        </option>
                                                                        <option value="book1">Sách 1</option>
                                                                        <option value="book2">Sách 2</option>
                                                                    </select>
                                                                    <div class="input-group-text m-0 p-0">
                                                                        <button type="button"
                                                                            class="btn-input-group btn btn-block btn-dark m-0"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#form-modal-author__input">+
                                                                            Thêm
                                                                            tác giả</button>
                                                                    </div>
                                                                </div>
                                                                <div class="form-message"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Nhà xuất bản</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i
                                                                            class="fa-solid fa-print"></i></span>
                                                                    <select class="form-select" name="publisher"
                                                                        id="publisher">
                                                                        <option value="" disabled selected>Chọn nhà xuất
                                                                            bản
                                                                        </option>
                                                                        <option value="book1">Sách 1</option>
                                                                        <option value="book2">Sách 2</option>
                                                                    </select>
                                                                    <div class="input-group-text m-0 p-0">
                                                                        <button type="button"
                                                                            class="btn-input-group btn btn-block btn-dark m-0"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#form-modal-publisher__input">+
                                                                            Thêm
                                                                            nhà xuất bản</button>
                                                                    </div>
                                                                </div>
                                                                <div class="form-message"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Ngày xuất bản</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i
                                                                            class="fa-solid fa-calendar-days"></i></span>
                                                                    <input type="date" name="date_publication"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="form-message"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                                            <div class="card">
                                                <div class="card-header bg-primary text-center">
                                                    <h4 class="card-title text-light">Hình ảnh</h4>
                                                    <p class="card-category text-light">Complete your edition</p>
                                                </div>
                                                <div class="card-body">
                                                    <div class="dropzone text-center form-group" id="image-dropzone">
                                                        <div class="fallback">
                                                            <div class="input-group">
                                                                <input id="hidden-image-input" name="image"
                                                                    type="file" />
                                                            </div>
                                                            <div class="form-message" id="image-error-message"></div>
                                                        </div>
                                                    </div>
                                                    <div class="dropzone text-center form-group"
                                                        id="album-images-dropzone">
                                                        <div class="fallback">
                                                            <div class="input-group">
                                                                <input name="album_images" type="file" multiple />
                                                            </div>
                                                        </div>
                                                        <div class="form-message"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
                                            <div class="card">
                                                <div class="card-header bg-primary text-center">
                                                    <h4 class="card-title text-light">Giá</h4>
                                                    <p class="card-category text-light">Complete your edition</p>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Giá sách</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i
                                                                            class="fa-solid fa-dollar-sign"></i></span>
                                                                    <input type="text" name="price" class="form-control"
                                                                        placeholder="Nhập giá sách...">
                                                                </div>
                                                                <div class="form-message"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Giảm giá</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i
                                                                            class="fa-solid fa-tag"></i></span>
                                                                    <input type="text" name="sale_price"
                                                                        class="form-control"
                                                                        placeholder="Nhập giảm giá...">
                                                                </div>
                                                                <div class="form-message"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="my-3 btn btn-dark">+ Thêm sách</button>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>

            <footer class="footer pt-3  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-xs text-muted text-lg-start">
                                Copyright
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>
                                Corporate UI by
                                <a href="https://www.creative-tim.com" class="text-secondary" target="_blank">Creative
                                    Tim</a>.
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com" class="nav-link text-xs text-muted"
                                        target="_blank">Creative
                                        Tim</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/presentation"
                                        class="nav-link text-xs text-muted" target="_blank">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/blog" class="nav-link text-xs text-muted"
                                        target="_blank">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/license"
                                        class="nav-link text-xs pe-0 text-muted" target="_blank">License</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- END CONTENT -->