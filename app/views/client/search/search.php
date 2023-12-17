<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
	<div class="container">
	
	<!-- ============================  FILTER TOP  ================================= -->
	<div class="card mb-3">
		<div class="card-body">
	<div class="row">
		
		<nav class="col-md-8"> 
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Trang chủ</font></font></a></li>
			<li class="breadcrumb-item"><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Trang Sản Phẩm</font></font></a></li>
		</ol>  
		</nav> <!-- col.// -->
	</div> <!-- row.// -->
	<hr>
	<!-- id="filterForm" -->
	<form action="loc-san-pham" method="get" id="filter-form">
	<div class="row">
		<div class="col-md-2 mt-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lọc bởi</font></font></div> <!-- col.// -->
		<div class="col-md-10"> 
			<ul class="list-inline">
			  <li class="list-inline-item font-weight-bold mr-4 dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Loại Sách</font></font></a>
				<div class="dropdown-menu p-3" style="max-width:400px;">	
                @foreach($categories as $categorie)
				  <label class="form-check">
					   <input type="radio" name="id_category" class="form-check-input" value="{{$categorie['id']}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$categorie['name']}}
				  </font></font></label>
                @endforeach
				</div> <!-- dropdown-menu.// -->
			  </li>
			  <li class="list-inline-item font-weight-bold mr-4 dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nhà Xuất Bản</font></font></a>
				<div class="dropdown-menu p-3" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 20px, 0px);">	
				  @foreach($publisher as $nxb)
				  <label class="form-check">
					   <input type="radio" name="id_publisher" class="form-check-input" value="{{$nxb['id']}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$nxb['name']}}
				  </font></font></label>
				  @endforeach
				</div> <!-- dropdown-menu.// -->
			  </li>
			  <li class="list-inline-item font-weight-bold mr-4 dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tác Giả</font></font></a>
			  <div class="dropdown-menu p-3" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 20px, 0px);">	
				@foreach($authors as $author)
				<label class="form-check">
					   <input type="radio" name="id_author" class="form-check-input" value="{{$author['id']}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$author['name']}}
				  </font></font></label>
				@endforeach
			  </div> <!-- dropdown-menu.// -->
			</li>
			 
			  <li class="list-inline-item font-weight-bold mr-4">
				  <div class="form-inline">
					  <label class="mr-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Giá</font></font></label>
					<input class="form-control form-control-sm" placeholder="Tối Thiểu" type="number" fdprocessedid="66g3lr" min="{{$getPrice['min']}}" max="{{$getPrice['max']}}" value="{{$getPrice['min']}}" name="min">
						<span class="px-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">-</font></font></span>
					<input class="form-control form-control-sm" placeholder="Tối Đa" type="number" fdprocessedid="l1m6gg" max="{{$getPrice['max']}}" min="{{$getPrice['min']}}" value="{{$getPrice['max']}}" name="max">
					<button type="submit" id="filterData" class="btn btn-primary btn-o ml-2 " fdprocessedid="kxjf4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Áp Dụng</font></font></button>
				</div>
			  </li>
			</ul>
		</div> <!-- col.// -->
	</div> <!-- row.// -->
	</form>
		</div> <!-- card-body .// -->
	</div> <!-- card.// -->
	<!-- ============================ FILTER TOP END.// ================================= -->
	<?php $totalQuantityFound = 0; ?>
	@foreach($search as $quantity)
	<?php $totalQuantityFound = $totalQuantityFound + $quantity['quantityFound']; ?>
	@endforeach
	<header class="mb-3">
			<div class="form-inline">
				@if(isset($totalQuantityFound))
				<strong class="mr-md-auto"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$totalQuantityFound}} mặt hàng được tìm thấy</font></font></strong>
				@else
				<strong class="mr-md-auto"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0 mặt hàng được tìm thấy</font></font></strong>
				@endif
				<select class="mr-2 form-control" fdprocessedid="2jpit">
					<option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mục mới nhất</font></font></option>
					<option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Xu hướng</font></font></option>
					<option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Phổ biến nhất</font></font></option>
					<option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Rẻ nhất</font></font></option>
				</select>
				<div class="btn-group">
					<a href="san-pham" class="btn btn-light active" data-toggle="tooltip" title="" data-original-title="Chế độ hiển thị theo hàng ngang"> 
						<i class="fa fa-th"></i></a>
					<a href="san-pham-ngang" class="btn btn-light" data-toggle="tooltip" title="" data-original-title="Chế độ hiển thị theo hàng cột"> 
						<i class="fa fa-bars"></i></a>
				</div>
			</div>
	</header><!-- sect-heading -->
	<div class="row">
	@foreach($search as $key)
		<div class="col-md-3">
			<figure class="card card-product-grid">
				<div class="img-wrap"> 
					<span class="badge badge-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">MỚI</font></font></span>
					<img src="<?= _WEB_ROOT; ?>{{$key['slug_image']}}">
				</div> <!-- img-wrap.// -->
				<figcaption class="info-wrap">
						<a href="#" class="title mb-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit; font-weight: bolder;">{{$key['name']}}</font></font></a>
						<div class="price-wrap">
							<span class="price"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$key['price']}} đ</font></font></span> 
							<small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">/ 1 cuốn</font></font></small>
						</div> <!-- price-wrap.// -->
				
						<p class="text-muted "><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$key['categorie']}}</font></font></p>
					   
						<hr>
				
						<a href="#" class="btn btn-outline-primary" id="{{$key['id']}}" onclick="sendCartData(event)"><i class="fa fa-shopping-cart"></i>
							<font style="vertical-align: inherit;">
							<font style="vertical-align: inherit;"> Thêm vào giỏ hàng</font></font></a>
							<a data-original-title="Save to Wishlist" title="" href="#" class="btn btn-light" data-toggle="tooltip" onclick="sendData(event)" id="{{$key['id']}}"><i class="fa fa-heart"></i></a>

				</figcaption>
			</figure>
		</div> <!-- col.// -->
	@endforeach
	</div> <!-- row end.// -->
	<nav class="mb-4" aria-label="Mẫu điều hướng trang">
	  <ul class="pagination">
		<li class="page-item disabled"><a class="page-link" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Trước</font></font></a></li>
		<li class="page-item active"><a class="page-link" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1</font></font></a></li>
		<li class="page-item"><a class="page-link" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2</font></font></a></li>
		<li class="page-item"><a class="page-link" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">3</font></font></a></li>
		<li class="page-item"><a class="page-link" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">4</font></font></a></li>
		<li class="page-item"><a class="page-link" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5</font></font></a></li>
		<li class="page-item"><a class="page-link" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Kế tiếp</font></font></a></li>
	  </ul>
	</nav>
	
	</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->