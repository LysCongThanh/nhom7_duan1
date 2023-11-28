<?php

$config['app'] = [
    'service' => [
        HtmlHelper::class
    ],
    'routeMiddleware' => [
        'dashboard' => AuthMiddleware::class,
        // 'them-san-pham' => AuthMiddleware::class,
        // 'danh-sach-san-pham' => AuthMiddleware::class,
        // 'danh-sach-nguoi-dung' => AuthMiddleware::class,
        // 'danh-sach-don-hang' => AuthMiddleware::class,
        // 'them-nguoi-dung' => AuthMiddleware::class,

    ],
    'globalMiddleware' => [
        ParamsMiddleware::class
    ],
    'boot' => [
        AppServiceProvider::class,
    ]
];