<?php

use RobThree\Auth\TwoFactorAuth;
use chillerlan\QRCode\QRCode;

//QrController Controller
class QrController extends Controller
{

    public $data = [], $model = [];

    public function __construct()
    {
        //construct
    }

    public function index()
    {

        $tfa = new TwoFactorAuth('Tên ứng dụng của bạn');
        $secret = $tfa->createSecret();

        $qrCodeUrl = $tfa->getQRCodeImageAsDataUri('Tên người dùng', $secret);
        $code = $tfa->getCode($secret);
        Session::data('qr_code', $code);
        $this->data['qr_code'] = $qrCodeUrl;
        $this->render('2-step/qr', $this->data);
    }
}
