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
    
    public function send(){
        $number = 0352423133;
        $message = '123';


            $base_url = "w19z6d.api.infobip.com";
            $api_key = "ca786e38f37527b9ebbc6b22ee55d7bc-6cb53683-e96f-4fa1-84ee-49b0dc16be18";
            
            $configuration = new Configuration(host: $base_url, apiKey: $api_key);

            $api = new SmsApi($configuration);
        
            $destination = new SmsDestination($number);
        
            $message = new SmsTextualMessage(
              [$destination],
               $message,
              
            );
        
            $request = new SmsAdvancedTextualRequest([$message]);
        
            $response = $api->sendSmsMessage($request);
       
            }
}