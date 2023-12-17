<!-- ========================= SECTION CONTENT ========================= -->

<?php
if (isset($order['dayOrder'])) {
	$timestamp = strtotime($order['dayOrder']);
	$formattedDate = date("d", $timestamp) . " tháng " . date("m", $timestamp) . " năm " . date("Y", $timestamp);
}
?>
<section class="section-content padding-y">
	<div class="container">

		<div class="row">
			<aside class="col-md-3">
				<nav class="list-group">
					<a class="list-group-item active" href="ca-nhan">
						<font style="vertical-align: inherit;">
							<font style="vertical-align: inherit;">Tổng quan về tài khoản </font>
						</font>
					</a>
					<a class="list-group-item" href="dia-chi">
						<font style="vertical-align: inherit;">
							<font style="vertical-align: inherit;">Địa chỉ của tôi</font>
						</font>
					</a>
					<a class="list-group-item" href="don-hang">
						<font style="vertical-align: inherit;">
							<font style="vertical-align: inherit;">Đơn hàng của tôi</font>
						</font>
					</a>
					<a class="list-group-item" href="yeu-thich">
						<font style="vertical-align: inherit;">
							<font style="vertical-align: inherit;">Sản phẩm yêu thích</font>
						</font>
					</a>
					<a class="list-group-item" href="cai-dat">
						<font style="vertical-align: inherit;">
							<font style="vertical-align: inherit;">Cài đặt</font>
						</font>
					</a>
					<a class="list-group-item" href="admin/LogOut">
						<font style="vertical-align: inherit;">
							<font style="vertical-align: inherit;">Đăng xuất</font>
						</font>
					</a>
				</nav>
			</aside>
			<main class="col-md-9">

				<article class="card mb-4">
					<header class="card-header">
						<a href="#" class="float-right"> <i class="fa fa-print"></i>
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">In</font>
							</font>
						</a>
						<strong class="d-inline-block mr-3">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">ID đơn hàng: {{$order['ID']??' '}}</font>
							</font>
						</strong>
						<span>
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Ngày đặt hàng: {{$formattedDate??'0000/00/00'}}</font>
							</font>
						</span>
					</header>
					<div class="card-body">
						<div class="row">
							<div class="col-md-8">
								<h6 class="text-muted">
									<font style="vertical-align: inherit;">
										<font style="vertical-align: inherit;">Chuyển tới</font>
									</font>
								</h6>
								<p>
									<font style="vertical-align: inherit;">
										<font style="vertical-align: inherit;">{{$order['name_user']??' '}}</font>
									</font><br>
									<font style="vertical-align: inherit;">
										<font style="vertical-align: inherit;">
											Điện thoại +{{$order['tel']??' '}} Email: {{$order['email']??' '}} </font>
									</font><br>
									<font style="vertical-align: inherit;">
										<font style="vertical-align: inherit;">
											Địa điểm: {{$order['specific_address'] ??' '}} {{$order['address']??' '}} </font>
									</font><br>
									<font style="vertical-align: inherit;">
										<font style="vertical-align: inherit;">
											PO Box: 100123
										</font>
									</font>
								</p>
							</div>
							<div class="col-md-4">
								<h6 class="text-muted">
									<font style="vertical-align: inherit;">
										<font style="vertical-align: inherit;">Sự chi trả</font>
									</font>
								</h6>
								<span class="text-success">
									<i class="fab fa-lg fa-cc-visa"></i>
									<font style="vertical-align: inherit;">
										<font style="vertical-align: inherit;">
											Thị thực **** 4216
										</font>
									</font>
								</span>
								<p>
									<font style="vertical-align: inherit;">
										<font style="vertical-align: inherit;">Tổng cộng: {{number_format($order['total']?? 0)}}đ </font>
									</font><br>
									<font style="vertical-align: inherit;">
										<font style="vertical-align: inherit;">
											Phí vận chuyển: {{number_format($order['shipping_cost']??0)}} đ </font>
									</font><br>
									<span class="b">
										<font style="vertical-align: inherit;">
											<font style="vertical-align: inherit;">Tổng cộng: <?php if (isset($order['total']) && isset($order['shipping_cost'])) {
																									echo number_format($order['total'] - $order['shipping_cost']);
																								} else {
																									echo 0;
																								} ?> đ</font>
										</font>
									</span>
								</p>
							</div>
						</div> <!-- row.// -->
					</div> <!-- card-body .// -->
					<div class="table-responsive">
						<table class="table table-hover">
							<tbody>
								@foreach ($orders as $order_detail)
								<tr>
									<td width="65">
										<img src="<?= _WEB_ROOT; ?>/public/assets/client/image/thinking books/b10.png" class="img-xs border">
									</td>
									<td>
										<p class="title mb-0">
											<font style="vertical-align: inherit;">
												<font style="vertical-align: inherit;">{{$order_detail['name_book'??' ']}}</font>
											</font>
										</p>
										<var class="price text-muted">{{number_format($order_detail['total'] ?? ' ')}} đ</var>
									</td>
									<td>
										<font style="vertical-align: inherit;">
											<font style="vertical-align: inherit;">Loại </font>
										</font><br>
										<font style="vertical-align: inherit;">
											<font style="vertical-align: inherit;">Sách Tư Duy</font>
										</font>
									</td>
									<td width="250"> <a href="don-hang?id={{$order_detail['ID'??' ']}}" class="btn btn-outline-primary">
											<font style="vertical-align: inherit;">
												<font style="vertical-align: inherit;">Theo dõi thứ tự</font>
											</font>
										</a>
										<div class="dropdown d-inline-block">
											<a href="#" data-toggle="dropdown" class="dropdown-toggle btn btn-outline-secondary">
												<font style="vertical-align: inherit;">
													<font style="vertical-align: inherit;">Hơn</font>
												</font>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a href="#" class="dropdown-item">
													<font style="vertical-align: inherit;">
														<font style="vertical-align: inherit;">Trở lại</font>
													</font>
												</a>
												<a href="profile/deleteOrder?id={{$order_detail['ID']}}" class="dropdown-item">
													<font style="vertical-align: inherit;">
														<font style="vertical-align: inherit;">Hủy đơn hàng</font>
													</font>
												</a>
											</div>
										</div> <!-- dropdown.// -->
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div> <!-- table-responsive .end// -->
				</article> <!-- card order-item .// -->

			</main> <!-- col.// -->
		</div>

	</div> <!-- container .//  -->
</section>