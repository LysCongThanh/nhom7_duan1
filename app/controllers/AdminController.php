<?php

class AdminController extends Controller
{
    public $user, $data = [];
    public function __construct()
    {
        $this->user = $this->model('UsersModel');
    }

    public function index()
    {
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