<div class="px-5 py-4 container-fluid">
    <?= show_message('<div id="alert" class="alert bg-gradient-primary alert-dismissible text-sm  text-white  fade show" role="alert">
    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-text"><strong>', '</strong></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>') ?>
    <!-- Add modal group -->
    <div class="add-modal-group">
        <!-- Form add category -->
        <div class="modal fade" id="form-modal-add-category" tabindex="-1" role="dialog" aria-labelledby="form-modal-add-category" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                    <!-- Form here -->
                    <form action="classify/add_category" method="post" id="form-add-category">
                        <div class="modal-header">
                            <h6 class="modal-title" id="form-modal-add-category-title">
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
        <!-- form add author -->
        <div class="modal fade" id="form-modal-add-author" tabindex="-1" role="dialog" aria-labelledby="form-modal-add-author" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                    <form action="classify/add_author" method="post" id="form-add-author">
                        <div class="modal-header">
                            <h6 class="modal-title" id="form-modal-add-author-title">
                                Thêm tác giả</h6>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="" class="form-label">Tên tác giả</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-table"></i>
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
                                    <input type="text" class="form-control" name="bio" placeholder="Nhập tên tiểu sử">
                                </div>
                                <div class="form-message"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-dark">Thêm tác giả</button>
                            <button type="button" class="btn btn-link text-dark ml-auto" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Form add publisher -->
        <div class="modal fade" id="form-modal-add-publisher" tabindex="-1" role="dialog" aria-labelledby="form-modal-add-publisher" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                    <form action="classify/add_publisher" method="post" id="form-add-publisher">
                        <div class="modal-header">
                            <h6 class="modal-title" id="form-modal-add-author-title">
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

    <!-- Edit modal group -->
    <div class="edit-modal-group">
<!--        Edit Category-->
        @foreach($categories as $category)
        <div class="modal fade" id="category-edit_{{$category['id']}}" tabindex="-1" role="dialog" aria-labelledby="form-modal-edit-category" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                    <!-- Form here -->
                    <form action="classify/edit_category" method="post" id="form-edit-category_{{$category['id']}}">
                        <div class="modal-header">
                            <h6 class="modal-title" id="form-modal-add-category-title">
                                Sửa danh mục</h6>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{$category['id']}}">
                            <div class="form-group">
                                <label for="" class="form-label">Tên danh mục</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-table"></i>
                                    </span>
                                    <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục" value="{{$category['name']}}">
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
                                        <option value="" disabled>Chọn trạng thái !</option>
                                        <option value="Hiện" @if(@category['status'] === 'Hiện') selected @endif >Hiện</option>
                                        <option value="Ẩn" @if(@category['status'] === 'Ẩn') selected @endif >Ẩn</option>
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
        @endforeach

