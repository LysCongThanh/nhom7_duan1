<?php
// Admin Routings
$routes['default_controller'] = 'admin';
$routes['dashboard'] = 'admin/page';

$routes['phan-loai'] = 'classify/page';

$routes['them-san-pham'] = 'product/get_product';
$routes['them-nguoi-dung'] = 'users/get_user';
$routes['danh-sach-nguoi-dung'] = 'users/list';
$routes['thong-tin-nguoi-dung'] = 'users/profile';


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
$routes['dang-nhap-google'] = 'admin/loginGoogle';
$routes['facebook-login'] = 'admin/facebookLogin';
$routes['facebook-callback'] = 'admin/facebookCallback';
