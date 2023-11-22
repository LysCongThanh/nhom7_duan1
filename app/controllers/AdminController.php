<?php

class AdminController extends Controller
{
    public $user,$order,$product, $data = [];
    public function __construct()
    {
        $this->user = $this->model('UsersModel');
        $this->order = $this->model('OrdersModel');
        $this->product = $this->model('ProductModel');
    }

    public function index()
    {
        $this->data['sub_content']['best_salers'] = $this->product->best_saler();
        $this->data['sub_content']['count_discounts'] = $this->order->count_discount();
        $this->data['sub_content']['count_order'] = $this->order->count_id();
        $this->data['sub_content']['count_price'] = $this->order->count_totalPrice();
        $this->data['sub_content']['title'] = 'Trang Chủ';
        $this->data['content'] = 'admin/home/home';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function login()
    {
        
        $this->data['content'] = 'client/login/sigh_in';
        $this->render('layouts/client_layout', $this->data);
    }

    public function register()
    {
       
        $this->data['content'] = 'client/login/sigh_up';
        $this->render('layouts/client_layout', $this->data);
    }

    public function page()
    {
        $this->data['sub_content']['title'] = 'Trang Chủ';
        $this->data['content'] = 'admin/home/home';
        $this->render('layouts/admin_layout', $this->data);
    }
}