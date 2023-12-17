<?php
// Admin Routings
$routes['default_controller'] = 'admin';
$routes['dashboard'] = 'admin/page';

$routes['phan-loai'] = 'classify/page';

$routes['them-san-pham'] = 'product/get_product';
$routes['danh-sach-san-pham'] = 'product/list';
$routes['sua-san-pham'] = 'product/update';
$routes['san-pham-chi-tiet'] = 'product/detail';

$routes['danh-sach-binh-luan'] = 'comments/list';
$routes['xoa-binh-luan'] = 'comments/delete';
$routes['tra-loi-binh-luan'] = 'comments/replyComment';

$routes['danh-sach-don-hang'] = 'order/list';
$routes['chi-tiet-don-hang'] = 'order/orders_detail';

$routes['them-nguoi-dung'] = 'users/get_user';
$routes['danh-sach-nguoi-dung'] = 'users/list';
$routes['thong-tin-nguoi-dung'] = 'users/profile';

// Client Routings
$routes['trang-chu'] = 'home/index';

$routes['tim-kiem'] = 'clientProducts/search';
$routes['san-pham-ngang'] = 'clientProducts/product_columns';
$routes['chi-tiet-san-pham'] = 'clientProducts/detail';
$routes['thanh-toan'] = 'checkOut/page';
$routes['don-hang'] = 'profile/orders';

$routes['thanh-toan-vnpay'] = 'checkOut/vnPay';
$routes['thanh-toan-momo'] = 'checkOut/momo';
$routes['thanh-toan-thanh-cong'] = 'checkOut/page_completed';



$routes['gio-hang'] = 'cart/page';
$routes['gioi-thieu'] = 'home/about';
$routes['lien-he'] = 'home/contact';
$routes['dia-chi'] = 'profile/address';
$routes['ca-nhan'] = 'profile/main';
$routes['xem-tat-ca'] = 'profile/showAllOrder';
$routes['cap-nhat-ca-nhan'] = 'profile/updateProfile';
$routes['cai-dat'] = 'profile/setting';
$routes['yeu-thich'] = 'profile/wishlist';


$routes['them-binh-luan'] = 'comments/insertComment';
$routes['load-rating'] = 'comments/load_Rating';

$routes['dang-ky'] = 'admin/page_register';
$routes['dang-nhap-google'] = 'google/loginGoogle';
$routes['dang-nhap'] = 'admin/login';
$routes['quen-mat-khau'] = 'admin/forgotPassword';
$routes['kiem-tra-email'] = 'admin/checkEmail';
$routes['facebook-login'] = 'faceBook/facebookLogin';
$routes['facebook-callback'] = 'faceBook/facebookCallback';
$routes['xac-minh-2-buoc'] = 'authentication';
$routes['xac-minh-ung-dung'] = 'qr';