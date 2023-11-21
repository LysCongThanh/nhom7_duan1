<?php
// Admin Routings
$routes['default_controller'] = 'admin/page';
$routes['dashboard'] = 'admin/page';

$routes['phan-loai'] = 'classify/page';

$routes['categories/add'] = 'classify/add_category';
$routes['authors/add'] = 'classify/add_author';
$routes['publishers/add'] = 'classify/add_publisher';
$routes['them-san-pham'] = 'product/get_product';
$routes['danh-sach-san-pham'] = 'product/list';
$routes['danh-sach-binh-luan'] = 'comments/list';

$routes['categories/edit'] = 'categories/edit_category';
$routes['authors/edit'] = 'categories/edit_author';
$routes['publishers/edit'] = 'categories/edit_publisher';

$routes['categories/delete'] = 'categories/delete_category';
$routes['authors/delete'] = 'categories/delete_author';
$routes['publishers/delete'] = 'categories/delete_publisher';
// Client Routings
$routes['trang-chu'] = 'home/index';
// $routes['san-pham'] = 'clientProducts/page';
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
$routes['dang-nhap'] = 'admin/index';


