		<!-- ========================= SECTION CONTENT ========================= -->
		<section class="section-content padding-y">
			<div class="container">

				<!-- ============================  FILTER TOP  ================================= -->
				<div class="card mb-3">
					<div class="card-body">
						<ol class="breadcrumb float-left">
							<li class="breadcrumb-item"><a href="#">
									<font style="vertical-align: inherit;">
										<font style="vertical-align: inherit;">Trang chủ</font>
									</font>
								</a></li>
							<li class="breadcrumb-item"><a href="#">
									<font style="vertical-align: inherit;">
										<font style="vertical-align: inherit;">Sản phẩm</font>
									</font>
								</a></li>
						</ol>
					</div> <!-- card-body .// -->
				</div> <!-- card.// -->
				<!-- ============================ FILTER TOP END.// ================================= -->

				<div class="row">
					<aside class="col-md-2">
						<form action="loc-san-pham" method="get" id="filter-form">
							<!-- ==== Loại Sách === -->
							<article class="filter-group">
								<h6 class="title">
									<a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#collapse_category">
										<font style="vertical-align: inherit;">
											<font style="vertical-align: inherit;">Loại Sách</font>
										</font>
									</a>
								</h6>
								<div class="filter-content collapse show" id="collapse_category">
									<div class="inner">
										@foreach($categories as $categorie)
										<div class="form-check">
											<input id="check_category{{$categorie['id']}}" class="form-check-input" type="radio" name="id_category" value="{{$categorie['id']}}">
											<label class="form-check-label" for="check_category{{$categorie['id']}}">
												{{$categorie['name']}}
											</label>
										</div>
										@endforeach
									</div> <!-- inner.// -->
								</div>
							</article>

							<!-- ==== NXB ==== -->
							<article class="filter-group">
								<h6 class="title">
									<a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#collapse_publisher">
										<font style="vertical-align: inherit;">
											<font style="vertical-align: inherit;">Nhà Xuất Bản</font>
										</font>
									</a>
								</h6>
								<div class="filter-content collapse show" id="collapse_publisher">
									<div class="inner">
										@foreach($publisher as $nxb)
										<div class="form-check">
											<input id="check_publisher{{$nxb['id']}}" class="form-check-input" type="radio" name="id_publisher" value="{{$nxb['id']}}">
											<label class="form-check-label" for="check_publisher{{$nxb['id']}}">
												{{$nxb['name']}}
											</label>
										</div>
										@endforeach
									</div> <!-- inner.// -->
								</div>
							</article>

							<!-- ==== Tác Giả ==== -->
							<article class="filter-group">
								<h6 class="title">
									<a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#collapse_author">
										<font style="vertical-align: inherit;">
											<font style="vertical-align: inherit;">Tác Giả</font>
										</font>
									</a>
								</h6>
								<div class="filter-content collapse show" id="collapse_author">
									<div class="inner">
										@foreach($authors as $author)
										<div class="form-check">
											<input id="check_author{{$author['id']}}" class="form-check-input" type="radio" name="id_author" value="{{$author['id']}}">
											<label class="form-check-label" for="check_author{{$author['id']}}">
												{{$author['name']}}
											</label>
										</div>
										@endforeach
									</div> <!-- inner.// -->
								</div>
							</article>

							<!-- ==== Giá ==== -->
							<article class="filter-group">
								<h6 class="title">
									<a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#collapse_price_min-max">
										<font style="vertical-align: inherit;">
											<font style="vertical-align: inherit;">Phạm Vi Giá</font>
										</font>
									</a>
								</h6>
								<div class="filter-content collapse show" id="collapse_price_min-max">
									<div class="inner">
										<div class="form-row">
											<h6 class="title">Tối Thiểu {{$getPrice['min']}} - Tối đa {{$getPrice['max']}}</h6>
											<div class="form-group col-md-6">
												
												<input class="form-control" type="number" fdprocessedid="854m" min="{{$getPrice['min']}}" max="{{$getPrice['max']}}" name="min">
											</div>
											<div class="form-group text-right col-md-6">
												
												<input class="form-control" type="number" fdprocessedid="ccygk8" max="{{$getPrice['max']}}" min="{{$getPrice['min']}}" name="max">
											</div>

										</div>
										<!-- form-row.// -->

									</div> <!-- inner.// -->
								</div>
							</article>
							<!-- filter-group .// -->
							<button class="btn btn-block btn-primary" fdprocessedid="ndpz0k" type="submit" id="filterData">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Áp dụng</font>
								</font>
							</button>
						</form>
					</aside> <!-- col.// -->
					<main class="col-md-10">

						<header class="mb-3">
							<div class="form-inline">
								<!-- <strong class="mr-md-auto">
									<font style="vertical-align: inherit;">
										<font style="vertical-align: inherit;">32 mặt hàng được tìm thấy</font>
									</font>
								</strong> -->
								<select class="mr-2 form-control" fdprocessedid="mss68h">
									<option>
										<font style="vertical-align: inherit;">
											<font style="vertical-align: inherit;">Sách mới nhất</font>
										</font>
									</option>
									<option>
										<font style="vertical-align: inherit;">
											<font style="vertical-align: inherit;">Xu hướng</font>
										</font>
									</option>
									<option>
										<font style="vertical-align: inherit;">
											<font style="vertical-align: inherit;">Phổ biến nhất</font>
										</font>
									</option>
								</select>
								<div class="btn-group">
									<a href="san-pham" class="btn btn-light active" data-toggle="tooltip" title="" data-original-title="Chế độ hiển thị theo hàng ngang">
										<i class="fa fa-th"></i></a>
									<a href="san-pham-ngang" class="btn btn-light" data-toggle="tooltip" title="" data-original-title="Chế độ hiển thị theo hàng cột">
										<i class="fa fa-bars"></i></a>
								</div>
							</div>
						</header><!-- sect-heading -->

						<article class="card card-product-list">
						<!-- @foreach($product_column as $column)
						
							
						@endforeach -->
						</article> <!-- card-product .// -->

						<nav class="mb-4" aria-label="Mẫu điều hướng trang">
							<ul class="pagination">
								<li class="page-item disabled"><a class="page-link" href="#">
										<font style="vertical-align: inherit;">
											<font style="vertical-align: inherit;">Trước</font>
										</font>
									</a></li>
								<li class="page-item active"><a class="page-link" href="#">
										<font style="vertical-align: inherit;">
											<font style="vertical-align: inherit;">1</font>
										</font>
									</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">
										<font style="vertical-align: inherit;">
											<font style="vertical-align: inherit;">3</font>
										</font>
									</a></li>
								<li class="page-item"><a class="page-link" href="#">4</a></li>
								<li class="page-item"><a class="page-link" href="#">5</a></li>
								<li class="page-item"><a class="page-link" href="#">
										<font style="vertical-align: inherit;">
											<font style="vertical-align: inherit;">Kế tiếp</font>
										</font>
									</a></li>
							</ul>
						</nav>


					</main> <!-- col.// -->

				</div>

			</div>
			<!-- container .//  -->
		</section>


		<!-- ========================= SECTION SUBSCRIBE  ========================= -->
		<section class="padding-y-lg bg-light border-top">
			<div class="container">

				<p class="pb-2 text-center">Delivering the latest product trends and
					industry news straight to your inbox</p>

				<div class="row justify-content-md-center">
					<div class="col-lg-4 col-sm-6">
						<form class="form-row">
							<div class="col-8">
								<input class="form-control" placeholder="Your Email" type="email">
							</div> <!-- col.// -->
							<div class="col-4">
								<button type="submit" class="btn btn-block btn-warning"> <i class="fa fa-envelope"></i> Subscribe </button>
							</div> <!-- col.// -->
						</form>
						<small class="form-text">We’ll never share your email address with a
							third-party. </small>
					</div> <!-- col-md-6.// -->
				</div>

			</div>
		</section>