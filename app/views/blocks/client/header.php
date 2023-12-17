<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Trang chủ</title>

<link href="<?= _WEB_ROOT; ?>/public/assets/client/image/favicon.ico" rel="shortcut icon" type="image/x-icon">

<!-- jQuery -->
<script src="<?= _WEB_ROOT; ?>/public/assets/client/js/jquery-2.0.0.min.js" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="<?= _WEB_ROOT; ?>/public/assets/client/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<link href="<?= _WEB_ROOT; ?>/public/assets/client/css/bootstrap.css" rel="stylesheet" type="text/css"/>

<!-- Font awesome 5 -->
<link href="<?= _WEB_ROOT; ?>/public/assets/client/fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">

<!-- custom style -->
<link href="<?= _WEB_ROOT; ?>/public/assets/client/css/ui.css" rel="stylesheet" type="text/css"/>
<link href="<?= _WEB_ROOT; ?>/public/assets/client/css/responsive.css" rel="stylesheet" type="text/css" />

<!-- custom javascript -->
<script src="<?= _WEB_ROOT; ?>/public/assets/client/js/script.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>
<body>

	<header class="section-header">
		<section class="header-main border-bottom">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-xl-2 col-lg-3 col-md-12">
						<a href="http://bootstrap-ecommerce.com" class="brand-wrap">
							<img class="logo" src="<?= _WEB_ROOT; ?>/public/assets/client/image/logo.png">
						</a> <!-- brand-wrap.// -->
					</div>
					<div class="col-xl-6 col-lg-5 col-md-6">
						<form action="tim-kiem" class="search-header">
							<div class="input-group w-100">
								<select class="custom-select border-right" name="category_name" fdprocessedid="wwpxc8">
										<option value="">Tất cả</option><option value="codex">Đặc biệt</option>
										<option value="comments">Tốt nhất</option>
										<option value="content">Cũ nhất</option>
								</select>
								<input type="text" class="form-control" placeholder="Tìm....." fdprocessedid="69y6pw" name="search">
								
								<div class="input-group-append">
								  <button class="btn btn-primary" type="submit" fdprocessedid="7tftyw">
									<i class="fa fa-search"></i> Tìm kiếm
								  </button>
								</div>
							</div>
						</form> <!-- search-wrap .end// -->
					</div> <!-- col.// -->
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="widgets-wrap float-md-right">
							<div class="widget-header mr-3">
								<a href="ca-nhan" class="widget-view">
									<div class="icon-area">
										<i class="fa fa-user"></i>
										<span class="notify">0</span>
									</div>
									<small class="text">Cá Nhân </small>
								</a>
							</div>
							<div class="widget-header mr-3">
								<a href="#" class="widget-view">
									<div class="icon-area">
										<i class="fa fa-comment-dots"></i>
										<span class="notify">1</span>
									</div>
									<small class="text"> Thông báo </small>
								</a>
							</div>
							<div class="widget-header mr-3">
								<a href="don-hang" class="widget-view">
									<div class="icon-area">
										<i class="fa fa-store"></i>
									</div>
									<small class="text"> Đơn hàng </small>
								</a>
							</div>
							<div class="widget-header">
								<a href="gio-hang" class="widget-view">
									<div class="icon-area">
										<i class="fa fa-shopping-cart"></i>
									</div>
									<small class="text"> Giỏ Hàng </small>
								</a>
							</div>
						</div> <!-- widgets-wrap.// -->
					</div> <!-- col.// -->
				</div> <!-- row.// -->
			</div> <!-- container.// -->
		</section> <!-- header-main .// -->
		
		
		<nav class="navbar navbar-main navbar-expand-lg border-bottom">
		  <div class="container">
		
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
		
			<div class="collapse navbar-collapse" id="main_nav">
			  <ul class="navbar-nav">
				<li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"> <i class="fa fa-bars text-muted mr-2"></i> Thể Loại </a>
				  <div class="dropdown-menu">
					<a class="dropdown-item" href="#">Sách tiểu thuyết</a>
					<a class="dropdown-item" href="#">Sách khoa học viễn tưởng</a>
					<a class="dropdown-item" href="#">Sách thiếu nhi</a>
					<a class="dropdown-item" href="#">Sách phiêu lưu</a>
					<a class="dropdown-item" href="#">Sách lịch sử</a>
					<a class="dropdown-item" href="#">Sách khoa học xã hội</a>
					<a class="dropdown-item" href="#">Sách hướng dẫn</a>
				  </div>
				</li>
	
				  <li class="nav-item">
				   <a class="nav-link" href="trang-chu">Trang chủ</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="san-pham-ngang">Cửa hàng</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="gioi-thieu">Giới thiệu</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="lien-he">Liên hệ</a>
				</li>
				
			  </ul>
			  <ul class="navbar-nav ml-md-auto">
					<li class="nav-item">
					<!-- <a class="nav-link" href="#">Get the app</a> -->
				  </li>
				  <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="http://example.com" data-toggle="dropdown">Tiếng Việt</a>
					<div class="dropdown-menu dropdown-menu-right">
					  <a class="dropdown-item" href="#">Tiếng Anh</a>
					  <a class="dropdown-item" href="#">Tiếng Nga</a>
					  <a class="dropdown-item" href="#">Tiếng Nhật</a>
					  <a class="dropdown-item" href="#">Tiếng Tây Ban Nha</a>
					</div>
				  </li>
			   </ul>
			</div> <!-- collapse .// -->
		  </div> <!-- container .// -->
		</nav>
	</header>
	<!-- section-header.// -->