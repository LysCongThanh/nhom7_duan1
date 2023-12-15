<?php
//PaymentsCotroller Controller
class CheckOutController extends Controller
{

    public $data = [], $model = [], $users, $contacts, $addresses, $orders, $orders_detail, $carts, $products, $shipping, $payments;

    public function __construct()
    {
        //construct
        $this->users = $this->model('UsersModel');
        $this->products = $this->model('ProductModel');
        $this->addresses = $this->model('AddressesModel');
        $this->contacts = $this->model('ContactsModel');
        $this->orders = $this->model('OrdersModel');
        $this->orders_detail = $this->model('OrderDetailModel');
        $this->carts = $this->model('CartModel');
        $this->shipping = $this->model('ShippingModel');
        $this->payments = $this->model('PaymentsModel');
    }

    public function index()
    {
    }

    public function page()
    {
        $id = Session::data('user')['id'];
        $this->data['sub_content']['data'] = $this->addresses->getListAddresses($id);
        $this->data['content'] = 'client/products/payment';
        $this->render('layouts/client_layout', $this->data);
    }

    public function page_completed()
    {
        if(isset($_GET['vnp_ResponseCode'])) {
            if ($_GET['vnp_ResponseCode'] === '00') {
                $data = [
                    'status' => "'Đã Thanh Toán'"
                ];
                $this->orders->updateOrder($data,  Session::data('id'));
            }
        } else {
            if ($_GET['resultCode'] === '0') {
                $data = [
                    'status' => "'Đã Thanh Toán'"
                ];
                $this->orders->updateOrder($data,  Session::data('id'));
            }
        }
        $this->data['sub_content']['msg'] = 'Thanh Toán Thành Công';
        $this->data['content'] = 'client/products/completed_payment';
        $this->render('layouts/client_layout', $this->data);
    }
    public function checkOut()
    {
        $request = new Request();
        $response = new Response();
        $id = Session::data('user')['id'];
        $this->data['msg'] = Session::flash('msg');
        if ($request->isPost()) {
            $data = $request->getFields();
            if($data['dostavka'] === 'express_delivery') 
            {
                $data = [
                    'user_id' => $id,
                    'address_id' => $data['address'],
                    'total_price' => Session::data('total') + 0,
                    'payment_method' => $data['payment_method'],
    
                ];
    
                $result = $this->orders->insertOrder($data);
                $shipping = [
                    'shipping_method' => 'Giao hàng tiêu chuẩn',
                    'shipping_cost' => 0,
                    'shipping_status' => 'Đang vận chuyển',
                    'order_id' => $result
                ];
            } else {
                $data = [
                    'user_id' => $id,
                    'address_id' => $data['address'],
                    'total_price' => Session::data('total') + 30000,
                    'payment_method' => $data['payment_method'],
    
                ];
    
                $result = $this->orders->insertOrder($data);
                $shipping = [
                    'shipping_method' => 'Chuyển phát nhanh',
                    'shipping_cost' => 30000,
                    'shipping_status' => 'Đang vận chuyển',
                    'order_id' => $result
                ];
            }
            $this->shipping->insertShipping($shipping);
            Session::data('id', $result);
            foreach (Session::data('carts') as $key) {
                $dataOrderDetail = [
                    'order_id' => $result,
                    'book_id' => $key['book_id'],
                    'quantity' =>  $key['quantity'],
                    'price' =>  $key['price'],
                    'discount' =>  $key['discount_price'],
                ];
                $qty = $key['quantity'];
                $quantity = [ 
                    'quantity_inventory' => " quantity_inventory - $qty"
                ];
                $this->products->updateProduct($quantity,  $key['book_id']);
                $this->orders_detail->insertOrderDetail($dataOrderDetail);
            }
            $payments = [
                'payment_method' => $data['payment_method'],
                'payment_amount' => Session::data('total'),
                'order_id' => $result
            ];
            $this->payments->insertPayment($payments);
            if ($data['payment_method'] === 'cash_on_delivery') {
                $this->carts->deleteCartByUser($id);
                $response->redirect('gio-hang');
            } else if ($data['payment_method'] === 'vnpay') {
                $this->carts->deleteCartByUser($id);
                Session::data('payments', 'vnpay');
                $response->redirect('thanh-toan-vnpay');
            } else {
                $this->carts->deleteCartByUser($id);
                Session::data('payments', 'momo');
                $response->redirect('thanh-toan-momo');
            }
        }
    }

    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }


    public function momo()
    {
        $total = $this->orders->getOrderDetail(Session::data('id'));
        $total_price = intval($total['total_price']);

        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $total_price;
        $orderId = time() . "";
        $redirectUrl = _WEB_ROOT . "thanh-toan-thanh-cong";
        $ipnUrl = _WEB_ROOT . "thanh-toan-thanh-cong";
        $extraData = "";


            $requestId = time() . "";
            $requestType = "payWithATM";
            // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );
            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);  // decode json

            //Just a example, please check more in there

            header('Location: ' . $jsonResult['payUrl']);
    }
    public function vnPay()
    {
        $total = $this->orders->getOrderDetail(Session::data('id'));
        $total_price = intval($total['total_price']);
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = _WEB_ROOT . "thanh-toan-thanh-cong";
        $vnp_TmnCode = "H9JB37UX"; //Mã website tại VNPAY 
        $vnp_HashSecret = "BKVFYENTFYZJHUPUDKZVSOTOLMXOJEOE"; //Chuỗi bí mật

        $vnp_TxnRef = rand(00, 9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Noi dung thanh toan";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $total_price;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
        // $vnp_Bill_Email = $_POST['txt_billing_email'];
        // $fullName = trim($_POST['txt_billing_fullname']);
        // if (isset($fullName) && trim($fullName) != '') {
        //     $name = explode(' ', $fullName);
        //     $vnp_Bill_FirstName = array_shift($name);
        //     $vnp_Bill_LastName = array_pop($name);
        // }
        // $vnp_Bill_Address=$_POST['txt_inv_addr1'];
        // $vnp_Bill_City=$_POST['txt_bill_city'];
        // $vnp_Bill_Country=$_POST['txt_bill_country'];
        // $vnp_Bill_State=$_POST['txt_bill_state'];
        // // Invoice
        // $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
        // $vnp_Inv_Email=$_POST['txt_inv_email'];
        // $vnp_Inv_Customer=$_POST['txt_inv_customer'];
        // $vnp_Inv_Address=$_POST['txt_inv_addr1'];
        // $vnp_Inv_Company=$_POST['txt_inv_company'];
        // $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
        // $vnp_Inv_Type=$_POST['cbo_inv_type'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            // "vnp_ExpireDate"=>$vnp_ExpireDate,
            // "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
            // "vnp_Bill_Email"=>$vnp_Bill_Email,
            // "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
            // "vnp_Bill_LastName"=>$vnp_Bill_LastName,
            // "vnp_Bill_Address"=>$vnp_Bill_Address,
            // "vnp_Bill_City"=>$vnp_Bill_City,
            // "vnp_Bill_Country"=>$vnp_Bill_Country,
            // "vnp_Inv_Phone"=>$vnp_Inv_Phone,
            // "vnp_Inv_Email"=>$vnp_Inv_Email,
            // "vnp_Inv_Customer"=>$vnp_Inv_Customer,
            // "vnp_Inv_Address"=>$vnp_Inv_Address,
            // "vnp_Inv_Company"=>$vnp_Inv_Company,
            // "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
            // "vnp_Inv_Type"=>$vnp_Inv_Type
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        // }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (Session::data('payments')) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo
    }
}
