<?php

use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;

class FaceBookController extends Controller
{
    public $users, $fb, $data;

    public function __construct()
    {
        $this->fb = new Facebook([
            'app_id' => '917246696648237',
            'app_secret' => 'c46c8b459a9f047177f6b1cb4fdd6eb7', 
            'default_graph_version' => 'v18.0'
        ]);

        $this->users = $this->model('UsersModel');
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

}
