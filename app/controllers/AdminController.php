<?php

use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;

class AdminController extends Controller
{
    public $products, $orders, $comments, $categories, $checkLogin, $users, $fb, $data;

    public function __construct()
    {
        $this->fb = new Facebook([
            'app_id' => '917246696648237',
            'app_secret' => 'c46c8b459a9f047177f6b1cb4fdd6eb7', 
            'default_graph_version' => 'v18.0'
        ]);
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
        // $this->data['sub_content']['products'] = $this->products->count();
        // $this->data['sub_content']['topProducts'] = $this->products->getListTopProducts();
        // $this->data['sub_content']['categories'] = $this->categories->count();
        // $this->data['sub_content']['users'] = $this->users->count();
        // $this->data['sub_content']['orders'] = $this->orders->count();
        // $this->data['sub_content']['comments'] = $this->comments->getListCommentsNewUpload();
        $this->data['content'] = 'admin/home/home';
        $this->data['sub_content']['title'] = 'Dashboard';
        $this->render('layouts/admin_layout', $this->data);
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

    public function loginGoogle()
    {
        if (isset($_GET['code'])) {

            $code = $_GET['code'];

            $client = new Google\Client();
            $client->setClientId('783078173754-plflf7ldpbkbm4ksno049mb44fgjp602.apps.googleusercontent.com');
            $client->setClientSecret('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');
            $client->setRedirectUri('http://localhost:3000/dang-nhap-google');

            $client->fetchAccessTokenWithAuthCode($code);

            $oauth2Service = new Google\Service\Oauth2($client);
            $userInfo = $oauth2Service->userinfo->get();



            $client->revokeToken($client->getAccessToken());

            $admin = $this->users->findUserByEmail($userInfo->getEmail());
            if ($admin) {
                Session::data('msg', 'Đăng Nhập Thành Công');
                if ($admin['role'] == '1') {
                    Session::data('admin', $admin);
                    $response  = new Response();
                    $response->redirect('dashboard');
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
        } else {
            $client = new Google_Client();
            $client->setClientId('783078173754-plflf7ldpbkbm4ksno049mb44fgjp602.apps.googleusercontent.com');
            $client->setClientSecret('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');
            $client->setRedirectUri('http://localhost:3000/dang-nhap-google');
            $client->addScope('profile');
            $client->addScope('email');


            $authUrl = $client->createAuthUrl();

            // Redirect the user to the Google login page
            header('Location: ' . $authUrl);
            exit;
        }
    }

   
    public function facebookLogin()
    {
        $helper = $this->fb->getRedirectLoginHelper();
        $permissions = ['email']; 

        $loginUrl = $helper->getLoginUrl(_WEB_ROOT . '/facebook-callback', $permissions); 
        
        header('Location: ' . $loginUrl);
        exit();
    }

    public function facebookCallback()
    {
        if (isset($_SESSION['facebook_access_token'])) {
            // Xóa dữ liệu đăng nhập cũ ở đây
            unset($_SESSION['facebook_access_token']);
        }
      
        $helper = $this->fb->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken(); 

            if (isset($accessToken)) {
                $_SESSION['facebook_access_token'] = (string) $accessToken; 

                $response = $this->fb->get('/me?fields=id,name,email, picture', $accessToken);
                $userData = $response->getGraphUser();

                // In thông tin người dùng
                $dataUser = [
                    'facebook_id' => $userData->getId(),
                    'name' => $userData->getName(),
                    'email' => $userData->getEmail(),
                    'role' => 1,
                    'password' => '123',
                    'avatar' => $userData->getPicture()->getUrl(),
                ];
                $checkLogin = $this->users->findUser('facebook_id',  $dataUser['facebook_id']);
                if($checkLogin)  
                {
                    Session::data('admin', $checkLogin);
                    $response  = new Response();
                    $response->redirect('dashboard');
                } else {

                    $result = $this->users->insertUser($dataUser);
                    if (!$result) {
                        $dataUser = $this->users->findUser('facebook_id',  $dataUser['facebook_id']);
                        Session::data('admin', $dataUser);
                        $response  = new Response();
                        $response->redirect('dashboard');
                        
                    }
                }
               
               
            }
        } catch (FacebookResponseException $e) {
            echo 'Lỗi API Facebook: ' . $e->getMessage();
        } catch (FacebookSDKException $e) {
            echo 'Lỗi SDK Facebook: ' . $e->getMessage();
        }
    }

    public function logout()
    {
        // Thay thế Session::delete() bằng Session::data()

        Session::delete('admin');
        $response  = new Response();
        $response->redirect('admin/login');
    }
}
