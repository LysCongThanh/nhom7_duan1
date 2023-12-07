<div class="container">
  <!-- ========================= SECTION CONTENT ========================= -->
  <section class="section-main padding-y ">
    <main class="card">
      <div class="card-body">
        <div class="container">
          <!-- ============================ ITEM DETAIL ======================== -->
          <div class="row">
            <aside class="col-md-6">
              <div class="card">
                <article class="gallery-wrap">
                  <div class="img-big-wrap">
                    <a href="#"><img src="<?= _WEB_ROOT; ?>/public/assets/client/image/children books/b6_480.png"></a>
                  </div>

                  <div class="thumbs-wrap">
                    <a href="#" class="item-thumb"> <img src="<?= _WEB_ROOT; ?>/public/assets/client/image/children books/b2_480.png"></a>
                    <a href="#" class="item-thumb"> <img src="<?= _WEB_ROOT; ?>/public/assets/client/image/children books/b7_480.png"></a>
                    <a href="#" class="item-thumb"> <img src="<?= _WEB_ROOT; ?>/public/assets/client/image/children books/b5_480.png"></a>
                    <a href="#" class="item-thumb"> <img src="<?= _WEB_ROOT; ?>/public/assets/client/image/children books/b3_480.png"></a>
                  </div>

                </article>
              </div> <!-- card.// -->
            </aside>
            <main class="col-md-6">
              <article class="product-info-aside">

                <h2 class="title mt-3">
                  <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">{{ $pds['book_name'] }}</font>
                  </font>
                </h2>

                <div class="rating-wrap my-3">
                  <ul class="rating-stars">
                    <li style="width:80%" class="stars-active">
                      <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </li>
                    <li>
                      <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </li>
                  </ul>
                  <small class="label-rating text-muted">
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">132 đánh giá</font>
                    </font>
                  </small>
                  <small class="label-rating text-success"> <i class="fa fa-clipboard-check"></i>
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">154 đơn đặt hàng</font>
                    </font>
                  </small>
                </div> <!-- rating-wrap.// -->

                <div class="mb-3">
                  <var class="price h4">
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">{{number_format($pds['price'])}}</font>
                    </font>
                  </var>
                  <span class="text-muted">
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">/ 1 cuốn</font>
                  </span>
                </div> <!-- price-detail-wrap .// -->

                <p>
                  <font style="vertical-align: inherit;">Xin chào</font>
                </p>


                <dl class="row">


                  <dt class="col-sm-3">
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">Đánh giá</font>
                    </font>
                  </dt>
                  <dd class="col-sm-9">400</dd>

                  <dt class="col-sm-3">
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">Bảo hành</font>
                    </font>
                  </dt>
                  <dd class="col-sm-9">
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">2 năm</font>
                    </font>
                  </dd>

                  <dt class="col-sm-3">
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">Vận chuyển</font>
                    </font>
                  </dt>
                  <dd class="col-sm-9">
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">3-4 ngày</font>
                    </font>
                  </dd>

                  <dt class="col-sm-3">
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">Mã giảm giá</font>
                    </font>
                  </dt>
                  <dd class="col-sm-9">
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">giảm 10K</font>
                    </font>
                  </dd>
                </dl>

                <div class="form-row  mt-4">
                  <div class="form-group col-md flex-grow-0">
                    <div class="input-group mb-3 input-spinner">
                      <div class="input-group-prepend">
                        <button class="btn btn-light" type="button" id="button-plus" fdprocessedid="w3x7tm"> + </button>
                      </div>
                      <input type="text" class="form-control" value="1" fdprocessedid="vnpisg">
                      <div class="input-group-append">
                        <button class="btn btn-light" type="button" id="button-minus" fdprocessedid="s9fhhj"> − </button>
                      </div>
                    </div>
                  </div> <!-- col.// -->
                  <div class="form-group col-md">
                    <a href="#" class="btn  btn-primary">
                      <span class="text">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Mua ngay</font>
                        </font>
                      </span>
                    </a>
                    <a href="#" class="btn btn-light">
                      <i class="fas fa-shopping-cart"></i> <span class="text">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Thêm vào giỏ hàng</font>
                        </font>
                      </span>
                    </a>
                  </div> <!-- col.// -->
                </div> <!-- row.// -->

              </article> <!-- product-info-aside .// -->
            </main> <!-- col.// -->
          </div> <!-- row.// -->
        </div>

      </div>
    </main>
  </section>
  <!-- ================ ITEM DETAIL END .// ================= -->

  <section class="padding-bottom-sm">
    <div class="bg-white box" style="border-radius:10px;">
      <header class="section-heading mb-3">
        <h4 class="title-section text-uppercase">Sản Phẩm Cùng Loại</h4>
      </header>
      <hr class="black-hr mb-4">
      <div class="row row-sm">
        <div class="col-xl-2 col-lg-3 col-md-4 col-6">
          <div href="{{_WEB_ROOT}}chi-tiet-san-pham?id={{$latest['id']}}" class="card card-sm card-product-grid" style="border-radius:10px;">
            <a href="{{_WEB_ROOT}}chi-tiet-san-pham?id={{$latest['id']}}" class="img-wrap"><img src="<?= _WEB_ROOT; ?>/public/assets/client/image/children books/b4_480.png"></a>
            <figcaption class="info-wrap">
              <a href="" class="title">Người bạn thời thơ ấu của tôi</a>
              <div class="price mt-1">$56.00</div> <!-- price-wrap.// -->
            </figcaption>
          </div>
        </div>

        <div class="col-xl-2 col-lg-3 col-md-4 col-6">
          <div href="{{_WEB_ROOT}}chi-tiet-san-pham?id={{$latest['id']}}" class="card card-sm card-product-grid" style="border-radius:10px;">
            <a href="{{_WEB_ROOT}}chi-tiet-san-pham?id={{$latest['id']}}" class="img-wrap"><img src="<?= _WEB_ROOT; ?>/public/assets/client/image/children books/b5_480.png"></a>
            <figcaption class="info-wrap">
              <a href="" class="title">Người bạn thời thơ ấu của tôi</a>
              <div class="price mt-1">$56.00</div> <!-- price-wrap.// -->
            </figcaption>
          </div>
        </div>

        <div class="col-xl-2 col-lg-3 col-md-4 col-6">
          <div href="{{_WEB_ROOT}}chi-tiet-san-pham?id={{$latest['id']}}" class="card card-sm card-product-grid" style="border-radius:10px;">
            <a href="{{_WEB_ROOT}}chi-tiet-san-pham?id={{$latest['id']}}" class="img-wrap"><img src="<?= _WEB_ROOT; ?>/public/assets/client/image/children books/b7_480.png"></a>
            <figcaption class="info-wrap">
              <a href="" class="title">Người bạn thời thơ ấu của tôi</a>
              <div class="price mt-1">$56.00</div> <!-- price-wrap.// -->
            </figcaption>
          </div>
        </div>

        <div class="col-xl-2 col-lg-3 col-md-4 col-6">
          <div href="{{_WEB_ROOT}}chi-tiet-san-pham?id={{$latest['id']}}" class="card card-sm card-product-grid" style="border-radius:10px;">
            <a href="{{_WEB_ROOT}}chi-tiet-san-pham?id={{$latest['id']}}" class="img-wrap"><img src="<?= _WEB_ROOT; ?>/public/assets/client/image/children books/b1_480.png"></a>
            <figcaption class="info-wrap">
              <a href="" class="title">Người bạn thời thơ ấu của tôi</a>
              <div class="price mt-1">$56.00</div> <!-- price-wrap.// -->
            </figcaption>
          </div>
        </div>

        <div class="col-xl-2 col-lg-3 col-md-4 col-6">
          <div href="{{_WEB_ROOT}}chi-tiet-san-pham?id={{$latest['id']}}" class="card card-sm card-product-grid" style="border-radius:10px;">
            <a href="{{_WEB_ROOT}}chi-tiet-san-pham?id={{$latest['id']}}" class="img-wrap"><img src="<?= _WEB_ROOT; ?>/public/assets/client/image/children books/b2_480.png"></a>
            <figcaption class="info-wrap">
              <a href="" class="title">Người bạn thời thơ ấu của tôi</a>
              <div class="price mt-1">$56.00</div> <!-- price-wrap.// -->
            </figcaption>
          </div>
        </div>

        <div class="col-xl-2 col-lg-3 col-md-4 col-6">
          <div href="{{_WEB_ROOT}}chi-tiet-san-pham?id={{$latest['id']}}" class="card card-sm card-product-grid" style="border-radius:10px;">
            <a href="{{_WEB_ROOT}}chi-tiet-san-pham?id={{$latest['id']}}" class="img-wrap"><img src="<?= _WEB_ROOT; ?>/public/assets/client/image/children books/b6_480.png"></a>
            <figcaption class="info-wrap">
              <a href="" class="title">Người bạn thời thơ ấu của tôi</a>
              <div class="price mt-1">$56.00</div> <!-- price-wrap.// -->
            </figcaption>
          </div>
        </div>


      </div> <!-- row.// -->
      <div class="d-flex justify-content-center">
        <a href="#" class="btn btn-danger">
          <span class="text">
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">Xem thêm</font>
            </font>
          </span>
        </a>
      </div>
    </div>
  </section>

  <!-- ========================= SECTION  ========================= -->
  <section class="section-name padding-y">
    <div class="bg-white box" style="border-radius:10px;">
      <div class="row">

        <div class="mt-3 ml-1 bg-black">
          <h4 class="title-section text-uppercase">Mô Tả Sản Phẩm</h4>
        </div>

        <p class="text-justify">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">
              Bếp nướng bằng đá nham thạch, thích hợp dùng gas tự nhiên, có lưới nấu bằng gang, đánh lửa Piezo, đầu đốt bằng thép không gỉ, bình chứa nước và cặp nhiệt điện. </font>
            <font style="vertical-align: inherit;">Có thể điều chỉnh nhiệt độ theo vùng. </font>
            <font style="vertical-align: inherit;">Hãy hoàn thiện với đá nham thạch. </font>
            <font style="vertical-align: inherit;">Chân có thể điều chỉnh. </font>
            <font style="vertical-align: inherit;">Điều quan trọng là phải tự chăm sóc nỗi đau, sau đó là sự trưởng thành của bệnh nhân, nhưng đồng thời cũng sẽ có rất nhiều công việc và nỗi đau. </font>
            <font style="vertical-align: inherit;">Để đi đến chi tiết nhỏ nhất, không ai nên thực hiện bất kỳ loại công việc nào trừ khi anh ta thu được lợi ích nào đó từ nó.
            </font>
          </font>
        </p>


        <div class="mt-3 bg-black">
          <h4 class="title-section text-uppercase">Thông Số Kỹ Thuật</h4>
        </div>

        <table class="table table-bordered table-sm">
          <tbody>

            <tr>
              <td>
                <font style="vertical-align: inherit;">Loại Sách</font>
              </td>
              <td>

                <font style="vertical-align: inherit;">Light Novel</font>

              </td>
            </tr>
            <tr>
              <td>

                <font style="vertical-align: inherit;">Tác Giả</font>

              </td>
              <td>Nguyễn Minh Triết</td>
            </tr>
            <tr>
              <td>

                <font style="vertical-align: inherit;">Nhà Xuất Bản</font>

              </td>
              <td>

                <font style="vertical-align: inherit;">Fahasa</font>

              </td>
            </tr>


            <tr>
              <td>

                <font style="vertical-align: inherit;">Kích Thước</font>

              </td>
              <td>

                <font style="vertical-align: inherit;">20cmx15cm</font>

              </td>
            </tr>

            <tr>
              <td>

                <font style="vertical-align: inherit;">ISBN</font>

              </td>
              <td>

                <font style="vertical-align: inherit;">12347876543</font>

              </td>
            </tr>


            <tr>
              <td>

                <font style="vertical-align: inherit;">Số Trang</font>

              </td>
              <td>

                <font style="vertical-align: inherit;">300 Trang</font>

              </td>
            </tr>
            <tr>
              <td>

                <font style="vertical-align: inherit;">Ngày Xuất Bản</font>

              </td>
              <td>

                <font style="vertical-align: inherit;">12/10/2023</font>

              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- Hiển thị đánh giá -->
  <section class="section-name padding-y">
    <div class="bg-white box" style="border-radius:10px;">

      <div class="mt-3 ml-1 bg-black">
        <h5 class="title-section text-uppercase">Đánh giá sản phẩm</h5>
      </div>

      <div class="box row" style=" background:#ffee8f;border-radius:10px;">

        <div class="col-sm-4">
          <b class="text-warning"><span class="average_rating">0.0</span> / 5</b>
          <br>
          <div class="ratings">
            <div class="empty-stars"></div>
            <div class="full-stars"></div>
          </div>
        </div>

        <div class="col-sm-5 text-center">
          <h4 class="">Đánh giá</h4>
          <button type="button" name="add_review" id="add_review" class="btn btn-primary btn-group-toggle"><i class="fas fa-pen"></i> Viết đánh giá</button>
        </div>

      </div>

      <div class="row">
        <!-- data_rating -->
        <div class="col-sm-4">

          <p>
          <div class="progress-label-left">5 <i class="fas fa-star text-warning"></i></div>
          <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
          <div class="progress">
            <div class="progress-bar" id="five_star_progress" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          </p>

          <p>
          <div class="progress-label-left">4 <i class="fas fa-star text-warning"></i></div>
          <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
          <div class="progress">
            <div class="progress-bar" id="four_star_progress" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          </p>


          <p>
          <div class="progress-label-left">3 <i class="fas fa-star text-warning"></i></div>
          <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
          <div class="progress">
            <div class="progress-bar" id="three_star_progress" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          </p>


          <p>
          <div class="progress-label-left">2 <i class="fas fa-star text-warning"></i></div>
          <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
          <div class="progress">
            <div class="progress-bar" id="two_star_progress" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          </p>

          <p>
          <div class="progress-label-left">1 <i class="fas fa-star text-warning"></i></div>
          <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
          <div class="progress">
            <div class="progress-bar" id="one_star_progress" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          </p>

        </div>
      </div>
      <hr>
      <div class="mt-5" id="review_content">

      </div>
    </div>
  </section>

  <!-- Hiển thị Popup -->
  <div id="review_modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Đánh giá sản phẩm</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h4 class="text-center mt-2 mb-4">
            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
          </h4>
          <div class="form-group">
            <input type="hidden" name="user" id="user" class="form-control" value="24">
          </div>
          <div class="form-group">
            <input type="hidden" name="pds" id="pds" class="form-control" value="{{$pds['book_id']}}">
          </div>
          <div class="form-group text-center mt-4">
            <textarea name="content" id="content" class="form-control" placeholder="Viết đánh giá ở đây....."></textarea>
          </div>

          <div class="form-group text-center mt-4">
            <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Hủy</button>
            <button type="button" class="btn btn-primary" id="save_review">Gửi nhận xét</button>
          </div>

        </div>
      </div>
    </div>
  </div>


</div>

