<div class="px-5 py-4 container-fluid">
    <?= show_message('<div id="alert" class="alert bg-gradient-primary alert-dismissible text-sm  text-white  fade show" role="alert">
    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-text"><strong>', '</strong></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>') ?>
<div class="px-5 py-4 container-fluid">
    <div class="mt-4 row">
        <div class="col-12">
            <div class="card">
                <img src="<?= _WEB_ROOT ?>/public/assets/admin/img/header-orange-purple.jpeg" alt="pattern-lines" class="top-0 rounded-2 position-absolute start-0 w-100 h-100">
                <div class="px-4 bg-cover card-body z-index-1">
                    <div class="row">
                        <div class="col-lg-8 col-12">
                            <h3 class="text-white">Kiểm Tra Danh Sách Sản Phẩm</h3>
                            <p class="mb-4 text-white">Xem tất cả các chi tiết về tất cả các đơn đặt hàng của
                                bạn.</p>
                            <a href="{{_WEB_ROOT}}them-san-pham">
                                <button class="mb-1 btn btn-dark">
                                    <i class="fas fa-plus me-1"></i>
                                    Thêm Sản Phẩm
                                </button>
                            </a>
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
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Tất Cả Sản Phẩm</h5>
                            <p class="mb-0 text-sm">
                                Liệt kê tên, giá, thể loại, trạng thái, số lượng...
                            </p>
                        </div>
                        <div class="my-auto mt-4 ms-auto mt-lg-0">
                            <div class="my-auto ms-auto">
                                <a href="../new-product.html" class="me-2 mb-0 btn btn-dark" target="_blank">
                                    <i class="fas fa-plus me-1"></i>
                                    Thêm Sản Phẩm
                                </a>
                                <button type="button" class="me-2 mb-0 btn btn-white" data-bs-toggle="modal" data-bs-target="#import">
                                    <svg width="14" height="15" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3 17.5C3 16.9477 3.44772 16.5 4 16.5H16C16.5523 16.5 17 16.9477 17 17.5C17 18.0523 16.5523 18.5 16 18.5H4C3.44772 18.5 3 18.0523 3 17.5ZM6.29289 9.79289C6.68342 9.40237 7.31658 9.40237 7.70711 9.79289L9 11.0858V3.5C9 2.94772 9.44771 2.5 10 2.5C10.5523 2.5 11 2.94771 11 3.5V11.0858L12.2929 9.79289C12.6834 9.40237 13.3166 9.40237 13.7071 9.79289C14.0976 10.1834 14.0976 10.8166 13.7071 11.2071L10.7071 14.2071C10.5196 14.3946 10.2652 14.5 10 14.5C9.73478 14.5 9.48043 14.3946 9.29289 14.2071L6.29289 11.2071C5.90237 10.8166 5.90237 10.1834 6.29289 9.79289Z" fill="#111827" />
                                    </svg>Import
                                </button>
                                <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog__products-list modal-dialog mt-lg-10">
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
                        <table class="table table-flush" id="products-list">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-xs">Sản Phẩm</th>
                                    <th class="text-xs">Loại</th>
                                    <th class="text-xs">Giá</th>
                                    <th class="text-xs">SKU</th>
                                    <th class="text-xs">Số Lượng</th>
                                    <th class="text-xs">Trạng Thái</th>
                                    <th class="text-xs">Ngày tạo</th>
                                    <th class="text-xs">Cập nhật lần cuối</th>
                                    <th class="text-xs">Lựa Chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                @foreach ($products as $product)
                
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <div class="my-auto form-check">
                                                <input class="form-check-input" type="checkbox" id="customCheck2" checked>
                                            </div>
                                            <img class="avatar avatar-md ms-3" src="<?= _WEB_ROOT ?>{{$product['slug']}}" alt="pillow">
                                            <h6 class="my-auto ms-3">{{$product['book_name']}}</h6>
                                        </div>
                                    </td>
                                    <td class="text-sm">{{$product['name_category']}}</td>
                                    <td class="text-sm">{{$product['price']}}</td>
                                    <td class="text-sm">{{$product['ISBN']}}</td>
                                    <td class="text-sm">{{$product['quantity_inventory']}}</td>
                                    <td>
                                        <span class="badge badge-danger badge-sm">{{$product['status']}}</span>
                                    </td>
                                    <td class="text-sm">{{$product['created_at']}}</td>
                                    <td class="text-sm">{{$product['updated_at']}}</td>
                                    <td class="text-sm">
                                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal{{$product['book_id']}}" data-bs-original-title="Preview product">
                                            <i class="fas fa-eye text-dark"></i>
                                        </a>
                                        <div class="modal fade" id="exampleModal{{$product['book_id']}}" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog__products-list modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Chi Tiết sản Phẩm</h5>
                                                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="text-center col-lg-6">
                                                                                <img class="mx-auto shadow-lg w-100 border-radius-lg main-img" src="<?= _WEB_ROOT ?>/{{$product['slug']}}" alt="chair">
                                                                                <div class="pt-2 mt-4 my-gallery d-flex justify-content-between align-items-center" itemscope itemtype="http://schema.org/ImageGallery">
                                                                                    @foreach ($images[$product['book_id']] as $image)
                                                                                    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                                                                        <a href="<?= _WEB_ROOT ?>/public/assets/admin/img/" itemprop="contentUrl" data-size="600x600">
                                                                                            <img class="shadow max-height-100 border-radius-lg" src="<?= _WEB_ROOT ?>/public/uploads/products/2023_11/{{$image['name']}}" alt="Image description" />
                                                                                        </a>
                                                                                    </figure>
                                                                                    @endforeach
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                            <div class="mx-auto col-lg-6">
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        <h3 class="mt-4 mt-lg-0">
                                                                                        {{$product['book_name']}}</h3>
                                                                                        <div class="rating">
                                                                                            <i class="fas text-warning fa-star" aria-hidden="true"></i>
                                                                                            <i class="fas text-warning fa-star" aria-hidden="true"></i>
                                                                                            <i class="fas text-warning fa-star" aria-hidden="true"></i>
                                                                                            <i class="fas text-warning fa-star" aria-hidden="true"></i>
                                                                                            <i class="fas text-warning fa-star-half-alt" aria-hidden="true"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="align-middle col-6 text-end">
                                                                                        <span class="badge badge-success"><i class="fas fa-check"></i>
                                                                                            In
                                                                                            Stock</span>
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                                <h6 class="mt-3 mb-0">Giá</h6>
                                                                                <h5>{{number_format($product['price'])}}VND</h5>
                                                                                <br>
                                                                                <label class="mt-4">Mô tả</label>
                                                                                <ul>
                                                                                    <li>As we live, our hearts
                                                                                        turn colder. </li>
                                                                                    <li>Cause pain is what we go
                                                                                        through as we
                                                                                        become older. </li>
                                                                                    <li>We get insulted by
                                                                                        others, lose trust for
                                                                                        those others. </li>
                                                                                    <li>We get back stabbed by
                                                                                        friends. </li>
                                                                                    <li>It becomes harder for us
                                                                                        to give others a
                                                                                        hand. </li>
                                                                                </ul>
                                                                                <div class="mt-4 row">
                                                                                    <div class="mt-2 col-lg-4 mt-lg-0">
                                                                                        <label>Material</label>
                                                                                        <select class="form-control" name="choices-material" id="choices-material">
                                                                                            <option value="Choice 1" selected>e.g.
                                                                                                Textile</option>
                                                                                            <option value="Choice 2">
                                                                                                Steel</option>
                                                                                            <option value="Choice 3">
                                                                                                Aluminium
                                                                                            </option>
                                                                                            <option value="Choice 4">
                                                                                                Carbon</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="mt-2 col-lg-4 mt-lg-0">
                                                                                        <label>Color</label>
                                                                                        <select class="form-control" name="choices-colors" id="choices-colors">
                                                                                            <option value="Choice 1" selected>e.g.
                                                                                                Yellow</option>
                                                                                            <option value="Choice 2">
                                                                                                Gray</option>
                                                                                            <option value="Choice 3">
                                                                                                Black</option>
                                                                                            <option value="Choice 4">
                                                                                                Blue</option>
                                                                                            <option value="Choice 5">
                                                                                                Red</option>
                                                                                            <option value="Choice 6">
                                                                                                Pink</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-lg-4">
                                                                                        <label>Quantity</label>
                                                                                        <select class="form-control" name="choices-quantity" id="choices-quantity">
                                                                                            <option value="Choice 1" selected>e.g.
                                                                                                20</option>
                                                                                            <option value="Choice 2">
                                                                                                2</option>
                                                                                            <option value="Choice 3">
                                                                                                3</option>
                                                                                            <option value="Choice 4">
                                                                                                4</option>
                                                                                            <option value="Choice 5">
                                                                                                5</option>
                                                                                            <option value="Choice 6">
                                                                                                6</option>
                                                                                            <option value="Choice 7">
                                                                                                7</option>
                                                                                            <option value="Choice 8">
                                                                                                8</option>
                                                                                            <option value="Choice 9">
                                                                                                9</option>
                                                                                            <option value="Choice 10">
                                                                                                10</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mt-4 row text-end ms-auto">
                                                                                    <div class="col-4"></div>
                                                                                    <div class="col-4"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
                                                                                <button type="button" class="btn btn-dark">Save
                                                                                    changes</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{_WEB_ROOT}}sua-san-pham?id={{$product['book_id']}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                            <i class="fas fa-user-edit text-dark"></i>
                                        </a>
                                        <a href="{{_WEB_ROOT}}product/delete?id={{$product['id']}}" data-bs-toggle="tooltip" data-bs-original-title="Delete product"  onclick="return confirmDeleteProduct(event)">
                                            <i class="fas fa-trash text-dark"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sản Phẩm</th>
                                    <th>Loại</th>
                                    <th>Giá</th>
                                    <th>SKU</th>
                                    <th>Số Lượng</th>
                                    <th>Trạng Thái</th>
                                    <th>Lựa Chọn</th>
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
<script>
    function confirmDeleteProduct(event) {
        var confirmation = confirm("Bạn có chắc chắn muốn xóa sản phẩm không?");
        
        if (!confirmation) {
            event.preventDefault();
        }
    }
</script>