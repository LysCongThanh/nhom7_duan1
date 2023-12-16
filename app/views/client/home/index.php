<div class="container">

	<section class="section-main padding-y">
		<main class="card">
			<div class="card-body">

				<div class="row">
					<aside class="col-lg col-md-3 flex-lg-grow-0">
						<h6>Thể Loại Nổi Bật</h6>
						<nav class="nav-home-aside">
							<ul class="menu-category">
								@foreach($categoriesPopular as $category)
								<li><a href="{{_WEB_ROOT}}san-pham-ngang?category={{$category['category_id']}}">{{$category['category_name']}}</a></li>
								@endforeach
								<li class="has-submenu"><a href="product.html">Xem ngay</a>
								</li>
							</ul>
						</nav>
					</aside> <!-- col.// -->
					<div class="col-md-9 col-xl-7 col-lg-7">

						<!-- ================== COMPONENT SLIDER  BOOTSTRAP  ==================  -->
						<div id="carousel1_indicator" class="slider-home-banner carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carousel1_indicator" data-slide-to="0" class=""></li>
								<li data-target="#carousel1_indicator" data-slide-to="1" class=""></li>
								<li data-target="#carousel1_indicator" data-slide-to="2" class="active"></li>
							</ol>
							<div class="carousel-inner">
								<div class="carousel-item">
									<img src="<?= _WEB_ROOT; ?>/public/assets/client/image/banners/ban3.png" alt="First slide">
								</div>
								<div class="carousel-item">
									<img src="<?= _WEB_ROOT; ?>/public/assets/client/image/banners/ban4.jpg" alt="Second slide">
								</div>
								<div class="carousel-item active">
									<img src="<?= _WEB_ROOT; ?>/public/assets/client/image/banners/ban5.jpg" alt="Third slide">
								</div>
							</div>
							<a class="carousel-control-prev" href="#carousel1_indicator" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Trước</span>
							</a>
							<a class="carousel-control-next" href="#carousel1_indicator" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Sau</span>
							</a>
						</div>
						<!-- ==================  COMPONENT SLIDER BOOTSTRAP end.// ==================  .// -->

					</div> <!-- col.// -->
					<div class="col-md d-none d-lg-block flex-grow-1">
						<aside class="special-home-right">
							<h6 class="bg-blue text-center text-white mb-0 p-2">Sản phẩm nổi bật</h6>

							@foreach($stars as $star)
							<div class="card-banner border-bottom">
								<div class="py-3" style="width:80%">
									<h6 class="card-title">{{$star['book_name']}}</h6>
									<a href="{{_WEB_ROOT}}chi-tiet-san-pham?id={{$star['book_id']}}" class="btn btn-secondary btn-sm"> Xem ngay</a>
								</div>
								<img src="{{_WEB_ROOT}}{{$star['image_slug']}}" height="80" class="img-bg">
							</div>
							@endforeach

						</aside>
					</div> <!-- col.// -->
				</div> <!-- row.// -->

			</div> <!-- card-body.// -->
		</main> <!-- card.// -->

	</section>

	<section class="padding-bottom">
		<div class="card card-deal">
			<div class="col-heading content-body">
				<header class="section-heading">
					<h3 class="section-title">Giờ Ưu Đãi</h3>
					<p>Thời gian còn lại:</p>
				</header><!-- sect-heading -->
				<div class="timer">
					<div> <span class="num">04</span> <small>Ngày</small></div>
					<div> <span class="num">12</span> <small>Giờ</small></div>
					<div> <span class="num">58</span> <small>Phút</small></div>
					<div> <span class="num">02</span> <small>Giây</small></div>
				</div>
			</div> <!-- col.// -->
			<div class="row no-gutters items-wrap">
				@foreach($discount as $dis)
				<div class="col-md col-6">
					<figure class="card-product-grid card-sm">
						<a href="#" class="img-wrap">
							<img src="<?= _WEB_ROOT; ?>/public/uploads/products/2023_12/{{$dis['image_name']}}">
						</a>
						<div class="text-wrap p-3">
							<a href="#" class="title">{{$dis['book_name']}}</a>
							<span class="badge badge-danger"> {{$dis['discount']}}%</span>

							<p class="text-primary"><i class="fas fa-dollar-sign"></i> {{number_format($dis['discount_money'])}} đ</p>
							<p class="text-wrap center-line"><i class="fas fa-dollar-sign"></i> {{number_format($dis['price'])}} đ</p>
						</div>
					</figure>
				</div> <!-- col.// -->
				@endforeach
			</div>
		</div>

	</section>

	<section class="padding-bottom">
		<header class="section-heading heading-line">
			<h4 class="title-section text-uppercase">Nổi Bật Nhất</h4>
		</header>

		<div class="card card-home-category border-primary" style="border-radius:10px;">
			<div class="row no-gutters">
				<div class="col-md-3">

					<div class="home-category-banner bg-light-orange" style="border-radius: 10px 0 0 10px;">
						<h5 class="title">Những Cuốn Sách Nổi Bật Nhất</h5>
						<p>Hãy cùng nhau khám phá những cuốn Sách tiêu biểu cho thời đại mới </p>
						<a href="#" class="btn btn-outline-primary rounded-pill">Xem Tất Cả</a>
						<img src="<?= _WEB_ROOT; ?>/public/assets/client/image/thinking books/n6.png" class="img-bg">
					</div>

				</div> <!-- col.// -->
				<div class="col-md-9">
					<ul class="row no-gutters bordered-cols">
						@foreach($stars as $star)
						<li class="col-6 col-lg-3 col-md-4">
							<a href="{{_WEB_ROOT}}chi-tiet-san-pham?id={{$star['book_id']}}" class="item">
								<div class="card-body">
									<h6 class="title">{{$star['book_name']}}</h6>
									<img class="img-sm float-right" src="<?= _WEB_ROOT; ?>/public/uploads/products/2023_12/{{$star['image_name']}}">
									<p class="text-primary">
									<div class="ratings">
										<div class="empty-stars"></div>
										<div class="full-stars" style="width: {{ intval($star['percent_rating']) }}%;"></div>
									</div>
									</p>

								</div>
							</a>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="padding-bottom">
		<header class="section-heading heading-line">
			<h4 class="title-section text-uppercase">Top lượt xem</h4>
		</header>

		<div class="card card-home-category border-primary" style="border-radius:10px;">
			<div class="row no-gutters" style="border-radius:10px;">
				<div class="col-md-3" style="border-radius:10px;">
					<div class="home-category-banner bg-light-orange" style="border-radius: 10px 0 0 10px;">
						<h5 class="title">Cuốn Sách Được Nhiều Lượt Xem Nhất</h5>
						<p>Cùng nhau khám phá những trang sách đặc này thôi!</p>
						<a href="" class="btn btn-outline-primary rounded-pill">Khám phá ngay</a>
						<img src="<?= _WEB_ROOT; ?>/public/assets/client/image/thinking books/n2.png" class="img-bg">
					</div>
				</div>

				<div class="col-md-9">
					<ul class="row no-gutters bordered-cols">

						@foreach($views as $view)
						<li class="col-6 col-lg-3 col-md-4">
							<a href="{{_WEB_ROOT}}chi-tiet-san-pham?id={{$view['book_id']}}" class="item">
								<div class="card-body">
									<h6 class="title">{{$view['book_name']}}</h6>
									<img class="img-sm float-right" src="<?= _WEB_ROOT; ?>/public/uploads/products/2023_12/{{$view['image_name']}}">
									<p class="text-primary"><i class="fas fa-eye"></i> {{number_format($view['views'])}}</p>
									<p class="text-primary"><i class="fas fa-dollar-sign"></i> {{number_format($view['price'])}} đ</p>
								</div>
							</a>
						</li>
						@endforeach

					</ul>
				</div>
			</div>
		</div>

	</section>

	<section class="padding-bottom-sm">
		<div class="bg-white box" style="border-radius:10px;">
			<header class="section-heading mb-3">
				<h4 class="title-section text-uppercase">Sản Phẩm Mới Nhất</h4>
			</header>
			<hr class="black-hr mb-4">
			<div class="row row-sm">
				@foreach($pds as $product)
				<div class="col-xl-3 col-lg-3 col-md-4 col-6">
					<div href="{{_WEB_ROOT}}chi-tiet-san-pham?id={{$product['book_id']}}" class="card card-sm card-product-grid" style="border-radius:10px;">
						<a href="{{_WEB_ROOT}}chi-tiet-san-pham?id={{$product['book_id']}}" class="img-wrap">
							<div class="img-zoom-wrap">
								<img src="<?= _WEB_ROOT; ?>/public/uploads/products/2023_12/{{$product['image_name']}}">
							</div>
						</a>
						<figcaption class="info-wrap">
							<div class="card__preview_text">
								<a href="{{_WEB_ROOT}}chi-tiet-san-pham?id={{$product['book_id']}}" class="title" title="{{$product['book_name']}}">{{$product['book_name']}}</a>
							</div>
							<div class="price mt-1 text-primary">{{number_format($product['price'])}} đ</div>

							<button type="button" class="btn-outline-primary btn btn-block mt-2 mb-2">Thêm giỏ hàng</button>
						</figcaption>
					</div>
				</div>
				@endforeach
			</div>
	</section>



	<section class="section-subscribe padding-y-lg">
		<div class="container">

			<p class="pb-2 text-center text-white">
				<font style="vertical-align: inherit;">
					<font style="vertical-align: inherit;">Cung cấp các xu hướng sản phẩm mới nhất và tin tức trong ngành ngay tới hộp thư đến của bạn</font>
				</font>
			</p>

			<div class="row justify-content-md-center">
				<div class="col-lg-5 col-md-6">
					<form class="form-row">
						<div class="col-md-8 col-7">
							<input class="form-control border-0" placeholder="Email của bạn" type="email" fdprocessedid="0zlayh">
						</div> <!-- col.// -->
						<div class="col-md-4 col-5">
							<button type="submit" class="btn btn-block btn-warning" fdprocessedid="yjz22i"> <i class="fa fa-envelope"></i>
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Đặt mua</font>
								</font>
							</button>
						</div> <!-- col.// -->
					</form>
					<small class="form-text text-white-50">
						<font style="vertical-align: inherit;">
							<font style="vertical-align: inherit;">Chúng tôi sẽ không bao giờ chia sẻ địa chỉ email của bạn với bên thứ ba.</font>
						</font>
					</small>
				</div> <!-- col-md-6.// -->
			</div>


		</div>
	</section>

</div>