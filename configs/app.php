<?php

$config['app'] = [
    'service' => [
        HtmlHelper::class
    ],
    'routeMiddleware' => [
        'dashboard' => AuthMiddleware::class,
        'them-san-pham' => AuthMiddleware::class,
        'danh-sach-san-pham' => AuthMiddleware::class,
        'danh-sach-nguoi-dung' => AuthMiddleware::class,
        'danh-sach-don-hang' => AuthMiddleware::class,
        'them-nguoi-dung' => AuthMiddleware::class,
        'sua-san-pham' => AuthMiddleware::class,
        'san-pham-chi-tiet' => AuthMiddleware::class,
        'thong-tin-nguoi-dung' => AuthMiddleware::class,
        'chi-tiet-don-hang' => AuthMiddleware::class,
        'tra-loi-binh-luan' => AuthMiddleware::class,
        'xoa-binh-luan' => AuthMiddleware::class,
        'load-rating' => AuthMiddleware::class,
        'them-binh-luan' => AuthMiddleware::class,
        'yeu-thich' => AuthMiddleware::class,
        'cai-dat' => AuthMiddleware::class,
        'cap-nhat-ca-nhan' => AuthMiddleware::class,
        'xem-tat-ca' => AuthMiddleware::class,
        'ca-nhan' => AuthMiddleware::class,
        'dia-chi' => AuthMiddleware::class,
        'thanh-toan-thanh-cong' => AuthMiddleware::class,
        'thanh-toan-momo' => AuthMiddleware::class,
        'thanh-toan-vnpay' => AuthMiddleware::class,
        'don-hang' => AuthMiddleware::class,
        'thanh-toan' => AuthMiddleware::class,
        'default_controller' => AuthMiddleware::class,

    ],
    'globalMiddleware' => [
        ParamsMiddleware::class
    ],
    'boot' => [
        AppServiceProvider::class,
    ]
];