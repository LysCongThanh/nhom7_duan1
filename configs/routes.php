<?php
// Admin Routings
$routes['default_controller'] = 'admin';
$routes['dashboard'] = 'admin/page';
$routes['trang-chu'] = 'home/index';
$routes['trang-san-pham-hang']  = 'home/product_row';
$routes['trang-san-pham-cot'] = 'home/product_column';
$routes['trang-san-pham-chi-tiet'] = 'home/product_detail';
$routes['trang-gio-hang'] = 'home/shopping_cart';
$routes['trang-thanh-toan'] = 'home/payment';
$routes['trang-lien-he'] = 'home/contact';
$routes['trang-gioi-thieu'] = 'home/about';
$routes['trang-ca-nhan'] = 'home/profile_main';
$routes['trang-ca-nhan-dia-chi'] = 'home/profile_address';
$routes['trang-ca-nhan-don-hang'] = 'home/profile_order';
$routes['trang-ca-nhan-yeu-thich'] = 'home/profile_wishlist';
$routes['trang-ca-nhan-cai-dat'] = 'home/profile_setting';
$routes['trang-dang-nhap'] = 'home/sign_in';
$routes['trang-dang-ki'] = 'home/sign_up';



$routes['phan-loai'] = 'classify/page';

$routes['them-san-pham'] = 'product/get_product';
$routes['danh-sach-san-pham'] = 'product/list';
$routes['danh-sach-binh-luan'] = 'comments/list';

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