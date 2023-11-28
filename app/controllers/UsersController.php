<?php
//Users Controller
class UsersController extends Controller{
    public $data = [], $model = [], $users, $order, $comment;

    public function __construct()
    {
        $this->users = $this->model('UsersModel');
        $this->order = $this->model('OrdersModel');
        $this->comment = $this->model('CommentsModel');
    }

    public function list()
    {
        $this->data['sub_content']['script_src'] = 'chart_users';
        $this->data['sub_content']['count_ratings'] = $this->comment->ratings();
        $this->data['sub_content']['count_orders'] = $this->order->count_id();
        $this->data['sub_content']['count_price'] = $this->order->count_totalPrice(); 
        $this->data['sub_content']['count_users'] = $this->users->count_users();        
        $this->data['sub_content']['users'] = $this->users->getListUsers();
        $this->data['sub_content']['title'] = 'Danh Sách Người Dùng';
        $this->data['content'] = 'admin/users/list';
        $this->render('layouts/admin_layout', $this->data);
    }
    
}
?>