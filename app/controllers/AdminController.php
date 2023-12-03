<?php

class AdminController extends Controller
{
    public $products, $orders, $comments, $categories, $checkLogin, $users, $fb, $data = [];

    public function __construct()
    {
        $this->products = $this->model('ProductModel');
        $this->categories = $this->model('CategoriesModel');
        $this->users = $this->model('UsersModel');
        $this->orders = $this->model('OrdersModel');
        $this->comments = $this->model('CommentsModel');
    }

    public function index()
    {
        $this->login();
    }
    public function login()
    {
        $this->data['action'] = 'admin/authLogin';
        $this->render('login/sign_in', $this->data);
    }


    public function page()
    {
        // if(isset($_GET["numberOfDays"]) && $_GET["groupBy"])
        // {
        //     $numberOfDays = $_GET["numberOfDays"];
        //     $groupBy = $_GET["groupBy"];
        //     $balanceStats = $this->orders->getBalanceStats($numberOfDays, $groupBy);
    
        //     // Trả về kết quả dưới dạng JSON
        //     header("Content-Type: application/json");
        //     echo json_encode($balanceStats);
        //     return; // Kết thúc xử lý
    
        // } else {
        //     $numberOfDays = 365;
        //     $this->data['sub_content']['balanceStats'] = $this->orders->getBalanceStats($numberOfDays, "month");
        // }
        $this->data['sub_content']['script_src'] = 'chart_dashboard';
        $this->data['sub_content']['best_salers'] = $this->products->best_saler();
        $this->data['sub_content']['count_discounts'] = $this->orders->count_discount();
        $this->data['sub_content']['count_order'] = $this->orders->count_order();
        $this->data['sub_content']['count_price'] = $this->orders->count_totalPrice();
        $this->data['sub_content']['title'] = 'Trang Chủ';
        $this->data['content'] = 'admin/home/home';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function getChartData()
    {
        $request = new Request();
        $data = $request->getFields();
        $salesData = $this->orders->getBalanceStats($data['numberOfDays'], $data['groupBy']);
        // Gửi dữ liệu dưới dạng JSON
        header("Content-Type: application/json");
        echo json_encode([
            'salesData' => $salesData,   
        ]);
        exit(); // Kết thúc xử lý
    }
    public function authLogin()
    {
        $request = new Request();
        $dataUser = $request->getFields();
        $admin = $this->users->findUserByEmail($dataUser['email']);
        if ($admin && password_verify($dataUser['password'], $admin['password'])) {

            if (isset($_POST['remember'])) {
                setcookie('emailAdmin', $admin['email'], time() + 20);
                setcookie('passwordAdmin', $admin['password'], time() + 20);
            }
            Session::data('msg', 'Đăng Nhập Thành Công');
            if ($admin['role'] == 1) {
                Session::data('admin', $admin);
                $response  = new Response();
                $response->redirect('dashboard');
            } else {
                Session::data('user', $admin);
                $response  = new Response();
                $response->redirect('trang-chu');
            }
        } else {
            Session::flash('msg', 'Thông tin đăng nhập không chính xác');
            $response  = new Response();
            $response->redirect('dang-nhap');
        }
    }
}