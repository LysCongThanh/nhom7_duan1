<?php 
use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;



//SMSContrller Controller
class SMSController extends Controller{
    
    public $data = [], $model = [];
    
    public function __construct(){
        //construct
    }
    
    public function send()
    {
        $number = '84352423133';
        $code = $this->generateRandomCode();
    
        $base_url = "xl9vjl.api.infobip.com";
        $api_key = "d02c4de0f379a1d78424fc93b5950486-3027c0a1-7c8e-4bfd-912f-f094e5fed494";
    
        $configuration = new Configuration(host: $base_url, apiKey: $api_key);

        $api = new SmsApi(config: $configuration);
    
        $destination = new SmsDestination(to: $number);
    
        $message = new SmsTextualMessage(
            destinations: [$destination],
            text: $code,
            from: "BOOK SHOP"
        );
    
        $request = new SmsAdvancedTextualRequest(messages: [$message]);
    
        $response = $api->sendSmsMessage($request);
        if($response) {
            Session::data('verification_code', $code);
            Session::data('verification_code_time', time());
            $response = new Response();
            $response->redirect('xac-minh-2-buoc');
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