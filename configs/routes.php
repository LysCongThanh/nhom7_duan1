<?php
// Admin Routings
$routes['default_controller'] = 'admin';
$routes['dashboard'] = 'admin/page';

$routes['phan-loai'] = 'classify/page';

$routes['them-san-pham'] = 'product/get_product';
$routes['danh-sach-san-pham'] = 'product/list';
$routes['danh-sach-binh-luan'] = 'comments/list';
$routes['sua-san-pham'] = 'product/update';

// Client Routings
$routes['trang-chu'] = 'home/index';

$routes['san-pham-ngang'] = 'clientProducts/product_column';
$routes['chi-tiet-san-pham'] = 'clientProducts/detail';
$routes['thanh-toan'] = 'payments/page';
$routes['gio-hang'] = 'cart/page';
$routes['gioi-thieu'] = 'home/about';
$routes['lien-he'] = 'home/contact';
$routes['dia-chi'] = 'profile/address';
$routes['ca-nhan'] = 'profile/main';
$routes['don-hang'] = 'profile/orders';
$routes['cai-dat'] = 'profile/setting';
$routes['yeu-thich'] = 'profile/wishlist';
// $routes['gioi-thieu'] = 'profile/setting';


$routes['dang-ky'] = 'admin/register';
$routes['dang-nhap'] = 'admin/login';