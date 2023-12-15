<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
	<div class="container">

		<div class="row">
			<main class="col-md-9">
				<div class="card">

					<table class="table table-borderless table-shopping-cart">
						<thead class="text-muted">
							<tr class="small text-uppercase">
								<th scope="col">
									<font style="vertical-align: inherit;">
										<font style="vertical-align: inherit;">Sản phẩm</font>
									</font>
								</th>
								<th scope="col" width="120">
									<font style="vertical-align: inherit;">
										<font style="vertical-align: inherit;">Số lượng</font>
									</font>
								</th>
								<th scope="col" width="120">
									<font style="vertical-align: inherit;">
										<font style="vertical-align: inherit;">Giá</font>
									</font>
								</th>
								<th scope="col" class="text-right" width="200"> </th>
							</tr>
						</thead>
						<form action="" method="post">
							<tbody>
								@if(isset($cart) && $cart != null)
								@foreach($cart as $key)
								<tr>
									<td>
										<figure class="itemside">
											<div class="aside"><img src="<?= _WEB_ROOT ?>/public/uploads/products/2023_11/bg_7.jpg" class="img-sm"></div>
											<figcaption class="info">
												<a href="#" class="title text-dark">
													<font style="vertical-align: inherit;">
														<font style="vertical-align: inherit;">{{$key['book_name']}}</font>
													</font>
												</a>
												<p class="small text-muted">
													<font style="vertical-align: inherit;">
														<font style="vertical-align: inherit;">Giới hạn</font>
													</font>
												</p>
											</figcaption>
										</figure>
									</td>
									<td>
										<input type="number" min=1 name="quantity" value="{{$key['quantity']}}" style="vertical-align: inherit;" class="form-control" onchange="updateCart(this)" id="{{$key['id']}}">
									</td>
									<td>
										<div class="price-wrap">
											<var class="price">{{number_format($key['price'])}} đ</var>
											<small class="text-muted">
												<font style="vertical-align: inherit;">
													<font style="vertical-align: inherit;">{{number_format($key['discount_price'])}} đ</font>
												</font>
											</small>
										</div> <!-- price-wrap .// -->
									</td>
									<td class="text-right">
										<a data-original-title="Save to Wishlist" title="" href="#" class="btn btn-light" data-toggle="tooltip" onclick="sendData(event)" id="{{$key['book_id']}}"><i class="fa fa-heart"></i></a>
										<a title="" href="#" class="btn btn-light" data-toggle="tooltip" onclick="confirmDelete(this)" id="{{$key['id']}}">Xóa</a>
									</td>
								</tr>
								@endforeach
								@else
								<h2>Giỏ hàng trống</h2>
								@endif
							</tbody>
						</form>
					</table>

					<div class="card-body border-top">
						<a href="#" class="btn btn-primary float-md-right">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;"> Mua hàng</font>
							</font> <i class="fa fa-chevron-right"></i>
						</a>
						<a href="san-pham-ngang" class="btn btn-light"> <i class="fa fa-chevron-left"></i>
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;"> Tiếp tục mua sắm</font>
							</font>
						</a>
					</div>
				</div> <!-- card.// -->

				<div class="alert alert-success mt-3">
					<p class="icontext"><i class="icon text-success fa fa-truck"></i>
						<font style="vertical-align: inherit;">
							<font style="vertical-align: inherit;">Giao hàng miễn phí trong vòng 1-2 tuần</font>
						</font>
					</p>
				</div>

			</main> <!-- col.// -->
			<aside class="col-md-3">
				<div class="card mb-3">
					<div class="card-body">
						<form>
							<div class="form-group">
								<label>
									<font style="vertical-align: inherit;">
										<font style="vertical-align: inherit;">Có phiếu giảm giá?</font>
									</font>
								</label>
								<div class="input-group">
									<input type="text" class="form-control" name="" placeholder="Mã giảm giá" fdprocessedid="ex5vi1q">
									<span class="input-group-append">
										<button class="btn btn-primary" fdprocessedid="n384z9">
											<font style="vertical-align: inherit;">
												<font style="vertical-align: inherit;">Áp dụng</font>
											</font>
										</button>
									</span>
								</div>
							</div>
						</form>
					</div> <!-- card-body.// -->
				</div> <!-- card .// -->
				<div class="card">
					<div class="card-body">
						<dl class="dlist-align">
							<dt>
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Tổng giá:</font>
								</font>
							</dt>
							<dd class="total text-right"></dd>
						</dl>
						<dl class="dlist-align">
							<dt>
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Giảm giá:</font>
								</font>
							</dt>
							<dd class="total-discount text-right"></dd>
						</dl>
						<dl class="dlist-align">
							<dt>
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Tổng cộng:</font>
								</font>
							</dt>
							<dd class="total-price text-right  h5"><strong></strong></dd>
						</dl>
						<hr>
						<p class="text-center mb-3">
							<img src="images/misc/payments.png" height="26">
						</p>

					</div> <!-- card-body.// -->
				</div> <!-- card .// -->
			</aside> <!-- col.// -->
		</div>

	</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION  ========================= -->
<section class="section-name border-top padding-y">
	<div class="container">
		<h6>
			<font style="vertical-align: inherit;">
				<font style="vertical-align: inherit;">Chính sách thanh toán và hoàn tiền</font>
			</font>
		</h6>
		<p>
			<font style="vertical-align: inherit;">
				<font style="vertical-align: inherit;">Điều quan trọng là phải tự chăm sóc nỗi đau, sau đó là sự trưởng thành của bệnh nhân, nhưng đồng thời cũng sẽ có rất nhiều công việc và nỗi đau. </font>
				<font style="vertical-align: inherit;">Để đi đến chi tiết nhỏ nhất, không ai nên thực hiện bất kỳ loại công việc nào trừ khi anh ta thu được lợi ích nào đó từ nó. </font>
				<font style="vertical-align: inherit;">Đừng tức giận với nỗi đau trong sự khiển trách trong niềm vui mà anh ấy muốn được thoát khỏi nỗi đau với hy vọng rằng không có sự sinh sản. </font>
				<font style="vertical-align: inherit;">Trừ khi họ bị dục vọng làm cho mù quáng, nếu không họ sẽ không bước ra; đó là lỗi của những ai từ bỏ bổn phận và mềm lòng, tức là lao động của mình.</font>
			</font>
		</p>
		<p>
			<font style="vertical-align: inherit;">
				<font style="vertical-align: inherit;">Điều quan trọng là phải tự chăm sóc nỗi đau, sau đó là sự trưởng thành của bệnh nhân, nhưng đồng thời cũng sẽ có rất nhiều công việc và nỗi đau. </font>
				<font style="vertical-align: inherit;">Để đi đến chi tiết nhỏ nhất, không ai nên thực hiện bất kỳ loại công việc nào trừ khi anh ta thu được lợi ích nào đó từ nó. </font>
				<font style="vertical-align: inherit;">Đừng tức giận với nỗi đau trong sự khiển trách trong niềm vui mà anh ấy muốn được thoát khỏi nỗi đau với hy vọng rằng không có sự sinh sản. </font>
				<font style="vertical-align: inherit;">Trừ khi họ bị dục vọng làm cho mù quáng, nếu không họ sẽ không bước ra; đó là lỗi của những ai từ bỏ bổn phận và mềm lòng, tức là lao động của mình.</font>
			</font>
		</p>

	</div><!-- container // -->
</section>
<!-- ========================= SECTION  END// ========================= -->