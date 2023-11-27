<?php
//Order Controller
class OrderController extends Controller{
    public $data = [], $model = [], $orders;

    public function __construct()
    {
        $this->orders = $this->model('OrdersModel');
    }

    public function list()
    {
        $this->data['sub_content']['orders'] = $this->orders->getOrders();
        $this->data['sub_content']['title'] = 'Danh Sách Đơn Hàng';
        $this->data['content'] = 'admin/orders/list';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function orders_detail(){
        $id = $_GET['id'];
        
        $this->data['sub_content']['detail'] = $this->orders->getOrdersDetail($id);
        $this->data['sub_content']['title'] = 'Đơn Hàng Chi Tiết';
        $this->data['content'] = 'admin/orders/detail';
        $this->render('layouts/admin_layout', $this->data);
    }
    
}
?>