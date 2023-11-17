<?php
// Admin Routings
$routes['dashboard'] = 'admin/page';
$routes['/'] = 'categories/test';
$routes['phan-loai'] = 'categories/page';

$routes['categories/add'] = 'categories/add_category';
$routes['authors/add'] = 'categories/add_author';
$routes['publishers/add'] = 'categories/add_publisher';
$routes['them-san-pham'] = 'product/get_product';
$routes['danh-sach-san-pham'] = 'product/list';
$routes['danh-sach-binh-luan'] = 'comments/list';
$routes['phan-loai'] = 'classify/list';

$routes['categories/edit'] = 'categories/edit_category';
$routes['authors/edit'] = 'categories/edit_author';
$routes['publishers/edit'] = 'categories/edit_publisher';

$routes['categories/delete'] = 'categories/delete_category';
$routes['authors/delete'] = 'categories/delete_author';
$routes['publishers/delete'] = 'categories/delete_publisher';
// Client Routings