<?php

class AdminController extends Controller
{
    public $products, $orders, $comments, $categories, $checkLogin, $users, $data;

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
        $this->render('admin/login/sign_in', $this->data);
    }

    public function page()
    {
        $this->data['content'] = 'admin/home/home';
        $this->data['sub_content']['title'] = 'Dashboard';
        $this->render('layouts/admin_layout', $this->data);
    }
    public function authLogin()
    {
        $request = new Request();
        print_r($request->getFields());
        die();
        $admin = $this->users->findUserByEmail($request->input('email'));
        if ($admin && password_verify($request->input('password'), $admin['password'])) {

            if (isset($_POST['remember'])) {
                setcookie('emailAdmin', $admin['email'], time() + 20);
                setcookie('passwordAdmin', $admin['password'], time() + 20);
            }
            Session::data('msg', 'Đăng Nhập Thành Công');
            if ($admin['role'] == 'admin') {
                Session::data('admin', $admin);
                $response  = new Response();
                $response->redirect('trang-chu');
            } else {
                Session::data('user', $admin);
                $response  = new Response();
                $response->redirect('ds-san-pham');
            }
        } else {
            Session::flash('msg', 'Thông tin đăng nhập không chính xác');
            $response  = new Response();
            $response->redirect('dang-nhap');
        }
        
    }

    // public function loginGoogle()
    // {
    //     if (isset($_GET['code'])) {
    
    //         $code = $_GET['code'];
    
    //         $client = new Google\Client();
    //         $client->setClientId('783078173754-plflf7ldpbkbm4ksno049mb44fgjp602.apps.googleusercontent.com');
    //         $client->setClientSecret('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');
    //         $client->setRedirectUri('http://localhost:3000/dang-nhap-google');
    
    //         $client->fetchAccessTokenWithAuthCode($code);
    
    //         $oauth2Service = new Google\Service\Oauth2($client);
    //         $userInfo = $oauth2Service->userinfo->get();
    
            

    //         $client->revokeToken($client->getAccessToken());
    
    //         $admin = $this->users->findUserByEmail($userInfo->getEmail());
    //         if ($admin) {
    //             Session::data('msg', 'Đăng Nhập Thành Công');
    //             if ($admin['role'] == 'admin') {
    //                 Session::data('admin', $admin);
    //                 $response  = new Response();
    //                 $response->redirect('trang-chu');
    //             } else {
    //                 Session::data('user', $admin);
    //                 $response  = new Response();
    //                 $response->redirect('ds-san-pham');
    //             }
    //         } else {
    //             Session::flash('msg', 'Thông tin đăng nhập không chính xác');
    //             $response  = new Response();
    //             $response->redirect('dang-nhap');
    //         }
    //     } else {
    //         $client = new Google_Client();
    //         $client->setClientId('783078173754-plflf7ldpbkbm4ksno049mb44fgjp602.apps.googleusercontent.com');
    //         $client->setClientSecret('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');
    //         $client->setRedirectUri('http://localhost:3000/dang-nhap-google');
    //         $client->addScope('profile');
    //         $client->addScope('email');
    
        
    //         $authUrl = $client->createAuthUrl();
    
    //         // Redirect the user to the Google login page
    //         header('Location: ' . $authUrl);
    //         exit;
    //     }
    // }
    public function logout()
    {
        // Thay thế Session::delete() bằng Session::data()

        Session::delete('admin');
        $response  = new Response();
        $response->redirect('admin/login');
    }
}
