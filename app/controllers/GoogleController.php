<?php

class GoogleController extends Controller
{
    public $users, $data;

    public function __construct()
    {
        $this->users = $this->model('UsersModel');
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

}
