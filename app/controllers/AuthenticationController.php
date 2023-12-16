<?php

use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;



//SMSContrller Controller
class AuthenticationController extends Controller
{

    public $data = [], $model = [], $users;

    public function __construct()
    {
        //construct
        $this->users = $this->model('UsersModel');
    }

    public function index()
    {
        $this->data['action'] = 'authentication/verifyCode';
        $this->render('2-step/2_step', $this->data);
    }

    public function verifyCode()
    {
        $request = new Request();
        $response = new  Response();
        $check_code = $request->getFields();
        $admin = $this->users->findUserByEmail(Session::data('email'));
        if (Session::data('verification_code')) {
            $code = Session::data('verification_code');
            if ($code === $check_code['combinedValue']) {
                if (Session::data('reset_password') == '1') {
                    echo Session::data('reset_password');
                    die();
                    $response->redirect('quen-mat-khau');
                } else if (!Session::data('user') || !Session::data('admin')) {
                    if ($admin['2_fa_qr'] === '1') {
                        $response->redirect('xac-minh-ung-dung');
                    } else {
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
                    if (Session::data('user')) {
                        $id = Session::data('user')['id'];
                    } else {
                        $id = Session::data('admin')['id'];
                    }
                    $dataUser = [
                        '2_fa_otp' => 1
                    ];
                    $this->users->updateUser($dataUser, $id);
                    $response->redirect('thong-tin-nguoi-dung');
                }
            } else {
                $response->redirect('xac-minh-2-buoc');
            }

            if (time() -  Session::data('verification_code_time') >= 60) {
                Session::delete('verification_code');
                Session::delete('verification_code_time');
            }
        }
    }

    public function verifyCodeQr()
    {
        $request = new Request();
        $response = new  Response();
        $check_code = $request->getFields();
        $admin = $this->users->findUserByEmail(Session::data('email'));
        if (Session::data('qr_code')) {
            $code = Session::data('qr_code');
            if ($code === $check_code['combinedValue']) {
                if (!Session::data('user') || !Session::data('admin')) {
                    if ($admin['role'] == 1) {
                        Session::data('admin', $admin);
                        $response->redirect('dashboard');
                    } else {
                        Session::data('user', $admin);
                        $response->redirect('trang-chu');
                    }
                } else {
                    if (Session::data('user')) {
                        $id = Session::data('user')['id'];
                    } else {
                        $id = Session::data('admin')['id'];
                    }
                    $dataUser = [
                        '2_fa_qr' => 1
                    ];
                    $this->users->updateUser($dataUser, $id);
                    $response->redirect('thong-tin-nguoi-dung');
                }
            } else {
                $response->redirect('xac-minh-ung-dung');
            }
        }
    }

    public function generateRandomCode()
    {
        $characters = '0123456789';
        $code = '';

        for ($i = 0; $i < 4; $i++) {
            $randomIndex = rand(0, strlen($characters) - 1);
            $code .= $characters[$randomIndex];
        }

        return $code;
    }
}