<!--        Edit Author-->
        @foreach($authors as $author)
        <div class="modal fade" id="author-edit_{{$author['id']}}" tabindex="-1" role="dialog" aria-labelledby="form-modal-edit-author" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                    <form action="classify/edit_author" method="post" id="form-edit-author_{{$author['id']}}">
                        <div class="modal-header">
                            <h6 class="modal-title" id="form-modal-add-author-title">
                                Sửa tác giả</h6>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{$author['id']}}">
                            <div class="form-group">
                                <label for="" class="form-label">Tên tác giả</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-table"></i>
                                    </span>
                                    <input type="text" class="form-control" name="name" value="{{$author['name']}}" placeholder="Nhập tên tác giả">
                                </div>
                                <div class="form-message"></div>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Tiểu sử tác giả</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-image-portrait"></i>
                                    </span>
                                    <input type="text" class="form-control" name="bio" value="{{$author['bio']}}" placeholder="Nhập tên tiểu sử">
                                </div>
                                <div class="form-message"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-dark">Thêm tác giả</button>
                            <button type="button" class="btn btn-link text-dark ml-auto" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach

        @foreach($publishers as $publisher)
        <div class="modal fade" id="publisher-edit_{{$publisher['id']}}" tabindex="-1" role="dialog" aria-labelledby="form-modal-edit-publisher" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                    <form action="classify/edit_publisher" method="post" id="form-edit-author">
                        <div class="modal-header">
                            <h6 class="modal-title" id="form-modal-add-author-title">
                                Sửa nhà xuất bản</h6>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{$publisher['id']}}">
                            <div class="form-group">
                                <label for="" class="form-label">Tên nhà xuất bản</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-table"></i>
                                    </span>
                                    <input type="text" class="form-control" name="name" value="{{$publisher['name']}}" placeholder="Nhập tên nhà xuất bản">
                                </div>
                                <div class="form-message"></div>
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Địa chỉ nhà xuất bản</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-table"></i>
                                    </span>
                                    <input type="text" class="form-control" name="address" value="{{$publisher['address']}}" placeholder="Nhập địa chỉ nhà xuất bản">
                                </div>
                                <div class="form-message"></div>
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Thông tin nhà xuất bản</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-table"></i>
                                    </span>
                                    <input type="text" class="form-control" name="contact" value="{{$publisher['contact']}}" placeholder="Nhập thông tin nhà xuất bản">
                                </div>
                                <div class="form-message"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-dark">Sửa nhà xuất bản</button>
                            <button type="button" class="btn btn-link text-dark ml-auto" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Delete modal group -->
    <div class="delete-modal-group">
        @foreach($categories as $category)
        <div class="modal fade" id="category-detail_{{$category['id_category']}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="form-modal-add-category-title">
                            Chi tiết danh mục</h6>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-danger">* Bạn có chắc muốn xóa danh mục này ?</p>
                        <ul class="list-group">
                            <li class="list-group-item"><span class="fw-bold">Tên danh mục: </span>{{$category['name_category']}}</li>
                            <li class="list-group-item"><span class="fw-bold">Trạng thái: </span>{{$category['status']}}</li>
                            <li class="list-group-item"><span class="fw-bold">Ngày tạo: </span>{{$category['date_created']}}</li>
                            <li class="list-group-item"><span class="fw-bold">Cập nhật lần cuối: </span>{{$category['date_updated']}}</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <form method="post" class="m-0 p-0" action="/categories/delete">
                            <input type="hidden" name="id_category" value="{{$category['id_category']}}">
                            <button type="submit" class="btn btn-link bg-warning text-dark ml-auto">Xóa</button>
                        </form>
                        <button type="button" class="btn btn-link text-dark ml-auto" data-bs-dismiss="modal">Đóng</button>
                    </div>
                    <!-- Form here -->
                </div>
            </div>
        </div>
        @endforeach

        @foreach($authors as $athor)
        <div class="modal fade" id="category-detail_{{$category['id_category']}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="form-modal-add-category-title">
                            Xóa tác giả</h6>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-danger">* Bạn có chắc muốn xóa tác giả này ?</p>
                        <ul class="list-group">
                            <li class="list-group-item"><span class="fw-bold">Tên tác giả: </span>{{$author['name']}}</li>
                            <li class="list-group-item"><span class="fw-bold">Trạng thái: </span>{{$category['bio']}}</li>
                            <li class="list-group-item"><span class="fw-bold">Ngày tạo: </span>{{$category['date_created']}}</li>
                            <li class="list-group-item"><span class="fw-bold">Cập nhật lần cuối: </span>{{$category['date_updated']}}</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <form method="post" class="m-0 p-0" action="/categories/delete">
                            <input type="hidden" name="id_category" value="{{$category['id_category']}}">
                            <button type="submit" class="btn btn-link bg-warning text-dark ml-auto">Xóa</button>
                        </form>
                        <button type="button" class="btn btn-link text-dark ml-auto" data-bs-dismiss="modal">Đóng</button>
                    </div>
                    <!-- Form here -->
                </div>
            </div>
        </div>
        @endforeach

        @foreach($categories as $category)
        <div class="modal fade" id="category-detail_{{$category['id_category']}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="form-modal-add-category-title">
                            Chi tiết danh mục</h6>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-danger">* Bạn có chắc muốn xóa danh mục này ?</p>
                        <ul class="list-group">
                            <li class="list-group-item"><span class="fw-bold">Tên danh mục: </span>{{$category['name_category']}}</li>
                            <li class="list-group-item"><span class="fw-bold">Trạng thái: </span>{{$category['status']}}</li>
                            <li class="list-group-item"><span class="fw-bold">Ngày tạo: </span>{{$category['date_created']}}</li>
                            <li class="list-group-item"><span class="fw-bold">Cập nhật lần cuối: </span>{{$category['date_updated']}}</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <form method="post" class="m-0 p-0" action="/categories/delete">
                            <input type="hidden" name="id_category" value="{{$category['id_category']}}">
                            <button type="submit" class="btn btn-link bg-warning text-dark ml-auto">Xóa</button>
                        </form>
                        <button type="button" class="btn btn-link text-dark ml-auto" data-bs-dismiss="modal">Đóng</button>
                    </div>
                    <!-- Form here -->
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-4 row">
        <div class="col-12">
            <div class="card">
                <img src="<?= _WEB_ROOT ?>/public/assets/admin/img/header-orange-purple.jpeg" alt="pattern-lines" class="top-0 rounded-2 position-absolute start-0 w-100 h-100">
                <div class="px-4 bg-cover card-body z-index-1">
                    <div class="row">
                        <div class="col-lg-8 col-12">
                            <h3 class="text-white">Phân loại</h3>
                            <p class="mb-4 text-white">Xem tất cả danh sách các loại sách</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--    List categories-->
    <div class="mt-4 row">
        <div class="col-12">
            <div class="card">

                <div class="pb-0 card-header">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Tất Cả danh mục</h5>
                            <p class="mb-0 text-sm">
                                Liệt danh mục của sách...
                            </p>
                        </div>
                        <div class="my-auto mt-4 ms-auto mt-lg-0">
                            <div class="my-auto ms-auto">
                                <button type="button" class="btn-input-group btn btn-block btn-dark m-0" data-bs-toggle="modal" data-bs-target="#form-modal-add-category">+
                                    Thêm
                                    danh mục</button>
                                <button type="button" class="me-2 mb-0 btn btn-white" data-bs-toggle="modal" data-bs-target="#import">
                                    <svg width="14" height="15" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3 17.5C3 16.9477 3.44772 16.5 4 16.5H16C16.5523 16.5 17 16.9477 17 17.5C17 18.0523 16.5523 18.5 16 18.5H4C3.44772 18.5 3 18.0523 3 17.5ZM6.29289 9.79289C6.68342 9.40237 7.31658 9.40237 7.70711 9.79289L9 11.0858V3.5C9 2.94772 9.44771 2.5 10 2.5C10.5523 2.5 11 2.94771 11 3.5V11.0858L12.2929 9.79289C12.6834 9.40237 13.3166 9.40237 13.7071 9.79289C14.0976 10.1834 14.0976 10.8166 13.7071 11.2071L10.7071 14.2071C10.5196 14.3946 10.2652 14.5 10 14.5C9.73478 14.5 9.48043 14.3946 9.29289 14.2071L6.29289 11.2071C5.90237 10.8166 5.90237 10.1834 6.29289 9.79289Z" fill="#111827" />
                                    </svg>Import
                                </button>
                                <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog mt-lg-10">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ModalLabel">Import CSV</h5>
                                                <i class="fas fa-upload ms-3"></i>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>You can browse your computer for a file.</p>
                                                <input type="text" placeholder="Browse file..." class="mb-3 form-control">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value id="importCheck" checked>
                                                    <label class="custom-control-label" for="importCheck">I
                                                        accept the terms and conditions</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-white btn-sm" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-dark btn-sm">Upload</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="mt-1 mb-0 btn btn-white export mt-sm-0" data-type="csv" type="button" name="button">
                                    <svg width="14" height="15" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3 17.5C3 16.9477 3.44772 16.5 4 16.5H16C16.5523 16.5 17 16.9477 17 17.5C17 18.0523 16.5523 18.5 16 18.5H4C3.44772 18.5 3 18.0523 3 17.5ZM6.29289 7.20711C5.90237 6.81658 5.90237 6.18342 6.29289 5.79289L9.29289 2.79289C9.48043 2.60536 9.73478 2.5 10 2.5C10.2652 2.5 10.5196 2.60536 10.7071 2.79289L13.7071 5.79289C14.0976 6.18342 14.0976 6.81658 13.7071 7.20711C13.3166 7.59763 12.6834 7.59763 12.2929 7.20711L11 5.91421V13.5C11 14.0523 10.5523 14.5 10 14.5C9.44771 14.5 9 14.0523 9 13.5V5.91421L7.70711 7.20711C7.31658 7.59763 6.68342 7.59763 6.29289 7.20711Z" fill="#111827" />
                                    </svg>Export
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-0 pb-0 card-body">
                    <div class="table-responsive">
                        <table class="table table-flush" id="categories-list">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-xs">Danh mục</th>
                                    <th class="text-xs">Trạng thái</th>
                                    <th class="text-xs">Ngày tạo</th>
                                    <th class="text-xs">Ngày cập nhật</th>
                                    <th class="text-xs">Lựa Chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <div class="my-auto form-check">
                                                <input class="form-check-input" type="checkbox" id="customCheck1" checked>
                                            </div>
                                            <img class="avatar avatar-md ms-3" src="<?= _WEB_ROOT ?>/public/assets/admin/img/spacejoy-NpF_OYE301E-unsplash.jpg" alt="sofa">
                                            <h6 class="my-auto ms-3">{{$category['name']}}</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-danger badge-sm">{{$category['status']}}</span>
                                    </td>
                                    <td class="text-sm">{{$category['created_at']}}</td>
                                    <td class="text-sm">{{$category['updated_at']}}</td>
                                    <td class="text-sm">
                                        <a href="" class="me-3" data-bs-toggle="modal" data-bs-target="#category-edit_{{$category['id']}}">
                                            <i class="fas fa-user-edit text-dark"></i>
                                        </a>
                                        <a href data-bs-toggle="modal" data-bs-target="#category-delete_{{$category['id']}}">
                                            <i class="fas fa-trash text-dark"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Danh mục</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày cập nhật</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--    List authors-->
    <div class="mt-4 row">
        <div class="col-12">
            <div class="card">

                <div class="pb-0 card-header">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Danh sách tác giả</h5>
                            <p class="mb-0 text-sm">
                                Liệt kê tác giả của sách...
                            </p>
                        </div>
                        <div class="my-auto mt-4 ms-auto mt-lg-0">
                            <div class="my-auto ms-auto">
                                <button type="button" class="btn-input-group btn btn-block btn-dark m-0" data-bs-toggle="modal" data-bs-target="#form-modal-add-author">+
                                    Thêm
                                    tác giả</button>
                                <button type="button" class="me-2 mb-0 btn btn-white" data-bs-toggle="modal" data-bs-target="#import">
                                    <svg width="14" height="15" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3 17.5C3 16.9477 3.44772 16.5 4 16.5H16C16.5523 16.5 17 16.9477 17 17.5C17 18.0523 16.5523 18.5 16 18.5H4C3.44772 18.5 3 18.0523 3 17.5ZM6.29289 9.79289C6.68342 9.40237 7.31658 9.40237 7.70711 9.79289L9 11.0858V3.5C9 2.94772 9.44771 2.5 10 2.5C10.5523 2.5 11 2.94771 11 3.5V11.0858L12.2929 9.79289C12.6834 9.40237 13.3166 9.40237 13.7071 9.79289C14.0976 10.1834 14.0976 10.8166 13.7071 11.2071L10.7071 14.2071C10.5196 14.3946 10.2652 14.5 10 14.5C9.73478 14.5 9.48043 14.3946 9.29289 14.2071L6.29289 11.2071C5.90237 10.8166 5.90237 10.1834 6.29289 9.79289Z" fill="#111827" />
                                    </svg>Import
                                </button>
                                <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog mt-lg-10">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ModalLabel">Import CSV</h5>
                                                <i class="fas fa-upload ms-3"></i>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>You can browse your computer for a file.</p>
                                                <input type="text" placeholder="Browse file..." class="mb-3 form-control">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value id="importCheck" checked>
                                                    <label class="custom-control-label" for="importCheck">I
                                                        accept the terms and conditions</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-white btn-sm" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-dark btn-sm">Upload</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="mt-1 mb-0 btn btn-white export mt-sm-0" data-type="csv" type="button" name="button">
                                    <svg width="14" height="15" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3 17.5C3 16.9477 3.44772 16.5 4 16.5H16C16.5523 16.5 17 16.9477 17 17.5C17 18.0523 16.5523 18.5 16 18.5H4C3.44772 18.5 3 18.0523 3 17.5ZM6.29289 7.20711C5.90237 6.81658 5.90237 6.18342 6.29289 5.79289L9.29289 2.79289C9.48043 2.60536 9.73478 2.5 10 2.5C10.2652 2.5 10.5196 2.60536 10.7071 2.79289L13.7071 5.79289C14.0976 6.18342 14.0976 6.81658 13.7071 7.20711C13.3166 7.59763 12.6834 7.59763 12.2929 7.20711L11 5.91421V13.5C11 14.0523 10.5523 14.5 10 14.5C9.44771 14.5 9 14.0523 9 13.5V5.91421L7.70711 7.20711C7.31658 7.59763 6.68342 7.59763 6.29289 7.20711Z" fill="#111827" />
                                    </svg>Export
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-0 pb-0 card-body">
                    <div class="table-responsive">
                        <table class="table table-flush" id="authors-list">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-xs">Tác giả</th>
                                    <th class="text-xs">Tiểu sử</th>
                                    <th class="text-xs">Ngày tạo</th>
                                    <th class="text-xs">Ngày cập nhật</th>
                                    <th class="text-xs">Lựa Chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($authors as $author)
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <div class="my-auto form-check">
                                                <input class="form-check-input" type="checkbox" id="customCheck1" checked>
                                            </div>
                                            <img class="avatar avatar-md ms-3" src="<?= _WEB_ROOT ?>/public/assets/admin/img/spacejoy-NpF_OYE301E-unsplash.jpg" alt="sofa">
                                            <h6 class="my-auto ms-3">{{$author['name']}}</h6>
                                        </div>
                                    </td>
                                    <td class="text-sm text-truncate">{{$author['bio']}}</td>
                                    <td class="text-sm">{{$author['created_at']}}</td>
                                    <td class="text-sm">{{$author['updated_at']}}</td>
                                    <td class="text-sm">
                                        <a href="" data-bs-toggle="modal" data-bs-target="#author-detail_{{$author['id']}}">
                                            <i class="fas fa-eye text-dark"></i>
                                        </a>
                                        <a href="" class="mx-3" data-bs-toggle="modal" data-bs-target="#author-edit_{{$author['id']}}">
                                            <i class="fas fa-user-edit text-dark"></i>
                                        </a>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#author-delete_{{$author['id']}}">
                                            <i class="fas fa-trash text-dark"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Tác giả</th>
                                    <th>Tiểu sử</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày cập nhật</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--    List publishers-->
    <div class="mt-4 row">
        <div class="col-12">
            <div class="card">

                <div class="pb-0 card-header">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Danh sách nhà xuất bản</h5>
                            <p class="mb-0 text-sm">
                                Liệt kê các nhà xuất bản...
                            </p>
                        </div>
                        <div class="my-auto mt-4 ms-auto mt-lg-0">
                            <div class="my-auto ms-auto">
                                <button type="button" class="btn-input-group btn btn-block btn-dark m-0" data-bs-toggle="modal" data-bs-target="#form-modal-add-publisher">+
                                    Thêm
                                    nhà xuất bản</button>
                                <button type="button" class="me-2 mb-0 btn btn-white" data-bs-toggle="modal" data-bs-target="#import">
                                    <svg width="14" height="15" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3 17.5C3 16.9477 3.44772 16.5 4 16.5H16C16.5523 16.5 17 16.9477 17 17.5C17 18.0523 16.5523 18.5 16 18.5H4C3.44772 18.5 3 18.0523 3 17.5ZM6.29289 9.79289C6.68342 9.40237 7.31658 9.40237 7.70711 9.79289L9 11.0858V3.5C9 2.94772 9.44771 2.5 10 2.5C10.5523 2.5 11 2.94771 11 3.5V11.0858L12.2929 9.79289C12.6834 9.40237 13.3166 9.40237 13.7071 9.79289C14.0976 10.1834 14.0976 10.8166 13.7071 11.2071L10.7071 14.2071C10.5196 14.3946 10.2652 14.5 10 14.5C9.73478 14.5 9.48043 14.3946 9.29289 14.2071L6.29289 11.2071C5.90237 10.8166 5.90237 10.1834 6.29289 9.79289Z" fill="#111827" />
                                    </svg>Import
                                </button>
                                <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog mt-lg-10">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ModalLabel">Import CSV</h5>
                                                <i class="fas fa-upload ms-3"></i>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>You can browse your computer for a file.</p>
                                                <input type="text" placeholder="Browse file..." class="mb-3 form-control">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value id="importCheck" checked>
                                                    <label class="custom-control-label" for="importCheck">I
                                                        accept the terms and conditions</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-white btn-sm" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-dark btn-sm">Upload</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="mt-1 mb-0 btn btn-white export mt-sm-0" data-type="csv" type="button" name="button">
                                    <svg width="14" height="15" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3 17.5C3 16.9477 3.44772 16.5 4 16.5H16C16.5523 16.5 17 16.9477 17 17.5C17 18.0523 16.5523 18.5 16 18.5H4C3.44772 18.5 3 18.0523 3 17.5ZM6.29289 7.20711C5.90237 6.81658 5.90237 6.18342 6.29289 5.79289L9.29289 2.79289C9.48043 2.60536 9.73478 2.5 10 2.5C10.2652 2.5 10.5196 2.60536 10.7071 2.79289L13.7071 5.79289C14.0976 6.18342 14.0976 6.81658 13.7071 7.20711C13.3166 7.59763 12.6834 7.59763 12.2929 7.20711L11 5.91421V13.5C11 14.0523 10.5523 14.5 10 14.5C9.44771 14.5 9 14.0523 9 13.5V5.91421L7.70711 7.20711C7.31658 7.59763 6.68342 7.59763 6.29289 7.20711Z" fill="#111827" />
                                    </svg>Export
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-0 pb-0 card-body">
                    <div class="table-responsive">
                        <table class="table table-flush" id="publisher-list">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-xs">Nhà xuất bản</th>
                                    <th class="text-xs">Địa chỉ</th>
                                    <th class="text-xs">Liên hệ</th>
                                    <th class="text-xs">Ngày tạo</th>
                                    <th class="text-xs">Ngày cập nhật</th>
                                    <th class="text-xs">Lựa Chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($publishers as $publisher)
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <div class="my-auto form-check">
                                                <input class="form-check-input" type="checkbox" id="customCheck1" checked>
                                            </div>
                                            <img class="avatar avatar-md ms-3" src="<?= _WEB_ROOT ?>/public/assets/admin/img/spacejoy-NpF_OYE301E-unsplash.jpg" alt="sofa">
                                            <h6 class="my-auto ms-3">{{$publisher['name']}}</h6>
                                        </div>
                                    </td>
                                    <td class="text-sm">{{$publisher['address']}}</td>
                                    <td class="text-sm">{{$publisher['contact']}}</td>
                                    <td class="text-sm">{{$publisher['created_at']}}</td>
                                    <td class="text-sm">{{$publisher['updated_at']}}</td>
                                    <td class="text-sm">
                                        <a href="javascript:;" data-bs-toggle="tooltip" data-bs-original-title="Preview product">
                                            <i class="fas fa-eye text-dark"></i>
                                        </a>
                                        <a href="" class="mx-3" data-bs-toggle="modal" data-bs-target="#publisher-edit_{{$publisher['id']}}">
                                            <i class="fas fa-user-edit text-dark"></i>
                                        </a>
                                        <a href="javascript:;" data-bs-toggle="tooltip" data-bs-original-title="Delete product">
                                            <i class="fas fa-trash text-dark"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nhà xuất bản</th>
                                    <th>Địa chỉ</th>
                                    <th>Liên hệ</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày cập nhật</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
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