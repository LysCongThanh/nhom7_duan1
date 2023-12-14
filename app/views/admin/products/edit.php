<script>
    let shortDescription = `<?= html_entity_decode($product['describe_short']) ?>`;
    let longDescription = `<?= html_entity_decode($product['describe_long']) ?>`;
    let imagesOfProduct = {
        imageMain: <?= json_encode($imageMain) ?>,
        albumImages: <?= json_encode($albumImages) ?>,
    }
</script>

<div class="px-5 py-4 container-fluid">
    <div class="modal-group">
        <!--        Form add category-->
        <div class="modal fade" id="form-modal-category__input" tabindex="-1" role="dialog" aria-labelledby="form-modal-category__input" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                    <form action="{{_WEB_ROOT}}classify/add_category" method="post" id="form-add-category">
                        <div class="modal-header">
                            <h6 class="modal-title" id="form-modal-category-title">
                                Danh mục sách</h6>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
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
                                    <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục">
                                </div>
                                <div class="form-message"></div>
                            </div>

                            <div class="form-group">
                                <label for="">Trạng thái</label>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <span><i class="far fa-heart"></i></span>
                                    </div>
                                    <select class="form-select" name="status">
                                        <option value="" disabled selected>Chọn trạng thái !</option>
                                        <option value="Hiện">Hiện</option>
                                        <option value="Ẩn">Ẩn</option>
                                    </select>
                                </div>
                                <div class="form-message"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-dark">Thêm danh
                                mục</button>
                            <button type="button" class="btn btn-link text-dark ml-auto" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--        Form add author-->
        <div class="modal fade" id="form-modal-author__input" tabindex="-1" role="dialog" aria-labelledby="form-modal-author__input" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                    <form action="classify/add_author" method="post" id="form-add-author">
                        <div class="modal-header">
                            <h6 class="modal-title" id="form-modal-author__input-title">
                                Tác giả</h6>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
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
                                    <input type="text" class="form-control" name="name" placeholder="Nhập tên tác giả">
                                </div>
                                <div class="form-message"></div>
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Tiểu sử tác giả</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-image-portrait"></i>
                                    </span>
                                    <input type="text" class="form-control" name="bio" placeholder="Nhập tên danh mục">
                                </div>
                                <div class="form-message"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-dark">Thêm danh
                                mục</button>
                            <button type="button" class="btn btn-link text-dark ml-auto" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--        Form add publisher-->
        <div class="modal fade" id="form-modal-publisher__input" tabindex="-1" role="dialog" aria-labelledby="form-modal-publisher__input" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                    <form action="classify/add_publisher" method="post" id="form-add-publisher">
                        <div class="modal-header">
                            <h6 class="modal-title" id="form-modal-publisher__input-title">
                                Nhà xuất bản</h6>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
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
                                    <input type="text" class="form-control" name="name" placeholder="Nhập tên nhà xuất bản">
                                </div>
                                <div class="form-message"></div>
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Địa chỉ nhà xuất bản</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-table"></i>
                                    </span>
                                    <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ nhà xuất bản">
                                </div>
                                <div class="form-message"></div>
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Thông tin nhà xuất bản</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-table"></i>
                                    </span>
                                    <input type="text" class="form-control" name="contact" placeholder="Nhập thông tin nhà xuất bản">
                                </div>
                                <div class="form-message"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-dark">Thêm nhà xuất bản</button>
                            <button type="button" class="btn btn-link text-dark ml-auto" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>

    <!--    // FORM EDIT PRODUCT // --------------------------------------->
    <form action="product/update" method="post" id="form-edit-product" enctype="multipart/form-data">
        <div class="mt-10 row">
            <div class="col-lg-6">
                <h4>Thực hiện các thay đổi bên dưới</h4>
                <p>We’re constantly trying to express ourselves and actualize our dreams. If you have the
                    Chúng tôi không ngừng cố gắng thể hiện bản thân và hiện thực hóa ước mơ của mình. Nếu có cơ
                    hội
                    chơi.</p>
            </div>
            <div class="text-right col-lg-6 d-flex flex-column justify-content-center">
                <button type="submit" class="mt-2 mb-0 btn btn-dark ms-lg-auto me-lg-0 me-auto mt-lg-0">
                    <svg class="me-1" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.39341 7.20504C5.12004 6.93167 4.67683 6.93167 4.40346 7.20504C4.1301 7.47839 4.1301 7.92163 4.40346 8.19498L6.50346 10.295C6.77683 10.5683 7.22006 10.5683 7.49341 10.295L9.59341 8.19498C9.86676 7.92163 9.86676 7.47839 9.59341 7.20504C9.32006 6.93167 8.87682 6.93167 8.60347 7.20504L7.69844 8.11007V4.20001H11.1984C11.9717 4.20001 12.5984 4.82681 12.5984 5.60001V10.5C12.5984 11.2732 11.9717 11.9 11.1984 11.9H2.79844C2.02524 11.9 1.39844 11.2732 1.39844 10.5V5.60001C1.39844 4.82681 2.02524 4.20001 2.79844 4.20001H6.29844V8.11007L5.39341 7.20504Z" fill="#F9FAFB" />
                        <path d="M6.30078 2.79998C6.30078 2.41338 6.61419 2.09998 7.00078 2.09998C7.38739 2.09998 7.70078 2.41338 7.70078 2.79998V4.19998H6.30078V2.79998Z" fill="#F9FAFB" />
                    </svg>
                    Save
                </button>
            </div>
        </div>
        <hr class="horizontal dark">
        <div class="mt-4 row">
            <div class="col-lg-4">
                <div class="card card-plain pe-lg-10">
                    <h5 class="font-weight-semibold">Thông tin sách</h5>
                    <p class="text-sm">Chúng tôi sẽ ghi có vào tài khoản của bạn nếu bạn cần hạ cấp trong chu kỳ
                        thanh toán.
                    </p>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card is-shadow">
                    <div class="card-body">
                        <h5 class="font-weight-bolder">Thông tin sách</h5>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Tên sách</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-book"></i></span>
                                        <input type="text" name="name" class="form-control" placeholder="Nhập tên sách..." value="{{$product['book_name']}}">
                                    </div>
                                    <div class="form-message"></div>
                                </div>
                            </div>
                            <div class="mt-3 col-12 col-sm-6 mt-sm-0">
                                <div class="form-group">
                                    <label for="" class="form-label">Số lượng</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-hashtag"></i></span>
                                        <input type="number" min="1" class="form-control" name="quantity" id="" placeholder="Số lượng sách..." value="{{$product['quantity_inventory']}}">
                                    </div>
                                    <div class="form-message"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">

                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Số trang</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-regular fa-file"></i></span>
                                        <input type="number" min="1" class="form-control" name="number_pages" id="" placeholder="Số trang sách..." value="{{$product['num_page']}}">
                                    </div>
                                    <div class="form-message"></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Kích thước</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-expand"></i></span>
                                        <input type="text" min="1" class="form-control" name="size" id="" placeholder="Kích thước sách..." value="{{$product['size']}}">
                                    </div>
                                    <div class="form-message"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 h-100">
                                <div class="">
                                    <label class="mt-4">Mô Tả Ngắn</label>
                                    <p class="text-xs form-text text-muted ms-1 d-inline">
                                        (không bắt buộc)
                                    </p>
                                    <div id="sort-editor" class="sort-editor"></div>
                                    <div class="input-group">
                                        <input type="hidden" name="sort-editor" class="form-control" id="sort_description">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 h-100">
                                <div class="">
                                    <label class="mt-4">Mô tả chi tiết</label>
                                    <p class="text-xs form-text text-muted ms-1 d-inline">
                                        (không bắt buộc)
                                    </p>
                                    <div id="long-editor" class="long-editor"></div>
                                    <div class="input-group">
                                        <input type="hidden" name="long-editor" class="form-control" id="long_description">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 row">
            <div class="col-lg-4">
                <div class="card card-plain pe-lg-10">
                    <h5 class="font-weight-semibold">Phân loại sản phẩm</h5>
                    <p class="text-sm">Chúng tôi sẽ ghi có vào tài khoản của bạn nếu bạn cần hạ cấp trong chu kỳ
                        thanh toán.
                    </p>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card h-100 is-shadow">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="col-6">
                                <h5 class="font-weight-bolder">Phân loại</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Danh mục</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-graduation-cap"></i>
                                        </span>
                                        <select class="form-select" name="category" id="category">
                                            <option disabled selected>Vui lòng chọn danh mục</option>
                                            @foreach($categories as $category)
                                            <option @if($category['id']===$product['category_id']) selected @endif value="{{$category['id']}}">{{$category['name']}}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-text m-0 p-0">
                                            <button type="button" class="btn-input-group btn btn-block btn-dark m-0" data-bs-toggle="modal" data-bs-target="#form-modal-category__input">+
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
                                        <span class="input-group-text"><i class="fa-solid fa-feather"></i></span>
                                        <select class="form-select" name="author" id="author">
                                            <option disabled selected>Vui lòng chọn tác giả</option>
                                            @foreach($authors as $author)
                                            <option @if($author['id']===$product['author_id']) selected @endif value="{{$author['id']}}">{{$author['name']}}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-text m-0 p-0">
                                            <button type="button" class="btn-input-group btn btn-block btn-dark m-0" data-bs-toggle="modal" data-bs-target="#form-modal-author__input">+
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
                                        <span class="input-group-text"><i class="fa-solid fa-print"></i></span>
                                        <select class="form-select" name="publisher" id="publisher">
                                            <option disabled selected>Vui lòng chọn nhà xuất bản</option>
                                            @foreach($publishers as $publisher)
                                            <option @if($publisher['id']===$product['publisher_id']) selected @endif value="{{$publisher['id']}}">{{$publisher['name']}}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-text m-0 p-0">
                                            <button type="button" class="btn-input-group btn btn-block btn-dark m-0" data-bs-toggle="modal" data-bs-target="#form-modal-publisher__input">+
                                                Thêm
                                                nhà xuất bản</button>
                                        </div>
                                    </div>
                                    <div class="form-message"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="id">
        <div class="mt-4 row">
            <div class="col-lg-4">
                <div class="card card-plain pe-lg-10">
                    <h5 class="font-weight-semibold">Về Giá</h5>
                    <p class="text-sm">Chúng tôi sẽ ghi có vào tài khoản của bạn nếu bạn cần hạ cấp trong chu kỳ
                        thanh toán.
                    </p>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card is-shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex align-items-center">
                                <div class="col-6">
                                    <h5 class="font-weight-bolder">Giá</h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Giá sách</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-dollar-sign"></i></span>
                                        <input type="text" name="price" class="form-control" placeholder="Nhập giá sách..." value="{{$product['price']}}">
                                    </div>
                                    <div class="form-message"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Giảm giá</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-tag"></i></span>
                                        <input type="text" name="sale_price" class="form-control" placeholder="Nhập giảm giá..." value="{{$product['discount_price']}}">
                                    </div>
                                    <div class="form-message"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 row">
            <div class="col-lg-4">
                <div class="card card-plain pe-lg-10 is-shadow">
                    <h5 class="font-weight-semibold">Hình ảnh</h5>
                    <p class="text-sm">Chúng tôi sẽ ghi có vào tài khoản của bạn nếu bạn cần hạ cấp trong chu kỳ
                        thanh toán.
                    </p>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card h-100 is-shadow">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="col-6">
                                <h5 class="font-weight-bolder">Ảnh Sản Phẩm</h5>
                            </div>
                            <div class="col-lg-6 text-end">
                                <button class="mb-0 btn btn-dark btn-sm" type="button" name="button" data-bs-toggle="modal" data-bs-target="#editImage">
                                    <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.50816 3.01006C10.0549 2.46332 10.9413 2.46332 11.488 3.01006C12.0348 3.55679 12.0348 4.44322 11.488 4.98995L10.933 5.54498L8.95312 3.56508L9.50816 3.01006Z" fill="#F9FAFB" />
                                        <path d="M7.96665 4.55502L2.10156 10.4201V12.4H4.08146L9.94653 6.53492L7.96665 4.55502Z" fill="#F9FAFB" />
                                    </svg>
                                    Sửa
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="editImage" tabindex="-1" role="dialog" aria-labelledby="editImageTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-upload-image-custom-width modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa hình ảnh</h5>
                                                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="">
                                                    <div class="dropzone text-center" id="image-dropzone">
                                                    </div>
                                                    <div class="dropzone text-center" id="album-images-dropzone">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button id="cancelBtn" type="button" class="btn btn-white" data-bs-dismiss="modal">Hủy</button>
                                                <button id="updateBtn" type="button" class="btn btn-dark">Cập nhật</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal -->
                            </div>
                        </div>

                        <div class="row my-images">
                            <div class="col-12">
                                @if($imageMain != false)
                                <img class="mt-3 shadow-lg w-100 border-radius-lg" src="{{_WEB_ROOT}}/{{$imageMain['slug']}}" alt="product_image">
                                @endif
                                @if($imageMain === false)
                                <p class="text-danger text-center">Trống !</p>
                                @endif
                            </div>
                            <div class="mt-4 col-12">
                            </div>
                        </div>
                        <div class="row my-images">
                            <div class="col-md-12">
                                <div class="pt-2 mt-4 my-gallery d-flex justify-content-between align-items-center" itemscope itemtype="http://schema.org/ImageGallery">
                                    @if($albumImages != false)
                                    @foreach ($albumImages as $image)
                                    <figure class="gallery-item" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                        <a href="<?= _WEB_ROOT ?>/{{$image['slug']}}" itemprop="contentUrl" data-size="600x600" data-lightbox="gallery">
                                            <img class="shadow max-height-100 border-radius-lg img-fluid" src="<?= _WEB_ROOT ?>/{{$image['slug']}}" alt="Image description" />
                                        </a>
                                    </figure>
                                    @endforeach
                                    @endif
                                    @if($albumImages === false)
                                    <p class="text-danger text-center">Album Trống !</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

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