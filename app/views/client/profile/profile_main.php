<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
	<div class="container">

		<div class="row">
			<aside class="col-md-3">
				<nav class="list-group">
					<a class="list-group-item active" href="ca-nhan">

						Tổng quan về tài khoản

					</a>
					<a class="list-group-item" href="dia-chi">

						Địa chỉ của tôi

					</a>
					<a class="list-group-item" href="don-hang">

						Đơn hàng của tôi

					</a>
					<a class="list-group-item" href="yeu-thich">

						Sản phẩm yêu thích

					</a>
					<a class="list-group-item" href="cai-dat">

						Cài đặt

					</a>
					<a class="list-group-item" href="admin/LogOut">

						Đăng xuất

					</a>
				</nav>
			</aside>
			<main class="col-md-9">

				<article class="card mb-3" style="border-radius:10px;">
					<div class="card-body">
						<figure class="icontext">
							<div class="icon">
								<img class="rounded-circle img-sm border" src="{{$pf['avatar']}}">
							</div>
							<div class="text">
								<strong>{{$pf['name']}}</strong> <br>
								<p class="mb-2"> {{$pf['email']}}</p>
								<a class="btn btn-light btn-sm"><i class="fa fa-phone text-primary"></i> {{$pf['tel'] ?? ' '}}</a>
							</div>
						</figure>
						<hr>
						<p>
							<i class="fa fa-map-marker text-primary"></i> &nbsp; Địa chỉ của tôi: {{$pf['address'] ?? ' '}} &nbsp;
							<a href="cai-dat" class="btn-link"><button class="btn btn-primary">Chỉnh sửa</button></a>
						</p>
						<article class="card-group card-stat">
							<figure class="card bg">
								<div class="p-3">
									<h4 class="title">{{$pf['total_order']}}</h4>
									<span>Đơn đã đặt</span>
								</div>
							</figure>
							<figure class="card bg">
								<div class="p-3">
									<h4 class="title">{{$pf['total_wishlist']}}</h4>
									<span>Danh sách yêu thích</span>
								</div>
							</figure>
							<figure class="card bg">
								<div class="p-3">
									<h4 class="title">{{$pf['unpaid']}}</h4>
									<span>Chưa Thanh Toán</span>
								</div>
							</figure>
							<figure class="card bg">
								<div class="p-3">
									<h4 class="title">{{$pf['paid']}}</h4>
									<span>Đã Thanh Toán</span>
								</div>
							</figure>
						</article>
					</div>
				</article>

				<article class="card  mb-3" style="border-radius:10px;">
					<div class="card-body">
						<div id="viewAllShow" class="row"></div>
						<div class="col-md-12 text-center mt-3">
							@if(count($pf) > 0)
							<button id="viewAll" class="btn btn-outline-primary btn-block">Xem tất cả đơn đặt hàng</button>
							@else
							<p class="text-primary">Bạn không có đơn hàng nào.</p>
							@endif
						</div>
					</div>
				</article>

			</main>
		</div>

	</div>
</section>

<script>
	$(document).ready(function() {
		var ordersVisible = false;

		$("#viewAll").click(function(e) {
			e.preventDefault();
			if (ordersVisible) {
				$("#viewAllShow").html('');
				$("#viewAll").html('Xem tất cả các đơn đặt hàng <i class="fa fa-chevron-down"></i>');
				ordersVisible = false;
			} else {
				$.ajax({
					url: 'xem-tat-ca',
					type: 'GET',
					dataType: 'JSON',
					success: function(data) {
						console.log(data);
						if (data.viewAll && data.viewAll.length > 0) {
							var html = '';
							for (var count = 0; count < data.viewAll.length; count++) {
								var order = data.viewAll[count];
								html += '<div class="col-md-6">' +
									'<figure class="itemside mb-3">' +
									'<div class="aside"><img src="<?= _WEB_ROOT; ?>/'+order.slug+'" class="border img-sm"></div>' +
									'<figcaption class="info">' +
									'<time class="text-muted"><i class="fa fa-calendar-alt text-primary"></i> ' + order.order_date + '</time>' +
									'<p>' + order.book_name + '</p>' +
									'<p> Số lượng mua: '+order.quantity_product+'</p>'+
									'<span class="text-success">' + order.order_status + '</span>' +
									'</figcaption>' +
									'</figure>' +
									'</div>';
							}

							$('#viewAllShow').html(html);
							$("#viewAll").html('Ẩn tất cả đơn đặt hàng <i class="fa fa-chevron-up"></i>');
							ordersVisible = true;
						}
					},
					error: function(data) {
						console.log(data);
					}
				});
			}
		});
	});
</script>