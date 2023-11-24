<?php
//Users Controller
class UsersController extends Controller{
    public $data = [], $model = [], $users;

    public function __construct()
    {
        $this->users = $this->model('UsersModel');
    }

    public function list()
    {
        $this->data['sub_content']['users'] = $this->users->getListUsers();
        $this->data['sub_content']['title'] = 'Danh Sách Người Dùng';
        $this->data['content'] = 'admin/users/list';
        $this->render('layouts/admin_layout', $this->data);
    }
    
}
?>