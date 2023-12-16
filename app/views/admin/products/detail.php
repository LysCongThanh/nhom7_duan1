        <div class="top-0 bg-cover z-index-n1 min-height-100 max-height-200 h-25 position-absolute w-100 start-0 end-0" style="background-image: url('{{_WEB_ROOT}}public/assets/admin/img/header-blue-purple.jpg'); background-position: bottom;">
        </div>
        <div class="px-5 py-4 container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card is-shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="text-center col-lg-6">
                                    @if(isset($imageMain['slug']))
                                    <img class="mx-auto shadow-lg w-100 border-radius-lg image_product_detail" src="{{_WEB_ROOT}}{{$imageMain['slug']}}" alt="chair">
                                    @endif
                                    @if(!isset($imageMain['slug']))
                                    <h3 class="text-danger my-2">Ảnh chính Trống</h3>
                                    @endif
                                    <div class="pt-2 mt-4 my-gallery d-flex justify-content-between align-items-center" itemscope itemtype="http://schema.org/ImageGallery">
                                        @if(count($albums) > 0)
                                        @foreach($albums as $image)
                                        <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                            <a href="{{_WEB_ROOT}}{{$image['slug']}}" itemprop="contentUrl" data-size="600x600">
                                                <img class="shadow max-height-100 border-radius-lg" src="{{_WEB_ROOT}}{{$image['slug']}}" alt="Image description" />
                                            </a>
                                        </figure>
                                        @endforeach
                                        @endif
                                        @if(!count($albums) > 0)
                                        <h6 class="text-danger my-2 w-100">Albums Trống</h6>
                                        @endif
                                    </div>

                                    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

                                        <div class="pswp__bg"></div>

                                        <div class="pswp__scroll-wrap">


                                            <div class="pswp__container">
                                                <div class="pswp__item"></div>
                                                <div class="pswp__item"></div>
                                                <div class="pswp__item"></div>
                                            </div>

                                            <div class="pswp__ui pswp__ui--hidden">
                                                <div class="pswp__top-bar">

                                                    <div class="pswp__counter"></div>
                                                    <button class="btn btn-white btn-sm pswp__button pswp__button--close">Close (Esc)</button>
                                                    <button class="btn btn-white btn-sm pswp__button pswp__button--fs">Fullscreen</button>
                                                    <button class="btn btn-white btn-sm pswp__button pswp__button--arrow--left">Prev
                                                    </button>
                                                    <button class="btn btn-white btn-sm pswp__button pswp__button--arrow--right">Next
                                                    </button>


                                                    <div class="pswp__preloader">
                                                        <div class="pswp__preloader__icn">
                                                            <div class="pswp__preloader__cut">
                                                                <div class="pswp__preloader__donut"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                                    <div class="pswp__share-tooltip"></div>
                                                </div>
                                                <div class="pswp__caption">
                                                    <div class="pswp__caption__center"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mx-auto col-lg-6">
                                    <div class="row ">
                                        <div class="col-8">
                                            <h5 class="mt-4 mt-lg-0">Tên sản phẩm: <span>{{$product['book_name']}}</span></h5>
                                            <div class="rating">
                                                <i class="fas text-warning fa-star" aria-hidden="true"></i>
                                                <i class="fas text-warning fa-star" aria-hidden="true"></i>
                                                <i class="fas text-warning fa-star" aria-hidden="true"></i>
                                                <i class="fas text-warning fa-star" aria-hidden="true"></i>
                                                <i class="fas text-warning fa-star-half-alt" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="align-middle col-4 text-end">
                                            <span class="badge badge-success"><i class="fas fa-check"></i>{{date("d/m/Y", strtotime($product['book_created_at']))}}</span>
                                        </div>
                                    </div>
                                    <br>
                                    <h6 class="mt-3 mb-0">Giá: <span class="text-secondary">{{number_format($product['price'])}}VNĐ</span></h6>
                                    <br>
                                    <label class="mt-4">Thông tin</label>
                                    <ul class="col-6">
                                        <li>Tác giả: {{$product['author_name']}}</li>
                                        <li>Nhà xuất bản: {{$product['publisher_name']}}</li>
                                        <li>Danh mục: {{$product['category_name']}}</li>
                                        <li>Giảm giá: {{$product['discount_price']}}</li>
                                        <li>Số trang: {{$product['num_page']}}</li>
                                        <li>Kích thước: <?= str_replace(['"', "'"], '', html_entity_decode($product['size'])) ?></li>
                                        <li>Số lượng: {{$product['quantity_inventory']}}</li>
                                        <li>Lượt xem: {{$product['views']}}</li>
                                        <li>Ngày tạo: {{$product['created_at']}}</li>
                                        <li>Ngày Cập nhật: {{$product['updated_at']}}</li>
                                    </ul>
                                    <div class="mt-4">
                                        <ul class="nav nav-tabs col-12" id="myTabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="tab-detail" data-bs-toggle="tab" href="#detail">Mô tả chi tiết</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="tab-short" data-bs-toggle="tab" href="#short">Mô tả ngắn</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content is-shadow p-2">
                                            <div class="tab-pane fade show active" id="detail">
                                                <h3>Mô tả chi tiết</h3>
                                                <?php echo html_entity_decode($product['describe_long']) ?>
                                            </div>
                                            <div class="tab-pane fade" id="short">
                                                <h3>Mô tả ngắn</h3>
                                                <?php echo html_entity_decode($product['describe_short']) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 row text-end ms-auto">
                                        <div class="col-3"></div>
                                        <div class="col-3"></div>
                                        <div class="col-6">
                                            <a href="{{_WEB_ROOT}}sua-san-pham?id={{$product['book_id']}}" class="mb-0 ms-auto btn btn-dark mt-lg-auto d-flex align-items-center justify-content-center" type="button" name="button">
                                                <span class="ms-1">Sửa sản phẩm</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>