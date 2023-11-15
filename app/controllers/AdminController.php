<?php

class AdminController extends Controller
{
    public $user, $data = [];
    public function __construct()
    {
        $this->user = $this->model('UsersModel');
    }

    public function login()
    {

    }

    public function logout()
    {

    }

    public function page()
    {
        $this->data['sub_content']['title'] = 'Hello ní';
        $this->data['content'] = 'admin/home/home';
        $this->render('layouts/admin_layout', $this->data);
    }
}