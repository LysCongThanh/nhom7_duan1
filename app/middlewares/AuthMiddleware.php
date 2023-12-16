<?php

class AuthMiddleware extends Middlewares
{
    public function handle()
    {
        $response = new Response();
        // Kiểm tra xem user đã đăng nhập chưa
       if(!isset($_COOKIE['emailAdmin'])) {
            if (Session::data('admin') == null) {
                $response->redirect('dang-nhap');
            }
       }
       
    }
}
