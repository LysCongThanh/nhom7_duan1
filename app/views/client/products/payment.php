<style>
	.hidden {
		display: none;
	}
</style>
{{print_r(Session::data('carts')) . Session::data('total')}}

<section class="section-content padding-y">
	<div class="container" style="max-width: 720px;">

		<div class="card mb-4">
			<div class="card-body">
				<h4 class="card-title mb-3">Thông tin giao hàng</h4>

				<form action="{{_WEB_ROOT}}checkOut/checkOut" method="post">
					<div class="form-row">
						<div class="form-group col-sm-6">
							<label class="js-check box active">
								<input type="radio" name="dostavka" value="option1" checked="">
								<h6 class="title">Giao hàng tiêu chuẩn</h6>
								<p class="text-muted">Miễn phí giao hàng</p>
							</label>
						</div>
						<div class="form-group col-sm-6">
							<label class="js-check box">
								<input type="radio" name="dostavka" value="option1">
								<h6 class="title">Chuyển phát nhanh</h6>
								<p class="text-muted">Thêm 10.000 sẽ được tính phí</p>
							</label>
						</div>
					</div>

					<div class="form-row">
						<div class="col form-group m-0">
							<label>Địa chỉ</label>
							<?php $index = 1; ?>
							@forEach($data as $key)
							<div class="js-check box mb-2">
								<input type="radio" name="address" value="{{$key['id']}}" onchange="toggleFields(this)">
								<h6 class="title">Địa chỉ {{$index}}</h6>
								<p class="text-muted">{{$key['address']}}</p>
							</div>
							<?php $index++ ?>
							@endforEach
						</div>
					</div>
					<a href="#" class="btn btn-light mb-3" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus"></i>
						<font style="vertical-align: inherit;">
							<font style="vertical-align: inherit;"> Thêm địa chỉ</font>
						</font>
					</a>

					<div class="form-row">
						<div class="form-group col-sm-6">
							<label class="js-check box">
								<input type="radio" name="payment_method" value="vnpay">
								<h6 class="title">VNPAY</h6>
								<p class="text-muted">Thanh toán qua VNPAY</p>
							</label>
						</div>
						<div class="form-group col-sm-6">
							<label class="js-check box">
								<input type="radio" name="payment_method" value="momo">
								<h6 class="title">MOMO</h6>
								<p class="text-muted">Thanh toán qua MOMO</p>
							</label>
						</div>
						<div class="form-group col-sm-6">
							<label class="js-check box active">
								<input type="radio" name="payment_method" value="cash_on_delivery" checked>
								<h6 class="title">Thanh toán khi nhận hàng</h6>
								<p class="text-muted">Thanh toán khi nhận hàng</p>
							</label>
						</div>
					</div>

					<button type="submit" class="btn btn-primary">Gửi</button>
				</form>

			</div>
		</div>

	</div>
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Thêm Địa Chỉ</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="profile/addAddress" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="addressInput">Địa Chỉ</label>
								<input type="text" class="form-control" id="addressInput" name="address" placeholder="Thêm địa chỉ">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="wardsInput">Phường/Xã</label>
								<input type="text" class="form-control" id="wardsInput" name="wards" placeholder="Thêm thành phố">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="districtInput">Quận/Huyện</label>
								<input type="text" class="form-control" id="districtInput" name="district" placeholder="Thêm quận/huyện">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="zipInput">Zip Code</label>
								<input type="text" class="form-control" id="zipInput" name="zip_code" placeholder="Thêm zip code">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="phoneInput">Số Điện Thoại</label>
								<input type="text" class="form-control" id="phoneInput" name="number_phone" placeholder="Thêm số điện thoại">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="cityInput">Thành Phố</label>
								<input type="text" class="form-control" id="cityInput" name="city" placeholder="Thêm quốc gia">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>
					<button type="submit" class="btn btn-primary">Lưu Địa Chỉ</button>
				</div>\
			</form>
		</div>
	</div>
</div>
<script>
	function toggleFields(checkbox) {
		var hiddenRows = document.querySelectorAll('.hidden-row');
		hiddenRows.forEach(function(row) {
			row.classList.toggle('hidden');
		});
	}
	// Phần mã mới sửa đổi để hiện lại các phần tử khi checkbox button không được chọn
	document.addEventListener('DOMContentLoaded', function() {
		var checkboxButtons = document.querySelectorAll('input[type="checkbox"][name="address"]');
		checkboxButtons.forEach(function(checkbox) {
			if (!checkbox.checked) {
				var selectedRow = checkbox.closest('.hidden-row');
				selectedRow.classList.remove('hidden');
			}
		});
	});
</script>