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
        $this->data['sub_content']['script_src'] = 'chart_dashboard';
        $this->data['sub_content']['best_salers'] = $this->products->best_saler();
        $this->data['sub_content']['count_discounts'] = $this->orders->count_discount();
        $this->data['sub_content']['count_order'] = $this->orders->count_order();
        $this->data['sub_content']['count_price'] = $this->orders->count_totalPrice();
        $this->data['sub_content']['title'] = 'Trang Chủ';
        $this->data['content'] = 'admin/home/home';
        $this->render('layouts/admin_layout', $this->data);
    }
    public function login()
    {
        $this->data['action'] = 'admin/authLogin';
        $this->render('login/sign_in', $this->data);
    }


    public function page()
    {
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
        exit();
    }
    public function authLogin()
    {
        $request = new Request();
        $response = new  Response();
        $dataUser = $request->getFields();
        Session::data('email', $dataUser['email']);
        $admin = $this->users->findUserByEmail($dataUser['email']);
        if ($admin && password_verify($dataUser['password'], $admin['password'])) {

            if (isset($dataUser['remember'])) {
                $expire = time() + 86400 * 30; // 30 days
                setcookie('emailAdmin', $admin['email'], $expire, '/');
            } else {
                setcookie('emailAdmin', '', time() - 3600);
            }
            if ($admin['2_fa_otp'] === '1') {

                $response->redirect('sms/send');
            } else {
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
            }
        } else {
            Session::flash('msg', 'Thông tin đăng nhập không chính xác');
            $response  = new Response();
            $response->redirect('dang-nhap');
        }
    }
    public function updatePassword()
    {
        $id = Session::data('user')['id'];
        $request = new Request();
        $data = $request->getFields();
        $dataPassword = [
            'password' => password_hash($data['new_password'], PASSWORD_BCRYPT),
        ];
        $password = $this->users->findUserById($id);
        if (password_verify($data['old_password'], $password['password'])) {
            $result = $this->users->updateUser($dataPassword, $id);
            if (!$result) {
                Session::flash('msg', 'Thay đổi thông tin người dùng thành công!');
                $response  = new Response();
                $response->redirect('thong-tin-nguoi-dung');
            }
        } else {
            Session::flash('msg', 'Mật khẩu không chinh xác!');
            $response  = new Response();
            $response->redirect('thong-tin-nguoi-dung');
        }
    }
    public function forgotPassword()
    {
        $this->data['action'] = 'admin/resetPassword';
        $this->render('login/forgot_password', $this->data);
    }

    public function resetPassword()
    {
        $id = Session::data('id');
        $request = new Request();
        $data = $request->getFields();
        $dataPassword = [
            'password' => password_hash($data['new_password'], PASSWORD_BCRYPT),
        ];
        $result = $this->users->updateUser($dataPassword, $id);
        if (!$result) {
            Session::flash('msg', 'Thay đổi thông tin người dùng thành công!');
            $response  = new Response();
            $response->redirect('trang-chu');
        }
    }

    public function checkEmail()
    {
        $request = new Request();
        $response = new Response();
        $data = $request->getFields();
        if (isset($data['email'])) {
            $admin = $this->users->findUserByEmail($data['email']);
            $dataUser =  $admin['email'];
            $idUser =  $admin['id'];
            if ($admin) {
                Session::data('email', $dataUser);
                Session::data('id', $idUser);
                Session::data('reset_password', true);
                $response->redirect('sms/send');
            }
        }
        $this->data['action'] = 'admin/register';
        $this->render('login/reset_email', $this->data);
    }

    public function page_register()
    {
        $this->data['action'] = 'admin/register';
        $this->render('login/sign_up', $this->data);
    }

    public function register()
    {
        $request = new Request();
        if ($request->isPost()) {
            $request->rules([
                'email' => 'unique:users:email'
            ]);

            $request->messages([
                'email.unique' => 'Email đã tồn tại'
            ]);

            $validate = $request->validate();

            if (!$validate) {
                Session::flash('msg', 'Đã có lỗi xảy ra vui lòng kiểm tra lại');
                Session::flash('errors', $request->errors());
                Session::flash('old', $request->getFields());

                $response  = new Response();
                $response->redirect('dang-ky');
            }

            $data = $request->getFields();
            $convertedData = array(
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => password_hash($data['password'], PASSWORD_DEFAULT)
            );

            $result = $this->users->insertUser($convertedData);

            if (!$result) {
                $response  = new Response();
                $response->redirect('dang-nhap');
            }
        }
    }

    public function logOut()
    {
        $response = new Response();
        session_destroy();
        $response->redirect('dang-nhap');
    }
}
